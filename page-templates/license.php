<?php
/**
 * Template Name: License
 */
get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title text-center">
                    <h1><?php echo the_title(); ?></h1>
                    <h2>A community afford building modern Templates to power the modern design.</h2>
                </div>
            </div>
        </div>
    </div>
    <section class="license-pricing">
        <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="pricing-item">
                        <h3 class="pricing-title">Free Item</h3>
                        <div class="pricing-price"><span class="pricing-currency">$</span>0.0</div>
                        <p class="pricing-sentence">Perfect for single freelancers who work by themselves</p>
                        <ul class="pricing-feature-list">
                            <li class="pricing-feature">Support forum</li>
                            <li class="pricing-feature">Free hosting</li>
                            <li class="pricing-feature">40MB of storage space</li>
                        </ul>
                        <div class="pricing-buy-button">
                            <a href="" class="pricing-action">Choose plan</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="pricing-item">
                        <h3 class="pricing-title">Single Template</h3>
                        <div class="pricing-price">
                            <span class="pricing-discount">
                                <span class="pricing-currency">$</span>20
                            </span>
                        <span class="pricing-currency">$</span>12</div>
                        <p class="pricing-sentence">Suitable for small businesses with up to 5 employees</p>
                        <ul class="pricing-feature-list">
                            <li class="pricing-feature">One Selected Theme</li>
                            <li class="pricing-feature">Credit Removal Permission</li>
                            <li class="pricing-feature">Support via Forum</li>
                            <li class="pricing-feature">1 Domain Usage</li>
                        </ul>
                        <div class="pricing-buy-button">
                            <a href="" class="pricing-action">Choose plan</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="pricing-item active">
                        <h3 class="pricing-title">All Templates</h3>
                        <div class="pricing-price">
                            <span class="pricing-discount">
                                <span class="pricing-currency">$</span>99
                            </span>
                        <span class="pricing-currency">$</span>29</div>
                        <p class="pricing-sentence">Great for large businesses with more than 5 employees</p>
                        <ul class="pricing-feature-list">
                            <li class="pricing-feature">14+ Templates included</li>
                            <li class="pricing-feature">Credit Removal Permission</li>
                            <li class="pricing-feature">Lifetime Support</li>
                            <li class="pricing-feature">Unlimited Domain Usage</li>
                            <li class="pricing-feature">Access All New Templates</li>
                        </ul>
                        <div class="pricing-buy-button">
                            <a href="" class="pricing-action">Choose plan</a>
                        </div>
                    </div>
                </div>
        </div>
    </section>
</div>

<?php endwhile; // end of the loop. ?>


<?php get_footer(); ?>