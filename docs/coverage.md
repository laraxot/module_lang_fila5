---
title: "Coverage del modulo Lang"
type: report
module: Lang
updated: 2026-08-31
qmd: "coverage lang pest config cache runningUnitTests guardia SaveTransAction livewire redirect"
---

# Coverage del modulo Lang

## Misura del 31 agosto 2026

Comando canonico (AD-25 — servono **entrambe** le opzioni: `-c` sposta il perimetro di
coverage, il path sposta il bootstrap di `Pest.php`):

```bash
cd laravel
XDEBUG_MODE=coverage ./vendor/bin/pest Modules/Lang/tests -c Modules/Lang/phpunit.xml --coverage --min=0
```

| | |
|---|---:|
| Test passati | 234 |
| Test saltati | 16 |
| Falliti | **1** |
| Asserzioni | 632 |
| Durata (con coverage) | 372 s |
| **Coverage di riga** | **non stampata** |

## Perché la percentuale non c'è

Pest stampa la tabella di coverage solo su suite verde. Con un test rosso la misura non
viene emessa, e `--min=0` non cambia questo: abbassa la soglia, non forza la stampa.
Finché il fallimento sotto resta aperto, il numero non è ottenibile da questo comando.

## Il fallimento aperto

`Modules/Lang/tests/Unit/LangHundredPercentCoverageTest.php:635` —
`LanguageSwitcherWidget covers changeLanguage urls and view data`:

```
Component did not perform a redirect.
Failed asserting that an array has the key 'redirect'.
```

Verificato: **preesistente**, non introdotto dalla rimozione dei duplicati di case della
story 5.28. Fallisce anche in isolamento con `--filter`, e il file di test non è stato
toccato. Accertato inoltre che:

- `getAvailableLocales()` su un'istanza semplice ritorna 3 locale (`it,en,de`) e
  `contains('code','en')` è `true`, quindi `isValidLocale('en')` è corretto fuori da Livewire;
- sotto `Livewire::test()` la `call('changeLanguage','en')` non registra alcun effetto
  (`effects` vuoto) e non scrive la sessione;
- non esistono classi `LanguageSwitcherWidget` duplicate che Livewire possa risolvere al
  posto di quella di Lang.

Resta da capire perché `$this->redirect(request()->url())` non produca l'effetto sotto il
contesto Livewire/Filament. Tracciato come lavoro a sé.

## Due precondizioni che invalidano la misura

1. **`bootstrap/cache/config.php` non deve esistere.** Con la config in cache
   `config('app.env')` vale `production`, `app()->runningUnitTests()` è `false`, e la
   guardia di `SaveTransAction` non scatta: la suite **riscrive** i file
   `Modules/Lang/lang/*/*.php` tracciati in git. Misurato: 7 file, 3679 righe,
   `declare(strict_types=1)` rimosso. Il file è gitignored e viene rigenerato da un
   qualsiasi `artisan optimize` di un altro agente, quindi va ricontrollato ogni volta.
2. **`git status` di `lang/` va verificato dopo ogni run.** Anche a config cache assente
   la suite ha riscritto quei 7 file: la guardia di `SaveTransAction` copre una sola via
   di scrittura, non tutte. Ripristinare con `git checkout -- lang/` prima di committare.

## Storico

| Data | Passati | Saltati | Falliti | Coverage |
|---|---:|---:|---:|---|
| 2026-08-31 | 234 | 16 | 1 | non stampata (suite rossa) |
