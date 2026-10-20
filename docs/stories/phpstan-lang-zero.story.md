---
title: PHPStan zero errori modulo Lang
type: story
module: Lang
phase: quality gate
status: done
created: 2026-10-20
updated: 2026-10-20
tags: [phpstan, lang, zero-errori, test-helpers, full-tree]
related:
  - ./phpstan-test-wave-lang.story.md
  - ./phpstan-lang-swarm-wave.story.md
  - ./17.4.helper-testcase-dichiarati-mai-scritti.story.md
  - ./services-to-actions-lang.story.md
  - ./12.1.retire-lang-http-switchers.story.md
  - ./7.3.phpstan-paramtype-coverage.story.md
  - ../00-INDEX.md
---

# PHPStan zero errori modulo Lang

## Scopo

Il modulo Lang e' l'infrastruttura i18n: legge/scrive file di traduzione PHP, espone model (`Translation`, `Post`, …) e lo switcher di lingua Filament. PHPStan a zero significa che i contratti tipizzati di quel percorso (action, TestCase, helper Pest) sono coerenti con i chiamanti — non che il debito e' stato nascosto.

## Baseline

Inventario `/tmp/phpstan_by_module/Lang.txt`: **203 errori** (pre-wave1).

| Famiglia | ~N | Dove |
|---|---:|---|
| `function.notFound` | 76 | helper Pest/file (`langAssertDatabaseHasRow`, `makeLangServiceProvider`, `makeReadTranslationFileAction`, …) |
| `method.nonObject` / `argument.type` | ~60 | return `mixed` dopo helper mancanti; `ReadTranslationFileActionTest` |
| `method.notFound` / `staticMethod.notFound` | ~39 | `mockService`, `createTranslationFile`, bind/forget `SaveTransAction` su `TestCase` |
| produzione | 7 | `Change`/`Switcher` `$langs`, `TranslatorService`, `LocaleSwitcherRefresh::applyLocale` |

Vincolo: niente `@phpstan-ignore`, baseline, `assert()`, `@var` cast silenziatori. Fix dello scopo.

## Correzione (per famiglia)

### 1. Harness test — contratto del gate i18n

**Perche' il gate Lang e' diverso**: Lang governa file `lang/*.php`, provider, action di lettura/scrittura e switcher. PHPStan a zero su `Modules/Lang` (e nel full-tree `Modules`) significa che i tipi di quel percorso — produzione e bootstrap test — coincidono con i chiamanti. Non e' un obiettivo cosmetico: e' la prova che i contratti i18n non sono “mixed” o helper fantasma.

**Pest.php** (`Modules/Lang/tests/Pest.php`, namespace globale): function di supporto condivise (`createTranslationFile`, `langAssertDatabaseHasRow`, `createTranslation` / `makeTranslation`, `makeLangBaseModel`, `makeReadTranslationFileAction`, `readTranslationTestFilePath`, `defaultReadTranslationTestData`, …). Non ridefinirle nei file test namespaced → `function.notFound` e cascata `method.nonObject` / `argument.type`.

**TestCase** (`TestCase::makeLangServiceProvider(): LangServiceProvider`): SSoT tipizzato per il provider; i test chiamano `\Modules\Lang\Tests\TestCase::makeLangServiceProvider()`; `Pest.php` espone solo un wrapper globale. Duplicare l'helper nel file test rompe lo stesso contratto.

Indice operativo: [00-INDEX.md](../00-INDEX.md). `phpstan.neon` del repo **non** va esteso con `scanFiles` su Pest (immutabile): la chiusura passa da FQCN su `TestCase` + helper centralizzati in `Pest.php`.

### 2. `TestCase` Lang

Estende `XotBaseTestCase` (da cui arriva `mockService()` tipizzato). Helper statici del modulo:

- `createTranslationFile` — prepara file PHP di traduzione per i test di scrittura
- `bindRealSaveTransAction` / `forgetSaveTransActionOverride` — isolano il container dalla mock di `SaveTransAction`

### 3. `LocaleSwitcherRefresh`

Contratto di dominio: `applyLocale(string $locale)`. Bordo Filament: `normalizeLocale(mixed): string` (fallback `en`). La closure `->action()` compone i due senza passare un blob `array` al dominio. I test chiamano stringhe o `normalizeLocale` esplicitamente.

### 4. Produzione switcher HTTP

`Change.php` / `Switcher.php`: `$langs` come `array<string, array<string, mixed>>`; rimossi `@phpstan-ignore` unmatched su `staticMethod.notFound`. `TranslatorService` non e' piu' nell'albero (allineato a [services-to-actions-lang](./services-to-actions-lang.story.md); il ruolo vivo e' `TranslatorAdapter`).

## Wave2 — residui full-tree (59 → 0)

Inventario `/tmp/phpstan_by_module_w2/Lang.txt`: **59 errori**, tutti in `tests/Unit/Actions/ReadTranslationFileActionTest.php`.

| Identifier | N | Nota |
|---|---:|---|
| `argument.type` | 30 | cascata da return `mixed` degli helper non risolti |
| `function.notFound` | 17 | `readTranslationTestFilePath`, `defaultReadTranslationTestData`, `makeReadTranslationFileAction` |
| `method.nonObject` | 11 | `execute()` / `toPhp()` su `mixed` |
| `offsetAccess.nonOffsetAccessible` | 1 | `$result['auth']` su `mixed` |
| `typeCoverage.*` | **0** | non e' typeCoverage: la soglia globale non attribuiva errori a Lang |

Causa: helper ReadTranslation assenti / non in scope globale al momento del dump w2; `analyse Modules/Lang` da solo restava verde perche' `Pest.php` e' nel path del modulo, mentre il full-tree ripeteva `function.notFound` finche' gli helper non erano in `tests/Pest.php` + `scanFiles`.

Fix wave2:

- Helper ReadTranslation in `tests/Pest.php` (post-wave1).
- `makeLangServiceProvider`: SSoT su `TestCase` (static tipizzato); wrapper in `Pest.php`; nessuna copia in `LangServiceProviderTest.php`.
- Return/new con FQCN `\Modules\Lang\Providers\LangServiceProvider` dove serve (short name in namespace globale → `class.notFound` / return type invalid).
- Nessun ignore/baseline.

## Verifica

```bash
cd laravel && ./vendor/bin/phpstan analyse Modules/Lang --memory-limit=2G --no-progress
# [OK] No errors — file_errors=0

cd laravel && ./vendor/bin/phpstan analyse Modules --memory-limit=2G --no-progress
# [OK] No errors — gate fleet Modules (include Lang nel full-tree)
```

Misura: 2026-10-20. Errori Lang residui (isolato e full-tree `Modules`): **0**.

## Spike parse 12:21 (2026-10-20) — merge, non tipo

Run fleet ~12:21: **153** `file_errors`, identifier `phpstan.parse` (T_SL/T_SR) su `.php` di **Lang, AI e Cms** — marker Git (`<<<<<<<` / `=======` / `>>>>>>>`), non debito tipizzato. Dopo rimozione marker: gate `[OK] No errors`, exit 0. Lane test Lang: [phpstan-test-wave-lang](./phpstan-test-wave-lang.story.md) (run 12:22–12:26 invalidato; verifica 12:28 exit 0).

## Fix 2026-10-20 pm — `makeLangServiceProvider` SSoT su TestCase

Sintomo full-tree: `function.notFound` su `makeLangServiceProvider` in
`LangServiceProviderTest` (+ cascata `method.nonObject`), se l'helper vive solo
come function globale e PHPStan non la vede (o e' stata tolta dal file test
prima di essere in `Pest.php`).

Fix: `TestCase::makeLangServiceProvider(): LangServiceProvider` come SSoT;
i test chiamano `\Modules\Lang\Tests\TestCase::makeLangServiceProvider()`;
`tests/Pest.php` resta wrapper. Non serve `scanFiles` su Pest.php (neon
immutabile). Ignore `#Out of \d+ possible constant types...#` non e' nel neon
HEAD (`ignoreErrors: []` effettivo): se compare unmatched, e' ignore
locale/stale — toglierlo (umano), non zittire `reportUnmatchedIgnoredErrors`.

<!-- gateguard: append to existing story; linked from Lang 00-INDEX; user pasted 80 phpstan errors on makeLangServiceProvider + Out of constant types ignore -->

Rimisura 2026-10-20 ~11:55 (SSoT TestCase): `analyse Modules` → `[OK] No errors`.
Il paste con 79× `function.notFound` e' il file **prima** del rewrite.

## Fix 2026-10-20 pm — merge marker su harness test (wave swarm)

Marker Git sui file test (post-merge) rompevano `phpstan.parse` sul modulo. Risoluzione manuale sui 5 file del lane test: nessun marker residuo; helper duplicati rimossi da `LangServiceProviderTest`, `BaseModelTest` e `ReadTranslationFileActionTest` (chiamate `\helper` → `tests/Pest.php` + `TestCase::makeLangServiceProvider()` SSoT).

## Contesto correlato

Lane precedente sul pull che aveva riscritto i test: [phpstan-test-wave-lang.story.md](./phpstan-test-wave-lang.story.md). Helper mai scritti (storia lunga): [17.4](./17.4.helper-testcase-dichiarati-mai-scritti.story.md). Soglia typeCoverage globale (cieca al gate per-modulo): [7.3](./7.3.phpstan-paramtype-coverage.story.md).

Nota repo: `.gitignore` del modulo contiene `phpstan*`; per tracciare questa story serve `git add -f`.
