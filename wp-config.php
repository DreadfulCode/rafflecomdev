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
define('DB_NAME', 'raffle_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'N6+|WnHj/Dj3u_qWf}>bovfoUXL/Q.M%|i} l}?Z@:x5F|K{rx@3Da&S&U~~`B]5');
define('SECURE_AUTH_KEY',  '0Q0%e!52|K?u!YXs+X!Eo=SU|[w`VDR+H_X+W:__q{@&!ns],1Wdp@Ia0+PZWFj$');
define('LOGGED_IN_KEY',    'R|.-wz!x]Q/6FZJJ?jw$x|>(FxSa* jS]-pGbI>]T67URL!iU5zZzt .!%G2(I1a');
define('NONCE_KEY',        '-H56L-C?&T].H1!ltr7 t]?Wf-IB2R<&kT^]n@ 8-_xJLDQ)Ik&]6vQsCMa4S#p:');
define('AUTH_SALT',        'GAYc!BjZe-v,I~$>,nB}>IE4Z|1CX;OvD_YY8k$}L|r}+8%n?(33;E^ddHwp|- G');
define('SECURE_AUTH_SALT', '%25||F[05AwlJ`f,&Z!I::P@>u|{ExZIxMWo(Ker!Ua4gqI.%GCo&d`?$|OEy5}n');
define('LOGGED_IN_SALT',   '7[:&g8pokT65 `W1?ux1!|*Gv>r9qS!+S ,ZT5$#fa(sV1cA.5cBc>6mO}c,z0nw');
define('NONCE_SALT',       'q};gb4i4r!%BYMqoxS`LV.PVFY&!GL*qf-ItPt;Ek-{AE?-z%vU5KxbTieIO!=,{');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'tr0_';

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
