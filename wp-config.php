<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'mockingbird');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '<T$~a%H{})C`pEf@^=r9rtuYxG@i,;+6G`M$V#Gfv;0=Ga[N$kBwTZK$+cr4%J-v');
define('SECURE_AUTH_KEY',  'H007El(0,>K&Y.G&_z)gtPKn=L/~xBOB*z}a&Dw(hYt|mTL;X%`a|OXYaB>QEhzN');
define('LOGGED_IN_KEY',    '+6UCFAi9+IGZFaHrKirqpPj^g~qt]P=[#C!)Zt(moK,Gl|q+Ljt8PuMEN,#z,:([');
define('NONCE_KEY',        ')vb|d#N|#&evTRr0|G7oR=?$7(ezk#/M4h7Puk.-60~TSZV?iHsGzMtpk:VG]CxQ');
define('AUTH_SALT',        'j%iYlkcby3etKSUoD|B#:9@zn:Y|vIv50,DoMimti}m8Lx}2Q2%f:`%:l*&bpB~s');
define('SECURE_AUTH_SALT', ';^*>|(L{cwVv@_TG~&y+okPHt8Ubl<`zLm4RB4ZL$N1jD[9Dzgb%P)~SRz!KCr.x');
define('LOGGED_IN_SALT',   'FBzd]+3x+_%9.;X%fo4[4tjzguEy?$@>14jJ]96$B|4sqLTm!h#:cuk2K|HL!opF');
define('NONCE_SALT',       '_ xc*Nu+J2yvY1i25;Qk_S0FPt4Ke>DBKam3gf*mfD^AY]%iY7JEU27Xrd49j(n.');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
