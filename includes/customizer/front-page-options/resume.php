<?php
/**
 * Skill Section
 *
 * @package Crt_Manage
 */

$default_args = array(
    'panel'    => 'crt_manage_front_page_options',
    'title'    => esc_html__( 'Resume Section', 'crt-manage' ),
    'priority' => crt_manage_priority_section('crt_manage_resume_section'),
);
$wp_customize->add_section(
    'crt_manage_resume_section',
    $default_args
);
//$wp_customize->add_section(
//    new Crt_Manage_Custom_Section(
//        $wp_customize,
//        'crt_manage_resume_section',
//        array_merge(
//            $default_args,
//            array(
//                'button_text'      => __( 'Buy Pre', 'crt-manage' ),
//                'url'              => LUCA_PORTFOLIO_URL_DEMO,
//            )
//        )
//    )
//);

// Skill Section - Enable Section.
$wp_customize->add_setting(
	'crt_manage_enable_resume_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'crt_manage_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Crt_Manage_Toggle_Switch_Custom_Control(
		$wp_customize,
		'crt_manage_enable_resume_section',
		array(
			'label'    => esc_html__( 'Enable Resume Section', 'crt-manage' ),
			'section'  => 'crt_manage_resume_section',
			'settings' => 'crt_manage_enable_resume_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'crt_manage_enable_resume_section',
		array(
			'selector' => '#my-resume .section-link',
			'settings' => 'crt_manage_enable_resume_section',
		)
	);
}

// Background grey
$wp_customize->add_setting(
    'crt_manage_resume_section_background_grey',
    array(
        'default'           => false,
        'sanitize_callback' => 'crt_manage_sanitize_switch',
    )
);
$wp_customize->add_control(
    new Crt_Manage_Toggle_Switch_Custom_Control(
        $wp_customize,
        'crt_manage_resume_section_background_grey',
        array(
            'label'    => esc_html__( 'Background Grey', 'crt-manage' ),
            'section'  => 'crt_manage_resume_section',
            'settings' => 'crt_manage_resume_section_background_grey',
            'active_callback' => 'crt_manage_is_resume_section_enabled',
        )
    )
);

// Headline
$wp_customize->add_setting(
    'crt_manage_resume_section_headline',
    array(
        'default'           => __( 'My Resume', 'crt-manage' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'crt_manage_resume_section_headline',
    array(
        'label'           => esc_html__( 'Headline', 'crt-manage' ),
        'section'         => 'crt_manage_resume_section',
        'settings'        => 'crt_manage_resume_section_headline',
        'type'            => 'text',
        'active_callback' => 'crt_manage_is_resume_section_enabled',
    )
);

$wp_customize->add_setting(
    'crt_manage_resume_section_headline_sub',
    array(
        'default'           => __( 'Details about me', 'crt-manage' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'crt_manage_resume_section_headline_sub',
    array(
        'label'           => esc_html__( 'Headline sub', 'crt-manage' ),
        'section'         => 'crt_manage_resume_section',
        'settings'        => 'crt_manage_resume_section_headline_sub',
        'type'            => 'text',
        'active_callback' => 'crt_manage_is_resume_section_enabled',
    )
);

// Skill & List Skill
$wp_customize->add_setting(
    'crt_manage_resume_section_skill_list',
    array(
        'default'           => '',
        'sanitize_callback' => 'crt_manage_customizer_repeater_sanitize',
    )
);
$wp_customize->add_control(
    new Crt_Manage_Customize_Field_Repeater(
        $wp_customize,
        'crt_manage_resume_section_skill_list',
        array(
            'label'   => esc_html__('Resume','crt-manage'),
            'label_item'   => esc_html__('Resume Item','crt-manage'),
            'section' => 'crt_manage_resume_section',
            'custom_repeater_title_control' => true,
            'custom_repeater_subtitle_control' => true,
            'custom_repeater_radio_control' => array(
                'name' => 'radio_type',
                'id' => 'radio_type',
                'label' => esc_html__( 'Type', 'crt-manage' ),
                'description' => esc_html__( 'This is a custom radio input.', 'crt-manage' ),
                'choices' => array(
                    'type_1' => esc_html__( 'Type 1 (for Precent)', 'crt-manage' ),
                    'type_2' => esc_html__( 'Type 2 (for Content)', 'crt-manage' ),
                ),
            ),
            'custom_repeater_repeater_fields' => array(
                'label' => array('List','Add Row','Delete Row'),
                'key' => 'custom_repeater_repeater_fields',
                'fields' => array(
                    'skill_title' => array('class' => 'trigger_field', 'type' => 'text', 'label' => 'Label'),
                    'skill_precent' => array('class' => 'trigger_field', 'type' => 'text','label' => 'Precent', 'placeholder' => '1-10'),
                    'skill_content' => array('class' => 'trigger_field', 'type' => 'textarea','label' => 'Content'),
                )
            ),
            'active_callback' => 'crt_manage_is_resume_section_enabled',
        )
    )
);

