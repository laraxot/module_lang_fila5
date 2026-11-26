---
title: "Contratto — TransCollectionAction"
type: contract
action: "Modules\\Lang\\Actions\\TransCollectionAction"
module: Lang
status: accepted
updated: 2026-11-26
qmd: "TransCollectionAction traduce collection elementi chiave base underscore ripiego originale export intestazioni LANG-TRANSCOL"
---

# TransCollectionAction

Versione su `Collection` di [trans-array-action](trans-array-action.md). Sorgente: `app/Actions/TransCollectionAction.php:18-80`.

Test: `cd laravel && vendor/bin/pest Modules/Lang/tests/Unit/Actions/TransCollectionActionTest.php` (oppure `--group=LANG-TRANSCOL-INV-1`).

## Input

- `Collection $collection`.
- `?string $transKey`: `null` = solo cast a stringa (`:32-34`).

## Output

- `Collection<int|string, string>`, chiavi conservate (`map`, `:38`).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| LANG-TRANSCOL-INV-1 | Prova in ordine `<transKey>.<item>` (senza `.label`, `:59`), poi la forma con `_` (`:68-69`), altrimenti l'originale (`:78`). Se cade, le intestazioni degli export compaiono in forma grezza. | `LANG-TRANSCOL-INV-1` |
| LANG-TRANSCOL-INV-2 | Un elemento vuoto o `'0'` resta invariato (`:54`). | `LANG-TRANSCOL-INV-2` (provato solo con `''`; `'0'` non ha un test) |

## Effetti collaterali

- Imposta `$this->transKey` a ogni chiamata (`:36`), come la versione array.
- Lettura delle traduzioni caricate, nessuna scrittura.

## Errori

- Nessuna eccezione propria.

## Non fa

- Non scrive le chiavi mancanti.
- Non cerca il suffisso `.label`.
- Chiamanti verificati (produzione): `Modules/Xot/app/Exports/QueryExport.php:96` e `Modules/Xot/app/Exports/LazyCollectionExport.php:93`.

## Limiti noti

- Esiste una seconda classe con lo stesso nome corto, `Modules/Xot/app/Actions/Collection/TransCollectionAction.php:18`: chi la importa sbagliata ottiene un comportamento diverso senza
  errore. Non verificato quale delle due sia attesa dai chiamanti elencati: tutti importano `Modules\Lang\Actions\TransCollectionAction` (`QueryExport.php:19`, `LazyCollectionExport.php:15`).
- Il test di INV-1/INV-2 è condiviso con la versione array: `tests/Unit/LangHundredPercentCoverageTest.php:414`.
