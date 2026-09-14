# Guía para defensa oral

## ¿Qué desarrollé?

Desarrollé un Micro-HIS en PHP vanilla para consultar y consolidar la ocupación hospitalaria por sala y estado de cama.

## ¿Qué tecnologías utilicé?

PHP 8.2+ vanilla, PDO y SQLite.

## ¿Por qué el proyecto está dividido en capas?

Para separar responsabilidades y evitar mezclar la presentación, la lógica del caso de uso, las reglas del dominio y el acceso a los datos.

## Presentation

Recibe la solicitud del usuario y muestra los resultados.

## Application

Coordina el caso de uso mediante OccupancyService.

## Domain

Contiene los estados válidos de cama, el contrato BedRepository y el cálculo de ocupación.

## Persistence

Accede a la base de datos mediante PDO y sentencias preparadas.

## ¿Qué calcula el sistema?

- Total de camas.
- Camas ocupadas.
- Camas disponibles.
- Camas en mantenimiento.
- Porcentaje de ocupación.
- Ocupación agrupada por sala.

## ¿Qué pruebas se realizaron?

1. Camino feliz.
2. Regla de dominio.
3. Error de persistencia.

## ¿Qué ocurre si una cama tiene un estado inválido?

La capa Domain rechaza el estado mediante una excepción.

## ¿Por qué se utilizó PDO?

Porque permite trabajar con la base de datos usando sentencias preparadas y mantener separado el acceso a datos.

## ¿Se utilizaron datos clínicos reales?

No. Todos los datos utilizados son ficticios.
