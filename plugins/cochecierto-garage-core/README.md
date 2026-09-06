# CocheCierto Garage Core

Plugin propio inicial para alojar la lógica de catálogo de Garage, separada del tema y del plugin de afiliación de Hostinger.

## Estado

Prototipo local `0.1.0`. No desplegado.

## Incluye

- Tipo de contenido público `garage_product`.
- Taxonomía jerárquica `garage_category`.
- Taxonomía no jerárquica `garage_need`.
- REST API pública de WordPress para contenido publicado.
- URLs editoriales bajo `/productos/`, `/categorias/` y `/necesidades/`.
- Metadatos editoriales sanitizados y visibles en REST para productos.
- Caja de edición en WordPress protegida por nonce y permisos.
- Activación y desactivación con actualización de enlaces permanentes.
- Creación idempotente de las ocho categorías iniciales al activar.

## Metadatos iniciales

`garage_benefit`, `garage_recommended_for`, `garage_limitations`, `garage_compatibility_checks`, `garage_provider`, `garage_external_id`, `garage_last_reviewed_at`, `garage_affiliate_url`, `garage_price`, `garage_currency` y `garage_offer_status`.

Los metadatos requieren permisos de edición y no ofrecen una ruta anónima de escritura. El campo `garage_external_id` no concede por sí mismo ningún privilegio ni activa una oferta.

## No incluye todavía

- Campos avanzados de producto.
- Ofertas de proveedores.
- Enlaces afiliados.
- Sincronización con Amazon.
- Datos estructurados.
- Plantillas visuales definitivas.
