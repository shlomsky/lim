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
define('DB_NAME', 'lim');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'Machka84');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '2= wPp73pzS7r_Zh. #n;Nx<2DkI%FUtkErrP-2@2%<eY|-@1um+*y~(0(.qY;nf');
define('SECURE_AUTH_KEY',  'JJh3i)>k+-`+QZc`zLuNWJ!Jak<%]]V|KAd5 ssC@1V+AQQ?dR^8G 3nSA5,Zcu.');
define('LOGGED_IN_KEY',    'g,tg=S=I*rRD=UG%88_jW+ 7?T]ouEUn)%W+HX~*G8f+Xt6.4`Twjr+@9HnwCDKA');
define('NONCE_KEY',        'XlMZ/QiM`NG^l(L<%[Oc@zpvc|MJ-5NHN>fWQ95;.n9 Hs)4)zhHPGxb/Xr|:0vE');
define('AUTH_SALT',        '@^<b?lfL0N*]j,=U9rHX4&Y.C3]-Y;xAWC1.YUBY}tzeTKIZHMppoS@?j?NFpO|H');
define('SECURE_AUTH_SALT', '(]1igW{rAsFxINXoZ0Y^<V)jg,9uG;pvcbO-Uk0+[6-ia@JVzk=tl`!7xJr-|KKe');
define('LOGGED_IN_SALT',   '9[juyzjZgsB!D6|.w5=TrIV#NKyo$OOJU~-w6@RC5VluS( ,wFr|X0i>]TG0mOn*');
define('NONCE_SALT',       'YO0:a%Nz-=#awVD+G7u< pmN[,(x..5MJ>E#br_Q(_WQ~4Y)s<W+8X=6HWPkI6<C');

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
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', '');

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
