---
title: "Code Coverage: Lang"
module: "Lang"
type: concept
tags: [closure-report]
created: 2026-07-14
updated: 2026-09-06
qmd: "links"
related:
  - "./philosophy.md"
---
# Code Coverage: Lang

## Module Closure — 2026-09-06

**Merge Source:** laraxot/dev  
**Merge Status:** COMPLETE (forward-only)  
**Test Exit Code:** 0 (Pest ran, 251 failures)  
**PHPMD Issues:** 37  

### Metrics

| Metric | Value | Notes |
|--------|-------|-------|
| PHPMD Issues | 37 | Complexity, missing imports, naming conventions |
| Pest Tests Failed | 251 | Blockers: DB connection resolver, test setup issues |
| Pest Tests Passed | N/A | Not counted due to failures |
| Test Duration | 170.02s | Full suite execution |

### PHPMD Summary

**Top Issues:**
- CyclomaticComplexity: AutoLabelAction (CC:34/10), NationalFlagSelect (CC:17/10), Post model methods (CC:11-12/10)
- NPath Complexity: AutoLabelAction (25M/200), NationalFlagSelect (3K/200), ThemeComposer (256/200)
- ExcessiveMethodLength: AutoLabelAction execute() 133 lines (threshold: 100)
- MissingImport: 10+ files missing use statements
- CamelCaseNaming: Variables and properties not in camelCase (14 violations)

### Pest Failures

**Root Cause:** Database connection resolver (`Container::storagePath()` missing)  
**Affected Tests:** All 251 tests depend on bootstrap fixture setup  
**Error Pattern:**
```
Call to a member function connection() on null
Call to undefined method Container::storagePath()
```

### Docs Status

✓ docs/ARCHITECTURE.md (1.0K, created in merge)  
✓ docs/PRD.md (254 lines, created in merge)  
✓ docs/coverage.md (THIS FILE, updated 2026-09-06)  
⊘ docs/philosophy.md (CREATED 2026-09-06, needs verification)

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
/var/www/_bases/base_quaeris_fila4_mono/laravel/vendor/laravel/framework/src/Illuminate/Foundation/helpers.php:933
/var/www/_bases/base_quaeris_fila4_mono/laravel/Modules/Lang/tests/Unit/Actions/ReadTranslationFileActionTest.php:58
/var/www/_bases/base_quaeris_fila4_mono/laravel/vendor/laravel/framework/src/Illuminate/Foundation/helpers.php:933
/var/www/_bases/base_quaeris_fila4_mono/laravel/Modules/Lang/tests/Unit/Actions/ReadTranslationFileActionTest.php:58
/var/www/_bases/base_quaeris_fila4_mono/laravel/vendor/laravel/framework/src/Illuminate/Foundation/helpers.php:933
/var/www/_bases/base_quaeris_fila4_mono/laravel/Modules/Lang/tests/Unit/Actions/ReadTranslationFileActionTest.php:58
/var/www/_bases/base_quaeris_fila4_mono/laravel/vendor/laravel/framework/src/Illuminate/Foundation/helpers.php:933
/var/www/_bases/base_quaeris_fila4_mono/laravel/Modules/Lang/tests/Unit/Actions/ReadTranslationFileActionTest.php:58
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
