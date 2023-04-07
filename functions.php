<?php
/**
 * _s functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wd_s
 */

// namespace WebDevStudios\wd_s;

/**
 * Get all the include files for the theme.
 *
 * @author WebDevStudios
 */
function include_inc_files() {
	$files = [
		'inc/customizer/customizer.php', // Customizer additions.
		'inc/functions/', // Custom functions that act independently of the theme templates.
		'inc/hooks/', // Load custom filters and hooks.
		'inc/post-types/', // Load custom post types.
		'inc/scaffolding/', // Scaffolding.
		'inc/setup/', // Theme setup.
		'inc/shortcodes/', // Load shortcodes.
		'inc/template-tags/', // Custom template tags for this theme.
	];

	foreach ( $files as $include ) {
		$include = trailingslashit( get_template_directory() ) . $include;

		// Allows inclusion of individual files or all .php files in a directory.
		if ( is_dir( $include ) ) {
			foreach ( glob( $include . '*.php' ) as $file ) {
				require $file;
			}
		} else {
			require $include;
		}
	}
}

include_inc_files();


// Custom Block registration

add_action( 'init', 'register_acf_blocks' );
function register_acf_blocks() {
    register_block_type( __DIR__ . '/blocks/testblock' );
}


// CSS
function script() { 
    wp_enqueue_style('style', get_stylesheet_uri(), array(), filemtime( get_stylesheet_directory() . '/style.css' ) );
}
add_action('wp_enqueue_scripts', 'script');


// Font
function font_styles() {

        // register styles
        wp_register_style('googlefont1', 'https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700&amp;subset=latin-ext', array(), false, 'all');
        wp_enqueue_style('googlefont1');
}
add_action('wp_enqueue_scripts', 'font_styles');