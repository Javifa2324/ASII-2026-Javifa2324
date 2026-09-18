# Validaciones y mensajes

## Validaciones
### Sala
- Opcional.
- Si no existe selección, se consulta el conjunto permitido para el usuario.
- La interfaz no inventa salas que no provengan del sistema.

### Estado
Valores permitidos:
- OCCUPIED
- AVAILABLE
- MAINTENANCE

### Permisos
Los permisos se verifican en el servidor.

## Mensajes
### Inicio
**Seleccione los filtros que desea utilizar y presione Consultar.**

### Carga
**Consultando ocupación...**

### Éxito
**Datos actualizados correctamente.**

### Vacío
**No se encontraron camas con los filtros seleccionados.**

Texto de apoyo: **Cambie los filtros o límpielos para realizar una nueva consulta.**

### Error general
**No fue posible consultar la ocupación. Intente nuevamente.**

### Error de validación
**El estado seleccionado no es válido. Revise el filtro e intente nuevamente.**

### Sin autorización
**No tiene permisos para consultar esta información.**

### Ayuda — OCCUPIED
**Cama actualmente ocupada.**

### Ayuda — AVAILABLE
**Cama disponible para asignación según el estado registrado.**

### Ayuda — MAINTENANCE
**Cama temporalmente fuera de disponibilidad por mantenimiento.**

### Ayuda — porcentaje
**Relación entre camas ocupadas y el total considerado en la consulta.**

## Mensajes que no deben mostrarse
- stack traces;
- mensajes SQL;
- nombres de tablas;
- credenciales;
- rutas internas;
- excepciones sin tratamiento;
- detalles técnicos de conexión.
