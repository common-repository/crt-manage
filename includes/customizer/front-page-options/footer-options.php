<?php
/**
 * Footer Options
 *
 * @package Crt_Manage
 */

$wp_customize->add_section(
    'crt_manage_footer_options',
    array(
        'title'    => esc_html__( 'Footer Options', 'crt-manage' ),
    )
);

// Left intro
$wp_customize->add_setting(
    'crt_manage_footer_left_introduction_text',
    array(
        'default'           => __( 'Copyright © 2022 All rights reserved.', 'crt-manage' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'crt_manage_left_introduction_text',
    array(
        'label'           => esc_html__( 'Text Left', 'crt-manage' ),
        'section'         => 'crt_manage_footer_options',
        'settings'        => 'crt_manage_footer_left_introduction_text',
        'type'            => 'text',
    )
);

// Label CV
$wp_customize->add_setting(
    'crt_manage_footer_right_label',
    array(
        'default'           => __( 'Download CV', 'crt-manage' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'crt_manage_footer_right_label',
    array(
        'label'           => esc_html__( 'Right Label', 'crt-manage' ),
        'section'         => 'crt_manage_footer_options',
        'settings'        => 'crt_manage_footer_right_label',
        'type'            => 'text',
    )
);

// File CV
$wp_customize->add_setting(
    'crt_manage_footer_right_url_cv',
    array(
        'sanitize_callback'  => 'crt_manage_ic_sanitize_pdf',
    )
);
$wp_customize->add_control(
    new WP_Customize_Upload_Control(
        $wp_customize,
        'crt_manage_footer_right_url_cv',
        array(
            'label'           => esc_html__( 'URL File CV', 'crt-manage' ),
            'section'         => 'crt_manage_footer_options',
            'settings'        => 'crt_manage_footer_right_url_cv',
        )
    )
);