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
define( 'DB_NAME', 'wp_sample' );

/** Database username */
define( 'DB_USER', 'homestead' );

/** Database password */
define( 'DB_PASSWORD', 'secret' );

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
define( 'AUTH_KEY',         '0a`ss5VJA{{he!@>&CDNZaxg`Hp@Ep]h`iGDc=v(In?Wgb%7lX8X4 *!GU%0SH(Y' );
define( 'SECURE_AUTH_KEY',  'i |ZFLlZpe)>T8ihP!!WR$mL|INKB?i&L{xPJL0VP6RKORmd^d>j#h*NxqZ >Aq8' );
define( 'LOGGED_IN_KEY',    'hjPh= LHdg6YUmM~ wjrQ:Qvxo@mm!>D5Q`Y_zBoBWPuFvSd`r!84J>0@(~)wHTK' );
define( 'NONCE_KEY',        'veV.%hG/{Kt_TD]aW)-0*bxm(<FM% y(_{W;I.`DZH|^sSPq}YIQQdlg^+8-njM(' );
define( 'AUTH_SALT',        'EbZ8B=1H;^aIJ2-kEJ6xPn7J5sMt6d[l3<O<2e=H2)L-4A5URQF26R.%$sOj,S[+' );
define( 'SECURE_AUTH_SALT', '@5v@j;f+fLLwZZ5W(6dn@g=b_X0_C8Y8T! hF;B|q^pnW{fl0E!n2qNHWL.R5,&<' );
define( 'LOGGED_IN_SALT',   't~pAr#-iIsx4;5)M8]:d.WgQ1Ap+e~mA}LqT|6b#5k1@OHOFeQTzeo,oiU!u*[kf' );
define( 'NONCE_SALT',       'p_&,B-pS-Ua@z@CPo(kK(~F*mjC[z.nEZYZ|`%]>%Wy&/#p#)WJ|+D}j><q+0G8<' );

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
