<?php
$url = ( isset( $_GET['url'] ) ) ? $_GET['url'] : '';

if ( empty( $url ) )
	die( 'URL is missing.' );

$url = base64_decode( $url );

if ( function_exists('filter_var') && ! filter_var( $url, FILTER_VALIDATE_URL )  )
	die( 'URL format invalid.' );

if ( strpos( $url, 'images-amazon.com') === false )
	die( 'URL target invalid.' );

if ( strpos( $url, ".jpg" ) || strpos( $url, ".jpeg" ) ) {
	header( "Content-Type: image/jpeg" );

} elseif ( strpos( $url, ".png" ) ) {
	header( "Content-Type: image/png" );

} else {
	die( 'File type is not supported.' );
}

readfile( $url );