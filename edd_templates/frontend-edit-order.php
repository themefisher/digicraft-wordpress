<?php 
if ( !isset( $_GET['order_id'] ) ) { ?>
	<div class="edd_errors">
		<p class="edd_error"><?php _e('Access Denied','edd_fes'); ?></p> 
	</div>
	<?php
	return;
}
$order_id = isset( $_GET['order_id'] ) ? (int) $_GET['order_id'] : 0;
$key = edd_get_payment_key( $order_id );

if (EDD_FES()->vendors->vendor_can_view_receipt(false, $key)){
	do_action('fes_above_vendor_receipt');
	echo '<h1 class="fes-headers" id="fes-edit-order-page-title">'.__('Order: #','edd_fes').$_GET['order_id'].'</h1>';
	$payment   = get_post( $_GET['order_id'] );
	if ( empty( $payment ) ) : ?>
		<div class="edd_errors">
			<p class="edd_error"><?php _e( 'The specified receipt ID appears to be invalid', 'edd_fes' ); ?></p> 
		</div>
		<?php
		return;
	endif;

	$meta        = edd_get_payment_meta( $payment->ID );
	$cart        = edd_get_payment_meta_cart_details( $payment->ID, true );
	$user        = edd_get_payment_meta_user_info( $payment->ID );
	$email       = edd_get_payment_user_email( $payment->ID );
	$status      = edd_get_payment_status( $payment, true );
	$customer_id = edd_get_payment_customer_id( $payment->ID );
	$customer    = new EDD_Customer( $customer_id );
	?>
	<table id="edd_purchase_receipt">
		<thead>
			<?php do_action( 'fes_payment_receipt_before', $payment ); ?>
			<tr>
				<th><strong><?php _e( 'Payment', 'edd_fes' ); ?>:</strong></th>
				<th><?php echo edd_get_payment_number( $payment->ID ); ?></th>
			</tr>
		</thead>

		<tbody>

			<tr>
				<td class="edd_receipt_payment_status"><strong><?php _e( 'Payment Status', 'edd_fes' ); ?>:</strong></td>
				<td class="edd_receipt_payment_status <?php echo strtolower( $status ); ?>"><?php echo $status; ?></td>
			</tr>

			<tr>
				<td><strong><?php _e( 'Date', 'edd_fes' ); ?>:</strong></td>
				<td><?php echo date_i18n( get_option( 'date_format' ), strtotime( $meta['date'] ) ); ?></td>
			</tr>
			<tr>
				<td><strong><?php _e( 'Name', 'edd_fes' ); ?>:</strong></td>
				<td><?php echo $customer->name; ?></td>
			</tr>
			<tr>
				<td><strong><?php _e( 'Email', 'edd_fes' ); ?>:</strong></td>
				<td><?php echo $email; ?></td>
			</tr>

			<?php if ( ( $fees = edd_get_payment_fees( $payment->ID, 'fee' ) ) ) : ?>
			<tr>
				<td><strong><?php _e( 'Fees', 'edd_fes' ); ?>:</strong></td>
				<td>
					<ul class="edd_receipt_fees">
					<?php foreach( $fees as $fee ) : ?>
						<li>
							<span class="edd_fee_label"><?php echo esc_html( $fee['label'] ); ?></span>
							<span class="edd_fee_sep">&nbsp;&ndash;&nbsp;</span>
							<span class="edd_fee_amount"><?php echo edd_currency_filter( edd_format_amount( $fee['amount'] ) ); ?></span>
						</li>
					<?php endforeach; ?>
					</ul>
				</td>
			</tr>
			<?php endif; ?>

			<?php if ( $user['discount'] != 'none' ) : ?>
				<tr>
					<td><strong><?php _e( 'Discount(s)', 'edd_fes' ); ?>:</strong></td>
					<td><?php echo $user['discount']; ?></td>
				</tr>
			<?php endif; ?>

			<?php if ( edd_use_taxes() ) : ?>
				<tr>
					<td><strong><?php _e( 'Tax', 'edd_fes' ); ?></strong></td>
					<td><?php echo edd_payment_tax( $payment->ID ); ?></td>
				</tr>
			<?php endif; ?>

				<tr>
					<td><strong><?php _e( 'Subtotal', 'edd_fes' ); ?></strong></td>
					<td>
						<?php echo edd_payment_subtotal( $payment->ID ); ?>
					</td>
				</tr>

				<tr>
					<td><strong><?php _e( 'Total Price', 'edd_fes' ); ?>:</strong></td>
					<td><?php echo edd_payment_amount( $payment->ID ); ?></td>
				</tr>

			<?php do_action( 'fes_payment_receipt_after', $payment ); ?>
			<?php do_action( 'edd_payment_receipt_after', $payment, array() ); ?>
		</tbody>
	</table>

	<?php do_action( 'fes_payment_receipt_after_table', $payment ); ?>



		<h3><?php echo apply_filters( 'fes_payment_receipt_products_title', __( 'Products', 'edd_fes' ) ); ?></h3>

		<table id="edd_purchase_receipt_products">
			<thead>
				<th><?php _e( 'Name', 'edd_fes' ); ?></th>
				<?php if ( edd_use_skus() ) { ?>
					<th><?php _e( 'SKU', 'edd_fes' ); ?></th>
				<?php } ?>
				<?php if ( edd_item_quantities_enabled() ) : ?>
					<th><?php _e( 'Quantity', 'edd_fes' ); ?></th>
				<?php endif; ?>
				<th><?php _e( 'Price', 'edd_fes' ); ?></th>
			</thead>

			<tbody>
			<?php if ( $cart ) : ?>
				<?php foreach ( $cart as $key => $item ) : ?>
					<?php if ( empty( $item['in_bundle'] ) ) : ?>
					<tr>
						<td>

							<?php
							$price_id       = edd_get_cart_item_price_id( $item );
							$download_files = edd_get_download_files( $item['id'], $price_id );
							$download_item  = get_post( $item['id'] );
							$is_vendor_prod = $download_item->post_author == get_current_user_id() ? true : false;
							?>

							<div class="edd_purchase_receipt_product_name">
								<?php 
									if ( $is_vendor_prod ){
										echo esc_html( $item['name'] );
									}
									else{
										echo sprintf( __('Another %s\'s %s', 'edd_fes' ), EDD_FES()->helper->get_vendor_constant_name( $plural = false, $uppercase = true ), EDD_FES()->helper->get_product_constant_name( $plural = false, $uppercase = false ) );
									} 

									?>
								<?php if ( ! is_null( $price_id ) && $is_vendor_prod ) : ?>
								<span class="edd_purchase_receipt_price_name">&nbsp;&ndash;&nbsp;
									<?php echo edd_get_price_option_name( $item['id'], $price_id, $payment->ID ); ?></span>
								<?php endif; ?>
							</div>

							<?php if ( $is_vendor_prod ) : ?>
								<div class="edd_purchase_receipt_product_notes"><?php echo wpautop( edd_get_product_notes( $item['id'] ) ); ?></div>
							<?php endif; ?>

							<?php
							if ( edd_is_payment_complete( $payment->ID ) && $is_vendor_prod ) : ?>
							<ul class="edd_purchase_receipt_files">
								<?php
								if ( ! empty( $download_files ) && is_array( $download_files ) ) :
									foreach ( $download_files as $filekey => $file ) :
										$download_url = edd_get_download_file_url( $meta['key'], $email, $filekey, $item['id'], $price_id );
										?>
										<li class="edd_download_file">
											<a href="<?php echo esc_url( $download_url ); ?>" class="edd_download_file_link"><?php echo edd_get_file_name( $file ); ?></a>
										</li>
										<?php
										do_action( 'edd_receipt_files', $filekey, $file, $item['id'], $payment->ID, $meta );
									endforeach;
								elseif ( edd_is_bundled_product( $item['id'] ) ) :
									$bundled_products = edd_get_bundled_products( $item['id'] );
									foreach( $bundled_products as $bundle_item ) : ?>
										<li class="edd_bundled_product">
											<span class="edd_bundled_product_name"><?php echo get_the_title( $bundle_item ); ?></span>
											<ul class="edd_bundled_product_files">
												<?php
												$download_files = edd_get_download_files( $bundle_item );
												if ( $download_files && is_array( $download_files ) ) :
													foreach ( $download_files as $filekey => $file ) :
														$download_url = edd_get_download_file_url( $meta['key'], $email, $filekey, $bundle_item, $price_id ); ?>
														<li class="edd_download_file">
															<a href="<?php echo esc_url( $download_url ); ?>" class="edd_download_file_link"><?php echo esc_html( $file['name'] ); ?></a>
														</li>
														<?php
														do_action( 'edd_receipt_bundle_files', $filekey, $file, $item['id'], $bundle_item, $payment->ID, $meta );
													endforeach;
												else :
													echo '<li>' . __( 'No downloadable files found for this bundled item.', 'edd_fes' ) . '</li>';
												endif;
												?>
											</ul>
										</li>
										<?php
									endforeach;
								else :
									echo '<li>' . apply_filters( 'edd_receipt_no_files_found_text', __( 'No downloadable files found.', 'edd_fes' ), $item['id'] ) . '</li>';
								endif; ?>
							</ul>
							<?php endif; ?>

						</td>
						<?php if ( edd_use_skus() && $is_vendor_prod ) : ?>
							<td><?php echo edd_get_download_sku( $item['id'] ); ?></td>
						<?php endif; ?>
						<?php if ( edd_item_quantities_enabled()  ) { ?>
							<td><?php echo $item['quantity']; ?></td>
						<?php } ?>
						<td>
							<?php if ( empty( $item['in_bundle'] ) && $is_vendor_prod ) : // Only show price when product is not part of a bundle ?>
								<?php echo edd_currency_filter( edd_format_amount( $item[ 'price' ] ) ); ?>
							<?php endif; ?>
						</td>
					</tr>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endif; ?>
			<?php if ( ( $fees = edd_get_payment_fees( $payment->ID, 'item' ) ) ) : ?>
				<?php foreach( $fees as $fee ) : ?>
					<tr>
						<td class="edd_fee_label"><?php echo esc_html( $fee['label'] ); ?></td>
						<?php if ( edd_item_quantities_enabled() ) : ?>
							<td></td>
						<?php endif; ?>
						<td class="edd_fee_amount"><?php echo edd_currency_filter( edd_format_amount( $fee['amount'] ) ); ?></td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
			</tbody>

		</table>
	<?php
	do_action('fes_below_vendor_receipt', $order_id );
}
else{ ?>
	<div class="edd_errors">
		<p class="edd_error"><?php _e('Access Denied','edd_fes'); ?></p> 
	</div>
	<?php
	return;
}