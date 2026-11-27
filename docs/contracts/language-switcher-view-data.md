---
title: "Contratto — LanguageSwitcherWidget (lingue, URL, cambio lingua)"
type: contract
action: "Modules\\Lang\\Filament\\Widgets\\LanguageSwitcherWidget"
module: Lang
status: accepted
updated: 2026-11-26
qmd: "LanguageSwitcherWidget lingue disponibili getLanguageUrl changeLanguage redirect getViewData langs LaravelLocalization UnsupportedLocaleException LANG-SWITCHWIDGET"
---

# LanguageSwitcherWidget

Il widget Livewire/Filament che offre le lingue supportate, gli URL localizzati e il cambio lingua. È la sorgente dei dati del componente
[language-switcher](language-switcher.md). Sorgente: `app/Filament/Widgets/LanguageSwitcherWidget.php`
(`canView` `:42`, `getAvailableLocales` `:73`, `changeLanguage` `:100`, `getLanguageUrl` `:116`, `getViewData` `:135`, `isValidLocale` `:156`).
Perché `LaravelLocalization` e non un elenco fisso: [ADR 0001](../adr/0001-cambio-lingua-con-url-localizzato.md).

Test: `cd laravel && vendor/bin/pest Modules/Lang/tests/Unit/Filament/LanguageSwitcherWidgetTest.php` (oppure `--group=LANG-SWITCHWIDGET-INV-1`).

## Input

- `changeLanguage(string $locale)`, `getLanguageUrl(string $locale)`; `getAvailableLocales()` e `exposeViewData()` senza argomenti.

## Output

- `getAvailableLocales()`: `Collection` di `code`, `name`, `native_name`, `flag` (`null` se la configurazione della lingua non ha la chiave `flag`, `:84`).
- `getLanguageUrl()`: `string`.
- `exposeViewData()` / `getViewData()`: `array{available_locales: Collection, lang: string, langs: Collection}`, dove `langs` mappa `codice => ['url', 'native']` (`:135-153`).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| LANG-SWITCHWIDGET-INV-1 | Le lingue disponibili sono quelle di `LaravelLocalization::getSupportedLocales()`, nell'ordine della configurazione: nessun elenco fisso `it/en/de`. Se cade, aggiungere una lingua alla config non la mostra nel selettore. | `LANG-SWITCHWIDGET-INV-1` |
| LANG-SWITCHWIDGET-INV-2 | `getLanguageUrl()` ripiega su `/<codice>` se `LaravelLocalization` non restituisce una stringa (`:116-124`). | `LANG-SWITCHWIDGET-INV-2` |
| LANG-SWITCHWIDGET-INV-3 | `getLanguageUrl()` ripiega su `/<codice>` se `LaravelLocalization` lancia `UnsupportedLocaleException` (`:120-122`). | — (non dimostrato) |
| LANG-SWITCHWIDGET-INV-4 | `changeLanguage()` con una lingua supportata reindirizza all'URL localizzato (`:106`). | `LANG-SWITCHWIDGET-INV-4` |
| LANG-SWITCHWIDGET-INV-5 | `changeLanguage()` con una lingua non supportata non reindirizza (`:102-104`). Se cade, un parametro manipolato porta a un URL arbitrario `/<testo>`. | — (non dimostrato) |
| LANG-SWITCHWIDGET-INV-6 | I dati per la vista hanno le chiavi `available_locales`, `lang` e `langs` (`:148-152`). | `LANG-SWITCHWIDGET-INV-6` |
| LANG-SWITCHWIDGET-INV-7 | Il widget non è auto-scoperto dai pannelli Filament (`$isDiscovered = false`, `:37`). Se cade, compare in ogni dashboard. | `LANG-SWITCHWIDGET-INV-7` |

## Effetti collaterali

- `changeLanguage()` chiama `$this->redirect()` di Livewire: nessuna scrittura di sessione né di cookie da parte del widget; la lingua cambia con la richiesta all'URL localizzato.
- Una chiamata a `LaravelLocalization::getLocalizedURL($locale, null, [], true)` per ogni lingua a ogni `getViewData()`.

## Errori

- Nessuna eccezione al chiamante: `UnsupportedLocaleException` è catturata (INV-3), una lingua non valida è ignorata (INV-5).

## Non fa

- Non cambia `app()->setLocale()`.
- Non salva la lingua preferita dell'utente.
- Non decide se mostrarsi: `canView()` restituisce sempre `true` (vedi Limiti noti).

## Limiti noti

- `canView()` (`:42-45`) non legge nessuna configurazione. `lang.language_switcher.enabled` non è letta in `app/` né in `config/` (`rg language_switcher.enabled` trova solo i test):
  il ramo «disabilitato» di `LanguageSwitcher::render()` è raggiungibile solo sostituendo il widget nei test.
- INV-5 non ha un'asserzione: `tests/Unit/LangHundredPercentCoverageTest.php` chiama `changeLanguage` con una lingua non supportata senza verificare l'assenza di redirect.
- INV-6 e INV-4 condividono il test `tests/Unit/LangHundredPercentCoverageTest.php:620-647` (gruppo doppio) e `LanguageSwitcherWidgetTest.php:67` (INV-4).
