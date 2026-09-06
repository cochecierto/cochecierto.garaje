# Esquema editorial del catálogo

Este esquema separa la identidad editorial de Garage de cada oferta concreta de un proveedor.

## Producto

| Campo | Tipo | Obligatorio | Regla |
|---|---|---:|---|
| `id` | string | Sí | Identificador interno estable, por ejemplo `prod_arrancador_01`. |
| `slug` | string | Sí | URL editorial única. |
| `name` | string | Sí | Nombre claro, sin claims no verificados. |
| `category` | string | Sí | Categoría principal de Garage. |
| `need` | string[] | Sí | Necesidades que resuelve. |
| `editorial_summary` | string | Sí | Explicación propia y revisada. |
| `recommended_for` | string[] | Sí | Perfiles adecuados. |
| `benefits` | string[] | Sí | Beneficios observables. |
| `limitations` | string[] | Sí | Inconvenientes y límites. |
| `compatibility_checks` | string[] | Sí | Qué debe comprobar el usuario. |
| `image_status` | enum | Sí | `authorized`, `pending`, `retired`. |
| `editorial_status` | enum | Sí | `draft`, `review`, `published`, `retired`. |
| `seo_status` | enum | Sí | `pending`, `reviewed`, `published`, `noindex`. |
| `last_reviewed_at` | date | Sí | Fecha de revisión editorial. |

## Oferta de proveedor

| Campo | Tipo | Obligatorio | Regla |
|---|---|---:|---|
| `provider` | string | Sí | `amazon_es`, `manual` u otro adaptador. |
| `external_id` | string | Sí | ASIN u otro identificador, nunca el ID editorial. |
| `affiliate_url` | string | Cuando aplique | Debe ser verificable y atribuido. |
| `price` | decimal | No | Siempre acompañado de fecha y fuente. |
| `currency` | string | No | Por defecto `EUR` si el dato está confirmado. |
| `availability` | string | No | Solo si el proveedor la confirma. |
| `source_url` | string | Sí | Fuente de la información. |
| `checked_at` | date | Sí | Fecha de comprobación. |
| `status` | enum | Sí | `active`, `unavailable`, `retired`. |

## Regla de publicación

Una ficha puede existir sin oferta activa. Una oferta retirada no debe borrar el contenido editorial ni provocar que se muestre un enlace roto.

