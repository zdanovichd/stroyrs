<?php
defined('ABSPATH') || exit;

// Получаем товары из корзины для отображения
$cart = WC()->cart;
$cart_items = $cart->get_cart();
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php get_template_part('template-parts/head'); ?>

<body <?php body_class(); ?>>
    <?php get_header(); ?>

    <main class="woocommerce-checkout-container">
        <section class="breadcrumbs" aria-label="Навигация — хлебные крошки">
            <nav aria-label="breadcrumb">
                <?php woocommerce_breadcrumb(); ?>
            </nav>
        </section>

        <section class="checkout__section">
            <h1 class="checkout__title"><?php the_title() ?></h1>

            <?php //wc_print_notices(); ?>

            <?php if ($cart->is_empty()) : ?>
                <?php 
                header("Location: /cart");
                exit( );    
                ?>
            <?php else : ?>
                <div class="checkout__content">
                <p class="checkout__text">
                    Заполните, пожалуйста, Ваши контактные данные:
                </p>

                <!-- Форма оформления заказа -->
                <form name="checkout" method="post" class="checkout woocommerce-checkout checkout__form" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">

                    <div class="checkout__fields">
                        <?php do_action('woocommerce_checkout_before_customer_details'); ?>

                        <!-- Поля для заполнения -->
                        <div class="customer-details-fields">
                            <?php 
                            // Получаем и отображаем только нужные поля
                            $checkout = WC()->checkout();
                            $fields = $checkout->get_checkout_fields('billing');
                            
                            foreach ($fields as $key => $field) :
                                woocommerce_form_field($key, $field, $checkout->get_value($key));
                            endforeach;
                            
                            // Поле для комментария
                            woocommerce_form_field('order_comments', array(
                                'type' => 'textarea',
                                'class' => array('form-row-wide', 'form-comment'),
                                'label' => 'Комментарий к заказу',
                                'placeholder' => 'Комментарий к заказу',
                                'custom_attributes' => array(
                                    'rows' => '4',  // Количество строк
                                    // 'cols' => '5',  // Количество колонок (опционально)
                                ),
                            ), $checkout->get_value('order_comments'));
                            ?>
                        </div>

                        <?php do_action('woocommerce_checkout_after_customer_details'); ?>

                        <!-- Скрытые поля -->
                        <?php wp_nonce_field('woocommerce-process_checkout', 'woocommerce-process-checkout-nonce'); ?>
                        
                        <!-- Кнопка отправки -->
                        <div class="checkout-submit-wrapper">
                            
                            
                            <button type="submit" class="checkout__button button button--red" name="woocommerce_checkout_place_order" id="place_order">
                                Отправить
                            </button>
                            <div class="checkout__policy">
                                Нажимая «Отправить», вы принимаете условия <a href="<?php echo get_privacy_policy_url(); ?>" target="_blank">Политики конфиденциальности</a> <br>и даете ваше согласие на обработку персональных данных
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            <?php endif; ?>
        </section>
    </main>

    <?php get_footer(); ?>
    <?php wp_footer(); ?>
</body>
</html>