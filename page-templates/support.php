<?php
/**
* Template Name: Support Page
*/
get_header(); ?>

<section class="global-title">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1><?php echo single_post_title(); ?></h1>
				<h2>Feel Free To Drop Us AN Email Anytime, We’D Love To Hear From You</h2>
			</div>
		</div>
	</div>
</section>

<section id="contact-body">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<?php while(have_posts()): the_post(); ?>
				    <?php  the_content(); ?>
				<?php endwhile; ?>
			</div>

			<div class="col-md-3">
				<div class="tutorial-sidebar">
					<?php require get_template_directory() . '/inc/tutorial-sidebar.php'; ?>
				</div>
			</div>
			
		</div>
	</div>
</section>




<?php get_footer(); ?>