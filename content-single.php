<?php
/**
 * @package themefisher
 */
?>

<!-- Single Blog Page -->

<section class="blog-single-page page-wrapper">
    <div class="container">
        <div class="row">
			<div class="container">
				<div class="row">
					<div class="col-md-12 post">
                        <div class="post-thumb">
	                        <?php echo  the_post_thumbnail( array(500, 300) );  ?>
                        </div>
                        <h2 class="post-title"><?php echo single_post_title(); ?></h2>
						<div class="entry-meta post-meta">
                            <ul>
                                <li>
                                    <i class="tf-ion-android-person"></i>
									<?php  the_author(); ?>
                                </li>
                                <li>
                                    <i class="tf-ion-ios-calendar"></i> 	<time class="time" itemprop="datePublished"><i class="ion-ios-clock-outline"></i><?php echo get_the_time("M d, Y"); ?></time>
                                </li>
                                <li>
                                    <i class="tf-ion-ios-pricetags"></i>  <?php echo the_category(","); ?>
                                </li>

                            </ul>
                        </div>
						<div class="block">
			                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="entry-content post-content">
									<?php the_content(); ?>
								</div><!-- .entry-content -->
							</article><!-- #post-## -->
		            	</div>
					</div>
				</div>
			</div>
        </div>
    </div>
</section>