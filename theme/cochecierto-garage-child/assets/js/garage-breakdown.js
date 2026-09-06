/**
 * CocheCierto Garaje — Despiece Interactivo, Scrollytelling y Navegación Móvil
 * Spec 010: Arquitectura Responsive y Ergonomía Táctil
 */
(function() {
    'use strict';

    // 1. Inicialización del Menú Móvil
    function initMobileMenu() {
        var toggleBtn = document.querySelector('.garage-menu-toggle');
        var drawer = document.getElementById('garage-mobile-drawer');
        if (!toggleBtn || !drawer) return;

        var overlay = drawer.querySelector('.garage-mobile-drawer__overlay');
        var links = drawer.querySelectorAll('.garage-mobile-link, .garage-mobile-cta');

        function openMenu() {
            toggleBtn.setAttribute('aria-expanded', 'true');
            toggleBtn.classList.add('is-active');
            drawer.setAttribute('aria-hidden', 'false');
            drawer.classList.add('is-open');
            document.body.classList.add('garage-menu-locked');
        }

        function closeMenu() {
            toggleBtn.setAttribute('aria-expanded', 'false');
            toggleBtn.classList.remove('is-active');
            drawer.setAttribute('aria-hidden', 'true');
            drawer.classList.remove('is-open');
            document.body.classList.remove('garage-menu-locked');
        }

        toggleBtn.addEventListener('click', function(e) {
            e.preventDefault();
            var isOpen = toggleBtn.getAttribute('aria-expanded') === 'true';
            if (isOpen) {
                closeMenu();
            } else {
                openMenu();
            }
        });

        if (overlay) {
            overlay.addEventListener('click', closeMenu);
        }

        links.forEach(function(link) {
            link.addEventListener('click', closeMenu);
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && drawer.classList.contains('is-open')) {
                closeMenu();
            }
        });
    }

    // 2. Inicialización del Despiece y Visor Dinámico
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
        var tabsNav = breakdown.querySelector('.garage-breakdown-nav');

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

            // Actualizar pestañas superiores y centrar en móviles si tiene scroll
            tabs.forEach(function(tab) {
                var isActive = tab.getAttribute('data-zone') === zoneId;
                tab.classList.toggle('is-active', isActive);
                tab.setAttribute('aria-selected', isActive ? 'true' : 'false');
                if (isActive && tabsNav && window.innerWidth <= 800) {
                    var tabLeft = tab.offsetLeft - (tabsNav.clientWidth / 2) + (tab.clientWidth / 2);
                    tabsNav.scrollTo({ left: Math.max(0, tabLeft), behavior: 'smooth' });
                }
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
                    var yOffset = window.innerWidth <= 800 ? -80 : -110;
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
                rootMargin: window.innerWidth <= 800 ? '-20% 0px -30% 0px' : '-25% 0px -35% 0px',
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

    // 3. Inicialización de Barra de Navegación Modo App (Bottom Bar)
    function initAppBar() {
        var appBar = document.querySelector('.garage-app-bar');
        if (!appBar) return;

        var menuBtn = appBar.querySelector('.garage-app-menu-btn');
        var toggleBtn = document.querySelector('.garage-menu-toggle');

        if (menuBtn && toggleBtn) {
            menuBtn.addEventListener('click', function(e) {
                e.preventDefault();
                toggleBtn.click();
            });
        }

        // Marcar pestaña activa según URL y sección
        var currentPath = window.location.pathname;
        var currentHash = window.location.hash;
        var items = appBar.querySelectorAll('.garage-app-bar__item[data-app-tab]');

        function updateActiveTab() {
            var hash = window.location.hash;
            items.forEach(function(item) {
                var tab = item.getAttribute('data-app-tab');
                var isMatch = false;

                if (tab === 'productos' && currentPath.indexOf('productos') !== -1) {
                    isMatch = true;
                } else if (tab === 'despiece' && hash === '#garage-despiece') {
                    isMatch = true;
                } else if (tab === 'guias' && (hash === '#garage-momento' || currentPath.indexOf('guias') !== -1)) {
                    isMatch = true;
                } else if (tab === 'home' && (currentPath === '/' || currentPath === '') && !hash) {
                    isMatch = true;
                }

                if (isMatch) {
                    item.classList.add('is-active');
                } else {
                    item.classList.remove('is-active');
                }
            });
        }

        window.addEventListener('hashchange', updateActiveTab);
        updateActiveTab();
    }

    // 4. Inicialización de PWA (Service Worker e Instalación)
    function initPWA() {
        // Registro de Service Worker
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                var swPath = (window.location.origin ? window.location.origin : '') + '/sw.js';
                navigator.serviceWorker.register(swPath).catch(function() {
                    // Fallback a ruta de tema si sw.js en raíz no está en rewrite
                    var childSw = document.querySelector('link[rel="manifest"]');
                    if (childSw) {
                        var themeSw = childSw.href.replace('manifest.json', 'sw.js');
                        navigator.serviceWorker.register(themeSw).catch(function(e) {
                            console.log('SW registration note:', e.message);
                        });
                    }
                });
            });
        }

        // Manejador de prompt de instalación
        var deferredPrompt = null;
        var installButtons = document.querySelectorAll('.garage-pwa-install-btn');

        window.addEventListener('beforeinstallprompt', function(e) {
            e.preventDefault();
            deferredPrompt = e;
            installButtons.forEach(function(btn) {
                btn.style.display = 'inline-flex';
            });
        });

        installButtons.forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                if (deferredPrompt) {
                    deferredPrompt.prompt();
                    deferredPrompt.userChoice.then(function(choiceResult) {
                        if (choiceResult.outcome === 'accepted') {
                            installButtons.forEach(function(b) { b.style.display = 'none'; });
                        }
                        deferredPrompt = null;
                    });
                } else {
                    // Si no hay prompt nativo (ej. iOS Safari)
                    alert('Para instalar CocheCierto Garaje en tu pantalla de inicio:\n\n1. Pulsa el botón "Compartir" en tu navegador (icono cuadrado con flecha hacia arriba).\n2. Selecciona "Añadir a la pantalla de inicio".');
                }
            });
        });
    }

    function init() {
        initMobileMenu();
        initGarageBreakdown();
        initAppBar();
        initPWA();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();

