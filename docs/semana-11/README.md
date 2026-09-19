# Semana 11 — Mockup y prototipo navegable

## Módulo

ASII-09 — Panel de ocupación hospitalaria

## Objetivo

Crear un prototipo navegable del Panel de ocupación hospitalaria para representar el comportamiento de la interfaz en escritorio y dispositivos móviles.

## Prototipo

El prototipo fue desarrollado como una página HTML independiente:

`docs/semana-11/prototipo.html`

No requiere conexión al backend ni base de datos.

Los datos utilizados son únicamente demostrativos.

## Ejecución

Desde la raíz del repositorio:

```bash
python3 -m http.server 8080 --directory docs/semana-11


```

Luego abrir:

`http://127.0.0.1:8080/prototipo.html`

## Funcionalidades demostradas

El prototipo permite:

- visualizar indicadores generales de ocupación;
- seleccionar una sala;
- actualizar los indicadores según la sala seleccionada;
- cambiar entre vista Resumen y Detalle;
- consultar el detalle por sala;
- simular un error de carga;
- utilizar la acción Reintentar;
- visualizar el diseño responsive.

## Vista de escritorio

En pantallas grandes se muestran:

- filtro de sala;
- tarjetas de indicadores;
- navegación Resumen/Detalle;
- tabla con detalle por sala;
- estados del sistema.

Los indicadores principales incluyen:

- disponibles;
- ocupadas;
- porcentaje de ocupación;
- total de camas;
- operativas;
- limpieza;
- mantenimiento;
- fuera de servicio.

## Vista móvil

En pantallas pequeñas el diseño cambia automáticamente.

El detalle deja de utilizar una tabla horizontal y cada sala se presenta mediante una tarjeta vertical.

Ejemplo:

### UCI

- Ocupadas: 8
- Disponibles: 2
- Ocupación: 80 %

Esto evita desplazamiento horizontal y facilita la lectura desde un teléfono.

## Navegación

El prototipo contiene dos vistas principales:

### Resumen

Muestra los indicadores generales.

### Detalle

Muestra la información correspondiente a las salas.

El usuario puede cambiar entre ambas vistas sin recargar la página.

## Filtro por sala

El selector permite simular consultas para:

- Todas las salas
- UCI
- Emergencia
- Medicina

Al cambiar la sala se muestra temporalmente:

`Cargando información...`

y posteriormente los indicadores se actualizan.

## Estado de error

El botón:

`Simular error de carga`

permite demostrar el estado de fallo.

El sistema muestra:

`No fue posible cargar la información de ocupación.`

y habilita la opción:

`Reintentar`

## Accesibilidad considerada

El prototipo incluye:

- etiquetas visibles;
- valores textuales;
- foco visible en controles;
- controles utilizables mediante teclado;
- mensajes mediante `aria-live`;
- información que no depende únicamente del color.

## Responsive

Se utilizan puntos de adaptación para reorganizar la interfaz.

### Escritorio

Cuatro indicadores por fila.

### Tablet

Dos indicadores por fila.

### Móvil

Los controles se reorganizan verticalmente y el detalle se transforma de tabla a tarjetas.

## Validación realizada

Se comprobó manualmente:

1. cambio de Todas las salas a UCI;
2. actualización de indicadores;
3. navegación Resumen → Detalle;
4. navegación Detalle → Resumen;
5. simulación de error;
6. acción Reintentar;
7. adaptación a pantalla móvil;
8. transformación del detalle de tabla a tarjetas.

Todas las pruebas del prototipo funcionaron correctamente.

## Alcance

Esta entrega corresponde a un prototipo académico navegable.

No representa todavía la implementación final en Vue ni utiliza información real del HIS.

La integración con la API `GET /api/v1/occupancy` se realizará posteriormente en la aplicación.
