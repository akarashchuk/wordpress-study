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

add_action('pre_get_posts', 'add_post_types_to_query');

function add_post_types_to_query(WP_Query $query) : void
{
    if (is_home() && $query->is_main_query()) {
        $query->set('post_type', ['movie', 'post']);
    }
}

function maintenance_mode(): void
{
    if (!is_user_logged_in() && $GLOBALS['pagenow'] !== 'wp-login.php') {
        die('Maintenance');
    }
}

add_action('init', 'maintenance_mode', 0);

function redirect_after_login(): void
{
    wp_redirect(get_permalink(3));
    exit();
}

add_action('wp_login', 'redirect_after_login');

function admin_notice_message(): void
{
    ?>
    <div class="notice notice-warning is-dismissible">
        <p>This is example of notice message</p>
    </div>
    <?php
}

add_action('admin_notices', 'admin_notice_message');

function prepend_word_to_title(string $title): string
{
    return 'Article: ' . $title;
}

add_filter('the_title', 'prepend_word_to_title', 10, 1);

function filter_words_in_text(string $text): string
{
    return str_replace(['блять'], '***', $text);
}

add_filter('comment_text', 'filter_words_in_text');
add_filter('the_title', 'filter_words_in_text');


function hide_commenter_name(): string
{
    return '';
}

add_filter('get_comment_author', 'hide_commenter_name');

add_filter('admin_bar_menu', 'change_howdy', 20);
function change_howdy($wp_admin_bar): void
{
    $node = [
        'id' => 'my-account',
        'title' => 'Hi Admin',
    ];

    $wp_admin_bar->add_node($node);

//    $wp_admin_bar->remove_node('my-account');
}
