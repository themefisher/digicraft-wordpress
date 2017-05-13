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

<div class="wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
						<div class="global-title">
							<h1><?php echo the_title(); ?></h1>
							
						</div>
						<?php while ( have_posts() ) : the_post(); ?>


							<?php
								echo the_content();
							?>

						<?php endwhile; // End of the loop. ?>

					</main><!-- #main -->
				</div><!-- #primary -->
			</div>
		</div>
	</div>
</div>


<?php get_footer(); ?>