<?php
/**
 * Setup boston Child Theme's textdomain.
 *
 * Declare textdomain for this child theme.
 * Translations can be filed in the /languages/ directory.
 */
function boston_child_theme_setup() {
	load_child_theme_textdomain( 'boston-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'boston_child_theme_setup' );


function boston_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
}
add_action( 'wp_enqueue_scripts', 'boston_enqueue_styles' );

function replace_text_in_content($content) {
    // Text to be replaced
    $old_text = '© 2023 Copyright All Right Reserved';

    // Replacement text
    $new_text = '© 2024 All Right Reserved | Powered by web99x';

    // Replace the old text with the new text
    $content = str_replace($old_text, $new_text, $content);

    return $content;
}

add_filter('the_content', 'replace_text_in_content');
