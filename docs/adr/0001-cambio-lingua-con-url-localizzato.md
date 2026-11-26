---
title: "ADR — Cambio lingua con URL localizzato"
type: decision
status: accepted
created: 2026-11-23
updated: 2026-11-26
module: Lang
decision-makers: [Lang module owner]
qmd: "0001 cambio lingua url localizzato"
---

# ADR: cambio lingua con URL localizzato

## Contesto

Il front office deve permettere a ospiti e utenti autenticati di cambiare
lingua senza perdere la pagina corrente. Il modulo riceve le lingue da
Laravel Localization e deve evitare URL costruiti con codici non supportati o
un cambio limitato a una preferenza di sessione.

## Driver della decisione

- Conservare la pagina equivalente nel nuovo locale.
- Usare una sola fonte per l'elenco dei locali supportati.
- Rendere il widget pubblico e non confonderlo con un editor amministrativo.

## Alternative scartate

- Salvare soltanto il locale in sessione e lasciare l'URL invariato: non
  rende esplicita la lingua nella navigazione.
- Hardcodare `it`, `en`, `de` e `es`: diverge dalla configurazione effettiva.
- Accettare qualsiasi codice passato al metodo Livewire: permette URL per
  locali non supportati.

## Decisione

`LanguageSwitcherWidget` legge `getSupportedLocales()`, costruisce gli URL con
`getLocalizedURL()` e reindirizza solo se il codice è tra quelli supportati.
Il widget è montato esplicitamente nel tema, è visibile senza autenticazione e
non è auto-scoperto come card Filament. Le impostazioni del locale restano nel
backoffice e nella pagina di configurazione dichiarata super-admin-only.

## Conseguenze

- Buono: il link mantiene la rotta equivalente e rende il locale verificabile
  nell'URL.
- Buono: nuove lingue configurate sono disponibili senza modificare il widget.
- Cattivo: una rotta equivalente o una configurazione incompleta può produrre
  fallback `/locale` o una pagina non disponibile.
- Cattivo: il widget dipende dal contratto di Laravel Localization.

## Conferma

- `cd laravel && vendor/bin/pest Modules/Lang/tests/Unit/Filament/LanguageSwitcherWidgetTest.php`
  prova: widget non auto-scoperto (`LANG-SWITCHWIDGET-INV-7`), lingue da
  `LaravelLocalization` (`-INV-1`), fallback `/<locale>` quando l'URL non è una
  stringa (`-INV-2`), redirect per una lingua supportata (`-INV-4`). Il contratto
  è [language-switcher-view-data](../contracts/language-switcher-view-data.md).
- Non confermato da un test: nessun redirect per un codice non supportato
  (`-INV-5`; `tests/Unit/LangHundredPercentCoverageTest.php:646` chiama
  `changeLanguage('xx')` senza asserzione) e il fallback per
  `UnsupportedLocaleException` (`-INV-3`). Proposta: due test in
  `LanguageSwitcherWidgetTest.php` con quei gruppi.
- Regola di revisione: `app/Filament/Pages/SettingPage.php:13-30` resta il punto
  delle impostazioni supportate/default, solo super-admin.
