---
id: Lang/module-bmad-audit-20261116
title: "Lang: audit modulare completo"
status: ready-for-dev
module: Lang
epic: module-governance
priority: P1
created: 2026-09-28
updated: 2026-11-16
references:
  - ../architecture/module-boundary.md
  - ../brainstorming/module-opportunities.md
  - ../epics/module-roadmap.md
type: story
tags: [docs, lang, bmad]
qmd: "story lang audit bmad module governance"
---
# Story: Lang — audit modulare completo

Come manutentore del modulo Lang (i18n/translation layer per PTVX), voglio un audit verificato sul codice reale, così da avere una baseline BMAD con finding numerati, rischi e next steps prioritizzati.

> Baseline originale del 2026-09-28 integrata con l'audit del 2026-11-16.

## Contesto e scope

Audit completo del modulo `laravel/Modules/Lang`: struttura `app/`, `database/migrations`, `lang/` (4 lingue), `tests/` Pest, compliance Filament 5 e convenzioni Xot. PHPStan eseguito il 2026-11-16.

## Conteggi misurati

- Modelli: 19 (`Models/Contracts`, `Models/Policies`, `Models/Traits`)
- Actions: 18 (`Actions/Filament`, `Actions/Translation`)
- Services: 0 — conforme alla convenzione Xot
- Listeners: 0 · Policies: 4
- Filament: 21 file — 2 Resource (LangBaseResource, TranslationFileResource), 2 Page, 1 Widget + Forms/Actions
- Test Pest: 51 file PHP in `tests/` (23 Unit + 4 Feature + fixtures), ~290 blocchi `test()/it()`
- Migrazioni: 20 · Route file: 3 · Lingue lang: 4 (de, en, es, it)
- PHPStan (`Modules/Lang`, level max): **0 errori**

## Findings

### Struttura

1. Struttura pulita: Actions, Adapters, App, Casts, Console, Datas, Enums, Filament, Http, Models, Phpstan probes, Providers, View. `app/App` e `app/Casts` (es. `LangField`) sono estensioni specifiche del dominio.
2. `app/Phpstan/TraitProbes.php` — probe PHPStan dedicato, coerente con il pattern usato anche in Job.
3. `resources/` ha 289 file — da verificare la quota di view/asset vs documentazione.

### Qualità codice

4. `mixed` in 7 file `app/` — quasi tutti imposti da contratti LSP (`Casts/LangField` docblock esplicito) o boundary di traduzione (`TransCollectionAction`, `TransArrayAction`, `CleanPlaceholderTranslationsAction`, `LocaleSwitcherRefresh::normalizeLocale`). Accettabile e documentato.
5. Nessun `property_exists`, nessun `@phpstan-ignore`, nessun TODO/FIXME in `app/`, nessuna estensione diretta di classi Filament, nessun `Filament\Forms\Form` legacy.

### Compliance Filament

6. **`->label()` in 5 file** — la maggior parte sono label dinamiche per chiavi di traduzione (`TranslationEditor.php`, `TranslationFileResource/*`, `TranslationFileForm.php`) dove la label *è* la chiave i18n da modificare: uso legittimo, non hardcoded. Verificare eccezione per `LocaleSwitcherRefresh.php:34` — `->label('Seleziona lingua')` hardcoded in italiano: **violazione reale** della regola no-filament-labels.
7. `->placeholder()` in 1 file (`LangServiceProvider.php:51`) — imposta placeholder localizzato via `__()`, accettabile.
8. `AutoLabelAction.php:139` scrive `'FIX:'.$label_key` come label — flag di debug che non dovrebbe raggiungere produzione.

### Test

9. ~290 test in 51 file; 4 Feature + 23 Unit + 19 Fixtures. Copertura proporzionata al modulo; nessun test vuoto `expect(true)` rilevato.
10. Verificare coverage dei flow critici: risoluzione traduzioni, switcher locale, auto-registrazione comandi console, cast `LangField`.

### i18n

11. 4 lingue (de, en, es, it); `it/` 46 file vs `en/` 34 — verificare parità delle chiavi per le aree Filament esposte (`translation_file`, `locale_switcher`).
12. Il modulo è l'infrastruttura i18n stessa: eventuali chiavi mancanti si propagano a tutti i moduli — priorità alta su parità it/en.

### Docs

13. `docs/bmad/` ricco e maturo: README.md, 00-index.md, architecture/, audits/, brainstorming/, bugfix/, epics/, plans/, stories/. Nessun marker di merge attivo nel codice; marker `<<<<<<<` solo in documenti storici (stories di cleanup, inventory wiki).
14. Documentazione molto estesa e in parte duplicata (`advanced-language-switching.md` + `advanced_language_switching.md`, `automatic-translations.md` + `automatic_translations.md`, `cms-link.md` + `cms_link.md`) — candidato a dedup in story di hygiene docs.
15. Nessun `.md` con data/timestamp nel nome dentro `docs/bmad/` del modulo.

## Rischi

- Label hardcoded `'Seleziona lingua'` in `LocaleSwitcherRefresh` viola la regola e non si traduce.
- `'FIX:'` prefix in `AutoLabelAction` è un residuo di debug.
- Documentazione duplicata (kebab vs snake_case) frammenta la ricerca QMD/second brain.
- Essendo modulo i18n core, regressioni qui impattano tutta la piattaforma.

## Next steps (priorizzati)

1. **[P1]** Sostituire `->label('Seleziona lingua')` in `LocaleSwitcherRefresh.php` con label tradotta via Lang.
2. **[P1]** Rimuovere o finalizzare il flag `'FIX:'` in `AutoLabelAction.php:139`.
3. **[P2]** Deduplicare i documenti bmad con doppioni kebab/snake_case.
4. **[P2]** Verificare parità chiavi lang it/en per le aree Filament del modulo.
5. **[P3]** Aggiornare `docs/sprint-status.yaml` con lo stato reale del modulo.
