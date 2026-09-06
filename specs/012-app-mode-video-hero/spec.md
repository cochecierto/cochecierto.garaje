# Especificación: Integración de Logotipos Claro/Oscuro, Barra Modo App alineada con CocheCierto y Video Hero Interactivo (Spec 012)

## 1. Contexto y Objetivos

- **Objetivo**: 
  1. Aplicar los logotipos oficiales de CocheCierto Garaje con soporte de tema Claro/Oscuro (logo-garage-light.png y logo-garage-dark.png) y selector de tema (dark/light toggle) en la cabecera.
  2. Alinear el menú  Modo App con la arquitectura, interacción y diseño exacto de CocheCierto (referencia inmobia360/coche.cierto): 4 botones, botón central naranja destacado (Explorar / Despiece), animación de auto-ocultado al deslizar hacia abajo (	ranslateY(110%)) y reaparición al deslizar hacia arriba, y apertura del panel de menú completo.
  3. Integrar el vídeo oficial cochecierto-presentacion.mp4 en el Hero con la dinámica interactiva de Heliostat (reproducción / apertura secuencial sincronizada con scroll o interactiva que descompone y da paso al despiece del coche).
- **Dominio de producción**: https://garaje.cochecierto.com/
- **Branding**: Rigurosamente CocheCierto Garaje.

## 2. Requerimientos Técnicos

1. **Logotipos Oficiales Claro / Oscuro**:
   - En tema oscuro (por defecto): logo-garage-dark.png.
   - En tema claro: logo-garage-light.png.
   - Botón toggle de tema en el header (☼ / ☾) sincronizado con localStorage('cc-theme').
   - Clase .theme-light en html y ody.

2. **Barra Móvil Modo App (Estándar CocheCierto)**:
   - 4 accesos:
     - 1. **Inicio** (icono home)
     - 2. **Guías** (icono guías/método)
     - 3. **Explorar / Despiece** (botón central naranja .mobile-bottom-primary con sombra naranja, icono reporte/coche)
     - 4. **Menú** (icono menú hamburguesa que abre el cajón/panel)
   - Scroll inteligente: al hacer scroll down > 24px se oculta (	ransform: translateY(110%)), al hacer scroll up vuelve a mostrarse.
   - Panel de menú móvil con estructura de grupos acorde a la guía de CocheCierto.

3. **Hero con Video Interactivo Tipo Heliostat**:
   - Elemento <video> con cochecierto-presentacion.mp4, playsinline, muted, loop / scroll-controlled.
   - Efecto visual de apertura y sincronización con el scroll para dar paso al despiece interactivo del coche insignia.
