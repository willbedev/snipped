/** Sposta il coupon nel checkout 
 * @snippet       Display Coupon Form @ WooCommerce Checkout (Bottom)
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 6
 * fonte          https://www.businessbloomer.com/woocommerce-move-remove-coupon-form-cart-checkout/  
 * @community     https://businessbloomer.com/club/
 */

remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 ); /* deregistra la posizione standard del coupon */
add_action( 'woocommerce_checkout_order_review', 'bbloomer_checkout_coupon_below_payment_button' ); /* lo sposta sotto il totale */
  
function bbloomer_checkout_coupon_below_payment_button() {
	echo '<hr>';
	woocommerce_checkout_coupon_form();
 }