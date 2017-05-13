<?php
$task       = ! empty( $_GET['task'] ) ? $_GET['task'] : 'dashboard';
$icon_css   = apply_filters( "fes_vendor_dashboard_menu_icon_css", "icon-white" ); //else icon-black/dark
$menu_items = EDD_FES()->dashboard->get_vendor_dashboard_menu();
?>
<nav class="fes-vendor-menu">
	<div class="dashboard-author-intro">
		<h3>Hello 
			<?php
              	$user = get_user_by('ID', get_current_user_id());
               	echo $user->display_name;
        	?>
		</h3>
		<p>Welcome to Themefisher Dashboard</p>
	</div>
	<ul>
		<?php foreach ( $menu_items as $item => $values ) : $values["task"] = isset( $values["task"] ) ? $values["task"] : ''; ?>
			<li class="fes-vendor-menu-tab <?php echo 'fes-vendor-' . esc_attr( $values["task"] ) . '-tab'; if ( $task === $values["task"] ) { echo ' active'; } ?>">
				<a href='<?php echo add_query_arg( 'task', $values["task"], get_permalink() ); ?>'>
					<i class="icon icon-<?php echo esc_attr( $values["icon"] ); ?> <?php echo esc_attr( $icon_css ); ?>"></i> <span class="hidden-phone hidden-tablet"><?php echo isset( $values["name"] ) ? $values["name"] : $item; ?></span>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
</nav>