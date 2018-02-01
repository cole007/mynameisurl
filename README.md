# My Name is Url plugin for Craft CMS

Funky redirect gubbins for client

![My Name is Url](resources/screenshots/plugin_logo.png)

## Installation

To install My Name is Url, follow these steps:

1. Download & unzip the file and place the `mynameisurl` directory into your `craft/plugins` directory
2. Install plugin in the Craft Control Panel under Settings > Plugins
3. The plugin folder should be named `mynameisurl` for Craft to see it.  GitHub recently started appending `-master` (the branch name) to the name of the folder for zip file downloads.

My Name is Url is designed to work on Craft 2.4+.

## My Name is Url Overview

This phenomenal plugin does three things:

1. it detects whether there are uppercase characters in the URL that is being requested and redirects to a lower-case quivalent, eg `Page-url` will be redirected to `page-url`
2. it detects whether the URL contains `index.php?p=` and if so redirects, eg `index.php?p=page-url` will be redirected to `page-url` 
3. in the Plugin Settings you can specify specific redirects

## Configuring My Name is Url

You can set up specific redirects within the plugin settings.

Here you can specify a redirect from X to Y, for example a request from `/volunteering` to `/supporting-communities/volunteering`. Any requests for the former will be redirected to the latter with a 301 redirect. Redirect sources should be prefixed with a `/` - if this is omitted then one will be added on save.

Additionally, you may use the wildcard `*` as a catch-all redirect. For example if you set a redirect from `/news*` to `/news/latest` then any requests for `/news/xyz` will be redirected accordingly. Redirects take place in sequence, so catch-all requests should ideally be placed last in your list of redirects.

Of course, it is much more desirable to set redirects in your sites `.htaccess` file or, even better, in [your server conf file](https://www.digitalocean.com/community/tutorials/how-to-create-temporary-and-permanent-redirects-with-apache-and-nginx) but for times your clients need ready access to affect redirects this plugin will help.

## Using My Name is Url

Click instsall. That is all

## My Name is Url Roadmap

* Add some settings. Maybe

Brought to you by [@cole007](http://ournameismud.co.uk/)
