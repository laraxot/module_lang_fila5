---
title: "Contratto — RecordMissingTranslationAction"
type: contract
action: "Modules\\Lang\\Actions\\Translation\\RecordMissingTranslationAction"
module: Lang
status: accepted
updated: 2026-11-26
qmd: "RecordMissingTranslationAction traduzione mancante database firstOrCreate translator adapter namespace group item LANG-MISS"
---

# RecordMissingTranslationAction

Registra nel database una chiave di traduzione mancante. Sorgente: `app/Actions/Translation/RecordMissingTranslationAction.php:21-56`.

Test: `cd laravel && vendor/bin/pest --group=LANG-MISS-INV-2`.

## Input

- `string $key`: `<namespace>::<gruppo>.<voce>`, oppure `<gruppo>.<voce>`, oppure `<gruppo>` (`parseKey`, `:40-55`).
- `string $locale`.

## Output

- `void`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| LANG-MISS-INV-1 | Una riga per combinazione `(lang, namespace, group, item)`: `firstOrCreate` (`:29-34`). Se cade, ogni chiamata aggiunge un duplicato. | — (non dimostrato) |
| LANG-MISS-INV-2 | Senza `::` il namespace è `*`; senza `.` l'`item` è `null`. Se cade, la riga finisce con namespace e gruppo sbagliati. | `LANG-MISS-INV-2` |

## Effetti collaterali

- Una SELECT e, se assente, una INSERT sul modello `Models/Translation`. Nessuna transazione.

## Errori

- Le eccezioni del database si propagano.

## Non fa

- Non scrive nei file di lingua. Non traduce.
- Chiamante verificato (produzione): `app/Adapters/TranslatorAdapter.php:102`. L'adattatore non è registrato: `registerTranslator()` è commentata in
  `LangServiceProvider::boot()` (`app/Providers/LangServiceProvider.php:43`), quindi oggi l'Action non gira in produzione.

## Limiti noti

- `firstOrCreate` non è atomico: due richieste concorrenti possono creare duplicati. `rg unique database/migrations/*translation*` non trova indici univoci
  nelle migrazioni di `translations` (verificato 2026-11-26).
- INV-1 non ha un test: `LangHundredPercentCoverageTest.php:279` chiama l'Action con tre chiavi diverse e conta 3 righe, ma non la richiama con la stessa chiave.
