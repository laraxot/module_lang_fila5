---
title: "Contratto — GetAllTranslationAction"
type: contract
action: "Modules\\Lang\\Actions\\GetAllTranslationAction"
module: Lang
status: accepted
updated: 2026-11-26
qmd: "GetAllTranslationAction elenco file traduzione moduli locale sessione TranslationFileRowLoader LANG-ALLTRANS"
---

# GetAllTranslationAction

Elenca i file di traduzione di tutti i moduli per la lingua corrente: è la sorgente delle righe del modello `TranslationFile`
(Sushi) usato dall'editor Lang. Sorgente: `app/Actions/GetAllTranslationAction.php:20-59`. Corpo identico a
[get-all-module-translation-action](get-all-module-translation-action.md): duplicato.

Test: `cd laravel && vendor/bin/pest --group=LANG-ALLTRANS-INV-1`.

## Input

- Nessun argomento. Stessa lettura di sessione e stesso `setLocale` di `get-all-module-translation-action` (`:31-34`).

## Output

- `list<array{key: string, path: string}>`: `key` = `<modulo minuscolo>::<file>`, `path` = percorso assoluto.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| LANG-ALLTRANS-INV-1 | Elenca i file `Modules/*/lang/<locale>/*.php` con chiave `<modulo minuscolo>::<file>`, con la locale corrente dopo l'eventuale override di sessione `it`/`en`. Se cade, l'editor delle traduzioni elenca file della lingua sbagliata. | `LANG-ALLTRANS-INV-1` |

## Effetti collaterali

- `app()->setLocale()` con sessione `it`/`en`: effetto globale sulla richiesta.
- Sola lettura del filesystem (`Safe\glob`).

## Errori

- Nessuna eccezione propria.

## Non fa

- Non deduplica con l'Action gemella.
- Chiamante verificato: `app/Models/Traits/TranslationFileRowLoader.php:35`. `database/seeders/TranslationFileSeeder.php` la cita solo in un commento.

## Limiti noti

- Il group è sul test `tests/Unit/LangHundredPercentCoverageTest.php:159`, che dipende dall'albero reale dei moduli (vedi il limite di
  `get-all-module-translation-action`). I test in `tests/Unit/Actions/GetAllTranslationActionTest.php` asseriscono `count >= 0` e non
  provano nulla: non hanno group.
- Il docblock `@see Modules/Lang/docs/translation-files.md` rimanda a un documento fuori da `docs/contracts/`: nessun conflitto, solo contesto.
