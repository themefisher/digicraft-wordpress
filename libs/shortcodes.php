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




add_shortcode('testimonial',function($atts){
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


