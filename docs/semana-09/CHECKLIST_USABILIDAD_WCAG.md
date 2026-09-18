# Checklist de usabilidad y accesibilidad

Leyenda:

- ✅ Cumple en el diseño/documentación revisada.
- ⚠️ Parcial o no especificado; requiere corrección o validación.
- ⏳ Solo puede verificarse con una implementación funcional.

| Área | Criterio revisado | Referencia | Estado | Observación |
|---|---|---|---|---|
| Estado del sistema | El usuario recibe retroalimentación de carga | Nielsen H1 | ✅ | Se define el mensaje “Consultando ocupación...” |
| Estado del sistema | Éxito, vacío y error se distinguen claramente | Nielsen H1 / H9 | ✅ | Existen wireframes separados para cada estado |
| Teclado | Todas las acciones pueden operarse sin mouse | WCAG 2.1.1 | ⚠️ | El wireframe no especifica comportamiento por teclado |
| Orden de foco | El recorrido de foco sigue un orden lógico | WCAG 2.4.3 | ⚠️ | No se documenta orden de tabulación |
| Foco visible | Todo control enfocado muestra un indicador visible | WCAG 2.4.7 | ⚠️ | No se define un estado visual de foco |
| Foco no oculto | El foco no queda cubierto por paneles o ayuda | WCAG 2.4.11 | ⚠️ | Debe verificarse al abrir ayuda contextual |
| Contraste texto | Texto y controles alcanzan contraste suficiente | WCAG 1.4.3 | ⚠️ | El wireframe no define paleta final ni medición |
| Contraste no textual | Bordes, foco y controles son distinguibles | WCAG 1.4.11 | ⚠️ | Falta especificación de contraste de controles/foco |
| Etiquetas | Sala y estado poseen etiquetas claras | WCAG 2.4.6 / 3.3.2 | ✅ | Visualmente se identifican “Sala” y “Estado” |
| Etiquetas programáticas | Los nombres visuales están asociados al control | WCAG 1.3.1 / 4.1.2 | ⏳ | Solo puede verificarse en HTML/implementación |
| Mensajes | Carga, éxito, vacío y error son comprensibles | Nielsen H1 / H9 | ✅ | Los textos están definidos en Semana 08 |
| Mensajes accesibles | Los cambios de estado se anuncian sin mover foco | WCAG 4.1.3 | ⚠️ | No se especifican regiones de estado accesibles |
| Prevención de error | Se evita enviar múltiples consultas durante carga | Nielsen H5 | ✅ | Regla definida en Semana 08 |
| Recuperación | Error ofrece Reintentar y cambiar filtros | Nielsen H3 / H9 | ✅ | Acción de recuperación explícita |
| Lenguaje | Los términos corresponden al lenguaje del usuario | Nielsen H2 | ⚠️ | Los códigos OCCUPIED/AVAILABLE pueden requerir etiqueta en español |
| Tabla/resultados | La estructura de sala e indicadores es comprensible | WCAG 1.3.1 | ⚠️ | Deben definirse encabezados semánticos en implementación |
| Ayuda | Existe ayuda contextual dentro del flujo | Nielsen H10 | ✅ | Wireframe 06 |
| Ayuda por teclado | Ayuda se abre, recorre y cierra con teclado | WCAG 2.1.1 / 2.4.3 | ⚠️ | No se documenta gestión de foco |
| Actualización | Se informa fecha/hora de actualización | Nielsen H1 | ✅ | Incluida en resultado exitoso |
| Procedencia | Se informa la fuente de los datos | Nielsen H1 / H6 | ✅ | Incluida en resultado y ayuda |
| Protección de datos | El Dashboard evita datos identificables de pacientes | Principio de minimización del flujo | ✅ | Semana 08 define información agregada |
