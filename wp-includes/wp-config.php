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
define('DB_NAME', 'apl_webb');

/** MySQL database username */
define('DB_USER', 'apl_webb');

/** MySQL database password */
define('DB_PASSWORD', 'T8wNq+s3$x?m#wL5');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('FS_METHOD', 'direct');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '[o3!c!T(,kG@e7X`h%4m+XA(Uo!>Dt:ly@=3O9hk1etV@WMyVO]*:@wqi+{*)cyP');
define('SECURE_AUTH_KEY',  ']q=alDMYc<S)V+%`hN[D2w|@u]Fm1HH;rF=@-@cc)s%7A+D$p(_+l+c?*}ska7wv');
define('LOGGED_IN_KEY',    'MyH7!=I|}-XpX D_BUngc ^o1O#1%V_-ocz$bhC roP<nxu!q/$QUk]OHy_yBXt<');
define('NONCE_KEY',        '-mdn-~~Z5Lwu9X#$O]|4zQ`pU`og,sd7m$@]H%:WMHv>|We3t7kTFcD|LUPIyWj8');
define('AUTH_SALT',        'f$gSIX|||U_?%+qt|iEj`KT4XV!LHAa+[;c[.P5uVeok }`%Z-$F5s,|Np@4AMFU');
define('SECURE_AUTH_SALT', '*i8hBHWfyDihM59l,R#K9RmIT!0#4C-3AE^-?)5t}|cSzwSw=Gy`?+FE0Kr|F#Gc');
define('LOGGED_IN_SALT',   'aO:SUcfLW.]tfS3}Z6<g!$WC~1Zd$G9D9fW|Sy;?u+8Yy_q=;r6yjQ/~Dayjl:^8');
define('NONCE_SALT',       '+EEXjl2s(B)7W&oX+.Htf|@RfGPnt*RaOFr;og8p&pMIGzCkhp&V1bf2#f`+Kk6|');

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
