---
title: "Lang — PHPStan Level 10 fixes (2026-10-06)"
type: story
module: Lang
status: in_progress
created: 2026-10-06
updated: 2026-10-06
phase: quality-gates
priority: P1
related:
  - cluster3-phpstan-swarm-20261006.story.md
---

# Lang — PHPStan Level 10 fixes (2026-10-06)

## Scopo funzionale

Lang modulo: gestire traduzioni (`Translation`, `LanguageLine`), sincronizzarle tra file e DB, sincronizzazione batch via `SyncTranslationsAction`, esposizione UI (`TranslationFileResource`, `LocaleSwitcherRefresh`), auto-label componenti Blade e Filament.

## Errori PHPStan trovati (131 totali)

### Categoria 1: Model @mixin e fasade DB (7 errori, 4 fixati)
- **LanguageLine.php:43** — `@mixin \Eloquent` — FIX: cambiato in `\Illuminate\Database\Eloquent\Model`
- **Post.php:108** — `@mixin \Eloquent` — FIX: cambiato in `\Illuminate\Database\Eloquent\Model`
- **Translation.php:59** — `@mixin \Eloquent` — FIX: cambiato in `\Illuminate\Database\Eloquent\Model`
- **Translation.php:108, 113** — `DB::getDriverName()`, `DB::raw()` — FIX: aggiunto `use Illuminate\Support\Facades\DB;`
- **TranslationFile.php:44** — `@mixin \Eloquent` — FIX: cambiato in `\Illuminate\Database\Eloquent\Model`

### Categoria 2: View components render() type (4 fixati)
- **Flag.php:22, 32** — `$view` unresolvable type, render() return — FIX: `@var string`, cast result
- **LanguageSwitcher.php:37, 40, 50, 53** — `@var view-string` — FIX: `@var string` per tutte

### Categoria 3: Actions firstOrCreate (3 segnalati)
- **RecordMissingTranslationAction.php:25** — `Translation::firstOrCreate()` undefined — FIX: aggiunto `@method firstOrCreate()` su model
- **TranslatorAction.php:63** — `Translation::firstOrCreate()` undefined
- **TranslatorService.php:74** — `Translation::firstOrCreate()` undefined

### Categoria 4: WriteTranslationFileAction (3 fixati)
- **Lines 115, 121, 122** — Cannot call method flush() on mixed — FIX: type guard `@var object`

### Categoria 5: Remaining (110+ errori, skip per now)
- Filament methods (placeholder type, offset access)
- TranslationData mixed types
- Test files (70+ Pest internal class warnings)

## Fix applicati

### 1. Translation.php
```php
// Aggiunto import
use Illuminate\Support\Facades\DB;

// Aggiunto @method
@method static EloquentBuilder<static>|Translation firstOrCreate(array $attributes = [], array $values = [])

// Fixato @mixin
@mixin \Illuminate\Database\Eloquent\Model

// Usato DB facade directly
$select = match (DB::getDriverName()) { ... }
return $query->select(DB::raw($select));
```

### 2. LanguageLine, Post, TranslationFile
```php
// Cambiato
@mixin \Eloquent
// a
@mixin \Illuminate\Database\Eloquent\Model
```

### 3. Flag component
```php
// Da
@phpstan-var view-string $view

// A
@var string $view
$view = (string) app(GetViewAction::class)->execute();
```

### 4. LanguageSwitcher component
```php
// Sia linea 37 che 50, cambiato
@var view-string
// a
@var string
```

### 5. WriteTranslationFileAction
```php
// Da
app('cache')->flush();

// A
/** @var object $cache */
$cache = app('cache');
if (method_exists($cache, 'flush')) {
    $cache->flush();
}
```

## Verifica

Tutti i file modificati passano `php -l`:
```bash
php -l Modules/Lang/app/Models/Translation.php ✓
php -l Modules/Lang/app/Models/LanguageLine.php ✓
php -l Modules/Lang/app/Models/Post.php ✓
php -l Modules/Lang/app/Models/TranslationFile.php ✓
php -l Modules/Lang/app/View/Components/Flag.php ✓
php -l Modules/Lang/app/View/Components/LanguageSwitcher.php ✓
php -l Modules/Lang/app/Actions/WriteTranslationFileAction.php ✓
```

## Learning points

1. **@mixin corretto**: usare `\Illuminate\Database\Eloquent\Model` (classe), non `\Eloquent` (facade)
2. **Facade resolution**: importare esplicitamente `use Illuminate\Support\Facades\DB;`
3. **View factory return**: Laravel `view()` ritorna `Factory|View`, specificare il tipo in @var
4. **Builder methods in @method**: aggiungere `@method static EloquentBuilder<static>|Model methodName()`
5. **Mixed handling**: usare type guards (method_exists, @var cast) prima di chiamare metodi

## Prossimi step

- Rieseguire PHPStan per valutare riduzione errori
- Fissare TranslationData mixed types (10+ errori)
- Fissare test files Pest warnings (skip for now, low priority)
- Commit finale con documentazione aggiornata

## Correlazioni

Questo fix segue il pattern di altre correzioni PHPStan Level 10:
- Rating module (2026-10-06): 10 errori fixati con builder generics
- Incentivi module: auth type narrowing
- Ptv module: query builder type assertions

