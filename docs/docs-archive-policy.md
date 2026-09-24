---
title: docs archive policy — puntatore
type: reference
updated: 2026-05-21
---

# Docs archive policy (puntatore)

Policy globale: [../../../../docs/wiki/concepts/second-brain-continuous-improvement.md](../../../../docs/wiki/concepts/second-brain-continuous-improvement.md).

`docs/archive/` e `docs/legacy/` sono solo scratch locale/storico e non vanno usate come fonte canonica. Vedi [module-docs-deduplication](../../../../docs/wiki/how-to/module-docs-deduplication.md).

Active module knowledge belongs in normal `docs/*.md`, `docs/wiki/**`, or a precise topical subdirectory — questo mantiene deterministica l'ingestione QMD ed evita che duplicati datati scavalchino la documentazione corrente.

Il `.gitignore` del modulo ignora queste cartelle; se una nota archiviata è ancora valida, promuoverla in un documento attivo fuori da `archive`/`legacy` e linkarla dall'indice locale.
