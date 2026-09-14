# Semana 04 — Arquitectura en capas y patrón Repository

## Tema

Arquitectura en capas y patrón Repository.

## Módulo

Dashboard de ocupación hospitalaria.

## Flujo trabajado

Consolidación y consulta de ocupación por sala y estado de cama.

## Arquitectura

El módulo mantiene responsabilidades separadas en:

- Presentation
- Application
- Domain
- Persistence

## Patrón Repository

La capa Domain define el contrato:

`BedRepository`

El caso de uso `OccupancyService` depende de ese contrato y no de una
implementación concreta.

Se incluyen dos implementaciones:

- `PdoBedRepository`: obtiene información desde una base de datos mediante PDO.
- `InMemoryBedRepository`: almacena datos en memoria y permite sustituir la
  persistencia sin modificar el caso de uso.

## Separación de responsabilidades

### Presentation

`OccupancyController`

Recibe las solicitudes y delega el procesamiento a la capa Application.

### Application

`OccupancyService`

Coordina el caso de uso y depende de `BedRepository`.

### Domain

Contiene:

- `BedRepository`
- `BedStatus`
- `OccupancyCalculator`

Aquí se encuentran los contratos y reglas principales del dominio.

### Persistence

Contiene:

- `PdoBedRepository`
- `PdoConnectionFactory`
- `InMemoryBedRepository`

La lógica SQL permanece fuera del Controller y del Service.

## Repositorio compartido

El uso de una interfaz Repository permite que el módulo pueda cambiar el origen
de datos sin modificar las capas superiores.

Una implementación concreta puede acceder a una base local o a una fuente de
datos compartida, siempre que mantenga el contrato definido por
`BedRepository`.

## Evidencia

- Código separado por capas.
- Interfaz Repository.
- Adaptador PDO.
- Adaptador InMemory.
- Diagrama de arquitectura.
- Prueba del adaptador InMemory.
- Validación de sintaxis PHP.

## Curso

Análisis de Sistemas II — 2026
