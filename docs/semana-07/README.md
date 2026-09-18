# Semana 07 — Diseño de componentes y refactorización

## Módulo

Dashboard de ocupación hospitalaria.

## Flujo trabajado

Consolidación y consulta de ocupación por sala y estado de cama.

## Objetivo

Diseñar los componentes backend y frontend del Dashboard de ocupación hospitalaria y realizar un refactor conceptual que reduzca el acoplamiento entre la presentación, la aplicación, el dominio y la persistencia.

La actividad no agrega nuevas funcionalidades al módulo.

## Situación actual

El módulo mantiene las siguientes responsabilidades:

- La interfaz solicita la consulta de ocupación.
- OccupancyController recibe los filtros.
- OccupancyService coordina el caso de uso.
- BedRepository define el acceso requerido a camas.
- PdoBedRepository obtiene los datos desde persistencia.
- OccupancyCalculator genera los indicadores.
- BedStatus define los estados válidos de cama.

Los estados actuales son:

- OCCUPIED
- AVAILABLE
- MAINTENANCE

## Punto de mayor acoplamiento identificado

La comunicación entre presentación y aplicación utiliza estructuras de datos basadas en arreglos.

Esto hace que los consumidores deban conocer nombres específicos como:

- total
- occupied
- available
- maintenance
- occupancy_percentage
- rooms

También los filtros room y status llegan como valores separados desde la presentación.

## Refactor propuesto

Se propone introducir contratos explícitos de entrada y salida.

Entrada:

OccupancyQuery

Responsabilidad:

- transportar room;
- transportar status.

Salida:

OccupancySummary

Responsabilidad:

- transportar los indicadores de ocupación;
- transportar el resumen por sala.

El refactor no cambia las reglas de negocio.

## Separación de componentes

### Frontend / UI

Presenta filtros y resultados.

### Presentation

Recibe la solicitud y transforma la entrada al contrato de aplicación.

### Application

Coordina el caso de uso mediante OccupancyService.

### Domain

Mantiene las reglas de ocupación, estados y cálculo de indicadores.

### Persistence

Obtiene la información mediante la implementación de BedRepository.

## Entregables

- Diagrama de componentes.
- Contratos de entrada y salida.
- Comparación antes y después del refactor.
- Justificación del refactor.
- Evidencia de separación entre UI, aplicación, dominio y persistencia.

## Resultado esperado

Reducir el conocimiento que la interfaz y el controlador tienen sobre la estructura interna de los datos, manteniendo el comportamiento actual del Dashboard.
