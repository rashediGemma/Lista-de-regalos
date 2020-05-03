<?php
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

if (!class_exists('AAWP_Wrapper')) {

    class AAWP_Wrapper
    {
        // Plugin variables
        static $plugin;
        static $plugin_name;
        static $plugin_slug;
        static $plugin_path;
        static $plugin_url;

        // Function variables
        public $options = array();

        /**
         * Construct the object
         */
        public function __construct()
        {
            // Options
            $this->options['api'] = get_option( 'aawp_api', array() );
            $this->options['general'] = get_option( 'aawp_general', array() );
            $this->options['output'] = get_option( 'aawp_output', array() );
        }

        /*
         * Setup plugin vars
         */
        public function set_plugin_vars($plugin) {
            self::$plugin = $plugin;
            self::$plugin_name = $plugin->plugin_name;
            self::$plugin_slug = $plugin->plugin_slug;
            self::$plugin_path = $plugin->plugin_path;
            self::$plugin_url = $plugin->plugin_url;
        }

        public function debug( $arg ) {
            echo '<pre>';
            print_r($arg);
            echo '</pre>';
        }
    }

    $AAWP_Wrapper = new AAWP_Wrapper();
    $AAWP_Wrapper->set_plugin_vars($this);
}

// Helper
function aawp_set_api_check_routine() {
    set_transient( 'flowdee_aawp_api_check_routine', true, 60 * 60 * 72 );
}