# Base de conocimiento del proyecto CocheCierto

## 1. Identidad del proyecto

**CocheCierto** es una plataforma independiente de orientación para personas que necesitan comprar, comparar o valorar un coche.

Principios de marca:

> No vendemos coches. No elegimos por ti. Te ayudamos a decidir con datos.

> Decide con datos. Compra con seguridad.

El tono debe ser claro, prudente, cercano, protector y accionable. La plataforma debe distinguir entre datos confirmados, estimaciones, supuestos y datos pendientes.

## 2. Producto principal

CocheCierto genera una orientación personalizada y un informe PDF a partir de las respuestas del usuario.

Arquitectura recomendada:

```text
Formulario de baja fricción
→ Motor determinista y reglas
→ JSON estructurado
→ LLM para interpretar y redactar
→ Validación
→ Informe web/HTML/Markdown/PDF
```

Si falla el LLM, el sistema debe utilizar plantillas estáticas y conservar la funcionalidad básica.

El informe debe funcionar como guía de acompañamiento a la compra, no solo como una valoración numérica.

## 3. Personajes de marca

### Ciro

Ciro es el comunicador externo y editorial.

Funciones:

- Explicar CocheCierto en redes sociales.
- Crear vídeos cortos.
- Presentar consejos prácticos.
- Explicar errores frecuentes.
- Acompañar campañas de contenidos.

Características:

- Hombre adulto.
- Humano estilizado en 2.5D.
- Cercano, didáctico y expresivo.
- Vestimenta informal-profesional.
- Camisa overshirt azul marino.
- Camiseta blanca.
- Pantalón beige.
- Zapatillas blancas.
- Pelo castaño oscuro y barba corta.
- No debe parecer vendedor, mecánico, influencer agresivo ni robot.

### Clara

Clara es la guía interna de la plataforma.

Funciones:

- Dar la bienvenida.
- Acompañar el onboarding.
- Explicar cada paso.
- Resolver bloqueos.
- Ayudar a interpretar el informe.
- Recomendar el siguiente paso.

Características:

- Mujer adulta.
- Humana estilizada en 2.5D.
- Serena, empática y profesional.
- No debe parecer comercial ni asistente tecnológica fría.

Principio de relación:

> Ciro explica hacia fuera. Clara acompaña dentro.

Debe existir una biblioteca de assets independientes de ambos personajes, siempre derivados de una imagen maestra para evitar variaciones de rostro, ropa, proporciones y estilo.

Assets previstos:

- Rostro para botón flotante.
- Bienvenida.
- Explicación.
- Escucha.
- Recomendación.
- Checklist.
- Acompañamiento del resultado.
- Formato vertical.
- Formato horizontal.

## 4. Flujo de validación y entrega del informe

El usuario completa la valoración y recibe un correo transaccional.

Flujo:

```text
Formulario completado
→ Informe generado
→ Email pendiente de validación
→ Correo con enlace seguro
→ Usuario valida email
→ Página de confirmación
→ Descarga segura del PDF
→ Opinión opcional
```

La validación del correo es necesaria para proteger el acceso al informe. La opinión nunca debe bloquear la descarga.

Estados mínimos:

```text
report_created
email_pending
email_verified
pdf_available
pdf_downloaded
feedback_submitted
link_expired
email_send_failed
```

Reglas:

- Token seguro almacenado como hash.
- Enlace con caducidad.
- PDF en almacenamiento privado.
- URL de descarga temporal y firmada.
- No incluir emails, VIN, matrícula o datos del vehículo en la URL.
- Reenvío limitado y auditado.
- No enviar contraseñas por correo.
- No indexar resultados ni PDFs privados.

## 5. Opiniones y CRM

La sección recomendada del CRM se llama:

> Voz del usuario

Debe permitir saber:

- Quién llegó.
- Qué informe recibió.
- Si validó el email.
- Si descargó el PDF.
- Qué opinó.
- Qué problema encontró.
- Si se abrió una incidencia.

Valoraciones iniciales:

```text
Muy útil
Útil
Necesita mejorar
```

Crear también una subsección:

> Necesidades y recomendaciones

Para registrar puntos de dolor, frecuencia, prioridad, contenido recomendado y estado de resolución.

## 6. Newsletter y fidelización

Nombre editorial recomendado:

> CocheCierto al día

Promesa:

> Consejos claros para comprar, comparar y mantener tu coche con más seguridad.

Debe separarse la comunicación transaccional de la newsletter editorial.

La suscripción debe ser voluntaria, mediante casilla no premarcada:

```text
Quiero recibir semanalmente consejos prácticos sobre compra, uso y mantenimiento del coche. Puedo darme de baja cuando quiera.
```

La newsletter debe:

- Resolver una duda concreta.
- Incluir una acción útil.
- Usar puntos de dolor reales del CRM.
- Personalizarse por segmentos.
- Permitir cambiar preferencias, pausar y darse de baja.
- Incluir ocasionalmente compartir CocheCierto.

Segmentos iniciales:

- Comprador en fase de orientación.
- Comprador de ocasión.
- Comprador de coche nuevo.
- Usuario con presupuesto limitado.
- Usuario que compara ofertas.
- Usuario que todavía no está preparado para comprar.

## 7. Plataforma de afiliación

Se planteó crear una plataforma separada para recomendaciones de productos relacionados con el coche.

Nombre de marca recomendado:

> CocheCierto a Punto

Descriptor:

> Recomendaciones útiles para cuidar, preparar y disfrutar tu coche.

Subdominio recomendado:

> `apunto.cochecierto.com`

El nombre inicial `chojo.cierto.com` queda como opción provisional pendiente de confirmar.

## 8. CocheCierto a Punto

Debe ser una guía editorial de afiliación, no una tienda tradicional.

No necesita inicialmente:

- Carrito propio.
- Checkout propio.
- Gestión de stock.
- Gestión de envíos.
- Gestión de devoluciones.

El proveedor gestiona la compra. CocheCierto a Punto selecciona, explica, organiza y deriva al proveedor.

Categorías previstas:

- Primeras 72 horas.
- Primeros 30 días.
- Primer año.
- Seguridad y emergencia.
- Mantenimiento.
- Confort y organización.
- Viajes.
- Familias y padres primerizos.
- Mascotas.
- Invierno y verano.
- Coche de segunda mano.
- Caprichos y personalización.

Cada recomendación se clasifica como:

```text
Necesario
Recomendable
Opcional
Capricho
```

Asistente previsto:

> ¿Qué necesitas?

Con un máximo de cinco preguntas sobre momento de compra, uso, niños, mascotas, necesidad y presupuesto.

Debe mostrar entre 3 y 7 recomendaciones relevantes, explicando por qué aparecen.

## 9. Amazon y proveedores

Primera etapa:

- Amazon Afiliados España.
- Enlaces afiliados creados correctamente.
- Selección manual de productos.
- Registro de ASIN, categoría y fecha de revisión.
- Analítica de clics.
- Transparencia visible.

No construir una nueva integración sobre PA-API 5 sin revisar su estado. Preparar una arquitectura de adaptadores para Amazon Creators API y futuros proveedores.

Adaptadores:

```text
ProviderAdapter
├── AmazonCreatorsAdapter
├── ManualAffiliateAdapter
└── FutureProviderAdapter
```

## 10. Transparencia y cumplimiento

La plataforma debe explicar claramente que algunos enlaces son de afiliación:

> Algunos enlaces pueden ser enlaces de afiliado. Si compras a través de ellos, CocheCierto puede recibir una comisión sin coste adicional para ti. Las recomendaciones se seleccionan por su utilidad y adecuación al caso, no únicamente por la comisión.

Crear una página permanente:

```text
/transparencia-afiliados/
```

La newsletter necesita consentimiento separado de la entrega del informe y debe incluir baja visible.

## 11. Principios UX y conversión

- Baja fricción.
- Una acción principal por pantalla.
- Explicar antes de pedir datos.
- No forzar el uso de avatares.
- No reproducir audio automáticamente.
- Mostrar primero la utilidad.
- No saturar con productos.
- No utilizar urgencia artificial.
- Permitir la opción “todavía no comprar”.
- Diseñar primero para móvil.
- Distinguir hechos, estimaciones y recomendaciones.

## 12. Analítica prioritaria

Eventos CocheCierto:

```text
valuation_created
email_sent
email_verified
pdf_downloaded
feedback_submitted
```

Eventos newsletter:

```text
newsletter_consent_given
newsletter_confirmed
newsletter_clicked
newsletter_unsubscribed
```

Eventos afiliación:

```text
chojo_visit
assistant_started
assistant_completed
recommendation_viewed
affiliate_link_clicked
referral_shared
referral_converted
```

## 13. Decisiones pendientes

- Confirmar nombre definitivo de la plataforma afiliada.
- Confirmar si el dominio será `apunto.cochecierto.com` u otro.
- Revisar plan actual de Hostinger.
- Confirmar si se usará WordPress independiente.
- Revisar plugin o plantilla de Amazon disponible en Hostinger.
- Confirmar proveedor de email.
- Definir duración de enlaces privados.
- Definir categorías iniciales del MVP.
- Validar textos legales.
- Revisar disponibilidad de nombres, dominios y marcas.

## 14. Principio general del proyecto

CocheCierto debe ayudar a decidir mejor, no empujar a comprar más.

La plataforma de afiliación debe aplicar el mismo criterio:

> Primero entiende la necesidad. Después conoce las opciones. Finalmente decide dónde comprar.

