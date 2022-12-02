<?php get_header(); ?>
<?php //while (have_posts()): the_post(); ?>
    <h1 class="my-4 page-title"><?php the_title(); ?></h1>
    <?php the_content(); ?>
    <?php comments_template(); ?>
<?php //endwhile; ?>
<?php get_footer(); ?>