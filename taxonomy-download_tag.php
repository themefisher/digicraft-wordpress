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
			<section id="blog-single-page">
				<div class="container">
					<div class="row">
						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								?>
								<div class="col-md-4 col-sm-6 col-xs-12" >
                            <div class="product-wrapper">
                                
                              <div class="product-block">
                                    <div class="product-thumb">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php if(has_post_thumbnail( )): the_post_thumbnail(); endif; ?>
                                        </a>
                                        <!-- <span class="badge">Pro</span> -->
                                        <div class="product-buttons">
                                            <ul>
                                                <li><a href="<?php the_permalink(); ?>" class="btn btn-default btn-demo">Details</a></li>
                                                <li><a target="_blank" href="<?php $text = get_post_meta( get_the_ID(), '_tf_demo_url', true ); echo $text;
                                        ?>" class="btn btn-default btn-download">Preivew</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-meta">
                                            <!-- <span class="product-counter"> <i class="tf-ion-android-cart"></i> -->
                                            <?php // echo edd_get_download_sales_stats( get_the_ID() ); ?>
                                            <!-- </span> -->
                                            <span class="price">
                                                <?php echo do_shortcode('[edd_price]') //edd_price_range(); ?>
                                            </span>

                                        </div>
                                        <h4 class="product-title">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php echo get_post_meta( get_the_ID(), '_tf_template_title', true );  ;?>
                                            </a>
                                        </h4>
                                        <p>
                                            <?php $text = get_post_meta( get_the_ID(), '_tf_template_des', true ); echo $text;?>
                                        </p>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>


								<?php
								// get_template_part( 'template-parts/content', get_post_format() );

							endwhile;


						else :

							get_template_part( 'template-parts/content', 'none' );

						endif; ?>
							
						
					</div>
				</div>
				
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>