# Validación — 003-catalogue-model

## Estado

Esquema documental y fixture ficticio creados. No se ha creado ningún producto real ni se ha modificado WordPress.

## Comprobaciones realizadas

- El ID editorial está separado del identificador externo del proveedor.
- Los precios y la disponibilidad requieren fecha y fuente.
- Una oferta retirada no obliga a borrar la ficha editorial.
- El fixture no contiene credenciales, ASIN reales ni enlaces comerciales.
- El plugin local registra un tipo de contenido y dos taxonomías sin depender del plugin de Amazon.
- Los metadatos iniciales se sanitizan y requieren permisos de edición.
- La edición administrativa utiliza nonce, evita autosaves y comprueba capacidades.
- La activación y desactivación actualizan las reglas de enlaces permanentes.
- El plugin no se ha desplegado ni activado remotamente.

## Riesgos pendientes

- El plugin de Hostinger puede estar orientado a bloques editoriales y no cubrir todo el modelo editorial requerido.
- La política de Amazon puede limitar precios, imágenes y datos que Garage puede almacenar o mostrar.
- Hay que evitar duplicar fichas si una oferta cambia de proveedor.
