---
title: "Architecture — Lang"
type: architecture
module: Lang
related:
  - ./livewire-widget-prd.md
---

# Architecture Lang

```
View\Components\LanguageSwitcher → LanguageSwitcherWidget
Http/Livewire/Lang/{Change,Switcher} → delete
```

ADR: non creare `LangChangeWidget`. Allineare URL Mcamara nel widget esistente se il tema FO ne ha bisogno.
