<?php
/**
 * About Section
 *
 * @package Crt_Manage
 */

$wp_customize->add_section(
    'crt_manage_about_section',
    array(
        'panel'    => 'crt_manage_front_page_options',
        'title'    => esc_html__( 'About Section', 'crt-manage' ),
        'priority' => crt_manage_priority_section('crt_manage_about_section'),
    )
);

// About Section - Enable Section.
$wp_customize->add_setting(
    'crt_manage_enable_about_section',
    array(
        'default'           => false,
        'sanitize_callback' => 'crt_manage_sanitize_switch',
    )
);

$wp_customize->add_control(
    new Crt_Manage_Toggle_Switch_Custom_Control(
        $wp_customize,
        'crt_manage_enable_about_section',
        array(
            'label'    => esc_html__( 'Enable About Section', 'crt-manage' ),
            'section'  => 'crt_manage_about_section',
            'settings' => 'crt_manage_enable_about_section',
        )
    )
);

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial(
        'crt_manage_enable_about_section',
        array(
            'selector' => '#about-me .section-link',
            'settings' => 'crt_manage_enable_about_section',
        )
    );
}

// Avatar
$wp_customize->add_setting(
    'crt_manage_about_avatar',
    array(
        'sanitize_callback' => 'crt_manage_sanitize_image',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'crt_manage_about_avatar',
        array(
            'label'           => esc_html__( 'Avatar Image', 'crt-manage' ),
            'section'         => 'crt_manage_about_section',
            'settings'        => 'crt_manage_about_avatar',
            'active_callback' => 'crt_manage_is_about_section_enabled',
        )
    )
);

// About Section - Short Description.
$wp_customize->add_setting(
    'crt_manage_about_section_description',
    array(
        'default'           => '<p>Senior UX designer with 7+years experience and specialization in complex web application design.</p>
                                <p>Achieved 15% increase in user satisfaction and 20% increase in conversions through the creation of interactively tested, data-driven, and user-centered design.</p>',
        'sanitize_callback' => 'wp_kses_post',
    )
);
$wp_customize->add_control(
    'crt_manage_about_section_description',
    array(
        'label'           => esc_html__( 'Description', 'crt-manage' ),
        'section'         => 'crt_manage_about_section',
        'settings'        => 'crt_manage_about_section_description',
        'type'            => 'textarea',
        'active_callback' => 'crt_manage_is_about_section_enabled',
    )
);

// Name
$wp_customize->add_setting(
    'crt_manage_about_section_name',
    array(
        'default'           => __( 'I AM LUCA.', 'crt-manage' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'crt_manage_about_section_name',
    array(
        'label'           => esc_html__( 'Full Name', 'crt-manage' ),
        'section'         => 'crt_manage_about_section',
        'settings'        => 'crt_manage_about_section_name',
        'type'            => 'text',
        'active_callback' => 'crt_manage_is_about_section_enabled',
    )
);

// Short Job
$wp_customize->add_setting(
    'crt_manage_about_section_short_job',
    array(
        'default'           => __( 'UI/UX Designer & Developer', 'crt-manage' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'crt_manage_about_section_short_job',
    array(
        'label'           => esc_html__( 'Short Job', 'crt-manage' ),
        'section'         => 'crt_manage_about_section',
        'settings'        => 'crt_manage_about_section_short_job',
        'type'            => 'text',
        'active_callback' => 'crt_manage_is_about_section_enabled',
    )
);

