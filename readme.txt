=== Social Link Look ===
Contributors: skebby
Plugin Name: Social Link Look
Tags: social, meta, open graph, tags
Author URI: https://www.sebastianoriva.it
Author: Sebastiano Riva
Donate link: www.paypal.me/sebastianoriva
Requires at least: 6.0
Tested up to: 6.7
Requires PHP: 8.0
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Version: 1.2

Easy and lightweight plugin to change your social meta tags.

== Description ==
Social Link Look allows you to change your website shared informations, details and images.
The plugin covers the share for basically every social media, like Facebook, Whatsapp, Linkedin, Twitter, VK...
The huge amount of compatible social medias is thanks to Open Graph Protocol.

== Installation ==
Install the plugin the enable it from from plugin page. You\'ll see "Social Link Look" on admin left side menu.

== Screenshots ==
1. SLL on backend.

== Changelog ==

= 1.2 =
* Updated minimum PHP requirement to 8.0 for WordPress 6.7 compatibility
* Updated minimum WordPress requirement to 6.0
* Fixed fatal error: nested function definitions caused "cannot redeclare" errors on repeated saves
* Fixed nonce verification blocking initial page load (GET requests)
* Fixed bug in twitter_description validation referencing wrong variable
* Fixed uninitialized variable warnings in PHP 8.x when no data exists
* Removed duplicate add_action for admin_menu
* Removed improper ABSPATH redefinition
* Added capability check (manage_options) on form submission
* Used esc_url_raw() for URL field sanitization instead of sanitize_text_field()
* Used wp_unslash() before sanitization per WordPress coding standards
* Replaced deprecated MySQL int display width syntax for MySQL 8.0+ compatibility
* Removed PHP closing tags per WordPress coding standards
* Added proper ABSPATH security checks to all files
* Loaded scripts in footer for better performance
* General code cleanup following WordPress coding standards

= 1.1 =
* Updated compatibility with WordPress 6.7
* Updated PHP requirement to 7.4 for better security and performance
* Added proper escaping to all meta tag outputs (XSS protection)
* Fixed undefined $_GET variable warnings in modern PHP
* Added charset and collation support to database table creation
* Implemented prepared statements for all database queries (SQL injection protection)
* Improved overall security and compatibility with latest WordPress standards

= 1.0 =
* Initial Release.