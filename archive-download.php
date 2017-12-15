<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package themefisher
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-title">
				<?php
					the_archive_title( '<h1>', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			<section id="blog-single-page" class="page-wrapper">
				<div class="container">
					<div class="row">
						<div class="block">
							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post(); ?>
								<div class="col-md-4">
						            <div class="product-item">
						                <div class="product-thumb">
						                    <a href="<?php the_permalink();  ?>">
											    <?php the_post_thumbnail();  ?>
						                    </a>
						                </div>
						                <div class="content">
						                    <div class="product-meta">
						                        <span class="price"> <i class="tf-pricetags"></i><?php echo do_shortcode('[edd_price]');  ?> </span>
						                        <div class="author" ><i class="tf-profile-male"></i><?php the_author();  ?></div>
						                    </div>
						                    <h4><a href="<?php the_permalink();  ?>"><?php the_title();  ?></a></h4>
						                    <p><?php $content = get_the_content(); echo mb_strimwidth($content, 0, 130, '...');  ?></p>
						                    <div class="product-buttons">
						                        <a href="<?php the_permalink();  ?>" class="btn btn-main-sm">Details</a>
						                    </div>
						                </div>
						            </div>
						        </div>


						<?php endwhile; endif; ?>
						</div>
					</div>
				</div>
				
			</section>
			
			

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>









