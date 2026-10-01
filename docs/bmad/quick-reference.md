---
<<<<<<< .merge_file_ARI7Il
title: "Lang — quick reference"
type: note
tags: [lang, quick-reference, translations, i18n, localization, actions]
created: 2026-09-28
updated: 2026-09-28
qmd: "Lang quick reference traduzioni azioni adapter localizzazione"
related:
  - ./README.md
  - ./setup-guide.md
  - ./architecture/module-boundary.md
---

# Lang — quick reference

> **SUMMARY**: riferimento rapido per lo sviluppo su `Modules\Lang`:
> modelli, action traduzione, adapter, resource Filament, widget e config.
> Tutto derivato da file reali del modulo.

## Namespace e providers

- Namespace: `Modules\Lang`
- Provider principale: `Modules\Lang\Providers\LangServiceProvider`
  (`app/Providers/LangServiceProvider.php:25`, estende `XotBaseServiceProvider`)

## Modelli principali

| Modello | File | Estende | Tabella |
|---|---|---|---|
| `LanguageLine` | `app/Models/LanguageLine.php` | `BaseModel` | `language_lines` |
| `Translation` | `app/Models/Translation.php` | `BaseModel` | `translations` |
| `TranslationFile` | `app/Models/TranslationFile.php` | `BaseModel` | — |
| `Post` | `app/Models/Post.php` | `BaseModel` | `posts` |
| `BaseModel` | `app/Models/BaseModel.php` | `XotBaseModel` | — |
| `BaseModelLang` | `app/Models/BaseModelLang.php` | `BaseModel` | — |
| `BaseMorphPivot` | `app/Models/BaseMorphPivot.php` | — | — |

## Traits modello

| Trait | File |
|---|---|
| `HasStrictTranslations` | `app/Models/Traits/HasStrictTranslations.php` |
| `LinkedTrait` | `app/Models/Traits/LinkedTrait.php` |

### Trait modello (subdirs)

- `app/Models/Traits/Extras/`
- `app/Models/Traits/Mutators/`
- `app/Models/Traits/Relationships/`
- `app/Models/Traits/Scopes/`

## Contratti

| Contratto | File |
|---|---|
| `HasTranslationsContract` | `app/Models/Contracts/HasTranslationsContract.php` |

## Action principali

| Action | File | Scopo |
|---|---|---|
| `TranslatorAction` | `app/Actions/TranslatorAction.php` | traduzione principale |
| `GetAllTranslationAction` | `app/Actions/GetAllTranslationAction.php` | tutte traduzioni |
| `GetAllModuleTranslationAction` | `app/Actions/GetAllModuleTranslationAction.php` | traduzioni modulo |
| `ReadTranslationFileAction` | `app/Actions/ReadTranslationFileAction.php` | lettura file |
| `WriteTranslationFileAction` | `app/Actions/WriteTranslationFileAction.php` | scrittura file |
| `SyncTranslationsAction` | `app/Actions/SyncTranslationsAction.php` | sincronizza |
| `MergeTranslationsAction` | `app/Actions/MergeTranslationsAction.php` | merge |
| `SaveTransAction` | `app/Actions/SaveTransAction.php` | salva traduzione |
| `GetTransPathAction` | `app/Actions/GetTransPathAction.php` | path traduzione |
| `PublishTranslationAction` | `app/Actions/PublishTranslationAction.php` | pubblica |
| `TransArrayAction` | `app/Actions/TransArrayAction.php` | array traduzione |
| `TransCollectionAction` | `app/Actions/TransCollectionAction.php` | collection |
| `RecordMissingTranslationAction` | `app/Actions/Translation/RecordMissingTranslationAction.php` | registra mancante |
| `AutoLabelAction` | `app/Actions/Filament/AutoLabelAction.php` | label automatiche |

## Adapter

| Adapter | File | Estende |
|---|---|---|
| `TranslatorAdapter` | `app/Adapters/TranslatorAdapter.php` | `LaravelTranslator` |

### Provider trait

- `app/Providers/Traits/TranslatorTrait.php`
- `app/Providers/TranslatorTraitPhpstanProbe.php`

## Resource Filament

| Resource | Directory |
|---|---|
| `LangBaseResource` | `app/Filament/Resources/LangBaseResource.php` |
| `TranslationFileResource` | `app/Filament/Resources/TranslationFileResource/` |
| `Pages/LangBaseCreateRecord` | `app/Filament/Resources/Pages/LangBaseCreateRecord.php` |
| `Pages/LangBaseEditRecord` | `app/Filament/Resources/Pages/LangBaseEditRecord.php` |
| `Pages/LangBaseListRecords` | `app/Filament/Resources/Pages/LangBaseListRecords.php` |
| `Pages/LangBaseViewRecord` | `app/Filament/Resources/Pages/LangBaseViewRecord.php` |

## Widget

| Widget | File |
|---|---|
| `LanguageSwitcherWidget` | `app/Filament/Widgets/LanguageSwitcherWidget.php` |

## View components

| Component | File |
|---|---|
| `Flag` | `app/View/Components/Flag.php` |
| `LanguageSwitcher` | `app/View/Components/LanguageSwitcher.php` |
| `ThemeComposer` | `app/View/Composers/ThemeComposer.php` |

## Casts

| Cast | File |
|---|---|
| `LangField` | `app/Casts/LangField.php` |

## Config

| File | Scopo |
|---|---|
| `config/config.php` | nome, icona (`lang-icon`), navigazione (sort: 50) |
| `config/lang.php` | configurazione lingua |

## Lang files

| Lingua | Path |
|---|---|
| Deutsch | `lang/de/` |
| English | `lang/en/` |
| Italian (resources) | `resources/lang/it/` |

## Comandi rapidi (da laravel/)

```bash
php -d memory_limit=2G ./vendor/bin/phpstan analyse Modules/Lang
./vendor/bin/pint Modules/Lang
./vendor/bin/pest Modules/Lang
```

## Vedi anche

- [README](./README.md)
- [Setup guide](./setup-guide.md)
- [Architettura — module boundary](./architecture/module-boundary.md)
- [Epic translation infra](./epics/translation-infrastructure.epic.md)
=======
title: "Lang — BMAD Quick Reference"
description: "Comandi rapidi BMAD per il modulo Lang"
module: "Lang"
alias: "lang"
documentation_date: "2026-09-29"
bmad_version: "6.2.0"
---

# Lang — BMAD Quick Reference

## Comandi Rapidi

### Help

```bash
bmad-help
```

### Workflow Lang

```bash
# Phase 1
bmad-domain-research      # Studio dominio: i18n, locale, pluralizzazione
bmad-technical-research   # Fattibilità sync file di traduzione ↔ DB

# Phase 2
bmad-create-prd           # PRD: gestione traduzioni, lingue attive, fallback
bmad-create-architecture  # Architettura LanguageLine ↔ file YAML

# Phase 3
bmad-create-epics-and-stories            # Epic: chiavi, sync, widget switcher
bmad-check-implementation-readiness      # Quality gate

# Phase 4
bmad-sprint-planning      # Sprint iniziale
bmad-create-story         # Story: TranslationFileResource
bmad-dev-story            # Implementazione
bmad-code-review          # Review con focus chiavi mancanti e fallback
```

### Agenti per Lang

| Agente | Skill | Scopo |
|--------|-------|-------|
| Mary (analyst) | `skill: "bmad-agent-analyst"` | ricerca pratiche i18n |
| John (pm) | `skill: "bmad-agent-pm"` | PRD chiavi e lingue |
| Winston (architect) | `skill: "bmad-agent-architect"` | architettura DB/file |
| Amelia (dev) | `skill: "bmad-agent-dev"` | implementazione Actions |
| Quinn (qa) | `skill: "bmad-agent-qa"` | test chiavi mancanti, sync, locale |

## Classi Chiave

### Actions (`app/Actions/`)

| Action | Ruolo |
|--------|-------|
| `GetAllTranslationAction` | Tutte le traduzioni del modulo |
| `GetAllModuleTranslationAction` | Traduzioni aggregate per modulo |
| `GetTransPathAction` | Risolve il path del file di traduzione |
| `ReadTranslationFileAction` | Legge il file YAML |
| `WriteTranslationFileAction` | Scrive il file YAML |
| `MergeTranslationsAction` | Merge di più sorgenti |
| `SyncTranslationsAction` | Sincronizza DB ↔ file |
| `SaveTransAction` | Salvataggio di una chiave |
| `PublishTranslationAction` | Pubblicazione delle traduzioni |
| `TransArrayAction` / `TransCollectionAction` | Accesso a array e collection |
| `TranslatorAction` | Wrapper su `trans()` |
| **`Actions/Filament/`**, **`Actions/Translation/`** | Sottodomini dedicati |

### Models (`app/Models/`)

`LanguageLine`, `Translation`, `TranslationFile`, `Post`, `BaseModel`, `BaseModelLang`,
`BaseMorphPivot` — contracts in `Models/Contracts/HasTranslationsContract`.

### Filament 5

- **Resources**: `TranslationFileResource` (da `LangBaseResource`), `Pages/`
- **Widget**: `LanguageSwitcherWidget`

## Pattern del Modulo

- Le chiavi sono `modulo::file.chiave` — mai stringhe hardcoded nelle UI
- `HasTranslationsContract` è il contratto da tipizzare (mai `BaseModel`)
- `HasStrictTranslations` fallisce se una chiave esiste solo in `it` e non nelle altre lingue
- Supporto multi-lingua: `it`, `en`, `de` (più `es`, `fr`, `nb_NO` dove presenti)
- Sorgenti DB: `LanguageLine`; sorgenti file: `lang/<locale>/`

## Verifica

```bash
cd laravel

php -d memory_limit=2G ./vendor/bin/phpstan analyse Modules/Lang
./vendor/bin/pest Modules/Lang
./vendor/bin/pint
```

## Quick Flow

```bash
bmad-quick-dev "Aggiungi chiave mancante in de"
bmad-quick-spec "Specifica comportamento fallback per chiave assente"
```

> Il modulo non espone comandi Artisan: il sync DB ↔ file passa da
> `SyncTranslationsAction` / `MergeTranslationsAction`.

---

*Lang · BMAD Quick Reference · data 2026-09-29*
>>>>>>> .merge_file_B6J1n7
