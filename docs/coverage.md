---
title: "Code Coverage: Lang"
module: "Lang"
type: concept
tags: [links]
created: 2026-07-14
updated: 2026-07-14
qmd: "links"
related:
  - "./italian-text-refined-audit-report.md"
---
# Code Coverage: Lang

**Date:** 2026-01-17
**Date:** 2026-01-17
**Date:** 2026-01-17
**Date:** 2026-01-17
**Lines Coverage:** N/A (Failed to parse)
**Test Exit Code:** 2

## Output

## 2026-09-04 — Mixed type reduction

Task: ridurre l'uso di `mixed` dove il tipo reale e' desumibile dal codice (CLAUDE.md:
"cerchiamo di non usare mixed, quando lo troviamo cerchiamo di sostituirlo con qualcosa
di adeguato"), best-effort ("dove possibile"), non 100% coverage.

**Censimento**: 142 occorrenze di `mixed` su 47 file in `Modules/Lang` (grep `\bmixed\b`
su `*.php`). La maggioranza sono docblock generici `array<string, mixed>` gia' adeguati
(payload di traduzione, valori eterogenei per costruzione — stringhe e array annidati),
o override di firme vendor tipizzate `mixed` (es. `Illuminate\Translation\Translator::get()`
esteso da `TranslatorAction`, `TranslatorAdapter`, `TranslatorService`; l'interfaccia
`CastsAttributes` in `Casts/LangField.php`) che non si possono restringere senza violare
LSP.

**Modifiche applicate** (4 file, tutte native type-hint, nessun docblock-only):
- `app/Actions/Filament/AutoLabelAction.php`: closure `Arr::first(..., function (mixed $item) ...)`
  → `array $item` (il valore viene sempre da `debug_backtrace()`/`array_slice`, sempre array).
- `app/Models/TranslationFile.php`: closure `Arr::map($files, function (mixed $item) ...)`
  → `array $item` (il chiamante `GetAllTranslationAction::execute()` dichiara
  `list<array{key: string, path: string}>`). Rimosso il check `is_array($item)` ridondante
  che PHPStan segnalava come `function.alreadyNarrowedType` dopo la narrowing.
- `app/Models/Traits/HasStrictTranslations.php`: docblock `array<mixed, mixed> $value`
  → `array<array-key, mixed> $value` (le chiavi di un array PHP non sono mai "mixed"
  arbitrario, solo `int|string`).
- `app/Actions/SyncTranslationsAction.php`: stesso fix, `array<mixed, mixed> $arr`
  → `array<array-key, mixed> $arr`.

**Skip motivati** (principali, non esaustivo):
- `Casts/LangField.php` get()/set(): implementa `CastsAttributes<mixed, array<string, mixed>>`,
  contratto vendor.
- `Actions/TranslatorAction.php`, `Adapters/TranslatorAdapter.php`, `Services/TranslatorService.php`
  — `get(mixed $key, ..., mixed $locale = null, mixed $fallback = true)`: override di
  `Illuminate\Translation\Translator::get()` i cui parametri nel vendor sono **non
  tipizzati** (equivalenti a mixed); dichiarare un tipo piu' stretto qui violerebbe la
  compatibilita' del contratto per i chiamanti che passano tramite l'interfaccia Translator.
- `Actions/TransArrayAction.php` e `Actions/TransCollectionAction.php`: `trans(mixed $item): string`
  — chiamato da `Arr::map()`/`Collection::map()` su un array/collection dichiarato
  `array<int|string, mixed>` nel docblock del chiamante: input genuinamente eterogeneo.
- `Filament/Forms/Components/NationalFlagSelect.php` (3 closure `mixed $c`/`mixed $country`):
  valori da `countries()` (pacchetto `rinvex/countries`), la cui firma vendor ritorna
  `array` non generico — ogni elemento e' gia' verificato con `is_array()` a runtime nel
  codice, narrowing non sicuro senza generics upstream.
- `View/Composers/ThemeComposer.php` closure `mixed $item`: valore da `config('laravellocalization.supportedLocales')`,
  payload di configurazione intenzionalmente non tipizzato, validato con `is_array()`
  dentro la closure.
- Resto delle occorrenze (~130): docblock `array<string, mixed>` / `array<int, mixed>`
  su modelli, DTO (`Datas/*`), factory, risorse Filament, fixture di test — shape stabile
  ma genuinamente eterogenea (alberi di traduzione, contenuto JSON/config); lasciati
  invariati.

**PHPStan**: 0 errori prima, 0 errori dopo (`./vendor/bin/phpstan analyse Modules/Lang
--no-progress --error-format=table`). Un tentativo iniziale di narrowing su
`TranslationFile.php` ha introdotto `function.alreadyNarrowedType` (check `is_array()`
ora sempre vero) — risolto rimuovendo il check morto, non con ignore/widening.

**PHPMD**: crash su tutto il modulo (`No node to visit provided for visitAnonymousClass`,
noto/flaky su questo modulo). Rieseguito solo sui 4 file modificati: nessun nuovo finding
imputabile al diff, solo debito preesistente (CyclomaticComplexity/NPath/ExcessiveMethodLength
su `AutoLabelAction::execute()`, `ElseExpression` in piu' punti, `Superglobals` su
`isRunningIdeHelper`, mai toccati da queste modifiche).

**Pest**: `./vendor/bin/pest Modules/Lang/tests -c Modules/Lang/phpunit.xml --no-coverage`.
Verificato con `git stash` che le stesse failure esistono identiche su HEAD non modificato:
`LangBusinessLogicTest` (6 test falliti) e `ReadTranslationFileActionTest` (3 test falliti,
inclusi `boolean_false` non serializzato e helper `createTranslationFile()` non definito)
sono pre-esistenti, non causati da questo diff — confermato eseguendo gli stessi due file
di test con lo stash attivo (diff rimosso): 13 failed/12 passed identici. La suite completa
si interrompe inoltre (way prima della mia modifica) per un `dd()` (`dddx()` in
`Modules/Xot/helpers/Helper.php`) invocato da `app/Actions/SaveTransAction.php:36` durante
alcuni test — comportamento preesistente, file non toccato da questo lavoro, fuori scope
per questo task.

Effetto collaterale osservato e ripulito: l'esecuzione della suite scrive per davvero su
`lang/en/*.php`/`lang/it/*.php` del modulo (side effect dei test, non del codice applicativo
modificato); ripristinati con `git checkout -- lang/ && git clean -fd lang/` prima del commit.

```text
──────────────────────────────────────────────────  
   FAILED  Modules\Lang\tests\Feature\LangBusinessLogicTest > `Lang Business Lo…  Error   
  Call to a member function connection() on null

  at vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php:1980
    1976▕      * @return \Illuminate\Database\Connection
    1977▕      */
    1978▕     public static function resolveConnection($connection = null)
    1979▕     {
  ➜ 1980▕         return static::$resolver->connection($connection);
    1981▕     }
    1982▕ 
    1983▕     /**
    1984▕      * Get the connection resolver instance.

      [2m+9 vendor frames [22m
  10  Modules/Lang/tests/Feature/LangBusinessLogicTest.php:329

  ──────────────────────────────────────────────────────────────────────────────────────  
   FAILED  Modules\Lang\tests\Feature\LangBusinessLogicTest > `Lang Business Lo…  Error   
  Call to a member function connection() on null

  at vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php:1980
    1976▕      * @return \Illuminate\Database\Connection
    1977▕      */
    1978▕     public static function resolveConnection($connection = null)
    1979▕     {
  ➜ 1980▕         return static::$resolver->connection($connection);
    1981▕     }
    1982▕ 
    1983▕     /**
    1984▕      * Get the connection resolver instance.

      [2m+9 vendor frames [22m
  10  Modules/Lang/tests/Feature/LangBusinessLogicTest.php:349

  ──────────────────────────────────────────────────────────────────────────────────────  
   FAILED  Modules\Lang\tests\Unit\Actions\ReadTranslationFileActionTest > `ReadTransl…   
  Failed asserting that exception of type "Error" matches expected exception "Exception". Message was: "Call to undefined method Illuminate\Container\Container::storagePath()" at
. progetto>_fila5_mono/laravel/vendor/laravel/framework/src/Illuminate/Foundation/helpers.php:933
. progetto>_fila5_mono/laravel/Modules/Lang/tests/Unit/Actions/ReadTranslationFileActionTest.php:58
/var/www/_bases/base_modulo questionari_fila4_mono/laravel/vendor/laravel/framework/src/Illuminate/Foundation/helpers.php:933
/var/www/_bases/base_modulo questionari_fila4_mono/laravel/Modules/Lang/tests/Unit/Actions/ReadTranslationFileActionTest.php:58
/var/www/_bases/base_modulo questionari_fila4_mono/laravel/vendor/laravel/framework/src/Illuminate/Foundation/helpers.php:933
/var/www/_bases/base_modulo questionari_fila4_mono/laravel/Modules/Lang/tests/Unit/Actions/ReadTranslationFileActionTest.php:58
/var/www/_bases/base_modulo questionari_fila4_mono/laravel/vendor/laravel/framework/src/Illuminate/Foundation/helpers.php:933
/var/www/_bases/base_modulo questionari_fila4_mono/laravel/Modules/Lang/tests/Unit/Actions/ReadTranslationFileActionTest.php:58
/var/www/_bases/base_modulo questionari_fila4_mono/laravel/vendor/laravel/framework/src/Illuminate/Foundation/helpers.php:933
/var/www/_bases/base_modulo questionari_fila4_mono/laravel/Modules/Lang/tests/Unit/Actions/ReadTranslationFileActionTest.php:58
. progetto>_fila5_mono/laravel/vendor/laravel/framework/src/Illuminate/Foundation/helpers.php:933
. progetto>_fila5_mono/laravel/Modules/Lang/tests/Unit/Actions/ReadTranslationFileActionTest.php:58
.

  ──────────────────────────────────────────────────────────────────────────────────────  
   FAILED  Modules\Lang\tests\Unit\Actions\ReadTranslationFileActionTest > `ReadTransl…   
  Expected: <?php\n
  \n
  return [\n
  ... (6 more lines)

  To contain: Text with\nnewlines

  at Modules/Lang/tests/Unit/Actions/ReadTranslationFileActionTest.php:105
    101▕         $phpContent = $this->action->toPhp($translations);
    102▕ 
    103▕         expect($phpContent)->toContain("Text with \\'single\\' and \\\"double\\\" quotes");
    104▕         expect($phpContent)->toContain('Text with \\\\ backslashes');
  ➜ 105▕         expect($phpContent)->toContain('Text with\\nnewlines');
    106▕     });
    107▕ 
    108▕     test('handles deeply nested arrays', function () {
    109▕         $translations = [

  1   Modules/Lang/tests/Unit/Actions/ReadTranslationFileActionTest.php:105


  Tests:    16 failed, 14 passed (37 assertions)
  Duration: 1.44s


```
```
```
```
```
