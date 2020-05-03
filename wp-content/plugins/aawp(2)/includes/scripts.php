<?php
/**
 * Scripts
 *
 * @package     AAWP\Scripts
 * @since       1.0.0
 */

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

/**
 * Load admin scripts
 *
 * @since       3.2.0
 */
function aawp_affiliate_admin_scripts() {
    // Use minified libraries if SCRIPT_DEBUG and AAWP_DEBUG is turned off
    $suffix = ( ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) || ( defined( 'AAWP_DEBUG' ) && AAWP_DEBUG ) ) ? '' : '.min';

    // Dependencies
    wp_enqueue_style( 'wp-color-picker' );

    wp_enqueue_script( 'aawp-admin', AAWP_AFFILIATE_URL . 'public/assets/js/admin' . $suffix . '.js', array( 'jquery', 'jquery-ui-sortable', 'wp-color-picker' ), AAWP_AFFILIATE_VER );
    wp_enqueue_style( 'aawp-admin', AAWP_AFFILIATE_URL . 'public/assets/css/admin' . $suffix . '.css', false, AAWP_AFFILIATE_VER );

    wp_localize_script( 'aawp-admin', 'aawp_post', array(
        'ajax_url' => admin_url( 'admin-ajax.php' )
    ));
}
add_action( 'aawp_load_admin_scripts', 'aawp_affiliate_admin_scripts' );

/**
 * Load frontend scripts
 *
 * @since       3.2.0
 */
function aawp_affiliate_scripts() {
    // Use minified libraries if SCRIPT_DEBUG and AAWP_DEBUG is turned off
    $suffix = ( ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) || ( defined( 'AAWP_DEBUG' ) && AAWP_DEBUG ) ) ? '' : '.min';

    wp_enqueue_style( 'aawp', AAWP_AFFILIATE_URL . 'public/assets/css/styles' . $suffix . '.css', false, AAWP_AFFILIATE_VER );
    wp_enqueue_script( 'aawp', AAWP_AFFILIATE_URL . 'public/assets/js/scripts' . $suffix . '.js', array( 'jquery' ), AAWP_AFFILIATE_VER, true );
}
add_action( 'aawp_load_scripts', 'aawp_affiliate_scripts' );

/**
 * Print AMP styles
 *
 * @since       3.2.0
 */
function aawp_affiliate_style_target_url( $target ) {
    return AAWP_AFFILIATE_URL;
}
add_filter( 'aawp_amp_style_target_url', 'aawp_affiliate_style_target_url' );