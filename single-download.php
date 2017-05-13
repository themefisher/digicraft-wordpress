<?php 
	/**
 * The template for displaying all single posts.
 *
 * @package themefisher
 */
$demo_url       = get_post_meta( get_the_ID(), '_tx_demo_url', true );
get_header();


 ?>

<?php while ( have_posts() ) : the_post(); ?>


<header class="overly-product-header">
  <nav class="navbar " >
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="navbar-brand template-title">
        	<h1><?php the_title(); ?></h1>
        </div>
      </div>
  
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        	<ul class="nav navbar-nav navbar-right menu product-buttons clearfix">
        		<li class="buy-button">
	                <a data-scroll data-options='{
                    "speed": 500,
                    "easing": "easeInOutCubic",
                    "offset": 90
                }' href="#price-widget" class="btn btn-default">Download Now</a>
				</li>
				</ul>
      		</div><!-- /.navbar-collapse -->
    	</div>
	</nav>
</header>









<div class="single-product-page">
	 <section class="product-page-header">
	 	<div class="container">
	 		<div class="row">
	 			<div class="col-md-12">
 					<h2 class="product-header">
						<?php the_title(); ?>
					</h2>
					<div class="breadcrumbs">
						<?php if ( function_exists('yoast_breadcrumb') ) {
							yoast_breadcrumb('<p id="breadcrumbs">','</p>');
						} ?>
					</div>
	 			</div>
	 		</div>
	 	</div>
	 </section>
		
	<section class="product-description">
		<div class="container">
			
			<div class="row">
				<div class="col-md-8">
					<div class="product-details">
					<div class="product-img">
		 					<img class="img-responsive" itemprop="image" src="<?php 
		                      // Grab the metadata from the database
		                      $text = get_post_meta( get_the_ID(), '_tf_template_img', true ); echo $text;
		                      ?>" >
						</div>
                      	<div class="product-description-content" >
	                    	<?php the_content(); ?>
                      	</div>
                      	<div id="comments-section">
		                    <div id="disqus_thread"></div>
		                    <script type="text/javascript">
		                    /* * * CONFIGURATION VARIABLES * * */
		                        var disqus_shortname = 'themefisher';

		                        /* * * DON'T EDIT BELOW THIS LINE * * */
		                        (function() {
		                        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
		                        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
		                        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
		                        })();
		                    </script>
		                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
		                </div>
					</div>
	 			</div>

	 			

					<!-- Single Product Page Sidebar -->
				<div class="col-md-4">
					<div class="product-sidebar widget" id="price-widget">
						<div class="price-widget" >
							<div class="product-price">
								<?php echo do_shortcode('[edd_price]')?>
								<?php if(  edd_get_download_price(get_the_ID()) > '0.00' ): ?>
									<p class="notification">That's about 3 cups of coffee</p>
								<?php endif  ?>
							</div>
							<?php if(  edd_get_download_price(get_the_ID()) > '0.00' ): ?>
								<ul class="pricing-feature-list">
									<li class="pricing-feature"><i class="tf-ion-ios-flame"></i>Royalty free use</li>
									<li class="pricing-feature"><i class="tf-ion-help-buoy"></i>1 months priority support</li>
									<li class="pricing-feature"><i class="tf-ion-ios-people"></i>Use in client project</li>
									<li class="pricing-feature"><i class="tf-ion-ios-paw"></i>Free lifetime updates</li>
									<li class="pricing-feature"><i class="tf-ion-document-text"></i>Documentation included</li>
									<li class="pricing-feature"><i class="tf-ion-flag"></i>Free Updates</li>
									<li class="pricing-feature"><i class="tf-ion-ios-cloud-download"></i>Lifetime Downloads</li>
								</ul>
							<?php endif; ?>
							<?php 
							global $post;
							$variable = '0';
							$variable_meta = get_post_meta($post->ID, '_variable_pricing', true);
							if($variable_meta == '1'):?>
								<div class="pricing-feature-tab">
									<!-- Nav tabs -->
									<ul class="nav nav-tabs" role="tablist">
									    <li role="presentation" class="active"><a href="#pro" aria-controls="pro" role="tab" data-toggle="tab">Why Premium Version ?</a></li>
									    <li role="presentation"><a href="#free" aria-controls="free" role="tab" data-toggle="tab">Free Features</a></li>
									</ul>

									  <!-- Tab panes -->
									  <div class="tab-content">
									    <div role="tabpanel" class="tab-pane active" id="pro">
									    	<ul class="pricing-feature-list">
												<li class="pricing-feature"><i class="tf-ion-ios-flame"></i>Royalty free use</li>
												<li class="pricing-feature"><i class="tf-ion-help-buoy"></i>1 months priority support</li>
												<li class="pricing-feature"><i class="tf-ion-ios-people"></i>Use in client project</li>
												<li class="pricing-feature"><i class="tf-ion-ios-paw"></i>Free lifetime updates</li>
												<li class="pricing-feature"><i class="tf-ion-document-text"></i>Documentation included</li>
												<li class="pricing-feature"><i class="tf-ion-flag"></i>Free Updates</li>
												<li class="pricing-feature"><i class="tf-ion-ios-cloud-download"></i>Lifetime Downloads</li>
											</ul>
									    </div>
									    <div role="tabpanel" class="tab-pane" id="free">
									    	<ul class="pricing-feature-list">
									    		<li class="pricing-feature"><i class="tf-ion-document"></i>Limited Pages</li>
									    		<li class="pricing-feature"><i class="tf-ion-android-person"></i>Only Personal Usages</li>
									    		<li class="pricing-feature"><i class="tf-ion-closed-captioning"></i>Keep Footer Credits</li>
												<li class="pricing-feature"><i class="tf-ion-help-buoy"></i>No support</li>
												<li class="pricing-feature"><i class="tf-ion-ios-paw"></i>Free lifetime updates</li>
												<li class="pricing-feature"><i class="tf-ion-document-text"></i>No Documentation</li>
												<li class="pricing-feature"><i class="tf-ion-flag"></i>No Updates</li>
												<li class="pricing-feature"><i class="tf-ion-ios-cloud-download"></i>Limited Downloads</li>
											</ul>
									    </div>
									</div>
									
								</div>


							<?php endif; ?>
							<ul class="product-buttons clearfix">

					            <li class="buy-button">
					                <?php echo edd_get_purchase_link(get_the_ID()); ?>
					            </li>

					            <li>
					                <a target="_blank" class="btn btn-live-preview" href="<?php 
					                  // Grab the metadata from the database
					                  $text = get_post_meta( get_the_ID(), '_tf_demo_url', true ); echo $text;
					                  ?>">Live Preview</a>
					            </li>
					            <!-- <li>
					            	<a class="btn btn-buy-license" href="<?php // echo esc_url( home_url( '/' ) ); ?>license">Licence</a>
					            </li> -->
							</ul>
						</div>
					</div>
		            <?php if(  edd_get_download_price(get_the_ID()) == '0.00' ): ?>
						<div class="widget donation-widget">
							<h4>Donate this author</h4>
					        <form class="text-center" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
								<input type="hidden" name="cmd" value="_s-xclick">
								<input type="hidden" name="hosted_button_id" value="JEP4HB3GJVWTJ">
								<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
								<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
							</form>
 						</div>
		            <?php endif; ?>
					<div class="product-features-items-widget widget">
						<h4>Product Shot List</h4>
						<ul>
							<li><span>Last Update</span><?php echo get_post_meta( get_the_ID(), '_tf_last_update', true );  ;?></li>
							<li><span>Release Date</span><?php echo get_the_date(); ?></li>
							<li><span>Version</span><?php echo get_post_meta( get_the_ID(), '_tf_product_version', true );  ;?></li>
							<li><span>Technology Used</span><?php echo get_post_meta( get_the_ID(), '_tf_technology_used', true );  ;?></li>
							
							<li><span>Categories</span>
								<?php
									$aa = get_the_terms(get_the_ID(), 'download_category');
								?>
								<?php if ($aa): ?>
									<?php foreach($aa as $bb): ?>
										<a href="<?php echo get_term_link($bb->term_id) ?>">
										  <?php echo $bb->name; ?>
										</a>
									<?php endforeach; ?>
								<?php endif; ?>
							</li>
							<li><span>Tags</span>
								<?php
									$aa = get_the_terms(get_the_ID(), 'download_tag');
								?>
								<?php if ($aa): ?>
									<?php foreach($aa as $bb): ?>
										<a href="<?php echo get_term_link($bb->term_id) ?>">
										  <?php echo $bb->name; ?>,
										</a>
									<?php endforeach; ?>
								<?php endif; ?>
							</li>
							<li><span>Browsers</span><?php echo get_post_meta( get_the_ID(), '_tf_browsers', true );  ;?></li>
							<li><span>Type</span><?php echo get_post_meta( get_the_ID(), '_tf_item_type', true );  ;?></li>
							<li><span>Ratings</span><?php if(function_exists("kk_star_ratings")) : echo kk_star_ratings($pid); endif; ?></li>

						</ul>
					</div>

					<div class="author-widget widget">
						<h4>Theme Author</h4>
						<span class="author-img">
							<?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
						</span>
						<span class="author-name">
							<?php the_author(); ?>
						</span>
					</div>
				</div>


			</div>
		</div>
	</section>



	<section class="related-post">
		<div class="container">
		    <div class="row">
		        <div class="col-md-12">
		            <h2 class="sub-title">Related Items</h2>
		        </div>
		    </div>
		    <div class="row">
		       <?php
		        $args = array(
		            'post_type' => 'download',
		            'posts_per_page' => 3,
		            'category__in'  => wp_get_post_categories($post->ID),
		            'orderby'   =>'rand',
		            'post__not_in'  => array($post->ID),
		            'post_status' => 'publish'
		        );
		        $loop = new wp_query( $args );
		        if( $loop->have_posts() ) :
		        while ($loop->have_posts()) : $loop->the_post(); 
		        if (has_post_thumbnail()) :  ?>
		         <div class="col-md-4 col-sm-6 col-xs-12" >
                    <div class="product-wrapper">
                        <div class="product-block">
                            <div class="product-thumb">
                                <a href="">
                                    <?php if(has_post_thumbnail( )): the_post_thumbnail(); endif; ?>
                                </a>
                                <!-- <span class="badge">Pro</span> -->
                                <div class="product-buttons">
                                    <ul>
                                        <li><a target="_blank" href="<?php the_permalink(); ?>" class="btn btn-default btn-demo">Details</a></li>
                                        <li><a target="_blank" href="<?php $text = get_post_meta( get_the_ID(), '_tf_demo_url', true ); echo $text;
                                ?>" class="btn btn-default btn-download">Preivew</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="product-meta">
                                    <span class="product-counter"> <i class="tf-ion-android-cart"></i>
                                        <?php echo edd_get_download_sales_stats( get_the_ID() ); ?>

                                    </span>
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
		        endif; // end if post thumbnail
		        endwhile;  
		        wp_reset_query(); 
		        endif;// if post  ?>

		     </div>
		</div>
	</section>
</div>




<?php endwhile; // end of the loop. ?>


<?php get_footer(); ?>
