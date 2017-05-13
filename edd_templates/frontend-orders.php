<?php global $orders; ?>
<h1 class="fes-headers" id="fes-orders-page-title"><?php _e( 'Orders', 'edd_fes' ); ?></h1>

<table class="table fes-table table-condensed  table-striped" id="fes-order-list">
	<thead>
		<tr>
			<th><?php _e( 'Order', 'edd_fes' ); ?></th>
			<th><?php _e( 'Status', 'edd_fes' ); ?></th>
			<th><?php _e( 'Total', 'edd_fes' ); ?></th>
			<th><?php _e( 'Customer', 'edd_fes' ) ?></th>
			<th><?php _e( 'View Order','edd_fes') ?></th>
			<?php do_action('fes-order-table-column-title'); ?>
			<th><?php _e( 'Date', 'edd_fes' ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php
		if (count($orders) > 0 ){
		foreach ( $orders as $order ) : ?>
			<tr>
				<td class = "fes-order-list-td"><?php echo EDD_FES()->dashboard->order_list_title($order->ID); ?></td>
				<td class = "fes-order-list-td"><?php echo EDD_FES()->dashboard->order_list_status($order->ID); ?></td>
				<td class = "fes-order-list-td"><?php echo EDD_FES()->dashboard->order_list_total($order->ID); ?></td>
				<td class = "fes-order-list-td"><?php echo EDD_FES()->dashboard->order_list_customer($order->ID); ?></td>
				<td class = "fes-order-list-td"><?php EDD_FES()->dashboard->order_list_actions($order->ID); ?></td>
				<?php do_action('fes-order-table-column-value', $order); ?>
				<td class = "fes-order-list-td"><?php echo EDD_FES()->dashboard->order_list_date($order->ID); ?></td>
			</tr>
		<?php endforeach;
		}
		else{
			echo '<tr><td colspan="6">'.__('No orders found','edd_fes').'</td></tr>';
		}
		?>
	</tbody>
</table>
<?php EDD_FES()->dashboard->order_list_pagination();