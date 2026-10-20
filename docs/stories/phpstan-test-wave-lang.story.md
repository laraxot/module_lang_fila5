---
title: PHPStan test wave, lane lang
type: story
module: Lang
phase: implementazione, quality gate
status: done
created: 2026-10-20
updated: 2026-10-20
related:
  - ../../../Xot/docs/stories/phpstan-test-wave-regression.story.md
  - ./phpstan-lang-zero.story.md
  - ./17.4.helper-testcase-dichiarati-mai-scritti.story.md
  - ./services-to-actions-lang.story.md
  - ../scopo.md
---

# PHPStan test wave: lane lang

Fase BMAD: implementazione e quality gate. Coordinamento del run in
[phpstan-test-wave-regression.story.md](../../../Xot/docs/stories/phpstan-test-wave-regression.story.md).
Bucket: 14 file di `Modules/Lang` con errori (7 sorgenti, 112 errori nei test).

## Misura

| Momento | Errori sui 14 file del bucket |
|---|---|
| Baseline delle 09:00 | 119 (112 nei 10 file di test, 7 in 4 file di produzione) |
| Ri-misura prima di editare (PHPStan mirato, 09:56-09:57) | 0 (i file `Change.php` e `Switcher.php` sono stati ritoccati ancora alle 09:57:47: la prova finale e' il run di modulo sotto) |
| Dopo (`phpstan analyse Modules/Lang`, 12:28) | 0, exit 0 (vedi Aggiornamento delle 12:30) |

La ri-misura ha trovato i 14 file gia' corretti nel working tree: nessun file e' stato editato da questa lane.
Le modifiche (mtime 09:51-09:58, nessun lock `.lock` presente) sono di una lane concorrente della stessa
ondata (bucket `gdpr-lang-ai`, task `phpstan-gdpr-lang-ai`): attribuzione inferita dalla scratchpad di quella
sessione (`lang-app.txt`, `lang-tests.txt`) e dagli orari, non provata da un lock. Questa lane ha verificato,
rivisto il diff rispetto alle regole (nessun ignore, baseline, `assert()` o cast di comodo) e scritto la documentazione.

## Causa alla sorgente

I 112 errori dei test hanno una radice sola: in `HEAD` (commit `04d814ea`, il pull delle 09:04) i 10 file di
test e infrastruttura di Lang sono bozze anteriori al ciclo verificato dell'8 ottobre. Il contenuto oggi nel
working tree coincide byte per byte con i blob del commit `2d15ac80` (2026-10-08 16:16, ciclo chiuso a 0
errori) per tutti e 10 i file; quattro di essi coincidono anche con `23eaf839` (2026-10-18).
`git show 2d15ac80:<path> | git hash-object --stdin` contro `git hash-object <path>` lo riproduce.

## Scopo capito, per causa

| Causa | Errori baseline | Scopo del codice | Correzione |
|---|---|---|---|
| `tests/TestCase.php` estendeva `Illuminate\Foundation\Testing\TestCase` con `CreatesApplication` | 39 `mockService` + 1 `loadLaravelMigrations` | Il `TestCase` di modulo deve estendere `XotBaseTestCase` (`mockService`, `expectThrowableMessage`, app Laravel gia' pronta) e usare `DatabaseTransactions`; non rilancia migrazioni ne' `module:seed` | `TestCase` su `XotBaseTestCase`, provider `User` + `Lang` |
| Helper chiamati e mai scritti (story 17.4) | 16 `staticMethod.notFound`, 2 `function.notFound` `createTranslationFile`, 1 `cleanupTranslationFile`, 1 `lang` | Preparare un file di traduzione e legare/slegare `SaveTransAction` nel container | `createTranslationFile`, `bindRealSaveTransAction`, `forgetSaveTransActionOverride` in `TestCase` (statici, `array<string, string>`); `createTranslationFile`/`cleanupTranslationFile` in `Pest.php` con `Safe\file_put_contents`/`unlink` |
| `Modules\Lang\Models\Language` non esiste (il modello reale e' `LanguageLine`; `git log --all -S'class Language ' -- app` e' vuoto: la classe non e' mai esistita nel prodotto, il suo nome compare solo nei test) | 9 | Specifica fantasma | Tolti `createLanguage`, `makeLanguage`, `toBeLanguage` da `Pest.php`; nessun chiamante residuo (`rg` in `tests`) |
| `expect()` ridondanti su tipi gia' noti, `and()` con template non risolvibile | 25 (`pest.expectation.redundant` 16, `impossible` 2, `argument.templateType` 5, altri 2) | Verificare tipo e valore | Asserzioni piatte `PHPUnit\Framework\Assert::assert*` (stile fissato in [11-phpstan.md](../../../../../bashscripts/docs/prompts/11-phpstan.md)) |
| `->fresh()` puo' essere `null`; `TranslationFile` letta con colonne inesistenti (`user_id`, `filename`, `locale`) | 8 | Verificare stato dopo `update()`; `TranslationFile` ha `name` e `path` in `$fillable` e `@property` | `assertNotNull` prima dell'accesso; test riallineato alle colonne vere |
| Tipi dei helper di `Pest.php` (`$attributes` senza shape, `Factory` generica) | 4 + 2 `create()/make()` su `mixed` | Creare un `Translation` via factory | `@param array<string, mixed>`, `TranslationFactory::new()->createOne()` |
| `Safe\` mancante (`chmod`, `file_put_contents`), `strlen(mixed)`, `offset 'failed'` su `mixed` | 4 | | Corpi verificati del ciclo di ottobre |

## Produzione: 7 errori in 4 file

| File | Errore | Scopo | Correzione |
|---|---|---|---|
| `app/Services/TranslatorService.php` (2) | `missingType.iterableValue` su `get()` | Estensione del Translator che registra le chiavi mancanti: codice morto, nessun chiamante; lo scopo e' gia' in `Adapters/TranslatorAdapter` + `RecordMissingTranslationAction`. Decisione scritta in [services-to-actions-lang.story.md](./services-to-actions-lang.story.md) (sezione Wave A) e in [scopo.md](../scopo.md) ("va cancellato") | File cancellato; `rg TranslatorService` su `laravel/` (esclusi docs e vendor) senza risultati |
| `app/Http/Livewire/Lang/Change.php` e `Switcher.php` (2+2) | `$langs` senza value type; `@phpstan-ignore staticMethod.notFound` non corrisposto | La vista `lang::livewire.lang.change` legge per ogni lingua le chiavi del config mcamara piu' `url` | `@var array<string, array<mixed>>` sulla proprieta'; `Arr::map` con closure tipizzata sostituito da `foreach` che salta chiavi non stringa e voci non array; ignore rimosso (la chiamata alla facade risolve). Stato successivo: vedi Aggiornamento delle 12:30 |
| `app/Filament/Actions/LocaleSwitcherRefresh.php` (1) | `argument.type`: closure `array $data` e' `array<mixed, mixed>`, `applyLocale()` vuole `array<string, mixed>` | `applyLocale()` normalizza `locale` e ripiega su `en` se non e' stringa | La closure passa `['locale' => $data['locale'] ?? null]`: stesso comportamento (null e assente ripiegano entrambi su `en`). Superata dal contratto `applyLocale(string)` + `normalizeLocale(mixed)`, vedi Aggiornamento delle 12:30 |

## Cosa resta

- `Change` e `Switcher` sono ora identici: la story [12.1](./12.1.retire-lang-http-switchers.story.md) ne prevede il ritiro a favore del widget. Non toccato.
- Due `@phpstan-ignore trait.unused` preesistenti (`Providers/Traits/TranslatorTrait.php`, `Models/Traits/HasStrictTranslations.php`) e la classe `Providers/TranslatorTraitPhpstanProbe.php`, che esiste solo per ospitare il trait: scorciatoie vietate dal prompt 11, ma non sono tra i 119 errori e la scelta (tenere o cancellare `TranslatorAdapter`, trait e probe con i loro test) e' la decisione 3 di [scopo.md](../scopo.md). Da decidere, non presa.
- Docs che citano ancora `TranslatorService` come esistente: `architecture/autolabel-flow-complete.md` (sez. 6), `performance/lang-optimizations.md`, `philosophy.md`.
- `Pest` non lanciato: DB di test assente e regola MySQL-only.

## Docs corrette in questa lane

- `README.md`: tre link a `docs/wiki/concepts/*` nel root (inesistenti) puntati ai canonici in `bashscripts/ai/wiki/concepts/`.
- `testing.md`, `testing-rules.md`, `testing-guidelines.md`: "SQLite in-memory" / `DB_CONNECTION=sqlite` riallineati a MySQL (`laravel/.env.testing` ha `DB_CONNECTION=mysql`; regola `bashscripts/ai/wiki/rules/workflow/mysql-testing-only.mdc`), coerente con il `TestCase` ripristinato che dichiara "Uses MySQL from .env.testing".
- `00-INDEX.md`: link a questa story.

## Ripristino dei test (lane gdpr-lang-ai)

Provenienza delle dieci riscritture citate sopra, verificata e non solo inferita: la lane `gdpr-lang-ai`
(`TASK_ID=phpstan-gdpr-lang-ai`, lock presi e rilasciati con `bashscripts/lock`) ha scritto i file con
`git -C Modules/Lang show ed595680:<path> > <path>` dopo gate lock + mtime, senza `checkout` ne' `restore`.
`ed595680` e' il merge del 2026-10-13 13:23, padre di `04d814ea`; i suoi blob coincidono con `2d15ac80`
(`cmp` esatto sui 10 file subito dopo la scrittura). Prima/dopo righe: `Pest.php` 66 -> 73, `TestCase.php` 46 -> 133,
`LangBusinessLogicTest` 386 -> 361, `LangHundredPercentCoverageTest` 941 -> 948, `LangFinalGapsTest` 591 -> 587,
`LangServiceProviderTest` 463 -> 439, `LangCoverageGapsTest` 386 -> 386, `LangCoverageBoostTest` 342 -> 339,
`ReadTranslationFileActionTest` 183 -> 226, `Models/BaseModelTest` 39 -> 46.
La baseline delle 09:00 di questa lane era 229 errori sugli stessi 14 file (222 nei test, 7 nelle sorgenti): il
conteggio 119 sopra e' una misura successiva, dopo il resolver delle factory in `XotServiceProvider` che ha tolto i
`Cannot call method ... on mixed` legati a `::factory()`.
Le sorgenti `Change.php`, `Switcher.php`, `LocaleSwitcherRefresh.php` e `TranslatorService.php` NON sono state toccate da
questa lane; dopo l'istruzione del coordinamento (i `*Service` sono in carico alla conversione Services) non e'
stato toccato nessun Service.

Limite di repo: il `.gitignore` di Lang contiene `phpstan*` (riga 123), quindi questa story e' ignorata da git
finche' non si usa `git add -f` (le altre story `phpstan-*` del modulo sono tracciate perche' aggiunte a forza).

## Verifica

```bash
cd laravel && nice -n 10 ./vendor/bin/phpstan analyse Modules/Lang \
  --memory-limit=2G --no-progress --error-format=raw \
  > ../.cursor-scratch/phpstan-wave/Lang.verify.txt 2>&1
```

Esito (lane swarm `phpstan-lang-swarm-wave`, 2026-10-20): **EXIT 0**, file verify senza errori.
Claim di chiusura: [phpstan-lang-swarm-wave.story.md](./phpstan-lang-swarm-wave.story.md).
Sintesi missione zero (inventario 203 -> 0): [phpstan-lang-zero.story.md](./phpstan-lang-zero.story.md).

## Correzione bootstrap PHPStan - 2026-10-20 (aggiornamento pm)

`LangServiceProviderTest` istanzia il provider per registration, boot e
caricamento traduzioni. **SSoT tipizzato**: `TestCase::makeLangServiceProvider(): LangServiceProvider`;
i test usano `\Modules\Lang\Tests\TestCase::makeLangServiceProvider()`; `tests/Pest.php`
resta wrapper globale. Non duplicare l'helper nei file test (PHPStan non esegue
Pest come runtime -> `function.notFound` e cascata su `mixed`).

Non si aggiunge `scanFiles` su `Pest.php` in `phpstan.neon` (neon immutabile).
Dettaglio inventario 203 -> 0: [phpstan-lang-zero.story.md](./phpstan-lang-zero.story.md).

Verifica fleet (2026-10-20):

```bash
cd laravel && ./vendor/bin/phpstan analyse Modules --memory-limit=2G --no-progress
# [OK] No errors - file_errors=0
```

## Aggiornamento delle 12:30 (lane lang, ripresa dopo il limite di sessione)

Stato verificato sul disco e in git (`git -C Modules/Lang`), non dedotto dalle story dei peer.

- Contratto di `LocaleSwitcherRefresh`: `applyLocale(string $locale)` e bordo form `normalizeLocale(mixed): string` (fallback
  `en`); la closure `->action()` compone i due. Chiamanti in tutti i moduli e temi (`rg`): solo test di Lang
  (`LocaleSwitcherRefreshTest`, `LangFinalGapsTest`). Il commit `9dd9c955` (autore Malebestia) porta lo stesso contratto.
- `TranslatorService`: cancellato dal commit `ed749214`; zero chiamanti. Non convertito ne' ricreato da questa lane: la
  conversione dei `*Service` e' un'epic del coordinamento. Se serve il contratto: `git show 30be5133^:app/Services/TranslatorService.php`
  (firma `get(mixed $key, array<string, mixed> $replace, mixed $locale, mixed $fallback): string|array<mixed>`).
- `Change` e `Switcher` (Livewire): non toccati da questa lane. Il commit di sync `30be5133` (12:17) li ha cancellati dal
  working tree; il commit `9dd9c955` li modifica (normalizza la locale). Risultato: merge in corso nel repo Lang
  (`MERGE_HEAD` = `9dd9c955`), 10 percorsi non uniti, tra cui questi due in stato `DU`. Chiamanti del tag
  `<livewire:lang.change>`: nessuno attivo in `Modules/*` e `Themes/*` (solo righe commentate in Cms); la vista
  `lang::livewire.lang.change` resta. Decisione per il coordinamento: la regola "Livewire in widget" chiede di tenere il
  contratto fino alla conversione, ma l'indice git dice cancellati; non risolto qui perche' il merge e' di un'altra sessione.
- Merge in corso: un run di modulo alle 12:22-12:26 ha letto marker di conflitto in `ReadTranslationFileActionTest.php` e
  `LangServiceProviderTest.php` (`phpstan.parse`, 121 messaggi). Le due working copy sono state ripulite alle 12:24:08 da
  chi risolve il merge; la misura e' quindi da ripetere a merge chiuso, non vale come errore di codice.
- Edit di questa lane: rimossi 4 `/** @var TestCase $this */` da `ReadTranslationFileActionTest.php` (`uses(TestCase::class)`
  c'e' gia' e il plugin Pest fornisce `$this`); il commit `9dd9c955` fa la stessa rimozione (`4 -`).
- Docs: `README.md` (3 link), `testing.md`, `testing-rules.md`, `testing-guidelines.md` (MySQL, non SQLite) e il link in
  `00-INDEX.md`, quest'ultimo ora tra i file `UU` del merge.

Verifica finale di questa lane (in coda su `flock` come da coordinamento): `phpstan analyse Modules/Lang --memory-limit=2G
--no-progress --error-format=raw`, avviata 12:27:58, conclusa 12:28:49, **exit 0**, nessuna riga `identifier=` (solo la nota di
configurazione). Nessun file di codice o test di Lang modificato dopo 12:24:08 (ultimo `mtime`), nessun marker `<<<<<<<` nei `.php`
di `app/` e `tests/`. Il run precedente (12:22-12:26) e' stato invalidato dai marker del merge e non si conta. Pest non lanciato
(DB di test assente, regola MySQL-only). Il merge del repo Lang resta aperto (10 percorsi `UU`/`DU`): chi lo chiude deve ripetere
la verifica.

## Esito della lane gdpr-lang-ai

| Momento | Errori sui 14 file del bucket |
|---|---|
| Baseline delle 09:00 | 229 |
| Dopo il ripristino dei 10 test (09:51) | 0 sui 10 test; 7 residui nelle 4 sorgenti, riparati sul posto da un'altra sessione |
| Ri-misura dopo la ripresa, a merge chiuso (12:36, ripetuta dopo le 12:49 dietro il gate flock) | 0 su 45 file di `tests/` e 59 di `app/` |

Tre dei 14 file non esistono piu': `Switcher.php`, `Change.php` (Livewire, ritirati dalla story 12.1) e `TranslatorService.php`
(doppione morto di `Adapters/TranslatorAdapter`). Sono stati cancellati da altre sessioni (`ed749214`, `30be5133`), non da questa lane,
che dopo l'ordine del coordinamento non ha toccato nessun `*Service`. I loro 6 errori sono spariti con i file.

Un run intero delle 12:22-12:26 ha riportato `function.notFound langAssertDatabaseHasRow` e `Class Modules\Lang\Tests\TestCase not found`:
nessuno era un errore di codice. Il repo del modulo era a meta' di un `git merge` di `laraxot/dev` (10 percorsi `UU`/`DU`) e `tests/Pest.php`
era momentaneamente assente. A merge chiuso (`d5313242`, 12:32) i due file sono tornati e la ri-misura da' 0.
Nessun file del bucket e' stato saltato per gate. Il `.gitignore` di Lang ignora `phpstan*`: questa story va aggiunta con `git add -f`.
