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
class Widget_Testimonial_Carousel extends Widget_Base
{

    public function get_name()
    {
        return 'testimonial-carousel';
    }

    public function get_title()
    {
        return __('Testimonial Carousel', 'DigiCraft');
    }

    public function get_icon()
    {
        return 'eicon-testimonial';
    }

    public function get_categories()
    {
        return ['digicraft'];
    }

    /**
     * A list of scripts that the widgets is depended in
     *
     * @since 1.3.0
     **/
    /*
        public function get_script_depends() {
            return [ 'imagesloaded' ];
        }
    */

    protected function _register_controls()
    {
        $this->start_controls_section(
            'section_tab',
            [
                'label' => __('Testimonial', 'DigiCraft'),
            ]
        );

        $this->add_control(
            'testimonials',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'testimonial_name',
                        'label' => __('Name', 'DigiCraft'),
                        'type' => Controls_Manager::TEXT,
                        'default' => __('John Doe', 'DigiCraft'),
                        'placeholder' => __('Name', 'DigiCraft'),
                    ],
                    [
                        'name' => 'testimonial_job',
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
        $testimonials = $this->get_settings('testimonials');

        ?>

        <section class="testimonial section">
            <div class="container">
                <div class="row">
                    <div class="testimonial-icon text-center">
                        <i class="tf-quote"></i>
                    </div>
                    <div id="testimonials" >
                            <?php foreach ($testimonials as $testimonial) :
                            $has_content = !!$testimonial['testimonial_content'];
                            $has_image = !!$testimonial['testimonial_image']['url'];
                            $has_name = !!$testimonial['testimonial_name'];
                            $has_job = !!$testimonial['testimonial_job'];

                            ?>
                                <div class="item text-center">
                                    <div class="client-details">
	                                    <?php if ($has_content): ?>
                                            <p> <?php echo $testimonial['testimonial_content']; ?> </p>
	                                    <?php endif; ?>
                                    </div>
	                                <?php if ($has_image): ?>
                                        <div class="client-thumb">
                                                <img src="<?php echo esc_attr($testimonial['testimonial_image']['url']); ?>"
                                                     alt="<?php echo esc_attr(Control_Media::get_image_alt($testimonial['testimonial_image'])); ?>"/>
                                            </div>
                                    <?php endif; ?>
                                    <div class="client-meta">
	                                    <?php if ($has_name): ?>
                                            <h4 class="testimonial-name"> <?php echo $testimonial['testimonial_name']; ?> </h4>
	                                    <?php endif; ?>
	                                    <?php if ($has_job): ?>
                                            <span class="testimonial-job"> <?php echo $testimonial['testimonial_job']; ?> </span>
	                                    <?php endif; ?>
                                    </div>
                                </div>
                        <?php endforeach; ?>

                        </div>
                </div>
            </div>
        </section>

        <?php
    }

    protected function _content_template() { }
}
