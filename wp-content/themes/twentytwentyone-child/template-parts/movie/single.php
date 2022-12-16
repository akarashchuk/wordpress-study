<article id="movie-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header alignwide">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
        <?php twenty_twenty_one_post_thumbnail(); ?>
    </header>
    <div class="entry-content">
        <div class="post-taxonomies">
            <?php the_terms(get_the_ID(), 'genre', '<span class="cat-links">', ',', '</span>') ?>
        </div>
        <span>Rating: <?php the_field('rating'); ?></span>
        <?php the_content(); ?>
    </div>
</article>