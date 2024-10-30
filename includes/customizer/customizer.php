<?php
require_once dirname( __FILE__, 2 ) . '/customizer/sanitize-callback.php';
require_once dirname( __FILE__, 2 ) . '/customizer/active-callback.php';
require_once dirname( __FILE__, 2 ) . '/customizer/custom-controls.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function crt_manage_customize_register($wp_customize) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    // Custom logo text
    $wp_customize->add_setting(
        'logo_text', array(
            'default' => 'T',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'logo_text', array(
            'label'    => esc_html__( 'Logo text', 'crt-manage' ),
            'type'     => 'text',
            'section'    => 'title_tagline',
            'priority' => 10,
        )
    );

    // Save order section
    $wp_customize->add_setting(
        'sections_order', array(
            'sanitize_callback' => 'crt_manage_sanitize_sections_order',
        )
    );
    $wp_customize->add_control(
        'sections_order', array(
            'section'  => 'static_front_page',
            'type'     => 'hidden',
            'priority' => 80,
        )
    );

    // Homepage Settings - Enable Homepage Content.
    $wp_customize->add_setting(
        'crt_manage_enable_frontpage_content',
        array(
            'default'           => false,
            'sanitize_callback' => 'crt_manage_sanitize_checkbox',
        )
    );

    $wp_customize->add_control(
        'crt_manage_enable_frontpage_content',
        array(
            'label'           => esc_html__( 'Enable Homepage Content', 'crt-manage' ),
            'description'     => esc_html__( 'Check to enable content on static homepage.', 'crt-manage' ),
            'section'         => 'static_front_page',
            'type'            => 'checkbox',
            'active_callback' => 'crt_manage_is_static_homepage_enabled',
        )
    );

    // Front Page Options.
    require_once dirname( __FILE__, 2 ) . '/customizer/front-page-options.php';
    $wp_customize->register_control_type( 'Crt_Manage_Customize_Select_Multiple' );
}

add_action( 'customize_register', 'crt_manage_customize_register' );


function crt_manage_sections_order_section_priority( $value, $key = '' ) {
    $orders = get_theme_mod( 'sections_order' );
    if ( ! empty( $orders ) ) {
        $json = json_decode( $orders );
        if ( isset( $json->$key ) ) {
            return $json->$key;
        }
    }

    return $value;
}
add_filter( 'section_priority', 'crt_manage_sections_order_section_priority', 10, 2 );

/**
 * Function to refresh customize preview when changing sections order
 */
function crt_manage_refresh_customize_preview() {
    $section_order         = get_theme_mod( 'sections_order' ); // Edit this
    $section_order_decoded = json_decode( $section_order, true );
    if ( ! empty( $section_order_decoded ) ) {
        remove_all_actions( 'crt_manage_theme_sections' );
        foreach ( $section_order_decoded as $k => $priority ) {
            if ( function_exists( $k ) ) {
                add_action( 'crt_manage_theme_sections', $k, $priority );
            }
        }
    }
}
add_action( 'customize_preview_init', 'crt_manage_refresh_customize_preview', 1 );

add_action( 'init', 'crt_manage_refresh_customize_preview');

if ( ! function_exists( 'crt_manage_about_section' ) ) {
    function crt_manage_about_section() {
        require get_template_directory() . '/sections/about.php';
    }
}

/**
 * Enqueue script for custom customize control.
 */
function crt_manage_custom_control_scripts() {
    wp_enqueue_style( 'crt-manage-custom-controls-css', CRT_MANAGE_URI . '/assets/css/custom-controls.css', array(), '1.0', 'all' );
    wp_enqueue_script( 'crt-manage-custom-controls-js', CRT_MANAGE_URI . '/assets/js/custom-controls.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-sortable' ), CRT_MANAGE_VERSION, true );

    wp_enqueue_script( 'crt-manage-order-script', CRT_MANAGE_URI . '/assets/js/customizer-sections-order.js', array( 'jquery', 'jquery-ui-sortable' ), CRT_MANAGE_VERSION, true );
    $control_settings = array(
        'sections_container' => '#sub-accordion-panel-crt_manage_front_page_options',
        'saved_data_input'   => '#customize-control-sections_order input',
    );
    wp_localize_script( 'crt-manage-order-script', 'control_settings', $control_settings );
    wp_enqueue_style( 'crt-manage-order-style', CRT_MANAGE_URI . '/assets/css/customizer-sections-order-style.css', array( 'dashicons' ), CRT_MANAGE_VERSION );

}
add_action( 'customize_controls_enqueue_scripts', 'crt_manage_custom_control_scripts' );


/**
 * Get all posts for customizer Post content type.
 */
function crt_manage_get_post_choices($type = '') {
    $choices = array( '' );
    $args    = array( 'numberposts' => -1, 'post_type' => $type );
    $posts   = get_posts( $args );

    foreach ( $posts as $post ) {
        $id             = $post->ID;
        $title          = $post->post_title;
        $choices[ $id ] = $title;
    }

    return $choices;
}

/**
 * Get all pages for customizer Page content type.
 */
function crt_manage_get_page_choices() {
    $choices = array( '' );
    $pages   = get_pages();

    foreach ( $pages as $page ) {
        $choices[ $page->ID ] = $page->post_title;
    }

    return $choices;
}

/**
 * Get all categories for customizer Category content type.
 */
function crt_manage_get_post_cat_choices() {
    $choices = array( '' );
    $cats    = get_categories();

    foreach ( $cats as $cat ) {
        $choices[ $cat->term_id ] = $cat->name;
    }

    return $choices;
}

function crt_manage_section_link( $section_name ) {
    ?>
    <span class="section-link">
		<span class="section-link-title"><?php echo esc_html( $section_name ); ?></span>
	</span>
    <style type="text/css">
        section:hover .section-link {
            visibility: visible;
        }
    </style>
    <?php
}

function crt_manage_section_link_css() {
    if ( is_customize_preview() ) {
        ?>
        <style type="text/css">
            .section-link {
                visibility: hidden;
                background-color: black;
                position: absolute;
                top: 80px;
                z-index: 99;
                left: 40px;
                color: #fff;
                text-align: center;
                font-size: 20px;
                border-radius: 10px;
                padding: 20px 10px;
                text-transform: capitalize;
            }
            .section-link-title {
                padding: 0 10px;
            }
        </style>
        <?php
    }
}
add_action( 'wp_head', 'crt_manage_section_link_css' );