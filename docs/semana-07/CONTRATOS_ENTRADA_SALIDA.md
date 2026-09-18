# Contratos de entrada y salida

## Módulo

Dashboard de ocupación hospitalaria.

## Objetivo

Definir de forma explícita qué información entra al caso de uso y qué información sale, reduciendo el acoplamiento entre Presentation y Application.

## Situación antes del refactor

Actualmente OccupancyService recibe dos parámetros separados:

- room
- status

Y devuelve una estructura basada en un arreglo asociativo.

La presentación debe conocer directamente los nombres internos de las claves devueltas.

Ejemplo conceptual:

room
status
↓
OccupancyService
↓
array con indicadores y rooms

Esto funciona, pero deja el contrato implícito.

## Problema identificado

Cuando un contrato depende únicamente de parámetros sueltos y arreglos asociativos:

- el consumidor debe conocer nombres exactos de claves;
- es más fácil introducir errores por cambios de estructura;
- la intención del contrato no queda expresada claramente;
- la validación y documentación dependen de conocimiento externo.

## Contrato de entrada propuesto

### OccupancyQuery

Representa la solicitud de consulta de ocupación.

Datos:

- room
- status

Ejemplo conceptual:

OccupancyQuery
- room: string|null
- status: string|null

## Responsabilidad

Transportar únicamente la información necesaria para ejecutar el caso de uso.

No realiza:

- consultas SQL;
- cálculos de ocupación;
- presentación;
- persistencia.

## Reglas asociadas

room:

- puede ser null;
- puede representar una sala específica;
- si está vacío se interpreta como ausencia de filtro.

status:

- puede ser null;
- si existe debe corresponder a uno de los estados válidos.

Estados permitidos:

- OCCUPIED
- AVAILABLE
- MAINTENANCE

## Contrato de salida propuesto

### OccupancySummary

Representa el resultado consolidado del caso de uso.

Campos:

- total
- occupied
- available
- maintenance
- occupancy_percentage
- rooms

## Detalle de salida

### total

Cantidad total de camas consideradas en la consulta.

### occupied

Cantidad de camas con estado OCCUPIED.

### available

Cantidad de camas con estado AVAILABLE.

### maintenance

Cantidad de camas con estado MAINTENANCE.

### occupancy_percentage

Porcentaje de ocupación calculado por OccupancyCalculator.

### rooms

Colección con los indicadores agrupados por sala.

Cada elemento contiene:

- room
- total
- occupied
- available
- maintenance
- occupancy_percentage

## Ejemplo conceptual

Entrada:

OccupancyQuery
- room: UCI
- status: OCCUPIED

Salida:

OccupancySummary
- total: 5
- occupied: 5
- available: 0
- maintenance: 0
- occupancy_percentage: 100
- rooms: [...]

Los valores anteriores son únicamente un ejemplo de estructura.

## Flujo después del refactor

Frontend
→ OccupancyController
→ OccupancyQuery
→ OccupancyService
→ OccupancySummary
→ OccupancyController
→ Frontend

## Beneficio

Presentation deja de depender de una combinación de parámetros sueltos y de una estructura de salida sin contrato explícito.

Application recibe y devuelve estructuras con una intención claramente definida.

## Impacto en el dominio

El refactor no cambia:

- BedStatus;
- OccupancyCalculator;
- BedRepository;
- las reglas de porcentaje;
- los estados permitidos;
- el flujo funcional del Dashboard.

## Impacto en persistencia

No se modifica el contrato BedRepository.

PdoBedRepository continúa siendo responsable de obtener la información desde la base de datos.

## Conclusión

OccupancyQuery define claramente la entrada del caso de uso.

OccupancySummary define claramente la salida.

Esto mejora la separación entre componentes sin ampliar la funcionalidad del módulo.
