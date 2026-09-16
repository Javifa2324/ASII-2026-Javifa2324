# Arquitectura cliente-servidor

## Módulo

Dashboard de ocupación hospitalaria.

## Situación actual

El Micro-HIS actual genera directamente la interfaz HTML desde el servidor.

El flujo actual es:

Usuario
→ public/index.php
→ OccupancyController
→ OccupancyService
→ BedRepository
→ PdoBedRepository
→ Base de datos

El controlador recibe los filtros room y status y utiliza OccupancyService para realizar la consulta.

## Arquitectura propuesta

Para separar la interfaz de usuario de la lógica del servidor se propone una arquitectura cliente-servidor.

El nuevo flujo sería:

Usuario
→ Cliente web
→ API REST
→ OccupancyController
→ OccupancyService
→ BedRepository
→ PdoBedRepository
→ Base de datos

La comunicación entre el cliente y el servidor se realiza mediante HTTP y respuestas en formato JSON.

## Cliente

El cliente web tiene las siguientes responsabilidades:

- Mostrar el Dashboard de ocupación hospitalaria.
- Permitir seleccionar una sala.
- Permitir seleccionar un estado de cama.
- Enviar solicitudes a la API.
- Recibir respuestas JSON.
- Mostrar los resultados de ocupación.
- Informar al usuario cuando ocurre un error.

El cliente no debe contener las reglas para calcular la ocupación.

## API REST

La API actúa como punto de entrada al servidor.

Endpoint propuesto:

GET /api/v1/occupancy

Sus responsabilidades son:

- recibir los parámetros room y status;
- delegar la solicitud al controlador;
- devolver el código HTTP correspondiente;
- entregar los resultados en formato JSON;
- no exponer detalles internos de la aplicación.

## Capa Presentation

OccupancyController recibe la solicitud y ejecuta OccupancyService.

Actualmente maneja tres resultados principales:

- 200 para consultas correctas;
- 422 para errores de validación;
- 500 para errores inesperados.

## Capa Application

OccupancyService coordina el caso de uso.

Sus responsabilidades son:

- normalizar el filtro room;
- normalizar el filtro status;
- validar el estado de cama;
- consultar BedRepository;
- solicitar el cálculo del resumen de ocupación.

## Capa Domain

El dominio contiene las reglas principales del módulo.

### BedStatus

Define los estados válidos:

- OCCUPIED
- AVAILABLE
- MAINTENANCE

### OccupancyCalculator

Calcula:

- total de camas;
- camas ocupadas;
- camas disponibles;
- camas en mantenimiento;
- porcentaje de ocupación;
- resumen agrupado por sala.

### BedRepository

Define el contrato utilizado para obtener la información de las camas.

## Capa Persistence

PdoBedRepository implementa BedRepository y se comunica con la base de datos mediante PDO.

La lógica de negocio no depende directamente de PDO porque OccupancyService utiliza la interfaz BedRepository.

## Propiedad de datos

El Dashboard de ocupación hospitalaria consume información relacionada con:

- salas;
- camas;
- estado de las camas.

El Dashboard no debe convertirse en propietario del catálogo de salas o camas.

Su responsabilidad es consultar y consolidar la información para mostrar indicadores de ocupación.

La creación, modificación o eliminación de camas corresponde a otros casos de uso del Sistema Hospitalario Integrado.

## Seguridad

El Micro-HIS actual es un prototipo educativo y no implementa autenticación.

Para una evolución real del sistema se propone:

- autenticación de usuarios;
- autorización según roles;
- uso de HTTPS;
- validación de parámetros;
- evitar mostrar errores internos de base de datos;
- registrar accesos y errores relevantes.

Estas medidas forman parte del diseño propuesto y no se presentan como funcionalidades ya implementadas.

## Resiliencia

Si ocurre un error de persistencia, la API no debe devolver información incompleta como si fuera válida.

El flujo esperado es:

1. detectar el error;
2. registrar el problema;
3. devolver código HTTP 500;
4. enviar un mensaje genérico al cliente;
5. permitir que el usuario vuelva a intentar la consulta.

## Observabilidad

Para facilitar el diagnóstico del sistema se propone registrar:

- fecha y hora de la solicitud;
- endpoint utilizado;
- filtros recibidos;
- código HTTP generado;
- duración de la consulta;
- errores de persistencia;
- identificador de la solicitud.

No se deben registrar datos sensibles que no sean necesarios.

## Consistencia

Los indicadores generales y los indicadores por sala deben calcularse utilizando el mismo conjunto de camas obtenido durante una solicitud.

OccupancyCalculator ya concentra el cálculo de estos valores.

Esto evita que el cliente tenga que realizar cálculos por su cuenta y reduce el riesgo de mostrar resultados diferentes entre pantallas.

## Resultado

La arquitectura propuesta separa la presentación del servicio de ocupación sin cambiar las reglas actuales del dominio.

Esto permite que diferentes clientes puedan consumir la misma API y mantiene las responsabilidades existentes del Micro-HIS.
