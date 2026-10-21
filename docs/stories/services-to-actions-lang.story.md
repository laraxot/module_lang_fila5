---
title: "[STORY] Services -> Actions nel modulo Lang (TranslatorService)"
type: story
status: done
priority: medium
created: 2026-10-08
updated: 2026-10-08
module: Lang
tags: [bmad, services, queueable-actions, no-services-rule, translator, adapter, cleanup]
qmd: "lang TranslatorService residuo TranslatorAdapter RecordMissingTranslationAction translator singleton"
related:
  - ./lang-services-to-actions.story.md
  - ../../../../bmad-output/epic-code-standards-services-mixed-const.md
  - ../../../../bashscripts/ai/wiki/rules/no-services-rule.md
---

# Services -> Actions nel modulo Lang

## Richiesta

Ordine permanente (2026-10-08): nessun `app/Services` ne' classe `*Service`; ogni use case e' una Queueable Action con
tutti i chiamanti aggiornati.

## Analisi (lo scopo, non il messaggio)

`Services/TranslatorService` (commit `f80d2ee6`, 2026-10-07) estendeva `Illuminate\Translation\Translator`: quando una
chiave manca registra la riga in `Translation` (pattern barryvdh/translation-manager) e riprova col fallback. Aveva un
`use QueueableAction` e un `execute(): void {}` vuoto solo per sembrare un'Action.

Lo scopo e' gia' coperto da due pezzi:

- `Adapters/TranslatorAdapter`: estensione del Translator Laravel legata al container (`translator`) da
  `LangServiceProvider::registerTranslator()` e da `Providers/Traits/TranslatorTrait`. Un Translator non puo' essere una
  Action (e' il servizio del framework), per questo vive in `Adapters/` con l'eccezione documentata nel file.
- `Actions/Translation/RecordMissingTranslationAction`: la business logic di `notifyMissingKey()`.

Chiamanti di `TranslatorService`: nessuno nel codice. Il suo test (`tests/Unit/Services/TranslatorServiceTest.php`)
non lo istanziava: chiede `app('translator')` e verifica che una chiave mancante torni se stessa, quindi in realta'
copre `TranslatorAdapter`.

## Modifiche

- Eliminato (recuperabile da `HEAD` di `Modules/Lang`): `app/Services/TranslatorService.php`; directory
  `app/Services/` rimossa.
- Nessun chiamante da aggiornare; nessuna `const` nel perimetro. Il test resta: verifica il translator vero.

## Verifica

- `rg TranslatorService` / `Modules\Lang\Services` su `laravel/Modules`, `Themes`, `app`, `config`, `routes`,
  `resources`, `tests` (esclusi docs/vendor): resta solo l'etichetta del `describe()` nel test e una riga di
  CHANGELOG storico.
- PHPStan (`phpstan.neon`, da `laravel/`) su `Modules/Lang/app/Adapters`: `[OK] No errors` (esecuzione unica per i cinque moduli, dettaglio nella story Media).

## Aperto

- `app/Actions/TranslatorAction.php` estende anch'essa `Illuminate\Translation\Translator` (terza copia dello stesso
  codice, nominata "Action"). Fuori perimetro: da confrontare con `TranslatorAdapter` e consolidare.
- `tests/Unit/Services/TranslatorServiceTest.php` andrebbe rinominato in `TranslatorAdapterTest` (non fatto per
  non toccare file fuori perimetro).

## Wave A audit — 2026-10-20

Conferma sul checkout corrente: `app/Services/TranslatorService.php` era ancora presente, ma non risultano
caller applicativi (`new TranslatorService`, `app(TranslatorService::class)` o riferimenti al namespace) in
`laravel/`. Non è stato creato un nuovo Action: il comportamento applicativo è già coperto da
`Actions/Translation/RecordMissingTranslationAction`, chiamato da `Adapters/TranslatorAdapter`.

La modifica effettiva è quindi la rimozione del duplicato morto. `TranslatorAdapter` resta infrastruttura Laravel
e mantiene invariati binding, fallback, conversione del risultato e registrazione delle chiavi mancanti.

## Nota di verifica 2026-10-20

Epic: [epic-services-to-queueable-actions](../../../../../bmad-output/epic-services-to-queueable-actions.md). Misura delle 13:00 UTC circa, righe volatili.

- Su disco `Lang/app/Services/` non esiste e `TranslatorService.php` e' cancellato (commit `30be5133`, 12:17 UTC). `git -C Modules/Lang ls-tree -r --name-only laraxot/dev -- app/Services | wc -l` restituisce 0. Il test `tests/Unit/Services/TranslatorServiceTest.php` citato sopra non esiste piu' (resta `tests/Unit/Adapters/TranslatorAdapterTest.php`).
- Sostituito da `Adapters/TranslatorAdapter` (un Translator non e' un'Action, vive in `Adapters/`) e da `Actions/Translation/RecordMissingTranslationAction`, che l'Adapter chiama. Chiamanti del Service: zero.
- Parita' da verificare, punto aperto che contraddice "binding invariato": `registerTranslator()` (`LangServiceProvider` riga 147 e `Providers/Traits/TranslatorTrait` riga 14) non ha nessuna chiamata attiva. L'unica chiamata, `LangServiceProvider` riga 43, e' commentata; il trait e' usato solo dalla sonda PHPStan `TranslatorTraitPhpstanProbe`. Cercati con `rg` `singleton('translator'` ed `extend('translator'` in Modules, Themes, app, bootstrap e config: solo quelle due definizioni.
- Se la ricerca e' completa, `app('translator')` e' il Translator stock di Laravel e la registrazione delle chiavi mancanti (lo scopo del Service) oggi non gira, ne' con il Service ne' con l'Adapter. Non verificato a runtime (`get_class(app('translator'))`). Decisione da prendere in W2/W3: attivare il binding con un test, oppure togliere Adapter e Action.
