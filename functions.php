<?php
/**
 * Twentynineteen-child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package twentynineteen-child
 */

add_action( 'wp_enqueue_scripts', 'twentynineteen_parent_theme_enqueue_styles' );

/**
 * Enqueue scripts and styles.
 */
function twentynineteen_parent_theme_enqueue_styles() {
	wp_enqueue_style( 'twentynineteen-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'twentynineteen-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( 'twentynineteen-style' )
	);

}

/*** Okay, now we'll get down to guten fun ***/

/*
 * Theme Supports
 *
 * See: https://developer.wordpress.org/block-editor/developers/themes/theme-support/
 */

function twentynineteen_child_setup_theme_supported_features() {
	
	// Add styles to Gutenberg editor.
	add_theme_support( 'editor-styles' );
	add_editor_style( 'editor-styles.css' );

	// Gutenberg-specific theme supports.

	// Apply default block styles on front end ?
	//add_theme_support( 'wp-block-styles' );

	// Enable wide alignment.
	add_theme_support( 'align-wide' );

	// Make embedded content responsive.
        add_theme_support( 'responsive-embeds' );

	// Do not permit font sizes to be set in editor.
        add_theme_support('disable-custom-font-sizes');

        // Deactivate custom coluors, to use only colours in palette.
        add_theme_support( 'disable-custom-colors' );

	// Colour palette.
	add_theme_support( 'editor-color-palette', array(
		array(
			'name' => __( 'Primary', '' ),
			'slug' => 'primary',
			'color' => '#7654B4',
		),
		array(
			'name' => __( 'Secondary', ''),
			'slug' => 'secondary',
			'color' => '#220B5E',
		),
		array(
                        'name' => __( 'Dark Gray', ''),
                        'slug' => 'dark-gray',
                        'color' => '#111',
                ),
		array(
                        'name' => __( 'Light Gray', ''),
                        'slug' => 'light-gray',
                        'color' => '#767676',
                ),
		array(
                        'name' => __( 'White', ''),
                        'slug' => 'white',
                        'color' => '#fff',
                ),
	) );
}

add_action( 'after_setup_theme', 'twentynineteen_child_setup_theme_supported_features' );

/**
 * Enqueue scripts for block filters.
 * 
 * See: https://developer.wordpress.org/block-editor/developers/filters/block-filters/
 */

function twentynineteen_child_blocks_enqueue() {
    wp_enqueue_script(
        'twentynineteen-child-blocks',
        get_stylesheet_directory_uri() . '/js/blocks.js',
        array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' )
      /*  filemtime( get_template_directory_uri() . '/js/blocks.js' )*/
    );
}
add_action( 'enqueue_block_editor_assets', 'twentynineteen_child_blocks_enqueue' );
