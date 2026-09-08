<?php
defined('ABSPATH') || exit;

add_action('wp_head', static function (): void {
    $icon = get_stylesheet_directory_uri() . '/assets/brand/icon-192.png';
    echo '<link rel="icon" type="image/png" sizes="192x192" href="' . esc_url($icon) . '">';
    echo '<link rel="apple-touch-icon" href="' . esc_url($icon) . '">';
}, 5);

add_action('wp_enqueue_scripts', static function (): void {
    $css_file = get_stylesheet_directory() . '/style.css';
    $js_file  = get_stylesheet_directory() . '/assets/js/garage-breakdown.js';

    $css_ver = file_exists($css_file) ? (string) filemtime($css_file) : '0.5.0';
    $js_ver  = file_exists($js_file) ? (string) filemtime($js_file) : '0.5.0';

    wp_enqueue_style('cochecierto-garage-child', get_stylesheet_directory_uri() . '/style.css', [], $css_ver);
    wp_enqueue_script('garage-breakdown', get_stylesheet_directory_uri() . '/assets/js/garage-breakdown.js', [], $js_ver, true);
});

add_filter('body_class', static function (array $classes): array {
    $classes[] = 'garage-site';
    return $classes;
});

add_filter('template_include', static function (string $template): string {
    $path = trim((string) parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH), '/');
    if (str_starts_with($path, 'guias/')) {
        $guide_template = get_stylesheet_directory() . '/garage-guide.php';
        if (file_exists($guide_template)) return $guide_template;
    }
    if (str_starts_with($path, 'categorias/')) {
        $category_template = get_stylesheet_directory() . '/garage-category.php';
        if (file_exists($category_template)) return $category_template;
    }
    if ('productos' === $path) {
        $products_template = get_stylesheet_directory() . '/garage-products.php';
        if (file_exists($products_template)) return $products_template;
    }
    return $template;
});

add_action('template_redirect', static function (): void {
    $path = trim((string) parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH), '/');
    if ('sw.js' === $path) {
        $sw_file = get_stylesheet_directory() . '/sw.js';
        if (file_exists($sw_file)) {
            header('Content-Type: application/javascript; charset=utf-8');
            header('Service-Worker-Allowed: /');
            readfile($sw_file);
            exit;
        }
    }
    if ('manifest.json' === $path) {
        $manifest_file = get_stylesheet_directory() . '/manifest.json';
        if (file_exists($manifest_file)) {
            header('Content-Type: application/manifest+json; charset=utf-8');
            readfile($manifest_file);
            exit;
        }
    }
    if (str_starts_with($path, 'guias/') || str_starts_with($path, 'categorias/') || 'productos' === $path) {
        global $wp_query;
        $wp_query->is_404 = false;
        status_header(200);
    }
});

add_action('wp_footer', static function (): void {
    if (!is_front_page()) return;
    ?>
    <script>
    (() => {
      const bar = document.querySelector('.garage-progress span');
      if (!bar) return;
      let ticking = false;
      const update = () => {
        const max = document.documentElement.scrollHeight - window.innerHeight;
        bar.style.transform = `scaleX(${max > 0 ? window.scrollY / max : 0})`;
        ticking = false;
      };
      window.addEventListener('scroll', () => { if (!ticking) { window.requestAnimationFrame(update); ticking = true; } }, { passive: true });
      update();
    })();
    </script>
    <?php
});
