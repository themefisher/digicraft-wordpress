<?php


//Edd Shortcodes
add_shortcode('swift-product' , 'swift_products_func');
function swift_products_func ($atts){
	ob_start();

	$option = shortcode_atts(
		array(
			'product-limit' => '6',
			'product-category' => '',
		),$atts
	);
	$product_limit = $option['product-limit'];
	$product_category = $option['product-category'];
	$loop = new WP_Query(
		array(
			'post_type' => 'download',
			'posts_per_page' => $product_limit,
			'post_status'       => 'publish',
			'download_category'=> $product_category,
		)
	);
	if($loop->have_posts()) :
		while ($loop->have_posts()): $loop->the_post() ;  ?>
			<div class="col-md-4">
				<div class="product-item">
					<div class="product-thumb">
						<a href="">
							<?php the_post_thumbnail();  ?>
						</a>
					</div>
					<div class="content">
						<div class="product-meta">
							<span class="price"> <i class="tf-pricetags"></i> </span>
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
		<?php endwhile;  endif ;
	return ob_get_clean();
}

//Section Title Shortcode
add_shortcode('section-title', function($atts){
	ob_start();
	$option = shortcode_atts(
		array(
			'title' => 'Featured Products',
			'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, facilis!',
		),$atts
	);?>
	<div class="section-title">
		<h2><?php echo $option['title']  ?></h2>
		<p><?php echo $option['description']  ?></p>
	</div>
	<?php
	return ob_get_clean();
});

add_filter('widget_text','do_shortcode');



//Testimonial Shortcode
add_shortcode('swift-testimonial',function($atts){
	ob_start();
	?>
	<section class="testimonial section">
		<div class="container">
			<div class="row">
				<div class="testimonial-icon text-center">
					<i class="tf-quote"></i>
				</div>
				<div class="col-lg-12">
					<div id="testimonials" >
						<?php
						$testimonial_items = cs_get_option( 'testimonial_item' );
						//
						foreach($testimonial_items as $testimonial_item):?>
							<div class="item text-center">
								<div class="client-details">
									<p><?php echo $testimonial_item['testimonial_message']  ?></p>
								</div>
								<div class="client-thumb">
									<img src="<?php echo $testimonial_item['testimonial_image']  ?>" class="img-responsive" alt="">
								</div>
								<div class="client-meta">
									<h4><?php echo $testimonial_item['testimonial_user']  ?></h4>
									<span><?php echo $testimonial_item['testimonial_designation']  ?></span>
								</div>
							</div>
						<?php endforeach; ?>

					</div>
				</div>
			</div>
		</div>
	</section>
	<?php
	return ob_get_clean();
});


//Feature Shortcode
add_shortcode('swift-features' , function($atts){
ob_start(); ?>
	<section class="service">
		<div class="container">
			<div class="row text-center">
				<?php $service_items_box = cs_get_option('service_item_group');
					foreach($service_items_box as $service_item):?>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="service-item">
                                <i class="<?php echo $service_item['service_icon']; ?>"></i>
                                <h4><?php echo $service_item['service_title'];  ?></h4>
                                <p><?php echo $service_item['service_desc']  ?></p>
                            </div>
                        </div>
					<?php endforeach;  ?>
				</div>
            </div>
        </section>
<?php
return ob_get_clean();

});



// Email Subscription
add_shortcode('swift-subscription',function($atts) {
	ob_start(); ?>
	<section class="call-to-action section">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
				<h2><?php echo cs_get_option('subscription_title')  ?></h2>
				<p><?php echo cs_get_option('subscription_desc')  ?></p>
				<div class="col-lg-6 col-md-offset-3">
					<div class="subscription-form">
						<?php echo do_shortcode(cs_get_option('subscription_shortcode'))  ?>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php return ob_get_clean();
});
