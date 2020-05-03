<?php
/**
 * Amazon API Handler
 *
 * @package     AAWP
 * @since       3.4.0
 */

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'AAWP_API_Handler') ) {

    class AAWP_API_Handler {

        /**
         * @var AAWP_API
         */
        public $amazon;
        public $api_args;

        public $options;

        private $api_key;
        private $api_secret;
        private $api_country;
        private $api_tracking_id;

        /**
         * Constructor
         */
        public function __construct() {

            $this->options = aawp_get_options();

            // Setup credentials
            $this->api_country = ( ! empty( $this->options['api']['country'] ) ) ? $this->options['api']['country'] : null;
            $this->api_key = ( ! empty( $this->options['api']['key'] ) ) ? $this->options['api']['key'] : null;
            $this->api_secret = ( ! empty( $this->options['api']['secret'] ) ) ? $this->options['api']['secret'] : null;
            $this->api_tracking_id = AAWP_PLACEHOLDER_TRACKING_ID;

            $this->setup();
        }

        /**
         * Setup new Amazon API with given credentials
         */
        private function setup() {

            $this->amazon = new AAWP_API();
            $this->amazon->set_credentials(
                $this->api_country, $this->api_key, $this->api_secret, $this->api_tracking_id, false );
            $this->amazon->set_verified( true );
            //$amazon->set_debug_mode();
        }

        /**
         * Set API county (requires re-setup)
         *
         * @param $country
         */
        public function set_country( $country ) {
            $this->api_country = $country;

            $this->setup();
        }

        /**
         * Get prepared API args
         *
         * @param array $args
         *
         * @return array
         */
        private function get_api_args( $args = array() ) {

            $api_args = array();

            $api_args['crawl_reviews'] = $this->crawl_reviews( $args );

            if ( isset( $args['query_items'] ) && is_numeric( $args['query_items'] ) && intval( $args['query_items'] ) != intval( $args['items'] ) ) {
                $api_args['max'] = intval( $args['query_items'] );
            } elseif ( isset( $args['items'] ) ) {
                $api_args['max'] = ( is_numeric( $args['items'] ) ) ? intval( $args['items'] ) : 10;
            }

            if ( isset( $args['search_max'] ) )
                $api_args['max'] = ( is_numeric( $args['search_max'] ) ) ? intval( $args['search_max'] ) : 10;

            if ( isset( $args['browse_node_search'] ) )
                $api_args['browsenode'] = $args['browse_node_search'];

            // Hooking the arguments
            //$args = apply_filters( 'aawp_api_args', $args, $this->atts ); // TODO

            //aawp_debug( $api_args, '$api_args' );
            //aawp_debug_log( $api_args );

            return $api_args;
        }

        private function crawl_reviews( $args ) {

            if ( isset( $args['crawl_reviews'] ) )
                return $args['crawl_reviews'];

            return 0; // TODO: Check if it works again or only because of local environment?

            $star_rating = ( isset ( $this->options['output']['star_rating_size'] ) ) ? $this->options['output']['star_rating_size'] : '0';
            $reviews = ( isset ( $this->options['output']['show_reviews'] ) ) ? $this->options['output']['show_reviews'] : '0';

            // Reviews
            if ( $star_rating != '0' || $reviews != '0' ) {
                return true;
            }

            return false;
        }

        /**
         * Get list from API
         *
         * @param array $args
         *
         * @return bool
         */
        public function get_list( $args = array() ) {

            $defaults = array(
                'type' => '',
                'browse_node_id' => 0,
                'keywords' => '',
                'browse_node_search' => true,
                'items' => 10
            );

            // Parse args
            $list_args = wp_parse_args( $args, $defaults );

            //aawp_debug( $list_args, 'get_list args' );

            $keys = ( ! empty( $list_args['browse_node_id'] ) ) ? floatval( $list_args['browse_node_id'] ) : $list_args['keywords'];

            if ( empty( $list_args['type'] ) || empty( $keys ) )
                return false;

            $response = $this->amazon->get_items( $keys, $list_args['type'], $this->get_api_args( $list_args ) );

            return $response;
        }

        /**
         * Get results from a standard search
         *
         * @param array $args
         *
         * @return bool
         */
        public function get_search_results( $args = array() ) {

            $defaults = array(
                'search_keys' => '',
                'search_max' => 10
            );

            // Parse args
            $search_args = wp_parse_args( $args, $defaults );

            if ( empty( $search_args['search_keys'] ) )
                return false;

            $response = $this->amazon->get_items( $search_args['search_keys'], 'search', $this->get_api_args( $search_args ) );

            return $response;
        }

        /**
         * Get product from API
         *
         * @param array $args
         *
         * @return bool
         */
        public function get_product( $asin, $args = array() ) {

            if ( empty( $asin ) )
                return false;

            $defaults = array(
                //'product_asin' => ''
            );

            // Parse args
            $product_args = wp_parse_args( $args, $defaults );

            //aawp_debug( $product_args, 'get_product' );

            $response = $this->amazon->get_items( $asin, 'single', $this->get_api_args( $product_args ) );

            if ( is_string( $response ) )
                aawp_handle_api_product_error_response( $asin, $response );

            return ( isset( $response[0] ) ) ? $response[0] : $response;
        }

        public function get_products( $asins = array(), $args = array() ) {

            $defaults = array(
                // Silence
            );

            // Parse args
            $product_args = wp_parse_args( $args, $defaults );

            //aawp_debug( $product_args, 'get_products args' );

            // Updating Chunks
            $chunks = array_chunk( $asins, 10 );

            //aawp_debug( $chunks, 'get_products chunks' );

            $products_fetched = array();

            foreach ( $chunks as $i => $chunk ) {

                //aawp_debug( $chunk );

                // Prepare IDs for API call
                $id_string = implode(',', $chunk);

                aawp_debug_display( $id_string, '$id_string chunk' );

                $products = $this->amazon->get_items( $id_string, 'single', $this->get_api_args( $product_args ) );

                /*
                 * Error returned, try looping items individually
                 */
                if ( is_string( $products ) && sizeof( $chunk ) > 1 ) {

                    aawp_debug_display( $products, 'API returned error for current chunk >> ' . $products . ' >> Trying single loops!' );

                    $products_fallback = array();

                    foreach ( $chunk as $asin ) {

                        $product = $this->amazon->get_items( $asin, 'single', $this->get_api_args( $product_args ) );

                        if ( is_string( $product ) ) {
                            aawp_debug_display( $product, 'API returned error for ASIN ' . $asin . ' >> ' . $product );
                            aawp_handle_api_product_error_response( $asin, $product );
                            //echo ' - FAILED: ' . $product . '<br>';
                        } elseif ( is_array( $product ) && isset( $product[0] ) ) {
                            //echo ' - SUCCEED<br>';
                            $products_fallback[] = $product[0];
                        }

                        // Short pause after each api call
                        sleep(1);
                    }

                    if ( sizeof( $products_fallback ) > 0 )
                        $products = $products_fallback;

                } elseif ( is_string( $products ) ) {
                    aawp_debug_display( $products, 'API returned error for current chunk >> ' . $products );
                    aawp_handle_api_product_error_response( $id_string, $products );
                }

                //if ( is_string( $products ) ) {
                  //  return $products;

                if ( is_array( $products ) && sizeof( $products ) > 0 ) {
                    //echo 'fetched ' . sizeof( $products ) . ' products from API!<br>';
                    //echo '$products_fetched before: ' . sizeof( $products_fetched ) . '<br>';
                    //$products_fetched = ( sizeof( $products_fetched ) > 0 ) ? $products_fetched + $products : $products;
                    $products_fetched = array_merge( $products_fetched, $products );
                    //$products_fetched = $products_fetched + $products;
                    //echo '$products_fetched after: ' . sizeof( $products_fetched ) . '<br>';
                }

                // Short pause after each api call
                sleep(1);
            }

            //echo 'Result: Products fetched ' . sizeof( $products_fetched ) . '<br>';

            return ( sizeof( $products_fetched ) > 0 ) ? $products_fetched : null;
        }

        /**
         * Get product rating
         *
         * @param $asin
         *
         * @return array|null
         */
        function get_product_rating( $asin ) {

            $rating = $this->amazon->get_item_customer_rating( $asin );

            return $rating;
        }
    }
}