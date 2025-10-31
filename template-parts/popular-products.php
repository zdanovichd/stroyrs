<section class="popular-products">
    <div class="popular-products__header">
        <h2 class="popular-products__title">
            <?php 
                echo $args[ 'title' ]; 
            ?>
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
            <?php
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 7,
                'post_status' => 'publish',
                'meta_query' => array(
                    array(
                        'key' => '_stock_status',
                        'value' => 'instock'
                    )
                )
            );

            $products = new WP_Query($args);

            if ($products->have_posts()) :
                while ($products->have_posts()) : $products->the_post();
                    global $product;
            ?>
                    <div class="swiper-slide product-card">
                        <?php echo $product->get_image('medium', array('class' => 'product-card__image')); ?>

                        <div class="product-card__content">
                            <p class="product-card__name"><a href="<?php echo get_permalink($product->get_id()); ?>" class="product-card__link"><?php the_title(); ?></a></p>
                            <div class="product-card__price">
                                <span class="product-card__price-label">Цена:</span>
                                <span class="product-card__price-value"><?php echo $product->get_price(); ?> ₽</span>
                            </div>
                            <button class="product-card__button" data-product-id="<?php echo $product->get_id(); ?>">
                                Добавить в корзину
                            </button>
                        </div>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>Товары не найдены</p>';
            endif;
            ?>
        </div>
    </div>
</section>