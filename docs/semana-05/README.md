# Semana 05 — Cliente-servidor, API REST, microservicios e integración

## Módulo

Dashboard de ocupación hospitalaria.

## Flujo trabajado

Consolidación y consulta de ocupación por sala y estado de cama.

## Objetivo

Diseñar la evolución del Micro-HIS actual hacia una arquitectura
cliente-servidor mediante una API REST, manteniendo las responsabilidades
existentes de las capas Presentation, Application, Domain y Persistence.

La propuesta separa la interfaz visual del servicio que proporciona los datos
de ocupación hospitalaria.

## Situación actual

El Micro-HIS actual:

- recibe los filtros `room` y `status`;
- utiliza `OccupancyController`;
- ejecuta `OccupancyService`;
- consulta mediante `BedRepository`;
- utiliza `PdoBedRepository` para persistencia;
- calcula los indicadores mediante `OccupancyCalculator`;
- genera directamente una página HTML.

## Propuesta de Semana 5

Se propone exponer el caso de uso mediante una API REST:

GET /api/v1/occupancy

El cliente web consumiría la API y recibiría la información en formato JSON.

## Estados de cama existentes

El dominio actual reconoce:

- OCCUPIED
- AVAILABLE
- MAINTENANCE

## Contenido de la entrega

- Contrato de API REST.
- Diseño cliente-servidor.
- Análisis de responsabilidades.
- Propiedad de datos.
- Seguridad.
- Resiliencia.
- Observabilidad.
- Consistencia.
- Análisis de una posible separación como microservicio.
- Plan de migración.
- Diagramas arquitectónicos.
- Plan Git.

## Alcance

La Semana 5 presenta un diseño y prototipo arquitectónico.

No se implementa infraestructura de producción ni se divide el sistema
en microservicios sin una justificación técnica medible.
