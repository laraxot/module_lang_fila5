---
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

## Harness minimo: ownership, evidenza e recupero (2026-11-27)

Questo indice appartiene a **module_lang_fila5**: ogni decisione su codice, dominio o tema va nell'ADR del package owner; il root registra soltanto i vincoli di composizione. Un ADR richiede una scelta reale con alternative e conseguenze, più una **Conferma** ripetibile (oppure la dichiarazione esplicita che manca). Non creare ADR fittizi per riempire un indice.

- [Confine LaravelDay/harness Xot](https://github.com/laraxot/module_xot_fila5/blob/dev/docs/adr/0042-laravel-day-harness-adoption-boundary.md); [ownership root](https://github.com/laraxot/base_ptvx_fila5/blob/dev/docs/adr/0001-harness-minimo-e-ownership.md).
- **BMAD**: la story owner-local conserva `scope`, `must_not_change`, `evidence`, `approval_required` nei cambi rischiosi.
- **ECC**: nessun marker di merge; distinguere la prova eseguita dal semplice riferimento a un test; se la conferma non è disponibile segnare `non eseguita`.
- **Second Brain**: QMD/Graphify e `.harness/memory/{facts,lessons}.md` sono puntatori a evidenza datata, non copie degli ADR. [Runbook](https://github.com/laraxot/base_ptvx_fila5/blob/dev/docs/harness/README.md) · [Rollout #15](https://github.com/laraxot/base_ptvx_fila5/issues/15).

## Documenti del package da riconciliare nell'indice

I seguenti file **esistono nel repository su `dev`** e non erano tutti collegati nel ramo d'indice più recente. Sono preservati come puntatori documentali; il loro stato di approvazione, la copertura e l'eventuale sostituzione con ADR numerati devono essere verificati nell'owner. Nessuna prova di esecuzione è implicita.

- [Le etichette Filament vengono dai file di lingua del modulo](./filament-labels-from-module-translation-files.md)
- [Le chiavi mancanti si scrivono nei file solo in locale](./missing-translations-written-only-in-local.md)
