<?php
defined('ABSPATH') || exit;

$categories = [
    ['label' => 'Cuidado', 'text' => 'Interior, exterior y protección', 'icon' => '✦', 'url' => home_url('/categoria-garage/cuidado/')],
    ['label' => 'Seguridad', 'text' => 'Prevención y emergencia', 'icon' => '＋', 'url' => home_url('/categoria-garage/seguridad-emergencia/')],
    ['label' => 'Mantenimiento', 'text' => 'Lo esencial para tu coche', 'icon' => '↗', 'url' => home_url('/categoria-garage/mantenimiento/')],
    ['label' => 'Viajes', 'text' => 'Más comodidad en carretera', 'icon' => '→', 'url' => home_url('/categoria-garage/viajes/')],
];

get_header();
?>
<main class="garage-home">
    <section class="garage-hero" aria-labelledby="garage-hero-title">
        <div class="garage-shell garage-hero__grid">
            <div class="garage-hero__copy">
                <p class="garage-kicker"><span></span> CocheCierto Garage</p>
                <h1 id="garage-hero-title">Todo lo que tu coche necesita, <em>con criterio.</em></h1>
                <p class="garage-hero__lead">Recomendaciones útiles para cuidar, mantener y equipar tu coche sin perder tiempo entre miles de opciones.</p>
                <div class="garage-search-card" role="search">
                    <label for="garage-search">¿Qué necesitas resolver hoy?</label>
                    <div class="garage-search-card__row"><input id="garage-search" type="search" placeholder="Ej.: preparar un viaje largo" aria-label="Buscar una necesidad" /><button type="button" class="garage-button garage-button--orange">Buscar <span aria-hidden="true">↗</span></button></div>
                    <p>También puedes explorar por necesidad, no solo por producto.</p>
                </div>
            </div>
            <div class="garage-hero__visual" aria-label="Asistente de Garage">
                <div class="garage-orbit garage-orbit--one"></div><div class="garage-orbit garage-orbit--two"></div>
                <div class="garage-car-card"><div class="garage-car-card__top"><span>Tu punto de partida</span><span class="garage-status">● listo</span></div><div class="garage-car-illustration" aria-hidden="true"><span class="garage-car-hood"></span><span class="garage-car-body"></span><span class="garage-car-wheel garage-car-wheel--a"></span><span class="garage-car-wheel garage-car-wheel--b"></span></div><div class="garage-car-card__bottom"><strong>Explora tu coche</strong><span>Selecciona una zona para empezar</span></div></div>
                <div class="garage-float garage-float--assistant"><span class="garage-avatar garage-avatar--clara">C</span><div><strong>Clara te orienta</strong><small>Sin complicaciones</small></div></div>
                <div class="garage-float garage-float--check"><span>✓</span><div><strong>Recomendación clara</strong><small>Con pros y límites</small></div></div>
            </div>
        </div>
    </section>
    <section class="garage-section garage-section--categories" aria-labelledby="garage-categories-title"><div class="garage-shell"><div class="garage-section__heading"><div><p class="garage-kicker">Empieza por lo que necesitas</p><h2 id="garage-categories-title">Encuentra tu próxima decisión.</h2></div><a class="garage-text-link" href="<?php echo esc_url(home_url('/productos-garage/')); ?>">Ver todo <span>↗</span></a></div><div class="garage-category-grid"><?php foreach ($categories as $category) : ?><a class="garage-category-card" href="<?php echo esc_url($category['url']); ?>"><span class="garage-category-card__icon" aria-hidden="true"><?php echo esc_html($category['icon']); ?></span><span><strong><?php echo esc_html($category['label']); ?></strong><small><?php echo esc_html($category['text']); ?></small></span><span class="garage-category-card__arrow" aria-hidden="true">↗</span></a><?php endforeach; ?></div></div></section>
    <section class="garage-section garage-section--assistant" aria-labelledby="garage-assistant-title"><div class="garage-shell garage-assistant-card"><div class="garage-assistant-card__portrait"><span class="garage-avatar garage-avatar--ciro">C</span></div><div><p class="garage-kicker">Asistencia inteligente</p><h2 id="garage-assistant-title">Pregunta como hablarías con alguien que entiende de coches.</h2><p>Garage convierte una duda cotidiana en un camino corto: qué mirar, qué te puede servir y qué conviene comprobar antes de comprar.</p><a class="garage-button garage-button--dark" href="<?php echo esc_url(home_url('/productos-garage/')); ?>">Probar el asistente <span>↗</span></a></div><div class="garage-assistant-card__signal"><span>01</span><span>necesidad</span><span>02</span><span>contexto</span><span>03</span><span>decisión</span></div></div></section>
    <section class="garage-section garage-section--trust"><div class="garage-shell garage-trust-grid"><div><p class="garage-kicker">Criterio antes que ruido</p><h2>Menos opciones. Mejores decisiones.</h2></div><div class="garage-trust-points"><p><strong>✓ Recomendaciones explicadas</strong><span>Te contamos por qué puede encajar y dónde tiene límites.</span></p><p><strong>✓ Compatibilidad primero</strong><span>Siempre indicamos qué debes comprobar antes de comprar.</span></p><p><strong>✓ Transparencia</strong><span>Algunos enlaces pueden ser afiliados; la elección sigue siendo tuya.</span></p></div></div></section>
</main>
<?php get_footer();
