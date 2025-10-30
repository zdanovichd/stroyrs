<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head() ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css">

    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/swiper-bundle.min.js" defer></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/script.js" defer></script>
</head>

<body>
    <?php get_header() ?>
    <main>
        <section class="breadcrumbs" aria-label="Навигация — хлебные крошки">
            <nav aria-label="breadcrumb">
                <?php woocommerce_breadcrumb(); ?>
            </nav>
        </section>

        <section class="catalog">
            <div class="catalog__wrapper">
                <div class="catalog__header">
                    <div class="catalog__title">
                        <h1>
                            <?php echo woocommerce_page_title(); ?>
                        </h1>
                        <p>
                            <?php
                            if (is_product_category()) {
                                // Для страницы категории
                                $current_category = get_queried_object();
                                echo '[' . $current_category->count . ']';
                            } elseif (is_shop()) {
                                // Для главной страницы магазина
                                $product_count = wp_count_posts('product');
                                echo '[' . $product_count->publish . ']';
                            } else {
                                // Для других страниц
                                echo '';
                            }
                            ?>
                        </p>
                    </div>
                    <div class="catalog-sort" data-sort>
                        <button class="catalog-sort__toggle" aria-haspopup="listbox"
                            aria-labelledby="catalog-sort-label catalog-sort-current" aria-expanded="false"
                            type="button">
                            <span class="catalog-sort__current" id="catalog-sort-current">Сначала дешевле</span>
                            <svg class="catalog-sort__icon" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                                <path d="M16 18V6M16 6L20 10.125M16 6L12 10.125" stroke="#E8364B" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M8 6V18M8 18L12 13.875M8 18L4 13.875" stroke="#E8364B" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                        </button>

                        <ul class="catalog-sort__menu" role="listbox" aria-labelledby="catalog-sort-label"
                            tabindex="-1">
                            <li class="catalog-sort__option catalog-sort__option--selected" role="option"
                                aria-selected="true" data-value="price-asc">
                                Сначала дешевле</li>
                            <li class="catalog-sort__option" role="option" aria-selected="false"
                                data-value="price-desc">Сначала дороже</li>
                            <li class="catalog-sort__option" role="option" aria-selected="false"
                                data-value="rating-desc">Рейтинг по убыванию</li>

                            <li class="catalog-sort__option" role="option" aria-selected="false" data-value="name-asc">
                                От А до Я</li>
                            <li class="catalog-sort__option" role="option" aria-selected="false" data-value="name-desc">
                                От Я до А</li>
                        </ul>
                    </div>

                </div>
                <!-- <div class="tag-cloud">
                    <p class="tag-cloud__description">Часто ищут:</p>
                    <div class="tag-cloud__inner">
                        <a href="#" class="tag-cloud__item">Кликабельный тег</a>
                        <a href="#" class="tag-cloud__item">Тег</a>
                        <a href="#" class="tag-cloud__item">Кликабельный тег</a>
                        <a href="#" class="tag-cloud__item">Кликабельный тег</a>
                        <a href="#" class="tag-cloud__item">Кликабельный тег</a>
                        <a href="#" class="tag-cloud__item">Тег</a>
                        <a href="#" class="tag-cloud__item">Тег</a>
                    </div>
                </div> -->
                <div class="catalog__content">

                    <!-- ФИЛЬТРЫ -->
                    <aside class="catalog-sidebar" aria-label="Фильтры каталога">

                        <!-- Категории -->
                        <!-- Категории -->
                        <nav class="sidebar-categories" aria-label="Категории товаров">
                            <ul class="categories__list">
                                <?php
                                // Получаем все категории товаров
                                $product_categories = get_terms(array(
                                    'taxonomy'   => 'product_cat',
                                    'hide_empty' => true,
                                    'parent'     => 0, // Только родительские категории
                                ));

                                if (!empty($product_categories) && !is_wp_error($product_categories)) {
                                    $counter = 1;

                                    foreach ($product_categories as $category) {
                                        // Проверяем есть ли подкатегории
                                        $subcategories = get_terms(array(
                                            'taxonomy'   => 'product_cat',
                                            'hide_empty' => true,
                                            'parent'     => $category->term_id,
                                        ));

                                        $has_children = !empty($subcategories) && !is_wp_error($subcategories);
                                ?>

                                        <li class="categories__item <?php echo $has_children ? 'has-children' : ''; ?>">
                                            <div class="categories__header">
                                                <a href="<?php echo esc_url(get_term_link($category)); ?>" class="categories__link">
                                                    <?php echo esc_html($category->name); ?>
                                                </a>

                                                <?php if ($has_children) : ?>
                                                    <button class="categories__toggle" aria-expanded="false"
                                                        aria-controls="subcat-<?php echo $counter; ?>" aria-label="Показать подкатегории">
                                                        <svg class="categories__icon" viewBox="0 0 10 7" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M9 1.5L5 5.5L1 1.5" stroke="inherit" stroke-width="1.5"
                                                                stroke-linecap="round" />
                                                        </svg>
                                                    </button>
                                                <?php endif; ?>
                                            </div>

                                            <?php if ($has_children) : ?>
                                                <ul class="categories__sublist" id="subcat-<?php echo $counter++; ?>">
                                                    <?php foreach ($subcategories as $subcategory) : ?>
                                                        <li>
                                                            <a href="<?php echo esc_url(get_term_link($subcategory)); ?>">
                                                                <?php echo esc_html($subcategory->name); ?>
                                                            </a>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php endif; ?>
                                        </li>

                                <?php }
                                } else {
                                    echo '<li>Категории не найдены</li>';
                                }
                                ?>
                            </ul>
                        </nav>


                        <!-- Фильтры -->
                        <div class="sidebar-filters">
                            <div class="filters__header">
                                <h2 class="filters__title">Фильтры</h2>
                                <button class="filters__clear" disabled>Очистить</button>
                            </div>
                            <div class="filter-groups">
                                <div class="filter-group">
                                    <button class="filter-group__toggle" aria-expanded="false"
                                        aria-controls="first-filters">
                                        Название фильтра
                                        <span class="filter-group__icon">
                                            <svg viewBox="0 0 10 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9 1.5L5 5.5L1 1.5" stroke="inherit" stroke-width="1.5"
                                                    stroke-linecap="round" />
                                            </svg>
                                        </span>
                                    </button>
                                    <div class="filter-group__options" id="first-filters">
                                        <label class="custom-checkbox">
                                            <input type="checkbox" name="first" value="vibor-1">
                                            <span class="custom-checkbox__box">
                                                <svg class="custom-checkbox__icon" viewBox="0 0 14 9" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M13.3657 0.222465C13.6781 0.519093 13.6781 1.00001 13.3657 1.29664L5.93137 8.35507C5.30654 8.94835 4.29347 8.94827 3.66864 8.35507L0.234312 5.09439C-0.0781041 4.79778 -0.0781041 4.31683 0.234312 4.02023C0.546737 3.72362 1.05327 3.72362 1.36569 4.02023L4.80001 7.28091L12.2343 0.222465C12.5467 -0.074155 13.0533 -0.074155 13.3657 0.222465Z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                            Выбор 1
                                        </label>
                                        <label class="custom-checkbox">
                                            <input type="checkbox" name="first" value="vibor-2">
                                            <span class="custom-checkbox__box">
                                                <svg class="custom-checkbox__icon" viewBox="0 0 14 9" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M13.3657 0.222465C13.6781 0.519093 13.6781 1.00001 13.3657 1.29664L5.93137 8.35507C5.30654 8.94835 4.29347 8.94827 3.66864 8.35507L0.234312 5.09439C-0.0781041 4.79778 -0.0781041 4.31683 0.234312 4.02023C0.546737 3.72362 1.05327 3.72362 1.36569 4.02023L4.80001 7.28091L12.2343 0.222465C12.5467 -0.074155 13.0533 -0.074155 13.3657 0.222465Z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                            Выбор 2
                                        </label>
                                        <label class="custom-checkbox">
                                            <input type="checkbox" name="first" value="vibor-3">
                                            <span class="custom-checkbox__box">
                                                <svg class="custom-checkbox__icon" viewBox="0 0 14 9" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M13.3657 0.222465C13.6781 0.519093 13.6781 1.00001 13.3657 1.29664L5.93137 8.35507C5.30654 8.94835 4.29347 8.94827 3.66864 8.35507L0.234312 5.09439C-0.0781041 4.79778 -0.0781041 4.31683 0.234312 4.02023C0.546737 3.72362 1.05327 3.72362 1.36569 4.02023L4.80001 7.28091L12.2343 0.222465C12.5467 -0.074155 13.0533 -0.074155 13.3657 0.222465Z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                            Выбор 3
                                        </label>
                                    </div>
                                </div>

                                <div class="filter-group">
                                    <button class="filter-group__toggle" aria-expanded="false"
                                        aria-controls="second-filters">
                                        Название фильтра
                                        <span class="filter-group__icon">
                                            <svg viewBox="0 0 10 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9 1.5L5 5.5L1 1.5" stroke="inherit" stroke-width="1.5"
                                                    stroke-linecap="round" />
                                            </svg>
                                        </span>
                                    </button>
                                    <div class="filter-group__options" id="second-filters">
                                        <label class="custom-checkbox">
                                            <input type="checkbox" name="second" value="vibor-3">
                                            <span class="custom-checkbox__box">
                                                <svg class="custom-checkbox__icon" viewBox="0 0 14 9" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M13.3657 0.222465C13.6781 0.519093 13.6781 1.00001 13.3657 1.29664L5.93137 8.35507C5.30654 8.94835 4.29347 8.94827 3.66864 8.35507L0.234312 5.09439C-0.0781041 4.79778 -0.0781041 4.31683 0.234312 4.02023C0.546737 3.72362 1.05327 3.72362 1.36569 4.02023L4.80001 7.28091L12.2343 0.222465C12.5467 -0.074155 13.0533 -0.074155 13.3657 0.222465Z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                            Выбор 3
                                        </label>
                                        <label class="custom-checkbox">
                                            <input type="checkbox" name="second" value="vibor-3">
                                            <span class="custom-checkbox__box">
                                                <svg class="custom-checkbox__icon" viewBox="0 0 14 9" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M13.3657 0.222465C13.6781 0.519093 13.6781 1.00001 13.3657 1.29664L5.93137 8.35507C5.30654 8.94835 4.29347 8.94827 3.66864 8.35507L0.234312 5.09439C-0.0781041 4.79778 -0.0781041 4.31683 0.234312 4.02023C0.546737 3.72362 1.05327 3.72362 1.36569 4.02023L4.80001 7.28091L12.2343 0.222465C12.5467 -0.074155 13.0533 -0.074155 13.3657 0.222465Z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                            Выбор 3
                                        </label>
                                        <label class="custom-checkbox">
                                            <input type="checkbox" name="second" value="vibor-3">
                                            <span class="custom-checkbox__box">
                                                <svg class="custom-checkbox__icon" viewBox="0 0 14 9" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M13.3657 0.222465C13.6781 0.519093 13.6781 1.00001 13.3657 1.29664L5.93137 8.35507C5.30654 8.94835 4.29347 8.94827 3.66864 8.35507L0.234312 5.09439C-0.0781041 4.79778 -0.0781041 4.31683 0.234312 4.02023C0.546737 3.72362 1.05327 3.72362 1.36569 4.02023L4.80001 7.28091L12.2343 0.222465C12.5467 -0.074155 13.0533 -0.074155 13.3657 0.222465Z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                            Выбор 3
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </aside>

                    <!-- СПИСОК ТОВАРОВ -->
                    <section class="catalog-grid" aria-labelledby="catalog-grid-title">
                        <!-- <div class="catalog-grid__items"> -->

                        <?php
                        // Определяем параметры запроса в зависимости от контекста
                        // if (is_product_category()) {
                        //     // Для страницы категории
                        //     $current_category = get_queried_object();
                        //     $args = array(
                        //         'post_type' => 'product',
                        //         'posts_per_page' => 12,
                        //         'post_status' => 'publish',
                        //         'tax_query' => array(
                        //             array(
                        //                 'taxonomy' => 'product_cat',
                        //                 'field' => 'id',
                        //                 'terms' => $current_category->term_id,
                        //             )
                        //         )
                        //     );
                        // } elseif (is_shop()) {
                        //     // Для главной страницы магазина
                        //     $args = array(
                        //         'post_type' => 'product',
                        //         'posts_per_page' => 12,
                        //         'post_status' => 'publish'
                        //     );
                        // } else {
                        //     // Для других случаев (поиск, теги и т.д.)
                        //     global $wp_query;
                        //     $args = $wp_query->query_vars;
                        //     $args['posts_per_page'] = 12;
                        // }

                        // $products = new WP_Query($args);

                        // if ($products->have_posts()) {
                        //     while ($products->have_posts()) {
                        //         $products->the_post();
                        //         wc_get_template_part('content', 'product');
                        //     }
                        //     wp_reset_postdata();
                        // } else {
                        //     echo __('No products found');
                        // }
                        ?>

                        <!-- другие карточки -->
                        <!-- </div> -->
                        <?php
                        // Определяем параметры запроса в зависимости от контекста
                        $current_category = null;

                        if (is_product_category()) {
                            // Для страницы категории
                            $current_category = get_queried_object();
                            $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => 12,
                                'post_status' => 'publish',
                                'paged' => 1,
                            );

                            if ($current_category) {
                                $args['tax_query'] = array(
                                    array(
                                        'taxonomy' => 'product_cat',
                                        'field' => 'id',
                                        'terms' => $current_category->term_id,
                                    )
                                );
                            }
                        } elseif (is_shop()) {
                            // Для главной страницы магазина
                            $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => 12,
                                'post_status' => 'publish',
                                'paged' => 1,
                            );
                        } else {
                            // Для других случаев
                            $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => 12,
                                'post_status' => 'publish',
                                'paged' => 1,
                            );
                        }

                        $products = new WP_Query($args);

                        if ($products->have_posts()) {
                            echo '<div class="catalog-grid__items" id="products-container">';
                            while ($products->have_posts()) {
                                $products->the_post();
                                wc_get_template_part('content', 'product');
                            }
                            echo '</div>';

                            // Добавляем данные для бесконечной прокрутки
                            if ($products->max_num_pages > 1) {
                                $category_id = '';
                                if ($current_category && is_product_category()) {
                                    $category_id = $current_category->term_id;
                                }

                                echo '<div id="infinite-scroll-data" 
                  data-page="2" 
                  data-max-pages="' . $products->max_num_pages . '" 
                  data-category="' . $category_id . '"
                  data-ajax-url="' . admin_url('admin-ajax.php') . '"></div>';
                                echo '<div id="infinite-scroll-loader" style="display: none; text-align: center; padding: 20px;">
                <div>Загрузка товаров...</div>
              </div>';
                            }

                            wp_reset_postdata();
                        } else {
                            echo __('No products found');
                        }
                        ?>
                        <!-- <div class="tag-cloud">
                            <div class="tag-cloud__inner">
                                <a href="#" class="tag-cloud__item">Кликабельный тег</a>
                                <a href="#" class="tag-cloud__item">Тег</a>
                                <a href="#" class="tag-cloud__item">Кликабельный тег</a>
                                <a href="#" class="tag-cloud__item">Кликабельный тег</a>
                                <a href="#" class="tag-cloud__item">Кликабельный тег</a>
                                <a href="#" class="tag-cloud__item">Тег</a>
                                <a href="#" class="tag-cloud__item">Тег</a>
                            </div>
                        </div> -->
                    </section>

                </div>

            </div>
        </section>

        <section class="popular-products popular-products-catalog">
            <div class="popular-products__header">
                <h2 class="popular-products__title">
                    <span class="popular-products__title-accent">Популярные</span> товары
                </h2>
                <div class="popular-products__controls">
                    <button class="popular-products__button popular-products__button--prev"
                        aria-label="Предыдущий слайд">
                        <svg viewBox="0 0 23 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M21.5 6.5C22.0523 6.5 22.5 6.94772 22.5 7.5C22.5 8.05228 22.0523 8.5 21.5 8.5V7.5V6.5ZM0.792892 8.20711C0.402369 7.81658 0.402369 7.18342 0.792892 6.79289L7.15685 0.428932C7.54738 0.0384078 8.18054 0.0384078 8.57107 0.428932C8.96159 0.819457 8.96159 1.45262 8.57107 1.84315L2.91421 7.5L8.57107 13.1569C8.96159 13.5474 8.96159 14.1805 8.57107 14.5711C8.18054 14.9616 7.54738 14.9616 7.15685 14.5711L0.792892 8.20711ZM21.5 7.5V8.5H1.5V7.5V6.5H21.5V7.5Z"
                                fill="#F9F9F9" />
                        </svg>
                    </button>
                    <button class="popular-products__button popular-products__button--next"
                        aria-label="Следующий слайд">
                        <svg viewBox="0 0 23 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1.5 6.5C0.947715 6.5 0.5 6.94772 0.5 7.5C0.5 8.05228 0.947715 8.5 1.5 8.5V7.5V6.5ZM22.2071 8.20711C22.5976 7.81658 22.5976 7.18342 22.2071 6.79289L15.8431 0.428932C15.4526 0.0384078 14.8195 0.0384078 14.4289 0.428932C14.0384 0.819457 14.0384 1.45262 14.4289 1.84315L20.0858 7.5L14.4289 13.1569C14.0384 13.5474 14.0384 14.1805 14.4289 14.5711C14.8195 14.9616 15.4526 14.9616 15.8431 14.5711L22.2071 8.20711ZM1.5 7.5V8.5H21.5V7.5V6.5H1.5V7.5Z"
                                fill="#F9F9F9" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="popular-products__slider swiper">
                <div class="swiper-wrapper">
                    <!-- Пример одного слайда -->
                    <article class="swiper-slide product-card product-card-catalog">
                        <img src="https://placehold.co/320x283" alt="Арматура" class="product-card__image" />
                        <div class="product-card__content">
                            <a href="#">
                                <h3 class="product-card__name">Арматура</h3>
                            </a>
                            <div class="product-card__availability">
                                <p>В наличии</p>
                            </div>
                            <div class="product-card__price product-card__price-sale">
                                <span class="product-card__sale">
                                    <span class="product-card__sale-label">
                                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M9.11088 1.44033C8.81866 1.68936 8.67253 1.8139 8.51647 1.91849C8.15875 2.15825 7.75701 2.32465 7.33452 2.40807C7.15021 2.44446 6.95884 2.45973 6.5761 2.49027C5.61444 2.56702 5.1336 2.60538 4.73245 2.74708C3.80461 3.0748 3.0748 3.80461 2.74708 4.73245C2.60538 5.1336 2.56702 5.61444 2.49027 6.5761C2.45973 6.95884 2.44446 7.15021 2.40807 7.33452C2.32465 7.75701 2.15825 8.15875 1.91849 8.51647C1.8139 8.67253 1.68937 8.81864 1.44033 9.11088C0.814599 9.84516 0.501723 10.2122 0.318267 10.5961C-0.106089 11.484 -0.106089 12.516 0.318267 13.4039C0.501735 13.7878 0.814599 14.1548 1.44033 14.8891C1.68934 15.1813 1.8139 15.3275 1.91849 15.4835C2.15825 15.8412 2.32465 16.243 2.40807 16.6655C2.44446 16.8498 2.45973 17.0412 2.49027 17.4239C2.56702 18.3856 2.60538 18.8664 2.74708 19.2676C3.0748 20.1954 3.80461 20.9252 4.73245 21.253C5.1336 21.3946 5.61444 21.433 6.5761 21.5098C6.95884 21.5402 7.15021 21.5556 7.33452 21.592C7.75701 21.6754 8.15875 21.8418 8.51647 22.0816C8.67253 22.1861 8.81864 22.3106 9.11088 22.5596C9.84516 23.1854 10.2122 23.4983 10.5961 23.6818C11.484 24.1061 12.516 24.1061 13.4039 23.6818C13.7878 23.4983 14.1548 23.1854 14.8891 22.5596C15.1813 22.3106 15.3275 22.1861 15.4835 22.0816C15.8412 21.8418 16.243 21.6754 16.6655 21.592C16.8498 21.5556 17.0412 21.5402 17.4239 21.5098C18.3856 21.433 18.8664 21.3946 19.2676 21.253C20.1954 20.9252 20.9252 20.1954 21.253 19.2676C21.3946 18.8664 21.433 18.3856 21.5098 17.4239C21.5402 17.0412 21.5556 16.8498 21.592 16.6655C21.6754 16.243 21.8418 15.8412 22.0816 15.4835C22.1861 15.3275 22.3106 15.1813 22.5596 14.8891C23.1854 14.1548 23.4983 13.7878 23.6818 13.4039C24.1061 12.516 24.1061 11.484 23.6818 10.5961C23.4983 10.2122 23.1854 9.84516 22.5596 9.11088C22.3106 8.81864 22.1861 8.67253 22.0816 8.51647C21.8418 8.15875 21.6754 7.75701 21.592 7.33452C21.5556 7.15021 21.5402 6.95884 21.5098 6.5761C21.433 5.61444 21.3946 5.1336 21.253 4.73245C20.9252 3.80461 20.1954 3.0748 19.2676 2.74708C18.8664 2.60538 18.3856 2.56702 17.4239 2.49027C17.0412 2.45973 16.8498 2.44446 16.6655 2.40807C16.243 2.32465 15.8412 2.15825 15.4835 1.91849C15.3275 1.8139 15.1813 1.68937 14.8891 1.44033C14.1548 0.814599 13.7878 0.501735 13.4039 0.318267C12.516 -0.106089 11.484 -0.106089 10.5961 0.318267C10.2122 0.501723 9.84516 0.814599 9.11088 1.44033ZM16.5971 7.40351C16.9784 7.78491 16.9784 8.40328 16.5971 8.78467L8.78404 16.5977C8.40264 16.9792 7.78427 16.9792 7.40287 16.5977C7.02148 16.2163 7.02148 15.598 7.40287 15.2166L15.2159 7.40351C15.5974 7.02211 16.2157 7.02211 16.5971 7.40351ZM16.5576 15.2561C16.5576 15.9752 15.9746 16.5582 15.2555 16.5582C14.5362 16.5582 13.9532 15.9752 13.9532 15.2561C13.9532 14.5369 14.5362 13.9538 15.2555 13.9538C15.9746 13.9538 16.5576 14.5369 16.5576 15.2561ZM8.74454 10.0474C9.46372 10.0474 10.0468 9.46435 10.0468 8.74518C10.0468 8.02601 9.46372 7.443 8.74454 7.443C8.02537 7.443 7.44237 8.02601 7.44237 8.74518C7.44237 9.46435 8.02537 10.0474 8.74454 10.0474Z"
                                                fill="#E8364B" />
                                        </svg>
                                    </span>
                                    <span class="product-card__sale-value">10 000 ₽</span>
                                </span>
                                <span class="product-card__price-value">10 000 ₽</span>
                            </div>
                            <div class="product-card__buttons">
                                <button class="product-card__button">Добавить в корзину</button>
                                <button class="product-card__favorite">
                                    <svg viewBox="0 0 27 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M13.25 3.46424C10.7508 0.57516 6.57469 -0.317692 3.44338 2.32784C0.312054 4.97337 -0.128793 9.39654 2.33025 12.5255C4.37478 15.1268 10.5622 20.6136 12.5901 22.3894C12.817 22.5881 12.9304 22.6874 13.0628 22.7264C13.1782 22.7605 13.3046 22.7605 13.4202 22.7264C13.5525 22.6874 13.6658 22.5881 13.8928 22.3894C15.9207 20.6136 22.1081 15.1268 24.1527 12.5255C26.6117 9.39654 26.2246 4.94554 23.0395 2.32784C19.8543 -0.289863 15.7492 0.57516 13.25 3.46424Z"
                                            fill="white" stroke="black" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </article>

                    <article class="swiper-slide product-card product-card-catalog">
                        <img src="https://placehold.co/320x283" alt="Арматура" class="product-card__image" />
                        <div class="product-card__content">
                            <a href="#">
                                <h3 class="product-card__name">Арматура</h3>
                            </a>
                            <div class="product-card__availability">
                                <p>В наличии</p>
                            </div>
                            <div class="product-card__price product-card__price-sale">
                                <span class="product-card__sale">
                                    <span class="product-card__sale-label">
                                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M9.11088 1.44033C8.81866 1.68936 8.67253 1.8139 8.51647 1.91849C8.15875 2.15825 7.75701 2.32465 7.33452 2.40807C7.15021 2.44446 6.95884 2.45973 6.5761 2.49027C5.61444 2.56702 5.1336 2.60538 4.73245 2.74708C3.80461 3.0748 3.0748 3.80461 2.74708 4.73245C2.60538 5.1336 2.56702 5.61444 2.49027 6.5761C2.45973 6.95884 2.44446 7.15021 2.40807 7.33452C2.32465 7.75701 2.15825 8.15875 1.91849 8.51647C1.8139 8.67253 1.68937 8.81864 1.44033 9.11088C0.814599 9.84516 0.501723 10.2122 0.318267 10.5961C-0.106089 11.484 -0.106089 12.516 0.318267 13.4039C0.501735 13.7878 0.814599 14.1548 1.44033 14.8891C1.68934 15.1813 1.8139 15.3275 1.91849 15.4835C2.15825 15.8412 2.32465 16.243 2.40807 16.6655C2.44446 16.8498 2.45973 17.0412 2.49027 17.4239C2.56702 18.3856 2.60538 18.8664 2.74708 19.2676C3.0748 20.1954 3.80461 20.9252 4.73245 21.253C5.1336 21.3946 5.61444 21.433 6.5761 21.5098C6.95884 21.5402 7.15021 21.5556 7.33452 21.592C7.75701 21.6754 8.15875 21.8418 8.51647 22.0816C8.67253 22.1861 8.81864 22.3106 9.11088 22.5596C9.84516 23.1854 10.2122 23.4983 10.5961 23.6818C11.484 24.1061 12.516 24.1061 13.4039 23.6818C13.7878 23.4983 14.1548 23.1854 14.8891 22.5596C15.1813 22.3106 15.3275 22.1861 15.4835 22.0816C15.8412 21.8418 16.243 21.6754 16.6655 21.592C16.8498 21.5556 17.0412 21.5402 17.4239 21.5098C18.3856 21.433 18.8664 21.3946 19.2676 21.253C20.1954 20.9252 20.9252 20.1954 21.253 19.2676C21.3946 18.8664 21.433 18.3856 21.5098 17.4239C21.5402 17.0412 21.5556 16.8498 21.592 16.6655C21.6754 16.243 21.8418 15.8412 22.0816 15.4835C22.1861 15.3275 22.3106 15.1813 22.5596 14.8891C23.1854 14.1548 23.4983 13.7878 23.6818 13.4039C24.1061 12.516 24.1061 11.484 23.6818 10.5961C23.4983 10.2122 23.1854 9.84516 22.5596 9.11088C22.3106 8.81864 22.1861 8.67253 22.0816 8.51647C21.8418 8.15875 21.6754 7.75701 21.592 7.33452C21.5556 7.15021 21.5402 6.95884 21.5098 6.5761C21.433 5.61444 21.3946 5.1336 21.253 4.73245C20.9252 3.80461 20.1954 3.0748 19.2676 2.74708C18.8664 2.60538 18.3856 2.56702 17.4239 2.49027C17.0412 2.45973 16.8498 2.44446 16.6655 2.40807C16.243 2.32465 15.8412 2.15825 15.4835 1.91849C15.3275 1.8139 15.1813 1.68937 14.8891 1.44033C14.1548 0.814599 13.7878 0.501735 13.4039 0.318267C12.516 -0.106089 11.484 -0.106089 10.5961 0.318267C10.2122 0.501723 9.84516 0.814599 9.11088 1.44033ZM16.5971 7.40351C16.9784 7.78491 16.9784 8.40328 16.5971 8.78467L8.78404 16.5977C8.40264 16.9792 7.78427 16.9792 7.40287 16.5977C7.02148 16.2163 7.02148 15.598 7.40287 15.2166L15.2159 7.40351C15.5974 7.02211 16.2157 7.02211 16.5971 7.40351ZM16.5576 15.2561C16.5576 15.9752 15.9746 16.5582 15.2555 16.5582C14.5362 16.5582 13.9532 15.9752 13.9532 15.2561C13.9532 14.5369 14.5362 13.9538 15.2555 13.9538C15.9746 13.9538 16.5576 14.5369 16.5576 15.2561ZM8.74454 10.0474C9.46372 10.0474 10.0468 9.46435 10.0468 8.74518C10.0468 8.02601 9.46372 7.443 8.74454 7.443C8.02537 7.443 7.44237 8.02601 7.44237 8.74518C7.44237 9.46435 8.02537 10.0474 8.74454 10.0474Z"
                                                fill="#E8364B" />
                                        </svg>
                                    </span>
                                    <span class="product-card__sale-value">10 000 ₽</span>
                                </span>
                                <span class="product-card__price-value">10 000 ₽</span>
                            </div>
                            <div class="product-card__buttons">
                                <button class="product-card__button">Добавить в корзину</button>
                                <button class="product-card__favorite">
                                    <svg viewBox="0 0 27 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M13.25 3.46424C10.7508 0.57516 6.57469 -0.317692 3.44338 2.32784C0.312054 4.97337 -0.128793 9.39654 2.33025 12.5255C4.37478 15.1268 10.5622 20.6136 12.5901 22.3894C12.817 22.5881 12.9304 22.6874 13.0628 22.7264C13.1782 22.7605 13.3046 22.7605 13.4202 22.7264C13.5525 22.6874 13.6658 22.5881 13.8928 22.3894C15.9207 20.6136 22.1081 15.1268 24.1527 12.5255C26.6117 9.39654 26.2246 4.94554 23.0395 2.32784C19.8543 -0.289863 15.7492 0.57516 13.25 3.46424Z"
                                            fill="white" stroke="black" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </article>

                    <article class="swiper-slide product-card product-card-catalog">
                        <img src="https://placehold.co/320x283" alt="Арматура" class="product-card__image" />
                        <div class="product-card__content">
                            <a href="#">
                                <h3 class="product-card__name">Арматура</h3>
                            </a>
                            <div class="product-card__availability">
                                <p>В наличии</p>
                            </div>
                            <div class="product-card__price product-card__price-sale">
                                <span class="product-card__sale">
                                    <span class="product-card__sale-label">
                                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M9.11088 1.44033C8.81866 1.68936 8.67253 1.8139 8.51647 1.91849C8.15875 2.15825 7.75701 2.32465 7.33452 2.40807C7.15021 2.44446 6.95884 2.45973 6.5761 2.49027C5.61444 2.56702 5.1336 2.60538 4.73245 2.74708C3.80461 3.0748 3.0748 3.80461 2.74708 4.73245C2.60538 5.1336 2.56702 5.61444 2.49027 6.5761C2.45973 6.95884 2.44446 7.15021 2.40807 7.33452C2.32465 7.75701 2.15825 8.15875 1.91849 8.51647C1.8139 8.67253 1.68937 8.81864 1.44033 9.11088C0.814599 9.84516 0.501723 10.2122 0.318267 10.5961C-0.106089 11.484 -0.106089 12.516 0.318267 13.4039C0.501735 13.7878 0.814599 14.1548 1.44033 14.8891C1.68934 15.1813 1.8139 15.3275 1.91849 15.4835C2.15825 15.8412 2.32465 16.243 2.40807 16.6655C2.44446 16.8498 2.45973 17.0412 2.49027 17.4239C2.56702 18.3856 2.60538 18.8664 2.74708 19.2676C3.0748 20.1954 3.80461 20.9252 4.73245 21.253C5.1336 21.3946 5.61444 21.433 6.5761 21.5098C6.95884 21.5402 7.15021 21.5556 7.33452 21.592C7.75701 21.6754 8.15875 21.8418 8.51647 22.0816C8.67253 22.1861 8.81864 22.3106 9.11088 22.5596C9.84516 23.1854 10.2122 23.4983 10.5961 23.6818C11.484 24.1061 12.516 24.1061 13.4039 23.6818C13.7878 23.4983 14.1548 23.1854 14.8891 22.5596C15.1813 22.3106 15.3275 22.1861 15.4835 22.0816C15.8412 21.8418 16.243 21.6754 16.6655 21.592C16.8498 21.5556 17.0412 21.5402 17.4239 21.5098C18.3856 21.433 18.8664 21.3946 19.2676 21.253C20.1954 20.9252 20.9252 20.1954 21.253 19.2676C21.3946 18.8664 21.433 18.3856 21.5098 17.4239C21.5402 17.0412 21.5556 16.8498 21.592 16.6655C21.6754 16.243 21.8418 15.8412 22.0816 15.4835C22.1861 15.3275 22.3106 15.1813 22.5596 14.8891C23.1854 14.1548 23.4983 13.7878 23.6818 13.4039C24.1061 12.516 24.1061 11.484 23.6818 10.5961C23.4983 10.2122 23.1854 9.84516 22.5596 9.11088C22.3106 8.81864 22.1861 8.67253 22.0816 8.51647C21.8418 8.15875 21.6754 7.75701 21.592 7.33452C21.5556 7.15021 21.5402 6.95884 21.5098 6.5761C21.433 5.61444 21.3946 5.1336 21.253 4.73245C20.9252 3.80461 20.1954 3.0748 19.2676 2.74708C18.8664 2.60538 18.3856 2.56702 17.4239 2.49027C17.0412 2.45973 16.8498 2.44446 16.6655 2.40807C16.243 2.32465 15.8412 2.15825 15.4835 1.91849C15.3275 1.8139 15.1813 1.68937 14.8891 1.44033C14.1548 0.814599 13.7878 0.501735 13.4039 0.318267C12.516 -0.106089 11.484 -0.106089 10.5961 0.318267C10.2122 0.501723 9.84516 0.814599 9.11088 1.44033ZM16.5971 7.40351C16.9784 7.78491 16.9784 8.40328 16.5971 8.78467L8.78404 16.5977C8.40264 16.9792 7.78427 16.9792 7.40287 16.5977C7.02148 16.2163 7.02148 15.598 7.40287 15.2166L15.2159 7.40351C15.5974 7.02211 16.2157 7.02211 16.5971 7.40351ZM16.5576 15.2561C16.5576 15.9752 15.9746 16.5582 15.2555 16.5582C14.5362 16.5582 13.9532 15.9752 13.9532 15.2561C13.9532 14.5369 14.5362 13.9538 15.2555 13.9538C15.9746 13.9538 16.5576 14.5369 16.5576 15.2561ZM8.74454 10.0474C9.46372 10.0474 10.0468 9.46435 10.0468 8.74518C10.0468 8.02601 9.46372 7.443 8.74454 7.443C8.02537 7.443 7.44237 8.02601 7.44237 8.74518C7.44237 9.46435 8.02537 10.0474 8.74454 10.0474Z"
                                                fill="#E8364B" />
                                        </svg>
                                    </span>
                                    <span class="product-card__sale-value">10 000 ₽</span>
                                </span>
                                <span class="product-card__price-value">10 000 ₽</span>
                            </div>
                            <div class="product-card__buttons">
                                <button class="product-card__button">Добавить в корзину</button>
                                <button class="product-card__favorite">
                                    <svg viewBox="0 0 27 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M13.25 3.46424C10.7508 0.57516 6.57469 -0.317692 3.44338 2.32784C0.312054 4.97337 -0.128793 9.39654 2.33025 12.5255C4.37478 15.1268 10.5622 20.6136 12.5901 22.3894C12.817 22.5881 12.9304 22.6874 13.0628 22.7264C13.1782 22.7605 13.3046 22.7605 13.4202 22.7264C13.5525 22.6874 13.6658 22.5881 13.8928 22.3894C15.9207 20.6136 22.1081 15.1268 24.1527 12.5255C26.6117 9.39654 26.2246 4.94554 23.0395 2.32784C19.8543 -0.289863 15.7492 0.57516 13.25 3.46424Z"
                                            fill="white" stroke="black" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </article>

                    <article class="swiper-slide product-card product-card-catalog">
                        <img src="https://placehold.co/320x283" alt="Арматура" class="product-card__image" />
                        <div class="product-card__content">
                            <a href="#">
                                <h3 class="product-card__name">Арматура</h3>
                            </a>
                            <div class="product-card__availability">
                                <p>В наличии</p>
                            </div>
                            <div class="product-card__price product-card__price-sale">
                                <span class="product-card__sale">
                                    <span class="product-card__sale-label">
                                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M9.11088 1.44033C8.81866 1.68936 8.67253 1.8139 8.51647 1.91849C8.15875 2.15825 7.75701 2.32465 7.33452 2.40807C7.15021 2.44446 6.95884 2.45973 6.5761 2.49027C5.61444 2.56702 5.1336 2.60538 4.73245 2.74708C3.80461 3.0748 3.0748 3.80461 2.74708 4.73245C2.60538 5.1336 2.56702 5.61444 2.49027 6.5761C2.45973 6.95884 2.44446 7.15021 2.40807 7.33452C2.32465 7.75701 2.15825 8.15875 1.91849 8.51647C1.8139 8.67253 1.68937 8.81864 1.44033 9.11088C0.814599 9.84516 0.501723 10.2122 0.318267 10.5961C-0.106089 11.484 -0.106089 12.516 0.318267 13.4039C0.501735 13.7878 0.814599 14.1548 1.44033 14.8891C1.68934 15.1813 1.8139 15.3275 1.91849 15.4835C2.15825 15.8412 2.32465 16.243 2.40807 16.6655C2.44446 16.8498 2.45973 17.0412 2.49027 17.4239C2.56702 18.3856 2.60538 18.8664 2.74708 19.2676C3.0748 20.1954 3.80461 20.9252 4.73245 21.253C5.1336 21.3946 5.61444 21.433 6.5761 21.5098C6.95884 21.5402 7.15021 21.5556 7.33452 21.592C7.75701 21.6754 8.15875 21.8418 8.51647 22.0816C8.67253 22.1861 8.81864 22.3106 9.11088 22.5596C9.84516 23.1854 10.2122 23.4983 10.5961 23.6818C11.484 24.1061 12.516 24.1061 13.4039 23.6818C13.7878 23.4983 14.1548 23.1854 14.8891 22.5596C15.1813 22.3106 15.3275 22.1861 15.4835 22.0816C15.8412 21.8418 16.243 21.6754 16.6655 21.592C16.8498 21.5556 17.0412 21.5402 17.4239 21.5098C18.3856 21.433 18.8664 21.3946 19.2676 21.253C20.1954 20.9252 20.9252 20.1954 21.253 19.2676C21.3946 18.8664 21.433 18.3856 21.5098 17.4239C21.5402 17.0412 21.5556 16.8498 21.592 16.6655C21.6754 16.243 21.8418 15.8412 22.0816 15.4835C22.1861 15.3275 22.3106 15.1813 22.5596 14.8891C23.1854 14.1548 23.4983 13.7878 23.6818 13.4039C24.1061 12.516 24.1061 11.484 23.6818 10.5961C23.4983 10.2122 23.1854 9.84516 22.5596 9.11088C22.3106 8.81864 22.1861 8.67253 22.0816 8.51647C21.8418 8.15875 21.6754 7.75701 21.592 7.33452C21.5556 7.15021 21.5402 6.95884 21.5098 6.5761C21.433 5.61444 21.3946 5.1336 21.253 4.73245C20.9252 3.80461 20.1954 3.0748 19.2676 2.74708C18.8664 2.60538 18.3856 2.56702 17.4239 2.49027C17.0412 2.45973 16.8498 2.44446 16.6655 2.40807C16.243 2.32465 15.8412 2.15825 15.4835 1.91849C15.3275 1.8139 15.1813 1.68937 14.8891 1.44033C14.1548 0.814599 13.7878 0.501735 13.4039 0.318267C12.516 -0.106089 11.484 -0.106089 10.5961 0.318267C10.2122 0.501723 9.84516 0.814599 9.11088 1.44033ZM16.5971 7.40351C16.9784 7.78491 16.9784 8.40328 16.5971 8.78467L8.78404 16.5977C8.40264 16.9792 7.78427 16.9792 7.40287 16.5977C7.02148 16.2163 7.02148 15.598 7.40287 15.2166L15.2159 7.40351C15.5974 7.02211 16.2157 7.02211 16.5971 7.40351ZM16.5576 15.2561C16.5576 15.9752 15.9746 16.5582 15.2555 16.5582C14.5362 16.5582 13.9532 15.9752 13.9532 15.2561C13.9532 14.5369 14.5362 13.9538 15.2555 13.9538C15.9746 13.9538 16.5576 14.5369 16.5576 15.2561ZM8.74454 10.0474C9.46372 10.0474 10.0468 9.46435 10.0468 8.74518C10.0468 8.02601 9.46372 7.443 8.74454 7.443C8.02537 7.443 7.44237 8.02601 7.44237 8.74518C7.44237 9.46435 8.02537 10.0474 8.74454 10.0474Z"
                                                fill="#E8364B" />
                                        </svg>
                                    </span>
                                    <span class="product-card__sale-value">10 000 ₽</span>
                                </span>
                                <span class="product-card__price-value">10 000 ₽</span>
                            </div>
                            <div class="product-card__buttons">
                                <button class="product-card__button">Добавить в корзину</button>
                                <button class="product-card__favorite">
                                    <svg viewBox="0 0 27 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M13.25 3.46424C10.7508 0.57516 6.57469 -0.317692 3.44338 2.32784C0.312054 4.97337 -0.128793 9.39654 2.33025 12.5255C4.37478 15.1268 10.5622 20.6136 12.5901 22.3894C12.817 22.5881 12.9304 22.6874 13.0628 22.7264C13.1782 22.7605 13.3046 22.7605 13.4202 22.7264C13.5525 22.6874 13.6658 22.5881 13.8928 22.3894C15.9207 20.6136 22.1081 15.1268 24.1527 12.5255C26.6117 9.39654 26.2246 4.94554 23.0395 2.32784C19.8543 -0.289863 15.7492 0.57516 13.25 3.46424Z"
                                            fill="white" stroke="black" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </article>

                    <article class="swiper-slide product-card product-card-catalog">
                        <img src="https://placehold.co/320x283" alt="Арматура" class="product-card__image" />
                        <div class="product-card__content">
                            <a href="#">
                                <h3 class="product-card__name">Арматура</h3>
                            </a>
                            <div class="product-card__availability">
                                <p>В наличии</p>
                            </div>
                            <div class="product-card__price product-card__price-sale">
                                <span class="product-card__sale">
                                    <span class="product-card__sale-label">
                                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M9.11088 1.44033C8.81866 1.68936 8.67253 1.8139 8.51647 1.91849C8.15875 2.15825 7.75701 2.32465 7.33452 2.40807C7.15021 2.44446 6.95884 2.45973 6.5761 2.49027C5.61444 2.56702 5.1336 2.60538 4.73245 2.74708C3.80461 3.0748 3.0748 3.80461 2.74708 4.73245C2.60538 5.1336 2.56702 5.61444 2.49027 6.5761C2.45973 6.95884 2.44446 7.15021 2.40807 7.33452C2.32465 7.75701 2.15825 8.15875 1.91849 8.51647C1.8139 8.67253 1.68937 8.81864 1.44033 9.11088C0.814599 9.84516 0.501723 10.2122 0.318267 10.5961C-0.106089 11.484 -0.106089 12.516 0.318267 13.4039C0.501735 13.7878 0.814599 14.1548 1.44033 14.8891C1.68934 15.1813 1.8139 15.3275 1.91849 15.4835C2.15825 15.8412 2.32465 16.243 2.40807 16.6655C2.44446 16.8498 2.45973 17.0412 2.49027 17.4239C2.56702 18.3856 2.60538 18.8664 2.74708 19.2676C3.0748 20.1954 3.80461 20.9252 4.73245 21.253C5.1336 21.3946 5.61444 21.433 6.5761 21.5098C6.95884 21.5402 7.15021 21.5556 7.33452 21.592C7.75701 21.6754 8.15875 21.8418 8.51647 22.0816C8.67253 22.1861 8.81864 22.3106 9.11088 22.5596C9.84516 23.1854 10.2122 23.4983 10.5961 23.6818C11.484 24.1061 12.516 24.1061 13.4039 23.6818C13.7878 23.4983 14.1548 23.1854 14.8891 22.5596C15.1813 22.3106 15.3275 22.1861 15.4835 22.0816C15.8412 21.8418 16.243 21.6754 16.6655 21.592C16.8498 21.5556 17.0412 21.5402 17.4239 21.5098C18.3856 21.433 18.8664 21.3946 19.2676 21.253C20.1954 20.9252 20.9252 20.1954 21.253 19.2676C21.3946 18.8664 21.433 18.3856 21.5098 17.4239C21.5402 17.0412 21.5556 16.8498 21.592 16.6655C21.6754 16.243 21.8418 15.8412 22.0816 15.4835C22.1861 15.3275 22.3106 15.1813 22.5596 14.8891C23.1854 14.1548 23.4983 13.7878 23.6818 13.4039C24.1061 12.516 24.1061 11.484 23.6818 10.5961C23.4983 10.2122 23.1854 9.84516 22.5596 9.11088C22.3106 8.81864 22.1861 8.67253 22.0816 8.51647C21.8418 8.15875 21.6754 7.75701 21.592 7.33452C21.5556 7.15021 21.5402 6.95884 21.5098 6.5761C21.433 5.61444 21.3946 5.1336 21.253 4.73245C20.9252 3.80461 20.1954 3.0748 19.2676 2.74708C18.8664 2.60538 18.3856 2.56702 17.4239 2.49027C17.0412 2.45973 16.8498 2.44446 16.6655 2.40807C16.243 2.32465 15.8412 2.15825 15.4835 1.91849C15.3275 1.8139 15.1813 1.68937 14.8891 1.44033C14.1548 0.814599 13.7878 0.501735 13.4039 0.318267C12.516 -0.106089 11.484 -0.106089 10.5961 0.318267C10.2122 0.501723 9.84516 0.814599 9.11088 1.44033ZM16.5971 7.40351C16.9784 7.78491 16.9784 8.40328 16.5971 8.78467L8.78404 16.5977C8.40264 16.9792 7.78427 16.9792 7.40287 16.5977C7.02148 16.2163 7.02148 15.598 7.40287 15.2166L15.2159 7.40351C15.5974 7.02211 16.2157 7.02211 16.5971 7.40351ZM16.5576 15.2561C16.5576 15.9752 15.9746 16.5582 15.2555 16.5582C14.5362 16.5582 13.9532 15.9752 13.9532 15.2561C13.9532 14.5369 14.5362 13.9538 15.2555 13.9538C15.9746 13.9538 16.5576 14.5369 16.5576 15.2561ZM8.74454 10.0474C9.46372 10.0474 10.0468 9.46435 10.0468 8.74518C10.0468 8.02601 9.46372 7.443 8.74454 7.443C8.02537 7.443 7.44237 8.02601 7.44237 8.74518C7.44237 9.46435 8.02537 10.0474 8.74454 10.0474Z"
                                                fill="#E8364B" />
                                        </svg>
                                    </span>
                                    <span class="product-card__sale-value">10 000 ₽</span>
                                </span>
                                <span class="product-card__price-value">10 000 ₽</span>
                            </div>
                            <div class="product-card__buttons">
                                <button class="product-card__button">Добавить в корзину</button>
                                <button class="product-card__favorite">
                                    <svg viewBox="0 0 27 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M13.25 3.46424C10.7508 0.57516 6.57469 -0.317692 3.44338 2.32784C0.312054 4.97337 -0.128793 9.39654 2.33025 12.5255C4.37478 15.1268 10.5622 20.6136 12.5901 22.3894C12.817 22.5881 12.9304 22.6874 13.0628 22.7264C13.1782 22.7605 13.3046 22.7605 13.4202 22.7264C13.5525 22.6874 13.6658 22.5881 13.8928 22.3894C15.9207 20.6136 22.1081 15.1268 24.1527 12.5255C26.6117 9.39654 26.2246 4.94554 23.0395 2.32784C19.8543 -0.289863 15.7492 0.57516 13.25 3.46424Z"
                                            fill="white" stroke="black" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </article>

                    <article class="swiper-slide product-card product-card-catalog">
                        <img src="https://placehold.co/320x283" alt="Арматура" class="product-card__image" />
                        <div class="product-card__content">
                            <a href="#">
                                <h3 class="product-card__name">Арматура</h3>
                            </a>
                            <div class="product-card__availability">
                                <p>В наличии</p>
                            </div>
                            <div class="product-card__price product-card__price-sale">
                                <span class="product-card__sale">
                                    <span class="product-card__sale-label">
                                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M9.11088 1.44033C8.81866 1.68936 8.67253 1.8139 8.51647 1.91849C8.15875 2.15825 7.75701 2.32465 7.33452 2.40807C7.15021 2.44446 6.95884 2.45973 6.5761 2.49027C5.61444 2.56702 5.1336 2.60538 4.73245 2.74708C3.80461 3.0748 3.0748 3.80461 2.74708 4.73245C2.60538 5.1336 2.56702 5.61444 2.49027 6.5761C2.45973 6.95884 2.44446 7.15021 2.40807 7.33452C2.32465 7.75701 2.15825 8.15875 1.91849 8.51647C1.8139 8.67253 1.68937 8.81864 1.44033 9.11088C0.814599 9.84516 0.501723 10.2122 0.318267 10.5961C-0.106089 11.484 -0.106089 12.516 0.318267 13.4039C0.501735 13.7878 0.814599 14.1548 1.44033 14.8891C1.68934 15.1813 1.8139 15.3275 1.91849 15.4835C2.15825 15.8412 2.32465 16.243 2.40807 16.6655C2.44446 16.8498 2.45973 17.0412 2.49027 17.4239C2.56702 18.3856 2.60538 18.8664 2.74708 19.2676C3.0748 20.1954 3.80461 20.9252 4.73245 21.253C5.1336 21.3946 5.61444 21.433 6.5761 21.5098C6.95884 21.5402 7.15021 21.5556 7.33452 21.592C7.75701 21.6754 8.15875 21.8418 8.51647 22.0816C8.67253 22.1861 8.81864 22.3106 9.11088 22.5596C9.84516 23.1854 10.2122 23.4983 10.5961 23.6818C11.484 24.1061 12.516 24.1061 13.4039 23.6818C13.7878 23.4983 14.1548 23.1854 14.8891 22.5596C15.1813 22.3106 15.3275 22.1861 15.4835 22.0816C15.8412 21.8418 16.243 21.6754 16.6655 21.592C16.8498 21.5556 17.0412 21.5402 17.4239 21.5098C18.3856 21.433 18.8664 21.3946 19.2676 21.253C20.1954 20.9252 20.9252 20.1954 21.253 19.2676C21.3946 18.8664 21.433 18.3856 21.5098 17.4239C21.5402 17.0412 21.5556 16.8498 21.592 16.6655C21.6754 16.243 21.8418 15.8412 22.0816 15.4835C22.1861 15.3275 22.3106 15.1813 22.5596 14.8891C23.1854 14.1548 23.4983 13.7878 23.6818 13.4039C24.1061 12.516 24.1061 11.484 23.6818 10.5961C23.4983 10.2122 23.1854 9.84516 22.5596 9.11088C22.3106 8.81864 22.1861 8.67253 22.0816 8.51647C21.8418 8.15875 21.6754 7.75701 21.592 7.33452C21.5556 7.15021 21.5402 6.95884 21.5098 6.5761C21.433 5.61444 21.3946 5.1336 21.253 4.73245C20.9252 3.80461 20.1954 3.0748 19.2676 2.74708C18.8664 2.60538 18.3856 2.56702 17.4239 2.49027C17.0412 2.45973 16.8498 2.44446 16.6655 2.40807C16.243 2.32465 15.8412 2.15825 15.4835 1.91849C15.3275 1.8139 15.1813 1.68937 14.8891 1.44033C14.1548 0.814599 13.7878 0.501735 13.4039 0.318267C12.516 -0.106089 11.484 -0.106089 10.5961 0.318267C10.2122 0.501723 9.84516 0.814599 9.11088 1.44033ZM16.5971 7.40351C16.9784 7.78491 16.9784 8.40328 16.5971 8.78467L8.78404 16.5977C8.40264 16.9792 7.78427 16.9792 7.40287 16.5977C7.02148 16.2163 7.02148 15.598 7.40287 15.2166L15.2159 7.40351C15.5974 7.02211 16.2157 7.02211 16.5971 7.40351ZM16.5576 15.2561C16.5576 15.9752 15.9746 16.5582 15.2555 16.5582C14.5362 16.5582 13.9532 15.9752 13.9532 15.2561C13.9532 14.5369 14.5362 13.9538 15.2555 13.9538C15.9746 13.9538 16.5576 14.5369 16.5576 15.2561ZM8.74454 10.0474C9.46372 10.0474 10.0468 9.46435 10.0468 8.74518C10.0468 8.02601 9.46372 7.443 8.74454 7.443C8.02537 7.443 7.44237 8.02601 7.44237 8.74518C7.44237 9.46435 8.02537 10.0474 8.74454 10.0474Z"
                                                fill="#E8364B" />
                                        </svg>
                                    </span>
                                    <span class="product-card__sale-value">10 000 ₽</span>
                                </span>
                                <span class="product-card__price-value">10 000 ₽</span>
                            </div>
                            <div class="product-card__buttons">
                                <button class="product-card__button">Добавить в корзину</button>
                                <button class="product-card__favorite">
                                    <svg viewBox="0 0 27 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M13.25 3.46424C10.7508 0.57516 6.57469 -0.317692 3.44338 2.32784C0.312054 4.97337 -0.128793 9.39654 2.33025 12.5255C4.37478 15.1268 10.5622 20.6136 12.5901 22.3894C12.817 22.5881 12.9304 22.6874 13.0628 22.7264C13.1782 22.7605 13.3046 22.7605 13.4202 22.7264C13.5525 22.6874 13.6658 22.5881 13.8928 22.3894C15.9207 20.6136 22.1081 15.1268 24.1527 12.5255C26.6117 9.39654 26.2246 4.94554 23.0395 2.32784C19.8543 -0.289863 15.7492 0.57516 13.25 3.46424Z"
                                            fill="white" stroke="black" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </article>

                    <article class="swiper-slide product-card product-card-catalog">
                        <img src="https://placehold.co/320x283" alt="Арматура" class="product-card__image" />
                        <div class="product-card__content">
                            <a href="#">
                                <h3 class="product-card__name">Арматура</h3>
                            </a>
                            <div class="product-card__availability">
                                <p>В наличии</p>
                            </div>
                            <div class="product-card__price product-card__price-sale">
                                <span class="product-card__sale">
                                    <span class="product-card__sale-label">
                                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M9.11088 1.44033C8.81866 1.68936 8.67253 1.8139 8.51647 1.91849C8.15875 2.15825 7.75701 2.32465 7.33452 2.40807C7.15021 2.44446 6.95884 2.45973 6.5761 2.49027C5.61444 2.56702 5.1336 2.60538 4.73245 2.74708C3.80461 3.0748 3.0748 3.80461 2.74708 4.73245C2.60538 5.1336 2.56702 5.61444 2.49027 6.5761C2.45973 6.95884 2.44446 7.15021 2.40807 7.33452C2.32465 7.75701 2.15825 8.15875 1.91849 8.51647C1.8139 8.67253 1.68937 8.81864 1.44033 9.11088C0.814599 9.84516 0.501723 10.2122 0.318267 10.5961C-0.106089 11.484 -0.106089 12.516 0.318267 13.4039C0.501735 13.7878 0.814599 14.1548 1.44033 14.8891C1.68934 15.1813 1.8139 15.3275 1.91849 15.4835C2.15825 15.8412 2.32465 16.243 2.40807 16.6655C2.44446 16.8498 2.45973 17.0412 2.49027 17.4239C2.56702 18.3856 2.60538 18.8664 2.74708 19.2676C3.0748 20.1954 3.80461 20.9252 4.73245 21.253C5.1336 21.3946 5.61444 21.433 6.5761 21.5098C6.95884 21.5402 7.15021 21.5556 7.33452 21.592C7.75701 21.6754 8.15875 21.8418 8.51647 22.0816C8.67253 22.1861 8.81864 22.3106 9.11088 22.5596C9.84516 23.1854 10.2122 23.4983 10.5961 23.6818C11.484 24.1061 12.516 24.1061 13.4039 23.6818C13.7878 23.4983 14.1548 23.1854 14.8891 22.5596C15.1813 22.3106 15.3275 22.1861 15.4835 22.0816C15.8412 21.8418 16.243 21.6754 16.6655 21.592C16.8498 21.5556 17.0412 21.5402 17.4239 21.5098C18.3856 21.433 18.8664 21.3946 19.2676 21.253C20.1954 20.9252 20.9252 20.1954 21.253 19.2676C21.3946 18.8664 21.433 18.3856 21.5098 17.4239C21.5402 17.0412 21.5556 16.8498 21.592 16.6655C21.6754 16.243 21.8418 15.8412 22.0816 15.4835C22.1861 15.3275 22.3106 15.1813 22.5596 14.8891C23.1854 14.1548 23.4983 13.7878 23.6818 13.4039C24.1061 12.516 24.1061 11.484 23.6818 10.5961C23.4983 10.2122 23.1854 9.84516 22.5596 9.11088C22.3106 8.81864 22.1861 8.67253 22.0816 8.51647C21.8418 8.15875 21.6754 7.75701 21.592 7.33452C21.5556 7.15021 21.5402 6.95884 21.5098 6.5761C21.433 5.61444 21.3946 5.1336 21.253 4.73245C20.9252 3.80461 20.1954 3.0748 19.2676 2.74708C18.8664 2.60538 18.3856 2.56702 17.4239 2.49027C17.0412 2.45973 16.8498 2.44446 16.6655 2.40807C16.243 2.32465 15.8412 2.15825 15.4835 1.91849C15.3275 1.8139 15.1813 1.68937 14.8891 1.44033C14.1548 0.814599 13.7878 0.501735 13.4039 0.318267C12.516 -0.106089 11.484 -0.106089 10.5961 0.318267C10.2122 0.501723 9.84516 0.814599 9.11088 1.44033ZM16.5971 7.40351C16.9784 7.78491 16.9784 8.40328 16.5971 8.78467L8.78404 16.5977C8.40264 16.9792 7.78427 16.9792 7.40287 16.5977C7.02148 16.2163 7.02148 15.598 7.40287 15.2166L15.2159 7.40351C15.5974 7.02211 16.2157 7.02211 16.5971 7.40351ZM16.5576 15.2561C16.5576 15.9752 15.9746 16.5582 15.2555 16.5582C14.5362 16.5582 13.9532 15.9752 13.9532 15.2561C13.9532 14.5369 14.5362 13.9538 15.2555 13.9538C15.9746 13.9538 16.5576 14.5369 16.5576 15.2561ZM8.74454 10.0474C9.46372 10.0474 10.0468 9.46435 10.0468 8.74518C10.0468 8.02601 9.46372 7.443 8.74454 7.443C8.02537 7.443 7.44237 8.02601 7.44237 8.74518C7.44237 9.46435 8.02537 10.0474 8.74454 10.0474Z"
                                                fill="#E8364B" />
                                        </svg>
                                    </span>
                                    <span class="product-card__sale-value">10 000 ₽</span>
                                </span>
                                <span class="product-card__price-value">10 000 ₽</span>
                            </div>
                            <div class="product-card__buttons">
                                <button class="product-card__button">Добавить в корзину</button>
                                <button class="product-card__favorite">
                                    <svg viewBox="0 0 27 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M13.25 3.46424C10.7508 0.57516 6.57469 -0.317692 3.44338 2.32784C0.312054 4.97337 -0.128793 9.39654 2.33025 12.5255C4.37478 15.1268 10.5622 20.6136 12.5901 22.3894C12.817 22.5881 12.9304 22.6874 13.0628 22.7264C13.1782 22.7605 13.3046 22.7605 13.4202 22.7264C13.5525 22.6874 13.6658 22.5881 13.8928 22.3894C15.9207 20.6136 22.1081 15.1268 24.1527 12.5255C26.6117 9.39654 26.2246 4.94554 23.0395 2.32784C19.8543 -0.289863 15.7492 0.57516 13.25 3.46424Z"
                                            fill="white" stroke="black" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <section class="text-block">
            <div class="text-block__wrapper">
                <h2 class="text-block__title">
                    <span>Сео</span> текст
                </h2>
                <div class="text-block__content">
                    <p>
                        Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые модификации, например, юмористические вставки или слова, которые даже отдалённо не напоминают латынь.
                    </p>
                    <br>
                    <p>
                        Если вам нужен Lorem Ipsum для серьёзного проекта, вы наверняка не хотите какой-нибудь шутки, скрытой в середине абзаца. Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые модификации, например, юмористические вставки или слова, которые даже отдалённо не напоминают латынь.
                    </p>
                </div>
            </div>
        </section>

        <section class="consult">
            <div class="consult__wrapper">
                <div class="consult__image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/consult.webp" alt="Консультация специалистов">
                </div>
                <div class="consult__content">
                    <p class="consult__text">
                        Нужна помощь в подборе? Наши специалисты проконсультируют вас по любым позициям.
                    </p>
                    <form class="consult__form" action="#" method="post">
                        <div class="consult__fields">
                            <label class="consult__field">
                                <input type="text" name="name" placeholder="Имя" required>
                            </label>

                            <label class="consult__field">
                                <input type="tel" name="phone" placeholder="Телефон" required>
                            </label>

                            <label class="consult__field">
                                <input type="email" name="email" placeholder="Email" required>
                            </label>

                            <button type="submit" class="consult__button">Отправить заявку</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <section class="partners">
            <div class="partners__wrapper">
                <div class="partners__header">
                    <h2 class="partners__title">
                        Наши <span>партнеры</span>
                    </h2>
                </div>
                <div class="partners__content">
                    <div class="partner">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partners/sberbank.svg" alt="СберБанк">
                    </div>
                    <div class="partner">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partners/metserv.svg" alt="Металл Сервис">
                    </div>
                    <div class="partner">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partners/dipos.svg" alt="Дипос">
                    </div>
                    <div class="partner">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partners/evraz.svg" alt="Евраз">
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php get_footer() ?>
    <?php wp_footer() ?>
</body>

</html>