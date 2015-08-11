=== Surbma - WP Control ===
Contributors: Surbma
Donate link: http://surbma.com/
Tags: multisite, network, genesis, gravity forms, gravityforms, soliloquy, google analytics, jetpack
Requires at least: 3.0
Tested up to: 4.2
Stable tag: 4.3.0
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Global control plugin for WordPress Multisite Networks

== Description ==

This is a very complex plugin, which is very useful for Multisite Networks made for client website management. I have created this plugin for my own Multisite Networks and I'm continue to add more useful functions to it in the future. This plugin is not for the avarage WordPress user, but for a WordPress developer or operators. You need a basic knowledge to use WordPRess Multisite, FTP and other things to fully take advantage of this plugin.

**Here is a list of the current functions:**

- Custom functions per blog with a custom-functions.php file. You only need to add a pwp-control folder into wp-content folder and than adding folders with the blog ids. In these folders you can have the custom-functions.php file, which is loaded if it exists. This way, you can add as many custom functions to your blogs, as you want.
- Fixes the default email from address and name to use the current blog's admin email address and blog name.
- Global Google Analytics tracking for all your blogs. You have to define the SURBMA_PWP_CONTROL_GOOGLE_ANALYTICS constant in the wp-config.php file. Just use the UA code, nothing else!
- Enables shortcodes for Text Widgets.
- Simply replaces the admin footer text to the current blog's name.
- Fix for Soliloquy menu capability in a Multisite Network.
- Removes some unwanted Widgets.
- Removes some unwanted Dashboard Widgets.
- Disables Welcome Screen.
- Removes some unwanted Jetpack modules.
- No active modules upon Jetpack activation.
- Enables Gravity Forms visibility option for form fields.
- Removes version parameters from static files for caching.
- Removes version number from source code.
- Custom footer creds text for Genesis themes or any other theme by adding the necessary function to it. You have to define the SURBMA_PWP_CONTROL_FOOTER_CREDS constant in the wp-config.php file.
- Custom login style. You have to define the SURBMA_PWP_CONTROL_LOGIN_STYLE constant in the wp-config.php file.
- Custom login text. You have to define the SURBMA_PWP_CONTROL_LOGIN_TEXT constant in the wp-config.php file.
- Adds link to read more text.
- Adds language code in body class if WPML plugin is activated.
- Customizes Genesis breadcrumb.
- Removes the edit link from Genesis themes in the front-end.

**Do you want to contribute or help improving this plugin?**

You can find it on GitHub: [https://github.com/Surbma/surbma-wp-control](https://github.com/Surbma/surbma-wp-control)

**You can find my other plugins and projects on GitHub:**

[https://github.com/Surbma](https://github.com/Surbma)

Please feel free to contribute, help or recommend any new features for my plugins, themes and other projects.

**Do you want to know more about me?**

Visit my webpage: [Surbma.com](http://surbma.com/)

== Installation ==

1. Upload `surbma-wp-control` folder to the `/wp-content/plugins/` directory
2. Activate the Surbma - WP Control plugin through the 'Plugins' menu in WordPress
3. That's it. :)

== Frequently Asked Questions ==

= What is this plugin good for? =

This plugin was created especially for my Multisite Network, which operates my clients' websites. It can control some minor, but important parts of a Multisite network, which is very useful if you handle a lot of client websites.

= What does Surbma mean? =

It is the reverse version of my last name. ;)

== Changelog ==

= 4.3.0 =

- Protect module of Jetpack is still disabled by default, but can be enabled by defining a constant: SURBMA_WP_CONTROL_JETPACK_ENABLE_PROTECT

= 4.2.0 =

- WP Control menu will be a submenu, if Surbma - Premium WP plugin is activated.
- Turn off comments on Attachement pages.
- Remove post info and post meta on Attachement pages, when Genesis theme is used.
- Force layout to full-width on Attachement pages, when Genesis theme is used.

= 4.1.0 =

- Remove Protect module from the available modules of Jetpack.

= 4.0.0 =

- First commit to official WordPress repo.
