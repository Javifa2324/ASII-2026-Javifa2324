# Backlog priorizado de correcciones

| ID | Prioridad | Hallazgo | Corrección propuesta | Criterio verificable | Impacto principal |
|---|---|---|---|---|---|
| H01 | P1 | Navegación por teclado no especificada | Usar controles nativos y definir recorrido completo | Completar consulta, limpiar, ayuda y reintento usando solo teclado | Sala, estado, consulta |
| H02 | P1 | Foco visible no definido | Incorporar estilo de foco consistente | Todos los controles muestran foco visible al tabular | Flujo completo |
| H03 | P1 | Etiquetas programáticas no verificadas | Asociar etiquetas/nombres accesibles a sala y estado | Lector de pantalla anuncia nombre, rol y valor del control | Sala, estado |
| H04 | P1 | Mensajes dinámicos no anunciados | Implementar mecanismo accesible para mensajes de estado | Lector anuncia carga, éxito, vacío y error automáticamente | Actualización, mensajes |
| H05 | P2 | Contraste no medido | Definir paleta y verificar ratios | Texto y controles alcanzan ratios WCAG aplicables | Indicadores, mensajes, fuente |
| H06 | P2 | Estados en códigos técnicos | Mostrar Ocupada/Disponible/Mantenimiento | Usuario interpreta estados sin conocer códigos internos | Estados de cama |
| H07 | P2 | Semántica de resultados no especificada | Implementar tabla con encabezados y relaciones semánticas | Lector anuncia valor con columna y sala | Salas, indicadores |
| H08 | P2 | Foco de ayuda no especificado | Definir apertura, recorrido, cierre y retorno de foco | Ayuda completa operable solo con teclado | Ayuda, procedencia |

## Orden sugerido de ejecución

1. H01 — Teclado.
2. H02 — Foco visible.
3. H03 — Etiquetas programáticas.
4. H04 — Mensajes dinámicos.
5. H05 — Contraste.
6. H06 — Lenguaje de estados.
7. H07 — Semántica de resultados.
8. H08 — Gestión de foco en ayuda.

## Definición de terminado

Una corrección puede marcarse como terminada cuando:

- el criterio verificable indicado se cumple;
- no rompe los estados de carga, éxito, vacío o error;
- mantiene los filtros de sala y estado;
- no elimina fecha de actualización ni procedencia de datos;
- puede repetirse la prueba y obtener el mismo resultado.
