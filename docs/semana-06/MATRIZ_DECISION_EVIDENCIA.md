# Matriz de decisión y evidencia

| Decisión | Justificación | Evidencia |
|---|---|---|
| Exponer una API REST para ocupación | Separa cliente y servidor sin mover reglas al cliente. | `docs/semana-05/CONTRATO_API.md` |
| Mantener `OccupancyCalculator` como fuente de cálculo | Evita duplicar porcentajes y totales en la interfaz. | Micro-HIS y Semana 3 |
| Usar `BedRepository` como contrato | Desacopla el caso de uso de PDO y de la base de datos. | Semana 4 |
| No separar todavía como microservicio | No existe una necesidad medible de despliegue o escala independiente. | Semana 5 |
| Controlar errores 422 y 500 | Diferencia errores de validación de errores internos. | Semana 5 |

## Conclusión

La arquitectura propuesta evoluciona el módulo hacia cliente-servidor sin romper las reglas ya implementadas en el dominio.
