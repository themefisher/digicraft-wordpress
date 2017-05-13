<?php
if ( EDD_FES()->integrations->is_commissions_active() ) { ?>
	<h1 class="fes-headers" id="fes-commissions-page-title"><?php _e( 'Commissions Overview', 'edd_fes' ); ?></h1>
	<?php 
	if ( eddc_user_has_commissions() ) {
		echo do_shortcode('[edd_commissions]'); 
	}
	else{
		echo __( 'You haven\'t made any sales yet!', 'edd_fes' );
	}
} else {
	echo 'Error 4908';
}