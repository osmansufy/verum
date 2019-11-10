<?php
/**
 * Title:About Page Data
 * Post type:page
 * Template:page-templates/about-page
 */
piklist('field', array(
    'type' => 'file'
    , 'field' => 'about_img'

    , 'scope' => 'post_meta'
    , 'label' => 'About Image'
    , 'options' => array(
        'modal_title' => 'Add Image'
        , 'button' => 'Add Image',

    ),
));
piklist('field', array(
    'type' => 'text'
    , 'field' => 'designation'
    , 'scope' => 'post_meta'
    , 'label' => 'Designation',
    'attributes' => array(
        'class' => 'large-text',
    ),

));
piklist('field', array(
    'type' => 'textarea'
    , 'field' => 'teaser_text'
    , 'scope' => 'post_meta'
    , 'label' => 'Teaser text',
    'attributes' => array(
        'class' => 'large-text',
        'rows' => '8',
    ),

));
piklist('field', array(
    'type' => 'file'
    , 'field' => 'about_signature'
    , 'scope' => 'post_meta'
    , 'label' => 'About signature'
    , 'options' => array(
        'modal_title' => 'Add Image'
        , 'button' => 'Add Image',
    ),
));
piklist('field', array(
    'type' => 'group',
    'field' => 'social_link',
    'label' => 'Social Link',
    'fields' => array(
        array(
            'type' => 'text'
            , 'field' => 'facebook'
            , 'scope' => 'post_meta'
            , 'label' => 'Facebook_link',
        ),

        array(
            'type' => 'text'
            , 'field' => 'twitter'
            , 'scope' => 'post_meta'
            , 'label' => 'Twitter_link',

        ),
        array(
            'type' => 'text'
            , 'field' => 'google_plus'
            , 'scope' => 'post_meta'
            , 'label' => 'Google-plus_link',
        ),
    ),

));
