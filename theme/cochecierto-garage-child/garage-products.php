<?php
defined('ABSPATH') || exit;

$catalog_categories = [
    [
        'slug' => 'mantenimiento',
        'icon' => '🔧',
        'name' => 'Mantenimiento',
        'desc' => 'Aceites con norma exacta, filtros, diagnosis OBD2 y comprobaciones clave.',
    ],
    [
        'slug' => 'limpieza-cuidado',
        'icon' => '🧼',
        'name' => 'Limpieza y cuidado',
        'desc' => 'Lavado seguro sin microarañazos, descontaminado y protección exterior.',
    ],
    [
        'slug' => 'interior-confort',
        'icon' => '🛋️',
        'name' => 'Interior y confort',
        'desc' => 'Higiene del habitáculo, acabados mate antipolvo y ergonomía de marcha.',
    ],
    [
        'slug' => 'ruedas-neumaticos',
        'icon' => '🛞',
        'name' => 'Ruedas y neumáticos',
        'desc' => 'Manómetros digitales, compresores portátiles y kits antipinchazos.',
    ],
    [
        'slug' => 'seguridad-emergencia',
        'icon' => '🚨',
        'name' => 'Seguridad y emergencia',
        'desc' => 'Balizas V16 conectadas DGT 3.0, chalecos y herramientas de rescate.',
    ],
    [
        'slug' => 'tecnologia-conectividad',
        'icon' => '📱',
        'name' => 'Tecnología y conectividad',
        'desc' => 'Soportes homologados, cargadores rápidos y dashcams con criterio.',
    ],
    [
        'slug' => 'viajes-organizacion',
        'icon' => '🧳',
        'name' => 'Viajes y organización',
        'desc' => 'Bolsas para maletero, redes de sujeción y parasoles térmicos a medida.',
    ],
    [
        'slug' => 'accesorios-equipamiento',
        'icon' => '🧰',
        'name' => 'Accesorios y equipamiento',
        'desc' => 'Soluciones útiles para situaciones concretas sin compras superfluas.',
    ],
];

$priority_labels = [
    'imprescindible' => ['label' => 'Imprescindible', 'class' => 'garage-badge--must'],
    'recomendable'   => ['label' => 'Recomendable', 'class' => 'garage-badge--rec'],
    'opcional'       => ['label' => 'Solo si lo necesitas', 'class' => 'garage-badge--opt'],
];

get_header();
?>
<main class="garage-catalog-view">
    <!-- Hero del Catálogo -->
    <section class="garage-catalog-hero">
        <div class="garage-shell">
            <p class="garage-kicker">Catálogo Editorial · CocheCierto Garaje</p>
            <h1>Recomendaciones útiles. Cero compras a ciegas.</h1>
            <p class="garage-catalog-hero__desc">
                Organizado por necesidad real, no por comisión. Cada producto incluye qué problema resuelve, qué debes comprobar antes de comprar y sus limitaciones reales.
            </p>
        </div>
    </section>

    <!-- Selector de Categorías de Intención de Compra (Sección 8.2) -->
    <section class="garage-section garage-section--categories" aria-labelledby="catalog-categories-title">
        <div class="garage-shell">
            <div class="garage-section__heading">
                <div>
                    <p class="garage-kicker">Ruta por necesidad</p>
                    <h2 id="catalog-categories-title">¿Para qué lo necesitas?</h2>
                </div>
                <span class="garage-step-label">8 Categorías de compra</span>
            </div>

            <div class="garage-category-grid">
                <?php foreach ($catalog_categories as $cat) : 
                    $cat_url = home_url('/categorias/' . $cat['slug'] . '/');
                ?>
                    <a class="garage-category-tile" href="<?php echo esc_url($cat_url); ?>">
                        <div class="garage-category-tile__icon" aria-hidden="true"><?php echo esc_html($cat['icon']); ?></div>
                        <div class="garage-category-tile__body">
                            <strong class="garage-category-tile__name"><?php echo esc_html($cat['name']); ?></strong>
                            <p class="garage-category-tile__desc"><?php echo esc_html($cat['desc']); ?></p>
                        </div>
                        <span class="garage-category-tile__arrow" aria-hidden="true">→</span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Cuadrícula de Productos Destacados -->
    <section class="garage-section garage-section--products" aria-labelledby="catalog-products-title">
        <div class="garage-shell">
            <div class="garage-section__heading">
                <div>
                    <p class="garage-kicker">Selección contrastada</p>
                    <h2 id="catalog-products-title">Productos analizados con criterio editorial</h2>
                </div>
                <small class="garage-trust-hint">ⓘ Prioridad: Imprescindible · Recomendable · Opcional</small>
            </div>

            <?php
            $products_query = new WP_Query([
                'post_type'      => 'garage_product',
                'posts_per_page' => 12,
                'post_status'    => 'publish',
            ]);

            if ($products_query->have_posts()) : ?>
                <div class="garage-products-grid">
                    <?php while ($products_query->have_posts()) : $products_query->the_post(); 
                        $pid = get_the_ID();
                        $priority = get_post_meta($pid, 'garage_priority', true) ?: 'recomendable';
                        $benefit = get_post_meta($pid, 'garage_benefit', true);
                        $price = get_post_meta($pid, 'garage_price', true);
                        $currency = get_post_meta($pid, 'garage_currency', true) ?: '€';
                        $provider = get_post_meta($pid, 'garage_provider', true) ?: 'Amazon';
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
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            <?php else : ?>
                <!-- Estado editorial vacío guiado -->
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

    <!-- Transparencia al pie -->
    <section class="garage-section garage-section--trust">
        <div class="garage-shell garage-trust-grid">
            <div>
                <p class="garage-kicker">Transparencia editorial</p>
                <h2>Por qué puedes confiar en Garaje</h2>
            </div>
            <div class="garage-trust-points">
                <p><strong>✓ Prioridad sobre la comisión</strong><span>Recomendamos lo que necesitas, no lo que genera mayor margen.</span></p>
                <p><strong>✓ Comprobaciones antes de comprar</strong><span>Te explicamos qué medidas o normas verificar en el manual de tu coche.</span></p>
                <p><strong>✓ Afiliación visible</strong><span>Los enlaces externos indican siempre el proveedor y que pueden generar una comisión sin coste para ti.</span></p>
            </div>
        </div>
    </section>
</main>
<?php
get_footer();
