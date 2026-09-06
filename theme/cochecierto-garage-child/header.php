<?php defined('ABSPATH') || exit; ?><!doctype html><html <?php language_attributes(); ?>><head><meta charset="<?php bloginfo('charset'); ?>"><meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"><meta name="theme-color" content="#071521"><meta name="apple-mobile-web-app-capable" content="yes"><meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"><meta name="apple-mobile-web-app-title" content="Garaje"><link rel="manifest" href="<?php echo esc_url(get_stylesheet_directory_uri() . '/manifest.json'); ?>"><link rel="apple-touch-icon" href="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/brand/icon-192.png'); ?>"><link rel="profile" href="https://gmpg.org/xfn/11"><?php wp_head(); ?></head><body <?php body_class(); ?>><?php wp_body_open(); ?>
<header class="garage-header">
    <div class="garage-shell garage-header__inner">
        <a class="garage-logo" href="<?php echo esc_url(home_url('/')); ?>" aria-label="CocheCierto Garaje">
            <svg viewBox="0 0 340 58" role="img" aria-label="CocheCierto Garaje">
                <path d="M43 10a22 22 0 1 0 0 38" fill="none" stroke="#fff" stroke-width="8" stroke-linecap="round"/>
                <path d="M26 29l8 8 14-16" fill="none" stroke="#fc4c02" stroke-width="6" stroke-linecap="round" stroke-linejoin="round"/>
                <text x="70" y="39" fill="#fff" font-family="Manrope,Arial,sans-serif" font-size="30" font-weight="800" letter-spacing="-1.4">Coche</text>
                <text x="158" y="39" fill="#fc4c02" font-family="Manrope,Arial,sans-serif" font-size="30" font-weight="800" letter-spacing="-1.4">Cierto</text>
                <text x="246" y="27" fill="#8899a6" font-family="Inter,Arial,sans-serif" font-size="11" font-weight="700" letter-spacing="1.8">GARAJE</text>
            </svg>
        </a>

        <!-- Navegación de escritorio -->
        <nav class="garage-nav" aria-label="Navegación principal">
            <a href="<?php echo esc_url(home_url('/#garage-despiece')); ?>">Despiece & Zonas</a>
            <a href="<?php echo esc_url(home_url('/#garage-momento')); ?>">Guías por momento</a>
            <a href="<?php echo esc_url(home_url('/productos/')); ?>">Catálogo</a>
            <a class="garage-nav__cta" href="<?php echo esc_url(home_url('/#garage-despiece')); ?>">Explorar coche <span>↓</span></a>
        </nav>

        <!-- Botón hamburguesa accesible para móvil (Spec 010) -->
        <button type="button" 
                class="garage-menu-toggle" 
                aria-expanded="false" 
                aria-controls="garage-mobile-drawer" 
                aria-label="Abrir menú de navegación">
            <span class="garage-menu-toggle__box" aria-hidden="true">
                <span class="garage-menu-toggle__line"></span>
                <span class="garage-menu-toggle__line"></span>
                <span class="garage-menu-toggle__line"></span>
            </span>
        </button>
    </div>

    <!-- Cajón de navegación móvil (Spec 010) -->
    <div id="garage-mobile-drawer" class="garage-mobile-drawer" aria-hidden="true">
        <div class="garage-mobile-drawer__overlay"></div>
        <div class="garage-mobile-drawer__content">
            <nav class="garage-mobile-nav" aria-label="Navegación móvil">
                <a href="<?php echo esc_url(home_url('/#garage-despiece')); ?>" class="garage-mobile-link">
                    <span>01</span> Despiece & Zonas del coche
                </a>
                <a href="<?php echo esc_url(home_url('/#garage-momento')); ?>" class="garage-mobile-link">
                    <span>02</span> Guías por momento de posesión
                </a>
                <a href="<?php echo esc_url(home_url('/productos/')); ?>" class="garage-mobile-link">
                    <span>03</span> Catálogo Garaje
                </a>
                <div class="garage-mobile-nav__actions">
                    <button type="button" class="garage-button garage-button--outline garage-pwa-install-btn" style="display:none; width:100%; margin-bottom:12px;">
                        📲 Instalar Garaje en el móvil
                    </button>
                    <a href="<?php echo esc_url(home_url('/#garage-despiece')); ?>" class="garage-button garage-button--orange garage-mobile-cta">
                        Explorar coche <span>↓</span>
                    </a>
                </div>
            </nav>
        </div>
    </div>

    <!-- Barra de Navegación Modo App (Bottom Bar - Spec 011) -->
    <nav class="garage-app-bar" aria-label="Navegación rápida de la aplicación">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="garage-app-bar__item is-active" data-app-tab="home" aria-label="Inicio">
            <svg class="garage-app-bar__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                <polyline points="9 22 9 12 15 12 15 22"></polyline>
            </svg>
            <span class="garage-app-bar__label">Inicio</span>
        </a>
        <a href="<?php echo esc_url(home_url('/#garage-despiece')); ?>" class="garage-app-bar__item" data-app-tab="despiece" aria-label="Despiece del coche">
            <svg class="garage-app-bar__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
            </svg>
            <span class="garage-app-bar__label">Despiece</span>
            <span class="garage-app-bar__badge">5</span>
        </a>
        <a href="<?php echo esc_url(home_url('/#garage-momento')); ?>" class="garage-app-bar__item" data-app-tab="guias" aria-label="Guías por momento">
            <svg class="garage-app-bar__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
            </svg>
            <span class="garage-app-bar__label">Guías</span>
        </a>
        <a href="<?php echo esc_url(home_url('/productos/')); ?>" class="garage-app-bar__item" data-app-tab="productos" aria-label="Catálogo">
            <svg class="garage-app-bar__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="9" cy="21" r="1"></circle>
                <circle cx="20" cy="21" r="1"></circle>
                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
            </svg>
            <span class="garage-app-bar__label">Catálogo</span>
        </a>
        <button type="button" class="garage-app-bar__item garage-app-bar__item--menu garage-app-menu-btn" aria-label="Menú y Ajustes">
            <svg class="garage-app-bar__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
            <span class="garage-app-bar__label">Más</span>
        </button>
    </nav>
</header>
