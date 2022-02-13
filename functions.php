<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
);

foreach ( $understrap_includes as $file ) {
	$filepath = locate_template( 'inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}

// remove default emoji support
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

// remove redundant comment reply script for built-in post commenting system
function remove_comment_reply_script(){
  wp_deregister_script( 'comment-reply' );
}
add_action('init','remove_comment_reply_script');

// remove query strings for static resources
function _remove_script_version( $src ){
  $parts = explode( '?ver', $src );
  return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );

// add custom field to WP REST API
// video C - 43 REST API - Add New Custom Field - https://www.youtube.com/watch?v=fYXxpmmLvMY
// function custom_rest() {
// 	register_rest_field('post', 'authorName', array(
//     'get_callback' => function() { return get_the_author(); }
// 	));
// }
// add_action('rest_api_init', 'custom_rest');

// include custom post type route in WP REST API
// require get_theme_file_path('/inc/custom-route.php');

// remove "Category:" from post category title"
function prefix_category_title( $title ) {
  if ( is_category() ) {
    $title = single_cat_title( '', false );
  }
  return $title;
}
add_filter( 'get_the_archive_title', 'prefix_category_title' );

// reduce excerpt length
function wpdocs_custom_excerpt_length( $length ) {
  return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

function change_private_title_prefix() {
  return '%s';
}
add_filter('private_title_format', 'change_private_title_prefix');
