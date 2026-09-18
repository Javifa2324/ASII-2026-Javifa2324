# Diseño de componentes

## Módulo

Dashboard de ocupación hospitalaria.

## Objetivo

Definir los principales componentes del frontend y backend involucrados en la consolidación y consulta de ocupación por sala y estado de cama.

El diseño mantiene separadas las responsabilidades de interfaz, aplicación, dominio y persistencia.

## Componentes principales

### 1. Frontend / Dashboard

Responsabilidades:

- permitir seleccionar una sala;
- permitir seleccionar un estado de cama;
- solicitar la información de ocupación;
- mostrar indicadores generales;
- mostrar información agrupada por sala;
- mostrar mensajes de error.

El frontend no debe:

- calcular porcentajes de ocupación;
- consultar directamente la base de datos;
- conocer detalles de PDO;
- validar reglas internas del dominio.

---

### 2. OccupancyController

Pertenece a la capa Presentation.

Responsabilidades:

- recibir los parámetros de entrada;
- construir el contrato OccupancyQuery;
- invocar OccupancyService;
- transformar el resultado en una respuesta para el cliente;
- manejar errores de validación;
- manejar errores inesperados.

El controlador no debe contener reglas de cálculo de ocupación.

---

### 3. OccupancyQuery

Contrato de entrada propuesto.

Contiene:

- room;
- status.

Su objetivo es agrupar los parámetros necesarios para ejecutar el caso de uso.

Antes del refactor, room y status son enviados como parámetros separados.

Después del refactor, el caso de uso recibe un único objeto de entrada.

---

### 4. OccupancyService

Pertenece a la capa Application.

Responsabilidades:

- coordinar el caso de uso;
- normalizar los filtros;
- validar el estado solicitado;
- consultar BedRepository;
- solicitar a OccupancyCalculator el resumen de ocupación;
- devolver un OccupancySummary.

No debe:

- ejecutar SQL;
- generar HTML;
- conocer detalles de la interfaz visual.

---

### 5. BedStatus

Pertenece al Domain.

Define los estados válidos de las camas:

- OCCUPIED;
- AVAILABLE;
- MAINTENANCE.

También valida que un estado utilizado por el caso de uso pertenezca al conjunto permitido.

---

### 6. OccupancyCalculator

Pertenece al Domain.

Responsabilidades:

- contar el total de camas;
- contar camas ocupadas;
- contar camas disponibles;
- contar camas en mantenimiento;
- calcular porcentaje de ocupación;
- generar el resumen agrupado por sala.

El cálculo permanece en el dominio y no se traslada al frontend.

---

### 7. OccupancySummary

Contrato de salida propuesto.

Representa el resultado generado por el caso de uso.

Contiene:

- total;
- occupied;
- available;
- maintenance;
- occupancy_percentage;
- rooms.

Su objetivo es evitar que otros componentes dependan directamente de un arreglo sin contrato explícito.

---

### 8. BedRepository

Contrato utilizado por la capa Application para consultar camas.

Permite mantener desacoplado OccupancyService de la tecnología utilizada para acceder a los datos.

---

### 9. PdoBedRepository

Pertenece a Persistence.

Implementa BedRepository.

Responsabilidades:

- ejecutar la consulta necesaria mediante PDO;
- aplicar los filtros de sala y estado;
- entregar los datos al servicio.

No contiene reglas para calcular indicadores.

---

### 10. Base de datos

Almacena la información utilizada por el módulo.

El acceso se realiza a través de la capa Persistence.

El frontend, controlador y servicio no deben ejecutar consultas SQL directamente.

## Flujo entre componentes

El flujo propuesto es:

Usuario
→ Frontend
→ OccupancyController
→ OccupancyQuery
→ OccupancyService
→ BedRepository
→ PdoBedRepository
→ Base de datos

Luego:

Base de datos
→ PdoBedRepository
→ OccupancyService
→ OccupancyCalculator
→ OccupancySummary
→ OccupancyController
→ Frontend
→ Usuario

## Separación de responsabilidades

### UI

Presenta y captura información.

### Presentation

Adapta las solicitudes externas al caso de uso.

### Application

Coordina las acciones necesarias.

### Domain

Contiene reglas, estados y cálculos.

### Persistence

Obtiene los datos.

## Resultado

El diseño evita que un componente tenga responsabilidades que pertenecen a otra capa.

La introducción de OccupancyQuery y OccupancySummary permite definir claramente qué entra y qué sale del caso de uso sin modificar la funcionalidad actual del Dashboard.
