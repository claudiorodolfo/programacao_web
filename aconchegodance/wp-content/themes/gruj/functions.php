<?php

define( 'GRUJ_THEME_VERSION', '5.0' );

function gruj_css() {
	$parent_style = 'specia-parent-style';
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'gruj-main', get_stylesheet_uri(), array( $parent_style ));
		
	wp_enqueue_style('gruj-default',get_stylesheet_directory_uri() .'/css/colors/default.css');
	wp_dequeue_style('specia-default');
	
	wp_enqueue_style('gruj-portfolio-effects',get_stylesheet_directory_uri() .'/css/portfolio-effects.css');
				
	wp_enqueue_script('gruj-custom',get_stylesheet_directory_uri() . '/js/custom.js');		
}
add_action( 'wp_enqueue_scripts', 'gruj_css',999);
		
require_once( get_stylesheet_directory() . '/inc/customize/gruj-header-section.php');
require( get_stylesheet_directory() . '/inc/customize/gruj-call-action.php');
require_once( get_stylesheet_directory() . '/inc/customize/gruj-premium.php');
	
	
/**
* Import Options From Specia Theme
*
*/
function gruj_parent_theme_options() {
	$specia_mods = get_option( 'theme_mods_specia' );
	if ( ! empty( $specia_mods ) ) {
		foreach ( $specia_mods as $specia_mod_k => $specia_mod_v ) {
			set_theme_mod( $specia_mod_k, $specia_mod_v );
		}
	}
}
add_action( 'after_switch_theme', 'gruj_parent_theme_options' );
	

