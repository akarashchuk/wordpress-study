<article id="movie-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php get_template_part('template-parts/header/excerpt-header', get_post_format()); ?>
    <div class="entry-content">
        <div class="post-taxonomies">
            <?php the_terms(get_the_ID(), 'genre', '<span class="cat-links">', ',', '</span>') ?>
        </div>
        <?php the_excerpt(); ?>
    </div>
</article>