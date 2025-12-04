<?php


add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}


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

    if (is_cart()) {
        $custom_cart = get_stylesheet_directory() . '/woocommerce/cart/cart.php';
        if (file_exists($custom_cart)) {
            return $custom_cart;
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
        return ['cart_tbody' => '', 'cart_totals' => ''];
    }

    // Формируем tbody
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
                <input type="checkbox" class="cart-item-checkbox" value="<?php echo esc_attr($cart_item_key); ?>" name="cart_item[]">
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

    return [
        'cart_tbody' => $cart_tbody,
        'cart_totals' => $cart_totals,
        'items_count' => WC()->cart->get_cart_contents_count()
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
function get_priority_categories() {
    // Замените ID категорий на нужные вам
    return [
        16, // Арматура
        24, // Труба круглая
        21, // Труба профильная
        36, // Швеллер
    ];
}



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

// Функция для простой приоритетной сортировки
function custom_priority_orderby($clauses, $query) {
    global $wpdb;
    
    // Проверяем, что это запрос товаров
    if (is_admin() || !$query->is_main_query() || !isset($query->query_vars['post_type']) || $query->query_vars['post_type'] !== 'product') {
        return $clauses;
    }
    
    // Получаем приоритетные категории
    $priority_categories = get_priority_categories();
    
    if (!empty($priority_categories)) {
        // Создаем условие для сортировки
        $case_conditions = "CASE ";
        
        foreach ($priority_categories as $cat_id => $priority) {
            $case_conditions .= "WHEN (
                SELECT COUNT(*) FROM {$wpdb->term_relationships} tr
                INNER JOIN {$wpdb->term_taxonomy} tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
                WHERE tr.object_id = {$wpdb->posts}.ID 
                AND tt.term_id = {$cat_id}
                AND tt.taxonomy = 'product_cat'
            ) > 0 THEN {$priority} ";
        }
        
        $case_conditions .= "ELSE 999 END"; // Все остальные получают низкий приоритет
        
        // Добавляем сортировку
        $clauses['fields'] .= ", ({$case_conditions}) as category_priority";
        $clauses['orderby'] = "category_priority ASC, {$wpdb->posts}.menu_order ASC, {$wpdb->posts}.post_title ASC";
    }
    
    return $clauses;
}

// Функция для сортировки по умолчанию (приоритетная)
function custom_default_sorting($query) {
    // Только для главного запроса товаров на фронтенде
    if (is_admin() || !$query->is_main_query() || !isset($query->query_vars['post_type']) || $query->query_vars['post_type'] !== 'product') {
        return;
    }
    
    // Только если не выбрана другая сортировка через GET параметр
    if (isset($_GET['sort']) && $_GET['sort'] !== 'default') {
        return;
    }
    
    // Для главной страницы магазина
    if (is_shop()) {
        // Добавляем фильтр для приоритетной сортировки
        add_filter('posts_clauses', 'custom_priority_orderby', 10, 2);
        
        // Устанавливаем базовую сортировку
        $query->set('orderby', 'menu_order title');
        $query->set('order', 'ASC');
    }
}
add_action('pre_get_posts', 'custom_default_sorting', 20);

// Удаляем фильтр после выполнения запроса
add_action('wp', function() {
    remove_filter('posts_clauses', 'custom_priority_orderby', 10);
});

// Обработчик AJAX для бесконечной прокрутки с поддержкой сортировки
add_action('wp_ajax_load_more_products', 'load_more_products_handler');
add_action('wp_ajax_nopriv_load_more_products', 'load_more_products_handler');

function load_more_products_handler() {
    $page = intval($_POST['page']);
    $posts_per_page = intval($_POST['posts_per_page']) ?: 12;
    $sort = isset($_POST['sort']) ? sanitize_text_field($_POST['sort']) : 'default';
    $category_id = isset($_POST['category']) && !empty($_POST['category']) ? intval($_POST['category']) : 0;
    
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => $posts_per_page,
        'post_status' => 'publish',
        'paged' => $page,
        'ignore_sticky_posts' => 1,
    );
    
    // Если передан ID категории
    if ($category_id > 0) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'id',
                'terms' => $category_id,
            )
        );
    }
    
    // Добавляем параметры сортировки
    switch($sort) {
        case 'price-asc':
            $args['meta_key'] = '_price';
            $args['orderby'] = 'meta_value_num';
            $args['order'] = 'ASC';
            break;
            
        case 'price-desc':
            $args['meta_key'] = '_price';
            $args['orderby'] = 'meta_value_num';
            $args['order'] = 'DESC';
            break;
            
        case 'rating-desc':
            $args['meta_key'] = '_wc_average_rating';
            $args['orderby'] = 'meta_value_num';
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
            
        case 'default':
        default:
            // Для главной страницы магазина используем приоритетную сортировку
            if ($category_id === 0) {
                add_filter('posts_clauses', 'custom_priority_orderby', 10, 2);
                $args['orderby'] = 'menu_order title';
                $args['order'] = 'ASC';
            } else {
                // Для категорий используем стандартную сортировку
                $args['orderby'] = 'menu_order title';
                $args['order'] = 'ASC';
            }
            break;
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
    
    // Удаляем фильтр после выполнения запроса
    remove_filter('posts_clauses', 'custom_priority_orderby', 10);
    
    wp_send_json_success(array(
        'html' => $html,
        'max_pages' => $products->max_num_pages,
        'current_page' => $page
    ));
}

// Дополнительная функция для отладки сортировки
function debug_priority_sorting($posts, $query) {
    if (!is_admin() && $query->is_main_query() && isset($query->query_vars['post_type']) && $query->query_vars['post_type'] === 'product') {
        error_log('Total products: ' . count($posts));
        foreach ($posts as $post) {
            $categories = wp_get_post_terms($post->ID, 'product_cat');
            $cat_names = array_map(function($cat) {
                return $cat->name . ' (ID: ' . $cat->term_id . ')';
            }, $categories);
            error_log('Product ' . $post->ID . ' - ' . $post->post_title . ' - Categories: ' . implode(', ', $cat_names));
        }
    }
    return $posts;
}
// add_filter('the_posts', 'debug_priority_sorting', 10, 2);
?>