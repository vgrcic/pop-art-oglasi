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
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'fHc-|bwZNrG3bCJ3XJKW91un-S1* K{,k,c]Fi7-i!W(Lk:@OK2=JSS@lND8|CqF' );
define( 'SECURE_AUTH_KEY',  'KyE@Ynh4z_TZ|RC,X9l@7=Zp]E;{bC +HcX<S!.wZ]@*Yw9QGU6Bk?juy=l?CD$ ' );
define( 'LOGGED_IN_KEY',    'jcO;s.y3Z|2B o]Q z)g;&7IVZkcf7/yOu7wciSG.^Ou`7{1AALIl?[ZS`(FRKlw' );
define( 'NONCE_KEY',        '4iQVKG>%&VYjE/6.* m2NQ*UNy;Q<]1]=?XL%Pq%`.229S(6VyK/|lA:{rucmI.X' );
define( 'AUTH_SALT',        '+$HFw!H3Bp5o &+)x]F5|~1B{2vG<9!;OSS$(w&*02l|h8+$BSsMP%+#wwWl_3N)' );
define( 'SECURE_AUTH_SALT', '>B4_lg$eg1;!Qy@lq.a&#rLXW2;UP/}3@IZTe_lP2EgnWdld_)c(qTM._o*DJ^A2' );
define( 'LOGGED_IN_SALT',   '181,&zMU$C%rGei[##n+(BO4hmzK4Nn4 |}Ajhegb5LgeX`&A1UKn^eO~c(~_|o:' );
define( 'NONCE_SALT',       'DLW()H[rrf0RGGc]hy&Eb&z;wF2RZg$A2cQG.`dF@-`zP[7uyEg$Pb@^A{fbsP$k' );

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
