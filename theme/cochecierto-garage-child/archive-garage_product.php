<?php
defined('ABSPATH') || exit;
get_header();
?>
<main class="garage-product"><section class="garage-product__section"><p class="garage-product__label">CocheCierto Garage</p><h1>Productos recomendados</h1>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?><article <?php post_class(); ?>><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><?php the_excerpt(); ?></article><?php endwhile; the_posts_pagination(); else : ?><p>Aún no hay productos publicados.</p><?php endif; ?>
</section></main>
<?php get_footer();

