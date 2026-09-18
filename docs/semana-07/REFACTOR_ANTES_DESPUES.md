# Refactor — Antes y después

## Módulo

Dashboard de ocupación hospitalaria.

## Objetivo

Mostrar de forma clara el cambio propuesto para reducir el acoplamiento entre los componentes del módulo sin agregar nuevas funcionalidades.

## Antes del refactor

El flujo actual utiliza parámetros separados y arreglos asociativos como contrato implícito.

Flujo simplificado:

Frontend
→ OccupancyController
→ OccupancyService(room, status)
→ BedRepository
→ OccupancyCalculator
→ array
→ OccupancyController
→ Frontend

## Características del diseño anterior

OccupancyService recibe:

- room
- status

como parámetros separados.

La salida del servicio es un arreglo asociativo con claves como:

- total
- occupied
- available
- maintenance
- occupancy_percentage
- rooms

## Problema de acoplamiento

La presentación debe conocer directamente la estructura exacta del arreglo devuelto.

Esto genera dependencia sobre:

- nombres de claves;
- estructura de rooms;
- forma exacta de los datos;
- cantidad de parámetros del caso de uso.

Si la estructura cambia, los consumidores pueden verse afectados directamente.

## Después del refactor

Se introducen contratos explícitos.

Entrada:

OccupancyQuery

Salida:

OccupancySummary

Flujo propuesto:

Frontend
→ OccupancyController
→ OccupancyQuery
→ OccupancyService
→ BedRepository
→ OccupancyCalculator
→ OccupancySummary
→ OccupancyController
→ Frontend

## OccupancyQuery

Agrupa:

- room
- status

Antes:

OccupancyService(room, status)

Después:

OccupancyService(OccupancyQuery)

## OccupancySummary

Representa la salida consolidada.

Incluye:

- total
- occupied
- available
- maintenance
- occupancy_percentage
- rooms

Antes:

array

Después:

OccupancySummary

## Qué cambia

Se modifica la forma de comunicación entre componentes.

Se reemplazan contratos implícitos por contratos explícitos.

## Qué no cambia

No se modifican:

- los estados de cama;
- las reglas de validación;
- el cálculo de ocupación;
- la consulta de persistencia;
- el patrón Repository;
- la funcionalidad del Dashboard.

## Antes — Acoplamiento

Presentation conoce:

- parámetros separados;
- nombres exactos de claves;
- estructura interna del arreglo.

## Después — Acoplamiento reducido

Presentation conoce:

- OccupancyQuery como entrada;
- OccupancySummary como salida.

El contrato está definido de forma explícita.

## Impacto en OccupancyService

Antes:

- recibe dos valores separados;
- devuelve un arreglo.

Después:

- recibe un OccupancyQuery;
- devuelve un OccupancySummary.

El servicio sigue coordinando el mismo caso de uso.

## Impacto en OccupancyController

Antes:

- extrae room y status;
- llama al servicio con parámetros separados;
- recibe un arreglo.

Después:

- construye OccupancyQuery;
- llama al servicio con un único contrato;
- recibe OccupancySummary;
- adapta el resultado para el cliente.

## Impacto en OccupancyCalculator

No cambia su responsabilidad.

Continúa calculando:

- total;
- occupied;
- available;
- maintenance;
- occupancy_percentage;
- agrupación por sala.

## Impacto en BedRepository

No cambia.

Continúa siendo el contrato de acceso a datos requerido por Application.

## Impacto en PdoBedRepository

No cambia.

Continúa obteniendo los datos desde persistencia mediante PDO.

## Beneficio principal

El refactor disminuye el acoplamiento entre componentes porque los límites del caso de uso quedan definidos por contratos explícitos.

## Resultado

La estructura resulta más fácil de mantener, documentar y probar sin alterar la funcionalidad existente del Dashboard.
