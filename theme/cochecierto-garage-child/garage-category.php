<?php
defined('ABSPATH') || exit;
$slug = trim((string) parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH), '/');
$slug = str_replace('categorias/', '', $slug);
$categories = [
    'mantenimiento' => ['title' => 'Motor y mantenimiento', 'intro' => 'Lo esencial para mantener el coche en buen estado y detectar a tiempo lo que conviene revisar.'],
    'limpieza-cuidado' => ['title' => 'Carrocería y cuidado', 'intro' => 'Productos y criterios para cuidar el exterior y conservar mejor cada superficie.'],
    'confort' => ['title' => 'Interior y confort', 'intro' => 'Soluciones sencillas para que el interior sea más cómodo, ordenado y fácil de mantener.'],
    'neumaticos' => ['title' => 'Neumáticos', 'intro' => 'Herramientas y cuidados para revisar la presión, el desgaste y la preparación del coche antes de salir.'],
    'seguridad-emergencia' => ['title' => 'Neumáticos y seguridad', 'intro' => 'Elementos útiles para prevenir imprevistos y estar mejor preparado en carretera.'],
];
$category = $categories[$slug] ?? ['title' => 'Categoría Garaje', 'intro' => 'Recomendaciones seleccionadas para resolver necesidades concretas de tu coche.'];
get_header();
?>
<main class="garage-category"><section class="garage-category__hero"><div class="garage-shell"><p class="garage-kicker">Categoría Garaje</p><h1><?php echo esc_html($category['title']); ?></h1><p><?php echo esc_html($category['intro']); ?></p></div></section><section class="garage-category__content garage-shell"><div><p class="garage-kicker">Explora con criterio</p><h2>Antes de elegir, entiende qué necesitas.</h2><div class="garage-category__listing"><p class="garage-category__empty">Estamos preparando una selección revisada de productos para esta categoría. Mientras tanto, consulta la guía que mejor encaje con tu momento.</p></div></div><aside><p class="garage-kicker">Primer paso recomendado</p><h2>Primeras 72 horas.</h2><p>Una lista sencilla para revisar lo importante antes de llenar el coche de compras.</p><a class="garage-button garage-button--orange" href="<?php echo esc_url(home_url('/guias/primeras-72-horas/')); ?>">Ver la guía <span>↗</span></a></aside></section></main>
<?php get_footer();
