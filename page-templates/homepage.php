<?php
/* Template Name: Homepage */
get_header(); ?>
<!--
Welcome Slider
==================================== -->

<section class="hero-area bg-1 background">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img class="img-responsive" src="<?php echo get_template_directory_uri() ?>/assets/images/slider/showcase.jpg" alt="">
            </div>
            <div class="col-md-6">
                <div class="block">
                    <h1>Digital Creative Marketplace</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam, ipsam.</p>
                    <a data-scroll href="#services" class="btn btn-main">Explore Themes</a>
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
                $loop = new wp_query(
                        array(
                                'post_type' => 'download',
                                'post_per_page' => 1,
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
                                    <span class="price"> <i class="tf-pricetags"></i><?php do_shortcode('[edd_price]')  ?></span>
                                    <a class="author" href=""><i class="tf-profile-male"></i><?php the_author();  ?></a>
                                </div>
                                <h4><a href="<?php the_permalink();  ?>"><?php the_title();  ?></a></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt, animi.</p>
                                <div class="product-buttons">
                                    <a href="" class="btn btn-main-sm">Details</a>
                                    <a href="" class="btn btn-live-preview">Live Preivew</a>
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
            <div class="col-md-4">
                <div class="product-item">
                    <div class="product-thumb">
                        <a href="">
                            <img class="img-responsive" src="images/products/product-item-1.jpg" alt="">
                        </a>
                    </div>
                    <div class="content">
                        <div class="product-meta">
                            <span class="price"> <i class="tf-pricetags"></i> $45</span>
                            <a class="author" href=""><i class="tf-profile-male"></i>Jonathon Ive</a>
                        </div>
                        <h4><a href="">Blue- Business Template</a></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt, animi.</p>
                        <div class="product-buttons">
                            <a href="" class="btn btn-main-sm">Details</a>
                            <a href="" class="btn btn-live-preview">Live Preivew</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-item">
                    <div class="product-thumb">
                        <a href="">
                            <img class="img-responsive" src="images/products/product-item-2.jpg" alt="">
                        </a>
                    </div>
                    <div class="content">
                        <div class="product-meta">
                            <span class="price"> <i class="tf-pricetags"></i> $45</span>
                            <a class="author" href=""><i class="tf-profile-male"></i>Jonathon Ive</a>
                        </div>
                        <h4><a href="">Blue- Business Template</a></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt, animi.</p>
                        <div class="product-buttons">
                            <a href="" class="btn btn-main-sm">Details</a>
                            <a href="" class="btn btn-live-preview">Live Preivew</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-item">
                    <div class="product-thumb">
                        <a href="">
                            <img class="img-responsive" src="images/products/product-item-3.jpg" alt="">
                        </a>
                    </div>
                    <div class="content">
                        <div class="product-meta">
                            <span class="price"> <i class="tf-pricetags"></i> $45</span>
                            <a class="author" href=""><i class="tf-profile-male"></i>Jonathon Ive</a>
                        </div>
                        <h4><a href="">Blue- Business Template</a></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt, animi.</p>
                        <div class="product-buttons">
                            <a href="" class="btn btn-main-sm">Details</a>
                            <a href="" class="btn btn-live-preview">Live Preivew</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-item">
                    <div class="product-thumb">
                        <a href="">
                            <img class="img-responsive" src="images/products/product-item-4.jpg" alt="">
                        </a>
                    </div>
                    <div class="content">
                        <div class="product-meta">
                            <span class="price"> <i class="tf-pricetags"></i> $45</span>
                            <a class="author" href=""><i class="tf-profile-male"></i>Jonathon Ive</a>
                        </div>
                        <h4><a href="">Blue- Business Template</a></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt, animi.</p>
                        <div class="product-buttons">
                            <a href="" class="btn btn-main-sm">Details</a>
                            <a href="" class="btn btn-live-preview">Live Preivew</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-item">
                    <div class="product-thumb">
                        <a href="">
                            <img class="img-responsive" src="images/products/product-item-5.jpg" alt="">
                        </a>
                    </div>
                    <div class="content">
                        <div class="product-meta">
                            <span class="price"> <i class="tf-pricetags"></i> $45</span>
                            <a class="author" href=""><i class="tf-profile-male"></i>Jonathon Ive</a>
                        </div>
                        <h4><a href="">Blue- Business Template</a></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt, animi.</p>
                        <div class="product-buttons">
                            <a href="" class="btn btn-main-sm">Details</a>
                            <a href="" class="btn btn-live-preview">Live Preivew</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-item">
                    <div class="product-thumb">
                        <a href="">
                            <img class="img-responsive" src="images/products/product-item-6.jpg" alt="">
                        </a>
                    </div>
                    <div class="content">
                        <div class="product-meta">
                            <span class="price"> <i class="tf-pricetags"></i> $45</span>
                            <a class="author" href=""><i class="tf-profile-male"></i>Jonathon Ive</a>
                        </div>
                        <h4><a href="">Blue- Business Template</a></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt, animi.</p>
                        <div class="product-buttons">
                            <a href="" class="btn btn-main-sm">Details</a>
                            <a href="" class="btn btn-live-preview">Live Preivew</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--
Start About Section
==================================== -->
<section class="service-2 section">
    <div class="container">
        <div class="row text-center">
            <!-- section title -->
            <div class="title text-center" >
                <h2>Amazing Features</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <!-- /section title -->

            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="service-item">
                    <i class="tf-ion-ios-alarm-outline"></i>
                    <h4>Time Management</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae risus nec dui venenatis.</p>
                </div>
            </div><!-- END COL -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="service-item">
                    <i class="tf-ion-ios-albums-outline"></i>
                    <h4>Marketing Ideas</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae risus nec dui venenatis.</p>
                </div>
            </div><!-- END COL -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="service-item">
                    <i class="tf-ion-ios-analytics-outline"></i>
                    <h4>Mail Support</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae risus nec dui venenatis.</p>
                </div>
            </div><!-- END COL -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="service-item">
                    <i class="tf-ion-ios-bell-outline"></i>
                    <h4>System Alert</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae risus nec dui venenatis.</p>
                </div>
            </div><!-- END COL -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="service-item">
                    <i class="tf-ion-ios-cart-outline"></i>
                    <h4>Shopping System</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae risus nec dui venenatis.</p>
                </div>
            </div><!-- END COL -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="service-item">
                    <i class="tf-ion-ios-chatbubble-outline"></i>
                    <h4>24/7 Support</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae risus nec dui venenatis.</p>
                </div>
            </div><!-- END COL -->
        </div>
    </div>    <!-- End container -->
</section>   <!-- End section -->

<!-- Start Testimonial
		=========================================== -->

<section class="testimonial section">
    <div class="container">
        <div class="row">
            <div class="testimonial-icon text-center">
                <i class="tf-quote"></i>
            </div>
            <div class="col-lg-12">
                <!-- testimonial wrapper -->
                <div id="testimonials" >

                    <!-- testimonial single -->
                    <div class="item text-center">
                        <!-- client info -->
                        <div class="client-details">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum nulla, soluta dolorum. Eos earum, magni asperiores, unde corporis labore, enim, voluptatum officiis voluptates alias natus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, officia. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, quia?</p>
                        </div>
                        <!-- /client info -->
                        <!-- client photo -->
                        <div class="client-thumb">
                            <img src="images/client-logo/clients-1.png" class="img-responsive" alt="">
                        </div>
                        <div class="client-meta">
                            <h4>Josef Anderson</h4>
                            <span>CEO , Company Name</span>
                        </div>
                        <!-- /client photo -->
                    </div>
                    <!-- /testimonial single -->

                    <!-- testimonial single -->
                    <div class="item text-center">
                        <!-- client info -->
                        <div class="client-details">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum nulla, soluta dolorum. Eos earum, magni asperiores, unde corporis labore, enim, voluptatum officiis voluptates alias natus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, officia. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, quia?</p>
                        </div>
                        <!-- /client info -->
                        <!-- client photo -->
                        <div class="client-thumb">
                            <img src="images/client-logo/clients-1.png" class="img-responsive" alt="">
                        </div>
                        <div class="client-meta">
                            <h4>Josef Anderson</h4>
                            <span>CEO , Company Name</span>
                        </div>
                        <!-- /client photo -->
                    </div>
                    <!-- /testimonial single -->
                    <!-- testimonial single -->
                    <div class="item text-center">
                        <!-- client info -->
                        <div class="client-details">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum nulla, soluta dolorum. Eos earum, magni asperiores, unde corporis labore, enim, voluptatum officiis voluptates alias natus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, officia. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, quia?</p>
                        </div>
                        <!-- /client info -->
                        <!-- client photo -->
                        <div class="client-thumb">
                            <img src="images/client-logo/clients-1.png" class="img-responsive" alt="">
                        </div>
                        <div class="client-meta">
                            <h4>Josef Anderson</h4>
                            <span>CEO , Company Name</span>
                        </div>
                        <!-- /client photo -->
                    </div>
                    <!-- /testimonial single -->

                </div>		<!-- end testimonial wrapper -->
            </div> 		<!-- end col lg 12 -->
        </div>	    <!-- End row -->
    </div>       <!-- End container -->
</section>    <!-- End Section -->

<!--
Start Call To Action
==================================== -->
<section class="call-to-action section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>Get Free Updates about our template, Join Our mailing List</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, <br> facilis numquam impedit ut sequi. Minus facilis vitae excepturi sit laboriosam.</p>
                <div class="col-lg-6 col-md-offset-3">
                    <div class="input-group subscription-form">
                        <input type="text" class="form-control" placeholder="Enter Your Email Address">
                        <span class="input-group-btn">
				        <button class="btn btn-main" type="button">Subscribe Now!</button>
				      </span>
                    </div><!-- /input-group -->
                </div><!-- /.col-lg-6 -->

            </div>
        </div> 		<!-- End row -->
    </div>   	<!-- End container -->
</section>   <!-- End section -->



<?php get_footer(); ?>
