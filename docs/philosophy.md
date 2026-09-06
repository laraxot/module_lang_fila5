# Lang Module: Internationalization (i18n)

> **Translations & Localization** — Multi-language support, translation editor, locale routing.

---

## Zen

**"Every string is data. Translate once, use everywhere."**

---

## Quick

### Models (7)
- **LanguageLine** — Translation record (key, locale, value, versioned)
- **Post** — Content (translatable via Spatie Translatable)
- **BaseModelLang** — Base for translatable models

### Pattern
```
Enum Status { case Active = 'active'; }
  ↓
trans('enum.status.active') → lang/en/enum.php
  ↓
Switch locale
  ↓
trans('enum.status.active') → lang/es/enum.php
```

### Dependencies
- mcamara/laravel-localization (routing + locale detection)
- lara-zeus/spatie-translatable (model translations)
- spatie/laravel-sluggable (slug generation)
- rinvex/countries (country/language list)

### Actions (12)
- `GetAllTranslationAction` — Export all keys
- `PublishTranslationAction` — Deploy translations
- `MergeTranslationsAction` — Combine files
- `GetTransPathAction` — Resolve file path

### Forms (2)
- `TranslationEditor` — UI for editing translations
- `NationalFlagSelect` — Locale picker

---

## Integration

- UI (labels, buttons)
- Employee (absence types)
- Notify (email templates)
- All models (via Spatie Translatable trait)

---

## Best/Bad

✓ Translation namespacing (modules.key)
✓ Lazy loading (load only active locale)
❌ Hardcoded strings (always use trans())

---

## Roadmap

- Translation AI (auto-generate from English)
- Translation marketplace (crowdsourced)
- Fallback locale hierarchy

---

```
┌──────────────────────┐
│ Lang (i18n)          │
├──────────────────────┤
│ Models: 7            │
│ Migrations: 5        │
│ Languages: 10+       │
│ Status: Stable       │
└──────────────────────┘
```

---

- **Generated**: 2026-09-06

