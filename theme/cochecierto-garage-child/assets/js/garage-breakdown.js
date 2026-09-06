/**
 * CocheCierto Garage — Despiece Interactivo y Scrollytelling
 * Spec 008
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

        function setActiveZone(zoneId, shouldScroll) {
            if (!zoneId) return;

            // Actualizar clase en stage
            if (stage) {
                stage.setAttribute('data-active-zone', zoneId);
            }

            // Actualizar hotspots
            hotspots.forEach(function(h) {
                var isActive = h.getAttribute('data-zone') === zoneId;
                h.classList.toggle('is-active', isActive);
                h.setAttribute('aria-pressed', isActive ? 'true' : 'false');
            });

            // Actualizar pestañas
            tabs.forEach(function(tab) {
                var isActive = tab.getAttribute('data-zone') === zoneId;
                tab.classList.toggle('is-active', isActive);
                tab.setAttribute('aria-selected', isActive ? 'true' : 'false');
            });

            // Actualizar tarjetas de pasos
            steps.forEach(function(step) {
                var isActive = step.getAttribute('data-zone') === zoneId;
                step.classList.toggle('is-active', isActive);
            });

            // Si se pulsa una pestaña o hotspot, scroll suave al paso correspondiente
            if (shouldScroll) {
                var targetStep = breakdown.querySelector('.garage-breakdown-step[data-zone="' + zoneId + '"]');
                if (targetStep) {
                    var yOffset = -80;
                    var y = targetStep.getBoundingClientRect().top + window.pageYOffset + yOffset;
                    window.scrollTo({ top: y, behavior: 'smooth' });
                }
            }
        }

        // Click en pestañas
        tabs.forEach(function(tab) {
            tab.addEventListener('click', function(e) {
                e.preventDefault();
                var zone = tab.getAttribute('data-zone');
                setActiveZone(zone, true);
            });
        });

        // Click en hotspots
        hotspots.forEach(function(hotspot) {
            hotspot.addEventListener('click', function(e) {
                e.preventDefault();
                var zone = hotspot.getAttribute('data-zone');
                setActiveZone(zone, true);
            });
        });

        // Scrollytelling con IntersectionObserver
        if ('IntersectionObserver' in window) {
            var observerOptions = {
                root: null,
                rootMargin: '-30% 0px -40% 0px',
                threshold: 0.2
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
