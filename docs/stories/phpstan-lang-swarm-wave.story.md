---
title: PHPStan Lang swarm wave (verify)
type: story
module: Lang
status: done
created: 2026-10-20
updated: 2026-10-20
qmd: "phpstan lang swarm wave verify TranslatorService Livewire switchers Pest TestCase"
related:
  - ./phpstan-test-wave-lang.story.md
  - ./services-to-actions-lang.story.md
  - ./17.4.helper-testcase-dichiarati-mai-scritti.story.md
  - ../../../../../bashscripts/docs/prompts/11-phpstan.md
  - ../../../../../bashscripts/docs/prompts/46-multi-agent-module-swarm.md
---

# PHPStan Lang swarm wave

Lane owned: i 14 path in `.cursor-scratch/phpstan-wave/Lang.files` (baseline TSV 119 errori).

## Scopo

Portare `Modules/Lang` a zero errori PHPStan senza ignore/baseline/cast. Capire prima lo scopo di `TranslatorService`, switcher Livewire e harness Pest, poi tipizzare o allineare i contratti.

## Esito lane

| Voce | Valore |
|---|---|
| Baseline TSV | 119 errori / 14 file |
| Edit di questa lane | **0** (tutti i file owned erano gia' corretti o caldi da peer) |
| Saltati (hot/locked) | nessuno al momento della verify; i 4 file produzione erano stati toccati da peer poco prima |
| `TranslatorService.php` | gia' cancellato (codice morto; vedi [services-to-actions-lang](./services-to-actions-lang.story.md)) |
| Verify | `phpstan analyse Modules/Lang` → **EXIT 0**, nessun messaggio errore |

Analisi causa-per-causa e attribuzione peer: [phpstan-test-wave-lang.story.md](./phpstan-test-wave-lang.story.md) (non duplicata qui).

## Famiglie chiuse (riassunto)

1. **Test harness** — `TestCase` estende `XotBaseTestCase` (`mockService`); helper `createTranslationFile` / `bindRealSaveTransAction` / `forgetSaveTransActionOverride`; Pest senza modello fantasma `Language`.
2. **Pest style** — `Assert::assert*` al posto di higher-order / `toBeInstanceOf` ridondanti; `assertNotNull` su `fresh()`; colonne reali di `TranslationFile`.
3. **Safe** — `Safe\chmod` / `Safe\file_put_contents` / `Safe\unlink` nei test fixture.
4. **Produzione** — `$langs` tipizzato; ignore non corrispondente rimosso; closure LocaleSwitcher passa `array{locale: mixed}` a `applyLocale`.
5. **TranslatorService** — eliminato: scopo in `TranslatorAdapter` + `RecordMissingTranslationAction`.

## Verifica riproducibile

```bash
cd laravel && nice -n 10 ./vendor/bin/phpstan analyse Modules/Lang \
  --memory-limit=2G --no-progress --error-format=raw \
  > ../.cursor-scratch/phpstan-wave/Lang.verify.txt 2>&1
```

Output: solo `Note: Using configuration file .../phpstan.neon.` e `EXIT:0`.

## File owned (nessun edit da questa lane)

- `app/Filament/Actions/LocaleSwitcherRefresh.php` — peer
- `app/Http/Livewire/Lang/Change.php` — peer
- `app/Http/Livewire/Lang/Switcher.php` — peer
- `app/Services/TranslatorService.php` — assente (decisione services→actions)
- `tests/TestCase.php`, `tests/Pest.php`, feature/unit listed in Lang.files — peer / blob ciclo ottobre
