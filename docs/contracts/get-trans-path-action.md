---
title: "Contratto — GetTransPathAction"
type: contract
action: "Modules\\Lang\\Actions\\GetTransPathAction"
module: Lang
status: accepted
updated: 2026-11-26
qmd: "GetTransPathAction percorso file traduzione chiave modulo lingua locale GetModulePathByGeneratorAction LANG-PATH"
---

# GetTransPathAction

Dalla chiave di traduzione ricava il percorso del file PHP di lingua. Sorgente: `app/Actions/GetTransPathAction.php:16-38`.

Test: `cd laravel && vendor/bin/pest Modules/Lang/tests/Unit/Actions/GetTransPathActionTest.php` (oppure `--group=LANG-PATH-INV-1`).

## Input

- `string $key`: forma `<modulo>::<gruppo>.<voce>...` (`:25-27`).

## Output

- `string`: `<cartella lang del modulo>/<locale corrente>/<primo segmento di gruppo>.php` (`:36`).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| LANG-PATH-INV-1 | Il nome del file è il primo segmento del gruppo (`explode('.')[0]` dopo `::`), anche con chiavi a più punti. Se cade, `SaveTransAction` scrive in un file che `trans()` non legge. | `LANG-PATH-INV-1` |
| LANG-PATH-INV-2 | Se il generatore non risolve il modulo, usa `base_path('Modules/<modulo>/lang')` senza errore (`:29-33`). | — (non dimostrato) |
| LANG-PATH-INV-3 | La cartella è quella della locale corrente (`app()->getLocale()`, `:28`). | — (non dimostrato) |

## Effetti collaterali

- Nessuno: calcolo puro, nessuna creazione di cartelle né verifica di esistenza del file.

## Errori

- Nessuna eccezione propria. Qualsiasi `\Throwable` dal generatore (`GetModulePathByGeneratorAction`) viene ingoiato senza log (`:31-33`).

## Non fa

- Non crea la cartella né il file.
- Non valida la chiave: una chiave senza `::` usa l'intera chiave come namespace (`Str::before` restituisce la stringa intera) e come gruppo. Non verificato a runtime.
- Chiamante verificato (produzione): `SaveTransAction::persist()` (`app/Actions/SaveTransAction.php:68`).

## Limiti noti

- Il test che porta il group prova il nome del file (`messages.php`, `validation.php`, `file.php`) ma non la locale: `extracts language from app locale`
  asserisce solo che il percorso contenga `lang/`. Per questo la parte «locale» è INV-3, non dimostrata.
