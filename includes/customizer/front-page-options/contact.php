<?php
/**
 * About Section
 *
 * @package Crt_Manage
 */

$wp_customize->add_section(
	'crt_manage_contact_section',
	array(
		'panel'    => 'crt_manage_front_page_options',
		'title'    => esc_html__( 'Contact Section', 'crt-manage' ),
		'priority' => crt_manage_priority_section('crt_manage_contact_section'),
	)
);

// About Section - Enable Section.
$wp_customize->add_setting(
	'crt_manage_enable_contact_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'crt_manage_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Crt_Manage_Toggle_Switch_Custom_Control(
		$wp_customize,
		'crt_manage_enable_contact_section',
		array(
			'label'    => esc_html__( 'Enable About Section', 'crt-manage' ),
			'section'  => 'crt_manage_contact_section',
			'settings' => 'crt_manage_enable_contact_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'crt_manage_enable_contact_section',
		array(
			'selector' => '#contact .section-link',
			'settings' => 'crt_manage_enable_contact_section',
		)
	);
}

// Background grey
$wp_customize->add_setting(
    'crt_manage_contact_section_background_grey',
    array(
        'default'           => false,
        'sanitize_callback' => 'crt_manage_sanitize_switch',
    )
);
$wp_customize->add_control(
    new Crt_Manage_Toggle_Switch_Custom_Control(
        $wp_customize,
        'crt_manage_contact_section_background_grey',
        array(
            'label'    => esc_html__( 'Background Grey', 'crt-manage' ),
            'section'  => 'crt_manage_contact_section',
            'settings' => 'crt_manage_contact_section_background_grey',
            'active_callback' => 'crt_manage_is_contact_section_enabled',
        )
    )
);

// Headline
$wp_customize->add_setting(
    'crt_manage_contact_section_headline',
    array(
        'default'           => __( 'Contact me', 'crt-manage' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'crt_manage_contact_section_headline',
    array(
        'label'           => esc_html__( 'Headline', 'crt-manage' ),
        'section'         => 'crt_manage_contact_section',
        'settings'        => 'crt_manage_contact_section_headline',
        'type'            => 'text',
        'active_callback' => 'crt_manage_is_contact_section_enabled',
    )
);

// Fields
$wp_customize->add_setting(
    'crt_manage_contact_section_list',
    array(
        'default'           => '',
        'sanitize_callback' => 'crt_manage_customizer_repeater_sanitize',
    )
);
$wp_customize->add_control(
    new Crt_Manage_Customize_Field_Repeater(
        $wp_customize,
        'crt_manage_contact_section_list',
        array(
            'label'   => esc_html__('Contact Item','crt-manage'),
            'label_item'   => esc_html__('Contact Item','crt-manage'),
            'section' => 'crt_manage_contact_section',
            'custom_repeater_icon_control' => true,
            'custom_repeater_text_control' => true,
            'active_callback' => 'crt_manage_is_contact_section_enabled',
        )
    )
);

$wp_customize->add_setting(
    'crt_manage_contact_section_form',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'crt_manage_contact_section_form',
    array(
        'label'           => esc_html__( 'Form', 'crt-manage' ),
        'section'         => 'crt_manage_contact_section',
        'settings'        => 'crt_manage_contact_section_form',
        'type'            => 'text',
        'active_callback' => 'crt_manage_is_contact_section_enabled',
    )
);