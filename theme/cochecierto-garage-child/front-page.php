<?php
defined('ABSPATH') || exit;

$needs = [
    ['label' => 'Carrocería', 'text' => 'Lavado, protección y pequeños defectos', 'icon' => '◌', 'url' => home_url('/categorias/limpieza-cuidado/')],
    ['label' => 'Interior', 'text' => 'Cuidado, orden y confort', 'icon' => '⌂', 'url' => home_url('/categorias/confort/')],
    ['label' => 'Motor', 'text' => 'Mantenimiento y herramientas', 'icon' => '◎', 'url' => home_url('/categorias/mantenimiento/')],
    ['label' => 'Neumáticos', 'text' => 'Presión, viaje y seguridad', 'icon' => '◉', 'url' => home_url('/categorias/seguridad-emergencia/')],
    ['label' => 'Seguridad', 'text' => 'Prevención y emergencia', 'icon' => '✦', 'url' => home_url('/categorias/seguridad-emergencia/')],
];
$moments = [
    ['label' => 'Primeras 72 horas', 'text' => 'Pon tu coche a punto desde el primer día.', 'url' => home_url('/guias/primeras-72-horas/')],
    ['label' => 'Primeros 30 días', 'text' => 'Descubre lo que conviene revisar y preparar.', 'url' => home_url('/guias/primeros-30-dias/')],
    ['label' => 'Primeros 60 días', 'text' => 'Completa el equipamiento que realmente necesitas.', 'url' => home_url('/guias/primeros-60-dias/')],
    ['label' => 'Primeros 90 días', 'text' => 'Convierte el cuidado en una rutina sencilla.', 'url' => home_url('/guias/primeros-90-dias/')],
    ['label' => 'Durante el primer año', 'text' => 'Anticípate a viajes, estaciones y mantenimiento.', 'url' => home_url('/guias/primer-ano/')],
];

get_header();
?>
<main class="garage-home">
 <div class="garage-progress" aria-hidden="true"><span></span></div>
    <section class="garage-hero garage-hero--funnel" aria-labelledby="garage-hero-title">
        <div class="garage-shell garage-hero__grid">
            <div class="garage-hero__copy">
                <p class="garage-kicker"><span></span> CocheCierto Garage</p>
                <h1 id="garage-hero-title">Tu coche. Tus necesidades. <em>Decisiones más claras.</em></h1>
                <p class="garage-hero__lead">Descubre qué revisar, qué cuidar y qué productos pueden ayudarte en cada momento, sin perderte entre miles de opciones.</p>
                <div class="garage-hero__actions"><a class="garage-button garage-button--orange" href="#garage-necesidad">Explorar mi coche <span aria-hidden="true">↓</span></a><a class="garage-hero__text-action" href="#garage-momento">Acabo de comprar un coche</a></div>
            </div>
            <div class="garage-hero__visual" aria-label="Coche insignia de CocheCierto Garage">
                <div class="garage-orbit garage-orbit--one"></div><div class="garage-orbit garage-orbit--two"></div>
                <div class="garage-car-card garage-car-card--real"><div class="garage-car-card__top"><span>Tu punto de partida</span><span class="garage-status">● listo</span></div><img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/vehicles/coche-insignia-orange-transparent.png'); ?>" alt="Coche naranja de referencia de CocheCierto Garage" class="garage-car-image"><div class="garage-car-card__bottom"><strong>Explora tu coche</strong><span>Empieza por una zona o un momento</span></div></div>
                <div class="garage-float garage-float--assistant"><span class="garage-avatar garage-avatar--clara">C</span><div><strong>Clara te orienta</strong><small>Sin complicaciones</small></div></div><div class="garage-float garage-float--check"><span>✓</span><div><strong>Recomendación clara</strong><small>Con pros y límites</small></div></div>
            </div>
        </div>
    </section>
    <section id="garage-necesidad" class="garage-section garage-section--needs" aria-labelledby="garage-necesidad-title"><div class="garage-shell"><div class="garage-section__heading"><div><p class="garage-kicker">Empieza por una necesidad</p><h2 id="garage-necesidad-title">¿Qué parte de tu coche quieres resolver?</h2></div><span class="garage-step-label">01 / 02</span></div><div class="garage-need-grid"><?php foreach ($needs as $need) : ?><a class="garage-need-card" href="<?php echo esc_url($need['url']); ?>"><span class="garage-need-card__icon" aria-hidden="true"><?php echo esc_html($need['icon']); ?></span><span><strong><?php echo esc_html($need['label']); ?></strong><small><?php echo esc_html($need['text']); ?></small></span><span class="garage-need-card__arrow" aria-hidden="true">↗</span></a><?php endforeach; ?></div></div></section>
    <section id="garage-momento" class="garage-section garage-section--moments" aria-labelledby="garage-momento-title"><div class="garage-shell"><div class="garage-section__heading"><div><p class="garage-kicker">O empieza por tu momento</p><h2 id="garage-momento-title">Una guía para cada etapa.</h2></div><span class="garage-step-label">02 / 02</span></div><div class="garage-moment-list"><?php foreach ($moments as $index => $moment) : ?><a class="garage-moment-row" href="<?php echo esc_url($moment['url']); ?>"><span class="garage-moment-index">0<?php echo esc_html($index + 1); ?></span><span><strong><?php echo esc_html($moment['label']); ?></strong><small><?php echo esc_html($moment['text']); ?></small></span><span class="garage-moment-arrow" aria-hidden="true">→</span></a><?php endforeach; ?></div></div></section>
    <section class="garage-section garage-section--assistant" aria-labelledby="garage-assistant-title"><div class="garage-shell garage-assistant-card"><div class="garage-assistant-card__portrait"><span class="garage-avatar garage-avatar--ciro">C</span></div><div><p class="garage-kicker">Cuando no sabes por dónde empezar</p><h2 id="garage-assistant-title">Dinos qué te preocupa. Te ayudamos a ordenar el siguiente paso.</h2><p>Primero entendemos la necesidad. Después te mostramos qué revisar, qué información consultar y qué productos pueden encajar.</p><a class="garage-button garage-button--dark" href="<?php echo esc_url(home_url('/productos-garage/')); ?>">Preguntar a Garage <span>↗</span></a></div><div class="garage-assistant-card__signal"><span>01</span><span>necesidad</span><span>02</span><span>contexto</span><span>03</span><span>decisión</span></div></div></section>
    <section class="garage-section garage-section--trust"><div class="garage-shell garage-trust-grid"><div><p class="garage-kicker">Criterio antes que ruido</p><h2>Información útil antes de comprar.</h2></div><div class="garage-trust-points"><p><strong>✓ Entiende antes de elegir</strong><span>Explicamos qué revisar y por qué puede importarte.</span></p><p><strong>✓ Compatibilidad primero</strong><span>Te indicamos qué debes comprobar antes de comprar.</span></p><p><strong>✓ La decisión sigue siendo tuya</strong><span>Algunos enlaces pueden ser afiliados; somos claros sobre ello.</span></p></div></div></section>
</main>
<?php get_footer();
