# Especificación: Modo App y PWA Instalable (Spec 011)

## 1. Contexto y Objetivos

- **Objetivo**: Dotar a CocheCierto Garaje de comportamiento y apariencia de aplicación móvil nativa (Modo App) e incorporar soporte de Progressive Web App (PWA) para permitir su instalación directa en la pantalla de inicio de dispositivos móviles (Android, iOS y tablets).
- **Dominio de producción**: https://garaje.cochecierto.com/
- **Branding**: Rigurosamente CocheCierto Garaje / Garaje (ortografía española con 'j', sin excepciones).
- **Diseño de Interacción**: Barra de navegación inferior móvil tipo app (Bottom Bar) con iconos y atajos directos, respetando áreas seguras de pantalla (safe areas).

## 2. Requerimientos de la PWA

1. **Manifiesto Web (manifest.json)**:
   - name: CocheCierto Garaje — Cuidado y Mantenimiento del Coche
   - short_name: Garaje
   - start_url: https://garaje.cochecierto.com/?source=pwa
   - scope: /
   - display: standalone
   - theme_color: #071521
   - background_color: #071521
   - orientation: portrait-primary
   - icons: Iconos de 192x192 y 512x512 píxeles con propósito any maskable.

2. **Service Worker (sw.js)**:
   - Archivo JavaScript registrado en el navegador para cumplir los criterios de instalación de Chrome, Edge y navegadores Chromium.
   - Manejo de ciclo de vida (install, activate, fetch) con cache básica network-first para recursos estáticos esenciales.

3. **Integración iOS / Safari**:
   - Meta apple-mobile-web-app-capable: yes
   - Meta apple-mobile-web-app-status-bar-style: black-translucent
   - Meta apple-mobile-web-app-title: Garaje
   - apple-touch-icon: icono de alta resolución.

4. **Navegación Móvil Tipo App (Bottom Navigation Bar)**:
   - Activada en anchos <= 768px.
   - Fija al final de la pantalla con efecto frosted glass (backdrop-filter: blur(20px)).
   - 5 accesos directos: Inicio, Despiece, Guías, Catálogo e Instalar/Menú.
