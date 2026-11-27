---
title: "Contratto — SaveTransAction"
type: contract
<<<<<<< .merge_file_h95AM9
action: "Modules\Lang\Actions\SaveTransAction"
tags: [contract, action, translations, lang-files]
created: 2026-11-24
updated: 2026-11-24
related:
  - ../adr/missing-translations-written-only-in-local.md
  - ../../app/Actions/SaveTransAction.php
  - ../../tests/Feature/SaveTransActionDefaultTest.php
  - ../../tests/Feature/SaveTransActionRespectsSwitchTest.php
=======
action: "Modules\\Lang\\Actions\\SaveTransAction"
module: Lang
status: accepted
updated: 2026-11-26
qmd: "SaveTransAction salva chiave traduzione file lingua save_missing_translations isLocal persist pannello Lang LANG-SAVETRANS"
>>>>>>> .merge_file_3X89aq
---

# SaveTransAction

<<<<<<< .merge_file_h95AM9
Scrive una chiave di traduzione nel file PHP di lingua del modulo. Due ingressi con regole diverse:

- `execute()`: la chiamano `AutoLabelAction` quando un'etichetta manca; scrive solo se l'interruttore lo permette.
- `persist()`: la chiama il pannello di traduzione (`TranslationFileResource/Pages/EditTranslationFile.php`) quando il
  traduttore preme «Salva»; scrive sempre.

Perché l'interruttore: [ADR chiavi mancanti scritte solo in locale](../adr/missing-translations-written-only-in-local.md).
Sorgente: `app/Actions/SaveTransAction.php`.

Test: `cd laravel && vendor/bin/pest Modules/Lang/tests/Feature/SaveTransActionDefaultTest.php Modules/Lang/tests/Feature/SaveTransActionRespectsSwitchTest.php`.
=======
Scrive una chiave di traduzione nel file PHP di lingua del modulo. Due ingressi con regole diverse (sorgente `app/Actions/SaveTransAction.php:23-110`):

- `execute()` (`:30-48`): la chiama `AutoLabelAction` quando un'etichetta manca; scrive solo se l'interruttore lo permette.
- `persist()` (`:56-109`): la chiama il pannello di traduzione (`app/Filament/Resources/TranslationFileResource/Pages/EditTranslationFile.php:137`) quando il
  traduttore preme «Salva»; scrive sempre.

Perché l'interruttore: [ADR 0007](../adr/0007-missing-translations-written-only-in-local.md).

Test: `cd laravel && vendor/bin/pest Modules/Lang/tests/Feature/SaveTransActionDefaultTest.php Modules/Lang/tests/Feature/SaveTransActionRespectsSwitchTest.php Modules/Lang/tests/Unit/LangCoverageGapsTest.php Modules/Lang/tests/Unit/LangHundredPercentCoverageTest.php` (INV-1..6 nei due Feature, INV-7 in `LangCoverageGapsTest.php:156`, INV-8 e INV-9 in `LangHundredPercentCoverageTest.php`).
>>>>>>> .merge_file_3X89aq

## Input

| Parametro | Tipo | Note |
|---|---|---|
| `$key` | `string` | chiave completa `modulo::file.percorso.nel.file` (es. `blog::article.fields.title.label`) |
| `$data` | `array\|int\|string\|Htmlable\|null` | valore da scrivere in quel punto |

<<<<<<< .merge_file_h95AM9
Il file è risolto da `GetTransPathAction`: `<cartella lang del modulo>/<locale corrente>/<file>.php`.
Interruttore: `Config::get('lang.save_missing_translations', app()->isLocal())`.
=======
Il file è risolto da [GetTransPathAction](get-trans-path-action.md): `<cartella lang del modulo>/<locale corrente>/<file>.php`. L'interruttore è
`Config::get('lang.save_missing_translations', app()->isLocal())` (`:42`).
>>>>>>> .merge_file_3X89aq

## Output

- `void`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
<<<<<<< .merge_file_h95AM9
| LANG-SAVETRANS-INV-1 | Senza configurazione esplicita `execute()` non scrive fuori da `APP_ENV=local`: né in produzione, né in staging, né sotto test. | `LANG-SAVETRANS-INV-1` |
| LANG-SAVETRANS-INV-2 | Senza configurazione esplicita, in `local` `execute()` scrive la chiave nel file, con la struttura annidata del percorso. | `LANG-SAVETRANS-INV-2` |
| LANG-SAVETRANS-INV-3 | `lang.save_missing_translations` impostata (`true` o `false`) vince sempre sull'ambiente. | `LANG-SAVETRANS-INV-3` |
| LANG-SAVETRANS-INV-4 | `persist()` scrive anche con l'interruttore spento: il salvataggio dal pannello funziona in produzione. | `LANG-SAVETRANS-INV-4` |
| LANG-SAVETRANS-INV-5 | Aggiungere una chiave conserva tutte le altre del file (lettura, `Arr::set`, riscrittura). | `LANG-SAVETRANS-INV-5` |
| LANG-SAVETRANS-INV-6 | Un file di lingua esistente ma illeggibile (`getRequire` lancia) non viene riscritto: l'errore va a `report()` e la chiave si perde. | — |

## Effetti collaterali

- Scrive (o crea vuoto e poi scrive) il file PHP di lingua tramite Xot `SaveArrayAction`, nell'albero dei sorgenti del
  modulo: in sviluppo il file compare in `git status`.

## Errori

- File illeggibile: `report($e)` e ritorno senza scrivere.
- Chiave senza percorso dopo il nome del file con `$data` non array: `\Exception('Error in SaveTransAction')`.
- Errori di scrittura di `SaveArrayAction` arrivano al chiamante.

## Non fa

- Non decide quale chiave manca: lo fa `AutoLabelAction` (solo per le etichette).
- Non registra le chiavi mancanti nel DB (`RecordMissingTranslationAction`, usata solo dal `TranslatorAdapter`, oggi non
  registrato: `registerTranslator()` è commentato in `LangServiceProvider::boot()`).
- Non fa backup, non valida la sintassi PHP e non svuota la cache delle traduzioni.
- Non scrive nei file di altre lingue: solo quella corrente (`app()->getLocale()`).
=======
| LANG-SAVETRANS-INV-1 | Senza configurazione esplicita `execute()` non scrive fuori da `APP_ENV=local`: né in produzione, né in staging, né sotto test. Se cade, un file di lingua riscritto a runtime può far cadere in 500 ogni pagina che lo carica. | `LANG-SAVETRANS-INV-1` |
| LANG-SAVETRANS-INV-2 | Senza configurazione esplicita, in `local` `execute()` scrive la chiave nel file, con la struttura annidata del percorso. | `LANG-SAVETRANS-INV-2` |
| LANG-SAVETRANS-INV-3 | `lang.save_missing_translations` impostata (`true` o `false`) vince sempre sull'ambiente. | `LANG-SAVETRANS-INV-3` |
| LANG-SAVETRANS-INV-4 | `persist()` scrive anche con l'interruttore spento: il salvataggio dal pannello funziona in produzione. | `LANG-SAVETRANS-INV-4` |
| LANG-SAVETRANS-INV-5 | Aggiungere una chiave conserva tutte le altre del file (lettura, `Arr::set`, riscrittura: `:78`, `:91-93`). | `LANG-SAVETRANS-INV-5` |
| LANG-SAVETRANS-INV-6 | Una chiave senza nome file (`modulo::` o `modulo::.x`) non produce `lang/<locale>/.php`: l'errore va a `report()` e non si scrive (`:58-64`). | `LANG-SAVETRANS-INV-6` |
| LANG-SAVETRANS-INV-7 | Un file di lingua esistente ma illeggibile (`getRequire` lancia `\Exception`) non viene riscritto: l'errore va a `report()` e la chiave si perde (`:77-85`). Se cade, il file viene sostituito dalla sola chiave nuova. | `LANG-SAVETRANS-INV-7` |
| LANG-SAVETRANS-INV-8 | Una chiave senza parte dopo il nome del file con `$data` non array lancia `\Exception('Error in SaveTransAction')` e non scrive (`:91-100`). | `LANG-SAVETRANS-INV-8` |
| LANG-SAVETRANS-INV-9 | Se il file non esiste, `persist()` lo crea e vi scrive la chiave annidata (`:70-75`). | `LANG-SAVETRANS-INV-9` |

## Effetti collaterali

In ordine, per `persist()` (a cui `execute()` arriva dopo il controllo dell'interruttore):

1. `report()` e uscita se la chiave non ha nome file (INV-6).
2. `GetTransPathAction::execute($key)` per il percorso.
3. Se il file non esiste: `SaveArrayAction` scrive prima un array vuoto (`:70-75`), poi il file viene riletto: **due scritture** nel caso «file nuovo».
4. `File::getRequire()` del file; se fallisce `report()` e uscita (INV-7).
5. `Arr::set($cont, $piece, $data)` e `SaveArrayAction::execute()` sul file di lingua (`:105-108`), nell'albero dei sorgenti del modulo: in sviluppo il
   file compare in `git status`.

## Errori

- Chiave senza nome file: `report(InvalidArgumentException)`, nessuna eccezione al chiamante (`:60-61`).
- File illeggibile: `report($e)` e ritorno senza scrivere (`:82-84`).
- Contenuto finale non array: `\Exception('Error in SaveTransAction')` (`:99`), protegge INV-8.
- Gli errori di scrittura di `SaveArrayAction` arrivano al chiamante.

## Non fa

- Non decide quale chiave manca: lo fa [AutoLabelAction](auto-label-action.md) (solo per le etichette).
- Non registra le chiavi mancanti nel DB (`RecordMissingTranslationAction`, usata solo dal `TranslatorAdapter`, oggi non registrato: `registerTranslator()` è
  commentato in `LangServiceProvider::boot()`, `app/Providers/LangServiceProvider.php:43`).
- Non fa backup, non valida la sintassi PHP e non svuota la cache delle traduzioni (a differenza di [write-translation-file-action](write-translation-file-action.md)).
- Non scrive nei file di altre lingue: solo quella corrente (`app()->getLocale()`).

## Limiti noti

- `Modules/Lang/config/lang.php:211` dichiara `'save_missing_translations' => true`, ma non ha effetto: `XotBaseServiceProvider::registerConfig()`
  (`Modules/Xot/app/Providers/XotBaseServiceProvider.php:193`) monta il file come `lang.lang`, quindi la chiave letta qui (`lang.save_missing_translations`)
  esiste solo se la imposta qualcuno. Il commento a `config/lang.php:205-206` cita ancora il vecchio default `! app()->runningUnitTests()`.
- Rispetto alla versione precedente di questo contratto, INV-6 è la chiave senza nome file (come nel test `->group('LANG-SAVETRANS-INV-6')`); il caso «file illeggibile»,
  che prima portava lo stesso numero, è ora INV-7.
>>>>>>> .merge_file_3X89aq
