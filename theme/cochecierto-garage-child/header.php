<?php defined('ABSPATH') || exit; ?><!doctype html><html <?php language_attributes(); ?>><head><meta charset="<?php bloginfo('charset'); ?>"><meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"><meta name="theme-color" content="#071521"><meta name="apple-mobile-web-app-capable" content="yes"><meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"><meta name="apple-mobile-web-app-title" content="Garaje"><link rel="manifest" href="<?php echo esc_url(get_stylesheet_directory_uri() . '/manifest.json'); ?>"><link rel="apple-touch-icon" href="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/brand/icon-192.png'); ?>"><link rel="profile" href="https://gmpg.org/xfn/11"><?php wp_head(); ?></head><body <?php body_class(); ?>><?php wp_body_open(); ?>
<header class="garage-header">
    <div class="garage-shell garage-header__inner">
        <!-- Brand Lockup oficial idéntico a cochecierto.com con Garaje en segunda línea -->
        <a class="brand-lockup" href="<?php echo esc_url(home_url('/')); ?>" aria-label="CocheCierto Garaje, inicio">
            <img class="brand-symbol" 
                 src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/brand/brand-symbol.svg'); ?>" 
                 alt="CocheCierto" 
                 width="36" 
                 height="36"
                 data-theme-uri="<?php echo esc_url(get_stylesheet_directory_uri()); ?>">
            <span class="brand-naming">
                <span class="brand-name">Coche<strong>Cierto</strong></span>
                <span class="brand-subname">Garaje</span>
            </span>
        </a>

        <!-- Navegación de escritorio: Despiece, Guía de Compra, Catálogo y CTA Explorar Coche -->
        <nav class="garage-nav" aria-label="Navegación principal">
            <a href="<?php echo esc_url(home_url('/#garage-despiece')); ?>">Despiece</a>
            <a href="<?php echo esc_url(home_url('/#garage-momento')); ?>">Guía de Compra</a>
            <a href="<?php echo esc_url(home_url('/productos/')); ?>">Catálogo</a>
            <a class="garage-nav__cta" href="<?php echo esc_url(home_url('/#garage-despiece')); ?>">Explorar Coche <span>↓</span></a>
        </nav>

        <div class="garage-header__actions">
            <!-- Botón de cambio de tema Claro / Oscuro -->
            <button type="button" class="garage-theme-toggle-btn" aria-label="Cambiar a tema claro" title="Cambiar tema">
                <span class="garage-theme-toggle__icon" aria-hidden="true">☼</span>
            </button>

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
    </div>

    <!-- Cajón de navegación móvil alineado con CocheCierto -->
    <div id="garage-mobile-drawer" class="garage-mobile-drawer" aria-hidden="true">
        <div class="garage-mobile-drawer__overlay"></div>
        <div class="garage-mobile-drawer__content">
            <div class="garage-mobile-drawer__head">
                <strong>Explora Garaje</strong>
                <button type="button" class="garage-mobile-drawer__close" aria-label="Cerrar menú">×</button>
            </div>
            <nav class="garage-mobile-nav" aria-label="Navegación móvil">
                <div class="garage-mobile-group">
                    <a href="<?php echo esc_url(home_url('/#garage-despiece')); ?>" class="garage-mobile-link">
                        <svg class="nav-icon" viewBox="0 0 24 24" aria-hidden="true"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
                        <span><strong>Despiece</strong><small>Explorador técnico por áreas</small></span>
                    </a>
                    <a href="<?php echo esc_url(home_url('/#garage-momento')); ?>" class="garage-mobile-link">
                        <svg class="nav-icon" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="8"/><path d="M12 8v5l3 2"/></svg>
                        <span><strong>Guía de Compra</strong><small>Criterios y etapas clave</small></span>
                    </a>
                    <a href="<?php echo esc_url(home_url('/productos/')); ?>" class="garage-mobile-link">
                        <svg class="nav-icon" viewBox="0 0 24 24" aria-hidden="true"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                        <span><strong>Catálogo</strong><small>Selección editorial verificada</small></span>
                    </a>
                </div>
                <div class="garage-mobile-nav__actions">
                    <button type="button" class="garage-button garage-button--outline garage-pwa-install-btn" style="display:none; width:100%; margin-bottom:12px;">
                        📲 Instalar Garaje en tu móvil
                    </button>
                    <a href="<?php echo esc_url(home_url('/#garage-despiece')); ?>" class="garage-button garage-button--orange garage-mobile-cta">
                        Explorar Coche <span>↓</span>
                    </a>
                </div>
            </nav>
        </div>
    </div>

    <!-- Barra de Navegación Modo App (Mobile Bottom Nav - Arquitectura CocheCierto) -->
    <nav class="mobile-bottom-nav" aria-label="Accesos rápidos">
        <a href="<?php echo esc_url(home_url('/')); ?>" data-app-tab="home">
            <svg class="nav-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M4 10.5 12 4l8 6.5v8a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1z"/><path d="M9 20v-6h6v6"/></svg>
            <span>Inicio</span>
        </a>
        <a href="<?php echo esc_url(home_url('/#garage-momento')); ?>" data-app-tab="guias">
            <svg class="nav-icon" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="8"/><path d="M12 8v5l3 2"/></svg>
            <span>Guías</span>
        </a>
        <a class="mobile-bottom-primary" href="<?php echo esc_url(home_url('/#garage-despiece')); ?>" data-app-tab="despiece">
            <svg class="nav-icon" viewBox="0 0 24 24" aria-hidden="true"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
            <span>Despiece</span>
        </a>
        <a href="<?php echo esc_url(home_url('/productos/')); ?>" data-app-tab="catalogo">
            <svg class="nav-icon" viewBox="0 0 24 24" aria-hidden="true"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
            <span>Catálogo</span>
        </a>
        <button type="button" class="mobile-bottom-menu" data-mobile-menu-open aria-controls="garage-mobile-drawer" aria-expanded="false">
            <svg class="nav-icon" viewBox="0 0 24 24" aria-hidden="true"><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
            <span>Menú</span>
        </button>
    </nav>
</header>
