<?php
/**
 * List functions
 *
 * @package     AAWP
 * @since       3.4.0
 */

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

/**
 * Create list
 *
 * @param $data
 *
 * @return bool|int
 */
function aawp_create_list( $data ) {

    if ( ! isset( $data['type'] ) || ! isset( $data['product_asins'] ) || empty( $data['items'] ) )
        return false;

    $AAWP_DB_Lists = new AAWP_DB_Lists();

    $list_id = $AAWP_DB_Lists->add( $data );

    return $list_id;
}

/**
 * Get single list from database by id
 *
 * @param int $list_id
 *
 * @return array|null
 */
function aawp_get_list( $list_id ) {

    if ( empty( $list_id ) )
        return null;

    $AAWP_DB_Lists = new AAWP_DB_Lists();

    $list = $AAWP_DB_Lists->get_list_by( 'id', $list_id );

    return $list;
}

/**
 * Get single list from database by list key
 *
 * @param $list_key
 *
 * @return array|bool|null|array
 */
function aawp_get_list_by_key( $list_key ) {

    if ( empty( $list_key ) )
        return null;

    $AAWP_DB_Lists = new AAWP_DB_Lists();

    $list = $AAWP_DB_Lists->get_list_by( 'list_key', $list_key );

    return $list;
}

/**
 * Get single list from database by args
 *
 * @param array $args
 *
 * @return array|bool|null|array
 */
function aawp_get_list_by_args( $args = array() ) {

    if ( ! is_array( $args ) )
        return null;

    $AAWP_DB_Lists = new AAWP_DB_Lists();

    $list = $AAWP_DB_Lists->get_list_by_args( $args );

    return $list;
}

/**
 * Get multiple lists from database by args
 *
 * @param array $args
 *
 * @return array
 */
function aawp_get_lists( $args = array() ) {

    $AAWP_DB_Lists = new AAWP_DB_Lists();

    $lists = $AAWP_DB_Lists->get_lists( $args );

    return $lists;
}

/**
 * Update list in database
 *
 * @param $list_id
 * @param $data
 *
 * @return bool
 */
function aawp_update_list( $list_id, $data ) {

    if ( empty( $list_id ) || empty( $data ) )
        return false;

    $AAWP_DB_Lists = new AAWP_DB_Lists();

    $updated = $AAWP_DB_Lists->update( $list_id, $data );

    return $updated;
}

/**
 * Renew list based on list data
 *
 * @param array $list_data
 *
 * @return bool
 */
function aawp_renew_list( $list_data = array() ) {

    if ( ! isset( $list_data['id'] ) )
        return false;

    $API_Handler = new AAWP_API_Handler();

    $product_ids = $API_Handler->get_list( $list_data );

    if ( is_array( $product_ids ) ) {

        $list_data['product_asins'] = $product_ids;

        $updated = aawp_update_list( $list_data['id'], $list_data );

        if ( $updated ) {
            return true;
        }
    }

    return false;
}

/**
 * Get total amount of stored lists
 *
 * @return int
 */
function aawp_get_lists_count() {

    $AAWP_DB_Lists = new AAWP_DB_Lists();

    $count = $AAWP_DB_Lists->count();

    return ( is_numeric( $count ) ) ? intval( $count ) : 0;
}