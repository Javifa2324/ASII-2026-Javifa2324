# Guía breve para defensa

## ¿Qué estoy defendiendo?

La arquitectura propuesta del Dashboard de ocupación hospitalaria, conectando UML, RF/RNF, principio SOLID, capas, patrón Repository y contrato API.

## Idea principal

El cliente web debe consumir datos, pero no calcular reglas de ocupación. Las reglas permanecen en el dominio del servidor.

## Preguntas clave

### ¿Por qué API REST?

Porque permite separar cliente y servidor sin reescribir la lógica del módulo.

### ¿Por qué no microservicio inmediatamente?

Porque separar físicamente el módulo agrega complejidad. En esta etapa basta una frontera REST clara.

### ¿Qué patrón sostiene el diseño?

Repository, porque `OccupancyService` depende de `BedRepository` y no directamente de PDO.

### ¿Qué cambio práctico defiendo?

El paso de una vista HTML generada en servidor a un endpoint REST `GET /api/v1/occupancy`.
