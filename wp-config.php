<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'db_9shop' );

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
define( 'AUTH_KEY',         '- jZ?2g+3!%%_>l7xGX5M]Y2D30E--:_yOMsRp`xe-rt+Pqq=b@|{vbRMM}BkW<a' );
define( 'SECURE_AUTH_KEY',  '_*O43?3*uO$A0<SkA+z@Q%s3y03<h:.FslFQT.4 U^tYM8|AvYvO$GD-mce-/g)x' );
define( 'LOGGED_IN_KEY',    '!|-T6vdoRG6V-5M}!s]ago7;=JzYL9veN)h ]ARfM!Q0DQZaCnZ/iEFgeNs15m{u' );
define( 'NONCE_KEY',        'Iy@cZ-5[vY;Dq-I2)b@,mdZ1 @q3D/#V>Qvmpx4VeiUWO%%V<%>`b1SYr+GNN<3M' );
define( 'AUTH_SALT',        'HRfZISg6Q =*a2BM>_hTce?H^J)?J*U$=fG@{Dmvc#DJ:$}!KldGS{[rk}(6wxFx' );
define( 'SECURE_AUTH_SALT', '6U5u^)B_.AE*<sxpYXdh}:ITzh]W$ZFYNCm4.0<9)/kQ=ooezmy4[*xOW{_%I03W' );
define( 'LOGGED_IN_SALT',   'i.}!PRd)|-(8vy|N8h/_i$1ls[uV8FAJ<Ebxfb,0|Xl*T@Nk,zppS:P 6aY%0h?/' );
define( 'NONCE_SALT',       'GA(JI4@KTqq~iw1fTqG#hPAUvIQn@Kng=lgMo_rqYZpq(G$Ngr%k!~{>8.#[2aJM' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
