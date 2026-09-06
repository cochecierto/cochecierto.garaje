# 004-amazon-plugin — Integración inicial de proveedor

## Objetivo

Integrar Amazon España como primer proveedor de Garage sin convertir el plugin de afiliación en la fuente única del catálogo ni mezclar credenciales con el código propio.

## Requisitos

- RF-001 — El sistema debe mantener un producto interno independiente del ASIN.
- RF-002 — Cada oferta Amazon debe registrar proveedor, ASIN, URL afiliada, fecha de comprobación y estado.
- RF-003 — El sistema debe poder mostrar una ficha editorial aunque una oferta Amazon deje de estar disponible.
- RF-004 — Los precios y disponibilidad deben mostrar fecha de actualización y fuente cuando se publiquen.
- RF-005 — Todo enlace afiliado debe incluir la atribución configurada para Amazon España.
- RF-006 — La ficha debe mostrar un aviso visible de afiliación.
- RF-007 — No deben almacenarse claves, tokens ni credenciales en el repositorio, frontend o contenido público.
- RF-008 — Un fallo de proveedor no debe romper la navegación general ni mostrar un enlace roto como CTA principal.

## Casos límite

- Producto sin precio.
- Producto sin imagen autorizada.
- ASIN cambiado o producto sustituido.
- Producto descatalogado.
- Variantes con compatibilidades diferentes.
- Oferta que redirige a otra tienda o país.
- Datos de proveedor desactualizados.

## Fuera de alcance

- Checkout propio.
- Scraping no autorizado.
- Importación masiva sin revisión.
- Compra automática.
- Sincronización sin límites ni trazabilidad.

## Criterios de aceptación

- Existe un adaptador o contrato de proveedor documentado.
- Se puede retirar una oferta Amazon sin borrar la ficha editorial.
- El contenido no presenta datos no verificados como hechos.
- El aviso de afiliación aparece antes o junto al CTA externo.
- QA puede comprobar un caso activo, uno sin precio y uno retirado.

