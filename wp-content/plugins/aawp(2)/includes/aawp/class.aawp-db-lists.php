<?php
/**
 * Lists Database Class
 *
 * This class is for interacting with the lists' database table
 *
 * @package     AAWP
 * @since       3.6
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * AAWP_DB_Lists Class
 *
 * @since 2.1
 */
class AAWP_DB_Lists extends AAWP_DB {

	/**
	 * The metadata type.
	 *
	 * @access public
	 * @since  3.6
	 * @var string
	 */
	public $meta_type = 'list';

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
	public $cache_group = 'lists';

	/**
	 * Get things started
	 *
	 * @access  public
	 * @since   3.6
	*/
	public function __construct() {

		global $wpdb;

		$this->table_name  = $wpdb->prefix . 'aawp_lists';
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
            'id'                 => '%d',
            'list_key'           => '%s',
            'type'               => '%s',
            'browse_node_id'     => '%d',
            'keywords'           => '%s',
            'browse_node_search' => '%d',
            'product_asins'      => '%s',
            'items'              => '%d',
            'date_created'       => '%s',
            'date_updated'       => '%s'
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
            'list_key'           => '',
            'type'               => '',
            'browse_node_id'     => 0,
            'keywords'           => '',
            'browse_node_search' => 0,
            'product_asins'      => '',
            'items'              => 10,
            'date_created'       => date( 'Y-m-d H:i:s' ),
            'date_updated'       => date( 'Y-m-d H:i:s' )
        );
	}

    /**
     * Add a list
     *
     * @param array $data
     *
     * @return bool|int
     */
	public function add( $data = array() ) {

		$defaults = array();

		$args = wp_parse_args( $data, $defaults );

		$args = $this->prepare_list_data( $args );

		if ( ! $args['list_key'] )
		    return false;

        $list = $this->get_list_by( 'list_key', $args['list_key'], false );

		if ( $list && isset( $list->id ) ) {
			// update an existing list
			$this->update( $list->id, $args );

			return $list->id;

		} else {
			return $this->insert( $args, 'list' );

		}

	}

    /**
     * Insert a new list
     *
     * @param $data
     * @param string $type
     *
     * @return int
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
     * Update a list
     *
     * @param $row_id
     * @param array $data
     * @param string $where
     *
     * @return bool
     */
	public function update( $row_id, $data = array(), $where = '' ) {

	    $data = $this->prepare_list_data( $data );

        // Overwrite date_updated
        $data['date_updated'] = date( 'Y-m-d H:i:s' );

        // Insert into database
		$result = parent::update( $row_id, $data, $where );

		if ( $result ) {
			$this->set_last_changed();
		}

		return $result;
	}

    /**
     * Delete a list
     *
     * @param bool $id
     *
     * @return bool|false|int
     */
	public function delete( $id = false ) {

		if ( empty( $id ) ) {
			return false;
		}

		$list = $this->get_list_by( 'id', $id );

		if ( $list->id > 0 ) {

			global $wpdb;

			$result = $wpdb->delete( $this->table_name, array( 'id' => $list->id ), array( '%d' ) );

			if ( $result ) {
				$this->set_last_changed();
			}

			return $result;

		} else {
			return false;
		}

	}

    /**
     * Checks if a list exists
     *
     * @param string $value
     * @param string $field
     *
     * @return bool
     */
	public function exists( $value = '', $field = 'list_key' ) {

		$columns = $this->get_columns();
		if ( ! array_key_exists( $field, $columns ) ) {
			return false;
		}

		return (bool) $this->get_column_by( 'id', $field, $value );

	}

    /**
     * Retrieves a single list from the database
     *
     * @param string $field
     * @param int $value
     * @param bool $format_result
     *
     * @return array|bool|null|object
     */
	public function get_list_by( $field = 'id', $value = 0, $format_result = true ) {

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

        } elseif ( 'list_key' === $field ) {

            $value = trim( $value );
        }
		if ( ! $value ) {
			return false;
		}

        /*
		echo 'get_list_by >>> ';
		echo 'field: ' . $field;
        echo ' - value: ';
		var_dump( $value );
		echo '<br>';
        */

        global $wpdb;

        $list = $wpdb->get_row( "SELECT * FROM {$this->table_name} WHERE {$field} = '{$value}' LIMIT 1;" );

		return ( $format_result ) ? $this->format_list_result( $list ) : $list;
	}

    /**
     * Get list by args (incl. generating a key)
     *
     * @param array $args
     *
     * @return array|bool|null|object
     */
	public function get_list_by_args( $args = array() ) {

        $list_key = $this->generate_key( $args );

        if ( ! $list_key )
            return null;

        return $this->get_list_by( 'list_key', $list_key );
    }

    /**
     * Retrieve lists from the database
     *
     * @param array $args
     * @param bool $format_results
     *
     * @return array
     */
    public function get_lists( $args = array(), $format_results = true ) {

        global $wpdb;

        $defaults = array(
            'number'             => 1,
            'offset'             => 0,
            'id'                 => 0,
            'list_key'           => '',
            'type'               => '',
            'browse_node_id'     => 0,
            'keywords'           => '',
            'browse_node_search' => '',
            'items'              => 0,
            //'date'               => array(),
            'date_created'       => '',
            'date_updated'       => '',
            'outdated'           => false,
            'fields'             => false,
            's'                  => '',
            'order'              => 'DESC',
            'orderby'            => 'id'
        );

        $args = wp_parse_args( $args, $defaults );

        aawp_debug( $args, 'get_lists $args' );

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

        // Type
        if( ! empty( $args['type'] ) ) {

            if ( is_array( $args['type'] ) )
                $types = implode( "','", $args['type'] );
            else
                $types = $args['type'];

            if( ! empty( $where ) ) {
                $where .= "AND `type` IN( '{$types}' ) ";
            } else {
                $where .= "WHERE `type` IN( '{$types}' ) ";
            }
        }

        // Browse Node ID
        if ( ! empty( $args['browse_node_id'] ) ) {

            if ( is_array( $args['browse_node_id'] ) ) {
                $browse_node_ids = implode( ',', $args['browse_node_id'] );
            } else {
                $browse_node_ids = floatval( $args['browse_node_id'] );
            }

            if ( ! empty( $where ) ) {
                $where .= "AND `browse_node_id` IN( {$browse_node_ids} ) ";
            } else {
                $where .= "WHERE `browse_node_id` IN( {$browse_node_ids} ) ";
            }

        // or Keywords
        } elseif ( ! empty( $args['keywords'] ) ) {

            if ( is_array( $args['keywords'] ) )
                $keywords = implode( "','", $args['keywords'] );
            else
                $keywords = $args['keywords'];

            if( ! empty( $where ) ) {
                $where .= "AND `keywords` IN( '{$keywords}' ) ";
            } else {
                $where .= "WHERE `keywords` IN( '{$keywords}' ) ";
            }
        }

        // Browse Node Search
        if ( is_numeric( $args['browse_node_search'] ) ) {

            $browse_node_search = intval( $args['browse_node_search'] );

            if ( ! empty( $where ) ) {
                $where .= "AND `browse_node_search` IN( {$browse_node_search} ) ";
            } else {
                $where .= "WHERE `browse_node_search` IN( {$browse_node_search} ) ";
            }
        }

        // Items
        if ( ! empty( $args['items'] ) ) {

            if ( is_array( $args['items'] ) ) {
                $items = implode( ',', $args['items'] );
            } else {
                $items = intval( $args['items'] );
            }

            if ( ! empty( $where ) ) {
                $where .= "AND `items` IN( {$items} ) ";
            } else {
                $where .= "WHERE `items` IN( {$items} ) ";
            }
        }

        // Outdated only
        if ( $args['outdated'] ) {

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
            'date_created',
            'date_updated'
        );

        $orderby = ( in_array( $args['orderby'], $columns ) ) ? $args['orderby'] : 'id';
        //$orderby = array_key_exists( $args['orderby'], $columns ) ? $args['orderby'] : 'id';

		/*
        echo '<strong>SQL query:</strong><br>';
        echo '$fields: ' . $fields . '<br>';
        echo '$where: ' . $where . '<br>';
        echo '$orderby: ' . $orderby . '<br>';
        echo '$order: ' . $order . '<br>';
        echo '$args[number]: ' . $args['number'] . '<br>';
		*/

        $lists = $wpdb->get_results( $wpdb->prepare( "SELECT {$fields} FROM " . $this->table_name . " {$where}ORDER BY {$orderby} {$order} LIMIT %d,%d;", absint( $args['offset'] ), absint( $args['number'] ) ) );

        return ( $format_results ) ? $this->format_list_results( $lists ) : $lists;

    }

    /**
     * Count the total number of lists in the database
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

        /*
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
        */

        $key   = 'aawp_db' . md5( '_lists_' . serialize( $args ) );
        $count = get_transient( $key );

        if ( $count === false ) {
            $count = $wpdb->get_var( "SELECT COUNT(ID) FROM " . $this->table_name . "{$where};" );
            set_transient( $key, $count, 10800 );
        }

        return $count;

    }

	/**
	 * Sets the last_changed cache key for lists.
	 *
	 * @access public
	 * @since  3.6
	 */
	public function set_last_changed() {
		wp_cache_set( 'last_changed', microtime(), $this->cache_group );
	}

	/**
	 * Retrieves the value of the last_changed cache key for lists.
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
     * Prepare list data
     *
     * @param $data
     *
     * @return mixed
     */
    private function prepare_list_data( $data ) {

        // Generate list key
        if ( ! isset( $data['list_key'] ) )
            $data['list_key'] = $this->generate_key( $data );

        // Convert product asins from array to string
        if ( isset( $data['product_asins'] ) && is_array( $data['product_asins'] ) ) {
            $data['product_asins'] = implode(',', $data['product_asins'] );
        }

        return $data;
    }

    /**
     * Generate list key based on arguments
     *
     * @param array $args
     *
     * @return bool|string
     */
    public function generate_key( $args = array() ) {

        if ( ! isset( $args['type'] ) )
            return false;

        $browse_node_id = ( isset( $args['browse_node_id'] ) ) ? floatval( $args['browse_node_id']  ) : 0;
        $keywords = ( isset( $args['keywords'] ) ) ? $args['keywords'] : '';
        $browse_node_search = ( isset( $args['browse_node_search'] ) && 1 == $args['browse_node_search'] ) ? 1 : 0;
        $items = ( isset( $args['query_items'] ) && is_numeric( $args['query_items'] ) ) ? intval( $args['query_items'] ) : 10;

        $key = md5( 'aawp_list_key_' . $args['type'] . $browse_node_id . $keywords . $browse_node_search . $items );

        return $key;
    }

    /**
     * Format list results before returning
     *
     * @param $lists
     *
     * @return array
     */
    private function format_list_results( $lists ) {

        if ( ! $lists )
            return $lists;

        if ( is_array( $lists ) ) {

            foreach ( $lists as $list_key => $list ) {

                $list = $this->format_list_data( $list );

                // Replace
                if ( is_array( $list ) )
                    $lists[$list_key] = $list;
            }
        }

        return $lists;
    }

    /**
     * Format list result before returning
     *
     * @param $list
     *
     * @return array
     */
    private function format_list_result( $list ) {
        return $this->format_list_data( $list );
    }

    /**
     * Format list data coming from database
     *
     * @param $list
     *
     * @return array
     */
    private function format_list_data( $list ) {

        if ( is_object( $list ) ) {

            // Convert object to array
            $list = get_object_vars( $list );

            // Convert product asins from comma separated string to array
            if ( isset( $list['product_asins'] ) )
                $list['product_asins'] = explode( ',', $list['product_asins'] );
        }

        return $list;
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

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

        $sql = "CREATE TABLE " . $this->table_name . " (
		id bigint(20) NOT NULL AUTO_INCREMENT,
		list_key varchar(32) NOT NULL,
		type varchar(30) NOT NULL,
		browse_node_id bigint(10) NOT NULL,
		keywords varchar(50) NOT NULL,
		browse_node_search tinyint(1) NOT NULL,
		product_asins mediumtext NOT NULL,
		items tinyint NOT NULL,
		date_created datetime NOT NULL,
		date_updated datetime NOT NULL,
		PRIMARY KEY  (id),
		UNIQUE KEY list_key (list_key),
		KEY type (type),
		KEY browse_node_id (browse_node_id),
		KEY keywords (keywords),
		KEY browse_node_search (browse_node_search),
		KEY items (items),
		KEY date_updated (date_updated)
		) CHARACTER SET utf8 COLLATE utf8_general_ci;";

        dbDelta($sql);

        if ( $this->table_exists($this->table_name ) ) {
            update_option($this->table_name . '_db_version', $this->version );
        }
    }

}
