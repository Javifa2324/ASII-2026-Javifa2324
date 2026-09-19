# Propuesta responsive

## Objetivo

Permitir que el Panel de ocupación hospitalaria sea usable en escritorio, tablet y teléfono sin perder información crítica.

## Estrategia general

La interfaz debe reorganizar sus componentes según el ancho disponible.

No se deben eliminar funciones importantes únicamente por utilizar una pantalla pequeña.

## Escritorio

Referencia aproximada:

`>= 1024 px`

La vista puede mostrar:

- título del módulo;
- fecha y hora de corte;
- filtro de sala;
- varias tarjetas de indicadores en una misma fila;
- detalle por sala en formato tabla;
- información secundaria visible simultáneamente.

### Organización propuesta

Primera zona:

- título;
- fecha de corte;
- filtro.

Segunda zona:

- total de camas;
- operativas;
- ocupadas;
- disponibles.

Tercera zona:

- limpieza;
- mantenimiento;
- fuera de servicio;
- porcentaje de ocupación.

Cuarta zona:

- detalle por sala.

## Tablet

Referencia aproximada:

`768 px a 1023 px`

Las tarjetas deben reorganizarse en menos columnas.

Ejemplo:

- dos tarjetas por fila;
- filtro de sala ocupando mayor ancho;
- tabla simplificada;
- separación suficiente entre controles táctiles.

La información sigue disponible, pero se reorganiza verticalmente.

## Teléfono

Referencia aproximada:

`< 768 px`

La interfaz debe priorizar lectura rápida.

### Encabezado

Mostrar:

- Panel de ocupación;
- fecha/hora de corte.

### Filtro

El selector de sala debe ocupar la mayor parte del ancho disponible.

### Indicadores principales

Primero mostrar:

1. Disponibles.
2. Ocupadas.
3. Porcentaje de ocupación.
4. Total de camas.

### Indicadores secundarios

Después mostrar:

- operativas;
- limpieza;
- mantenimiento;
- fuera de servicio.

## Tarjetas

En móvil las tarjetas pueden presentarse:

- una por fila; o
- dos por fila cuando el ancho lo permita.

Cada tarjeta debe mantener:

- etiqueta;
- valor;
- separación visual.

La interpretación no debe depender únicamente del color.

## Detalle por sala

Una tabla ancha puede generar desplazamiento horizontal incómodo.

En móvil se propone transformar cada fila en una tarjeta.

Ejemplo:

Sala: UCI

Ocupadas: 8
Disponibles: 2
Ocupación: 80 %

Esto permite lectura vertical.

## Filtro de sala

El usuario selecciona una sala por nombre.

Ejemplos:

- Todas las salas
- UCI
- Emergencia
- Medicina
- Pediatría

El usuario nunca debe introducir manualmente `ward_id`.

## Estado de carga

En cualquier tamaño de pantalla debe mostrarse un mensaje o indicador como:

`Cargando información de ocupación...`

## Estado sin datos

Mostrar:

`No hay información de ocupación disponible.`

## Estado de error

Mostrar:

`No fue posible cargar la información de ocupación.`

Debe existir una acción:

`Reintentar`

## Orientación

La aplicación debe funcionar principalmente en orientación vertical.

La orientación horizontal puede aprovecharse para mostrar más columnas, pero no debe ser obligatoria.

## Interacción táctil

Los controles deben:

- tener suficiente área de interacción;
- mantener separación entre acciones;
- evitar elementos demasiado pequeños;
- proporcionar retroalimentación visual al interactuar.

## Navegación

El usuario debe poder consultar el dashboard sin realizar zoom manual ni desplazamiento horizontal obligatorio.

## Seguridad

El comportamiento responsive no modifica:

- autenticación;
- autorización;
- tenant;
- permisos de API.

La seguridad continúa siendo responsabilidad del backend.
