<?php
/**
* Template Name: Premium HTML Templates
*/
get_header(); ?>




<?php while ( have_posts() ) : the_post(); ?>


<section class="products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="global-title pro-product-title">
                    <h1><?php echo the_title(); ?></h1>
                    <p>From startups to street art projects, we have templates to fit your every project. <br> You just need to pick.</p>
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
                'download_category'  => 'premium'

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
    </div>
</section>


<?php endwhile; // end of the loop. ?>




<?php
get_footer();