# Arquitectura inicial de CocheCierto Garage

## Capas

```text
WordPress
├── Tema hijo Garage        → presentación, plantillas y estilos
├── Garage Core              → productos, taxonomías y metadatos editoriales
├── Plugin Amazon Hostinger  → herramientas de afiliación del proveedor
└── Futuros adaptadores      → ofertas de Amazon y otros proveedores
```

## Responsabilidades

### WordPress

Gestiona usuarios administradores, contenido publicado, medios, revisiones y REST API pública.

### Tema hijo

Contiene únicamente presentación: estilos, plantillas y componentes de lectura. No debe guardar credenciales ni implementar reglas de proveedor.

### Garage Core

Contiene el tipo de contenido `garage_product`, taxonomías, metadatos, permisos, sanitización y estados editoriales. No debe depender de Amazon para que una ficha exista.

### Amazon

Gestiona la conexión y herramientas de afiliación del proveedor. Sus datos deben pasar por revisión editorial antes de formar parte de una ficha pública.

## Flujo de datos

```text
Proveedor → oferta externa → revisión AMAZON → ficha Garage → CTA identificado → proveedor final
```

El proveedor no puede crear por sí solo una recomendación editorial ni alterar el ranking sin trazabilidad.

## Separación operativa

- Base de datos y WordPress independientes de CocheCierto principal.
- Credenciales fuera del repositorio.
- Sin sesiones compartidas.
- Sin copia automática de código del repositorio de referencia.
- Despliegues separados para plugin y tema.

