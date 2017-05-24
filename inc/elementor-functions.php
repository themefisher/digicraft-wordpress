<?php

namespace Elementor;

function digicraft_elementor_init()
{
    Plugin::instance()->elements_manager->add_category(
        'digicraft',
        [
            'title' => __('Digicraft Elements', 'eventas'),
            'icon' => 'eicon-font'
        ],
        1
    );
}

add_action('elementor/init', 'Elementor\digicraft_elementor_init');

