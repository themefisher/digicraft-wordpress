<?php
/* Template Name: Homepage */
get_header(); ?>
<!--
Welcome Slider
==================================== -->


<?php if(have_posts()) :  ?>
    <?php while(have_posts()) : the_post();  ?>
        <?php the_content();  ?>
    <?php endwhile;  ?>
<?php endif;  ?>


<section class="hero-area bg-1 background">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img class="img-responsive" src="<?php echo cs_get_option('slider_img');  ?>" alt="">

            </div>


            <div class="col-md-6">
                <div class="block">

                    <h1><?php echo cs_get_option( 'slider_heading' );  ?></h1>
                    <p><?php echo cs_get_option( 'slider_description' );  ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="featured-items section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>Welcome To <span>Featured Items</span></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed, ducimus? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, quidem.</p>
                </div>
            </div>
        </div>
        <div class="row mt-20 product-items-wrapper">
            <?php
                $loop = new WP_Query(
	                array(
		                'post_type' => 'download',
		                'posts_per_page' => 3,
		                'post_status'       => 'publish',
		                'download_category'=>'featured',
	                )
                );
            ?>

	        <?php if($loop->have_posts()) : ?>
                    <?php while ($loop->have_posts()): $loop->the_post() ;  ?>
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
                                    <span class="price"> <i class="tf-pricetags"></i> <?php edd_price($post->ID); ?></span>
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
                    <?php endwhile;  ?>
            <?php endif ;  ?>
        </div>
    </div>
</section>

<section class="featured-items section bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>Welcome To <span>Recent Items</span></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed, ducimus? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, quidem.</p>
                </div>
            </div>
        </div>
        <div class="row mt-20 product-items-wrapper">
            <?php
            $args = array(
	            'post_type' => 'download',
	            'posts_per_page' => 6,
            );
                $loop = new WP_Query($args);
            ?>

            <?php if($loop->have_posts()) : ?>
                <?php while($loop->have_posts()) : $loop->the_post()  ?>
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
                                    <span class="price"> <i class="tf-pricetags"></i> <?php edd_price($post->ID); ?></span>
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
                <?php endwhile;  ?>
            <?php endif;  ?>
        </div>
    </div>
</section>

<!--
Start About Section
==================================== -->
<?php  if(cs_get_option('service_switcher')) :  ?>
<section class="service section">
    <div class="container">
        <div class="row text-center">
            <!-- section title -->
            <div class="title text-center" >
                <h2>Amazing Features</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <!-- /section title -->
            <?php
                $service_items_box = cs_get_option('service_item_group');
                foreach($service_items_box as $service_item):?>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="service-item">
                    <i class="<?php echo $service_item['service_icon']; ?>"></i>
                    <h4><?php echo $service_item['service_title'];  ?></h4>
                    <p><?php echo $service_item['service_desc']  ?></p>
                </div>
            </div><!-- END COL -->
            <?php endforeach;  ?>

        </div>
    </div>    <!-- End container -->
</section>   <!-- End section -->
<?php endif;  ?>

<!-- Start Testimonial
		=========================================== -->


<?php $switcher = cs_get_option('testimonial_switcher'); if($switcher):  ?>
    <section class="testimonial section">
    <div class="container">
        <div class="row">
            <div class="testimonial-icon text-center">
                <i class="tf-quote"></i>
            </div>
            <div class="col-lg-12">
                <!-- testimonial wrapper -->
                <div id="testimonials" >
	                <?php
	                $testimonial_items = cs_get_option( 'testimonial_item' );
//
	                foreach($testimonial_items as $testimonial_item):?>
                        <div class="item text-center">
                        <!-- client info -->
                            <div class="client-details">
                            <p><?php echo $testimonial_item['testimonial_message']  ?></p>
                            </div>
                        <!-- /client info -->
                        <!-- client photo -->
                            <div class="client-thumb">
                            <img src="<?php echo $testimonial_item['testimonial_image']  ?>" class="img-responsive" alt="">
                            </div>
                            <div class="client-meta">
                                <h4><?php echo $testimonial_item['testimonial_user']  ?></h4>
                                <span><?php echo $testimonial_item['testimonial_designation']  ?></span>
                            </div>
                        <!-- /client photo -->
                        </div>
                        <!-- /testimonial single -->
	                <?php endforeach; ?>

                    <!-- testimonial single -->

                </div>		<!-- end testimonial wrapper -->
            </div> 		<!-- end col lg 12 -->
        </div>	    <!-- End row -->
    </div>       <!-- End container -->
</section>    <!-- End Section -->
<?php endif;  ?>
<!--
Start Call To Action
==================================== -->

<?php if(cs_get_option('subscription_switcher')):  ?>
<section class="call-to-action section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2><?php echo cs_get_option('subscription_title')  ?></h2>
                <p><?php echo cs_get_option('subscription_desc')  ?></p>
                <div class="col-lg-6 col-md-offset-3">
                    <div class="subscription-form">
                        <?php echo do_shortcode(cs_get_option('subscription_shortcode'))  ?>
<!--                        <input type="text" class="form-control" placeholder="Enter Your Email Address">-->
<!--                        <span class="input-group-btn">-->
<!--				        <button class="btn btn-main" type="button">Subscribe Now!</button>-->
<!--				      </span>-->
                    </div><!-- /input-group
                </div><!-- /.col-lg-6 -->

            </div>
        </div> 		<!-- End row -->
    </div>   	<!-- End container -->
</section>   <!-- End section -->
<?php endif;  ?>


<?php get_footer(); ?>
