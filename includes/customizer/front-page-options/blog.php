<?php
/**
 * Blog Section
 *
 * @package Crt_Manage
 */

$wp_customize->add_section(
	'crt_manage_blog_section',
	array(
		'panel'    => 'crt_manage_front_page_options',
		'title'    => esc_html__( 'Blog Section', 'crt-manage' ),
		'priority' => crt_manage_priority_section('crt_manage_blog_section'),
        'description' => esc_html__( 'Blog section options.', 'crt-manage' ),
	)
);

// Project Section - Enable Section.
$wp_customize->add_setting(
	'crt_manage_enable_blog_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'crt_manage_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Crt_Manage_Toggle_Switch_Custom_Control(
		$wp_customize,
		'crt_manage_enable_blog_section',
		array(
			'label'    => esc_html__( 'Enable Blog Section', 'crt-manage' ),
			'section'  => 'crt_manage_blog_section',
			'settings' => 'crt_manage_enable_blog_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'crt_manage_enable_blog_section',
		array(
			'selector' => '#my-blog .section-link',
			'settings' => 'crt_manage_enable_blog_section',
		)
	);
}

// Background grey
$wp_customize->add_setting(
    'crt_manage_blog_section_background_grey',
    array(
        'default'           => false,
        'sanitize_callback' => 'crt_manage_sanitize_switch',
    )
);
$wp_customize->add_control(
    new Crt_Manage_Toggle_Switch_Custom_Control(
        $wp_customize,
        'crt_manage_blog_section_background_grey',
        array(
            'label'    => esc_html__( 'Background Grey', 'crt-manage' ),
            'section'  => 'crt_manage_blog_section',
            'settings' => 'crt_manage_blog_section_background_grey',
            'active_callback' => 'crt_manage_is_blog_section_enabled',
        )
    )
);

// Headline
$wp_customize->add_setting(
    'crt_manage_blog_section_headline',
    array(
        'default'           => __( 'My Blog', 'crt-manage' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'crt_manage_blog_section_headline',
    array(
        'label'           => esc_html__( 'Headline', 'crt-manage' ),
        'section'         => 'crt_manage_blog_section',
        'settings'        => 'crt_manage_blog_section_headline',
        'type'            => 'text',
        'active_callback' => 'crt_manage_is_blog_section_enabled',
    )
);

$wp_customize->add_setting(
    'crt_manage_blog_section_headline_sub',
    array(
        'default'           => __( 'My shared posts', 'crt-manage' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'crt_manage_blog_section_headline_sub',
    array(
        'label'           => esc_html__( 'Headline sub', 'crt-manage' ),
        'section'         => 'crt_manage_blog_section',
        'settings'        => 'crt_manage_blog_section_headline_sub',
        'type'            => 'text',
        'active_callback' => 'crt_manage_is_blog_section_enabled',
    )
);

// List blog
$wp_customize->add_setting(
    'crt_manage_blog_list',
    array(
        'sanitize_callback' => 'crt_manage_sanitize_array',
    )
);
$wp_customize->add_control(
    new Crt_Manage_Customize_Select_Multiple(
        $wp_customize,
        'crt_manage_blog_list',
        array(
            'label'           => esc_html__( 'Select List', 'crt-manage' ),
            'description'           => esc_html__( 'Can you choosen multiple', 'crt-manage' ),
            'section'         => 'crt_manage_blog_section',
            'settings' => 'crt_manage_blog_list',
            'choices' => crt_manage_get_post_choices(),
            'height' => general_height_from_count_post(crt_manage_get_post_choices()),
            'active_callback' => 'crt_manage_is_blog_section_enabled',
        )
    )
);

// Button text
$wp_customize->add_setting(
    'crt_manage_blog_section_button_text',
    array(
        'default'           => __( 'View All', 'crt-manage' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'crt_manage_blog_section_button_text',
    array(
        'label'           => esc_html__( 'Button Text', 'crt-manage' ),
        'section'         => 'crt_manage_blog_section',
        'settings'        => 'crt_manage_blog_section_button_text',
        'type'            => 'text',
        'active_callback' => 'crt_manage_is_blog_section_enabled',
    )
);

// Button url
$wp_customize->add_setting(
    'crt_manage_blog_section_button_url',
    array(
        'default'           => __( '#', 'crt-manage' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'crt_manage_blog_section_button_url',
    array(
        'label'           => esc_html__( 'Button URL', 'crt-manage' ),
        'section'         => 'crt_manage_blog_section',
        'settings'        => 'crt_manage_blog_section_button_url',
        'type'            => 'text',
        'active_callback' => 'crt_manage_is_blog_section_enabled',
    )
);
