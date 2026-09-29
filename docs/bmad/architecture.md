<<<<<<< .merge_file_JVDgJY
---
title: "Lang — architecture"
type: architecture
tags: [lang, architecture, module-boundary, translations, models, resources]
created: 2026-09-28
updated: 2026-09-28
qmd: "Lang architettura componenti modelli risorse provider traduzioni"
related:
  - ./README.md
  - ./architecture/module-boundary.md
  - ./brainstorming.md
  - ./epics/module-roadmap.md
  - ./epics/translation-infrastructure.epic.md
---

# Lang — architecture

> **SUMMARY**: indice della documentazione architetturale per
> `Modules\Lang`. Il dettaglio del confine modulare, inventario `app()`/`tests()`
> e decisioni di progetto sono nei **shard** sottostanti (non sovrascritti).
> Questo file root funge da indice e non duplica il contenuto dei shard.

## Shard architettura

| Shard | Descrizione |
|---|---|
| [architecture/module-boundary.md](./architecture/module-boundary.md) | inventario `app/` (64 PHP), `tests/` (62), aree applicative, confini e decisioni da confermare |

## Provider

| Provider | File | Note |
|---|---|---|
| `LangServiceProvider` | `app/Providers/LangServiceProvider.php` | estende `XotBaseServiceProvider` (priority: 4) |
| `AdminPanelProvider` | `app/Providers/Filament/AdminPanelProvider.php` | Filament admin |
| `LangBasePanelProvider` | `app/Providers/Filament/LangBasePanelProvider.php` | Filament lang base |
| `EventServiceProvider` | `app/Providers/EventServiceProvider.php` | eventi |
| `RouteServiceProvider` | `app/Providers/RouteServiceProvider.php` | route |

### Provider traits

- `app/Providers/Traits/TranslatorTrait.php`
- `app/Providers/TranslatorTraitPhpstanProbe.php`

## Modelli

| Modello | File | Estende | Tabella |
|---|---|---|---|
| `LanguageLine` | `app/Models/LanguageLine.php` | `BaseModel` | `language_lines` |
| `Translation` | `app/Models/Translation.php` | `BaseModel` | `translations` |
| `TranslationFile` | `app/Models/TranslationFile.php` | `BaseModel` | — |
| `Post` | `app/Models/Post.php` | `BaseModel` | `posts` |
| `BaseModel` | `app/Models/BaseModel.php` | `XotBaseModel` | — |
| `BaseModelLang` | `app/Models/BaseModelLang.php` | `BaseModel` | — |
| `BaseMorphPivot` | `app/Models/BaseMorphPivot.php` | — | — |

### Traits modello

| Trait | File |
|---|---|
| `HasStrictTranslations` | `app/Models/Traits/HasStrictTranslations.php` |
| `LinkedTrait` | `app/Models/Traits/LinkedTrait.php` |

### Trait subdirs

- `app/Models/Traits/Extras/`
- `app/Models/Traits/Mutators/`
- `app/Models/Traits/Relationships/`
- `app/Models/Traits/Scopes/`

## Contratti

| Contratto | File |
|---|---|
| `HasTranslationsContract` | `app/Models/Contracts/HasTranslationsContract.php` |

## Resource Filament

| Resource | File |
|---|---|
| `LangBaseResource` | `app/Filament/Resources/LangBaseResource.php` |
| `TranslationFileResource` | `app/Filament/Resources/TranslationFileResource/` |

### Resource pages

| Page | File |
|---|---|
| `LangBaseCreateRecord` | `app/Filament/Resources/Pages/LangBaseCreateRecord.php` |
| `LangBaseEditRecord` | `app/Filament/Resources/Pages/LangBaseEditRecord.php` |
| `LangBaseListRecords` | `app/Filament/Resources/Pages/LangBaseListRecords.php` |
| `LangBaseViewRecord` | `app/Filament/Resources/Pages/LangBaseViewRecord.php` |

## Widget

| Widget | File |
|---|---|
| `LanguageSwitcherWidget` | `app/Filament/Widgets/LanguageSwitcherWidget.php` |

## View components e cast

| Component | File |
|---|---|
| `Flag` | `app/View/Components/Flag.php` |
| `LanguageSwitcher` | `app/View/Components/LanguageSwitcher.php` |
| `ThemeComposer` | `app/View/Composers/ThemeComposer.php` |
| `LangField` (cast) | `app/Casts/LangField.php` |

## Adapter

| Adapter | File | Estende |
|---|---|---|
| `TranslatorAdapter` | `app/Adapters/TranslatorAdapter.php` | `LaravelTranslator` |

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
| `SaveTransAction` | `app/Actions/SaveTransAction.php` | salva |
| `GetTransPathAction` | `app/Actions/GetTransPathAction.php` | path |
| `PublishTranslationAction` | `app/Actions/PublishTranslationAction.php` | pubblica |
| `TransArrayAction` | `app/Actions/TransArrayAction.php` | array |
| `TransCollectionAction` | `app/Actions/TransCollectionAction.php` | collection |
| `RecordMissingTranslationAction` | `app/Actions/Translation/RecordMissingTranslationAction.php` | registra mancante |
| `AutoLabelAction` | `app/Actions/Filament/AutoLabelAction.php` | label auto |

## Persistenza

| Area | Path | Note |
|---|---|---|
| Migrations | `database/migrations/` | 5 file |
| Migrations (duplicato) | `database/Migrations/` | 1 file duplicato |
| Factories | `database/factories/` | — |
| Seeders | `database/seeders/` | — |

## Test

| Area | Path | Conteggio |
|---|---|---|
| Unit/Actions | `tests/Unit/Actions/` | ~12 file |
| Unit/Models | `tests/Unit/Models/` | ~7 file |
| Unit/Adapters | `tests/Unit/Adapters/` | 1 file |
| Unit/Filament | `tests/Unit/Filament/` | 2 file |
| Unit/Providers | `tests/Unit/Providers/` | 1 file |
| Unit/Services | `tests/Unit/Services/` | 1 file |
| Unit/View | `tests/Unit/View/` | 1 file |
| Feature | `tests/Feature/` | 2 file |
| Fixtures | `tests/Fixtures/` | ~15 file |
| **Totale** | `tests/` | **62 file** |

## Config

| File | Scopo |
|---|---|
| `config/config.php` | nome, icona, navigazione, provider |
| `config/lang.php` | configurazione lingua |

## Dipendenze esterne

| Dipendenza | Versione | Fonte |
|---|---|---|
| `mcamara/laravel-localization` | * | `composer.json` |
| `lara-zeus/spatie-translatable` | * | `composer.json` |
| `rinvex/countries` | ^9.1 | `composer.json` |
| `spatie/laravel-sluggable` | * | `composer.json` |

## Vedi anche

- [README](./README.md)
- [Brainstorming](./brainstorming.md)
- [Epic roadmap](./epics/module-roadmap.md)
- [Epic translation infra](./epics/translation-infrastructure.epic.md)
- [Quick reference](./quick-reference.md)
- [Setup guide](./setup-guide.md)
- [BMAD method (Xot)](../../Xot/docs/bmad-method.md)
=======
# Architettura del modulo Lang

## Overview

[DA COMPLETARE]

## Componenti principali

### Actions
Azioni eseguibili (Queueable Actions) per la logica di business.

### Resources
Risorse Filament per il pannello di amministrazione.

### Widget
Widget Filament per dashboard e pannelli.

### Models
Modelli Eloquent per l'interazione con il database.

### Contracts
Interfacce per l'iniezione di dipendenze.

## Flussi di dati

[DA COMPLETARE]

## Pattern utilizzati

- Action invece di Service
- Filament Widget invece di Livewire
- Array una chiave per riga
- Schema-driven Forms (XotBaseSchemaWidget)
>>>>>>> .merge_file_YH6c8f
