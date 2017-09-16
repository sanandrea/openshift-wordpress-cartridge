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

/** These settings are automatically used on your EC2*/
if (getenv('dev') == "") {
	define('DB_NAME', WORDPRESS_DB_NAME);

	/** MySQL database username */
	define('DB_USER', WORDPRESS_MYSQL_DB_USERNAME);

	/** MySQL database password */
	define('DB_PASSWORD', WORDPRESS_MYSQL_DB_PASSWORD);

	/** MySQL hostname */
	define('DB_HOST', 'localhost:3306');

} else {
	define('DB_NAME', 'website');

	/** MySQL database username */
	define('DB_USER', 'root');

	/** MySQL database password */
	define('DB_PASSWORD', 'root');

	/** MySQL hostname */
	define('DB_HOST', 'localhost:8889');
}


define( 'AWS_ACCESS_KEY_ID', WORDPRESS_ACCESS_KEY_ID);
define( 'AWS_SECRET_ACCESS_KEY', WORDPRESS_SECRET_ACCESS_KEY);


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
define('AUTH_KEY', 'c609e0c917c13a58e8817604918783d3256c409d98729801c0196fb77efbf4a8');
define('SECURE_AUTH_KEY', '0179898a2761fcdb5e8b3b93ff9a51b679108ce29a386bcbafed37b48671ff7b');
define('LOGGED_IN_KEY', '491615ff3e3639c0c6313f33a3bee1a459a2231e0bf7bd4e130367593aa70add');
define('NONCE_KEY', '59d34116f47506ca1bf2c76aa50f4ede5cac00e628d296eed814910785424609');
define('AUTH_SALT', '1c69ca238c16598b11eb73064b1c536d18cfb05c3f4370e07b4061baafc98ec7');
define('SECURE_AUTH_SALT', 'caedb526162461888e9c1533bc8e485d1eaa6e55828d7d9d61294aaf5abb8d6e');
define('LOGGED_IN_SALT', 'dc190ddcd4eee2be30b263da47da4d3a6c56fe8d910feb4626988f9e32faa85c');
define('NONCE_SALT', 'c44e2cad0ba7fb5549992779ab0a139fda5909f8ccf0f6d94576fa983b3c0e3f');

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


define('WP_TEMP_DIR', '/opt/bitnami/apps/wordpress/tmp');


define('FS_METHOD', 'direct');

//  Disable pingback.ping xmlrpc method to prevent Wordpress from participating in DDoS attacks
//  More info at: https://docs.bitnami.com/?page=apps&name=wordpress&section=how-to-re-enable-the-xml-rpc-pingback-feature

// remove x-pingback HTTP header
add_filter('wp_headers', function($headers) {
    unset($headers['X-Pingback']);
    return $headers;
});
// disable pingbacks
add_filter( 'xmlrpc_methods', function( $methods ) {
        unset( $methods['pingback.ping'] );
        return $methods;
});