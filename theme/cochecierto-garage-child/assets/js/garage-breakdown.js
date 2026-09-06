/**
 * CocheCierto Garage — Despiece Interactivo y Scrollytelling
 * Spec 009: Visor Dinámico con Efectos de Zona y Telemetría
 */
(function() {
    'use strict';

    function initGarageBreakdown() {
        var breakdown = document.querySelector('.garage-breakdown');
        if (!breakdown) return;

        var steps = breakdown.querySelectorAll('.garage-breakdown-step');
        var hotspots = breakdown.querySelectorAll('.garage-hotspot');
        var tabs = breakdown.querySelectorAll('.garage-breakdown-tab');
        var stage = breakdown.querySelector('.garage-breakdown__stage');
        var zoneLabel = breakdown.querySelector('.garage-stage-indicator__zone strong');
        var activeStat = breakdown.querySelector('#garage-active-stat');
        var finishBtns = breakdown.querySelectorAll('.garage-finish-btn');

        var zoneNames = {
            'carroceria': 'Carrocería & Exterior',
            'interior': 'Habitáculo & Interior',
            'motor': 'Vano Motor & Mecánica',
            'neumaticos': 'Ruedas & Neumáticos',
            'seguridad': 'Seguridad & DGT 3.0'
        };

        function setActiveZone(zoneId, shouldScroll) {
            if (!zoneId) return;

            // Actualizar atributo en el stage visual
            if (stage) {
                stage.setAttribute('data-active-zone', zoneId);
            }

            // Actualizar etiqueta del indicador
            if (zoneLabel && zoneNames[zoneId]) {
                zoneLabel.textContent = zoneNames[zoneId];
            }

            // Actualizar hotspots
            hotspots.forEach(function(h) {
                var isActive = h.getAttribute('data-zone') === zoneId;
                h.classList.toggle('is-active', isActive);
                h.setAttribute('aria-pressed', isActive ? 'true' : 'false');
            });

            // Actualizar pestañas superiores
            tabs.forEach(function(tab) {
                var isActive = tab.getAttribute('data-zone') === zoneId;
                tab.classList.toggle('is-active', isActive);
                tab.setAttribute('aria-selected', isActive ? 'true' : 'false');
            });

            // Actualizar tarjetas de pasos y telemetría
            steps.forEach(function(step) {
                var isActive = step.getAttribute('data-zone') === zoneId;
                step.classList.toggle('is-active', isActive);
                if (isActive && activeStat) {
                    var stat = step.getAttribute('data-stat');
                    if (stat) activeStat.textContent = stat;
                }
            });

            // Si se hace clic en una pestaña o hotspot, scroll suave al paso
            if (shouldScroll) {
                var targetStep = breakdown.querySelector('.garage-breakdown-step[data-zone="' + zoneId + '"]');
                if (targetStep) {
                    var yOffset = -110;
                    var y = targetStep.getBoundingClientRect().top + window.pageYOffset + yOffset;
                    window.scrollTo({ top: y, behavior: 'smooth' });
                }
            }
        }

        // Selector de acabado interactivo (Brillo / Mate)
        finishBtns.forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                var finishVal = btn.getAttribute('data-finish-val');
                finishBtns.forEach(function(b) { b.classList.remove('is-active'); });
                btn.classList.add('is-active');
                if (stage) {
                    stage.setAttribute('data-finish', finishVal);
                }
            });
        });

        // Eventos en pestañas
        tabs.forEach(function(tab) {
            tab.addEventListener('click', function(e) {
                e.preventDefault();
                var zone = tab.getAttribute('data-zone');
                setActiveZone(zone, true);
            });
        });

        // Eventos en hotspots
        hotspots.forEach(function(hotspot) {
            hotspot.addEventListener('click', function(e) {
                e.preventDefault();
                var zone = hotspot.getAttribute('data-zone');
                setActiveZone(zone, true);
            });
        });

        // Sincronización Scrollytelling con IntersectionObserver
        if ('IntersectionObserver' in window) {
            var observerOptions = {
                root: null,
                rootMargin: '-25% 0px -35% 0px',
                threshold: 0.25
            };

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        var zone = entry.target.getAttribute('data-zone');
                        setActiveZone(zone, false);
                    }
                });
            }, observerOptions);

            steps.forEach(function(step) {
                observer.observe(step);
            });
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initGarageBreakdown);
    } else {
        initGarageBreakdown();
    }
})();
