# Semana 08 — Diseño de experiencia de usuario

## Módulo
Dashboard de ocupación hospitalaria.

## Flujo trabajado
Consolidación y consulta de ocupación por sala y estado de cama.

## Objetivo
Diseñar la experiencia de usuario del flujo de consulta de ocupación hospitalaria, manteniendo coherencia con el módulo desarrollado en las semanas anteriores.

La propuesta cubre inicio, decisiones, confirmación, carga, éxito, vacío, error, ayuda contextual, protección de datos, filtros, indicadores, actualización y procedencia de datos.

## Rol documentado
Usuario hospitalario autorizado.

El alcance de los datos visibles debe ser definido por los permisos del backend y no por reglas duplicadas en la interfaz.

## Alcance funcional
- Consultar ocupación hospitalaria.
- Filtrar por sala.
- Filtrar por estado de cama.
- Visualizar indicadores agregados.
- Visualizar resultados agrupados por sala.
- Identificar cuándo se actualizaron los datos.
- Identificar la procedencia de los datos.
- Recibir mensajes claros en carga, vacío, éxito y error.
- Solicitar ayuda contextual.

## Estados de cama
- OCCUPIED
- AVAILABLE
- MAINTENANCE

## Wireframes incluidos
1. Inicio / consulta.
2. Estado de carga.
3. Resultado exitoso.
4. Resultado vacío.
5. Estado de error.
6. Ayuda contextual y procedencia de datos.

## Entregables
- User flow por rol.
- Seis wireframes anotados.
- Reglas de interacción.
- Validaciones y mensajes.
- Matriz de trazabilidad UX.
- Fuente PlantUML del flujo.

## Nota sobre confirmación
La consulta es una operación de lectura y no modifica camas ni salas. Por ello no se utiliza un modal de confirmación previo. La confirmación se representa mediante retroalimentación posterior a una consulta exitosa.
