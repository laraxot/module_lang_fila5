---
title: "Contratto — WriteTranslationFileAction"
type: contract
action: "Modules\\Lang\\Actions\\WriteTranslationFileAction"
module: Lang
status: accepted
updated: 2026-11-26
qmd: "WriteTranslationFileAction scrive file traduzione backup php -l validazione sintassi cache loader flush LANG-WRITE"
---

# WriteTranslationFileAction

Scrive un intero file di traduzione con backup, validazione della sintassi e pulizia delle cache. Sorgente: `app/Actions/WriteTranslationFileAction.php:22-204`.

Test: `cd laravel && vendor/bin/pest Modules/Lang/tests/Unit/LangFinalGapsTest.php Modules/Lang/tests/Unit/LangHundredPercentCoverageTest.php` (oppure `--group=LANG-WRITE-INV-2`).

## Input

- `string $filePath`: file di destinazione.
- `array $translations`: contenuto completo del file (chiavi stringa).

## Output

- `bool`: `true` dopo scrittura e pulizia delle cache (`:59`); altrimenti eccezione.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| LANG-WRITE-INV-1 | Se il file esiste, viene copiato in `storage/app/backups/translations/<data>_<nome>` prima della sostituzione (`:125-141`); file nuovo: nessun backup. Se cade, una sostituzione sbagliata non è recuperabile. | — (non dimostrato: il test asserisce solo che la cartella dei backup esista, `tests/Unit/LangFinalGapsTest.php:199`) |
| LANG-WRITE-INV-2 | Il PHP generato passa `php -l` su un file temporaneo prima della scrittura; se la sintassi è invalida lancia `\Exception("Sintassi PHP non valida: …")` (`:150-178`). Se cade, un file di lingua rotto manda in 500 ogni pagina che lo carica. | `LANG-WRITE-INV-2` (il test non asserisce che la destinazione resti intatta) |
| LANG-WRITE-INV-3 | La cartella di destinazione viene creata se manca (`:50`); un errore di scrittura (`File::put` falso o eccezione) lancia `\Exception("Impossibile scrivere il file: …")` (`:52-54`, `:90-101`). | `LANG-WRITE-INV-3` |
| LANG-WRITE-INV-4 | A scrittura riuscita il file caricato contiene i valori nuovi e il loader delle traduzioni viene svuotato (`:57`, `:196-201`). | `LANG-WRITE-INV-4` |

## Effetti collaterali

In ordine:

1. Backup del file esistente (INV-1).
2. Rendering del PHP con `ReadTranslationFileAction::toPhp()` (`:39-40`).
3. File temporaneo in `storage/framework/cache` e `exec("php -l …")` (`:153-164`): costo di un processo PHP a ogni scrittura; il file temporaneo viene cancellato.
4. `File::ensureDirectoryExists` e `File::put` sul file finale.
5. `cache()->flush()` **dell'intera cache applicativa** e `translation.loader->flush()` (`:187-202`).

## Errori

- `\Exception` per: temporaneo non scrivibile (`:158`), sintassi non valida (`:177`), scrittura finale fallita (`:53`).
- Nessun ripristino automatico dal backup quando la scrittura finale fallisce.

## Non fa

- Non scrive in modo atomico: `File::put` sul file finale, non scrittura su temporaneo seguita da rinomina.
- Non aggiorna database o cataloghi esterni.
- Non ha chiamanti nel codice di produzione: `rg WriteTranslationFileAction` fuori da `tests/` e `docs/` non trova altro che il file stesso. Candidata alla rimozione (decisione del proprietario).

## Limiti noti

- `cache()->flush()` svuota tutta la cache dell'applicazione (sessioni su driver cache, code di rate limiting, cache di altri moduli), non solo le traduzioni: se l'Action venisse collegata a un
  flusso utente, la cache andrebbe limitata alle chiavi di traduzione.
- Il test di INV-4 si chiama `WriteTranslationFileAction backs up existing files and flushes translation loader` ma verifica solo il flush e il contenuto, non il backup.
- `exec("php -l {$tempFile}")` interpola il percorso restituito da `tempnam()`: non è un input dell'utente, ma il percorso non è passato a `escapeshellarg`.
