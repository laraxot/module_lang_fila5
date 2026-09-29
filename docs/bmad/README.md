<<<<<<< .merge_file_wPU1Wq
---
title: "Lang — BMAD"
type: note
tags: [bmad, index, lang, translations, i18n, localization]
created: 2026-09-28
updated: 2026-09-28
qmd: "Lang BMAD indice documentazione modulo traduzioni localizzazione"
related:
  - ./architecture.md
  - ./brainstorming.md
  - ./epics/module-roadmap.md
  - ./quick-reference.md
  - ./setup-guide.md
  - ./architecture/module-boundary.md
  - ./brainstorming/module-opportunities.md
---

# Lang — BMAD

> **SUMMARY**: indice dei documenti BMAD per il modulo `Modules\Lang`
> (`laravel/Modules/Lang/`), con collegamenti verificati a shard, epiche,
> story e guide. Vedi `laravel/Modules/Xot/docs/bmad-method.md` per il
> metodo BMAD usato nel progetto Laraxot.

## Namespace e providers

- Namespace principale: `Modules\Lang`
- Providers dichiarati in `module.json`:
  - `Modules\Lang\Providers\LangServiceProvider` (`module.json` priority: 4)
  - `Modules\Lang\Providers\Filament\AdminPanelProvider`
  - `Modules\Lang\Providers\Filament\LangBasePanelProvider`
- `LangServiceProvider` estende `Modules\Xot\Providers\XotBaseServiceProvider`
  (`app/Providers/LangServiceProvider.php:25`)

## Documenti canonici BMAD

| Documento | Stato | Note |
|---|---|---|
| [README.md](./README.md) | indice | questo file |
| [architecture.md](./architecture.md) | indice root | punta a `architecture/module-boundary.md` |
| [brainstorming.md](./brainstorming.md) | indice root | punta a `brainstorming/module-opportunities.md` |
| [epics/module-roadmap.md](./epics/module-roadmap.md) | epic roadmap | Epica A/B/C/D con DoD |
| [epics/translation-infrastructure.epic.md](./epics/translation-infrastructure.epic.md) | epic | gestione traduzioni e file |
| [quick-reference.md](./quick-reference.md) | note | comandi, path, pattern rapidi |
| [setup-guide.md](./setup-guide.md) | note | ambiente di sviluppo |

## Shard architettura

- [architecture/module-boundary.md](./architecture/module-boundary.md) —
  inventario `app/` (64 PHP), `tests/` (62), aree e confini verificati.

## Shard brainstorming

- [brainstorming/module-opportunities.md](./brainstorming/module-opportunities.md) —
  domande ad alto valore, ipotesi, rischi.

## Epic

- [epics/module-roadmap.md](./epics/module-roadmap.md) — roadmap epica A/B/C/D.
- [epics/translation-infrastructure.epic.md](./epics/translation-infrastructure.epic.md) —
  epic concreta su gestione traduzioni e file.

## Stories esistenti

- [stories/module-bmad-audit-20260928.story.md](./stories/module-bmad-audit-20260928.story.md)
- [stories/git-status-fleet-merge-markers-lang.story.md](./stories/git-status-fleet-merge-markers-lang.story.md)
- [stories/quality-gates-phpstan-swarm-2026-09-23.story.md](./stories/quality-gates-phpstan-swarm-2026-09-23.story.md)

## Struttura moduliare (file -> responsabilità)

| Area | Path | Responsabilità |
|---|---|---|
| Config | `config/config.php` | icona, navigazione (sort: 50), provider, route |
| Config | `config/lang.php` | configurazione lingua |
| Model | `app/Models/LanguageLine.php` | riga di lingua (`language_lines`) |
| Model | `app/Models/Translation.php` | traduzione (`translations`) |
| Model | `app/Models/TranslationFile.php` | file di traduzione |
| Model | `app/Models/Post.php` | post/blog con slug |
| Model | `app/Models/BaseModel.php` | base modello |
| Model | `app/Models/BaseModelLang.php` | base con traduzioni |
| Model | `app/Models/BaseMorphPivot.php` | pivot morph |
| Model | `app/Models/Contracts/HasTranslationsContract.php` | contratto traduzione |
| Trait | `app/Models/Traits/HasStrictTranslations.php` | gestione traduzioni |
| Trait | `app/Models/Traits/LinkedTrait.php` | link model |
| Resource | `app/Filament/Resources/LangBaseResource` | base resource per traduzioni |
| Resource | `app/Filament/Resources/TranslationFileResource` | CRUD file traduzione |
| Resource Pages | `app/Filament/Resources/Pages/` | `LangBaseCreateRecord`, `LangBaseEditRecord`, `LangBaseListRecords`, `LangBaseViewRecord` |
| Widget | `app/Filament/Widgets/LanguageSwitcherWidget.php` | switcher lingua |
| Action | `app/Actions/TranslatorAction.php` | traduzione principale |
| Action | `app/Actions/GetAllTranslationAction.php` | tutte traduzioni |
| Action | `app/Actions/GetAllModuleTranslationAction.php` | traduzioni modulo |
| Action | `app/Actions/ReadTranslationFileAction.php` | lettura file |
| Action | `app/Actions/WriteTranslationFileAction.php` | scrittura file |
| Action | `app/Actions/SyncTranslationsAction.php` | sincronizza traduzioni |
| Action | `app/Actions/MergeTranslationsAction.php` | merge traduzioni |
| Action | `app/Actions/SaveTransAction.php` | salva traduzione |
| Action | `app/Actions/TransArrayAction.php` | array traduzione |
| Action | `app/Actions/TransCollectionAction.php` | collection traduzione |
| Action | `app/Actions/GetTransPathAction.php` | path traduzione |
| Action | `app/Actions/PublishTranslationAction.php` | pubblica traduzione |
| Action | `app/Actions/Translation/RecordMissingTranslationAction.php` | registra mancante |
| Action | `app/Actions/Filament/AutoLabelAction.php` | label automatiche |
| Adapter | `app/Adapters/TranslatorAdapter.php` | adattatore traduttore (estende LaravelTranslator) |
| View Comp | `app/View/Components/Flag.php` | flag lingua |
| View Comp | `app/View/Components/LanguageSwitcher.php` | switcher lingua |
| View Comp | `app/View/Composers/ThemeComposer.php` | composer tema |
| Cast | `app/Casts/LangField.php` | cast campo lingua |
| Migrations | `database/migrations/` | 5 file (`language_lines`, `posts`, `translations`) |
| Migrations | `database/Migrations/` | 1 file duplicato (`language_lines`) |
| Lang | `lang/de/`, `lang/en/` | 2 lingue, chiavi `translation`, `translation_file`, `actions` |
| Resources Lang | `resources/lang/it/` | lingua IT aggiuntiva |
| Tests | `tests/` | 62 file (Unit + Feature + Filament) |

## Dipendenze esterne (da `composer.json`)

| Dipendenza | Versione |
|---|---|
| `mcamara/laravel-localization` | * |
| `lara-zeus/spatie-translatable` | * |
| `rinvex/countries` | ^9.1 |
| `spatie/laravel-sluggable` | * |

## Vedi anche

- [README](./README.md)
- [Architettura — module boundary](./architecture/module-boundary.md)
- [Brainstorming — module opportunities](./brainstorming/module-opportunities.md)
- [Epic roadmap](./epics/module-roadmap.md)
- [Epic translation infra](./epics/translation-infrastructure.epic.md)
- [Quick reference](./quick-reference.md)
- [Setup guide](./setup-guide.md)
- [BMAD method (Xot)](../../Xot/docs/bmad-method.md)
=======
# Lang Module

Modulo del sistema PTVX per la gestione delle risorse umane e valutazione delle performance nelle pubbliche amministrazioni.

## Descrizione

Il modulo Lang si occupa di [DESCRIZIONE DA COMPLETARE].

## Dipendenze

- Xot (core)
- User (gestione utenti)
- Lang (internazionalizzazione)

## Come contribuire

1. Fork del repository
2. Creare un branch per la feature/fix
3. Seguire le convenzioni di codifica (PSR-12, array una chiave per riga)
4. Eseguire i test: 
5. Aprire una pull request

## Struttura

- `app/`: Codice sorgente (azioni, risorse, widget, ecc.)
- `database/`: Migrazioni e seeders
- `resources/`: Viste, lang, assets
- `docs/`: Documentazione (questo file)
- `tests/`: Test unitari e di integrazione

## Licenza

Proprietario - Laraxot
>>>>>>> .merge_file_l9hMwG
