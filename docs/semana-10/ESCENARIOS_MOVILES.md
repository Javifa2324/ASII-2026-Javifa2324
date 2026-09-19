# Escenarios de uso móvil

## Escenario 1 — Enfermera consulta disponibilidad

### Contexto

Una enfermera necesita conocer rápidamente si existen camas disponibles mientras se encuentra fuera de una estación de trabajo.

### Dispositivo

Teléfono.

### Necesidad

Consultar:

- camas disponibles;
- camas ocupadas;
- sala;
- porcentaje de ocupación.

### Flujo

1. Ingresa al HIS.
2. Abre el Panel de ocupación.
3. Observa el resumen principal.
4. Selecciona la sala.
5. Consulta la disponibilidad.

### Prioridad

Alta.

---

## Escenario 2 — Médico consulta una sala

### Contexto

Un médico necesita revisar la ocupación de una sala específica.

### Dispositivo

Teléfono o tablet.

### Flujo

1. Abre el dashboard.
2. Selecciona la sala.
3. El sistema actualiza los indicadores.
4. Revisa camas ocupadas y disponibles.
5. Verifica la hora de corte.

### Consideración UX

El filtro debe permanecer accesible sin obligar al usuario a desplazarse por toda la pantalla.

---

## Escenario 3 — Recepcionista verifica disponibilidad

### Contexto

La recepción necesita consultar disponibilidad general para apoyar el proceso de ingreso.

### Dispositivo

Tablet.

### Necesidad

Visualizar rápidamente:

- disponibilidad;
- ocupación;
- detalle por sala.

### Resultado esperado

La información principal debe ser visible sin necesidad de abrir múltiples pantallas.

---

## Escenario 4 — Administrador revisa ocupación general

### Contexto

Un administrador desea obtener una visión rápida del estado del hospital desde un dispositivo móvil.

### Dispositivo

Teléfono.

### Prioridad de información

1. porcentaje de ocupación;
2. camas disponibles;
3. camas ocupadas;
4. total de camas;
5. detalle por sala.

---

## Escenario 5 — Error de conexión

### Contexto

El usuario consulta el panel desde una red móvil inestable.

### Resultado esperado

La interfaz debe:

- informar que ocurrió un problema;
- conservar un mensaje comprensible;
- permitir reintentar;
- no mostrar errores técnicos internos.

---

## Escenario 6 — Sin información disponible

### Contexto

El tenant actual no posee información de ocupación disponible.

### Resultado esperado

Mostrar:

`No hay información de ocupación disponible.`

La ausencia de datos no debe confundirse con una falla del sistema.

---

## Escenario 7 — Usuario sin autorización

### Contexto

Un usuario con un rol no autorizado intenta consultar el panel.

### Resultado esperado

No debe mostrarse información hospitalaria.

Debe mostrarse un mensaje como:

`No tiene permisos para consultar el Panel de ocupación hospitalaria.`

La protección debe existir también en el backend.
