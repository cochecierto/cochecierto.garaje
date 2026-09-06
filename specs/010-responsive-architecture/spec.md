# Spec 010 — Adaptación Responsive Integral y Mejores Prácticas Frontend

## Objetivo

Garantizar que CocheCierto Garaje ofrezca una experiencia visual, táctil y de navegación de primer nivel en cualquier tamaño de pantalla (360px a 1440px+), eliminando desbordamientos horizontales, dotando al sitio de un menú móvil accesible, zonas de toque óptimas de 48px para los dedos y soporte para safe-areas de dispositivos modernos.

## Alcance

- **Cabecera y Navegación Móvil**:
  - Inclusión de `viewport-fit=cover` en la etiqueta meta viewport.
  - Botón hamburguesa táctil en pantallas ≤ 800px.
  - Cajón de navegación móvil desplegable con efecto cristal translúcido (*backdrop blur*) y cierre con tecla Escape o clic fuera.
- **Prevención de Desbordamiento Horizontal**:
  - Contención estricta de elementos gráficos (órbitas y tarjetas flotantes del hero).
  - Eliminación de márgenes negativos no contenidos en móviles.
- **Ergonomía Táctil en el Despiece del Coche**:
  - Área de toque ampliada a 48x48px en los hotspots interactivos para facilitar la pulsación con el pulgar.
  - Deslizador de pestañas de zonas con inercia nativa (`-webkit-overflow-scrolling: touch`).
  - Adaptación fluida de la altura del visor del coche en teléfonos (230px–260px) sin distorsión ni pérdida de proporción.
- **Tipografía y Tablas Fluidas**:
  - Ajuste de las tablas de micro-especificaciones a lectura vertical apilada en móviles pequeños.
  - Títulos con escala fluida `clamp()` que no generan saltos antiestéticos.
- **Safe Areas**:
  - Integración de `env(safe-area-inset-top)` y `env(safe-area-inset-bottom)` para respetar notches de iOS y barras de navegación en Android.

## Criterios de Aceptación

- 0% de desbordamiento horizontal en resoluciones de 360px, 390px, 414px, 768px, 1024px y 1400px.
- El menú móvil abre y cierra suavemente, permitiendo navegar a cualquier sección.
- Los hotspots y botones tienen zonas de pulsación de al menos 48px en móvil.
- La experiencia táctil en el despiece responde inmediatamente sin retrasos ni tirones (60fps).
