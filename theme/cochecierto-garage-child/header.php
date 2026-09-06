<?php defined('ABSPATH') || exit; ?><!doctype html><html <?php language_attributes(); ?>><head><meta charset="<?php bloginfo('charset'); ?>"><meta name="viewport" content="width=device-width, initial-scale=1"><link rel="profile" href="https://gmpg.org/xfn/11"><?php wp_head(); ?></head><body <?php body_class(); ?>><?php wp_body_open(); ?>
<header class="garage-header">
    <div class="garage-shell garage-header__inner">
        <a class="garage-logo" href="<?php echo esc_url(home_url('/')); ?>" aria-label="CocheCierto Garage">
            <svg viewBox="0 0 340 58" role="img" aria-label="CocheCierto Garage">
                <path d="M43 10a22 22 0 1 0 0 38" fill="none" stroke="#fff" stroke-width="8" stroke-linecap="round"/>
                <path d="M26 29l8 8 14-16" fill="none" stroke="#fc4c02" stroke-width="6" stroke-linecap="round" stroke-linejoin="round"/>
                <text x="70" y="39" fill="#fff" font-family="Manrope,Arial,sans-serif" font-size="30" font-weight="800" letter-spacing="-1.4">Coche</text>
                <text x="158" y="39" fill="#fc4c02" font-family="Manrope,Arial,sans-serif" font-size="30" font-weight="800" letter-spacing="-1.4">Cierto</text>
                <text x="246" y="27" fill="#8899a6" font-family="Inter,Arial,sans-serif" font-size="11" font-weight="700" letter-spacing="1.8">GARAGE</text>
            </svg>
        </a>
        <nav class="garage-nav" aria-label="Navegación principal">
            <a href="<?php echo esc_url(home_url('/#garage-despiece')); ?>">Despiece & Zonas</a>
            <a href="<?php echo esc_url(home_url('/#garage-momento')); ?>">Guías por momento</a>
            <a href="<?php echo esc_url(home_url('/productos/')); ?>">Catálogo</a>
            <a class="garage-nav__cta" href="<?php echo esc_url(home_url('/#garage-despiece')); ?>">Explorar coche <span>↓</span></a>
        </nav>
    </div>
</header>
