<?php
/**
* Google Fonts Implementation
*
* @package Photographer
* @since Photographer 1.0
*/

/**
* Register Google Fonts
*
* @since Photographer 1.0
*/
function photographer_register_fonts() {
$protocol = is_ssl() ? 'https' : 'http';
wp_register_style( 'oswald', "$protocol://fonts.googleapis.com/css?family=Oswald:400,700,300" );
wp_register_style( 'merriweather', "$protocol://fonts.googleapis.com/css?family=Merriweather:400,700,300,900" );
}
add_action( 'init', 'photographer_register_fonts' );

/**
* Enqueue Google Fonts on Front End
*
* @since Photographer 1.0
*/

function photographer_fonts() {
wp_enqueue_style( 'oswald' );
}
add_action( 'wp_enqueue_scripts', 'photographer_fonts' );

/**
* Enqueue Google Fonts on Custom Header Page
*
* @since Theme Name 1.0
*/
function photographer_admin_fonts( $hook_suffix ) {
if ( 'appearance_page_custom-header' != $hook_suffix )
return;

wp_enqueue_style( 'oswald' );
}
add_action( 'admin_enqueue_scripts', 'photographer_admin_fonts' );