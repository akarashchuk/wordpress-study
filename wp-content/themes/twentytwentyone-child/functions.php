<?php

acf_add_options_page([
    'page_title'    => 'Theme General Settings',
    'menu_title'    => 'Theme Settings',
    'menu_slug'     => 'theme-general-settings',
    'capability'    => 'edit_posts',
    'redirect'      => false
]);

acf_add_options_sub_page([
    'page_title'    => 'Theme Header Settings',
    'menu_title'    => 'Header',
    'parent_slug'   => 'theme-general-settings',
]);

acf_add_options_sub_page([
    'page_title'    => 'Theme Footer Settings',
    'menu_title'    => 'Footer',
    'parent_slug'   => 'theme-general-settings',
]);


add_action('init', 'register_movie_post_type');

function register_movie_post_type(): void
{
    register_post_type('movie', [
        'label' => 'Movies',
        'labels' => [
            'name' => 'Movies',
            'singular_name' => 'Movie',
        ],
        'public' => true,
        'rewrite' => ['slug' => 'movies'],
        'has_archive' => true,
        'show_in_rest' => true,
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'comments'],
    ]);

    register_taxonomy('genre', ['movie'], [
        'hierarchical' => false,
        'labels' => [
            'name' => 'Genres',
            'singular_name' => 'Genre',
        ],
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'genres'],
    ]);
}

add_action('pre_get_posts', 'add_post_types_to_query');

function add_post_types_to_query(WP_Query $query) : void
{
    if (is_home() && $query->is_main_query()) {
        $query->set('post_type', ['movie', 'post']);
    }
}

