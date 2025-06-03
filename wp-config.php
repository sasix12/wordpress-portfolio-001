<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpressport01' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'H M4+|81Wnp|NChReZKODQPt`h:>cOx[] )eL,k%f&NgtRk&/X:c%?l,f_j>77V;' );
define( 'SECURE_AUTH_KEY',  'SdP2Ay76#/ibE0@Q=x[`peMsNKJs.kM-:.|oy2C[+S6N8CdRS<AXof<G+4R)JEH0' );
define( 'LOGGED_IN_KEY',    'vTU#[m~|:5!eY<)Z^6`.[b?$sO^=AEcvk(<E6?|IPA8w5WAJ+fbpYkm.rJ.X|NF(' );
define( 'NONCE_KEY',        'k/i3wF$WBab+4^7v](AN:$fLT+,q5k*yyLn54cnYSJH3IMnBt*G/6IeRUFLu.pUr' );
define( 'AUTH_SALT',        'DRyG/il>g?miM_L39h;7gP%s3un`fxt#,4g4e2ly+)ap&rGWPvA^y:&-p6hhhb8N' );
define( 'SECURE_AUTH_SALT', '/toTg8Dn>Ps*d~ROQ_y@K#ZIwEjAqfwk{}canFV1x:/KLOmok{]{BIzrG-JFa}e9' );
define( 'LOGGED_IN_SALT',   '_Yyp?kQ|D2aQ9)U%^AGib??rCc-[/[CSSEjzK<`Iu$Tr9aYSBlJ**Z`pnxtHcI2t' );
define( 'NONCE_SALT',       ':k9[UCKb}av$y2~)O:or$z;bsBd&I06q4*#::-CV8O.jU^r(ElQPCB3?s[`JB @4' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
