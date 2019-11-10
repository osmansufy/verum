<?php
/**
 * Title:About Page Data
 * Post type:page
 * Template:page-templates/contact-page
 */

piklist('field', array(
    'type' => 'text'
    , 'field' => 'verum_sub_heading'
    , 'scope' => 'post_meta'
    , 'label' => 'Sub_heading',
    'attributes' => array(
        'class' => 'large-text',
    ),

));
piklist('field', array(
    'type' => 'text'
    , 'field' => 'verum_contact_shortcode'
    , 'scope' => 'post_meta'
    , 'label' => __('Contact_form_7', 'verum'),
    'attributes' => array(
        'class' => 'large-text',
    ),

));
