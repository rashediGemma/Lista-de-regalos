<?php
/*
 * Load bootstrap
 */
require_once dirname(__FILE__) . '/../libs/apai-io/bootstrap.php';

// Dependencies
if ( ! class_exists('simple_html_dom') && ! class_exists( 'simple_html_dom_node' ) ) {
    require_once dirname(__FILE__) . '/../libs/simple_html_dom.php';
}

use ApaiIO\ApaiIO;
use ApaiIO\Configuration\GenericConfiguration;
use ApaiIO\Operations\Lookup;
use ApaiIO\Operations\BrowseNodeLookup;
use ApaiIO\Operations\Search;
use ApaiIO\Operations\SimilarityLookup;

if (!class_exists('AAWP_API')) {
    class AAWP_API
    {
        // Variables
        var $api;
        var $verified = false;
        var $error_message;
        var $debug = false;
        var $args = array();

        // Credentials
        var $country;
        var $aws_associate_tag;

        // Translations
        var $translations;

        // Stores
        var $countries = array('de', 'com', 'co.uk', 'ca', 'fr', 'co.jp', 'it', 'cn', 'es', 'in', 'com.br', 'com.mx', 'com.au' );
        var $euro_countries = array('de', 'fr', 'it', 'es');
        var $responseGroups = array('ItemAttributes', 'Small', 'EditorialReview','Images', 'OfferFull', 'Reviews', 'Similarities', 'SalesRank', 'VariationOffers'); //  'VariationSummary',
        var $nodeMatch = array();

        /**
         * Construct the object
         */
        public function __construct()
        {
            // Silence
        }

        public function set_credentials($country, $aws_api_key, $aws_api_secret_key, $aws_associate_tag, $verify = true) {

            $this->aws_associate_tag = $aws_associate_tag;

            // Preparing translations
            $this->country = $country;
            $this->translations = $this->get_translations($country); 

            // Configuration
            $conf = new GenericConfiguration();

            $x = new \ApaiIO\Request\Rest\Request(array(\ApaiIO\Request\Rest\Request::FOLLOW_LOCATION => 0));

            $conf
                ->setCountry($country)
                ->setAccessKey($aws_api_key)
                ->setSecretKey($aws_api_secret_key)
                ->setAssociateTag($aws_associate_tag)
                //->setRequest('\ApaiIO\Request\Rest\Request')
                //->setResponseTransformer('\ApaiIO\ResponseTransformer\XmlToDomDocument');
                //->setRequest('\ApaiIO\Request\Soap\Request')
                //->setResponseTransformer('\ApaiIO\ResponseTransformer\ObjectToArray');
                ->setRequest($x);

            try {
                $this->api = new ApaiIO($conf);
            } catch (Exception $e) {
                //echo $e->getMessage();
            }

            if ( $verify ) {
                $this->verify_credentials();
            }
        }

        public function verify_credentials() {

            // Default
            $this->verified = false;
            $error_message = false;

            // Test lookup
            $test = $this->lookup('000000000000', array(), true); // 3424201200 // 000000000000

            //$this->debug($test, 'Credentials Test response');

            // Success
            if ( ! empty ( $test['OperationRequest']['RequestId'] ) ) {
                $this->verified = true;

            // Error Code
            } elseif ( ! empty ( $test['Error']['Code'] ) ) {
                $error_message = array('code' => $test['Error']['Code'], 'text' => $test['Error']['Message'] );
            // Fallback for any other issue
            } else {
                $error_message = array('code' => 'undefined', 'text' => null );
            }

            // Set error message if available
            if ( ! empty ( $error_message ) ) {
                $this->set_error_message( $error_message, true );
            }

            if ( isset( $test['Error']['Message'] ) ) {
                $aawp_error_log_message = $test['Error']['Message'];
            } elseif( is_string( $test ) && strpos( $test, 'Website Temporarily Unavailable' ) !== false ) {
                $aawp_error_log_message = 'Website Temporarily Unavailable';
            } else {
                $aawp_error_log_message = 'undefined';
            }

            if ( function_exists( 'aawp_add_log' ) ) {
                aawp_add_log( 'API Connection Error: ' . $aawp_error_log_message, true );
            }

            if ( $this->verified == false ) {
                $this->debug($this->verified, 'Credentials _not_ verified');
            }
        }

        public function set_verified($state) {
            $this->verified = $state;
        }

        public function is_verified() {
            return $this->verified;
        }

        private function set_error_message($e, $pass = false) {

            // Pass through if error was set manually
            if ( $pass ) {
                $this->error_message = $e;

            // Handle error object
            } else {
                $error = array();

                $error['code'] = ( isset( $e->faultcode ) ) ? $e->faultcode : null;
                $error['text'] = ( isset( $e->faultstring ) ) ? $e->faultstring : null;

                $this->error_message = $error;
            }
        }

        public function get_error_message() {
            return $this->error_message;
        }

        // Deprecated
        private function format_response($response) {

            //return json_decode(json_encode($response), true);
	        if ( is_string( $response ) && strpos( $response, 'website temporarily unavailable') !== false ) {
	        	return null;
	        }

            return json_decode(json_encode((array)simplexml_load_string($response)),1);
        }

        private function build_response_groups($responseGroups) {
            return ( is_array( $responseGroups ) ) ? implode(',', $responseGroups) : $responseGroups;
        }

        private function lookup($ids, $responseGroups = array(), $test = false) {

            if ( !is_array( $responseGroups ) || sizeof( $responseGroups ) == 0 ) {
                $responseGroups = $this->responseGroups;
            }

            // Remove EditorialReviews when debugging
            if ( $this->debug == true )
                $responseGroups = array_diff($responseGroups, array("EditorialReview"));

            $lookup = new Lookup();
            $lookup->setItemId($ids);
            //$lookup->setResponseGroup(array('Large', 'OfferFull', 'Small', 'Reviews'));
            //$lookup->setResponseGroup(array('ItemAttributes', 'Small', 'Images', 'OfferFull', 'Reviews', 'Similarities', 'SalesRank'));
            $lookup->setResponseGroup($responseGroups);
            //$lookup->setMerchantId('All');

            //'MerchantId' => 'All',

            try {
                $response = $this->api->runOperation($lookup);
            } catch (Exception $e) {

                if ( function_exists( 'aawp_add_log' ) )
                    aawp_add_log( $e->getMessage() );

                $response = null;
                //echo $e->getMessage();
                // "Operation timed out"
            }

            //var_dump($response);

            if ( $test ) {
                //error_log( $response );
                return $this->format_response($response);
            }

            return $this->is_response_valid($this->format_response($response));
        }

        private function similarity_lookup($ids, $type = 'Intersection', $responseGroups = array()) {

            if ( !is_array( $responseGroups ) || sizeof( $responseGroups ) == 0 ) {
                $responseGroups = $this->responseGroups;
            }

            $lookup = new SimilarityLookup();
            $lookup->setItemId($ids);
            $lookup->setResponseGroup($responseGroups);
            //->optionalParameters(array('SimilarityType' => $type))

            try {
                $response = $this->api->runOperation($lookup);
            } catch (Exception $e) {
                $response = null;
                //echo $e->getMessage();
            }

            return $this->is_response_valid($this->format_response($response));
        }

        private function browse_node_lookup($node, $responseGroups = array()) {

            $browseNodeLookup = new BrowseNodeLookup();
            $browseNodeLookup->setNodeId($node);
            $browseNodeLookup->setResponseGroup($responseGroups);

            try {
                $response = $this->api->runOperation($browseNodeLookup);
            } catch (Exception $e) {
                $response = null;
                //echo $e->getMessage();
            }

            return $this->is_response_valid($this->format_response($response));
        }

        private function search($args = array()) {

            // Default values
            $config = array();

            $config['page'] = ( !empty($args['page']) ) ? $args['page'] : 1;
            $config['browsenode'] = ( !empty($args['browsenode']) ) ? $args['browsenode'] : '';
            $config['category'] = ( !empty($args['category']) ) ? $args['category'] : 'All';
            $config['condition'] = ( !empty($args['condition']) ) ? $args['condition'] : 'New';
            $config['keywords'] = ( !empty($args['keywords']) ) ? $args['keywords'] : '';
            $config['response_groups'] = ( !empty($args['response_groups']) ) ? $args['response_groups'] : $this->responseGroups;
            $config['sort'] = ( !empty($args['sort']) ) ? $args['sort'] : false; //'relevancerank'; //'salesrank';
            //$config['price_min'] = 50000; // TODO

            $this->debug($config, 'Search config');

            // Execute search
            $search = new Search();
            $search->setPage($config['page']);
            $search->setCategory($config['category']);
            $search->setCondition($config['condition']);
            $search->setKeywords($config['keywords']);
            $search->setResponseGroup($config['response_groups']);

            // TODO if ( $config['sort'] )
                // TODO $search->setSort($config['sort']);

            //$search->setBrowseNode($config['browsenode']);
            //->optionalParameters(array('MinimumPrice' => ($config['price_min']))) // TODO
            //->optionalParameters(array('Sort' => $config['sort'])) // TODO
            //->optionalParameters(array('Title' => ($config['keywords']))) // TODO

            try {
                $response = $this->api->runOperation($search);
            } catch (Exception $e) {
                $response = null;
                //echo $e->getMessage();
            }

            //$this->debug($response);

            return $this->is_response_valid($this->format_response($response));
        }

        public function get_items($keys, $type = 'single', $args = array()) {

            if ( !$this->verified )
                return 'API might not connected';

            // Parameters
            $this->args = $args;

            // Variables
            $items = array();

            if ( $type == 'single' ) {
                $items = $this->get_single_items($keys);
            }

            if ( $type == 'bestseller' ) {
                $items = $this->get_topseller_items($keys); // TODO Args
            }

            if ( $type == 'new_releases' ) {
                $items = $this->get_new_released_items($keys); // TODO Args
            }

            if ( $type == 'related' ) {
                $items = $this->get_related_items($keys); // TODO Args
            }

            if ( $type == 'search' ) {
                $items = $this->get_search_items($keys); // TODO Args
            }

            if ( $type == 'special' ) {
                $items = $this->get_special_items($keys, $type); // TODO Args
            }

            // Return
            if ( ! $items || ! is_array( $items ) || sizeof( $items ) == 0 )
                return null;

            return $items;
        }

        private function get_single_items($ids) {

            if ($ids == '')
                return null;

            // Initial first lookup
            $response = $this->lookup($ids);

            $this->debug($response, 'Original response'); // TODO: Main debug

            $items = $this->get_items_from_response( $response );

            //$this->debug($items, '$items returned');

            return $items;
        }

        private function get_topseller_items($keys) {

            $nodeSearch = true;

            $items = array();
            $topseller_items = array();

            $node = $this->get_valid_node_id($keys);
            $max = ( ( is_numeric($keys) && !empty($this->args['max']) && $this->args['max'] > 10 ) || empty($this->args['max']) ) ? 10 : intval($this->args['max']);

            // Search Type handling
            if ( !$node || $max > 10 )
                $nodeSearch = false;

            // Priority 1: Node Search
            if ( $nodeSearch ) {
                $this->debug('', 'Browse node lookup search'); // TODO
                // browse node lookup
                $response = $this->browse_node_lookup($node, array('TopSellers'));

                if ( isset($response['BrowseNodes']['BrowseNode']['TopSellers']['TopSeller']) ) {

                    //$this->debug('TopSellers Response', $response['BrowseNodes']['BrowseNode']['TopSellers']['TopSeller']);

                    // Removed unneeded items
                    $topseller_items = $this->get_optimized_items_amount($response['BrowseNodes']['BrowseNode']['TopSellers']['TopSeller'], $max);

                    // TODO
                    //$items = ( ! empty ( $topseller_ids ) ) ? $topseller_ids : null;
                    //$items = $topseller_ids;
                    //echo 'topseller_ids';
                    //var_dump($topseller_ids);

                    // Get items
                    //$items = $this->get_items_from_browse_node_response($topseller_ids);
                }
            }

            // Priority 2: Keyword Search
            if ( empty ( $topseller_items ) || sizeof( $topseller_items ) == 0 ) {
                // search for keywords
                $this->debug('', 'TODO: normal keyword search'); // TODO

                $args = array_merge($this->args, array(
                    'keywords' => $keys,
                    'response_groups' => array('ItemIds'),
                    'sort' => 'salesrank'
                ));

                $pages = ( $max > 10 ) ? ceil( $max / 10 ) : 1;
                $left = $max;

                for( $page = 1; $page <= $pages; $page++ ) {

                    $args['page'] = $page;

                    $response = $this->search($args);

                    if ( !empty( $response['Items']['Item'] ) ) {
                        // Removed unneeded items
                        $paged_items = $this->get_optimized_items_amount($response['Items']['Item'], $left);

                        if ( ! is_array( $paged_items ) )
                            break;

                        $topseller_items = array_merge($topseller_items, $paged_items);

                        //$this->debug( $topseller_items, 'topseller items paged' );

                        /*
                        // Get items
                        $paged_items = $this->get_items_from_browse_node_response($topseller_ids);

                        // Quit if not enough items returned
                        if ( ! is_array( $paged_items ) )
                            break;

                        // Merge paged items
                        $items = array_merge($items, $paged_items);
                        */

                        // Reduce left items
                        $left = $left - 10;
                    }

                    //$this->debug($response, 'alternative keyword search');
                }
            }

            // TODO

            $this->debug( $topseller_items, 'topseller ids' );

            // Get items
            if ( $this->debug ) {
                return $this->get_items_from_browse_node_response($topseller_items);
            }

            $items = $this->get_items_from_list_response( $topseller_items );

            return $items;
        }

        private function get_new_released_items($keys) {

            $items = array();
            $node = $this->get_valid_node_id($keys);
            $max = ( !empty($this->args['max']) && $this->args['max'] > 10 ) ? 10 : intval($this->args['max']);

            // If node id exists
            if ( $node ) {
                // browse node lookup
                $response = $this->browse_node_lookup($node, array('NewReleases'));

                $this->debug($response, 'NewReleases Response Items');

                if ( isset($response['BrowseNodes']['BrowseNode']['NewReleases']['NewRelease']) ) {

                    if( isset($response['BrowseNodes']['BrowseNode']['NewReleases']['NewRelease']['ASIN']) && isset($response['BrowseNodes']['BrowseNode']['NewReleases']['NewRelease']['Title']) ) {
                        $new_releases_ids = array(
                            array(
                                'ASIN' => $response['BrowseNodes']['BrowseNode']['NewReleases']['NewRelease']['ASIN'],
                                'Title' => $response['BrowseNodes']['BrowseNode']['NewReleases']['NewRelease']['Title']
                            )
                        );
                    } else {
                        // Removed unneeded items
                        $new_releases_ids = $this->get_optimized_items_amount($response['BrowseNodes']['BrowseNode']['NewReleases']['NewRelease'], $max);
                    }

                    $this->debug( $new_releases_ids, 'New Releases IDs');

                    $items = $new_releases_ids;
                }
            }
            // No keyword search available because it's not possible to sort by date continuously

            // Get items
            if ( $this->debug ) {
                return $this->get_items_from_browse_node_response( $items );
            }

            $items = $this->get_items_from_list_response( $items );

            return $items;
        }

        private function get_related_items($keys) {

            $max = 10;

            if ( !empty($this->args['max']) && $this->args['max'] < 10 )
                $max = intval($this->args['max']);

            // Similarity Lookup
            $response = $this->similarity_lookup($keys);

            //$this->debug($response, 'Related Response Items');
            $items = $this->get_items_from_response( $response, array('max' => $max) );

            return $items;
        }

        private function get_search_items($keys) {

            $search_items = array();
            $max = ( !empty($this->args['max']) && is_numeric($this->args['max']) ) ? intval($this->args['max']) : 10;

            // search for keywords
            $this->debug('', 'keyword search'); // TODO

            // Handle possible sortings
            if ( ! empty( $this->args['sortby'] ) ) {

                switch( $this->args['sortby'] )
                {
                  case ('relevance'):
                      $sort = 'relevancerank'; break;
                 
                  case ('sales'):
                      $sort = 'salesrank'; break;

                  case ('price'):
                    $sort = 'price'; break;
                 
                  default: 
                    $sort = 'relevancerank'; break;
                }

            } else {
                $sort = 'relevancerank';
            }

            //$sort = ( isset( $args['sort'] ) && 'ASC' === $args['sort'] ) ? '-' . $sort : $sort;

            // Build args
            $args = array_merge($this->args, array(
                'keywords' => $keys,
                'response_groups' => array('ItemIds'),
                'sort' => $sort
            ));

            $pages = ( $max > 10 ) ? ceil( $max / 10 ) : 1;
            $left = $max;

            for( $page = 1; $page <= $pages; $page++ ) {

                $args['page'] = $page;

                $response = $this->search($args);

                if ( !empty( $response['Items']['Item'] ) ) {
                    // Removed unneeded items
                    //$result_ids = $this->get_optimized_items_amount($response['Items']['Item'], $left);
                    // Get items
                    //$paged_items = $this->get_items_from_browse_node_response($result_ids);

                    // Removed unneeded items
                    $paged_items = $this->get_optimized_items_amount($response['Items']['Item'], $left);

                    //$this->debug( $paged_items, '$paged_items' );

                    // Quit if not enough items retunred
                    if ( ! is_array( $paged_items ) )
                        break;

                    // Merge paged items
                    $search_items = array_merge( $search_items, $paged_items );

                    // Reduce left items
                    $left = $left - 10;
                }

                //$this->debug($response, 'alternative keyword search');
            }

            $this->debug( $search_items, 'search result ids' );

            // Get items
            if ( $this->debug ) {
                return $this->get_items_from_browse_node_response( $search_items );
            }

            $items = $this->get_items_from_list_response( $search_items  );

            return $items;
        }

        private function get_special_items($keys, $type) {

            $items = array();
            $max = ( empty($this->args['max']) || ( !empty($this->args['max']) && $this->args['max'] > 10 ) ) ? 10 : intval($this->args['max']);

            if ( $type === 'warehousedeals' ) {
                $node = $keys;
            }

            $node = $keys;

            $args = array_merge($this->args, array(
                'keywords' => '',
                'browsenode' => $node,
                'response_groups' => array('ItemIds')
            ));

            //$response = $this->search($args);
            $response = $this->browse_node_lookup($node, array('TopSellers'));

            $this->debug($response, 'Special Response Items');

            /*
            // If node id exists
            if ( $node ) {
                // browse node lookup
                $response = $this->browse_node_lookup($node, array('Small'));

                $this->debug($response, 'Special Response Items');

                if ( isset($response['BrowseNodes']['BrowseNode']['NewReleases']['NewRelease']) ) {
                    // Removed unneeded items
                    $new_releases_ids = $this->get_optimized_items_amount($response['BrowseNodes']['BrowseNode']['NewReleases']['NewRelease'], $max);
                    // Get items
                    $items = $this->get_items_from_browse_node_response($new_releases_ids);
                }
            }

            */

            // No keyword search available because it's not possible to sort by date continuously

            return $items;
        }

        private function get_items_from_response($response) {

            $skip_parent_lookup = false;

            $max = ( !empty ( $this->args['max'] ) ) ? intval( $this->args['max'] ) : false;

            $items = array();

            if ($response && is_array($response)) {

                $response_items = array();

                if ($this->is_single_result($response['Items']['Item'])) {
                    $response_items[] = $response['Items']['Item'];
                } else {
                    $response_items = $response['Items']['Item'];
                }

                //$this->debug($response_items, 'Response items'); // TODO: MAIN DEBUG

                // Loop response items
                foreach($response_items as $response_item) {

                    if ( $max && sizeof( $items ) >= $this->args['max'] )
                        break;

                    //$this->debug($response_item, 'Response item');

                    $variation_lookup = $this->is_variation_lookup_required( $response_item );

                    if ( $variation_lookup ) {
                        $response_variation = $this->lookup($variation_lookup);
                        $this->debug($response_variation, 'Response Variation item');

                        if ( !empty( $response_variation['Items']['Item'] ) ) {

                            $skip_parent_lookup = true;

                            $response_item = $this->get_merged_variation_item($response_item, $response_variation['Items']['Item']);
                            //$this->debug($response_item, 'Rerunned response');
                        }
                    }

                    if ( ! $skip_parent_lookup ) {

                        // Check if second loop for a variation if required
                        $parent_lookup = $this->is_parent_lookup_required( $response_item );

                        if ( $parent_lookup ) {

                            $response_parent = $this->lookup($parent_lookup);
                            //$this->debug($response_parent, 'Response Parent item');

                            if ( !empty( $response_parent['Items']['Item'] ) ) {

                                $response_item = $this->get_merged_parent_item($response_item, $response_parent['Items']['Item']);
                                //$this->debug($response_item, 'Rerunned response');

                                // 2nd level variation lookup
                                $variation_lookup = $this->is_variation_lookup_required( $response_item );

                                if ( $variation_lookup ) {
                                    $response_variation = $this->lookup($variation_lookup);

                                    if ( !empty( $response_variation['Items']['Item'] ) ) {
                                        $response_item = $this->get_merged_variation_item($response_item, $response_variation['Items']['Item']);
                                    }
                                }

                            }
                        }
                    }

                    // Final Response Item
                    //$this->debug($response_item, 'Response item');

                    // Prepare received data
                    $prepared_item = $this->get_prepared_item($response_item);

                    if ( $this->is_final_item_valid( $prepared_item ) ) {
                        $items[] = $prepared_item;
                    }

                    //$this->debug($response_item, 'Response Item');
                    //$this->debug($prepared_item, 'Final prepared Item');
                }

            } elseif (is_string($response)) {
                return $response;
            }

            return $items;
        }

        /**
         * Final item validation
         *
         * @param $item
         * @return bool
         */
        private function is_final_item_valid( $item ) {

            if ( empty( $item['title'] ) )
                return false;

            return true;
        }

        public function get_items_from_browse_node_response($response) {
            return $this->get_single_items($this->get_formatted_item_search_query($response));
        }

        private function get_optimized_items_amount($responseItems, $left) {

            //$this->debug($responseItems, 'before cut');

            if ( is_array( $left ) && sizeof($left) != 0 && sizeof($responseItems) > $left)
                $responseItems = array_slice($responseItems, 0, $left);

            //$this->debug($responseItems, 'after cut');

            return $responseItems;
        }

        private function get_valid_node_id($keys) {

            if ( is_numeric($keys) ) {
                $node = $keys;
            } elseif ( isset( $this->args['browsenode'] ) && $this->args['browsenode'] == false ) {
                $node = $keys;
            } else {
                $node = $this->get_node_id($keys);
            }

            return $node;
        }

        private function get_node_id($keywords) {

            // Search nodes
            $args = array(
                'keywords' => $keywords,
                'response_groups' => array('BrowseNodes')
            );

            $response = $this->search($args);

            //$this->debug($response);

            // Loop nodes if returned
            if ( !empty($response['Items']['Item']) ) {

                foreach ($response['Items']['Item'] as $item) {

                    if ( !isset( $item['BrowseNodes']['BrowseNode'] ) )
                        break;

                    // TODO check how to handle
                    /*
                    if ( isset ( $item['BrowseNodes']['BrowseNode']['IsCategoryRoot'] ) && $item['BrowseNodes']['BrowseNode']['IsCategoryRoot'] == '1' ) {
                        if ( !empty ( $item['BrowseNodes']['BrowseNode']['BrowseNodeId'] ) ) {
                            $this->nodeMatch['category'] = $item['BrowseNodes']['BrowseNode']['BrowseNodeId'];
                            break;
                        }
                    }
                    */

                    if ( $this->is_associative_array($item['BrowseNodes']['BrowseNode']) ) {
                        $this->node_lookup($item['BrowseNodes']['BrowseNode'], $keywords);

                        // Exact node found
                        if ( empty($this->nodeMatch['exact']) && !empty($this->nodeMatch['potential']) )
                            $this->nodeMatch['exact'] = $this->nodeMatch['potential'];

                    } else {
                        foreach ($item['BrowseNodes']['BrowseNode'] as $node) {
                            $this->node_lookup($node, $keywords);

                            // Exact node found => quit searching
                            if ( empty($this->nodeMatch['exact']) && !empty($this->nodeMatch['potential']) ) {
                                $this->nodeMatch['exact'] = $this->nodeMatch['potential'];
                                //break;
                            }
                        }
                    }
                }
            }

            // Validate node matches
            if ( !empty( $this->nodeMatch['category'] ) ) {
                $node_id = $this->nodeMatch['category'];
            } elseif ( !empty( $this->nodeMatch['exact'] ) ) {
                $node_id = $this->nodeMatch['exact'];
            } elseif ( !empty( $this->nodeMatch['contain'] ) ) {
                $node_id = $this->nodeMatch['contain'];
            } else {
                $node_id = null;
            }

            $this->debug($this->nodeMatch, 'Node Match');
            if ( $node_id ) {
                $this->debug($node_id, 'Node ID taken');
            }

            // Reset matches
            $this->nodeMatch = array();

            // Return
            return $node_id;
        }

        private function node_lookup($node, $keywords) {

            // Return if match already complete
            if ( !empty( $this->nodeMatch['exact'] ) /*&& !empty( $this->nodeMatch['contain'] )*/ ) // Debug
                return;

            // Return if node name and id missing
            if ( empty( $node['Name'] ) && empty( $node['BrowseNodeId'] ) )
                return;

            // Kick potential node because highest ancestor is unqualified
            if ( empty( $node['Name'] ) ) {
                $this->nodeMatch['potential'] = null;
                return;
            }

            // Lowercase
            $nodeName = strtolower($node['Name']);
            $searchName = strtolower($keywords);

            // Clear selected special chars
            $nodeName = str_replace('-', ' ', $nodeName);
            $searchName = str_replace('-', ' ', $searchName);

            // Test matching
            if ( empty($this->nodeMatch['exact']) && $nodeName == $searchName) {
                $this->nodeMatch['potential'] = $node['BrowseNodeId'];
            }

            if ( empty($this->nodeMatch['contain']) && $nodeName != $searchName && strpos($nodeName,$searchName) !== false ) {
                $this->nodeMatch['contain'] = $node['BrowseNodeId'];
            }

            // Loop ancestors if available
            if (isset($node['Ancestors'])) {
                $this->node_lookup($node['Ancestors']['BrowseNode'], $keywords);
            }
        }

        private function get_items_from_list_response( $listItems ) {

            $this->debug( $listItems, '$listItems' );

            $items = array();

            if ( ! is_array( $listItems ) || sizeof( $listItems ) == 0 )
                return null;

            foreach($listItems as $item) {

                // Skip if title is not available (item might not be listed any more)
                //if ( empty( $item['Title'] ) )
                  //  continue;

                // Collect ASINs
                if ( ! empty( $item['ASIN'] ) )
                    $items[] = $item['ASIN'];
            }

            return $items;
        }

        private function get_formatted_item_search_query($itemArray) {

            $this->debug( $itemArray, 'get_formatted_item_search_query' );

            $query = '';

            if (!is_array($itemArray) || sizeof($itemArray) == 0) {
                return null;
            }

            foreach($itemArray as $item) {

                // Skip if title is not available (item might not be listed any more)
                //if ( empty( $item['Title'] ) )
                    //continue;

                // Collect ASINs
                if (!empty($item['ASIN'])) {
                    if ($query != '') $query .= ',';
                    $query .= $item['ASIN'];
                }
            }

            return $query;
        }

        private function is_single_result($items) {
            if ( $this->is_associative_array($items) ) {
                return true;
            } else {
                return false;
            }
        }

        private function is_response_valid($response) {

            $this->debug('is_response_valid', $response);

            if (isset($response['Items']['Request']['IsValid']) && $response['Items']['Request']['IsValid'] == true) {

                if ( isset($response['Items']['Request']['Errors']['Error']['Message']) ) {
                    return $response['Items']['Request']['Errors']['Error']['Message'];
                } elseif ( isset($response['Items']['Request']['Errors']['Error']) && is_array($response['Items']['Request']['Errors']['Error']) ) {
                    return 'At least one of the IDs you entered is not valid. Please check and try again.';
                } else {
                    return $response;
                }
            }

            if (isset($response['BrowseNodes']['Request']['IsValid']) && $response['BrowseNodes']['Request']['IsValid'] == true) {

                if ( isset($response['Items']['Request']['Errors']['Error']['Message']) ) {
                    return $response['Items']['Request']['Errors']['Error']['Message'];
                } elseif ( isset($response['Items']['Request']['Errors']['Error']) && is_array($response['Items']['Request']['Errors']['Error']) ) {
                    return 'At least one of the IDs you entered is not valid. Please check and try again.';
                } else {
                    return $response;
                }
            }

            /*
             * Response error handling
             *
             * API Key missing: MissingClientTokenId => "Request must contain AWSAccessKeyId or X.509 certificate."
             * API Key wrong: InvalidClientTokenId => "The AWS Access Key Id you provided does not exist in our records."
             * API Secret missing/wrong: SignatureDoesNotMatch => "The request signature we calculated does not match the signature you provided. Check your AWS Secret Access Key and signing method. Consult the service documentation for details."
             */
            if ( isset( $response['Error'] ) && function_exists( 'do_action' ) ) {
                //var_dump($response['Error']);
                do_action('aawp_api_response_validation_error', $response['Error'] );
            }

            /*
             * Handle missing attributes
             */
            //if ( ! isset/())

            return false;
        }

        private function is_parent_lookup_required($item) {

            $lookup = false;

            // Return if parent is not available
            if ( empty( $item['ParentASIN'] ) || $item['ASIN'] == $item['ParentASIN'] )
                return false;

            // Check images
            if ( empty($item['MediumImage']) && empty($item['ImageSets']['ImageSet']) ) {
                $this->debug(null, 'Images missing! Parent Re-Run required!');
                $lookup = true;
            }
            /*
            if ( empty($item['MediumImage']) ) {
                $this->debug(null, 'Images missing! Parent Re-Run required!');
                $lookup = true;
            }

            // Check imagesets
            if ( empty($item['ImageSets']['ImageSet']) ) {
                $this->debug(null, 'Imageset missing! Parent Re-Run required!');
                $lookup = true;
            }
            */

            // Check pricing
            if ( ! isset ( $item['Variations'] ) && ! isset ( $item['Offers']['Offer']['OfferListing']['Price']['Amount'] ) ) {
                $this->debug(null, 'Enhanced pricing missing! Parent Re-Run required!');
                $lookup = true;
            }

            // Finally get ParentASIN
            if ( $lookup ) {
                $this->debug( null, 'parent_lookup_required for ASIN ' . $item['ASIN'] . ' - Parent: ' . $item['ParentASIN'] );
                return $item['ParentASIN'];
            }

            // Otherwise
            return false;
        }

        private function get_merged_parent_item($item, $parent) {

            $this->debug(null, 'get_merged_parent_item');
            $this->debug($parent, 'parent item to merge');

            /*
            // Pricing
            if ( ! empty ( $parent['Variations'] ) )
                return $parent; // TODO: Maybe update necessary
            */

            // Images
            if ( empty($item['SmallImage']) && !empty($parent['SmallImage']) )
                $item['SmallImage'] = $parent['SmallImage'];

            if ( empty($item['MediumImage']) && !empty($parent['MediumImage']) )
                $item['MediumImage'] = $parent['MediumImage'];

            if ( empty($item['LargeImage']) && !empty($parent['LargeImage']) )
                $item['LargeImage'] = $parent['LargeImage'];

            if ( empty($item['ImageSets']['ImageSet']) && !empty($parent['ImageSets']['ImageSet']) )
                $item['ImageSets']['ImageSet'] = $parent['ImageSets']['ImageSet'];

            // Pricing
            if ( empty ( $item['Offers']['Offer'] ) && ! empty ( $parent['Offers']['Offer'] ) ) {
                $item['Offers'] = $parent['Offers'];
            }

            if ( empty ( $item['VariationSummary'] ) && ! empty ( $parent['VariationSummary'] ) ) {
                $item['VariationSummary'] = $parent['VariationSummary'];
            }

            if ( empty ( $item['Variations'] ) && ! empty ( $parent['Variations'] ) ) {
                $item['Variations'] = $parent['Variations'];
            }

            $this->debug($item, 'Parent Merge RESULT');

            return $item;
        }

        private function is_variation_lookup_required($item) {

            //$this->debug( $item['Variations']['Item'], 'is_variation_lookup_required()' );

            // Variations found!
            $variations_asin = null;

            if ( ! empty($item['Variations']['Item'][0]['ASIN'] ) ) {
                $this->debug( null, 'is_variation_lookup_required for ASIN ' . $item['ASIN'] . ' with variation: ' . $item['Variations']['Item'][0]['ASIN'] );
                return $item['Variations']['Item'][0]['ASIN'];

            } elseif ( ! empty( $item['Variations']['Item']['ASIN'] ) ) {
                $this->debug( null, 'is_variation_lookup_required for ASIN ' . $item['ASIN'] . ' with variation: ' . $item['Variations']['Item']['ASIN'] );
                return $item['Variations']['Item']['ASIN'];
            }

            /*
            if ( !empty($item['Variations']['Item'][0]['ASIN'])) {
                $this->debug( null, 'is_variation_lookup_required for ASIN ' . $item['ASIN'] . ' with variation: ' . $item['Variations']['Item'][0]['ASIN'] );
                return $item['Variations']['Item'][0]['ASIN'];
            }
            */

            return false;
        }

        private function get_merged_variation_item($item, $variation) {

            $this->debug(null, 'get_merged_variation_item');
            $this->debug($variation, 'variation item to merge');

            // Title
            if ( empty( $item['ItemAttributes']['Title'] ) && ! empty( $variation['ItemAttributes']['Title'] ) )
                $item['ItemAttributes']['Title'] = $variation['ItemAttributes']['Title'];

            // Images
            if ( !empty($variation['SmallImage']) )
                $item['SmallImage'] = $variation['SmallImage'];

            if ( !empty($variation['MediumImage']) )
                $item['MediumImage'] = $variation['MediumImage'];

            if ( !empty($variation['LargeImage']) )
                $item['LargeImage'] = $variation['LargeImage'];

            if ( !empty($variation['ImageSets']['ImageSet']) )
                $item['ImageSets']['ImageSet'] = $variation['ImageSets']['ImageSet'];

            // Pricing
            if ( ! empty ( $variation['Offers']['Offer'] ) ) {
                $item['Offers'] = $variation['Offers'];
            }

            if ( ! empty ( $variation['VariationSummary'] ) ) {
                $item['VariationSummary'] = $variation['VariationSummary'];
            }

            if ( ! empty ( $variation['Variations'] ) ) {
                $item['Variations'] = $variation['Variations'];
            }

            //$this->debug($item, 'Variation Merge RESULT');

            return $item;
        }

        private function get_prepared_item($data) {

            /*
            if ( isset( $data['ASIN'] ) && $data['ASIN'] == 'B014PBJXFM' ) {
                $this->debug($data);
            }
            */

            $item = array();

            $item['asin'] = ( isset( $data['ASIN'] ) ) ? $data['ASIN'] : '';
            $item['ean']  = ( isset( $data['ItemAttributes']['EAN'] ) ) ? $data['ItemAttributes']['EAN'] : '';
            $item['isbn'] = ( isset( $data['ItemAttributes']['ISBN'] ) ) ? $data['ItemAttributes']['ISBN'] : '';
            $item['title'] = $this->get_item_title($data);
            $item['type'] = $this->get_item_type($data);
            $item['urls'] = $this->get_item_urls($data);

            //$item['image'] = $this->get_item_images($data);
            //$item['imagesets'] = $this->get_item_imagesets($data);
            $item['images'] = $this->get_item_images( $data );
            $item['attributes'] = $this->get_item_attributes($data);
            //$item['description'] = $this->get_item_description($data);
            //$item['teaser'] = $this->get_item_teaser($data);
            //$item['editorial_review'] = $this->get_item_editorial_review($data);

            $reviews_data = $this->get_item_reviews($data);

            $item['rating'] = ( $reviews_data && isset( $reviews_data['rating'] ) ) ? $reviews_data['rating'] : '';
            $item['reviews'] = ( $reviews_data && isset( $reviews_data['count'] ) ) ? $reviews_data['count'] : '';
            $item['pricing'] = $this->get_item_pricing($data);
            $item['salesrank'] = ( isset( $data['SalesRank'] ) ) ? $data['SalesRank'] : '';
            //$item['related'] = $this->get_item_similar_products($data);
            //$item['config'] = $this->get_item_config($data);
            $item['timestamp'] = time();
            $item['store'] = $this->country; //str_replace( '.', '_', $this->country);

            return $item;
        }

        private function get_item_pricing($data) {

            $pricing = array();

            // List Price
            $list_price = ( ! empty ($data['ItemAttributes']['ListPrice']['Amount']) ) ? $this->get_single_pricing( $data['ItemAttributes']['ListPrice'] ) : null;

            if ($list_price == null ) {
                $list_price = (isset($data['Offers']['Offer']['OfferListing']['Price']['Amount'])) ? $this->get_single_pricing( $data['Offers']['Offer']['OfferListing']['Price'] ) : null;
            }

            // TODO: Handle eBooks
            if ( isset ( $data['DetailPageURL'] ) && isset ( $data['ItemAttributes']['ProductTypeName'] ) && 'ABIS_EBOOKS' === $data['ItemAttributes']['ProductTypeName'] ) {
                $list_price = $this->get_crawled_ebook_pricing( $data['DetailPageURL'] );
            }

            $pricing['list'] = $list_price;

            // Lowest New Price
            $pricing['new'] = (isset($data['OfferSummary']['LowestNewPrice']['Amount'])) ? $this->get_single_pricing( $data['OfferSummary']['LowestNewPrice'] ) : null;

            // Lowest Used Price
            $pricing['used'] = (isset($data['OfferSummary']['LowestUsedPrice']['Amount'])) ? $this->get_single_pricing( $data['OfferSummary']['LowestUsedPrice'] ) : null;

            // Offers
            $offers = null;
            $skip_variations = false;
            $price_offer = null;
            $price_sale = null;
            $amount_saved = null;
            $percentage_saved = null;
            $availability = null;
            $prime = 0;
            $skip_saved_handling = ( empty ( $data['ItemAttributes']['ListPrice']['Amount'] ) ) ? true : false;

            if ( isset($data['Offers']['Offer']) ) {
                $offers = $data['Offers']['Offer'];
            }

            // TODO: Re-Add variations response group if using this
            if ( isset($data['Variations']['Item']['Offers']['Offer']) ) {
                $offers = $data['Variations']['Item']['Offers']['Offer'];
                $skip_variations = true;
            }/* elseif ( isset($data['Variations']['Item'][0]['Offers']['Offer']) ) {
                $offers = $data['Variations']['Item'][0]['Offers']['Offer'];
            }*/

            if( !empty( $offers ) ) {

                if(isset($offers['OfferListing']['Price']['Amount'])) {
                    $price_offer = $this->get_single_pricing( $offers['OfferListing']['Price'] );
                }

                if(isset($offers['OfferListing']['SalePrice']['Amount'])) {
                    $price_sale = $this->get_single_pricing( $offers['OfferListing']['SalePrice'] );
                } elseif ( isset($offers['Merchant']['Name']) && strpos($offers['Merchant']['Name'], 'Amazon') !== false && isset($offers['OfferListing']['Price']['Amount']) && $offers['OfferListing']['Price']['Amount'] != $list_price ) {
                    $price_sale = $this->get_single_pricing( $offers['OfferListing']['Price'] );
                }

                /* // Old discounts
                if(isset($offers['OfferListing']['AmountSaved'])) {
                    $amount_saved = $offers['OfferListing']['AmountSaved']['Amount'];
                }

                if(isset($offers['OfferListing']['PercentageSaved'])) {
                    $percentage_saved = $offers['OfferListing']['PercentageSaved'];
                }
                */

                // New discount calculation
                if ( ! $skip_saved_handling && ! empty ( $list_price['amount'] ) ) {

                    // Case 1: Sale price
                    if ( ! empty( $price_sale['amount'] ) ) {

                        $list_price_sale_price_diff = intval( $list_price['amount'] ) - intval( $price_sale['amount'] );

                        if  ( $list_price_sale_price_diff > 0 )
                            $amount_saved = $list_price_sale_price_diff;

                        if ( ! empty( $amount_saved ) && is_numeric( $amount_saved ) ) {
                            $percentage_saved = round( ( 100 * $amount_saved ) / intval( $list_price['amount'] ) );
                        }

                    // Case 2: Offer price
                    } elseif ( ! empty( $price_offer['amount'] ) ) {

                        // Only when offer price == lowest new price
                        if ( isset( $pricing['new']['amount'] ) && $pricing['new']['amount'] == $price_offer['amount'] ) {
                            $list_price_offer_price_diff = intval( $list_price['amount'] ) - intval( $pricing['new']['amount'] );
                        } else {
                            $list_price_offer_price_diff = intval( $list_price['amount'] ) - intval( $price_offer['amount'] );
                        }

                        if  ( $list_price_offer_price_diff > 0 )
                            $amount_saved = $list_price_offer_price_diff;

                        if ( ! empty( $amount_saved ) && is_numeric( $amount_saved ) ) {
                            $percentage_saved = round( ( 100 * $amount_saved ) / intval( $list_price['amount'] ) );
                        }
                    }
                }

                if ( ! empty( $amount_saved ) ) {
                //if ( ! empty( $amount_saved ) && ! empty( $percentage_saved ) ) {
                    // Format amount saved
                    //$amount_saved = ( ! empty ( $amount_saved ) ) ? $this->format_price( $amount_saved ) : null;
                    $amount_saved = array(
                        'amount' => $amount_saved,
                        'currency' => $list_price['currency'],
                        'formatted' => $this->format_price( $amount_saved ),
                        'normalized' => number_format( ( $amount_saved / 100 ), 2, '.', '' )
                    );
                }

                if(isset($offers['OfferListing']['AvailabilityAttributes']['AvailabilityType'])) {
                    $availability = $offers['OfferListing']['AvailabilityAttributes']['AvailabilityType'];
                }
            }

            // Prime
            if( isset($offers['OfferListing']['IsEligibleForPrime']) && $offers['OfferListing']['IsEligibleForPrime'] == '1') {
                $prime = 1;
            } elseif ( isset($data['Variations']['Item'][0]['Offers']['Offer']['OfferListing']['IsEligibleForPrime']) && $data['Variations']['Item'][0]['Offers']['Offer']['OfferListing']['IsEligibleForPrime'] == '1' ) {
                $prime = 1;
            }

            // Variations
            if ( !$skip_variations && isset ( $data['VariationSummary'] ) ) {

                //$this->debug($data['VariationSummary'], 'Pricing: VariationSummary');

                $pricing['variations'] = array(
                    'lowest_price' => ( isset ( $data['VariationSummary']['LowestSalePrice']['Amount'] ) ) ? $this->get_single_pricing( $data['VariationSummary']['LowestSalePrice'] ) : $this->get_single_pricing( $data['VariationSummary']['LowestPrice'] ),
                    'highest_price' => ( isset ( $data['VariationSummary']['HighestSalePrice']['Amount'] ) ) ? $this->get_single_pricing( $data['VariationSummary']['HighestSalePrice'] ) : $this->get_single_pricing( $data['VariationSummary']['HighestPrice'] ),
                );
            } else {
                $pricing['variations'] = false;
            }

            // Save pricing
            $pricing['old'] = $list_price;
            $pricing['offer'] = $price_offer;
            $pricing['sale'] = $price_sale;
            $pricing['amount_saved'] = $amount_saved;
            $pricing['percentage_saved'] = $percentage_saved;
            $pricing['availability'] = $availability;
            $pricing['prime'] = $prime;

            // Display price
            if ($pricing['sale'] ) {
                $pricing['display'] = $pricing['sale'];
            //} elseif ($pricing['new'] && $pricing['offer'] && $pricing['new'] < $pricing['offer']) {
                //$pricing['display'] = $pricing['new'];
            } elseif ($pricing['offer']) {
                $pricing['display'] = $pricing['offer'];
            } elseif ($pricing['new']) {
                $pricing['display'] = $pricing['new'];
            } else {
                $pricing['display'] = $pricing['list'];
            }

            if ( 'now' != $pricing['availability'] && $pricing['used'] ) { // TODO: Be carefull with variations, they shouldn't overwrite here
                if ( ! empty ( $pricing['offer'] ) ) {
                    $pricing['display'] = $pricing['offer'];
                } else {
                    $pricing['display'] = $pricing['used'];
                }
            }

            // Format prices

            /* TODO

            foreach( $pricing as $key => $price ) {

                if ( ! empty( $price ) && 'none' != $price && ! in_array( $key, array('percentage_saved', 'prime', 'availability') ) ) {

                    if ( 'variations' === $key ) {
                        foreach( $price as $variations_key => $variations_price ) {
                            $pricing[$key][$variations_key] = $this->format_price( $variations_price );
                        }
                    } else {
                        $pricing[$key] = $this->format_price( $price );
                    }
                }
            }

            */

            //$this->debug($pricing, 'Pricing');

            // Return
            return $pricing;
        }

        private function get_item_config($data) {
            $config = array(
                'last_update' => time()
            );

            return $config;
        }

        /*
         * (
         *      [Amount] => 9900
         *      [CurrencyCode] => EUR
         *      [FormattedPrice] => EUR 99,00
         *  )
         */
        private function get_single_pricing( $pricing_data ) {

            if ( ! isset ( $pricing_data['Amount'] ) || ! isset ( $pricing_data['CurrencyCode'] ) || ! isset ( $pricing_data['FormattedPrice'] ) )
                return null;

            // Build pricing
            $pricing = array(
                'amount' => $pricing_data['Amount'],
                'currency' => $pricing_data['CurrencyCode'],
                'formatted' => $this->format_price( $pricing_data['Amount'] )
            );

            //$this->debug( $pricing, 'BEFORE normalizing and price fix' );

            // Fixing indian calculating price
            if ( 'in' === $this->country ) {
                $pricing['amount'] = number_format(($pricing['amount'] / 100), 0, '', '');
            }

            // Non-decimal countries
            $non_decimal_countries = array( 'in', 'co.jp' );

            // Normalize price
            if ( in_array( $this->country, $non_decimal_countries ) ) {
                $pricing['normalized'] = $pricing['amount'] . '.00';
            } else {
                $pricing['normalized'] = number_format( ($pricing['amount'] / 100 ), 2, '.', '' );
            }

            //$this->debug( $pricing, 'AFTER normalizing and price fix' );

            return $pricing;
        }

        private function format_price( $price ) {

            if ( null != $price ) {

                $number_format = true;

                // 'de', 'com', 'co.uk', 'ca', 'fr', 'co.jp', 'it', 'cn', 'es', 'in', 'com.br'

                // Add currency
                $prefix = false;
                $suffix = false;

                // Currency codes: http://www.xe.com/iso4217.php
                if ( in_array( $this->country, $this->euro_countries ) ) {
                    $suffix = ' EUR';
                } elseif ( 'com' === $this->country ) {
                    $prefix = $this->get_currency_symbol( 'USD' );
                } elseif ( 'co.uk' === $this->country ) {
                    $prefix = $this->get_currency_symbol( 'GBP' );
                } elseif ( 'ca' === $this->country ) {
                    $prefix = 'CDN' . $this->get_currency_symbol( 'CAD' ) . ' ';
                } elseif ( 'co.jp' === $this->country ) {
                    $prefix = $this->get_currency_symbol( 'JPY' );
                } elseif ( 'cn' === $this->country ) {
                    $prefix = $this->get_currency_symbol( 'CNY' );
                } elseif ( 'in' === $this->country ) {
                    $prefix = $this->get_currency_symbol( 'INR' ) . ' ';
                } elseif ( 'com.br' === $this->country ) {
                    $prefix = $this->get_currency_symbol( 'BRL' ) . ' ';
                } elseif ( 'com.mx' === $this->country ) {
                    $prefix = $this->get_currency_symbol( 'MXN' ) . ' ';
                }

                // Number separators
                $number_dec     = 2;
                $number_sep_th  = ',';
                $number_sep_dec = '.';

                if ( in_array( $this->country, $this->euro_countries ) || 'com.br' === $this->country ) {
                    $number_sep_th  = '.';
                    $number_sep_dec = ',';
                }

                if ( 'fr' == $this->country ) {
                    $number_sep_th = ' ';
                }

                if ( 'co.jp' == $this->country ) {
                    $number_format = false;
                }

                if ( 'in' == $this->country ) {
                    $number_dec = 0;
                }

                // Add separator
                $price = ( $number_format ) ? number_format( ( $price / 100 ), $number_dec, $number_sep_dec, $number_sep_th ) : $price;

                // Add prefix or suffix
                if ( $prefix ) {
                    $price = $prefix . $price;
                }

                if ( $suffix ) {
                    $price = $price . $suffix;
                }
            }

            return $price;
        }

        private function get_currency_symbol($code) {

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

        private function get_crawled_ebook_pricing($url) {

            $price = 'none';  // TODO: Crawl the list price from the Amazon product page. Can be done using the same methods etc from the get_crawled_reviews() function

            return $price;
        }

        private function get_crawled_reviews($url) {

            $reviews = null;

            if ( function_exists( 'wp_remote_get' ) && function_exists( 'is_wp_error' ) ) {

                $response = wp_remote_get( $url );
                $statusCode = null;

                if ( ! is_wp_error( $response ) ) {

                    // Success
                    if ( isset( $response['response']['code'] ) ) {
                        $statusCode = $response['response']['code'];
                    }

                    if ( '200' == $statusCode ) {
                        $page = $response['body'];
                    }
                }
            }

            /* Fallback: Get file by old fashioned way
            if ( ! isset ( $page ) ) {
                $page = $this->get_file($url, NULL);
            }*/

            if ( ! empty ( $page ) ) {
                $reviews = $this->get_reviews_from_html_page( $page );
            }

            // Fallback if no reviews are available
            if ( empty ( $reviews ) ) {

                if ( ini_get('allow_url_fopen') ) {

                    try {
                        // Trying to use file_get_contents
                        $opts = array(
                            'http'=>array(
                                'header' => 'Connection: close',
                                'ignore_errors' => true
                            )
                        );
                        $context = stream_context_create($opts);
                        @$page = file_get_contents($url, false, $context);

                        $reviews = $this->get_reviews_from_html_page( $page );

                    } catch(Exception $ex) {
                        // Do nothing
                    }
                }
            }

            return $reviews;
        }

        private function get_reviews_from_html_page( $page ) {

            $reviews = array();

            $html = new simple_html_dom();

            $html->load($page);

            if (!$html)
                return null;

            // finding rating star
            $rating_span = $html->find('span.asinReviewsSummary', 0);

            if (!method_exists($rating_span, 'find'))
                return null;

            $rating_anchor_alt = $rating_span->find('img', 0)->getAttribute('alt');

            $rating_array = array();
            if (preg_match("|([0-9.]+) (.*) ([0-9.]+) (.*)|i", $rating_anchor_alt, $rating_array)) {
                $rating = (float) $rating_array[1];
            }
            if ($rating < 0 || $rating > 5)
                $rating = 0;

            $reviews['rating'] = $rating;
            $reviews['stars'] = round($rating);

            // finding total reviews
            $review_text = $html->find('div.crIFrameHeaderHistogram', 0)->find('div.tiny', 0)->find('b', 0)->plaintext;
            $review = array();

            $review_text = str_replace(array('.', ','), array('', ''), $review_text);

            if (preg_match("|([0-9]+) (.*)|i", $review_text, $review))
                $reviews['count'] = (float) $review[1];

            if ($reviews['count'] < 0)
                $reviews['count'] = 0;

            //echo '<pre>'; print_r($reviews); echo '</pre>';

            // finding 5 start count
            return $reviews; // TODO: Not yet necessary

            $reviews['stars_5'] = $html->find('div.histoRowfive', 0)->find('div.histoCount', 0)->plaintext;
            $reviews['stars_4'] = $html->find('div.histoRowfour', 0)->find('div.histoCount', 0)->plaintext;
            $reviews['stars_3'] = $html->find('div.histoRowthree', 0)->find('div.histoCount', 0)->plaintext;
            $reviews['stars_2'] = $html->find('div.histoRowtwo', 0)->find('div.histoCount', 0)->plaintext;
            $reviews['stars_1'] = $html->find('div.histoRowone', 0)->find('div.histoCount', 0)->plaintext;

            return $reviews;
        }

        private function get_item_reviews($data) {

            if ( ! isset( $this->args['crawl_reviews'] ) || $this->args['crawl_reviews'] != '1' )
                return false;

            $reviews = array();

            $reviews['iframe_url'] = (!empty($data['CustomerReviews']['IFrameURL'])) ? $data['CustomerReviews']['IFrameURL'] : null;
            $reviews['has_reviews'] = ( isset($data['CustomerReviews']['HasReviews']) && 'true' == $data['CustomerReviews']['HasReviews'] ) ? 1 : 0;

            // Reviews available, let's get them!
            if ( $reviews['has_reviews'] === 1 ) {

                $reviews_crawled = array();

                // New
                if ( isset ( $data['ASIN'] ) ) {
                    $customer_rating = $this->get_item_customer_rating( $data['ASIN'] );

                    //$this->debug( $customer_rating, 'get_item_reviews: No. 1 - get_item_customer_rating()' );
                    if ( $customer_rating ) {

                        if ( isset( $customer_rating['rating'] ) )
                            $reviews_crawled['rating'] = $customer_rating['rating'];

                        if ( isset( $customer_rating['reviews'] ) )
                            $reviews_crawled['count'] = $customer_rating['reviews'];
                    }
                }

                // Fallback
                if ( ! isset( $reviews_crawled['rating'] ) && $reviews['iframe_url'] ) {
                    $reviews_crawled = $this->get_crawled_reviews( $reviews['iframe_url'] );

                    //$this->debug( $reviews_crawled, 'get_item_reviews: No. 2 - get_crawled_reviews()' );
                }
            }

            // Deprecated
            /*
            if ( ! empty ( $this->args['crawl_reviews'] ) && $reviews['has_reviews'] === 1 && isset ( $data['ASIN'] ) ) {
                //$reviews_crawled = $this->get_crawled_reviews_new( $data['ASIN'] );
            }
            */

            $reviews['rating'] = (isset($reviews_crawled['rating'])) ? $reviews_crawled['rating'] : null;
            $reviews['count'] = (isset($reviews_crawled['count'])) ? $reviews_crawled['count'] : null;
            $reviews['stars'] = (isset($reviews_crawled['stars'])) ? $reviews_crawled['stars'] : null;
            $reviews['stars_5'] = (isset($reviews_crawled['stars_5'])) ? $reviews_crawled['stars_5'] : null;
            $reviews['stars_4'] = (isset($reviews_crawled['stars_4'])) ? $reviews_crawled['stars_4'] : null;
            $reviews['stars_3'] = (isset($reviews_crawled['stars_3'])) ? $reviews_crawled['stars_3'] : null;
            $reviews['stars_2'] = (isset($reviews_crawled['stars_2'])) ? $reviews_crawled['stars_2'] : null;
            $reviews['stars_1'] = (isset($reviews_crawled['stars_1'])) ? $reviews_crawled['stars_1'] : null;

            return $reviews;
        }

        /**
         * @param $asin
         *
         * @return array|null
         */
        public function get_item_customer_rating( $asin ) {

            if ( empty( $asin ) )
                return null;

            $rating = false;

            $url = 'https://www.amazon.' . $this->country . '/product-reviews/' . $asin;

            // First try: wp_remote_get
            if ( function_exists( 'wp_remote_get' ) ) {

                $response = wp_remote_get( $url );
                $statusCode = null;

                if ( function_exists( 'is_wp_error' ) && ! is_wp_error( $response ) ) {

                    // echo $response['response']['message'];

                    // Success
                    if ( isset( $response['response']['code'] ) ) {
                        $statusCode = $response['response']['code'];
                    }

                    if ( '200' == $statusCode ) {
                        $page = $response['body'];
                    }
                }
            }

            /* Fallback: Get file by old fashioned way
            if ( ! isset ( $page ) ) {
                $page = $this->get_file($url, NULL);
            }*/

            if ( ! empty ( $page ) ) {
                $rating = $this->get_item_customer_rating_from_html_page( $page );
            }

            // Fallback if no reviews are available
            if ( $rating === false ) {

                if ( ini_get('allow_url_fopen') ) {

                    try {
                        // Trying to use file_get_contents
                        $opts = array(
                            'http'=>array(
                                'header' => 'Connection: close',
                                'ignore_errors' => true
                            )
                        );
                        $context = stream_context_create($opts);
                        @$page = file_get_contents($url, false, $context);

                        $rating = $this->get_item_customer_rating_from_html_page( $page );

                    } catch(Exception $ex) {
                        // Do nothing
                    }
                }
            }

            // Finish
            //echo 'Result for ASIN: <a href="' . $url . '" target="_blank">' .$asin .'</a>:<br>';
            //var_dump($rating);

            return $rating;
        }

        public function get_item_customer_rating_from_html_page( $page ) {

            $rating = array(
                'rating' => null,
                'reviews' => null
            );

            $html = new simple_html_dom();

            $html->load($page);

            if (!$html)
                return false;

            // Reviews
            //$label_reviews = $html->find('span.totalReviewCount', 0)->plaintext; // #575
            $label_reviews = $html->find('span.totalReviewCount', 0);
            $label_reviews = ( isset( $label_reviews->plaintext ) ) ? $label_reviews->plaintext : 0;
            $label_reviews = preg_replace("/[^0-9]/","",$label_reviews);

            /*
            echo '$label_reviews:<br>';
            var_dump($label_reviews);
            echo '<br>';
            */

            if ( '0' == $label_reviews ) {
                $rating['rating'] = 0;
                $rating['reviews'] = 0;

                return $rating;
            }

            if ( is_numeric( $label_reviews ) )
                $rating['reviews'] = intval( $label_reviews );

            // Rating
            //$label_rating = $html->find('div.averageStarRatingNumerical', 0)->plaintext; // #575
            $label_rating = $html->find('div.averageStarRatingNumerical', 0);
            $label_rating = ( isset( $label_rating->plaintext ) ) ? $label_rating->plaintext : 0;

            /*
            echo '$label_rating:<br>';
            var_dump($label_rating);
            echo '<br>';
            */

            if ( ! empty( $label_rating ) ) {

                $label_rating_parts = explode( ' ', $label_rating );

                if ( ! empty( $label_rating_parts[0] ) ) {
                    $label_rating = str_replace(',', '.', $label_rating_parts[0]);
                    $rating['rating'] = $label_rating;
                }
            }

            // Return
            return ( $rating['reviews'] != null ) ? $rating : false;
        }

        private function get_item_title($data) {

            $title = (isset($data['ItemAttributes']['Title'])) ? $data['ItemAttributes']['Title'] : null;

            $title = $this->strip_emojis( $title );

            return $title;
        }

        private function get_item_attributes( $data ) {

            $attributes = array();

            if ( ! isset( $data['ItemAttributes'] ) )
                return null;

            if ( ! is_array( $data['ItemAttributes'] ) || sizeof( $data['ItemAttributes'] ) < 1 )
                return null;

            //$excludes = array( 'Feature' ); // Deprecated

            foreach ( $data['ItemAttributes'] as $key => $value ) {
                $attributes[$key] = $value;
            }

            // Remove Emojis from feature list
            if ( isset( $attributes['Feature'] ) ) {

                if ( is_array( $attributes['Feature'] ) ) {
                    foreach ( $attributes['Feature'] as $feature_key => $feature_text ) {
                        $attributes['Feature'][$feature_key] = $this->strip_emojis( $feature_text );
                    }
                } else {
                    $attributes['Feature'] = $this->strip_emojis( $attributes['Feature'] );
                }
            }

            return $attributes;
        }

        private function get_item_description($data) {
            $items = array();

            if (!isset($data['ItemAttributes']))
                return null;

            // Features available
            if (isset($data['ItemAttributes']['Feature'])) {
                if (is_array($data['ItemAttributes']['Feature']) && sizeof($data['ItemAttributes']['Feature'] > 0)) {
                    foreach($data['ItemAttributes']['Feature'] as $feature) {
                        if ( ! empty( $feature ) )
                            $items[] = $feature;
                    }
                } elseif ( ! empty( $data['ItemAttributes']['Feature'] ) ) {
                    $items[] = $data['ItemAttributes']['Feature'];
                }
            }

            // Related to product groups
            if (isset($data['ItemAttributes']['ProductTypeName'])) {
                $items = $this->get_item_specific_description( $items, $data['ItemAttributes'], $data['ItemAttributes']['ProductTypeName'] );
            }

            return $items;
        }

        private function get_item_teaser($data) {

            $teaser = null;

            if ( isset($data['ItemAttributes']['ProductTypeName'] ) ) {
                $teaser = $this->get_item_specific_description( array(), $data['ItemAttributes'], $data['ItemAttributes']['ProductTypeName'], $teaser = true );
            }

            return $teaser;
        }

        private function get_item_specific_description ( $items, $attribues, $type, $teaser = false ) {

            // Books
            if ($type == 'ABIS_BOOK') {
                if (isset($attribues['Author']))
                    $items[] = (is_array($attribues['Author'])) ? implode(', ', $attribues['Author']) : $attribues['Author'];
                if (isset($attribues['Publisher']))
                    $items[] = $attribues['Publisher'];
                if (isset($attribues['Edition']) && isset($attribues['PublicationDate']))
                    $items[] = $this->translate('Edition no.') . ' ' . $attribues['Edition'] . ' (' . $this->format_date($attribues['PublicationDate']) . ')';
                if (isset($attribues['Binding']) && isset($attribues['NumberOfPages']))
                    $items[] = $attribues['Binding'] . ': ' . $attribues['NumberOfPages'] . ' ' . $this->translate('pages');
            }

            // DVD, BluRay, Prime Video
            if ($type == 'ABIS_DVD' || $type == 'DOWNLOADABLE_MOVIE' || $type == 'DOWNLOADABLE_TV_SEASON' ) {
                if ( isset( $attribues['Studio'] ) && isset( $attribues['ReleaseDate'] ) ) {
                    $items[] = $attribues['Studio'] . ' (' . $this->format_date($attribues['ReleaseDate']) . ')';
                } elseif ( isset( $attribues['Studio'] ) && isset( $attribues['PublicationDate'] ) ) {
                    $items[] = $attribues['Studio'] . ' (' . $this->format_date($attribues['PublicationDate']) . ')';
                }
                if ( isset( $attribues['Binding'] ) && isset( $attribues['AudienceRating'] ) )
                    $items[] = $attribues['Binding'] . ', ' . $attribues['AudienceRating'];
                if (isset($attribues['RunningTime']))
                    $items[] = $this->translate('Running time') . ': ' . $attribues['RunningTime'] . ' min';
                if (isset($attribues['Actor']))
                    $items[] = (is_array($attribues['Actor'])) ? implode(', ', $attribues['Actor']) : $attribues['Actor'];
                if (isset($attribues['Languages']['Language']) && is_array($attribues['Languages']['Language']) && sizeof($attribues['Languages']['Language']) != 0 && ! $teaser)
                    $items[] = $this->get_item_description_languages($attribues['Languages']['Language']);
            }

            // Music
            if ($type == 'ABIS_MUSIC') {
                if (isset($attribues['Artist']) && isset($attribues['Title'])) {
                    $items[] = $attribues['Artist'] . ', ' . $attribues['Title'];
                } elseif (isset($attribues['Artist'])) {
                    $items[] = $attribues['Artist'];
                } elseif (isset($attribues['Title'])) {
                    $items[] = $attribues['Title'];
                }
                if (isset($attribues['Label']))
                    $items[] = $attribues['Label'];
                if (isset($attribues['Binding']))
                    $items[] = $attribues['Binding'];
            }

            // Toys & Games
            if ($type == 'TOYS_AND_GAMES') {
                if (isset($attribues['Binding']))
                    $items[] = $attribues['Binding'];
                if (isset($attribues['Publisher']))
                    $items[] = $attribues['Publisher'];
            }

            // Toys & Games
            if ($type == 'SHOES') {
                if (isset($attribues['Brand']))
                    $items[] = $attribues['Brand'];
                if (isset($attribues['Size']))
                    $items[] = $attribues['Size'];
                if (isset($attribues['Color']))
                    $items[] = $attribues['Color'];
            }

            // Fallback if nothing matches
            if (sizeof($items) == 0) {
                if (isset($attribues['Author']))
                    $items[] = (is_array($attribues['Author'])) ? implode(', ', $attribues['Author']) : $attribues['Author'];
                if (isset($attribues['Publisher']))
                    $items[] = $attribues['Publisher'];
                if (isset($attribues['Binding']))
                    $items[] = $attribues['Binding'];
                if (isset($attribues['Edition']) && isset($attribues['PublicationDate']))
                    $items[] = $this->translate('Edition no.') . ' ' . $attribues['Edition'] . ' (' . $this->format_date($attribues['PublicationDate']) . ')';
                if (isset($attribues['Languages']['Language']) && is_array($attribues['Languages']['Language']) && sizeof($attribues['Languages']['Language']) != 0 && ! $teaser)
                    $items[] = $this->get_item_description_languages($attribues['Languages']['Language']);
            }

            return $items;
        }

        private function get_item_description_languages($data) {
            $languages = '';

            if (isset($data['Name'])) {
                // only one language
                return $data['Name'];
            } else {
                // more than one language available
                foreach ($data as $language) {

                    if (isset($language['Name']) && strpos($languages, $language['Name']) === false) {
                        if ($languages != '') {
                            $languages .= ', ';
                        }

                        $languages .= $language['Name'];
                        // TODO: Maybe sort by name
                    }
                }

                return $languages;
            }
        }

        private function get_item_description_dimensions($data) {
            $dimensions = '';

            return $dimensions;
        }

        private function get_item_editorial_review($data) {

            // Remove when debugging
            if ( $this->debug == true )
                return null;

            $editorial_review = null;

            if ( isset( $data['EditorialReviews']['EditorialReview']['Content'] ) ) {
                $editorial_review = $data['EditorialReviews']['EditorialReview']['Content'];
            }

            return $editorial_review;
        }

        private function get_item_images($data) {

            $images = array();

            // Default image
            $default_image = array();

            if ( isset( $data['SmallImage'] ) && isset( $data['MediumImage'] ) && isset( $data['LargeImage'] ) ) {
                $default_image['small']  = ( isset( $data['SmallImage'] ) && isset( $data['SmallImage']['URL'] ) ) ? $data['SmallImage']['URL'] : null;
                $default_image['medium'] = ( isset( $data['MediumImage'] ) && isset( $data['MediumImage']['URL'] ) ) ? $data['MediumImage']['URL'] : null;
                $default_image['large']  = ( isset( $data['LargeImage'] ) && isset( $data['LargeImage']['URL'] ) ) ? $data['LargeImage']['URL'] : null;
            }

            if ( sizeof( $default_image ) > 0 )
                $images[] = $default_image;

            // Imagesets
            $imagesets = $this->get_item_imagesets( $data );

            if ( is_array( $imagesets ) && sizeof( $imagesets ) > 0 ) {
                foreach ( $imagesets as $imageset ) {
                    // Skip if default image is included in the imageset
                    if ( isset( $default_image['small'] ) && isset( $imageset['small'] ) && $default_image['small'] === $imageset['small'] )
                        continue;

                    $images[] = $imageset;
                }
            }

            // Return
            return $images;
        }

        private function get_item_imagesets($data) {
            $image_sets = array();

            if ( isset( $data['ImageSets']['ImageSet'] ) ) {

                if ( isset( $data['ImageSets']['ImageSet'][0] ) ) {
                    $image_sets_data = $data['ImageSets']['ImageSet'];
                } else {
                    $image_sets_data   = array();
                    $image_sets_data[] = $data['ImageSets']['ImageSet'];
                }

                foreach ( $image_sets_data as $image ) {

                    if ( isset($image['SmallImage']) && isset($image['MediumImage']) && isset($image['LargeImage']) ) {
                        $images = array();

                        $images['small']  = ( isset( $image['SmallImage']['URL'] ) ) ? $image['SmallImage']['URL'] : null;
                        $images['medium'] = ( isset( $image['MediumImage']['URL'] ) ) ? $image['MediumImage']['URL'] : null;
                        $images['large']  = ( isset( $image['LargeImage']['URL'] ) ) ? $image['LargeImage']['URL'] : null;

                        $image_sets[] = $images;
                    }
                }
            }

            return $image_sets;
        }

        private function get_item_ids($data) {
            $ids = array();

            $ids['asin'] = (isset($data['ASIN'])) ? $data['ASIN'] : null;
            $ids['ean'] = (isset($data['ItemAttributes']['EAN'])) ? $data['ItemAttributes']['EAN'] : null;
            $ids['isbn'] = (isset($data['ItemAttributes']['ISBN'])) ? $data['ItemAttributes']['ISBN'] : null;

            return $ids;
        }

        private function get_item_type($data) {

            return ( ! empty ( $data['ItemAttributes']['ProductTypeName'] ) ) ? $data['ItemAttributes']['ProductTypeName'] : 'unknown';
        }

        private function get_item_urls($data) {

            $item_urls = array();

            // API URLs
            $api_urls = array();

            $api_urls['basic'] = (isset($data['DetailPageURL'])) ? $data['DetailPageURL'] : null; // urldecode($data['DetailPageURL'])

            if (isset($data['ItemLinks']['ItemLink']) && is_array($data['ItemLinks']['ItemLink'])) {

                // Loop ItemLinks
                foreach ($data['ItemLinks']['ItemLink'] as $link) {
                    if (isset($link['Description']) && isset($link['URL'])) {
                        if ($link['Description'] == 'Add To Wishlist') {
                            $api_urls['wishlist'] = $link['URL']; // urldecode($link['URL']);
                        } elseif ($link['Description'] == 'Tell A Friend') {
                            $api_urls['recommend'] = $link['URL']; // urldecode($link['URL']);
                        } elseif ($link['Description'] == 'All Customer Reviews') {
                            $api_urls['reviews'] = $link['URL']; // urldecode($link['URL']);
                        } elseif ($link['Description'] == 'All Offers') {
                            $api_urls['offers'] = $link['URL']; // urldecode($link['URL']);
                        }
                    }
                }

                // Extend API urls
                $api_urls['cart'] = 'https://www.amazon.' . $this->country . '/gp/aws/cart/add.html?ASIN.1=' . $data['ASIN'] . '&Quantity.1=1&tag=' . $this->aws_associate_tag;
            }

            return $api_urls;

            // TODO: Deprected
            $item_urls['_api'] = $api_urls;

            // Loop countries and build urls
            if ( !empty ( $data['ASIN'] ) ) {

                // Build country urls
                foreach ( $this->countries as $country ) {

                    $urls = array();

                    // Basic url
                    if ( $country === 'com' ) {
                        $urls['basic'] = 'https://amzn.com/' . $data['ASIN'] . '/';
                    } else {
                        $urls['basic'] = 'https://www.amazon.' . $country . '/dp/' . $data['ASIN'] . '/';
                    }

                    // Other
                    // https://www.amazon.de/gp/aws/cart/add.html?AssociateTag=Associate+Tag&ASIN.1=B01B53NG1K&Quantity.1=1
                    $urls['cart'] = 'https://www.amazon.' . $country . '/gp/aws/cart/add.html?ASIN.1=' . $data['ASIN'] . '&Quantity.1=1';
                    $urls['wishlist'] = 'https://www.amazon.' . $country . '/gp/registry/wishlist/add-item.html?asin.0=' . $data['ASIN'] . '/';
                    $urls['recommend'] = 'https://www.amazon.' . $country . '/gp/pdp/taf/' . $data['ASIN'] . '/';
                    $urls['reviews'] = 'https://www.amazon.' . $country . '/review/product/' . $data['ASIN'] . '/';
                    $urls['offers'] = 'https://www.amazon.' . $country . '/gp/offer-listing/' . $data['ASIN'] . '/';

                    // Finish
                    $item_urls[$country] = $urls;
                }
            }

            // Finished
            return $item_urls;
        }

        private function get_item_similar_products($data) {
            $products = array();

            if (isset($data['SimilarProducts']['SimilarProduct'])) {
                if (is_array($data['SimilarProducts']['SimilarProduct']) && sizeof($data['SimilarProducts']['SimilarProduct'] > 0)) {
                    $products = $data['SimilarProducts']['SimilarProduct'];
                }
            }

            return $products;
        }

        private function get_file($url,$file = NULL, $referer = '', $compressed = false) {
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_VERBOSE, 0);
            curl_setopt($curl, CURLOPT_HEADER, 0);
            curl_setopt($curl, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:24.0) Gecko/20100101 Firefox/24.0');
            curl_setopt($curl, CURLOPT_AUTOREFERER,$referer);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            if ($compressed) curl_setopt($curl, CURLOPT_ENCODING, 'gzip,deflate');
            if ($file) {
                $f = fopen($file, 'w+');
                curl_setopt($curl, CURLOPT_FILE , $f);
            }

            $page = curl_exec($curl);
            curl_close($curl);
            if ($file && $f) fclose($f);

            return $page;
        }

        private function get_translations($country) {

            $result = array();

            $translations = array(
                'pages' => array('de' => 'Seiten', 'fr' => 'pages', 'es' => 'páginas', 'it' => 'pagine'),
                'Edition no.' => array('de' => 'Auflage Nr.', 'fr' => 'Édition no.', 'es' => 'Edición no.', 'it' => 'Edizione n.'),
                'Release date' => array('de' => 'Ver&ouml;ffentlichungsdatum', 'fr' => 'Date de sortie', 'es' => 'Fecha de lanzamiento', 'it' => 'Data di rilascio'),
                'Running time' => array('de' => 'Laufzeit', 'fr' => 'temps de fonctionnement', 'es' => 'tiempo de ejecución', 'it' => 'tempo di esecuzione'),
            );

            foreach ($translations as $key => $values) {
                if (isset($values[$country])) {
                    $result[$key] = $values[$country];
                }
            }

            return $result;
        }

        private function format_date($date) {

            if ( 'de' === $this->country )
                return date('d.m.Y', strtotime($date));

            return $date;
        }

        private function translate($string) {

            //$this->debug($this->translations, 'translation');

            if (isset($this->translations[$string]) && $this->translations[$string] != '') {

                return $this->translations[$string];
            }

            return $string;
        }

        /**
         * Strip emojis from text string
         *
         * @param $text
         * @return null|string|string[]
         */
        private function strip_emojis( $text ) {

            if ( is_string( $text ) )
                $text = preg_replace('/([0-9#][\x{20E3}])|[\x{00ae}\x{00a9}\x{203C}\x{2047}\x{2048}\x{2049}\x{3030}\x{303D}\x{2139}\x{2122}\x{3297}\x{3299}][\x{FE00}-\x{FEFF}]?|[\x{2190}-\x{21FF}][\x{FE00}-\x{FEFF}]?|[\x{2300}-\x{23FF}][\x{FE00}-\x{FEFF}]?|[\x{2460}-\x{24FF}][\x{FE00}-\x{FEFF}]?|[\x{25A0}-\x{25FF}][\x{FE00}-\x{FEFF}]?|[\x{2600}-\x{27BF}][\x{FE00}-\x{FEFF}]?|[\x{2900}-\x{297F}][\x{FE00}-\x{FEFF}]?|[\x{2B00}-\x{2BF0}][\x{FE00}-\x{FEFF}]?|[\x{1F000}-\x{1F6FF}][\x{FE00}-\x{FEFF}]?/u', '', $text);

            return $text;
        }

        /*
         * Helper
         */
        private function is_associative_array(array $array) {
            return array_keys($array) !== range(0, count($array) - 1);
        }

        /*
         * Debugging
         */

        public function set_debug_mode() {
            $this->debug = true;
        }

        public function debug($arg, $text = null) {

            if ( $this->debug == true || ( defined('AAWP_DEV_DEBUG') && AAWP_DEV_DEBUG === true ) ) {

                if ( is_string($arg) ) {
                    echo '<h2>' . $arg . '</h2>';

                    $arg = $text;
                } elseif ( $text ) {
                    echo '<h2>' . $text . '</h2>';
                }

                echo '<pre>';
                print_r($arg);
                echo '</pre>';
            }
        }
    }
}