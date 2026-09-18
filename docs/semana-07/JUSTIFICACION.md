# Justificación del refactor

## Módulo

Dashboard de ocupación hospitalaria.

## Objetivo

Justificar por qué la introducción de contratos explícitos de entrada y salida mejora el diseño del módulo y reduce el acoplamiento entre componentes.

## Problema identificado

En el diseño actual, OccupancyService recibe parámetros separados y devuelve un arreglo asociativo.

Esto obliga a que otros componentes conozcan detalles como:

- los nombres exactos de las claves;
- la estructura interna del resultado;
- la cantidad de parámetros necesarios;
- la forma en que se transportan los filtros.

Aunque el flujo funciona, la comunicación entre componentes queda definida de manera implícita.

## Refactor propuesto

Se introducen dos contratos:

- OccupancyQuery para la entrada;
- OccupancySummary para la salida.

OccupancyQuery agrupa:

- room;
- status.

OccupancySummary representa:

- total;
- occupied;
- available;
- maintenance;
- occupancy_percentage;
- rooms.

## Reducción del acoplamiento

Antes del refactor, Presentation conoce directamente la forma de los parámetros y la estructura del arreglo retornado.

Después del refactor, Presentation depende de contratos definidos.

Esto reduce el conocimiento que un componente necesita tener sobre la implementación interna de otro.

## Mejora de mantenibilidad

Si en el futuro cambia la forma interna de obtener los datos, el contrato puede mantenerse estable.

Esto reduce el impacto de los cambios sobre:

- frontend;
- controlador;
- servicio;
- pruebas.

## Mejora de claridad

Los nombres OccupancyQuery y OccupancySummary expresan claramente la intención de los datos.

Esto mejora la lectura del diseño y facilita comprender qué información entra y qué información sale del caso de uso.

## Mejora de pruebas

Un contrato explícito facilita construir escenarios controlados para probar:

- consulta sin filtros;
- consulta por sala;
- consulta por estado;
- combinación de filtros;
- estados inválidos.

También permite validar de forma clara la estructura esperada de la salida.

## Respeto de responsabilidades

El refactor mantiene las responsabilidades existentes:

### UI

Presenta información.

### Presentation

Adapta solicitudes y respuestas.

### Application

Coordina el caso de uso.

### Domain

Mantiene las reglas y cálculos.

### Persistence

Obtiene los datos.

No se trasladan reglas de negocio a la interfaz ni consultas SQL al servicio.

## Compatibilidad con Repository

BedRepository continúa siendo el contrato de acceso a datos.

PdoBedRepository continúa implementando ese contrato.

Por lo tanto, el refactor no rompe la separación entre Application y Persistence.

## Sin ampliación funcional

La actividad no agrega:

- nuevos estados de cama;
- nuevas operaciones;
- nuevos módulos;
- nuevas reglas de negocio.

El cambio es exclusivamente de diseño y organización de responsabilidades.

## Resultado

La introducción de OccupancyQuery y OccupancySummary hace más explícitos los límites del caso de uso.

Esto reduce el acoplamiento, mejora la mantenibilidad y conserva la funcionalidad actual del Dashboard de ocupación hospitalaria.
