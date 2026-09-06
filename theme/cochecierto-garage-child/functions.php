<?php
defined('ABSPATH') || exit;

add_action('wp_enqueue_scripts', static function (): void {
    wp_enqueue_style('cochecierto-garage-child', get_stylesheet_directory_uri() . '/style.css', [], '0.2.0');
});

add_filter('body_class', static function (array $classes): array {
    $classes[] = 'garage-site';
    return $classes;
});
