<?php
$vendor_announcement = EDD_FES()->helper->get_option( 'fes-dashboard-notification', '' );
if ( $vendor_announcement ) {
	?>
	<div id="fes-vendor-announcements">
		<?php echo apply_filters( 'fes_dashboard_content', do_shortcode( $vendor_announcement ) ); ?>
	</div>
	<?php
}
?>
<div id="fes-vendor-store-link">
	<?php echo EDD_FES()->vendors->get_vendor_store_url_dashboard(); ?>
</div>

<div class="fes-comments-wrap">
	<table id="fes-comments-table">
		<tr>
			<th class="col-author"><?php  _e( 'Author', 'edd_fes' ); ?></th>
			<th class="col-content"><?php  _e( 'Comment', 'edd_fes' ); ?></th>
		</tr>
		<?php echo EDD_FES()->dashboard->render_comments_table( 10 ); ?>
	</table>
</div>