# Hallazgos de usabilidad y accesibilidad

Se documentan 8 hallazgos. Los hallazgos se basan en los wireframes y reglas de la Semana 08; cuando un aspecto depende de código, se registra como especificación faltante y no como fallo ya comprobado.

---

## H01 — Navegación completa por teclado no especificada

**Prioridad:** P1
**Impacto:** filtros de sala/estado, Consultar, Limpiar filtros, Reintentar y Ayuda.
**Referencia:** WCAG 2.1.1 Keyboard; Nielsen H7 Flexibilidad y eficiencia.

### Evidencia
Los wireframes muestran controles interactivos, pero no documentan teclas, orden de tabulación ni activación por Enter/Espacio.

### Riesgo
Un usuario que no utilice mouse podría no completar la consulta de ocupación.

### Corrección propuesta
Definir todos los controles como elementos nativos operables por teclado y documentar un recorrido lógico.

### Criterio verificable
Usando únicamente teclado se puede:
1. seleccionar sala;
2. seleccionar estado;
3. ejecutar Consultar;
4. limpiar filtros;
5. abrir/cerrar Ayuda;
6. reintentar tras un error;
sin quedar atrapado.

---

## H02 — Estado de foco visible no definido

**Prioridad:** P1
**Impacto:** todo el flujo de consulta.
**Referencia:** WCAG 2.4.7 Focus Visible y 1.4.11 Non-text Contrast.

### Evidencia
Ninguno de los wireframes incluye una variante visual de foco para filtros, botones o enlace de ayuda.

### Riesgo
Un usuario de teclado puede perder la ubicación actual dentro de la interfaz.

### Corrección propuesta
Añadir un estilo de foco consistente y claramente visible a todos los elementos interactivos.

### Criterio verificable
Cada componente interactivo muestra una señal visual persistente al recibir foco y puede identificarse sin depender del color del contenido.

---

## H03 — Asociación programática de etiquetas no especificada

**Prioridad:** P1
**Impacto:** selección de sala y estado de cama.
**Referencia:** WCAG 1.3.1 Info and Relationships, 3.3.2 Labels or Instructions y 4.1.2 Name, Role, Value.

### Evidencia
Los wireframes presentan “Sala” y “Estado” visualmente, pero un SVG no demuestra que exista asociación programática con el control real.

### Riesgo
Lectores de pantalla podrían anunciar un selector sin nombre o sin relación clara con su propósito.

### Corrección propuesta
Usar etiquetas HTML asociadas al control y nombres accesibles equivalentes al texto visible.

### Criterio verificable
Un lector de pantalla anuncia “Sala” y “Estado de cama” al enfocar cada control, junto con su valor actual.

---

## H04 — Mensajes dinámicos sin mecanismo accesible especificado

**Prioridad:** P1
**Impacto:** carga, éxito, vacío, error y actualización.
**Referencia:** WCAG 4.1.3 Status Messages; Nielsen H1 Visibilidad del estado del sistema.

### Evidencia
La Semana 08 define mensajes como “Consultando ocupación...” y “Datos actualizados correctamente”, pero no indica cómo serán anunciados a tecnologías de asistencia.

### Riesgo
El usuario puede ejecutar una consulta y no enterarse de que cargó, terminó, quedó vacía o falló.

### Corrección propuesta
Implementar regiones de estado apropiadas para mensajes dinámicos, evitando mover el foco de forma innecesaria.

### Criterio verificable
Con lector de pantalla, carga, éxito, vacío y error se anuncian automáticamente después de la acción correspondiente.

---

## H05 — Contraste final no medido

**Prioridad:** P2
**Impacto:** filtros, indicadores, mensajes, actualización y procedencia.
**Referencia:** WCAG 1.4.3 Contrast (Minimum) y 1.4.11 Non-text Contrast.

### Evidencia
Los wireframes son de baja fidelidad y no establecen una paleta final ni resultados de medición de contraste.

### Riesgo
Textos secundarios, bordes o estados pueden resultar difíciles de distinguir con baja visión.

### Corrección propuesta
Definir una paleta final y medir contraste de texto, controles, bordes significativos y foco.

### Criterio verificable
- Texto normal: contraste mínimo 4.5:1.
- Texto grande: contraste mínimo 3:1.
- Componentes/estados visuales relevantes: contraste mínimo 3:1 cuando aplique WCAG 1.4.11.

---

## H06 — Códigos de estado técnicos expuestos al usuario

**Prioridad:** P2
**Impacto:** interpretación de estado de cama.
**Referencia:** Nielsen H2 Correspondencia entre el sistema y el mundo real; H6 Reconocimiento antes que recuerdo.

### Evidencia
La documentación usa los valores `OCCUPIED`, `AVAILABLE` y `MAINTENANCE`.

### Riesgo
Un usuario hispanohablante puede necesitar traducir o recordar códigos internos.

### Corrección propuesta
Mostrar etiquetas orientadas al usuario:
- Ocupada;
- Disponible;
- Mantenimiento;
manteniendo los códigos internos solo en la integración.

### Criterio verificable
La interfaz visible no requiere conocer códigos técnicos para interpretar el estado de una cama.

---

## H07 — Semántica de la tabla de resultados no especificada

**Prioridad:** P2
**Impacto:** salas, indicadores y porcentaje de ocupación.
**Referencia:** WCAG 1.3.1 Info and Relationships.

### Evidencia
El wireframe de éxito presenta columnas para sala, total, ocupadas, disponibles, mantenimiento y porcentaje, pero no puede demostrar encabezados semánticos ni asociación entre filas y columnas.

### Riesgo
Un lector de pantalla puede perder el contexto al recorrer valores numéricos.

### Corrección propuesta
Implementar tabla semántica con caption o título contextual, encabezados de columna y asociación correcta de celdas.

### Criterio verificable
Al recorrer la tabla con lector de pantalla, cada valor se anuncia con su encabezado correspondiente y la sala asociada.

---

## H08 — Gestión de foco de la ayuda contextual no especificada

**Prioridad:** P2
**Impacto:** ayuda sobre estados, porcentaje y procedencia de datos.
**Referencia:** WCAG 2.1.1 Keyboard, 2.4.3 Focus Order y 2.4.11 Focus Not Obscured.

### Evidencia
El wireframe 06 muestra un panel de ayuda, pero no define qué ocurre con el foco al abrirlo o cerrarlo.

### Riesgo
El foco podría permanecer detrás del panel, quedar oculto o no regresar al control que abrió la ayuda.

### Corrección propuesta
Definir comportamiento accesible del panel: apertura por teclado, foco inicial predecible, recorrido lógico, cierre con teclado y retorno al disparador.

### Criterio verificable
Al abrir Ayuda mediante teclado, el usuario puede recorrerla y cerrarla; al cerrar, el foco regresa al control “Ayuda”.
