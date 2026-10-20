---
issues: []
discussions: []
title: "📚 **Indice Documentazione Modulo Lang**"
module: "Lang"
type: concept
tags: [filament4, migration]
created: 2026-07-14
updated: 2026-10-20
qmd: "lang module docs index canonico autolabel savetransaction mappa directory scopo locale switcher"
status: active
related:
  - "./scopo.md"
  - "./stories/phpstan-lang-zero.story.md"
  - "./stories/phpstan-test-wave-lang.story.md"
  - "./stories/phpstan-lang-test-assertions.story.md"
  - "./italian-text-refined-audit-report.md"
---
# 📚 **Indice Documentazione Modulo Lang**

**Stato verificato sul codice (2026-10-14)**: vedi [README.md](./README.md). **Gate Modules (2026-10-20)**: `phpstan analyse Modules` → file_errors 0, exit 0. Religione: **scopo → fix** + DRY+KISS (niente ignore/baseline). La "Module Version 1.5.0" non compare in `module.json` ne' in `composer.json`. **Gate config:** un solo neon di progetto — [phpstan-single-neon-config](../../Xot/docs/wiki/memories/phpstan-single-neon-config.md) (agenti: analyse senza `-c`; solo l'umano tocca `laravel/phpstan.neon`).

Ondata test 2026-10-20 (lane lang): [stories/phpstan-test-wave-lang.story.md](./stories/phpstan-test-wave-lang.story.md) — cause alla sorgente, non checklist errori. Wave assert test (unused/emptyClosure): [stories/phpstan-lang-test-assertions.story.md](./stories/phpstan-lang-test-assertions.story.md). Coordinamento TSV: [stories/phpstan-wave-coord.story.md](./stories/phpstan-wave-coord.story.md) (`.cursor-scratch/phpstan-wave/Lang.tsv`). Hub zero: [phpstan-lang-zero](./stories/phpstan-lang-zero.story.md); Modules: [Xot phpstan-modules-zero-wave3](../../Xot/docs/stories/phpstan-modules-zero-wave3.story.md).

**Harness test (perche'):** helper Pest in `tests/Pest.php` = solo wrapper globali. SSoT tipizzato = `Modules\Lang\Tests\TestCase::makeLangServiceProvider()` (FQCN nei test; Pest non ridefinisce). Dettaglio / regressioni `function.notFound`: [phpstan-lang-zero](./stories/phpstan-lang-zero.story.md). Gate tree: [Xot phpstan-modules-zero-wave3](../../Xot/docs/stories/phpstan-modules-zero-wave3.story.md). Religione config: [phpstan-single-neon-config](../../Xot/docs/wiki/memories/phpstan-single-neon-config.md). Stub verso questo file: `00-index.md`, `INDEX.md`.

## 🎯 **Lettura Essenziale**
1. [scopo.md](./scopo.md) — Perché esiste Lang: autolabel, scrittura chiavi, confini i18n.
2. [README.md](./README.md) — Panoramica del sistema di internazionalizzazione.
3. [philosophy.md](./philosophy.md) — La lingua come infrastruttura: filosofia Laraxot.
4. [roadmap.md](./roadmap.md) — Evoluzione 2026: Traduzioni AI e centralizzazione.

## 🏗️ **Configurazione e Setup**
- 🌍 **[Locale Management](./locale-management.md)** - Gestione delle lingue attive e default.
- 🔀 **[Locale switcher](./advanced-language-switching.md)** — UI FO: `LanguageSwitcherWidget` SSoT (HTTP ritirati, fleet **W0 ✓**; [12.1](./stories/12.1.retire-lang-http-switchers.story.md), [inventario Xot](../../Xot/docs/bmad/livewire-to-filament-widgets-inventory.md), [fleet](../../Xot/docs/bmad/stories/livewire-to-filament-widgets-fleet.story.md), [livewire-inventory](./bmad/livewire-inventory.md)).
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
- ✅ **[PHPStan Analysis](./phpstan-analysis-lang.md)** - Report del 2025-11-05 (stale; stato vivo = gate Modules a zero).
- PHPStan **zero errori** modulo (203 → 0, 2026-10-20): [phpstan-lang-zero](./stories/phpstan-lang-zero.story.md).
- PHPStan swarm wave Lang (verify EXIT 0): [phpstan-lang-swarm-wave](./stories/phpstan-lang-swarm-wave.story.md).
- PHPStan test wave (analisi cause / peer): [phpstan-test-wave-lang](./stories/phpstan-test-wave-lang.story.md) — baseline storica 119 errori sul bucket; chiusura in [phpstan-lang-zero](./stories/phpstan-lang-zero.story.md).
- **Gate Lang = contratti i18n tipizzati** — PHPStan a zero prova coerenza tra action/provider, modelli e bootstrap test (niente ignore/baseline). Helper condivisi in `tests/Pest.php` (namespace globale); SSoT = `Modules\Lang\Tests\TestCase::makeLangServiceProvider()` (FQCN; Pest solo wrapper). **Non ridefinire helper nei file test** → `function.notFound` e cascata `mixed`. Hub: [phpstan-lang-zero](./stories/phpstan-lang-zero.story.md); Modules: [phpstan-modules-zero-wave3](../../Xot/docs/stories/phpstan-modules-zero-wave3.story.md).
- 🔬 **[Testing Guidelines](./testing.md)** - Verifica della presenza delle chiavi di traduzione.
- 🐒 **[Chaos Monkey Translation Fallbacks](./chaos-monkey-translation-fallbacks.md)** - Protocollo di recovery su regressioni i18n.

## Attenzione al writer dei file di lingua

`SaveTransAction` scrive le chiavi mancanti in `Modules/<Modulo>/lang/<locale>/` fuori dai test (interruttore `lang.save_missing_translations`, a runtime `NULL` quindi acceso). Non e' `__()` a scrivere: e' la catena Filament `AutoLabelAction`. Dettagli e prove nel [README.md](./README.md).

## Mappa delle directory di docs/ (2026-10-20)

Conteggi misurati sul filesystem (file `.md` per cartella, ricorsivo). La radice di `docs/` ha 512 file `.md`, molti sono gemelli per maiuscole o per underscore (vedi la story di riordino).

| Directory | Ruolo | File .md |
|---|---|---|
| `README.md`, `wiki/` | canonici (README verificato; `wiki/` contiene 242 file, 133 in `integrations/`) | 242 in wiki |
| `stories/` | evidence BMAD | 29 |
| `bmad/`, `epics/`, `lessons-learned/`, `investigation/`, `bugfix/`, `fixes/`, `conflicts/` | evidence di sessioni | 70, 1, 3, 1, 1, 1, 4 |
| `roadmap/` | piani, non stato | 27 |
| `translations/`, `translatable/`, `architecture/`, `best-practices/`, `critical-rules/`, `performance/`, `packages/` | riferimenti tecnici (verificare col README prima di fidarsi) | 10, 7, 4, 1, 2, 2, 4 |
| `_integration/`, `integration/`, `html2pdf/`, `github/`, `frontend/`, `cursor/`, `windsurf/`, `graphify/`, `core/`, `development/`, `filament/`, `prompts/`, `templates/`, `outputs/`, `root-md-files/`, `llm-wiki/` | legacy | 8, 5, 6, 2, 2, 1, 1, 1, 1, 1, 1, 2, 1, 1, 1, 7 |
| `raw/` | sorgenti immutabili | 14 |

Il contratto (`bmad-output/docs-architecture/module-theme-docs-contract.md`) vuole `00-INDEX.md` come indice operativo: in Lang lo e'. `index.md`, `INDEX.md` e `00-index.md` sono varianti storiche che rimandano a questo file (non crearne altre). Storie del lavoro di riordino: [docs-lang-studio](./stories/docs-lang-studio.story.md) e [docs-organization-lang](./stories/docs-organization-lang.story.md).

## Riordino della docs (2026-10-20)

- **Gemelli per maiuscole.** Il canonico e' il nome minuscolo (eccezioni: `README.md`, `CHANGELOG.md`, `AGENTS.md`, `00-INDEX.md`; per `INDEX.md`/`index.md` e `README.*` nelle sottocartelle vale chi ha piu' riferimenti entranti). Il gemello e' marcato `status: superseded` con `superseded_by`: i link esistenti continuano a risolvere. Sono stati cancellati solo i 37 duplicati `*.DIVERGENZA.md` di `wiki/integrations/_da-riconciliare/`, con zero riferimenti entranti. Dettaglio, numeri e coppie ancora aperte: [docs-organization-lang](./stories/docs-organization-lang.story.md).
- **Story PHPStan versionate.** `docs/.gitignore` riabilita `stories/phpstan-*.story.md` e `phpstan-*.story.md`, che il `.gitignore` radice del modulo nasconderebbe con `phpstan*`.
- **Dove scrivere.** Nuove pagine nella sottocartella tematica, non nella radice di `docs/`; nomi in kebab-case senza date ne' suffissi numerici (la data sta nel frontmatter).

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
