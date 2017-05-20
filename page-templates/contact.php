<?php
/**
* Template Name: Contact
*/
get_header(); ?>

<section class="page-title">
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

<section class="contact-form page-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <?php while(have_posts()): the_post(); ?>
                    <?php  the_content(); ?>
                <?php endwhile; ?>

            </div>
        </div>
    </div>

</section>
<?php get_footer(); ?>