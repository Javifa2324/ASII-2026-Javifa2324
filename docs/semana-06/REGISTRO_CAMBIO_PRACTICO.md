# Registro del cambio práctico defendido

## Cambio defendido

Evolucionar el Micro-HIS actual desde una página HTML generada en servidor hacia un diseño cliente-servidor con API REST.

## Antes

`public/index.php` recibía parámetros, ejecutaba el caso de uso y generaba directamente la página HTML.

## Después propuesto

El servidor expone el endpoint:

`GET /api/v1/occupancy`

El cliente consume la respuesta JSON y presenta el dashboard.

## Reglas conservadas

- Estados válidos: `OCCUPIED`, `AVAILABLE`, `MAINTENANCE`.
- Cálculo de ocupación: `occupied / total * 100`.
- Uso de `BedRepository` como frontera entre aplicación y persistencia.

## Motivo

Separar la presentación visual de la lógica de consulta sin introducir infraestructura de microservicios innecesaria para el alcance actual.
