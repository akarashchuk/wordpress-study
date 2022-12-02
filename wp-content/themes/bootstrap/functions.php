<?php

function add_stylesheet(): void {
    wp_enqueue_style(
        'bootstrap',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css'
    );

    wp_enqueue_style(
        'theme-style',
//        get_template_directory_uri() . '/style.css'
        get_stylesheet_uri()
    );

    wp_enqueue_script(
        'bootstrap',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js'
    );
}

add_action('wp_enqueue_scripts', 'add_stylesheet');

add_theme_support('post-thumbnails');
