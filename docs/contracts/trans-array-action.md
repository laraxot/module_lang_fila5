---
title: "Contratto — TransArrayAction"
type: contract
action: "Modules\\Lang\\Actions\\TransArrayAction"
module: Lang
status: accepted
updated: 2026-11-26
qmd: "TransArrayAction traduce array elementi chiave base label underscore ripiego originale export intestazioni LANG-TRANSARR"
---

# TransArrayAction

Traduce gli elementi di un array con una chiave base, con ripiego sul valore originale. È la sorgente delle intestazioni tradotte negli export Xot.
Sorgente: `app/Actions/TransArrayAction.php:18-101`.

Test: `cd laravel && vendor/bin/pest Modules/Lang/tests/Unit/Actions/TransArrayActionTest.php` (oppure `--group=LANG-TRANSARR-INV-1`).

## Input

- `array $array`: elementi da tradurre (le chiavi restano).
- `?string $transKey`: chiave base. `null`: solo cast a stringa con `SafeStringCastAction` (`:32-44`).

## Output

- `array<int|string, string>`: stesse chiavi dell'ingresso, valori stringa (`:46-58`). Il ramo che mette `''` per un valore non stringa (`:37`, `:52`) è una guardia
  di tipo: `trans()` e `SafeStringCastAction::cast()` restituiscono sempre `string`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| LANG-TRANSARR-INV-1 | Per ogni elemento prova, in ordine: `<transKey>.<item>.label` (`:79`), poi `<transKey>.<item con . sostituiti da _>` (`:89-90`), altrimenti l'elemento originale (`:99`). Se cade, le intestazioni degli export compaiono in forma grezza. | `LANG-TRANSARR-INV-1` |
| LANG-TRANSARR-INV-2 | Un elemento vuoto o `'0'` resta invariato, senza ricerca (`:74`). | `LANG-TRANSARR-INV-2` |
| LANG-TRANSARR-INV-3 | Le chiavi dell'array in ingresso sono conservate (`Arr::map`). | `LANG-TRANSARR-INV-3` (provato solo con `$transKey = null`) |

## Effetti collaterali

- Imposta la proprietà pubblica `$this->transKey` a ogni chiamata (`:46`): stato condiviso se l'istanza è un singleton del container.
- Lettura delle traduzioni caricate (`trans()`), nessuna scrittura.

## Errori

- Nessuna eccezione propria.

## Non fa

- Differenza rispetto a [trans-collection-action](trans-collection-action.md): qui la prima ricerca usa il suffisso `.label`; la versione Collection cerca la chiave diretta.
- Non scrive le chiavi mancanti: a differenza di [AutoLabelAction](auto-label-action.md), un elemento senza traduzione resta com'è.
- Chiamanti verificati (produzione): `Modules/Xot/app/Exports/CollectionExport.php:83` e `:100`, `Modules/Xot/app/Exports/XotBaseExporter.php:198`.

## Limiti noti

- I test `converts array elements to strings without transKey` (conta solo gli elementi) e quello di INV-3 non provano nulla sul ramo con `$transKey`; INV-1 e INV-2 sono provate
  dal test `TransArrayAction and TransCollectionAction hit label and underscore branches` (`tests/Unit/LangHundredPercentCoverageTest.php:414`), che usa il traduttore reale con `addLines`.
