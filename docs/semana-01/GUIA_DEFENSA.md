# Guía para la defensa oral

## Módulo asignado
Dashboard de ocupación hospitalaria.

## Proceso modelado
Consolidación y consulta de ocupación por sala y estado de cama.

## Objetivo
Representar cómo un usuario hospitalario autorizado puede consultar la
ocupación de las diferentes salas del hospital y conocer el estado de las camas.

## Actor principal
Usuario hospitalario autorizado.

## ¿Qué representa cada diagrama?

### Diagrama de casos de uso
Muestra las funciones que puede realizar el usuario, como consultar la
ocupación hospitalaria, visualizar la ocupación por sala y aplicar filtros
por sala o estado de cama.

### Diagrama de actividad
Muestra el flujo del proceso desde que el usuario abre el dashboard hasta
que obtiene los resultados. También incluye decisiones y excepciones como
acceso no autorizado, ausencia de datos y errores de consulta.

### Diagrama de secuencia
Muestra la comunicación entre el usuario, la interfaz Vue 3, la API Laravel,
el middleware de seguridad, el servicio de ocupación y la base de datos.

## Decisiones importantes

- Validar que el usuario esté autenticado y autorizado.
- Verificar que existan datos de ocupación.
- Controlar errores durante la consulta.
- Permitir aplicar filtros por sala o estado de cama.

## Excepciones principales

- Usuario sin autenticación válida.
- Usuario sin permisos suficientes.
- No existen datos de ocupación.
- Error al consultar la base de datos.
- Filtro sin resultados.

## Trazabilidad

Los tres diagramas describen el mismo proceso desde perspectivas diferentes:

- Casos de uso: qué puede hacer el usuario.
- Actividad: cómo se desarrolla el proceso.
- Secuencia: cómo se comunican los componentes del sistema.

## Posibles modificaciones durante la defensa

Si se solicita realizar un cambio, puedo agregar un nuevo filtro, un nuevo
estado de cama o modificar alguna validación, manteniendo la coherencia entre
los tres diagramas.
