<?php
/**
 * Bootstrapping AAWP core
 *
 * @since       3.2.0
 */

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

// Prevent bootstrapping twice
if ( class_exists( 'AAWP_Core' ) )
    return;

global $aawp_version;
$aawp_version = '3.8.7';

// Constants
define( 'AAWP_PLACEHOLDER_TRACKING_ID', 'AAWP_PLACEHOLDER_TRACKING_ID' );

// Core files
require_once __DIR__ . '/helper.php';
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/class.aawp-db.php';
require_once __DIR__ . '/class.aawp-db-products.php';
require_once __DIR__ . '/class.aawp-db-lists.php';
require_once __DIR__ . '/class.aawp-api.php';
require_once __DIR__ . '/hooks.php';
require_once __DIR__ . '/class.aawp-wrapper.php';
require_once __DIR__ . '/class.aawp-core.php';
require_once __DIR__ . '/class.aawp-functions.php';
require_once __DIR__ . '/api-functions.php';
require_once __DIR__ . '/cache-functions.php';
require_once __DIR__ . '/class.api-handler.php';
require_once __DIR__ . '/class.cache-handler.php';
require_once __DIR__ . '/class.template-functions.php';
require_once __DIR__ . '/class.template-handler.php';
require_once __DIR__ . '/list-functions.php';
require_once __DIR__ . '/product-functions.php';
require_once __DIR__ . '/product-helper-functions.php';
require_once __DIR__ . '/shortcodes.php';
require_once __DIR__ . '/class.aawp-product.php';

if ( is_admin() ) {
    require_once __DIR__ . '/admin/functions.php';
    require_once __DIR__ . '/admin/actions.php';
    require_once __DIR__ . '/admin/ajax.php';
    require_once __DIR__ . '/admin/hooks.php';
    require_once __DIR__ . '/admin/pages.php';
    require_once __DIR__ . '/admin/post-search.php';
    require_once __DIR__ . '/admin/class.settings.php';
    require_once __DIR__ . '/admin/dashboard-page.php';
    require_once __DIR__ . '/admin/class.support.php';
    require_once __DIR__ . '/admin/sysinfo.php';
    require_once __DIR__ . '/admin/modals.php';

    require_once __DIR__ . '/admin/class.settings-api.php';
    require_once __DIR__ . '/admin/class.settings-general.php';
    require_once __DIR__ . '/admin/class.settings-output.php';
    require_once __DIR__ . '/admin/class.settings-functions.php';
    require_once __DIR__ . '/admin/class.settings-info.php';
    require_once __DIR__ . '/admin/infoboxes.php';

    require_once __DIR__ . '/admin/list-edit.php';
    require_once __DIR__ . '/admin/list-overview.php';
    require_once __DIR__ . '/admin/product-edit.php';
    require_once __DIR__ . '/admin/product-overview.php';

    require_once __DIR__ . '/admin/upgrades.php';
}