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
define('DB_NAME', 'reviveph');

/** MySQL database username */
define('DB_USER', 'reviveph');

/** MySQL database password */
define('DB_PASSWORD', 'reviveph');

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
define('AUTH_KEY',         '>R1cOs[)<G.SUgW-,<0Q54lV<mAE#@RR5!(;,t.n(|Xxlb}}@Wef@B5@ZeC=]~F@');
define('SECURE_AUTH_KEY',  '<ilZxlix@  <`QqFzR+v[TLU sD-+_BYz)E&uK(bPt[ ut0`7p9f=P0$[.&(H:Wc');
define('LOGGED_IN_KEY',    'KIg.~:xYC$Ilt/%C=#{Rw(J7deYG#-An_c;E2yMqE)Rv3E#sHFGu`(-[ < 3aOA4');
define('NONCE_KEY',        'hlNBe_Cr .-Z7(PwMSRzW$dwqp3(&Lh3;A%+8TUMRHBv@OrnvrY~^}!vTTQ0o]Y3');
define('AUTH_SALT',        'p({riE9AOy/+Y=_$8PQbtc|ywPh,L;>Ldm[y9.qT2]=!6dUH |!&BN{|$lrpTcLe');
define('SECURE_AUTH_SALT', '=QXkZFkoP^+ )SQYPd9E5L>!p2W[It|J/.(a:4SC&X3b*]Ur>n]IS-[F}WW0iW!s');
define('LOGGED_IN_SALT',   ';j>0j;W6RT(<u{NHk.#?qv]e<&<~lv`vjt|>-)$}hs/UMiV|j;E[fZ#5hqGP_# T');
define('NONCE_SALT',       ':s5D$Xq4FTUFA&wqWGlPMl 7nco],i{({$u;t8=M0`zU6)&iqE!Wmq^@%!BjJF5X');

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
