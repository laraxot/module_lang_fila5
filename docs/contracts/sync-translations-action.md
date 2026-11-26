---
title: "Contratto — SyncTranslationsAction"
type: contract
action: "Modules\\Lang\\Actions\\SyncTranslationsAction"
module: Lang
status: accepted
updated: 2026-11-26
qmd: "SyncTranslationsAction sincronizza traduzioni lingua sorgente lingue target moduli merge file lang LANG-SYNC"
---

# SyncTranslationsAction

Copia nelle lingue target le chiavi mancanti della lingua sorgente, file per file, modulo per modulo. Sorgente: `app/Actions/SyncTranslationsAction.php:16-278`.

Test: `cd laravel && vendor/bin/pest --group=LANG-SYNC-INV-2`. I test che chiamano l'Action su moduli reali riscrivono `Modules/Lang/lang/en`
(vedi `docs/testing.md`).

## Input

- `string $sourceLang = 'it'`.
- `array $targetLangs = ['en', 'de']`.
- `?string $specificModule = null`: se dato, sincronizza solo quel modulo (`:34`).

## Output

- `array`: `total_modules` (tutti i moduli esaminati, anche saltati), `total_files`, `total_translations`, e `modules` con l'esito per modulo (`completed` o `skipped` con motivo) (`:36-55`).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| LANG-SYNC-INV-1 | Un valore già presente nel target non viene mai sovrascritto. La sorgente riempie solo le chiavi mancanti o `null` (`mergeTranslations`, `:216-235`: `! isset($merged[$key])`). Se cade, si perdono traduzioni vere. | — (non dimostrato) |
| LANG-SYNC-INV-2 | Modulo senza `lang/` o senza cartella della lingua sorgente: esito `skipped` con motivo (`:70-87`). | `LANG-SYNC-INV-2` |
| LANG-SYNC-INV-3 | Ogni file target viene riscritto sempre, anche se il contenuto non cambia (`:122`). | — (non dimostrato) |
| LANG-SYNC-INV-4 | `translations_added` conta solo la differenza di numero di chiavi di primo livello (`:124-125`), non le chiavi annidate. | — (non dimostrato) |

## Effetti collaterali

In ordine: moduli in ordine di cartella (`File::directories`, `:145`), file sorgente in ordine di glob, poi lingue target.

1. `File::makeDirectory` della cartella della lingua target se manca (`:111-113`).
2. `require` del file sorgente e del file target (`loadTranslations`, `:164-189`).
3. Fusione in memoria (`mergeTranslations`).
4. `File::put` del file target con `<?php return [...]` (`:243-250`). Nessun backup, nessuna pulizia della cache, nessuna transazione; il valore di ritorno di `File::put` non viene controllato.

## Errori

- `loadTranslations` ingoia ogni `\Exception` e restituisce `[]` (`:186-188`). Conseguenza: un file target che non si carica viene **sovrascritto** con i soli dati sorgente. Rischio di perdita dati.
  Un `ParseError` (che estende `\Error`) non viene catturato e interrompe l'Action.

## Non fa

- Non fa backup dei file target.
- Non valida `$specificModule`: entra nel percorso `base_path("Modules/{$module}/lang")` (`:68`) senza controlli, quindi un valore con `../` uscirebbe da `Modules/`.
- Non traduce: copia la sorgente nelle lingue target come valore provvisorio.
- Non ha chiamanti nel codice di produzione: `rg SyncTranslationsAction` fuori da `tests/` e `docs/` non trova altro che il file stesso. Candidata alla rimozione o a un comando artisan (decisione del proprietario).

## Limiti noti

- Difetto di sicurezza potenziale (path traversal su `$specificModule`) e di perdita dati (target illeggibile sovrascritto): documentati, non corretti in questa passata.
- `tests/Unit/Actions/LangActionsCoverageTest.php:19-35` prova solo firma e default dei parametri. I test che portano INV-2 (`LangHundredPercentCoverageTest.php:361`) asseriscono lo stato `skipped`, non l'assenza di scritture.
