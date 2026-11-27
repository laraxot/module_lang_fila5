---
title: "Contratto — CleanPlaceholderTranslationsAction"
type: contract
<<<<<<< .merge_file_q4re43
action: "Modules\Lang\Actions\CleanPlaceholderTranslationsAction"
tags: [contract, action, translations, lang-files, cleanup]
created: 2026-11-24
updated: 2026-11-24
related:
  - auto-label-action.md
  - ../../app/Actions/CleanPlaceholderTranslationsAction.php
  - ../../app/Console/Commands/CleanPlaceholderTranslationsCommand.php
  - ../../tests/Feature/CleanPlaceholderTranslationsActionTest.php
=======
action: "Modules\\Lang\\Actions\\CleanPlaceholderTranslationsAction"
module: Lang
status: accepted
updated: 2026-11-26
qmd: "CleanPlaceholderTranslationsAction segnaposto helper_text placeholder label uguale al nome campo file lingua pulizia LANG-CLEAN"
>>>>>>> .merge_file_sAsprH
---

# CleanPlaceholderTranslationsAction

Toglie dai file di lingua le «traduzioni segnaposto» che `AutoLabelAction` scriveva in passato: `helper_text`,
<<<<<<< .merge_file_q4re43
`placeholder`, `description`, `tooltip`, `label`, `heading`, `hint` uguali al nome del campo che li contiene (comparivano
in produzione come «route», «postal_code» sotto i campi). Chiamante: `php artisan lang:clean-placeholders {moduli?*}
{--dry-run}`. Sorgente: `app/Actions/CleanPlaceholderTranslationsAction.php`.
=======
`placeholder`, `description`, `tooltip`, `label`, `heading`, `hint` (`PLACEHOLDER_TYPES`, `:32`) uguali al nome del campo che li
contiene (comparivano in produzione come «route», «postal_code» sotto i campi). Chiamante verificato:
`php artisan lang:clean-placeholders {moduli?*} {--dry-run}` (`app/Console/Commands/CleanPlaceholderTranslationsCommand.php:19`).
Sorgente: `app/Actions/CleanPlaceholderTranslationsAction.php:28-151`.
>>>>>>> .merge_file_sAsprH

Test: `cd laravel && vendor/bin/pest Modules/Lang/tests/Feature/CleanPlaceholderTranslationsActionTest.php`.

## Input

- `string $directory`: cartella da visitare ricorsivamente (di solito `lang/` di un modulo).
- `bool $dryRun = false`: solo elenco, nessuna scrittura.

## Output

- `array{files: list<string>, removed: int}`: file toccati (o da toccare) e numero di voci tolte, compresi i gruppi
<<<<<<< .merge_file_q4re43
  rimasti vuoti. Cartella inesistente = `['files' => [], 'removed' => 0]`.
=======
  rimasti vuoti (`:115-118`). Cartella inesistente = `['files' => [], 'removed' => 0]` (`:41-43`).
>>>>>>> .merge_file_sAsprH

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
<<<<<<< .merge_file_q4re43
| LANG-CLEAN-INV-1 | Si toglie solo una voce di tipo segnaposto il cui valore è uguale alla chiave del gruppo che la contiene; le traduzioni vere restano; un gruppo rimasto vuoto si toglie. | `LANG-CLEAN-INV-1` |
| LANG-CLEAN-INV-2 | Un file che non è «solo dati» (variabili, funzioni, `new`, `::`, `use`, include, operatori) non si riscrive. | `LANG-CLEAN-INV-2` |
| LANG-CLEAN-INV-3 | I file chiamati solo `.php` (senza nome) si cancellano. | `LANG-CLEAN-INV-3` |
| LANG-CLEAN-INV-4 | Con `$dryRun` nessun file viene scritto o cancellato; il risultato è lo stesso. | — |

## Effetti collaterali

- Riscrive i file di lingua «solo dati» con `<?php declare(strict_types=1); return [...]` (formattazione propria:
  commenti e allineamenti originali si perdono).
- Cancella i file `.php` senza nome.
- `include` di ogni file `.php` della cartella che passa il controllo «solo dati».

## Errori

- Errori di lettura, scrittura o cancellazione (funzioni `Safe\`) escono come eccezioni: un file a metà non viene
  ripristinato.
=======
| LANG-CLEAN-INV-1 | Si toglie solo una voce di tipo segnaposto il cui valore è uguale alla chiave del gruppo che la contiene (`:125`); le traduzioni vere restano; un gruppo rimasto vuoto si toglie. Se cade, si perdono traduzioni vere. | `LANG-CLEAN-INV-1` |
| LANG-CLEAN-INV-2 | Un file che non è «solo dati» (variabili, funzioni, `new`, `::`, `use`, include, operatori: `isPureData`, `:83-104`) non si riscrive. Se cade, un file con logica resta «congelato» al valore calcolato qui. | `LANG-CLEAN-INV-2` |
| LANG-CLEAN-INV-3 | I file chiamati solo `.php` (senza nome) si cancellano (`:52-58`). | `LANG-CLEAN-INV-3` |
| LANG-CLEAN-INV-4 | Con `$dryRun` nessun file viene scritto o cancellato (`:54-56`, `:75-77`); il risultato è lo stesso. | — (non dimostrato) |

## Effetti collaterali

In ordine, per ogni file `.php` della cartella:

1. `unlink` dei file `.php` senza nome (solo se non `$dryRun`).
2. `file_get_contents` + controllo «solo dati» (`isPureData`).
3. `include` del file che passa il controllo (`:64`).
4. Se ci sono voci da togliere e non `$dryRun`: riscrittura con `<?php declare(strict_types=1); return [...]` (`:76`, formattazione
   propria: commenti e allineamenti originali si perdono).

## Errori

- Errori di lettura, scrittura o cancellazione escono come eccezioni PHP: un file a metà non viene ripristinato.
>>>>>>> .merge_file_sAsprH

## Non fa

- Non tocca i file con logica: restano da pulire a mano.
- Non conosce le lingue né i moduli: lavora sulla cartella che riceve (il comando sceglie i moduli).
<<<<<<< .merge_file_q4re43
- Non impedisce che i segnaposto tornino: lo garantisce `AutoLabelAction` (LANG-AUTOLABEL-INV-2).
- Non fa backup: usarla su un albero sotto git e controllare il diff.
=======
- Non impedisce che i segnaposto tornino: lo garantisce [AutoLabelAction](auto-label-action.md) (LANG-AUTOLABEL-INV-2).
- Non fa backup: usarla su un albero sotto git e controllare il diff.

## Limiti noti

- Un gruppo che era già vuoto prima della pulizia viene tolto e contato in `removed` come un segnaposto (`:115-118`).
- INV-4 non è provata: l'unico test esistente chiama `execute($dir)` senza `$dryRun`.
>>>>>>> .merge_file_sAsprH
