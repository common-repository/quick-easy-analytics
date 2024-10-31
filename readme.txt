=== Quick & Easy Google Analytics ===
Contributors: michaelhull
Tags: google, analytics, quick, easy, simple, minimal
Requires at least: 3.0.1
Tested up to: 5.4
Requires PHP: 5.2
Stable tag: 1.0.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Just enter your Tracking ID and go.

== Description ==

Provides standard pageview tracking on all front end pages. Has a simple back end settings page where all you need to do is enter your Google Analytics Tracking ID (e.g. `UA-12345678-9`).

If more control/refinement is needed beyond inserting the same Google Analytics script on every front end page, then this plugin is not going to do what you need.

Uses Google's Universal Analytics (analytics.js) tracking method, as opposed to the classic ga.js method.

= Basic Usage =

* Once plugin is installed, visit Settings > Google Analytics

* Enter the [Tracking ID (has the form UA-########-#)](https://support.google.com/analytics/answer/1008080#GAID) for your Google Analytics property and save.

* The tracking code will now be added to your site header on all front end pages.

= Note =

If your Tracking ID is not formatted in a way that this plugin recognizes as being a valid Google Analytics Tracking ID, then the value will not be saved. In this case, you will see a message on the settings page indicating the Tracking ID is invalid; and your tracking code will ultimately not be inserted on the front end as expected.

If you experience the above behavior, please double-check the Tracking ID you have entered, remove additional characters (such as spaces) that may have accidentally been copied/pasted along with the Tracking ID, and try saving the value again.

If you have confirmed your Tracking ID is valid and has been entered correctly but the plugin is still not saving it, please open up a support ticket so we can look into the issue further. Since Google could theoretically add new types of Tracking ID formats at any point, and since we don't have the ability to constantly stay on the lookout for this, support tickets are one of the few ways that we can make sure the plugin accepts all types of valid Tracking ID's over time.

== Installation ==

1. Do exactly one of the following:

   1. Find, install, and activate the plugin from your backend's built-in plugin browser

   1. Download `quick-easy-analytics.zip` file and upload the zip file via Plugins > Add New > Upload Plugin

   1. Unzip the `quick-easy-analytics.zip` folder and upload to your `/wp-content/plugins/` directory via FTP

1. Activate the plugin.

1. Follow the instructions in the Description to add the tracking code to your site.

== Changelog ==

= 1.0.2 =

* Expand the pattern for valid account codes
* Provide a message on the settings page if an invalid code is given

= 1.0.1 = 

* Added a link in case you can't find your UA number
* Tested up to WP 4.4.1

= 1.0.0 =

Initial release
