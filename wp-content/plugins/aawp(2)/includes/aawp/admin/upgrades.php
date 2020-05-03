<?php
/**
 * Handling plugin upgrades
 *
 * @since       3.6.1
 */

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

/**
 * Handling plugin upgrades
 */
function aawp_admin_plugin_upgrades() {

    global $aawp_version;

    $aawp_version_installed = get_option( 'aawp_version', '' );

    //aawp_debug_log( '$aawp_version >> ' . $aawp_version . ' - $aawp_version_installed >> ' . $aawp_version_installed );

    if ( $aawp_version_installed === $aawp_version || ( ! empty( $aawp_version_installed ) && version_compare( $aawp_version, $aawp_version_installed, '<' ) ) )
        return;

    /*
     * Loop updates
     ---------------------------------------------------------- */
    if ( ! empty( $aawp_version_installed ) ) {

        // 2.0 rebuild cleanup
        if ( version_compare( $aawp_version_installed, '3.0.0', '<' ) )
            aawp_admin_plugin_upgrade_rebuild_cleanup();

        // 3.3.0
        if ( version_compare( $aawp_version_installed, '3.3.0', '<' ) )
            aawp_admin_plugin_update_pre_3_3_0_action();

        // 3.3.2
        if ( version_compare( $aawp_version_installed, '3.3.2', '<' ) )
            aawp_admin_plugin_update_pre_3_3_2_action();

        // 3.3.3
        if ( version_compare( $aawp_version_installed, '3.3.3', '<' ) )
            aawp_admin_plugin_update_pre_3_3_3_action();

        // 3.4.3
        if ( version_compare( $aawp_version_installed, '3.4.3', '<' ) )
            aawp_admin_plugin_update_pre_3_4_3_action();

        // 3.6.1
        if ( version_compare( $aawp_version_installed, '3.6.1', '<' ) ) {
            aawp_admin_plugin_update_pre_3_6_1_action();
        }

        // 3.6.4
        if ( version_compare( $aawp_version_installed, '3.6.4', '<' ) ) {
            aawp_admin_plugin_update_pre_3_6_4_action();
        }

        // 3.6.9
        if ( version_compare( $aawp_version_installed, '3.6.9', '<' ) ) {
            aawp_admin_plugin_update_pre_3_6_9_action();
        }
    }
    /* ---------------------------------------------------------- */

    // General tasks
    aawp_check_scheduled_events();

    // Update current version
    update_option( 'aawp_version', $aawp_version );

}
add_action( 'admin_init', 'aawp_admin_plugin_upgrades' );

/**
 * Pre v3.6.9 upgrade handler
 * - Restore old "hide button" setting
 */
function aawp_admin_plugin_update_pre_3_6_9_action() {

    $output_settings = aawp_get_options( 'output' );

    // Button icon was "0"? then reset icon and set new hide icon setting
    if ( empty( $output_settings['button_icon'] ) ) {
        $output_settings['button_icon'] = 'black';
        $output_settings['button_icon_hide'] = '1';

        aawp_update_options( 'output', $output_settings );
    }
}

/**
 * Below v3.6.4 upgrade handler
 * - Cleanup products without image ids from database
 */
function aawp_admin_plugin_update_pre_3_6_4_action() {

    $AAWP_DB_Products = new AAWP_DB_Products();

    $products = $AAWP_DB_Products->get_products( array( 'number' => 200, 'images_missing' => true ) );

    if ( ! empty( $products ) && is_array( $products ) ) {

        foreach ( $products as $product ) {

            if ( ! isset( $product['id'] ) )
                continue;

            $deleted = $AAWP_DB_Products->delete( $product['id'] );
        }
    }
}

/**
 * Below v3.6.1 upgrade handler
 * - Remove old database tables
 * - Create new database tables
 */
function aawp_admin_plugin_update_pre_3_6_1_action() {
    aawp_reset_database();
}

/**
 * Below v3.4.3 upgrade handler
 * - Optimize price reduction settings (#737)
 */
function aawp_admin_plugin_update_pre_3_4_3_action() {

    // Get options
    $output_options = aawp_get_options( 'output' );

    // Handle renamed "pricing_saved_type" key
    $output_options['pricing_reduction'] = ( isset( $output_options['pricing_saved_type'] ) && 'hidden' != $output_options['pricing_saved_type'] ) ? $output_options['pricing_saved_type'] : 'amount';

    // New defaults
    $output_options['pricing_show_old_price'] = true;
    $output_options['pricing_show_price_reduction'] = true;
    $output_options['pricing_sale_ribbon_text'] = __( 'Sale', 'aawp' );

    // Handle removed "hidden" option for previous "pricing_saved_type" setting
    if ( isset( $output_options['pricing_saved_type'] ) && 'hidden' === $output_options['pricing_saved_type'] ) {
        $output_options['pricing_show_price_reduction'] = false;
        $output_options['pricing_sale_ribbon_text'] = '';
    }

    // Handle removed options for previous "pricing_saved_position" setting
    if ( isset( $output_options['pricing_saved_position'] ) && 'ribbon' === $output_options['pricing_saved_position'] ) {
        $output_options['pricing_show_price_reduction'] = false;
        $output_options['pricing_sale_ribbon_text'] = '%PRICE_REDUCTION%';

    } elseif ( isset( $output_options['pricing_saved_position'] ) && 'no_ribbon' === $output_options['pricing_saved_position'] ) {
        $output_options['pricing_sale_ribbon_text'] = '';
    }

    // Remove old keys
    unset( $output_options['pricing_saved_type'] );
    unset( $output_options['pricing_saved_position'] );

    // Update options
    aawp_update_options( 'output', $output_options );
}


/**
 * Below v3.3.3 upgrade handler
 * - Reset cronjobs
 * - Set global last_update timestamp if empty
 */
function aawp_admin_plugin_update_pre_3_3_3_action() {

    // Reset cronjobs
    wp_clear_scheduled_hook('aawp_wp_scheduled_events');
    wp_clear_scheduled_hook('aawp_wp_scheduled_daily_events');
    wp_clear_scheduled_hook('aawp_wp_scheduled_weekly_events');

    if ( ! wp_next_scheduled ( 'aawp_wp_scheduled_events' ) )
        wp_schedule_event( time(), 'aawp_continuously', 'aawp_wp_scheduled_events' );

    if ( ! wp_next_scheduled ( 'aawp_wp_scheduled_daily_events' ) )
        wp_schedule_event( time(), 'daily', 'aawp_wp_scheduled_daily_events' );

    if ( ! wp_next_scheduled ( 'aawp_wp_scheduled_weekly_events' ) )
        wp_schedule_event( time(), 'aawp_weekly', 'aawp_wp_scheduled_weekly_events' );

    // Set global last_update timestamp if empty
    $last_update = aawp_get_cache_last_update();

    if ( empty( $last_update ) )
        aawp_set_cache_last_update();
}

/**
 * Below v3.3.2 upgrade handler
 * - Adding new daily cron event
 * - Updating (re-)moved settings
 */
function aawp_admin_plugin_update_pre_3_3_2_action() {

    // Checking cron events
    //if ( ! wp_next_scheduled ( 'aawp_wp_scheduled_daily_events' ) ) // Deprecated
    //    wp_schedule_event( time(), 'daily', 'aawp_wp_scheduled_daily_events' );  // Deprecated

    // Update options
    $general_options = aawp_get_options( 'general' );
    $output_options = aawp_get_options( 'output' );

    $output_options['check_prime'] = ( isset( $output_options['show_check_prime'] ) && $output_options['show_check_prime'] == '1' ) ? 'linked' : 'none';
    unset( $output_options['show_check_prime'] );

    $output_options['button_cart_links'] = ( isset( $general_options['affiliate_links_cart'] ) && $general_options['affiliate_links_cart'] == '1' ) ? '1' : null;
    unset( $general_options['affiliate_links_cart'] );

    aawp_update_options( 'general', $general_options );
    aawp_update_options( 'output', $output_options );
}

/**
 * Below v3.3.0 upgrade handler
 * - Database tables
 * - Cron events
 * - Template settings
 */
function aawp_admin_plugin_update_pre_3_3_0_action() {

    // Checking cron events
    if ( ! wp_next_scheduled ( 'aawp_wp_scheduled_events' ) )
        wp_schedule_event( time(), 'hourly', 'aawp_wp_scheduled_events' );

    // Updating selected default templates which are deprecated
    if ( function_exists( 'aawp_get_options' ) && function_exists( 'aawp_update_options' ) ) {

        $functions_options = aawp_get_options( 'functions' );

        $template_checks = array( 'box_template', 'bestseller_template', 'new_releases_template' );

        foreach ( $template_checks as $default_template ) {

            if ( isset( $functions_options[$default_template] ) ) {

                $template_saved = $functions_options[$default_template];

                if ( in_array( $template_saved, array( 'box', 'bestseller', 'new_releases' ) ) )
                    $template_saved = 'horizontal';

                if ( in_array( $template_saved, array( 'box_table', 'bestseller_table', 'new_releases_table' ) ) )
                    $template_saved = 'table';

                $functions_options[$default_template] = $template_saved;
            }
        }

        aawp_update_options( 'functions', $functions_options);
    }

    // Removing old option caches
    delete_option( 'aawp_cache' );
    delete_option( 'aawp_rating_cache' );
}

// Below 3.0.0
function aawp_admin_plugin_update_pre_3_0_0_action() {

    $api_options = get_option( 'aawp_api', array() );

    if (sizeof($api_options) == 0)
        return;

    // Reset default API connection
    $api_options['status'] = 0;
    update_option( 'aawp_api', $api_options );

    // Clear cache
    //aawp_renew_cache(); // Deprecated
}

/*
 * Handle 2.0 rebuild cleanup
 */
function aawp_admin_plugin_upgrade_rebuild_cleanup() {

    $access_key = get_option('AAWP_aws_access_key', null);
    $private_key = get_option('AAWP_aws_private_key', null);

    if ( ! empty ( $access_key ) || ! empty ( $private_key ) ) {

        // Delete old options
        $old_options = array(
            'AAWP_aws_access_key',
            'AAWP_aws_private_key',
            'AAWP_default_provider',
            'AAWP_aws_associate',
            'AAWP_cache_duration',
            'AAWP_shortcode',
            'AAWP_disclaimer',
            'AAWP_disclaimer_text',
            'AAWP_credits',
            'AAWP_css',
            'AAWP_description_items_count',
            'AAWP_style',
            'AAWP_template_single',
            'AAWP_template_bestseller',
            'AAWP_template_single_default',
            'AAWP_template_bestseller_default',
            'AAWP_aws_access_test',
            'AAWP_aws_access_errormsg',
            'AAWP_license_status',
            'AAWP_license_key',
        );

        foreach ( $old_options as $option ) {
            delete_option( $option );
        }
    }
}

/*
 * Upgrade plugin settings after 2.0 core rebuild
 */
function aawp_admin_action_upgrade_rebuild() {

    // Prepare new options
    $options = array();

    $options['api'] = get_option( 'aawp_api', array() );
    $options['general'] = get_option( 'aawp_general', array() );
    $options['output'] = get_option( 'aawp_output', array() );
    $options['functions'] = get_option( 'aawp_functions', array() );

    // Convert old options
    $options['api']['key'] = get_option('AAWP_aws_access_key', null);
    $options['api']['secret'] = get_option('AAWP_aws_private_key', null);
    $options['api']['country'] = get_option('AAWP_default_provider', null);
    $options['api']['associate_tag'] = get_option('AAWP_aws_associate', null);

    $options['general']['cache_duration'] = get_option('AAWP_cache_duration', null);
    $options['general']['shortcode'] = get_option('AAWP_shortcode', null);
    $options['general']['disclaimer_position'] = ( get_option('AAWP_disclaimer', null) == '1' ) ? 'bottom' : 0;
    $options['general']['disclaimer_text'] = stripslashes( get_option('AAWP_disclaimer_text', null) );
    $options['general']['credits_position'] = ( get_option('AAWP_credits', null) == '1' ) ? 'bottom' : 0;

    $options['output']['custom_css'] = stripslashes( get_option('AAWP_css', null) );
    $options['output']['description_items'] = get_option('AAWP_description_items_count', null);

    $options['functions']['box_style'] = ( strpos( get_option('AAWP_style' ), 'light') !== false) ? 'light' : 'standard';;
    $options['functions']['bestseller_style'] = ( strpos( get_option('AAWP_style' ), 'light') !== false) ? 'light' : 'standard';;

    // Clear options
    foreach ( $options as $group_key => $option_group ) {

        foreach ( $option_group as $option_key => $option ) {

            if ( is_null($option) ) {
                unset($options[$group_key][$option_key]);
            }
        }
    }

    // Check API credentials
    if ( $options['api']['country'] && $options['api']['key'] && $options['api']['secret'] && $options['api']['associate_tag'] ) {

        $amazon = new AAWP_API();
        $amazon->set_credentials($options['api']['country'], $options['api']['key'], $options['api']['secret'], $options['api']['associate_tag']);

        if ($amazon->is_verified()) {
            $options['api']['status'] = 1;
        } else {
            $options['api']['status'] = 0;
            $options['api']['error'] = aawp_get_api_error_message_text($amazon->get_error_message());
        }
    } else {
        // Set API status to false by default
        $options['api']['status'] = 0;
    }

    // Check Licensing
    if ( class_exists( 'AAWP_Licensing' ) ) {
        $license_key = get_option('AAWP_license_key', null);

        if ( $license_key ) {
            $AAWP_Licensing = new AAWP_Licensing($this);
            $licensing = $AAWP_Licensing->activate_license(array('key' => $license_key)); // TODO: set to true
            update_option( 'aawp_licensing', $licensing );
        }
    }

    // Delete old options
    $old_options = array(
        'AAWP_aws_access_key',
        'AAWP_aws_private_key',
        'AAWP_default_provider',
        'AAWP_aws_associate',
        'AAWP_cache_duration',
        'AAWP_shortcode',
        'AAWP_disclaimer',
        'AAWP_disclaimer_text',
        'AAWP_credits',
        'AAWP_css',
        'AAWP_description_items_count',
        'AAWP_style',
        'AAWP_template_single',
        'AAWP_template_bestseller',
        'AAWP_template_single_default',
        'AAWP_template_bestseller_default',
        'AAWP_aws_access_test',
        'AAWP_aws_access_errormsg',
        'AAWP_license_status',
        'AAWP_license_key',
    );

    foreach ( $old_options as $option ) {
        delete_option( $option );
    }

    // Finally save new options
    update_option( 'aawp_api', $options['api'] );
    update_option( 'aawp_general', $options['general'] );
    update_option( 'aawp_output', $options['output'] );
    update_option( 'aawp_functions', $options['api'] );

    wp_redirect( add_query_arg( 'aawp_admin_notice', 'upgrade_success', AAWP_ADMIN_SETTINGS_URL ), 301);
    exit;
}
