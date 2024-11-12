<?php

/**
 * @snippet       		Bulk Generate Coupons @ WordPress Admin
 * @how-to        		businessbloomer.com/woocommerce-customization
 * @author       		Rodolfo Melogli, Business Bloomer
 * @compatible    		WooCommerce 6
 * @community     		https://businessbloomer.com/club/
 * pagina per generare  https://performerstore.willbedev.com/wp-admin/admin.php?bb-gen-coupons
 * */
 
 add_action( 'admin_init', 'bbloomer_generate_coupons_admin' );
 
 function bbloomer_generate_coupons_admin() { 
	if ( isset( $_REQUEST['bb-gen-coupons'] ) ) {      
	   if ( ! current_user_can( 'manage_woocommerce' ) ) {
		  wp_die( 'You do not have permission to bulk generate coupons' );
	   }      
	   $number_of_coupons = 2; // DEFINE BULK QUANTITY     
	   for ( $i = 1; $i <= $number_of_coupons; $i++ ) {
		  $coupon = new WC_Coupon();
		  $random_code = bin2hex( random_bytes( 8 ) ); // 16 CHARS PHP 7+ ONLY
		  if ( wc_get_coupon_id_by_code( $random_code ) ) continue; // SKIP IF CODE EXISTS 
		  $coupon->set_code( $random_code );
		  $coupon->set_description( 'Coupon generated programmatically (' . $i . '/' . $number_of_coupons . ')' );
		  $coupon->set_discount_type( 'fixed_cart' );
		  $coupon->set_amount( 45 );
		//   $coupon->set_minimum_amount( 1 );
		  $coupon->set_individual_use( false );
		//   $coupon->set_product_categories( array( 54, 55 ) ); // limita ad categorie con ID specifico
		//   $coupon->set_usage_limit_per_user( 1 ); 
		  $coupon->set_usage_limit( 1 ); 
		  $coupon->set_date_expires( '2025-12-31' ); // Data di scadenza
		  $coupon->save();

		  // After saving the coupon, trigger the necessary WooCommerce action to make it available
		  do_action( 'woocommerce_coupon_options_save', $coupon );  // Manually trigger the saving actions
		  do_action( 'woocommerce_coupon_options_update', $coupon ); // Also trigger update to ensure all hooks are executed
	   }  
	}
 }