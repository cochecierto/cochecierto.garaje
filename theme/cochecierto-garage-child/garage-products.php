<?php
defined('ABSPATH') || exit;
get_header();
?>
<main class="garage-category"><section class="garage-category__hero"><div class="garage-shell"><p class="garage-kicker">Catálogo Garaje</p><h1>Productos con criterio.</h1><p>Estamos construyendo una selección revisada para cuidar, mantener y equipar tu coche. Cada ficha explicará para quién sirve y qué debes comprobar.</p></div></section><section class="garage-category__content garage-shell"><div><p class="garage-kicker">Próximamente</p><h2>Primero la necesidad. Después el producto.</h2><p class="garage-category__empty">El catálogo comercial se incorporará cuando cada producto tenga información editorial, compatibilidad, limitaciones y oferta de proveedor verificadas.</p></div><aside><p class="garage-kicker">¿No sabes por dónde empezar?</p><h2>Usa una guía.</h2><p>Encuentra las primeras comprobaciones según el tiempo que llevas con tu coche.</p><a class="garage-button garage-button--orange" href="<?php echo esc_url(home_url('/guias/primeras-72-horas/')); ?>">Ver primeras 72 horas <span>↗</span></a></aside></section></main>
<?php get_footer();
