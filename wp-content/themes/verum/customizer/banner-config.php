<?php
if (class_exists('Kirki')) {

    Kirki::add_section('verum_banner_section', array(
        'title' => esc_html__('Banner Settings', 'verum'),

        'panel' => 'verum_panel',
        'priority' => 160,
        'active_callback' => function () {
            return is_front_page();

        },

    ));
    Kirki::add_field('verum_options', [
        'type' => 'switch',
        'settings' => 'banner_display',
        'label' => esc_html__('Banner Display', 'verum'),
        'section' => 'verum_banner_section',
        'default' => '1',
        'priority' => 10,

    ]);
    Kirki::add_field('verum_options', [
        'type' => 'select',
        'settings' => 'banner_style',
        'label' => esc_html__('Banner Style', 'verum'),
        'section' => 'verum_banner_section',
        'default' => '1',
        'priority' => 10,
        'choices' => [

            '1' => esc_html__('Banner  Style 1', 'verum'),
            '2' => esc_html__('Banner Style 2', 'verum'),
            '3' => esc_html__('Banner  Style 3', 'verum'),

        ],
        'active_callback' => array(
            array(
                'setting' => 'banner_display',
                'value' => '1',
                'operator' => '==',
            ),
        ),
    ]);
    Kirki::add_field('verum_options', [
        'type' => 'repeater',
        'label' => esc_html__('Banner Post', 'verum'),
        'section' => 'verum_banner_section',
        'priority' => 10,
        'row_label' => [
            'type' => 'field',
            'value' => esc_html__('your custom value', 'verum'),
            'field' => 'post',
        ],
        'button_label' => esc_html__("Add new", 'verum'),
        'settings' => 'banner_post',

        'fields' => [
            'post' => [
                'type' => 'select',
                'label' => esc_html__('Banner Post', 'verum'),
                'choices' => Kirki_Helper::get_posts(array(
                    'posts_per_page' => -1,
                    'post_status' => 'publish',
                    'post_type' => 'post',
                )),

            ],

        ],
        'active_callback' => array(
            array(
                'setting' => 'banner_display',
                'value' => '1',
                'operator' => '==',
            ),
        ),

    ]);
}