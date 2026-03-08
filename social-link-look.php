<?php

/**
 * Plugin Name: Social Link Look
 * Plugin URI: https://github.com/skebby11/social-link-look
 * Description: Easy and lightweight plugin to change your social meta tags.
 * Version: 1.2
 * Requires at least: 6.0
 * Requires PHP: 8.0
 * Author: Sebastiano Riva (skebby)
 * Author URI: https://www.sebastianoriva.it/
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SLL_dir', plugin_dir_path( __FILE__ ) );
define( 'SLL_url', plugins_url( '', __FILE__ ) );

// Include DB file
include_once SLL_dir . 'sll-db.php';

// Activation hook
register_activation_hook( __FILE__, 'SLL_create_table' );

// Admin menu
add_action( 'admin_menu', 'SLL_add_menu_function' );
add_action( 'admin_enqueue_scripts', 'SLL_admin_styles' );
add_action( 'admin_enqueue_scripts', 'SLL_admin_scripts' );

function SLL_admin_styles() {
	if ( isset( $_GET['page'] ) && $_GET['page'] === 'sll' ) {
		wp_enqueue_style( 'SLL_styles', SLL_url . '/assets/css/style.css' );
	}
}

function SLL_admin_scripts() {
	if ( isset( $_GET['page'] ) && $_GET['page'] === 'sll' ) {
		wp_enqueue_script( 'SLL_script', SLL_url . '/assets/js/script.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_script( 'github-btn-script', SLL_url . '/assets/js/github-buttons.js', array(), '1.0', true );
	}
}

function SLL_add_menu_function() {
	add_menu_page(
		'Social Link Look',
		'Social Link Look',
		'manage_options',
		'sll',
		'SLL_add_front_page',
		SLL_url . '/assets/images/sll-menu-icon.png'
	);
}

function SLL_add_front_page() {
	include_once SLL_dir . 'sll-front-page.php';
}

// Plugin main function - output meta tags in wp_head
function hook_sll() {
	global $wpdb;
	$table_name = $wpdb->prefix . 'sll_options';
	$SLL_row = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $table_name ORDER BY id DESC LIMIT %d", 1 ) );

	if ( ! $SLL_row ) {
		return;
	}

	$primary_meta_title    = esc_attr( $SLL_row->primary_meta_title );
	$primary_description   = esc_attr( $SLL_row->primary_description );
	$og_type               = esc_attr( $SLL_row->og_type );
	$og_url                = esc_url( $SLL_row->og_url );
	$og_title              = esc_attr( $SLL_row->og_title );
	$og_description        = esc_attr( $SLL_row->og_description );
	$og_image              = esc_url( $SLL_row->og_image );
	$twitter_card          = esc_attr( $SLL_row->twitter_card );
	$twitter_url           = esc_url( $SLL_row->twitter_url );
	$twitter_title         = esc_attr( $SLL_row->twitter_title );
	$twitter_description   = esc_attr( $SLL_row->twitter_description );
	$twitter_image         = esc_url( $SLL_row->twitter_image );
	?>

		<!-- Social Link Look plugin by Sebastiano Riva -->

		<!-- Primary Meta Tags -->
		<meta name="title" content="<?php echo $primary_meta_title; ?>">
		<meta name="description" content="<?php echo $primary_description; ?>">

		<!-- Open Graph, Facebook -->
		<meta property="og:type" content="<?php echo $og_type; ?>">
		<meta property="og:url" content="<?php echo $og_url; ?>">
		<meta property="og:title" content="<?php echo $og_title; ?>">
		<meta property="og:description" content="<?php echo $og_description; ?>">
		<meta property="og:image" content="<?php echo $og_image; ?>">

		<!-- Twitter -->
		<meta property="twitter:card" content="<?php echo $twitter_card; ?>">
		<meta property="twitter:url" content="<?php echo $twitter_url; ?>">
		<meta property="twitter:title" content="<?php echo $twitter_title; ?>">
		<meta property="twitter:description" content="<?php echo $twitter_description; ?>">
		<meta property="twitter:image" content="<?php echo $twitter_image; ?>">

	<?php
}

add_action( 'wp_head', 'hook_sll' );
