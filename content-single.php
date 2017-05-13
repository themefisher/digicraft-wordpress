<?php
/**
 * @package themefisher
 */
?>

<!-- Single Blog Page -->

<section class="blog-single-page">
    <div class="container">
        <div class="row">
			<div class="container">
				<div class="row">
					<div class="col-md-9 col-md-offset-1">
						<h1 class="blog-single-title"><?php echo single_post_title(); ?></h1>
						<div class="entry-meta">
							<ul>
								<!-- <li>
									<i class="icon-profile-male"></i>
									 <?php // the_author(); ?>
								</li> -->
								<li>
									<i class="icon-calendar"></i> 	<time class="time" itemprop="datePublished"><i class="ion-ios-clock-outline"></i><?php echo get_the_time("M d, Y"); ?></time>
								</li>
								<li>
									<i class="icon-briefcase"></i> <?php echo the_category(","); ?>

								</li>
							</ul>
						</div>
						<div class="block">
			                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="entry-header">
									<?php echo the_post_thumbnail(); ?>
			                    </div><!-- .entry-header -->

								<div class="entry-content">
									<?php the_content(); ?>
								</div><!-- .entry-content -->
								<div class="seo-ratings">Article Ratings
									<?php if(function_exists("kk_star_ratings")) : echo kk_star_ratings($pid); endif; ?>

								</div>
							</article><!-- #post-## -->
		            	</div>
					</div>
				</div>
			</div>
        </div>
    </div>
</section>