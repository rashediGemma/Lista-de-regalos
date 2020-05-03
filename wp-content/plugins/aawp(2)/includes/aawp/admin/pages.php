<?php
/**
 * Admin Menu Pages
 *
 * @package     AAWP\CacheHandler
 * @since       2.0.0
 */

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

global $aawp_menu_slug;

/**
 * Setup menus
 *
 * Source: http://stackoverflow.com/a/23002306
 */
add_action( 'admin_menu', function() {

    global $aawp_plugin_url;
    global $aawp_menu_slug;

    $aawp_menu_slug = 'aawp-dashboard';

    $show_notification = apply_filters( 'aawp_admin_menu_show_notification', false );

    $notification_html = ( true === $show_notification ) ? ' <span class="update-plugins count-1"><span class="update-count">1</span></span>' : '';

    add_menu_page(
        __( 'AAWP', 'aawp' ),
        __( 'Amazon Affiliate', 'aawp' ) . $notification_html,
        'edit_pages',
        $aawp_menu_slug,
        'aawp_admin_dashboard_page_render',
        $aawp_plugin_url . '/public/assets/img/icon-menu.png',
        30
    );

    add_submenu_page(
        $aawp_menu_slug,
        __( 'AAWP - Dashboard', 'aawp' ),
        __( 'Dashboard', 'aawp' ),
        'edit_pages' ,
        $aawp_menu_slug
    );

    /*
    add_submenu_page(
        $aawp_menu_slug,
        __( 'AAWP - Products', 'aawp' ),
        __( 'Products', 'aawp' ),
        'edit_pages' ,
        'edit.php?post_type=aawp_product'
    );

    $show_lists = apply_filters( 'aawp_admin_menu_show_lists', false );

    if ( $show_lists ) {

        add_submenu_page(
            $aawp_menu_slug,
            __( 'AAWP - Lists', 'aawp' ),
            __( 'Lists', 'aawp' ),
            'edit_pages' ,
            'edit.php?post_type=aawp_list'
        );
    }
    */

    /**
     * Dynamically add more menu items
     */
    do_action( 'aawp_admin_menu', $aawp_menu_slug );

}, 11);

/**
 * Correct active submenu items for custom post types
 *
 * Source: http://stackoverflow.com/a/23002306
 */
add_filter('parent_file', function( $parent_file ) {

    global $submenu_file, $current_screen;

    if ( $current_screen->post_type == 'aawp_product' ) {
        $submenu_file = 'edit.php?post_type=aawp_product';
        $parent_file = 'aawp-dashboard';
    }

    if ( $current_screen->post_type == 'aawp_list' ) {
        $submenu_file = 'edit.php?post_type=aawp_list';
        $parent_file = 'aawp-dashboard';
    }

    return $parent_file;
});