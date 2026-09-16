# Análisis de microservicio

## Módulo

Dashboard de ocupación hospitalaria.

## Pregunta de diseño

¿Conviene separar inmediatamente el Dashboard de ocupación hospitalaria como un microservicio independiente?

## Situación actual

El módulo ya tiene separación interna entre:

- Presentation;
- Application;
- Domain;
- Persistence.

También utiliza BedRepository como contrato para desacoplar la lógica de negocio de la tecnología de persistencia.

Esto permite mantener una estructura modular sin necesidad de separar físicamente el sistema.

## Ventajas de una posible separación

Convertir el módulo en un microservicio podría ser útil si en el futuro existe una necesidad clara de:

- escalar las consultas de ocupación de forma independiente;
- permitir que varios sistemas externos consuman la misma API;
- desplegar el módulo con una frecuencia diferente al resto del sistema;
- aislar fallos de otros módulos;
- administrar recursos de forma independiente.

## Costos de separar demasiado pronto

Crear un microservicio independiente también introduce nuevas responsabilidades:

- comunicación por red entre servicios;
- autenticación entre componentes;
- manejo de errores de red;
- monitoreo independiente;
- despliegue separado;
- versionamiento de contratos;
- mayor complejidad de infraestructura;
- posibles problemas de consistencia entre servicios.

## Decisión propuesta

Para el alcance actual no se justifica separar el Dashboard de ocupación como microservicio independiente.

Se propone mantenerlo como un módulo del Sistema Hospitalario Integrado, pero exponer su caso de uso mediante una API REST clara.

Esto permite desacoplar al cliente sin introducir todavía la complejidad operativa de una arquitectura de microservicios.

## Frontera del módulo

El módulo se encarga de:

- consultar camas;
- filtrar por sala;
- filtrar por estado;
- calcular indicadores de ocupación;
- devolver un resumen general;
- devolver un resumen agrupado por sala.

El módulo no debe encargarse de:

- crear salas;
- eliminar salas;
- crear camas;
- eliminar camas;
- modificar datos clínicos;
- gestionar usuarios del sistema.

## Propiedad de datos

El Dashboard consume información relacionada con salas y camas.

No debe asumir propiedad exclusiva sobre esos datos.

Su responsabilidad principal es consolidar y presentar información para consulta.

## Criterios para una separación futura

Una separación como microservicio tendría sentido si se demuestra alguna condición medible, por ejemplo:

- aumento significativo de solicitudes al Dashboard;
- necesidad de escalar únicamente este módulo;
- integración con múltiples aplicaciones externas;
- requerimiento de disponibilidad independiente;
- despliegues frecuentes que no dependan del resto del HIS.

## Conclusión

Para esta etapa se recomienda mantener una arquitectura modular con API REST.

La separación como microservicio queda como una posibilidad futura, pero no se adopta sin una justificación técnica y medible.
