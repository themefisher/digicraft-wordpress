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
                    [
                        'name' => 'feature_name',
                        'label' => __('Job', 'DigiCraft'),
                        'type' => Controls_Manager::TEXT,
                        'default' => __('Designer', 'DigiCraft'),
                        'placeholder' => __('Job', 'DigiCraft'),
                    ],
                    [
                        'name' => 'testimonial_image',
                        'label' => __('Add Image', 'DigiCraft'),
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'testimonial_content',
                        'label' => __('Write Testimonial', 'DigiCraft'),
                        'type' => Controls_Manager::TEXTAREA,
                        'rows' => '10',
                        'default' => 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec <span>ullamcorper mattis</span>, pulvinar dapibus leo.',
                    ],
                ],
                'title_field' => '{{{ testimonial_name }}}',
            ]
        );


        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings('features');

        ?>
        <div id="testimonials" >

                            <?php foreach ($features as $feature) : ?>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="service-item">
                                        <i class="<?php echo $settings['service_icon']; ?>"></i>
                                        <h4><?php echo $settings['service_title'];  ?></h4>
                                        <p><?php echo $settings['service_desc']  ?></p>
                                    </div>
                                </div>

                        <?php endforeach; ?>

                        </div>

        <?php
    }

    protected function _content_template() { }
}
