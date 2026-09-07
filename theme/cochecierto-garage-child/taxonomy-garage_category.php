<?php
defined('ABSPATH') || exit;

$term = get_queried_object();
$intro = [
    'mantenimiento'          => 'Lo esencial para mantener el coche en buen estado mecánico, prevenir averías y detectar a tiempo desgastes sin pasar por taller innecesariamente.',
    'limpieza-cuidado'       => 'Técnicas y productos para cuidar la pintura sin microarañazos, descontaminar la laca y conservar cristales y molduras exteriores.',
    'interior-confort'       => 'Higiene del habitáculo, acabados mate sin brillos grasientos, protección UV para el salpicadero y soluciones para una marcha cómoda.',
    'ruedas-neumaticos'      => 'Manómetros digitales para medir presión en frío, compresores compactos a batería y herramientas antipinchazos fiables.',
    'seguridad-emergencia'   => 'Balizas V16 homologadas DGT 3.0 con eSIM anónima, chalecos reflectantes y kits de asistencia inmediata en carretera.',
    'tecnologia-conectividad'=> 'Soportes de móvil magnéticos homologados, cargadores de alta potencia USB-C Power Delivery y diagnosis OBD2 explicativa.',
    'viajes-organizacion'    => 'Organizadores de maletero, redes de retención de carga, protectores de asientos para mascotas y parasoles térmicos.',
    'accesorios-equipamiento'=> 'Equipamiento práctico contrastado para resolver situaciones cotidianas sin llenar el coche de compras superfluas.',
];

$text = $intro[$term->slug] ?? 'Recomendaciones editoriales seleccionadas para resolver necesidades concretas de tu coche.';

$priority_labels = [
    'imprescindible' => ['label' => 'Imprescindible', 'class' => 'garage-badge--must'],
    'recomendable'   => ['label' => 'Recomendable', 'class' => 'garage-badge--rec'],
    'opcional'       => ['label' => 'Solo si lo necesitas', 'class' => 'garage-badge--opt'],
];

get_header();
?>
<main class="garage-category-view">
    <section class="garage-catalog-hero">
        <div class="garage-shell">
            <nav class="garage-product-breadcrumb" aria-label="Ruta de navegación">
                <a href="<?php echo esc_url(home_url('/')); ?>">Garaje</a> <span>/</span>
                <a href="<?php echo esc_url(home_url('/productos/')); ?>">Catálogo</a> <span>/</span>
                <span aria-current="page"><?php single_term_title(); ?></span>
            </nav>
            <p class="garage-kicker">Categoría Editorial · <?php single_term_title(); ?></p>
            <h1><?php single_term_title(); ?></h1>
            <p class="garage-catalog-hero__desc"><?php echo esc_html($text); ?></p>
        </div>
    </section>

    <section class="garage-section">
        <div class="garage-shell">
            <div class="garage-section__heading">
                <div>
                    <p class="garage-kicker">Criterio antes que compra</p>
                    <h2>Recomendaciones para esta necesidad</h2>
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
                    <p class="garage-kicker">Selección en proceso editorial</p>
                    <h3>Estamos redactando fichas con criterio y límites reales para esta categoría.</h3>
                    <p>Mientras tanto, puedes consultar las comprobaciones esenciales de mantenimiento en nuestras guías.</p>
                    <div class="garage-catalog-empty__actions">
                        <a class="garage-button garage-button--orange" href="<?php echo esc_url(home_url('/guias/primeras-72-horas/')); ?>">
                            Ver guía: Primeras 72 horas <span>→</span>
                        </a>
                        <a class="garage-button garage-button--dark" href="<?php echo esc_url(home_url('/productos/')); ?>">
                            Volver al catálogo <span>←</span>
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
                <p class="garage-kicker">Criterio editorial Garaje</p>
                <h2>Transparencia antes de comprar</h2>
            </div>
            <div class="garage-trust-points">
                <p><strong>✓ Entiende antes de elegir</strong><span>Explicamos para qué sirve cada producto y qué debes comprobar en tu vehículo.</span></p>
                <p><strong>✓ Compatibilidad contrastada</strong><span>Te alertamos sobre medidas, normas y compatibilidad antes de realizar cualquier compra.</span></p>
                <p><strong>✓ Afiliación sin sobrecoste</strong><span>Los enlaces externos pueden generar una comisión sin coste para ti.</span></p>
            </div>
        </div>
    </section>
</main>
<?php
get_footer();
