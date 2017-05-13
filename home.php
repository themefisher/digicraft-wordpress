<?php
/**
 * 
 * @package themefisher
 */

get_header(); 
?>
	
		<main id="main" class="site-main"  role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">

			<section class="global-title">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1><?php echo single_post_title(); ?></h1>
							<h2>Probably the best resource collection</h2>
						</div>
					</div>
				</div>
			</section>

			<?php if ( have_posts() ) : ?>
			<section class="blog-page">
			    <div class="container">
			        <div class="block">
		            	<div class="row">
		            		<div class="col-md-12">
			            		<?php /* Start the Loop */ ?>
									<?php while ( have_posts() ) : the_post(); ?>
										<?php get_template_part( 'content', get_post_format() );
											?>
									<?php endwhile; ?>
								<?php else : ?>
										<?php get_template_part( 'content', 'none' ); ?>
								<?php endif; ?>
		            		</div>
		            	</div>
			        </div>
				</div>
			</section>

		</main><!-- #main -->
		
		
<?php get_footer(); ?>
