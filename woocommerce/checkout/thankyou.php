<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 */

defined('ABSPATH') || exit;
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php get_template_part('template-parts/head'); ?>

<body <?php body_class(); ?>>
    <?php get_header(); ?>

    <main class="woocommerce-thankyou-container">
        <section class="breadcrumbs" aria-label="Навигация — хлебные крошки">
            <nav aria-label="breadcrumb">
                <?php woocommerce_breadcrumb(); ?>
            </nav>
        </section>

        <section class="thankyou__section">

            <h1 class="checkout__title">Заказ принят</h1>
            <div class="thankyou__content">
               
                
                <div class="thankyou__actions">
                    <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="button button--red">
                        Вернуться в магазин
                    </a>
                    
                 
                </div>
            </div>
        </section>
    </main>

    <?php get_footer(); ?>
    <?php wp_footer(); ?>
</body>
</html>