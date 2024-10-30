<?php
defined('ABSPATH') or die('Sorry guys!');
/**
 * @class CRT_Manage_Base
 */
class CRT_Manage_Base {

    public static $_instance = '';

    protected $crt_manage_data;

    protected $crt_manage_theme;

    protected $crt_manage_depend_plugins = false;

    protected $crt_manage_theme_allow_used = array(
        'dimitrova-portfolio',
        'luca-portfolio',
        'jason-portfolio-resume',
        'tamal-portfolio',
        'melissa-portfolio',
    );

    public $prefix_field = '';

    public function __construct() {
        $this->crt_manage_theme = get_option( 'template' );
        if ( ! defined( 'CRT_MANAGE_VERSION' ) ) {
            define( 'CRT_MANAGE_VERSION', '1.0.3' );
        }

        if(!in_array($this->crt_manage_theme, $this->crt_manage_theme_allow_used)) {
            $this->crt_manage_depend_plugins = true;
        }
        if ($this->crt_manage_depend_plugins) {
            add_action( 'admin_notices', 'crt_manage_add_notice' );
            function crt_manage_add_notice() {
                ?>
                <div class="notice notice-warning is-dismissible">
                    <p><?php esc_html_e( 'CRT Manage plugin does not support this theme yet.', 'crt-manage' ); ?></p>
                </div>
                <?php
            }
        } else {
            $this->includes();
        }

    }

    public static function instance() {
        if (empty(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function includes() {
        if($this->crt_manage_theme === 'crt-manage') {
        }
        require_once dirname( __FILE__, 2 ) . '/includes/customizer/customizer.php';
        require_once dirname( __FILE__, 2 ) . '/includes/ocdi.php';
    }



}