# Reglas de interacción

## Entrada al Dashboard
- El título del módulo debe ser visible.
- Los filtros principales deben estar disponibles sin navegación adicional.
- La interfaz debe indicar que se trata de información agregada de ocupación.

## Filtro de sala
- Es opcional.
- Sin selección se consultan todas las salas permitidas para el usuario.
- El valor seleccionado permanece visible después de consultar.

## Filtro de estado
- Es opcional.
- Opción inicial: **Todos los estados**.
- Valores permitidos: OCCUPIED, AVAILABLE y MAINTENANCE.
- La interfaz no permite valores fuera del catálogo.

## Consultar
- Es la acción principal.
- Al activarla se muestra carga.
- Mientras la solicitud está en curso se evita el envío repetido.

## Limpiar filtros
- Restablece sala y estado.
- No modifica información del sistema.
- No requiere confirmación.

## Estado de carga
- Mantener visibles los filtros elegidos.
- Mostrar **Consultando ocupación...**.
- No mostrar datos anteriores como si fueran actuales.

## Éxito
Mostrar:
- total;
- ocupadas;
- disponibles;
- mantenimiento;
- porcentaje de ocupación;
- detalle por sala;
- fecha/hora de actualización;
- procedencia de datos.

Confirmación: **Datos actualizados correctamente**.

## Vacío
Mensaje: **No se encontraron camas con los filtros seleccionados.**

Acciones: limpiar filtros, modificar filtros y volver a consultar.

## Error
Mensaje: **No fue posible consultar la ocupación. Intente nuevamente.**

Acciones: Reintentar y Cambiar filtros.

No mostrar SQL, trazas, nombres internos de servidores ni excepciones sin tratamiento.

## Ayuda contextual
Debe explicar estados, porcentaje de ocupación y procedencia de datos sin obligar al usuario a abandonar el flujo.

## Actualización
Cada respuesta exitosa debe mostrar fecha/hora visible al usuario.

## Procedencia
Mostrar una referencia comprensible, por ejemplo: **Fuente: Sistema Hospitalario Integrado — registro de camas**.

## Protección de datos
- Mostrar únicamente información necesaria para ocupación.
- No mostrar datos identificables de pacientes.
- Validar permisos en backend.
- Ocultar un elemento en UI no equivale a autorización.

## Consistencia
Mantener nombres, ubicación de filtros y significado de acciones entre carga, éxito, vacío y error.
