<?php
/**
 * Front Page Options
 *
 * @package Crt_Manage
 */

$wp_customize->add_panel(
    'crt_manage_front_page_options',
    array(
        'title'    => esc_html__( 'Front Page Sections', 'crt-manage' ),
        'priority' => 130,
    )
);

$wp_customize->add_panel(
    'crt_manage_theme_options',
    array(
        'title'    => esc_html__( 'Theme Options', 'crt-manage' ),
        'priority' => 130,
    )
);

function crt_manage_priority_section($key) {
    $i = 10;
    $section_order_default = array (
        'crt_manage_about_section' => $i,
        'crt_manage_resume_section' => $i += 5,
        'crt_manage_service_section' => $i += 5,
        'crt_manage_project_section' => $i += 5,
        'crt_manage_client_section' => $i += 5,
        'crt_manage_price_section' => $i += 5,
        'crt_manage_blog_section' => $i += 5,
        'crt_manage_product_section' => $i += 5,
        'crt_manage_product_tab_section' => $i += 5,
        'crt_manage_contact_section' => $i += 5,
    );
    $section_order         = get_theme_mod( 'sections_order' );
    $section_order_decoded = json_decode( $section_order, true );
    if(empty($section_order_decoded)) {
        $section_order_decoded = array();
    }
    $section_order_decoded = array_replace_recursive($section_order_default, $section_order_decoded);
    return isset($section_order_decoded[$key]) ? $section_order_decoded[$key]:10;
}
require dirname( __FILE__, 2 ) . '/customizer/front-page-options/about.php';
require dirname( __FILE__, 2 ) . '/customizer/front-page-options/resume.php';
require dirname( __FILE__, 2 ) . '/customizer/front-page-options/service.php';
require dirname( __FILE__, 2 ) . '/customizer/front-page-options/project.php';
require dirname( __FILE__, 2 ) . '/customizer/front-page-options/client.php';
require dirname( __FILE__, 2 ) . '/customizer/front-page-options/price.php';
require dirname( __FILE__, 2 ) . '/customizer/front-page-options/blog.php';
require dirname( __FILE__, 2 ) . '/customizer/front-page-options/product.php';
require dirname( __FILE__, 2 ) . '/customizer/front-page-options/product-tab.php';
require dirname( __FILE__, 2 ) . '/customizer/front-page-options/contact.php';
require dirname( __FILE__, 2 ) . '/customizer/front-page-options/footer-options.php';
require dirname( __FILE__, 2 ) . '/customizer/front-page-options/sidebar-layout.php';
