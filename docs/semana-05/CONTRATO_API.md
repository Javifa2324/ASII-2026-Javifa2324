# Contrato API REST

## Dashboard de ocupación hospitalaria

La API propuesta expone el caso de uso de consolidación y consulta de ocupación por sala y estado de cama.

## Endpoint

Método:

GET

Ruta:

/api/v1/occupancy

La operación es de consulta, por lo que se utiliza el método HTTP GET.

## Parámetros

### room

Parámetro opcional.

Permite filtrar los resultados por una sala determinada.

Ejemplo:

GET /api/v1/occupancy?room=UCI

Si el valor está vacío, el servicio actual lo interpreta como ausencia de filtro.

### status

Parámetro opcional.

Permite filtrar por estado de cama.

Los estados válidos definidos actualmente por BedStatus son:

- OCCUPIED
- AVAILABLE
- MAINTENANCE

Ejemplo:

GET /api/v1/occupancy?status=OCCUPIED

El servicio actual convierte el estado a mayúsculas antes de validarlo.

## Combinación de filtros

Los dos parámetros pueden utilizarse simultáneamente.

Ejemplo:

GET /api/v1/occupancy?room=UCI&status=OCCUPIED

## Respuesta correcta

Código HTTP:

200 OK

Ejemplo de estructura:

{
  "data": {
    "total": 10,
    "occupied": 6,
    "available": 3,
    "maintenance": 1,
    "occupancy_percentage": 60.0,
    "rooms": [
      {
        "room": "UCI",
        "total": 10,
        "occupied": 6,
        "available": 3,
        "maintenance": 1,
        "occupancy_percentage": 60.0
      }
    ]
  },
  "error": null
}

Los valores numéricos son ilustrativos.

La estructura corresponde a la información que actualmente genera OccupancyCalculator.

## Cálculo de ocupación

La regla actual del dominio es:

occupied / total * 100

El resultado se redondea a dos decimales.

## Error de validación

Si se envía un estado no permitido:

GET /api/v1/occupancy?status=INVALID

la respuesta utiliza:

422 Unprocessable Entity

Ejemplo:

{
  "data": null,
  "error": "Estado de cama no válido: INVALID"
}

## Error interno

Cuando ocurre un error inesperado o un problema de persistencia:

500 Internal Server Error

Ejemplo:

{
  "data": null,
  "error": "No fue posible consultar la ocupación."
}

## Responsabilidad del endpoint

La API únicamente consulta y consolida la información de ocupación hospitalaria.

Este endpoint no está diseñado para:

- crear camas;
- eliminar camas;
- modificar salas;
- cambiar el estado de una cama.
