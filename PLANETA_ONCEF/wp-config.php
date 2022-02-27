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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'planeta_oncef' );

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
define( 'AUTH_KEY',         'pwL3}=WDUgbnpf1>O* sS;Axg#[l^)RED<~m>3^P(|=IG,JwIfIxKBo.pFGB{3-j' );
define( 'SECURE_AUTH_KEY',  '6a+1>p+vg/Hq6yibBMU ASkYswsj&/}&x5w!rn)*yK=:3_07roXO .Brc>fjckc&' );
define( 'LOGGED_IN_KEY',    '<|LI$a]P:yKLva>[|^49&IpQdR& oP&Yli9u{m68zmS9n&Jp<a;unYU!le 7TBxr' );
define( 'NONCE_KEY',        '^[z;*ta!T<{>PY6~{wN{.3F^-6z1r`&NQe!|nFD{DTQ6qX8,ZR33CL.Q18-bI8/(' );
define( 'AUTH_SALT',        'hC92D44AmdH21#$CR*27Sc2II]Q&|Xgw_`mw2y}S],CC%t*#*vqWw}Y&:/mVEFZ:' );
define( 'SECURE_AUTH_SALT', 'N+FV9><=0%8UmdpZ4;{,Zs>@2x<3yO{I&w7w1a1gAvGtK:(#9_aOy:`02w;`nH g' );
define( 'LOGGED_IN_SALT',   'Yo/nl:ZU-XPpuYpr9x`Ym#3^`7{._;ee`MMx-35^@(N)3xh=i(JBD8V0}DYErQ@,' );
define( 'NONCE_SALT',       'LcN,p6?FkK`YfSN0|;I1u[`}w0aY(B+kKrclm[Mt5$i?L)ck/@XXHSLOEvhjG#*{' );

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
