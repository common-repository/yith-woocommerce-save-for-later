<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly


$is_wishlist_enabled    =   defined( 'YITH_WCWL' );

$settings   =   array(

    'general'   =>  array(
        'section_save_for_later_settings' =>  array(
            'name'  => __('General Settings', 'yith-woocommerce-save-for-later'),
            'type'  =>  'title',
            'id'    =>  'ywsfl_section_general_start'
        ),

        'text_add_from_list' =>  array(
            'name'      =>  __('"Save for Later" text', 'yith-woocommerce-save-for-later'),
            'type' => 'yith-field',
            'yith-type'      =>  'text',
            'default'   =>  __('Save for Later', 'yith-woocommerce-save-for-later'),
            'std'       =>  __('Save for Later', 'yith-woocommerce-save-for-later'),
            'id'        =>  'ywsfl_text_add_button',
            'desc_tip'  =>  __('You can set the text for your "Save for Later" link', 'yith-woocommerce-save-for-later')
        ),

        'save_for_later_page'   =>  array(
            'name'  =>  __('Save for Later page', 'yith-woocommerce-save-for-later'),
            'type' => 'yith-field',
            'yith-type'  =>  'text',
            'default'   =>  __('Save for Later'),
            'std'       =>  'Save for Later',
            'desc'      =>  __('This page contains the [yith_wsfl_saveforlater] shortcode.<br> You can use this shortcode in other pages!.', 'yith-woocommerce-save-for-later'),
            'id'        => 'ywsfl_page_name',
            'custom_attributes' => 'readonly'
        ),

        'general_settings_end'     => array(
            'type' => 'sectionend',
            'id'   => 'ywsfl_section_general_end'
        )

    )

);

return apply_filters( 'ywsfl_general_settings' , $settings );