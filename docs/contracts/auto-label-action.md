---
title: "Contratto — AutoLabelAction"
type: contract
<<<<<<< .merge_file_eGwtV2
action: "Modules\Lang\Actions\Filament\AutoLabelAction"
tags: [contract, action, filament, translations, labels]
created: 2026-11-24
updated: 2026-11-24
related:
  - ../adr/filament-labels-from-module-translation-files.md
  - ../../app/Actions/Filament/AutoLabelAction.php
  - ../../app/Providers/LangServiceProvider.php
  - ../../tests/Feature/AutoLabelActionContractTest.php
=======
action: "Modules\\Lang\\Actions\\Filament\\AutoLabelAction"
module: Lang
status: accepted
updated: 2026-11-26
qmd: "AutoLabelAction etichetta automatica Filament componente chiave traduzione chiamante stack debug_backtrace label helperText icon LANG-AUTOLABEL"
>>>>>>> .merge_file_Dwxtn8
---

# AutoLabelAction

Dà a ogni componente Filament (campo, colonna, filtro, entry, step, sezione, azione) l'etichetta e i testi presi dal
file di lingua del modulo che lo usa. È applicata a **tutti** i componenti da `LangServiceProvider::registerFilamentLabel()`
<<<<<<< .merge_file_eGwtV2
con `configureUsing()`. Perché: [ADR etichette dai file di lingua](../adr/filament-labels-from-module-translation-files.md).
Sorgente: `app/Actions/Filament/AutoLabelAction.php`.

Test: `cd laravel && vendor/bin/pest Modules/Lang/tests/Feature/AutoLabelActionContractTest.php`.
=======
con `configureUsing()` (`app/Providers/LangServiceProvider.php:48-145`). Perché: [ADR 0003](../adr/0003-filament-labels-are-autoconfigured-by-lang-provider.md)
e [ADR 0004](../adr/0004-filament-labels-from-module-translation-files.md).
Sorgente: `app/Actions/Filament/AutoLabelAction.php:32-284`.

Test: `cd laravel && vendor/bin/pest Modules/Lang/tests/Feature/AutoLabelActionContractTest.php` (oppure `--group=LANG-AUTOLABEL-INV-1`).
>>>>>>> .merge_file_Dwxtn8

## Input

| Parametro | Tipo | Note |
|---|---|---|
| `$component` | `Field\|Entry\|BaseFilter\|Column\|Step\|Action\|Section` | il componente appena creato |
<<<<<<< .merge_file_eGwtV2
| `$type` | `string` | `label` (default), `placeholder`, `helperText`, `description`, `heading`, `icon` |

La chiave nasce dalla classe chiamante: il primo frame del backtrace (saltati i primi due) di una classe `Modules\…`
concreta, tradotto da Xot `GetTransKeyAction` (es. `blog::article`); senza classe, `lang::txt`. Poi
`<chiave>.fields.<nome>.<tipo>` (`sections.<titolo>`, `steps.<etichetta>`, `actions.<nome>`), tipo in snake_case.

## Output

- Lo stesso componente, modificato sul posto.
=======
| `$type` | `string` | `label` (default), `placeholder`, `helperText`, `description`, `heading`, `icon`, `tooltip` |

La chiave nasce dalla classe chiamante: `findCallerFrame()` scarta due frame del backtrace (`:73-74`) e prende il primo che è
un oggetto o una classe `Modules\…` concreta diversa dal componente (`:76-97`); la classe diventa chiave con Xot
`GetTransKeyAction` (es. `blog::article`, `:159`). Senza frame, la chiave è `lang::txt` (`:161`). Poi
`<chiave>.fields.<nome>.<tipo>` (`sections.<titolo>`, `steps.<etichetta>`, `actions.<nome>`), con il tipo in snake_case (`:200`).

## Output

- Lo stesso componente, modificato sul posto (anche quando non cambia niente).
>>>>>>> .merge_file_Dwxtn8

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
<<<<<<< .merge_file_eGwtV2
| LANG-AUTOLABEL-INV-1 | Se la chiave esiste nel file di lingua del modulo chiamante, il suo valore diventa l'etichetta (o il testo del tipo chiesto). | `LANG-AUTOLABEL-INV-1` |
| LANG-AUTOLABEL-INV-2 | Una chiave mancante si chiede di salvarla (`SaveTransAction::execute`) solo per `label`: mai per placeholder, testo d'aiuto, descrizione; e quei testi restano vuoti. | `LANG-AUTOLABEL-INV-2` |
| LANG-AUTOLABEL-INV-3 | Un testo ausiliario (placeholder, helperText, …) uguale al nome del campo non si applica. | `LANG-AUTOLABEL-INV-3` |
| LANG-AUTOLABEL-INV-4 | Una sezione senza titolo usa il segmento `empty` ma salva il valore vuoto, mai la parola «empty». | — |
| LANG-AUTOLABEL-INV-5 | Un'azione la cui traduzione è uguale al nome (`edit`, `delete`) tiene l'etichetta già tradotta di Filament. | — |
| LANG-AUTOLABEL-INV-6 | Una traduzione che è un array, non una stringa, produce l'etichetta `FIX:<chiave>`, visibile, invece di un errore. | — |

## Effetti collaterali

- Chiama `SaveTransAction::execute()` per le etichette mancanti: scrive nel file di lingua solo dove l'interruttore lo
  permette (vedi il suo contratto).
- `debug_backtrace()` a ogni componente creato: costo misurabile nelle pagine con molte colonne.

## Errori

- Frame chiamante trovato ma senza classe: `\Exception('No object class found')`.
- Un `Step` o un campo senza nome stringa fa fallire `Webmozart\Assert`.
=======
| LANG-AUTOLABEL-INV-1 | Se la chiave esiste nel file di lingua del modulo chiamante, il suo valore diventa l'etichetta (o il testo del tipo chiesto). Se cade, i pannelli mostrano il nome del campo. | `LANG-AUTOLABEL-INV-1` |
| LANG-AUTOLABEL-INV-2 | Una chiave mancante si chiede di salvarla (`SaveTransAction::execute`) solo per `label` (`:216`): mai per placeholder, testo d'aiuto, descrizione; e quei testi restano vuoti. Se cade, nei campi compare il nome del campo come testo d'aiuto. | `LANG-AUTOLABEL-INV-2` |
| LANG-AUTOLABEL-INV-3 | Un testo ausiliario (placeholder, helperText, …) uguale al nome del campo non si applica (`:219-221`). | `LANG-AUTOLABEL-INV-3` |
| LANG-AUTOLABEL-INV-4 | Una sezione senza titolo usa il segmento `empty` ma salva il valore vuoto, mai la parola «empty» (`:176-184`). Se cade, la sezione mostra «empty» come intestazione. | — (non dimostrato) |
| LANG-AUTOLABEL-INV-5 | Un'azione la cui traduzione è uguale al nome (`edit`, `delete`) tiene l'etichetta già tradotta di Filament (`:224-226`). | — (non dimostrato) |
| LANG-AUTOLABEL-INV-6 | Una traduzione che è un array, non una stringa, produce l'etichetta `FIX:<chiave>`, visibile, invece di un errore (`:227-231`). | — (non dimostrato) |

## Effetti collaterali

In ordine:

1. `debug_backtrace()` a ogni componente creato (`:73`): costo misurabile nelle pagine con molte colonne.
2. `GetTransKeyAction::execute()` per ricavare la chiave dalla classe chiamante.
3. `trans($label_key)` (lettura del file di lingua).
4. Solo per `label` con chiave mancante: `SaveTransAction::execute()` (`:216-218`), che scrive nel file di lingua solo dove
   l'interruttore lo permette (vedi [save-trans-action](save-trans-action.md)).
5. Modifica del componente (`label()`, `placeholder()`, `helperText()`, `icon()`, …); per `icon` anche `iconButton()` quando esiste (`:251-272`).

## Errori

- Frame chiamante trovato ma senza `object` né `class` utilizzabile: il componente torna invariato, nessuna eccezione e nessuna
  scrittura (`:132-157`). Prima di questa versione lanciava `\Exception('No object class found')`: il vecchio testo del
  contratto era superato.
- Un `Step`, o un campo/azione senza nome stringa, fa fallire `Webmozart\Assert` (`:171`, `:191`, `:196`).
- Traduzione non stringa: etichetta `FIX:<chiave>` (INV-6), non un'eccezione.
>>>>>>> .merge_file_Dwxtn8

## Non fa

- Non traduce i testi passati esplicitamente con `->label('…')`: il `configureUsing` gira alla creazione, una
  `->label()` successiva vince. Per questo nelle Resource non si scrivono etichette a mano: si aggiunge la chiave al file.
- Non crea le chiavi di placeholder, helper text o descrizione: vanno scritte a mano nel file di lingua.
<<<<<<< .merge_file_eGwtV2
- Non pulisce i segnaposto salvati in passato: lo fa `CleanPlaceholderTranslationsAction`.
- Non è la classe omonima `Modules\Xot\Actions\Filament\AutoLabelAction`: quella non è registrata in `configureUsing`.
=======
- Non pulisce i segnaposto salvati in passato: lo fa [CleanPlaceholderTranslationsAction](clean-placeholder-translations-action.md).
- Non è la classe omonima `Modules\Xot\Actions\Filament\AutoLabelAction`: quella non è registrata in `configureUsing`.

## Limiti noti

- La chiave dipende dalla posizione nello stack: spostare un form in un'altra classe, o cambiare lo scarto `2` di
  `findCallerFrame()` (`:74`), riscrive le chiavi e quindi i file di lingua su disco.
- INV-4, INV-5 e INV-6 non hanno un test che le provi: i test esistenti che esercitano quei rami
  (`tests/Unit/LangFinalGapsTest.php:321`, `LangCoverageGapsTest.php:359`, `LangHundredPercentCoverageTest.php:438`) asseriscono solo
  che `execute()` restituisca lo stesso oggetto componente, cosa che vale in ogni ramo.
>>>>>>> .merge_file_Dwxtn8
