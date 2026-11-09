---
<<<<<<< .merge_file_nmLUvQ
title: "Filament Blueprint — Lang"
=======
title: "Filament Blueprint: Lang"
>>>>>>> .merge_file_TYFmW5
type: filament-blueprint
status: active
module: Lang
created: 2026-10-16
<<<<<<< .merge_file_nmLUvQ
updated: 2026-10-16
tags: [bmad, filament, blueprint, lang]
qmd: "filament blueprint lang xotbase resource widget"
related:
  - ../bmad-planning.md
  - ../bmad-brainstorming.md
=======
updated: 2026-11-05
tags: [bmad, filament, blueprint, lang]
qmd: "filament blueprint lang xotbase resource widget migrations schema ownership table name user interface"
related:
  - ./bmad-planning.md
  - ./brainstorming.md
  - ../migrations.md
  - ../../../Xot/docs/wiki/rules/migration-filename-from-model-name.md
>>>>>>> .merge_file_TYFmW5
---

# Scopo

Contratto Filament del modulo **Lang**: chrome BO e/o widget FO senza violare
i confini di dominio.

<<<<<<< .merge_file_nmLUvQ
## Regole non negoziabili

1. Estendere solo `XotBaseResource` / `XotBaseWidget` / basi Xot — mai classi Filament dirette.
=======
## Persistenza e confine con le migrazioni

Il Blueprint descrive il contratto dell'interfaccia Filament; non è owner dello
schema né del naming delle migrazioni. `TranslationFile` è un modello Sushi
in-memory e non richiede una tabella. Gli schemi persistenti di `Post` e
`Translation` sono governati dalle migrazioni Lang e dalla convenzione Xot:
vedere [migrations.md](../migrations.md) e
[Xot migration naming](../../../Xot/docs/wiki/rules/migration-filename-from-model-name.md).
Il formato per nuove migrazioni è
`YYYY_MM_DD_HHMMSS_<azione>_<tabella_plurale>_table.php`; quando il nome non è
`create_*_table`, dichiarare `$model_class`. La regola non introduce Resource o
campi Filament nuovi: questo Blueprint registra il confine e collega alla fonte
owner.

## Regole non negoziabili

1. Estendere solo `XotBaseResource` / `XotBaseWidget` / basi Xot: mai classi Filament dirette.
>>>>>>> .merge_file_TYFmW5
2. Nessun `->label()` hardcoded: chiavi in `lang/<locale>/` del modulo.
3. Business logic nelle Actions del modulo, non nei form hooks grassi.
4. FO: widget montati esplicitamente; non abusare `discoverWidgets` per chrome.

## Resource / widget

- `TranslationFileResource`

## Form / Table / Infolist

Preferire triad schema dedicati (`*Form`, `*Table`, `*Infolist`) quando la Resource
cresce oltre pochi campi. Enum tipizzati al posto di option array.

## Policy e tenant

Ogni query Filament rispetta tenant + policy del modello owner. Nessun elenco
cross-tenant per comodita admin.

## Related

<<<<<<< .merge_file_nmLUvQ
- Planning: [bmad-planning.md](../bmad-planning.md)
- Brainstorming: [bmad-brainstorming.md](../bmad-brainstorming.md)
=======
- Planning: [bmad-planning.md](./bmad-planning.md)
- Brainstorming: [brainstorming.md](./brainstorming.md)
>>>>>>> .merge_file_TYFmW5
