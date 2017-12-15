<?php

// remove the standard button that shows after the download's content
remove_action( 'edd_after_download_content', 'edd_append_purchase_link' );

function themeblvd_disable_admin_bar() {
	if ( ! current_user_can('edit_posts') ) {
		add_filter('show_admin_bar', '__return_false');
	}
}
add_action( 'after_setup_theme', 'themeblvd_disable_admin_bar' );

function themeblvd_redirect_admin(){
	if ( ! defined('DOING_AJAX') && ! current_user_can('edit_posts') ) {
		wp_redirect( site_url() );
		exit;
	}
}
add_action( 'admin_init', 'themeblvd_redirect_admin' );





//EDD Fucntions
// remove the standard button that shows after the download's content
remove_action( 'edd_after_download_content', 'edd_append_purchase_link' );
// our own function to output the button
function swift_purchase_link_text( $download_id ) {
	if ( ! get_post_meta( $download_id, '_edd_hide_purchase_link', true ) ) {
		echo edd_get_purchase_link(
			array(
				'download_id' 	=> $download_id,
				'class' 	=> 'edd-submit', // add your new classes here
				'price' 	=> 0 // turn the price off
			)
		);
	}
}
// rehook/add our function back to the same location as before
add_action( 'edd_after_download_content', 'swift_purchase_link_text' );



// Edd If product price is zero then it will show free
function pw_format_currency( $formatted, $currency, $price ) {
	if( ! is_admin() && $price == 0.00 ) {
		return 'Free';
	}
	return $formatted;
}
add_filter( 'edd_usd_currency_filter_before', 'pw_format_currency', 10, 3 );