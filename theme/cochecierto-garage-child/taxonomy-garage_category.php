<?php
defined('ABSPATH') || exit;
$term = get_queried_object();
$intro = [
    'mantenimiento' => 'Lo esencial para mantener el coche en buen estado y detectar a tiempo lo que conviene revisar.',
    'limpieza-cuidado' => 'Productos y criterios para cuidar el exterior y conservar mejor cada superficie.',
    'confort' => 'Soluciones sencillas para que el interior sea más cómodo, ordenado y fácil de mantener.',
    'seguridad-emergencia' => 'Elementos útiles para prevenir imprevistos y estar mejor preparado en carretera.',
    'viajes-organizacion' => 'Ideas para organizar el coche y viajar con más tranquilidad y menos improvisación.',
];
$text = $intro[$term->slug] ?? 'Recomendaciones seleccionadas para resolver necesidades concretas de tu coche.';
get_header();
?>
<main class="garage-category"><section class="garage-category__hero"><div class="garage-shell"><p class="garage-kicker">Categoría Garage</p><h1><?php single_term_title(); ?></h1><p><?php echo esc_html($text); ?></p></div></section><section class="garage-category__content garage-shell"><div><p class="garage-kicker">Explora con criterio</p><h2>Antes de elegir, entiende qué necesitas.</h2><?php $description = term_description(); if ($description) : ?><div class="garage-category__intro"><?php echo wp_kses_post($description); ?></div><?php endif; ?><div class="garage-category__listing"><?php if (have_posts()) : while (have_posts()) : the_post(); ?><article><p class="garage-kicker">Producto Garage</p><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3><?php the_excerpt(); ?></article><?php endwhile; else : ?><p class="garage-category__empty">Todavía estamos revisando productos para esta categoría. Mientras tanto, consulta una guía para saber por dónde empezar.</p><?php endif; ?></div></div><aside><p class="garage-kicker">¿Acabas de comprar un coche?</p><h2>Empieza por las primeras 72 horas.</h2><p>Una lista sencilla para revisar lo importante antes de llenar el coche de compras.</p><a class="garage-button garage-button--orange" href="<?php echo esc_url(home_url('/guias/primeras-72-horas/')); ?>">Ver la guía <span>↗</span></a></aside></section></main>
<?php get_footer();
