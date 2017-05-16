<?php
/**
 * The template for displaying all single posts.
 *
 * @package themefisher
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

	<?php
		if ( have_posts() ) : ?>

			<header class="download-category-title">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<?php
								the_archive_title( '<h1 class="page-title">', '</h1>' );
								the_archive_description( '<div class="taxonomy-description">', '</div>' );
							?>
						</div>
					</div>
				</div>
			</header><!-- .page-header -->
			<section id="section">
				<div class="container">
					<div class="row">
						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post(); ?>
                            <div class="col-md-4">
                                <div class="product-item">
                                    <div class="product-thumb">
                                        <a href="">
											<?php the_post_thumbnail();  ?>
                                        </a>
                                        <!--                                <span class="badge">Pro</span>-->
                                    </div>
                                    <div class="content">
                                        <div class="product-meta">
                                            <span class="price"> <i class="tf-pricetags"></i><?php echo do_shortcode('[edd_price]')  ?></span>
                                            <a class="author" href=""><i class="tf-profile-male"></i><?php the_author();  ?></a>
                                        </div>
                                        <h4><a href="<?php the_permalink();  ?>"><?php the_title();  ?></a></h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt, animi.</p>
                                        <div class="product-buttons">
                                            <a href="<?php the_permalink();  ?>" class="btn btn-main-sm">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                        else :
                        	get_template_part( 'template-parts/content', 'none' );
                        endif; ?>
					</div>
				</div>
            </section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>