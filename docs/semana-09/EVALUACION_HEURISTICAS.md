# Evaluación con heurísticas de usabilidad

## H1 — Visibilidad del estado del sistema
**Resultado:** Cumple parcialmente.

Fortalezas:
- Existe estado de carga.
- Existe confirmación de éxito.
- Existe estado vacío.
- Existe error con recuperación.
- Se muestra actualización y procedencia.

Pendiente:
- Asegurar que los mensajes dinámicos también sean accesibles para tecnologías de asistencia.

## H2 — Correspondencia entre sistema y mundo real
**Resultado:** Requiere ajuste.

Hallazgo:
- `OCCUPIED`, `AVAILABLE` y `MAINTENANCE` son útiles como códigos internos, pero no son el lenguaje más natural para el usuario hispanohablante.

Propuesta:
- Ocupada, Disponible y Mantenimiento.

## H3 — Control y libertad del usuario
**Resultado:** Cumple.

Evidencia:
- Puede limpiar filtros.
- Puede cambiar filtros.
- Puede reintentar después de un error.
- La consulta es de solo lectura.

## H4 — Consistencia y estándares
**Resultado:** Cumple parcialmente.

Fortaleza:
- La Semana 08 exige mantener filtros y nombres entre estados.

Pendiente:
- Definir patrones consistentes de foco y semántica de controles.

## H5 — Prevención de errores
**Resultado:** Cumple parcialmente.

Fortalezas:
- Catálogo cerrado de estados.
- Se evita envío repetido durante carga.

Pendiente:
- Verificar en implementación que los controles realmente limiten valores inválidos y no acepten estados fuera del catálogo.

## H6 — Reconocimiento antes que recuerdo
**Resultado:** Cumple parcialmente.

Fortalezas:
- Filtros visibles.
- Ayuda contextual disponible.

Pendiente:
- Sustituir códigos técnicos por etiquetas comprensibles.

## H7 — Flexibilidad y eficiencia de uso
**Resultado:** Pendiente.

La navegación solo por teclado no está especificada en los wireframes.

## H8 — Diseño estético y minimalista
**Resultado:** Cumple en el diseño de baja fidelidad.

La información visible se limita a ocupación, indicadores, filtros y mensajes necesarios. No se muestran datos clínicos.

## H9 — Reconocer, diagnosticar y recuperarse de errores
**Resultado:** Cumple.

El mensaje de error evita información técnica y ofrece Reintentar o cambiar filtros.

## H10 — Ayuda y documentación
**Resultado:** Cumple parcialmente.

Existe ayuda contextual sobre estados, porcentaje y procedencia, pero falta definir su interacción accesible por teclado y gestión de foco.
