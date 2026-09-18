# User flow — Usuario hospitalario autorizado

## Objetivo
Consultar el estado de ocupación hospitalaria por sala y estado de cama, obtener indicadores consolidados y conocer la vigencia y procedencia de la información.

## Precondiciones
- El usuario ya se encuentra autenticado.
- El backend determina si tiene permisos para consultar el Dashboard.
- La interfaz no duplica reglas de autorización.

## Flujo principal
1. El usuario ingresa al Dashboard.
2. El sistema muestra filtros de sala y estado de cama.
3. El usuario decide si consulta toda la ocupación o aplica filtros.
4. El usuario selecciona sala, estado o ambos.
5. Presiona **Consultar**.
6. La interfaz muestra estado de carga y evita envíos repetidos.
7. El cliente solicita la información al servicio.
8. El sistema evalúa el resultado.

### Éxito
9. Se muestran total, ocupadas, disponibles, mantenimiento y porcentaje de ocupación.
10. Se muestra el detalle agrupado por sala.
11. Se confirma: **Datos actualizados correctamente**.
12. Se muestra fecha/hora de actualización y procedencia de datos.
13. El usuario puede cambiar filtros y consultar nuevamente.

### Vacío
9. Se informa: **No se encontraron camas con los filtros seleccionados**.
10. Se mantienen visibles los filtros aplicados.
11. Se ofrecen las acciones limpiar filtros o modificarlos.

### Error
9. Se informa: **No fue posible consultar la ocupación**.
10. No se exponen detalles técnicos.
11. Se ofrece **Reintentar** y también cambiar filtros.

## Ayuda contextual
La ayuda explica OCCUPIED, AVAILABLE, MAINTENANCE, porcentaje de ocupación y procedencia de la información sin sacar al usuario del flujo.

## Protección de datos
El Dashboard utiliza información agregada y no requiere nombre del paciente, diagnóstico ni expediente clínico.

## Confirmación
Como la consulta es de solo lectura, la confirmación se muestra después de una consulta exitosa, no antes.
