<?php
/**
 * Template Name: Product Gallery Page
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
	<section class="page-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<main id="main" class="site-main" role="main">
						<div class="global-title">
							<h1><?php echo the_title(); ?></h1>
						</div>
						<?php echo the_content(); ?>
					</main><!-- #main -->
				</div>
			</div>
		</div>
	</section>
<?php endwhile; // End of the loop. ?>


<?php get_footer(); ?>