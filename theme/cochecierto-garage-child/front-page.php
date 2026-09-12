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
        'hotspot_top' => '64%',
        'hotspot_left' => '14%',
        'telemetry_stat' => 'Presión nominal: consultar adhesivo pilar B',
    ],
    [
        'id' => 'frenos',
        'tab_label' => 'Frenos',
        'kicker' => '05 · Frenada & Control',
        'title' => 'Pastillas, discos y líquido de frenos',
        'desc' => 'La capacidad de detención no admite descuidos. Comprueba el grosor del ferodo sin desmontar la rueda, detecta vibraciones al pisar el pedal y renueva el líquido DOT4/DOT5.1 cada dos años.',
        'specs' => [
            ['label' => 'Espesor mínimo pastilla', 'value' => '3 mm (cambio urgente si baja de 2 mm)'],
            ['label' => 'Punto de ebullición DOT', 'value' => 'DOT 4: sustitución cada 24 meses'],
            ['label' => 'Síntoma de alabeo', 'value' => 'Vibración en volante al frenar a media velocidad'],
        ],
        'highlight_badge' => 'Seguridad Crítica',
        'cta_text' => 'Ver guías y productos de Frenos',
        'url' => home_url('/categorias/mantenimiento/'),
        'hotspot_top' => '64%',
        'hotspot_left' => '36%',
        'telemetry_stat' => 'Grosor mínimo pastillas: 3 mm',
    ],
    [
        'id' => 'electricidad',
        'tab_label' => 'Batería',
        'kicker' => '06 · Carga & Electricidad',
        'title' => 'Batería 12V, alternador y arrancadores portátiles',
        'desc' => 'La causa número uno de asistencia en carretera. Controla el voltaje en reposo (evita caídas por debajo de 12.2V), protege los bornes de sulfatación y lleva un arrancador auxiliar ultracompacto.',
        'specs' => [
            ['label' => 'Voltaje en reposo 100%', 'value' => '12.6V a 12.8V (alerta si < 12.2V)'],
            ['label' => 'Tecnología recomendada', 'value' => 'AGM/EFB para coches con Start-Stop'],
            ['label' => 'Equipo de rescate', 'value' => 'Arrancador litio booster con pinzas inteligentes'],
        ],
        'highlight_badge' => 'Carga & Asistencia',
        'cta_text' => 'Ver productos de Batería',
        'url' => home_url('/categorias/mantenimiento/'),
        'hotspot_top' => '44%',
        'hotspot_left' => '28%',
        'telemetry_stat' => 'Tensión reposo: 12.6V nominal',
    ],
    [
        'id' => 'seguridad',
        'tab_label' => 'Seguridad',
        'kicker' => '07 · Emergencia & Homologación',
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

// Editorial guidance shared by all zones; merged into the canonical zone data.
$breakdown_guidance = [
    'carroceria' => ['what_to_check' => 'Pintura, cristales, juntas, faros y signos de corrosión.', 'why_it_matters' => 'La carrocería protege la estructura y ayuda a detectar daños o filtraciones.', 'how_to_check' => 'Revisa con luz natural cambios de tono, grietas, humedad y óxido.', 'alerts' => ['Óxido que aumenta', 'Grietas en el parabrisas', 'Faros opacos', 'Pintura levantada tras un golpe'], 'diy' => ['Lavar con productos neutros', 'Comprobar visualmente cristales, juntas y faros'], 'professional' => 'Hay corrosión estructural, grietas en el campo de visión o daños tras un golpe.', 'orientative' => 'El espesor de la laca depende de la pieza y del vehículo.'],
    'interior' => ['what_to_check' => 'Cinturones, testigos, moquetas, tapicería, mandos y olores.', 'why_it_matters' => 'El habitáculo combina confort y elementos de seguridad.', 'how_to_check' => 'Prueba cinturones y mandos con el vehículo detenido y revisa la moqueta.', 'alerts' => ['Olor persistente a humedad', 'Testigo del airbag', 'Cinturón que no bloquea correctamente', 'Moqueta húmeda'], 'diy' => ['Limpiar sin saturar elementos eléctricos', 'Comprobar cierres, cinturones y mandos'], 'professional' => 'Aparece un testigo de airbag, hay humedad recurrente o falla un anclaje.', 'orientative' => 'La frecuencia de higiene depende del uso y del material.'],
    'motor' => ['what_to_check' => 'Niveles, fugas, manguitos, correas, ruidos, humo y testigos.', 'why_it_matters' => 'Una fuga o un cambio de temperatura puede anticipar una avería.', 'how_to_check' => 'Con el motor frío y en plano, revisa niveles y observa el suelo.', 'alerts' => ['Pérdida de aceite o refrigerante', 'Humo', 'Ruidos nuevos', 'Temperatura elevada', 'Testigo de motor encendido'], 'diy' => ['Comprobar niveles según el manual', 'Observar fugas sin tocar piezas calientes'], 'professional' => 'Hay humo, sobrecalentamiento, pérdida de líquido o un testigo persistente.', 'orientative' => 'Aceite, temperatura y voltaje dependen de motor y fabricante.'],
    'neumaticos' => ['what_to_check' => 'Presión, desgaste, profundidad, grietas, deformaciones y válvulas.', 'why_it_matters' => 'Los neumáticos son el único contacto del vehículo con el asfalto.', 'how_to_check' => 'Mide en frío y compara con la etiqueta del pilar de la puerta.', 'alerts' => ['Desgaste irregular', 'Grietas o deformaciones', 'Vibraciones', 'Pérdida frecuente de presión', 'Dibujo insuficiente'], 'diy' => ['Medir la presión en frío', 'Inspeccionar la banda y los hombros'], 'professional' => 'Hay deformaciones, vibraciones, pérdida frecuente o dudas sobre el desgaste.', 'orientative' => 'La presión correcta es la indicada por el fabricante.'],
    'frenos' => ['what_to_check' => 'Pastillas, discos, líquido, fugas, ruidos, vibraciones y pedal.', 'why_it_matters' => 'El estado de los frenos afecta a la distancia de detención y al control.', 'how_to_check' => 'Observa el conjunto sin desmontar y prueba el pedal en una zona segura.', 'alerts' => ['Chirridos persistentes', 'Vibraciones', 'Pedal esponjoso', 'Tirones', 'Testigo de frenos'], 'diy' => ['Observar desgaste y fugas visibles', 'Comprobar el nivel según el manual'], 'professional' => 'Hay pérdida de líquido, pedal esponjoso, vibraciones fuertes o dudas sobre espesores.', 'orientative' => 'Espesores, líquido y frecuencia dependen del sistema instalado.'],
    'electricidad' => ['what_to_check' => 'Arranque, luces, bornes, testigos y fallos eléctricos intermitentes.', 'why_it_matters' => 'Una batería débil puede inmovilizar el vehículo y ocultar fallos de carga.', 'how_to_check' => 'Observa el arranque y las luces; mide solo con equipo y siguiendo el manual.', 'alerts' => ['Arranque lento', 'Luces débiles', 'Testigo de batería', 'Fallos eléctricos intermitentes'], 'diy' => ['Mantener bornes limpios', 'Comprobar luces y compatibilidad de un arrancador'], 'professional' => 'Falla el arranque, se enciende el testigo o hay fallos repetidos.', 'orientative' => 'El voltaje varía con temperatura, carga y tecnología AGM/EFB.'],
    'seguridad' => ['what_to_check' => 'Baliza V16 homologada y conectada, chaleco, cinturones, anclajes y testigos.', 'why_it_matters' => 'El equipamiento y los sistemas de retención reducen el riesgo en una avería.', 'how_to_check' => 'Consulta la fuente oficial y verifica la homologación vigente.', 'alerts' => ['Baliza no homologada o sin conectividad exigida', 'Elementos de emergencia ausentes', 'Cinturones o anclajes defectuosos', 'Testigos de seguridad encendidos'], 'diy' => ['Guardar la baliza accesible desde el asiento del conductor', 'Revisar batería y estado del chaleco'], 'professional' => 'Falla un cinturón, anclaje o sistema de seguridad; en una avería sigue las instrucciones oficiales.', 'orientative' => 'La normativa puede cambiar: consulta la información oficial antes de comprar.'],
];
$breakdown_zones = array_map(function ($zone) use ($breakdown_guidance) { return array_merge($zone, $breakdown_guidance[$zone['id']] ?? []); }, $breakdown_zones);

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

    <!-- Hero Scrollytelling con video a fondo completo (Spec 010 / Imagen oficial) -->
    <section class="garage-hero garage-hero--scrolly" id="garageHeroSection" aria-labelledby="garage-hero-title">
        <div class="garage-hero__sticky-wrapper">
            <!-- Video de fondo a pantalla completa controlado por scroll -->
            <div class="garage-hero__video-wrap" aria-hidden="true">
                <video class="garage-hero-bg-video" 
                       id="garageHeroVideo" 
                       muted 
                       playsinline 
                       preload="auto">
                    <!-- Secuencia oficial de vídeo Hero CocheCierto Garaje -->
                    <source src="https://garaje.cochecierto.com/wp-content/uploads/2026/09/magnific_1.-eliminar-todos-los-tex_If5YX9otvE.mp4" type="video/mp4">
                </video>
                <div class="garage-hero__backdrop-overlay"></div>
            </div>

            <div class="garage-shell garage-hero__layout">
                <!-- Títulos superiores según diseño de referencia -->
                <div class="garage-hero__title-group" id="garageHeroTitleGroup">
                    <h1 id="garage-hero-title">
                        <span class="hero-title-main">Cuida mejor tu coche.</span>
                        <span class="hero-title-accent">Elige solo lo que necesitas.</span>
                    </h1>
                    <p class="garage-hero__subtitle">
                        Guías claras, recomendaciones compatibles y productos útiles para cuidar, equipar y disfrutar tu coche.
                    </p>
                </div>

                <!-- CTA inferiores que se mantienen visibles durante el scroll -->
                <div class="garage-hero__actions" id="garageHeroActions">
                    <a class="garage-button garage-button--orange garage-hero__cta-primary" href="#garage-despiece">
                        Explorar el Garaje <span aria-hidden="true">↓</span>
                    </a>
                    <a class="garage-hero__cta-secondary" href="#garage-momento">
                        Ver guías paso a paso <span aria-hidden="true">→</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Selector de intención inicial (Pantalla 1 - Flujo Mobile-First) -->
    <section class="garage-section garage-intent-section" id="garage-intentos" aria-labelledby="garage-intent-title">
        <div class="garage-shell">
            <div class="garage-intent-header">
                <p class="garage-kicker">Primer paso sin rodeos</p>
                <h2 id="garage-intent-title">¿Qué necesitas hacer hoy?</h2>
                <p class="garage-intent-desc">Elige una ruta directa y encuentra respuestas útiles sin registro previo.</p>
            </div>
            <div class="garage-intent-grid">
                <a class="garage-intent-card" href="#garage-despiece">
                    <div class="garage-intent-card__icon" aria-hidden="true">🚗</div>
                    <div class="garage-intent-card__body">
                        <strong class="garage-intent-card__title">Revisar y cuidar mi coche</strong>
                        <p class="garage-intent-card__text">Encuentra qué comprobar y cuándo hacerlo en cada zona clave.</p>
                    </div>
                    <span class="garage-intent-card__arrow" aria-hidden="true">→</span>
                </a>
                <a class="garage-intent-card" href="<?php echo esc_url(home_url('/guias/primeras-72-horas/')); ?>">
                    <div class="garage-intent-card__icon" aria-hidden="true">🔑</div>
                    <div class="garage-intent-card__body">
                        <strong class="garage-intent-card__title">Acabo de comprar un coche</strong>
                        <p class="garage-intent-card__text">Empieza con una ruta clara para tus primeros días de posesión.</p>
                    </div>
                    <span class="garage-intent-card__arrow" aria-hidden="true">→</span>
                </a>
                <a class="garage-intent-card" href="<?php echo esc_url(home_url('/productos/')); ?>">
                    <div class="garage-intent-card__icon" aria-hidden="true">🔍</div>
                    <div class="garage-intent-card__body">
                        <strong class="garage-intent-card__title">Buscar algo para mi coche</strong>
                        <p class="garage-intent-card__text">Te ayudamos a encontrar un producto útil, contrastado y compatible.</p>
                    </div>
                    <span class="garage-intent-card__arrow" aria-hidden="true">→</span>
                </a>
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
                        <h2 id="garage-breakdown-title">Qué revisar en cada parte de tu coche</h2>
                        <p class="garage-section__subheading">Consulta qué comprobar, con qué frecuencia hacerlo y cuándo conviene acudir a un profesional.</p>
                </div>
                <div class="garage-breakdown-nav" role="tablist" aria-label="Zonas del vehículo">
                    <?php foreach ($breakdown_zones as $index => $zone) : ?>
                        <button type="button" 
                                class="garage-breakdown-tab <?php echo $index === 0 ? 'is-active' : ''; ?>" 
                                id="tab-<?php echo esc_attr($zone['id']); ?>"
                                data-zone="<?php echo esc_attr($zone['id']); ?>" 
                                role="tab" 
                                aria-controls="paso-<?php echo esc_attr($zone['id']); ?>"
                                tabindex="<?php echo $index === 0 ? '0' : '-1'; ?>"
                                aria-selected="<?php echo $index === 0 ? 'true' : 'false'; ?>">
                            <span class="garage-breakdown-tab__index">0<?php echo esc_html($index + 1); ?></span>
                            <span class="garage-breakdown-tab__label"><?php echo esc_html($zone['tab_label']); ?></span>
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Rejilla Panorámica: Escenario Visual (Izquierda) + Tarjetas de Despiece (Derecha) -->
            <div class="garage-breakdown__layout">
                
                <!-- Columna Izquierda: Consola Visual Sticky con Coche Flotante 3D y Telemetría Viva -->
                <div class="garage-breakdown__stage-wrap">
                    <div class="garage-breakdown__stage" data-active-zone="carroceria" data-finish="brillo">
                        
                        <!-- Coche 3D flotando libremente sin caja contenedora -->
                        <div class="garage-breakdown__car-display">
                            
                            <!-- Halo de luz radial de fondo para acentuar el coche libre -->
                            <div class="garage-car-ambient-glow" aria-hidden="true"></div>

                            <!-- Imagen base del coche insignia con recorte transparente -->
                            <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/vehicles/coche-insignia-orange-transparent.png'); ?>" 
                                 alt="Diagrama interactivo del coche CocheCierto" 
                                 class="garage-breakdown__car-img" />

                            <!-- Sombra realista de contacto con el suelo bajo las ruedas -->
                            <div class="garage-car-ground-shadow" aria-hidden="true"></div>

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

                            <!-- EFECTO 5: Telemetría y estado de Frenos -->
                            <div class="garage-vis-layer garage-vis-layer--frenos" aria-hidden="true">
                                <div class="garage-hud-box garage-hud-box--brakes">
                                    <span class="garage-hud-label">Sistema Frenado</span>
                                    <strong class="garage-hud-val">Pastillas: 8 mm · Disco Óptimo</strong>
                                    <small class="garage-hud-sub">● Líquido DOT 4: ebullición 260 °C</small>
                                </div>
                            </div>

                            <!-- EFECTO 6: Voltímetro y carga Batería 12V -->
                            <div class="garage-vis-layer garage-vis-layer--electricidad" aria-hidden="true">
                                <div class="garage-hud-box garage-hud-box--battery">
                                    <span class="garage-hud-label">Tensión Batería 12V</span>
                                    <strong class="garage-hud-val">12.68 V · Estado SOH 94%</strong>
                                    <small class="garage-hud-sub">● Alternador: 14.2V en marcha</small>
                                </div>
                            </div>

                            <!-- EFECTO 7: Baliza V16 estroboscópica en techo (Seguridad) -->
                            <div class="garage-vis-layer garage-vis-layer--seguridad" aria-hidden="true">
                                <div class="garage-v16-beacon">
                                    <span class="garage-v16-beacon__flash"></span>
                                    <span class="garage-v16-beacon__badge">V16 DGT 3.0</span>
                                </div>
                            </div>

                            <!-- Hotspots interactivos con pulsación libre sobre el coche -->
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

                    </div>
                </div>

                <!-- Columna Derecha: Tarjetas de Despiece Scrollytelling y Carrusel Vertical -->
                <div class="garage-breakdown__steps-wrapper">
                    <div class="garage-breakdown__steps">
                        <?php foreach ($breakdown_zones as $index => $zone) : ?>
                            <article class="garage-breakdown-step <?php echo $index === 0 ? 'is-active' : ''; ?>" 
                                     data-zone="<?php echo esc_attr($zone['id']); ?>" 
                                     data-stat="<?php echo esc_attr($zone['telemetry_stat']); ?>"
                                     data-index="<?php echo esc_attr($index); ?>"
                                     id="paso-<?php echo esc_attr($zone['id']); ?>"
                                     role="tabpanel"
                                     aria-labelledby="tab-<?php echo esc_attr($zone['id']); ?>"
                                     aria-hidden="<?php echo $index === 0 ? 'false' : 'true'; ?>">
                                
                                <div class="garage-breakdown-step__header">
                                    <span class="garage-breakdown-step__index">0<?php echo esc_html($index + 1); ?> / 07</span>
                                    <span class="garage-breakdown-step__badge"><?php echo esc_html($zone['highlight_badge']); ?></span>
                                </div>

                                <p class="garage-kicker"><?php echo esc_html($zone['kicker']); ?></p>
                                <h3 class="garage-breakdown-step__title"><?php echo esc_html($zone['title']); ?></h3>
                                <p class="garage-breakdown-step__desc"><?php echo esc_html($zone['desc']); ?></p>

                                <div class="garage-breakdown-guidance">
                                    <p><strong>Qué revisar:</strong> <?php echo esc_html($zone['what_to_check']); ?></p>
                                    <p><strong>Por qué importa:</strong> <?php echo esc_html($zone['why_it_matters']); ?></p>
                                    <p><strong>Cómo comprobarlo:</strong> <?php echo esc_html($zone['how_to_check']); ?></p>
                                    <div><strong>Señales de alerta</strong><ul><?php foreach ($zone['alerts'] as $alert) : ?><li><?php echo esc_html($alert); ?></li><?php endforeach; ?></ul></div>
                                    <div><strong>Puedes hacerlo tú</strong><ul><?php foreach ($zone['diy'] as $item) : ?><li><?php echo esc_html($item); ?></li><?php endforeach; ?></ul></div>
                                    <p><strong>Acude a un taller si:</strong> <?php echo esc_html($zone['professional']); ?></p>
                                    <?php if ($zone['id'] === 'seguridad') : ?><p class="garage-breakdown-source"><strong>Seguridad vial:</strong> información orientativa revisada el 12/09/2026. Consulta la <a href="https://www.dgt.es/muevete-con-seguridad/seguridad-vial/elementos-de-seguridad/" target="_blank" rel="noopener">fuente oficial de la DGT</a> y la lista de dispositivos homologados antes de comprar.</p><?php endif; ?>
                                </div>

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
                                    <a href="<?php echo esc_url($zone['url']); ?>" class="garage-button garage-button--orange" rel="sponsored noopener">
                                        Ver productos compatibles de <?php echo esc_html($zone['tab_label']); ?> <span>↗</span>
                                    </a>
                                    <small>Comprueba medidas, homologación y compatibilidad antes de comprar.</small>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>

                    <!-- Controles de navegación del carrusel accesibles -->
                    <div class="garage-step-carousel-controls" aria-label="Navegación de partes">
                        <button type="button" class="garage-step-nav-btn garage-step-nav-btn--prev" aria-label="Zona anterior">
                            <span aria-hidden="true">←</span> Anterior
                        </button>
                        <div class="garage-step-carousel-indicator">
                            <span class="garage-step-curr" id="garage-step-active-index">01</span> / <span>07</span>
                        </div>
                        <button type="button" class="garage-step-nav-btn garage-step-nav-btn--next" aria-label="Siguiente zona">
                            Siguiente <span aria-hidden="true">→</span>
                        </button>
                    </div>
                </div>

            </div>

            <div class="garage-breakdown-checklist" aria-label="Checklist alternativo de zonas">
                <strong>Checklist rápido</strong>
                <div class="garage-breakdown-checklist__items">
                    <?php foreach ($breakdown_zones as $zone) : ?><button type="button" data-zone="<?php echo esc_attr($zone['id']); ?>">□ <?php echo esc_html($zone['tab_label']); ?></button><?php endforeach; ?>
                </div>
            </div>

            <!-- Advertencia técnica de rigor y seguridad (Principio 5) -->
            <div class="garage-breakdown-disclaimer">
                <span class="garage-breakdown-disclaimer__icon" aria-hidden="true">ℹ️</span>
                <p><strong>Valor orientativo:</strong> puede variar según marca, modelo, motor y versión. Las referencias mostradas son generales para turismos. Consulta siempre el manual del vehículo, la etiqueta de presión del pilar de la puerta o la documentación oficial antes de intervenir o comprar.</p>
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
                        <span class="garage-moment-body">
                            <strong><?php echo esc_html($moment['label']); ?></strong>
                            <small><?php echo esc_html($moment['text']); ?></small>
                        </span>
                        <span class="garage-moment-arrow" aria-hidden="true">→</span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Criterio Editorial y Guía de Garaje Clara -->
    <section class="garage-section garage-section--assistant" aria-labelledby="garage-assistant-title">
        <div class="garage-shell garage-assistant-card">
            <div class="garage-assistant-card__portrait">
                <span class="garage-avatar garage-avatar--clara" aria-label="Avatar de Clara">Clara</span>
            </div>
            <div>
                <p class="garage-kicker">Criterio editorial independiente</p>
                <h2 id="garage-assistant-title">¿Tienes una duda con tu coche? El criterio editorial de Clara te orienta antes de gastar.</h2>
                <p>Sin lenguaje mecánico innecesario ni presión comercial. Diseñamos nuestras rutas de comprobación para que identifiques el síntoma exacto, compruebes qué puedes solucionar tú mismo y elijas únicamente repuestos o accesorios compatibles y necesarios.</p>
                <div class="garage-assistant-card__actions">
                    <a class="garage-button garage-button--orange" href="<?php echo esc_url(home_url('/guias/primeras-72-horas/')); ?>">Explorar guías paso a paso <span>→</span></a>
                    <a class="garage-button garage-button--dark" href="<?php echo esc_url(home_url('/productos/')); ?>">Ver catálogo de productos <span>↗</span></a>
                </div>
            </div>
            <div class="garage-assistant-card__signal">
                <span>01</span><span>zona</span>
                <span>02</span><span>comprobación</span>
                <span>03</span><span>criterio</span>
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
                <p><strong>✓ Compatibilidad contrastada</strong><span>Te indicamos qué datos contrastar en tu vehículo antes de comprar.</span></p>
                <p><strong>✓ Transparencia en afiliación</strong><span>Los enlaces a Amazon u otros distribuidores pueden generar una comisión sin coste adicional para ti.</span></p>
            </div>
        </div>
    </section>
</main>
<?php
get_footer();
