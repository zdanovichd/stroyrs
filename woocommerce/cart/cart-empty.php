<?php

/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

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

			<p class="return-to-shop">
				<a href="/catalog" class="button button--red">Перейти в каталог</a>
			</p>
		</section>
	</main>


	<?php get_footer(); ?>
	<?php wp_footer(); ?>

</body>

</html>