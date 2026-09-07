<?php
defined('ABSPATH') || exit;
$slug = trim((string) parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH), '/');
$slug = str_replace('guias/', '', $slug);
$guides = [
    'primeras-72-horas' => [
        'title' => 'Primeras 72 horas con tu coche',
        'kicker' => 'Ruta guiada · Día 1 al 3',
        'intro' => 'Acabas de estrenar una etapa. Antes de gastar en accesorios, haz estas comprobaciones esenciales para rodar con tranquilidad y seguridad.',
        'items' => [
            ['title' => 'Documentación y seguro obligatorio', 'desc' => 'Comprueba póliza en vigor, permiso de circulación, tarjeta ITV y ten a mano el teléfono de asistencia en carretera.'],
            ['title' => 'Presión y estado de neumáticos en frío', 'desc' => 'Revisa la presión recomendada en el pilar B y asegúrate de que no haya cortes, bultos ni desgaste anormal.'],
            ['title' => 'Niveles básicos bajo el capó', 'desc' => 'Comprueba nivel de aceite motor sobre plano horizontal en frío, líquido refrigerante y lavaparabrisas.'],
            ['title' => 'Luces, testigos del cuadro y visibilidad', 'desc' => 'Verifica luces cortas, largas, intermitentes y asegúrate de que las escobillas no rayen el cristal.'],
            ['title' => 'Kit legal de emergencia', 'desc' => 'Localiza la baliza V16 conectada DGT 3.0 (o triángulos de repuesto) y chaleco reflectante en el habitáculo.'],
        ],
        'products_cta' => 'Ver productos recomendados para las primeras 72 horas',
        'products_url' => home_url('/categorias/seguridad-emergencia/'),
    ],
    'primeros-30-dias' => [
        'title' => 'Primeros 30 días con tu coche',
        'kicker' => 'Ruta guiada · Primer mes',
        'intro' => 'Ya conoces las sensaciones de conducción de tu vehículo. Ahora consolida una base fiable de mantenimiento preventivo.',
        'items' => [
            ['title' => 'Registro de mantenimientos previos', 'desc' => 'Anota la fecha del último cambio de aceite, filtros y correa de distribución si es un coche de segunda mano.'],
            ['title' => 'Estado de carga de la batería 12V', 'desc' => 'Comprueba que el voltaje en reposo no caiga de 12.3V para evitar sorpresas en mañanas frías.'],
            ['title' => 'Limpieza neutra y protección inicial', 'desc' => 'Aplica un primer lavado con champú neutro y microfibra para sellar la laca antes de que se incruste ferodo.'],
            ['title' => 'Organización del maletero y habitáculo', 'desc' => 'Elimina objetos sueltos que puedan convertirse en proyectiles en caso de frenada brusca.'],
        ],
        'products_cta' => 'Ver productos de mantenimiento preventivo',
        'products_url' => home_url('/categorias/mantenimiento/'),
    ],
    'primeros-60-dias' => [
        'title' => 'Primeros 60 días con tu coche',
        'kicker' => 'Ruta guiada · Segundo mes',
        'intro' => 'Con el uso diario ya sabes qué te incomoda y qué necesitas realmente en tus trayectos cotidianos.',
        'items' => [
            ['title' => 'Detección de ruidos o vibraciones', 'desc' => 'Presta atención a posibles desalineaciones de dirección o chirridos leves en pastillas de freno.'],
            ['title' => 'Ajuste ergonómico y confort a bordo', 'desc' => 'Evalúa soportes de teléfono magnéticos homologados y soluciones de carga rápida USB sin cables desordenados.'],
            ['title' => 'Equipamiento estacional', 'desc' => 'Anticípate a la estación que viene (parasoles térmicos o rascadores de hielo y anticongelante).'],
        ],
        'products_cta' => 'Ver productos de interior y confort',
        'products_url' => home_url('/categorias/confort/'),
    ],
    'primeros-90-dias' => [
        'title' => 'Primeros 90 días con tu coche',
        'kicker' => 'Ruta guiada · Tercer mes',
        'intro' => 'Convierte el cuidado en una rutina sencilla de 10 minutos al mes sin gastos superfluos.',
        'items' => [
            ['title' => 'Revisión periódica de consumo y fluidos', 'desc' => 'Comprueba si el motor consume aceite de forma apreciable y rellena siempre con la especificación exacta.'],
            ['title' => 'Inspección de desgaste del dibujo (Tread Wear)', 'desc' => 'Verifica con una moneda de 1 euro o profundímetro que el dibujo supere holgadamente los 3 mm recomendados.'],
            ['title' => 'Tratamiento hidrofóbico de cristales', 'desc' => 'Mejora radicalmente la visibilidad nocturna bajo lluvia aplicando un repelente antilluvia en la luna delantera.'],
        ],
        'products_cta' => 'Ver productos de cuidado exterior',
        'products_url' => home_url('/categorias/limpieza-cuidado/'),
    ],
    'primer-ano' => [
        'title' => 'Tu primer año con el coche',
        'kicker' => 'Ruta guiada · Anual',
        'intro' => 'Cierra tu primer ciclo de uso planificando mantenimientos mayores y revisando el estado general.',
        'items' => [
            ['title' => 'Sustitución de filtro de polen y habitáculo', 'desc' => 'Garantiza aire limpio y libre de alérgenos sustituyendo el filtro tras 15.000 km o 1 año.'],
            ['title' => 'Inspección visual de bajos y amortiguadores', 'desc' => 'Comprueba si hay fugas de aceite en vástagos de amortiguación o silentblocks agrietados.'],
            ['title' => 'Revisión anual antes de vacaciones o viaje largo', 'desc' => 'Comprueba rueda de repuesto o kit antipinchazos con compresor a batería cargado.'],
        ],
        'products_cta' => 'Ver catálogo completo de viaje y equipamiento',
        'products_url' => home_url('/productos/'),
    ],
];

$guide = $guides[$slug] ?? $guides['primeras-72-horas'];
$guide_key = 'cc_guide_' . esc_attr($slug);

get_header();
?>
<main class="garage-guide-view">
    <div class="garage-shell">
        
        <nav class="garage-product-breadcrumb" aria-label="Ruta de navegación">
            <a href="<?php echo esc_url(home_url('/')); ?>">Garaje</a> <span>/</span>
            <a href="<?php echo esc_url(home_url('/#garage-momento')); ?>">Guías por etapa</a> <span>/</span>
            <span aria-current="page"><?php echo esc_html($guide['title']); ?></span>
        </nav>

        <header class="garage-guide-hero">
            <p class="garage-kicker"><?php echo esc_html($guide['kicker']); ?></p>
            <h1><?php echo esc_html($guide['title']); ?></h1>
            <p class="garage-guide-intro"><?php echo esc_html($guide['intro']); ?></p>
        </header>

        <!-- Bloque Interactivo de Checklist ("Garaje Pocket") -->
        <div class="garage-guide-layout">
            <div class="garage-guide-main">
                
                <!-- Barra de Progreso del Checklist -->
                <div class="garage-checklist-card">
                    <div class="garage-checklist-header">
                        <div>
                            <span class="garage-checklist-badge">📋 Checklist interactivo sin registro</span>
                            <h2 class="garage-checklist-title">Comprobaciones clave</h2>
                        </div>
                        <div class="garage-checklist-counter" id="garageChecklistCounter">
                            <span id="garageCompletedCount">0</span> de <?php echo count($guide['items']); ?> completadas
                        </div>
                    </div>
                    
                    <div class="garage-progress-bar-wrap" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="<?php echo count($guide['items']); ?>">
                        <div class="garage-progress-bar-fill" id="garageProgressFill" style="width: 0%;"></div>
                    </div>

                    <div class="garage-checklist-items" id="garageChecklistItems" data-guide-key="<?php echo esc_attr($guide_key); ?>">
                        <?php foreach ($guide['items'] as $index => $item) : ?>
                            <label class="garage-check-row" for="guide-check-<?php echo esc_attr($index); ?>">
                                <input type="checkbox" 
                                       id="guide-check-<?php echo esc_attr($index); ?>" 
                                       class="garage-check-input" 
                                       data-item-index="<?php echo esc_attr($index); ?>">
                                <span class="garage-check-box" aria-hidden="true"></span>
                                <div class="garage-check-content">
                                    <strong class="garage-check-label"><?php echo esc_html($item['title']); ?></strong>
                                    <p class="garage-check-desc"><?php echo esc_html($item['desc']); ?></p>
                                </div>
                            </label>
                        <?php endforeach; ?>
                    </div>

                    <div class="garage-checklist-footer">
                        <small class="garage-checklist-save-hint">✓ Guardado automáticamente en este móvil</small>
                        <button type="button" class="garage-checklist-reset-btn" id="garageResetBtn">Reiniciar casillas</button>
                    </div>
                </div>

            </div>

            <!-- Columna Lateral Editorial -->
            <aside class="garage-guide-sidebar">
                <div class="garage-guide-next-box">
                    <p class="garage-kicker">Criterio editorial</p>
                    <h3>No compres todo hoy.</h3>
                    <p>Revisa primero las comprobaciones de arriba. Solo adquiere productos cuando identifiques una necesidad o desgaste concreto.</p>
                    <a class="garage-button garage-button--orange garage-button--full" href="<?php echo esc_url($guide['products_url']); ?>">
                        <?php echo esc_html($guide['products_cta']); ?> <span>↗</span>
                    </a>
                </div>

                <div class="garage-guide-clara-box">
                    <div class="garage-avatar garage-avatar--clara" style="width:48px;height:48px;font-size:0.95rem;">Clara</div>
                    <div>
                        <strong>¿Dudas con algún punto?</strong>
                        <p>Te ayudamos a interpretar testigos del cuadro o medidas de tu coche con lenguaje claro.</p>
                        <a href="<?php echo esc_url(home_url('/#garage-assistant-title')); ?>" class="garage-link-inline">Orientación con Clara →</a>
                    </div>
                </div>
            </aside>
        </div>

    </div>
</main>

<script>
(function() {
    var container = document.getElementById('garageChecklistItems');
    if (!container) return;
    var guideKey = container.getAttribute('data-guide-key');
    var inputs = container.querySelectorAll('.garage-check-input');
    var countElem = document.getElementById('garageCompletedCount');
    var fillElem = document.getElementById('garageProgressFill');
    var resetBtn = document.getElementById('garageResetBtn');

    function loadState() {
        try {
            var raw = localStorage.getItem(guideKey);
            return raw ? JSON.parse(raw) : {};
        } catch(e) { return {}; }
    }

    function saveState(state) {
        try {
            localStorage.setItem(guideKey, JSON.stringify(state));
        } catch(e) {}
    }

    function updateProgress() {
        var state = loadState();
        var checked = 0;
        inputs.forEach(function(input) {
            var idx = input.getAttribute('data-item-index');
            var isChecked = !!state[idx];
            input.checked = isChecked;
            input.closest('.garage-check-row').classList.toggle('is-done', isChecked);
            if (isChecked) checked++;
        });

        if (countElem) countElem.textContent = checked;
        if (fillElem && inputs.length) {
            var pct = Math.round((checked / inputs.length) * 100);
            fillElem.style.width = pct + '%';
        }
    }

    inputs.forEach(function(input) {
        input.addEventListener('change', function() {
            var state = loadState();
            var idx = input.getAttribute('data-item-index');
            state[idx] = input.checked;
            saveState(state);
            updateProgress();
        });
    });

    if (resetBtn) {
        resetBtn.addEventListener('click', function() {
            if (confirm('¿Quieres desmarcar todas las casillas de esta guía?')) {
                saveState({});
                updateProgress();
            }
        });
    }

    updateProgress();
})();
</script>

<?php get_footer();
