# Integración continua

El workflow `.github/workflows/validate-php.yml` comprueba la sintaxis PHP del plugin propio y del tema hijo, y valida el fixture JSON del catálogo en cada push a `main` o `develop`, y en cada pull request hacia esas ramas.

No despliega, no modifica Hostinger y no ejecuta código de terceros del catálogo.
