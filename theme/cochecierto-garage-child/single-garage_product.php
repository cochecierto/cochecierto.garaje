<?php
defined('ABSPATH') || exit;
get_header();
?>
<main class="garage-product">
    <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class('garage-product__section'); ?>>
            <p class="garage-product__label">CocheCierto Garage</p>
            <h1><?php the_title(); ?></h1>
            <?php if (has_post_thumbnail()) : ?><figure><?php the_post_thumbnail('large'); ?></figure><?php endif; ?>
            <section aria-labelledby="garage-summary-title"><h2 id="garage-summary-title">Qué problema resuelve</h2><?php the_excerpt(); ?></section>
            <section aria-labelledby="garage-details-title"><h2 id="garage-details-title">Información editorial</h2><?php the_content(); ?></section>
            <?php $limitations = get_post_meta(get_the_ID(), 'garage_limitations', true); $compatibility = get_post_meta(get_the_ID(), 'garage_compatibility_checks', true); $provider = get_post_meta(get_the_ID(), 'garage_provider', true); $offer_url = get_post_meta(get_the_ID(), 'garage_affiliate_url', true); $offer_status = get_post_meta(get_the_ID(), 'garage_offer_status', true); $price = get_post_meta(get_the_ID(), 'garage_price', true); $currency = get_post_meta(get_the_ID(), 'garage_currency', true); ?>
            <?php if ($limitations) : ?><section aria-labelledby="garage-limitations-title"><h2 id="garage-limitations-title">Limitaciones</h2><p><?php echo esc_html($limitations); ?></p></section><?php endif; ?>
            <?php if ($compatibility) : ?><section aria-labelledby="garage-compatibility-title"><h2 id="garage-compatibility-title">Qué debes comprobar</h2><p><?php echo esc_html($compatibility); ?></p></section><?php endif; ?>
            <?php if ($provider) : ?><p class="garage-product__notice">Proveedor indicado: <?php echo esc_html($provider); ?>. Comprueba siempre las condiciones actuales antes de comprar.</p><?php endif; ?>
            <?php if ('active' === $offer_status && $offer_url) : ?>
                <?php if ($price && $currency) : ?><p>Precio verificado: <?php echo esc_html($price . ' ' . $currency); ?>. Compruébalo de nuevo en el proveedor.</p><?php endif; ?>
                <p><a class="garage-product__cta" href="<?php echo esc_url($offer_url); ?>" rel="sponsored nofollow">Ver producto en el proveedor</a></p>
            <?php else : ?>
                <p class="garage-product__notice">No hay una oferta disponible para este producto en este momento.</p>
            <?php endif; ?>
            <p class="garage-product__notice">Algunos enlaces pueden ser enlaces de afiliado. Si compras a través de ellos, CocheCierto puede recibir una comisión sin coste adicional para ti.</p>
        </article>
    <?php endwhile; ?>
</main>
<?php get_footer();
