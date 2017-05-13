<?php if ( EDD_FES()->vendors->user_is_status( 'pending' ) ) { ?>
	<p><?php _e( 'Your application has been submitted and will be reviewed.', 'edd_fes' ); ?></p>
<?php } else { 
	$base_url = get_permalink( EDD_FES()->helper->get_option( 'fes-vendor-dashboard-page', get_permalink() ) );
	wp_redirect( $base_url ); exit;		
}