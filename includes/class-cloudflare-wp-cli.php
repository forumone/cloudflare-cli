<?php

/**
 * WP-CLI Commands for Cloudflare plugin (https://wordpress.org/plugins/cloudflare).
 */
class F1_Cloudflare_CLI_Command extends WP_CLI_Command {

	/**
	 * Purge the entire site cache on Cloudflare.
	 *
	 * @since  1.0.0
	 * @author Elvis Morales
	 */
	public function cache_purge() {
		if ( class_exists( '\CF\WordPress\Hooks' ) ) {
			// Initiliaze Hooks class which contains WordPress hook functions from Cloudflare plugin.
			$cloud_flare_hooks = new \CF\WordPress\Hooks();
			// If we have an instantiated class.
			if ( $cloud_flare_hooks ) {
				// Purge all cache.
				$cloud_flare_hooks->purgeCacheEverything();
				WP_CLI::success( 'Entire site cache on Cloudflare purged.' );
			}
		} else {
			WP_CLI::error( 'Cloudflare hooks class not found. Is the core plugin active?' );
		}

	}

}

WP_CLI::add_command( 'cloudflare', 'F1_Cloudflare_CLI_Command' );
