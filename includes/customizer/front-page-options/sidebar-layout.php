<?php
/**
 * Sidebar Option
 *
 * @package crt_manage
 */

$wp_customize->add_section(
	'crt_manage_sidebar_option',
	array(
		'title' => esc_html__( 'Layout', 'crt-manage' ),
		'panel' => 'crt_manage_theme_options',
	)
);

// Sidebar Option - Global Sidebar Position.
$wp_customize->add_setting(
	'crt_manage_sidebar_position',
	array(
		'sanitize_callback' => 'crt_manage_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'crt_manage_sidebar_position',
	array(
		'label'   => esc_html__( 'Sidebar Position', 'crt-manage' ),
		'section' => 'crt_manage_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'crt-manage' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'crt-manage' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'crt-manage' ),
		),
	)
);

// Sidebar Option - Sidebar Woocommerce.
$wp_customize->add_setting(
    'crt_manage_sidebar_position_woocommerce',
    array(
        'sanitize_callback' => 'crt_manage_sanitize_select',
        'default'           => 'right-sidebar',
    )
);

$wp_customize->add_control(
    'crt_manage_sidebar_position_woocommerce',
    array(
        'label'   => esc_html__( 'Sidebar Woocommerce Archive', 'crt-manage' ),
        'section' => 'crt_manage_sidebar_option',
        'type'    => 'select',
        'choices' => array(
            'right-sidebar' => esc_html__( 'Right Sidebar', 'crt-manage' ),
            'left-sidebar'  => esc_html__( 'Left Sidebar', 'crt-manage' ),
            'no-sidebar'    => esc_html__( 'No Sidebar', 'crt-manage' ),
        ),
    )
);

// Sidebar Option - Sidebar Woocommerce Single.
$wp_customize->add_setting(
    'crt_manage_sidebar_position_woocommerce_single',
    array(
        'sanitize_callback' => 'crt_manage_sanitize_select',
        'default'           => 'right-sidebar',
    )
);

$wp_customize->add_control(
    'crt_manage_sidebar_position_woocommerce_single',
    array(
        'label'   => esc_html__( 'Sidebar Woocommerce Single', 'crt-manage' ),
        'section' => 'crt_manage_sidebar_option',
        'type'    => 'select',
        'choices' => array(
            'right-sidebar' => esc_html__( 'Right Sidebar', 'crt-manage' ),
            'left-sidebar'  => esc_html__( 'Left Sidebar', 'crt-manage' ),
            'no-sidebar'    => esc_html__( 'No Sidebar', 'crt-manage' ),
        ),
    )
);

// Social header
$wp_customize->add_section(
    'crt_manage_header_options',
    array(
        'title'    => esc_html__( 'Header', 'crt-manage' ),
        'panel' => 'crt_manage_theme_options',
    )
);

$wp_customize->add_setting(
    'crt_manage_header_social',
    array(
        'default'           => '',
        'sanitize_callback' => 'crt_manage_customizer_repeater_sanitize',
    )
);
$wp_customize->add_control(
    new Crt_Manage_Customize_Field_Repeater(
        $wp_customize,
        'crt_manage_header_social',
        array(
            'label'   => esc_html__('Social','crt-manage'),
            'intro'   => esc_html__('List social show in navigation','crt-manage'),
            'label_item'   => esc_html__('Social Item','crt-manage'),
            'section' => 'crt_manage_header_options',
            'custom_repeater_link_control' => true,
            'custom_repeater_icon_control' => true,
            'custom_repeater_color_control' => true,
        )
    )
);
