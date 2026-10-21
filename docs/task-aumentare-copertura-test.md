---
issues: []
discussions: []
title: "Task: Aumentare Copertura Test - Lang"
module: "Lang"
type: concept
tags: [test]
created: 2026-07-14
updated: 2026-07-14
qmd: "test"
related:
  - "./italian-text-refined-audit-report.md"
<<<<<<< .merge_file_3HZa4X
=======
status: draft
>>>>>>> .merge_file_OrV9Av
---
# Task: Aumentare Copertura Test - Lang

**Modulo**: Lang
**Priorita'**: Alta
**Completamento**: 15%

---

## Descrizione

Solo 6 file test per 53 file PHP. Le Actions principali necessitano test.

## Test da Implementare

- [ ] ReadTranslationFileAction: lettura file PHP/JSON
- [ ] WriteTranslationFileAction: scrittura file traduzione
- [ ] SyncTranslationsAction: sincronizzazione traduzioni
- [ ] Switcher component: cambio lingua e persistenza

## Criteri di Completamento

- [ ] 10+ nuovi test
- [ ] Copertura actions al 80%
