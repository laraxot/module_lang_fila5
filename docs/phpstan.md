---
title: "PHPStan nel modulo Lang"
module: "Lang"
type: pattern
tags: [phpstan, traduzioni, filament, contratti]
created: 2026-07-14
updated: 2026-08-24
qmd: "lang phpstan traduzioni filament contratti"
related:
  - "./stories/7.1.phpstan-translation-contracts.story.md"
  - "../../User/docs/stories/5.1.user-lang-phpstan-debt.story.md"
---
# PHPStan nel modulo Lang

Questa pagina è il punto DRY corrente per i contratti statici Lang. La precedente
story combinata User/Lang 5.1 è superseded per lo scope Lang dalla story locale 7.1;
User conserva la propria ownership separata.

## Gate canonico

```bash
cd laravel
php -d memory_limit=-1 ./vendor/bin/phpstan analyse Modules/Lang --no-progress
```

Non sono ammessi baseline, ignore, configurazioni per-modulo o test esclusi. I test
sono parte dello stesso gate del codice applicativo.

## Boundary delle traduzioni

- Le funzioni Laravel di traduzione possono restituire stringhe o array: componenti
  Filament e modelli devono normalizzare il risultato secondo il loro contratto UI.
- `AutoLabelAction` mantiene l'unione concreta dei componenti supportati e separa la
  ricerca del caller dalla mutazione di label/icon.
- `TranslationEditor` tratta array annidati come sezioni ricorsive e valori scalari
  come campi foglia, senza asserzioni tautologiche.
- `TranslationFile` espone contenuto strutturato e distingue l'esecuzione ide-helper
  dalla lettura runtime.
- Seeder e Action riusano i contratti esistenti; la logica riutilizzabile vive in
  Queueable Actions, non in nuovi Services.

## Verifica scoped

L'analisi scoped comprende `AutoLabelAction`, l'intero albero `app/Filament`, i tre
modelli, i due seeder e i due test dichiarati dalla story. Serve a validare
l'ownership, ma non sostituisce il gate module-wide.

```bash
./vendor/bin/pest \
  Modules/Lang/tests/Unit/Actions/ReadTranslationFileActionTest.php \
  Modules/Lang/tests/Unit/Models/BaseModelLangTest.php --no-coverage
```

Le fixture devono coprire file mancante/non leggibile, contenuto non-array, array
vuoto e annidato, caratteri speciali, numeri e conservazione dell'ordine delle chiavi.

PHPMD può essere indisponibile se PDepend installato non è compatibile con la firma
Symfony DependencyInjection corrente. Il problema del toolchain va registrato a
parte e non giustifica soppressioni PHPStan.

## Test harness: baseline 103 → 0

La story 7.2 ha chiuso i residui nei sei file test senza modificare configurazione o
codice applicativo. I pattern canonici emersi sono:

- primitive `Safe\*` per file temporanei, con controllo `is_file()` prima del cleanup;
- `TestCase::createTranslationFile()` dal contesto Pest, mai `self::` fuori classe;
- `Assert::assertIsArray()` e verifica delle chiavi al boundary di config, facade,
  reflection e risultati Action prima degli offset;
- intersection `Model&MockInterface` quando un partial mock usa sia Eloquent sia
  aspettative Mockery;
- `DataCollection::toCollection()` prima delle operazioni collection deprecate;
- asserzioni su contenuto e side effect al posto di `assertTrue(true)`, controlli
  `method_exists()` sempre veri o assert sul solo tipo già noto.

Gate confermati il 24 agosto 2026: PHPStan Lang zero; 102 test mirati passati con
347 asserzioni.

## Collegamenti

- [Story canonica Lang 7.1](stories/7.1.phpstan-translation-contracts.story.md)
- [Story test harness Lang 7.2](stories/7.2.phpstan-test-harness-contracts.story.md)
- [Audit testi italiani](italian-text-refined-audit-report.md)
