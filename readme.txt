=== Cloudflare CLI Add-On ===
Contributors: elvismdev
Author URI: https://forumone.com/
Plugin URI: https://github.com/forumone/cloudflare-cli
Tags: wordpress, plugin, cloudflare, wp-cli, cache, purge
Requires at least: 4.7.9
Requires PHP: 5.6
Tested up to: 5.4.2
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Purge all Cloudflare cache from WP-CLI.

== Description ==
Requires [Cloudflare](https://wordpress.org/plugins/cloudflare/) 3.4+.

Provides a command line interface to the [WordPress Cloudflare plugin](https://www.cloudflare.com/integrations/wordpress/), for performing cache purge actions. 

## Using

~~~
wp cloudflare cache_purge
~~~

Clears all cached files to force Cloudflare to fetch a fresh version of those files from your web server.

**EXAMPLES**

    # Flush Cloudflare cache after new code deployment.
    $ wp cloudflare cache_purge
    Success: Entire site cache on Cloudflare purged.

== Installation ==
= From your WordPress Dashboard =

1. Visit “Plugins” → Add New
2. Search for Cloudflare CLI Add-On
3. Activate Cloudflare CLI Add-On from your Plugins page.

= From WordPress.org =

1. Download Cloudflare CLI Add-On
2. Upload the “cloudflare-cli” directory to your “/wp-content/plugins/” directory, using ftp, sftp, scp etc.
3. Activate Cloudflare CLI Add-On from your Plugins page.


== Changelog ==
= 1.0 =
* Plugin initial release.