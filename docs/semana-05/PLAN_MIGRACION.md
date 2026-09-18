# Plan de migración

## Módulo

Dashboard de ocupación hospitalaria.

## Objetivo

Evolucionar el Micro-HIS actual hacia una arquitectura cliente-servidor con API REST sin modificar innecesariamente las reglas existentes del dominio.

## Principio de la migración

La migración debe ser incremental.

No se propone reescribir todo el módulo ni dividirlo inmediatamente en microservicios.

Se conserva la lógica actual y se modifica principalmente la forma en que el cliente consume la información.

## Estado actual

Actualmente el flujo principal es:

Usuario
→ public/index.php
→ OccupancyController
→ OccupancyService
→ BedRepository
→ PdoBedRepository
→ Base de datos
→ HTML

El mismo servidor recibe la solicitud, ejecuta el caso de uso y genera la interfaz HTML.

## Estado propuesto

El flujo propuesto es:

Usuario
→ Cliente web
→ API REST
→ OccupancyController
→ OccupancyService
→ BedRepository
→ PdoBedRepository
→ Base de datos
→ JSON
→ Cliente web

La principal diferencia es que el servidor devuelve datos JSON y el cliente se encarga de presentarlos.

## Paso 1 — Conservar el dominio

Se mantienen los componentes:

- BedStatus
- BedRepository
- OccupancyCalculator

Las reglas actuales no necesitan cambiar para exponer el caso de uso mediante una API.

## Paso 2 — Conservar el servicio de aplicación

OccupancyService continúa recibiendo:

- room
- status

El servicio conserva sus responsabilidades actuales:

- normalizar filtros;
- validar el estado;
- consultar el repositorio;
- generar el resumen de ocupación.

## Paso 3 — Crear una entrada REST

Se propone crear el endpoint:

GET /api/v1/occupancy

Esta ruta recibe los mismos filtros utilizados actualmente por el Micro-HIS.

## Paso 4 — Adaptar la presentación

La capa Presentation debe ofrecer una respuesta adecuada para clientes HTTP.

La respuesta debe incluir:

- código HTTP;
- datos en JSON;
- mensaje de error cuando corresponda.

## Paso 5 — Separar la interfaz visual

El Dashboard deja de depender de que el servidor genere directamente todo el HTML.

El cliente consulta la API y presenta los indicadores recibidos.

## Paso 6 — Mantener el patrón Repository

OccupancyService continúa dependiendo de BedRepository.

Esto permite mantener PdoBedRepository como implementación de persistencia.

También permite utilizar otras implementaciones para pruebas sin modificar la lógica del servicio.

## Paso 7 — Pruebas de compatibilidad

Antes de reemplazar el flujo actual deben comprobarse al menos los siguientes casos:

- consulta sin filtros;
- consulta por sala;
- consulta por estado;
- consulta por sala y estado;
- estado inválido;
- error de persistencia.

Los resultados de la API deben conservar las reglas actuales de OccupancyCalculator.

## Paso 8 — Incorporar seguridad

Antes de una exposición real del servicio deben agregarse mecanismos de:

- autenticación;
- autorización;
- HTTPS;
- validación de acceso.

## Paso 9 — Incorporar observabilidad

Se propone agregar:

- logs de solicitudes;
- tiempos de respuesta;
- códigos HTTP;
- errores de persistencia;
- identificadores de solicitud.

## Paso 10 — Evaluar microservicio únicamente si existe necesidad

La creación de la API REST no obliga a convertir el módulo en microservicio.

Primero puede funcionar como parte del mismo sistema.

Solo se propone una separación física si existe una necesidad técnica medible.

## Riesgos de la migración

Los principales riesgos son:

- cambiar accidentalmente las reglas actuales;
- devolver resultados diferentes entre HTML y API;
- duplicar cálculos en el cliente;
- exponer detalles internos en mensajes de error;
- introducir dependencias innecesarias.

## Mitigación

Para reducir estos riesgos se propone:

- reutilizar OccupancyService;
- reutilizar OccupancyCalculator;
- mantener BedRepository;
- centralizar las reglas en el servidor;
- probar los mismos escenarios existentes;
- migrar de forma incremental.

## Resultado esperado

Al finalizar la migración, el cliente podrá consumir la información de ocupación mediante una API REST sin duplicar las reglas de negocio y sin modificar innecesariamente la arquitectura interna del módulo.
