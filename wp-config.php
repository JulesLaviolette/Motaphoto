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
define( 'DB_NAME', 'motaphoto' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'U:pX=(a&O=+<Ef.0LAg`Q S@cT?H2v:pL7 1Vz,M_+JaKpxE.+^_B[qb J_mnw1F' );
define( 'SECURE_AUTH_KEY',  'O}4B=$N>pm3UD<WSx-}l{B%g>Q+N95`>~?LaA~Ys.9b-`s15CjryY5CGc1C4|LrC' );
define( 'LOGGED_IN_KEY',    'zr1X+3oNRm_WMm-odXt89hlMIHd}x&t&v06=wb&%mIiY(HPC=ziF)%M,~+sW#_;|' );
define( 'NONCE_KEY',        '0<%*zh=cdZ3>t>gxm<U#tu0o[JV]$T^*U[N|SBFfusFl!vdHO.gm8to|x:/KYBnp' );
define( 'AUTH_SALT',        '}*_K/`{G$&:&BfW0^ix&U|rUhdI[`+Fj[&REickeV$|lH~mrp&1,paq]677L-@~%' );
define( 'SECURE_AUTH_SALT', ')/ +q>WbHIj8[x]=X$Eh@nN`qZvB.UONuT{pV|<Hl:@t,!4x*0cej*kq5sQYGi,{' );
define( 'LOGGED_IN_SALT',   'Yz+PLfTV6$gWOXGGFX}dY pjZqoxR!n.58nP&6k5Cj!O03@)22]|DOQIR<<n)%i(' );
define( 'NONCE_SALT',       'w`WJ^Kyhu=VeII6.<%[mh#iRn>+kzqI=B)w-BlOMgrl)mM/U_cK}H~9^F~D+nx){' );

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
