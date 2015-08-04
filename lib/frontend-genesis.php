<?php

// Customizes breadcrumb
function surbma_wp_control_genesis_custom_breadcrumb( $args ) {
	$args['home'] = get_bloginfo( 'name' );
	$args['sep'] = ' &raquo; ';
	$args['labels']['prefix'] = '';
	return $args;
}
add_filter( 'genesis_breadcrumb_args', 'surbma_wp_control_genesis_custom_breadcrumb' );

// Add custom footer creds text
add_filter( 'genesis_footer_creds_text', 'surbma_wp_control_footer_creds', 25 );

// Remove the edit link
add_filter( 'genesis_edit_post_link' , '__return_false' );

function surbma_wp_control_genesis_modifications() {
	if( is_attachment() ) {
		remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
		remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
		remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
	
		remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_open', 5 );
		remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
		remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_close', 15 );
	}
}
add_action( 'genesis_loop', 'surbma_wp_control_genesis_modifications' );

function surbma_wp_control_media_force_layout( $layout ) {
	if ( is_attachment() ) {
		$layout = 'full-width-content';
		return $layout;
	}
	return $layout;
}
add_filter( 'genesis_pre_get_option_site_layout', 'surbma_wp_control_media_force_layout' );
