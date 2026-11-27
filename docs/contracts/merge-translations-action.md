---
title: "Contratto — MergeTranslationsAction"
type: contract
action: "Modules\\Lang\\Actions\\MergeTranslationsAction"
module: Lang
status: accepted
updated: 2026-11-26
qmd: "MergeTranslationsAction fonde file traduzione array_merge override ultimo vince LANG-MERGE"
---

# MergeTranslationsAction

Fonde più array di traduzione in uno. Sorgente: `app/Actions/MergeTranslationsAction.php:17-37`.

Test: `cd laravel && vendor/bin/pest --group=LANG-MERGE-INV-1`.

## Input

- `array $translationFiles`: lista di array associativi, uno per file.

## Output

- `array<string, mixed>`: risultato di `array_merge` applicato in sequenza (`:30-35`).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| LANG-MERGE-INV-1 | Per le chiavi stringa vince l'ultimo file della lista; le chiavi presenti solo nei file precedenti restano. Il docblock dice «LIFO»: il comportamento reale è «ultimo vince». | `LANG-MERGE-INV-1` |
| LANG-MERGE-INV-2 | La fusione è superficiale: un array annidato del file successivo sostituisce quello precedente intero, non viene fuso in profondità. | — (non dimostrato) |

## Effetti collaterali

- Nessuno.

## Errori

- Nessuno proprio. Un elemento non array fa lanciare `array_merge` (`TypeError`).

## Non fa

- Non fonde in profondità (vedi INV-2).
- Non ha chiamanti nel codice di produzione: `rg MergeTranslationsAction` fuori da `tests/` e `docs/` non trova altro che il file stesso. Candidata alla rimozione (decisione del proprietario).

## Limiti noti

- `array_merge` riaccoda le chiavi numeriche invece di sovrascriverle: INV-1 vale per le sole chiavi stringa.
