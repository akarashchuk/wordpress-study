<?php get_header(); ?>

<?php if (have_posts()): ?>
    <header class="page-header alignwide">
        <?php the_archive_title('<h1 class="page-title">', '</h1>'); ?>
    </header>
    <?php
    while (have_posts()) {
        the_post();
        get_template_part('template-parts/movie/excerpt');
    }
    ?>
<?php else: ?>
    <?php get_template_part('template-parts/content/content-none'); ?>
<?php endif; ?>

<?php get_footer(); ?>