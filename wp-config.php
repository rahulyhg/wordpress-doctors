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
define('DB_NAME', 'doctors_local');

/** MySQL database username */
define('DB_USER', 'china_doctors');

/** MySQL database password */
define('DB_PASSWORD', 'govnobol');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '=];Q~ofTF-tc be{~KIdd%i%=+P%oSoeQe1][GZpMe+*Wzi*.!|vn))F+%C*5bIS');
define('SECURE_AUTH_KEY',  'ClR}US]_ 0E47+f.q|fyCoY0K^Zg8imN9XFAp(yj_9[n%=sC31u}h_$Vp61l(k*+');
define('LOGGED_IN_KEY',    'zVpsP3+9&;)Uo;.iG2H9eW4&-1{ED 8>tdK&,g~yG&YD]geLH@:Y)]l}IK$~gbKj');
define('NONCE_KEY',        '`xU~=@WY*vWQ0QAjEKGr76EYI&<0?rX,Vj</BZ7[|6Vz[*]M w^X.]feH<SZ;~l,');
define('AUTH_SALT',        '(Ibi/$`R*%4ROCBXY#j@MN+?Pq)JE6rmLE27A;5:+buiFgDv3C% ((Hvai_p&sN#');
define('SECURE_AUTH_SALT', 'b=)Zh.jFcfh<.[/Q.6}YF>6N5rDRzU!xE:1jV[i|,TkL.[)*JD#}LQ9]fUMj]jOn');
define('LOGGED_IN_SALT',   '4k2Iag4v;YajSQUdpi=Z;5mQm5dpnR@:jG<jY^zK;E{~R?;W.l{PSe-4nbf:7&.q');
define('NONCE_SALT',       'ks5-=+E!5#lG .4c2M02gLOgYub17$Y?U}>r~rmk5*Rr@mDbD=3+k^oQFbV:L:0@');

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

/** for installing themes without FTP */
define('FS_METHOD','direct');
