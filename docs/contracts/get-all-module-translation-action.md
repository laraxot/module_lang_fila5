---
title: "Contratto — GetAllModuleTranslationAction"
type: contract
action: "Modules\\Lang\\Actions\\GetAllModuleTranslationAction"
module: Lang
status: accepted
updated: 2026-11-26
qmd: "GetAllModuleTranslationAction elenco file lingua moduli locale sessione glob key path LANG-ALLMOD"
---

# GetAllModuleTranslationAction

Elenca i file di lingua di tutti i moduli per la lingua corrente. Sorgente: `app/Actions/GetAllModuleTranslationAction.php:20-59`.
Il corpo è identico a [get-all-translation-action](get-all-translation-action.md) (`diff` dei due file: cambiano solo nome classe e
riga `@contract`): è un duplicato.

Test: `cd laravel && vendor/bin/pest --group=LANG-ALLMOD-INV-1`.

## Input

- Nessun argomento. Legge `session('locale')`: se è `it` o `en`, imposta la locale dell'app con `app()->setLocale()` (`:31-34`).

## Output

- `list<array{key: string, path: string}>`: `key` = `<modulo minuscolo>::<nome file senza .php>`, `path` = percorso assoluto
  (`:46-53`).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| LANG-ALLMOD-INV-1 | Elenca i file `Modules/*/lang/<locale>/*.php` con chiave `<modulo minuscolo>::<file>`, usando la locale corrente dopo l'eventuale override di sessione. Se cade, l'editor mostra file di una lingua diversa da quella chiesta. | `LANG-ALLMOD-INV-1` |

## Effetti collaterali

- `app()->setLocale()` quando la sessione ha `it` o `en`: effetto globale sulla richiesta, non solo sul risultato.
- Sola lettura del filesystem (`Safe\glob`, `:37`).

## Errori

- Nessuna eccezione propria. Voci non stringa del glob vengono saltate (`:42-44`).

## Non fa

- Il percorso è fisso su `base_path('Modules/...')`: non usa il generatore dei moduli.
- Non verifica che il file sia leggibile o valido.
- Non ha chiamanti nel codice di produzione: `rg GetAllModuleTranslationAction` fuori da `tests/` e `docs/` trova solo il docblock
  di `GetAllTranslationAction`. Candidata alla rimozione (decisione del proprietario del modulo).

## Limiti noti

- Il test che porta il group (`tests/Unit/LangHundredPercentCoverageTest.php:159`) mocka `File::glob`, ma l'Action usa
  `Safe\glob`: il mock non ha effetto e l'esito dipende dall'albero reale di `Modules/*/lang/en`. Prova l'override di sessione e
  la forma `modulo::file`, non il caso «voce non stringa».
