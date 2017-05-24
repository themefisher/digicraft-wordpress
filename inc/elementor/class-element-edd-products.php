<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Widget_EDD_Products extends Widget_Base {

    public function get_name() {
        return 'digicraft-products';
    }

    public function get_title() {
        return __( 'EDD Products', 'digicraft' );
    }

    public function get_icon() {
        return 'eicon-form-horizontal';
    }

    public function get_categories() {
        return [ 'digicraft' ];
    }

    /**
     * A list of scripts that the widgets is depended in
     * @since 1.3.0
     **/


    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab',
            [
                'label' => __( 'Product Settings', 'digicraft' ),
            ]
        );

        $this->add_control(
            'product_category',
            [
                'label'       => __( 'Product Category', 'digicraft' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'featured', 'digicraft' ),
                'placeholder' => __( 'Type Product Category Here', 'digicraft' ),
            ]
        );

	    $this->add_control(
		    'product_limit',
		    [
			    'label'       => __( 'Product Limit', 'digicraft' ),
			    'type'        => Controls_Manager::TEXT,
			    'default'     => __( '4', 'digicraft' ),
			    'placeholder' => __( 'Type Product Category Here', 'digicraft' ),
		    ]
	    );


        $this->end_controls_section();



    }

    protected function render() {
        $settings = $this->get_settings();
        ?>
        <div class="clearfix">
        <?php
        $loop = new WP_Query(
        array(
        'post_type' => 'download',
        'posts_per_page' => $settings['product_limit'],
        'post_status'       => 'publish',
        'download_category'=> $settings['product_category'],
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
                        <span class="price"> <i class="tf-pricetags"></i><?php echo do_shortcode('[edd_price]');  ?> </span>
                        <div class="author" ><i class="tf-profile-male"></i><?php the_author();  ?></div>
                    </div>
                    <h4><a href="<?php the_permalink();  ?>"><?php the_title();  ?></a></h4>
                    <p><?php $content = get_the_content(); echo mb_strimwidth($content, 0, 150, '...');  ?></p>
                    <div class="product-buttons">
                        <a href="<?php the_permalink();  ?>" class="btn btn-main-sm">Details</a>
                    </div>
                </div>
            </div>
        </div>
	    <?php endwhile;  endif ;
	    wp_reset_postdata();
	    ?>
        </div>
        <?php

    }

    protected function _content_template() {}
}
