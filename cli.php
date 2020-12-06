<?php
/**
 * Cloudflare CLI Add-On
 *
 * @package PluginPackage
 *
 * Plugin Name: Cloudflare CLI Add-On
 * Plugin URI: https://github.com/forumone/cloudflare-cli
 * Description: Purge all Cloudflare cache from WP-CLI.
 * Author: Forum One
 * Version: 1.0.0
 * Author URI: https://www.forumone.com/
 * License: GPLv3
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The plugin initializer class.
 */
class F1_Cloudflare_CLI_Core {

	/**
	 * Plugin instance.
	 *
	 * @var object $instance
	 */
	private static $instance;

	/**
	 * Etc etc
	 */
	public function __construct() {
		define( 'F1_CLOUDFLARE_CLI_DIR', dirname( __FILE__ ) );
		// WP is loaded.
		add_action( 'init', array( $this, 'init' ), 1 );
	}

	/**
	 * Initialize the singleton
	 */
	public static function instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Initialize classes and WP hooks
	 */
	public function init() {
		// WP-CLI.
		if ( defined( 'WP_CLI' ) && WP_CLI ) {
			include( F1_CLOUDFLARE_CLI_DIR . '/includes/class-cloudflare-wp-cli.php' );
		}
	}

}

/**
 * Initilize plugin instance.
 */
function f1_cloudflare_cli() {
	return F1_Cloudflare_CLI_Core::instance();
}
f1_cloudflare_cli();

register_activation_hook( __FILE__, 'f1_cloudflare_cli_activation' );
register_deactivation_hook( __FILE__, 'f1_cloudflare_cli_delete_transient' );

add_action( 'activate_cloudflare/cloudflare.php', 'f1_cloudflare_cli_delete_transient' );
add_action( 'deactivate_cloudflare/cloudflare.php', 'f1_cloudflare_cli_set_transient' );

// Upon Cloudflare CLI Add-On activation
function f1_cloudflare_cli_activation() {
   if ( !is_plugin_active( 'cloudflare/cloudflare.php' ) ) {
       f1_cloudflare_cli_set_transient();
   }
}

// Set Cloudflare base plugin required transient
function f1_cloudflare_cli_set_transient() {
    if( !get_transient( 'f1_cloudflare_cli_dependency_required' ) ) {
        set_transient( 'f1_cloudflare_cli_dependency_required', true );
    }
}

// Delete Cloudflare base plugin required transient
function f1_cloudflare_cli_delete_transient() {
    if( get_transient( 'f1_cloudflare_cli_dependency_required' ) ) {
        delete_transient( 'f1_cloudflare_cli_dependency_required' );
    }
}

// Cloudflare base plugin required admin notice
add_action( 'admin_notices', 'f1_cloudflare_cli_requires_cloudflare_notice' );
function f1_cloudflare_cli_requires_cloudflare_notice() {
    if( get_transient('f1_cloudflare_cli_dependency_required' )){
        $class = 'notice notice-error';
        $message = __( '<strong>Cloudflare CLI Add-On</strong> requires <a target="_blank" href="https://wordpress.org/plugins/cloudflare/">Cloudflare plugin</a> version 3.4 or greater.', 'cloudflare-cli' );
        printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ),  $message );
    }
}
