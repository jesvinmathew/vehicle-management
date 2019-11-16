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
define('DB_NAME', 'keralaon_db');

/** MySQL database username */
define('DB_USER', 'keralaon_user');

/** MySQL database password */
define('DB_PASSWORD', 'SC(#FWTGhOlZ');

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
define('AUTH_KEY',         'HG6d{`PHLvUXg3&&$,i4L,~jALF!oBPzmLcrWOi#@B70^s#Qc|)Yb#z.u|#Zh][?');
define('SECURE_AUTH_KEY',  'dx%]@:hWzuN40mDnfW`Sf,o?(EbxKXy8s~)422exJZ-&+eD36rL<lZp;GlN{}[Gn');
define('LOGGED_IN_KEY',    'yXH,Vn~xri`FmQE@H#$;O13XY3XiF%E*q!TCAD5`%Lrd)74`e- ?nx<jnaXU=Fx1');
define('NONCE_KEY',        '0sBjq]g65H0MUD;k#L#Bn42]W6jyO:|++_wW(qP1r3u!sCszp/z[zUl]mi]#9BiU');
define('AUTH_SALT',        'TS*50TK]/$VojT|pZ @V0F63}LEgHzz)@!5iwzE( Z]E$h_CvH4~@MHJIF^AitWO');
define('SECURE_AUTH_SALT', 'Mdorj>Scy/<VCln|$f6pXfX5~eIRH>CL^m<N ucCR@7-bu@jk#D{W+Z5Bp.z7UcB');
define('LOGGED_IN_SALT',   'J4>w/G$H9NcmfG5Co#H3!YWWxEi~,i4BTAYfMt1lE$4B>C0MOO9&JIDfRrI77_b|');
define('NONCE_SALT',       'E[U@:SL9wV}|s-]yt#Rl]}cv=-E`!jj-]KXAPSdqtIYBRP6zx@>:Bc.zhHk=1):T');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'onroad_wp';

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
