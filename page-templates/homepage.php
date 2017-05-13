<?php
/**
* Template Name: Homepage Template
*/
get_header(); ?>




        <section class="banner">
            <div id='stars'></div>
            <div id='stars2'></div>
            <div id='stars3'></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block text-center">
                            <h1>A Hub of Amazing Bootstrap & HTML5 Templates</h1>
                            <h2>
                                Amazing website templates that are Incredible for your next project 
                                <br> with fresh elegant designs.</h2>
                            <a class="btn btn-default btn-light" href="<?php echo esc_url( home_url( '/' ) ); ?>free-bootstrap-templates">Discover Templates</a>
                        </div>
                        <div class="featured-product text-center mt-20">
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Banner -->


        <section class="featured-product section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title">
                            <h2>Top Selling Templates</h2>
                            <p>Take your website to the next level with templates <br> recommended by the developer/editor himself</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                   <!--========                ========
                ======== Free HTML Templates
                ========                ========
            -->
                <?php
                $args = array(
                'post_type'         => 'download',
                'post_status'       => 'publish',
                'posts_per_page'    => 3,
                'download_category'  => 'featured'

                );
                $download_query = new WP_Query( $args );
                if($download_query->have_posts()):  ?>
                <?php while($download_query->have_posts()): $download_query->the_post(); ?>


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
                    <?php endwhile; ?>
                    <?php endif; wp_reset_postdata(); ?>
                </div>
            </div>
        </section><!-- End Products -->


        <section id="products" class="latest-products bg-gray section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title">
                            <h2>Recent Templates</h2>
                            <p>Find the latest additions to the awesomeness that are HTML templates, <br> fresh off the boat. Check out our latest releases here. </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                       <!--========                ========
                    ======== Free HTML Templates
                    ========                ========
                -->
                    <?php
                    $args = array(
                    'post_type'         => 'download',
                    'post_status'       => 'publish',
                    'posts_per_page'    => 12,
                    'download_category'  => 'freebies,premium'

                    );
                    $download_query = new WP_Query( $args );
                    if($download_query->have_posts()):  ?>
                    <?php while($download_query->have_posts()): $download_query->the_post(); ?>
                        
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
                    <?php endwhile; ?>
                    <?php endif; wp_reset_postdata(); ?>
                </div>
            </div>
        </section><!-- End Products -->

        <section id="products" class="latest-products section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title">
                            <h2>Popular Templates</h2>
                            <p>Choose from the templates that our users love; the ones with the most downloads <br> and unbeaten records in awesomeness</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                       <!--========                ========
                    ======== Free HTML Templates
                    ========                ========
                -->
                    <?php
                    $args = array(
                    'post_type'         => 'download',
                    'post_status'       => 'publish',
                    'posts_per_page'    => 6,
                    'download_category'  => 'popular'

                    );
                    $download_query = new WP_Query( $args );
                    if($download_query->have_posts()):  ?>
                    <?php while($download_query->have_posts()): $download_query->the_post(); ?>
                        
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
                    <?php endwhile; ?>
                    <?php endif; wp_reset_postdata(); ?>
                </div>
            
            </div>
        </section><!-- End Products -->

        
<?php  get_footer(); ?>

