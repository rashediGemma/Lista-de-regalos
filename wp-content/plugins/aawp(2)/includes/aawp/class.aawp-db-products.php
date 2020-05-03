<?php
/**
 * Products Database Class
 *
 * This class is for interacting with the products' database table
 *
 * @package     AAWP
 * @since       3.6
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * AAWP_DB_Products Class
 *
 * @since 2.1
 */
class AAWP_DB_Products extends AAWP_DB {

	/**
	 * The metadata type.
	 *
	 * @access public
	 * @since  3.6
	 * @var string
	 */
	public $meta_type = 'product';

	/**
	 * The name of the date column.
	 *
	 * @access public
	 * @since  3.6
	 * @var string
	 */
	public $date_key = 'date_created';

	/**
	 * The name of the cache group.
	 *
	 * @access public
	 * @since  3.6
	 * @var string
	 */
	public $cache_group = 'products';

	/**
	 * Get things started
	 *
	 * @access  public
	 * @since   3.6
	*/
	public function __construct() {

		global $wpdb;

		$this->table_name  = $wpdb->prefix . 'aawp_products';
		$this->primary_key = 'id';
		$this->version     = '2.0';

        if ( ! $this->table_exists( $this->table_name ) ) {
            $this->create_table();
        }
	}

	/**
	 * Get columns and formats
	 *
	 * @access  public
	 * @since   2.1
	*/
	public function get_columns() {
        return array(
            'id'              => '%d',
            'status'          => '%s',
            'asin'            => '%s',
            'ean'             => '%s',
            'title'           => '%s',
            'type'            => '%s',
            'urls'            => '%s',
            'image_ids'       => '%s',
            'attributes'      => '%s',
            'availability'    => '%s',
            'price'           => '%f',
            'list_price'      => '%f',
            'price_saving'    => '%f',
            'variation_price' => '%f',
            'used_price'      => '%f',
            'salesrank'       => '%d',
            'prime'           => '%d',
            'rating'          => '%f',
            'reviews'         => '%d',
            'rating_updated'  => '%s',
            'date_created'    => '%s',
            'date_updated'    => '%s'
        );
    }

	/**
	 * Get default column values
	 *
	 * @access  public
	 * @since   2.1
	*/
	public function get_column_defaults() {
        return array(
            'status'          => 'active',
            'asin'            => '',
            'ean'             => '',
            'title'           => '',
            'type'            => '',
            'urls'            => '',
            'image_ids'       => '',
            'attributes'      => '',
            'availability'    => '',
            'price'           => 0.00,
            'list_price'      => 0.00,
            'price_saving'    => 0.00,
            'variation_price' => 0.00,
            'used_price'      => 0.00,
            'salesrank'       => 0,
            'prime'           => 0,
            'rating'          => 0,
            'reviews'         => 0,
            'rating_updated'  => date( 'Y-m-d H:i:s' ),
            'date_created'    => date( 'Y-m-d H:i:s' ),
            'date_updated'    => date( 'Y-m-d H:i:s' )
        );
	}

	/**
	 * Add a product
	 *
	 * @access  public
	 * @since   2.1
	*/
	public function add( $data = array() ) {

		$defaults = array(
			'description' => ''
		);

		$args = wp_parse_args( $data, $defaults );

		if( empty( $args['asin'] ) ) {
			return false;
		}

        $args = $this->prepare_product_data( $args );

		$product = $this->get_product_by( 'asin', $args['asin'], false );

		if ( $product && isset( $product->id ) ) {
			// update an existing product
			$this->update( $product->id, $args );

			return $product->id;

		} else {
			return $this->insert( $args, 'product' );

		}

	}

	/**
	 * Insert a new product
	 *
	 * @access  public
	 * @since   2.1
	 * @return  int
	 */
	public function insert( $data, $type = '' ) {

	    // Insert into database
		$result = parent::insert( $data, $type );

		if ( $result ) {
			$this->set_last_changed();
		}

		return $result;
	}

    /**
     * Update a product
     *
     * @param $row_id
     * @param array $data
     * @param string $where
     *
     * @return bool
     */
	public function update( $row_id, $data = array(), $where = '' ) {

        $data = $this->prepare_product_data( $data );

        // Overwrite date_updated
        //$data['date_updated'] = date( 'Y-m-d H:i:s' );

        // Insert into database
		$result = parent::update( $row_id, $data, $where );

		if ( $result ) {
			$this->set_last_changed();
		}

		return $result;
	}

    /**
     * Delete a product
     *
     * @param bool $id
     *
     * @return bool|false|int
     */
	public function delete( $id = false ) {

		if ( empty( $id ) ) {
			return false;
		}

		$product = $this->get_product_by( 'id', $id, false );

		if ( $product->id > 0 ) {

			global $wpdb;

			$result = $wpdb->delete( $this->table_name, array( 'id' => $product->id ), array( '%d' ) );

			if ( $result ) {
				$this->set_last_changed();
			}

			return $result;

		} else {
			return false;
		}

	}

    /**
     * Checks if a product exists
     *
     * @param string $value
     * @param string $field
     *
     * @return bool
     */
	public function exists( $value = '', $field = 'asin' ) {

		$columns = $this->get_columns();
		if ( ! array_key_exists( $field, $columns ) ) {
			return false;
		}

		return (bool) $this->get_column_by( 'id', $field, $value );

	}

    /**
     * Retrieves a single product from the database
     *
     * @param string $field
     * @param int $value
     * @param bool $format_result
     *
     * @return array|bool|null|object
     */
	public function get_product_by( $field = 'id', $value = 0, $format_result = true ) {

		if ( empty( $field ) || empty( $value ) ) {
			return NULL;
		}

		if ( 'id' == $field ) {
			// Make sure the value is numeric to avoid casting objects, for example,
			// to int 1.
			if ( ! is_numeric( $value ) ) {
				return false;
			}

			$value = intval( $value );

			if ( $value < 1 ) {
				return false;
			}

		} elseif ( 'asin' === $field ) {

			$value = trim( $value );
		}

		if ( ! $value ) {
			return false;
		}

		/*
		echo 'get_product_by >>> ';
		echo 'field: ' . $field;
        echo ' - value: ';
		var_dump( $value );
		echo '<br>';
        */

        global $wpdb;

        $product = $wpdb->get_row( "SELECT * FROM {$this->table_name} WHERE {$field} = '{$value}' LIMIT 1;" );

		return ( $format_result ) ? $this->format_product_result( $product ) : $product;
	}

    /**
     * Retrieve products from the database
     *
     * @param array $args
     * @param bool $format_results
     *
     * @return array|null|object
     */
    public function get_products( $args = array(), $format_results = true ) {

        global $wpdb;

        $defaults = array(
            'number'         => 10,
            'offset'         => 0,
            'id'             => 0,
            'status'         => 'active',
            'asin'           => '',
            'images_missing' => '',
            'rating_updated' => '',
            'date_created'   => '',
            'date_updated'   => '',
            //'date'    => array(),
            'fields'         => false,
            's'              => '',
            'order'          => 'DESC',
            'orderby'        => 'id'
        );

        $args = wp_parse_args( $args, $defaults );

        //aawp_debug( $args, 'get_products $args' );

        $where = '';

        // ID
        if ( ! empty( $args['id'] ) ) {

            if ( is_array( $args['id'] ) ) {
                $ids = implode( ',', $args['id'] );
            } else {
                $ids = intval( $args['id'] );
            }

            if ( ! empty( $where ) ) {
                $where .= "AND `id` IN( {$ids} ) ";
            } else {
                $where .= "WHERE `id` IN( {$ids} ) ";
            }

        }

        // Status
        if( ! empty( $args['status'] ) ) {

            if( is_array( $args['status'] ) )
                $statuss = implode( ',', $args['status'] );
            else
                $statuss = $args['status'];

            if( ! empty( $where ) ) {
                $where .= "AND `status` IN( '{$statuss}' ) ";
            } else {
                $where .= "WHERE `status` IN( '{$statuss}' ) ";
            }

        }

        // ASIN
        if ( ! empty( $args['asin'] ) ) {

            if ( is_array( $args['asin'] ) ) {
                $asins = implode( "','", $args['asin'] );
            } elseif ( strpos( $args['asin'], ',' ) !== false ) {
                $asins = str_replace( ",", "','", $args['asin'] );
            } else {
                $asins = $args['asin'];
            }

            if( ! empty( $where ) ) {
                $where .= "AND `asin` IN( '{$asins}' ) ";
            } else {
                $where .= "WHERE `asin` IN( '{$asins}' ) ";
            }

        }

        // Images missing
        if( ! empty( $args['images_missing'] ) && true === $args['images_missing'] ) {

            if( ! empty( $where ) ) {
                $where .= "AND `image_ids` = '' ";
            } else {
                $where .= "WHERE `image_ids` = '' ";
            }

        }

        // Outdated only
        if ( isset( $args['outdated'] ) && true === $args['outdated'] ) {

            $general_options = aawp_get_options( 'general' );

            if ( ! empty( $general_options['cache_duration'] ) && is_numeric( $general_options['cache_duration'] ) ) {

                $cache_duration = intval( $general_options['cache_duration'] );

                if ( ! empty( $where ) ) {
                    $where .= "AND `date_updated` < DATE_SUB(NOW(), INTERVAL $cache_duration MINUTE) ";
                } else {
                    $where .= "WHERE `date_updated` < DATE_SUB(NOW(), INTERVAL $cache_duration MINUTE) ";
                }
            }
        }

        // Outdated only
        if ( isset( $args['rating_outdated'] ) && true === $args['rating_outdated'] ) {

            $rating_cache_duration = 4320; // 3 Days

            if ( ! empty( $where ) ) {
                $where .= "AND `rating_updated` < DATE_SUB(NOW(), INTERVAL $rating_cache_duration MINUTE) ";
            } else {
                $where .= "WHERE `rating_updated` < DATE_SUB(NOW(), INTERVAL $rating_cache_duration MINUTE) ";
            }
        }

        // With or without reviews
        if ( isset( $args['has_reviews'] ) ) {

            if ( true === $args['has_reviews'] ) {

                if ( ! empty( $where ) ) {
                    $where .= "AND `reviews` > 0 ";
                } else {
                    $where .= "WHERE `reviews` > 0 ";
                }

            } else {

                if ( ! empty( $where ) ) {
                    $where .= "AND `reviews` = 0 ";
                } else {
                    $where .= "WHERE `reviews` = 0 ";
                }
            }

        }

        // Fields to return
        if( $args['fields'] ) {
            $fields = $args['fields'];
        } else {
            $fields = '*';
        }

        if ( 'DESC' === strtoupper( $args['order'] ) ) {
            $order = 'DESC';
        } else {
            $order = 'ASC';
        }

        $columns = array(
            'id',
            'status',
            'asin',
            'rating_updated',
            'date_created',
            'date_updated'
        );

        //$orderby = array_key_exists( $args['orderby'], $columns ) ? $args['orderby'] : 'id';
        $orderby = ( in_array( $args['orderby'], $columns ) ) ? $args['orderby'] : 'id';

        /*
        echo '<strong>SQL query:</strong><br>';
        echo '$fields: ' . $fields . '<br>';
        echo '$where: ' . $where . '<br>';
        echo '$orderby: ' . $orderby . '<br>';
        echo '$order: ' . $order . '<br>';
        echo '$args[number]: ' . $args['number'] . '<br>';
        */

        $products = $wpdb->get_results( $wpdb->prepare( "SELECT {$fields} FROM " . $this->table_name . " {$where}ORDER BY {$orderby} {$order} LIMIT %d,%d;", absint( $args['offset'] ), absint( $args['number'] ) ) );

        return ( $format_results ) ? $this->format_product_results( $products ) : $products;

    }

    /**
     * Count the total number of products in the database
     *
     * @param array $args
     *
     * @return mixed|null|string
     */
    public function count( $args = array() ) {

        global $wpdb;

        $defaults = array(
            'status'  => ''
        );

        $args  = wp_parse_args( $args, $defaults );

        $where = '';

        if( ! empty( $args['status'] ) ) {

            if( is_array( $args['status'] ) ) {
                $statuss = implode( ',', $args['status'] );
            } else {
                $statuss = intval( $args['status'] );
            }

            if( ! empty( $where ) ) {
                $where .= " AND `status` IN( '{$statuss}' ) ";
            } else {
                $where .= " WHERE `status` IN( '{$statuss}' ) ";
            }

        }

        $key   = 'aawp_db' . md5( '_products_' . serialize( $args ) );
        $count = get_transient( $key );

        if ( $count === false ) {
            $count = $wpdb->get_var( "SELECT COUNT(ID) FROM " . $this->table_name . "{$where};" );
            set_transient( $key, $count, 10800 );
        }

        return $count;

    }

	/**
	 * Sets the last_changed cache key for products.
	 *
	 * @access public
	 * @since  3.6
	 */
	public function set_last_changed() {
		wp_cache_set( 'last_changed', microtime(), $this->cache_group );
	}

	/**
	 * Retrieves the value of the last_changed cache key for products.
	 *
	 * @access public
	 * @since  2.8
	 */
	public function get_last_changed() {
		if ( function_exists( 'wp_cache_get_last_changed' ) ) {
			return wp_cache_get_last_changed( $this->cache_group );
		}

		$last_changed = wp_cache_get( 'last_changed', $this->cache_group );
		if ( ! $last_changed ) {
			$last_changed = microtime();
			wp_cache_set( 'last_changed', $last_changed, $this->cache_group );
		}

		return $last_changed;
	}

    /**
     * Prepare product data for database
     *
     * @param $data
     *
     * @return mixed
     */
    private function prepare_product_data( $data ) {

        // Remove unneeded data
        if ( isset( $data['attributes'] ) && is_array( $data['attributes'] ) ) {

            if ( isset( $data['attributes']['CatalogNumberList'] ) )
                unset( $data['attributes']['CatalogNumberList'] );

            if ( isset( $data['attributes']['EANList'] ) )
                unset( $data['attributes']['EANList'] );

            if ( isset( $data['attributes']['UPCList'] ) )
                unset( $data['attributes']['UPCList'] );
        }

        // Serialize arrays
        if ( isset( $data['urls'] ) )
            $data['urls'] = maybe_serialize( $data['urls'] );

        if ( isset( $data['attributes'] ) )
            $data['attributes'] = maybe_serialize( $data['attributes'] );

        // Images
        if ( isset( $data['images'] ) && is_array( $data['images'] ) && sizeof( $data['images'] ) > 0 ) {
            $data['image_ids'] = aawp_get_product_image_ids_from_images($data['images'], true );
        } elseif ( isset( $data['image_ids'] ) && is_array( $data['image_ids'] ) && sizeof( $data['image_ids'] ) > 0 ) {
            $data['image_ids'] = implode(',', $data['image_ids'] );
        }

        // Pricing
        $data = aawp_prepare_product_data_pricing( $data );

        // Finished
        return $data;
    }

    /**
     * Format product results before returning
     *
     * @param $products
     *
     * @return array
     */
    function format_product_results( $products ) {

        if ( ! $products )
            return $products;

        if ( is_array( $products ) ) {

            foreach ( $products as $product_key => $product ) {

                $product = $this->format_product_data( $product );

                // Replace
                if ( is_array( $product ) )
                    $products[$product_key] = $product;
            }
        }

        return $products;
    }

    /**
     * Format product result before returning
     *
     * @param $product
     *
     * @return array
     */
    private function format_product_result( $product ) {
        return $this->format_product_data( $product );
    }

    /**
     * Format product data coming from database
     *
     * @param $product
     *
     * @return array
     */
    function format_product_data( $product ) {

        if ( is_object( $product ) ) {

            // Convert object to array
            $product = get_object_vars( $product );

            if ( isset( $product['urls'] ) )
                $product['urls'] = maybe_unserialize( unserialize( $product['urls'] ) );

            if ( isset( $product['attributes'] ) )
                $product['attributes'] = maybe_unserialize( unserialize( $product['attributes'] ) );

            if ( isset( $product['image_ids'] ) )
                $product['image_ids'] = ( ! empty( $product['image_ids'] ) ) ? explode( ',', $product['image_ids'] ) : array();
        }

        return $product;
    }

	/**
	 * Create the table
     *
     * http://webcheatsheet.com/sql/interactive_sql_tutorial/sql_datatypes.php
	 *
	 * @access  public
	 * @since   2.1
	*/
	public function create_table() {

		global $wpdb;

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

        $sql = "CREATE TABLE " . $this->table_name . " (
		id bigint(20) NOT NULL AUTO_INCREMENT,
		status varchar(20) NOT NULL,
		asin varchar(20) NOT NULL,
		ean varchar(20) NOT NULL,
		title mediumtext NOT NULL,
		type mediumtext NOT NULL,
		urls longtext NOT NULL,
		image_ids mediumtext NOT NULL,
		attributes longtext NOT NULL,
		availability mediumtext NOT NULL,
		price mediumtext NOT NULL,
		list_price mediumtext NOT NULL,
		price_saving mediumtext NOT NULL,
		variation_price mediumtext NOT NULL,
		used_price mediumtext NOT NULL,
		salesrank bigint(10) NOT NULL,
		prime tinyint(1) NOT NULL,
		rating mediumtext NOT NULL,
		reviews bigint(10) NOT NULL,
		rating_updated datetime NOT NULL,
		date_created datetime NOT NULL,
		date_updated datetime NOT NULL,
		PRIMARY KEY  (id),
		UNIQUE KEY asin (asin),
		KEY status (status),
		KEY reviews (reviews),
		KEY rating_updated (rating_updated),
		KEY date_updated (date_updated)
		) CHARACTER SET utf8 COLLATE utf8_general_ci;";

		dbDelta( $sql );

        if ( $this->table_exists($this->table_name ) ) {
            update_option($this->table_name . '_db_version', $this->version );
        }
	}

}
