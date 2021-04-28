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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root123' );

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
define( 'AUTH_KEY',         'x XTZQ/?f|lW(^8-f=ZmT^#rb~PG*th WjPWUI =63Lb!Up+@--k;OXh.MNdNj)9' );
define( 'SECURE_AUTH_KEY',  '>>^FeNgpg}T4d/`SWQh-ld>+3?16F(YH!wZB$`mrO>#b<hhYG1vkwtys2X^30rZQ' );
define( 'LOGGED_IN_KEY',    '*6[h+#K^uxg<2kMm%x:g=H%C[IeP0Fl}I0LRdlPQn-8>a=SsJ;O^3i&lL#$gz37t' );
define( 'NONCE_KEY',        '1^rdxh,~5|EMI]3gq@;p:vaHHai/55v,YV(kQ5YKj MRmxbmzk4rsjOE.Kw,}S1F' );
define( 'AUTH_SALT',        'GHG0JLy[mQ,a3|rc1DKnsS6=<Okypi;i0TX@MdZ0rc;2QQkp9+_=^Ep<) t!tsM7' );
define( 'SECURE_AUTH_SALT', 'q/<TyFl@]!@sPdxfKt=~4TpLl5Ay0o/nIf*U$?~/yj&&c^ePBi;4M{fTQ}l:]Vx1' );
define( 'LOGGED_IN_SALT',   'dyLGXy<:}LxpI6(>aMTQS}O<IJ< V9Q@-D?s1}FHpps5(9RcUeUL7l-d[|s5IL+r' );
define( 'NONCE_SALT',       '~:^Y=,R6frBF/4B2u+%%>;zQozz}l,XU[VId~)1Sd,si)r<}`$CAN=yh400Xo~rj' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
