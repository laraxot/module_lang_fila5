---
title: "Contratto — ListLocaleOptionsAction"
type: contract
action: "Modules\\Lang\\Actions\\ListLocaleOptionsAction"
module: Lang
status: accepted
updated: 2026-11-26
qmd: "ListLocaleOptionsAction etichette lingue bandiera nome nativo laravellocalization supportedLocales selettore LANG-LOCOPT"
---

# ListLocaleOptionsAction

Produce le etichette dei selettori di lingua: bandiera dal codice regionale e nome nativo. Sorgente: `app/Actions/ListLocaleOptionsAction.php:20-64`.

Test: `cd laravel && vendor/bin/pest Modules/Lang/tests/Unit/Datas/LangConfigDataTest.php` (oppure `--group=LANG-LOCOPT-INV-1`).

## Input

- `?array $codes`: codici da elencare, nell'ordine dato. `null`: tutte le lingue di `laravellocalization.supportedLocales` (`:30-31`).

## Output

- `array<string, string>`: `codice => "<bandiera> <Nome nativo>"`, con il trim finale (`:41`). Il nome nativo ha la prima lettera maiuscola (`Str::ucfirst`, `:40`).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| LANG-LOCOPT-INV-1 | Le chiavi seguono l'ordine di `$codes`; con `null` l'ordine di `supportedLocales`. Se cade, i selettori mostrano le lingue in un ordine diverso da quello scelto nelle impostazioni. | `LANG-LOCOPT-INV-1` |
| LANG-LOCOPT-INV-2 | Un codice assente da `supportedLocales`, o senza nome nativo, produce come etichetta il solo codice (`:40`). | `LANG-LOCOPT-INV-2` (solo il caso «assente da config») |
| LANG-LOCOPT-INV-3 | La bandiera è vuota se il regionale non ha un paese di due lettere alfabetiche (`it` senza `_IT`: `:52-55`). | — (non dimostrato) |

## Effetti collaterali

- Nessuno: sola lettura di `config('laravellocalization.supportedLocales')`.

## Errori

- Nessuna eccezione. Una config non array diventa lista vuota (`:31`).

## Non fa

- Non valida i codici passati: un codice inesistente compare con la sola etichetta-codice.
- Chiamanti verificati (produzione): `app/Filament/Pages/SettingPage.php:26` e `app/Filament/Actions/LocaleSwitcherRefresh.php:23`.

## Limiti noti

- Il test `locale options show flag and native name, in the order asked` copre il caso `['xx']` (codice assente da config) ma non quello di un codice
  presente senza `native`: per quello INV-2 è dimostrata solo a metà.
