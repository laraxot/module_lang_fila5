---
issues: []
discussions: []
title: "Case-Insensitive File Conflicts"
module: "Lang"
type: concept
tags: [phpstan, level10, fixes, 1]
created: 2026-07-14
updated: 2026-07-14
qmd: "phpstan level10 fixes 1"
related:
  - "./italian-text-refined-audit-report.md"
status: draft
---
# Case-Insensitive File Conflicts

Nel modulo `Lang` sono presenti i seguenti duplicati con differenze solo di maiuscole/minuscole:

- `Modules/Lang/docs`: `locale-management.md`, `locale-management.md`
- `Modules/Lang/docs`: `quick-reference.md`, `quick-reference.md`
- `Modules/Lang/docs`: `translation-strategies.md`, `translation-strategies.md`
- `Modules/Lang/docs`: `translation-process.md`, `translation-process.md`
- `Modules/Lang/docs`: `mcamara-implementation-guide.md`, `mcamara-implementation-guide.md`
- `Modules/Lang/docs/translations`: `README.it.md`, `readme.it.md`
- `Modules/Lang/docs/translations`: `README.es.md`, `readme.es.md`

È necessario mantenere una sola variante per ogni file (ad esempio quella con il prefisso maiuscolo già utilizzato per altri documenti globali) e rimuovere la duplicazione.
