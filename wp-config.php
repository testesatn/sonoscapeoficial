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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u356072120_sonosca' );

/** Database username */
define( 'DB_USER', 'u356072120_ussono' );

/** Database password */
define( 'DB_PASSWORD', '$kENLjZ9[rV' );

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
define( 'AUTH_KEY',         '&VXbD~`$89^pfTmce>qk6JRAzh<K&nz|>2|K)=6Q-;D.LG.egSi,5l/jmB-@g/GC' );
define( 'SECURE_AUTH_KEY',  'EZ-Xv;~0F&t8$)dV9t#wC#`T;QgXvcWq&-[+,|wgO1TCt0x,<wm14Li?mM^Da?2q' );
define( 'LOGGED_IN_KEY',    '9n8)S-faxuQs,Zs0Zv[C_T2k@E[!|<f0!1tMsB(E EH6=iI#ukE1_I#pmf|}8$<d' );
define( 'NONCE_KEY',        'tPyDJ)|rg[j*+-]iYarwO{:)-A)*25@%n`L7dSz|Omi!#ura}@E~G7t1piQEq1$L' );
define( 'AUTH_SALT',        'ka(5[hZ]F<7}3}ac)Kr+v$7])=<kxoPBEueMgOPNB&{;@0ZrqY$.0+~(U`PFfI>3' );
define( 'SECURE_AUTH_SALT', 'X0mB%I*_>X);>,~s+5i{&N4b7jS?AS$Fquz[g6_rP-DZMM*]0in4?%T<UBBY1bJQ' );
define( 'LOGGED_IN_SALT',   'WkMguo#P@zwFz5k8P/[M.K%2)h&)|E*/c]IslU:U+_XuU2N!Crqbrw$n@ 5x!R(-' );
define( 'NONCE_SALT',       '-/@}VcVylCWMH`SiN9^cM6hDN;iK4]jY?kN&Ycb`=*}^TE)I=@Dhl+&7I/bRn)24' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
