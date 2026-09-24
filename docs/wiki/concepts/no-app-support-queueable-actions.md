---
title: "no app/Support — business logic in QueueableAction"
type: concept
tags: [lang, actions, queueable-action, support, refactor, adapter]
created: 2026-07-12
updated: 2026-07-13
qmd: "Lang module no app Support TranslatorService Adapter QueueableAction"
issues:
  - "https://github.com/laraxot/base_fixcity_fila5/issues/372"
discussions:
  - "https://github.com/laraxot/base_fixcity_fila5/discussions/273"
related:
  - ../../../../docs/wiki/rules/queueable-action-trait-mandatory.md
---

# no `app/Support/` — business logic in QueueableAction

## Scopo

Nel modulo Lang **non** esiste più `app/Support/`.

## Migrazione (2026-07-12)

| Legacy `app/Support/` | Destinazione |
|-----------------------|--------------|
| `TranslatorService` | `app/Adapters/TranslatorAdapter.php` |

## Eccezione: framework adapter

`TranslatorAdapter` **estende** `Illuminate\Translation\Translator` ed è bound come singleton `translator`. Non può essere una QueueableAction: il contratto Laravel richiede una sottoclasse di `Translator`.

La logica `notifyMissingKey` resta nell'adapter; eventuale orchestrazione futura → Action dedicata che l'adapter invoca.

## Pulizia `app/Services/` (2026-07-13)

Eliminato `app/Services/TranslatorService.php` — duplicato non referenziato; binding container e test usano solo `TranslatorAdapter`.

## Collegamenti

- [queueable-action-trait-mandatory](../../../../docs/wiki/rules/queueable-action-trait-mandatory.md)
