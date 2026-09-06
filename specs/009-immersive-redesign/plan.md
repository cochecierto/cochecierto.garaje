# Plan Técnico — Spec 009

## Componentes y Arquitectura

1. **Header Fijo (`header.php` y `style.css`)**:
   - `position: sticky; top: 0; z-index: 100;`
   - `backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px);`
   - Logotipo vectorial SVG de CocheCierto con proporción calibrada (200px width en desktop).
   - Barra de progreso de scroll sincronizada a `top: 78px`.

2. **Rejilla Panorámica y Layout (`style.css`)**:
   - `.garage-shell` con `max-width: 1400px; width: min(1400px, calc(100% - 64px)); margin-inline: auto;`
   - Tipografía base aumentada a 17px/18px con line-height 1.65.
   - Titulares ampliados a clamp(2.4rem, 4.5vw, 4rem).

3. **Escenario Visual del Coche (`front-page.php`)**:
   - Contenedor `.garage-breakdown__stage` fijado a la izquierda (`sticky; top: 100px`).
   - Elementos visuales dinámicos integrados:
     - `.garage-vis-effect--carroceria`: brillo de laca con animación `@keyframes laca-shimmer` y toggle `[ Brillo ] / [ Mate ]`.
     - `.garage-vis-effect--interior`: iluminación sutil de habitáculo y selector de tapicería.
     - `.garage-vis-effect--motor`: cuadro de telemetría de fluidos y temperatura.
     - `.garage-vis-effect--neumaticos`: widget gráfico de presión en bar/PSI.
     - `.garage-vis-effect--seguridad`: baliza V16 activa con haz de luz naranja intermitente `@keyframes v16-strobe`.

4. **Columna de Tarjetas a la Derecha (`front-page.php`)**:
   - Disposición en 2 columnas: 1.15fr (visor) / 0.85fr (tarjetas).
   - Fichas de paso con badges técnicos y especificaciones legibles.

5. **Lógica de Sincronización (`garage-breakdown.js`)**:
   - IntersectionObserver que detecta la tarjeta activa y actualiza el atributo `data-active-zone` en el visor.
   - Manejador de eventos para el selector de acabado (Brillo / Mate) que altera la reflectancia de la chapa en tiempo real.
