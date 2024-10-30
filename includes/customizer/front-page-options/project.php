<?php
/**
 * Project Section
 *
 * @package Crt_Manage
 */

$default_args = array(
    'panel'    => 'crt_manage_front_page_options',
    'title'    => esc_html__( 'Project Section', 'crt-manage' ),
    'priority' => crt_manage_priority_section('crt_manage_project_section'),
);
$wp_customize->add_section(
    'crt_manage_project_section',
    $default_args
);
//$wp_customize->add_section(
//    new Crt_Manage_Custom_Section(
//        $wp_customize,
//        'crt_manage_project_section',
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
	'crt_manage_enable_project_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'crt_manage_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Crt_Manage_Toggle_Switch_Custom_Control(
		$wp_customize,
		'crt_manage_enable_project_section',
		array(
			'label'    => esc_html__( 'Enable Project Section', 'crt-manage' ),
			'section'  => 'crt_manage_project_section',
			'settings' => 'crt_manage_enable_project_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'crt_manage_enable_project_section',
		array(
			'selector' => '#my-project .section-link',
			'settings' => 'crt_manage_enable_project_section',
		)
	);
}

// Background grey
$wp_customize->add_setting(
    'crt_manage_project_section_background_grey',
    array(
        'default'           => false,
        'sanitize_callback' => 'crt_manage_sanitize_switch',
    )
);
$wp_customize->add_control(
    new Crt_Manage_Toggle_Switch_Custom_Control(
        $wp_customize,
        'crt_manage_project_section_background_grey',
        array(
            'label'    => esc_html__( 'Background Grey', 'crt-manage' ),
            'section'  => 'crt_manage_project_section',
            'settings' => 'crt_manage_project_section_background_grey',
            'active_callback' => 'crt_manage_is_project_section_enabled',
        )
    )
);

// Headline
$wp_customize->add_setting(
    'crt_manage_project_section_headline',
    array(
        'default'           => __( 'My Project', 'crt-manage' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'crt_manage_project_section_headline',
    array(
        'label'           => esc_html__( 'Headline', 'crt-manage' ),
        'section'         => 'crt_manage_project_section',
        'settings'        => 'crt_manage_project_section_headline',
        'type'            => 'text',
        'active_callback' => 'crt_manage_is_project_section_enabled',
    )
);

$wp_customize->add_setting(
    'crt_manage_project_section_headline_sub',
    array(
        'default'           => __( 'Projects that I have done', 'crt-manage' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'crt_manage_project_section_headline_sub',
    array(
        'label'           => esc_html__( 'Headline sub', 'crt-manage' ),
        'section'         => 'crt_manage_project_section',
        'settings'        => 'crt_manage_project_section_headline_sub',
        'type'            => 'text',
        'active_callback' => 'crt_manage_is_project_section_enabled',
    )
);

// List Project
$wp_customize->add_setting(
    'crt_manage_resume_section_project_list',
    array(
        'default'           => '',
        'sanitize_callback' => 'crt_manage_customizer_repeater_sanitize',
    )
);
$wp_customize->add_control(
    new Crt_Manage_Customize_Field_Repeater(
        $wp_customize,
        'crt_manage_resume_section_project_list',
        array(
            'label'   => esc_html__('Project','crt-manage'),
            'label_item'   => esc_html__('Project Item','crt-manage'),
            'section' => 'crt_manage_project_section',
            'custom_repeater_title_control' => true,
            'custom_repeater_repeater_fields' => array(
                'label' => array('List','Add Row','Delete Row'),
                'key' => 'custom_repeater_repeater_fields',
                'fields' => array(
                    'project_name' => array('class' => 'trigger_field', 'type' => 'text', 'label' => 'Name Project'),
                    'project_category' => array('class' => 'trigger_field', 'type' => 'text', 'label' => 'Category'),
                    'project_image' => array('class' => 'trigger_field', 'type' => 'image', 'label' => 'Image'),
                    'project_url' => array('class' => 'trigger_field', 'type' => 'text','label' => 'URL', 'placeholder' => '#'),
                )
            ),
            'active_callback' => 'crt_manage_is_project_section_enabled',
        )
    )
);
