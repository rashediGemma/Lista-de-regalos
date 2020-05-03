<?php
/**
 * Plugin Name:     Amazon Affiliate for WordPress
 * Plugin URI:      https://getaawp.com
 * Description:     Display Amazon Affiliate links and nice product boxes, bestseller list and much more!
 * Version:         3.8.7
 * Author:          AAWP
 * Author URI:      https://getaawp.com
 * Text Domain:     aawp
 *
 * @package         AAWP
 * @author          flowdee
 * @copyright       Copyright 2018 fdmedia
 *
 * All Rights Reserved.
 * This work is protected by copyright laws and international treaties.
 */

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'AAWP_Affiliate' ) ) {

    /**
     * Main AAWP plugin class
     *
     * @since       2.0.0
     */
    class AAWP_Affiliate {

        // General
        public $plugin;
        public $plugin_name;
        public $plugin_slug;
        public $plugin_path;
        public $plugin_url;

        // Invididual
        private $functions = array();
        private $shortcode;

        public function __construct()
        {
            $this->setup_variables();
            $this->setup_constants();
            $this->includes();
            $this->load_textdomain();
        }

        /**
         * Setup plugin vars
         *
         * @access      private
         * @since       2.0.0
         * @return      void
         */
        private function setup_variables() {

            global $aawp_plugin;
            global $aawp_plugin_name;
            global $aawp_plugin_slug;
            global $aawp_plugin_path;
            global $aawp_plugin_url;

            // Plugins
            $this->plugin = $this;
            $aawp_plugin = $this;

            // Plugin name
            $this->plugin_name = 'Amazon Affiliate for WordPress';
            $aawp_plugin_name = $this->plugin_name;

            // Plugin name
            $this->plugin_slug = 'AAWP_AFFILIATE';
            $aawp_plugin_slug = $this->plugin_slug;

            // Plugin path
            $this->plugin_path = plugin_dir_path( __FILE__ );
            $aawp_plugin_path = plugin_dir_path( __FILE__ );

            // Plugin URL
            $this->plugin_url = plugin_dir_url( __FILE__ );
            $aawp_plugin_url = plugin_dir_url( __FILE__ );

            // Shortcode
            $options = get_option( 'aawp_general' );
            $this->shortcode = ( !empty ( $options['shortcode'] ) ) ? $options['shortcode'] : 'amazon';
        }

        /**
         * Setup plugin constants
         *
         * @access      private
         * @since       2.0.0
         * @return      void
         */
        private function setup_constants() {
            // Plugin version
            define( 'AAWP_AFFILIATE_VER', '3.8.7' );

            // Plugin file
            define( 'AAWP_AFFILIATE_FILE', __FILE__ );

            // Plugin path
            define( 'AAWP_AFFILIATE_DIR', $this->plugin_path );

            // Plugin URL
            define( 'AAWP_AFFILIATE_URL', $this->plugin_url );

            // Plugin Settings URL
            if ( !defined('AAWP_ADMIN_SETTINGS_URL') ) {
                define( 'AAWP_ADMIN_SETTINGS_URL', admin_url( 'admin.php?page=aawp-settings' ) );
            }

            // Plugin Public URL
            if ( ! defined('AAWP_PLUGIN_URL') ) {
                define( 'AAWP_PLUGIN_URL', $this->plugin_url );
            }

            // DEBUG
            $options = get_option( 'aawp_support' );

            if ( !defined('AAWP_DEBUG') && isset ( $options['debug'] ) && $options['debug'] == '1' ) {
                define( 'AAWP_DEBUG', true );
            }
        }

        /**
         * Include necessary files
         *
         * @access      private
         * @since       2.0.0
         * @return      void
         */
        private function includes() {

            if ( version_compare( phpversion(), '5.3', '<' ) )
                return;

            // Bootstrap
            require_once $this->plugin_path . 'includes/aawp/bootstrap.php';

            // Autoload functions
            $this->autoload_functions();

            // Plugin files
            require_once $this->plugin_path . 'includes/scripts.php';
        }

        /**
         * Autoload functions
         *
         * @access      public
         * @since       2.0.0
         * @return      void
         */
        public function autoload_functions() {

            if ( ! function_exists( 'aawp_cleanup_function_name' ) )
                return;

            $functions_directory = trailingslashit( $this->plugin_path ) . 'includes/functions/';

            $paths = array( 'deprecated/', 'widgets/', 'components/', '' );
            $files = array();

            // Collect functions and components
            foreach ( $paths as $path ) {

                foreach ( glob( $functions_directory . $path . '*.php' ) as $file ) {
                    $this->functions[] = aawp_cleanup_function_name( $file, $functions_directory );
                    array_push( $files, $file );
                }
            }

            // Load files
            foreach ( $files as $file ) {
                require_once ( $file );
            }
        }

        /**
         * Internationalization
         *
         * @access      public
         * @since       2.0.0
         * @return      void
         */
        public function load_textdomain() {
            load_plugin_textdomain( 'aawp', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
        }
    }
} // End if class_exists check


/**
 * The main function responsible for returning the one true AAWP
 * instance to functions everywhere
 *
 * @since       2.0.0
 * @return      \AAWP_Affiliate The one true AAWP_Affiliate
 */
function AAWP_Affiliate_load() {
    new AAWP_Affiliate();
}
add_action( 'plugins_loaded', 'AAWP_Affiliate_load' );

/**
 * The activation hook
 */
function aawp_affiliate_activation() {

    // Installation
    require_once plugin_dir_path( __FILE__ ) . '/includes/aawp/install.php';

    if ( function_exists( 'aawp_run_install' ) )
        aawp_run_install();
}
register_activation_hook( __FILE__, 'aawp_affiliate_activation' );


/*
 * Plugin action links
 */
function aawp_affiliate_plugin_action_links( $links, $file ) {

    if ( $file == 'aawp/aawp.php' ) {

        $php_required = '5.6';

        if ( version_compare( phpversion(), $php_required, '<' ) ) {
            $info = '<span style="color: red; font-weight: bold;">' . sprintf( esc_html__( 'PHP Version %1$s or newer required!', 'aawp' ), $php_required ) . '</span>';
            array_push( $links, $info );
        } else {
            $settings_link = '<a href="' . admin_url( 'admin.php?page=aawp-settings' ) . '">' . esc_html__( 'Settings', 'aawp' ) . '</a>';
            array_unshift( $links, $settings_link );
        }
    }

    return $links;
}
add_filter( 'plugin_action_links', 'aawp_affiliate_plugin_action_links', 10, 2 );

/*
 * Plugin Updater
 */
if( ! class_exists( 'AAWP_EDD_SL_Plugin_Updater' ) ) {
    // load our custom updater
    include( dirname( __FILE__ ) . '/includes/libs/EDD_SL_Plugin_Updater.php' );
}

function aawp_affiliate_edd_plugin_updater() {

    if ( ! function_exists( 'aawp_get_validated_license_server' ) || ! defined( 'AAWP_AFFILIATE_VER' ) )
        return;

    // retrieve our license key from the DB
    $licensing = get_option( 'aawp_licensing', array() );

    if ( isset($licensing['key']) ) {
        $licensing = aawp_get_validated_license_server($licensing);

        if (!empty($licensing['server'])) {
            // setup the updater
            $aawp_updater = new AAWP_EDD_SL_Plugin_Updater( $licensing['server'], __FILE__, array(
                    'version'   => AAWP_AFFILIATE_VER,
                    'license'   => $licensing['key'],
                    'item_name' => 'Amazon Affiliate for WordPress',
                    'author'    => 'flowdee',
                    'url'       => home_url()
                )
            );
        }
    }
}
add_action( 'admin_init', 'aawp_affiliate_edd_plugin_updater', 0 );