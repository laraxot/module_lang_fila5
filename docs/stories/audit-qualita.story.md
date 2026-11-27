---
title: "Audit qualità modulo Lang"
type: story
status: review
module: Lang
issue: https://github.com/laraxot/base_techplanner_fila5/issues/64
created: 2026-11-19
updated: 2026-11-19
tags: [audit, qualita, phpstan, pest, docs]
---

# Audit qualità — modulo Lang

## Baseline

- PHPStan `Modules/Lang`: 0 errori (prima e dopo).
- Pest `Modules/Lang/tests`: 187 falliti / 84 passati → 31 falliti / 239 passati.

## Trovato

- **Nessun test girava dentro l'applicazione.** `tests/Pest.php` usava `uses(TestCase::class)->in('Feature', 'Unit')`
  con percorsi relativi; il file viene incluso da `laravel/tests/Pest.php` e Pest risolve i relativi rispetto a
  quel file (`Backtrace::testFile()`), quindi il binding puntava a `laravel/tests/Feature|Unit`.
- **La suite sporcava l'albero di lavoro.** `SyncTranslationsAction` riscriveva ogni file di lingua
  di destinazione anche quando non mancava nessuna chiave, e senza `declare(strict_types=1);`:
  15 file `lang/en/*.php` comparivano modificati in `git status` dopo ogni run.
- Due file `lang/{it,en}/should_not_write.php` versionati per errore: scritti da un test che usava una chiave
  di config non più letta (`lang.persist_trans_in_tests`).
- `config/lang.php` e `docs/scopo.md` descrivevano una guardia di `SaveTransAction` che non esiste più.

## Fatto

- `tests/Pest.php`: `in(__DIR__.'/Feature', __DIR__.'/Unit')`.
- `SyncTranslationsAction`: scrive solo se il file manca o se il merge aggiunge chiavi; intestazione con
  `declare(strict_types=1);`. Dopo la suite completa `lang/` resta pulito.
- `LangFinalGapsTest`: usa `lang.save_missing_translations`; rimossi i due `should_not_write.php`.
- `TransArrayAction::execute()`: tolti i cicli di filtro superflui (`Arr::map` conserva le chiavi e le callback
  restituiscono già `string`). Comportamento invariato. `AutoLabelAction`/`SaveTransAction` non toccate.
- Commento in `config/lang.php` e nota in [scopo](../scopo.md) allineati al codice.
- Docs: 9 file con data nel nome e 20 con trattino finale (residuo di una vecchia rinomina) rinominati o fusi;
  126 duplicati byte-identici rimossi; `INDEX.md` vuoto e `readme.md` (copia stantia di `README.md`, citava un
  `TranslatorAction` inesistente) rimossi; stub `legacy/*.md` che puntavano a file inesistenti sostituiti dal
  contenuto reale; link verso doc Xot rinominate corretti dove il bersaglio è univoco. Indice unico: [index.md](../index.md).

## Resta

- 31 test falliti: test "coverage boost" non più allineati al codice (metodi privati rinominati, mock con
  ruoli diversi, `GetTransPathAction` legato all'ordine dei moduli). Vanno riscritti sullo scopo, non sul dettaglio.
- `Models/TranslatableModel` non ha sottoclassi in questo progetto (modulo condiviso: verificare altrove).
- ~200 link verso doc Xot non più esistenti, senza un sostituto univoco.
