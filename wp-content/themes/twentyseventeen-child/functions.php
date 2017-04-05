<?php
	// registering styles
	function my_theme_enqueue_styles() {
	    $parent_style = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
	    // using style.css of the child theme
	    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	    wp_enqueue_style( 'child-style',
	        get_stylesheet_directory_uri() . '/style.css',
	        array( $parent_style ),
	        $ver = null
	    );
	}
	add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

	// registering javascript files
	function my_theme_enqueue_js() {
	    wp_enqueue_script(
	        'child-custom-js',
	        get_stylesheet_directory_uri() . '/js/custom.js',
	        array(),
	        $ver = null
	    );
	}
	add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_js' );