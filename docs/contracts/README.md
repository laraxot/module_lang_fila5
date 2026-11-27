---
title: "Contratti del modulo Lang"
type: index
tags: [contracts, actions, lang, translations]
created: 2026-11-18
<<<<<<< .merge_file_eIq0UJ
updated: 2026-11-24
=======
updated: 2026-11-26
module: Lang
qmd: "contratti lang metodo harness contratto comportamento action input output invarianti effetti collaterali stato copertura backlog"
>>>>>>> .merge_file_wsdbUn
---

# Contratti del modulo Lang

<<<<<<< .merge_file_eIq0UJ
Cosa promettono le Action di Lang che **scrivono file di lingua** o decidono il testo di ogni componente Filament: sono
le uniche del modulo che possono rompere la produzione (un file di lingua con errore di sintassi = 500 su ogni pagina che
lo carica) o sporcare l'albero dei sorgenti.
=======
## Metodo Harness

Un contratto descrive una singola operazione pubblica con effetti collaterali, chiamate esterne o invarianti di dominio. Documenta il comportamento osservabile, inclusi errori e non-goals, senza trasformare ogni metodo interno in un contratto. Documenta il comportamento di oggi, anche dove è discutibile: i difetti stanno in «Limiti noti», non nascosti.

Ogni invariante ha un ID stabile nel formato `LANG-<AREA>-INV-N` (es. `LANG-SAVETRANS-INV-4`); il test Pest corrispondente usa lo stesso ID come group (`vendor/bin/pest --group=LANG-SAVETRANS-INV-4`). Dove nessun test lo prova, la colonna «Group Pest» dice «— (non dimostrato)». La classe implementatrice contiene `@see docs/contracts/<file>.md` e `@contract docs/contracts/<file>.md`; contratto, codice e test cambiano nello stesso commit.

Cosa promette la superficie pubblica di questo pacchetto: le Action che scrivono dati, chiamano servizi esterni o hanno
effetti collaterali, e le interfacce (`app/Contracts`). Regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`.
>>>>>>> .merge_file_wsdbUn

Leggili prima di chiamare o modificare una di queste Action. Le invarianti con group si verificano con
`cd laravel && vendor/bin/pest Modules/Lang/tests --group=<ID>`; `—` è debito dichiarato.

<<<<<<< .merge_file_eIq0UJ
Formato (sei sezioni, tabella invarianti con ID, `@contract` nel docblock):
[action-behavioral-contract](../../../Xot/docs/rules/action-behavioral-contract.md).

## Indice

- [AutoLabelAction](auto-label-action.md) — etichette e testi di ogni componente Filament dal file di lingua del modulo chiamante; salva solo le etichette mancanti.
- [SaveTransAction](save-trans-action.md) — scrive una chiave nel file di lingua: `execute()` solo dove l'interruttore lo permette, `persist()` sempre (pannello).
- [CleanPlaceholderTranslationsAction](clean-placeholder-translations-action.md) — toglie dai file «solo dati» i segnaposto uguali al nome del campo; cancella i file `.php` senza nome.
=======
Un file per Action, nome in kebab-case della classe (`save-trans-action.md`), frontmatter `type: contract`, `action: <FQCN>`, `module`, `status`, `updated`, e queste sei sezioni nell'ordine:

```markdown
## Input
## Output
## Invarianti
## Effetti collaterali
## Errori
## Non fa
```

Più, dove serve, `## Limiti noti`. La tabella delle invarianti ha le colonne `| ID | Regola | Group Pest |`.
Nome delle Action: `Get*`, mai `Resolve*` ([Xot ADR 0016](../../../Xot/docs/adr/0016-action-names-get-not-resolve.md)).

## Indice

| Contratto | Classe | Invarianti (con group / totali) | Chiamanti in produzione |
|---|---|---|---|
| [auto-label-action](auto-label-action.md) | `Actions\Filament\AutoLabelAction` | 3 / 6 | `LangServiceProvider::registerFilamentLabel()` |
| [clean-placeholder-translations-action](clean-placeholder-translations-action.md) | `Actions\CleanPlaceholderTranslationsAction` | 3 / 4 | comando `lang:clean-placeholders` |
| [get-all-module-translation-action](get-all-module-translation-action.md) | `Actions\GetAllModuleTranslationAction` | 1 / 1 | nessuno (duplicato del successivo) |
| [get-all-translation-action](get-all-translation-action.md) | `Actions\GetAllTranslationAction` | 1 / 1 | `Models\Traits\TranslationFileRowLoader` |
| [get-default-translatable-locale-action](get-default-translatable-locale-action.md) | `Actions\GetDefaultTranslatableLocaleAction` | 3 / 3 | `TranslationFileResource`, `LangBaseResource`, `LocaleSwitcherRefresh` |
| [get-translatable-locales-action](get-translatable-locales-action.md) | `Actions\GetTranslatableLocalesAction` | 2 / 3 | `TranslationFileResource`, `LangBaseResource`, `EditTranslationFile`, `LocaleSwitcherRefresh` |
| [get-trans-path-action](get-trans-path-action.md) | `Actions\GetTransPathAction` | 1 / 3 | `SaveTransAction` |
| [list-locale-options-action](list-locale-options-action.md) | `Actions\ListLocaleOptionsAction` | 2 / 3 | `SettingPage`, `LocaleSwitcherRefresh` |
| [merge-translations-action](merge-translations-action.md) | `Actions\MergeTranslationsAction` | 1 / 2 | nessuno |
| [publish-translation-action](publish-translation-action.md) | `Actions\PublishTranslationAction` | 2 / 2 | nessuno |
| [read-translation-file-action](read-translation-file-action.md) | `Actions\ReadTranslationFileAction` | 4 / 4 | `WriteTranslationFileAction` (solo `toPhp`) |
| [record-missing-translation-action](record-missing-translation-action.md) | `Actions\Translation\RecordMissingTranslationAction` | 1 / 2 | `TranslatorAdapter` (non registrato) |
| [save-trans-action](save-trans-action.md) | `Actions\SaveTransAction` | 9 / 9 | `AutoLabelAction`, `EditTranslationFile` |
| [sync-translations-action](sync-translations-action.md) | `Actions\SyncTranslationsAction` | 1 / 4 | nessuno |
| [trans-array-action](trans-array-action.md) | `Actions\TransArrayAction` | 3 / 3 | export Xot (`CollectionExport`, `XotBaseExporter`) |
| [trans-collection-action](trans-collection-action.md) | `Actions\TransCollectionAction` | 2 / 2 | export Xot (`QueryExport`, `LazyCollectionExport`) |
| [write-translation-file-action](write-translation-file-action.md) | `Actions\WriteTranslationFileAction` | 3 / 4 | nessuno |

Contratti di presentazione (non Action), tre livelli sulla stessa superficie:

| Contratto | Classe | Invarianti (con group / totali) |
|---|---|---|
| [language-switcher](language-switcher.md) | `View\Components\LanguageSwitcher` (dati alla vista) | 1 / 2 |
| [language-switcher-component](language-switcher-component.md) | `View\Components\LanguageSwitcher` (markup della vista) | 2 / 4 |
| [language-switcher-view-data](language-switcher-view-data.md) | `Filament\Widgets\LanguageSwitcherWidget` | 5 / 7 |

I vecchi ID `LANG-SWITCHER-001..003` di `language-switcher.md` non esistono più: sono `LANG-SWITCHER-INV-N`, `LANG-SWITCHVIEW-INV-N` e `LANG-SWITCHWIDGET-INV-N`.

Origine dei numeri: conteggio delle righe `| LANG-…-INV-N |` di ogni file; «con group» = la colonna Group Pest non dice «non dimostrato». Il conteggio si rifà da `laravel/Modules/Lang` con `grep -c "^| LANG-" docs/contracts/*.md` (invarianti) e `grep -rho "group('LANG-[A-Z]*-INV-[0-9]*" tests | sort -u | wc -l` (group distinti nei test).

## Stato di copertura

Misura del 2026-11-26.

- 20 contratti (17 Action, 3 di presentazione); tutte le Action di `app/Actions` hanno un contratto, tranne le due `Resolve*` (vedi sotto).
- 69 invarianti, 50 con group Pest (72 %), 19 senza. I group provati sono 50 e coincidono con gli ID dei contratti.
- «Con group» non vuol dire «provata a fondo»: i test di `AutoLabelAction` per i rami `INV-4..6`, di `GetAllTranslationAction` (`count >= 0`) e di `GetTransPathAction` (parte locale) asseriscono poco; le note stanno in «Limiti noti» di ciascun contratto.
- Pest non è stato eseguito in questa revisione (vincolo del lavoro): i group sono stati aggiunti per sostituzione puntuale e controllati con `php -l`, ma non ho il verde dei test. In particolare il test `LanguageSwitcher blade component empty branch when disabled` (`tests/Unit/LangHundredPercentCoverageTest.php:649`) si aspetta una vista che oggi il codice non può produrre (vedi `language-switcher.md`, «Limiti noti»): è verosimilmente rosso.

## Backlog contract

Superfici che scrivono, ma senza contratto proprio:

- `Casts/LangField::set()` (`app/Casts/LangField.php:41-48`): scrive su un modello con `$post->save()`.
- `Filament/Resources/TranslationFileResource/Pages/EditTranslationFile.php:137`: ingresso del pannello di traduzione, chiama `SaveTransAction::persist()` (il contratto è sull'Action, non sulla pagina).
- `Console/Commands/CleanPlaceholderTranslationsCommand` (`lang:clean-placeholders`): cancella e riscrive file di lingua; il comportamento è nel contratto dell'Action, non c'è un contratto sul comando (opzioni, codici d'uscita).
- `Adapters/TranslatorAdapter` (`app/Adapters/TranslatorAdapter.php:102`): scrive nel DB tramite `RecordMissingTranslationAction`, ma non è registrato.

Classi senza chiamanti, candidate alla rimozione (nessun test né contratto da perdere; decide il proprietario del modulo):

- `app/Actions/ResolveDefaultTranslatableLocaleAction.php` e `app/Actions/ResolveTranslatableLocalesAction.php`: nome vietato da Xot ADR 0016, sostituite da `GetDefaultTranslatableLocaleAction` e `GetTranslatableLocalesAction`. Prova: da `laravel/`, `rg "ResolveDefaultTranslatableLocale|ResolveTranslatableLocales" Modules Themes app config routes database -g '*.php' -g '*.blade.php'` trova solo i due file e il richiamo della prima verso la seconda. Restano citate in `docs/bmad/architecture.md`.
- `GetAllModuleTranslationAction`, `MergeTranslationsAction`, `PublishTranslationAction`, `SyncTranslationsAction`, `WriteTranslationFileAction`: solo test e docs, nessun chiamante in produzione (comando di prova per ciascuna nella sezione «Non fa» del suo contratto).

## Backlog test

Invarianti con contratto ma senza group Pest (19), da scrivere:

| ID | Cosa asserire |
|---|---|
| `LANG-AUTOLABEL-INV-4` | sezione senza titolo: segmento `empty` ma valore vuoto salvato, mai «empty» |
| `LANG-AUTOLABEL-INV-5` | azione con traduzione uguale al nome: etichetta di Filament invariata |
| `LANG-AUTOLABEL-INV-6` | traduzione array: etichetta `FIX:<chiave>` |
| `LANG-CLEAN-INV-4` | con `$dryRun` nessun file scritto né cancellato |
| `LANG-LOCOPT-INV-3` | bandiera vuota se il regionale non ha paese a due lettere |
| `LANG-MERGE-INV-2` | fusione superficiale: l'array annidato successivo sostituisce il precedente |
| `LANG-MISS-INV-1` | stessa chiave due volte: una sola riga |
| `LANG-PATH-INV-2` | generatore che lancia: percorso `base_path('Modules/<m>/lang')` |
| `LANG-PATH-INV-3` | la cartella usa `app()->getLocale()` |
| `LANG-SWITCHER-INV-2` | `canView()` falso: vista `lang::components.empty` (oggi irraggiungibile) |
| `LANG-SWITCHVIEW-INV-3` | `aria-current="page"` sulla lingua corrente |
| `LANG-SWITCHVIEW-INV-4` | `<details>`/`<summary>` nativi, nessun JavaScript obbligatorio |
| `LANG-SWITCHWIDGET-INV-3` | `UnsupportedLocaleException`: URL `/<codice>` |
| `LANG-SWITCHWIDGET-INV-5` | lingua non supportata: nessun redirect |
| `LANG-SYNC-INV-1` | un valore già presente nel target non si sovrascrive |
| `LANG-SYNC-INV-3` | il file target si riscrive sempre |
| `LANG-SYNC-INV-4` | `translations_added` conta solo le chiavi di primo livello |
| `LANG-TRANSLOC-INV-2` | valori non stringa o vuoti scartati |
| `LANG-WRITE-INV-1` | backup del file esistente in `storage/app/backups/translations/` |

Test deboli da rafforzare (hanno group ma asseriscono poco): `GetAllTranslationActionTest` (`count >= 0`), parte «locale» di `GetTransPathActionTest`, `converts array elements to strings without transKey` di `TransArrayActionTest` (solo conteggio), `LangHundredPercentCoverageTest.php:163` che mocka `File::glob` mentre le Action usano `Safe\glob` (il mock non ha effetto).

## Indici e template

- [INDEX.md](INDEX.md) / [index.md](index.md) — inventario machine-readable (due file identici, che differiscono solo per le maiuscole: su filesystem insensibili alle maiuscole collidono; l'unificazione è una decisione aperta).
- [_template.md](_template.md) — template `type: contract` con `action: <FQCN>` e le sei sezioni.
>>>>>>> .merge_file_wsdbUn
