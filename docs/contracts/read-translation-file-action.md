---
title: "Contratto — ReadTranslationFileAction"
type: contract
action: "Modules\\Lang\\Actions\\ReadTranslationFileAction"
module: Lang
status: accepted
updated: 2026-11-26
qmd: "ReadTranslationFileAction legge file traduzione require array toPhp rendering PHP LANG-READ"
---

# ReadTranslationFileAction

Legge un file di traduzione PHP e ne rende il contenuto come codice PHP. Sorgente: `app/Actions/ReadTranslationFileAction.php:16-105`.
Due responsabilità nello stesso file: lettura (`execute`, `:28-55`) e rendering (`toPhp`, `:63-70`).

Test: `cd laravel && vendor/bin/pest Modules/Lang/tests/Unit/Actions/ReadTranslationFileActionTest.php` (oppure `--group=LANG-READ-INV-4`).

## Input

- `execute(string $filePath)`: percorso di un file che restituisce un array.
- `toPhp(array $translations)`: array con chiavi stringa (annidate incluse).

## Output

- `execute`: `array<string, mixed>`, il valore restituito dal file.
- `toPhp`: stringa `<?php\n\nreturn [...];\n`, indentata a 4 spazi.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| LANG-READ-INV-1 | File inesistente: `\Exception` «File di traduzione non trovato» (`:30-32`). Se cade, `require` produce un warning PHP invece di un errore leggibile. | `LANG-READ-INV-1` |
| LANG-READ-INV-2 | File non leggibile: `\Exception` «non leggibile» (`:34-36`). | `LANG-READ-INV-2` (il test salta se gira come root: i bit di permesso non si applicano) |
| LANG-READ-INV-3 | Il file deve restituire un array: altrimenti `\Exception` «non valido» (`:41-43`). | `LANG-READ-INV-3` |
| LANG-READ-INV-4 | `toPhp` produce chiavi e valori con escape, array annidati come `[...]` indentati, valori scalari via `SafeStringCastAction` (`:79-104`). Se cade, il file scritto da [write-translation-file-action](write-translation-file-action.md) cambia significato o non si carica. | `LANG-READ-INV-4` |

## Effetti collaterali

- `execute` esegue il codice del file con `require` (`:39`). Il modello di fiducia assume file di lingua del progetto.
- Nessuna scrittura.

## Errori

- `\Exception` per file mancante, non leggibile, non array (INV-1..3).
- `Webmozart\Assert\InvalidArgumentException` per chiavi non stringa, nel file letto (`:48`) o annidate in `toPhp` (`:89`): non dimostrato da un test.

## Non fa

- Non verifica la sintassi dell'output di `toPhp`: lo fa `write-translation-file-action` prima di scrivere.
- Non scrive il file.
- Chiamante verificato (produzione) per `toPhp`: `WriteTranslationFileAction` (`app/Actions/WriteTranslationFileAction.php:39-40`). `execute` non ha chiamanti fuori dai test.

## Limiti noti

- Il test di INV-2 (`throws exception for unreadable file`) è marcato `skip` quando l'utente è root: nelle esecuzioni come root la regola non viene provata.
