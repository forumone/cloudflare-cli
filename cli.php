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
