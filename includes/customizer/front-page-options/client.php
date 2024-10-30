<?php
/**
 * Client Section
 *
 * @package Crt_Manage
 */

$wp_customize->add_section(
	'crt_manage_client_section',
	array(
		'panel'    => 'crt_manage_front_page_options',
		'title'    => esc_html__( 'Client Section', 'crt-manage' ),
		'priority' => crt_manage_priority_section('crt_manage_client_section'),
	)
);

// Project Section - Enable Section.
$wp_customize->add_setting(
	'crt_manage_enable_client_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'crt_manage_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Crt_Manage_Toggle_Switch_Custom_Control(
		$wp_customize,
		'crt_manage_enable_client_section',
		array(
			'label'    => esc_html__( 'Enable Client Section', 'crt-manage' ),
			'section'  => 'crt_manage_client_section',
			'settings' => 'crt_manage_enable_client_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'crt_manage_enable_client_section',
		array(
			'selector' => '#my-client .section-link',
			'settings' => 'crt_manage_enable_client_section',
		)
	);
}

// Background grey
$wp_customize->add_setting(
    'crt_manage_client_section_background_grey',
    array(
        'default'           => false,
        'sanitize_callback' => 'crt_manage_sanitize_switch',
    )
);
$wp_customize->add_control(
    new Crt_Manage_Toggle_Switch_Custom_Control(
        $wp_customize,
        'crt_manage_client_section_background_grey',
        array(
            'label'    => esc_html__( 'Background Grey', 'crt-manage' ),
            'section'  => 'crt_manage_client_section',
            'settings' => 'crt_manage_client_section_background_grey',
            'active_callback' => 'crt_manage_is_client_section_enabled',
        )
    )
);

// Headline
$wp_customize->add_setting(
    'crt_manage_client_section_headline',
    array(
        'default'           => __( 'My Client', 'crt-manage' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'crt_manage_client_section_headline',
    array(
        'label'           => esc_html__( 'Headline', 'crt-manage' ),
        'section'         => 'crt_manage_client_section',
        'settings'        => 'crt_manage_client_section_headline',
        'type'            => 'text',
        'active_callback' => 'crt_manage_is_client_section_enabled',
    )
);

$wp_customize->add_setting(
    'crt_manage_client_section_headline_sub',
    array(
        'default'           => __( 'What customers say about us', 'crt-manage' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'crt_manage_client_section_headline_sub',
    array(
        'label'           => esc_html__( 'Headline sub', 'crt-manage' ),
        'section'         => 'crt_manage_client_section',
        'settings'        => 'crt_manage_client_section_headline_sub',
        'type'            => 'text',
        'active_callback' => 'crt_manage_is_client_section_enabled',
    )
);

// List Client
$wp_customize->add_setting(
    'crt_manage_resume_section_client_list',
    array(
        'default'           => '',
        'sanitize_callback' => 'crt_manage_customizer_repeater_sanitize',
    )
);
$wp_customize->add_control(
    new Crt_Manage_Customize_Field_Repeater(
        $wp_customize,
        'crt_manage_resume_section_client_list',
        array(
            'label'   => esc_html__('Client','crt-manage'),
            'label_item'   => esc_html__('Client Item','crt-manage'),
            'section' => 'crt_manage_client_section',
            'custom_repeater_repeater_fields' => array(
                'label' => array('List','Add Row','Delete Row'),
                'key' => 'custom_repeater_repeater_fields',
                'fields' => array(
                    'client_image' => array('class' => 'trigger_field', 'type' => 'image', 'label' => 'Avatar'),
                    'client_content' => array('class' => 'trigger_field', 'type' => 'textarea', 'label' => 'Content'),
                    'client_name' => array('class' => 'trigger_field', 'type' => 'text','label' => 'Name'),
                    'client_job' => array('class' => 'trigger_field', 'type' => 'text','label' => 'Job position'),
                )
            ),
            'active_callback' => 'crt_manage_is_client_section_enabled',
        )
    )
);