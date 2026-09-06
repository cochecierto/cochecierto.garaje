# 005-product-page — Ficha editorial de producto

## Objetivo

Definir una ficha que ayude a decidir con criterio y derive al proveedor únicamente cuando la información y la oferta estén suficientemente verificadas.

## Requisitos

- RF-001 — La ficha debe mostrar nombre, imagen, problema que resuelve y categoría.
- RF-002 — Debe mostrar para quién es adecuada, beneficios, limitaciones y comprobaciones de compatibilidad.
- RF-003 — Debe distinguir opinión editorial, datos del proveedor y experiencia del usuario.
- RF-004 — El CTA externo debe identificar al proveedor y mostrar el aviso de afiliación.
- RF-005 — Si no hay oferta activa, la ficha debe mantenerse útil sin mostrar un botón roto.
- RF-006 — Si el precio está disponible, debe incluir fecha de comprobación y moneda.
- RF-007 — La ficha debe mostrar productos relacionados sin crear páginas duplicadas o vacías.
- RF-008 — Debe funcionar con teclado, lector de pantalla y pantallas móviles.

## Estados

- `published` con oferta activa: ficha y CTA visibles.
- `published` sin oferta: ficha visible, CTA sustituido por aviso de disponibilidad.
- `review`: no indexar ni mostrar en navegación pública.
- `retired`: redirigir o mostrar retirada según exista alternativa relevante.

## Fuera de alcance

- Reseñas automáticas.
- Comparador completo.
- Personalización avanzada del recomendador.
- Checkout propio.

## Criterios de aceptación

- Un usuario entiende la utilidad del producto sin salir de la ficha.
- La compatibilidad no se presenta como universal si no está confirmada.
- La relación de afiliación es visible antes del clic externo.
- La retirada de una oferta no produce un enlace roto.

