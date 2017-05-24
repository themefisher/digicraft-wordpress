<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Widget_Title extends Widget_Base {

    public function get_name() {
        return 'digicraft-title';
    }

    public function get_title() {
        return __( 'Section Title', 'digicraft' );
    }

    public function get_icon() {
        return 'eicon-button';
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
                'label' => __( 'Content', 'digicraft' ),
            ]
        );

        $this->add_control(
            'section_heading',
            [
                'label'       => __( 'Heading', 'digicraft' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'Get Ticket', 'digicraft' ),
                'placeholder' => __( 'Type your button text here', 'digicraft' ),
            ]
        );

        $this->add_control(
		    'section_desc',
		    [
			    'label'       => __( 'Description', 'digicraft' ),
			    'type'        => Controls_Manager::TEXTAREA,
			    'default'     => __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed, ducimus? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, quidem.', 'digicraft' ),
			    'placeholder' => __( 'Type your button text here', 'digicraft' ),
		    ]
	    );
	    $this->add_control(
		    'border_switch',
		    [
			    'label' => __( 'Show Border', 'digicraft' ),
			    'type' => Controls_Manager::SWITCHER,
			    'default' => 'yes',
			    'label_on' => __( 'Show', 'digicraft' ),
			    'label_off' => __( 'Hide', 'digicraft' ),
			    'return_value' => 'yes',
		    ]

	    );




        $this->end_controls_section();

        $this->start_controls_section(
            'section_style',
            [
                'label' => __( 'Heading Color', 'digicraft' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'rgb_color',
            [
                'label' => __( 'Color', 'digicraft' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .ev-cta' => 'color: {{VALUE}};',
                ],
            ]

        );

       $this->end_controls_section();

        $this->start_controls_section(
            'section_border_style',
            [
                'label' => __( 'Border', 'digicraft' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_control(
            'border_color',
            [
                'label' => __( 'Border Color', 'digicraft' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#fbc02d',
                'selectors' => [
                    '{{WRAPPER}} .ev-cta:before' => 'border-color: {{VALUE}};'
                ],
            ]

        );



        $this->add_control(
            'border_width',
            [
                'label' => __( 'Border Width', 'digicraft' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 4,
                ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 10,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .ev-cta:before, {{WRAPPER}} .ev-cta:after' => 'border-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings();
        ?>
        <div class="section-title">
            <h2><?php echo $settings['section_heading']  ?></h2>
            <p><?php echo $settings['section_desc']  ?></p>
        </div>

<!--        <div class="digicraft-button text---><?php //echo $settings['align']; ?><!--">-->
<!--            --><?php //echo '<a class="ev-cta" href="'.$btn_link['url'].'" '.$target.'>'.$settings['section_heading'].'</a>'; ?>
<!--        </div>-->

    <?php
    }

    protected function _content_template() { ?>

        <div class="section-title">
            <h2>{{ settings.section_heading }}</h2>
            <p>{{ settings.section_desc }}</p>
        </div>

    <?php }
}
