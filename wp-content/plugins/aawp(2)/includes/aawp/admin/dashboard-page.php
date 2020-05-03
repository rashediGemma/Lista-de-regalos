<?php
/**
 * Admin Menu Pages
 *
 * @package     AAWP\CacheHandler
 * @since       2.0.0
 */

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

function aawp_admin_dashboard_page_render() {

    global $aawp_plugin_url;

    ?>
    <div class="wrap aawp-wrap">
        <h2>
            <img class="aawp-icon-settings" src="<?php echo $aawp_plugin_url . 'public/assets/img/icon-settings.png'; ?>" />
            <?php _e( 'Dashboard', 'aawp' ); ?>
        </h2>
        <p>Coming soon!</p>
    </div>
    <?php
}