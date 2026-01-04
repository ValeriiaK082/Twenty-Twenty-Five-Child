<?php

function child_theme_enqueue_scripts() {
    if ( is_singular('book_pt') ) {

        wp_localize_script('tt5-child-script', 'book_ajax_obj', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'current_book' => get_the_ID(),
        ));
    }
}
add_action('wp_enqueue_scripts', 'child_theme_enqueue_scripts');


// AJAX callback to return 20 other books
function ajax_load_other_books() {
    $current_book = intval($_POST['current_book']);
    $args = array(
        'post_type'      => 'book_pt',
        'posts_per_page' => 20,
        'post__not_in'   => array($current_book),
        'orderby'        => 'date',
        'order'          => 'DESC',
    );

    $query = new WP_Query($args);

    ob_start();
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            get_template_part('template-parts/book-card');
        }
        wp_reset_postdata();
    }
    $html = ob_get_clean();
    wp_send_json_success($html);
}

add_action('wp_ajax_load_other_books', 'ajax_load_other_books');
add_action('wp_ajax_nopriv_load_other_books', 'ajax_load_other_books');

function custom_taxonomy_posts_per_page($query) {
    if (!is_admin() && $query->is_main_query()) {

        if (is_tax('book_genre')) {
            $query->set('posts_per_page', 5);
        }

    }
}
add_action('pre_get_posts', 'custom_taxonomy_posts_per_page');