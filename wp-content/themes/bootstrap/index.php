<?php get_header(); ?>

<h1>Hello World</h1>

<?php if (have_posts()): ?>
    <?php while(have_posts()): the_post(); ?>
        <h2 class="card-title">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>
        <div class="card mb-4">
            <div class="card-body">
                <?php if (has_post_thumbnail()): ?>
                    <img src="<?php echo get_the_post_thumbnail_url();?>" alt="" class="card-img-top">
                <?php endif; ?>
                <p class="card-text">
                    <small class="text-muted">
                        <?php the_time('j F Y'); ?>
                    </small>
                    <?php the_tags(); ?>
                    <?php the_excerpt(); ?>
                    <a href="<?php the_permalink(); ?>" class="btn btn-primary shadow-none">
                        Читать дальше
                    </a>
                </p>
            </div>
        </div>
    <?php endwhile; ?>
<?php else: ?>
    <h3>Постов нету</h3>
<?php endif; ?>
<?php the_posts_pagination(); ?>


<?php get_footer(); ?>
