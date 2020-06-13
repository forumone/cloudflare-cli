Cloudflare CLI Add-On
=====================

Requires [Cloudflare](https://wordpress.org/plugins/cloudflare/) 3.4+.

Provides a command line interface to the [WordPress Cloudflare plugin](https://www.cloudflare.com/integrations/wordpress/), for performing cache purge actions. 

Quick links: [Using](#using) | [Installing](#installing)

## Using

~~~
wp cloudflare cache_purge
~~~

Clears all cached files to force Cloudflare to fetch a fresh version of those files from your web server.

**EXAMPLES**

    # Flush Cloudflare cache after new code deployment.
    $ wp cloudflare cache_purge
    Success: Entire site cache on Cloudflare purged.

## Installing

This package depends on the `\CF\WordPress\Hooks` class from the [Cloudflare for WordPress](https://wordpress.org/plugins/cloudflare/) plugin. Make sure this one is installed and active first. 

1. Download or clone the contents of this repo.
2. Place the “cloudflare-cli” folder to your “/wp-content/plugins/” directory.
3. Activate Cloudflare CLI Add-On from your Plugins page.

##### Using Composer

1. Add this GitHub repo to the _"repositories"_ key in your project's `composer.json` file.

```
composer config repositories.forumone '{ "type": "package", "package": { "name": "forumone/cloudflare-cli", "version": "dev-master", "type": "wordpress-plugin", "dist": { "type": "zip", "url": "https://github.com/forumone/cloudflare-cli/archive/master.zip" }, "require": { "composer/installers": "^1.0" } } }'
```

2. Require the plugin package to your project.
~~~
composer require forumone/cloudflare-cli:dev-master
~~~

3. Activate Cloudflare CLI Add-On from your Plugins page.


