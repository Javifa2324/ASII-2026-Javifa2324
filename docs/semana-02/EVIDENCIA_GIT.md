# Evidencia Git

Esta evidencia debe generarse después de copiar los archivos de la actividad al worktree y hacer el commit final. No conviene inventar estos datos porque el docente debe poder verificarlos.

## Rama esperada
`feature/asii-09-dashboard-de-ocupacion-hospitalaria-javifa2324`

## Comandos de verificación

```bash
git branch --show-current
git status
git log --oneline -n 10
find docs/actividad-solid-isp -maxdepth 3 -type f | sort
git remote get-url origin
```

## Datos que debo colocar en la portada al final
- URL del repositorio: `https://github.com/compilations-teams/sistema-hospitalario-integrado-SistenasII-2026`.
- Rama: `feature/asii-09-dashboard-de-ocupacion-hospitalaria-javifa2324`.
- Etiqueta evaluada: `asii-09-semana2`.
- Enlace al commit: abrir el commit final de la actividad en GitHub y copiar su enlace como parte de la evidencia.

## Commit sugerido

```bash
git add docs/actividad-solid-isp
git commit -m "docs: add ISP design activity for occupancy dashboard"
git push -u origin feature/asii-09-dashboard-de-ocupacion-hospitalaria-javifa2324
git tag asii-09-semana2
git push origin asii-09-semana2
```
