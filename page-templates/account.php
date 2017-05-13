<?php
/**
* Template Name: Account
*/
get_header(); ?>


<section class="account">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<?php echo do_shortcode('[edd_login]') ?>
			</div>
			<div class="col-md-6">
				<?php echo do_shortcode('[edd_register]') ?>
			</div>
		</div>
	</div>
</section>


<?php get_footer(); ?>