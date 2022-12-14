<?php
/*
Template Name: Movie Review
Template Post Type: post
*/

get_header();

/* Start the Loop */
while ( have_posts() ) :
    the_post();

    get_template_part( 'template-parts/content/content-page' );
?>
    <div class="entry-content">
        <p>Theme Name: <?php the_field('theme_name', 'option'); ?></p>
        <p> Title: <?php the_field('title'); ?></p>
        <p> Description: <?php the_field('description'); ?></p>
        <p> Release Date: <?php the_field('release_date'); ?></p>
    </div>
<?php
    // If comments are open or there is at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) {
        comments_template();
    }
endwhile; // End of the loop.

get_footer();
