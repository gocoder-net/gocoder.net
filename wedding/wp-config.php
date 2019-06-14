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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'gocoder');

/** MySQL database username */
define('DB_USER', 'gocoder');

/** MySQL database password */
define('DB_PASSWORD', 'wnslatkfkd1!');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Z6b1QB3F-M(@?lx+Cl-^lLU`n(;5kT0<F)(7b3G0- 7 W{Mbk;VQ<_=O^RPyfJrR');
define('SECURE_AUTH_KEY',  ';[}@~TBrX]tchV J(ivR3vF3QC5S{1GXem&3#:2xe5?Ubo 0JnBqO+>S1|:5>pzp');
define('LOGGED_IN_KEY',    'h^+)Q?(/UL}y|~b#xwelWZ]?2})f/6y_a5Y]s<SM=T+Bqqx;6:D&)Pykx2yTSZuv');
define('NONCE_KEY',        '{fq_[C?Be]I Sh49h+2Mq_4A1[epX$iUgS1w3y+UVtFMMn`aK$?L,,^OFNeT2M})');
define('AUTH_SALT',        '91_wBU;T^IutjpE=bZR6a-eeA_T{x231Iv9}cggg/sftHQF:RNIocaij[92.dB8x');
define('SECURE_AUTH_SALT', 'A7vx8?~,a8[jG?9d>kEr%/0dg`8y2ft{~`JZyn7VSW.v}&Nw;fapb?a`u0!&60{3');
define('LOGGED_IN_SALT',   'M/n;PaTs8-A<+L5XcS_rpT^HfC;x#zn77rh7.I&]9IEH-JJ3B2rq)n+l1 =*f, :');
define('NONCE_SALT',       'Sd~; j#]&J 01x0csN._:Nu#f<)NDD02?I17p9}^*9A*y7.0cSa%vk&6ymVe lky');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
