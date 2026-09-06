# 003-catalogue-model — Modelo editorial de catálogo

## Objetivo

Definir cómo Garage representa productos, proveedores, categorías y recomendaciones sin convertir WordPress o Amazon en la fuente única del modelo.

## Requisitos

- RF-001 — Cada producto debe tener un identificador interno independiente del ASIN o identificador externo.
- RF-002 — El producto debe poder asociarse a uno o varios proveedores mediante un adaptador.
- RF-003 — Una ficha debe registrar nombre, categoría, utilidad, perfil recomendado, compatibilidad, limitaciones, imagen autorizada, precio fechado si existe, disponibilidad si existe, URL afiliada, fecha de revisión y estado editorial.
- RF-004 — El catálogo debe distinguir producto confirmado, pendiente de revisión, descatalogado y retirado.
- RF-005 — Una recomendación debe explicar necesidad, motivo, usuario adecuado, limitación y comprobación previa.
- RF-006 — El sistema no debe mostrar un precio o disponibilidad como dato actual si no tiene fecha y fuente.
- RF-007 — El sistema debe permitir más de un proveedor sin cambiar la ficha editorial principal.

## Entidades mínimas

```text
Product
Category
Provider
ProviderOffer
EditorialReview
RecommendationRule
```

## Fuera de alcance

- Sincronización automática completa con Amazon.
- Scraping no autorizado.
- Gestión de pedidos, stock, envíos o devoluciones.
- Valoraciones de usuarios en el primer piloto.

## Criterios de aceptación

- Existe un esquema de datos revisable.
- El modelo no guarda credenciales.
- Se puede retirar una oferta de proveedor sin borrar la ficha editorial.
- Las recomendaciones pueden auditarse por fuente y fecha.

