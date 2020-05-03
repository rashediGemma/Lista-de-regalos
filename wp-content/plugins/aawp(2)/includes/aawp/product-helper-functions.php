<?php
/**
 * Product helper functions
 *
 * @package     AAWP
 * @since       3.4.0
 */

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

/**
 * Generate product description out of given attributes
 *
 * @param $attributes
 * @param array $args
 *
 * @return array|null|string
 */
function aawp_generate_product_description( $attributes, $args = array() ) {

    if ( empty( $attributes ) )
        return null;

    $defaults = array(
        'html' => true
    );

    $args = wp_parse_args( $args, $defaults );

    // Handle options
    $options = aawp_get_options();

    if ( empty( $options['api']['country'] ) )
        return null;

    $store = $options['api']['country'];

    $args['description_items'] = ( isset ( $options['output']['description_items'] ) && $options['output']['description_items'] != '' ) ? intval( $options['output']['description_items'] ) : 5;
    $args['description_html'] = ( ! isset ( $options['output']['description_html'] ) || $options['output']['description_html'] == '1' ) ? 1 : 0;
    $args['description_length'] = ( !empty ( $options['output']['description_length'] ) ) ? intval( $options['output']['description_length'] ) : 200;
    $args['description_length_unlimited'] = ( !empty ( $options['output']['description_length'] ) && !isset ( $options['output']['description_length_unlimited'] ) ) ? 0 : 1;

    // Handle atts
    global $aawp_shortcode_atts;

    if ( ! empty( $aawp_shortcode_atts['description_items'] ) )
        $args['description_items'] = intval( $aawp_shortcode_atts['description_items'] );

    // Build description
    $description = '';
    $description_items = array();

    // Features available
    if ( isset( $attributes['Feature'] ) ) {
        if ( is_array( $attributes['Feature'] ) && sizeof( $attributes['Feature'] ) > 0 ) {
            foreach ( $attributes['Feature'] as $feature ) {
                if ( ! empty( $feature ) ) {
                    $description_items[] = aawp_cleanup_product_attributes_feature( $feature );
                }
            }
        } elseif ( ! empty( $attributes['Feature'] ) ) {
            $description_items[] = aawp_cleanup_product_attributes_feature( $attributes['Feature'] );
        }
    }

    // Related to product groups
    if ( isset( $attributes['ProductTypeName'] ) ) {
        $description_items = aawp_generate_product_type_specific_description( $description_items, $attributes, $attributes['ProductTypeName'] );
    }

    if ( ! empty( $description_items ) ) {

        if ( $args['html'] ) {

            if ( is_array( $description_items ) ) {

                $description = '<ul>';

                for( $i = 0; $i < $args['description_items'] && $i < count( $description_items ); $i++) {

                    $text = ( $args['description_html'] == '0' ) ? strip_tags( $description_items[$i]) : $description_items[$i];

                    if ( !empty( $aawp_shortcode_atts['description_length'] ) ) {
                        $text = aawp_truncate_string( $text, $aawp_shortcode_atts['description_length'] );

                    } elseif ( $args['description_length_unlimited'] != 1 ) {
                        if ( !empty($args['description_length']) && strlen($text) > $args['description_length'] )
                            $text = aawp_truncate_string( $text, $args['description_length'] );
                    }

                    $description .= '<li>' . $text . '</li>';
                }

                $description .= '</ul>';

            } elseif ( is_string( $description_items ) ) {
                $text = ( $args['description_html'] == '0' ) ? strip_tags( $description_items ) : $description_items;

                $description = '<p>' . $text . '</p>';
            }

        } else {
            $description = $description_items;
        }
    }

    return $description;
}

/**
 * Cleanup attributes feature
 *
 * @param $feature
 *
 * @return mixed
 */
function aawp_cleanup_product_attributes_feature( $feature ) {

	$feature = ltrim( $feature, "***" );

	return $feature;
}

/**
 * Generate product type specific description out of given attributes
 *
 * @param $items
 * @param $attributes
 * @param $type
 * @param bool $teaser
 *
 * @return array
 */
function aawp_generate_product_type_specific_description( $items, $attributes, $type, $teaser = false ) {

    $store = aawp_get_amazon_store();

    //var_dump( $type );
    //aawp_debug( $attributes );

    // Books
    if ( 'ABIS_BOOK' === $type ) {

        if ( isset( $attributes['Author'] ) )
            $items[] = ( is_array($attributes['Author'] ) ) ? implode(', ', $attributes['Author'] ) : $attributes['Author'];

        if ( isset( $attributes['Publisher'] ) )
            $items[] = sprintf( esc_html__('Publisher: %s', 'aawp'), $attributes['Publisher'] );

        if ( isset( $attributes['Edition'] ) && isset( $attributes['PublicationDate'] ) ) {
            $edition_num = preg_replace("/[^0-9]/", "", $attributes['Edition'] );
            $items[] = sprintf( esc_html__('Edition no. %d', 'aawp'), $edition_num ) . ' (' . aawp_date( $attributes['PublicationDate'], $store ) . ')';
        }

        if ( isset( $attributes['Binding'] ) && isset( $attributes['NumberOfPages'] ) )
            $items[] = $attributes['Binding'] . ': ' . sprintf( esc_html__('%d pages', 'aawp'), $attributes['NumberOfPages'] );
    }

    // DVD, BluRay, Prime Video
    if (  'ABIS_DVD' === $type || 'DOWNLOADABLE_MOVIE' === $type || 'DOWNLOADABLE_TV_SEASON' === $type ) {

        if ( isset( $attributes['Studio'] ) && isset( $attributes['ReleaseDate'] ) ) {
            $items[] = $attributes['Studio'] . ' (' . aawp_date( $attributes['ReleaseDate'], $store ) . ')';

        } elseif ( isset( $attributes['Studio'] ) && isset( $attributes['PublicationDate'] ) ) {
            $items[] = $attributes['Studio'] . ' (' . aawp_date( $attributes['PublicationDate'], $store ) . ')';
        }

        if ( isset( $attributes['Binding'] ) && isset( $attributes['AudienceRating'] ) )
            $items[] = $attributes['Binding'] . ', ' . $attributes['AudienceRating'];

        if ( isset( $attributes['RunningTime'] ) && is_numeric( $attributes['RunningTime'] ) )
            $items[] = sprintf( esc_html__('Running time: %d minutes', 'aawp'), $attributes['RunningTime'] );

        if ( isset( $attributes['Actor'] ) )
            $items[] = ( is_array( $attributes['Actor'] ) ) ? implode(', ', $attributes['Actor'] ) : $attributes['Actor'];

        if ( isset( $attributes['Languages']['Language'] ) && is_array( $attributes['Languages']['Language'] ) && sizeof( $attributes['Languages']['Language'] ) != 0 && ! $teaser )
            $items[] = aawp_get_description_attribute_languages( $attributes['Languages']['Language'] );
    }

    // Music
    if ( 'ABIS_MUSIC' === $type ) {

        if ( isset( $attributes['Artist'] ) && is_array( $attributes['Artist'] ) && isset( $attributes['Title'] ) ) {
            $items[] = implode( ", ", $attributes['Artist'] );
            $items[] = $attributes['Title'];

        } elseif ( isset( $attributes['Artist'] ) && is_array( $attributes['Artist'] ) ) {
            $items[] = implode( ", ", $attributes['Artist'] );

        } elseif ( isset( $attributes['Artist'] ) && isset( $attributes['Title'] ) ) {
            $items[] = $attributes['Artist'] . ', ' . $attributes['Title'];

        } elseif ( isset( $attributes['Artist'] ) ) {
            $items[] = $attributes['Artist'];

        } elseif ( isset( $attributes['Title'] ) ) {
            $items[] = $attributes['Title'];
        }

        if ( isset( $attributes['Label'] ) )
            $items[] = $attributes['Label'];

        if ( isset( $attributes['Binding'] ) )
            $items[] = $attributes['Binding'];
    }

    // Downloadable Music
    if ( 'DOWNLOADABLE_MUSIC_TRACK' === $type ) {

	    if ( isset( $attributes['Creator'] ) )
		    $items[] = $attributes['Creator'];

	    if ( isset( $attributes['Studio'] ) )
		    $items[] = $attributes['Studio'];

	    if ( isset( $attributes['Binding'] ) )
		    $items[] = $attributes['Binding'];

	    if ( isset( $attributes['PublicationDate'] ) )
		    $items[] = sprintf( esc_html__('Released on %s', 'aawp'), aawp_date( $attributes['PublicationDate'], $store ) );
    }

    // Toys & Games
    if ( 'TOYS_AND_GAMES' === $type ) {

        if ( isset( $attributes['Binding'] ) )
            $items[] = $attributes['Binding'];

        if ( isset( $attributes['Publisher'] ) )
            $items[] = $attributes['Publisher'];
    }

    // Toys & Games
    if ( $type == 'SHOES' ) {

        if ( isset( $attributes['Brand'] ) )
            $items[] = $attributes['Brand'];

        if ( isset( $attributes['Size'] ) )
            $items[] = $attributes['Size'];

        if ( isset( $attributes['Color'] ) )
            $items[] = $attributes['Color'];
    }

    // Fallback if nothing matches
    if ( sizeof( $items ) == 0 ) {

        if ( isset( $attributes['Author'] ) )
            $items[] = ( is_array( $attributes['Author'] ) ) ? implode(', ', $attributes['Author'] ) : $attributes['Author'];

        if ( isset( $attributes['Publisher'] ) )
            $items[] = $attributes['Publisher'];

        if ( isset( $attributes['Binding'] ) )
            $items[] = $attributes['Binding'];

        if ( isset( $attributes['Edition'] ) && isset( $attributes['PublicationDate'] ) ) {
            $edition_num = preg_replace("/[^0-9]/", "", $attributes['Edition'] );
            $items[] = sprintf( esc_html__('Edition no. %d', 'aawp'), $edition_num ) . ' (' . aawp_date( $attributes['PublicationDate'], $store ) . ')';
        }

        if ( isset( $attributes['Languages']['Language'] ) && is_array( $attributes['Languages']['Language'] ) && sizeof( $attributes['Languages']['Language'] ) != 0 && ! $teaser)
            $items[] = aawp_get_description_attribute_languages( $attributes['Languages']['Language'] );
    }

    //aawp_debug( $items );

    // Remove duplicates
    $items = array_values( array_unique( $items ) );

    return $items;
}

/**
 * Get description attribute languages
 *
 * @param $data
 *
 * @return string
 */
function aawp_get_description_attribute_languages($data) {
    $languages = '';

    if ( isset($data['Name'] ) ) {
        // only one language
        return $data['Name'];
    } else {
        // more than one language available
        foreach ($data as $language) {

            if (isset( $language['Name'] ) && strpos( $languages, $language['Name'] ) === false) {
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

/**
 * Prepare product data coming directly from API
 *
 * @param $data
 * @return mixed
 */
function aawp_prepare_product_data_from_api( $data ) {

    // Pricing
    $data = aawp_prepare_product_data_pricing( $data );

    // Images
    $data['image_ids'] = ( isset( $data['images'] ) ) ? aawp_get_product_image_ids_from_images( $data['images'], false ) : array();

    // Timestamps
    $data['date_created'] = ( isset( $data['timestamp'] ) ) ? date( 'Y-m-d H:i:s', $data['timestamp'] ) : null;
    $data['date_updated'] = $data['date_created'];

    return $data;
}

/**
 * Prepare product data pricing
 *
 * Info: Must be accessible from outside our db class as well
 *
 * @param $data
 *
 * @return mixed
 */
function aawp_prepare_product_data_pricing( $data ) {

    if ( isset( $data['pricing']['prime'] ) && true == $data['pricing']['prime'] )
        $data['prime'] = 1;

    if ( ! empty( $data['pricing']['availability'] ) )
        $data['availability'] = $data['pricing']['availability'];

    if ( ! empty( $data['pricing']['display']['normalized'] ) )
        $data['price'] = $data['pricing']['display']['normalized'];

    if ( ! empty( $data['pricing']['list']['normalized'] ) )
        $data['list_price'] = $data['pricing']['list']['normalized'];

    if ( ! empty( $data['pricing']['amount_saved']['normalized'] ) )
        $data['price_saving'] = $data['pricing']['amount_saved']['normalized'];

    if ( ! empty( $data['pricing']['used']['normalized'] ) )
        $data['used_price'] = $data['pricing']['used']['normalized'];

    if ( ! empty( $data['pricing']['variations']['lowest_price']['normalized'] ) )
        $data['variation_price'] = $data['pricing']['variations']['lowest_price']['normalized'];

    return $data;
}

/**
 * Get product image ids from images
 *
 * @param $images
 * @param bool $return_string
 * @return string/array
 */
function aawp_get_product_image_ids_from_images( $images, $return_string = false ) {

    $image_ids = array();

    if ( is_array( $images ) ) {

        foreach ( $images as $image ) {

            if ( ! isset( $image['large'] ) )
                continue;

            /*
            $image_str_drops = aawp_get_amazon_image_sources();
            $image_str_drops[] = '.jpg';

            $image_id = str_replace( $image_str_drops,'', $image['large'] );

            if ( strpos( $image_id, 'https://') !== false ) // CDN not in our list, we don't store image urls, so skip
                continue;
            */

            $url = str_replace( '.jpg','', $image['large'] );
            $image_id = preg_replace("/(.*)\/images\/I\//", "", $url );

            if ( ! empty( $image_id ) && ! in_array( $image_id, $image_ids ) )
                $image_ids[] = $image_id;
        }
    }

    return ( $return_string ) ? implode( ',', $image_ids ) : $image_ids;
}

/**
 * Build product image url based on image, size and api country
 *
 * @param string $image_id
 * @param string $size
 * @return null|string
 */
function aawp_build_product_image_url( $image_id, $size = 'medium' ) {

    if ( empty( $image_id ) )
        return null;

    $country = aawp_get_amazon_store();

    if ( empty( $country ) )
        return null;

    if ( 'cn' === $country ) {
        $endpoint = 'cn';
    } elseif ( 'co.jp' === $country ) {
        $endpoint = 'fe';
    } elseif ( in_array( $country, aawp_get_amazon_euro_countries() ) ) {
        $endpoint = 'eu';
    } else {
        $endpoint = 'na';
    }

    $image_sources = aawp_get_amazon_image_sources();

    if ( ! isset( $image_sources[$endpoint] ) )
        return null;

    $image_url = $image_sources[$endpoint] . $image_id;

    $is_png = ( strpos( $image_url, '.png' ) !== false ) ? true : false;

    if ( $is_png )
        $image_url = str_replace('.png', '', $image_url );

    if ( 'small' === $size ) {
        $image_url .= '._SL75_';
    } elseif ( 'medium' === $size ) {
        $image_url .= '._SL160_';
    }

    $image_url .= ( $is_png ) ? '.png' : '.jpg';

    return $image_url;
}

/**
 * Get product image url served locally on our site
 *
 * @param $image_id
 * @param string $size
 *
 * @return string
 */
function aawp_build_product_local_image_url( $image_id, $size = 'medium' ) {

	$file_name = aawp_cleanup_product_image_id( $image_id );

	if ( 'small' === $size ) {
		$file_name .= '._SL75_';
	} elseif ( 'medium' === $size ) {
		$file_name .= '._SL160_';
	}

	$file_name .= '.jpg';

	if ( aawp_product_local_image_exists( $file_name ) )
		return aawp_get_product_local_image_url( $file_name );

	$remote_image_url = aawp_build_product_image_url( $image_id, $size );

	$downloaded_image = aawp_download_product_image( $file_name, $remote_image_url );

	return ( is_array( $downloaded_image ) && isset( $downloaded_image['url'] ) ) ? $downloaded_image['url'] : '';
}

/**
 * Check whether the usage of product local images is enabled or not
 *
 * @return bool
 */
function aawp_is_product_local_images_enabled() {
	return apply_filters( 'aawp_product_local_images_enabled', false );
}

/**
 * Check whether product images cache is activated or not
 *
 * @return bool
 */
function aawp_is_product_local_images_activated() {

	if ( ! aawp_is_product_local_images_enabled() )
		return false;

	$local_images = aawp_get_option( 'local_images', 'general' );

	return ( '1' == $local_images ) ? true : false;
}

/**
 * @return string
 */
function aawp_get_product_local_images_dirname() {
	return 'aawp/products';
}

/**
 * Get uploads course images path
 *
 * @return null|string
 */
function aawp_get_product_local_images_path() {

	$upload_dir = wp_upload_dir();

	if ( $upload_dir['error'] !== false )
		return null;

	$path = trailingslashit( $upload_dir['basedir'] . '/' . aawp_get_product_local_images_dirname() );

	return $path;
}

/**
 * Check whether downloaded image already exists or not
 *
 * @param $file_name
 *
 * @return bool|null
 */
function aawp_product_local_image_exists( $file_name ) {

	$uploads_path = aawp_get_product_local_images_path();

	$file_path = $uploads_path . $file_name;

	return ( file_exists( $file_path ) ) ? true : false;
}

/**
 * Get uploads product images url
 *
 * @return null|string
 */
function aawp_get_product_local_images_url() {

	$upload_dir = wp_upload_dir();

	if ( $upload_dir['error'] !== false )
		return null;

	$path = trailingslashit( $upload_dir['baseurl'] . '/' . aawp_get_product_local_images_dirname() );

	return $path;
}

/**
 * Get uploads product image url
 *
 * @param $file_name
 *
 * @return null|string
 */
function aawp_get_product_local_image_url( $file_name ) {

	$uploads_url = aawp_get_product_local_images_url();

	$file_url = $uploads_url . $file_name;

	return $file_url;
}

/**
 * Download course image
 *
 * @param $file_name
 * @param $file_url
 *
 * @return array|null
 */
function aawp_download_product_image( $file_name, $file_url ) {

	// Download image
	$request = wp_remote_get( $file_url );

	$file = wp_remote_retrieve_body( $request );

	if ( ! $file )
		return null;

	// Upload image
	$file_extension = substr( $file_url , strrpos( $file_url, '.' ) + 1 );

	if ( ! in_array( $file_extension, array( 'jpg', 'jpeg', 'png' ) ) )
		return array( 'error' => __( 'Sorry, this file type is not permitted for security reasons.', 'aawp' ) );

	$file_upload_dir = aawp_get_product_local_images_path();

	$new_file = $file_upload_dir . $file_name;

	// Are we able to create the upload folder?
	if ( ! wp_mkdir_p( $file_upload_dir ) ) {
		return array( 'error' => sprintf(
		/* translators: %s: directory path */
			__( 'Unable to create directory %s. Is its parent directory writable by the server?', 'aawp' ),
			$file_upload_dir
		) );
	}

	// Are we able to create the file?
	$ifp = @ fopen( $new_file, 'wb' );

	if ( ! $ifp )
		return array( 'error' => sprintf( __( 'Could not write file %s', 'aawp' ), $new_file ) );

	// Finally write the file
	@fwrite( $ifp, $file );
	fclose( $ifp );
	clearstatcache();

	// Set correct file permissions
	$stat = @ stat( dirname( $new_file ) );
	$perms = $stat['mode'] & 0007777;
	$perms = $perms & 0000666;
	@ chmod( $new_file, $perms );
	clearstatcache();

	// Prepare uploaded file
	$file_upload_url = aawp_get_product_local_images_url();

	$file_url = $file_upload_url . $file_name;

	$upload = array(
		'path' => $new_file,
		'url' => $file_url,
		'type' => $file_extension,
		'error' => false
	);

	return $upload;
}

/**
 * Cleanup product image id
 *
 * @param $image_id
 *
 * @return mixed
 */
function aawp_cleanup_product_image_id( $image_id ) {

	$image_id = str_replace('%2B', '+', $image_id );

	return $image_id;
}