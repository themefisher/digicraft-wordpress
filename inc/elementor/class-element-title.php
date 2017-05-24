<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Widget_Eventas_Button extends Widget_base {

    public function get_name() {
        return 'digicraft-title';
    }

    public function get_title() {
        return __( 'title', 'digicraft' );
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
    /*
        public function get_script_depends() {
            return [ 'imagesloaded' ];
        }
    */

    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab',
            [
                'label' => __( 'Content', 'digicraft' ),
            ]
        );

        $this->add_control(
            'btn_text',
            [
                'label'       => __( 'Text', 'digicraft' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'Get Ticket', 'digicraft' ),
                'placeholder' => __( 'Type your button text here', 'digicraft' ),
            ]
        );

        $this->add_control(
            'btn_link',
            [
                'label'   => __( 'Action URL', 'digicraft' ),
                'type'    => Controls_Manager::URL,
                'show_external' => true, // Show the 'open in new tab' button.
            ]
        );

        $this->add_control(
            'align',
            [
                'label'   => __( 'Alignment', 'digicraft' ),
                'type'    => Controls_Manager::CHOOSE,
                'default' => 'left',
                'options' => [
                    'left'    => [
                        'title' => __( 'Left', 'digicraft' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'digicraft' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'digicraft' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style',
            [
                'label' => __( 'Text Color', 'digicraft' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'reg_color',
            [
                'label' => __( 'Color', 'digicraft' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .ev-cta' => 'color: {{VALUE}};',
                ],
            ]

        );

        $this->add_control(
            'hover_color',
            [
                'label' => __( 'Hover Color', 'digicraft' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .ev-cta:hover' => 'color: {{VALUE}};',
                ],
            ]

        );

        $this->add_control(
            'active_color',
            [
                'label' => __( 'Active Color', 'digicraft' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .ev-cta:active' => 'color: {{VALUE}};',
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
            'border_color_1',
            [
                'label' => __( 'Border One Color', 'digicraft' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#fbc02d',
                'selectors' => [
                    '{{WRAPPER}} .ev-cta:before' => 'border-color: {{VALUE}};'
                ],
            ]

        );

        $this->add_control(
            'border_color_2',
            [
                'label' => __( 'Border Two Color', 'digicraft' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .ev-cta:after' => 'border-color: {{VALUE}};'
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

        $this->add_control(
            'border_spacing',
            [
                'label' => __( 'Border Spacing', 'digicraft' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 2,
                ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 10,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .ev-cta:before' => 'transform: translate(-{{SIZE}}{{UNIT}}, -{{SIZE}}{{UNIT}});',
                    '{{WRAPPER}} .ev-cta:after' => 'transform: translate({{SIZE}}{{UNIT}}, {{SIZE}}{{UNIT}});',
                    '{{WRAPPER}} .ev-cta:hover:before, {{WRAPPER}} .ev-cta:hover:after' => 'transform: translate(0{{UNIT}}, 0{{UNIT}});',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings();
        $btn_link = $settings['btn_link'];
        $target = $btn_link['is_external'] ? 'target="_blank"' : '';
        ?>

        <div class="digicraft-button text-<?php echo $settings['align']; ?>">
            <?php echo '<a class="ev-cta" href="'.$btn_link['url'].'" '.$target.'>'.$settings['btn_text'].'</a>'; ?>
        </div>

    <?php
    }

    protected function _content_template() { ?>
        <# var target = settings.btn_link.is_external ? 'target="_blank"' : ''; #>

        <div class="digicraft-button text-{{ settings.align }}">
           <a class="ev-cta" href="{{ settings.btn_link.url }}" {{ target }}>{{ settings.btn_text }}</a>
        </div>

    <?php }
}
