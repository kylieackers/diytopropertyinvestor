<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'diytopropertyinvestor');

/** MySQL database username */
define('DB_USER', 'aussiekylie');

/** MySQL database password */
define('DB_PASSWORD', 'hn4TqcUUbdAqXDwJMmgKE8sCkNGKxi');

/** MySQL hostname */
define('DB_HOST', 'diytopropertyinvestor.dev');

define('WP_HOME', 'http://diytopropertyinvestor.dev');
define('WP_SITEURL', 'http://diytopropertyinvestor.dev');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'v]<#Gbwm8||YFe#qZmfF>2#-1Be&Z;u|aT:nN:FXZeMm4Acn` |vjxR?mZr#qN>6');
define('SECURE_AUTH_KEY',  'bPT3f+I,+YNS|X|cwD7=3Q z^=<*%v`]6f::G3:8;|#Z3XyT-uT*+xhxAT#1-9>e');
define('LOGGED_IN_KEY',    '1-##Fe-h6!f1],+Mdkx?^Zf05+-TDuzxBT_Lx[IM7-6gR+Ev>[h+O`DU9R>35_<+');
define('NONCE_KEY',        '{yB/_zard&oFj2-+RF17SFO`FxN|/%cvE,4<P|Ll|+r)0fskX&qCa&2OR6pru%|o');
define('AUTH_SALT',        '-5Cl/5,Hv5.=l=}}BMHt,:|=&F8BtQ@)Np7wU5-zT(][KT2@V -dL>:TU~2)br-3');
define('SECURE_AUTH_SALT', '?v;gE9nSDg1z@h4 ~|-,:--z5?8,>gIf.W]cw)si4DlRcKi]Irx+EkQvfTO[p F>');
define('LOGGED_IN_SALT',   'a2];=$a/3=F2U~AQ-i`AUQ_Oitx|3mtuZ(mG*M9+Ccd@hC{/E|GTA=Px+PS/n)W:');
define('NONCE_SALT',       '<-_<qXzn scYOZ+%r<!?tcT|{9-h83<>U86M>SzLjz#%`O{$rFsH:~>Wp0Zjs k9');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
