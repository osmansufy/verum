<?php

piklist('field', array(
    'type' => 'group'
    , 'field' => 'address_group'
    , 'label' => __('Social (Grouped)', 'verum')
    , 'list' => false
    , 'description' => __('Put social details.', 'verum')
    , 'add_more' => true,

    'fields' => array(
        array(
            'type' => 'text'
            , 'field' => 'address'
            , 'label' => __('Social Icon', 'verum')

            , 'columns' => 12
            , 'attributes' => array(
                'placeholder' => 'Street Address',
            ),

        )
        , array(
            'type' => 'url'
            , 'field' => 'address_2'
            , 'label' => __('Social Link', 'verum')
            , 'columns' => 12
            , 'attributes' => array(
                'placeholder' => 'Link',
            ),

        ),

    ),
));
