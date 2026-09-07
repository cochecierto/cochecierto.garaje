<?php
defined('ABSPATH') || exit;

get_header();
?>
<main class="garage-product-view">
    <?php while (have_posts()) : the_post(); 
        $product_id = get_the_ID();
        $priority = get_post_meta($product_id, 'garage_priority', true) ?: 'recomendable';
        $benefit = get_post_meta($product_id, 'garage_benefit', true);
        $recommended_for = get_post_meta($product_id, 'garage_recommended_for', true);
        $limitations = get_post_meta($product_id, 'garage_limitations', true);
        $compatibility = get_post_meta($product_id, 'garage_compatibility_checks', true);
        $provider = get_post_meta($product_id, 'garage_provider', true) ?: 'Amazon';
        $offer_url = get_post_meta($product_id, 'garage_affiliate_url', true);
        $offer_status = get_post_meta($product_id, 'garage_offer_status', true) ?: 'active';
        $price = get_post_meta($product_id, 'garage_price', true);
        $currency = get_post_meta($product_id, 'garage_currency', true) ?: '€';

        $priority_labels = [
            'imprescindible' => ['label' => 'Imprescindible', 'class' => 'garage-badge--must', 'desc' => 'Elemento esencial de seguridad o mantenimiento crítico'],
            'recomendable'   => ['label' => 'Recomendable', 'class' => 'garage-badge--rec', 'desc' => 'Aporta durabilidad, ahorro preventivo y tranquilidad'],
            'opcional'       => ['label' => 'Solo si lo necesitas', 'class' => 'garage-badge--opt', 'desc' => 'Equipamiento adicional según tu tipo de uso'],
        ];
        $badge_data = $priority_labels[$priority] ?? $priority_labels['recomendable'];
    ?>
        <article <?php post_class('garage-product-card-editorial'); ?>>
            <div class="garage-shell">
                
                <!-- Encabezado de Criterio Editorial -->
                <nav class="garage-product-breadcrumb" aria-label="Ruta de navegación">
                    <a href="<?php echo esc_url(home_url('/')); ?>">Garaje</a> <span>/</span>
                    <a href="<?php echo esc_url(home_url('/productos/')); ?>">Recomendaciones</a> <span>/</span>
                    <span aria-current="page"><?php the_title(); ?></span>
                </nav>

                <div class="garage-product-hero">
                    <div class="garage-product-hero__header">
                        <div class="garage-product-priority-bar">
                            <span class="garage-priority-badge <?php echo esc_attr($badge_data['class']); ?>">
                                ● <?php echo esc_html($badge_data['label']); ?>
                            </span>
                            <span class="garage-priority-hint"><?php echo esc_html($badge_data['desc']); ?></span>
                        </div>
                        <h1 class="garage-product-title"><?php the_title(); ?></h1>
                        <?php if ($recommended_for) : ?>
                            <p class="garage-product-for"><strong>Para quién:</strong> <?php echo esc_html($recommended_for); ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="garage-product-layout">
                        <!-- Columna Visual y Salida Externa -->
                        <div class="garage-product-media">
                            <?php if (has_post_thumbnail()) : ?>
                                <figure class="garage-product-figure">
                                    <?php the_post_thumbnail('large', ['class' => 'garage-product-img', 'alt' => get_the_title()]); ?>
                                </figure>
                            <?php else : ?>
                                <div class="garage-product-figure garage-product-figure--placeholder">
                                    <span>Foto técnica de producto en revisión</span>
                                </div>
                            <?php endif; ?>

                            <!-- Tarjeta de Salida Externa Transparente -->
                            <aside class="garage-product-checkout-box" aria-label="Información de compra y proveedor">
                                <div class="garage-checkout-meta">
                                    <span class="garage-provider-name">Proveedor inicial: <strong><?php echo esc_html($provider); ?></strong></span>
                                    <?php if ($price) : ?>
                                        <span class="garage-price-tag">Ref: <?php echo esc_html($price . ' ' . $currency); ?></span>
                                    <?php endif; ?>
                                </div>

                                <?php if ('active' === $offer_status && $offer_url) : ?>
                                    <a class="garage-button garage-button--orange garage-button--full" 
                                       href="<?php echo esc_url($offer_url); ?>" 
                                       target="_blank" 
                                       rel="sponsored nofollow noopener">
                                        Ver precio en <?php echo esc_html($provider); ?> <span>↗</span>
                                    </a>
                                <?php else : ?>
                                    <p class="garage-product-notice">En este momento estamos revisando la disponibilidad de este producto.</p>
                                    <a class="garage-button garage-button--dark garage-button--full" href="<?php echo esc_url(home_url('/productos/')); ?>">
                                        Ver alternativas en catálogo <span>→</span>
                                    </a>
                                <?php endif; ?>

                                <div class="garage-affiliate-disclosure">
                                    <p>ⓘ <strong>Transparencia:</strong> Enlace de afiliación; puede generar una comisión sin coste adicional para ti si compras.</p>
                                </div>
                            </aside>
                        </div>

                        <!-- Columna Editorial y Criterio -->
                        <div class="garage-product-details">
                            
                            <!-- 1. ¿Para qué sirve? -->
                            <section class="garage-editorial-block" aria-labelledby="section-benefit">
                                <h2 id="section-benefit" class="garage-editorial-block__title">
                                    <span class="garage-block-icon">🎯</span> ¿Para qué sirve?
                                </h2>
                                <div class="garage-editorial-block__content">
                                    <?php if ($benefit) : ?>
                                        <p class="garage-lead-benefit"><?php echo esc_html($benefit); ?></p>
                                    <?php endif; ?>
                                    <?php if (has_excerpt()) : ?>
                                        <div class="garage-excerpt"><?php the_excerpt(); ?></div>
                                    <?php endif; ?>
                                </div>
                            </section>

                            <!-- 2. Análisis editorial independiente -->
                            <?php if (get_the_content()) : ?>
                                <section class="garage-editorial-block" aria-labelledby="section-editorial">
                                    <h2 id="section-editorial" class="garage-editorial-block__title">
                                        <span class="garage-block-icon">📝</span> Criterio editorial
                                    </h2>
                                    <div class="garage-editorial-block__content">
                                        <?php the_content(); ?>
                                    </div>
                                </section>
                            <?php endif; ?>

                            <!-- 3. Qué debes comprobar antes de comprar -->
                            <?php if ($compatibility) : ?>
                                <section class="garage-editorial-block garage-editorial-block--check" aria-labelledby="section-check">
                                    <h2 id="section-check" class="garage-editorial-block__title">
                                        <span class="garage-block-icon">⚠️</span> Antes de comprar, comprueba
                                    </h2>
                                    <div class="garage-editorial-block__content">
                                        <p><?php echo esc_html($compatibility); ?></p>
                                        <p class="garage-compatibility-note">
                                            <em>Compatible por tipo de uso. Confirma medidas, referencia o manual de tu vehículo antes de comprar.</em>
                                        </p>
                                    </div>
                                </section>
                            <?php endif; ?>

                            <!-- 4. Limitaciones reales -->
                            <?php if ($limitations) : ?>
                                <section class="garage-editorial-block garage-editorial-block--warning" aria-labelledby="section-limits">
                                    <h2 id="section-limits" class="garage-editorial-block__title">
                                        <span class="garage-block-icon">✋</span> Ventajas y limitaciones reales
                                    </h2>
                                    <div class="garage-editorial-block__content">
                                        <p><?php echo esc_html($limitations); ?></p>
                                    </div>
                                </section>
                            <?php endif; ?>

                            <!-- Retención contextual sin registro -->
                            <div class="garage-product-retention">
                                <p><strong>¿Quieres guardar esta recomendación?</strong></p>
                                <p class="garage-retention-sub">Puedes guardarla en este dispositivo para consultarla cuando la necesites.</p>
                                <button type="button" class="garage-button garage-button--outline garage-save-item-btn" data-product-id="<?php echo esc_attr($product_id); ?>">
                                    ⭐ Guardar en este dispositivo
                                </button>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </article>
    <?php endwhile; ?>
</main>
<?php get_footer();
