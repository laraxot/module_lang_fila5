---
title: "Audit BMAD — Lang"
type: audit
status: review
updated: 2026-11-16
module: Lang
qmd: "audit BMAD Lang source-first qualità"
---

# Audit BMAD — Lang

SSoT dettagliata: [audits/lang-audit.md](./audits/lang-audit.md)

## Sintesi (2026-11-16)

| Metrica | Valore |
|---|---:|
| PHP `app/` | 72 |
| Test | 51 |
| Resources | 2 |
| Actions | 17 |
| Services | 0 |
| Policy `return true` | 2 |
| Marker | 0 |

## Lo scopo in una frase **Lang tiene fuori dal codice ogni parola che un utente legge: nessuna etichetta si scrive dentro una classe, si dichiara in un file di lingua.**

## Gate

- PHPStan modulo / `Modules`: 0 errori (verifica 2026-11-16).
- Pest: da eseguire in ambiente testing non produttivo.
- Security/runtime: story figlie su finding P0/P1 dell'audit dettagliato.
