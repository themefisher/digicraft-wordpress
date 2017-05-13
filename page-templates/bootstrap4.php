<?php
/**
* Template Name: Bootstrap 4 Templates
*/
get_header(); ?>




<?php while ( have_posts() ) : the_post(); ?>


<section class="bootstra-4">

    <section class="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <h2>Bootstrap 4 Templates and Resources</h2>
                        <p>Best bootstrap 4 Templates and resources hub</p>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="products free-products mt-180">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title text-center">
                        <h1>Most Amazing Bootstrap 4 templates over the internet.</h1>
                        <p>Themefisher is also a collection of free to download Bootstrap 4 templates.</p>
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
                'posts_per_page'    => 20,
                'download_category'  => 'bootstrap-4'

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
                <?php endwhile; ?>
                <?php endif; wp_reset_postdata(); ?>
            </div> 
        </div>
                <!-- <div class="call-to-action text-center">
                    <a href="#" class="btn btn-call-to-action">Get our entire collection now. All 17+ Templates for $29.</a>
                </div> -->
    </section>

<!-- 
    <section class="resource">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title text-center">
                        <h1>Bootstrap 4 Templates , and easy to use.</h1>
                        <p>Themefisher is also a collection of free to download Bootstrap 4 templates.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
                
                 -->
                


     <?php echo the_content(); ?>
    
</section>




<?php endwhile; // end of the loop. ?>

<?php
get_footer();