<?php
defined('ABSPATH') || exit;
get_header();
?>
<main class="garage-product">
    <section class="garage-product__section">
        <p class="garage-product__label">CocheCierto Garage</p>
        <h1><?php single_term_title(); ?></h1>
        <?php $description = term_description(); if ($description) : ?><div class="garage-product__intro"><?php echo wp_kses_post($description); ?></div><?php endif; ?>
        <?php if (have_posts()) : ?>
            <div class="garage-product__listing">
                <?php while (have_posts()) : the_post(); ?>
                    <article <?php post_class(); ?>><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><?php the_excerpt(); ?></article>
                <?php endwhile; ?>
            </div>
            <?php the_posts_pagination(); ?>
        <?php else : ?>
            <p class="garage-product__notice">Aún no hay productos publicados en esta categoría.</p>
        <?php endif; ?>
    </section>
</main>
<?php get_footer();

