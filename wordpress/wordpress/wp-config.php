<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
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
define( 'DB_NAME', 'my_web_db' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'Q#-los@Rl(ZO-kqkFMKc<p??]8a<YUBH(k|II(b~G(sK7&,gW$7}(O96?i3hQDV.' );
define( 'SECURE_AUTH_KEY',  'v?~dC?`=%hQ:tu]/RYic$;~~GQWeg31lP}DpLneF1n)<< N(i&a:vS0${H{2pOpq' );
define( 'LOGGED_IN_KEY',    '?7,<z-TI%BI_[|}`6kCH@W;#!QNWrkl_[/|_Uk>ZzO.CS(9,+rh Gw.Su3$NR%|&' );
define( 'NONCE_KEY',        'L8?QBc!0;RFT^$Q(V6mcL[l}bTS]k4LJI#5,)vmL*suR/gG T:ZnJ-X,8G_+{?F>' );
define( 'AUTH_SALT',        '%?ZW-$mOGIJ`3bInlR;X!vF!i,(/bx;]<)cy1X9Qi29UsFUJNXM}9#P{<v0>]VVf' );
define( 'SECURE_AUTH_SALT', 'm@bwv]PUi7rocDC$6{9|3e#a(AIckXiHuxdDD(%pzg@JT2?A>ejdN!DW{#6UGdU}' );
define( 'LOGGED_IN_SALT',   'Fvy#@>sk>]@S)zfd[zL#tk5*/U<TJ4(lkb!H]fV#y8@D;$1B+Bi3>O~PP=cQyWdB' );
define( 'NONCE_SALT',       '4;)Q|hv#aaL`}I*gjVoVCy>WUO892aQ-z2=nJWK#rkhz]^MlUdF!Y?hxMm<D*_GL' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
