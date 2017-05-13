<?php
/**
* Template Name: Contact
*/
get_header(); ?>

<section class="global-title">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="global-title">
					<h1><?php echo single_post_title(); ?></h1>
					
			</div>
			</div>
		</div>
	</div>
</section>

<section id="contact-body">
	<?php while(have_posts()): the_post(); ?>
	    <?php  the_content(); ?>
	<?php endwhile; ?>
	
</section>
<?php get_footer(); ?>