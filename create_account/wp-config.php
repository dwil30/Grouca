<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', '943880_groucaWP');

/** MySQL database username */
define('DB_USER', '943880_root');

/** MySQL database password */
define('DB_PASSWORD', 'Sergio123!');

/** MySQL hostname */
define('DB_HOST', 'mysql51-127.wc1.ord1.stabletransit.com');

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
define('AUTH_KEY',         ',Hef[pzMkRQlfbJ6UeMyoc zmIMr`@i[}.,T5-K,f.o,Io>b8OQ,Ior%]qoL<o|E');
define('SECURE_AUTH_KEY',  'OWX;7E[xEs )ZbZ`VJp:Uvu5b1M1=A9V,E0qVIjw,/7FG?7g3?Fil|W[AQpE<s|=');
define('LOGGED_IN_KEY',    '7Pt18T=;kobNL}6oq=x/g}(l3G}&S%9<0izjkbGZpwnsF8 MedU)K+6R[j9%:wc^');
define('NONCE_KEY',        '{}:;_Y^/e>+A|c^K<3$(jln5]/L%x&eiQ+e1SvfHW|<?G7<%vXWP9&]9KFx?-r5C');
define('AUTH_SALT',        '^N,pO2U~:z=P1z~5 Qibq^NM@)-Z//| 9)rblw8`mIJd;9 {iW?7Siq&#zvd/$JS');
define('SECURE_AUTH_SALT', 'kH~,Hyb%W[l7W1Sj(ueX36#maw<tZjSg(n`C,`L~j{%y!1{qwH!LVr!kw`$LY&5;');
define('LOGGED_IN_SALT',   'i)bP@q]QUo^Us)~:QA< Wx]l&=QiOR:4U@<i!lE!4i:chkTk9wd5^]wM$go|4;rg');
define('NONCE_SALT',       ':]vp ;OLUh:Vq+1C+$J3T+,X^RJ&Vp{,U >]R`a),z,RnRVI:hKQ*EX6`Wpngt6:');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
