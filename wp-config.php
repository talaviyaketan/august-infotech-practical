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
define( 'DB_NAME', 'august' );

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
define( 'AUTH_KEY',         '+P>(zX-oLsh4t+$b[WIK%h<ds2<K:mwpu+ti?ALFn+/kNn-IMm(P{V:aK}&d%R2H' );
define( 'SECURE_AUTH_KEY',  '1xXJ/GL|}HkX)0MDqXj->!7v*QY3pUZZXxsUvdjD#Z+}c{|6` .#I2$d]%-fjzHq' );
define( 'LOGGED_IN_KEY',    'C2,%-OBW/l3^||KB8:Nck<m66t&PNyq-f.vP8zc81~iyF&>`sNBFlZG*%Z)LiAt2' );
define( 'NONCE_KEY',        '0*`NK81Rt7lG +M[68:Z$7Ok`DCp*~E%U4hl^2|c?^0KPJFW[Cyofqb/B-]>BeYi' );
define( 'AUTH_SALT',        '!s/y^)Pz~AuP9,07j;/=i{YnVMXL=@Yo,RM5{/YN@[M~2Tg%B3,}H{MQQC>D+2_-' );
define( 'SECURE_AUTH_SALT', '/0A]Vrxtm1;.#ZqUtbDi[b(!E[LA6>un45lu;Ur.@ae7F{W+t]ow={?9VKws+eFx' );
define( 'LOGGED_IN_SALT',   '@)>[I(F}d*dgeT%NHWXh&3YtfQEs061IL1bEG{j@*V:^Nzpxe)cLGtS:3(z!7hze' );
define( 'NONCE_SALT',       'hHf6ItH~x$Z& sT +K@|,K).$oHMX#_Bon8s6ehy?6D=4QpOVmH%g$=Oa9?g]ok[' );

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
