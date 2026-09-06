<?php defined('ABSPATH') || exit; ?><!doctype html><html <?php language_attributes(); ?>><head><meta charset="<?php bloginfo('charset'); ?>"><meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"><link rel="profile" href="https://gmpg.org/xfn/11"><?php wp_head(); ?></head><body <?php body_class(); ?>><?php wp_body_open(); ?>
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
                    <a href="<?php echo esc_url(home_url('/#garage-despiece')); ?>" class="garage-button garage-button--orange garage-mobile-cta">
                        Explorar coche <span>↓</span>
                    </a>
                </div>
            </nav>
        </div>
    </div>
</header>
