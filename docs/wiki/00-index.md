---
title: "📚 **Indice Documentazione Modulo Lang**"
module: "Lang"
type: concept
tags: [filament4, migration]
created: 2026-07-14
updated: 2026-07-14
qmd: "filament4 migration"
related:
<<<<<<< .merge_file_ewxkdm
  - "./italian-text-refined-audit-report.md"
=======
  - "../italian-text-refined-audit-report.md"
>>>>>>> .merge_file_z1gFUI
---
# 📚 **Indice Documentazione Modulo Lang**

**Status**: ✅ PHPStan Level 10 Compliant
**Module Version**: 1.5.0

## 🎯 **Lettura Essenziale**
1. [README.md](./README.md) - Panoramica del sistema di internazionalizzazione.
2. [roadmap.md](./roadmap.md) - Evoluzione 2026: Traduzioni AI e centralizzazione.
3. [philosophy.md](./philosophy.md) - La lingua come infrastruttura: filosofia Laraxot.

## 🏗️ **Configurazione e Setup**
- 🌍 **[Locale Management](./locale-management.md)** - Gestione delle lingue attive e default.
<<<<<<< .merge_file_ewxkdm
- 🛣️ **[Route Localization](./laravel-localization-folio-integration.md)** - Integrazione con Folio e Volt per URL localizzati.
- ⚙️ **[Service Provider](./lang-service-provider-improvements.md)** - Architettura del caricamento dinamico delle traduzioni.

## 🏷️ **Naming & Standards**
- 🚫 **[No Hardcoded Labels](./filament-label.md)** - Perché non usiamo mai `->label()` o `->placeholder()`.
- 🗂️ **[Translation Keys](./translation-keys-best-practices.md)** - Convenzioni per la struttura delle chiavi (module::file.key).
=======
- 🛣️ **[Route Localization](../laravel-localization-folio-integration.md)** - Integrazione con Folio e Volt per URL localizzati.
- ⚙️ **[Service Provider](../lang-service-provider-improvements.md)** - Architettura del caricamento dinamico delle traduzioni.

## 🏷️ **Naming & Standards**
- 🚫 **[No Hardcoded Labels](../filament-label.md)** - Perché non usiamo mai `->label()` o `->placeholder()`.
- 🗂️ **[Translation Keys](../translation-keys-best-practices.md)** - Convenzioni per la struttura delle chiavi (module::file.key).
>>>>>>> .merge_file_z1gFUI
- 📜 **[Enum Translation](./enum-translation-pattern-implementation.md)** - Pattern per la traduzione automatica degli Enum.

## 🚀 **Funzionalità Avanzate**
- ⚡ **[Auto-Registration](./autoregistration-commands.md)** - Comandi Artisan per scoprire e registrare nuove chiavi.
- 🤖 **[Automatic Translations](./automatic-translations.md)** - (DAB) Integrazione con motori di traduzione esterna.
<<<<<<< .merge_file_ewxkdm
- 📝 **[Translation File Editor](./translation-file-editor.md)** - UI per la modifica dei file `.php` di lingua.

## 🧪 **Qualità e Testing**
- ✅ **[PHPStan Analysis](./phpstan-analysis-lang.md)** - Report di conformità Level 10.
=======
- 📝 **[Translation File Editor](../translation-file-editor.md)** - UI per la modifica dei file `.php` di lingua.

## 🧪 **Qualità e Testing**
- ✅ **[PHPStan Analysis](../phpstan-analysis-lang.md)** - Report di conformità Level 10.
>>>>>>> .merge_file_z1gFUI
- 🔬 **[Testing Guidelines](./testing.md)** - Verifica della presenza delle chiavi di traduzione.
- 🐒 **[Chaos Monkey Translation Fallbacks](./chaos-monkey-translation-fallbacks.md)** - Protocollo di recovery su regressioni i18n.

## 🧹 **Manutenzione**
<<<<<<< .merge_file_ewxkdm
- 🗑️ **[Cleanup Plan](./docs-naming-convention-fix.md)** - Rimozione dei 260+ file obsoleti.
- 📁 **[Path canonico migrazioni](./wiki/concepts/migration-path-canonical.md)** — solo `database/migrations/`; mai `Migrations/` annidata.

## 🔗 **Moduli Correlati**
- [Xot](../../xot/docs/readme.md) - Base framework e classi `XotBaseChartWidget`.
- [UI](../../ui/docs/readme.md) - Componenti Blade e Filament che consumano le traduzioni.
=======
- 🗑️ **[Cleanup Plan](../docs-naming-convention-fix.md)** - Rimozione dei 260+ file obsoleti.
- 📁 **[Path canonico migrazioni](./concepts/migration-path-canonical.md)** — solo `database/migrations/`; mai `Migrations/` annidata.

## 🔗 **Moduli Correlati**
- [Xot](../../../Xot/docs/README.md) - Base framework e classi `XotBaseChartWidget`.
- [UI](../../../UI/docs/README.md) - Componenti Blade e Filament che consumano le traduzioni.
>>>>>>> .merge_file_z1gFUI

---
*Documentazione conforme agli standard Laraxot - DRY + KISS + SOLID*

## Dependency Intelligence

<<<<<<< .merge_file_ewxkdm
- [Dependency intelligence](dependency-intelligence.md)
=======
- [Dependency intelligence](../dependency-intelligence.md)
>>>>>>> .merge_file_z1gFUI
