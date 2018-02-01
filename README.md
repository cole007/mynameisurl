# My Name is Url plugin for Craft CMS

Funky redirect gubbins for client

![My Name is Url](resources/mynameisurl/icon.svg)

## Installation

To install My Name is Url, follow these steps:

1. Download & unzip the file and place the `mynameisurl` directory into your `craft/plugins` directory
2.  -OR- do a `git clone ???` directly into your `craft/plugins` folder.  You can then update it with `git pull`
3.  -OR- install with Composer via `composer require /mynameisurl`
4. Install plugin in the Craft Control Panel under Settings > Plugins
5. The plugin folder should be named `mynameisurl` for Craft to see it.  GitHub recently started appending `-master` (the branch name) to the name of the folder for zip file downloads.

My Name is Url works on Craft 2.4.x and Craft 2.5.x.

## My Name is Url Overview

This phenomenal plugin does two things -> 

1. it detects whether there are uppercase characters in the URL that is being requested and redirects to a lower-case quivalent, eg `Page-url` will be redirected to `page-url`
2. it detects whether the URL contains `index.php?p=` and if so redirects, eg `index.php?p=page-url` will be redirected to `page-url` 

## Configuring My Name is Url

Nothing to see here. Move along

## Using My Name is Url

Click instsall. That is all

## My Name is Url Roadmap

* Add some settings. Maybe

Brought to you by [@cole007](http://ournameismud.co.uk/)
