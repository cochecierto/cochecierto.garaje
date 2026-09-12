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
            drawer.removeAttribute('inert');
            drawer.setAttribute('aria-hidden', 'false');
            drawer.classList.add('is-open');
            document.body.classList.add('garage-menu-locked');
            if (closeBtn) {
                setTimeout(function() { closeBtn.focus(); }, 100);
            }
        }

        function closeMenu() {
            openBtns.forEach(function(b) { b.setAttribute('aria-expanded', 'false'); });
            if (toggleBtn) {
                toggleBtn.setAttribute('aria-expanded', 'false');
                toggleBtn.classList.remove('is-active');
            }
            drawer.setAttribute('aria-hidden', 'true');
            drawer.setAttribute('inert', '');
            drawer.classList.remove('is-open');
            document.body.classList.remove('garage-menu-locked');
        }

        // Estado inicial accesible del drawer cerrado
        drawer.setAttribute('aria-hidden', 'true');
        drawer.setAttribute('inert', '');

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
                if (toggleBtn) toggleBtn.focus();
            }
        });
    }

    // 2. Inicialización del Despiece y Visor Dinámico (Scrollytelling Fijo & Carrusel Vertical)
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
        var stepCurrIndexElem = document.getElementById('garage-step-active-index');
        var prevBtn = breakdown.querySelector('.garage-step-nav-btn--prev');
        var nextBtn = breakdown.querySelector('.garage-step-nav-btn--next');

        var zoneIds = ['carroceria', 'interior', 'motor', 'neumaticos', 'frenos', 'electricidad', 'seguridad'];
        var currentZoneId = 'carroceria';
        var isManualNavigating = false;

        function setActiveZone(zoneId, shouldScroll) {
            currentZoneId = zoneId;
            var activeIndex = zoneIds.indexOf(zoneId);
            if (activeIndex === -1) activeIndex = 0;

            if (stage) {
                stage.setAttribute('data-active-zone', zoneId);
            }

            tabs.forEach(function(tab) {
                var isActive = tab.getAttribute('data-zone') === zoneId;
                tab.classList.toggle('is-active', isActive);
                tab.setAttribute('aria-selected', isActive ? 'true' : 'false');
                tab.setAttribute('tabindex', isActive ? '0' : '-1');
                if (isActive) {
                    var labelElem = tab.querySelector('.garage-breakdown-tab__label');
                    if (zoneIndicator && labelElem) {
                        zoneIndicator.textContent = labelElem.textContent;
                    }
                    if (window.innerWidth <= 900) {
                        try { tab.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' }); } catch(e) {}
                    }
                }
            });

            hotspots.forEach(function(hotspot) {
                var isActive = hotspot.getAttribute('data-zone') === zoneId;
                hotspot.classList.toggle('is-active', isActive);
                hotspot.setAttribute('aria-pressed', isActive ? 'true' : 'false');
            });

            steps.forEach(function(step, idx) {
                step.classList.remove('is-active', 'is-prev', 'is-next');
                step.setAttribute('aria-hidden', idx === activeIndex ? 'false' : 'true');
                if (idx === activeIndex) {
                    step.classList.add('is-active');
                    if (statValElem) {
                        var statText = step.getAttribute('data-stat');
                        if (statText) statValElem.textContent = statText;
                    }
                    var hintElem = document.getElementById('garage-hud-zone-hint');
                    if (hintElem) {
                        var hints = {
                            'carroceria': 'Comprobando espesor de barniz y protección contra radiación UV y lluvia ácida.',
                            'interior': 'Inspeccionando materiales plásticos, cueros y ergonomía del habitáculo.',
                            'motor': 'Monitoreando nivel y viscosidad del lubricante, refrigerante y circuito.',
                            'neumaticos': 'Verificando profundidad de rodadura, hombros de desgaste y presión en frío.',
                            'frenos': 'Analizando espesor remanente de ferodo en pastillas y punto de ebullición DOT.',
                            'electricidad': 'Comprobando tensión en circuito abierto (SOH), bornes y capacidad de arranque.',
                            'seguridad': 'Verificando homologación oficial DGT 3.0, geolocalización y señalización.'
                        };
                        if (hints[zoneId]) hintElem.textContent = hints[zoneId];
                    }
                } else if (idx < activeIndex) {
                    step.classList.add('is-prev');
                } else {
                    step.classList.add('is-next');
                }
            });

            if (stepCurrIndexElem) {
                stepCurrIndexElem.textContent = '0' + (activeIndex + 1);
            }

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

            if (shouldScroll && window.innerWidth > 900) {
                var totalScrollable = breakdown.offsetHeight - window.innerHeight;
                if (totalScrollable > 0) {
                    isManualNavigating = true;
                    var targetScroll = breakdown.offsetTop + (activeIndex / (zoneIds.length - 1)) * totalScrollable;
                    window.scrollTo({ top: targetScroll, behavior: 'smooth' });
                    setTimeout(function() { isManualNavigating = false; }, 600);
                }
            }

            try {
                localStorage.setItem('cc_garage_last_zone', zoneId);
            } catch(e) {}

            if (window.location.hash !== '#garage-despiece-' + zoneId) {
                history.replaceState(null, '', '#garage-despiece-' + zoneId);
            }
        }

        function onBreakdownScroll() {
            if (window.innerWidth <= 900 || isManualNavigating) return;
            var rect = breakdown.getBoundingClientRect();
            var totalScrollable = breakdown.offsetHeight - window.innerHeight;
            if (totalScrollable <= 0) return;

            var scrolled = -rect.top;
            if (scrolled >= 0 && scrolled <= totalScrollable) {
                var progress = Math.min(Math.max(scrolled / totalScrollable, 0), 1);
                var targetIdx = Math.min(Math.floor(progress * zoneIds.length), zoneIds.length - 1);
                if (zoneIds[targetIdx] !== currentZoneId) {
                    setActiveZone(zoneIds[targetIdx], false);
                }
            }
        }

        window.addEventListener('scroll', onBreakdownScroll, { passive: true });

        tabs.forEach(function(tab) {
            tab.addEventListener('click', function(e) {
                e.preventDefault();
                var zone = tab.getAttribute('data-zone');
                setActiveZone(zone, true);
            });
            tab.addEventListener('keydown', function(e) {
                var idx = zoneIds.indexOf(tab.getAttribute('data-zone'));
                var target = null;
                if (e.key === 'ArrowRight' || e.key === 'ArrowDown') target = (idx + 1) % zoneIds.length;
                if (e.key === 'ArrowLeft' || e.key === 'ArrowUp') target = (idx - 1 + zoneIds.length) % zoneIds.length;
                if (e.key === 'Home') target = 0;
                if (e.key === 'End') target = zoneIds.length - 1;
                if (target !== null) { e.preventDefault(); setActiveZone(zoneIds[target], true); tabs[target].focus(); }
                if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); setActiveZone(tab.getAttribute('data-zone'), true); }
            });
        });

        breakdown.querySelectorAll('.garage-breakdown-checklist button').forEach(function(button) {
            button.addEventListener('click', function() {
                var target = breakdown.querySelector('.garage-breakdown-tab[data-zone="' + button.getAttribute('data-zone') + '"]');
                if (target) { setActiveZone(button.getAttribute('data-zone'), true); target.focus(); }
            });
        });

        var initialHash = window.location.hash.replace('#garage-despiece-', '');
        if (zoneIds.indexOf(initialHash) !== -1) setActiveZone(initialHash, false);

        hotspots.forEach(function(hotspot) {
            hotspot.addEventListener('click', function(e) {
                e.preventDefault();
                var zone = hotspot.getAttribute('data-zone');
                setActiveZone(zone, true);
            });
        });

        if (prevBtn) {
            prevBtn.addEventListener('click', function(e) {
                e.preventDefault();
                var curIdx = zoneIds.indexOf(currentZoneId);
                if (curIdx > 0) {
                    setActiveZone(zoneIds[curIdx - 1], true);
                }
            });
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', function(e) {
                e.preventDefault();
                var curIdx = zoneIds.indexOf(currentZoneId);
                if (curIdx < zoneIds.length - 1) {
                    setActiveZone(zoneIds[curIdx + 1], true);
                }
            });
        }

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

    // 5. Dinámica de Hero Scrollytelling (Video a Fondo Completo sincronizado con Scroll e Interpolación LERP Suave)
    function initHeliostatHero() {
        var heroSection = document.getElementById('garageHeroSection');
        var video = document.getElementById('garageHeroVideo');
        var titleGroup = document.getElementById('garageHeroTitleGroup');
        var actionsGroup = document.getElementById('garageHeroActions');
        if (!heroSection || !video) return;

        // Asegurar que el video comience pausado en el fotograma 0 y se pinte de inmediato
        video.pause();
        function paintInitialFrame() {
            video.pause();
            try { 
                if (video.currentTime === 0) video.currentTime = 0.001; 
            } catch (e) {}
            calcScrollTarget();
        }

        video.addEventListener('loadedmetadata', paintInitialFrame);
        video.addEventListener('loadeddata', paintInitialFrame);
        video.addEventListener('canplay', paintInitialFrame);
        paintInitialFrame();

        var targetProgress = 0;
        var currentProgress = 0;
        var targetTime = 0;
        var currentTime = 0;
        var isLoopRunning = false;

        function calcScrollTarget() {
            var scrollY = window.pageYOffset || document.documentElement.scrollTop || 0;
            var scrollDistance = heroSection.offsetHeight - window.innerHeight;
            if (scrollDistance <= 0) return;

            if (scrollY <= 4) {
                targetProgress = 0;
            } else {
                targetProgress = Math.min(Math.max((scrollY - 4) / (scrollDistance - 4), 0), 1);
            }

            if (video.duration && !isNaN(video.duration) && video.duration > 0) {
                targetTime = targetProgress >= 0.999 ? Math.max(0, video.duration - 0.04) : targetProgress * video.duration;
            }

            if (!isLoopRunning) {
                isLoopRunning = true;
                window.requestAnimationFrame(renderLoop);
            }
        }

        function renderLoop() {
            // Factor de suavizado LERP (0.12 = respuesta ágil pero con amortiguación sedosa)
            var lerpFactor = 0.12;
            var diff = targetTime - currentTime;

            if (Math.abs(diff) > 0.001) {
                currentTime += diff * lerpFactor;
            } else {
                currentTime = targetTime;
            }

            // Aplicar tiempo al video respetando si el hardware aún está decodificando (seeking)
            if (video.duration && !isNaN(video.duration) && video.duration > 0) {
                if (!video.seeking && Math.abs(video.currentTime - currentTime) > 0.015) {
                    try {
                        if (typeof video.fastSeek === 'function') {
                            video.fastSeek(currentTime);
                        } else {
                            video.currentTime = currentTime;
                        }
                    } catch (err) {}
                }
            }

            // Suavizado del fade-out del título H1
            var progressDiff = targetProgress - currentProgress;
            if (Math.abs(progressDiff) > 0.001) {
                currentProgress += progressDiff * lerpFactor;
            } else {
                currentProgress = targetProgress;
            }

            if (titleGroup) {
                if (currentProgress <= 0.002) {
                    titleGroup.style.opacity = '1';
                    titleGroup.style.transform = 'translateY(0)';
                    titleGroup.style.visibility = 'visible';
                    titleGroup.style.pointerEvents = 'auto';
                } else {
                    var titleOpacity = Math.max(0, 1 - (currentProgress * 4.2));
                    var titleOffset = -currentProgress * 50;
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

            if (actionsGroup) {
                actionsGroup.style.opacity = '1';
                actionsGroup.style.visibility = 'visible';
                actionsGroup.style.pointerEvents = 'auto';
            }

            // Continuar el bucle mientras haya diferencia o mientras el video esté en seeking
            if (Math.abs(targetTime - currentTime) > 0.002 || Math.abs(targetProgress - currentProgress) > 0.002 || video.seeking) {
                window.requestAnimationFrame(renderLoop);
            } else {
                isLoopRunning = false;
            }
        }

        window.addEventListener('scroll', calcScrollTarget, { passive: true });
        window.addEventListener('resize', calcScrollTarget, { passive: true });

        // Ejecutar pase inicial
        calcScrollTarget();
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
