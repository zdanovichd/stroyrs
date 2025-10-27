<?php

add_theme_support('woocommerce');


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

// Добавляем микроразметку для хлебных крошек
// add_filter('woocommerce_breadcrumb_main_term', 'add_breadcrumb_schema_markup');
// function add_breadcrumb_schema_markup($breadcrumb) {
//     static $position = 1;
    
//     if (isset($breadcrumb[1])) {
//         $breadcrumb[1] = str_replace(
//             '<li class="breadcrumb__item"',
//             '<li class="breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"',
//             $breadcrumb[1]
//         );
        
//         // Добавляем мета-теги с позицией
//         $breadcrumb[1] = str_replace(
//             '</a>',
//             '</a><meta itemprop="position" content="' . $position . '" />',
//             $breadcrumb[1]
//         );
        
//         $position++;
//     }
    
//     return $breadcrumb;
// }


// Обработчик AJAX для бесконечной прокрутки
add_action('wp_ajax_load_more_products', 'load_more_products_handler');
add_action('wp_ajax_nopriv_load_more_products', 'load_more_products_handler');

function load_more_products_handler() {
    // Логируем полученные данные
    error_log('AJAX Request: ' . print_r($_POST, true));
    
    $page = intval($_POST['page']);
    $posts_per_page = intval($_POST['posts_per_page']) ?: 12;
    
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => $posts_per_page,
        'post_status' => 'publish',
        'paged' => $page,
    );
    
    // Если передан ID категории
    if (isset($_POST['category']) && !empty($_POST['category'])) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'id',
                'terms' => intval($_POST['category']),
            )
        );
    }
    
    error_log('WP_Query args: ' . print_r($args, true));
    
    $products = new WP_Query($args);
    
    error_log('Found posts: ' . $products->found_posts);
    error_log('Max pages: ' . $products->max_num_pages);
    
    ob_start();
    
    if ($products->have_posts()) {
        while ($products->have_posts()) {
            $products->the_post();
            wc_get_template_part('content', 'product');
        }
        wp_reset_postdata();
    }
    
    $html = ob_get_clean();
    
    wp_send_json_success(array(
        'html' => $html,
        'max_pages' => $products->max_num_pages
    ));
}

// Добавьте в functions.php
function wrap_first_word($title) {
    $words = explode(' ', $title, 2);
    if (count($words) > 1) {
        return '<span>' . $words[0] . '</span> ' . $words[1];
    }
    return '<span>' . $title . '</span>';
}