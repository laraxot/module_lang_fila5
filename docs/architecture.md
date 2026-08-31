---
title: "Architectural Rules & Guidelines"
module: "Lang"
type: concept
tags: [REDUNDANCY, ANALYSIS]
created: 2026-07-14
updated: 2026-07-14
qmd: "redundancy analysis"
related:
  - "./italian-text-refined-audit-report.md"
---
# Architectural Rules & Guidelines

This module adheres to the **Laraxot Architecture** and **Super Cow Methodology**.

For strict coding standards, Filament extension rules, and PHPStan guidelines, please refer to the central documentation in the **Xot Module**:

-   [Super Cow Methodology](../../xot/docs/super_cow_methodology.md)
-   [PHP Quality Guide](../../xot/docs/php_quality_guide.md)
-   [Filament Extension Rules](../../xot/docs/filament_extension_rules.md)

**Key Principles:**
1.  **DRY & KISS**: Don't repeat yourself, keep it simple.
2.  **Zero Errors**: PHPStan Level 10 compliance is mandatory.
3.  **XotBase**: Always extend `XotBase` classes, never Filament classes directly.
4.  **Translations**: Use `LangServiceProvider` for automatic label resolution.

## Collegamenti correlati
- [Composer merge plugin](composer-merge-plugin.md)

---

<!-- Merged from ARCHITECTURE.md, which collided with this file on case-insensitive filesystems. -->

---
title: "Lang Module Architecture"
type: architecture
tags: [module, architecture, lang]
created: 2026-08-04
updated: 2026-08-04
---
# Lang Module — Architecture

## Purpose
Translation and localization management module

## Core Components

**Models:**
- `BaseModelLang` —
- `LanguageLine` —
- `Translation` —

**Actions:**
- `SyncTranslationsAction` —
- `ValidateTranslationsAction` —

**Filament Resources:**
- `LangResource` — Main admin resource

## Database Schema
- `lang_table` — Primary table with standard Laravel columns (id, timestamps)

## Design Decisions
| Decision | Rationale |
|----------|-----------|
| XotBaseModel | Consistent base across all modules |
| Filament v5 | Standard admin interface |
| Laravel Queues | Background processing for heavy operations |

## Integration Points
**Depends On:** Xot
**Depended On By:** Activity, Notify (logging)

## Quality Gates
- **PHPStan L10**: Pending execution
- **PHPMD**: Pending analysis
- **Test Coverage**: Needs Pest test suite
