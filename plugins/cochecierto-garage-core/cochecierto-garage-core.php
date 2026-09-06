<?php
/**
 * Plugin Name: CocheCierto Garage Core
 * Description: Modelo base de catálogo editorial para CocheCierto Garage.
 * Version: 0.1.0
 * Author: CocheCierto
 * Requires at least: 6.4
 * Requires PHP: 8.0
 */

defined('ABSPATH') || exit;

final class CocheCierto_Garage_Core {
    public static function boot(): void {
        add_action('init', [self::class, 'register_catalogue']);
        add_action('init', [self::class, 'seed_categories'], 20);
        add_action('init', [self::class, 'register_product_meta']);
        add_action('add_meta_boxes', [self::class, 'add_product_meta_box']);
        add_action('save_post_garage_product', [self::class, 'save_product_meta']);
    }

    public static function activate(): void {
        self::register_catalogue();
        self::seed_categories();
        flush_rewrite_rules();
    }

    public static function deactivate(): void {
        flush_rewrite_rules();
    }

    private static function seed_categories(): void {
        $categories = [
            'Seguridad y emergencia' => 'seguridad-emergencia',
            'Mantenimiento' => 'mantenimiento',
            'Limpieza y cuidado' => 'limpieza-cuidado',
            'Tecnología para el coche' => 'tecnologia-coche',
            'Viajes y organización' => 'viajes-organizacion',
            'Confort' => 'confort',
            'Neumáticos' => 'neumaticos',
            'Accesorios' => 'accesorios',
            'Equipamiento' => 'equipamiento',
        ];

        foreach ($categories as $name => $slug) {
            if (!term_exists($slug, 'garage_category')) {
                wp_insert_term($name, 'garage_category', ['slug' => $slug]);
            }
        }
    }

    public static function register_catalogue(): void {
        register_post_type('garage_product', [
            'labels' => [
                'name' => 'Productos Garage',
                'singular_name' => 'Producto Garage',
                'add_new_item' => 'Añadir producto Garage',
                'edit_item' => 'Editar producto Garage',
            ],
            'public' => true,
            'show_in_rest' => true,
            'has_archive' => true,
            'rewrite' => ['slug' => 'productos'],
            'menu_icon' => 'dashicons-car',
            'supports' => ['title', 'editor', 'excerpt', 'thumbnail', 'revisions'],
        ]);

        register_taxonomy('garage_category', ['garage_product'], [
            'labels' => [
                'name' => 'Categorías Garage',
                'singular_name' => 'Categoría Garage',
            ],
            'public' => true,
            'show_in_rest' => true,
            'hierarchical' => true,
            'rewrite' => ['slug' => 'categorias'],
        ]);

        register_taxonomy('garage_need', ['garage_product'], [
            'labels' => [
                'name' => 'Necesidades',
                'singular_name' => 'Necesidad',
            ],
            'public' => true,
            'show_in_rest' => true,
            'hierarchical' => false,
            'rewrite' => ['slug' => 'necesidades'],
        ]);
    }

    public static function register_product_meta(): void {
        $fields = [
            'garage_benefit' => 'string',
            'garage_recommended_for' => 'string',
            'garage_limitations' => 'string',
            'garage_compatibility_checks' => 'string',
            'garage_provider' => 'string',
            'garage_external_id' => 'string',
            'garage_last_reviewed_at' => 'string',
            'garage_affiliate_url' => 'string',
            'garage_price' => 'string',
            'garage_currency' => 'string',
            'garage_offer_status' => 'string',
        ];

        foreach ($fields as $key => $type) {
            register_post_meta('garage_product', $key, [
                'type' => $type,
                'single' => true,
                'show_in_rest' => true,
                'sanitize_callback' => 'sanitize_textarea_field',
                'auth_callback' => static function (): bool {
                    return current_user_can('edit_posts');
                },
            ]);
        }
    }

    public static function add_product_meta_box(): void {
        add_meta_box(
            'garage_product_details',
            'Datos editoriales Garage',
            [self::class, 'render_product_meta_box'],
            'garage_product',
            'normal',
            'default'
        );
    }

    public static function render_product_meta_box(WP_Post $post): void {
        wp_nonce_field('garage_product_details', 'garage_product_details_nonce');
        $fields = [
            'garage_benefit' => 'Beneficio principal',
            'garage_recommended_for' => 'Recomendado para',
            'garage_limitations' => 'Limitaciones',
            'garage_compatibility_checks' => 'Comprobaciones de compatibilidad',
            'garage_provider' => 'Proveedor',
            'garage_external_id' => 'Identificador externo',
            'garage_last_reviewed_at' => 'Fecha de revisión',
            'garage_affiliate_url' => 'URL afiliada',
            'garage_price' => 'Precio verificado',
            'garage_currency' => 'Moneda',
            'garage_offer_status' => 'Estado de la oferta: active, unavailable o retired',
        ];

        foreach ($fields as $key => $label) {
            $value = get_post_meta($post->ID, $key, true);
            printf(
                '<p><label for="%1$s"><strong>%2$s</strong></label><br><textarea class="large-text" rows="2" id="%1$s" name="%1$s">%3$s</textarea></p>',
                esc_attr($key),
                esc_html($label),
                esc_textarea((string) $value)
            );
        }
    }

    public static function save_product_meta(int $post_id): void {
        if (!isset($_POST['garage_product_details_nonce'])
            || !wp_verify_nonce(
                sanitize_text_field(wp_unslash($_POST['garage_product_details_nonce'])),
                'garage_product_details'
            )) {
            return;
        }

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        $keys = [
            'garage_benefit',
            'garage_recommended_for',
            'garage_limitations',
            'garage_compatibility_checks',
            'garage_provider',
            'garage_external_id',
            'garage_last_reviewed_at',
            'garage_affiliate_url',
            'garage_price',
            'garage_currency',
            'garage_offer_status',
        ];

        foreach ($keys as $key) {
            if (isset($_POST[$key])) {
                $raw_value = wp_unslash($_POST[$key]);
                $value = 'garage_affiliate_url' === $key
                    ? esc_url_raw($raw_value)
                    : sanitize_textarea_field($raw_value);
                update_post_meta($post_id, $key, $value);
            }
        }
    }
}

CocheCierto_Garage_Core::boot();
register_activation_hook(__FILE__, [CocheCierto_Garage_Core::class, 'activate']);
register_deactivation_hook(__FILE__, [CocheCierto_Garage_Core::class, 'deactivate']);
