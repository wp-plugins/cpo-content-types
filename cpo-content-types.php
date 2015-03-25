<?php
/*
Plugin Name: CPO Content Types
Description: Adds support for a number of content types in your Wordpress installation.
Author: CPOThemes
Version: 1.0.0
Author URI: http://www.cpothemes.com
*/

//Plugin setup
if(!function_exists('ctct_setup')){
	add_action('plugins_loaded', 'ctct_setup');
	function ctct_setup(){
		//Load text domain
		$textdomain = 'ctct';
		$locale = apply_filters('plugin_locale', get_locale(), $textdomain);
		if(!load_textdomain($textdomain, trailingslashit(WP_LANG_DIR).$textdomain.'/'.$textdomain.'-'.$locale.'.mo')){
			load_plugin_textdomain($textdomain, FALSE, basename(dirname(__FILE__)).'/languages/');
		}
	}
}


//Add admin stylesheets
add_action('admin_print_styles', 'ctct_add_styles_admin');
function ctct_add_styles_admin(){
	$stylesheets_path = plugins_url('css/' , __FILE__);
	wp_enqueue_style('ctct-admin', $stylesheets_path.'admin.css');
	wp_enqueue_style('ctct-fontawesome', $stylesheets_path.'fontawesome.css');
}


//Define custom columns for each custom post type page
add_action('manage_posts_custom_column', 'ctct_admin_columns', 2);
function ctct_admin_columns($column){
	global $post;
	switch($column){
		case 'ctct-image': echo get_the_post_thumbnail($post->ID, array(60,60)); break;
		case 'ctct-portfolio-cats': echo get_the_term_list($post->ID, 'cpo_portfolio_category', '', ', ', ''); break;
		case 'ctct-portfolio-tags': echo get_the_term_list($post->ID, 'cpo_portfolio_tag', '', ', ', ''); break;
		default:break;
	}
}


//Add all Shortcode components
$core_path = plugin_dir_path(__FILE__);


//General
require_once($core_path.'functions/general.php');
require_once($core_path.'functions/metaboxes.php');
require_once($core_path.'metadata/metadata-general.php');
//Post types
require_once($core_path.'cposts/cpost_slides.php');
require_once($core_path.'cposts/cpost_features.php');
require_once($core_path.'cposts/cpost_portfolio.php');