<?php

use elementor\Widget_Base;
use elementor\Controls_Manager;
use elementor\Utils;
use elementor\Control_Media;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Eventas Testimonial Carousel
 *
 * DigiCraft widget for Testimonial Carousel.
 *
 * @since 1.0.0
 */
class Widget_Features extends Widget_Base
{

    public function get_name()
    {
        return 'Features';
    }

    public function get_title()
    {
        return __('Features', 'DigiCraft');
    }

    public function get_icon()
    {
        return 'eicon-info-box';
    }

    public function get_categories()
    {
        return ['digicraft'];
    }



    protected function _register_controls()
    {
        $this->start_controls_section(
            'section_tab',
            [
                'label' => __('Features', 'DigiCraft'),
            ]
        );

        $this->add_control(
            'features',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'feaure_icon',
                        'label' => __('Name', 'DigiCraft'),
                        'type' => Controls_Manager::TEXT,
                    ],
                ],
                'title_field' => '{{{ testimonial_name }}}',
            ]
        );


        $this->end_controls_section();

    }

    protected function render()
    {
        $features = $this->get_settings('features');

        ?>
        <div id="testimonials" >
            <?php foreach ($features as $feature) : ?>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="service-item">
                        <i class=""></i>
                        <h4></h4>
                        <p></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>


        <?php
    }

    protected function _content_template() { }
}
