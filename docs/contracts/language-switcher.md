---
title: "Contratto — LanguageSwitcher (componente Blade: dati alla vista)"
type: contract
action: "Modules\\Lang\\View\\Components\\LanguageSwitcher"
module: Lang
status: accepted
updated: 2026-11-26
qmd: "LanguageSwitcher componente Blade render canView lang::components.language-switcher empty available_locales current_locale widget_id LANG-SWITCHER"
---

# LanguageSwitcher: cosa il componente passa alla vista

Il componente `<x-lang::language-switcher />` calcola i dati e sceglie la vista. Sorgente: `app/View/Components/LanguageSwitcher.php:43-62`.
Il contratto è su tre livelli, tutti sulla stessa classe o sulla stessa vista, senza duplicati:

1. questo file: i dati che `render()` passa alla vista (`LANG-SWITCHER-INV-N`);
2. [language-switcher-component](language-switcher-component.md): il markup della vista (`LANG-SWITCHVIEW-INV-N`);
3. [language-switcher-view-data](language-switcher-view-data.md): il widget da cui arrivano lingue e URL (`LANG-SWITCHWIDGET-INV-N`).

Perché è un componente Blade e non Livewire: [ADR 0006](../adr/0006-language-switcher-standalone-view.md).

Test: `cd laravel && vendor/bin/pest Modules/Lang/tests/Unit/LangCoverageBoostTest.php` (oppure `--group=LANG-SWITCHER-INV-1`).

## Input

- Nessun argomento: il costruttore crea un `LanguageSwitcherWidget` (`:33-36`). Legge `app()->getLocale()`.

## Output

- `Illuminate\Contracts\View\View`:
  - vista `lang::components.language-switcher` con `current_locale` (stringa), `available_locales` (collezione di `code`, `name`, `native_name`, `flag`, `url`) e `widget_id` (`language-switcher-<uniqid>`) (`:55-61`);
  - oppure `lang::components.empty` quando `LanguageSwitcherWidget::canView()` è falso (`:45-47`).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| LANG-SWITCHER-INV-1 | `render()` passa alla vista `lang::components.language-switcher` le lingue con l'`url` già risolto da `LanguageSwitcherWidget::getLanguageUrl()` (`:49-53`). Se cade, la vista deve conoscere il widget o generare gli URL da sé. | `LANG-SWITCHER-INV-1` (il test asserisce nome vista e chiave `available_locales`; `current_locale` e `widget_id` non sono asseriti) |
| LANG-SWITCHER-INV-2 | Con `canView()` falso, `render()` restituisce la vista vuota `lang::components.empty`. | — (non dimostrato) |

## Effetti collaterali

- `uniqid()` a ogni render: l'HTML cambia a ogni richiesta (`widget_id`), quindi non è cacheabile per intero.
- Una chiamata a `LaravelLocalization::getLocalizedURL()` per ogni lingua supportata (tramite `getLanguageUrl`).
- Nessuna scrittura.

## Errori

- `LaravelLocalization` che non riesce a produrre una stringa, o un `UnsupportedLocaleException`: l'URL ripiega su `/<codice>` (vedi [language-switcher-view-data](language-switcher-view-data.md), INV-2 e INV-3). Nessuna eccezione al chiamante.

## Non fa

- Non cambia la lingua: i link portano all'URL localizzato, la lingua cambia con la richiesta successiva.
- Non usa Livewire e non richiede JavaScript (vedi il contratto del markup).
- Chiamanti: le viste dei temi che includono `<x-lang::language-switcher />` (ricerca non esaustiva in questa passata).

## Limiti noti

- `LanguageSwitcherWidget::canView()` restituisce sempre `true` (`app/Filament/Widgets/LanguageSwitcherWidget.php:42-45`), quindi il ramo `lang::components.empty` non è raggiungibile in esecuzione normale:
  INV-2 descrive un comportamento che oggi non può accadere. La chiave `lang.language_switcher.enabled` è letta solo da `tests/Unit/LangHundredPercentCoverageTest.php:146` e `:650`,
  in nessun file di `app/` né di `config/`: un test che si aspetta la vista vuota con quella chiave a `false` non ha un'implementazione che lo soddisfi (difetto da decidere: far leggere la chiave a `canView()`, oppure togliere il ramo e i test).
- I vecchi ID `LANG-SWITCHER-001..003` di questo file sono sostituiti da `LANG-SWITCHER-INV-N` (dati), `LANG-SWITCHVIEW-INV-N` (markup) e `LANG-SWITCHWIDGET-INV-N` (widget).
