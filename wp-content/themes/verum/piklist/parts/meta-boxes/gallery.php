<?php
/**
 * Title:External Gallery
 * Post Type:post
 */
piklist('field', array(
    'type' => 'select',
    'field' => 'verum_gallery_type',
    'label' => __('Gallery Images', 'verum'),

    'choices' => array(
        'carousel' => __('Carousel', 'verum'),
        'justified' => __('Justified', 'verum'),

    ),
));
piklist('field', array(
    'type' => 'file'
    , 'field' => 'verum_gallery'
    , 'scope' => 'post_meta'
    , 'label' => __('Gallery Images', 'verum')
    , 'options' => array(
        'modal_title' => __('Add Image', 'verum'),
        'save' => 'id',
    ),
    'add_more' => true,
));
