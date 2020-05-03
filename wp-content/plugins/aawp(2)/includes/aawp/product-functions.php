<?php
/**
 * Product functions
 *
 * @package     AAWP
 * @since       3.4.0
 */

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

/**
 * Create product in database
 *
 * @param $data
 *
 * @return bool|int
 */
function aawp_create_product( $data ) {

    if ( empty( $data ) || ! isset( $data['asin'] ) )
        return false;

    $AAWP_DB_Products = new AAWP_DB_Products();

    $product_id = $AAWP_DB_Products->add( $data );

    return $product_id;
}

/**
 * Get products from database
 *
 * @param array $args
 *
 * @return array|null|object
 */
function aawp_get_products( $args = array() ) {

    $AAWP_DB_Products = new AAWP_DB_Products();

    $products = $AAWP_DB_Products->get_products( $args );

    return $products;
}

/**
 * Get single product from database by id
 *
 * @param int $product_id
 *
 * @return array|null
 */
function aawp_get_product( $product_id ) {

    if ( empty( $product_id ) )
        return null;

    $AAWP_DB_Products = new AAWP_DB_Products();

    $product = $AAWP_DB_Products->get_product_by( 'id', $product_id );

    return $product;
}

/**
 * Get single product from database by asin
 *
 * @param int $product_asin
 *
 * @return array|null
 */
function aawp_get_product_by_asin( $product_asin ) {

    if ( empty( $product_asin ) )
        return null;

    $AAWP_DB_Products = new AAWP_DB_Products();

    $product = $AAWP_DB_Products->get_product_by( 'asin', $product_asin );

    return $product;
}

/**
 * Update product in database
 *
 * @param $product_id
 * @param $data
 *
 * @return bool
 */
function aawp_update_product( $product_id, $data ) {

    if ( empty( $product_id ) || empty( $data ) )
        return false;

    $AAWP_DB_Products = new AAWP_DB_Products();

    $updated = $AAWP_DB_Products->update( $product_id, $data );

    return $updated;
}

/**
 * Renew a bunch of products
 *
 * @param $products
 * @param array $args
 *
 * @return int
 */
function aawp_renew_products( $products, $args = array() ) {

    if ( empty( $products ) || ! is_array( $products ) )
        return 0;

    $renewed = 0;

    $product_asin_ids = array();
    $product_asins    = array();

    // Storing asin to id relation in order to re-use it later
    foreach ( $products as $product_index => $product ) {

        if ( ! empty( $product['asin'] ) ) {
            $product_asin_ids[ $product['asin'] ] = $product_index;
            $product_asins[]                      = $product['asin'];
        }
    }

    // Using chunks in order not to lose updated products due to php execution timeouts
    $chunks = array_chunk( $product_asins, 10 );

    aawp_debug_display( $product_asin_ids, 'aawp_renew_products: $product_asin_ids' );
    aawp_debug_display( $chunks, 'aawp_renew_products: $chunks' );

    // Preparing API
    $API_Handler = new AAWP_API_Handler();

    $default_product_args = array(// Silence
    );

    // Parse args
    $product_args = wp_parse_args( $args, $default_product_args );

    // Fetch products from API
    foreach ( $chunks as $i => $chunk ) {

        $products_api = $API_Handler->get_products( $chunk, $product_args );

        //aawp_debug_display( $products_api, '$products_api' );

        // Chunk could be fetched from API
        if ( is_array( $products_api ) ) {

	        aawp_debug_display( sizeof( $products_api ), 'Products fetched via API' );

            foreach ( $products_api as $product_api ) {

                if ( ! isset ( $product_api['asin'] ) || ! isset ( $product_asin_ids[ $product_api['asin'] ] ) || ! isset ( $products[ $product_asin_ids[ $product_api['asin'] ] ] ) ) {
                    //aawp_debug_display( '', 'ASIN / ID not found<br>' );
                    continue;
                }

                $product_new     = $product_api;
                $product_old     = $products[ $product_asin_ids[ $product_api['asin'] ] ];
                $product_updated = aawp_merge_renewed_product_data( $product_new, $product_old );

                //aawp_debug_display( $product_api, '$product_api' );
                //aawp_debug_display( $product_old, '$product_old' );
                //aawp_debug_display( $product_updated, '$product_updated' );

                if ( empty( $product_updated['id'] ) )
                    continue;

                $product_updated['date_updated'] = aawp_get_db_datetime();

                $updated = aawp_update_product( $product_updated['id'], $product_updated );

                if ( $updated ) {
                    $renewed++;
                }
            }

            // Chunk could not be fetched, trying again each asin
        } else {

            sleep( 1 );

            aawp_debug_display( $chunk, 'Chunk could not be fetched' );
            //echo 'reason: '; var_dump( $products_api ); echo '<br>';

            foreach ( $chunk as $chunk_asin ) {

                $product_api = $API_Handler->get_product( $chunk_asin, $product_args );

                if ( ! isset ( $product_api['asin'] ) || ! isset ( $product_asin_ids[ $product_api['asin'] ] ) || ! isset ( $products[ $product_asin_ids[ $product_api['asin'] ] ] ) )
                    continue;

                $product_new     = $product_api;
                $product_old     = $products[ $product_asin_ids[ $product_api['asin'] ] ];
                $product_updated = aawp_merge_renewed_product_data( $product_new, $product_old );

                //aawp_debug_display( $product_api, '$product_api' );
                //aawp_debug_display( $product_old, '$product_old' );
                //aawp_debug_display( $product_updated, '$product_updated' );

                if ( empty( $product_updated['id'] ) )
                    continue;

                $product_updated['date_updated'] = aawp_get_db_datetime();

                $updated = aawp_update_product( $product_updated['id'], $product_updated );

                if ( $updated ) {
                    $renewed++;
                }
            }
        }
    }

    return $renewed;
}

/**
 * Merge renewed product data
 *
 * (Prevent losing reviews/ratings etc.)
 *
 * @param $data_new
 * @param $data_old
 *
 * @return mixed
 */
function aawp_merge_renewed_product_data( $data_new, $data_old ) {

    $data = array_merge( $data_old, $data_new );

    if ( empty( $data['rating'] ) && ! empty( $data_old['rating'] ) ) {
        //echo 'ASIN: ' . $data['asin'] . ' >> fallback for missing rating<br>';
        $data['rating'] = $data_old['rating'];
    }

    if ( empty( $data['reviews'] ) && ! empty( $data_old['reviews'] ) ) {
        //echo 'ASIN: ' . $data['asin'] . ' >> fallback for missing reviews<br>';
        $data['reviews'] = $data_old['reviews'];
    }

    return $data;
}

/**
 * Renew ratings for multiple products
 *
 * @param $products
 *
 * @return int|null
 */
function aawp_renew_product_ratings( $products ) {

    if ( empty( $products ) || ! is_array( $products ) )
        return null;

    $renewed = 0;

    $product_asin_ids = array();
    $product_asins = array();

    // Storing asin to id relation in order to re-use it later
    foreach ( $products as $product_index => $product ) {

        if ( ! empty( $product['asin'] ) ) {
            $product_asin_ids[ $product['asin'] ] = $product_index;
            $product_asins[]                      = $product['asin'];
        }
    }

    // Preparing API
    $API_Handler = new AAWP_API_Handler();

    // Build chunks
    $chunks = array_chunk( $product_asins, 10 );

    aawp_debug_display( $product_asin_ids, '$product_asin_ids' );
    aawp_debug_display( $product_asins, '$product_asins' );
    aawp_debug_display( $chunks, '$chunks' );

    // Loop chunks
    foreach ( $chunks as $i => $chunk ) {

        // Loop products
        foreach ( $chunk as $asin ) {

            $rating = $API_Handler->get_product_rating( $asin );

            /*
            echo '<strong>Crawled ratings for ASIN ' . $asin . ':';
            var_dump( $rating );
            echo '<br>';
            */

            if ( ! isset( $product_asin_ids[$asin] ) || ! isset( $products[ $product_asin_ids[ $asin ] ] ) )
                continue;

            $product_updated = $products[ $product_asin_ids[ $asin ] ];

            if ( empty( $product_updated['id'] ) )
                continue;

            if ( ! empty( $rating['rating'] ) && ! empty( $rating['reviews'] ) ) {
                $product_updated['rating'] = $rating['rating'];
                $product_updated['reviews'] = $rating['reviews'];
            }

            $product_updated['rating_updated'] = aawp_get_db_datetime();

            $updated = aawp_update_product( $product_updated['id'], $product_updated );

            if ( $updated ) {
                $renewed++;
            }
        }

        sleep(1); // Pause after crawling a chunk of asins
    }

    return $renewed;
}

/**
 * Renew ratings for a single product
 *
 * @param $product_id
 *
 * @return bool|null
 */
function aawp_renew_product_rating( $product_id ) { // TODO: Deprecated

    if ( empty( $product_id ) || ! is_numeric( $product_id ) )
        return null;

    // TODO: Rebuild

    return false;
}

/**
 * Get total amount of stored products
 *
 * @return int
 */
function aawp_get_products_count() {

    $AAWP_DB_Products = new AAWP_DB_Products();

    $count = $AAWP_DB_Products->count();

    return ( is_numeric( $count ) ) ? intval( $count ) : 0;
}

/**
 * Update product status by ASIN
 *
 * @param $asin
 * @param $new_status
 */
function aawp_update_product_status_by_asin( $asin, $new_status ) {

    $product = aawp_get_product_by_asin( $asin );

    if ( ! empty( $product['id'] ) ) {

        $product['status'] = $new_status;

        $updated = aawp_update_product( $product['id'], $product );
    }
}