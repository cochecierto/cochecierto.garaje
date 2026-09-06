# Spec 008 — Despiece interactivo del coche y scrollytelling

## Objetivo

Ofrecer una experiencia interactiva en la portada de CocheCierto Garage que permita al usuario explorar visualmente las diferentes zonas del vehículo (despiece técnico) a través de scrollytelling y hotspots interactivos, conectando cada parte con sus cuidados esenciales, métricas de mantenimiento, compatibilidad y productos recomendados.

## Alcance

- **5 Zonas Clave del Coche**:
  1. `Carrocería y Pintura`: Lavado, descontaminado, sellado cerámico y microarañazos.
  2. `Interior y Confort`: Limpieza de tapicería, salpicadero, organización y soportes.
  3. `Vano Motor y Mecánica`: Niveles (aceite, anticongelante), batería, filtros y herramientas de diagnóstico OBD2.
  4. `Ruedas y Neumáticos`: Manómetros de presión, compresores portátiles, profundidad de dibujo y antipinchazos.
  5. `Seguridad y Emergencia`: Baliza homologada V16 geolocalizada DGT 3.0, chalecos, botiquín y linterna estroboscópica.
- **Micro-especificaciones técnicas por zona**: Frecuencia recomendada, métrica clave y advertencia de compatibilidad.
- **Hotspots interactivos**: Puntos interactivos con pulsación visual sobre el coche insignia.
- **Navegación dual**:
  - *Scrollytelling fluido*: Al desplazarse verticalmente, el coche permanece visible en `sticky` y la zona activa se resalta dinámicamente.
  - *Selector directo por pestañas*: Posibilidad de hacer clic en cualquier zona sin necesidad de scroll obligatorio.
- **Adaptabilidad completa (Responsive)**: Vista optimizada en smartphones y soporte para `prefers-reduced-motion`.

## Fuera de alcance

- Renders 3D WebGL pesados (mantenemos ligereza y rendimiento < 50KB JS/CSS).
- Pasarela de pago o carrito interno (mantiene modelo editorial y afiliación transparente).

## Criterios de Aceptación

- La sección es perfectamente comprensible en los primeros 3 segundos.
- Cada zona muestra métricas técnicas claras, advertencia de compatibilidad y botón directo al catálogo o guía.
- El rendimiento es óptimo (sin ralentizaciones de scroll, 60fps en animaciones CSS).
- Accesible mediante teclado (`Tab` y `Enter` para activar hotspots y pestañas).
- 100% responsive en móvil, tablet y escritorio.
