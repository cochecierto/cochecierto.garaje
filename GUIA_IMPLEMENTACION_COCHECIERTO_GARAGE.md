# Guía de implementación de CocheCierto Garage

**Documento para el equipo de desarrollo digital**  
**Versión:** 1.0  
**Estado:** Base de trabajo para iniciar el proyecto  
**Marca:** CocheCierto Garage  
**URL objetivo:** `https://garage.cochecierto.com`  
**Repositorio objetivo:** `inmobia360/cochecierto-garage`  
**Carpeta local:** `C:\Users\ernes\Documents\COCHECIERTO\CocheCierto_Garaje`

---

## 1. Propósito de esta guía

Esta guía define cómo crear, organizar, desarrollar, validar y poner en producción **CocheCierto Garage**, una plataforma independiente de recomendaciones de productos para el automóvil.

El proyecto comenzará con Amazon como proveedor de afiliación mediante un plugin de WordPress compatible con el programa de afiliados correspondiente, pero deberá diseñarse para incorporar otros proveedores en el futuro.

La plataforma no debe confundirse con:

- El valorador principal de CocheCierto.
- El asistente Clara.
- Un marketplace de vehículos.
- Una tienda con stock propio.
- Un sistema de logística, pagos o gestión de pedidos propios.

Su función inicial será:

> Descubrir, seleccionar, organizar, explicar y recomendar productos útiles para conductores y vehículos, derivando al usuario al proveedor final.

La experiencia principal será de catálogo y compra. El recomendador inteligente será una ayuda complementaria, no la identidad central del proyecto.

---

## 2. Decisiones aprobadas

| Elemento | Decisión |
|---|---|
| Marca | CocheCierto Garage |
| Subdominio | `garage.cochecierto.com` |
| Plataforma | WordPress independiente |
| Proveedor inicial | Amazon España |
| Modelo | Afiliación y recomendación editorial |
| Repositorio | `inmobia360/cochecierto-garage` |
| Carpeta local | `C:\Users\ernes\Documents\COCHECIERTO\CocheCierto_Garaje` |
| Checkout propio | Fuera del MVP |
| Gestión de stock | Fuera del MVP |
| Envíos y devoluciones | Los gestiona el proveedor |
| Asistente | Complementario y orientado a recomendación |
| Desarrollo | Spec-Driven Development (SDD) |
| Relación con CocheCierto | Vinculada visual y conceptualmente, independiente técnicamente |

---

## 3. Relación con el proyecto CocheCierto base

El equipo tendrá acceso al repositorio:

`https://github.com/inmobia360/coche.cierto`

Ese repositorio se utilizará como **fuente de contexto y referencia**, no como dependencia técnica obligatoria.

### 3.1. Qué debe reutilizarse como contexto

- Propósito y valores de la marca CocheCierto.
- Tono de comunicación.
- Conocimiento del comprador de vehículos.
- Criterios de confianza y transparencia.
- Arquitectura de agentes y subagentes.
- Buenas prácticas de documentación.
- Identidad visual cuando sea compatible con la nueva marca.
- Aprendizajes de UX, SEO, accesibilidad y conversión.

### 3.2. Qué no debe mezclarse

- Código de la aplicación principal.
- Base de datos del valorador.
- Usuarios o sesiones de la aplicación principal.
- Configuración de Clara.
- Variables de entorno.
- Credenciales de Amazon.
- Tablas de WordPress o plugins del sitio principal.
- Despliegues o pipelines del repositorio base.

La dependencia será documental y estratégica, no de ejecución.

### 3.3. Lectura obligatoria del repositorio base

Antes de comenzar una iniciativa, el equipo debe revisar progresivamente:

1. `AGENTS.md`.
2. `docs/constitution.md`, si está disponible.
3. `COCHECIERTO.md`.
4. `Propuesta_Maestra_Marca_CocheCierto.md`.
5. `Propuesta_Plataforma_Inteligente_Compra_Coche_Nuevo_Usado.md`.
6. La documentación de agentes y subagentes relevante.
7. Las specs relacionadas con recomendaciones, compra, contenido, confianza o afiliación.

No se debe copiar todo el repositorio al nuevo proyecto. Se debe extraer únicamente el contexto necesario y registrar las decisiones propias de Garage.

---

## 4. Posicionamiento de CocheCierto Garage

### 4.1. Propuesta de valor

> Productos seleccionados para cuidar, mantener, equipar y disfrutar tu coche.

### 4.2. Principios de confianza

1. Recomendar utilidad antes que comisión.
2. Explicar para quién sirve cada producto.
3. Mostrar ventajas, limitaciones y alternativas.
4. No presentar una recomendación como garantía de calidad absoluta.
5. Informar de forma visible de la relación de afiliación.
6. Evitar precios desactualizados o afirmaciones no verificadas.
7. No crear urgencia artificial.
8. No recomendar productos incompatibles sin advertencia.
9. Diferenciar opinión editorial, datos del proveedor y experiencia del usuario.
10. Mantener el control de la decisión en manos del usuario.

### 4.3. Personalidad

CocheCierto Garage debe ser:

- Práctico.
- Claro.
- Cercano.
- Moderno.
- Útil.
- Independiente.
- Visual.
- Orientado a resolver necesidades concretas.

Debe evitar parecer:

- Un catálogo masivo sin criterio.
- Un vendedor agresivo.
- Un chatbot genérico.
- Una web de cupones.
- Un taller mecánico si no ofrece ese servicio.

---

## 5. Modelo funcional

### 5.1. Flujo principal del usuario

```text
Entrada
  ↓
Identificación de necesidad
  ↓
Exploración por categoría, búsqueda o guía
  ↓
Comparación de productos
  ↓
Consulta de ficha editorial
  ↓
Recomendación opcional
  ↓
Clic al proveedor
  ↓
Compra en el proveedor
  ↓
Registro agregado del clic y conversión cuando sea posible
```

### 5.2. Formas de entrada

El usuario podrá comenzar desde:

- Categorías.
- Buscador.
- Guías de compra.
- Comparativas.
- Productos destacados.
- Necesidades concretas.
- Etapas de uso del vehículo.
- Enlaces desde `cochecierto.com`.
- Contenido social.
- Búsqueda orgánica.

### 5.3. Recomendador opcional

El recomendador podrá hacer entre tres y cinco preguntas sencillas:

- ¿Qué necesitas resolver?
- ¿Para qué tipo de coche lo buscas?
- ¿Qué presupuesto aproximado tienes?
- ¿Qué nivel de calidad o durabilidad buscas?
- ¿Tienes alguna limitación de instalación o compatibilidad?

El resultado deberá mostrar entre tres y siete opciones razonadas, no una lista interminable.

Cada resultado debe explicar:

- Por qué aparece.
- Para quién es adecuado.
- Qué problema resuelve.
- Qué limitación tiene.
- Qué debe comprobar el usuario antes de comprar.

---

## 6. Arquitectura de información

### 6.1. Navegación principal

- Inicio.
- Categorías.
- Productos recomendados.
- Comparativas.
- Guías de compra.
- Ofertas, si se pueden verificar correctamente.
- Buscador.
- ¿Necesitas ayuda?

### 6.2. Categorías iniciales

```text
Seguridad y emergencia
Mantenimiento
Limpieza y cuidado
Tecnología para el coche
Viajes y organización
Confort
Accesorios
Equipamiento
```

### 6.3. Categorías por momento de necesidad

También pueden crearse recorridos editoriales:

- Primeras 72 horas con un coche.
- Primeros 30 días.
- Preparar un viaje.
- Equipar un coche familiar.
- Conducir en invierno.
- Mejorar la seguridad.
- Mantener un coche antiguo.
- Prepararse para una emergencia.

Estas páginas deben complementar las categorías, no duplicarlas sin valor.

### 6.4. Tipos de contenido

| Tipo | Función |
|---|---|
| Categoría | Agrupar necesidades y productos |
| Producto | Explicar y derivar al proveedor |
| Comparativa | Ayudar a elegir entre alternativas |
| Guía | Resolver una necesidad completa |
| Lista curada | Presentar opciones seleccionadas |
| Recomendador | Personalizar el punto de partida |
| Preguntas frecuentes | Resolver dudas de compra |

---

## 7. Arquitectura técnica independiente

### 7.1. Dominio y hosting

Configurar en Hostinger:

```text
garage.cochecierto.com
    ↓
Instalación WordPress independiente
    ↓
Base de datos propia
    ↓
Tema y plugins propios
```

No debe apuntar a una carpeta interna del WordPress principal si eso provoca una instalación compartida o una configuración difícil de mantener.

### 7.2. Elementos independientes

- Document root propio.
- Base de datos propia.
- Usuario de base de datos propio.
- Certificado SSL propio o correctamente asociado.
- Panel de administración propio.
- Backups propios.
- Variables de entorno separadas.
- Cuenta de analítica diferenciada o propiedad separada.
- Propiedad independiente en Search Console.
- Entorno de pruebas separado cuando sea posible.

### 7.3. Reglas de seguridad

- No guardar credenciales en GitHub.
- No subir archivos `.env`.
- No reutilizar contraseñas del sitio principal.
- Activar autenticación multifactor en WordPress y GitHub.
- Limitar permisos de administradores.
- Mantener WordPress, tema y plugins actualizados.
- Activar copias automáticas antes de actualizaciones.
- Probar actualizaciones importantes en staging.
- Desactivar plugins no utilizados.
- Registrar quién modifica configuraciones críticas.

---

## 8. Repositorio GitHub

### 8.1. Nombre recomendado

`inmobia360/cochecierto-garage`

Nombre visible del proyecto:

> CocheCierto Garage

### 8.2. Regla fundamental

El repositorio debe contener el código y la documentación que el equipo pueda mantener, no una copia indiscriminada de todo WordPress.

No subir:

- El core completo de WordPress.
- `wp-content/uploads/` salvo casos controlados.
- Copias de bases de datos con datos personales.
- Contraseñas.
- Tokens.
- Claves de Amazon.
- Backups pesados.
- Logs privados.

### 8.3. Estructura recomendada del repositorio

```text
cochecierto-garage/
├── AGENTS.md
├── README.md
├── CONTRIBUTING.md
├── CHANGELOG.md
├── LICENSE
├── .gitignore
├── .env.example
├── docs/
│   ├── constitution.md
│   ├── context-cochecierto.md
│   ├── brand.md
│   ├── architecture.md
│   ├── hosting.md
│   ├── amazon-affiliate.md
│   ├── seo.md
│   ├── legal.md
│   ├── analytics.md
│   └── runbooks/
├── specs/
│   ├── 001-foundation/
│   ├── 002-brand-shell/
│   ├── 003-catalogue/
│   ├── 004-amazon-integration/
│   ├── 005-product-pages/
│   ├── 006-search-navigation/
│   ├── 007-recommender/
│   ├── 008-seo-content/
│   ├── 009-analytics-compliance/
│   └── 010-launch/
├── agents/
│   ├── ORQUESTADOR-GARAGE.md
│   ├── PRODUCTO-SDD.md
│   ├── WORDPRESS-COMMERCE.md
│   ├── AMAZON-AFILIACION.md
│   ├── CATALOGO-CONTENIDO.md
│   ├── UX-CONVERSION.md
│   ├── SEO-GEO.md
│   ├── LEGAL-CONFIANZA.md
│   ├── ANALITICA.md
│   ├── QA-VALIDACION.md
│   └── DEVOPS-SEGURIDAD.md
├── prompts/
│   ├── sdd/
│   ├── contenido/
│   └── auditoria/
├── theme/
│   └── cochecierto-garage-child/
├── plugins/
│   └── cochecierto-garage-core/
├── mu-plugins/
├── scripts/
├── tests/
└── .github/
    ├── ISSUE_TEMPLATE/
    ├── pull_request_template.md
    └── workflows/
```

### 8.4. Separación entre WordPress y código propio

- El tema hijo debe contener únicamente personalización visual y plantillas.
- La lógica de negocio propia debe vivir en un plugin propio.
- No modificar directamente el tema padre.
- No introducir lógica crítica mediante snippets dispersos.
- Documentar cada hook, shortcode, integración y tarea cron.
- Mantener los cambios de configuración reproducibles cuando sea posible.

---

## 9. Sistema SDD obligatorio

Se aplicará el flujo de Spec-Driven Development inspirado en `mouredev/hello-sdd` y adaptado al proyecto.

```text
Constitución
    ↓
Especificación
    ↓
Clarificación
    ↓
Plan
    ↓
Tareas
    ↓
Implementación
    ↓
Validación
    ↓
Cambio
```

### 9.1. Principio central

No se implementará una funcionalidad relevante a partir de una conversación ambigua, un prompt aislado o una idea no aprobada.

Primero se acuerda la especificación. Después se planifica. Finalmente se implementa y se valida.

### 9.2. Constitución del proyecto

`docs/constitution.md` debe contener los principios innegociables:

1. Separación técnica respecto a CocheCierto principal.
2. Afiliación transparente.
3. Recomendaciones útiles y explicables.
4. No afirmar datos no verificados.
5. Seguridad y privacidad por diseño.
6. Accesibilidad y experiencia móvil como requisitos base.
7. SEO técnico sin contenido artificial o duplicado.
8. Integraciones desacopladas mediante adaptadores.
9. Cambios trazables mediante GitHub.
10. Ninguna funcionalidad crítica sin validación.

### 9.3. Estructura de una spec

Cada iniciativa debe contener:

```text
specs/NNN-nombre/
├── spec.md
├── clarification.md
├── plan.md
├── tasks.md
├── validation.md
└── changelog.md
```

La `spec.md` debe incluir:

- Contexto.
- Problema.
- Objetivo.
- Usuarios afectados.
- Historias de usuario.
- Requisitos funcionales.
- Requisitos no funcionales.
- Casos límite.
- Fuera de alcance.
- Criterios de aceptación.
- Dudas abiertas.

### 9.4. Requisitos en notación EARS

Ejemplo:

```text
RF-001 — Cuando un usuario abra una ficha de producto, el sistema debe mostrar el nombre, imagen, utilidad, compatibilidad, limitaciones y botón de salida al proveedor.

RF-002 — Si el producto procede de una integración de afiliación, el sistema debe registrar el proveedor y mostrar la información legal correspondiente.

RF-003 — Cuando no exista información suficiente de compatibilidad, el sistema debe mostrar una advertencia y no presentar el producto como universal.
```

### 9.5. Clarificación

Antes de planificar, QA debe revisar:

- Ambigüedades.
- Dependencias ocultas.
- Riesgos legales.
- Riesgos de afiliación.
- Problemas de compatibilidad.
- Casos de producto eliminado.
- Productos sin precio.
- Productos sin imagen.
- Enlaces rotos.
- Datos obsoletos.
- Diferencias entre móvil y escritorio.

### 9.6. Implementación

- Implementar una tarea cada vez.
- No ampliar el alcance sin actualizar la spec.
- No mezclar refactorizaciones no relacionadas.
- Crear commits pequeños y descriptivos.
- Ejecutar validaciones después de cada bloque.
- Registrar pruebas no ejecutadas y su motivo.

### 9.7. Cambio

Si cambia una decisión:

1. Actualizar la spec.
2. Documentar el motivo.
3. Revisar impacto en plan y tareas.
4. Actualizar criterios de aceptación.
5. Implementar el cambio.
6. Repetir validación.

Nunca corregir primero el código y actualizar la documentación después.

---

## 10. Jerarquía de agentes y subagentes

### 10.1. Agente principal: `ORQUESTADOR-GARAGE`

Responsabilidades:

- Leer el contexto base y la spec activa.
- Coordinar agentes especializados.
- Evitar duplicidades.
- Mantener el alcance.
- Resolver dependencias.
- Exigir validación antes de cerrar una tarea.
- Mantener trazabilidad entre decisión, código y evidencia.

### 10.2. Agentes especializados

| Agente | Responsabilidad |
|---|---|
| `PRODUCTO-SDD` | Requisitos, historias, priorización y criterios de aceptación |
| `WORDPRESS-COMMERCE` | WordPress, tema, plugins, rendimiento y mantenimiento |
| `AMAZON-AFILIACION` | Integración, enlaces, catálogo, políticas y proveedores |
| `CATALOGO-CONTENIDO` | Categorías, fichas, guías, comparativas y redacción |
| `UX-CONVERSION` | Navegación, móvil, accesibilidad y conversión |
| `SEO-GEO` | SEO técnico, arquitectura, schema, búsqueda y contenido localizable |
| `LEGAL-CONFIANZA` | Afiliación, privacidad, cookies, transparencia y disclaimers |
| `ANALITICA` | Eventos, embudos, clics, rendimiento y KPIs |
| `QA-VALIDACION` | Pruebas funcionales, regresión, accesibilidad y aceptación |
| `DEVOPS-SEGURIDAD` | GitHub, staging, despliegue, backups y seguridad |

### 10.3. Regla de autoridad

El orquestador coordina, pero no puede aprobar unilateralmente aspectos críticos de otra especialidad.

- Legal valida cumplimiento.
- QA valida funcionamiento.
- UX valida interacción.
- SEO valida indexabilidad.
- DevOps valida despliegue y seguridad.
- Producto valida que la solución resuelva el problema real.

---

## 11. Integración de Amazon

### 11.1. Principio de desacoplamiento

Amazon será el primer adaptador, no la arquitectura completa.

La integración debe diseñarse conceptualmente así:

```text
Catálogo interno de Garage
        ↓
Adaptador de proveedor
        ↓
Amazon / futuros proveedores
```

Los productos deben tener un identificador interno independiente del ASIN o identificador del proveedor.

### 11.2. Datos mínimos del producto

- Identificador interno.
- Identificador del proveedor.
- Nombre.
- Categoría.
- Descripción editorial.
- Beneficio principal.
- Perfil de usuario recomendado.
- Compatibilidad.
- Limitaciones.
- Imagen autorizada.
- Precio, si está disponible y actualizado.
- Estado de disponibilidad, si está disponible.
- URL afiliada.
- Proveedor.
- Fecha de última sincronización.
- Estado editorial.
- Estado SEO.

### 11.3. Reglas de contenido afiliado

- No copiar descripciones sin revisión editorial.
- No publicar atributos que el proveedor no confirme.
- No mostrar precios manuales sin fecha y control de actualización.
- No utilizar imágenes sin autorización.
- No ocultar que el enlace puede generar comisión.
- No usar claims médicos, de seguridad o rendimiento sin fuente.
- No convertir una valoración editorial en una garantía.

### 11.4. Plugin de Amazon

Antes de seleccionar definitivamente el plugin, el equipo debe comprobar:

- Compatibilidad con la versión actual de WordPress.
- Compatibilidad con el tema elegido.
- Método actual de conexión con Amazon.
- Gestión de credenciales.
- Actualización de precios y disponibilidad.
- Gestión de enlaces geográficos.
- Carga de imágenes permitidas.
- Registro de clics.
- Compatibilidad con caché.
- Política de datos de Amazon.
- Exportación y recuperación de datos.
- Coste y licencia.
- Riesgo de dependencia del proveedor del plugin.

Si el plugin no ofrece una integración estable o compatible con las políticas vigentes, deberá documentarse una alternativa antes de continuar.

---

## 12. Diseño de la experiencia de tienda

### 12.1. Página de inicio

Debe comunicar en pocos segundos:

- Qué es CocheCierto Garage.
- Qué tipo de productos ofrece.
- Que las recomendaciones están seleccionadas.
- Que el usuario puede navegar por necesidades.
- Que la compra final se realiza en el proveedor.

Secciones recomendadas:

1. Hero con propuesta de valor.
2. Accesos por necesidad.
3. Productos destacados.
4. Guías útiles.
5. Comparativas.
6. Recomendador.
7. Transparencia de afiliación.
8. Enlace de regreso a CocheCierto.

### 12.2. Ficha de producto

Orden recomendado:

1. Nombre claro.
2. Imagen principal.
3. Problema que resuelve.
4. Para quién es.
5. Ventajas principales.
6. Limitaciones.
7. Compatibilidad.
8. Comparación con alternativas.
9. Información del proveedor.
10. Botón de consulta o compra.
11. Aviso de afiliación.
12. Preguntas frecuentes.
13. Productos relacionados.

### 12.3. Criterios UX

- Diseño mobile-first.
- Botones visibles y comprensibles.
- No usar ventanas invasivas al entrar.
- No ocultar información importante bajo demasiados desplegables.
- Mantener una jerarquía visual sencilla.
- Optimizar imágenes.
- Evitar sliders innecesarios.
- Facilitar volver a la categoría.
- Mostrar siempre el contexto de la recomendación.

---

## 13. SEO técnico y editorial

### 13.1. Arquitectura de URLs

Ejemplos:

```text
/categorias/seguridad-emergencia/
/categorias/mantenimiento/
/productos/arrancador-de-bateria-portatil/
/comparativas/mejores-compresores-portatiles/
/guias/que-llevar-en-el-coche/
```

### 13.2. Buenas prácticas

- URLs cortas, descriptivas y estables.
- Una URL canónica por producto.
- Redirecciones 301 si cambia una URL.
- Sitemap XML actualizado.
- Breadcrumbs.
- Enlaces internos contextuales.
- Páginas de categoría con texto útil.
- Evitar páginas vacías o casi idénticas.
- Controlar filtros que generen URLs infinitas.
- Revisar productos descatalogados.
- Optimizar Core Web Vitals.
- Usar datos estructurados cuando correspondan.

### 13.3. Contenido útil

Cada página debe responder una intención concreta. No se crearán artículos únicamente para introducir palabras clave.

Un contenido de calidad debe indicar:

- Qué problema resuelve.
- Para quién es.
- Qué debe comprobarse.
- Qué alternativas existen.
- Qué limitaciones tiene.
- Cuándo no conviene comprarlo.

### 13.4. Datos estructurados

Evaluar, según el contenido real:

- `Product`.
- `ItemList`.
- `BreadcrumbList`.
- `Article`.
- `FAQPage`, únicamente cuando las preguntas y respuestas estén visibles.
- `Organization`.

No se deben declarar datos estructurados que no estén visibles o que no puedan verificarse.

---

## 14. Legal, privacidad y confianza

Antes del lanzamiento deben revisarse con asesoría adecuada:

- Aviso legal.
- Política de privacidad.
- Política de cookies.
- Política de afiliación.
- Condiciones de uso.
- Identificación del responsable.
- Tratamiento de formularios.
- Consentimiento de cookies no necesarias.
- Enlaces a proveedores externos.
- Uso de imágenes y marcas.
- Reglas del programa de afiliación de Amazon.

La web debe informar claramente, en un lugar visible, que algunos enlaces pueden generar una comisión para CocheCierto Garage sin coste adicional para el usuario.

No debe afirmarse que CocheCierto Garage es Amazon ni que representa al proveedor.

---

## 15. Analítica y medición

### 15.1. Eventos mínimos

```text
page_view
category_viewed
product_viewed
guide_viewed
comparison_viewed
search_performed
recommendation_started
recommendation_completed
affiliate_link_clicked
external_redirect
newsletter_started
newsletter_completed
```

### 15.2. Datos que no deben enviarse

- Nombres completos sin necesidad.
- Correos en texto plano dentro de eventos.
- Datos de salud.
- Datos financieros.
- Identificadores innecesarios.
- Credenciales.

### 15.3. KPIs iniciales

- Usuarios por canal.
- Tasa de interacción con categorías.
- Búsquedas realizadas.
- Visualizaciones de ficha.
- Clics de afiliación.
- Ratio de clic por ficha.
- Guías que generan más clics.
- Categorías con mayor demanda.
- Productos sin interacción.
- Tiempo de carga.
- Errores de enlaces.

---

## 16. Roadmap de implementación

### Fase 0 — Preparación

- Confirmar dominio y marca.
- Crear repositorio.
- Crear carpeta local.
- Definir accesos.
- Crear constitución.
- Revisar repositorio base.
- Crear agentes y plantillas SDD.

### Fase 1 — Infraestructura

- Crear subdominio.
- Configurar hosting.
- Crear base de datos.
- Instalar SSL.
- Crear staging.
- Instalar WordPress.
- Configurar seguridad y backups.

### Fase 2 — Identidad y estructura

- Definir logotipo y sistema visual.
- Seleccionar tema.
- Crear tema hijo si procede.
- Crear navegación.
- Crear categorías iniciales.
- Preparar páginas legales.

### Fase 3 — Afiliación Amazon

- Seleccionar y auditar plugin.
- Configurar credenciales de forma segura.
- Crear adaptador o capa propia de integración.
- Importar productos de prueba.
- Validar imágenes, precios y disponibilidad.
- Probar enlaces y atribución.

### Fase 4 — Catálogo editorial

- Crear fichas piloto.
- Crear categorías.
- Crear comparativas.
- Crear guías.
- Implementar productos relacionados.
- Revisar contenido con criterios de confianza.

### Fase 5 — Recomendador

- Diseñar preguntas.
- Definir reglas iniciales.
- Mostrar resultados explicables.
- Medir abandono.
- Mantenerlo opcional y no invasivo.

### Fase 6 — SEO y analítica

- Configurar sitemap.
- Revisar indexación.
- Añadir schema válido.
- Configurar eventos.
- Crear panel de métricas.
- Validar Search Console.

### Fase 7 — QA y lanzamiento

- Validar móvil.
- Validar escritorio.
- Probar enlaces.
- Probar formularios.
- Revisar accesibilidad.
- Revisar rendimiento.
- Revisar legal.
- Ejecutar checklist de lanzamiento.

### Fase 8 — Evolución

- Añadir proveedores.
- Incorporar nuevas categorías.
- Mejorar recomendaciones.
- Automatizar actualización de catálogo.
- Crear perfiles de usuario si existe justificación.
- Evaluar marketplace solo después de validar demanda.

---

## 17. Criterios de aceptación del MVP

El MVP no se considerará terminado hasta que:

- `https://garage.cochecierto.com` cargue con HTTPS.
- La instalación sea independiente del sitio principal.
- El usuario pueda navegar por categorías.
- Existan fichas de producto funcionales.
- Los enlaces de afiliación funcionen.
- El proveedor se identifique correctamente.
- El aviso de afiliación sea visible.
- Las páginas sean utilizables en móvil.
- No existan enlaces rotos conocidos.
- El buscador funcione o se haya documentado su alcance.
- Las imágenes tengan texto alternativo.
- El sitemap esté disponible.
- Las páginas importantes tengan títulos y metadescripciones.
- Las copias de seguridad estén configuradas.
- Las credenciales no estén expuestas.
- Los eventos principales estén medidos.
- QA haya documentado las pruebas.
- Legal haya revisado el contenido publicado.
- El equipo pueda actualizar productos sin tocar código.

---

## 18. Flujo Git y revisión

### Ramas recomendadas

```text
main        Producción estable
develop     Integración de cambios aprobados
feature/*   Nueva funcionalidad
fix/*       Corrección
content/*   Cambios editoriales estructurados
hotfix/*    Incidencia urgente en producción
```

### Convención de commits

```text
feat: añade fichas de producto afiliado
fix: corrige redirección de enlaces Amazon
docs: actualiza guía de instalación
seo: mejora metadatos de categoría
test: añade pruebas de enlaces externos
chore: actualiza dependencia del tema
```

### Pull request obligatorio

Cada PR debe indicar:

- Qué problema resuelve.
- Qué spec implementa.
- Qué archivos modifica.
- Qué pruebas ejecuta.
- Qué pruebas no ejecuta.
- Riesgos conocidos.
- Capturas en móvil y escritorio cuando haya cambios visuales.
- Resultado de la revisión SEO, legal o QA si aplica.

---

## 19. Checklist de desarrollo

### Antes de programar

- [ ] Existe una spec aprobada.
- [ ] Se han leído las instrucciones del repositorio.
- [ ] Se han revisado dependencias.
- [ ] Se han definido criterios de aceptación.
- [ ] Se han identificado riesgos.

### Durante el desarrollo

- [ ] Se implementa una tarea cada vez.
- [ ] Se mantiene el alcance.
- [ ] Se documentan decisiones.
- [ ] Se evitan credenciales en el código.
- [ ] Se prueban casos normales y límites.

### Antes de cerrar

- [ ] QA ha revisado la funcionalidad.
- [ ] Se han probado móvil y escritorio.
- [ ] Se han comprobado enlaces externos.
- [ ] Se ha actualizado la documentación.
- [ ] Se han registrado pruebas y resultados.
- [ ] La PR está preparada.

---

## 20. Primeras tareas concretas

Crear estas iniciativas SDD en orden:

```text
001-foundation
002-hosting-wordpress
003-brand-shell
004-catalogue-model
005-amazon-plugin
006-product-page
007-category-navigation
008-search-and-filters
009-editorial-content
010-recommender-mvp
011-analytics-and-compliance
012-qa-and-launch
```

La primera tarea del equipo no es instalar plugins. Es crear la constitución, la estructura del repositorio, la spec de infraestructura y el plan de trabajo aprobado.

---

## 21. Instrucción maestra para el equipo

> Construid CocheCierto Garage como una plataforma WordPress independiente en `garage.cochecierto.com`, orientada a la recomendación y afiliación de productos para el automóvil. Utilizad el repositorio `inmobia360/coche.cierto` únicamente como fuente de contexto de marca, negocio, agentes y buenas prácticas. Mantened código, base de datos, configuración, credenciales, documentación operativa y despliegue separados. Aplicad el flujo SDD completo: Constitución → Spec → Clarificación → Plan → Tareas → Implementación → Validación → Cambio. No implementéis funcionalidades importantes sin una especificación aprobada. Amazon será el primer proveedor, pero la arquitectura debe permitir otros proveedores mediante adaptadores. La experiencia debe ser principalmente de tienda, catálogo, búsqueda, comparativas y guías; el recomendador será una función complementaria. Priorizad confianza, claridad, accesibilidad móvil, SEO útil, transparencia de afiliación, seguridad y trazabilidad.

---

## 22. Fuentes de referencia

- [Repositorio base CocheCierto](https://github.com/inmobia360/coche.cierto)
- [Repositorio Hello SDD de MoureDev](https://github.com/mouredev/hello-sdd)
- [Google Search Central](https://developers.google.com/search/docs)
- [Documentación oficial de WordPress](https://developer.wordpress.org/)
- [Programa de Afiliados de Amazon España](https://afiliados.amazon.es/)

La documentación de cada proveedor debe revisarse antes de implementar una integración concreta, porque sus requisitos técnicos, comerciales y legales pueden cambiar.
