<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
	<section class="default-page">
		<div class="global-title page-title">
			<h1><?php echo the_title(); ?></h1>
		</div>
	</section>
	<section class="page-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</section>

<?php endwhile; // End of the loop. ?>


<?php get_footer();