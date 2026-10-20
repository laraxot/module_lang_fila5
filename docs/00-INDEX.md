---
issues: []
discussions: []
title: "📚 **Indice Documentazione Modulo Lang**"
module: "Lang"
type: concept
tags: [filament4, migration]
created: 2026-07-14
updated: 2026-10-14
qmd: "lang module docs index canonico autolabel savetransaction mappa directory"
status: active
related:
  - "./italian-text-refined-audit-report.md"
---
# 📚 **Indice Documentazione Modulo Lang**

**Stato verificato sul codice (2026-10-14)**: vedi [README.md](./README.md). Il livello PHPStan non e' stato rimisurato; la "Module Version 1.5.0" non compare in `module.json` ne' in `composer.json`.

## 🎯 **Lettura Essenziale**
1. [README.md](./README.md) - Panoramica del sistema di internazionalizzazione.
2. [roadmap.md](./roadmap.md) - Evoluzione 2026: Traduzioni AI e centralizzazione.
3. [philosophy.md](./philosophy.md) - La lingua come infrastruttura: filosofia Laraxot.

## 🏗️ **Configurazione e Setup**
- 🌍 **[Locale Management](./locale-management.md)** - Gestione delle lingue attive e default.
- 🛣️ **[Route Localization](./laravel-localization-folio-integration.md)** - Integrazione con Folio e Volt per URL localizzati.
- ⚙️ **[Service Provider](./lang-service-provider-improvements.md)** - Architettura del caricamento dinamico delle traduzioni.

## 🏷️ **Naming & Standards**
- 🚫 **[No Hardcoded Labels](./filament-label.md)** - Perché non usiamo mai `->label()` o `->placeholder()`.
- 🗂️ **[Translation Keys](./translation-keys-best-practices.md)** - Convenzioni per la struttura delle chiavi (module::file.key).
- 📜 **[Enum Translation](./enum-translation-pattern-implementation.md)** - Pattern per la traduzione automatica degli Enum.

## 🚀 **Funzionalità Avanzate**
- ⚡ **[Auto-Registration](./autoregistration-commands.md)** - (stale) il modulo non ha comandi Artisan; le chiavi nuove le scrive `SaveTransAction` dalla catena `AutoLabelAction`.
- 🤖 **[Automatic Translations](./automatic-translations.md)** - Etichette Filament automatiche via `LangServiceProvider` e `AutoLabelAction` (nessun motore di traduzione esterno nel codice).
- 📝 **[Translation File Editor](./translation-file-editor.md)** - UI per la modifica dei file `.php` di lingua.

## 🧪 **Qualità e Testing**
- ✅ **[PHPStan Analysis](./phpstan-analysis-lang.md)** - Report del 2025-11-05 (stale, non rimisurato).
- 🔬 **[Testing Guidelines](./testing.md)** - Verifica della presenza delle chiavi di traduzione.
- 🐒 **[Chaos Monkey Translation Fallbacks](./chaos-monkey-translation-fallbacks.md)** - Protocollo di recovery su regressioni i18n.

## Attenzione al writer dei file di lingua

`SaveTransAction` scrive le chiavi mancanti in `Modules/<Modulo>/lang/<locale>/` fuori dai test (interruttore `lang.save_missing_translations`, a runtime `NULL` quindi acceso). Non e' `__()` a scrivere: e' la catena Filament `AutoLabelAction`. Dettagli e prove nel [README.md](./README.md).

## Mappa delle directory di docs/ (2026-10-14)

| Directory | Ruolo | File .md |
|---|---|---|
| `README.md`, `wiki/` | canonici (README verificato; `wiki/` contiene 286 file, in gran parte `integrations/`) | 286 in wiki |
| `stories/` | evidence BMAD | 24 |
| `bmad/`, `epics/`, `lessons-learned/`, `investigation/`, `bugfix/`, `fixes/`, `conflicts/` | evidence di sessioni | 69, 1, 3, 1, 1, 1, 4 |
| `roadmap/` | piani, non stato | 27 |
| `translations/`, `translatable/`, `architecture/`, `best-practices/`, `critical-rules/`, `performance/`, `packages/` | riferimenti tecnici (verificare col README prima di fidarsi) | 10, 7, 4, 1, 2, 2, 4 |
| `_integration/`, `integration/`, `html2pdf/`, `github/`, `frontend/`, `cursor/`, `windsurf/`, `graphify/`, `core/`, `development/`, `filament/`, `prompts/`, `templates/`, `outputs/`, `root-md-files/`, `llm-wiki/` | legacy | varie |
| `raw/` | sorgenti immutabili | 14 |

Il contratto (`bmad-output/docs-architecture/module-theme-docs-contract.md`) vuole `00-INDEX.md` come indice operativo: in Lang lo e'. `index.md` e `00-index.md` sono varianti storiche (non crearne altre). Story di questo lavoro: [2026-10-14-docs-lang-studio](./stories/docs-lang-studio.story.md).

## 🧹 **Manutenzione**
- 🗑️ **[Cleanup Plan](./docs-naming-convention-fix.md)** - Rimozione dei 260+ file obsoleti.
- 📁 **[Path canonico migrazioni](./wiki/concepts/migration-path-canonical.md)** — solo `database/migrations/`; mai `Migrations/` annidata.

## 🔗 **Moduli Correlati**
- [Xot](../../Xot/docs/README.md) - Base framework e classi `XotBaseChartWidget`.
- [UI](../../UI/docs/README.md) - Componenti Blade e Filament che consumano le traduzioni.

---
*Documentazione conforme agli standard Laraxot - DRY + KISS + SOLID*

## Documentazione BMAD del modulo

Aggiornata il 2026-10-07 dopo la risoluzione dei marker di merge nei docs (versioni composte, non scelte a un lato).

- [Brainstorming](bmad/brainstorming.md): decisioni, questioni aperte, opzioni scartate.
- [Architecture](bmad/architecture.md)
- [Quick reference](bmad/quick-reference.md)
- [Setup guide](bmad/setup-guide.md)
- Story: cartella [bmad/stories/](bmad/stories/).
- [2026-10-08 Services -> Actions (residuo TranslatorService)](./stories/services-to-actions-lang.story.md)

## Dependency Intelligence

- [Dependency intelligence](dependency-intelligence.md)
