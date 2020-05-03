<?php
/**
 * Helper
 *
 * @package     AAWP\Helper
 * @since       3.2.0
 */

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

/*
 * Format datetime
 */
function aawp_datetime( $timestamp ) {

    if ( ! is_numeric( $timestamp ) )
        return null;

    $date_format = get_option( 'date_format', 'm/d/Y' );
    $time_format = get_option( 'time_format', 'g:i:s A' );

    return get_date_from_gmt( date( 'Y-m-d H:i:s', $timestamp ), $date_format . ' - ' . $time_format );
}

/*
 * Format date
 */
function aawp_date( $timestamp, $lang = false ) {

    if ( ! is_numeric( $timestamp ) )
        $timestamp = strtotime( $timestamp );

    //aawp_debug_log( '$lang >> ' . $lang . ' - aawp_is_lang_de() >> ' . aawp_is_lang_de() );

    $format = ( 'de' === $lang || ( ! $lang && aawp_is_lang_de() ) ) ? 'd.m.Y' : 'm/d/Y';

    $date = date( $format, $timestamp );

    return $date;
}

/*
 * Flag icon
 */
function aawp_the_icon_flag( $country ) {

    $country = str_replace( array( 'co.', 'com.', 'com' ), array( '', '', 'us' ), $country);

    echo '<span class="aawp-icon-flag aawp-icon-flag--' . $country . '"></span>';
}

function aawp_truncate_string( $string, $limit = 200, $pad = '...' ) {

    if ( strlen( $string ) > $limit )
        $string = preg_replace('/\s+?(\S+)?$/', '', substr($string, 0, $limit + 1)) . $pad;

    return $string;
}

/*
 * Get function name
 */
function aawp_cleanup_function_name( $file, $path ) {
    return str_replace( array( $path, 'class.', '.php' ), '', $file);
}

/**
 * Strip emojis
 *
 * @param $text
 * @return null|string|string[]
 */
function aawp_strip_emojis( $text ) {

    if ( is_string( $text ) )
        $text = preg_replace('/([0-9#][\x{20E3}])|[\x{00ae}\x{00a9}\x{203C}\x{2047}\x{2048}\x{2049}\x{3030}\x{303D}\x{2139}\x{2122}\x{3297}\x{3299}][\x{FE00}-\x{FEFF}]?|[\x{2190}-\x{21FF}][\x{FE00}-\x{FEFF}]?|[\x{2300}-\x{23FF}][\x{FE00}-\x{FEFF}]?|[\x{2460}-\x{24FF}][\x{FE00}-\x{FEFF}]?|[\x{25A0}-\x{25FF}][\x{FE00}-\x{FEFF}]?|[\x{2600}-\x{27BF}][\x{FE00}-\x{FEFF}]?|[\x{2900}-\x{297F}][\x{FE00}-\x{FEFF}]?|[\x{2B00}-\x{2BF0}][\x{FE00}-\x{FEFF}]?|[\x{1F000}-\x{1F6FF}][\x{FE00}-\x{FEFF}]?/u', '', $text);

    return $text;
}


/**
 * Highlight colors
 *
 * @return string
 */
function aawp_get_default_highlight_bg_color() {
    return '#256aaf';
}

function aawp_get_default_highlight_color() {
    return '#fff';
}

/**
 * Output data to a log for debugging reasons
 **/
function aawp_add_log( $string, $debug_only = false ) {

    $support_options = aawp_get_options( 'support' );

    //$debug = ( defined( 'AAWP_DEBUG' ) && AAWP_DEBUG == true ) ? true : false;
    //$debug_logging = ( isset ( $support_options['debug_logging'] ) && $support_options['debug_logging'] == '1' ) ? true : false;
    $debug_logging = true;
    $debug_display = ( defined( 'AAWP_DEBUG_DISPLAY' ) && AAWP_DEBUG_DISPLAY == true ) ? true : false;

    if ( $debug_display || ! $debug_only || $debug_logging ) {

        $datetime = get_date_from_gmt( date( 'Y-m-d H:i:s', time() ), 'd.m.Y H:i:s' );
        $string = $datetime . " >>> " . $string . "\n";
        //$string = date( 'd.m.Y H:i:s' ) . " >>> " . $string . "\n";

        if ( $debug_display ) {
            aawp_debug( $string );
        } else {
            $log = aawp_get_log();
            $log .= $string;
            aawp_update_log( $log );
        }
    }
}

function aawp_get_log( $default = '' ) {
    $log = get_transient( 'aawp_log' );
    return ( ! empty( $log) ) ? $log : $default;
}

function aawp_update_log( $log ) {
    set_transient( 'aawp_log', $log, 60 * 60 * 24 * 7 ); // 7 days
}

function aawp_delete_log() {
    delete_transient( 'aawp_log' );
}

/*
 * Check lang
 */
function aawp_is_lang_de() {
    return ( strpos( get_bloginfo('language') ,'de-') !== false ) ? true : false;
}

/*
 * Check user rights
 */
function aawp_is_user_admin() {
    return ( current_user_can('manage_options' ) ) ? true : false;
}

function aawp_is_user_editor() {
    return ( current_user_can('edit_pages' ) ) ? true : false;
}

/*
 * The assets
 */
function aawp_the_assets() {
    echo apply_filters( 'aawp_assets_url', AAWP_PLUGIN_URL . 'public/assets/' );
}

function aawp_get_assets_url() {
    return apply_filters( 'aawp_assets_url', AAWP_PLUGIN_URL . 'public/assets/' );
}

function aawp_get_public_url() {
	return apply_filters( 'aawp_public_url', AAWP_PLUGIN_URL . 'public/' );
}

function aawp_get_db_datetime() {
    return date( 'Y-m-d H:i:s' );
}

/**
 * Lightens/darkens a given colour (hex format), returning the altered colour in hex format.7
 * @param str $hex Colour as hexadecimal (with or without hash);
 * @percent float $percent Decimal ( 0.2 = lighten by 20%(), -0.4 = darken by 40%() )
 * @return str Lightened/Darkend colour as hexadecimal (with hash);
 */
function aawp_color_luminance( $hex, $percent ) {

    // validate hex string

    $hex = preg_replace( '/[^0-9a-f]/i', '', $hex );
    $new_hex = '#';

    if ( strlen( $hex ) < 6 ) {
        $hex = $hex[0] + $hex[0] + $hex[1] + $hex[1] + $hex[2] + $hex[2];
    }

    // convert to decimal and change luminosity
    for ($i = 0; $i < 3; $i++) {
        $dec = hexdec( substr( $hex, $i*2, 2 ) );
        $dec = min( max( 0, $dec + $dec * $percent ), 255 );
        $new_hex .= str_pad( dechex( $dec ) , 2, 0, STR_PAD_LEFT );
    }

    return $new_hex;
}

/**
 * Convert hexdec color string to rgb(a) string
 *
 * @param $color
 * @param bool $opacity
 *
 * @return string
 */
function aawp_color_hex2rgba($color, $opacity = false) {

    $default = 'rgb(0,0,0)';

    //Return default if no color provided
    if(empty($color))
        return $default;

    //Sanitize $color if "#" is provided
    if ($color[0] == '#' ) {
        $color = substr( $color, 1 );
    }

    //Check if color has 6 or 3 characters and get values
    if (strlen($color) == 6) {
        $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
    } elseif ( strlen( $color ) == 3 ) {
        $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
    } else {
        return $default;
    }

    //Convert hexadec to rgb
    $rgb =  array_map('hexdec', $hex);

    //Check if opacity is set(rgba or rgb)
    if($opacity){
        if(abs($opacity) > 1)
            $opacity = 1.0;
        $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
    } else {
        $output = 'rgb('.implode(",",$rgb).')';
    }

    //Return rgb(a) color string
    return $output;
}

/**
 * Get currency symbol from currency code
 *
 * @param $code
 *
 * @return mixed|string
 */
function aawp_get_currency_symbol( $code ) {

    // SRC: https://gist.github.com/Gibbs/3920259

    $currency_symbols = array(
        'AED' => '&#1583;.&#1573;', // ?
        'AFN' => '&#65;&#102;',
        'ALL' => '&#76;&#101;&#107;',
        'AMD' => '',
        'ANG' => '&#402;',
        'AOA' => '&#75;&#122;', // ?
        'ARS' => '&#36;',
        'AUD' => '&#36;',
        'AWG' => '&#402;',
        'AZN' => '&#1084;&#1072;&#1085;',
        'BAM' => '&#75;&#77;',
        'BBD' => '&#36;',
        'BDT' => '&#2547;', // ?
        'BGN' => '&#1083;&#1074;',
        'BHD' => '.&#1583;.&#1576;', // ?
        'BIF' => '&#70;&#66;&#117;', // ?
        'BMD' => '&#36;',
        'BND' => '&#36;',
        'BOB' => '&#36;&#98;',
        'BRL' => '&#82;&#36;',
        'BSD' => '&#36;',
        'BTN' => '&#78;&#117;&#46;', // ?
        'BWP' => '&#80;',
        'BYR' => '&#112;&#46;',
        'BZD' => '&#66;&#90;&#36;',
        'CAD' => '&#36;',
        'CDF' => '&#70;&#67;',
        'CHF' => '&#67;&#72;&#70;',
        'CLF' => '', // ?
        'CLP' => '&#36;',
        'CNY' => '&#165;',
        'COP' => '&#36;',
        'CRC' => '&#8353;',
        'CUP' => '&#8396;',
        'CVE' => '&#36;', // ?
        'CZK' => '&#75;&#269;',
        'DJF' => '&#70;&#100;&#106;', // ?
        'DKK' => '&#107;&#114;',
        'DOP' => '&#82;&#68;&#36;',
        'DZD' => '&#1583;&#1580;', // ?
        'EGP' => '&#163;',
        'ETB' => '&#66;&#114;',
        'EUR' => '&#8364;',
        'FJD' => '&#36;',
        'FKP' => '&#163;',
        'GBP' => '&#163;',
        'GEL' => '&#4314;', // ?
        'GHS' => '&#162;',
        'GIP' => '&#163;',
        'GMD' => '&#68;', // ?
        'GNF' => '&#70;&#71;', // ?
        'GTQ' => '&#81;',
        'GYD' => '&#36;',
        'HKD' => '&#36;',
        'HNL' => '&#76;',
        'HRK' => '&#107;&#110;',
        'HTG' => '&#71;', // ?
        'HUF' => '&#70;&#116;',
        'IDR' => '&#82;&#112;',
        'ILS' => '&#8362;',
        'INR' => '&#8377;',
        'IQD' => '&#1593;.&#1583;', // ?
        'IRR' => '&#65020;',
        'ISK' => '&#107;&#114;',
        'JEP' => '&#163;',
        'JMD' => '&#74;&#36;',
        'JOD' => '&#74;&#68;', // ?
        'JPY' => '&#165;',
        'KES' => '&#75;&#83;&#104;', // ?
        'KGS' => '&#1083;&#1074;',
        'KHR' => '&#6107;',
        'KMF' => '&#67;&#70;', // ?
        'KPW' => '&#8361;',
        'KRW' => '&#8361;',
        'KWD' => '&#1583;.&#1603;', // ?
        'KYD' => '&#36;',
        'KZT' => '&#1083;&#1074;',
        'LAK' => '&#8365;',
        'LBP' => '&#163;',
        'LKR' => '&#8360;',
        'LRD' => '&#36;',
        'LSL' => '&#76;', // ?
        'LTL' => '&#76;&#116;',
        'LVL' => '&#76;&#115;',
        'LYD' => '&#1604;.&#1583;', // ?
        'MAD' => '&#1583;.&#1605;.', //?
        'MDL' => '&#76;',
        'MGA' => '&#65;&#114;', // ?
        'MKD' => '&#1076;&#1077;&#1085;',
        'MMK' => '&#75;',
        'MNT' => '&#8366;',
        'MOP' => '&#77;&#79;&#80;&#36;', // ?
        'MRO' => '&#85;&#77;', // ?
        'MUR' => '&#8360;', // ?
        'MVR' => '.&#1923;', // ?
        'MWK' => '&#77;&#75;',
        'MXN' => '&#36;',
        'MYR' => '&#82;&#77;',
        'MZN' => '&#77;&#84;',
        'NAD' => '&#36;',
        'NGN' => '&#8358;',
        'NIO' => '&#67;&#36;',
        'NOK' => '&#107;&#114;',
        'NPR' => '&#8360;',
        'NZD' => '&#36;',
        'OMR' => '&#65020;',
        'PAB' => '&#66;&#47;&#46;',
        'PEN' => '&#83;&#47;&#46;',
        'PGK' => '&#75;', // ?
        'PHP' => '&#8369;',
        'PKR' => '&#8360;',
        'PLN' => '&#122;&#322;',
        'PYG' => '&#71;&#115;',
        'QAR' => '&#65020;',
        'RON' => '&#108;&#101;&#105;',
        'RSD' => '&#1044;&#1080;&#1085;&#46;',
        'RUB' => '&#1088;&#1091;&#1073;',
        'RWF' => '&#1585;.&#1587;',
        'SAR' => '&#65020;',
        'SBD' => '&#36;',
        'SCR' => '&#8360;',
        'SDG' => '&#163;', // ?
        'SEK' => '&#107;&#114;',
        'SGD' => '&#36;',
        'SHP' => '&#163;',
        'SLL' => '&#76;&#101;', // ?
        'SOS' => '&#83;',
        'SRD' => '&#36;',
        'STD' => '&#68;&#98;', // ?
        'SVC' => '&#36;',
        'SYP' => '&#163;',
        'SZL' => '&#76;', // ?
        'THB' => '&#3647;',
        'TJS' => '&#84;&#74;&#83;', // ? TJS (guess)
        'TMT' => '&#109;',
        'TND' => '&#1583;.&#1578;',
        'TOP' => '&#84;&#36;',
        'TRY' => '&#8356;', // New Turkey Lira (old symbol used)
        'TTD' => '&#36;',
        'TWD' => '&#78;&#84;&#36;',
        'TZS' => '',
        'UAH' => '&#8372;',
        'UGX' => '&#85;&#83;&#104;',
        'USD' => '&#36;',
        'UYU' => '&#36;&#85;',
        'UZS' => '&#1083;&#1074;',
        'VEF' => '&#66;&#115;',
        'VND' => '&#8363;',
        'VUV' => '&#86;&#84;',
        'WST' => '&#87;&#83;&#36;',
        'XAF' => '&#70;&#67;&#70;&#65;',
        'XCD' => '&#36;',
        'XDR' => '',
        'XOF' => '',
        'XPF' => '&#70;',
        'YER' => '&#65020;',
        'ZAR' => '&#82;',
        'ZMK' => '&#90;&#75;', // ?
        'ZWL' => '&#90;&#36;',
    );

    return ( ! empty ( $currency_symbols[$code] ) ) ? $currency_symbols[$code] : '';
}

/**
 * Wrapper function for wp_die(). This function adds filters for wp_die() which
 * kills execution of the script using wp_die(). This allows us to then to work
 * with functions using edd_die() in the unit tests.
 *
 * @author Sunny Ratilal
 * @since 3.4
 * @return void
 */
function aawp_die( $message = '', $title = '', $status = 400 ) {
    add_filter( 'wp_die_ajax_handler', '_aawp_die_handler', 10, 3 );
    add_filter( 'wp_die_handler', '_aawp_die_handler', 10, 3 );
    wp_die( $message, $title, array( 'response' => $status ));
}

/*
 * Debug display
 */
function aawp_debug_display( $args, $title = null ) {

    if ( ! defined( 'AAWP_DEBUG_DISPLAY' ) || AAWP_DEBUG_DISPLAY != true )
        return;

    if ( ! empty ( $title ) )
        echo '<h3>' . $title . '</h3>';

    echo '<pre>';
    print_r( $args );
    echo '</pre>';
}

/**
 * Check if AAWP debugging is enabled
 *
 * @return bool
 */
function aawp_is_debug() {
    return ( defined( 'AAWP_DEBUG' ) && AAWP_DEBUG === true ) ? true : false;
}

/*
 * Debug
 */
function aawp_show_debug() {
    return ( ! defined( 'AAWP_DEBUG' ) || AAWP_DEBUG != true ) ? false : true;
}

function aawp_debug_pp_post_meta() {

    if ( ! aawp_show_debug() )
        return;

    global $post;
    ?>
    <p>
        <input type="button" class="button secondary" data-aawp-pp-debug-info-toggle="true"
               value="<?php _e( 'Show debug information', 'aawp' ); ?>" />
    </p>
    <div id="aawp-pp-debug-info" class="aawp-pp-debug-info">
        <?php $meta = get_post_meta( $post->ID ); echo '<pre>'; print_r( $meta ); echo '</pre>'; ?>
    </div>
    <?php
}

function aawp_debug( $args, $title = false ) {

    if ( defined( 'AAWP_DEBUG' ) && AAWP_DEBUG === true ) {

        if ($title) {
            echo '<h3>' . $title . '</h3>';
        }

        if ($args) {
            echo '<pre>';
            print_r($args);
            echo '</pre>';
        }
    }
}

function aawp_debug_log( $message ) {

    if ( defined( 'AAWP_DEBUG' ) && AAWP_DEBUG === true ) {
        if (is_array( $message ) || is_object( $message ) ) {
            error_log( print_r( $message, true ) );
        } else {
            error_log( $message );
        }
    }
}

add_shortcode('aawp_debug', function() {

    if ( ! defined( 'AAWP_DEBUG' ) || AAWP_DEBUG !== true )
        return null;

    ob_start();

    /*
    $args = array(
        'posts_per_page'   => -1,
        'post_type'        => 'aawp_product',
        'post_status'      => array('publish', 'published')
    );
    $posts_array = get_posts( $args );

    foreach ($posts_array as $post) {
        var_dump($post->ID);
    }
    */

    $AAWP_Functions = new AAWP_Functions();

    $amazon = $AAWP_Functions->get_api_connection( 'de' );

    /*
    foreach ( $items as $item ) {

        echo 'Product ASIN ' . $item['asin'] . ': ';

        $product_id = aawp_get_product_by_asin( $item['asin'] );

        if ( $product_id ) {
            echo 'EXISTS >> ' . $product_id . '<br>';
            aawp_update_product( $product_id, $item );
        } else {
            $product_id = aawp_create_product( $item );
            echo 'CREATED >> ' . $product_id . '<br>';
        }
    }
    */

    /*
    echo '<h3>Get list from API and create db entry</h3>';
    $list_args = array(
        'aawp_list_store' => 'de',
        'aawp_list_keys' => 'anker akku',
        'aawp_list_type' => 'bestseller',
        'aawp_list_max' => 20,
        'crawl_reviews' => 0
    );

    $list_items = $amazon->get_items( $list_args['aawp_list_keys'], $list_args['aawp_list_type'], $AAWP_Functions->get_api_args( array( 'crawl_reviews' => 0 ) ) );
    echo 'Items fetched: ' . sizeof( $list_items ) . '<br>';

    aawp_debug( $list_items );

    if ( is_array( $list_items ) && sizeof( $list_items ) > 0 ) {

        $list_id = aawp_get_list( $list_args );

        if ( $list_id ) {
            echo 'EXISTS >> ' . $list_id . '<br>';
            aawp_update_list( $list_id, $list_items );
        } else {
            $list_id = aawp_create_list( $list_args, $list_items );
            echo 'CREATED >> ' . $list_id . '<br>';
        }
    }
    */


    /*
    echo '<h3>Get list from db</h3>';
    $list_args = array(
        'aawp_list_store' => 'de',
        'aawp_list_keys' => 'persönlichkeitsentwicklung',
        'aawp_list_type' => 'bestseller',
        'aawp_list_max' => 16,
        'crawl_reviews' => 0
    );
    $list_id = aawp_get_list( $list_args );
    var_dump( $list_id );
    */

    /*
    echo '<h3>Get lists from db</h3>';
    $lists = aawp_get_lists();
    var_dump($lists);
    */

    /*
    $list_args = array(
        'list_type' => 'bestseller',
        'list_keys' => 'anker akku',
        'list_items' => 10
    );
    $list = aawp_get_list_from_api( $list_args );

    if ( is_array( $list ) ) {
        aawp_debug( $list );
    } else {
        var_dump( $list );
    }
    */

    // Renew list
    //aawp_renew_list( 1512 );

    // Get products
    /*
    $products_args = array(
        'posts_per_page' => -1,
        //'aawp_product_asin' => 'B00KLVFV34' // Single ASIN
        //'aawp_product_asin' => array( 'B00KLVFV34', 'B01N2JKMRO' ) // Multiple ASINs
        'aawp_is_valid' => true
    );

    $products = aawp_get_products( $products_args );

    echo '<h3>Results: ' . sizeof( $products ) . '</h3>';

    if ( is_array( $products ) ) {
        foreach ( $products as $product ) {
            echo $product['id'] . '<br>';
        }
    } else {
        var_dump($products);
    }
    */

    // Product exists by asin
    //$product_id = aawp_product_exists_by_asin( 'B00UBMO61G' );
    //var_dump($product_id);

    // Get product
    echo '<h3>Get product</h3>';
    //$product = aawp_get_product( 5 );
    $product = aawp_get_product_by_asin( 'B00Z0GAVGW' );
    aawp_debug( $product );

    // Renew product
    //$renewed = aawp_renew_product( 1530 );
    //var_dump($renewed);

    // Get product via API
    /*
    $product_args = array(
        //'product_asin' => 'B01N1FQC6N'
    );
    $product = aawp_get_product_from_api( 'B01N1FQC6N', $product_args );

    if ( is_array( $product ) ) {
        aawp_debug( $product );
    } else {
        var_dump( $product );
    }
    */

    /*
    // Get products via API
    $product_args = array(
        //'product_asin' => 'B01N1FQC6N'
        //'store' => 'com'
    );
    $product_asins = array( 'blub' ); // 'B01N1FQC6N', '386882233X', '3424631078' // Not via API: B001132AR6
    $products = aawp_get_products_from_api( $product_asins, $product_args );

    if ( is_array( $products ) ) {
        aawp_debug( $products );
    } else {
        var_dump( $products );
    }
    */

    // Count
    /*
    echo '<h3>Products count</h3>';
    $count = aawp_get_products_count();
    echo $count . ' products in database<br>';
    */

    $str = ob_get_clean();

    return $str;
});