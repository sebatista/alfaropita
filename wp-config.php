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
 
define('WP_HOME','http://localhost/alfaropita');
define('WP_SITEURL','http://localhost/alfaropita');


// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'adminalfa_wp' );

define	("DB_USER","root");
define	("DB_PASSWORD","");

/** MySQL database username */
//define( 'DB_USER', 'adminalfa_wp' );

/** MySQL database password */
//define( 'DB_PASSWORD', 'XEwvDyFDWsKW' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'OxvIVt(;>ToJu|@_%Z90#vCpqS{PK@&*Q/+KQ:z+5V^6JHH_5>Z=.?N)=V=I^hkF');
define('SECURE_AUTH_KEY',  'AA4zT|_rO2---)64E;sc_]bIPU<t= .w-/X[?;_CA]TQe4*_@O[C-zOgX?HvrPc}');
define('LOGGED_IN_KEY',    '#6z0sZ-X+mZ?FmJQJx`bu^6so_-3u^o8*(#A|d%WYC|FRTR8KF-{6~dcm=]o_A9W');
define('NONCE_KEY',        '}u 8zGWO4&MWpX^S>[Jk)9mp|#Z8a!{~DH,bQ.CDMZ=IJSHMMLa||$nbo>+-G{ay');
define('AUTH_SALT',        '2=Rok0wE|w^XWm|Y3sPbQ|`96wOObWK9^78|H]?g}-*SV9b,Fq_ATWLQk*-M#+bb');
define('SECURE_AUTH_SALT', 'fQ~V-|1H^6RZ,;#BvdN^OpY@,|CJ.r}-uSDepn.5A_!::6*2}N+@)@5F`|)@wTIq');
define('LOGGED_IN_SALT',   'Myrc+((e2# t/W8L2[w4|*Tdj=AT5~q*?Bz3G+_pkW<MR0~7Jjo8ok~Ll6ZKc2T@');
define('NONCE_SALT',       '$^x!6qF=Nghd,$]v[0qB5RT]?AZraWd|8Z}K{z.C[W(hfNvn;BC|zc!)XeRdJR6g');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
