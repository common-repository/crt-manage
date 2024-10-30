<?php
/**
 * Blog Section
 *
 * @package Crt_Manage
 */

$default_args = array(
    'panel'    => 'crt_manage_front_page_options',
    'title'    => esc_html__( 'Product Section', 'crt-manage' ),
    'priority' => crt_manage_priority_section('crt_manage_product_section'),
);
$wp_customize->add_section(
    'crt_manage_product_section',
    $default_args
);

//$wp_customize->add_section(
//    new Crt_Manage_Custom_Section(
//        $wp_customize,
//        'crt_manage_product_section',
//        array_merge(
//            $default_args,
//            array(
//                'button_text'      => __( 'Buy Pre', 'crt-manage' ),
//                'url'              => LUCA_PORTFOLIO_URL_DEMO,
//            )
//        )
//    )
//);

// Project Section - Enable Section.
$wp_customize->add_setting(
	'crt_manage_enable_product_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'crt_manage_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Crt_Manage_Toggle_Switch_Custom_Control(
		$wp_customize,
		'crt_manage_enable_product_section',
		array(
			'label'    => esc_html__( 'Enable Blog Section', 'crt-manage' ),
			'section'  => 'crt_manage_product_section',
			'settings' => 'crt_manage_enable_product_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'crt_manage_enable_product_section',
		array(
			'selector' => '#my-blog .section-link',
			'settings' => 'crt_manage_enable_product_section',
		)
	);
}

// Background grey
$wp_customize->add_setting(
    'crt_manage_product_section_background_grey',
    array(
        'default'           => false,
        'sanitize_callback' => 'crt_manage_sanitize_switch',
    )
);
$wp_customize->add_control(
    new Crt_Manage_Toggle_Switch_Custom_Control(
        $wp_customize,
        'crt_manage_product_section_background_grey',
        array(
            'label'    => esc_html__( 'Background Grey', 'crt-manage' ),
            'section'  => 'crt_manage_product_section',
            'settings' => 'crt_manage_product_section_background_grey',
            'active_callback' => 'crt_manage_is_product_section_enabled',
        )
    )
);

// Headline
$wp_customize->add_setting(
    'crt_manage_product_section_headline',
    array(
        'default'           => __( 'My Blog', 'crt-manage' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'crt_manage_product_section_headline',
    array(
        'label'           => esc_html__( 'Headline', 'crt-manage' ),
        'section'         => 'crt_manage_product_section',
        'settings'        => 'crt_manage_product_section_headline',
        'type'            => 'text',
        'active_callback' => 'crt_manage_is_product_section_enabled',
    )
);

$wp_customize->add_setting(
    'crt_manage_product_section_headline_sub',
    array(
        'default'           => __( 'My shared posts', 'crt-manage' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'crt_manage_product_section_headline_sub',
    array(
        'label'           => esc_html__( 'Headline sub', 'crt-manage' ),
        'section'         => 'crt_manage_product_section',
        'settings'        => 'crt_manage_product_section_headline_sub',
        'type'            => 'text',
        'active_callback' => 'crt_manage_is_product_section_enabled',
    )
);

// List blog
$wp_customize->add_setting(
    'crt_manage_product_list',
    array(
        'sanitize_callback' => 'crt_manage_sanitize_array',
    )
);
$wp_customize->add_control(
    new Crt_Manage_Customize_Select_Multiple(
        $wp_customize,
        'crt_manage_product_list',
        array(
            'label'           => esc_html__( 'Select List', 'crt-manage' ),
            'description'           => esc_html__( 'Can you choosen multiple', 'crt-manage' ),
            'section'         => 'crt_manage_product_section',
            'settings' => 'crt_manage_product_list',
            'choices' => crt_manage_get_post_choices('product'),
            'height' => general_height_from_count_post(crt_manage_get_post_choices()),
            'active_callback' => 'crt_manage_is_product_section_enabled',
        )
    )
);


// Button url
$wp_customize->add_setting(
    'crt_manage_product_section_product_per_row',
    array(
        'default'           => 3,
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'crt_manage_product_section_product_per_row',
    array(
        'label'           => esc_html( 'Products per row', 'crt-manage' ),
        'description'     => esc_html('How many products should be shown per row?','crt-manage'),
        'section'         => 'crt_manage_product_section',
        'settings'        => 'crt_manage_product_section_product_per_row',
        'type'            => 'select',
        'active_callback' => 'crt_manage_is_product_section_enabled',
        'choices'  => array(
            2 => '2',
            3 => '3',
            4 => '4',
        )
    )
);
