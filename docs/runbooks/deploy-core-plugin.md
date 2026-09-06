# Runbook — desplegar Garage Core

## Paquete

- Directorio fuente: `plugins/cochecierto-garage-core/`
- Dominio: `garage.cochecierto.com`
- Slug: `cochecierto-garage-core`
- Archivo principal: `cochecierto-garage-core.php`

## Precondiciones

- PHP sin errores de sintaxis.
- El paquete no contiene credenciales, bases de datos ni archivos generados.
- La instalación WordPress destino es válida.
- Existe aprobación explícita para modificar el WordPress remoto.

## Despliegue

El despliegue debe realizarse mediante el conector de Hostinger usando el directorio del plugin, no mediante snippets ni edición directa del tema.

## Verificación posterior

1. Confirmar que el plugin aparece instalado y activo.
2. Confirmar que no tiene vulnerabilidades conocidas.
3. Abrir el panel de WordPress y comprobar que aparece “Productos Garage”.
4. Crear un producto de prueba sin enlace comercial.
5. Comprobar categorías, necesidades y campos editoriales.
6. Comprobar la REST API pública solo con contenido publicado.
7. Regenerar enlaces permanentes si WordPress no reconoce las rutas.
8. Purgar la caché después de validar, si es necesario.

## Rollback

No desinstalar ni borrar automáticamente. Si falla, preservar el estado y pedir una decisión antes de retirar el plugin.

