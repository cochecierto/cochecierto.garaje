# Plan de Implementación — Spec 008

## Arquitectura

1. **Estructura HTML (`front-page.php`)**:
   - Sección `#garage-despiece` con contenedor `.garage-breakdown`.
   - Columna visual sticky (`.garage-breakdown__stage`): imagen del coche con overlay de hotspots animados en SVG/CSS.
   - Columna de tarjetas (`.garage-breakdown__steps`): 5 pasos correspondientes a cada zona con su índice (`01 / 05` a `05 / 05`), kicker, métricas técnicas destacadas, advertencia y CTA.
   - Navegador superior de pestañas accesibles (`.garage-breakdown__tabs`) para cambio directo instantáneo.

2. **Estilos CSS (`style.css`)**:
   - `position: sticky` para mantener el coche centrado en el viewport durante la lectura de los 5 pasos.
   - Hotspots pulsantes sincronizados con la zona activa mediante atributo `data-active-zone`.
   - Micro-fichas técnicas tipo *Heliostat* con contraste refinado, bordes sutiles y etiquetas de compatibilidad.

3. **Lógica JavaScript (`assets/js/garage-breakdown.js`)**:
   - `IntersectionObserver` con umbral de visibilidad del 50-60% para activar el hotspot y la pestaña activa conforme el usuario lee cada paso.
   - Event listeners en pestañas y hotspots para permitir scroll suave (`scrollIntoView({ behavior: 'smooth' })`) o activación directa.

4. **Registro en WordPress (`functions.php`)**:
   - Encolado condicional de `garage-breakdown.js` solo en la portada (`is_front_page()`).
