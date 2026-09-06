# 006-category-navigation — Categorías y navegación

## Objetivo

Permitir que una persona llegue a productos útiles por necesidad, categoría o búsqueda, con una arquitectura sencilla y sin páginas vacías.

## Categorías iniciales

- Seguridad y emergencia
- Mantenimiento
- Limpieza y cuidado
- Tecnología para el coche
- Viajes y organización
- Confort
- Accesorios
- Equipamiento

## Requisitos

- RF-001 — La navegación principal debe ofrecer Inicio, Categorías, Guías de compra, Comparativas, Buscador y Ayuda.
- RF-002 — Cada categoría debe explicar qué necesidad cubre antes de mostrar productos.
- RF-003 — Las categorías sin productos publicados deben mostrar un estado vacío claro y no deben indexarse como páginas útiles.
- RF-004 — Los filtros deben preservar una URL estable y no generar combinaciones infinitas indexables.
- RF-005 — Cada ficha debe enlazar de vuelta a su categoría y a contenidos relacionados.
- RF-006 — La navegación debe ser usable en móvil y teclado.

## Fuera de alcance

- Filtros dinámicos avanzados.
- Personalización por cuenta.
- Recomendador completo.
- Importación masiva de categorías desde Amazon.

## Criterios de aceptación

- Una persona puede llegar a una categoría en un máximo de dos interacciones desde la portada.
- Una categoría comunica utilidad, no solo una lista de productos.
- Los estados vacíos no muestran porcentajes ni métricas inventadas.
- Los filtros y enlaces no exponen datos privados.

