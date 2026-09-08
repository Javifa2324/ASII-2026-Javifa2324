# Guía breve para la defensa oral

## ¿Qué me asignaron?
Mi módulo es el Dashboard de ocupación hospitalaria y el flujo trabajado es la consolidación y consulta de ocupación por sala y estado de cama. El principio que debo aplicar es ISP.

## ¿Qué significa ISP en este trabajo?
La idea es evitar que un componente dependa de operaciones que no necesita. En el diseño inicial puse varias operaciones distintas dentro de una sola interfaz. Después las separé en interfaces pequeñas para resumen, filtros, métricas y detalle de cama.

## ¿Cuál era el problema antes?
`OccupancyDashboardInterface` reunía resumen, filtros, porcentaje de ocupación y detalle de cama. Por ejemplo, el componente que solo muestra el resumen también quedaba dependiendo de métodos para filtrar o consultar detalle, aunque no los utilizara.

## ¿Qué cambié?
Separé la interfaz grande en:

- `OccupancySummaryInterface`
- `OccupancyFilterInterface`
- `OccupancyMetricsInterface`
- `BedDetailInterface`

El servicio puede implementar varias de estas interfaces, pero cada cliente usa solamente la que necesita.

## ¿Por qué mejora el diseño?
Porque las dependencias quedan más claras y un cambio en una función específica tiene menos posibilidad de afectar componentes que no la usan. También facilita probar y mantener cada parte.

## Preguntas que podrían hacerme
**¿Por qué no dejaste una sola interfaz?**  
Porque los clientes tienen necesidades diferentes y no conviene obligarlos a depender de métodos que no usan.

**¿ISP significa una interfaz por cada método?**  
No necesariamente. La separación debe tener sentido por responsabilidad o por necesidad del cliente. Por eso los dos filtros sí pueden estar juntos.

**¿El servicio puede implementar varias interfaces?**  
Sí. ISP no obliga a tener una clase diferente por interfaz. Lo importante es que cada cliente dependa de una interfaz pequeña y adecuada.

**¿Qué cambiarías si agregan un nuevo indicador?**  
Primero revisaría si pertenece a las métricas actuales. Si sí, podría agregarse a `OccupancyMetricsInterface`; si es una función distinta, evaluaría otra interfaz sin cargar las demás.

## Cambio sencillo para hacer durante la defensa
Puedo agregar un método como `getAvailableBedsCount()` dentro de `OccupancyMetricsInterface` y actualizar el diagrama después, explicando por qué pertenece a métricas y no a filtros o detalle.
