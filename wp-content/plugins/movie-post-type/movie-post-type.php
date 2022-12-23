<?php

/**
 * Plugin Name: Movie Post Type
 * Description: Wordpress Movie Post Type
 * Version: 0.1
 */


class MoviePlugin
{
    public function __construct()
    {
        add_action('init', [$this, 'register_post_type']);
    }

    public function activate(): void
    {
        $this->register_post_type();
        flush_rewrite_rules();
    }

    public function deactivate(): void
    {
        flush_rewrite_rules();
    }

    public function uninstall(): void
    {
        global $wpdb;

        $wpdb->query("DELETE FROM {$wpdb->posts} WHERE post_type = 'movie'");
    }

    public function register_post_type(): void
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

        if( function_exists('acf_add_local_field_group') ):

            acf_add_local_field_group(array(
                'key' => 'group_639b6dcdb4ef6',
                'title' => 'Movi2',
                'fields' => array(
                    array(
                        'key' => 'field_639b6dcefcb48',
                        'label' => 'Rating',
                        'name' => 'rating',
                        'type' => 'number',
                        'instructions' => '',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'min' => 1,
                        'max' => 100,
                        'placeholder' => '',
                        'step' => '',
                        'prepend' => '',
                        'append' => '',
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'movie',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
                'active' => true,
                'description' => '',
                'show_in_rest' => 0,
            ));

        endif;
    }
}

$plugin = new MoviePlugin();

register_activation_hook(__FILE__, [$plugin, 'activate']);
register_deactivation_hook(__FILE__, [$plugin, 'deactivate']);
register_uninstall_hook(__FILE__, [$plugin, 'uninstall']);


function movie_post_type_options_page(): void
{
    add_menu_page(
        'Movie Settings',
        'Movie Settings',
        'manage_options',
        'movie_settings',
        'movie_settings_page',
    );
}

add_action('admin_menu', 'movie_post_type_options_page');

function movie_settings_page(): void
{
    ?>
    <h1><?= get_admin_page_title(); ?></h1>
    <form method="post" action="options.php">
    <?php
    settings_fields('movie_type_settings');
    do_settings_sections('movie_settings');
    submit_button();
    ?>
    </form>
    <?php
}

function movie_settings_fields()
{
    register_setting('movie_type_settings', 'default_rating');
}
