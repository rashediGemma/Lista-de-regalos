<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'lista_regalos' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'a)/,:/6`g<:@?a$EQ)5=G~$JGoW+_qeY`17`fqwbR- N8n&g)Ohwk9*1>hR,#oy]' );
define( 'SECURE_AUTH_KEY',  '_%=1J;,Spj9id}bjxcUtN35QYd:FE9hFF;NyWhO3;DXE-2]=qr9P|^T~2(($<Rin' );
define( 'LOGGED_IN_KEY',    'Z<dT>Mif_YkQo@%n+<G${ y1H;2ibB(Vmf@*cEX9#u6,Zc}Mu[=rqsVwH(1|^p=v' );
define( 'NONCE_KEY',        'k&r$M<Dc/Y$w9+KS0]>!NPl ^JpA&r$,=hH/08Do6GbhjvVy1D#{[tNRmcY:0e`k' );
define( 'AUTH_SALT',        'eUMWQ+MLO,wnPoz&]2pWY+<c^hVc9~QXTP!p9@gF/H/[yNN]D*I2tipG`OA,/8SW' );
define( 'SECURE_AUTH_SALT', '=OnR37Cm{y0;LOT_vvZA0foRF  T|l$4G[w765!Z2ZGKOpNNja3ac10Hg!(ooC1s' );
define( 'LOGGED_IN_SALT',   'cNMkBrrbxcBq7klI:L:Yk9<q4%R<>WCe.(F<$FJpXne#3`u8Sj:Z1P.} C7f0pWu' );
define( 'NONCE_SALT',       '?$~oVx[9TV0rRYEg|L8|J=pss=Ov&LYT26:BjV+^1]{f|_Qp1m L7hNp~;4EiQnc' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'lr_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );
define('WP_DEBUG_LOG', true);
define( 'WP_DEBUG_DISPLAY', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
