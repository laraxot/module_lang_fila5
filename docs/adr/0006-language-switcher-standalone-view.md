---
title: "Lang — vista language switcher standalone"
type: decision
status: accepted
created: 2026-11-23
updated: 2026-11-26
qmd: "language switcher standalone view lang vista"
---

# ADR: vista language switcher standalone

## Contesto

`lang::components.language-switcher` viene montata da un componente Blade pubblico e non è garantito che esista un oggetto Livewire associato.

## Driver della decisione

- Il selettore lingua deve funzionare sulle pagine Folio/Blade senza componente Livewire padre.
- Non introdurre JavaScript obbligatorio per cambiare lingua.
- Riusare la sorgente di localizzazione già preparata dal widget.

## Decisione

`LanguageSwitcherWidget` prepara gli URL localizzati nei dati della lingua. La vista renderizza link HTML ordinari e non accede a `$this`.

## Alternative scartate

- Accedere a `$this` / metodi Livewire dalla vista: fallisce quando il partial è montato fuori da un componente Livewire.
- Switcher basato su form POST o Alpine obbligatorio: aggiunge JS e stato dove bastano link GET localizzati.
- Duplicare la logica URL nella vista Blade: rompe il singolo punto di verità del widget.

## Conseguenze

Il selettore funziona nelle pagine pubbliche Folio/Blade e resta compatibile con la sorgente di localizzazione esistente. L’interazione non richiede JavaScript.

## Conferma

- Render della vista `lang::components.language-switcher` su pagina Folio senza errore Livewire.
- Link generati puntano agli URL localizzati preparati dal widget.
