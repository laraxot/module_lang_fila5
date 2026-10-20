---
title: PHPStan Lang — assert di scopo su test (variable.unused / emptyClosure / alreadyNarrowed)
type: story
module: Lang
status: done
created: 2026-10-20
updated: 2026-10-20
qmd: "phpstan lang test assertions unused result emptyClosure alreadyNarrowed reflection getParentClass"
related:
  - ./phpstan-lang-swarm-wave.story.md
  - ./phpstan-test-wave-lang.story.md
  - ../../../../../bashscripts/docs/prompts/11-phpstan.md
---

# PHPStan Lang — assert di scopo su test

Lane swarm (scope disgiunto Comment/Tenant/Lang). Ground truth: `.cursor-scratch/phpstan-wave/Lang.tsv`.

## Scopo (1 frase)

I test devono verificare il contratto di dominio (`TransCollectionAction`, `TranslatorAdapter`, modelli Lang, `LangServiceProvider`), non solo istanziare variabili.

## Famiglie (TSV → causa → fix)

| Identifier | Scopo | Causa radice | Fix |
|---|---|---|---|
| `variable.unused` `$result` | `TransCollectionAction` mappa/traduce elementi | execute chiamato senza assert sul risultato | `Assert::assertSame` / `assertCount` sul collection result |
| `pest.test.emptyClosure` | Adapter estende Laravel Translator | chiusura vuota | reflection parent + `assertInstanceOf(ReflectionClass)` (narrow da `false`) |
| `variable.unused` `$baseModel` / `$provider` | smoke su BaseModel / provider | variabile creata e non letta | assert comportamentali (connection `lang`, `->name`, lifecycle hooks) |
| `function.impossibleType` / `alreadyNarrowedType` su `Post` / `is_a` | Post estende `Lang\Models\BaseModel` (non `Xot\Models\BaseModel`) | test allineato al parent sbagliato o assert ridondante | parent via `ReflectionClass` + assert sul FQCN Lang |
| `method.nonObject` su `getParentClass()` | parent sempre presente sulle classi note | `assertNotNull` non restringe `ReflectionClass\|false` | `Assert::assertInstanceOf(ReflectionClass::class, $parent)` |

## File toccati

- `tests/Unit/Actions/TransCollectionActionTest.php`
- `tests/Unit/Adapters/TranslatorAdapterTest.php`
- `tests/Unit/Models/BaseModelTest.php`
- `tests/Unit/Models/BaseMorphPivotTest.php`
- `tests/Unit/Models/PostTest.php`
- `tests/Unit/Providers/LangServiceProviderTest.php`

## Verifica

```bash
cd laravel && flock -w 1800 /tmp/phpstan-gate.lock nice -n 10 ./vendor/bin/phpstan analyse \
  Modules/Lang/tests/Unit/Actions/TransCollectionActionTest.php \
  Modules/Lang/tests/Unit/Adapters/TranslatorAdapterTest.php \
  Modules/Lang/tests/Unit/Models/BaseModelTest.php \
  Modules/Lang/tests/Unit/Models/BaseMorphPivotTest.php \
  Modules/Lang/tests/Unit/Models/PostTest.php \
  Modules/Lang/tests/Unit/Providers/LangServiceProviderTest.php \
  --memory-limit=2G --no-progress
```

Esito lane: vedi report coordinatore / `.cursor-scratch/phpstan-wave/lane-ctl-verify.raw`.
