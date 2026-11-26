---
title: "Contratto — PublishTranslationAction"
type: contract
action: "Modules\\Lang\\Actions\\PublishTranslationAction"
module: Lang
status: accepted
updated: 2026-11-26
qmd: "PublishTranslationAction pubblica traduzione singola voce item value SaveArrayAction file lingua LANG-PUB"
---

# PublishTranslationAction

Imposta una singola voce di un file di traduzione e riscrive il file se il contenuto cambia. Sorgente: `app/Actions/PublishTranslationAction.php:17-54`.

Test: `cd laravel && vendor/bin/pest --group=LANG-PUB-INV-1`.

## Input

- `TranslationData $translationData`: fornisce `getFilename()`, `getData()`, `item` e `value` (`:34`, `:41`, `:43`).

## Output

- `void`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| LANG-PUB-INV-1 | Il file viene riscritto solo se l'array dopo `Arr::set` è diverso da quello letto (`:44`). Se la voce ha già quel valore, nessuna scrittura. Se cade, ogni pubblicazione riscrive il file anche a vuoto. | `LANG-PUB-INV-1` |
| LANG-PUB-INV-2 | Quando il valore cambia, la scrittura va al percorso `getFilename()` con l'array aggiornato (`:46-51`). | `LANG-PUB-INV-2` |

## Effetti collaterali

In ordine: lettura dei dati correnti (`getData()`), `Arr::set` su una copia, confronto, poi (solo se diverso) scrittura del file di lingua con
`Modules\Xot\Actions\Arr\SaveArrayAction`. Nessun backup, nessuna pulizia della cache.

## Errori

- Le eccezioni di `SaveArrayAction` si propagano.

## Non fa

- Non valida `item` né `value`.
- Non crea backup (a differenza di [write-translation-file-action](write-translation-file-action.md)).
- Non ha chiamanti nel codice di produzione: `rg PublishTranslationAction` fuori da `tests/` e `docs/` non trova altro che il file stesso. Candidata alla rimozione (decisione del proprietario).

## Limiti noti

- Restano due blocchi di codice commentato (`:26-40`, vecchia lettura del file): non attivi.
- INV-2 è provata sul percorso e sul valore scritti, non sull'identità della classe che scrive (nel test `writes when item value changes` gira la `SaveArrayAction` reale).
