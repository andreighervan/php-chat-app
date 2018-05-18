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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'b13_18948997_fashionagv');

/** MySQL database username */
define('DB_USER', 'b13_18948997');

/** MySQL database password */
define('DB_PASSWORD', '123QQmilan');

/** MySQL hostname */
define('DB_HOST', 'sql201.byethost13.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '-Uov`EJ>bVvI2E^&kN8kK1T8g![iE3FfnPm*]_YE0Av1B|BO(^Y^Yn1|C<f]%JjV');
define('SECURE_AUTH_KEY',  '<z(}!xLfV;k=Zl$~/?e&T=q?NBJ.azj[#M:Fcfk!_mk$DXugK8OQ^8D8I-i1vi(?');
define('LOGGED_IN_KEY',    'LI[UWZ+ -T!tP!Rz#vsc:r45G<3wFZ`0}OI}n2J0H9dy({!e;Q&UBN~#:N{R409Z');
define('NONCE_KEY',        'V-B@Te_~54p#Q1Ej1*n/B_)NdI o?x_/XBQP~=L~B+CaQQ,)kA!_e.]]3BP<L3CC');
define('AUTH_SALT',        'o%,Z*}C>-P7g$2Eyv0pQ`Q$^@Edph;%e/D*ppP8/+r/^wuHyxbD2o~o]t?z1C0][');
define('SECURE_AUTH_SALT', '{Zo1x:C$|LlNMfojNenA4dUI%MkV?c*t:pF5BC[Vs@3XNEF6ca(*VIuO^H-Qgz&;');
define('LOGGED_IN_SALT',   '??WDIdd2Lue,.(Uqb>^oiu8%MY 0r[Zi8@MY `GOE_oQ YN_|#7G&>>0b*=z[=kl');
define('NONCE_SALT',       'UHUl~a2H85eh}*RMzAN7]DB0U@7TF`P$;vI(xW/cawM1}Dp6-ku9*P3|5>X%09+}');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
