---
title: "ECC — indice operativo Lang"
type: index
status: in-progress
updated: 2026-11-16
module: Lang
<<<<<<< .merge_file_qifF1n
qmd: "ECC indice Lang verification gates"
=======
qmd: "ECC indice Lang stato controlli verification gates PHPStan Pest security"
>>>>>>> .merge_file_y8OPRC
---

# ECC — modulo Lang

Collega le verifiche ECC al workflow PTVX (BMAD → lock → fix → PHPStan/Pest → docs).

| Controllo | Stato | Evidenza |
|---|---|---|
<<<<<<< .merge_file_qifF1n
| Inventario statico | verificato | ../bmad/audits/lang-audit.md |
| PHPStan | 0 su tree Modules (2026-11-16) | comando in audit |
| Pest | pending | ambiente testing |
| Security review | pending | story figlie P0/P1 |
| Docs pack | aggiornato | questo indice + audit ECC |
=======
| Inventario statico | verificato (2026-11-16) | [audit profondo](../bmad/audits/lang-audit.md) |
| PHPStan `Modules/Lang` | **0 errori** | comando in audit |
| Pest | parziale: `tests/Feature` 10 pass / 13 fail | [audit § Gate](../bmad/audits/lang-audit.md#gate) |
| Security review | nessun P0/P1; P2 su `GetTransPathAction` | [finding](../bmad/audits/lang-audit.md#finding) |
| Docs pack | aggiornato (gap-fill) | [audit](../bmad/audit.md), [epics](../bmad/epics.md), [architecture](../bmad/architecture.md) |
>>>>>>> .merge_file_y8OPRC

Dettaglio: [lang-ecc-audit.md](./lang-ecc-audit.md)
