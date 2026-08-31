---
title: "Lang Module — Wiki Schema"
module: "Lang"
type: concept
tags: [migration, filament]
created: 2026-07-14
updated: 2026-07-14
qmd: "migration filament"
related:
  - "./italian-text-refined-audit-report.md"
---
# Lang Module — Wiki Schema

## Struttura wiki

```
docs/
  wiki/
    index.md       ← indice navigabile (obbligatorio)
    log.md         ← log operazioni (obbligatorio)
    schema.md      ← questo file
    concepts/      ← pattern e regole architetturali
    entities/      ← translation files, locales
```

## Regole ingest

- `docs/` = raw source layer (immutabile)
- `docs/wiki/` = compiled wiki layer (LLM aggiorna)
- Nuovi concetti → `concepts/<kebab-case>.md`

## QMD collection

```bash
qmd search "translation locale" -c mod-lang
```

---

<!-- Merged from SCHEMA.md, which collided with this file on case-insensitive filesystems. -->

---
title: Wiki Schema
description: Schema e convenzioni per la manutenzione della wiki
tags:
  - schema
  - conventions
  - llm-instructions
created: 2026-04-15
---

# Wiki Schema - Lang

Istruzioni per l'LLM su come mantenere questa wiki.

## Struttura

```
docs/
├── wiki/
│   ├── index.md           # Catalogo
│   ├── log.md             # Registro
│   ├── SCHEMA.md          # Questo file
│   ├── concepts/          # Pattern, architettura
│   ├── entities/          # Modelli, azioni
│   ├── sources/           # Doc esterna
│   └── comparisons/       # Tabelle comparative
└── raw/                   # Sorgenti immutable
```

## Convenzioni

- File: kebab-case (es. `entity-user.md`)
- Frontmatter: title, description, tags, created
- Cross-ref: `[Link](../concepts/name.md)`
- NON modificare mai `docs/raw/`
