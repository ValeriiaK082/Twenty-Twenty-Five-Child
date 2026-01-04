<?php
/**
 * Recommended way to include parent theme styles.
 * (Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
 *
 */

/**
 * Custom Meta Viewport Function
 */
function custom_meta_viewport(){
    remove_action('wp_head', 'et_add_viewport_meta');

    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=1" />';
}
add_action( 'wp_head', 'custom_meta_viewport', 1);


add_action( 'wp_enqueue_scripts', 'twenty_twenty_five_child_style' );
function twenty_twenty_five_child_style() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style') );
}

function tt5_child_assets() {
    wp_enqueue_style('tt5-child-style', get_stylesheet_directory_uri() . '/assets/css/style.css', ['twentytwentyfive-style'], wp_get_theme()->get('Version')
    );

    wp_enqueue_script('tt5-child-script', get_stylesheet_directory_uri() . '/assets/js/scripts.js', array('jquery'), wp_get_theme()->get('Version'), true
    );

    // Bootstrap CSS
    wp_enqueue_style( 'bootstrap-css', get_stylesheet_directory_uri() . '/node_modules/bootstrap/dist/css/bootstrap.min.css', array(), '5.5.0' );

    // Bootstrap JS
    wp_enqueue_script( 'bootstrap-js', get_stylesheet_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.5.0', true );
}
add_action('wp_enqueue_scripts', 'tt5_child_assets');

require_once get_stylesheet_directory() . '/inc/custom-post-types.php';
require_once get_stylesheet_directory() . '/inc/books-functions.php';

// Remove the screen-reader-text wrapper completely
add_filter('navigation_markup_template', function($template, $class) {
    return '
    <nav class="%1$s" role="navigation">
        <div class="nav-links">%3$s</div>
    </nav>';
}, 10, 2);

function mytheme_register_blocks() {
    register_block_type( get_stylesheet_directory() . '/blocks/faq-accordion' );
}
add_action( 'init', 'mytheme_register_blocks' );

