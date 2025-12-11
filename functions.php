<?php


add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

// Отключаем новый блоковый WooCommerce, оставляя классический
function use_classic_woocommerce() {
    // Отключаем блоковые шорткоды
    add_filter('woocommerce_legacy_checkout_enabled', '__return_true');
    add_filter('woocommerce_enable_legacy_cart', '__return_true');
    
    // Отключаем блоковые скрипты
    add_action('wp_enqueue_scripts', function() {
        wp_dequeue_style('wc-blocks-style');
        wp_dequeue_script('wc-blocks');
        remove_action('wp_head', 'wc_block_assets_prefetch');
    }, 100);
}
add_action('init', 'use_classic_woocommerce');

// Убираем только frontend-скрипты Gutenberg
function remove_gutenberg_frontend() {
    // Удаляем ВСЕ prefetch ссылки
    remove_action('wp_head', 'wp_resource_hints', 2);
    
    // Удаляем скрипты блоков
    add_action('wp_enqueue_scripts', function() {
        // Блоковые скрипты
        wp_dequeue_script('wp-dom-ready');
        wp_dequeue_script('wp-primitives');
        wp_dequeue_script('wp-warning');
        wp_dequeue_script('wp-polyfill');
        wp_dequeue_script('wp-hooks');
        wp_dequeue_script('wp-i18n');
        wp_dequeue_script('wp-a11y');
        wp_dequeue_script('wp-dom');
        
        // React и зависимости (если не используются)
        wp_dequeue_script('react');
        wp_dequeue_script('react-dom');
        wp_dequeue_script('wp-react');
        
        // Стили блоков
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('wp-block-library-theme');
        wp_dequeue_style('global-styles');
    }, 100);
}
add_action('init', 'remove_gutenberg_frontend');

function remove_wordpress_bloat() {
    // Убираем версию WordPress
    remove_action('wp_head', 'wp_generator');
    
    // Убираем Emoji
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('admin_print_styles', 'print_emoji_styles');
    
    // Убираем RSD, WLW, короткие ссылки
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    
    // Убираем REST API ссылку
    remove_action('wp_head', 'rest_output_link_wp_head');
    
    // Убираем oEmbed
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    remove_action('wp_head', 'wp_oembed_add_host_js');
    
    // Убираем feed ссылки
    remove_action('wp_head', 'feed_links', 2);
    remove_action('wp_head', 'feed_links_extra', 3);
    
    // Убираем стили блоков (Gutenberg)
    add_action('wp_enqueue_scripts', function() {
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('wp-block-library-theme');
        wp_dequeue_style('global-styles');
        wp_dequeue_style('classic-theme-styles');
        wp_dequeue_style('dashicons');
        wp_dequeue_style('admin-bar');
    }, 999);
    
    // Убираем скрипты WordPress
    add_action('wp_enqueue_scripts', function() {
        // Отключаем jQuery если не нужен
        // if (!is_admin()) {
        //     wp_deregister_script('jquery');
        //     wp_dequeue_script('jquery');
        //     wp_deregister_script('jquery-migrate');
        //     wp_dequeue_script('jquery-migrate');
        // }
        
        // Убираем Emoji скрипт
        wp_dequeue_script('wp-emoji');
    }, 999);
    
    // Убираем prefetch ссылки
    remove_action('wp_head', 'wp_resource_hints', 2);
    
    // Убираем инлайн стили
    add_action('wp_print_styles', function() {
        wp_dequeue_style('wp-emoji-styles');
        wp_dequeue_style('admin-bar-inline-css');
        wp_dequeue_style('classic-theme-styles-inline-css');
        wp_dequeue_style('woocommerce-inline-inline-css');
        wp_dequeue_style('wp-img-auto-sizes-contain-inline-css');
    }, 999);
}
add_action('init', 'remove_wordpress_bloat');

function disable_woocommerce_completely() {
    // Если WooCommerce не используется ВООБЩЕ
    if (class_exists('WooCommerce')) {
        // Удаляем все стили WooCommerce
        add_action('wp_enqueue_scripts', function() {
            // wp_dequeue_style('woocommerce-layout');
            wp_dequeue_style('woocommerce-smallscreen');
            // wp_dequeue_style('woocommerce-general');
            wp_dequeue_style('woocommerce-inline');
            wp_dequeue_style('brands-styles');
            // wp_dequeue_style('wc-blocks-style');
            
            // Удаляем все скрипты WooCommerce
            // wp_dequeue_script('wc-add-to-cart');
            // wp_dequeue_script('wc-jquery-blockui');
            // wp_dequeue_script('wc-js-cookie');
            // wp_dequeue_script('woocommerce-js');
            // wp_dequeue_script('wc-cart-fragments');
            // wp_dequeue_script('wc-cart');
            // wp_dequeue_script('wc-checkout');
        }, 999);
        
        // Убираем prefetch WooCommerce
        remove_action('wp_head', 'wc_block_assets_prefetch');
        
        // Убираем meta генератор WooCommerce
        remove_action('wp_head', 'wc_generator_tag');
    }
}
add_action('wp', 'disable_woocommerce_completely');


// В functions.php
function specific_page_styles() {
    // Или по slug/названию
    if (is_page('kalkulyator')) { // slug страницы
        wp_enqueue_style('kalkulyator-css', get_template_directory_uri() . '/assets/css/kalkulyator.css');
    }
}
add_action('wp_enqueue_scripts', 'specific_page_styles');

// В functions.php добавляем кастомизацию хлебных крошек
add_filter('woocommerce_breadcrumb_defaults', 'custom_woocommerce_breadcrumbs');
function custom_woocommerce_breadcrumbs() {
    return array(
        'delimiter'   => '<li class="breadcrumb__separator" aria-hidden="true">
            <svg viewBox="0 0 31 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M30.3536 4.03544C30.5488 3.84018 30.5488 3.52359 30.3536 3.32833L27.1716 0.146351C26.9763 -0.0489113 26.6597 -0.0489113 26.4645 0.146351C26.2692 0.341613 26.2692 0.658195 26.4645 0.853458L29.2929 3.68188L26.4645 6.51031C26.2692 6.70557 26.2692 7.02216 26.4645 7.21742C26.6597 7.41268 26.9763 7.41268 27.1716 7.21742L30.3536 4.03544ZM0 3.68188V4.18188H30V3.68188V3.18188H0V3.68188Z" fill="#2C2C2C" />
            </svg>
        </li>',
        'wrap_before' => '<ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">',
        'wrap_after'  => '</ol>',
        'before'      => '<li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">',
        'after'       => '</li>',
        'home'        => 'Главная',
    );
}


// Обработчик AJAX для бесконечной прокрутки
// add_action('wp_ajax_load_more_products', 'load_more_products_handler');
// add_action('wp_ajax_nopriv_load_more_products', 'load_more_products_handler');

// function load_more_products_handler() {
//     // Логируем полученные данные
//     error_log('AJAX Request: ' . print_r($_POST, true));
    
//     $page = intval($_POST['page']);
//     $posts_per_page = intval($_POST['posts_per_page']) ?: 12;
    
//     $args = array(
//         'post_type' => 'product',
//         'posts_per_page' => $posts_per_page,
//         'post_status' => 'publish',
//         'paged' => $page,
//     );
    
//     // Если передан ID категории
//     if (isset($_POST['category']) && !empty($_POST['category'])) {
//         $args['tax_query'] = array(
//             array(
//                 'taxonomy' => 'product_cat',
//                 'field' => 'id',
//                 'terms' => intval($_POST['category']),
//             )
//         );
//     }
    
//     error_log('WP_Query args: ' . print_r($args, true));
    
//     $products = new WP_Query($args);
    
//     error_log('Found posts: ' . $products->found_posts);
//     error_log('Max pages: ' . $products->max_num_pages);
    
//     ob_start();
    
//     if ($products->have_posts()) {
//         while ($products->have_posts()) {
//             $products->the_post();
//             wc_get_template_part('content', 'product');
//         }
//         wp_reset_postdata();
//     }
    
//     $html = ob_get_clean();
    
//     wp_send_json_success(array(
//         'html' => $html,
//         'max_pages' => $products->max_num_pages
//     ));
// }

// Добавьте в functions.php
function wrap_first_word($title) {
    $words = explode(' ', $title, 2);
    if (count($words) > 1) {
        return '<span>' . $words[0] . '</span> ' . $words[1];
    }
    return '<span>' . $title . '</span>';
}

add_action( 'woocommerce_after_quantity_input_field', 'ab_quantity_plus' );
  
function ab_quantity_plus() {
   echo '<div class="plus"><span>&plus;</span></div>';
}
  
add_action( 'woocommerce_before_quantity_input_field', 'ab_quantity_minus' );
  
function ab_quantity_minus() {
   echo '<div class="minus"><span>&minus;</span></div>';
}


// переопределение шаблона товара
add_filter('template_include', function($template) {
    if (is_singular('product')) {
        // Путь к твоему кастомному шаблону
        $custom_template = get_stylesheet_directory() . '/woocommerce/single-product.php';
        if (file_exists($custom_template)) {
            return $custom_template;
        }
    }
    return $template;
}, 99);

// переопределение шаблона каталога
add_filter('template_include', function($template) {
    // Архив товаров (Shop)
    if (is_post_type_archive('product')) {
        $custom_archive = get_stylesheet_directory() . '/woocommerce/archive-product.php';
        if (file_exists($custom_archive)) {
            return $custom_archive;
        }
    }

    // Архив категории товара или тега товара
    if (is_tax('product_cat') || is_tax('product_tag')) {
        $custom_archive = get_stylesheet_directory() . '/woocommerce/archive-product.php';
        if (file_exists($custom_archive)) {
            return $custom_archive;
        }
    }

    // if (is_cart()) {
    //     $custom_cart = get_stylesheet_directory() . '/woocommerce/cart/cart.php';
    //     if (file_exists($custom_cart)) {
    //         return $custom_cart;
    //     }
    // }

    if (is_cart()) {
        if (WC()->cart->is_empty()) {
            // Шаблон для пустой корзины
            $empty_cart_template = get_stylesheet_directory() . '/woocommerce/cart/cart-empty.php';
            if (file_exists($empty_cart_template)) {
                return $empty_cart_template;
            }
        } else {
            // Шаблон для заполненной корзины
            $cart_template = get_stylesheet_directory() . '/woocommerce/cart/cart.php';
            if (file_exists($cart_template)) {
                return $cart_template;
            }
        }
    }

      // Переопределение оформления заказа
    if (is_checkout() && !is_wc_endpoint_url('order-received')) {
        $checkout_template = get_stylesheet_directory() . '/woocommerce/checkout/form-checkout.php';
        if (file_exists($checkout_template)) {
            return $checkout_template;
        }
    }
    
    // Переопределение страницы "Заказ получен"
    if (is_wc_endpoint_url('order-received')) {
        $order_received_template = get_stylesheet_directory() . '/woocommerce/checkout/thankyou.php';
        if (file_exists($order_received_template)) {
            return $order_received_template;
        }
    }

    return $template;
}, 99);


// Убедитесь что WooCommerce AJAX скрипты загружены
// function add_woocommerce_ajax_support() {
//     if (class_exists('WooCommerce')) {
//         wp_enqueue_script('wc-add-to-cart');
//         wp_enqueue_script('wc-cart-fragments');
//     }
// }
// add_action('wp_enqueue_scripts', 'add_woocommerce_ajax_support', 20);

add_action('wp_ajax_woocommerce_add_to_cart', 'debug_ajax_add_to_cart', 1);
add_action('wp_ajax_nopriv_woocommerce_add_to_cart', 'debug_ajax_add_to_cart', 1);
function debug_ajax_add_to_cart() {
    error_log(print_r($_POST, true));
}


// Добавьте в functions.php для отладки вариаций
add_action('wp_ajax_woocommerce_add_to_cart', 'debug_variation_issue', 5);
add_action('wp_ajax_nopriv_woocommerce_add_to_cart', 'debug_variation_issue', 5);

function debug_variation_issue() {
    error_log('=== VARIATION DEBUG START ===');
    
    // Логируем все полученные данные
    error_log('POST data: ' . print_r($_POST, true));
    
    if (isset($_POST['variation_id'])) {
        $variation_id = intval($_POST['variation_id']);
        $product_id = intval($_POST['product_id']);
        
        // Проверяем существование вариации
        $variation = wc_get_product($variation_id);
        error_log('Variation exists: ' . ($variation ? 'YES' : 'NO'));
        
        if ($variation) {
            error_log('Variation type: ' . $variation->get_type());
            error_log('Variation status: ' . $variation->get_status());
            error_log('Variation purchasable: ' . ($variation->is_purchasable() ? 'YES' : 'NO'));
            error_log('Variation in stock: ' . ($variation->is_in_stock() ? 'YES' : 'NO'));
            error_log('Variation price: ' . $variation->get_price());
            error_log('Variation attributes: ' . print_r($variation->get_attributes(), true));
            
            // Проверяем родительский товар
            $parent_product = wc_get_product($product_id);
            error_log('Parent product exists: ' . ($parent_product ? 'YES' : 'NO'));
            if ($parent_product) {
                error_log('Parent product status: ' . $parent_product->get_status());
                error_log('Parent product purchasable: ' . ($parent_product->is_purchasable() ? 'YES' : 'NO'));
            }
        }
        
        // Проверяем переданные атрибуты
        $passed_attributes = array();
        foreach ($_POST as $key => $value) {
            if (strpos($key, 'attribute_') === 0) {
                $passed_attributes[$key] = $value;
            }
        }
        error_log('Passed attributes: ' . print_r($passed_attributes, true));
    }
    
    error_log('=== VARIATION DEBUG END ===');
}


// Обновление количества товара в корзине
add_action('wp_ajax_custom_update_cart_quantity', 'custom_update_cart_quantity');
add_action('wp_ajax_nopriv_custom_update_cart_quantity', 'custom_update_cart_quantity');
function custom_update_cart_quantity() {
    try {
        // Проверяем nonce
        if (!wp_verify_nonce($_POST['nonce'], 'cart-ajax-nonce')) {
            wp_send_json_error('Invalid nonce');
            return;
        }

        // Инициализируем WooCommerce если нужно
        if (!function_exists('WC')) {
            wp_send_json_error('WooCommerce not loaded');
            return;
        }

        $cart_item_key = sanitize_text_field($_POST['cart_item_key']);
        $quantity = max(0, intval($_POST['quantity']));

        // Проверяем существование товара в корзине
        if (!WC()->cart->get_cart_item($cart_item_key)) {
            wp_send_json_error('Cart item not found');
            return;
        }

        // Обновляем количество или удаляем если 0
        if ($quantity === 0) {
            WC()->cart->remove_cart_item($cart_item_key);
        } else {
            WC()->cart->set_quantity($cart_item_key, $quantity);
        }

        // Пересчитываем итоги
        WC()->cart->calculate_totals();
        
        // Сохраняем корзину в сессии
        WC()->cart->set_session();
        WC()->cart->maybe_set_cart_cookies();

        // Получаем обновленные данные
        $cart_data = get_cart_ajax_data();
        wp_send_json_success($cart_data);

    } catch (Exception $e) {
        wp_send_json_error('Error: ' . $e->getMessage());
    }
}

// Удаление товара из корзины
add_action('wp_ajax_custom_remove_cart_item', 'custom_remove_cart_item');
add_action('wp_ajax_nopriv_custom_remove_cart_item', 'custom_remove_cart_item');
function custom_remove_cart_item() {
    try {
        // Проверяем nonce
        if (!wp_verify_nonce($_POST['nonce'], 'cart-ajax-nonce')) {
            wp_send_json_error('Invalid nonce');
            return;
        }

        if (!function_exists('WC')) {
            wp_send_json_error('WooCommerce not loaded');
            return;
        }

        $cart_item_key = sanitize_text_field($_POST['cart_item_key']);

        if (WC()->cart->get_cart_item($cart_item_key)) {
            WC()->cart->remove_cart_item($cart_item_key);
            WC()->cart->calculate_totals();
            WC()->cart->set_session();
            WC()->cart->maybe_set_cart_cookies();
        }

        $cart_data = get_cart_ajax_data();
        wp_send_json_success($cart_data);

    } catch (Exception $e) {
        wp_send_json_error('Error: ' . $e->getMessage());
    }
}

// Массовое удаление товаров из корзины
add_action('wp_ajax_custom_bulk_remove_cart_items', 'custom_bulk_remove_cart_items');
add_action('wp_ajax_nopriv_custom_bulk_remove_cart_items', 'custom_bulk_remove_cart_items');
function custom_bulk_remove_cart_items() {
    try {
        // Проверяем nonce
        if (!wp_verify_nonce($_POST['nonce'], 'cart-ajax-nonce')) {
            wp_send_json_error('Invalid nonce');
            return;
        }

        if (!function_exists('WC')) {
            wp_send_json_error('WooCommerce not loaded');
            return;
        }

        $cart_item_keys = isset($_POST['cart_item_keys']) ? $_POST['cart_item_keys'] : array();

        if (!empty($cart_item_keys) && is_array($cart_item_keys)) {
            foreach ($cart_item_keys as $cart_item_key) {
                $cart_item_key = sanitize_text_field($cart_item_key);
                if (WC()->cart->get_cart_item($cart_item_key)) {
                    WC()->cart->remove_cart_item($cart_item_key);
                }
            }
            
            WC()->cart->calculate_totals();
            WC()->cart->set_session();
            WC()->cart->maybe_set_cart_cookies();
        }

        $cart_data = get_cart_ajax_data();
        wp_send_json_success($cart_data);

    } catch (Exception $e) {
        wp_send_json_error('Error: ' . $e->getMessage());
    }
}

// Вспомогательная функция для получения данных корзины
function get_cart_ajax_data() {
    if (!function_exists('WC') || !WC()->cart) {
        return [
            'cart_tbody' => '', 
            'cart_totals' => '',
            'items_count' => 0,
            'cart_total' => '0',
            'fragments' => array() // Добавляем фрагменты для мини-корзины
        ];
    }

    // Формируем tbody (ваш существующий код)...
    ob_start();
    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
        $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
        
        if (!$_product || !$_product->exists() || $cart_item['quantity'] <= 0) {
            continue;
        }

        $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
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
                <?php
                $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);
                if ($product_permalink) {
                    printf('<a href="%s">%s</a>', esc_url($product_permalink), $thumbnail);
                } else {
                    echo $thumbnail;
                }
                ?>
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
            <td class="product-price">
                <?php
                echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key);
                ?>
            </td>
            <td class="product-quantity">
                <?php
                if ($_product->is_sold_individually()) {
                    $min_quantity = 1;
                    $max_quantity = 1;
                } else {
                    $min_quantity = 0;
                    $max_quantity = $_product->get_max_purchase_quantity();
                }

                $product_quantity = woocommerce_quantity_input(
                    array(
                        'input_name'   => "cart[{$cart_item_key}][qty]",
                        'input_value'  => $cart_item['quantity'],
                        'max_value'    => $max_quantity,
                        'min_value'    => $min_quantity,
                        'product_name' => $_product->get_name(),
                    ),
                    $_product,
                    false
                );

                echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item);
                ?>
            </td>
            <td class="product-subtotal">
                <?php
                echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key);
                ?>
            </td>
            <td class="product-remove">
                <a href="#" class="remove" data-cart_item_key="<?php echo esc_attr($cart_item_key); ?>">&times;</a>
            </td>
        </tr>
        <?php
    }
    $cart_tbody = ob_get_clean();

    // Totals
    ob_start();
    woocommerce_cart_totals();
    $cart_totals = ob_get_clean();
    
    // Получаем фрагменты для мини-корзины
    $fragments = array();
    
    // Фрагмент для счетчика
    ob_start();
    ?>
    <span class="cart-count" data-count="<?php echo WC()->cart->get_cart_contents_count(); ?>">
        <?php if (WC()->cart->get_cart_contents_count() > 0) : ?>
            <?php echo WC()->cart->get_cart_contents_count(); ?>
        <?php endif; ?>
    </span>
    <?php
    $fragments['.cart-count'] = ob_get_clean();
    
    // Если у вас есть мини-корзина с товарами, можно добавить и ее
    ob_start();
    woocommerce_mini_cart();
    $fragments['div.widget_shopping_cart_content'] = '<div class="widget_shopping_cart_content">' . ob_get_clean() . '</div>';

    return [
        'cart_tbody' => $cart_tbody,
        'cart_totals' => $cart_totals,
        'items_count' => WC()->cart->get_cart_contents_count(),
        'cart_total' => WC()->cart->get_cart_total(),
        'fragments' => $fragments // Добавляем фрагменты
    ];
}



// // Обработчик AJAX для бесконечной прокрутки с поддержкой сортировки
// add_action('wp_ajax_load_more_products', 'load_more_products_handler');
// add_action('wp_ajax_nopriv_load_more_products', 'load_more_products_handler');

// function load_more_products_handler() {
//     // Логируем полученные данные
//     error_log('AJAX Request: ' . print_r($_POST, true));
    
//     $page = intval($_POST['page']);
//     $posts_per_page = intval($_POST['posts_per_page']) ?: 12;
//     $sort = isset($_POST['sort']) ? sanitize_text_field($_POST['sort']) : 'default';
    
//     $args = array(
//         'post_type' => 'product',
//         'posts_per_page' => $posts_per_page,
//         'post_status' => 'publish',
//         'paged' => $page,
//     );
    
//     // Если передан ID категории
//     if (isset($_POST['category']) && !empty($_POST['category'])) {
//         $args['tax_query'] = array(
//             array(
//                 'taxonomy' => 'product_cat',
//                 'field' => 'id',
//                 'terms' => intval($_POST['category']),
//             )
//         );
//     }
    
//     // Добавляем параметры сортировки
//     switch($sort) {
//         case 'price-asc':
//             $args['orderby'] = 'meta_value_num';
//             $args['meta_key'] = '_price';
//             $args['order'] = 'ASC';
//             break;
//         case 'price-desc':
//             $args['orderby'] = 'meta_value_num';
//             $args['meta_key'] = '_price';
//             $args['order'] = 'DESC';
//             break;
//         case 'rating-desc':
//             $args['orderby'] = 'meta_value_num';
//             $args['meta_key'] = '_wc_average_rating';
//             $args['order'] = 'DESC';
//             break;
//         case 'name-asc':
//             $args['orderby'] = 'title';
//             $args['order'] = 'ASC';
//             break;
//         case 'name-desc':
//             $args['orderby'] = 'title';
//             $args['order'] = 'DESC';
//             break;
//         case 'default':
//         default:
//             // Применяем приоритетную сортировку для главной страницы
//             if (isset($_POST['category']) && empty($_POST['category'])) {
//                 // Это главная страница магазина
//                 $args['orderby'] = 'menu_order title';
//                 $args['order'] = 'ASC';
//                 // Можно добавить фильтр для приоритетной сортировки
//                 add_filter('posts_clauses', 'custom_priority_orderby', 10, 2);
//             }
//             break;
//     }
    
//     error_log('WP_Query args with sorting: ' . print_r($args, true));
    
//     $products = new WP_Query($args);
    
//     error_log('Found posts: ' . $products->found_posts);
//     error_log('Max pages: ' . $products->max_num_pages);
    
//     ob_start();
    
//     if ($products->have_posts()) {
//         while ($products->have_posts()) {
//             $products->the_post();
//             wc_get_template_part('content', 'product');
//         }
//         wp_reset_postdata();
//     }
    
//     $html = ob_get_clean();
    
//     // Удаляем фильтр после выполнения запроса
//     remove_filter('posts_clauses', 'custom_priority_orderby', 10);
    
//     wp_send_json_success(array(
//         'html' => $html,
//         'max_pages' => $products->max_num_pages
//     ));
// }

// // Функция для приоритетной сортировки по категориям (если нужно)
// function custom_priority_orderby($clauses, $query) {
//     global $wpdb;
    
//     // Проверяем, что это запрос товаров
//     if (is_admin() || !$query->is_main_query() || !isset($query->query_vars['post_type']) || $query->query_vars['post_type'] !== 'product') {
//         return $clauses;
//     }
    
//     // Получаем приоритетные категории
//     $priority_categories = get_priority_categories(); // Эта функция должна быть определена
    
//     if (!empty($priority_categories)) {
//         // Подготавливаем CASE выражение для приоритетной сортировки
//         $case_conditions = "CASE ";
//         $priority_counter = 1;
        
//         foreach ($priority_categories as $cat_id) {
//             $case_conditions .= "WHEN EXISTS (
//                 SELECT 1 FROM {$wpdb->term_relationships} tr
//                 INNER JOIN {$wpdb->term_taxonomy} tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
//                 WHERE tr.object_id = {$wpdb->posts}.ID 
//                 AND tt.term_id = {$cat_id}
//                 AND tt.taxonomy = 'product_cat'
//             ) THEN {$priority_counter} ";
//             $priority_counter++;
//         }
        
//         $case_conditions .= "ELSE {$priority_counter} END";
        
//         // Добавляем сортировку в запрос
//         $clauses['join'] .= " LEFT JOIN {$wpdb->term_relationships} tr ON {$wpdb->posts}.ID = tr.object_id";
//         $clauses['join'] .= " LEFT JOIN {$wpdb->term_taxonomy} tt ON tr.term_taxonomy_id = tt.term_taxonomy_id";
//         $clauses['where'] .= " AND tt.taxonomy = 'product_cat'";
        
//         $clauses['orderby'] = "{$case_conditions}, {$wpdb->posts}.menu_order ASC, {$wpdb->posts}.post_title ASC";
//     }
    
//     return $clauses;
// }

// Функция для получения приоритетных категорий
// function get_priority_categories() {
//     // Замените ID категорий на нужные вам
//     return [
//         16, // Арматура
//         24, // Труба круглая
//         21, // Труба профильная
//         36, // Швеллер
//     ];
// }



// // Функция для получения приоритетных категорий
// function get_priority_categories() {
//     // Укажите ID категорий в нужном порядке
//     return [
//         15 => 1, // Металлопрокат - приоритет 1
//         22 => 2, // Трубы - приоритет 2
//         18 => 3, // Арматура - приоритет 3
//         12 => 4, // Листовой металл - приоритет 4
//         // Добавьте другие категории: ID => приоритет
//     ];
// }


// Исправленная функция приоритетной сортировки
function custom_priority_orderby($clauses, $query) {
    global $wpdb;
    
    // Проверяем, что это запрос товаров
    if (is_admin() || !$query->is_main_query() || !isset($query->query_vars['post_type']) || $query->query_vars['post_type'] !== 'product') {
        return $clauses;
    }
    
    // Получаем приоритетные категории
    $priority_categories = get_priority_categories();
    
    if (!empty($priority_categories)) {
        // Создаем подзапрос для определения приоритета каждого товара
        $priority_conditions = "CASE ";
        
        foreach ($priority_categories as $cat_id => $priority) {
            $priority_conditions .= "WHEN EXISTS (
                SELECT 1 
                FROM {$wpdb->term_relationships} AS tr
                INNER JOIN {$wpdb->term_taxonomy} AS tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
                WHERE tr.object_id = {$wpdb->posts}.ID
                AND tt.term_id = {$cat_id}
                AND tt.taxonomy = 'product_cat'
            ) THEN {$priority} ";
        }
        
        $priority_conditions .= "ELSE 999 END";
        
        // Добавляем поле приоритета в SELECT
        $clauses['fields'] .= ", ({$priority_conditions}) as product_priority";
        
        // Убираем старый ORDERBY и добавляем новый
        $clauses['orderby'] = "product_priority ASC, {$wpdb->posts}.menu_order ASC, {$wpdb->posts}.post_title ASC";
        
        // Убираем GROUP BY если он есть, он может мешать сортировке
        if (strpos($clauses['groupby'], $wpdb->posts . '.ID') !== false) {
            $clauses['groupby'] = "{$wpdb->posts}.ID";
        }
    }
    
    return $clauses;
}

// Альтернативный, более надежный вариант
function custom_priority_orderby_v2($clauses, $query) {
    global $wpdb;
    
    if (is_admin() || !$query->is_main_query() || !isset($query->query_vars['post_type']) || $query->query_vars['post_type'] !== 'product') {
        return $clauses;
    }
    
    $priority_categories = get_priority_categories();
    
    if (!empty($priority_categories)) {
        // Создаем LEFT JOIN для каждой приоритетной категории
        $join_counter = 1;
        $case_parts = [];
        
        foreach ($priority_categories as $cat_id => $priority) {
            $alias = "pc{$join_counter}";
            
            // Добавляем JOIN для категории
            $clauses['join'] .= " LEFT JOIN (
                SELECT tr.object_id 
                FROM {$wpdb->term_relationships} tr
                INNER JOIN {$wpdb->term_taxonomy} tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
                WHERE tt.term_id = {$cat_id}
                AND tt.taxonomy = 'product_cat'
                GROUP BY tr.object_id
            ) AS {$alias} ON {$wpdb->posts}.ID = {$alias}.object_id";
            
            // Добавляем условие в CASE
            $case_parts[] = "WHEN {$alias}.object_id IS NOT NULL THEN {$priority}";
            
            $join_counter++;
        }
        
        // Собираем CASE выражение
        $case_expression = "CASE " . implode(' ', $case_parts) . " ELSE 999 END";
        
        // Добавляем в SELECT
        $clauses['fields'] .= ", {$case_expression} as product_priority";
        
        // Обновляем ORDER BY
        $clauses['orderby'] = "product_priority ASC, {$wpdb->posts}.menu_order ASC, {$wpdb->posts}.post_title ASC";
    }
    
    return $clauses;
}

// Самый простой и надежный вариант
function custom_priority_orderby_simple($clauses, $query) {
    global $wpdb;
    
    if (is_admin() || !$query->is_main_query() || !isset($query->query_vars['post_type']) || $query->query_vars['post_type'] !== 'product') {
        return $clauses;
    }
    
    $priority_categories = get_priority_categories();
    
    if (!empty($priority_categories)) {
        // Получаем ID категорий в порядке приоритета
        $cat_ids = array_keys($priority_categories);
        $cat_ids_string = implode(',', array_map('intval', $cat_ids));
        
        // Подзапрос для получения минимального приоритета категории товара
        $subquery = "(
            SELECT MIN(
                CASE 
                    WHEN tt.term_id IN ({$cat_ids_string}) 
                    THEN FIND_IN_SET(tt.term_id, '{$cat_ids_string}')
                    ELSE 999 
                END
            )
            FROM {$wpdb->term_relationships} tr
            INNER JOIN {$wpdb->term_taxonomy} tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
            WHERE tr.object_id = {$wpdb->posts}.ID
            AND tt.taxonomy = 'product_cat'
        )";
        
        // Добавляем в SELECT
        $clauses['fields'] .= ", {$subquery} as category_priority";
        
        // Обновляем ORDER BY
        $clauses['orderby'] = "category_priority ASC, {$wpdb->posts}.menu_order ASC, {$wpdb->posts}.post_title ASC";
    }
    
    return $clauses;
}

// Используем самый простой вариант
function custom_priority_orderby_final($clauses, $query) {
    global $wpdb;
    
    if (is_admin() || !$query->is_main_query() || !isset($query->query_vars['post_type']) || $query->query_vars['post_type'] !== 'product') {
        return $clauses;
    }
    
    $priority_categories = get_priority_categories();
    
    if (!empty($priority_categories)) {
        // Создаем CASE выражение
        $case_parts = ["CASE"];
        
        foreach ($priority_categories as $cat_id => $priority) {
            $case_parts[] = "WHEN EXISTS (
                SELECT 1 
                FROM {$wpdb->term_relationships}
                INNER JOIN {$wpdb->term_taxonomy} ON {$wpdb->term_relationships}.term_taxonomy_id = {$wpdb->term_taxonomy}.term_taxonomy_id
                WHERE {$wpdb->term_relationships}.object_id = {$wpdb->posts}.ID
                AND {$wpdb->term_taxonomy}.term_id = {$cat_id}
                AND {$wpdb->term_taxonomy}.taxonomy = 'product_cat'
            ) THEN {$priority}";
        }
        
        $case_parts[] = "ELSE 999 END";
        $case_expression = implode(' ', $case_parts);
        
        // Добавляем поле для сортировки
        $clauses['fields'] .= ", {$case_expression} as sort_priority";
        
        // Убираем лишние JOIN если они есть
        if (empty($clauses['join'])) {
            // Добавляем минимальный JOIN для работы подзапроса
            $clauses['join'] = " LEFT JOIN {$wpdb->term_relationships} ON {$wpdb->posts}.ID = {$wpdb->term_relationships}.object_id";
            $clauses['join'] .= " LEFT JOIN {$wpdb->term_taxonomy} ON {$wpdb->term_relationships}.term_taxonomy_id = {$wpdb->term_taxonomy}.term_taxonomy_id";
            $clauses['where'] .= " AND {$wpdb->term_taxonomy}.taxonomy = 'product_cat'";
        }
        
        // Обновляем сортировку
        $clauses['orderby'] = "sort_priority ASC, {$wpdb->posts}.menu_order ASC, {$wpdb->posts}.post_title ASC";
        
        // Группируем по ID поста чтобы избежать дубликатов
        $clauses['groupby'] = "{$wpdb->posts}.ID";
    }
    
    return $clauses;
}

// Функция для получения приоритетных категорий (улучшенная)
function get_priority_categories() {
    // Определяем ID категорий и их приоритет (чем меньше число, тем выше приоритет)
    $categories = [
        16 => 1, // Металлопрокат - высший приоритет
        24 => 2, // Трубы
        21 => 3, // Арматура
        36 => 4, // Листовой металл
        // Добавьте другие категории
    ];
    
    // Проверяем существование категорий
    $valid_categories = [];
    foreach ($categories as $cat_id => $priority) {
        $term = get_term($cat_id, 'product_cat');
        if ($term && !is_wp_error($term)) {
            $valid_categories[$cat_id] = $priority;
        }
    }
    
    return $valid_categories;
}

// Основная функция для сортировки по умолчанию
function custom_default_product_sorting($query) {
    // Только для фронтенда и главного запроса товаров
    if (is_admin() || !$query->is_main_query() || !isset($query->query_vars['post_type']) || $query->query_vars['post_type'] !== 'product') {
        return;
    }
    
    // Проверяем параметр сортировки
    $current_sort = isset($_GET['sort']) ? $_GET['sort'] : 'default';
    
    // Если выбрана сортировка по умолчанию И это главная страница магазина
    if ($current_sort === 'default' && is_shop()) {
        // Добавляем фильтр для приоритетной сортировки
        add_filter('posts_clauses', 'custom_priority_orderby_final', 10, 2);
        
        // Устанавливаем базовые параметры
        $query->set('orderby', 'menu_order title');
        $query->set('order', 'ASC');
        $query->set('posts_per_page', 12);
    }
    
    // Для других типов сортировки или страниц категорий - стандартная обработка
    if ($current_sort !== 'default') {
        switch($current_sort) {
            case 'price-asc':
                $query->set('meta_key', '_price');
                $query->set('orderby', 'meta_value_num title');
                $query->set('order', 'ASC');
                break;
            case 'price-desc':
                $query->set('meta_key', '_price');
                $query->set('orderby', 'meta_value_num title');
                $query->set('order', 'DESC');
                break;
            case 'rating-desc':
                $query->set('meta_key', '_wc_average_rating');
                $query->set('orderby', 'meta_value_num title');
                $query->set('order', 'DESC');
                break;
            case 'name-asc':
                $query->set('orderby', 'title');
                $query->set('order', 'ASC');
                break;
            case 'name-desc':
                $query->set('orderby', 'title');
                $query->set('order', 'DESC');
                break;
        }
    }
}
add_action('pre_get_posts', 'custom_default_product_sorting', 20);

// Удаляем фильтр после выполнения запроса
function remove_priority_sorting_filter() {
    remove_filter('posts_clauses', 'custom_priority_orderby_final', 10);
}
add_action('wp', 'remove_priority_sorting_filter');

// AJAX обработчик (обновленный)
add_action('wp_ajax_load_more_products', 'load_more_products_handler');
add_action('wp_ajax_nopriv_load_more_products', 'load_more_products_handler');

function load_more_products_handler() {
    $page = intval($_POST['page']);
    $posts_per_page = intval($_POST['posts_per_page']) ?: 12;
    $sort = isset($_POST['sort']) ? sanitize_text_field($_POST['sort']) : 'default';
    $category_id = isset($_POST['category']) && !empty($_POST['category']) ? intval($_POST['category']) : 0;
    
    $args = [
        'post_type' => 'product',
        'posts_per_page' => $posts_per_page,
        'post_status' => 'publish',
        'paged' => $page,
        'ignore_sticky_posts' => 1,
    ];
    
    // Если передан ID категории
    if ($category_id > 0) {
        $args['tax_query'] = [
            [
                'taxonomy' => 'product_cat',
                'field' => 'id',
                'terms' => $category_id,
            ]
        ];
    }
    
    // Применяем сортировку
    if ($sort === 'default' && $category_id === 0) {
        // Для главной страницы с сортировкой по умолчанию
        add_filter('posts_clauses', 'custom_priority_orderby_final', 10, 2);
        $args['orderby'] = 'menu_order title';
        $args['order'] = 'ASC';
    } else {
        // Для других случаев
        switch($sort) {
            case 'price-asc':
                $args['meta_key'] = '_price';
                $args['orderby'] = 'meta_value_num title';
                $args['order'] = 'ASC';
                break;
            case 'price-desc':
                $args['meta_key'] = '_price';
                $args['orderby'] = 'meta_value_num title';
                $args['order'] = 'DESC';
                break;
            case 'rating-desc':
                $args['meta_key'] = '_wc_average_rating';
                $args['orderby'] = 'meta_value_num title';
                $args['order'] = 'DESC';
                break;
            case 'name-asc':
                $args['orderby'] = 'title';
                $args['order'] = 'ASC';
                break;
            case 'name-desc':
                $args['orderby'] = 'title';
                $args['order'] = 'DESC';
                break;
            default:
                $args['orderby'] = 'menu_order title';
                $args['order'] = 'ASC';
                break;
        }
    }
    
    $products = new WP_Query($args);
    
    ob_start();
    
    if ($products->have_posts()) {
        while ($products->have_posts()) {
            $products->the_post();
            wc_get_template_part('content', 'product');
        }
        wp_reset_postdata();
    }
    
    $html = ob_get_clean();
    
    // Удаляем фильтр
    remove_filter('posts_clauses', 'custom_priority_orderby_final', 10);
    
    wp_send_json_success([
        'html' => $html,
        'max_pages' => $products->max_num_pages,
        'current_page' => $page
    ]);
}

// Функция для отладки
function debug_product_sorting() {
    if (is_shop() && (!isset($_GET['sort']) || $_GET['sort'] === 'default')) {
        echo '<div style="background: #f0f0f0; padding: 10px; margin: 10px 0;">';
        echo '<h3>Debug: Priority Categories</h3>';
        
        $priority_categories = get_priority_categories();
        echo '<p>Priority categories found: ' . count($priority_categories) . '</p>';
        
        foreach ($priority_categories as $cat_id => $priority) {
            $term = get_term($cat_id, 'product_cat');
            if ($term) {
                echo '<p>ID: ' . $cat_id . ' - Name: ' . $term->name . ' - Priority: ' . $priority . '</p>';
            }
        }
        
        // Показываем текущий запрос
        global $wp_query;
        echo '<p>Query vars: ' . print_r($wp_query->query_vars, true) . '</p>';
        echo '</div>';
    }
}
add_action('woocommerce_before_shop_loop', 'debug_product_sorting');


/**
 * Кастомизация полей оформления заказа
 */
add_filter('woocommerce_checkout_fields', 'custom_checkout_fields');

function custom_checkout_fields($fields) {
    // Убираем все ненужные поля
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_state']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_city']); // если не нужно
    unset($fields['billing']['billing_last_name']);
    
    // Настраиваем оставшиеся поля
    $fields['billing']['billing_first_name']['label'] = 'ФИО';
    $fields['billing']['billing_first_name']['placeholder'] = 'ФИО*';
    $fields['billing']['billing_first_name']['required'] = true;
    $fields['billing']['billing_first_name']['priority'] = 10;
    
    $fields['billing']['billing_phone']['label'] = 'Телефон';
    $fields['billing']['billing_phone']['placeholder'] = 'Телефон*';
    $fields['billing']['billing_phone']['required'] = true;
    $fields['billing']['billing_phone']['priority'] = 20;
    
    $fields['billing']['billing_email']['label'] = 'Email';
    $fields['billing']['billing_email']['placeholder'] = 'Email*';
    $fields['billing']['billing_email']['required'] = true;
    $fields['billing']['billing_email']['priority'] = 30;
    
    $fields['billing']['billing_address_1']['label'] = 'Адрес доставки';
    $fields['billing']['billing_address_1']['placeholder'] = 'Адрес доставки*';
    $fields['billing']['billing_address_1']['required'] = true;
    $fields['billing']['billing_address_1']['priority'] = 40;
    
    // Настраиваем поле комментария
    $fields['order']['order_comments']['label'] = 'Комментарий к заказу';
    $fields['order']['order_comments']['placeholder'] = 'Комментарий к заказу';
    $fields['order']['order_comments']['priority'] = 50;
    
    return $fields;
}

/**
 * Отключаем создание аккаунта при оформлении заказа
 */
add_filter('woocommerce_checkout_registration_enabled', '__return_false');

/**
 * Разрешаем оформление заказа без регистрации
 */
add_filter('woocommerce_checkout_registration_required', '__return_false');

/**
 * Отключаем обязательную регистрацию для оформления заказа
 */
add_filter('woocommerce_checkout_registration_required', '__return_false');

/**
 * Изменяем текст кнопки оформления заказа
 */
add_filter('woocommerce_order_button_text', 'custom_order_button_text');

function custom_order_button_text() {
    return 'Отправить заявку';
}

/**
 * Добавляем текст о политике конфиденциальности перед кнопкой заказа
 */
add_action('woocommerce_review_order_before_submit', 'add_privacy_policy_text');

function add_privacy_policy_text() {
    echo '<div class="checkout__policy" style="margin-bottom: 20px; font-size: 14px; color: #666;">';
    echo 'Нажимая «Отправить», вы принимаете условия <a href="' . get_privacy_policy_url() . '" target="_blank">Политики конфиденциальности</a> и даете ваше согласие на обработку персональных данных';
    echo '</div>';
}

/**
 * Переопределяем шаблон оформления заказа
 */
function custom_checkout_template_include($template) {
    if (is_checkout() && !is_wc_endpoint_url('order-received')) {
        $custom_checkout = get_stylesheet_directory() . '/woocommerce/checkout/custom-checkout.php';
        if (file_exists($custom_checkout)) {
            return $custom_checkout;
        }
    }
    return $template;
}
add_filter('template_include', 'custom_checkout_template_include', 99);

/**
 * Убираем табы логина/регистрации со страницы оформления заказа
 */
remove_action('woocommerce_before_checkout_form', 'woocommerce_checkout_login_form', 10);
remove_action('woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10);

/**
 * Отключаем проверку на наличие аккаунта при оформлении заказа
 */
add_filter('woocommerce_checkout_registration_required', '__return_false');

/**
 * Убираем опцию создания аккаунта из формы
 */
add_filter('woocommerce_create_account_default_checked', '__return_false');

/**
 * Переопределяем шаблон страницы "Спасибо"
 */
function custom_thankyou_template_include($template) {
    if (is_wc_endpoint_url('order-received')) {
        $custom_thankyou = get_stylesheet_directory() . '/woocommerce/checkout/thankyou.php';
        if (file_exists($custom_thankyou)) {
            return $custom_thankyou;
        }
    }
    return $template;
}
add_filter('template_include', 'custom_thankyou_template_include', 99);

/**
 * Отправляем email администратору при создании заказа
 */
add_action('woocommerce_checkout_order_processed', 'send_admin_order_email', 10, 3);

function send_admin_order_email($order_id, $posted_data, $order) {
    // WooCommerce автоматически отправляет email при создании заказа
    // Эта функция нужна для дополнительной кастомизации
    
    // Можно добавить дополнительные получателей
    $admin_email = get_option('admin_email');
    $subject = 'Новая заявка #' . $order_id;
    
    // Дополнительная логика если нужно
}


/**
 * Отключаем валидацию ненужных полей
 */
add_filter('woocommerce_checkout_posted_data', 'simplify_checkout_data');

function simplify_checkout_data($data) {
    // Делаем необязательными некоторые поля
    $optional_fields = array('billing_last_name', 'billing_company', 'billing_country', 'billing_state', 'billing_postcode', 'billing_city');
    
    foreach ($optional_fields as $field) {
        if (isset($data[$field]) && empty($data[$field])) {
            unset($data[$field]);
        }
    }
    
    return $data;
}

/**
 * Полностью отключаем платежную систему
 */
add_filter('woocommerce_cart_needs_payment', '__return_false');
add_filter('woocommerce_order_needs_payment', '__return_false');

/**
 * Убираем все методы оплаты
 */
add_filter('woocommerce_available_payment_gateways', 'remove_all_payment_methods');

function remove_all_payment_methods($gateways) {
    return array(); // Возвращаем пустой массив
}

/**
 * Создаем простой обработчик заказа без платежа
 */
add_action('woocommerce_checkout_process', 'process_order_without_payment');

function process_order_without_payment() {
    // Убеждаемся, что метод оплаты установлен
    if (!isset($_POST['payment_method'])) {
        $_POST['payment_method'] = 'custom_request';
    }
}

/**
 * Создаем виртуальный метод оплаты
 */
add_filter('woocommerce_payment_gateways', 'add_request_payment_gateway');

function add_request_payment_gateway($gateways) {
    $gateways[] = 'WC_Request_Payment_Gateway';
    return $gateways;
}

class WC_Request_Payment_Gateway extends WC_Payment_Gateway {
    
    public function __construct() {
        $this->id = 'request_payment';
        $this->method_title = 'Заявка';
        $this->method_description = 'Заявка без онлайн-оплаты';
        $this->has_fields = false;
        
        $this->init_form_fields();
        $this->init_settings();
        
        $this->title = $this->get_option('title');
        $this->description = $this->get_option('description');
        $this->enabled = $this->get_option('enabled');
        
        add_action('woocommerce_update_options_payment_gateways_' . $this->id, array($this, 'process_admin_options'));
    }
    
    public function init_form_fields() {
        $this->form_fields = array(
            'enabled' => array(
                'title'   => 'Включить',
                'type'    => 'checkbox',
                'label'   => 'Включить метод "Заявка"',
                'default' => 'yes'
            ),
            'title' => array(
                'title'       => 'Название',
                'type'        => 'text',
                'description' => 'Название метода, которое видит пользователь',
                'default'     => 'Заявка',
                'desc_tip'    => true,
            ),
            'description' => array(
                'title'       => 'Описание',
                'type'        => 'textarea',
                'description' => 'Описание метода оплаты, которое видит пользователь',
                'default'     => 'Мы свяжемся с вами для подтверждения заказа',
                'desc_tip'    => true,
            ),
        );
    }
    
    public function process_payment($order_id) {
        $order = wc_get_order($order_id);
        
        // Устанавливаем статус "В обработке"
        $order->update_status('processing', 'Заявка успешно отправлена');
        
        // Очищаем корзину
        WC()->cart->empty_cart();
        
        // Возвращаем успешный редирект
        return array(
            'result'   => 'success',
            'redirect' => $this->get_return_url($order)
        );
    }
    
    public function is_available() {
        return $this->enabled === 'yes';
    }
}



/**
 * Изменяем текст ошибки для полей оформления заказа
 */
add_filter('woocommerce_checkout_fields', 'customize_checkout_field_labels_errors');

function customize_checkout_field_labels_errors($fields) {
    // Убираем "Выставление счёта" из названий полей и ошибок
    foreach ($fields['billing'] as $key => &$field) {
        switch ($key) {
            case 'billing_first_name':
                $field['label'] = 'ФИО';
                // Изменяем текст ошибки
                add_filter('woocommerce_checkout_required_field_notice', function($notice, $field_label) use ($field) {
                    if ($field_label === $field['label']) {
                        return 'Поле "ФИО" является обязательным.';
                    }
                    return $notice;
                }, 10, 2);
                break;
                
            case 'billing_phone':
                $field['label'] = 'Телефон';
                add_filter('woocommerce_checkout_required_field_notice', function($notice, $field_label) use ($field) {
                    if ($field_label === $field['label']) {
                        return 'Поле "Телефон" является обязательным.';
                    }
                    return $notice;
                }, 10, 2);
                break;
                
            case 'billing_email':
                $field['label'] = 'Email';
                add_filter('woocommerce_checkout_required_field_notice', function($notice, $field_label) use ($field) {
                    if ($field_label === $field['label']) {
                        return 'Поле "Email" является обязательным.';
                    }
                    return $notice;
                }, 10, 2);
                break;
                
            case 'billing_address_1':
                $field['label'] = 'Адрес доставки';
                add_filter('woocommerce_checkout_required_field_notice', function($notice, $field_label) use ($field) {
                    if ($field_label === $field['label']) {
                        return 'Поле "Адрес доставки" является обязательным.';
                    }
                    return $notice;
                }, 10, 2);
                break;
        }
    }
    
    return $fields;
}

/**
 * Убираем "Выставление счёта" из всех сообщений об ошибках
 */
add_filter('woocommerce_checkout_required_field_notice', 'remove_billing_from_error_messages', 10, 2);

function remove_billing_from_error_messages($notice, $field_label) {
    // Убираем "Выставление счёта" из всех сообщений об ошибках
    $notice = str_replace('Выставление счёта', 'Поле', $notice);
    $notice = str_replace('Оплата', 'Поле', $notice);
    $notice = str_replace('Поле ', '', $notice); // Убираем лишнее "Поле"
    
    // Делаем сообщения более понятными
    if (strpos($notice, 'является обязательным полем') !== false) {
        $field_name = str_replace(' является обязательным полем.', '', $notice);
        $notice = 'Поле "' . trim($field_name) . '" является обязательным.';
    }
    
    return $notice;
}

/**
 * Глобально убираем "Выставление счёта" из всех текстов WooCommerce
 */
add_filter('gettext', 'remove_billing_text', 20, 3);

function remove_billing_text($translated_text, $text, $domain) {
    if ($domain === 'woocommerce') {
        // Заменяем "Выставление счёта" на пустую строку или "Поле"
        $translated_text = str_replace('Выставление счёта', '', $translated_text);
        $translated_text = str_replace('Оплата', '', $translated_text);
        $translated_text = str_replace('Billing', '', $translated_text);
        
        // Исправляем остатки
        $translated_text = preg_replace('/\s+/', ' ', $translated_text); // Убираем двойные пробелы
        $translated_text = trim($translated_text);
        
        // Если текст начинается с лишнего пробела или знака препинания
        if (strpos($translated_text, ' ') === 0) {
            $translated_text = substr($translated_text, 1);
        }
        
        // Если осталось " является обязательным полем", добавляем "Поле"
        if (strpos($translated_text, 'является обязательным полем') !== false) {
            $translated_text = 'Поле ' . $translated_text;
        }
    }
    
    return $translated_text;
}

// AJAX обработчик для получения количества товаров в корзине
add_action('wp_ajax_get_cart_contents_count', 'get_cart_contents_count_ajax');
add_action('wp_ajax_nopriv_get_cart_contents_count', 'get_cart_contents_count_ajax');
function get_cart_contents_count_ajax() {
    echo WC()->cart->get_cart_contents_count();
    wp_die();
}