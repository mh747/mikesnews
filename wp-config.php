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
define('DB_NAME', 'mikes_news');

/** MySQL database username */
define('DB_USER', 'wordpress');

/** MySQL database password */
define('DB_PASSWORD', 'wordpress');

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
define('AUTH_KEY',         '?@T!]>s+o1[@g=_fC1GdCRoA(?R4DotcdrU9:]XE$A^3#SV?aO(h_B?v%+!tsL$d');
define('SECURE_AUTH_KEY',  'nV3?ef85YLAx6<d_EP5TbJ6W<TPlacBx?/C+8-M;x9VcQuv==DB:4k=M|F]O+t/U');
define('LOGGED_IN_KEY',    '9H}+klYZraNYcY*TjIg<E&$eNLWP*;$2>]A1|gY:<`T{07Xx$Bk)Neh9nQ0|$?{~');
define('NONCE_KEY',        '&(FxMO$cC5iU?lpg|jrx|KI!I CD<j_3?th.!-E~0etW>:-(%iVSYQA-ukHiS {c');
define('AUTH_SALT',        '}]-.+|.1l5^A>DAPUL*6zCOw;on)Ti^s)lyRtoY*Zz,5gKo1K/4#YpJevpTSss~d');
define('SECURE_AUTH_SALT', 'wZ ~gC?=%_Z]N,fR;5S!M{Xyv@W{sU.BDwAdG+Rc[=$6H?xY+|XpB^hC6Y/v92q>');
define('LOGGED_IN_SALT',   'JqMj_++lo3N~]FO/|e$!S0p+6XRSf-U7;J6*0L2+SfX?kc:fx{,}@^}V)Cd#V=f5');
define('NONCE_SALT',       '3Z-E,xa!vuUD7-9@hwD|3{~O-X:oz2BZq|+{GM.rU>NGiPpK/Lh#.);Kv:||pRC]');

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

