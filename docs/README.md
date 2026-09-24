# Modulo Lang

Gestione centralizzata delle traduzioni Laravel per l'intero monorepo modulare: lettura/scrittura
file di traduzione PHP e JSON, editor Filament per le stringhe multi-lingua, sincronizzazione
delle chiavi tra lingue e traduzioni specifiche per ciascun modulo.

## Struttura della documentazione

- **architecture.md** - Architettura e design pattern del modulo
- **README.md** - Questo file (entry point)

## Linee guida documentazione

- Chiara e concisa
- Basata su esempi
- Aggiornata insieme al codice
- Formato Markdown (.md)

## Funzionalità Principali

- **Translation File Management**: Leggi/scrivi file traduzioni PHP e JSON
- **Translation Editor**: Filament UI per edit traduzioni in real-time
- **Language Sync**: Sincronizza chiavi nuove tra lingue
- **Dynamic Translations**: Runtime translation lookup e fallback
- **Module Translations**: Traduzioni specifiche per ogni modulo
- **Translation Publishing**: Publish traduzioni da moduli a Laravel lang/
- **Translator Adapter**: Wrapper attorno translator di Laravel

## Struttura del Modulo

```
Modules/Lang/
├── app/
│   ├── Actions/
│   │   ├── ReadTranslationFileAction.php
│   │   ├── WriteTranslationFileAction.php
│   │   ├── SyncTranslationsAction.php
│   │   ├── PublishTranslationAction.php
│   │   ├── TranslatorAction.php
│   │   └── GetAllTranslationAction.php
│   ├── Services/
│   │   └── TranslatorService.php
│   ├── Adapters/
│   │   └── TranslatorAdapter.php
│   ├── Datas/
│   │   ├── TranslationData.php
│   │   └── LangData.php
│   ├── Casts/
│   │   └── LangField.php
│   ├── Filament/
│   │   └── Resources/
│   │       ├── TranslationFileResource.php
│   │       └── Pages/
│   └── Models/
│       └── BaseModelLang.php
├── database/
│   ├── migrations/
│   ├── factories/
│   └── seeders/
├── resources/
│   ├── lang/
│   │   ├── en/
│   │   ├── it/
│   │   └── ...
│   └── views/
├── tests/
├── docs/
│   └── README.md
├── module.json
└── composer.json
```

## Componenti Principali

| Classe | Scopo | Tipo |
|--------|-------|------|
| `ReadTranslationFileAction` | Leggi file traduzioni | Action |
| `WriteTranslationFileAction` | Scrivi file traduzioni | Action |
| `SyncTranslationsAction` | Sincronizza tra lingue | Action |
| `PublishTranslationAction` | Publish traduzioni | Action |
| `TranslatorAction` | Translation lookup | Action |
| `TranslatorService` | Logica traduzioni (estende `Illuminate\Translation\Translator`) | Service |
| `TranslatorAdapter` | Wrapper translator Laravel | Adapter |

## Trait Disponibili

| Trait | Scopo | Utilizzo |
|-------|-------|----------|
| `Modules\Lang\Models\Traits\HasStrictTranslations` | Estende `Spatie\Translatable\HasTranslations` con tipi di ritorno più stretti (PHPStan) | Model con campi `spatie/laravel-translatable` |
| `Modules\Lang\Providers\Traits\TranslatorTrait` | Registra `TranslatorAdapter` come translator dell'app nel service provider | Service Provider |

**Utilizzo**:
```php
use Modules\Lang\Models\Traits\HasStrictTranslations;
use Spatie\Translatable\HasTranslations;

class Post extends Model
{
    use HasTranslations;
    use HasStrictTranslations; // overrides getTranslation() with narrower return types
}
```

## Utilizzo Comune

### Scenario 1: Leggere Traduzioni da File

```php
use Modules\Lang\Actions\ReadTranslationFileAction;

$translations = ReadTranslationFileAction::execute([
    'file' => 'user',
    'language' => 'en',
    'module' => 'User', // opzionale
]);

// Result: array associativo chiavi => traduzioni
echo $translations['welcome']; // "Welcome to the app"
```

### Scenario 2: Scrivere Traduzioni

```php
use Modules\Lang\Actions\WriteTranslationFileAction;

WriteTranslationFileAction::execute([
    'file' => 'user',
    'language' => 'it',
    'content' => [
        'welcome' => 'Benvenuto nell\'app',
        'goodbye' => 'Arrivederci',
    ],
    'module' => 'User', // opzionale
]);
```

### Scenario 3: Sincronizzare Traduzioni

```php
use Modules\Lang\Actions\SyncTranslationsAction;

SyncTranslationsAction::execute([
    'file' => 'user',
    'source_language' => 'en',
    'target_languages' => ['it', 'de', 'fr'],
    'missing_keys_only' => true, // solo chiavi nuove
]);
```

### Scenario 4: Usare Translator Helper

```php
use Modules\Lang\Actions\TranslatorAction;

$message = TranslatorAction::execute([
    'key' => 'user.welcome',
    'params' => ['name' => 'Mario'],
    'language' => 'it',
    'default' => 'Welcome :name', // fallback
]);

// Result: "Benvenuto Mario" (se esiste traduzione it)
//         "Welcome Mario" (fallback a English)
```

### Scenario 5: Form Input Traduzioni

```php
use Modules\Lang\Filament\Resources\TranslationFileResource;

// Filament resource automatico per edit traduzioni
// UI: dropdown per lingua + form editor per valori
```

## Configuration

### Language Configuration

Configurare lingue in `Modules/Lang/config/lang.php` (pubblicato come `config('lang.*)`):

```php
return [
    'default_locale' => 'it',
    'fallback_locale' => 'en',
    'available_locales' => ['it', 'en', 'de'],

    'cache' => [
        'enabled' => true,
        'ttl' => 3600, // 1 ora
        'prefix' => 'lang_translations',
    ],
    // ... vedi Modules/Lang/config/lang.php per le sezioni validation/auto_translate/filament/structure
];
```

### Translation File Structure

File traduzioni PHP (standard Laravel):

```php
// resources/lang/en/user.php
return [
    'welcome' => 'Welcome :name',
    'goodbye' => 'Goodbye',
    'role' => [
        'admin' => 'Administrator',
        'user' => 'Regular User',
    ],
];
```

File traduzioni JSON:

```json
{
    "Welcome": "Welcome",
    "Hello {name}": "Hello {name}",
    "user.profile": "User Profile"
}
```

## Filament Translation Editor

### Translation File Resource

Filament resource per edit traduzioni in UI:

```php
TranslationFileResource::class
// Features:
// - List traduzioni files
// - Edit traduzioni per lingua
// - Sincronizzazione missing keys
// - Preview in context
// - Bulk export/import
```

### Usage

```bash
# Accedere Filament admin
/admin/translations

# Edit file traduzioni
# - Seleziona lingua
# - Modifica stringhe
# - Save (auto-write file)
```

## Helper Functions

### trans() Helper Extended

```php
// Standard Laravel
$text = trans('user.welcome', ['name' => 'Mario']);

// With fallback language
$text = trans('user.greeting', ['lang' => 'it'], 'Hello');

// Check translation exists
if (trans_has('user.welcome')) { ... }
```

### Module Translations

```php
// Traduzioni specifiche modulo
$text = trans('User::messages.welcome');

// Load modulo namespace
trans()->addJsonPath(module_path('User/resources/lang'));
```

## Testing

```bash
# Run Lang module tests
./vendor/bin/pest Modules/Lang/tests

# Run the business-logic feature test
./vendor/bin/pest Modules/Lang/tests/Feature/LangBusinessLogicTest.php

# With coverage
./vendor/bin/pest Modules/Lang/tests --coverage
```

## Quality Standards

- **PHPStan**: Level 10 (zero baseline)
- **Test Coverage**: Minimum 80%
- **Code Style**: PSR-12 via Pint

Run locally:
```bash
php -d memory_limit=-1 ./vendor/bin/phpstan analyse --level=max Modules/Lang
./vendor/bin/pest Modules/Lang/tests --coverage
./vendor/bin/pint Modules/Lang
```

## Design Principles

### Single Source of Truth

- Translations stored in single canonical location
- Sync from source (English) to other languages
- Version control translation files

### Lazy Loading

- Cache translations in production
- Reload on-demand for admin changes
- Clear cache on translation publish

### Module Isolation

- Each module has its own translation files
- Lang module publishes to Laravel lang/
- No duplication across modules

## Dipendenze / Moduli Correlati

- [Xot - Framework Base](../../Xot/docs/README.md) — Always dependency
- [User - Authentication](../../User/docs/README.md) — For user-facing strings
- [Cms - Content](../../Cms/docs/README.md) — For content translations
- [Notify - Notifications](../../Notify/docs/README.md) — For email translations

## Documenti Correlati

- [PHPStan Configuration](../../../phpstan.neon)

## Regole Critiche

1. **Always extend Xot base classes** — Never extend Laravel/Filament directly
2. **Use namespace `Modules\Lang`** — Never `app\Lang`
3. **Strict typing** — `declare(strict_types=1);` in all files
4. **One source of truth** — Store translations centrally, not scattered
5. **Cache translations** — Use Laravel cache for performance
6. **Publish before deploy** — Publish translations to resources/lang/
7. **No Log statements** — Let Laravel handle exceptions

## Standard Rules & Workflow

- [[BMAD Method](../../../../docs/wiki/concepts/bmad-method.md)]
- [[Context Engineering](../../../../docs/wiki/concepts/context-engineering.md)]
- [[LLM Wiki Governance](../../../../docs/wiki/concepts/llm-wiki-governance.md)]

---

**Status**: ✅ Production  
**Last Updated**: 2026-07-14  
**Requirements**: PHP 8.3+, Laravel 12  
**PHPStan Level**: 10 (Compliant)
