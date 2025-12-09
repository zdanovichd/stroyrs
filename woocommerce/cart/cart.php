<?php
defined('ABSPATH') || exit;
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php get_template_part('template-parts/head'); ?>

<body <?php body_class(); ?>>
    <?php get_header(); ?>

    <main class="woocommerce-cart-container">

        

        <section class="breadcrumbs" aria-label="Навигация — хлебные крошки">
            <nav aria-label="breadcrumb">
                <?php woocommerce_breadcrumb(); ?>
            </nav>
        </section>

        <section class="cart__section">
            <h1 class="cart__title">Корзина</h1>

            <?php do_action('woocommerce_before_cart'); ?>

            <form class="woocommerce-cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
                <?php do_action('woocommerce_before_cart_table'); ?>

                <table class="shop_table cart" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="product-checkbox" width="30">
                                <div class="cart-bulk-actions">
                                    <label class="custom-checkbox">
                                            <input type="checkbox" id="select-all-items">
                                            <span class="custom-checkbox__box">
                                                <svg class="custom-checkbox__icon" viewBox="0 0 14 9" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M13.3657 0.222465C13.6781 0.519093 13.6781 1.00001 13.3657 1.29664L5.93137 8.35507C5.30654 8.94835 4.29347 8.94827 3.66864 8.35507L0.234312 5.09439C-0.0781041 4.79778 -0.0781041 4.31683 0.234312 4.02023C0.546737 3.72362 1.05327 3.72362 1.36569 4.02023L4.80001 7.28091L12.2343 0.222465C12.5467 -0.074155 13.0533 -0.074155 13.3657 0.222465Z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                        </label>
                                </div>
                            </th>

                            <th class="product-thumbnail">Выбрать все</th>
                            <th class="product-name"><?php esc_html_e('Название', 'woocommerce'); ?></th>
                            <th class="product-price"><?php esc_html_e('Цена', 'woocommerce'); ?></th>
                            <th class="product-quantity"><?php esc_html_e('Кол-во', 'woocommerce'); ?></th>
                            <th class="product-subtotal"><?php esc_html_e('Сумма', 'woocommerce'); ?></th>
                            <th class="product-remove">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody id="cart-items-body">
                        <?php
                        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                            $_product   = $cart_item['data'];
                            $product_id = $cart_item['product_id'];

                            if ($_product && $_product->exists() && $cart_item['quantity'] > 0) {
                                $product_permalink = $_product->is_visible() ? $_product->get_permalink($cart_item) : '';
                        ?>
                                <tr class="woocommerce-cart-form__cart-item" data-cart_item_key="<?php echo esc_attr($cart_item_key); ?>">
                                    <td class="product-checkbox">

                                        <label class="custom-checkbox">
                                            <input type="checkbox" class="cart-item-checkbox" name="cart_item[]" value="<?php echo esc_attr($cart_item_key); ?>">
                                            <span class="custom-checkbox__box">
                                                <svg class="custom-checkbox__icon" viewBox="0 0 14 9" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M13.3657 0.222465C13.6781 0.519093 13.6781 1.00001 13.3657 1.29664L5.93137 8.35507C5.30654 8.94835 4.29347 8.94827 3.66864 8.35507L0.234312 5.09439C-0.0781041 4.79778 -0.0781041 4.31683 0.234312 4.02023C0.546737 3.72362 1.05327 3.72362 1.36569 4.02023L4.80001 7.28091L12.2343 0.222465C12.5467 -0.074155 13.0533 -0.074155 13.3657 0.222465Z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                        </label>
                                    </td>
    

                                    <td class="product-thumbnail">
                                        <?php echo $product_permalink ? sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_image()) : $_product->get_image(); ?>
                                    </td>
                                    <td class="product-name">
                                        <?php
                                        if (!$product_permalink) {
                                            echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key) . '&nbsp;');
                                        } else {
                                            echo wp_kses_post(apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key));
                                        }
                                        ?>
                                    </td>
                                    <td class="product-price"><?php echo wc_price($_product->get_price()); ?></td>
                                    <td class="product-quantity">
                                        <?php
                                        if ($_product->is_sold_individually()) {
                                            echo '1';
                                        } else {
                                            echo woocommerce_quantity_input(array(
                                                'input_name'  => "cart[{$cart_item_key}][qty]",
                                                'input_value' => $cart_item['quantity'],
                                                'min_value'   => 0,
                                                'max_value'   => $_product->get_max_purchase_quantity(),
                                            ), $_product, false);
                                        }
                                        ?>
                                    </td>
                                    <td class="product-subtotal"><?php echo WC()->cart->get_product_subtotal($_product, $cart_item['quantity']); ?></td>
                                    <td class="product-remove">
                                        <a href="#" class="remove" data-cart_item_key="<?php echo esc_attr($cart_item_key); ?>">&times;</a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>

                <?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>
            </form>

            <div class="cart-collaterals" id="cart-collaterals">
                <?php do_action('woocommerce_cart_collaterals'); ?>
            </div>
        </section>
    </main>

    <?php get_footer(); ?>
    <?php wp_footer(); ?>

<script>
jQuery(document).ready(function($) {
    // Функция для обновления корзины
    function updateCart($input) {
        var $tr = $input.closest('tr');
        var cart_item_key = $tr.data('cart_item_key');
        var quantity = parseInt($input.val()) || 0;

        $.ajax({
            url: "<?php echo admin_url('admin-ajax.php'); ?>",
            type: 'POST',
            data: {
                action: 'custom_update_cart_quantity',
                cart_item_key: cart_item_key,
                quantity: quantity,
                nonce: '<?php echo wp_create_nonce("cart-ajax-nonce"); ?>'
            },
            success: function(response) {
                if (response.success) {
                    $('#cart-items-body').html(response.data.cart_tbody);
                    $('#cart-collaterals').html(response.data.cart_totals);
                    updateBulkActions(); // Обновляем состояние кнопок
                    
                    // ОБНОВЛЯЕМ МИНИ-КОРЗИНУ И СЧЕТЧИК
                    updateMiniCartAndCounter(response.data.items_count);
                } else {
                    console.error('Error:', response.data);
                    location.reload();
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', error);
                location.reload();
            }
        });
    }

    // Функция для обновления мини-корзины и счетчика
    function updateMiniCartAndCounter(itemsCount) {
        // 1. Обновляем счетчик
        updateCartCounter(itemsCount);
        
        // 2. Обновляем мини-корзину через WooCommerce фрагменты
        if (typeof wc_cart_fragments_params !== 'undefined') {
            $(document.body).trigger('wc_fragment_refresh');
        }
    }

    // Функция для обновления счетчика корзины
    function updateCartCounter(itemsCount) {
        var count = parseInt(itemsCount) || 0;
        
        // Обновляем все счетчики на странице
        $('.cart-count').each(function() {
            var $counter = $(this);
            
            // Обновляем текст и data-атрибут
            if (count > 0) {
                $counter.text(count).css('display', 'flex');
                $counter.attr('data-count', count);
            } else {
                $counter.text('').css('display', 'none');
                $counter.attr('data-count', 0);
            }
            
            // Добавляем анимацию обновления
            $counter.addClass('updated');
            setTimeout(function() {
                $counter.removeClass('updated');
            }, 500);
        });
        
        // Также можно обновить элементы с другими классами, если они есть
        $('.mini-cart-count, .header-cart-count').each(function() {
            var $counter = $(this);
            if (count > 0) {
                $counter.text(count).show();
            } else {
                $counter.text('').hide();
            }
        });
    }

    // Обработчик для кнопок +/-
    $('body').on('click', '.plus, .minus', function() {
        var $input = $(this).siblings('input.qty');
        setTimeout(function() {
            updateCart($input);
        }, 100);
    });

    // Обработчик прямого изменения количества
    $('body').on('change', 'input.qty', function() {
        updateCart($(this));
    });

    // Обработчик удаления товара - ИСПОЛЬЗУЕМ ДЕЛЕГИРОВАНИЕ
    $('body').on('click', 'a.remove', function(e) {
        e.preventDefault();
        var $tr = $(this).closest('tr');
        var cart_item_key = $tr.data('cart_item_key');

        $.ajax({
            url: "<?php echo admin_url('admin-ajax.php'); ?>",
            type: 'POST',
            data: {
                action: 'custom_remove_cart_item',
                cart_item_key: cart_item_key,
                nonce: '<?php echo wp_create_nonce("cart-ajax-nonce"); ?>'
            },
            success: function(response) {
                if (response.success) {
                    if (response.data.items_count == 0) {
                        // Если корзина пуста, обновляем счетчик и перезагружаем
                        updateCartCounter(0);
                        setTimeout(function() {
                            location.reload();
                        }, 500);
                    } else {
                        // Обновляем таблицу, кнопки и счетчик
                        $('#cart-items-body').html(response.data.cart_tbody);
                        $('#cart-collaterals').html(response.data.cart_totals);
                        updateBulkActions();
                        updateCartCounter(response.data.items_count);
                    }
                } else {
                    console.error('Error:', response.data);
                    location.reload();
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', error);
                location.reload();
            }
        });
    });

    // Функция для обновления состояния массовых действий
    function updateBulkActions() {
        var $checkboxes = $('.cart-item-checkbox');
        var $checked = $checkboxes.filter(':checked');

        if ($checked.length > 0) {
            $('#bulk-remove-items').show();
        } else {
            $('#bulk-remove-items').hide();
        }

        // Обновляем состояние "Выбрать все"
        var allChecked = ($checkboxes.length > 0 && $checkboxes.length === $checked.length);
        $('#select-all-items').prop('checked', allChecked);
    }

    // Обработчик для "Выбрать все" - ДЕЛЕГИРОВАНИЕ НЕ НУЖНО, т.к. этот элемент не перезагружается
    $(document).on('change', '#select-all-items', function() {
        $('.cart-item-checkbox').prop('checked', $(this).prop('checked'));
        updateBulkActions();
    });

    // Обработчик для отдельных чекбоксов - ИСПОЛЬЗУЕМ ДЕЛЕГИРОВАНИЕ
    $(document).on('change', '.cart-item-checkbox', function() {
        updateBulkActions();
    });

    // Обработчик массового удаления - ДЕЛЕГИРОВАНИЕ НЕ НУЖНО
    $(document).on('click', '#bulk-remove-items', function(e) {
        e.preventDefault();
        
        var selectedItems = [];
        $('.cart-item-checkbox:checked').each(function() {
            selectedItems.push($(this).val());
        });

        if (selectedItems.length === 0) {
            alert('Выберите товары для удаления');
            return;
        }

        if (!confirm('Удалить выбранные товары из корзины?')) {
            return;
        }

        $.ajax({
            url: "<?php echo admin_url('admin-ajax.php'); ?>",
            type: 'POST',
            data: {
                action: 'custom_bulk_remove_cart_items',
                cart_item_keys: selectedItems,
                nonce: '<?php echo wp_create_nonce("cart-ajax-nonce"); ?>'
            },
            success: function(response) {
                if (response.success) {
                    if (response.data.items_count == 0) {
                        // Если корзина пуста, обновляем счетчик и перезагружаем
                        updateCartCounter(0);
                        setTimeout(function() {
                            location.reload();
                        }, 500);
                    } else {
                        // Обновляем таблицу, кнопки и счетчик
                        $('#cart-items-body').html(response.data.cart_tbody);
                        $('#cart-collaterals').html(response.data.cart_totals);
                        updateBulkActions();
                        updateCartCounter(response.data.items_count);
                    }
                } else {
                    console.error('Error:', response.data);
                    location.reload();
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', error);
                location.reload();
            }
        });
    });

    // Также слушаем стандартные события WooCommerce для надежности
    $(document.body).on('added_to_cart removed_from_cart', function() {
        // Получаем актуальное количество через AJAX
        $.ajax({
            url: '<?php echo esc_url(home_url('/?wc-ajax=get_cart_contents_count')); ?>',
            type: 'GET',
            success: function(count) {
                updateCartCounter(count);
            }
        });
    });

    // Инициализация состояния кнопок при загрузке
    updateBulkActions();
});
</script>
</body>

</html>