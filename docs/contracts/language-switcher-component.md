---
title: "Contratto — LanguageSwitcher (markup della vista)"
type: contract
action: "Modules\\Lang\\View\\Components\\LanguageSwitcher"
module: Lang
status: accepted
updated: 2026-11-26
qmd: "language-switcher vista blade markup a href details summary aria-current senza Livewire senza JavaScript lang::components.language-switcher LANG-SWITCHVIEW"
---

# LanguageSwitcher: il markup della vista

Cosa promette la vista `resources/views/components/language-switcher.blade.php` ai temi che la incorporano. I dati arrivano da
[language-switcher](language-switcher.md); la classe è la stessa (`app/View/Components/LanguageSwitcher.php`). Perché una vista autonoma senza Livewire:
[ADR 0006](../adr/0006-language-switcher-standalone-view.md).

Test: `cd laravel && vendor/bin/pest Modules/Lang/tests/Unit/LangCoverageBoostTest.php` (oppure `--group=LANG-SWITCHVIEW-INV-1`).

## Input

- `$current_locale` (stringa) e `$available_locales` (collezione con `code`, `name`, `native_name`, `flag`, `url`): vedi la tabella di [language-switcher](language-switcher.md).

## Output

- Un elemento `<li class="language-switcher-container">` con un `<details class="dropdown">`: il `<summary>` mostra bandiera e codice della lingua corrente (`:12-30`),
  l'elenco ha un `<a href>` per ogni lingua (`:34-39`).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| LANG-SWITCHVIEW-INV-1 | Ogni lingua è un `<a href="{{ $locale['url'] }}">` con l'URL ricevuto, non un pulsante né un'azione Livewire (`:36`). Se cade, il cambio lingua non funziona senza JavaScript e non è indicizzabile. | `LANG-SWITCHVIEW-INV-1` |
| LANG-SWITCHVIEW-INV-2 | La vista non usa `$this`, né `wire:` né Alpine: funziona come componente Blade anonimo fuori da Livewire (`$this` in un componente Blade senza classe rompe il render). | `LANG-SWITCHVIEW-INV-2` |
| LANG-SWITCHVIEW-INV-3 | La lingua corrente ha `aria-current="page"` (`:38`). Se cade, i lettori di schermo non annunciano quale lingua è attiva. | — (non dimostrato) |
| LANG-SWITCHVIEW-INV-4 | Il menu si apre con `<details>`/`<summary>` nativi, senza JavaScript obbligatorio (`:12-13`). | — (non dimostrato) |

## Effetti collaterali

- Nessuno: sola resa. Usa `<x-heroicon-o-chevron-down>` e `<x-heroicon-o-check>` (pacchetto delle icone Heroicons): se mancano, il render fallisce.

## Errori

- Una lingua senza chiave `flag`, `native_name` o `name` produce un errore Blade (indice non definito): la vista si fida dei dati di `getAvailableLocales()`, che li produce sempre.

## Non fa

- Non calcola gli URL e non sceglie le lingue.
- Non carica CSS né JS: le classi (`dropdown`, `menu`, `btn`) sono del tema che la incorpora; fuori da un tema con quelle classi il menu è un elenco non stilato.
- Non salva la preferenza di lingua: lo fa la rotta localizzata.

## Limiti noti

- Il test di INV-1 e INV-2 (`tests/Unit/LangCoverageBoostTest.php:195-221`) asserisce solo `href=` e l'assenza della stringa `$this` nell'HTML renderizzato: non verifica che l'URL sia quello del widget né l'assenza di `wire:`.
- La vista ha l'etichetta `aria-label` presa da `lang::widgets.language_switcher.select_language`: la chiave non è verificata da un test in questa passata.
