<?php

/** Sposta il coupon nel checkout 
 * @snippet       Display Coupon Form @ WooCommerce Checkout (Bottom)
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 6
 * @community     https://businessbloomer.com/club/
 */

 remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 ); 
 add_action( 'woocommerce_checkout_order_review', 'bbloomer_checkout_coupon_below_payment_button' );
  
 function bbloomer_checkout_coupon_below_payment_button() {
	echo '<hr>';
	woocommerce_checkout_coupon_form();
 }
 