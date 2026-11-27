---
title: "Lang — vista language switcher standalone"
type: decision
status: accepted
created: 2026-11-23
updated: 2026-11-26
module: Lang
decision-makers: [Lang module owner]
qmd: "language switcher standalone view lang vista"
---

# ADR: vista language switcher standalone

## Contesto

`lang::components.language-switcher` viene montata da un componente Blade pubblico e non è garantito che esista un oggetto Livewire associato.

## Driver della decisione

- Il selettore lingua deve funzionare sulle pagine Folio/Blade senza componente Livewire padre.
- Non introdurre JavaScript obbligatorio per cambiare lingua.
- Riusare la sorgente di localizzazione già preparata dal widget.

## Alternative scartate

- Accedere a `$this` / metodi Livewire dalla vista: fallisce quando il partial è montato fuori da un componente Livewire.
- Switcher basato su form POST o Alpine obbligatorio: aggiunge JS e stato dove bastano link GET localizzati.
- Duplicare la logica URL nella vista Blade: rompe il singolo punto di verità del widget.

## Decisione

`LanguageSwitcherWidget` prepara gli URL localizzati nei dati della lingua. La vista renderizza link HTML ordinari e non accede a `$this`.

## Conseguenze

Il selettore funziona nelle pagine pubbliche Folio/Blade e resta compatibile con la sorgente di localizzazione esistente. L’interazione non richiede JavaScript.

## Conferma

- `cd laravel && vendor/bin/pest Modules/Lang/tests/Unit/LangCoverageBoostTest.php`: il componente `LanguageSwitcher` rende la vista
  `lang::components.language-switcher` fuori da Livewire, senza `$this` nell'HTML e con `href=`
  (`LANG-SWITCHVIEW-INV-1`, `-INV-2`, `LANG-SWITCHER-INV-1`; test a `:195-221`). Contratti:
  [language-switcher](../contracts/language-switcher.md), [language-switcher-component](../contracts/language-switcher-component.md).
- Non confermato da un test: la resa su una pagina Folio vera, e che gli `href` coincidano con gli URL del widget (il test
  asserisce solo la presenza di `href=`). Proposta: un test che confronti gli `href` con `LanguageSwitcherWidget::getLanguageUrl()`
  per ogni lingua. `aria-current` e l'assenza di JavaScript (`LANG-SWITCHVIEW-INV-3`, `-4`) sono solo regola di revisione.
