# Matriz de Trazabilidad

## Módulo
Dashboard de ocupación hospitalaria

## Proceso modelado
Consolidación y consulta de ocupación por sala y estado de cama.

| ID | Requisito | Caso de uso | Actividad | Secuencia |
|---|---|---|---|---|
| RF-01 | Consultar la ocupación hospitalaria | Consultar ocupación hospitalaria | Usuario abre el dashboard | Usuario solicita abrir el dashboard |
| RF-02 | Validar acceso y permisos | Validar acceso y permisos | Sistema valida sesión, tenant y permisos | Middleware valida token, tenant y permiso |
| RF-03 | Consolidar información de camas | Consolidar información de camas | Agrupar camas por sala y clasificarlas por estado | Servicio procesa y consolida la información |
| RF-04 | Visualizar ocupación por sala | Visualizar ocupación por sala | Mostrar ocupación por sala | Interfaz muestra el dashboard |
| RF-05 | Consultar estado de camas | Consultar detalle de camas | Clasificar camas por estado | Base de datos devuelve salas y camas |
| RF-06 | Filtrar información por sala | Filtrar por sala | Seleccionar sala y actualizar resultados | Solicitar datos filtrados por sala |
| RF-07 | Filtrar por estado de cama | Filtrar por estado de cama | Seleccionar estado y actualizar resultados | Solicitar datos filtrados por estado |
| RF-08 | Calcular porcentaje de ocupación | Consolidar información de camas | Calcular porcentaje de ocupación | Servicio calcula porcentaje de ocupación |
| RF-09 | Manejar ausencia de datos | — | Mostrar estado vacío | Respuesta sin registros |
| RF-10 | Manejar errores de consulta | — | Mostrar mensaje de error | Respuesta de error 500 |
| RF-11 | Denegar acceso no autorizado | Validar acceso y permisos | Mostrar acceso denegado | Respuesta 401 o 403 |

## Excepciones

| ID | Excepción | Respuesta esperada |
|---|---|---|
| EX-01 | Usuario sin autenticación válida | Denegar acceso |
| EX-02 | Usuario sin permisos suficientes | Mostrar acceso denegado |
| EX-03 | No existen datos de ocupación | Mostrar estado vacío |
| EX-04 | Error al consultar la base de datos | Mostrar mensaje de error |
| EX-05 | Filtro sin resultados | Mostrar que no existen resultados |

## Conclusión

Los tres diagramas representan el mismo proceso desde perspectivas diferentes. El diagrama de casos de uso identifica las funciones disponibles para el usuario, el diagrama de actividad representa el flujo, las decisiones y excepciones, y el diagrama de secuencia muestra la comunicación entre los componentes del sistema.
