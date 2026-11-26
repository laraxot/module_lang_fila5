---
title: "ADR — Le etichette Filament si configurano da LangServiceProvider"
type: decision
status: accepted
created: 2026-11-24
updated: 2026-11-26
decision-makers: [Lang module owner]
module: Lang
qmd: "ADR AutoLabelAction LangServiceProvider configureUsing label Filament traduzione chiave debug_backtrace"
---

# Le etichette Filament si configurano da LangServiceProvider

## Contesto

Ogni campo, colonna, filtro, entry, sezione, step e azione Filament ha bisogno di etichetta, segnaposto e testo d'aiuto tradotti. La regola di progetto vieta stringhe hardcoded nelle UI: niente `->label('...')` (`docs/wiki/rules/translations.md:80`). Serve un meccanismo unico che ricavi il testo da un file di traduzione del modulo owner del componente.

Questo ADR e [0004](0004-filament-labels-from-module-translation-files.md) descrivono la stessa scelta da due lati: 0003 il punto di aggancio (`LangServiceProvider`), 0004 l'origine dei testi (file di lingua del modulo). Se vadano fusi è una decisione aperta del proprietario del modulo.

## Driver della decisione

- Nessuna stringa visibile nei sorgenti Filament dei moduli: le etichette vivono in `Modules/<Mod>/lang`.
- Copertura uniforme di tutti i tipi di componente senza che ogni Resource se ne occupi.
- Una chiave di traduzione prevedibile derivata dalla classe che costruisce il componente.
- Un componente senza chiave non deve far cadere il rendering della pagina.

## Alternative scartate

- **`->label()` esplicito in ogni componente**: stringhe hardcoded e traduzioni sparse, vietato dalla regola di progetto.
- **Un trait o una base da richiamare in ogni Resource**: copertura dipendente dalla disciplina di chi scrive, componenti dimenticati senza etichetta.
- **Sola traduzione dichiarativa nei file di lingua senza hook**: il componente non saprebbe quale chiave leggere.

## Decisione

Scelta: **`configureUsing` globale dei componenti Filament in `LangServiceProvider::registerFilamentLabel()`**, che chiama `AutoLabelAction` per `Field`, `Entry`, `Section` (intestazione), `BaseFilter`, `Column`, `Step` e `Action` (`app/Providers/LangServiceProvider.php:48-145`). L'Action individua la classe chiamante da `debug_backtrace()` (`app/Actions/Filament/AutoLabelAction.php:73`, in `findCallerFrame()`), ne ricava la chiave con `GetTransKeyAction` e, se la traduzione manca, la salva con `SaveTransAction` (solo in locale, `:216-218`). Senza classe chiamante riconoscibile restituisce il componente invariato invece di sollevare un'eccezione (`:132-157`).

## Conseguenze

- Buono, perché ogni componente Filament dei moduli ottiene etichette tradotte senza codice per componente.
- Buono, perché un chiamante non identificabile degrada a campo senza etichetta e non a pagina rotta.
- Cattivo, perché la chiave dipende dallo stack delle chiamate: cambiare la classe chiamante o la finestra di `array_slice` riscrive le chiavi, quindi i file di lingua su disco (docblock `AutoLabelAction.php:40-70`).
- Cattivo, perché la scrittura automatica può persistere segnaposto uguali al nome del campo: esiste `CleanPlaceholderTranslationsAction` proprio per ripulirli.

## Conferma

- `cd laravel && vendor/bin/pest Modules/Lang/tests/Feature/AutoLabelActionContractTest.php`: etichetta presa dal file del modulo chiamante (`LANG-AUTOLABEL-INV-1`), salvataggio solo delle etichette mancanti (`-INV-2`), testo ausiliario uguale al nome non applicato (`-INV-3`). Contratto: [auto-label-action](../contracts/auto-label-action.md).
- `cd laravel && vendor/bin/pest Modules/Lang/tests/Feature/SaveTransActionRespectsSwitchTest.php`: il salvataggio rispetta l'interruttore.
- Non confermati da un test: il ramo «chiamante non identificabile» e le invarianti `LANG-AUTOLABEL-INV-4`, `-5` e `-6` del contratto. I test che esercitano quei rami (`tests/Unit/LangFinalGapsTest.php:321` e `:357`, `LangCoverageGapsTest.php:359`) asseriscono solo che `execute()` restituisca lo stesso componente, cosa vera in ogni ramo. Proposta: asserire l'etichetta `FIX:<chiave>` e l'assenza di `SaveTransAction::execute` nei due casi.
- Documento descrittivo: [filament-label](../filament-label.md).
