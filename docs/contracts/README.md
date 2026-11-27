---
title: "Contratti del modulo Lang"
type: index
tags: [contracts, actions, lang, translations]
created: 2026-11-18
updated: 2026-11-24
---

# Contratti del modulo Lang

Cosa promettono le Action di Lang che **scrivono file di lingua** o decidono il testo di ogni componente Filament: sono
le uniche del modulo che possono rompere la produzione (un file di lingua con errore di sintassi = 500 su ogni pagina che
lo carica) o sporcare l'albero dei sorgenti.

Leggili prima di chiamare o modificare una di queste Action. Le invarianti con group si verificano con
`cd laravel && vendor/bin/pest Modules/Lang/tests --group=<ID>`; `—` è debito dichiarato.

Formato (sei sezioni, tabella invarianti con ID, `@contract` nel docblock):
[action-behavioral-contract](../../../Xot/docs/rules/action-behavioral-contract.md).

## Indice

- [AutoLabelAction](auto-label-action.md) — etichette e testi di ogni componente Filament dal file di lingua del modulo chiamante; salva solo le etichette mancanti.
- [SaveTransAction](save-trans-action.md) — scrive una chiave nel file di lingua: `execute()` solo dove l'interruttore lo permette, `persist()` sempre (pannello).
- [CleanPlaceholderTranslationsAction](clean-placeholder-translations-action.md) — toglie dai file «solo dati» i segnaposto uguali al nome del campo; cancella i file `.php` senza nome.
