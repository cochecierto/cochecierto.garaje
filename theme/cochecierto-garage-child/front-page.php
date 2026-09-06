<?php
defined('ABSPATH') || exit;

$breakdown_zones = [
    [
        'id' => 'carroceria',
        'tab_label' => 'Carrocería',
        'kicker' => '01 · Exterior & Acabado',
        'title' => 'Pintura, cristales y protección exterior',
        'desc' => 'Evita microarañazos en cada lavado con la técnica de dos cubos, descontamina partículas férricas incrustadas y aplica un sellador hidrofóbico que facilite el mantenimiento.',
        'specs' => [
            ['label' => 'Frecuencia de cuidado', 'value' => 'Cada 2–4 semanas'],
            ['label' => 'Técnica recomendada', 'value' => 'Lavado neutro + secado microfibra 1200 GSM'],
            ['label' => 'Criterio de superficie', 'value' => 'Comprobar laca brillo, mate o vinilo'],
        ],
        'highlight_badge' => 'Protección UV & Brillo',
        'cta_text' => 'Ver productos de Carrocería',
        'url' => home_url('/categorias/limpieza-cuidado/'),
        'hotspot_top' => '48%',
        'hotspot_left' => '74%',
        'telemetry_stat' => 'Espesor medio laca: 115–135 µm',
    ],
    [
        'id' => 'interior',
        'tab_label' => 'Interior',
        'kicker' => '02 · Habitáculo & Confort',
        'title' => 'Tapicería, salpicadero y orden a bordo',
        'desc' => 'Conserva las superficies plásticas sin el brillo grasiento de siliconas agresivas, protege el salpicadero de la radiación UV y mantén la tapicería libre de olores y ácaros.',
        'specs' => [
            ['label' => 'Frecuencia de higiene', 'value' => 'Mensual o tras viajes'],
            ['label' => 'Acabado recomendado', 'value' => 'Efecto mate satinado antipolvo'],
            ['label' => 'Criterio de material', 'value' => 'Diferenciar piel tratada, tela y alcántara'],
        ],
        'highlight_badge' => 'Higiene & Ergonomía',
        'cta_text' => 'Ver productos de Interior',
        'url' => home_url('/categorias/confort/'),
        'hotspot_top' => '36%',
        'hotspot_left' => '52%',
        'telemetry_stat' => 'Filtro habitáculo: sustituir cada 15.000 km',
    ],
    [
        'id' => 'motor',
        'tab_label' => 'Vano Motor',
        'kicker' => '03 · Mecánica & Diagnosis',
        'title' => 'Niveles, batería y diagnosis rápida OBD2',
        'desc' => 'El mantenimiento preventivo ahorra las averías más costosas. Monitorea nivel de aceite en frío, estado de carga de la batería y detecta avisos con lectores OBD2 antes de pasar por taller.',
        'specs' => [
            ['label' => 'Frecuencia de control', 'value' => 'Cada 1.000 km o antes de viajes largos'],
            ['label' => 'Punto de medición', 'value' => 'Motor frío sobre plano horizontal'],
            ['label' => 'Criterio de lubricante', 'value' => 'Norma exacta del fabricante (ej. ACEA C3 / 5W-30)'],
        ],
        'highlight_badge' => 'Mantenimiento Preventivo',
        'cta_text' => 'Ver productos de Motor',
        'url' => home_url('/categorias/mantenimiento/'),
        'hotspot_top' => '48%',
        'hotspot_left' => '22%',
        'telemetry_stat' => 'Batería: comprobar si cae de 12.4V en reposo',
    ],
    [
        'id' => 'neumaticos',
        'tab_label' => 'Neumáticos',
        'kicker' => '04 · Ruedas & Presión',
        'title' => 'Presión, profundidad de dibujo y antipinchazos',
        'desc' => 'El único contacto del coche con el asfalto. Una presión baja en 0.5 bar incrementa el consumo de combustible hasta un 4% y acelera el desgaste irregular de los hombros del neumático.',
        'specs' => [
            ['label' => 'Frecuencia de presión', 'value' => 'Revisión mensual en frío'],
            ['label' => 'Herramienta clave', 'value' => 'Manómetro digital + compresor a batería'],
            ['label' => 'Límite legal de dibujo', 'value' => '1.6 mm (recomendado sustituir a 3 mm)'],
        ],
        'highlight_badge' => 'Seguridad Activa',
        'cta_text' => 'Ver productos de Neumáticos',
        'url' => home_url('/categorias/neumaticos/'),
        'hotspot_top' => '68%',
        'hotspot_left' => '32%',
        'telemetry_stat' => 'Presión nominal: consultar adhesivo pilar B',
    ],
    [
        'id' => 'seguridad',
        'tab_label' => 'Seguridad',
        'kicker' => '05 · Emergencia & Homologación',
        'title' => 'Baliza V16 conectada DGT 3.0 y señalización',
        'desc' => 'En caso de avería o detención en autopista, no salgas del vehículo. Coloca la baliza magnética en el techo: transmite la incidencia a la DGT 3.0 y emite destellos visibles a 1 km.',
        'specs' => [
            ['label' => 'Certificación obligatoria', 'value' => 'Homologación oficial DGT 3.0 con eSIM'],
            ['label' => 'Ubicación óptima', 'value' => 'Guantera o hueco de puerta del conductor'],
            ['label' => 'Autonomía de señal', 'value' => 'Mínimo 2 horas de destello continuo'],
        ],
        'highlight_badge' => 'Normativa DGT 3.0',
        'cta_text' => 'Ver productos de Seguridad',
        'url' => home_url('/categorias/seguridad-emergencia/'),
        'hotspot_top' => '27%',
        'hotspot_left' => '38%',
        'telemetry_stat' => 'Conectividad anónima incluida sin suscripción',
    ],
];

$moments = [
    ['label' => 'Primeras 72 horas', 'text' => 'Pon tu coche a punto desde el primer día con comprobaciones clave.', 'url' => home_url('/guias/primeras-72-horas/')],
    ['label' => 'Primeros 30 días', 'text' => 'Conoce el estado real y prepara una base sencilla para usarlo con tranquilidad.', 'url' => home_url('/guias/primeros-30-dias/')],
    ['label' => 'Primeros 60 días', 'text' => 'Completa el equipamiento y confort que realmente necesitas tras semanas de uso.', 'url' => home_url('/guias/primeros-60-dias/')],
    ['label' => 'Primeros 90 días', 'text' => 'Convierte el cuidado en una rutina sencilla y sostenible sin gastos superfluos.', 'url' => home_url('/guias/primeros-90-dias/')],
    ['label' => 'Durante el primer año', 'text' => 'Anticípate a estaciones, vacaciones y mantenimientos periódicos.', 'url' => home_url('/guias/primer-ano/')],
];

get_header();
?>
<main class="garage-home">
    <div class="garage-progress" aria-hidden="true"><span></span></div>

    <!-- Hero de bienvenida ampliado -->
    <section class="garage-hero garage-hero--panoramic" aria-labelledby="garage-hero-title">
        <div class="garage-shell garage-hero__grid">
            <div class="garage-hero__copy">
                <p class="garage-kicker"><span></span> CocheCierto Garaje · Plataforma Editorial</p>
                <h1 id="garage-hero-title">Tu coche. Tus necesidades. <em>Decisiones con criterio.</em></h1>
                <p class="garage-hero__lead">Explora cada área técnica de tu vehículo, comprende exactamente qué revisar y accede únicamente a las recomendaciones contrastadas, sin perderte en el ruido comercial.</p>
                <div class="garage-hero__actions">
                    <a class="garage-button garage-button--orange" href="#garage-despiece">
                        Explorar despiece interactivo <span aria-hidden="true">↓</span>
                    </a>
                    <a class="garage-hero__text-action" href="#garage-momento">
                        Ver guías por etapa de posesión →
                    </a>
                </div>
            </div>
            <div class="garage-hero__visual garage-hero__visual--heliostat" aria-label="Coche insignia y presentación de CocheCierto Garaje">
                <div class="garage-orbit garage-orbit--one"></div>
                <div class="garage-orbit garage-orbit--two"></div>

                <!-- Tarjeta interactiva del coche con video de apertura estilo Heliostat -->
                <div class="garage-car-card garage-car-card--heliostat" id="garageHeroCard">
                    <div class="garage-car-card__top">
                        <span class="garage-pill">Ingeniería & Cuidado</span>
                        <span class="garage-status">● Sistema interactivo</span>
                    </div>

                    <!-- Escenario interactivo: Video de presentación + Coche insignia -->
                    <div class="garage-heliostat-stage">
                        <video class="garage-hero-video" 
                               autoplay 
                               loop 
                               muted 
                               playsinline 
                               preload="auto"
                               poster="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/vehicles/coche-insignia-orange-transparent.png'); ?>">
                            <source src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/video/cochecierto-presentacion.mp4'); ?>" type="video/mp4">
                        </video>
                        <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/vehicles/coche-insignia-orange-transparent.png'); ?>" 
                             alt="Coche insignia de CocheCierto Garaje" 
                             class="garage-car-image garage-heliostat-car" />
                        
                        <div class="garage-heliostat-overlay">
                            <span class="garage-heliostat-tag">Modo despiece</span>
                        </div>
                    </div>

                    <div class="garage-car-card__bottom">
                        <div>
                            <strong>Despiece secuencial en scroll</strong>
                            <span class="garage-car-card__hint">Desplaza para abrir y ver los componentes ↓</span>
                        </div>
                        <a href="#garage-despiece" class="garage-heliostat-open-btn" aria-label="Abrir despiece">
                            Descomponer ↗
                        </a>
                    </div>
                </div>

                <div class="garage-float garage-float--assistant">
                    <span class="garage-avatar garage-avatar--clara">C</span>
                    <div><strong>Clara te orienta</strong><small>Sin complicaciones</small></div>
                </div>
                <div class="garage-float garage-float--check">
                    <span>✓</span>
                    <div><strong>Compatibilidad verificada</strong><small>Antes de comprar</small></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Despiece interactivo y Scrollytelling (Spec 009) -->
    <section id="garage-despiece" class="garage-section garage-breakdown" aria-labelledby="garage-breakdown-title">
        <div class="garage-shell">
            <!-- Encabezado y barra de navegación de zonas -->
            <div class="garage-section__heading">
                <div>
                    <p class="garage-kicker">Explorador de ingeniería por partes</p>
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

            <!-- Rejilla Panorámica: Escenario Visual (Izquierda) + Tarjetas de Despiece (Derecha) -->
            <div class="garage-breakdown__layout">
                
                <!-- Columna Izquierda: Visor Visual Sticky con Efectos Dinámicos -->
                <div class="garage-breakdown__stage-wrap">
                    <div class="garage-breakdown__stage" data-active-zone="carroceria" data-finish="brillo">
                        
                        <!-- Barra de control del visor visual -->
                        <div class="garage-breakdown__stage-header">
                            <div class="garage-stage-indicator">
                                <span class="garage-stage-indicator__dot">●</span>
                                <span class="garage-stage-indicator__zone">Zona activa: <strong>Carrocería</strong></span>
                            </div>
                            <!-- Selector interactivo de acabado para Carrocería -->
                            <div class="garage-finish-toggle" aria-label="Selector de acabado de pintura">
                                <span class="garage-finish-toggle__label">Acabado:</span>
                                <button type="button" class="garage-finish-btn is-active" data-finish-val="brillo">Brillo</button>
                                <button type="button" class="garage-finish-btn" data-finish-val="mate">Mate</button>
                            </div>
                        </div>

                        <!-- Pantalla interactiva del coche con capas dinámicas -->
                        <div class="garage-breakdown__car-display">
                            
                            <!-- Imagen base del coche insignia -->
                            <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/vehicles/coche-insignia-orange-transparent.png'); ?>" 
                                 alt="Diagrama interactivo del coche CocheCierto" 
                                 class="garage-breakdown__car-img" />

                            <!-- EFECTO 1: Reflejo y brillo de laca (Carrocería) -->
                            <div class="garage-vis-layer garage-vis-layer--laca" aria-hidden="true"></div>

                            <!-- EFECTO 2: Rayos X e iluminación del habitáculo (Interior) -->
                            <div class="garage-vis-layer garage-vis-layer--interior" aria-hidden="true">
                                <div class="garage-xray-glow"></div>
                            </div>

                            <!-- EFECTO 3: Telemetría y visor de fluidos (Motor) -->
                            <div class="garage-vis-layer garage-vis-layer--motor" aria-hidden="true">
                                <div class="garage-hud-box garage-hud-box--oil">
                                    <span class="garage-hud-label">Aceite Motor</span>
                                    <strong class="garage-hud-val">5W-30 C3 · Nivel Óptimo</strong>
                                </div>
                                <div class="garage-hud-box garage-hud-box--temp">
                                    <span class="garage-hud-label">Temperatura Serv.</span>
                                    <strong class="garage-hud-val">90 °C</strong>
                                </div>
                            </div>

                            <!-- EFECTO 4: Testigo de presión gráfica (Neumáticos) -->
                            <div class="garage-vis-layer garage-vis-layer--neumaticos" aria-hidden="true">
                                <div class="garage-hud-box garage-hud-box--tire">
                                    <span class="garage-hud-label">Presión Delantera</span>
                                    <strong class="garage-hud-val">2.3 bar / 33.4 PSI</strong>
                                    <small class="garage-hud-sub">● Ajuste nominal en frío</small>
                                </div>
                            </div>

                            <!-- EFECTO 5: Baliza V16 estroboscópica en techo (Seguridad) -->
                            <div class="garage-vis-layer garage-vis-layer--seguridad" aria-hidden="true">
                                <div class="garage-v16-beacon">
                                    <span class="garage-v16-beacon__flash"></span>
                                    <span class="garage-v16-beacon__badge">V16 DGT 3.0</span>
                                </div>
                            </div>

                            <!-- Hotspots interactivos con pulsación -->
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

                        <!-- Pie del visor con telemetría técnica de la zona activa -->
                        <div class="garage-breakdown__stage-footer">
                            <div class="garage-stage-stat">
                                <span class="garage-stage-stat__label">Dato técnico clave:</span>
                                <strong class="garage-stage-stat__val" id="garage-active-stat">Espesor medio laca: 115–135 µm</strong>
                            </div>
                            <span class="garage-breakdown__live-badge">● Inspección en tiempo real</span>
                        </div>
                    </div>
                </div>

                <!-- Columna Derecha: Tarjetas de Despiece Scrollytelling -->
                <div class="garage-breakdown__steps">
                    <?php foreach ($breakdown_zones as $index => $zone) : ?>
                        <article class="garage-breakdown-step <?php echo $index === 0 ? 'is-active' : ''; ?>" 
                                 data-zone="<?php echo esc_attr($zone['id']); ?>" 
                                 data-stat="<?php echo esc_attr($zone['telemetry_stat']); ?>"
                                 id="paso-<?php echo esc_attr($zone['id']); ?>">
                            
                            <div class="garage-breakdown-step__header">
                                <span class="garage-breakdown-step__index">0<?php echo esc_html($index + 1); ?> / 05</span>
                                <span class="garage-breakdown-step__badge"><?php echo esc_html($zone['highlight_badge']); ?></span>
                            </div>

                            <p class="garage-kicker"><?php echo esc_html($zone['kicker']); ?></p>
                            <h3 class="garage-breakdown-step__title"><?php echo esc_html($zone['title']); ?></h3>
                            <p class="garage-breakdown-step__desc"><?php echo esc_html($zone['desc']); ?></p>

                            <!-- Micro-especificaciones técnicas tipo Heliostat -->
                            <div class="garage-spec-table" aria-label="Especificaciones de <?php echo esc_attr($zone['tab_label']); ?>">
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

    <!-- Guías por momento de posesión -->
    <section id="garage-momento" class="garage-section garage-section--moments" aria-labelledby="garage-momento-title">
        <div class="garage-shell">
            <div class="garage-section__heading">
                <div>
                    <p class="garage-kicker">Ruta cronológica recomendada</p>
                    <h2 id="garage-momento-title">Acompañamiento en cada etapa de posesión.</h2>
                </div>
                <span class="garage-step-label">5 Momentos clave</span>
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

    <!-- Asistente de Orientación Clara y Ciro -->
    <section class="garage-section garage-section--assistant" aria-labelledby="garage-assistant-title">
        <div class="garage-shell garage-assistant-card">
            <div class="garage-assistant-card__portrait">
                <span class="garage-avatar garage-avatar--ciro">C</span>
            </div>
            <div>
                <p class="garage-kicker">Orientación editorial independiente</p>
                <h2 id="garage-assistant-title">¿Tienes una duda concreta con tu coche? Te orientamos.</h2>
                <p>Primero identificamos la pieza o necesidad. Después te mostramos qué comprobar, qué medidas tomar y qué productos cuentan con compatibilidad contrastada, sin forzar ninguna compra.</p>
                <a class="garage-button garage-button--dark" href="<?php echo esc_url(home_url('/productos/')); ?>">Consultar catálogo completo <span>↗</span></a>
            </div>
            <div class="garage-assistant-card__signal">
                <span>01</span><span>zona</span>
                <span>02</span><span>compatibilidad</span>
                <span>03</span><span>decisión</span>
            </div>
        </div>
    </section>

    <!-- Compromiso y Transparencia -->
    <section class="garage-section garage-section--trust">
        <div class="garage-shell garage-trust-grid">
            <div>
                <p class="garage-kicker">Criterio antes que comisión</p>
                <h2>Información útil y transparente antes de comprar.</h2>
            </div>
            <div class="garage-trust-points">
                <p><strong>✓ Entiende antes de elegir</strong><span>Explicamos qué revisar y por qué puede importarte cada especificación.</span></p>
                <p><strong>✓ Compatibilidad garantizada</strong><span>Te indicamos qué datos contrastar en tu vehículo antes de comprar.</span></p>
                <p><strong>✓ Transparencia en afiliación</strong><span>Los enlaces a Amazon u otros distribuidores pueden generar una comisión sin coste adicional para ti.</span></p>
            </div>
        </div>
    </section>
</main>
<?php
get_footer();
