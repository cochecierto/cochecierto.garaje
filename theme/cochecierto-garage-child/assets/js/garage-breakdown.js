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
        var stage = breakdown.querySelector('.garage-breakdown__stage');
        var zoneIndicator = breakdown.querySelector('.garage-stage-indicator__zone strong');
        var statValElem = document.getElementById('garage-active-stat');

        function setActiveZone(zoneId, scrollIntoView) {
            if (stage) {
                stage.setAttribute('data-active-zone', zoneId);
            }

            tabs.forEach(function(tab) {
                var isActive = tab.getAttribute('data-zone') === zoneId;
                tab.classList.toggle('is-active', isActive);
                tab.setAttribute('aria-selected', isActive ? 'true' : 'false');
                if (isActive) {
                    var labelElem = tab.querySelector('.garage-breakdown-tab__label');
                    if (zoneIndicator && labelElem) {
                        zoneIndicator.textContent = labelElem.textContent;
                    }
                    if (window.innerWidth <= 800) {
                        try { tab.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' }); } catch(e) {}
                    }
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
                if (isActive) {
                    if (statValElem) {
                        var statText = step.getAttribute('data-stat');
                        if (statText) statValElem.textContent = statText;
                    }
                    if (scrollIntoView && window.innerWidth > 800) {
                        try { step.scrollIntoView({ behavior: 'smooth', block: 'center' }); } catch(e) {}
                    }
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
                } else if (zoneId === 'frenos') {
                    carImg.style.filter = 'drop-shadow(0 15px 35px rgba(220, 53, 69, 0.45)) saturate(1.1)';
                } else if (zoneId === 'electricidad') {
                    carImg.style.filter = 'drop-shadow(0 15px 35px rgba(255, 193, 7, 0.45)) brightness(1.1)';
                } else if (zoneId === 'seguridad') {
                    carImg.style.filter = 'drop-shadow(0 15px 35px rgba(252, 76, 2, 0.4)) brightness(1.05)';
                } else {
                    carImg.style.filter = 'drop-shadow(0 15px 35px rgba(0, 0, 0, 0.3))';
                }
            }

            try {
                localStorage.setItem('cc_garage_last_zone', zoneId);
            } catch(e) {}
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
            return 'dark';
        }

        function updateLogo(isLight) {
            var symbols = document.querySelectorAll('.brand-lockup .brand-symbol');
            symbols.forEach(function(img) {
                var baseUri = img.getAttribute('data-theme-uri') || '';
                var targetLogo = baseUri + '/assets/brand/' + (isLight ? 'brand-symbol-light.svg' : 'brand-symbol.svg');
                if (img.getAttribute('src') !== targetLogo) {
                    img.src = targetLogo;
                }
            });
        }

        function applyTheme(theme) {
            var isLight = theme === 'light';
            document.documentElement.classList.toggle('theme-light', isLight);
            document.documentElement.setAttribute('data-theme', theme);
            if (document.body) {
                document.body.classList.toggle('theme-light', isLight);
                document.body.setAttribute('data-theme', theme);
            }

            updateLogo(isLight);

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

    // 5. Dinámica de Hero Scrollytelling (Video a Fondo Completo sincronizado con Scroll)
    function initHeliostatHero() {
        var heroSection = document.getElementById('garageHeroSection');
        var video = document.getElementById('garageHeroVideo');
        var titleGroup = document.getElementById('garageHeroTitleGroup');
        var actionsGroup = document.getElementById('garageHeroActions');
        if (!heroSection || !video) return;

        // Asegurar que el video comience pausado en el fotograma 0
        video.pause();
        try { video.currentTime = 0; } catch (e) {}

        video.addEventListener('loadedmetadata', function() {
            video.pause();
            try { video.currentTime = 0; } catch (e) {}
            onScroll();
        });

        var ticking = false;
        function onScroll() {
            var scrollY = window.pageYOffset || document.documentElement.scrollTop || 0;
            var scrollDistance = heroSection.offsetHeight - window.innerHeight;
            if (scrollDistance <= 0) {
                ticking = false;
                return;
            }

            // El progreso solo comienza cuando el usuario hace scroll real (> 4px)
            var progress = 0;
            if (scrollY > 4) {
                progress = Math.min(Math.max((scrollY - 4) / (scrollDistance - 4), 0), 1);
            }

            // 1. El video fluye proporcionalmente desde la acción de scroll
            if (video.duration && !isNaN(video.duration) && video.duration > 0) {
                var targetTime = progress * video.duration;
                if (Math.abs(video.currentTime - targetTime) > 0.03) {
                    video.currentTime = targetTime;
                }
            }

            // 2. Al hacer scroll, el H1 desaparece inmediatamente (fade-out); en reposo se muestra al 100%
            if (titleGroup) {
                if (progress === 0) {
                    titleGroup.style.opacity = '1';
                    titleGroup.style.transform = 'translateY(0)';
                    titleGroup.style.visibility = 'visible';
                    titleGroup.style.pointerEvents = 'auto';
                } else {
                    var titleOpacity = Math.max(0, 1 - (progress * 4.2));
                    var titleOffset = -progress * 50;
                    titleGroup.style.opacity = titleOpacity.toFixed(3);
                    titleGroup.style.transform = 'translateY(' + titleOffset.toFixed(1) + 'px)';

                    if (titleOpacity <= 0.02) {
                        titleGroup.style.pointerEvents = 'none';
                        titleGroup.style.visibility = 'hidden';
                    } else {
                        titleGroup.style.pointerEvents = 'auto';
                        titleGroup.style.visibility = 'visible';
                    }
                }
            }

            // 3. SOLO se mantienen los CTA fijos en la parte inferior
            if (actionsGroup) {
                actionsGroup.style.opacity = '1';
                actionsGroup.style.visibility = 'visible';
                actionsGroup.style.pointerEvents = 'auto';
            }

            ticking = false;
        }

        window.addEventListener('scroll', function() {
            if (!ticking) {
                window.requestAnimationFrame(onScroll);
                ticking = true;
            }
        }, { passive: true });

        // Ejecutar primer pase inicial
        onScroll();
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

    // 7. Persistencia Ligera de Intenciones y Preferencias ("Garaje Pocket")
    function initIntentPersistence() {
        var intentCards = document.querySelectorAll('.garage-intent-card');
        if (!intentCards.length) return;

        intentCards.forEach(function(card) {
            card.addEventListener('click', function() {
                var titleElem = card.querySelector('.garage-intent-card__title');
                var intentText = titleElem ? titleElem.textContent.trim() : '';
                try {
                    localStorage.setItem('cc_garage_intent', intentText);
                    localStorage.setItem('cc_garage_intent_time', Date.now().toString());
                } catch(e) {}
            });
        });

        // Recordar última intención seleccionada
        try {
            var savedIntent = localStorage.getItem('cc_garage_intent');
            if (savedIntent) {
                intentCards.forEach(function(card) {
                    var title = card.querySelector('.garage-intent-card__title');
                    if (title && title.textContent.trim() === savedIntent) {
                        card.style.borderColor = 'rgba(252, 76, 2, 0.45)';
                    }
                });
            }
        } catch(e) {}
    }

    // 8. Analítica y Medición de Conversión (Sección 12 - Mobile-First)
    function initAnalyticsTracking() {
        window.dataLayer = window.dataLayer || [];

        function track(eventName, params) {
            params = params || {};
            params.event = eventName;
            window.dataLayer.push(params);
            try {
                document.dispatchEvent(new CustomEvent(eventName, { detail: params }));
            } catch(e) {}
        }

        // Clicks en Hero CTA
        var heroCtas = document.querySelectorAll('.garage-hero__actions a');
        heroCtas.forEach(function(cta) {
            cta.addEventListener('click', function() {
                track('garage_hero_cta_click', { text: cta.textContent.trim() });
            });
        });

        // Selección de intención
        var intentCards = document.querySelectorAll('.garage-intent-card');
        intentCards.forEach(function(card) {
            card.addEventListener('click', function() {
                var title = card.querySelector('.garage-intent-card__title');
                track('garage_intent_selected', { intent: title ? title.textContent.trim() : '' });
            });
        });

        // Apertura de zona de despiece
        var tabs = document.querySelectorAll('.garage-breakdown-tab');
        tabs.forEach(function(tab) {
            tab.addEventListener('click', function() {
                track('garage_zone_opened', { zone: tab.getAttribute('data-zone') });
            });
        });

        // Clic en enlace de afiliación externo
        document.addEventListener('click', function(e) {
            var affLink = e.target.closest('a[rel*="sponsored"]');
            if (affLink) {
                track('garage_affiliate_click', { url: affLink.href });
            }
        });

        // Interacción con Clara
        var claraLinks = document.querySelectorAll('a[href*="assistant"], .garage-assistant-card a');
        claraLinks.forEach(function(l) {
            l.addEventListener('click', function() {
                track('garage_clara_opened');
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
        initIntentPersistence();
        initAnalyticsTracking();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
