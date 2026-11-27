---
<<<<<<< .merge_file_wrcdWZ
title: "ADR del modulo Lang"
type: index
tags: [adr, decisioni, lang, translations]
created: 2026-11-18
updated: 2026-11-24
---

# ADR del modulo Lang

Il **perché** di come Lang porta i testi nel pannello Filament: le etichette nascono dai file di lingua del modulo che
usa il componente (non da `->label()` nel codice), e le chiavi mancanti diventano scritture su file solo in ambiente
locale, perché un file di lingua riscritto a runtime può mandare in 500 la produzione e sporcare l'albero sotto test.

Leggili prima di: scrivere etichette in una Resource, toccare `AutoLabelAction`, `SaveTransAction` o
`LangServiceProvider::registerFilamentLabel()`, o cambiare la configurazione `lang.save_missing_translations`.

Formato (cinque sezioni, `type: decision`, nome file senza date né numeri) e regole:
[action-behavioral-contract](../../../Xot/docs/rules/action-behavioral-contract.md).

## Indice

- [Le etichette Filament vengono dai file di lingua del modulo](filament-labels-from-module-translation-files.md) — `configureUsing` + `AutoLabelAction` su ogni componente; niente `->label()` nelle Resource.
- [Le chiavi mancanti si scrivono nei file solo in locale](missing-translations-written-only-in-local.md) — `execute()` dietro l'interruttore (default `isLocal()`), `persist()` per il pannello; mai segnaposto ausiliari.
=======
title: "ADR — Lang"
type: index
status: active
owner: Lang
module: Lang
tags: [adr, decisioni]
created: 2026-11-18
updated: 2026-11-26
qmd: "Lang ADR architecture decision record MADR formato localizzazione etichette traduzioni stato copertura"
---

# ADR — Lang

Un ADR del modulo Lang registra una scelta difficile da invertire, sorprendente o frutto di un trade-off reale su localizzazione, traduzioni e cambio lingua. Ogni affermazione ha un file di prova. Template condiviso: [0000-template](../../../Xot/docs/adr/0000-template.md); standard: [Xot ADR](../../../Xot/docs/adr/README.md).

## Formato MADR

Frontmatter (`title`, `type: decision`, `status`, `created`, `updated`, `module`, `decision-makers`, `qmd`) e sezioni nell'ordine: `## Contesto`, `## Driver della decisione`, `## Alternative scartate`, `## Decisione`, `## Conseguenze`, `## Conferma`. La Conferma è un test esistente, un comando eseguibile da `laravel/` o una regola di revisione; se non c'è, lo dice («Nessuna conferma automatica oggi; proposta: …»). Se il codice contraddice l'ADR si aggiunge `## Stato attuale` (caso di 0004). Nome file `NNNN-kebab-case.md`, senza date.

## ADR presenti

Elenco completo con stato: [INDEX.md](INDEX.md) (indice machine-readable: [index.md](index.md)).

| ADR | Decisione | Conferma |
|---|---|---|
| [0001-cambio-lingua-con-url-localizzato](0001-cambio-lingua-con-url-localizzato.md) | cambio lingua con URL localizzato | test (`LanguageSwitcherWidgetTest`), con due invarianti non provate |
| [0002-translation-key-shape](0002-translation-key-shape.md) | forma esplicita della chiave e ownership del catalogo | solo regola di revisione |
| [0003-filament-labels-are-autoconfigured-by-lang-provider](0003-filament-labels-are-autoconfigured-by-lang-provider.md) | le etichette Filament si configurano da `LangServiceProvider` | test (`AutoLabelActionContractTest`), rami limite non asseriti |
| [0004-filament-labels-from-module-translation-files](0004-filament-labels-from-module-translation-files.md) | etichette Filament dai file di lingua del modulo via `configureUsing` | test + regola di revisione; ha `## Stato attuale` |
| [0005-lang-owns-localization-data](0005-lang-owns-localization-data.md) | Lang possiede i dati di localizzazione | test (`LangServiceProviderTest`, `LangConfigDataTest`) + regola di revisione |
| [0006-language-switcher-standalone-view](0006-language-switcher-standalone-view.md) | vista language switcher standalone con URL precomputati | test (`LangCoverageBoostTest`), resa Folio non provata |
| [0007-missing-translations-written-only-in-local](0007-missing-translations-written-only-in-local.md) | chiavi mancanti scritte solo in locale | test (`SaveTransAction*Test`) |

I path kebab senza numero (`lang-owns-localization-data.md`, `language-switcher-standalone-view.md`) sono stub
`status: superseded` (con `superseded_by`) che puntano ai canonici `0005`/`0006`; non si cancellano per non rompere i link storici.

Policy trasversale su dati sacri e test isolati: [0013-dati-sacri-migrazioni-e-test](../../../Xot/docs/adr/0013-dati-sacri-migrazioni-e-test.md).

## Stato di copertura

Misura del 2026-11-26, su 7 ADR vivi e 2 stub.

- 6 ADR su 7 hanno almeno un test come Conferma; 1 (`0002`) ha solo regole di revisione. Nessuno dei sette è provato per intero: i limiti sono scritti nella sezione Conferma di ciascuno.
- Lo script citato prima da `0002` (`bashscripts/tools/i18n/check-key-shape.py`) non esisteva: tolto (`audit-locales.py` è l'unico strumento in `bashscripts/tools/i18n`).
- Pest non è stato eseguito in questa revisione: i comandi nelle Conferme sono quelli giusti per i test indicati, ma non ho il verde.

## Decisioni aperte

- `0002` ripete in forma locale Xot ADR [0037](../../../Xot/docs/adr/0037-translation-key-protocol.md) (stessa forma di chiave, `decision-makers: [Xot, Lang]`): tenerlo o marcarlo `superseded`?
- `0003` e `0004` descrivono la stessa scelta (le etichette Filament si configurano con `configureUsing` dai file di lingua del modulo): fonderli?
- `INDEX.md` e `index.md` in questa cartella sono due file quasi identici che differiscono solo per le maiuscole: su filesystem insensibili alle maiuscole collidono.
>>>>>>> .merge_file_JcjN1o
