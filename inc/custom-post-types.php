<?php

// Register Books CPT and Genre taxonomy

function tt5_child_register_books_cpt() {

    // Books CPT

    $labels = array(
        'name'                  => _x( 'Books', 'Post type general name', 'tt5-child' ),
        'singular_name'         => _x( 'Book', 'Post type singular name', 'tt5-child' ),
        'menu_name'             => _x( 'Books', 'Admin Menu text', 'tt5-child' ),
        'name_admin_bar'        => _x( 'Book', 'Add New on Toolbar', 'tt5-child' ),
        'add_new'               => __( 'Add New', 'tt5-child' ),
        'add_new_item'          => __( 'Add New Book', 'tt5-child' ),
        'new_item'              => __( 'New Book', 'tt5-child' ),
        'edit_item'             => __( 'Edit Book', 'tt5-child' ),
        'view_item'             => __( 'View Book', 'tt5-child' ),
        'all_items'             => __( 'All Books', 'tt5-child' ),
        'search_items'          => __( 'Search Books', 'tt5-child' ),
        'parent_item_colon'     => __( 'Parent Books:', 'tt5-child' ),
        'not_found'             => __( 'No books found.', 'tt5-child' ),
        'not_found_in_trash'    => __( 'No books found in Trash.', 'tt5-child' ),
        'featured_image'        => __( 'Book Cover', 'tt5-child' ),
        'set_featured_image'    => __( 'Set book cover', 'tt5-child' ),
        'remove_featured_image' => __( 'Remove book cover', 'tt5-child' ),
        'use_featured_image'    => __( 'Use as book cover', 'tt5-child' ),
        'archives'              => __( 'Book archives', 'tt5-child' ),
        'insert_into_item'      => __( 'Insert into book', 'tt5-child' ),
        'uploaded_to_this_item' => __( 'Uploaded to this book', 'tt5-child' ),
        'filter_items_list'     => __( 'Filter books list', 'tt5-child' ),
        'items_list_navigation' => __( 'Books list navigation', 'tt5-child' ),
        'items_list'            => __( 'Books list', 'tt5-child' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array( 'slug' => 'library' ),
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-book',
        'supports'           => array( 'title', 'excerpt', 'thumbnail' ),
    );

    register_post_type( 'book_pt', $args );

    // Taxonomy: Genre
    $taxonomy_labels = array(
        'name'              => _x( 'Genres', 'taxonomy general name', 'tt5-child' ),
        'singular_name'     => _x( 'Genre', 'taxonomy singular name', 'tt5-child' ),
        'search_items'      => __( 'Search Genres', 'tt5-child' ),
        'all_items'         => __( 'All Genres', 'tt5-child' ),
        'parent_item'       => __( 'Parent Genre', 'tt5-child' ),
        'parent_item_colon' => __( 'Parent Genre:', 'tt5-child' ),
        'edit_item'         => __( 'Edit Genre', 'tt5-child' ),
        'update_item'       => __( 'Update Genre', 'tt5-child' ),
        'add_new_item'      => __( 'Add New Genre', 'tt5-child' ),
        'new_item_name'     => __( 'New Genre Name', 'tt5-child' ),
        'menu_name'         => __( 'Genres', 'tt5-child' ),
    );

    $taxonomy_args = array(
        'hierarchical'      => true,
        'labels'            => $taxonomy_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'rewrite'           => array( 'slug' => 'book-genre' ),
        'show_in_rest'      => true,
    );

    register_taxonomy( 'book_genre', array( 'book_pt' ), $taxonomy_args );
}

add_action( 'init', 'tt5_child_register_books_cpt' );
