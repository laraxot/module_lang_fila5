---
title: docs archive policy — puntatore
type: reference
updated: 2026-05-21
---

# Docs archive policy (puntatore)

Policy globale: [../../../../bashscripts/ai/wiki/concepts/second-brain-continuous-improvement.md](../../../../bashscripts/ai/wiki/concepts/second-brain-continuous-improvement.md).

`docs/archive/` e `docs/legacy/` sono solo scratch locale; non fonte canonica. Vedi [module-docs-deduplication](../../../../bashscripts/ai/wiki/how-to/module-docs-deduplication.md).

Active module knowledge belongs in normal `docs/*.md`, `docs/wiki/**`, or a precise topical subdirectory. This keeps QMD ingestion deterministic and prevents stale duplicates from outranking current documentation.

Il `.gitignore` del modulo ignora queste cartelle; se una nota archiviata è ancora valida, promuoverla in un documento attivo e linkarla dall'indice locale.
