<?php
$post_id = absint( $_REQUEST['post_id'] );
// check to make sure vendor is author of this download & can delete
if ( !EDD_FES()->vendors->vendor_can_delete_product($post_id) ){
	_e('Access Denied: You may only delete your own products','edd_fes');
} else{ ?>
	<h1 class="fes-headers" id="fes-delete-product-page-title"><?php echo sprintf( _x( 'Delete %s', 'FES uppercase singular setting for download', 'edd_fes' ), EDD_FES()->helper->get_product_constant_name( $plural = false, $uppercase = true ) ) .  ' ' . __('#: ','edd_fes'); echo $post_id; ?></h1>
	<p><?php printf( _x( 'Are you sure you want to delete this %s? This action is irreversible.', 'FES lowercase singular setting for vendor', 'edd_fes' ), EDD_FES()->helper->get_product_constant_name( $plural = false, $uppercase = false ) ); ?></p>
	<form id="fes-delete-form" action="" method="post">
		<input type="hidden" name="pid" value="<?php  echo $post_id; ?>">
		<?php  wp_nonce_field('fes_delete_nonce', 'fes_nonce'); ?>
		<button class="fes-delete button" type="submit"><?php  _e( 'Delete', 'edd_fes' ); ?></button>
	</form>
	<?php
}