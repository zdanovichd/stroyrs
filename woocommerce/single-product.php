<?php
defined('ABSPATH') || exit;

?>

<?php
global $product;
if (!is_a($product, 'WC_Product')) {
    $product = wc_get_product(get_the_ID());
}
?>
<!DOCTYPE html>
<html>

<?php
get_template_part('template-parts/head');
?>

<body class="product-id-<?php echo $product->id; ?> <?php echo $product->is_type('simple') ? 'product-simple' : ''; ?>">
    <?php get_header() ?>
    <main>
        <section class="breadcrumbs" aria-label="Навигация — хлебные крошки">
            <nav aria-label="breadcrumb">
                <?php woocommerce_breadcrumb(); ?>
            </nav>
        </section>

        <section class="product">
            <div class="product__wrapper">
                <div class="product__header">
                    <div class="product__title">
                        <h1>
                            <?php echo the_title(); ?>
                        </h1>
                    </div>
                </div>
                <div class="product__content">
                    <div class="product__images">
                        <div class="product__images-top">
                            <?php if ($product->is_on_sale()) {
                            ?><img class="product__images-sale" src="<?php echo get_template_directory_uri(); ?>/assets/img/sale.svg" alt=""><?php
                                                                                                                                            } ?>
                            <div class="product__images-rating">
                                <span class="product__images-rating-value">4.9</span>
                                <div class="product__images-rating-stars">
                                    <div class="product__images-rating-stars-fill">
                                        <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18 7.207C17.9911 7.41898 17.879 7.66108 17.6616 7.85228C16.791 8.61705 15.9199 9.38111 15.0484 10.1445C14.6415 10.5015 14.234 10.858 13.826 11.2139C13.7677 11.2646 13.7528 11.3095 13.7708 11.3882C14.084 12.757 14.3947 14.1263 14.7028 15.4962C14.7652 15.7715 14.8266 16.0473 14.894 16.3217C14.9923 16.728 14.8668 17.1295 14.5501 17.3568C14.2017 17.6067 13.8317 17.623 13.4634 17.4046C12.2903 16.7072 11.1187 16.007 9.94856 15.3041C9.67539 15.1408 9.39888 14.9814 9.13025 14.8122C9.04039 14.7556 8.97514 14.7551 8.88289 14.8105C7.45993 15.6647 6.03387 16.5136 4.61258 17.3675C4.31073 17.5487 4.00243 17.6168 3.6688 17.4798C3.22738 17.2987 2.99675 16.8346 3.10645 16.3523C3.41666 14.9872 3.72735 13.622 4.03852 12.2569C4.104 11.9701 4.16256 11.6812 4.23354 11.3965C4.25409 11.3143 4.23975 11.2658 4.17737 11.2116C3.64267 10.7465 3.10932 10.2798 2.57732 9.81153C1.8319 9.15717 1.08362 8.50735 0.342505 7.84821C0.0399405 7.57959 -0.0747758 7.23663 0.0492612 6.84445C0.173298 6.45226 0.450529 6.21614 0.863986 6.17359C1.59674 6.09855 2.33068 6.0357 3.06415 5.96854C3.78973 5.9021 4.51531 5.83614 5.24089 5.77065C5.48275 5.74891 5.72461 5.72453 5.96671 5.70613C6.04462 5.70039 6.08621 5.66621 6.11536 5.59523C6.77259 4.05086 7.43094 2.50713 8.09039 0.964041C8.27251 0.53744 8.59778 0.299165 9.01123 0.309919C9.42469 0.320674 9.72295 0.522622 9.8869 0.902381C10.3331 1.93554 10.7736 2.9711 11.2159 4.00617C11.4411 4.53196 11.6667 5.05917 11.888 5.58735C11.9219 5.6686 11.9704 5.70015 12.0553 5.70684C12.6384 5.75623 13.2214 5.80802 13.8042 5.86219C14.6528 5.9393 15.5013 6.01705 16.3497 6.09544C16.6193 6.11934 16.8891 6.14324 17.158 6.17336C17.647 6.23119 18.0038 6.63915 18 7.207Z"
                                                fill="var(--color-accent)" />
                                        </svg>
                                    </div>
                                    <div class="product__images-rating-stars-fill">
                                        <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18 7.207C17.9911 7.41898 17.879 7.66108 17.6616 7.85228C16.791 8.61705 15.9199 9.38111 15.0484 10.1445C14.6415 10.5015 14.234 10.858 13.826 11.2139C13.7677 11.2646 13.7528 11.3095 13.7708 11.3882C14.084 12.757 14.3947 14.1263 14.7028 15.4962C14.7652 15.7715 14.8266 16.0473 14.894 16.3217C14.9923 16.728 14.8668 17.1295 14.5501 17.3568C14.2017 17.6067 13.8317 17.623 13.4634 17.4046C12.2903 16.7072 11.1187 16.007 9.94856 15.3041C9.67539 15.1408 9.39888 14.9814 9.13025 14.8122C9.04039 14.7556 8.97514 14.7551 8.88289 14.8105C7.45993 15.6647 6.03387 16.5136 4.61258 17.3675C4.31073 17.5487 4.00243 17.6168 3.6688 17.4798C3.22738 17.2987 2.99675 16.8346 3.10645 16.3523C3.41666 14.9872 3.72735 13.622 4.03852 12.2569C4.104 11.9701 4.16256 11.6812 4.23354 11.3965C4.25409 11.3143 4.23975 11.2658 4.17737 11.2116C3.64267 10.7465 3.10932 10.2798 2.57732 9.81153C1.8319 9.15717 1.08362 8.50735 0.342505 7.84821C0.0399405 7.57959 -0.0747758 7.23663 0.0492612 6.84445C0.173298 6.45226 0.450529 6.21614 0.863986 6.17359C1.59674 6.09855 2.33068 6.0357 3.06415 5.96854C3.78973 5.9021 4.51531 5.83614 5.24089 5.77065C5.48275 5.74891 5.72461 5.72453 5.96671 5.70613C6.04462 5.70039 6.08621 5.66621 6.11536 5.59523C6.77259 4.05086 7.43094 2.50713 8.09039 0.964041C8.27251 0.53744 8.59778 0.299165 9.01123 0.309919C9.42469 0.320674 9.72295 0.522622 9.8869 0.902381C10.3331 1.93554 10.7736 2.9711 11.2159 4.00617C11.4411 4.53196 11.6667 5.05917 11.888 5.58735C11.9219 5.6686 11.9704 5.70015 12.0553 5.70684C12.6384 5.75623 13.2214 5.80802 13.8042 5.86219C14.6528 5.9393 15.5013 6.01705 16.3497 6.09544C16.6193 6.11934 16.8891 6.14324 17.158 6.17336C17.647 6.23119 18.0038 6.63915 18 7.207Z"
                                                fill="var(--color-accent)" />
                                        </svg>
                                    </div>
                                    <div class="product__images-rating-stars-fill">
                                        <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18 7.207C17.9911 7.41898 17.879 7.66108 17.6616 7.85228C16.791 8.61705 15.9199 9.38111 15.0484 10.1445C14.6415 10.5015 14.234 10.858 13.826 11.2139C13.7677 11.2646 13.7528 11.3095 13.7708 11.3882C14.084 12.757 14.3947 14.1263 14.7028 15.4962C14.7652 15.7715 14.8266 16.0473 14.894 16.3217C14.9923 16.728 14.8668 17.1295 14.5501 17.3568C14.2017 17.6067 13.8317 17.623 13.4634 17.4046C12.2903 16.7072 11.1187 16.007 9.94856 15.3041C9.67539 15.1408 9.39888 14.9814 9.13025 14.8122C9.04039 14.7556 8.97514 14.7551 8.88289 14.8105C7.45993 15.6647 6.03387 16.5136 4.61258 17.3675C4.31073 17.5487 4.00243 17.6168 3.6688 17.4798C3.22738 17.2987 2.99675 16.8346 3.10645 16.3523C3.41666 14.9872 3.72735 13.622 4.03852 12.2569C4.104 11.9701 4.16256 11.6812 4.23354 11.3965C4.25409 11.3143 4.23975 11.2658 4.17737 11.2116C3.64267 10.7465 3.10932 10.2798 2.57732 9.81153C1.8319 9.15717 1.08362 8.50735 0.342505 7.84821C0.0399405 7.57959 -0.0747758 7.23663 0.0492612 6.84445C0.173298 6.45226 0.450529 6.21614 0.863986 6.17359C1.59674 6.09855 2.33068 6.0357 3.06415 5.96854C3.78973 5.9021 4.51531 5.83614 5.24089 5.77065C5.48275 5.74891 5.72461 5.72453 5.96671 5.70613C6.04462 5.70039 6.08621 5.66621 6.11536 5.59523C6.77259 4.05086 7.43094 2.50713 8.09039 0.964041C8.27251 0.53744 8.59778 0.299165 9.01123 0.309919C9.42469 0.320674 9.72295 0.522622 9.8869 0.902381C10.3331 1.93554 10.7736 2.9711 11.2159 4.00617C11.4411 4.53196 11.6667 5.05917 11.888 5.58735C11.9219 5.6686 11.9704 5.70015 12.0553 5.70684C12.6384 5.75623 13.2214 5.80802 13.8042 5.86219C14.6528 5.9393 15.5013 6.01705 16.3497 6.09544C16.6193 6.11934 16.8891 6.14324 17.158 6.17336C17.647 6.23119 18.0038 6.63915 18 7.207Z"
                                                fill="var(--color-accent)" />
                                        </svg>
                                    </div>
                                    <div class="product__images-rating-stars-fill">
                                        <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18 7.207C17.9911 7.41898 17.879 7.66108 17.6616 7.85228C16.791 8.61705 15.9199 9.38111 15.0484 10.1445C14.6415 10.5015 14.234 10.858 13.826 11.2139C13.7677 11.2646 13.7528 11.3095 13.7708 11.3882C14.084 12.757 14.3947 14.1263 14.7028 15.4962C14.7652 15.7715 14.8266 16.0473 14.894 16.3217C14.9923 16.728 14.8668 17.1295 14.5501 17.3568C14.2017 17.6067 13.8317 17.623 13.4634 17.4046C12.2903 16.7072 11.1187 16.007 9.94856 15.3041C9.67539 15.1408 9.39888 14.9814 9.13025 14.8122C9.04039 14.7556 8.97514 14.7551 8.88289 14.8105C7.45993 15.6647 6.03387 16.5136 4.61258 17.3675C4.31073 17.5487 4.00243 17.6168 3.6688 17.4798C3.22738 17.2987 2.99675 16.8346 3.10645 16.3523C3.41666 14.9872 3.72735 13.622 4.03852 12.2569C4.104 11.9701 4.16256 11.6812 4.23354 11.3965C4.25409 11.3143 4.23975 11.2658 4.17737 11.2116C3.64267 10.7465 3.10932 10.2798 2.57732 9.81153C1.8319 9.15717 1.08362 8.50735 0.342505 7.84821C0.0399405 7.57959 -0.0747758 7.23663 0.0492612 6.84445C0.173298 6.45226 0.450529 6.21614 0.863986 6.17359C1.59674 6.09855 2.33068 6.0357 3.06415 5.96854C3.78973 5.9021 4.51531 5.83614 5.24089 5.77065C5.48275 5.74891 5.72461 5.72453 5.96671 5.70613C6.04462 5.70039 6.08621 5.66621 6.11536 5.59523C6.77259 4.05086 7.43094 2.50713 8.09039 0.964041C8.27251 0.53744 8.59778 0.299165 9.01123 0.309919C9.42469 0.320674 9.72295 0.522622 9.8869 0.902381C10.3331 1.93554 10.7736 2.9711 11.2159 4.00617C11.4411 4.53196 11.6667 5.05917 11.888 5.58735C11.9219 5.6686 11.9704 5.70015 12.0553 5.70684C12.6384 5.75623 13.2214 5.80802 13.8042 5.86219C14.6528 5.9393 15.5013 6.01705 16.3497 6.09544C16.6193 6.11934 16.8891 6.14324 17.158 6.17336C17.647 6.23119 18.0038 6.63915 18 7.207Z"
                                                fill="var(--color-accent)" />
                                        </svg>
                                    </div>
                                    <div class="product__images-rating-stars-fill">
                                        <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18 7.207C17.9911 7.41898 17.879 7.66108 17.6616 7.85228C16.791 8.61705 15.9199 9.38111 15.0484 10.1445C14.6415 10.5015 14.234 10.858 13.826 11.2139C13.7677 11.2646 13.7528 11.3095 13.7708 11.3882C14.084 12.757 14.3947 14.1263 14.7028 15.4962C14.7652 15.7715 14.8266 16.0473 14.894 16.3217C14.9923 16.728 14.8668 17.1295 14.5501 17.3568C14.2017 17.6067 13.8317 17.623 13.4634 17.4046C12.2903 16.7072 11.1187 16.007 9.94856 15.3041C9.67539 15.1408 9.39888 14.9814 9.13025 14.8122C9.04039 14.7556 8.97514 14.7551 8.88289 14.8105C7.45993 15.6647 6.03387 16.5136 4.61258 17.3675C4.31073 17.5487 4.00243 17.6168 3.6688 17.4798C3.22738 17.2987 2.99675 16.8346 3.10645 16.3523C3.41666 14.9872 3.72735 13.622 4.03852 12.2569C4.104 11.9701 4.16256 11.6812 4.23354 11.3965C4.25409 11.3143 4.23975 11.2658 4.17737 11.2116C3.64267 10.7465 3.10932 10.2798 2.57732 9.81153C1.8319 9.15717 1.08362 8.50735 0.342505 7.84821C0.0399405 7.57959 -0.0747758 7.23663 0.0492612 6.84445C0.173298 6.45226 0.450529 6.21614 0.863986 6.17359C1.59674 6.09855 2.33068 6.0357 3.06415 5.96854C3.78973 5.9021 4.51531 5.83614 5.24089 5.77065C5.48275 5.74891 5.72461 5.72453 5.96671 5.70613C6.04462 5.70039 6.08621 5.66621 6.11536 5.59523C6.77259 4.05086 7.43094 2.50713 8.09039 0.964041C8.27251 0.53744 8.59778 0.299165 9.01123 0.309919C9.42469 0.320674 9.72295 0.522622 9.8869 0.902381C10.3331 1.93554 10.7736 2.9711 11.2159 4.00617C11.4411 4.53196 11.6667 5.05917 11.888 5.58735C11.9219 5.6686 11.9704 5.70015 12.0553 5.70684C12.6384 5.75623 13.2214 5.80802 13.8042 5.86219C14.6528 5.9393 15.5013 6.01705 16.3497 6.09544C16.6193 6.11934 16.8891 6.14324 17.158 6.17336C17.647 6.23119 18.0038 6.63915 18 7.207Z"
                                                fill="var(--color-accent)" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo $product->get_image('full', array('class' => 'product__image')); ?>
                    </div>
                    <div class="product__info">
                        <!-- Блок характеристик -->
                        <section class="product-specs">
                            <p class="product-specs__title">Характеристики:</p>

                            <dl class="product-specs__list">
                                <?php
                                $attributes = $product->get_attributes();

                                foreach ($attributes as $attribute) {
                                    // Пропускаем вариативные атрибуты если нужно
                                    if ($attribute->get_variation()) continue;

                                    $name = wc_attribute_label($attribute->get_name());
                                    $values = array();

                                    if ($attribute->is_taxonomy()) {
                                        $terms = wp_get_post_terms($product->get_id(), $attribute->get_name());
                                        foreach ($terms as $term) {
                                            $values[] = $term->name;
                                        }
                                    } else {
                                        $values = $attribute->get_options();
                                    }

                                    if (!empty($values)) {
                                        echo '<div class="product-specs__item">';
                                        echo '<dt class="product-specs__name">' . esc_html($name) . '</dt>';
                                        echo '<dd class="product-specs__value">' . esc_html(implode(', ', $values)) . '</dd>';
                                        echo '</div>';
                                    }
                                }

                                // Если атрибутов нет, показываем сообщение
                                if (empty($attributes)) {
                                    echo '<div class="product-specs__empty">Характеристики отсутствуют</div>';
                                }
                                ?>
                            </dl>

                            <!-- <a href="#product-attributes" class="product-specs__more-link" data-tab="specifications">
                                <span class="product-specs__more-text">показать еще</span><span>...</span>
                            </a> -->
                        </section>

                        <!-- Блок для покупателей -->
                        <section class="customer-info" aria-labelledby="customer-info-title">
                            <p class="customer-info__title" id="customer-info-title">Для покупателей:</p>

                            <ul class="customer-info__list">
                                <li class="customer-info__item">

                                    <span class="customer-info__label">
                                        <img class="customer-info__icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/pay.svg" alt="">
                                        Оплата
                                    </span>
                                    <span class="customer-info__text">информация</span>
                                </li>
                                <li class="customer-info__item">

                                    <span class="customer-info__label">
                                        <img class="customer-info__icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/delivery-car.svg" alt="">
                                        Доставка
                                    </span>
                                    <span class="customer-info__text">информация</span>
                                </li>
                                <li class="customer-info__item">
                                    <span class="customer-info__label">
                                        <img class="customer-info__icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/backpack.svg" alt="">
                                        Самовывоз
                                    </span>
                                    <span class="customer-info__text">информация</span>
                                </li>
                                <li class="customer-info__item">

                                    <span class="customer-info__label">
                                        <img class="customer-info__icon" src="<?php echo get_template_directory_uri(); ?>/assets/img/back-arrow.svg" alt="">
                                        Возврат
                                    </span>
                                    <span class="customer-info__text">информация</span>
                                </li>
                            </ul>
                        </section>

                    </div>
                    <div class="product__buy-block">
                        <div class="product__buy-top">
                            <div class="product__availability">
                                <?php
                                if ($product->is_in_stock()) {
                                    echo '<p class="in-stock">В наличии</p>';
                                } elseif ($product->is_on_backorder()) {
                                    echo '<p class="on-backorder">Под заказ</p>';
                                } else {
                                    echo '<p class="out-of-stock">Нет в наличии</p>';
                                }
                                ?>
                            </div>
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

                        <div class="product__prices">

                            <?php if ($product->is_type('variable')) : ?>

                                <?php
                                $variations = $product->get_available_variations();

                                echo '<pre>';
                                print_r($variations);
                                echo '</pre>';
                                $variation_data = [];

                                foreach ($variations as $variation) {
                                    $var_obj = wc_get_product($variation['variation_id']);
                                    if (! $var_obj) continue;

                                    $attrs = $variation['attributes'];

                                    $unit = $attrs['attribute_pa_edinicza'] ?? '';

                                    echo '<pre>';
                                    print_r($unit);
                                    echo '</pre>';
                                    if (! $unit) continue;

                                    $regular_price = (float) $var_obj->get_regular_price();
                                    $sale_price    = (float) $var_obj->get_sale_price();
                                    $active_price  = (float) $var_obj->get_price();

                                    $variation_data[$unit] = [
                                        'label'         => $unit === 'metr' ? 'Цена за метр' : 'Цена за тонну',
                                        'regular_price' => $regular_price,
                                        'sale_price'    => $sale_price,
                                        'active_price'  => $active_price,
                                        'suffix'        => $unit === 'metr' ? 'м.п.' : 'т.',
                                    ];
                                }
                                ?>

                                <?php if (! empty($variation_data)) : ?>
                                    <div class="product__price-group">
                                        <?php
                                        $first_key = array_key_first($variation_data);
                                        foreach ($variations as $variation) :
                                            $var_obj = wc_get_product($variation['variation_id']);
                                            $attrs = $variation['attributes'];
                                            echo '<pre>';
                                            print_r($attrs);
                                            echo '</pre>';

                                            $unit = $attrs['attribute_pa_edinicza'] ?? '';
                                            if (! $unit || empty($variation_data[$unit])) continue;

                                            $data = $variation_data[$unit];
                                            $checked = $unit === $first_key ? 'checked' : '';
                                            $is_sale = $data['sale_price'] && $data['sale_price'] < $data['regular_price'];

                                            // вес (если есть)
                                            $weight = (float) $var_obj->get_weight();

                                            $attr_slug = '';
                                            if (isset($attrs['attribute_pa_edinicza'])) {
                                                $term = get_term_by('name', $attrs['attribute_pa_edinicza'], 'pa_edinicza');
                                                if ($term) {
                                                    $attr_slug = $term->slug; // <- этот slug нужен для AJAX
                                                }
                                                // print_r($attr_slug);
                                            }



                                        ?>
                                            <label class="product__unit-option">
                                                <input
                                                    type="radio"
                                                    name="unit"
                                                    value="<?php echo esc_attr($unit); ?>"
                                                    <?php echo $checked; ?>
                                                    class="product__unit-input"
                                                    data-attribute_pa_edinicza="<?php echo esc_attr($attrs['attribute_pa_edinicza']); ?>"
                                                    data-price="<?php echo esc_attr($data['active_price']); ?>"
                                                    data-variation_id="<?php echo esc_attr($variation['variation_id']); ?>"
                                                    data-weight="1"
                                                    data-weight_suffix="<?php echo esc_html($data['suffix']); ?>">
                                                <div class="product__unit-inner">
                                                    <span class="product__unit-label"><?php echo esc_html($data['label']); ?>:</span>

                                                    <div class="product__unit-wrapper">
                                                        <span class="product__unit-price">
                                                            <span class="product__unit-value"><?php echo wc_price($data['active_price']); ?></span>
                                                            <span class="product__unit-suffix">/<?php echo esc_html($data['suffix']); ?></span>
                                                        </span>
                                                        <?php if ($is_sale) : ?>
                                                            <span class="product__unit-regular">
                                                                <span class="product__unit-value"><?php echo wc_price($data['regular_price']); ?></span>
                                                                <span class="product__unit-suffix">/<?php echo esc_html($data['suffix']); ?></span>
                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </label>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>

                            <?php elseif ($product->is_type('simple')) : ?>

                                <div class="product__price-group product__price-group-simple">
                                    <span class="product__unit-label">Стоимость:</span>
                                    <div class="product__unit-wrapper">
                                        <span class="product__unit-price">
                                            <span class="product__unit-value"><?php echo wc_price($product->get_sale_price()); ?></span>
                                        </span>
                                        <?php if ($product->is_on_sale()) : ?>
                                            <span class="product__unit-regular">
                                                <span class="product__unit-value"><?php echo wc_price($product->get_regular_price()); ?></span>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            <?php endif; ?>

                        </div>


                        <div class="product__divider"></div>

                        <div class="product__summary">
                            <?php woocommerce_quantity_input(); ?>
                            <div class="product__totals">
                                <div class="product__total">
                                    <span class="product__total-label">Общая сумма:</span>
                                    <span class="product__total-value">5 000 ₽</span>
                                </div>
                                <div class="product__weight">
                                    <span class="product__weight-label">Вес:</span>
                                    <span class="product__weight-value">10 кг</span>
                                </div>
                            </div>


                        </div>

                        <div class="product__actions">
                            <button
                                class="product__button product__button_primary"
                                type="button"
                                data-price="<?php echo $product->get_price(); ?>"
                                data-weight="<?php echo $product->get_weight(); ?>"
                                data-weight_suffix="кг">
                                Добавить в корзину
                            </button>
                            <button class="product__button product__button_secondary" type="button">Купить в один клик</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="product-tabs">
            <div class="product-tabs__header">
                <button class="product-tabs__button product-tabs__button--active" data-tab="description">
                    <h3 class="product-tabs__title">Описание товара</h3>
                </button>
                <button class="product-tabs__button" data-tab="characteristics">
                    <h3 class="product-tabs__title">Характеристики</h3>
                </button>
                <button class="product-tabs__button" data-tab="delivery">
                    <h3 class="product-tabs__title">Оплата и доставка</h3>
                </button>
                <button class="product-tabs__button" data-tab="reviews">
                    <h3 class="product-tabs__title">Отзывы</h3>
                </button>
            </div>

            <div class="product-tabs__content">
                <div class="product-tabs__panel product-tabs__panel--active" id="description">
                    <!-- <h3 class="product-tabs__title">Описание товара</h3> -->
                    <div class="product-tabs__text">
                        <?php 
                        
                        if (get_the_content()) {
                            the_content();
                        } else {
                            echo the_title()." — надёжный металлопрокат по ГОСТу, востребованный в строительстве и промышленности. Продукция сертифицирована и соответствует требованиям стандартов качества.";
                            echo "<br>";
                            echo "Работаем напрямую с заводами-изготовителями, поэтому предлагаем честные цены даже на небольшие объёмы. В наличии популярные типоразмеры, возможна резка под ваш заказ. Отгрузка в день обращения и быстрая доставка.";
                            echo "<br>";
                            echo "Уточните наличие и актуальную стоимость у менеджера — поможем быстро подобрать нужный прокат и организовать поставку.";
                        }
                        

                        
                        
                        
                        ?>
                    </div>
                </div>

                <div class="product-tabs__panel" id="characteristics">
                    <section class="product-specs">
                            <!-- <p class="product-specs__title">Характеристики:</p> -->

                            <dl class="product-specs__list">
                                <?php
                                $attributes = $product->get_attributes();

                                foreach ($attributes as $attribute) {
                                    // Пропускаем вариативные атрибуты если нужно
                                    if ($attribute->get_variation()) continue;

                                    $name = wc_attribute_label($attribute->get_name());
                                    $values = array();

                                    if ($attribute->is_taxonomy()) {
                                        $terms = wp_get_post_terms($product->get_id(), $attribute->get_name());
                                        foreach ($terms as $term) {
                                            $values[] = $term->name;
                                        }
                                    } else {
                                        $values = $attribute->get_options();
                                    }

                                    if (!empty($values)) {
                                        echo '<div class="product-specs__item">';
                                        echo '<dt class="product-specs__name">' . esc_html($name) . '</dt>';
                                        echo '<dd class="product-specs__value">' . esc_html(implode(', ', $values)) . '</dd>';
                                        echo '</div>';
                                    }
                                }

                                // Если атрибутов нет, показываем сообщение
                                if (empty($attributes)) {
                                    echo '<div class="product-specs__empty">Характеристики отсутствуют</div>';
                                }
                                ?>
                            </dl>

                            <!-- <a href="#product-attributes" class="product-specs__more-link" data-tab="specifications">
                                <span class="product-specs__more-text">показать еще</span><span>...</span>
                            </a> -->
                        </section>
                </div>

                

                <div class="product-tabs__panel" id="delivery">
                    <!-- <h3 class="product-tabs__title">Доставка и оплата</h3> -->
                    <div class="product-tabs__text">
                        <p>Информация о способах доставки и оплаты товара.</p>
                    </div>
                </div>

                <div class="product-tabs__panel" id="reviews">
                    <div class="product-tabs__text">
                        <p>Отзывов пока нет</p>
                    </div>
                    
                    <!-- <h3 class="product-tabs__title">Отзывы покупателей</h3> -->
                </div>
            </div>
        </section>

        <?php
        // get_template_part(
        //     'template-parts/popular-products',
        //     '',
        //     array(
        //         'title' => '<span>Популярные</span> товары'
        //     )
        // );
        ?>

        <?php
        // get_template_part(
        //     'template-parts/text-block',
        //     '',
        //     array(
        //         'title' => '<span>Сео</span> текст',
        //         'content' => '<p>Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые модификации, например, юмористические вставки или слова, которые даже отдалённо не напоминают латынь.</p>'
        //     )
        // );
        ?>


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

                            <div class="consult__policy">
                                Нажимая «Отправить заявку», вы принимаете условия <a href="<?php echo get_privacy_policy_url(); ?>">Политики конфиденциальности</a> и даете согласие на обработку ваших персональных данных
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <?php
        get_template_part(
            'template-parts/partners',
            '',
            array(
                'title' => 'Наши <span>партнеры</span>'
            )
        );
        ?>
    </main>
    <?php get_footer() ?>
    <?php wp_footer() ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const qtyInput = document.querySelector('.qty');
            const totalValue = document.querySelector('.product__total-value');
            const weightValue = document.querySelector('.product__weight-value');
            const weightLabel = document.querySelector('.product__weight-label');
            const addToCartBtn = document.querySelector('.product__button_primary');
            const variationInputs = document.querySelectorAll('.product__unit-input');
            const productId = <?php echo $product->get_id(); ?>;

            // Получаем выбранную вариацию (или null для простого товара)
            function getSelectedVariation() {
                // Для простых товаров возвращаем null
                if (variationInputs.length === 0) {
                    return null;
                }

                const selected = document.querySelector('.product__unit-input:checked');
                if (!selected) return null;
                return {
                    price: parseFloat(selected.dataset.price || 0),
                    variation_id: parseInt(selected.dataset.variation_id || 0),
                    weight: parseFloat(selected.dataset.weight || 0),
                    weight_suffix: selected.dataset.weight_suffix || '',
                    attribute_pa_edinicza: selected.dataset.attribute_pa_edinicza || ''
                };
            }

            // Форматирование цены
            function formatPrice(num) {
                return num.toLocaleString('ru-RU', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                }) + ' ₽';
            }

            // Пересчёт суммы и веса/длины
            function recalcTotals() {
                const qty = parseFloat(qtyInput?.value || 1);
                const variation = getSelectedVariation();

                let price, weight, weightSuffix;

                if (variation) {
                    // Для вариативного товара
                    price = variation.price;
                    weight = variation.weight;
                    weightSuffix = variation.weight_suffix;
                } else {
                    // Для простого товара
                    price = parseFloat(addToCartBtn.dataset.price || 0);
                    weight = parseFloat(addToCartBtn.dataset.weight || 0);
                    weightSuffix = addToCartBtn.dataset.weight_suffix || '';
                }

                totalValue.textContent = formatPrice(price * qty);

                if (weight) {
                    weightLabel.textContent = weightSuffix === "т." ? 'Вес:' :
                        weightSuffix === "м.п." ? 'Длина:' : 'Вес/Длина:';
                    weightValue.textContent = (weight * qty).toFixed(2) + ' ' + weightSuffix;
                } else {
                    weightLabel.textContent = 'Вес/Длина:';
                    weightValue.textContent = '—';
                }
            }

            // Слушатели изменений
            if (qtyInput) {
                qtyInput.addEventListener('input', recalcTotals);
                qtyInput.addEventListener('change', recalcTotals);
            }
            variationInputs.forEach(radio => radio.addEventListener('change', recalcTotals));

            // Пересчёт при загрузке
            recalcTotals();

            // Добавление в корзину через AJAX
            addToCartBtn.addEventListener('click', function(e) {
                e.preventDefault();

                const qty = parseFloat(qtyInput?.value || 1);
                const variation = getSelectedVariation();
                const isVariable = variationInputs.length > 0;

                if (isVariable && !variation) {
                    alert('Выберите вариант товара');
                    return;
                }

                // Формируем URL в зависимости от типа товара
                let url = '';
                if (isVariable && variation) {
                    // Для вариативного товара
                    url = `/cart/?add-to-cart=${productId}&variation_id=${variation.variation_id}&quantity=${qty}&attribute_pa_edinicza=${variation.attribute_pa_edinicza}`;
                } else {
                    // Для простого товара
                    url = `/cart/?add-to-cart=${productId}&quantity=${qty}`;
                }

                // Показываем загрузку
                const originalText = addToCartBtn.textContent;
                addToCartBtn.textContent = 'Добавляем...';
                addToCartBtn.disabled = true;
                console.log(variation);
                // Используем fetch для добавления в корзину
                fetch(url, {
                        method: 'GET',
                        credentials: 'same-origin'
                    })
                    .then(response => {
                        if (response.ok) {
                            // Товар добавлен, теперь обновляем мини-корзину
                            return updateMiniCart();
                        } else {
                            throw new Error('Ошибка добавления в корзину');
                        }
                    })
                    .then(() => {
                        // Успех - обновляем кнопку
                        addToCartBtn.textContent = 'В корзине ✓';
                        addToCartBtn.classList.add('in-cart');

                        // Можно показать уведомление
                        showCartNotification('Товар добавлен в корзину');
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Ошибка: ' + error.message);

                        // Возвращаем исходное состояние кнопки
                        addToCartBtn.textContent = originalText;
                        addToCartBtn.disabled = false;
                    });
            });

            // Функция для обновления мини-корзины
function updateMiniCart() {
    return new Promise((resolve, reject) => {
        // Способ 1: Используем встроенный механизм WooCommerce
        if (typeof wc_cart_fragments_params !== 'undefined' && typeof jQuery !== 'undefined') {
            jQuery(document.body).trigger('wc_fragment_refresh');
            console.log('Mini-cart updated via WC fragments');
            
            // Дополнительно обновляем счетчик вручную
            setTimeout(() => {
                updateCartCounter();
            }, 300);
            
            resolve();
            return;
        }

        // Способ 2: Делаем AJAX запрос для обновления фрагментов
        fetch('/?wc-ajax=get_refreshed_fragments')
            .then(response => response.json())
            .then(data => {
                if (data.fragments) {
                    // Обновляем все фрагменты на странице
                    Object.keys(data.fragments).forEach(selector => {
                        const elements = document.querySelectorAll(selector);
                        elements.forEach(element => {
                            element.innerHTML = data.fragments[selector];
                        });
                    });
                    
                    // Обновляем счетчик отдельно
                    updateCartCounter();
                    
                    console.log('Mini-cart updated via fragments AJAX');
                    resolve();
                } else {
                    reject(new Error('No fragments in response'));
                }
            })
            .catch(error => {
                console.warn('Failed to update mini-cart via AJAX:', error);
                // Пробуем обновить счетчик через другой метод
                updateCartCounter();
                resolve();
            });
    });
}

// Новая функция для обновления только счетчика
// Упрощенная функция обновления счетчика
function updateCartCounter() {
    // Используем встроенную функцию WooCommerce
    if (typeof wc_cart_fragments_params !== 'undefined') {
        // WooCommerce сам обновит счетчик через фрагменты
        return;
    }
    
    // Альтернативный способ - делаем простой запрос
    fetch(window.location.href)
        .then(response => response.text())
        .then(html => {
            // Создаем временный элемент для парсинга
            const temp = document.createElement('div');
            temp.innerHTML = html;
            
            // Ищем счетчик в обновленном HTML
            const newCounter = temp.querySelector('.cart-count');
            if (newCounter) {
                const newCount = newCounter.getAttribute('data-count') || 0;
                
                // Обновляем все счетчики на странице
                document.querySelectorAll('.cart-count').forEach(counter => {
                    counter.setAttribute('data-count', newCount);
                    
                    if (parseInt(newCount) > 0) {
                        counter.textContent = newCount;
                        counter.style.display = 'flex';
                    } else {
                        counter.textContent = '';
                        counter.style.display = 'none';
                    }
                    
                    // Анимация
                    counter.classList.add('updated');
                    setTimeout(() => {
                        counter.classList.remove('updated');
                    }, 500);
                });
            }
        })
        .catch(error => {
            console.warn('Failed to update cart counter:', error);
        });
}
            // Функция для показа уведомления (опционально)
            function showCartNotification(message) {
                let notification = document.querySelector('.cart-notification');
                if (!notification) {
                    notification = document.createElement('div');
                    notification.className = 'cart-notification';
                    notification.style.cssText = `
                    position: fixed;
                    top: 20px;
                    right: 20px;
                    background: #4CAF50;
                    color: white;
                    padding: 15px 20px;
                    border-radius: 4px;
                    z-index: 10000;
                    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
                `;
                    document.body.appendChild(notification);
                }

                notification.textContent = message;
                notification.style.display = 'block';

                setTimeout(() => {
                    notification.style.display = 'none';
                }, 3000);
            }
        });

        document.querySelectorAll('.product-tabs__button').forEach(button => {
            button.addEventListener('click', () => {
                // Убираем активный класс у всех кнопок и панелей
                document.querySelectorAll('.product-tabs__button').forEach(btn => btn.classList.remove('product-tabs__button--active'));
                document.querySelectorAll('.product-tabs__panel').forEach(panel => panel.classList.remove('product-tabs__panel--active'));
                
                // Добавляем активный класс нажатой кнопке
                button.classList.add('product-tabs__button--active');
                
                // Показываем соответствующую панель
                const tabId = button.getAttribute('data-tab');
                document.getElementById(tabId).classList.add('product-tabs__panel--active');
            });
        });
    </script>


</body>

</html>