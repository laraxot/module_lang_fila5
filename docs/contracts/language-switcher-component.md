---
title: "Contratto del componente language switcher"
type: presentation-contract
owner: Lang
status: accepted
updated: 2026-11-23
contract: Modules\\Lang\\View\\Components\\LanguageSwitcher
---

# Contratto del componente language switcher

La view Blade riceve lingue con URL già calcolati da
`LanguageSwitcherWidget::getLanguageUrl()`. Non usa `$this`, non definisce
funzioni globali e non invoca metodi Livewire: il cambio lingua è una
navigazione HTML ordinaria.
