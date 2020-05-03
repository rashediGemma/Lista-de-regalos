<?php
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

if ( !class_exists( 'AAWP_Core' ) ) {

    class AAWP_Core extends AAWP_Wrapper {

        var $shortcode;
        var $shortcodes_used = false;

        var $cleanup_shortcode_output;

        /**
         * Construct the object
         */
        public function __construct()
        {
            // Call parent constructor first
            parent::__construct();

            // Check environment dependencies
            if ( ! aawp_check_dependencies() )
                return;

            // Check API status
            if ( ! aawp_check_api_connection() )
                return;

            global $aawp_dependencies;

            $aawp_dependencies = true;

            // Setup core functionality
            $this->shortcode = ( !empty( $this->options['general']['shortcode'] ) ) ? $this->options['general']['shortcode'] : 'amazon';

            $this->setup_shortcodes();

            add_filter( 'the_content', array( $this, 'the_content' ), 20 );
        }

        public function setup_shortcodes() {

            if ( $this->shortcode === 'disabled' ) {
                add_shortcode( 'aawp', array( $this, 'render_disabled_shortcode' ) );

                if ( ! shortcode_exists( 'amazon' ) )
                    add_shortcode( 'amazon', array( $this, 'render_disabled_shortcode' ) );

            } else {

                add_shortcode( 'aawp', array( $this, 'render_shortcode' ) );

                if ( $this->shortcode === 'amazon' )
                    add_shortcode( 'amazon', array( $this, 'render_shortcode' ) );
            }
        }

        public function render_shortcode($atts, $content = null, $param) {

            $this->shortcodes_used = true;

            // Shortcode action
            ob_start();

            do_action( 'aawp_shortcode_before_handler', $atts, $content );

            do_action( 'aawp_shortcode_handler', $atts, $content );

            do_action( 'aawp_shortcode_after_handler', $atts, $content );

            $str = ob_get_clean();

            // Return
            return $str;
        }

        public function render_disabled_shortcode( $atts, $content = null ) {
            return '';
        }

        /*
         * The content
         */
        public function the_content( $content ) {

            // Default
            $aawp_content = false;

            // Check shortcodes
            if ( $this->shortcodes_used )
                $aawp_content = true;

            //$aawp_content = ( has_shortcode( $content, $this->shortcode) ) ? true : false;
            $aawp_content = apply_filters( 'aawp_content', $aawp_content );

            if ( $aawp_content ) {

                // Hook for functions
                $content = apply_filters( 'aawp_the_content', $content );
            }

            return $content;
        }
    }

    new AAWP_Core();
}