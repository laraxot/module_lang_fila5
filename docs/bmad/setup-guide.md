---
<<<<<<< .merge_file_3t1E1Q
title: "Lang — setup guide"
type: note
tags: [lang, setup, environment, i18n, localization, mcamara]
created: 2026-09-28
updated: 2026-09-28
qmd: "Lang setup ambiente traduzioni localizzazione mcamara rinvex"
related:
  - ./README.md
  - ./quick-reference.md
  - ./architecture/module-boundary.md
  - ../composer.json
  - ../module.json
---

# Lang — setup guide

> **SUMMARY**: guida per configurare l'ambiente di sviluppo del modulo
> `Modules\Lang`. Copre composer, provider, config, migrazioni e verifica.
> Derivato da `module.json`, `composer.json`, `config/config.php`,
> `config/lang.php`, `app/Providers/LangServiceProvider.php`.

## Prerequisiti

| Requisito | Versione |
|---|---|
| PHP | ^8.3 |
| Laravel | 13 |
| Filament | 5 |

## Installazione dipendenze

Da `laravel/`:

```bash
composer install
```

## Provider

Registrati in `module.json` (priority: 4):

| Provider | File | Note |
|---|---|---|
| `LangServiceProvider` | `app/Providers/LangServiceProvider.php` | estende `XotBaseServiceProvider` |
| `AdminPanelProvider` | `app/Providers/Filament/AdminPanelProvider.php` | Filament admin |
| `LangBasePanelProvider` | `app/Providers/Filament/LangBasePanelProvider.php` | Filament lang base |
| `EventServiceProvider` | `app/Providers/EventServiceProvider.php` | eventi |
| `RouteServiceProvider` | `app/Providers/RouteServiceProvider.php` | route |

### Provider trait

- `app/Providers/Traits/TranslatorTrait.php`
- `app/Providers/TranslatorTraitPhpstanProbe.php`

## Configurazione

### File config

| File | Scopo |
|---|---|
| `config/config.php` | nome (`Lang`), icona (`lang-icon`), navigazione (sort: 50), provider |
| `config/lang.php` | configurazione lingua |

### Lingue supportate

| Lingua | Path |
|---|---|
| English | `lang/en/` |
| Deutsch | `lang/de/` |
| Italian (resources) | `resources/lang/it/` |

## Migrazioni

Da `laravel/` (forward-only, mai `migrate:fresh`):

```bash
php artisan module:migrate Lang
```

| File | Tabella | Dir |
|---|---|---|
| `2024_03_20_000001_create_language_lines_table.php` | `language_lines` | `database/migrations/` |
| `2026_01_21_211814_create_posts_table.php` | `posts` | `database/migrations/` |
| `2026_01_21_211815_create_translations_table.php` | `translations` | `database/migrations/` |
| `2026_08_06_190000_create_posts_table.php` | `posts` | `database/migrations/` |
| `2026_08_06_190100_create_translations_table.php` | `translations` | `database/migrations/` |

Nota: `database/Migrations/` contiene una copia duplicata di
`2024_03_20_000001_create_language_lines_table.php` — non migrare da lì.

## Dipendenze esterne

| Dipendenza | Versione |
|---|---|
| `mcamara/laravel-localization` | * |
| `lara-zeus/spatie-translatable` | * |
| `rinvex/countries` | ^9.1 |
| `spatie/laravel-sluggable` | * |

## Verifica ambiente

```bash
# PHPStan su questo modulo solo
php -d memory_limit=2G ./vendor/bin/phpstan analyse Modules/Lang
# Pest
./vendor/bin/pest Modules/Lang
```

## Vedi anche

- [README](./README.md)
- [Quick reference](./quick-reference.md)
- [Architettura — module boundary](./architecture/module-boundary.md)
- [Epic translation infra](./epics/translation-infrastructure.epic.md)
=======
title: "Lang — BMAD Setup Guide"
description: "Setup e configurazione BMAD per il modulo Lang"
module: "Lang"
alias: "lang"
documentation_date: "2026-09-29"
bmad_version: "6.2.0"
---

# Lang — BMAD Setup Guide

## Scopo

Rendere ripetibile e verificabile l'uso del BMAD Method per il modulo Lang.

## Passi di Setup

```bash
# 1. Dipendenze (da laravel/)
composer install

# 2. Locale dell'applicazione
php artisan lang:publish
#    poi impostare APP_LOCALE=it e APP_FALLBACK_LOCALE=it in .env

# 3. Provider (da composer.json extra.laravel.providers)
#    Modules\Lang\Providers\LangServiceProvider
#    Modules\Lang\Providers\RouteServiceProvider
#    Modules\Lang\Providers\Filament\AdminPanelProvider

# 4. Cache e asset
composer clear
composer fix-storage

# Nota: il sync DB <-> file passa dalle Action
# (SyncTranslationsAction / MergeTranslationsAction), non da comandi Artisan
```

Dipendenze runtime: `mcamara/laravel-localization`, `lara-zeus/spatie-translatable`,
`rinvex/countries`, `spatie/laravel-sluggable`, PHP `^8.3`.

> **Dati sacri**: mai `migrate:fresh`, mai `--force`, mai `RefreshDatabase`.
> Solo migrate additivi. Su host `10.100.200.15` non si lanciano test Pest.

## Cosa è "BMAD" qui (Business Logic)

In questo modulo, BMAD serve a:
- **Garantire completezza**: ogni chiave esiste in tutte le lingue attive
- **Supportare il code review**: una nuova label nasce come chiave, non come testo
- **Abilitare il debug**: sapere se una stringa manca è un bug di chiave o di fallback
- **Governare l'evoluzione**: le strutture dati (`Datas`, `Adapters`, `Casts`) sono versionate

## Best Practices (Pratiche Giuste)

- Documentare prima di implementare: PRD prima di codice
- Estendere XotBase: modelli da `BaseModel` / `BaseModelLang`
- Actions, non Services: I/O e merge in `Actions/` con `execute()`
- PHPStan Level max: nessun `ignoreErrors`
- Traduzioni dai file: `trans('modulo::file.chiave')`, mai label hardcoded
- Array PHP: una chiave per riga
- Tipizzare su `HasTranslationsContract`, mai su `BaseModel`

## Bad Practices (Pratiche Sbagliate — Mai Fare)

- Mai estendere Filament direttamente
- Mai silenziare PHPStan
- Mai hardcode label nelle Resource
- Mai creare Services
- Mai modificare `phpstan.neon`
- Mai scrivere chiavi solo in `it`: `HasStrictTranslations` deve restare verde

## False Friends (Falsi Amici)

| Termine | Sembra Significare | In Realtà Significa |
|---|---|---|
| **LanguageLine** | Riga di lingua | Record DB di una singola chiave tradotta |
| **TranslationFile** | File | Record che descrive un file YAML per modulo/locale |
| **Translation** | Traduzione | Copia locale di un contenuto translatable (`spatie-translatable`) |
| **Action** | Funzione generica | Classe con `execute()` che estende `QueueableAction` |
| **Service** | Servizio generico | **Vietato** in Xot — usare `Actions` |

## Struttura Directory (Canonical)

- **`app/Actions/`**: 12 Action core + `Filament/`, `Translation/`
- **`app/Models/`**: `LanguageLine`, `Translation`, `TranslationFile`, `Contracts/`, `Traits/`
- **`app/Enums/`**, **`app/Datas/`**, **`app/Casts/`**, **`app/Adapters/`**: supporto tipizzato
- **`app/View/Composers/`**, **`app/Providers/Traits/`**: integrazione view e provider
- **`app/Filament/`**: `TranslationFileResource` + `LanguageSwitcherWidget`
- **`lang/{it,en,de}/`**: file di traduzione per modulo
- **`docs/bmad/`**: questa documentazione

---

*Lang · BMAD Setup Guide · data 2026-09-29*
>>>>>>> .merge_file_Fl87z8
