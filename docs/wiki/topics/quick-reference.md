---
title: "Topic quick-reference"
type: digest
status: active
qmd: "digest ceiling 100 quick-reference"
---

# Topic quick-reference

Sintesi automatica di 3 documenti (chiave `quick-reference`).

## Lang — quick reference

_Fonte: `bmad/quick-reference.md`_

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

## Guida Rapida alle Traduzioni

_Fonte: `quick-reference.md`_

# Guida Rapida alle Traduzioni

## Struttura Base

```
lang/
├── it/                 # Traduzioni in italiano
│   ├── auth.php        # Testi di autenticazione
│   ├── validation.php  # Messaggi di validazione
│   └── modules/        # Moduli personalizzati
│       ├── patient.php
│       └── doctor.php
└── en/                 # Traduzioni in inglese
    └── ...
```

## Utilizzo Base

### Nei File Blade
```blade
{{ __('Benvenuto, :name', ['name' => $user->name]) }}

{{ __('patient.profile.title') }}
```

### Nei Controller/Classi PHP
```php
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;

## Guida Rapida alle Traduzioni

_Fonte: `wiki/integrations/_da-riconciliare/quick-reference.md`_

# Guida Rapida alle Traduzioni

## Struttura Base

```
lang/
├── it/                 # Traduzioni in italiano
│   ├── auth.php        # Testi di autenticazione
│   ├── validation.php  # Messaggi di validazione
│   └── modules/        # Moduli personalizzati
│       ├── patient.php
│       └── doctor.php
└── en/                 # Traduzioni in inglese
    └── ...
```

## Utilizzo Base

### Nei File Blade
```blade
{{ __('Benvenuto, :name', ['name' => $user->name]) }}

{{ __('patient.profile.title') }}
```

### Nei Controller/Classi PHP
```php
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;
