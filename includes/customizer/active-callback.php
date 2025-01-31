<?php
/**
 * Active Callbacks
 *
 * @package Crt_Manage
 */

// Theme Options.
function crt_manage_is_pagination_enabled( $control ) {
	return ( $control->manager->get_setting( 'crt_manage_enable_pagination' )->value() );
}
function crt_manage_is_breadcrumb_enabled( $control ) {
	return ( $control->manager->get_setting( 'crt_manage_enable_breadcrumb' )->value() );
}

// About Section
function crt_manage_is_skill_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'crt_manage_enable_about_section' )->value() );
}

// Check if static home page is enabled.
function crt_manage_is_static_homepage_enabled( $control ) {
	return ( 'page' === $control->manager->get_setting( 'show_on_front' )->value() );
}
function crt_manage_is_about_section_enabled( $control ) {
    return ( $control->manager->get_setting( 'crt_manage_enable_about_section' )->value() );
}
function crt_manage_is_resume_section_enabled( $control ) {
    return ( $control->manager->get_setting( 'crt_manage_enable_resume_section' )->value() );
}
function crt_manage_is_service_section_enabled( $control ) {
    return ( $control->manager->get_setting( 'crt_manage_enable_service_section' )->value() );
}
function crt_manage_is_project_section_enabled( $control ) {
    return ( $control->manager->get_setting( 'crt_manage_enable_project_section' )->value() );
}
function crt_manage_is_client_section_enabled( $control ) {
    return ( $control->manager->get_setting( 'crt_manage_enable_client_section' )->value() );
}
function crt_manage_is_price_section_enabled( $control ) {
    return ( $control->manager->get_setting( 'crt_manage_enable_price_section' )->value() );
}
function crt_manage_is_blog_section_enabled( $control ) {
    return ( $control->manager->get_setting( 'crt_manage_enable_blog_section' )->value() );
}
function crt_manage_is_product_section_enabled( $control ) {
    return ( $control->manager->get_setting( 'crt_manage_enable_product_section' )->value() );
}
function crt_manage_is_product_tab_section_enabled( $control ) {
    return ( $control->manager->get_setting( 'crt_manage_enable_product_tab_section' )->value() );
}
function crt_manage_is_contact_section_enabled( $control ) {
    return ( $control->manager->get_setting( 'crt_manage_enable_contact_section' )->value() );
}