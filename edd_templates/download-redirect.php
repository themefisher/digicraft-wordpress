<?php
global $wp_query;

// Pull user data if available
if ( is_user_logged_in() ) {
	$user = new WP_User( get_current_user_id() );
}

$email = isset( $user ) ? $user->user_email : '';
$fname = isset( $user ) ? $user->user_firstname : '';
$lname = isset( $user ) ? $user->user_lastname : '';

$rname = edd_get_option( 'edd_free_downloads_require_name', false ) ? ' <span class="edd-free-downloads-required">*</span>' : '';

// Get EDD vars
$color = edd_get_option( 'checkout_color', 'blue' );
$color = ( $color == 'inherit' ) ? '' : $color;
$label = edd_get_option( 'edd_free_downloads_modal_button_label', __( 'Download Now', 'edd-free-downloads' ) );
?>
<form id="edd_free_download_form" method="post">
	<?php do_action( 'edd_free_downloads_before_redirect_form', $wp_query ); ?>

	<p>
		<label for="edd_free_download_email" class="edd-free-downloads-label"><?php _e( 'Email Address', 'edd-free-downloads' ); ?> <span class="edd-free-downloads-required">*</span></label>
		<input type="text" name="edd_free_download_email" id="edd_free_download_email" class="edd-free-download-field" placeholder="<?php _e( 'Email Address', 'edd-free-downloads' ); ?>" value="<?php echo $email; ?>" />
	</p>

	<?php if ( edd_get_option( 'edd_free_downloads_get_name', false ) ) : ?>
	<p>
		<label for="edd_free_download_fname" class="edd-free-downloads-label"><?php echo __( 'First Name', 'edd-free-downloads' ) . $rname; ?></label>
		<input type="text" name="edd_free_download_fname" id="edd_free_download_fname" class="edd-free-download-field" placeholder="<?php _e( 'First Name', 'edd-free-downloads' ); ?>" value="<?php echo $fname; ?>" />
	</p>

	<p>
		<label for="edd_free_download_lname" class="edd-free-downloads-label"><?php echo __( 'Last Name', 'edd-free-downloads' ) . $rname; ?></label>
		<input type="text" name="edd_free_download_lname" id="edd_free_download_lname" class="edd-free-download-field" placeholder="<?php _e( 'Last Name', 'edd-free-downloads' ); ?>" value="<?php echo $lname; ?>" />
	</p>
	<?php endif; ?>

	<?php if ( edd_get_option( 'edd_free_downloads_user_registration', false ) && ! is_user_logged_in() && ! class_exists( 'EDD_Auto_Register' ) ) : ?>
	<hr />

	<?php do_action( 'edd_free_downloads_before_redirect_form_registration', $wp_query ); ?>

	<p>
		<label for="edd_free_download_username" class="edd-free-downloads-label"><?php _e( 'Username', 'edd-free-downloads' ); ?> <span class="edd-free-downloads-required">*</span></label>
		<input type="text" name="edd_free_download_username" id="edd_free_download_username" class="edd-free-download-field" placeholder="<?php _e( 'Username', 'edd-free-downloads' ); ?>" value="" />
	</p>

	<p>
		<label for="edd_free_download_pass" class="edd-free-downloads-label"><?php _e( 'Password', 'edd-free-downloads' ); ?> <span class="edd-free-downloads-required">*</span></label>
		<input type="password" name="edd_free_download_pass" id="edd_free_download_pass" class="edd-free-download-field" />
	</p>

	<p>
		<label for="edd_free_download_pass2" class="edd-free-downloads-label"><?php _e( 'Confirm Password', 'edd-free-downloads' ); ?> <span class="edd-free-downloads-required">*</span></label>
		<input type="password" name="edd_free_download_pass2" id="edd_free_download_pass2" class="edd-free-download-field" />
	</p>

	<?php do_action( 'edd_free_downloads_after_redirect_form_registration', $wp_query ); ?>

	<?php endif; ?>

	<?php if ( edd_get_option( 'edd_free_downloads_newsletter_optin', false ) && edd_free_downloads_has_newsletter_plugin() ) : ?>
	<p>
		<input type="checkbox" name="edd_free_download_optin" id="edd_free_download_optin" checked="checked" />
		<label for="edd_free_download_optin" class="edd-free-downloads-checkbox-label"><?php echo edd_get_option( 'edd_free_downloads_newsletter_optin_label', __( 'Subscribe to our newsletter', 'edd-free-downloads' ) ); ?></label>
	</p>
	<?php endif; ?>

	<?php if ( edd_get_option( 'edd_free_downloads_show_notes', false ) ) : ?>
		<div class="edd-free-downloads-note-wrapper">
			<div class="edd-free-downloads-note-title"><strong></strong></div>
			<p class="edd-free-downloads-note-content"></p>
		</div>
		<?php
//		$title = edd_get_option( 'edd_free_downloads_notes_title', '' );
//		$notes = edd_get_option( 'edd_free_downloads_notes', '' );

//		echo '<hr />';

//		if ( $title !== '' ) {
//			echo '<strong>' . esc_attr( $title ) . '</strong>';
//		}

//		echo '<div>' . wpautop( stripslashes( $notes ) ) . '</div>';
		?>
	<?php endif; ?>

	<?php do_action( 'edd_free_downloads_after_redirect_form', $wp_query ); ?>

	<input type="hidden" name="edd_free_download_check" value="" />

	<?php echo wp_nonce_field( 'edd_free_download_nonce', 'edd_free_download_nonce', true, false ); ?>

	<div class="edd-free-download-errors">
		<?php
		foreach ( edd_free_downloads_form_errors() as $error => $message ) {
			echo '<p id="edd-free-download-error-' . $error . '">';
			echo '<strong>' . __( 'Error:', 'edd-free-downloads' ) . '</strong> ' . $message;
			echo '</p>';
		}
		?>
	</div>

	<input type="hidden" name="edd_action" value="free_download_process" />
	<input type="hidden" name="edd_free_download_id" value="<?php echo $wp_query->query_vars['download_id']; ?>" />
	<button name="edd_free_download_submit" class="edd-free-download-submit edd-submit button <?php echo $color; ?>"><span><?php echo $label; ?></span></button>
	<button name="edd_free_download_cancel" class="edd-free-download-cancel edd-submit button <?php echo $color; ?>"><span><?php _e( 'Cancel', 'edd-free-downloads' ); ?></span></button>

	<?php if ( edd_get_option( 'edd_free_downloads_direct_download' ) ) : ?>
		<?php
		$link_text = edd_get_option( 'edd_free_downloads_direct_download_label', __( 'No thanks, proceed to download', 'edd-free-downloads' ) );

		echo '<div class="edd-free-downloads-direct-download"><a href="#" class="edd-free-downloads-direct-download-link">' . $link_text . '</a></div>';
		?>
	<?php endif; ?>

	<?php do_action( 'edd_free_downloads_after_download_button', $post ); ?>
</form>

<script type="text/javascript">
	jQuery(document).ready(function ($) {
		$("#edd_free_download_email").focus();
		$("#edd_free_download_email").select();
	});
</script>

<?php exit; ?>
