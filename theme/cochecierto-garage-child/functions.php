<?php
defined('ABSPATH') || exit;

add_action('wp_enqueue_scripts', static function (): void {
    wp_enqueue_style('cochecierto-garage-child', get_stylesheet_directory_uri() . '/style.css', [], '0.1.0');
});

