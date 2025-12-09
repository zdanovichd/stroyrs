<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.3.6
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="custom-cart-summary">

	<button type="button" id="bulk-remove-items" class="button" style="display: none;">
                                    Удалить выбранные
                                </button>
    
    <div class="summary-grid">
		<div class="summary-title">
			<p>Итого:</p>
		</div>
        
        <div class="summary-item">
            <span class="value"><?php echo WC()->cart->get_cart_contents_count(); ?> шт.</span>
        </div>
        
        <div class="summary-item total">
            <span class="value"><?php wc_cart_totals_order_total_html(); ?></span>
        </div>
    </div>

	<div class="wc-proceed-to-checkout">
		<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
	</div>
</div>