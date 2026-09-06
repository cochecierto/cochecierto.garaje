<?php
defined('ABSPATH') || exit;

$breakdown_zones = [
    [
        'id' => 'carroceria',
        'tab_label' => 'Carrocería',
        'kicker' => '01 · Exterior & Acabado',
        'title' => 'Pintura, cristales y protección exterior',
        'desc' => 'Evita microarañazos en cada lavado, elimina restos férricos e insectos y sella la carrocería para facilitar el mantenimiento diario.',
        'specs' => [
            ['label' => 'Frecuencia recomendada', 'value' => 'Cada 2–4 semanas'],
            ['label' => 'Método preventivo', 'value' => 'Lavado con dos cubos y microfibra'],
            ['label' => 'Criterio compatibilidad', 'value' => 'Verificar acabados brillo, mate o vinilo'],
        ],
        'highlight_badge' => 'Protección UV & Brillo',
        'cta_text' => 'Explorar productos de Carrocería',
        'url' => home_url('/categorias/limpieza-cuidado/'),
        'hotspot_top' => '48%',
        'hotspot_left' => '74%',
    ],
    [
        'id' => 'interior',
        'tab_label' => 'Interior',
        'kicker' => '02 · Habitáculo & Confort',
        'title' => 'Tapicería, salpicadero y orden a bordo',
        'desc' => 'Mantén el habitáculo libre de alérgenos y polvo. Protege los plásticos de la radiación solar y organiza los accesorios esenciales para viajar cómodo.',
        'specs' => [
            ['label' => 'Frecuencia recomendada', 'value' => 'Mensual o tras viajes'],
            ['label' => 'Método preventivo', 'value' => 'Acondicionador satinado sin silicona grasa'],
            ['label' => 'Criterio compatibilidad', 'value' => 'Diferenciar cuero natural, tela y alcántara'],
        ],
        'highlight_badge' => 'Higiene & Ergonomía',
        'cta_text' => 'Explorar productos de Interior',
        'url' => home_url('/categorias/confort/'),
        'hotspot_top' => '36%',
        'hotspot_left' => '52%',
    ],
    [
        'id' => 'motor',
        'tab_label' => 'Vano Motor',
        'kicker' => '03 · Mecánica & Diagnosis',
        'title' => 'Niveles, batería y comprobación rápida OBD2',
        'desc' => 'El corazón del vehículo requiere comprobaciones sencillas pero críticas: nivel de lubricante, refrigerante, estado de bornes y lectura de códigos de avería.',
        'specs' => [
            ['label' => 'Frecuencia recomendada', 'value' => 'Cada 1.000 km o antes de salir de viaje'],
            ['label' => 'Método preventivo', 'value' => 'Comprobación en frío sobre superficie horizontal'],
            ['label' => 'Criterio compatibilidad', 'value' => 'Norma exacta de aceite (ej. ACEA C3 / 5W-30)'],
        ],
        'highlight_badge' => 'Mantenimiento Preventivo',
        'cta_text' => 'Explorar productos de Motor',
        'url' => home_url('/categorias/mantenimiento/'),
        'hotspot_top' => '48%',
        'hotspot_left' => '22%',
    ],
    [
        'id' => 'neumaticos',
        'tab_label' => 'Neumáticos',
        'kicker' => '04 · Ruedas & Presión',
        'title' => 'Presión, profundidad de dibujo y antipinchazos',
        'desc' => 'El único contacto del coche con el asfalto. Una presión incorrecta incrementa el consumo, alarga la frenada y desgasta la banda de rodadura de forma irregular.',
        'specs' => [
            ['label' => 'Frecuencia recomendada', 'value' => 'Revisión mensual en frío'],
            ['label' => 'Método preventivo', 'value' => 'Manómetro digital y compresor portátil'],
            ['label' => 'Criterio compatibilidad', 'value' => 'Medidas exactas de neumático e índice de carga'],
        ],
        'highlight_badge' => 'Seguridad Activa',
        'cta_text' => 'Explorar productos de Neumáticos',
        'url' => home_url('/categorias/neumaticos/'),
        'hotspot_top' => '68%',
        'hotspot_left' => '32%',
    ],
    [
        'id' => 'seguridad',
        'tab_label' => 'Seguridad',
        'kicker' => '05 · Emergencia & Homologación',
        'title' => 'Baliza V16 conectada DGT 3.0 y señalización',
        'desc' => 'Equípate con elementos homologados que te permitan señalizar cualquier incidencia de inmediato sin salir del coche ni poner en riesgo a los ocupantes.',
        'specs' => [
            ['label' => 'Homologación oficial', 'value' => 'DGT 3.0 con conectividad integrada'],
            ['label' => 'Disponibilidad', 'value' => 'Accesible directamente desde el puesto de conducción'],
            ['label' => 'Criterio de confianza', 'value' => 'Comprobar fecha de caducidad y pila/batería'],
        ],
        'highlight_badge' => 'Normativa DGT',
        'cta_text' => 'Explorar productos de Seguridad',
        'url' => home_url('/categorias/seguridad-emergencia/'),
        'hotspot_top' => '27%',
        'hotspot_left' => '38%',
    ],
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

    <!-- Hero de bienvenida -->
    <section class="garage-hero garage-hero--funnel" aria-labelledby="garage-hero-title">
        <div class="garage-shell garage-hero__grid">
            <div class="garage-hero__copy">
                <p class="garage-kicker"><span></span> CocheCierto Garage</p>
                <h1 id="garage-hero-title">Tu coche. Tus necesidades. <em>Decisiones más claras.</em></h1>
                <p class="garage-hero__lead">Explora cada parte de tu vehículo, conoce qué revisar y encuentra solo los productos y guías que realmente necesitas, sin perderte entre miles de opciones.</p>
                <div class="garage-hero__actions">
                    <a class="garage-button garage-button--orange" href="#garage-despiece">Explorar despiece interactivo <span aria-hidden="true">↓</span></a>
                    <a class="garage-hero__text-action" href="#garage-momento">Ver guías por etapa</a>
                </div>
            </div>
            <div class="garage-hero__visual" aria-label="Coche insignia de CocheCierto Garage">
                <div class="garage-orbit garage-orbit--one"></div>
                <div class="garage-orbit garage-orbit--two"></div>
                <div class="garage-car-card garage-car-card--real">
                    <div class="garage-car-card__top">
                        <span>Punto de partida</span>
                        <span class="garage-status">● 5 Zonas activas</span>
                    </div>
                    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/vehicles/coche-insignia-orange-transparent.png'); ?>" alt="Coche naranja de referencia de CocheCierto Garage" class="garage-car-image" />
                    <div class="garage-car-card__bottom">
                        <strong>Explora por despiece</strong>
                        <span>Pulsa una zona o haz scroll</span>
                    </div>
                </div>
                <div class="garage-float garage-float--assistant">
                    <span class="garage-avatar garage-avatar--clara">C</span>
                    <div><strong>Clara te orienta</strong><small>Sin complicaciones</small></div>
                </div>
                <div class="garage-float garage-float--check">
                    <span>✓</span>
                    <div><strong>Criterio técnico</strong><small>Con pros y límites</small></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Despiece interactivo y Scrollytelling (Spec 008) -->
    <section id="garage-despiece" class="garage-section garage-breakdown" aria-labelledby="garage-breakdown-title">
        <div class="garage-shell">
            <div class="garage-section__heading">
                <div>
                    <p class="garage-kicker">Explorador técnico interactivo</p>
                    <h2 id="garage-breakdown-title">Despiece del coche: qué cuidar en cada zona.</h2>
                </div>
                <div class="garage-breakdown-nav" role="tablist" aria-label="Zonas del vehículo">
                    <?php foreach ($breakdown_zones as $index => $zone) : ?>
                        <button type="button"
                                class="garage-breakdown-tab <?php echo $index === 0 ? 'is-active' : ''; ?>"
                                data-zone="<?php echo esc_attr($zone['id']); ?>"
                                role="tab"
                                aria-selected="<?php echo $index === 0 ? 'true' : 'false'; ?>">
                            <span class="garage-breakdown-tab__index">0<?php echo esc_html($index + 1); ?></span>
                            <span class="garage-breakdown-tab__label"><?php echo esc_html($zone['tab_label']); ?></span>
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="garage-breakdown__layout">
                <!-- Visual Sticky Stage -->
                <div class="garage-breakdown__stage-wrap">
                    <div class="garage-breakdown__stage" data-active-zone="carroceria">
                        <div class="garage-breakdown__car-display">
                            <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/vehicles/coche-insignia-orange-transparent.png'); ?>" alt="Diagrama interactivo del coche" class="garage-breakdown__car-img" />

                            <!-- Hotspots interactivos -->
                            <?php foreach ($breakdown_zones as $index => $zone) : ?>
                                <button type="button"
                                        class="garage-hotspot garage-hotspot--<?php echo esc_attr($zone['id']); ?> <?php echo $index === 0 ? 'is-active' : ''; ?>"
                                        data-zone="<?php echo esc_attr($zone['id']); ?>"
                                        style="top: <?php echo esc_attr($zone['hotspot_top']); ?>; left: <?php echo esc_attr($zone['hotspot_left']); ?>;"
                                        aria-label="Zona 0<?php echo esc_html($index + 1); ?>: <?php echo esc_attr($zone['tab_label']); ?>"
                                        aria-pressed="<?php echo $index === 0 ? 'true' : 'false'; ?>">
                                    <span class="garage-hotspot__pulse"></span>
                                    <span class="garage-hotspot__dot">0<?php echo esc_html($index + 1); ?></span>
                                    <span class="garage-hotspot__tooltip"><?php echo esc_html($zone['tab_label']); ?></span>
                                </button>
                            <?php endforeach; ?>
                        </div>
                        <div class="garage-breakdown__stage-footer">
                            <span>Desplaza para recorrer o pulsa en una zona</span>
                            <span class="garage-breakdown__live-badge">● Inspección activa</span>
                        </div>
                    </div>
                </div>

                <!-- Pasos y Fichas Técnicas (Scrollytelling Steps) -->
                <div class="garage-breakdown__steps">
                    <?php foreach ($breakdown_zones as $index => $zone) : ?>
                        <article class="garage-breakdown-step <?php echo $index === 0 ? 'is-active' : ''; ?>"
                                 data-zone="<?php echo esc_attr($zone['id']); ?>"
                                 id="paso-<?php echo esc_attr($zone['id']); ?>">
                            <div class="garage-breakdown-step__header">
                                <span class="garage-breakdown-step__index">0<?php echo esc_html($index + 1); ?> / 05</span>
                                <span class="garage-breakdown-step__badge"><?php echo esc_html($zone['highlight_badge']); ?></span>
                            </div>

                            <p class="garage-kicker"><?php echo esc_html($zone['kicker']); ?></p>
                            <h3 class="garage-breakdown-step__title"><?php echo esc_html($zone['title']); ?></h3>
                            <p class="garage-breakdown-step__desc"><?php echo esc_html($zone['desc']); ?></p>

                            <!-- Micro-especificaciones estilo técnico -->
                            <div class="garage-spec-table" aria-label="Parámetros técnicos de <?php echo esc_attr($zone['tab_label']); ?>">
                                <?php foreach ($zone['specs'] as $spec) : ?>
                                    <div class="garage-spec-row">
                                        <span class="garage-spec-label"><?php echo esc_html($spec['label']); ?></span>
                                        <strong class="garage-spec-val"><?php echo esc_html($spec['value']); ?></strong>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <div class="garage-breakdown-step__actions">
                                <a href="<?php echo esc_url($zone['url']); ?>" class="garage-button garage-button--orange">
                                    <?php echo esc_html($zone['cta_text']); ?> <span>↗</span>
                                </a>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Guías por momento -->
    <section id="garage-momento" class="garage-section garage-section--moments" aria-labelledby="garage-momento-title">
        <div class="garage-shell">
            <div class="garage-section__heading">
                <div>
                    <p class="garage-kicker">Guías por etapa de posesión</p>
                    <h2 id="garage-momento-title">Acompañamiento en cada momento del coche.</h2>
                </div>
                <span class="garage-step-label">Ruta temporal</span>
            </div>
            <div class="garage-moment-list">
                <?php foreach ($moments as $index => $moment) : ?>
                    <a class="garage-moment-row" href="<?php echo esc_url($moment['url']); ?>">
                        <span class="garage-moment-index">0<?php echo esc_html($index + 1); ?></span>
                        <span>
                            <strong><?php echo esc_html($moment['label']); ?></strong>
                            <small><?php echo esc_html($moment['text']); ?></small>
                        </span>
                        <span class="garage-moment-arrow" aria-hidden="true">→</span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Asistente Clara y Ciro -->
    <section class="garage-section garage-section--assistant" aria-labelledby="garage-assistant-title">
        <div class="garage-shell garage-assistant-card">
            <div class="garage-assistant-card__portrait">
                <span class="garage-avatar garage-avatar--ciro">C</span>
            </div>
            <div>
                <p class="garage-kicker">Orientación personalizada</p>
                <h2 id="garage-assistant-title">¿Tienes una duda concreta con tu coche? Te orientamos.</h2>
                <p>Primero identificamos la pieza o necesidad. Después te mostramos qué comprobar, qué medidas tomar y qué productos cuentan con compatibilidad contrastada.</p>
                <a class="garage-button garage-button--dark" href="<?php echo esc_url(home_url('/productos/')); ?>">Consultar catálogo <span>↗</span></a>
            </div>
            <div class="garage-assistant-card__signal">
                <span>01</span><span>zona</span>
                <span>02</span><span>compatibilidad</span>
                <span>03</span><span>criterio</span>
            </div>
        </div>
    </section>

    <!-- Confianza y transparencia -->
    <section class="garage-section garage-section--trust">
        <div class="garage-shell garage-trust-grid">
            <div>
                <p class="garage-kicker">Criterio antes que ruido</p>
                <h2>Información útil antes de comprar.</h2>
            </div>
            <div class="garage-trust-points">
                <p><strong>✓ Entiende antes de elegir</strong><span>Explicamos qué revisar y por qué puede importarte.</span></p>
                <p><strong>✓ Compatibilidad primero</strong><span>Te indicamos qué debes comprobar antes de comprar.</span></p>
                <p><strong>✓ La decisión sigue siendo tuya</strong><span>Algunos enlaces pueden ser afiliados; somos claros sobre ello.</span></p>
            </div>
        </div>
    </section>
</main>
<?php
get_footer();
