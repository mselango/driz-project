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
define('DB_NAME', 'driz');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'kq8|[dRrR6U@:+#K|c#{nF/Zp;Im,$;eEFx$qo<Iw0{+#hUATtLR%Fg|<j=}qT~V');
define('SECURE_AUTH_KEY',  'aM|-Q|mtOM_^umwAhpn#Z^l3eBjjSWI8B9d*$.b,a17;R(fzl):/:nRo?-]%:l6l');
define('LOGGED_IN_KEY',    '?pip{G_-T*3}Fua0oJf!IdDVQ7~9,$|+jy+0xMUfyf]9`D8m=UytX A/-V]-ggBb');
define('NONCE_KEY',        'Jvh88jdvH6PtXaKt`2+7=[S>aBRmO$zht(:rl(D9?U9:YMNam>{?+Dm]Si^xUr4k');
define('AUTH_SALT',        '}*+ukuPH[A#k|dH[/Z{jRrT=n9M4z#}Y!A.%O<9cqK^V/ T/n,4+Ag=6* &*wlDN');
define('SECURE_AUTH_SALT', 'n*r6?XW+Ys^h=ZkF`h#Ns)cT93q?LS4+$BC}AsBb A3N(u_3^#t:,7ZbPEl[%LFj');
define('LOGGED_IN_SALT',   'G}Aha2Mju<-q$Po% rG^Ul}: *4) Fl^n&.p6Jg)[GK;fFi;VB<nXBV#^~6ePh61');
define('NONCE_SALT',       '{+c!:X6h}vw)p-NXH]=,Z0dbRlb6W.F{4GK9-8Fvj^Kx>[ 1)wnrxx+[BG jA+?g');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'driz_';

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
