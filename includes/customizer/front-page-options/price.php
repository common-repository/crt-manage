<?php
/**
 * Price Section
 *
 * @package Crt_Manage
 */

$default_args = array(
    'panel'    => 'crt_manage_front_page_options',
    'title'    => esc_html__( 'Price Section', 'crt-manage' ),
    'priority' => crt_manage_priority_section('crt_manage_price_section'),
);

$wp_customize->add_section(
    'crt_manage_price_section',
    $default_args
);

// Project Section - Enable Section.
$wp_customize->add_setting(
	'crt_manage_enable_price_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'crt_manage_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Crt_Manage_Toggle_Switch_Custom_Control(
		$wp_customize,
		'crt_manage_enable_price_section',
		array(
			'label'    => esc_html__( 'Enable Price Section', 'crt-manage' ),
			'section'  => 'crt_manage_price_section',
			'settings' => 'crt_manage_enable_price_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'crt_manage_enable_price_section',
		array(
			'selector' => '#price .section-link',
			'settings' => 'crt_manage_enable_price_section',
		)
	);
}

// Background grey
$wp_customize->add_setting(
    'crt_manage_price_section_background_grey',
    array(
        'default'           => false,
        'sanitize_callback' => 'crt_manage_sanitize_switch',
    )
);
$wp_customize->add_control(
    new Crt_Manage_Toggle_Switch_Custom_Control(
        $wp_customize,
        'crt_manage_price_section_background_grey',
        array(
            'label'    => esc_html__( 'Background Grey', 'crt-manage' ),
            'section'  => 'crt_manage_price_section',
            'settings' => 'crt_manage_price_section_background_grey',
            'active_callback' => 'crt_manage_is_price_section_enabled',
        )
    )
);

// Headline
$wp_customize->add_setting(
    'crt_manage_price_section_headline',
    array(
        'default'           => __( 'Price', 'crt-manage' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'crt_manage_price_section_headline',
    array(
        'label'           => esc_html__( 'Headline', 'crt-manage' ),
        'section'         => 'crt_manage_price_section',
        'settings'        => 'crt_manage_price_section_headline',
        'type'            => 'text',
        'active_callback' => 'crt_manage_is_price_section_enabled',
    )
);

// List Client
$wp_customize->add_setting(
    'crt_manage_resume_section_price_list',
    array(
        'default'           => '',
        'sanitize_callback' => 'crt_manage_customizer_repeater_sanitize',
    )
);
$wp_customize->add_control(
    new Crt_Manage_Customize_Field_Repeater(
        $wp_customize,
        'crt_manage_resume_section_price_list',
        array(
            'label'   => esc_html__('Price Item','crt-manage'),
            'label_item'   => esc_html__('Price Item','crt-manage'),
            'section' => 'crt_manage_price_section',
            'custom_repeater_repeater_fields' => array(
                'label' => array('List','Add Row','Delete Row'),
                'key' => 'custom_repeater_repeater_fields',
                'fields' => array(
                    'price_title' => array('class' => 'trigger_field', 'type' => 'text','label' => 'Title'),
                    'price_value' => array('class' => 'trigger_field', 'type' => 'text', 'label' => 'Price'),
                    'price_description' => array('class' => 'trigger_field', 'type' => 'textarea','label' => 'Description'),
                    'price_button_text' => array('class' => 'trigger_field', 'type' => 'text','label' => 'Button Text'),
                    'price_button_url' => array('class' => 'trigger_field', 'type' => 'text','label' => 'Button URL'),
                )
            ),
            'active_callback' => 'crt_manage_is_price_section_enabled',
        )
    )
);