---
name: cochecierto-garaje-landing
description: Diseñar, especificar, prototipar y revisar la landing inmersiva de CocheCierto Garage, con narrativa de scroll, catálogo afiliado, conversión y experiencia responsive. Usar para propuestas visuales, wireframes, prompts de imagen/vídeo y planificación técnica; no ejecutar cambios en WordPress o producción sin aprobación explícita.
---

# Skill: CocheCierto Garage Landing

## Propósito

Ayuda a construir una landing premium, útil y orientada a conversión para `garage.cochecierto.com`: una experiencia editorial de recomendaciones de productos para automoción, no un marketplace de vehículos ni un checkout propio.

Antes de una iniciativa nueva, leer la documentación vigente del proyecto y la spec relacionada. Las decisiones del usuario prevalecen sobre esta skill, pero no amplían automáticamente los permisos de ejecución.

## Contexto obligatorio

Consultar, cuando estén disponibles:

- `Base_conocimiento_proyecto_CocheCierto.md`
- `GUIA_IMPLEMENTACION_COCHECIERTO_GARAGE.md`
- `docs/architecture.md`
- `docs/constitution.md`
- la spec activa en `specs/`
- `agents/AMAZON.md` cuando afecte a afiliación o catálogo

El repositorio oficial de Garage es `cochecierto/cochecierto.garaje`. El repositorio `inmobia360/coche.cierto` es únicamente referencia documental y estratégica. No mezclar código, bases de datos, sesiones, credenciales ni despliegues.

## Dirección de marca

- Azul profundo: `#00263E`
- Naranja de acción: `#FC4C02`
- Fondo oscuro: `#071521`
- Blanco cálido: `#F7F8F5`
- Títulos, marca y botones: Manrope
- Texto e interfaz: Inter

Usar el logo y los personajes Ciro/Clara sin alterar su identidad visual. Ciro comunica hacia fuera; Clara acompaña dentro. No inventar variantes de rostro, proporciones o personalidad.

## Modelo de experiencia

La landing debe conducir de necesidad a decisión:

`entrada → necesidad → categoría/guía → ficha editorial → recomendación → proveedor externo`

La mecánica de scroll debe aportar comprensión. Recomendar como MVP cinco escenas:

1. Coche completo y propuesta de valor.
2. Qué se ve y qué necesidades resuelve.
3. Qué conviene revisar o mantener.
4. Productos recomendados y explicación editorial.
5. Decisión final con CTA claro.

El coche insignia naranja puede permanecer fijado mientras cambia la narrativa. Usar imagen transparente, secuencia de imágenes o vídeo optimizado antes de introducir 3D. Three.js solo después de validar utilidad, rendimiento y conversión.

## Reglas de implementación

- Preferir `position: sticky`, progreso por escena y `requestAnimationFrame`.
- Usar `IntersectionObserver` para activar escenas y carga diferida.
- Mantener desplazamiento libre; nunca atrapar al usuario.
- Proporcionar fallback estático cuando vídeo o animación no carguen.
- Implementar `prefers-reduced-motion`, pausa/salto, teclado, texto alternativo y contraste suficiente.
- Diseñar móvil específicamente: escenas más cortas, menos texto y recursos ligeros.
- El contenido importante debe existir como HTML indexable: H1/H2/H3, enlaces internos, metadatos y FAQ visible cuando corresponda.
- Una acción principal por pantalla y CTA repetido solo cuando tenga sentido.

## Catálogo y afiliación

Garage selecciona, explica y deriva; Amazon gestiona la compra. Las fichas deben incluir utilidad, usuario adecuado, compatibilidad, limitaciones, alternativas, fecha de revisión y proveedor. Mostrar siempre la transparencia de afiliación.

No presentar productos como universales sin confirmación. No mostrar precios o disponibilidad sin control de actualización. No copiar descripciones o imágenes sin revisión y autorización.

## Analítica mínima

Considerar `landing_started`, `scene_progressed`, `category_viewed`, `product_viewed`, `assistant_started`, `recommendation_completed` y `affiliate_link_clicked`. No enviar emails, datos financieros, VIN, matrícula u otros datos innecesarios.

## Flujo SDD

Para cambios relevantes:

1. Definir problema, alcance y criterios de aceptación.
2. Revisar riesgos de UX, móvil, SEO, legal, afiliación y rendimiento.
3. Crear o actualizar `spec.md`, `plan.md` y `tasks.md` antes de programar.
4. Implementar una tarea cada vez.
5. Validar escritorio, móvil, accesibilidad, rendimiento, enlaces y analítica.
6. Documentar resultado, limitaciones y cambios.

Si el usuario pide solo una propuesta, entregar análisis, arquitectura, wireframe textual y recomendación sin escribir código ni desplegar.

## Imágenes y vídeo

Cuando se solicite generar o editar un recurso visual, conservar explícitamente la identidad del coche y la marca. Para vídeo, describir escenas como estados observables: inicio, movimiento, cámara, transición y estado final. No copiar la web de referencia; tomar solo principios de interacción.

Para una propuesta creativa, no generar recursos automáticamente. Presentar primero la dirección recomendada y pedir confirmación antes de consumir créditos o producir variantes.

## Entrega

Indicar siempre si el resultado es propuesta, prototipo, implementación o despliegue. Si se crean archivos del proyecto, informar de sus rutas absolutas. No afirmar que algo está publicado, probado o conectado si no existe evidencia.
