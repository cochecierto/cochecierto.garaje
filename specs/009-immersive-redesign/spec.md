# Spec 009 — Rediseño inmersivo global: Header sticky, ancho 1400px, visor dinámico y congruencia

## Objetivo

Elevar la experiencia de usuario y el acabado visual de CocheCierto Garage al nivel de ingeniería técnica y scrollytelling visto en referencias como Heliostat, asegurando:
1. Navegación persistente y translúcida con el logotipo oficial de CocheCierto.
2. Ancho útil panorámico (1400px) con tipografía y métricas de mayor legibilidad.
3. Escenario visual interactivo a la izquierda que reacciona con transformaciones visuales llamativas (brillo de laca, rayos X interior, enfoque al motor, testigo de neumáticos y baliza V16 activa) conforme el usuario recorre las tarjetas a la derecha.
4. Coherencia y armonía corporativa en todas las plantillas (portada, guías, categorías y catálogo).

## Alcance

- **Header persistente (`position: sticky`)**: Fondo `rgba(7, 21, 33, 0.88)`, `backdrop-filter: blur(14px)`, borde inferior sutil, logo oficial nítido y CTA.
- **Ampliación de pantalla**: `.garage-shell` expandido de 1160px a 1400px con adaptabilidad fluida.
- **Visor visual del coche a la izquierda**:
  - Efecto laca y brillo reflectante para Carrocería + selector de acabado (Brillo/Mate).
  - Efecto translúcido / rayos X con iluminación cálida para Habitáculo/Interior.
  - Enfoque frontal y telemetría de fluidos para Vano Motor.
  - Enfoque lateral inferior y manómetro gráfico para Neumáticos.
  - Baliza V16 estroboscópica en el techo para Seguridad & DGT 3.0.
- **Columna de despiece a la derecha**: Tarjetas interactivas con índice `01 / 05` a `05 / 05`, micro-tablas técnicas y llamadas a la acción directas.
- **Congruencia global**: Actualización de contenedores y estilos en guías (`garage-guide.php`), categorías (`garage-category.php`) y productos.

## Criterios de Aceptación

- El header permanece fijo sin tapar contenido ni causar saltos de scroll.
- El ancho de 1400px aprovecha las pantallas grandes sin desbordamiento horizontal en resoluciones menores.
- Al interactuar con cada tarjeta o hacer scroll, el visor visual de la izquierda actualiza sus transformaciones de forma suave (60fps).
- Totalmente responsive en dispositivos móviles y respetuoso con `prefers-reduced-motion`.
- Todas las plantillas secundarias comparten la misma identidad de marca y paleta.
