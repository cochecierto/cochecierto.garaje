/**
 * CocheCierto Garaje — Despiece Interactivo, Scrollytelling y Navegación Móvil
 * Spec 010: Arquitectura Responsive y Ergonomía Táctil
 */
(function() {
    'use strict';

    // 1. Inicialización del Menú Móvil y Drawer
    function initMobileMenu() {
        var drawer = document.getElementById('garage-mobile-drawer');
        if (!drawer) return;

        var overlay = drawer.querySelector('.garage-mobile-drawer__overlay');
        var closeBtn = drawer.querySelector('.garage-mobile-drawer__close');
        var toggleBtn = document.querySelector('.garage-menu-toggle');
        var openBtns = document.querySelectorAll('[data-mobile-menu-open]');
        var links = drawer.querySelectorAll('.garage-mobile-link, .garage-mobile-cta');

        function openMenu() {
            openBtns.forEach(function(b) { b.setAttribute('aria-expanded', 'true'); });
            if (toggleBtn) {
                toggleBtn.setAttribute('aria-expanded', 'true');
                toggleBtn.classList.add('is-active');
            }
            drawer.setAttribute('aria-hidden', 'false');
            drawer.classList.add('is-open');
            document.body.classList.add('garage-menu-locked');
        }

        function closeMenu() {
            openBtns.forEach(function(b) { b.setAttribute('aria-expanded', 'false'); });
            if (toggleBtn) {
                toggleBtn.setAttribute('aria-expanded', 'false');
                toggleBtn.classList.remove('is-active');
            }
            drawer.setAttribute('aria-hidden', 'true');
            drawer.classList.remove('is-open');
            document.body.classList.remove('garage-menu-locked');
        }

        openBtns.forEach(function(b) {
            b.addEventListener('click', function(e) {
                e.preventDefault();
                openMenu();
            });
        });

        if (toggleBtn) {
            toggleBtn.addEventListener('click', function(e) {
                e.preventDefault();
                var isOpen = toggleBtn.getAttribute('aria-expanded') === 'true';
                if (isOpen) closeMenu(); else openMenu();
            });
        }

        if (overlay) overlay.addEventListener('click', closeMenu);
        if (closeBtn) closeBtn.addEventListener('click', closeMenu);

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

        var tabs = breakdown.querySelectorAll('.garage-breakdown-tab');
        var hotspots = breakdown.querySelectorAll('.garage-hotspot');
        var steps = breakdown.querySelectorAll('.garage-breakdown-step');
        var layers = breakdown.querySelectorAll('.garage-vis-layer');
        var finishBtns = breakdown.querySelectorAll('.garage-finish-btn');
        var carImg = breakdown.querySelector('.garage-breakdown__car-img');

        function setActiveZone(zoneId, scrollIntoView) {
            tabs.forEach(function(tab) {
                var isActive = tab.getAttribute('data-zone') === zoneId;
                tab.classList.toggle('is-active', isActive);
                tab.setAttribute('aria-selected', isActive ? 'true' : 'false');
                if (isActive && window.innerWidth <= 800) {
                    try { tab.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' }); } catch(e) {}
                }
            });

            hotspots.forEach(function(hotspot) {
                var isActive = hotspot.getAttribute('data-zone') === zoneId;
                hotspot.classList.toggle('is-active', isActive);
                hotspot.setAttribute('aria-pressed', isActive ? 'true' : 'false');
            });

            steps.forEach(function(step) {
                var isActive = step.getAttribute('data-zone') === zoneId;
                step.classList.toggle('is-active', isActive);
                if (isActive && scrollIntoView && window.innerWidth > 800) {
                    try { step.scrollIntoView({ behavior: 'smooth', block: 'center' }); } catch(e) {}
                }
            });

            layers.forEach(function(layer) {
                var isTarget = layer.classList.contains('garage-vis-layer--' + zoneId);
                layer.classList.toggle('is-active', isTarget);
            });

            if (carImg) {
                if (zoneId === 'carroceria') {
                    carImg.style.filter = 'drop-shadow(0 15px 35px rgba(252, 76, 2, 0.35)) saturate(1.2)';
                } else if (zoneId === 'motor') {
                    carImg.style.filter = 'drop-shadow(0 15px 35px rgba(0, 38, 62, 0.45)) contrast(1.1)';
                } else if (zoneId === 'seguridad') {
                    carImg.style.filter = 'drop-shadow(0 15px 35px rgba(252, 76, 2, 0.4)) brightness(1.05)';
                } else {
                    carImg.style.filter = 'drop-shadow(0 15px 35px rgba(0, 0, 0, 0.3))';
                }
            }
        }

        tabs.forEach(function(tab) {
            tab.addEventListener('click', function(e) {
                e.preventDefault();
                var zone = tab.getAttribute('data-zone');
                setActiveZone(zone, true);
            });
        });

        hotspots.forEach(function(hotspot) {
            hotspot.addEventListener('click', function(e) {
                e.preventDefault();
                var zone = hotspot.getAttribute('data-zone');
                setActiveZone(zone, true);
            });
        });

        finishBtns.forEach(function(btn) {
            btn.addEventListener('click', function() {
                finishBtns.forEach(function(b) { b.classList.remove('is-active'); });
                btn.classList.add('is-active');
                var val = btn.getAttribute('data-finish-val');
                var lacaLayer = breakdown.querySelector('.garage-vis-layer--laca');
                if (lacaLayer) {
                    lacaLayer.style.opacity = val === 'mate' ? '0.1' : '0.7';
                }
            });
        });

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

    // 3. Barra Móvil Modo App alineada con CocheCierto (Auto-hide on scroll)
    function initMobileBottomNav() {
        var bottomNav = document.querySelector('.mobile-bottom-nav');
        if (!bottomNav) return;

        bottomNav.style.transition = 'transform .22s ease';
        bottomNav.style.willChange = 'transform';
        var previousScroll = window.scrollY || 0;
        var showTimer = null;

        var showBottomNav = function () {
            bottomNav.classList.remove('nav-hidden');
            bottomNav.style.transform = 'translateY(0)';
        };

        var handleScroll = function () {
            var currentScroll = window.scrollY || 0;
            var movingDown = currentScroll > previousScroll + 8;
            var movingUp = currentScroll < previousScroll - 8;
            previousScroll = currentScroll;

            var drawer = document.getElementById('garage-mobile-drawer');
            if (drawer && drawer.classList.contains('is-open')) {
                showBottomNav();
                return;
            }

            if (movingDown && currentScroll > 24) {
                bottomNav.classList.add('nav-hidden');
                bottomNav.style.transform = 'translateY(110%)';
            }
            if (movingUp || currentScroll <= 24) {
                showBottomNav();
            }

            window.clearTimeout(showTimer);
            showTimer = window.setTimeout(showBottomNav, 350);
        };

        window.addEventListener('scroll', handleScroll, { passive: true });
        window.addEventListener('resize', showBottomNav, { passive: true });

        // Detección de pestaña activa
        var currentPath = window.location.pathname;
        var items = bottomNav.querySelectorAll('a[data-app-tab]');
        function updateActiveTab() {
            var hash = window.location.hash;
            items.forEach(function(item) {
                var tab = item.getAttribute('data-app-tab');
                var isMatch = false;
                if (tab === 'despiece' && hash === '#garage-despiece') isMatch = true;
                else if (tab === 'guias' && (hash === '#garage-momento' || currentPath.indexOf('guias') !== -1)) isMatch = true;
                else if (tab === 'home' && (currentPath === '/' || currentPath === '') && !hash) isMatch = true;
                item.classList.toggle('is-active', isMatch);
            });
        }
        window.addEventListener('hashchange', updateActiveTab);
        updateActiveTab();
    }

    // 4. Gestor Global de Tema (Dark / Light) con Sincronización LocalStorage
    function initTheme() {
        var STORAGE_KEY = 'cc-theme';
        function getPreferredTheme() {
            var saved = localStorage.getItem(STORAGE_KEY);
            if (saved === 'light' || saved === 'dark') return saved;
            return 'dark'; // Por defecto Garaje es una experiencia nocturna/tecnológica
        }

        function applyTheme(theme) {
            var isLight = theme === 'light';
            document.documentElement.classList.toggle('theme-light', isLight);
            document.documentElement.setAttribute('data-theme', theme);
            if (document.body) {
                document.body.classList.toggle('theme-light', isLight);
                document.body.setAttribute('data-theme', theme);
            }

            var toggleBtns = document.querySelectorAll('.garage-theme-toggle-btn');
            toggleBtns.forEach(function(btn) {
                var icon = btn.querySelector('.garage-theme-toggle__icon') || btn;
                icon.textContent = isLight ? '☾' : '☼';
                btn.setAttribute('aria-label', isLight ? 'Cambiar a tema oscuro' : 'Cambiar a tema claro');
                btn.title = isLight ? 'Cambiar a tema oscuro' : 'Cambiar a tema claro';
            });

            var metaTheme = document.querySelector('meta[name="theme-color"]');
            if (metaTheme) {
                metaTheme.content = isLight ? '#f7f8f5' : '#071521';
            }
        }

        function toggleTheme() {
            var isCurrentlyLight = document.documentElement.classList.contains('theme-light');
            var nextTheme = isCurrentlyLight ? 'dark' : 'light';
            localStorage.setItem(STORAGE_KEY, nextTheme);
            applyTheme(nextTheme);
        }

        applyTheme(getPreferredTheme());

        document.addEventListener('click', function(e) {
            var btn = e.target.closest('.garage-theme-toggle-btn');
            if (btn) {
                e.preventDefault();
                toggleTheme();
            }
        });

        window.addEventListener('storage', function(e) {
            if (e.key === STORAGE_KEY && (e.newValue === 'light' || e.newValue === 'dark')) {
                applyTheme(e.newValue);
            }
        });
    }

    // 5. Dinámica de Hero tipo Heliostat (Scroll Scrollytelling con Video)
    function initHeliostatHero() {
        var heroCard = document.getElementById('garageHeroCard');
        var heroVideo = document.querySelector('.garage-hero-video');
        var heroCar = document.querySelector('.garage-heliostat-car');
        if (!heroCard || !heroVideo) return;

        var ticking = false;
        function onScroll() {
            var scrollY = window.scrollY;
            var maxScroll = 600;
            var progress = Math.min(Math.max(scrollY / maxScroll, 0), 1);

            if (progress > 0.05) {
                // Efecto de apertura/despiece secuencial en scroll
                var scaleVal = 1 + (progress * 0.15);
                var carTranslateY = progress * -25;
                var videoOpacity = Math.max(0.4, 0.88 - (progress * 0.4));

                heroVideo.style.transform = 'scale(' + scaleVal + ')';
                heroVideo.style.opacity = videoOpacity;

                if (heroCar) {
                    heroCar.style.transform = 'translateY(' + carTranslateY + 'px) scale(' + (1 + progress * 0.08) + ')';
                    heroCar.style.filter = 'drop-shadow(0 ' + (15 + progress * 20) + 'px 40px rgba(252, 76, 2, ' + (0.3 + progress * 0.4) + '))';
                }
            } else {
                heroVideo.style.transform = 'none';
                heroVideo.style.opacity = '0.88';
                if (heroCar) {
                    heroCar.style.transform = 'none';
                    heroCar.style.filter = 'drop-shadow(0 15px 30px rgba(0,0,0,0.6))';
                }
            }
            ticking = false;
        }

        window.addEventListener('scroll', function() {
            if (!ticking) {
                window.requestAnimationFrame(onScroll);
                ticking = true;
            }
        }, { passive: true });
    }

    // 6. Inicialización de PWA (Service Worker e Instalación)
    function initPWA() {
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                var swPath = (window.location.origin ? window.location.origin : '') + '/sw.js';
                navigator.serviceWorker.register(swPath).catch(function() {
                    var childSw = document.querySelector('link[rel="manifest"]');
                    if (childSw) {
                        var themeSw = childSw.href.replace('manifest.json', 'sw.js');
                        navigator.serviceWorker.register(themeSw).catch(function() {});
                    }
                });
            });
        }

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
                    alert('Para instalar CocheCierto Garaje en tu pantalla de inicio:\n\n1. Pulsa el botón "Compartir" en tu navegador (icono cuadrado con flecha hacia arriba).\n2. Selecciona "Añadir a la pantalla de inicio".');
                }
            });
        });
    }

    function init() {
        initTheme();
        initMobileMenu();
        initGarageBreakdown();
        initMobileBottomNav();
        initHeliostatHero();
        initPWA();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
