---
<<<<<<< .merge_file_vA9DXH
title: "README"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "README"
issues: []
discussions: []
---

# Documentation

This directory contains documentation for the module.

## Structure

- **architecture.md** - Module architecture and design patterns
- **README.md** - This file

## Guidelines

- Gestione file traduzioni Laravel (.php e .json)
- Editor Filament per traduzioni multi-lingua
- Sincronizzazione traduzioni tra lingue
- Helper per traduzioni dinamiche
- Support per traduzioni modulo-specifiche
- Caching traduzioni per performance

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
│   │   └── GetAllTranslationAction.php
│   ├── Services/
│   │   └── TranslationService.php
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
| `TranslationService` | Logica traduzioni | Service |
| `TranslatorAdapter` | Wrapper translator Laravel | Adapter |

## Trait Disponibili

| Trait | Scopo | Utilizzo |
|-------|-------|----------|
| `Modules\Lang\Traits\HasTranslator` | Helper translation lookup | Qualsiasi class |

**Utilizzo**:
```php
use Modules\Lang\Traits\HasTranslator;

class User extends Model
{
    use HasTranslator;
    
    public function greetingMessage(): string
    {
        return $this->trans('user.greeting', ['name' => $this->name]);
    }
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
$message = __('user.welcome', ['name' => 'Mario'], 'it');

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

Configurare lingue in `laravel/config/local/lang/config.php`:

```php
return [
    'default_language' => 'en',
    
    'supported_languages' => [
        'en' => 'English',
        'it' => 'Italiano',
        'de' => 'Deutsch',
        'fr' => 'Français',
    ],
    
    'paths' => [
        'resources' => resource_path('lang'),
        'modules' => base_path('Modules/*/resources/lang'),
    ],
    
    'cache_translations' => true,
    'cache_ttl' => 3600, // 1 hour
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
=======
title: "Lang: README"
type: note
tags: [documentation, lang, translations, filament, autolabel]
created: 2026-09-26
updated: 2026-10-14
qmd: "lang module readme autolabel savetransaction save_missing_translations translator adapter"
issues: []
discussions: []
status: active
---
>>>>>>> .merge_file_ooXEyr

# Lang

Modulo Laraxot `Modules\Lang` (alias `lang`, priorita' 4 in `module.json`). Verificato sul codice il 2026-10-14. Il testo precedente di questo README (Services/TranslationService, trait `HasTranslator`, chiamate statiche `Action::execute([...])`, config in `laravel/config/local/lang/config.php`, `trans_has()`) descriveva classi e file che non esistono ed e' stato sostituito.

## Cosa fa davvero

1. **Etichette automatiche per Filament.** `Providers\LangServiceProvider::registerFilamentLabel()` registra `configureUsing` su `Select`, `Field`, `Entry`, `Section`, `BaseFilter`, `Column`, `Step` e `Action`. Ognuno passa da `Actions\Filament\AutoLabelAction`, che ricava dalla classe chiamante la chiave `<modulo>::<file>.fields|sections|steps|actions.<nome>.<label|placeholder|helper_text|description|icon|tooltip>`, chiama `trans()` e, se la chiave non esiste, la scrive. Per questo nel codice non si usa `->label()` (vedi [filament-label.md](./filament-label.md)).
2. **Scrittura dei file di lingua.** `Actions\SaveTransAction` aggiunge la chiave a `Modules/<Modulo>/lang/<locale>/<file>.php` (percorso da `GetTransPathAction`), con il nome del componente come valore. La chiamano `AutoLabelAction`, `Xot\Filament\Traits\NavigationLabelTrait`, `Xot\Filament\Traits\TransFuncTrait` e la pagina Filament `EditTranslationFile`.
3. **Editor delle traduzioni nel pannello.** `Filament\Resources\TranslationFileResource` (modello Sushi `Models\TranslationFile`), campi `TranslationEditor` e `NationalFlagSelect`, widget `LanguageSwitcherWidget`, componenti Blade `Flag` e `LanguageSwitcher`, `View\Composers\ThemeComposer`.
4. **Action di servizio sui file**: `ReadTranslationFileAction(string $filePath)`, `WriteTranslationFileAction(string $filePath, array $translations): bool` (fa un backup prima), `SyncTranslationsAction($sourceLang = 'it', $targetLangs = ['en','de'], $specificModule = null)`, `MergeTranslationsAction`, `PublishTranslationAction`, `GetAllTranslationAction`, `GetAllModuleTranslationAction`, `TransArrayAction`, `TransCollectionAction`. Sono `QueueableAction`: si istanziano con `app(...)->execute(...)`, non sono statiche.
5. **Modelli**: `Translation`, `LanguageLine`, `Post` (con tabella `translations`), `TranslationFile` (Sushi, nessuna tabella). Migration: `language_lines`, `posts` e `translations` (le ultime due compaiono due volte, con date 2026-01-21 e 2026-08-06: da verificare prima di migrare).

## Attenzione: chi scrive i file di lingua

- Il trigger e' la catena Filament sopra, **non** `__()` o `trans()` da soli. A runtime `app('translator')` e' `Illuminate\Translation\Translator` (tinker, 2026-10-14): `Adapters\TranslatorAdapter` (che registrerebbe le chiavi mancanti nel DB con `RecordMissingTranslationAction`) non e' agganciato, perche' in `LangServiceProvider::boot()` la riga `registerTranslator()` e' commentata e il trait `TranslatorTrait` non e' usato da nessun provider. Quindi oggi una chiave mancante letta con `__()` non crea righe nel DB.
- Interruttore: `SaveTransAction` scrive solo se `Config::get('lang.save_missing_translations', ! app()->runningUnitTests())` e' `true`. `config/lang.php` lo imposta a `true`, ma `config('lang.save_missing_translations')` restituisce `NULL` a runtime (tinker, 2026-10-14): vale il valore di ripiego, cioe' **acceso fuori dai test**. Per spegnerlo in un processo: `config(['lang.save_missing_translations' => false])` (lo fa `Modules/Fixcity/tests/Unit/DcFieldViewsTest.php`).
- Effetto da conoscere: una pagina del front office con campi Filament privi di chiave aggiunge voci segnaposto e puo' creare file vuoti per altre lingue; dopo le prove nel browser controllare `git status` e fare `php -l` sui file di lingua toccati. Un file `return [];` puo' ricevere la riga fuori dall'array (parse error): memoria `lang-autowriter-corrupts-empty-lang-files`.
- Con una chiave presente solo in `it` il ripiego su `it` nasconde la traduzione mancante nelle altre lingue.

## Lingue

Il modulo dichiara `it`, `en`, `de` (`config/lang.php`: `default_locale`, `fallback_locale = 'en'`, `available_locales`). Le lingue pubblicate dal sito vengono da `laravel/config/laravellocalization.php`: a runtime `de,en,es,it`, con `app.locale` e `app.fallback_locale` entrambi `it` (tinker, 2026-10-14). Il modulo ha i file `lang/de|en|it`, non `es`.

## Cosa NON c'e' (verificato 2026-10-14)

- Nessuna rotta (`routes/web.php` e `routes/api.php` vuoti) e nessun comando Artisan del modulo (`lang:publish` e' del framework).
- Nessun `app/Services`, nessun `app/Traits`, nessuna cartella `resources/lang`.
- Nessuna traduzione automatica con motori esterni: la chiave `auto_translate` esiste in `config/lang.php`, nessun file in `Modules/*/app`, `Themes/*/app`, `app/` o `config/` la legge (grep 2026-10-14).

## Test

26 file PHP in `tests/` (Unit: Actions, Adapters, Filament, Models, Providers, View; Feature: `SaveTransActionRespectsSwitchTest`, `LangBusinessLogicTest`). Non eseguiti in questa verifica: `SaveTransAction` scrive nei file di lingua dell'albero di lavoro. Per lanciarli: `bash bashscripts/tools/pest-scratch-db.sh Modules/Lang/tests/Unit/Actions` dalla root del repo, con `APP_CONFIG_CACHE=/nonexistent/config.php` e `DB_DATABASE_LIMESURVEY=` (vedi la nota `pest-scratch-db-needs-config-cache-bypass`), poi `git status` sui lang.

## Dove leggere

Indice: [00-INDEX.md](./00-INDEX.md). Wiki: [wiki/index.md](./wiki/index.md). Story: [stories/](./stories/). Cronologia: [wiki/log.md](./wiki/log.md).

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

- [[BMAD Method](../../../../bashscripts/ai/wiki/concepts/bmad-method.md)]
- [[Context Engineering](../../../../bashscripts/ai/wiki/concepts/context-engineering.md)]
- [[LLM Wiki Governance](../../../../bashscripts/ai/wiki/concepts/llm-wiki-governance.md)]

---
<<<<<<< .merge_file_vA9DXH

title: "README"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "README"
issues: []
discussions: []
**Status**: ✅ Production  
**Last Updated**: 2026-07-14  
**Requirements**: PHP 8.3+, Laravel 13  
**PHPStan Level**: 10 (Compliant)
=======
**Ultima verifica**: 2026-10-14 (Laravel 13.35.0, PHP 8.4.26). Il livello PHPStan non e' stato rimisurato in questa verifica.
>>>>>>> .merge_file_ooXEyr
---
Documentation should be:
- Clear and concise
- Example-driven
- Updated with code changes
- Use Markdown format (.md)
