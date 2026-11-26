---
title: "Lang — vista language switcher standalone"
type: decision
status: accepted
created: 2026-11-23
updated: 2026-11-23
---

# ADR: vista language switcher standalone

## Contesto

`lang::components.language-switcher` viene montata da un componente Blade pubblico e non è garantito che esista un oggetto Livewire associato.

## Decisione

`LanguageSwitcherWidget` prepara gli URL localizzati nei dati della lingua. La vista renderizza link HTML ordinari e non accede a `$this`.

## Driver della decisione

- il componente deve funzionare anche senza un contesto Livewire;
- gli URL devono restare quelli prodotti dal sistema di localizzazione;
- la vista deve avere una responsabilità minima e verificabile.

## Alternative scartate

- usare una vista Livewire: introdurrebbe uno stato non necessario per una
  navigazione HTML;
- costruire gli URL nella view: duplicherebbe la logica di localizzazione;
- memorizzare la lingua nel browser: non garantirebbe URL coerenti con le route.

## Conseguenze

Il selettore funziona nelle pagine pubbliche Folio/Blade e resta compatibile con la sorgente di localizzazione esistente. L’interazione non richiede JavaScript.

## Conferma

`Modules/Lang/tests/Unit/Filament/LanguageSwitcherWidgetTest.php` verifica gli
URL generati; il rendering della view verifica che non dipenda da `$this` o da
Livewire.
