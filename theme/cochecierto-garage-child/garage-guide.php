<?php
defined('ABSPATH') || exit;
$slug = trim((string) parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH), '/');
$slug = str_replace('guias/', '', $slug);
$guides = [
    'primeras-72-horas' => ['title' => 'Primeras 72 horas con tu coche', 'intro' => 'Acabas de estrenar una etapa. Antes de comprar más, empieza por comprobar lo importante.', 'items' => ['Revisa la documentación y guarda una copia accesible.', 'Comprueba presión y estado visible de los neumáticos.', 'Verifica luces, testigos del cuadro y niveles básicos.', 'Prepara un pequeño kit de emergencia y organización.']],
    'primeros-30-dias' => ['title' => 'Primeros 30 días con tu coche', 'intro' => 'Conoce el estado real del coche y prepara una base sencilla para usarlo con tranquilidad.', 'items' => ['Anota mantenimientos pendientes y fechas conocidas.', 'Revisa batería, neumáticos, luces y limpiaparabrisas.', 'Organiza el interior y elimina lo que no necesitas.', 'Prepara productos de limpieza y herramientas básicas.']],
    'primeros-60-dias' => ['title' => 'Primeros 60 días con tu coche', 'intro' => 'Ya tienes experiencia de uso: ahora puedes completar el equipamiento que realmente necesitas.', 'items' => ['Detecta molestias repetidas durante tus trayectos.', 'Prepara el coche para tus viajes habituales.', 'Añade soluciones de organización y confort si aportan utilidad.', 'Compara alternativas antes de comprar accesorios.']],
    'primeros-90-dias' => ['title' => 'Primeros 90 días con tu coche', 'intro' => 'Convierte las comprobaciones iniciales en una rutina de cuidado clara y sostenible.', 'items' => ['Revisa consumibles y señales de desgaste.', 'Programa recordatorios de mantenimiento.', 'Comprueba el estado exterior e interior.', 'Decide qué productos merecen quedarse en tu kit.']],
    'primer-ano' => ['title' => 'Tu primer año con el coche', 'intro' => 'Anticípate a estaciones, viajes y mantenimiento sin llenar el maletero de compras innecesarias.', 'items' => ['Prepara el cambio de estación con tiempo.', 'Revisa neumáticos, batería y elementos de emergencia.', 'Planifica viajes y necesidades familiares o de mascotas.', 'Conserva facturas, fechas y comprobaciones importantes.']],
];
$guide = $guides[$slug] ?? $guides['primeras-72-horas'];
get_header();
?>
<main class="garage-guide"><section class="garage-guide__hero"><div class="garage-shell"><p class="garage-kicker">Guía Garaje · <?php echo esc_html($slug); ?></p><h1><?php echo esc_html($guide['title']); ?></h1><p><?php echo esc_html($guide['intro']); ?></p></div></section><section class="garage-guide__body garage-shell"><div><h2>Qué revisar</h2><ul><?php foreach ($guide['items'] as $item) : ?><li><?php echo esc_html($item); ?></li><?php endforeach; ?></ul></div><aside><p class="garage-kicker">Siguiente paso</p><h2>Entiende la necesidad antes de comprar.</h2><p>Consulta las categorías de Garaje y revisa qué productos pueden ayudarte, con sus ventajas y límites.</p><a class="garage-button garage-button--orange" href="<?php echo esc_url(home_url('/productos/')); ?>">Explorar productos <span>↗</span></a></aside></section></main>
<?php get_footer();
