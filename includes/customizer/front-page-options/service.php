<?php
/**
 * Service Section
 *
 * @package Crt_Manage
 */

$default_args = array(
    'panel'    => 'crt_manage_front_page_options',
    'title'    => esc_html__( 'Service Section', 'crt-manage' ),
    'priority' => crt_manage_priority_section('crt_manage_service_section'),
);

$wp_customize->add_section(
    'crt_manage_service_section',
    $default_args
);

// Service Section - Enable Section.
$wp_customize->add_setting(
	'crt_manage_enable_service_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'crt_manage_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Crt_Manage_Toggle_Switch_Custom_Control(
		$wp_customize,
		'crt_manage_enable_service_section',
		array(
			'label'    => esc_html__( 'Enable Service Section', 'crt-manage' ),
			'section'  => 'crt_manage_service_section',
			'settings' => 'crt_manage_enable_service_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'crt_manage_enable_service_section',
		array(
			'selector' => '#my-service .section-link',
			'settings' => 'crt_manage_enable_service_section',
		)
	);
}


// Background grey
$wp_customize->add_setting(
    'crt_manage_service_section_background_grey',
    array(
        'default'           => false,
        'sanitize_callback' => 'crt_manage_sanitize_switch',
    )
);
$wp_customize->add_control(
    new Crt_Manage_Toggle_Switch_Custom_Control(
        $wp_customize,
        'crt_manage_service_section_background_grey',
        array(
            'label'    => esc_html__( 'Background Grey', 'crt-manage' ),
            'section'  => 'crt_manage_service_section',
            'settings' => 'crt_manage_service_section_background_grey',
            'active_callback' => 'crt_manage_is_service_section_enabled',
        )
    )
);

// Headline
$wp_customize->add_setting(
    'crt_manage_service_section_headline',
    array(
        'default'           => __( 'Service', 'crt-manage' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'crt_manage_service_section_headline',
    array(
        'label'           => esc_html__( 'Headline', 'crt-manage' ),
        'section'         => 'crt_manage_service_section',
        'settings'        => 'crt_manage_service_section_headline',
        'type'            => 'text',
        'active_callback' => 'crt_manage_is_service_section_enabled',
    )
);

$wp_customize->add_setting(
    'crt_manage_service_section_headline_sub',
    array(
        'default'           => __( 'Details about me', 'crt-manage' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'crt_manage_service_section_headline_sub',
    array(
        'label'           => esc_html__( 'Headline sub', 'crt-manage' ),
        'section'         => 'crt_manage_service_section',
        'settings'        => 'crt_manage_service_section_headline_sub',
        'type'            => 'text',
        'active_callback' => 'crt_manage_is_service_section_enabled',
    )
);
//
// List Service
$wp_customize->add_setting(
    'crt_manage_service_section_list',
    array(
        'default'           => '',
        'sanitize_callback' => 'crt_manage_customizer_repeater_sanitize',
    )
);
$wp_customize->add_control(
    new Crt_Manage_Customize_Field_Repeater(
        $wp_customize,
        'crt_manage_service_section_list',
        array(
            'label'   => esc_html__('Service','crt-manage'),
            'label_item'   => esc_html__('Service Item','crt-manage'),
            'section' => 'crt_manage_service_section',
            'custom_repeater_icon_control' => true,
            'custom_repeater_title_control' => true,
            'custom_repeater_text_control' => true,
            'active_callback' => 'crt_manage_is_service_section_enabled',
        )
    )
);

