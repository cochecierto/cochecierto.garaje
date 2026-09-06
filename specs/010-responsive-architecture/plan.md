# Plan Técnico — Spec 010: Arquitectura Responsive

## Componentes y Arquitectura Frontend

1. **Header y Menú Móvil (`header.php` y `style.css`)**:
   - Meta viewport: `<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">`.
   - Botón toggle: `<button type="button" class="garage-menu-toggle" aria-expanded="false" aria-controls="garage-mobile-drawer" aria-label="Abrir menú de navegación">`.
   - Drawer móvil: `.garage-mobile-drawer` con fondo `rgba(7, 21, 33, 0.96)`, `backdrop-filter: blur(16px)`, enlaces verticales de gran tamaño táctil (min-height 52px).

2. **Lógica de Menú Móvil (`garage-breakdown.js`)**:
   - Control de apertura/cierre de clase `is-open` en el drawer y `aria-expanded` en el botón.
   - Bloqueo de scroll en `body` cuando el menú esté desplegado (`body.style.overflow = 'hidden'`).
   - Cierre automático al pulsar un enlace de navegación, al pulsar la tecla Escape o al hacer clic fuera del panel.

3. **Optimización CSS Responsive (`style.css`)**:
   - Blindaje de desbordamiento: `html, body { overflow-x: clip; max-width: 100vw; }`.
   - `.garage-hero__visual`: `overflow: hidden; border-radius: var(--cc-radius);` para asegurar que las órbitas decorativas se recorten limpiamente dentro del contenedor en móvil.
   - `.garage-float`: en pantallas ≤ 640px, las tarjetas flotantes se adaptan con márgenes positivos o se integran de forma fluida.
   - Hotspots táctiles: `.garage-hotspot::before` con `content: ''; position: absolute; inset: -10px; width: 48px; height: 48px;` garantizando el objetivo de toque de 48px sin alterar el diseño visual.
   - Subpáginas (Guías y Categorías): apilado vertical fluido en tablets y móviles.
