<?php


// This theme allows users to set a custom background.
add_theme_support( 'custom-background', apply_filters( 'l2tmediaRepman_custom_background_args', array(
	'default-color' => 'f5f5f5',
) ) );

// Implement Custom Header features.
require get_template_directory() . '/inc/custom-header.php';

/*
 * Helper function to return the theme option value. If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 * This code allows the theme to work without errors if the Options Framework plugin has been disabled.
 */
if ( !function_exists( 'of_get_option' ) ) {

function of_get_option($name, $default = false) {

    $optionsframework_settings = get_option('optionsframework');

    // Gets the unique option id

    $option_name = $optionsframework_settings['id'];

    if ( get_option($option_name) ) {

        $options = get_option($option_name);

    }

    if ( isset($options[$name]) ) {

        return $options[$name];

    } else {

        return $default;

    }

}

}



function l2trepman_scripts() {
    wp_enqueue_style( 'foundation', get_template_directory_uri() . '/css/foundation.min.css', false, '1.0', all );
    wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css', false, '1.1', all );
    wp_enqueue_style( 'pageslidecss', get_template_directory_uri() . '/js/jquery.pageslide.css', false, '1.1', all );


   
    wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/modernizr.js',array(),'1.1',true);
    wp_enqueue_script('foundation', get_template_directory_uri() . '/js/foundation.min.js',array(),'1.1',true);
    wp_enqueue_script('pageslide', get_template_directory_uri() . '/js/jquery.pageslide.min.js',array(),'1.1',true);

    // Load our main stylesheet.
    wp_enqueue_style( 'l2trepman_style', get_stylesheet_uri());

}

add_action( 'wp_enqueue_scripts', 'l2trepman_scripts' );
