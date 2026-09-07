<?php
defined('ABSPATH') || exit;

$priority_labels = [
    'imprescindible' => ['label' => 'Imprescindible', 'class' => 'garage-badge--must'],
    'recomendable'   => ['label' => 'Recomendable', 'class' => 'garage-badge--rec'],
    'opcional'       => ['label' => 'Solo si lo necesitas', 'class' => 'garage-badge--opt'],
];

get_header();
?>
<main class="garage-catalog-view">
    <section class="garage-catalog-hero">
        <div class="garage-shell">
            <nav class="garage-product-breadcrumb" aria-label="Ruta de navegación">
                <a href="<?php echo esc_url(home_url('/')); ?>">Garaje</a> <span>/</span>
                <span aria-current="page">Recomendaciones</span>
            </nav>
            <p class="garage-kicker">Catálogo Editorial · CocheCierto Garaje</p>
            <h1>Recomendaciones verificadas</h1>
            <p class="garage-catalog-hero__desc">
                Criterio editorial antes que comisión. Cada ficha explica para quién sirve, qué comprobar y sus limitaciones reales.
            </p>
        </div>
    </section>

    <section class="garage-section">
        <div class="garage-shell">
            <div class="garage-section__heading">
                <div>
                    <p class="garage-kicker">Catálogo global</p>
                    <h2>Todos los productos analizados</h2>
                </div>
                <small class="garage-trust-hint">ⓘ Prioridad: Imprescindible · Recomendable · Opcional</small>
            </div>

            <?php if (have_posts()) : ?>
                <div class="garage-products-grid">
                    <?php while (have_posts()) : the_post(); 
                        $pid = get_the_ID();
                        $priority = get_post_meta($pid, 'garage_priority', true) ?: 'recomendable';
                        $benefit = get_post_meta($pid, 'garage_benefit', true);
                        $price = get_post_meta($pid, 'garage_price', true);
                        $currency = get_post_meta($pid, 'garage_currency', true) ?: '€';
                        $badge = $priority_labels[$priority] ?? $priority_labels['recomendable'];
                    ?>
                        <article class="garage-product-card">
                            <div class="garage-product-card__header">
                                <span class="garage-priority-badge <?php echo esc_attr($badge['class']); ?>">
                                    ● <?php echo esc_html($badge['label']); ?>
                                </span>
                                <?php if ($price) : ?>
                                    <span class="garage-product-card__price"><?php echo esc_html($price . ' ' . $currency); ?></span>
                                <?php endif; ?>
                            </div>

                            <a href="<?php the_permalink(); ?>" class="garage-product-card__thumb-link">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium', ['class' => 'garage-product-card__img']); ?>
                                <?php else : ?>
                                    <div class="garage-product-card__placeholder">🚗</div>
                                <?php endif; ?>
                            </a>

                            <div class="garage-product-card__content">
                                <h3 class="garage-product-card__title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                
                                <?php if ($benefit) : ?>
                                    <p class="garage-product-card__benefit"><?php echo esc_html($benefit); ?></p>
                                <?php elseif (has_excerpt()) : ?>
                                    <p class="garage-product-card__benefit"><?php echo wp_strip_all_tags(get_the_excerpt()); ?></p>
                                <?php endif; ?>

                                <div class="garage-product-card__actions">
                                    <a href="<?php the_permalink(); ?>" class="garage-button garage-button--orange garage-button--full">
                                        Ver criterio y ficha <span>→</span>
                                    </a>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>

                <div class="garage-pagination">
                    <?php the_posts_pagination([
                        'prev_text' => '← Anterior',
                        'next_text' => 'Siguiente →',
                    ]); ?>
                </div>
            <?php else : ?>
                <div class="garage-catalog-empty">
                    <p class="garage-kicker">Catálogo en proceso de verificación</p>
                    <h3>Estamos validando fichas técnicas para garantizar compatibilidad real.</h3>
                    <p>Mientras tanto, te recomendamos empezar por una de nuestras guías paso a paso para no comprar a ciegas.</p>
                    <div class="garage-catalog-empty__actions">
                        <a class="garage-button garage-button--orange" href="<?php echo esc_url(home_url('/guias/primeras-72-horas/')); ?>">
                            Ver guía: Primeras 72 horas <span>→</span>
                        </a>
                        <a class="garage-button garage-button--dark" href="<?php echo esc_url(home_url('/#garage-despiece')); ?>">
                            Explorar despiece interactivo <span>↓</span>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
</main>
<?php
get_footer();

