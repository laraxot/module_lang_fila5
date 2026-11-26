---
title: "Stub — vista language switcher standalone (superseded)"
type: decision
status: superseded
created: 2026-11-23
updated: 2026-11-26
module: Lang
decision-makers: [Lang module owner]
superseded_by: ./0006-language-switcher-standalone-view.md
qmd: "stub superseded ADR Lang language-switcher-standalone-view → 0006-language-switcher-standalone-view"
---

# Stub — vista language switcher standalone (superseded)

STUB → [0006-language-switcher-standalone-view.md](0006-language-switcher-standalone-view.md)

## Contesto

Esisteva un path kebab non numerato per la decisione «vista language switcher
standalone». Il canone del modulo usa basename `NNNN-slug.md`.

## Driver della decisione

- Un solo ADR vivo per la stessa decisione (DRY).
- Path legacy non devono rimanere due ADR completi sullo stesso tema.
- I link storici al kebab devono puntare al canone numerato.

## Decisione

Questo file è **superseded**. Canonico:
[0006-language-switcher-standalone-view.md](0006-language-switcher-standalone-view.md).

## Alternative scartate

- Tenere due ADR vivi sulla stessa decisione: doppia fonte di verità.
- Cancellare il file senza nota: rompe i link legacy al path kebab.

## Conseguenze

- Pro: un solo ADR da aggiornare (`0006-…`); il kebab resta un puntatore.
- Contro: chi apre il kebab deve seguire il link al canone.

## Conferma

- Contenuto decisionale solo in `0006-language-switcher-standalone-view.md`.
- Frontmatter `status: superseded` e link relativo al canone presenti.
