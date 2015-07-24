<?php

/*
Plugin Name: Surbma - WP Control
Plugin URI: http://surbma.com/wordpress-plugins/
Description: Global control plugin for WordPress Multisite Networks
Network: True

Version: 4.1.0

Author: Surbma
Author URI: http://surbma.hu/

License: GPLv2

Text Domain: surbma-wp-control
Domain Path: /languages/
*/

// Prevent direct access to the plugin
if ( !defined( 'ABSPATH' ) ) {
	die( 'Good try! :)' );
}

// Define some constants
define( 'SURBMA_WP_CONTROL_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'SURBMA_WP_CONTROL_PLUGIN_URL', plugins_url( '', __FILE__ ) );

// Localization
function surbma_wp_control_init() {
	load_plugin_textdomain( 'surbma-pwp-control', false, dirname( plugin_basename( __FILE__ ) . '/languages/' ) );
}
add_action( 'init', 'surbma_wp_control_init' );

// Include files
if ( is_admin() ) {
	include_once( SURBMA_WP_CONTROL_PLUGIN_DIR . '/lib/admin.php' );
}

if ( !is_admin() ) {
	include_once( SURBMA_WP_CONTROL_PLUGIN_DIR . '/lib/frontend.php' );
	if ( wp_basename( get_bloginfo( 'template_directory' ) ) == 'genesis' )
		include_once( SURBMA_WP_CONTROL_PLUGIN_DIR . '/lib/frontend-genesis.php' );
}

// Load custom functions if file exists
$blog_id = get_current_blog_id();
$custom_functions_file = ABSPATH . 'wp-content/pwp-control/' . $blog_id . '/custom-functions.php';
if ( file_exists( $custom_functions_file ) )
	include_once( $custom_functions_file );

// Change the default wordpress@siteurl email address to the admin's email address
// Change the default WordPress email to the site's title
function surbma_wp_control_wp_mail_from( $input ) {
	// Not the default address, probably a comment notification
	if ( 0 !== stripos( $input, 'wordpress' ) )
		return $input;

	return get_option( 'wp_mail_from' === current_filter() ? 'admin_email' : 'blogname' );
}
add_filter( 'wp_mail_from', 'surbma_wp_control_wp_mail_from' );
add_filter( 'wp_mail_from_name', 'surbma_wp_control_wp_mail_from' );

// Add global Google Analytics tracking
function surbma_wp_control_add_google_analytics() {
?>
	ga('create', '<?php echo SURBMA_WP_CONTROL_GOOGLE_ANALYTICS; ?>', 'auto', {'name': 'pwp'}, {'allowLinker': true});
	ga('pwp.send', 'pageview');
<?php
}
function surbma_wp_control_do_google_analytics() {
	// Check if Surbma - Premium WordPress plugin is activated and Google Analytics tracking is enabled
	$options = get_option( 'pwp_google_analytics_fields' );
	if ( function_exists( 'pwp_google_analytics_display' ) && $options['universalid'] != '' ) {
		add_action( 'pwp_universal_analytics_objects', 'surbma_wp_control_add_google_analytics', 999 );
	} else {
?>
<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', '<?php echo SURBMA_WP_CONTROL_GOOGLE_ANALYTICS; ?>', 'auto', {'name': 'pwp'}, {'allowLinker': true});
	ga('pwp.send', 'pageview');
</script>
<?php }
}
if ( defined( 'SURBMA_WP_CONTROL_GOOGLE_ANALYTICS' ) ) {
	add_action( 'wp_head', 'surbma_wp_control_do_google_analytics', 999 );
	add_action( 'admin_head', 'surbma_wp_control_do_google_analytics', 999 );
	add_action( 'login_head', 'surbma_wp_control_do_google_analytics', 999 );
}
