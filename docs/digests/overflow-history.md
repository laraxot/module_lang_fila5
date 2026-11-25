---
title: "Overflow history (ceiling 100)"
type: digest
status: active
qmd: "digest ceiling 100 overflow-history"
---

# Overflow history (ceiling 100)

Overflow force-cap: 420 file oltre target 100.

### `architecture/autolabel-flow-complete.md` — AutoLabel Flow - Analisi Completa del Flusso

# AutoLabel Flow - Analisi Completa del Flusso

**Data**: 2026-01-09
**Data**: 2026-01-09
**Tipo**: Documentazione Tecnica Approfondita
**Audience**: Sviluppatori che devono comprendere il meccanismo interno

---

## 📋 Indice

1. [Overview](#overview)
2. [Flusso Step-by-Step](#flusso-step-by-step)
3. [Componenti Coinvolti](#componenti-coinvolti)
4. [Esempio Pratico Completo](#esempio-pratico-completo)
5. [Edge Cases e Fallback](#edge-cases-e-fallback)
6. [Performance e Caching](#performance-e-caching)

---


### `architecture/translation-structure-expanded.md` — Struttura Espansa per File di Traduzione - Progetto <nome progetto>

# Struttura Espansa per File di Traduzione - Progetto <nome progetto>

## Scopo
Definizione della struttura standard espansa per tutti i file di traduzione del progetto, seguendo i principi DRY/KISS per massima usabilità e manutenibilità.

## Principi DRY/KISS Applicati

### DRY (Don't Repeat Yourself)
- **Template standardizzato** per tutti i moduli
- **Struttura coerente** tra lingue diverse
- **Riutilizzo pattern** per campi simili

### KISS (Keep It Simple, Stupid)
- **Struttura prevedibile** e facile da navigare
- **Naming consistente** per tutte le proprietà
- **Documentazione chiara** per ogni elemento

## Struttura Standard Espansa

### Template Base per Campi

### `architecture-rules.md` — Architectural Rules & Guidelines

# Architectural Rules & Guidelines

This module adheres to the **Laraxot Architecture** and **Super Cow Methodology**.

For strict coding standards, Filament extension rules, and PHPStan guidelines, please refer to the central documentation in the **Xot Module**:

-   [Super Cow Methodology](../../Xot/docs/super_cow_methodology.md)
-   [PHP Quality Guide](../../Xot/docs/php_quality_guide.md)
-   [Filament Extension Rules](../../Xot/docs/filament_extension_rules.md)
-   [Super Cow Methodology](../../Xot/docs/super_cow_methodology.md)
-   [PHP Quality Guide](../../Xot/docs/php_quality_guide.md)
-   [Filament Extension Rules](../../Xot/docs/filament_extension_rules.md)
-   [Super Cow Methodology](../../Xot/docs/super_cow_methodology.md)
-   [PHP Quality Guide](../../Xot/docs/php_quality_guide

### `binary-assets.md` — Asset binari


---
# Asset binari

Gli asset binari sono file normali del repository.

Regole:
- non aggiungere filtri o backend di storage esterno in `.gitattributes`;
- non committare file pointer al posto del contenuto reale;
- se un asset manca, recuperare il binario originale e committarlo direttamente;
- prima del push verificare che immagini, font, archivi e PDF siano contenuti reali.

### `bmad/architecture/core-architecture.md` — Architectural Rules & Guidelines

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

## Collegamenti correla

### `bmad/architecture/module-architecture-legacy.md` — Lang Module — Architecture

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

### `bmad/architecture/module-boundary.md` — Lang — architettura

# Lang — architettura

## Scopo osservato

Gestione localizzazione e traduzioni. Scheda derivata da `module.json`, struttura `app/` e conteggi del repository; non sostituisce decisioni architetturali non ancora approvate.

## Inventario verificato

- PHP in `app/`: 64 file.
- Test PHP in `tests/`: 62 file.
- Aree applicative: `Enums`, `Http`, `Filament`, `Services`, `Models`, `Console`, `Actions`, `Providers`, `View`, `Casts`, `Datas`, `App`, `Adapters`, `Phpstan`.
- Persistenza: `database/factories`, `database/migrations`, `database/seeders` presenti.

## Confini

Il modulo espone risorse, azioni e contratti verso i consumatori; la logica di dominio deve restare nelle Action e nei modelli del modulo. Le dipendenze verso Xot, User, Tenant e UI vanno verificate tramite namespace/import real

### `bmad/audit.md` — Audit BMAD — Lang


# Audit BMAD — Lang

SSoT dettagliata (inventario, evidenze `path:line`, non-finding): [audits/lang-audit.md](./audits/lang-audit.md).

**Scopo in una frase:** Lang tiene fuori dal codice ogni parola che un utente legge: nessuna etichetta si scrive dentro una classe, si dichiara in un file di lingua ([purpose.md](./purpose.md)).
**Scopo in una frase:** Lang tiene fuori dal codice ogni parola che un utente legge: nessuna etichetta si scrive dentro una classe, si dichiara in un file di lingua ([purpose.md](./purpose.md)).

## Sintesi (2026-11-16)

| Metrica | Valore |
|---|---:|
| PHP `app/` / test PHP / `*Test.php` | 72 / 51 / 29 (ricontato 2026-11-19: 72 / 53 / 29) |
| PHP `app/` / test PHP / `*Test.php` | 72 / 51 / 29 (ricontato 2026-11-19: 72 / 53 / 29) |
| Models / Policy / Resource / 

### `bmad/audits/lang-audit.md` — Audit approfondito — Lang


# Audit approfondito — Lang

## Metodo

Source-first, 2026-11-16: inventario filesystem, `rg -n` con `path:line`, lettura di `LangServiceProvider`, `AutoLabelAction`, `SaveTransAction`, `WriteTranslationFileAction`, `TranslationFile`, `LocaleSwitcherRefresh`, `config/`; `php artisan tinker` (sola lettura di config); PHPStan sul modulo; Pest sullo scratch DB del repo. La documentazione è stata trattata come ipotesi: **dove codice e docs divergono vince il codice.** Nessuna UI o screenshot inventati; nessun comportamento a runtime del pannello è stato provato in un browser.

## Scopo (perché esiste)

Lang tiene fuori dal codice ogni parola che un utente legge ([purpose.md](../purpose.md)). Criteri usati: (1) ogni etichetta si risolve per convenzione da un file di lingua; (2) chi cura i test

### `bmad/bmad-dossier.md` — Lang — BMAD dossier

# Lang — BMAD dossier
## Product brief / PRD
Provide consistent locale resolution and translation ownership across modules/themes.
## Architecture / UX / security
Locale fallback and tenant overrides are explicit; module/theme keys remain owned by their component.
## Epics and stories
Locale lifecycle; missing-key audit; translation administration/cache.
## Gaps / release
Supported locale inventory, override precedence and missing-key automation require closure; critical flows must show no raw keys.

### `bmad/brainstorming/module-opportunities.md` — Lang — brainstorming

# Lang — brainstorming

## Punto di partenza

Gestione localizzazione e traduzioni. L'inventario corrente misura 64 file applicativi e 62 file di test.

## Domande ad alto valore

- Quale problema utente risolve il modulo e quale comportamento è vincolante?
- Quali dati sono autorevoli e quali sono proiezioni o cache?
- Quali ruoli possono leggere, creare, modificare o approvare?
- Quale errore deve essere osservabile senza esporre dati sensibili?
- Quale parte è riusabile e quale è specifica del dominio PTVX?

## Ipotesi da validare

- Le Action sono il punto di orchestrazione del caso d'uso.
- Le Resource Filament sono adattatori, non il luogo della regola di business.
- I test esistenti sono evidenza parziale e vanno confrontati con i flussi esposti.


### `bmad/brainstorming.md` — Lang — brainstorming


# Lang — brainstorming

> **SUMMARY**: indice dei contenuti di brainstorming per `Modules\Lang`.
> Le domande ad alto valore, ipotesi, rischi e output attesi sono nei **shard**
> sottostanti (non sovrascritti). Questo file root funge da indice con
> decisioni e rischi verificati nel codice.

## Shard brainstorming

| Shard | Descrizione |
|---|---|
| [brainstorming/module-opportunities.md](./brainstorming/module-opportunities.md) | domande ad alto valore, ipotesi da validare, rischi |

## Decisioni prese

| Decisione | Stato | Riferimento |
|---|---|---|
| `LangServiceProvider` estende `XotBaseServiceProvider` | approvata | `app/Providers/LangServiceProvider.php:25` |
| `TranslationFile` carica con `Safe\json_encode` | approvata | `app/Models/TranslationFile.php:20` |

### `bmad/cms-link.md` — Collegamento al Modulo Cms

# Collegamento al Modulo Cms

Questo documento descrive le relazioni e i collegamenti tra il modulo Lang e il modulo Cms per quanto riguarda le traduzioni e l'internazionalizzazione.

## Traduzioni nei Componenti Filament

Il modulo Lang fornisce il sistema di traduzione utilizzato dal modulo Cms nei suoi componenti Filament. È fondamentale seguire le [regole per le traduzioni in Filament](./filament-translations.md) quando si lavora con i componenti nel modulo Cms.

## Convenzioni di Namespace e Struttura

Il modulo Cms segue specifiche convenzioni di namespace documentate in [Convenzioni Namespace Filament](../../Cms/docs/convenzioni-namespace-filament.md) che si integrano con il sistema di traduzioni di questo modulo.

## Punti di Integrazione

- **LangServiceProvider**: Gestisce automa

### `bmad/decision-log.md` — Decision log — Lang


# Decision log — Lang

Le voci di esempio fittizie del template precedente («Filament Widget invece di Livewire» e simili) sono state rimosse: non descrivevano il modulo.

| ID | Data | Stato | Decisione | Perché | Evidenza |
|---|---|---|---|---|---|
| D-4 | 2026-11-16 | PROPOSTA | Sostituire i 4 test "coverage" (2.248 r.) con test di comportamento (`AutoLabelAction`, `SaveTransAction`, policy) | Nominati per la percentuale; non proteggono lo scopo | `tests/Unit/Lang{HundredPercentCoverage,FinalGaps,CoverageGaps,CoverageBoost}Test.php` |
| D-3 | 2026-11-16 | **APERTA** | `Post` resta in Lang o esce? | Modello editoriale senza consumatori fuori da Lang; confine poco chiaro | `Models/Post.php`, `PostPolicy`, 5 migration, `PostSeeder` |
| D-2 | 2026-11-16 | **APERTA** | Tracker DB «chiavi m

### `bmad/epics/module-roadmap.md` — Lang — epic roadmap

# Lang — epic roadmap

## Epic A — Contratto e architettura

Documentare API pubbliche, dipendenze, confini e invarianti del modulo.

## Epic B — Qualità verificabile

Ridurre finding PHPStan, mantenere test Pest eseguibili e registrare evidence ripetibile.

## Epic C — UX e integrazione

Verificare parità Form/Table, traduzioni, autorizzazioni, error handling e integrazioni dichiarate.

## Epic D — Documentazione viva

Collegare ogni decisione a story BMAD, mantenere il second brain e chiudere i duplicati senza cancellare storia.

## Definition of Done


### `bmad/epics/translation-infrastructure.epic.md` — Epic 5.252 — infrastruttura traduzioni e file di localizzazione


# Epic 5.252 — infrastruttura traduzioni e file di localizzazione

> **SUMMARY**: epic per documentare l'infrastruttura delle traduzioni nel
> modulo `Modules\Lang`: lettura/scrittura file, sincronizzazione, action di
> traduzione, adapter e config. Scope: documentazione derivata dal codice reale,
> zero modifiche PHP. Grounded in `app/Actions/`, `app/Adapters/`,
> `app/Models/`, `config/`.

## Scope

Il modulo Lang gestisce localizzazione e traduzioni (i18n/l10n) su 3 linguaggi,
con action per leggere/scrivere/sincronizzare file PHP, un adapter che
estende il traduttore Laravel e risorse Filament per la gestione. Questa epic
documenta:

1. Action di traduzione in `app/Actions/`
2. Adapter `TranslatorAdapter` in `app/Adapters/`
3. Provider con traits in `app/Providers/Traits/`
4. Modelli 

### `bmad/epics.md` — Epics — Lang


# Epics — Lang

Sostituisce il template con segnaposto. Ogni epic nasce da un finding dell'[audit](./audits/lang-audit.md); formato: obiettivo, Acceptance (AC), task.

## E1 — Tracker «chiavi mancanti» (P1-1, D-2)

**Obiettivo:** una chiave mancante lascia una traccia affidabile, oppure il meccanismo morto sparisce.

- AC1: D-2 decisa dal committente (cablare o ritirare).
- AC2 (cablare): `registerTranslator()` chiamato da `boot()` con `TranslatorTrait` come unica versione; Pest: `trans('x::y.z')` assente → una riga in `translations`.
- AC2 (ritirare): via `TranslatorAdapter`, `RecordMissingTranslationAction`, `TranslatorTraitPhpstanProbe`, `Translation`/`LanguageLine` e relative migration additive di chiusura (mai `drop` senza approvazione dati).
- Task: lock, decisione, implementazione,

### `bmad/livewire-inventory.md` — Inventario: Livewire HTTP → Filament (Lang)


# Inventario: Livewire HTTP → Filament (Lang)

**Solo documentazione. Nessun PHP toccato in questo audit.**

SSoT del modulo Lang per la campagna Livewire → Filament widget; formato e metodo come [Modules/Cms/docs/bmad/livewire-inventory.md](../../Cms/docs/bmad/livewire-inventory.md).

> **Stato 2026-09-21 (post 12.1):** HTTP `Switcher`/`Change` ritirati. Header FO monta `LanguageSwitcherWidget` via FQCN. `View\Components\LanguageSwitcher` resta inerte. Story [12.1](../stories/0006-retire-lang-http-switchers.story.md) `done`.

## Metodo (comandi eseguiti, non assunti)

```bash
find Modules/Lang/app/Http/Livewire -type f
cat Modules/Lang/app/Http/Livewire/_components.json
git status --short -- Modules/Lang                              # → M Change.php, D Switcher.php
grep -rn "livewire:lan

### `bmad/phpstan-l10-test-fixes-analysis.md` — PHPStan L10 Test Fixes Analysis


# PHPStan L10 Test Fixes Analysis

## Summary
Analysis of PHPStan L10 errors in Lang module tests. Due to full-tree analysis timeout issues, identified errors through code inspection and applied targeted fixes to test fixtures.

## Identified Error Patterns

### Pattern 1: `app()` calls returning mixed type
**Problem**: `app(ActionClass::class)->execute()` returns mixed, breaking L10 type inference.

**Files Affected**:
- `tests/Fixtures/AutoLabelStaticCaller.php` - ✅ FIXED
- `tests/Fixtures/AutoLabelExecuteNestedCaller.php` - ✅ FIXED
- `tests/Unit/LangHundredPercentCoverageTest.php` - Lines 172-173, 197, 227, 242
- `tests/Unit/LangFinalGapsTest.php` - Multiple instances
- `tests/Unit/Models/*.php` - Various app() calls

**Fix Applied**:
```php

### `bmad/piano-miglioramento.md` — Piano di miglioramento — Lang


# Piano di miglioramento — Lang

=======
Derivato dall'[audit](./audits/lang-audit.md).

## P0

1. Bonificare marker/conflict se presenti (ora: 0).
2. Chiudere policy troppo permissive (`return true` ≈ 2) con matrice ruolo×ability.
3. Blocchi sicurezza runtime (auth panel, mass assignment, export) con test negativi.

## P1

1. Portare Services (0) ad Actions Queueable dove applicabile.
2. Alzare copertura test (attuale 51 test / 72 app PHP).
3. Allineare Filament (resources=2) a XotBase* e traduzioni Lang.
4. Spezzare dipendenze inverse verso verticali peer se rilevate con `rg`.

## P2

### `bmad/setup-guide.md` — Lang — setup guide


# Lang — setup guide

> **SUMMARY**: guida per configurare l'ambiente di sviluppo del modulo
> `Modules\Lang`. Copre composer, provider, config, migrazioni e verifica.
> Derivato da `module.json`, `composer.json`, `config/config.php`,
> `config/lang.php`, `app/Providers/LangServiceProvider.php`.

## Prerequisiti

| Requisito | Versione |
|---|---|
| PHP | ^8.3 |
| Laravel | 13 |
| Filament | 5 |

## Installazione dipendenze

Da `laravel/`:


### `bmad/status.md` — BMAD Status — Lang (2026-10-06)

# BMAD Status — Lang (2026-10-06)

## Inventario docs
- `docs/`: architecture.md, bmad/, concepts/, core/, critical-rules/, epics/, fixes/, frontend/, github/, gitignore, development/, env.example, filament/, helper-text-audit-script.php.
- Wiki: `docs/wiki/` non esistente prima; aggiunto `lang-purpose.md`.

## PHPStan
0 errori (`Modules/Lang`).

## SCOPO (nuovo in wiki/lang-purpose.md)
Internazionalizzazione: traduzioni, locale, selettori lingua. Provider con `$name = 'Lang'`.

## File toccati
- `docs/wiki/lang-purpose.md` (nuovo)
- `docs/bmad/status.md` (nuovo)

### `bmad/stories/0004-cluster3-phpstan-swarm-4.story.md` — Lang — swarm cluster3 PHPStan 2026-10-06

# Lang — swarm cluster3 PHPStan 2026-10-06

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `bmad/stories/0005-continuazione-domani.story.md` — Continuazione domani

# Continuazione domani

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `bmad/stories/0010-docs-consolidation-4.story.md` — Lang Module Docs Consolidation (2026-10-06)

# Lang Module Docs Consolidation (2026-10-06)

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `bmad/stories/0011-docs-reorg-core.story.md` — Story — riorganizzazione docs core: Lang

# Story — riorganizzazione docs core: Lang

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `bmad/stories/0012-docs-zen-conventions.story.md` — Lang — bonifica docs `.md`

# Lang — bonifica docs `.md`

## Context and Problem Statement

Rumore nei docs (copie esatte, nomi UPPERCASE/underscore, template generici) degrada QMD e confonde gli agenti.
Story ombrello: `laravel/Modules/Xot/docs/bmad/stories/docs-zen-conventions-swarm.story.md` (lane C).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.

### `bmad/stories/0013-git-status-fleet-merge-markers-lang.story.md` — git-status-fleet-merge-markers-lang

# git-status-fleet-merge-markers-lang

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `bmad/stories/0018-lang-phpstan-l10-4.story.md` — Lang — PHPStan Level 10 fixes (2026-10-06)

# Lang — PHPStan Level 10 fixes (2026-10-06)

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `bmad/stories/0022-module-bmad-audit-lang-baseline-analisi-completa.story.md` — Story — Lang: baseline BMAD

# Story — Lang: baseline BMAD

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `bmad/stories/0024-phpstan-modules-zero.story.md` — Story: PHPStan zero — Lang

# Story: PHPStan zero — Lang

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `bmad/stories/0029-quality-gates-phpstan-swarm-4.story.md` — PHPStan quality gate swarm — modulo Lang

# PHPStan quality gate swarm — modulo Lang

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `bmad/stories/continuazione-domani.md` — Lang — Continuazione Domani

# Lang — Continuazione Domani

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `case-conflicts.md` — Case-Insensitive File Conflicts

# Case-Insensitive File Conflicts

Nel modulo `Lang` sono presenti i seguenti duplicati con differenze solo di maiuscole/minuscole:

- `Modules/Lang/docs`: `LOCALE_MANAGEMENT.md`, `locale-management.md`
- `Modules/Lang/docs`: `QUICK_REFERENCE.md`, `quick-reference.md`
- `Modules/Lang/docs`: `TRANSLATION_STRATEGIES.md`, `translation-strategies.md`
- `Modules/Lang/docs`: `TRANSLATION_PROCESS.md`, `translation-process.md`
- `Modules/Lang/docs`: `MCAMARA_IMPLEMENTATION_GUIDE.md`, `mcamara-implementation-guide.md`
- `Modules/Lang/docs/translations`: `README.it.md`, `readme.it.md`
- `Modules/Lang/docs/translations`: `README.es.md`, `readme.es.md`

È necessario mantenere una sola variante per ogni file (ad esempio quella con il prefisso maiuscolo già utilizzato per altri documenti globali) e rimu

### `code-redundancy-audit.md` — Code redundancy audit — Lang


# Code redundancy audit — Lang

## Scopo

Ridurre rumore, duplicazione e ambiguita' nel codice di questo module, senza perdere conoscenza storica.

## Metriche

| Voce | Valore |
|---|---:|
| File PHP analizzati | 84 |
| Rischio ridondanza | medium |
| Basename duplicati locali | 2 |
| Hash normalizzati duplicati cross-owner | 4 |
| Class/trait/interface name ripetuti nel monorepo | 12 |
| File grandi >=350 righe | 0 |
| File PHP con marker Git | 0 |

## Evidenze

### `concepts/xotbase-never-extend-filament.md` — Mai `Filament\*` — sempre `Modules\Xot\Filament\...\XotBase*`


# Mai `Filament\*` — sempre `Modules\Xot\Filament\...\XotBase*`

Bridge on-demand. Contenuto canonico: [docs/wiki/rules/xotbase-critical-rules.md](../../../../docs/wiki/rules/xotbase-critical-rules.md).

## Zen (riassunto)

Nessuna classe in `Modules/Lang` estende una classe `Filament\...` direttamente.
Si estende sempre lo "specchio" in `Modules\Xot\Filament\...` allo stesso
percorso relativo (es. `Filament\Tables\Columns\ViewColumn` ->
`Modules\Xot\Filament\Tables\Columns\XotBaseViewColumn`). Se manca il
mirror, va creato in Xot prima di usarlo qui, mai come scorciatoia nel modulo.

Non pre-caricare questo file: leggi la fonte canonica solo quando il task lo richiede.

### `conflicts/php-cs-fixer-dist-resolution.md` — Risoluzione Conflitto in .php-cs-fixer.dist.php

# Risoluzione Conflitto in .php-cs-fixer.dist.php

## Panoramica

Questo documento descrive la risoluzione del conflitto git nel file `.php-cs-fixer.dist.php` del modulo Lang, che definisce la configurazione distribuibile per lo strumento PHP-CS-Fixer.

## Analisi del Conflitto

Il file presenta potenziali conflitti nei punti e virgola duplicati alla fine di alcune istruzioni:

1. Doppio punto e virgola dopo `->ignoreVCS(true)` nella definizione del $finder
2. Doppio punto e virgola dopo `->setFinder($finder)` nella definizione del $config

Questi doppi punti e virgola sono sintatticamente validi in PHP ma rappresentano un errore di stile che potrebbe essere stato introdotto durante la risoluzione manuale di conflitti git precedenti.

## Soluzione Implementata

La soluzione consiste nel ri

### `conflicts/php-cs-fixer-resolution.md` — Risoluzione Conflitto in .php-cs-fixer.php

# Risoluzione Conflitto in .php-cs-fixer.php

## Panoramica

Questo documento descrive la risoluzione del conflitto git nel file `.php-cs-fixer.php` del modulo Lang, che definisce la configurazione per lo strumento PHP-CS-Fixer utilizzato per formattare automaticamente il codice PHP.

## Analisi del Conflitto

Il file presenta conflitti nei marcatori ma il contenuto attuale sembra già corretto e funzionante, privo di marcatori di conflitto visibili. I potenziali conflitti che potrebbero essere esistiti in precedenza erano probabilmente relativi a:

1. La formattazione delle regole
2. La sintassi di chiusura (se includere o meno il punto e virgola alla fine delle chiamate)

Il file attuale è sintatticamente corretto e coerente con le convenzioni del progetto.

## Verifica della Configurazio

### `conflicts/translation-model-resolution.md` — Risoluzione Conflitto nel Modello Translation

# Risoluzione Conflitto nel Modello Translation

## Panoramica

Questo documento descrive la risoluzione del conflitto git nel file `app/Models/Translation.php` del modulo Lang, che implementa il modello per la gestione delle traduzioni nell'applicazione.

## Analisi del Conflitto

Il file presenta diversi conflitti che richiedono attenzione:

1. **Importazioni duplicate**:
   - `Illuminate\Support\Facades\DB` è importato due volte
   - Sia `DB` (alias globale) che `Illuminate\Support\Facades\DB` sono importati, creando ambiguità

2. **Proprietà duplicate nella documentazione PHPDoc**:
   - Le proprietà `namespace` e `group` sono duplicate tre volte ciascuna
   - Diverse formattazioni di spazi e allineamenti nelle proprietà

3. **Implementazione del metodo `scopeSelectDistinctGroup`**:
   

### `conflicts/vscode-php-cs-fixer-resolution.md` — Risoluzione Conflitto in .vscode/.php-cs-fixer.php

# Risoluzione Conflitto in .vscode/.php-cs-fixer.php

## Panoramica

Questo documento descrive la risoluzione del conflitto git nel file `.vscode/.php-cs-fixer.php` del modulo Lang, che definisce la configurazione per lo strumento PHP-CS-Fixer utilizzata dall'estensione VSCode.

## Analisi del Conflitto

Il file presenta gli stessi problemi rilevati nel file `.php-cs-fixer.dist.php`:

1. Doppio punto e virgola dopo `->ignoreVCS(true)` nella definizione del $finder
2. Doppio punto e virgola dopo `->setFinder($finder)` nella definizione del $config

Questi doppi punti e virgola sono probabilmente il risultato di una risoluzione manuale di conflitti git precedenti.

## Soluzione Implementata

La soluzione consiste nel rimuovere i punti e virgola duplicati per ottenere un codice più pulito e c

### `conflicts-analysis.md` — Analisi Conflitti - README.md

# Analisi Conflitti - README.md

## Obiettivi Funzionali

## Decisioni Architetturali

## Impatto

## Collegamenti correlati
- [[conflicts_overview]]

### `conflicts.md` — Risoluzione Conflitti - Lang

# Risoluzione Conflitti - Lang

## File modificati

## Decisioni adottate

### `console-commands.md` — Console Commands - Lang Module

# Console Commands - Lang Module

## Panoramica
Il modulo Lang fornisce comandi console per la gestione delle traduzioni, inclusa conversione tra formati e ricerca di traduzioni mancanti.

## Comandi Disponibili

### ConvertTranslations
Converte file di traduzione tra formato PHP e JSON.

#### Funzionalità
- Conversione da PHP a JSON
- Conversione da JSON a PHP
- Gestione di traduzioni annidate
- Supporto per strutture complesse

#### Type Safety Implementata
```php
/**
 * @param array<string, mixed> $array

### `consolidation-plan.md` — Lang Module Docs Consolidation Plan


# Lang Module Docs Consolidation Plan

**Phase:** 2d Aggressive Merge  
**Current:** 579 total files (339 .md at root)  
**Target:** ≤30 files at root  
**Strategy:** Delete duplicates → Consolidate by topic → Move research to wiki/

---

title: "consolidation plan"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "consolidation plan"
issues: []
discussions: []
## Quick Stats


### `contracts/auto-label-action.md` — AutoLabelAction


# AutoLabelAction

Dà a ogni componente Filament (campo, colonna, filtro, entry, step, sezione, azione) l'etichetta e i testi presi dal
file di lingua del modulo che lo usa. È applicata a **tutti** i componenti da `LangServiceProvider::registerFilamentLabel()`
con `configureUsing()`. Perché: [ADR etichette dai file di lingua](../adr/0004-filament-labels-from-module-translation-files.md).
Sorgente: `app/Actions/Filament/AutoLabelAction.php`.

Test: `cd laravel && vendor/bin/pest Modules/Lang/tests/Feature/AutoLabelActionContractTest.php`.

## Input

| Parametro | Tipo | Note |
|---|---|---|
| `$component` | `Field\|Entry\|BaseFilter\|Column\|Step\|Action\|Section` | il componente appena creato |
| `$type` | `string` | `label` (default), `placeholder`, `helperText`, `description`, `heading`

### `contracts/clean-placeholder-translations-action.md` — CleanPlaceholderTranslationsAction


# CleanPlaceholderTranslationsAction

Toglie dai file di lingua le «traduzioni segnaposto» che `AutoLabelAction` scriveva in passato: `helper_text`,
`placeholder`, `description`, `tooltip`, `label`, `heading`, `hint` uguali al nome del campo che li contiene (comparivano
in produzione come «route», «postal_code» sotto i campi). Chiamante: `php artisan lang:clean-placeholders {moduli?*}
{--dry-run}`. Sorgente: `app/Actions/CleanPlaceholderTranslationsAction.php`.

Test: `cd laravel && vendor/bin/pest Modules/Lang/tests/Feature/CleanPlaceholderTranslationsActionTest.php`.

## Input

- `string $directory`: cartella da visitare ricorsivamente (di solito `lang/` di un modulo).
- `bool $dryRun = false`: solo elenco, nessuna scrittura.

## Output

- `array{files: list<string>, removed: int}`: fil

### `contracts/get-all-module-translation-action.md` — GetAllModuleTranslationAction


# GetAllModuleTranslationAction

Elenca i file di lingua di tutti i moduli per la lingua corrente. Codice: `app/Actions/GetAllModuleTranslationAction.php:12-50`. Corpo identico a [get-all-translation-action](get-all-translation-action.md): duplicato.

## Input

- Nessun argomento. Legge `session('locale')`: se e' `it` o `en`, imposta la locale dell'app (righe 23-26).

## Output

- `list<array{key: string, path: string}>`: `key` = `<modulo minuscolo>::<nome file senza .php>`, `path` = percorso assoluto.

## Invarianti

| ID | Regola | Test |
|---|---|---|
| `LANG-ALLMOD-INV-1` | Un elemento per file `Modules/*/lang/<locale>/*.php`, con la locale corrente dopo l'eventuale override di sessione. | Riferimento in `tests/Unit/LangHundredPercentCoverageTest.php`, contenuto non letto. |

## Effet

### `contracts/get-all-translation-action.md` — GetAllTranslationAction


# GetAllTranslationAction

Elenca i file di traduzione di tutti i moduli per la lingua corrente. Codice: `app/Actions/GetAllTranslationAction.php:12-50`. Corpo identico a [get-all-module-translation-action](get-all-module-translation-action.md): duplicato. Il docblock («dato un key») e' un copia-incolla che non descrive il metodo.

## Input

- Nessun argomento. Stessa lettura di sessione e stesso `setLocale` di `get-all-module-translation-action` (righe 23-26).

## Output

- `list<array{key: string, path: string}>`, come sopra.

## Invarianti

| ID | Regola | Test |
|---|---|---|
| `LANG-ALLTRANS-INV-1` | Un elemento per file `Modules/*/lang/<locale>/*.php`. | `tests/Unit/Actions/GetAllTranslationActionTest.php:19-50` (ritorna lista, chiavi e percorsi, sessione valida/non valida, nessun f

### `contracts/get-default-translatable-locale-action.md` — GetDefaultTranslatableLocaleAction


# GetDefaultTranslatableLocaleAction

Sceglie la lingua con cui si apre l'editor delle traduzioni. Codice: `app/Actions/GetDefaultTranslatableLocaleAction.php:14-28`.

## Input

- `string $fallback`: lingua di ripiego del chiamante (es. `app.locale` per le Resource, `it` per il selettore).

## Output

- `string`: il `default_locale` salvato se e' tra le lingue scelte, altrimenti `$fallback`.

## Invarianti

| ID | Regola | Test |
|---|---|---|
| `LANG-DEFLOC-INV-1` | Un default salvato fuori dalle lingue scelte viene ignorato e si usa `$fallback`. | `tests/Unit/Datas/LangConfigDataTest.php:66` («a default language outside the chosen ones is ignored»). |
| `LANG-DEFLOC-INV-2` | Senza default salvato (`null`) si usa `$fallback`. | `tests/Unit/Datas/LangConfigDataTest.php:26` («without a sav

### `contracts/get-trans-path-action.md` — GetTransPathAction


# GetTransPathAction

Dalla chiave di traduzione ricava il percorso del file PHP di lingua. Codice: `app/Actions/GetTransPathAction.php:11-33`.

## Input

- `string $key`: forma `<modulo>::<gruppo>.<voce>...`.

## Output

- `string`: `<cartella lang del modulo>/<locale corrente>/<primo segmento di gruppo>.php`.

## Invarianti

| ID | Regola | Test |
|---|---|---|
| `LANG-PATH-INV-1` | Il file e' quello della locale corrente (`app()->getLocale()`) e del primo segmento del gruppo (`explode('.')[0]`). | `tests/Unit/Actions/GetTransPathActionTest.php:19-48` (percorso per chiave valida, namespace e file, chiave con piu' punti, locale da app). |
| `LANG-PATH-INV-2` | Se il generatore non risolve il modulo, usa `base_path('Modules/<modulo>/lang')` senza errore. | Test: nessuno esplicito (riferim

### `contracts/get-translatable-locales-action.md` — GetTranslatableLocalesAction


# GetTranslatableLocalesAction

Restituisce le lingue con cui lavora l'editor delle traduzioni. Codice: `app/Actions/GetTranslatableLocalesAction.php:14-30`.

## Input

- Nessun argomento. Legge `LangConfigData::make()->supported_locales`.

## Output

- `list<string>`: solo stringhe non vuote, riindicizzate.

## Invarianti

| ID | Regola | Test |
|---|---|---|
| `LANG-TRANSLOC-INV-1` | Mai lista vuota: se non resta nulla, torna il default della Data (`['it', 'en']`, `LangConfigData.php:40`). | `tests/Unit/Datas/LangConfigDataTest.php:75` («an empty list of languages never reaches the editors»). |
| `LANG-TRANSLOC-INV-2` | Valori non stringa o stringhe vuote vengono scartati. | Test: nessuno. |


### `contracts/list-locale-options-action.md` — ListLocaleOptionsAction


# ListLocaleOptionsAction

Produce le etichette dei selettori di lingua: bandiera dal codice regionale e nome nativo. Codice: `app/Actions/ListLocaleOptionsAction.php:16-60`.

## Input

- `?array $codes`: codici da elencare, nell'ordine dato. `null`: tutte le lingue di `laravellocalization.supportedLocales`.

## Output

- `array<string, string>`: `codice => "<bandiera> <Nome nativo>"`, con il trim finale.

## Invarianti

| ID | Regola | Test |
|---|---|---|
| `LANG-LOCOPT-INV-1` | Le chiavi seguono l'ordine di `$codes`; con `null` l'ordine di `supportedLocales`. | `tests/Unit/Datas/LangConfigDataTest.php:93` («locale options show flag and native name, in the order asked»). |
| `LANG-LOCOPT-INV-2` | Un codice senza nome nativo (o assente da config) produce come etichetta il solo codice. | 

### `contracts/merge-translations-action.md` — MergeTranslationsAction


# MergeTranslationsAction

Fonde piu' array di traduzione in uno. Codice: `app/Actions/MergeTranslationsAction.php:13-33`.

## Input

- `array $translationFiles`: lista di array associativi, uno per file.

## Output

- `array<string, mixed>`: risultato di `array_merge` in sequenza.

## Invarianti

| ID | Regola | Test |
|---|---|---|
| `LANG-MERGE-INV-1` | Per le chiavi stringa vince l'ultimo file della lista. Il docblock dice «LIFO»: il comportamento reale e' «ultimo vince». | Riferimento in `tests/Unit/LangCoverageBoostTest.php` (contenuto non letto). |
| `LANG-MERGE-INV-2` | La fusione e' superficiale: un array annidato del file successivo sostituisce quello precedente intero, non viene fuso in profondita'. | Test: nessuno. |


### `contracts/publish-translation-action.md` — PublishTranslationAction


# PublishTranslationAction

Imposta una singola voce di un file di traduzione e riscrive il file se il contenuto cambia. Codice: `app/Actions/PublishTranslationAction.php:12-48`.

## Input

- `TranslationData $translationData`: fornisce `getFilename()`, `getData()`, `item` e `value`.

## Output

- `void`.

## Invarianti

| ID | Regola | Test |
|---|---|---|
| `LANG-PUB-INV-1` | Il file viene riscritto solo se l'array dopo `Arr::set` e' diverso da quello letto (riga 39). Se la voce ha gia' quel valore, nessuna scrittura. | Test: nessuno comportamentale. `tests/Unit/Actions/LangActionsCoverageTest.php:15` verifica solo che la classe sia accessibile. |
| `LANG-PUB-INV-2` | La scrittura passa per `Modules\Xot\Actions\Arr\SaveArrayAction` sul percorso dato da `getFilename()`. | Test: nessuno. 

### `contracts/read-translation-file-action.md` — ReadTranslationFileAction


# ReadTranslationFileAction

Legge un file di traduzione PHP e ne rende il contenuto come codice PHP. Codice: `app/Actions/ReadTranslationFileAction.php:11-100`. Due responsabilita' nello stesso file: lettura (`execute`) e rendering (`toPhp`).

## Input

- `execute(string $filePath)`: percorso di un file che restituisce un array.
- `toPhp(array $translations)`: array con chiavi stringa (annidate incluse).

## Output

- `execute`: `array<string, mixed>`, il valore restituito dal file.
- `toPhp`: stringa `<?php\n\nreturn [...];\n`, indentata a 4 spazi.

## Invarianti

| ID | Regola | Test |
|---|---|---|
| `LANG-READ-INV-1` | File inesistente: `\Exception` «File di traduzione non trovato». | `tests/Unit/Actions/ReadTranslationFileActionTest.php:36`. |

### `contracts/record-missing-translation-action.md` — RecordMissingTranslationAction


# RecordMissingTranslationAction

Registra nel database una chiave di traduzione mancante. Codice: `app/Actions/Translation/RecordMissingTranslationAction.php:17-52`.

## Input

- `string $key`: `<namespace>::<gruppo>.<voce>`, oppure `<gruppo>.<voce>`, oppure `<gruppo>`.
- `string $locale`.

## Output

- `void`.

## Invarianti

| ID | Regola | Test |
|---|---|---|
| `LANG-MISS-INV-1` | Una riga per combinazione `(lang, namespace, group, item)`: `firstOrCreate` (righe 25-30). | Riferimenti in `LangCoverageBoostTest.php`, `LangCoverageGapsTest.php`, `LangHundredPercentCoverageTest.php`, `LangFinalGapsTest.php` (contenuto non letto). |
| `LANG-MISS-INV-2` | Senza `::` il namespace e' `*`; senza `.` l'`item` e' `null`. | Test: nessuno. |

### `contracts/save-trans-action.md` — SaveTransAction


# SaveTransAction

Scrive una chiave di traduzione nel file PHP di lingua del modulo. Due ingressi con regole diverse:

- `execute()`: la chiamano `AutoLabelAction` quando un'etichetta manca; scrive solo se l'interruttore lo permette.
- `persist()`: la chiama il pannello di traduzione (`TranslationFileResource/Pages/EditTranslationFile.php`) quando il
  traduttore preme «Salva»; scrive sempre.

Perché l'interruttore: [ADR chiavi mancanti scritte solo in locale](../adr/0007-missing-translations-written-only-in-local.md).
Sorgente: `app/Actions/SaveTransAction.php`.

Test: `cd laravel && vendor/bin/pest Modules/Lang/tests/Feature/SaveTransActionDefaultTest.php Modules/Lang/tests/Feature/SaveTransActionRespectsSwitchTest.php`.

## Input

| Parametro | Tipo | Note |
|---|---|---|
| `$key` | `

### `contracts/sync-translations-action.md` — SyncTranslationsAction


# SyncTranslationsAction

Copia nelle lingue target le chiavi mancanti della lingua sorgente, file per file, modulo per modulo. Codice: `app/Actions/SyncTranslationsAction.php:11-273`.

## Input

- `string $sourceLang = 'it'`.
- `array $targetLangs = ['en', 'de']`.
- `?string $specificModule = null`: se dato, sincronizza solo quel modulo.

## Output

- `array`: `total_modules` (tutti i moduli esaminati, anche saltati), `total_files`, `total_translations`, e `modules` con l'esito per modulo (`completed` o `skipped` con motivo).

## Invarianti

| ID | Regola | Test |
|---|---|---|
| `LANG-SYNC-INV-1` | Un valore gia' presente nel target non viene mai sovrascritto. La sorgente riempie solo le chiavi mancanti o `null` (`mergeTranslations`, righe 211-230). | Solo firma: `tests/Unit/Actions/Lan

### `contracts/template.md` — <operazione> — contratto comportamentale


# <operazione> — contratto comportamentale

Classe o superficie: `<FQCN>`  
Riferimento nel codice: `@contract docs/contracts/<file>.md`

## Input

- <input e validazione>

## Output

- <risultato osservabile>

## Invarianti

| ID | Regola | Verifica |
|---|---|---|
| `<MODULE>-INV-1` | <regola che deve restare vera> | <test o controllo ripetibile> |


### `contracts/trans-array-action.md` — TransArrayAction


# TransArrayAction

Traduce gli elementi di un array con una chiave base, con ripiego sul valore originale. Codice: `app/Actions/TransArrayAction.php:14-97`.

## Input

- `array $array`: elementi da tradurre (le chiavi restano).
- `?string $transKey`: chiave base. `null`: solo cast a stringa.

## Output

- `array<int|string, string>`: stessa chiave di ingresso, valore stringa. Valori non stringa diventano `''`.

## Invarianti

| ID | Regola | Test |
|---|---|---|
| `LANG-TRANSARR-INV-1` | Per ogni elemento prova, in ordine: `<transKey>.<item>.label`, poi `<transKey>.<item con . sostituiti da _>`, altrimenti l'elemento originale (righe 74-95). | `tests/Unit/Actions/TransArrayActionTest.php:41` (traduce se esiste), `:48` (originale se manca). |
| `LANG-TRANSARR-INV-2` | Elemento vuoto o `'0

### `contracts/trans-collection-action.md` — TransCollectionAction


# TransCollectionAction

Versione su `Collection` di `trans-array-action`. Codice: `app/Actions/TransCollectionAction.php:14-76`.

## Input

- `Collection $collection`.
- `?string $transKey`: `null` gestito come in `trans-array-action`.

## Output

- `Collection<int|string, string>`, chiavi conservate (`map`).

## Invarianti

| ID | Regola | Test |
|---|---|---|
| `LANG-TRANSCOL-INV-1` | Prova in ordine `<transKey>.<item>` (senza `.label`), poi la forma con `_`, altrimenti l'originale (righe 54-74). | `tests/Unit/Actions/TransCollectionActionTest.php:44` (traduce se esiste), `:52` (originale se manca). |
| `LANG-TRANSCOL-INV-2` | Elemento vuoto o `'0'` resta invariato. | Test: nessuno. |

### `contracts/write-translation-file-action.md` — WriteTranslationFileAction


# WriteTranslationFileAction

Scrive un file di traduzione con backup e validazione sintattica preventiva. Codice: `app/Actions/WriteTranslationFileAction.php:17-199`.

## Input

- `string $filePath`: file di destinazione.
- `array $translations`: contenuto, con chiavi stringa.

## Output

- `bool`: sempre `true`. Ogni fallimento lancia.

## Invarianti

| ID | Regola | Test |
|---|---|---|
| `LANG-WRITE-INV-1` | Se il file esiste, ne crea una copia in `storage/app/backups/translations/<Y-m-d_H-i-s>_<nome>` **prima** di validare (righe 30-31, 120-136). Due scritture nello stesso secondo producono lo stesso nome di backup. | Riferimenti in `tests/Unit/LangHundredPercentCoverageTest.php` e `LangCoverageBoostTest.php` (contenuto non letto). |
| `LANG-WRITE-INV-2` | Il contenuto PHP passa `php

### `correzioni-errori-sintassi.md` — Correzioni Errori Sintassi File Traduzione - Gennaio 2025

# Correzioni Errori Sintassi File Traduzione - Gennaio 2025

## Riepilogo Problemi Risolti

### Errori Critici Identificati

1. **Dichiarazione `declare(strict_types=1)` posizionata erroneamente**
   - **File**: `laravel/Modules/Chart/lang/it/mixed_chart.php`
   - **Problema**: `declare(strict_types=1);` posizionato dopo `return`
   - **Soluzione**: Spostato prima di `return`

2. **Traduzioni non tradotte (chiavi inglesi)**
   - **File**: Tutti i file corretti
   - **Problema**: Valori impostati a chiavi non tradotte (es. `'label' => 'id'`)
   - **Soluzione**: Sostituite con traduzioni appropriate in italiano

3. **Struttura array non conforme**
   - **Problema**: Indentazione inconsistente e struttura non standard
   - **Soluzione**: Standardizzata struttura con indentazione coerente


### `correzioni-navigation-pattern.md` — Correzioni Pattern ".navigation" - Gennaio 2025

# Correzioni Pattern ".navigation" - Gennaio 2025

## Data Intervento
**2025-01-22** - Sistemazione traduzioni secondo regole DRY + KISS
**2025-01-22** - Sistemazione traduzioni secondo regole DRY + KISS
**[DATE]** - Sistemazione traduzioni secondo regole DRY + KISS

## Problema Identificato

I file di traduzione contenevano valori con pattern `.navigation` invece di traduzioni localizzate appropriate:

```php
// ❌ ERRATO
'navigation' => [
    'label' => 'criteri esclusione.navigation',
    'group' => 'criteri esclusione.navigation',
    'icon' => 'criteri esclusione.navigation',
],
```


### `correzioni-navigation.md` — Correzioni Pattern ".navigation" - Gennaio 2025

# Correzioni Pattern ".navigation" - Gennaio 2025

## Data Intervento
**[DATE]** - Sistemazione traduzioni secondo regole DRY + KISS

## Problema Identificato

I file di traduzione contenevano valori con pattern `.navigation` invece di traduzioni localizzate appropriate:

```php
// ❌ ERRATO
'navigation' => [
    'label' => 'criteri esclusione.navigation',
    'group' => 'criteri esclusione.navigation',
    'icon' => 'criteri esclusione.navigation',
],
```

**Problemi causati**:
- Valori non tradotti visibili nell'interfaccia

### `cosa-migliorare.md` — Cosa migliorare — modulo Lang


# Cosa migliorare — modulo Lang

Ogni affermazione qui sotto viene da un comando eseguito il 1 settembre 2026, dopo il
ripristino di `vendor/` a 330 pacchetti. Le misure precedenti a quella data giravano su
un autoloader dimezzato e non valgono.

## I numeri

| | |
|---|---:|
| Errori PHPStan (modulo isolato) | 0 |
| Rilievi PHPMD su `app/` | 60 |
| PHPInsights — Code | 94.1 % |
| PHPInsights — Architecture | 92.9 % |
| PHPInsights — Style | 85.2 % |
| File PHP | 211 |
| Casi di test | 251 |
| Casi di test per file | 1.19 |
| Coverage di riga | **mai misurata** |

### `coverage.md` — Code Coverage: Lang


# Code Coverage: Lang

**Date:** 2026-01-17
**Date:** 2026-01-17
**Lines Coverage:** N/A (Failed to parse)
**Test Exit Code:** 2

## Output

```text
──────────────────────────────────────────────────  
   FAILED  Modules\Lang\tests\Feature\LangBusinessLogicTest > `Lang Business Lo…  Error   
  Call to a member function connection() on null

  at vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php:1980
    1976▕      * @return \Illuminate\Database\Connection
    1977▕      */
    1978▕     public static function resolveConnection($connection = null)
    1979▕     {

### `critical-rules/fields-file-is-mandatory.md` — Regola Critica: fields.php è OBBLIGATORIO

# Regola Critica: fields.php è OBBLIGATORIO

**Data**: 2026-01-09
**Data**: 2026-01-09
**Severità**: 🔴 **CRITICAL**
**Status**: ✅ **REGOLA ASSOLUTA**

---

## 🚨 La Regola

**Il file `fields.php` è OBBLIGATORIO per ogni modulo che ha Filament Resources.**

**NON è opzionale. NON può essere omesso. NON può essere sostituito.**

---

## 💡 Perché È Critico

### 1. AutoLabelAction Lo Cerca Per Primo

### `critical-rules/fields-key-litigation-round2.md` — FURIOUS LITIGATION: Why "fields" Key is SACRED and IMMUTABLE

# FURIOUS LITIGATION: Why "fields" Key is SACRED and IMMUTABLE

**Date**: 2026-01-09 (Round 2)
**Severity**: 🔴 **CRITICAL - NEAR MISS**
**File Almost Affected**: `Modules/User/lang/fr/authentication_log.php`
**Status**: ✅ **ERROR PREVENTED BY USER**

---

## 🔥 THE INCIDENT

I was about to remove (or considered removing) the `fields` key from a translation file. AGAIN.

**File in Question**:
```
Modules/User/lang/fr/authentication_log.php
```

**What I Almost Did**: Remove the `fields` nesting level, flattening the structure.


### `cyclomatic-complexity-report.md` — Cyclomatic Complexity Report - Module: Lang

# Cyclomatic Complexity Report - Module: Lang

**Generated:** 2025-10-01 19:44:11
**Generated:** 2025-10-01 19:44:11
**Generated:** 2025-10-01 19:44:11
**Generated:** 2025-10-01 19:44:11
**Analyzer:** Super Mucca 🐮

---

## 📊 Summary Statistics

| Metric | Value |
|--------|-------|
| Total PHP Files | 146 |
| Total Lines of Code | 11751 |
| Total Classes/Traits/Interfaces | 73 |
| Total Methods | 281 |
| High Complexity Methods (>10) | 0 |


### `cyclomatic-complexity.md` — Cyclomatic Complexity Report - Module: Lang

# Cyclomatic Complexity Report - Module: Lang

**Analyzer:** Super Mucca 🐮

---

## 📊 Summary Statistics

| Metric | Value |
|--------|-------|
| Total PHP Files | 146 |
| Total Lines of Code | 11751 |
| Total Classes/Traits/Interfaces | 73 |
| Total Methods | 281 |
| High Complexity Methods (>10) | 0 |

---

## 🎯 Cyclomatic Complexity Overview


### `database-model-coverage.md` — Lang — Copertura Model / Migration / Seeder / Factory


# Lang — Copertura Model / Migration / Seeder / Factory

Stato: colmato il gap su `LanguageLine` (mancavano factory e seeder). Documentati gli skip su
`TranslationFile` (Sushi, no tabella) e sulle classi base astratte.

## Modelli concreti (`app/Models/`)

| Modello | Tabella | Migration | Factory | Seeder |
|---|---|---|---|---|
| `LanguageLine` | `language_lines` | OK | `LanguageLineFactory` (nuovo) | `LanguageLineSeeder` (nuovo) |
| `Translation` | `translations` | OK | `TranslationFactory` | `TranslationSeeder` |
| `Post` | `posts` | OK | `PostFactory` | `PostSeeder` |
| `TranslationFile` | nessuna (Sushi) | SKIP (vedi sotto) | `TranslationFileFactory` | `TranslationFileSeeder` |

`LangDatabaseSeeder` ora orchestra i seeder via `$this->call([...])`:
`LanguageLineSeeder`, `TranslationS

### `decision-log.md` — Decision Log — Lang

# Decision Log — Lang

## Decisions

### 2026-10-08: Riallineamento dell'intero modulo all'ultimo commit buono `acc43fc4`
- **Choose**: Confronto a tre vie dell'intero modulo (app, config, routes, resources, lang, database, tests) con `acc43fc4` (07/10 06:38), l'ultimo commit prima del re-import `f80d2ee6` (07/10 13:01).
- **Over**: Fermarsi ai 15 file della voce sotto, scelti con un confronto basato sul monorepo.
- **Because**: Ogni contenuto sovrascritto o eliminato e' stato verificato come gia' esistente prima del 07/10 (645 su 645).
  - 408 toccati solo dagli eventi del 07/10: contenuto da `acc43fc4`. Molti differivano solo nel permesso registrato nel commit.
  - 237 aggiunti solo dalle copie vecchie: eliminati. 218 sono `*.svg_Zone.Identifier` in `resources/svg/flag` (scarti Windows: 

### `dependencies.md` — Dependencies (Module Lang)

# Dependencies (Module Lang)

Canonical dependency map:

- [../../../../docs/dependencies.md](../../../../docs/dependencies.md)

Module/theme specific notes:

- (add notes here when a dependency is directly used by this module/theme)

Installed packages index:

- [../../../../docs/packages/index.md](../../../../docs/packages/index.md)

### `dependency-intelligence.md` — Dependency Intelligence - Module Lang

# Dependency Intelligence - Module Lang

Aggiornato da `composer show` il 2026-03-02.

## Runtime dependencies (`require`)

| Package | Constraint | Installed | Area |
|---|---|---|---|
| `lara-zeus/spatie-translatable` | `*` | `2.0.0` | `application-support` |
| `mcamara/laravel-localization` | `*` | `v2.3.0` | `i18n-routing` |
| `rinvex/countries` | `^9.1` | `v9.1.0` | `application-support` |
| `spatie/laravel-sluggable` | `*` | `3.7.5` | `spatie-ecosystem` |

## Dev dependencies (`require-dev`)

| Package | Constraint | Installed | Area |
|---|---|---|---|
| _(none)_ | - | - | - |

## Declared but missing from installed set

### `development/roadmap.md` — Roadmap Modulo Lang

# Roadmap Modulo Lang

## 📊 Progress Overview
| Categoria | Progresso | Note |
|-----------|-----------|------|
| Core Features | 90% | Base solida |
| Performance | 85% | Ottimizzato |
| Documentation | 75% | Da aggiornare |
| Test Coverage | 80% | Buona copertura |
| Security | 85% | Standard elevati |

## Stato Attuale
- **Versione**: 1.3.0
- **Stato Implementazione**: 85%
- **Priorità**: Alta
- **Dipendenze**: UI, User, Activity

## Task & Progress

### Completato (100%)

### `docs-health.md` — Docs Health - Lang

# Docs Health - Lang

## Snapshot

- Scope directory: laravel/Modules/Lang/docs
- Markdown files (top-level in this docs folder): 351
- Has canonical index 00-index.md: yes
- Has README.md: yes

## Confidence Checklist

- [ ] 00-index links only canonical docs (no obsolete duplicates)
- [ ] README and 00-index are coherent and do not diverge
- [ ] New docs use stable names (no dates in filename)
- [ ] Deprecated docs are explicitly marked and linked to canonical replacements
- [ ] Every technical decision has one canonical reference doc

## Canonical Rules

1. Read order: 00-index.md -> README.md -> focused docs.

### `dry-kiss-analysis.md` — 🐄 DRY & KISS Analysis - Lang

**Data:** 2025-10-15 | **Status:** ✅
# 🐄 DRY & KISS Analysis - Lang

**Data:** [DATE] | **Status:** ✅
# 🐄 DRY & KISS Analysis - Lang

**Data:** [DATE] | **Status:** ✅
# 🐄 DRY & KISS Analysis - Lang

**Data:** [DATE] | **Status:** ✅
**Data:** 2025-10-15 | **Status:** ✅

## 📊 Struttura
Models: 13 | Resources: 2 | Actions: 11 | Docs: 256 🟡

## 🎯 Score
DRY: 7/10 🟢 | KISS: 6/10 🟡 | **Overall: 6.5/10 🟡**

## ✅ PUNTI DI FORZA
- BaseModel: 73→44 LOC ✅

### `dry-kiss.md` — 🐄 DRY & KISS Analysis - Lang

# 🐄 DRY & KISS Analysis - Lang

**Data:** [DATE] | **Status:** ✅

## 📊 Struttura
Models: 13 | Resources: 2 | Actions: 11 | Docs: 256 🟡

## 🎯 Score
DRY: 7/10 🟢 | KISS: 6/10 🟡 | **Overall: 6.5/10 🟡**

## ✅ PUNTI DI FORZA
- BaseModel: 73→44 LOC ✅
- Translation system centrale ⭐
- LangServiceProvider ben fatto ⭐

## ⚠️ MIGLIORAMENTI
1. **256 Docs**: Secondo posto! Consolidare → 180
2. **Resources** (2): Helpers (~40 LOC)
3. **11 Actions**: Verificare sovrapposizioni


### `duplicate-methods-analysis.md` — Analisi Metodi Duplicati - Modulo Lang

# Analisi Metodi Duplicati - Modulo Lang

**Data Generazione**: 2025-10-15 06:41:17
**Data Generazione**: 2025-10-15 06:41:17
**Data Generazione**: 2025-10-15 06:41:17
**Data Generazione**: 2025-10-15 06:41:17
**Totale Gruppi di Duplicati**:

## Sommario Esecutivo

Questo documento identifica i metodi duplicati nel modulo **Lang** che potrebbero beneficiare di refactoring.

### Statistiche

| Tipo Refactoring | Conteggio |
|------------------|----------:|
| **Trait** | 0 |
| **Base Class** | 0 |
| **Interface** | 6 |
| **Altro** | 1 |

### `duplicate-methods.md` — Analisi Metodi Duplicati - Modulo Lang

# Analisi Metodi Duplicati - Modulo Lang

**Totale Gruppi di Duplicati**:

## Sommario Esecutivo

Questo documento identifica i metodi duplicati nel modulo **Lang** che potrebbero beneficiare di refactoring.

### Statistiche

| Tipo Refactoring | Conteggio |
|------------------|----------:|
| **Trait** | 0 |
| **Base Class** | 0 |
| **Interface** | 6 |
| **Altro** | 1 |

## Dettaglio Metodi Duplicati

### 1. Metodo: `linkable`

### `english-translation-audit.md` — Audit Traduzioni Inglesi - <nome progetto>

# Audit Traduzioni Inglesi - <nome progetto>

## Panoramica

Questo documento traccia l'audit e la correzione delle traduzioni inglesi nei file di lingua del progetto <nome progetto>. Molti file nelle cartelle `lang/en/` contengono ancora testo in italiano che deve essere tradotto.

## Problemi Identificati

### File Completamente in Italiano

1. **Modules/UI/lang/en/opening_hours.php** ✅ CORRETTO
   - Status: Tradotto completamente
   - Conteneva: Tutto il testo in italiano
   - Risolto: 2025-01-06
   - Risolto: 2025-01-06
   - Risolto: [DATE]
   - Risolto: [DATE]
   - Risolto: [DATE]
   - Risolto: [DATE]
   - Risolto: 2025-01-06

### `english-translation.md` — Audit Traduzioni Inglesi - <nome progetto>

# Audit Traduzioni Inglesi - <nome progetto>

## Panoramica

Questo documento traccia l'audit e la correzione delle traduzioni inglesi nei file di lingua del progetto <nome progetto>. Molti file nelle cartelle `lang/en/` contengono ancora testo in italiano che deve essere tradotto.

## Problemi Identificati

### File Completamente in Italiano

1. **Modules/UI/lang/en/opening_hours.php** ✅ CORRETTO
   - Status: Tradotto completamente
   - Conteneva: Tutto il testo in italiano
   - Risolto: [DATE]

2. **Modules/Notify/lang/en/test_smtp.php** ✅ CORRETTO
   - Status: Tradotto completamente
   - Conteneva: Tutto il testo in italiano
   - Risolto: [DATE]


### `english-translations-widgets-added.md` — English Translations Added for <nome progetto> Widgets

# English Translations Added for <nome progetto> Widgets

## ✅ Problema Risolto

### Errore Segnalato
```
mancano queste traduzioni in inglese:
<nome progetto>::widgets.doctor_appointments.empty.title
<nome progetto>::widgets.doctor_appointments.empty.description
```

### Causa del Problema

Il file `laravel/Modules/<nome progetto>/lang/en/widgets.php` era **incompleto** rispetto alla versione italiana:

- **File italiano**: 239 righe con traduzioni complete per tutti i widgets
- **File inglese**: 29 righe con solo traduzioni parziali per `find_doctor_widget`

## 🎯 Soluzione Implementata


### `epics/lang-epics-and-stories.md` — Lang Epics and User Stories

# Lang Epics and User Stories

## Epic 1: Core CRUD Operations
As an Administrator, I want to manage lang records so that I can maintain accurate data.

### Story 1.1: Record Creation
**Description**: Admin can create new lang records.

**Acceptance Criteria**:
- [ ] Form to create new record with all required fields
- [ ] Validation rules applied (required fields, data types)
- [ ] Success notification on save
- [ ] Redirect to list view after creation
- [ ] Error handling for invalid input

### Story 1.2: Record Listing and Filtering
**Description**: Admin can view and filter lang records in a table.

**Acceptance Criteria**:
- [ ] Table view with all relevant columns

### `errori-comuni-traduzione.md` — Errori comuni nei file di traduzione

# Errori comuni nei file di traduzione

## Errori di sintassi critici identificati

### 1. Dichiarazione `declare(strict_types=1)` posizionata erroneamente

**Errore comune**: La dichiarazione `declare(strict_types=1);` viene posizionata dopo il `return` o in posizione errata.

**Esempio di errore**:
```php
<?php
return [

declare(strict_types=1);  // ERRORE: dopo return
  'navigation' => [
    'label' => 'Navigation Label',
  ],
);
```


### `examples.md` — 💡 **Esempi Pratici Modulo Lang - Laraxot**

# 💡 **Esempi Pratici Modulo Lang - Laraxot**

## 🎯 **Panoramica**

Questo documento fornisce esempi pratici e casi d'uso reali per il modulo Lang, seguendo i principi **DRY**, **KISS**, **SOLID**, **Robust** e **Laraxot**. Ogni esempio è testato e validato.

---

## 🏗️ **Struttura File Traduzioni**

### **1. File Base - fields.php**

#### **Struttura Completa**
```php
<?php

declare(strict_types=1);

/**
 * Traduzioni per i campi del modulo User.

### `filament/langbasecreaterecord.md` — Classi LangBase per Modelli Traducibili

# Classi LangBase per Modelli Traducibili

## Introduzione

Questo documento descrive l'utilizzo corretto delle classi `LangBase*` per la gestione dei modelli che supportano la traduzione tramite il trait `Spatie\Translatable\HasTranslations`.

## Regola Fondamentale

Se un modello utilizza il trait `Spatie\Translatable\HasTranslations`, le relative classi Filament **devono estendere le classi LangBase** corrispondenti e non le classi XotBase:

- Utilizzare `LangBaseCreateRecord` invece di `XotBaseCreateRecord`
- Utilizzare `LangBaseEditRecord` invece di `XotBaseEditRecord`
- Utilizzare altre classi `LangBase*` invece delle corrispondenti `XotBase*`

**Importante**: Basta che il modello abbia `use Spatie\Translatable\HasTranslations` per richiedere l'uso delle classi LangBase.

## Motivazi

### `filament-5x-compatibility.md` — Filament 5.x compatibility - modulo Lang


# Filament 5.x compatibility - modulo Lang

**Versione Filament:** v5.2.1

## Stato compatibilità

Il modulo Lang è **compatibile** con Filament 5.x. Nessun breaking change funzionale.

## Note specifiche modulo

- `LangServiceProvider` gestisce le traduzioni automatiche per tutte le labels Filament — non impattato dall'upgrade
- Le traduzioni in `Modules/{ModuleName}/lang/` restano compatibili

## Regole architetturali

Tutte le classi Filament **devono** estendere le classi `XotBase*` (vedi [regole Xot](../../Xot/docs/filament-5-laraxot-rules.md)).


## Inclusione nei Blade View

### `filament-integration.md` — Integrazione di mcamara/laravel-localization con Filament

# Integrazione di mcamara/laravel-localization con Filament

## Indice
1. [Introduzione](#introduzione)
2. [Configurazione Iniziale](#configurazione-iniziale)
   - [Installazione di Filament](#installazione-di-filament)
   - [Configurazione di Laravel-Localization](#configurazione-di-laravel-localization)
3. [Traduzione delle Risorse Filament](#traduzione-delle-risorse-filament)
4. [Middleware per Filament](#middleware-per-filament)
5. [Plugin per la Gestione delle Lingue](#plugin-per-la-gestione-delle-lingue)
6. [Testing](#testing)
7. [Best Practice](#best-practice)
8. [Risoluzione Problemi](#risoluzione-problemi)

## Introduzione

L'integrazione di `mcamara/laravel-localization` con Filament richiede un approccio specifico per garantire che il pannello di amministrazione supporti corrett

### `filament-label.md` — Gestione automatica delle label in Filament tramite LangServiceProvider

# Gestione automatica delle label in Filament tramite LangServiceProvider

## Funzionamento
- LangServiceProvider applica automaticamente la label corretta tramite AutoLabelAction a tutte le colonne, actions e fields Filament.
- Non serve mai usare ->label(): la label viene ricavata dalla chiave di traduzione secondo convenzione.
- Se la traduzione non esiste, il sistema può crearla o segnalarla (fallback).

## Pattern
- Label, heading, help e placeholder SOLO in file di traduzione modulo.
- Convenzione chiavi: `modulo.resource.fields.campo.label` o `modulo.resource.actions.azione.label`.
- Nessuna label hardcoded nei file Filament.

## Anti-pattern
- Uso di ->label() nei componenti Filament.
- Label hardcoded.

## Test di regressione
- Test statico che cerca ->label( nei file Filament.
- 

### `filament-table-architecture.md` — La tabella si configura nella Table class, non nella pagina


# La tabella si configura nella Table class, non nella pagina

Vale per ogni Resource di questo modulo.

## La regola

Colonne, filtri e azioni di una Resource stanno in
`app/Filament/Resources/<Nome>Resource/Tables/<Plurale>Table.php`, che estende
`Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable`.

**Non** nella pagina `Pages/List<Plurale>.php`. Quello che scrivi li' dentro non viene
letto da nessuno.

```php
namespace Modules\Lang\Filament\Resources\FooResource\Tables;

use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class FoosTable extends XotBaseResourceTable

### `filament-translations.md` — Regole per le Traduzioni in Filament

# Regole per le Traduzioni in Filament

> **Regola fondamentale:** MAI utilizzare il metodo `->label()` nei componenti Filament, specialmente nei Blocks. Le etichette sono gestite automaticamente dal LangServiceProvider.

# ⚠️ Regola fondamentale: MAI usare chiavi che terminano con `.navigation` nei file di traduzione

- Usa sempre la struttura array per navigation:
  ```php
  'navigation' => [
      'label' => 'Gestione Pazienti',
      'group' => 'Pazienti',
      'icon' => 'heroicon-o-user-group',
      'color' => 'primary',
  ],
  ```
- **Esempio ERRATO:**
  ```php
  'group' => 'patient.navigation',
  'label' => 'patient.navigation',
  ```

### `filament-version.md` — Filament Version Declaration — Lang

# Filament Version Declaration — Lang

**Current Version**: Filament v5 (Livewire v4 + Schemas)

This module/theme is developed against **Filament v5**.

All resources, forms, tables, infolists, widgets and actions must follow the v5 + XotBase patterns documented in:

- `docs/wiki/rules/filament-rules-summary.md`
- `docs/wiki/memories/filament-version-policy.md`
- `laravel/Modules/Xot/docs/filament-5-laraxot-rules.md`

**Legacy v4 documents** in this folder (if any) are historical only and must not be used as current reference.

**Last verified**: 2026-05-21

**Firmato:** Cursor Agent (Composer) — template propagato ai package `docs/`

### `filament-widgets-integration.md` — Language Module - Filament Widgets Integration

# Language Module - Filament Widgets Integration

## Overview
This document provides guidelines for implementing Filament widgets in the Lang module, specifically for language switching functionality.

## Language Switcher Widget

### Location
- **Class**: `Modules/Lang/app/Filament/Widgets/LanguageSwitcherWidget.php`
- **View**: `Modules/Lang/resources/views/filament/widgets/language-switcher.blade.php`

### Implementation Details

#### Widget Class Structure
```php
namespace Modules\Lang\Filament\Widgets;

use Modules\Xot\Filament\Widgets\XotBaseWidget;

class LanguageSwitcherWidget extends XotBaseWidget

### `filament.md` — Collegamenti tra versioni di filament.md

https://github.com/statikbe/laravel-filament-chained-translation-manager

https://filamentphp.com/plugins/34ml-translatable-field

## Collegamenti tra versioni di filament.md
* [filament.md](docs/tecnico/filament/filament.md)
* [filament.md](../../../chart/docs/filament.md)
* [filament.md](../../../gdpr/docs/filament.md)
* [filament.md](../../../xot/docs/technical/filament.md)
* [filament.md](../../../xot/docs/roadmap/integration/filament.md)
* [filament.md](../../../lang/docs/filament.md)
* [filament.md](../../../job/docs/filament.md)
* [filament.md](../../../activity/docs/filament.md)
* [filament.md](../../../cms/docs/filament.md)
* [filament.md](../../../Chart/docs/filament.md)
* [filament.md](../../../Gdpr/docs/filament.md)
* [filament.md](../../../Xot/docs/technical/filament.md)
* [fi

### `filament4-migration.md` — filament4-migration



### `filament5-migration.md` — Filament 5 Migration Guide for Lang Module

# Filament 5 Migration Guide for Lang Module

## Overview
This document describes the migration of the Lang module from Filament 4 with `lara-zeus/spatie-translatable` to Filament 5 with built-in translation support.

## Key Changes

### 1. Updated LangBase Classes
- **LangBasePanelProvider**: Replaced `SpatieTranslatablePlugin` with Filament 5's native `TranslatablePanel` trait
- **LangBaseResource**: Updated to use `Filament\Resources\Concerns\Translatable`
- **LangBaseListRecords**: Updated to use `Filament\Resources\Pages\ListRecords\Concerns\Translatable`
- **LangBaseCreateRecord**: Updated to use `Filament\Resources\Pages\CreateRecord\Concerns\Translatable`
- **LangBaseEditRecord**: Updated to use `Filament\Resources\Pages\EditRecord\Concerns\Translatable`
- **LangBaseViewRecord**: U

### `file-naming.md` — Regole di Naming per File

# Regole di Naming per File

## 🎯 Regola Fondamentale: NO Duplicati Case-Insensitive

### Problema

Su filesystem case-insensitive (Windows, macOS default), file con nomi che differiscono solo per maiuscole/minuscole causano conflitti:

```
❌ ERRATO - Duplicati case-insensitive:
- README.md e README.md
- Activity.php e activity.php
- listrecords.md e listrecords.md
```

### Soluzione

**Mantenere SOLO la versione con naming corretto secondo le convenzioni:**

## 📋 Convenzioni di Naming

### `fixes-lang-module-phpstan.md` — Correzioni PHPStan per Modulo Lang

# Correzioni PHPStan per Modulo Lang

## Errori Risolti

### 1. WriteTranslationFileAction.php
**Errori**:
- Call to undefined method `Illuminate\Contracts\Cache\Repository::flush()`
- PHPDoc tag @var contains unknown class `Illuminate\Translation\LoaderInterface`

**Soluzione**:
- Aggiunto `//@phpstan-ignore-next-line` per il metodo `flush()` del cache
- Cambiato tipo da `Illuminate\Translation\LoaderInterface` a `mixed` per il loader

### 2. LangField.php
**Errore**: Method overrides but misses parameter #4 $attributes
**Soluzione**: Aggiunto quarto parametro `$attributes2 = null` al metodo `get()`

### 3. Post.php
**Errori**:
- Method `linkable()` with return type void returns MorphTo

### `fixes-syntaxs.md` — Correzioni Errori Sintassi File Traduzione - Gennaio 2025

# Correzioni Errori Sintassi File Traduzione - Gennaio 2025

## Riepilogo Problemi Risolti

### Errori Critici Identificati

1. **Dichiarazione `declare(strict_types=1)` posizionata erroneamente**
   - **File**: `laravel/Modules/Chart/lang/it/mixed_chart.php`
   - **Problema**: `declare(strict_types=1);` posizionato dopo `return`
   - **Soluzione**: Spostato prima di `return`

2. **Traduzioni non tradotte (chiavi inglesi)**
   - **File**: Tutti i file corretti
   - **Problema**: Valori impostati a chiavi non tradotte (es. `'label' => 'id'`)
   - **Soluzione**: Sostituite con traduzioni appropriate in italiano

3. **Struttura array non conforme**
   - **Problema**: Indentazione inconsistente e struttura non standard
   - **Soluzione**: Standardizzata struttura con indentazione coerente


### `folio-volt-best-practices.md` — Laravel Folio + Volt - Best Practices and Patterns Analysis

# Laravel Folio + Volt - Best Practices and Patterns Analysis

## Overview

Based on research of multiple Laravel Folio + Volt repositories and official documentation, this document outlines the best practices and patterns for implementing Folio + Volt in applications.

## Key Patterns Identified

### 1. File Structure
- **Pages Directory**: Folio automatically maps files in `resources/views/pages/` to routes
  - Example: `resources/views/pages/events.blade.php` → `/events`
  - Example: `resources/views/pages/events/[event].blade.php` → `/events/{event}`
- **Subdirectories**: Organize related pages in subdirectories (e.g., `resources/views/pages/auth/`)
- **Blade Components**: Store reusable UI components in `resources/views/components/`

### 2. Volt Component Structure
- Volt components c

### `frontend/theme-translation-registration.md` — Registrazione Traduzioni Temi - Standard Laraxot

# Registrazione Traduzioni Temi - Standard Laraxot

## Principio Fondamentale

**REGOLA CRITICA**: Ogni tema DEVE registrare le traduzioni con doppio namespace:
1. Il proprio namespace specifico (es. `one`, `two`)
2. Il namespace generico `pub_theme`

## Implementazione Standard

### ThemeServiceProvider Pattern
```php
public function boot(): void
{
    parent::boot();

    // Registra il namespace pub_theme per le traduzioni
    $this->loadTranslationsFrom($this->module_dir.'/../lang', 'pub_theme');

    // Registra anche le view con il namespace pub_theme

### `frontend/widget-view-namespaces.md` — Regole per i Namespace delle View nei Widget

# Regole per i Namespace delle View nei Widget

## Distinzione Critica: Widget Auth vs Widget Normali

### 🔑 **Regola Fondamentale**

- **Widget di Autenticazione** (login, registrazione, password reset): DEVONO usare `pub_theme::`
- **Widget Normali/Funzionali**: possono usare il namespace del modulo (`user::`, `<nome progetto>::`, etc.)

### 🎯 **Motivazione**

I widget di autenticazione sono parte dell'**interfaccia utente del tema** e devono essere **personalizzabili visivamente** per ogni tema diverso, mantenendo la logica centralizzata nel modulo.

## Widget di Autenticazione (pub_theme::)

### Esempi di Widget Auth
- `LoginWidget`
- `RegistrationWidget`
- `PasswordResetWidget` → `pub_theme::filament.widgets.auth.password.reset`
- `PasswordResetConfirmWidget` → `pub_theme::filament.wi

### `git-conflict-resolution.md` — Audit collisioni Git committate in bashscripts


# Audit collisioni Git committate in bashscripts

Risoluzione deterministica per singolo blocco: lato non vuoto, superset, metadata `updated` più recente, quindi HEAD come spareggio conservativo.

| File | Blocchi | Decisioni | SHA-256 prima → dopo |
|---|---:|---|---|
| `laravel/Modules/Lang/docs/code-quality-improvement-report.md` | 1 | shorter_tiebreak=1 | `5baf0963b27d` → `b23a2ea4e1cc` |

### `git-conflicts-resolution-summary.md` — git-conflicts-resolution-summary



### `git-conflicts-resolution-sumy.md` — git-conflicts-resolution-sumy



### `glossary.md` — Glossario di dominio Lang


# Glossario di dominio Lang

<!-- Le parole del dominio e dove stanno nel codice. Topology di AGENTS.md punta qui.
     Un termine per riga; se glossario e codice non coincidono, vale il codice e si corregge il glossario. -->

| Termine | Significato | Nel codice |
|---|---|---|
| <!-- termine --> | <!-- cosa vuol dire per il business, con unità e stati se servono --> | <!-- classe, colonna, rotta --> |

### `guida-migrazione-step-by-step.md` — guida-migrazione-step-by-step



### `helper-text-audit-report.md` — Helper Text Audit Report

# Helper Text Audit Report

**Data**: 2025-08-08 09:15:22
**Data**: 2025-08-08 09:15:22

## Problemi Identificati

## Riepilogo

- **File con problemi**: 0
- **Problemi totali**: 0

## Regola Applicata

**Se il valore di `helper_text` è uguale alla chiave del campo padre, DEVE essere impostato a stringa vuota (`''`).**

### `html2pdf/advanced.md` — Html2Pdf — advanced


# Html2Pdf — advanced

Stub **DRY**. Documentazione canonica nel modulo **Media** (issue [#124](https://github.com/provtv/base_ptv_fila5_mono/issues/124)).

→ [advanced.md](../../../Media/docs/html2pdf/advanced.md)

### `html2pdf/laravel.md` — Html2Pdf — laravel


# Html2Pdf — laravel

Stub **DRY**. Documentazione canonica nel modulo **Media** (issue [#124](https://github.com/provtv/base_ptv_fila5_mono/issues/124)).

→ [laravel.md](../../../Media/docs/html2pdf/laravel.md)

### `html2pdf/security.md` — Html2Pdf — security


# Html2Pdf — security

Stub **DRY**. Documentazione canonica nel modulo **Media** (issue [#124](https://github.com/provtv/base_ptv_fila5_mono/issues/124)).

→ [SECURITY.md](../../../Media/docs/html2pdf/security.md)

### `html2pdf/styling.md` — Html2Pdf — styling


# Html2Pdf — styling

Stub **DRY**. Documentazione canonica nel modulo **Media** (issue [#124](https://github.com/provtv/base_ptv_fila5_mono/issues/124)).

→ [styling.md](../../../Media/docs/html2pdf/styling.md)

### `html2pdf/usage.md` — Html2Pdf — usage


# Html2Pdf — usage

Stub **DRY**. Documentazione canonica nel modulo **Media** (issue [#124](https://github.com/provtv/base_ptv_fila5_mono/issues/124)).

→ [usage.md](../../../Media/docs/html2pdf/usage.md)

### `ide-helper-sushi-pattern.md` — IDE Helper + Sushi: Pattern di Caricamento Lazy


# IDE Helper + Sushi: Pattern di Caricamento Lazy

## Problema

`TranslationFile` usa `Sushi` (in-memory model senza DB). Durante `php artisan ide-helper:models`:

1. IDE Helper istanzia `TranslationFile`
2. Sushi chiama `bootSushi()` durante `__construct()`
3. `bootSushi()` chiama `getRows()` per caricare i dati
4. `getRows()` esegue `File::getRequire()` sui file di traduzione
5. Se il file contiene funzioni locali (es. `merge_translation_files()`), fallisce:
   ```
   Exception: Call to undefined function merge_translation_files()
   ```

## Root Cause

Sushi non sa che è in fase di analisi statica e carica i dati come se fosse runtime.


### `installation.md` — Installazione {#installazione}


# Installazione {#installazione}

Un'applicazione Laravel fresca è il modo ideale per iniziare con questo pacchetto.

Per installare il bacchetto basta mettere il seguente comando nella linea di comando:

```console
composer require laraxot/module_lang

php artisan module_lang:install
### Versione HEAD

```
## Collegamenti tra versioni di installation.md
* [installation.md](../../../Xot/docs/filament/installation.md)
* [installation.md](../../../Xot/docs/installation.md)
* [installation.md](../../../Xot/docs/base/installation.md)
* [installation.md](../../../User/docs/installation.md)
* [installation.md](../../../Lang/docs/installation.md)

### `integration-mc-laravel-localization.md` — Integrazione di mcamara/laravel-localization

# Integrazione di mcamara/laravel-localization

Questo documento descrive come integrare e configurare il pacchetto `mcamara/laravel-localization` nel progetto <nome progetto>.

## Panoramica

Il pacchetto `mcamara/laravel-localization` fornisce un sistema avanzato per la gestione delle lingue in applicazioni Laravel, con supporto a:

- Gestione delle route localizzate
- Middleware per il rilevamento della lingua
- Supporto a domini personalizzati per lingua
- Generazione di URL localizzati
- Supporto a sessioni e cookie per la persistenza della lingua

## Configurazione Richiesta

### 1. Installazione

```bash
composer require mcamara/laravel-localization

### `introduction.md` — Introducendo Lang {#introducendo-lang}


# Introducendo Lang {#introducendo-lang}

Il module_lang in Laravel è un pacchetto che serve a gestire le traduzioni in lingua.

In Laravel, le traduzioni servono a consentire all'applicazione di mostrare testo in diverse lingue.

Ad esempio, se si sta costruendo un'applicazione che dovrà essere utilizzata in Italia, Francia e Germania, si potrebbero creare file di lingua per ognuna di queste lingue che contengono le traduzioni del testo utilizzato nell'applicazione.

In questo modo, quando l'applicazione viene utilizzata in Italia, verrà visualizzato il testo tradotto in italiano;

quando viene utilizzata in Francia, verrà visualizzato il testo tradotto in francese, e così via.

### Versione HEAD

## Collegamenti tra versioni di introduction.md
* [introduction.md](laravel/vendor/spatie/l

### `investigation/investigation.md` — Investigation: Translation Pipeline

# Investigation: Translation Pipeline

## Problem Statement
Analisi delle feature mancanti nel modulo Lang.

## Current State
- Documentazione esistente: 23 stories
- Architettura: Actions,Adapters,App,Casts,Console,Datas,Enums,Filament,Http,Models,Phpstan,Providers,Services,View,

## Feature Missing
1. Feature A - descrizione
2. Feature B - descrizione
3. Feature C - descrizione

## Proposed Solution
- Implementare le feature A/B/C usando le regole BMAD
- Seguire: no controller, no services layer, module providers manifest

## Acceptance Criteria
- [ ] APCA contrast ≥75 body, ≥45 large-bold

### `lang-link.md` — Collegamento alle Traduzioni del Modulo Chart

# Collegamento alle Traduzioni del Modulo Chart

Questo modulo utilizza le traduzioni centralizzate nella cartella [Lang](../../Lang/docs/).

Consulta la documentazione delle traduzioni:
- [Introduzione alle Traduzioni](../../Lang/docs/introduction.md)
- [Struttura delle Traduzioni](../../Lang/docs/structure.md)
- [Gestione dei File di Lingua](../../Lang/docs/module_lang.md)
- [Introduzione alle Traduzioni](../../Lang/docs/introduction.md)
- [Struttura delle Traduzioni](../../Lang/docs/structure.md)
- [Gestione dei File di Lingua](../../Lang/docs/module_lang.md)
- [Introduzione alle Traduzioni](../../Lang/docs/introduction.md)
- [Struttura delle Traduzioni](../../Lang/docs/structure.md)
- [Gestione dei File di Lingua](../../Lang/docs/module_lang.md)

## Collegamento Bidirezionale

Per ogni

### `langbase-classes-requirements.md` — LangBase Classes - Requisiti e Pattern

# LangBase Classes - Requisiti e Pattern

## Overview

Le classi `LangBase*` forniscono funzionalità multilingua riutilizzabili tramite integrazione con **Lara Zeus Spatie Translatable**.

## Classi Disponibili

### LangBaseResource

**Path**: `Modules/Lang/app/Filament/Resources/LangBaseResource.php`

**Estende**: `XotBaseResource`

**Trait**: `Translatable` (commentato per compatibilità)

**Metodi**:
- `getDefaultTranslatableLocale()` - Ritorna lingua predefinita
- `getTranslatableLocales()` - Ritorna array lingue supportate


### `laravel-13-upgrade.md` — Upgrade Laravel 13 - Lang 🐄✨


# Upgrade Laravel 13 - Lang 🐄✨

## 🎯 Visione Architetturale
L'upgrade a Laravel 13 per il modulo **Lang** non è un mero aggiornamento tecnico, ma un atto di purificazione zen. Seguendo i dettami della **Super Mucca**, ogni riga di codice è stata meditata per raggiungere la massima indipendenza.

## 🧘 Principi Applicati
1.  **Isolamento (SOLID)**: Il modulo dichiara ora esplicitamente le proprie dipendenze, riducendo l'accoppiamento con il core.
2.  **Semplicità (KISS)**: Rimossi i wrapper obsoleti e le dipendenze ridondanti.
3.  **Memoria (Documentation)**: Questo documento funge da memoria persistente dell'evoluzione del modulo.

## 🛠️ Modifiche Eseguite
- [x] **PHP ^8.4**: Allineamento ai requisiti di Laravel 13.
- [x] **composer.json**: Aggiornato con `laravel/framework: ^13.0` e `nwid

### `lessons-learned/helper-text-empty-when-redundant.md` — `helper_text` vuoto quando coincide con la chiave del campo


# `helper_text` vuoto quando coincide con la chiave del campo

## L'errore che si è ripetuto (su scala)

In 410 file `lang/it/*.php` di 18 moduli diversi, questo pattern:

```php
'dal' => [
    'label' => 'dal',
    'placeholder' => 'dal',
    'helper_text' => 'dal',   // ← identico alla chiave 'dal'
    'description' => 'dal',
],
```

2805 occorrenze totali corrette.

## Perché è sbagliato


### `lessons-learned/php-array-one-key-per-line.md` — Array lang: una chiave per riga


# Array lang: una chiave per riga

## Errore

File `lang/**/*.php` con nested inline:

```php
'navigation' => ['label' => 'Dipendenti', 'icon' => 'heroicon-o-user'],
```

## Causa

`SaveTransAction` → `SavePhpArrayAction` usava `VarExporter::export()`, che compatta.

## Fix

Exporter custom in `Modules\Xot\Actions\Arr\SavePhpArrayAction`.  
Tool: `bashscripts/tools/expand-lang-arrays-one-key-per-line.php`.  
Always-on: `.cursor/rules/php-array-one-key-per-line.mdc`.  

### `lessons-learned/widget-namespaces-error.md` — Lesson Learned: Errore Namespace Widget di Autenticazione

# Lesson Learned: Errore Namespace Widget di Autenticazione

## ❌ **Errore Commesso**

Durante l'implementazione del `PasswordResetWidget`, ho usato erroneamente:
```php
protected static string $view = 'user::filament.widgets.auth.password-reset';
```

Invece del corretto:
```php
protected static string $view = 'pub_theme::filament.widgets.auth.password.reset';
```

**Nota**: La convenzione corretta usa la struttura gerarchica con punti (`.`) invece di trattini (`-`) per i namespace delle view.

## 🧠 **Analisi dell'Errore**

### Cause dell'Errore
1. **Automatismo**: Ho applicato automaticamente la logica "modulo = namespace modulo"

### `links01.md` — Extra risorse da _docs

https://github.com/JoggApp/laravel-google-translate

https://github.com/tanmuhittin/laravel-google-translate

//--------------
https://github.com/Stichoza/google-translate-php   1700 stars
https://medium.com/@mwaqasiu/translating-text-in-laravel-made-easy-with-translatetexthelper-and-google-translate-library-214c7c76d655#id_token=eyJhbGciOiJSUzI1NiIsImtpZCI6IjZjZTExYWVjZjllYjE0MDI0YTQ0YmJmZDFiY2Y4YjMyYTEyMjg3ZmEiLCJ0eXAiOiJKV1QifQ.eyJpc3MiOiJodHRwczovL2FjY291bnRzLmdvb2dsZS5jb20iLCJhenAiOiIyMTYyOTYwMzU4MzQtazFrNnFlMDYwczJ0cDJhMmphbTRsamRjbXMwMHN0dGcuYXBwcy5nb29nbGV1c2VyY29udGVudC5jb20iLCJhdWQiOiIyMTYyOTYwMzU4MzQtazFrNnFlMDYwczJ0cDJhMmphbTRsamRjbXMwMHN0dGcuYXBwcy5nb29nbGV1c2VyY29udGVudC5jb20iLCJzdWIiOiIxMTU5MDIwMjQzMjQ3MDkwMzIyMDkiLCJlbWFpbCI6Im1hcmNvLnNvdHRhbmFAZ21haWwuY29tIiwiZW1haWxfdmVya

### `livewire-integration.md` — Integrazione di mcamara/laravel-localization con Livewire

# Integrazione di mcamara/laravel-localization con Livewire

## Indice
1. [Introduzione](#introduzione)
2. [Configurazione Iniziale](#configurazione-iniziale)
   - [Installazione di Livewire](#installazione-di-livewire)
   - [Configurazione di Laravel-Localization](#configurazione-di-laravel-localization)
3. [Middleware per Livewire](#middleware-per-livewire)
4. [Componenti Livewire Localizzati](#componenti-livewire-localizzati)
5. [Gestione dei Form](#gestione-dei-form)
6. [Testing](#testing)
7. [Best Practice](#best-practice)
8. [Risoluzione Problemi](#risoluzione-problemi)

## Introduzione

L'integrazione tra `mcamara/laravel-localization` e Livewire richiede un'attenzione particolare alla gestione dello stato dell'applicazione e al ciclo di vita dei componenti. Questa guida ti mostrerà

### `locale-management.md` — Gestione delle Lingue in Laravel

# Gestione delle Lingue in Laravel

## Indice
1. [Configurazione Base](#configurazione-base)
2. [Gestione delle Lingue](#gestione-delle-lingue)
3. [Middleware per la Lingua](#middleware-per-la-lingua)
4. [Best Practice](#best-practice)
5. [Implementazione nel Progetto](#implementazione-nel-progetto)
6. [Risoluzione Problemi](#risoluzione-problemi)

## Configurazione Base

### File di Configurazione Principale

`config/app.php`:
```php
'locale' => 'it',  // Lingua predefinita
'fallback_locale' => 'en',  // Lingua di fallback
'faker_locale' => 'it_IT',  // Impostazioni localizzazione per Faker
```

### `localizingates-and-currencies.md` — Localizzazione di Date e Valute

# Localizzazione di Date e Valute

## Introduzione

La localizzazione di date e valute è un aspetto cruciale per un'applicazione multilingue come `ptvx`. Tradurre manualmente mesi, giorni e simboli di valuta per ogni lingua sarebbe un lavoro enorme. Fortunatamente, Laravel e PHP offrono strumenti potenti come Carbon per le date e `NumberFormatter` per le valute, che gestiscono automaticamente la formattazione in base alla lingua. Questa documentazione, basata sul corso di Laravel Daily, esplora come implementare queste funzionalità nel progetto `ptvx`.

## Localizzazione di Date con Carbon

Carbon, la libreria di gestione delle date integrata in Laravel, rende la localizzazione delle date estremamente semplice. È sufficiente impostare il locale di Carbon in base alla lingua corrente dell'a

### `localizingates-currencies.md` — Localizzazione di Date e Valute

# Localizzazione di Date e Valute

## Introduzione

La localizzazione di date e valute è un aspetto cruciale per un'applicazione multilingue come `<nome progetto>`. Questa documentazione, basata sul corso di Laravel Daily, esplora come utilizzare Carbon per localizzare date e differenze temporali, e la classe `NumberFormatter` di PHP per formattare valute in base alla lingua corrente dell'utente.

## Localizzazione di Date con Carbon

Carbon, la libreria di gestione delle date integrata in Laravel, rende semplice la localizzazione delle date. È sufficiente impostare il locale di Carbon in base alla lingua corrente dell'applicazione.

**Configurazione in `AppServiceProvider`**:
```php
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
   

### `manuale-uso-attori.md` — Scopo


# Scopo

Lang gestisce le lingue dell'interfaccia e le traduzioni nel backoffice. Il
selettore di lingua è invece una capacità front office disponibile anche senza
ruolo.

## Attori e capacità effettive

| Attore | Dominio | Capacità verificata |
| --- | --- | --- |
| Ospite | Cittadino/front office | Visualizza le lingue supportate e passa all'URL localizzato tramite il selettore. |
| Autenticato | Cittadino/front office | Come l'ospite; non è dichiarata una capacità linguistica aggiuntiva. |
| Gruppo/ruolo con permessi | Backoffice | Opera su traduzioni, file di traduzione e post con i permessi espliciti `translation.*`, `translation_file.*`, `post.*`. |
| `lang::admin` | Backoffice | Bypass delle policy dei modelli Lang. |
| `super-admin` | Backoffice | Bypass delle policy Lang e acces

### `manuals/manuale-utente.md` — Scopo


> Screenshot reale del front office FixCity, verificato il 23 novembre 2026. Per questo modulo è una superficie condivisa: il manuale non attribuisce al modulo una UI propria se non documentata dalle fonti.

![Screenshot reale del front office](assets/front-office-home.png)

# Scopo

Lang gestisce le lingue dell'interfaccia e le traduzioni nel backoffice. Il
selettore di lingua è invece una capacità front office disponibile anche senza
ruolo.

## Attori e capacità effettive

| Attore | Dominio | Capacità verificata |
| --- | --- | --- |
| Ospite | Cittadino/front office | Visualizza le lingue supportate e passa all'URL localizzato tramite il selettore. |
| Autenticato | Cittadino/front office | Come l'ospite; non è dichiarata una capacità linguistica aggiuntiva. |
| Gruppo/ruolo con perme

### `manuals/user-manual.md` — Manuale utente Lang


# Manuale utente Lang

Integra il [manuale actor-oriented](../manuale-uso-attori.md). Lang governa lingue e traduzioni.

## Attori e uso

| Attore | Uso verificato |
|---|---|
| Utente normale/gruppo | Seleziona e usa le lingue disponibili. |
| Traduttore/admin | Modifica cataloghi e contenuti autorizzati. |
| Super-admin | Governa configurazione e permessi globali. |

Le chiavi di traduzione devono avere una sorgente owner e un fallback.

## Evidenza visuale reale

![Superficie reale di integrazione localizzata](../../screenshots/event-detail-page.png)

Screenshot reale presente nella documentazione del modulo.

### `mcaa-implementation.md` — Guida all'Implementazione di mcamara/laravel-localization

# Guida all'Implementazione di mcamara/laravel-localization

## Indice
1. [Panoramica](#panoramica)
2. [Installazione](#installazione)
3. [Configurazione](#configurazione)
4. [Gestione delle Route](#gestione-delle-route)
5. [Interruttore di Lingua](#interruttore-di-lingua)
6. [Traduzione delle Route](#traduzione-delle-route)
7. [Gestione della Cache](#gestione-della-cache)
8. [Risoluzione dei Problemi](#risoluzione-dei-problemi)
9. [Best Practice](#best-practice)

## Panoramica

Il pacchetto `mcamara/laravel-localization` fornisce un sistema completo per la gestione della localizzazione in Laravel, con particolare attenzione alla traduzione delle route e alla gestione delle lingue.

## Installazione

1. Installa il pacchetto tramite Composer:

### `mcamara-laravel-localization-deep-dive.md` — mcamara/laravel-localization Deep Dive (<nome progetto>)

# mcamara/laravel-localization Deep Dive (<nome progetto>)

## Obiettivo

Allineare la nostra integrazione locale alle raccomandazioni del package ufficiale.

## Stato progetto

- Middleware alias registrati in `bootstrap/app.php`.
- Config pubblicata in `config/laravellocalization.php`.
- Default attuale:
  - `useAcceptLanguageHeader=true`
  - `hideDefaultLocaleInURL=false`
  - `httpMethodsIgnored=['POST','PUT','PATCH','DELETE']`

## Punti critici da presidiare

1. Form in pagine localizzate:
   - usare URL action localizzati per evitare redirect non desiderati.
2. Route translatable:

### `mcamara-laravel-localization-governance.md` — mcamara/laravel-localization Governance

# mcamara/laravel-localization Governance

## Fonte primaria studiata

- repository: `mcamara/laravel-localization`
- configurazione locale del progetto: `laravel/config/laravellocalization.php`
- bootstrap middleware aliases: `laravel/bootstrap/app.php`

## Regole che derivano dal pacchetto

### 1. Le route pubbliche devono vivere nel gruppo localizzato

Pattern canonico:

```php
'prefix' => LaravelLocalization::setLocale()
```

con i middleware del pacchetto:


### `mcp-configuration.md` — MCP Server Configuration - Lang Module

# MCP Server Configuration - Lang Module


**Status**: ✅ Configured
**MCP Servers**: Asana, ClickUp, Filesystem, Database, Redmine (Planned)

---

## 📋 Overview

The Lang module's MCP configuration enables AI assistants to interact with:
- **Asana Work Graph** - Task and project management
- **ClickUp Workspace** - Advanced task workflows and time tracking
- **Redmine** - Project management (planned, requires self-hosted instance)
- **Filesystem** - Direct file access
- **Database** - SQLite queries for data inspection

---

## 🔧 Configuration

### `mcp-server-recommended.md` — MCP Server Consigliati per il Modulo Lang

# MCP Server Consigliati per il Modulo Lang

## Scopo del Modulo
Gestione traduzioni, localizzazione e internazionalizzazione.

## Server MCP Consigliati
- `filesystem`: Per gestione file di traduzione e risorse linguistiche.
- `memory`: Per caching temporaneo delle traduzioni.

## Configurazione Minima Esempio
```json
{
  "mcpServers": {
    "filesystem": { "command": "npx", "args": ["-y", "@modelcontextprotocol/server-filesystem"] },
    "memory": { "command": "npx", "args": ["-y", "@modelcontextprotocol/server-memory"] }
  }
}
```

## Note

### `metodiuplicati-analisi.md` — 🐄⚡ ANALISI METODI DUPLICATI - SUPER MUCCA EDITION

# 🐄⚡ ANALISI METODI DUPLICATI - SUPER MUCCA EDITION

**Powered by**: Super Mucca AI 🐄✨
**Versione**: 2.0 ULTIMATE
**Confidenza**: 99.9% (Dati Reali dal Codice)

---

## 🎯 Executive Summary

Analisi **REALE e APPROFONDITA** di **18 moduli** + **2 temi** del framework Laraxot/Filament.

### Dati Chiave (VERIFICATI)

| Metrica | Valore | Fonte |
|---------|--------|-------|
| **Moduli Analizzati** | 18 | Directory scan |
| **Temi Analizzati** | 2 (Sixteen, TwentyOne) | Directory scan |
| **BaseModel Totali** | 10 | File count |
| **LOC BaseModel** | 578 linee | wc -l |

### `migration-best-practices.md` — Best Practices per le Migrazioni - Modulo Lang

# Best Practices per le Migrazioni - Modulo Lang

## Panoramica

Questo documento descrive le best practices specifiche per le migrazioni del modulo Lang, che gestisce il sistema di traduzioni multilanguage del progetto.

## Struttura Standard delle Migrazioni

### Template Base

Tutte le migrazioni del modulo Lang devono seguire questo template:

```php
<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Lang\Models\Translation;
use Modules\Xot\Database\Migrations\XotBaseMigration;

### `migration-corrections.md` — Correzioni Migrazione - Modulo Lang

# Correzioni Migrazione - Modulo Lang

## Problema Identificato

La migrazione `2025_03_20_000001_create_language_lines_table.php` non seguiva gli standard del progetto.

## Errori Originali

### ❌ Mancanza delle Proprietà Obbligatorie

```php
return new class extends XotBaseMigration {
    protected ?string $model_class = Translation::class;
    // Mancavano: $table e $connection
```

### ❌ Struttura Non Standard

- Mancava la documentazione completa
- Mancavano le verifiche di esistenza colonne

### `migration-filament.md` — migration-filament



### `migration-patterns.md` — Migration Patterns for Lang Module

# Migration Patterns for Lang Module

## Overview

This document outlines the correct migration patterns to follow when creating database migrations for the Lang module and all other modules in the modulo operativo project.

## Critical Rule: Use XotBaseMigration

**ALL module migrations MUST extend `XotBaseMigration` instead of the standard Laravel `Migration` class.**

### Correct Pattern

```php
<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Lang\Models\Translation;
use Modules\Xot\Database\Migrations\XotBaseMigration;

### `migrations.md` — Migrations: Lang Module


# Migrations: Lang Module

Questo documento descrive le migrazioni nel modulo Lang e il loro contratto con
`XotBaseMigration`.

## Philosophy

Nel modulo Lang, ogni modello database-backed ha esattamente una migrazione corrispondente:

| Model | Migration | Status |
|-------|-----------|--------|
| `LanguageLine` | `2024_03_20_000001_create_language_lines_table.php` | ✅ DB-backed |
| `Post` | `2026_01_21_211814_create_posts_table.php` + update UUID | ✅ DB-backed |
| `Translation` | `2026_01_21_211815_create_translations_table.php` + update UUID | ✅ DB-backed |
| `Post` | `2026_01_21_211814_create_posts_table.php` + `2026_11_05_100000_create_posts_table.php` | ✅ DB-backed |
| `Translation` | `2026_01_21_211815_create_translations_table.php` + `2026_11_05_100001_create_translations_table.ph

### `migrazione-filament.md` — migrazione-filament



### `model-factory-seeder-audit.md` — Model/Factory/Seeder Audit

# Model/Factory/Seeder Audit

Generated: 2025-08-22 16:29
Generated: 2025-08-22 16:29
Generated: [DATE] 16:29

## Coverage
| Model | Factory | Seeded |
|---|---|---|
| Translation | yes | no |
| TranslationFile | yes | no |
| Post | yes | no |
| LinkedTrait | n/a | n/a |
| HasStrictTranslations | n/a | n/a |
| HasTranslationsContract | n/a | n/a |

Seeder: `database/seeders/LangDatabaseSeeder.php`

## Missing / Actions
- Add exemplar seeding for `Translation`/`TranslationFile`/`Post` if needed for demos/tests.

### `model-factory-seeder.md` — Model/Factory/Seeder Audit

# Model/Factory/Seeder Audit

Generated: [DATE] 16:29

## Coverage
| Model | Factory | Seeded |
|---|---|---|
| Translation | yes | no |
| TranslationFile | yes | no |
| Post | yes | no |
| LinkedTrait | n/a | n/a |
| HasStrictTranslations | n/a | n/a |
| HasTranslationsContract | n/a | n/a |

Seeder: `database/seeders/LangDatabaseSeeder.php`

## Missing / Actions
- Add exemplar seeding for `Translation`/`TranslationFile`/`Post` if needed for demos/tests.
- Traits/contracts are infra; exclude from factories/seeders.


### `models-factory-seeder-analysis.md` — Analisi Modelli, Factory e Seeder - Modulo Lang

# Analisi Modelli, Factory e Seeder - Modulo Lang

## Riepilogo Modelli

### Modelli Presenti
1. **Post** - Post multilingua
2. **Translation** - Traduzioni
3. **TranslationFile** - File di traduzione

### Factory Presenti
- ✅ **PostFactory** - Presente
- ✅ **TranslationFactory** - Presente
- ✅ **TranslationFileFactory** - Presente

### Seeder Presenti
- ✅ **LangDatabaseSeeder** - Seeder principale del modulo

## Stato di Completezza

| Modello | Factory | Utilizzo Business Logic |

### `models-factory-seeder.md` — Analisi Modelli, Factory e Seeder - Modulo Lang

# Analisi Modelli, Factory e Seeder - Modulo Lang

## Riepilogo Modelli

### Modelli Presenti
1. **Post** - Post multilingua
2. **Translation** - Traduzioni
3. **TranslationFile** - File di traduzione

### Factory Presenti
- ✅ **PostFactory** - Presente
- ✅ **TranslationFactory** - Presente
- ✅ **TranslationFileFactory** - Presente

### Seeder Presenti
- ✅ **LangDatabaseSeeder** - Seeder principale del modulo

## Stato di Completezza

| Modello | Factory | Utilizzo Business Logic |

### `module-analysis.md` — Lang Module - Comprehensive Analysis

# Lang Module - Comprehensive Analysis

## Module Overview
**Module Name**: Lang  
**Type**: Localization & Translation Module  
**Status**: ✅ Active  
**Framework**: Laravel 13.x + Filament 4.x  
**Translation System**: Laravel Localization + Advanced Features  
**Language**: Multi-language (IT/EN/DE + 7 more)  

## Purpose
The Lang module provides comprehensive localization and translation management:

- Multi-language content management
- Translation file management and editing
- Real-time translation updates
- Language fallback and negotiation
- Translation management interface
- Automatic translation tools integration
- Content localization for different regions

### `module-lang.md` — Modulo Lang

# Modulo Lang

## Informazioni Generali
- **Nome**: `laraxot/module_lang_fila5`
- **Descrizione**: Modulo per la gestione delle traduzioni e localizzazione
- **Namespace**: `Modules\Lang`
- **Repository**: https://github.com/laraxot/module_lang_fila5.git
- **Nome**: `laraxot/module_lang_fila3`
- **Descrizione**: Modulo per la gestione delle traduzioni e localizzazione
- **Namespace**: `Modules\Lang`
- **Repository**: https://github.com/laraxot/module_lang_fila3.git

### Versione HEAD

## Collegamenti ai Moduli

### Moduli con Traduzioni
- [Modulo Patient](../../Patient/docs/translations.md) - Traduzioni per il modulo paziente
- [Modulo UI](../../UI/docs/translations.md) - Traduzioni per i componenti UI
- [Modulo Cms](../../Cms/docs/translations.md) - Traduzioni per il CMS

### `module.md` — Lang Module - Comprehensive Analysis

# Lang Module - Comprehensive Analysis

## Module Overview
**Module Name**: Lang  
**Type**: Localization & Translation Module  
**Status**: ✅ Active  
**Framework**: Laravel 13.x + Filament 4.x  
**Translation System**: Laravel Localization + Advanced Features  
**Language**: Multi-language (IT/EN/DE + 7 more)  

## Purpose
The Lang module provides comprehensive localization and translation management:

- Multi-language content management
- Translation file management and editing
- Real-time translation updates
- Language fallback and negotiation
- Translation management interface
- Automatic translation tools integration
- Content localization for different regions

### `modules-link.md` — Collegamenti ai Moduli che utilizzano le Traduzioni

# Collegamenti ai Moduli che utilizzano le Traduzioni

Questa pagina elenca, per ogni modulo, la presenza di un file di collegamento alle traduzioni centralizzate.

## Moduli con collegamento

- [Activity](../../Activity/project_docs/lang-link.md)
- [Chart](../../Chart/project_docs/lang-link.md)
- [Cms](../../Cms/project_docs/lang-link.md)
- [Dental](../../Dental/project_docs/lang-link.md)
- [Gdpr](../../Gdpr/project_docs/lang-link.md)
- [Job](../../Job/project_docs/lang-link.md)
- [Media](../../Media/project_docs/lang-link.md)
- [Notify](../../Notify/project_docs/lang-link.md)
- [Patient](../../Patient/project_docs/lang-link.md)
- [Reporting](../../Reporting/project_docs/lang-link.md)
- [Tenant](../../Tenant/project_docs/lang-link.md)
- [UI](../../UI/project_docs/lang-link.md)
- [User](..

### `multi-org-sync-laraxot-provtv.md` — Sincronizzazione multi-organizzazione (laraxot + provtv)


# Sincronizzazione multi-organizzazione (laraxot + provtv)

## Cosa è stato fatto

Questo repository è tracciato da due remote GitHub (`laraxot` = org upstream canonica,
`provtv` = org operativa del progetto ptvx). Il 2026-07-21 è stata eseguita una
sincronizzazione completa seguendo `bashscripts/tools/prompts/02-gitmodules-sync.md`:
fetch di tutti i remote, quality gates (PHPStan L10, PHPMD), risincronizzazione dopo ogni modifica.

## Problemi riscontrati e risolti

- **Clone shallow**: il repo era stato clonato con storia troncata, causando push
  respinti (`did not receive expected object`). Fix: `git fetch --unshallow` su tutti i remote.
- **Storie scollegate ("unrelated histories")**: alcuni repo avevano un branch `dev`
  remoto rigenerato senza antenato comune con la storia locale. 

### `navigation-translation-standard.md` — Standard per le traduzioni di navigazione Filament


# Standard per le traduzioni di navigazione Filament

## Regola

In `lang/it/*.php`, la sezione `navigation` contiene valori runtime, non chiavi
di traduzione. `label` e `group` devono essere testi italiani leggibili; `icon`
deve essere un nome Heroicon valido, ad esempio `heroicon-o-cog-6-tooth`.

La stringa `{file}.navigation` può rimanere soltanto in un campo `key` usato
dal catalogo delle traduzioni. Non deve comparire nei valori visualizzati.

## Checklist

- mantenere invariata la struttura delle chiavi;
- tradurre `label`, `group`, `name` e `plural` quando sono mostrati all'utente;
- usare icone semantiche, senza testo o chiavi nel campo `icon`;
- preservare `sort` e gli altri metadati non interessati;
- controllare la sintassi con `php -l` e cercare nuovamente i placeholder.


### `navigation-translationses.md` — Correzioni Traduzioni Navigation - Modulo Lang

# Correzioni Traduzioni Navigation - Modulo Lang

## Data Intervento
**[DATE]** - Sistemazione traduzioni secondo regole DRY + KISS

## Analisi File

### File: `lang/en/edit_translation_file.php`
**Status**: Verificato e conforme agli standard

## Verifica Audit Iniziale vs Stato Attuale

### Occorrenze Identificiate nell'Audit
L'audit iniziale aveva identificato 43 occorrenze problematiche nel file `edit_translation_file.php`, tuttavia la verifica diretta ha mostrato che:

1. **File già conforme**: Il contenuto attuale non presenta chiavi hardcoded con ".navigation"
2. **Struttura corretta**: Le traduzioni seguono già la struttura espansa appropriata
3. **Localizzazione appropriata**: Tutte le chiavi sono tradotte correttamente

### Esempio Struttura Corretta Trovata

### `nestedset-migration-best-practices.md` — NestedSet Migration Best Practices - Lang Module

# NestedSet Migration Best Practices - Lang Module

## Overview

Questo documento descrive le best practices per implementare migrazioni con strutture ad albero (nested sets) nel modulo Lang utilizzando il pacchetto `kalnoy/laravel-nestedset`.

## Pattern per Categorie Linguistiche

```php
<?php

use Illuminate\Database\Schema\Blueprint;
use Kalnoy\Nestedset\NestedSet;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration
{
    protected ?string $model_class = \Modules\Lang\Models\LanguageCategory::class;

    public function up(): void

### `no-git-lfs.md` — Git LFS non si usa in questo progetto


# Git LFS non si usa in questo progetto

Vale per il repo root, per `bashscripts/` e per ogni modulo e tema. Questo modulo non fa
eccezione.

## La regola

I binari — immagini, font, PDF, archivi — si versionano come **blob git normali**.

Vietato:

- aggiungere `filter=lfs diff=lfs merge=lfs` in un qualunque `.gitattributes`;
- eseguire `git lfs install` o `git lfs track` dentro questo repo;
- committare come contenuto di un file il testo `version https://git-lfs.github.com/spec/v1`.

## Perche'

Non e' una preferenza di stile, e' il risultato di incidenti ripetuti.


### `no-phpstan-probe-policy.md` — No PHPStan probe files in Lang


# No PHPStan probe files in Lang

## Regola

Nel modulo `Lang` non devono esistere:

- directory `app/Phpstan`
- file che finiscono per `PhpstanProbeModel.php`
- file che finiscono per `PhpstanTraitProbe.php` o nomi simili (probe fittizi)

## Applicazione pratica

Il trait `Modules\Lang\Models\Traits\HasStrictTranslations` è condiviso e può non avere consumer diretti nel modulo. Invece di creare un modello probe, si usa `@phpstan-ignore trait.unused` nel docblock del trait.

Il ragionamento completo (logica/politica/filosofia/religione/zen di questo divieto) è
in `Modules/Xot/docs/wiki/concepts/phpstan-trait-probes.md`.

## Riferimento


### `obbligatorio-audit-report.md` — Audit "Obbligatorio" in Non-Italian Translation Files

# Audit "Obbligatorio" in Non-Italian Translation Files

**Data**: 2025-08-08 12:29:30
**Data**: 2025-08-08 12:29:30
**Scope**: Identificazione della parola "obbligatorio" e varianti in file di traduzione non italiani

## ✅ Risultato Audit

**Nessuna occorrenza di "obbligatorio" trovata nei file di traduzione non italiani!**

Tutti i file di traduzione sono conformi e non contengono la parola "obbligatorio" in italiano.

## Riepilogo

- **File con problemi**: 0
- **Problemi totali**: 0

## Traduzioni Standard

| Italiano | English | German | Spanish | French |

### `obbligatorio.md` — Audit "Obbligatorio" in Non-Italian Translation Files

# Audit "Obbligatorio" in Non-Italian Translation Files

**Scope**: Identificazione della parola "obbligatorio" e varianti in file di traduzione non italiani

## ✅ Risultato Audit

**Nessuna occorrenza di "obbligatorio" trovata nei file di traduzione non italiani!**

Tutti i file di traduzione sono conformi e non contengono la parola "obbligatorio" in italiano.

## Riepilogo

- **File con problemi**: 0
- **Problemi totali**: 0

## Traduzioni Standard

| Italiano | English | German | Spanish | French |
|----------|---------|--------|---------|--------|
| obbligatorio | required | erforderlich | obligatorio | obligatoire |

### `optimization.md` — Analisi di Ottimizzazione - Modulo Lang

# Analisi di Ottimizzazione - Modulo Lang

## 🎯 Principi Applicati: DRY + KISS + SOLID + ROBUST + Laraxot

### 📊 Stato Attuale
- **Multi-language support** per internazionalizzazione
- **Translation management** con file strutturati
- **Locale detection** automatico
- **Fallback system** per traduzioni mancanti

## 🚨 Problemi Identificati

### 1. **Translation Management**
- **Struttura non espansa** in alcuni file
- **Chiavi duplicate** tra moduli
- **Fallback inconsistente** per lingue mancanti

### 2. **Performance**
- **Translation caching** non ottimizzato
- **Lazy loading** non implementato

### `ottimizzazioni-approfondite-modulo-lang.md` — Ottimizzazioni Approfondite Modulo Lang - DRY + KISS

# Ottimizzazioni Approfondite Modulo Lang - DRY + KISS

## Panoramica
Questo documento identifica e propone ottimizzazioni approfondite per il modulo Lang seguendo i principi DRY (Don't Repeat Yourself) e KISS (Keep It Simple, Stupid). Include ottimizzazioni sia per la documentazione che per il codice.

## 🚨 Problemi Critici Identificati

### 1. Cartelle con Naming Inconsistente
**Problema:** Cartelle con maiuscole che violano convenzioni
**Impatto:** MEDIO - Inconsistenza con standard progetto

**Cartelle problematiche:**
- `Console/` (dovrebbe essere `console/`)
- `View/` (dovrebbe essere `view/`)
- `Database/` (dovrebbe essere `database/`)
- `_docs/` (dovrebbe essere `docs/` o eliminata)

**Soluzione DRY + KISS:**
1. **Rinominare** tutte le cartelle in minuscolo
2. **Eliminare** cartell

### `ottimizzazioni-correzioni.md` — ottimizzazioni-correzioni



### `ottimizzazioni-lang.md` — Ottimizzazioni Modulo Lang

# Ottimizzazioni Modulo Lang

## Principi DRY + KISS Applicati

### Analisi Situazione Attuale

Il modulo Lang presenta un approccio **monolitico** con violazione dei principi KISS:

#### Situazione Attuale:
- **README.md**: 918 righe in singolo file
- **Monolithic structure**: Tutto concentrato in un documento
- **Information overload**: Troppo contenuto senza separazione logica
- **Poor navigation**: Difficile trovare informazioni specifiche

#### Violazioni KISS Identificate:
- **Single Responsibility Violation**: Un file fa tutto
- **Cognitive overload**: 918 righe difficili da digerire
- **Poor discoverability**: Informazioni specifiche sepolte nel testo
- **Maintenance complexity**: Aggiornamenti richiedono editing di file enorme


### `ottimizzazioni-super-dry-kiss.md` — Ottimizzazioni Super DRY + KISS - Modulo Lang

# Ottimizzazioni Super DRY + KISS - Modulo Lang

## 🎯 Panoramica
Documento completo di ottimizzazioni per il modulo Lang seguendo i principi **SUPER DRY** (Don't Repeat Yourself) e **KISS** (Keep It Simple, Stupid). Include ottimizzazioni per documentazione, codice, struttura e configurazione.

## 🚨 Problemi Critici Identificati

### 1. **Cartelle con Naming Inconsistente (ALTO IMPATTO)**
**Problema:** Cartelle con maiuscole che violano convenzioni progetto
**Impatto:** ALTO - Inconsistenza con standard e confusione sviluppatori

**Cartelle problematiche:**
- `View/` (dovrebbe essere `view/`)
- `Datas/` (dovrebbe essere `datas/`)
- `Models/` (dovrebbe essere `models/`)
- `Providers/` (dovrebbe essere `providers/`)
- `Actions/` (dovrebbe essere `actions/`)
- `Casts/` (dovrebbe essere `casts

### `ottimizzazioni-superry-kiss.md` — Ottimizzazioni Super DRY + KISS - Modulo Lang

# Ottimizzazioni Super DRY + KISS - Modulo Lang

## 🎯 Panoramica
Documento completo di ottimizzazioni per il modulo Lang seguendo i principi **SUPER DRY** (Don't Repeat Yourself) e **KISS** (Keep It Simple, Stupid). Include ottimizzazioni per documentazione, codice, struttura e configurazione.

## 🚨 Problemi Critici Identificati

### 1. **Cartelle con Naming Inconsistente (ALTO IMPATTO)**
**Problema:** Cartelle con maiuscole che violano convenzioni progetto
**Impatto:** ALTO - Inconsistenza con standard e confusione sviluppatori

**Cartelle problematiche:**
- `View/` (dovrebbe essere `view/`)
- `Datas/` (dovrebbe essere `datas/`)
- `Models/` (dovrebbe essere `models/`)
- `Providers/` (dovrebbe essere `providers/`)
- `Actions/` (dovrebbe essere `actions/`)
- `Casts/` (dovrebbe essere `casts

### `package-dependency-chaos-map.md` — Package Dependency Chaos Map (Lang)

# Package Dependency Chaos Map (Lang)

## Catalogo completo
- [Composer Packages Full Catalog (2026-03-02)](../../Xot/docs/composer-packages-full-catalog-2026-03-02.md)

## Pacchetti studiati rilevanti
- `mcamara/laravel-localization`
- `spatie/laravel-translatable`
- `lara-zeus/spatie-translatable`
- `laravel/framework`

## Rischi principali
1. Namespace traduzioni errato (`pub_theme::` vs namespace modulo).
2. Strutture traduzione flattenate o incomplete.
3. Fallback locale non coerente su frontoffice.

## Test operativo minimo
```bash
php artisan test --filter=Lang --compact
./vendor/bin/phpstan analyze Modules/Lang --level=10

### `packages/localization.md` — Localizzazione

# Localizzazione

## Pacchetti Utilizzati

### Core
- [mcamara/laravel-localization](https://github.com/mcamara/laravel-localization)
  - Gestione lingue e traduzioni
  - Routing multilingua
  - Middleware per lingua

## Implementazione

### Configurazione
```php
// config/laravellocalization.php
return [
    'supportedLocales' => [
        'it' => ['name' => 'Italian', 'script' => 'Latn', 'native' => 'Italiano'],
        'en' => ['name' => 'English', 'script' => 'Latn', 'native' => 'English'],
    ],

### `packages/performance.md` — Performance

# Performance

## Pacchetti Utilizzati

### Cache
- [spatie/laravel-translation-loader](https://github.com/spatie/laravel-translation-loader)
  - Cache traduzioni
  - Ottimizzazione query
  - Gestione memoria

### Response Cache
- [spatie/laravel-responsecache](https://github.com/spatie/laravel-responsecache)
  - Cache risposte per lingua
  - Gestione cache utente
  - Invalido cache automatico

## Implementazione

### Cache Traduzioni
```php

### `packages/seo.md` — SEO Multilingua

# SEO Multilingua

## Pacchetti Utilizzati

### Core
- [spatie/laravel-translatable](https://github.com/spatie/laravel-translatable)
  - SEO multilingua
  - Meta tags tradotti
  - URL friendly

### Sitemap
- [spatie/laravel-sitemap](https://github.com/spatie/laravel-sitemap)
  - Sitemap multilingua
  - Hreflang tags
  - Priorità per lingua

## Implementazione

### Meta Tags
```php

### `packages/translations.md` — Traduzioni

# Traduzioni

## Pacchetti Utilizzati

### Core
- [spatie/laravel-translatable](https://github.com/spatie/laravel-translatable)
  - Gestione modelli tradotti
  - Supporto multilingua
  - Query builder

## Implementazione

### Modello Tradotto
```php
use Spatie\Translatable\HasTranslations;

class Post extends Model
{
    use HasTranslations;


### `packages.md` — Pacchetti del Modulo Lang

# Pacchetti del Modulo Lang

## Pacchetti Utilizzati

### Core
- [laraxot/module_xot_fila3](../Xot/docs/packages.md) - Modulo base per funzionalità comuni
- [laraxot/module_ui](../UI/docs/packages.md) - Componenti UI e temi
- [laraxot/module_tenant_fila3](../Tenant/docs/packages.md) - Gestione multi-tenant
- [laraxot/module_xot_fila5](../Xot/docs/packages.md) - Modulo base per funzionalità comuni
- [laraxot/module_ui](../UI/docs/packages.md) - Componenti UI e temi
- [laraxot/module_tenant_fila3](../Tenant/docs/packages.md) - Gestione multi-tenant
- [laraxot/module_xot_fila5](../Xot/docs/packages.md) - Modulo base per funzionalità comuni
- [laraxot/module_ui](../UI/docs/packages.md) - Componenti UI e temi
- [laraxot/module_tenant_fila5](../Tenant/docs/packages.md) - Gestione multi-tenant

#

### `pdf-translation-guide.md` — PDF Translation Guide - HTML2PDF Integration

# PDF Translation Guide - HTML2PDF Integration

## 📋 Overview

Guida completa per generare documenti PDF multilingua utilizzando HTML2PDF con il sistema di traduzione del modulo Lang.

---

## 🎯 Funzionalità PDF Multilingua

### 1. Traduzione Automatica Template

Generazione PDF con traduzione automatica basata sulla lingua corrente:

```php
use Modules\Lang\Services\PdfTranslationService;

// Generate PDF with current locale
$pdf = app(PdfTranslationService::class)->generatePdf([
    'template' => 'invoice',

### `pdf-translation.md` — PDF Translation Guide - HTML2PDF Integration

# PDF Translation Guide - HTML2PDF Integration

## 📋 Overview

Guida completa per generare documenti PDF multilingua utilizzando HTML2PDF con il sistema di traduzione del modulo Lang.

---

## 🎯 Funzionalità PDF Multilingua

### 1. Traduzione Automatica Template

Generazione PDF con traduzione automatica basata sulla lingua corrente:

```php
use Modules\Lang\Services\PdfTranslationService;

// Generate PDF with current locale
$pdf = app(PdfTranslationService::class)->generatePdf([
    'template' => 'invoice',

### `performance/bottlenecks.md` — Lang Module Performance Bottlenecks

# Lang Module Performance Bottlenecks

## Translation Management

### 1. AutoLabelAction
File: `app/Actions/Filament/AutoLabelAction.php`

**Bottlenecks:**
- Generazione ripetitiva di chiavi di traduzione
- Lookup inefficiente nei file di traduzione
- Cache non utilizzato per chiavi frequenti

**Soluzioni:**
```php
// 1. Cache per chiavi frequenti
public function execute($object_class) {
    $cacheKey = "translation_key_".md5($object_class);
    return Cache::tags(['translations'])
        ->remember($cacheKey, now()->addDay(),
            fn() => $this->generateTransKey($object_class)

### `performance/lang-optimizations.md` — Ottimizzazioni Performance Modulo Lang

# Ottimizzazioni Performance Modulo Lang

## 1. Ottimizzazione AutoLabelAction
**File**: `laravel/Modules/Lang/app/Actions/Filament/AutoLabelAction.php`
**Linee**: 32-95

**Problema**:
- Lookup ripetitivo del backtrace per ogni componente
- Chiamate multiple a GetTransKeyAction
- Nessun caching delle traduzioni

**Soluzione**:
```php
declare(strict_types=1);

namespace Modules\Lang\Actions\Filament;

use Filament\Actions\Action;
use Filament\Forms\Components\Field;
use Filament\Forms\Components\Wizard\Step;

### `permessi-e-errori-filesystem.md` — Gestione Permessi e Errori Filesystem su File di Lingua (Lang)

# Gestione Permessi e Errori Filesystem su File di Lingua (Lang)

> **Backlink:** [Indice e collegamenti root](../../../../docs/links.md)
> **Backlink:** [Indice e collegamenti root](../../../docs/links.md)
> **Backlink:** [Indice e collegamenti root](../../../docs/links.md)
> **Backlink:** [Indice e collegamenti root](../../../docs/links.md)

## Problema

Durante operazioni di scrittura su file come `lang_service.php` in `Modules/Lang/lang/it/`, può comparire l'errore:

```
file_put_contents(Modules/Lang/lang/it/lang_service.php): Failed to open stream: Permission denied
```

## Causa

- Il file o la cartella ha permessi o proprietà non compatibili con l'utente del webserver (`www-data` su sistemi Linux tipici).
- Spesso il file viene creato o modificato da un utente diverso (es. sviluppa

### `permessi-ei-filesystem.md` — Gestione Permessi e Errori Filesystem su File di Lingua (Lang)

# Gestione Permessi e Errori Filesystem su File di Lingua (Lang)

> **Backlink:** [Indice e collegamenti root](../../../../docs/links.md)

## Problema

Durante operazioni di scrittura su file come `lang_service.php` in `Modules/Lang/lang/it/`, può comparire l'errore:

```
file_put_contents(Modules/Lang/lang/it/lang_service.php): Failed to open stream: Permission denied
```

## Causa

- Il file o la cartella ha permessi o proprietà non compatibili con l'utente del webserver (`www-data` su sistemi Linux tipici).
- Spesso il file viene creato o modificato da un utente diverso (es. sviluppatore locale), causando mismatch di ownership.

## Soluzione definitiva

1. **Impostare la proprietà corretta:**

### `permessi-errori-filesystem.md` — Gestione Permessi e Errori Filesystem su File di Lingua (Lang)

# Gestione Permessi e Errori Filesystem su File di Lingua (Lang)

> **Backlink:** [Indice e collegamenti root](../../../../docs/project/links.md)
> **Backlink:** [Indice e collegamenti root](../../../project_docs/links.md)
> **Backlink:** [Indice e collegamenti root](../../../project_docs/links.md)
> **Backlink:** [Indice e collegamenti root](../../../project_docs/links.md)

## Problema

Durante operazioni di scrittura su file come `lang_service.php` in `Modules/Lang/lang/it/`, può comparire l'errore:

```
file_put_contents(Modules/Lang/lang/it/lang_service.php): Failed to open stream: Permission denied
```

## Causa

- Il file o la cartella ha permessi o proprietà non compatibili con l'utente del webserver (`www-data` su sistemi Linux tipici).
- Spesso il file viene creato o modificato da

### `permessi-lang.md` — Gestione Permessi e Proprietà per File di Lingua (`lang/it/`)

# Gestione Permessi e Proprietà per File di Lingua (`lang/it/`)

## Problema

Durante la scrittura di file di lingua tramite PHP (es. `file_put_contents(...)`), può comparire l’errore:

```
file_put_contents(Modules/Lang/lang/it/lang_service.php): Failed to open stream: Permission denied
```

## Causa

Il file o la cartella di destinazione non è scrivibile dall’utente che esegue PHP (tipicamente `www-data`). Spesso accade perché i file sono stati creati o modificati da un utente diverso (es. `msottana`) e hanno permessi troppo restrittivi.

## Soluzione Definitiva

1. **Uniformare la proprietà** di tutti i file e cartelle di `Modules/Lang/lang/it/` a `www-data:www-data`:
   ```bash
   sudo chown -R www-data:www-data Modules/Lang/lang/it/
   ```

### `permessii-filesystem.md` — Gestione Permessi e Errori Filesystem su File di Lingua (Lang)

# Gestione Permessi e Errori Filesystem su File di Lingua (Lang)

> **Backlink:** [Indice e collegamenti root](../../../../docs/project/links.md)

## Problema

Durante operazioni di scrittura su file come `lang_service.php` in `Modules/Lang/lang/it/`, può comparire l'errore:

```
file_put_contents(Modules/Lang/lang/it/lang_service.php): Failed to open stream: Permission denied
```

## Causa

- Il file o la cartella ha permessi o proprietà non compatibili con l'utente del webserver (`www-data` su sistemi Linux tipici).
- Spesso il file viene creato o modificato da un utente diverso (es. sviluppatore locale), causando mismatch di ownership.

## Soluzione definitiva

1. **Impostare la proprietà corretta:**

### `philosophy.md` — Lang Module: A Philosophy of Localization


# Lang Module: A Philosophy of Localization

> **The Essence**: Italiano in UI, English in code. Structured keys, zero hardcoded labels in Filament, unified translations across 20 modular subsystems.

---

## RELIGIONE (i18n Dogmas)

The Lang module enshrines five immutable principles:

### 1. The PHP File Hierarchy is Sacred

Translations live in **native PHP arrays**, not databases, not JSON. Why?

- **Immutability by revision control**: Changes to translations are Git-tracked, audited, versioned.
- **Structure scales**: Nested keys allow context: `patient.profile.name.label` is unambiguous across modules.
- **Performance**: No database round-trips. Artisan can validate file syntax before deploy.
- **Simplicity**: A translator receives `/lang/en/patient.php`, edits values, returns it. N

### `phpstan-fixes.md` — PHPStan Compliance Documentation


# PHPStan Compliance Documentation

## Overview

Documenta tutti i fix di compliance PHPStan implementati per raggiungere 0 errori a livello max.

## Errori Corretti

### 1. TranslationFileResource - Lang Module

**File**: `app/Filament/Resources/TranslationFileResource/Pages/EditTranslationFile.php`

**Errori Originali**:
- `parameter.type` su `$data['content']`
- `return.type` per `makeFromArray()`
- `identifier: missingType.iterableValue`

**Soluzioni Implementate**:
```php

### `plural-date-localization.md` — Gestione di Forme Plurali e Localizzazione di Date/Valute in Laravel

# Gestione di Forme Plurali e Localizzazione di Date/Valute in Laravel

## Indice
1. [Introduzione](#introduzione)
2. [Gestione delle Forme Plurali](#gestione-delle-forme-plurali)
   - [Utilizzo di trans_choice()](#utilizzo-di-trans_choice)
   - [Sintassi per i Plurali](#sintassi-per-i-plurali)
   - [Esempi Pratici](#esempi-pratici)
3. [Localizzazione di Date e Orari](#localizzazione-di-date-e-orari)
   - [Configurazione di Carbon](#configurazione-di-carbon)
   - [Formattazione delle Date](#formattazione-delle-date)
   - [Differenze tra Date](#differenze-tra-date)
4. [Localizzazione di Valute e Numeri](#localizzazione-di-valute-e-numeri)
   - [Utilizzo di NumberFormatter](#utilizzo-di-numberformatter)
   - [Helper Personalizzati](#helper-personalizzati)
5. [Implementazione nel Progetto](#i

### `pluralate-localization.md` — Gestione di Forme Plurali e Localizzazione di Date/Valute in Laravel

# Gestione di Forme Plurali e Localizzazione di Date/Valute in Laravel

## Indice
1. [Introduzione](#introduzione)
2. [Gestione delle Forme Plurali](#gestione-delle-forme-plurali)
   - [Utilizzo di trans_choice()](#utilizzo-di-trans_choice)
   - [Sintassi per i Plurali](#sintassi-per-i-plurali)
   - [Esempi Pratici](#esempi-pratici)
3. [Localizzazione di Date e Orari](#localizzazione-di-date-e-orari)
   - [Configurazione di Carbon](#configurazione-di-carbon)
   - [Formattazione delle Date](#formattazione-delle-date)
   - [Differenze tra Date](#differenze-tra-date)
4. [Localizzazione di Valute e Numeri](#localizzazione-di-valute-e-numeri)
   - [Utilizzo di NumberFormatter](#utilizzo-di-numberformatter)
   - [Helper Personalizzati](#helper-personalizzati)
5. [Implementazione nel Progetto](#i

### `ponytail-audit-over-engineering.md` — Ponytail audit — Lang (over-engineering)

# Ponytail audit — Lang (over-engineering)

**Ultimo run:** 2026-06-30  
**Hub:** [../../../../docs/audit/ponytail-audit.md](../../../../docs/audit/ponytail-audit.md)
**Remediation:** [../../../../docs/project/ponytail-audit-remediation.md](../../../../docs/project/ponytail-audit-remediation.md)
**GitHub monorepo:** [Issue #221](https://github.com/laraxot/base_ptvx_fila5/issues/221) · [Discussion #222](https://github.com/laraxot/base_ptvx_fila5/discussions/222) · [Discussion #228](https://github.com/laraxot/base_ptvx_fila5/discussions/228)

## Esito run 2026-06-30

Lean già sul perimetro codice principale. Nessun finding P0–P1 nel run repo-wide.

Eventuali voci storiche (ActivityLogger, contratti Geo) sono in [docs/audit/ponytail-audit.md](../../../../docs/audit/ponytail-audit.md).

## Col

### `product-requirements.md` — Product Requirements Document (PRD)

# Product Requirements Document (PRD)

## Metadata

| Campo | Valore |
|-------|--------|
| **Version** | 1.0.0 |
| **Status** | Approved |
| **
| **Owner** | Core Team |
| **Module** | Lang |
| **Repository** | laraxot/module_lang_fila5 |

---

## 1. Panoramica del Prodotto

### Descrizione Breve
Il modulo Lang gestisce **internazionalizzazione (i18n)** e **localizzazione (l10n)** per l'ecosistema Laraxot. Fornisce traduzioni database-driven, gestione lingue e localizzazione URL.


### `prompt-link.md` — Regola prompt condivisi

# Regola prompt condivisi

Per la regola universale sui prompt condivisi (bashscripts/prompts), vedi [Modules/Xot/docs/PROMPT_RULES.md](../../xot/docs/prompt_rules.md)
### Versione HEAD

### Versione Incoming

## Collegamenti tra versioni di PROMPT_RULES_LINK.md
* [PROMPT_RULES_LINK.md](../../../ui/docs/prompt_rules_link.md)
* [PROMPT_RULES_LINK.md](../../../lang/docs/prompt_rules_link.md)
* [PROMPT_RULES_LINK.md](../../../cms/docs/prompt_rules_link.md)

## Collegamenti tra versioni di prompt_rules_link.md
* [prompt_rules_link.md](../../ui/docs/prompt_rules_link.md)
* [prompt_rules_link.md](../../cms/docs/prompt_rules_link.md)

---

### `prompt-rules-link.md` — Regola prompt condivisi

# Regola prompt condivisi

Per la regola universale sui prompt condivisi (bashscripts/prompts), vedi [Modules/Xot/docs/PROMPT_RULES.md](../../Xot/docs/PROMPT_RULES.md)
Per la regola universale sui prompt condivisi (bashscripts/prompts), vedi [Modules/Xot/docs/PROMPT_RULES.md](../../Xot/docs/PROMPT_RULES.md)
Per la regola universale sui prompt condivisi (bashscripts/prompts), vedi [Modules/Xot/docs/PROMPT_RULES.md](../../Xot/docs/PROMPT_RULES.md)
### Versione HEAD

### Versione Incoming

## Collegamenti tra versioni di PROMPT_RULES_LINK.md
* [PROMPT_RULES_LINK.md](../../../UI/docs/PROMPT_RULES_LINK.md)
* [PROMPT_RULES_LINK.md](../../../Lang/docs/PROMPT_RULES_LINK.md)
* [PROMPT_RULES_LINK.md](../../../Cms/docs/PROMPT_RULES_LINK.md)

## Collegamenti tra versioni di prompt_rules_link.md
* [pro

### `prompts/01.md` — 01


stai facendo errori con le traduzioni percio' studia a fondo
https://spatie.be/docs/laravel-translatable/v6/introduction
https://github.com/spatie/laravel-translatable
https://github.com/lara-zeus/spatie-translatable
https://spatie.be/docs/laravel-translatable/v6/basic-usage/querying-translations
https://github.com/spatie/nova-translatable
https://github.com/mcamara/laravel-localization
e correggi tutti gli errori che trovi nel codice, non lasciare nulla di intentato !


i file di traduzione devono tutti avere la struttura
 'navigation' => [
        'label' => 'Missing Navigation Label',
        'plural_label' => 'Missing Navigation Plural Label',
        'group' => 'Missing Group',
        'icon' => 'heroicon-o-puzzle-piece',
        'sort' => 100,
    ],
    'label' => 'Missing Label',

### `prompts/push.md` — push


va nella cartella laravel/Modules/Lang e fa git push , capisci gli errori sistameli e documenta come hai risolto dentro laravel/Modules/Lang/docs ti ricordo che con git andiamo solo in avanti, percio' non puoi fare checkout revert rollback, ma puoi anzi devi studiare le vecchie versioni e ti ricordo che il tuo lavoro non e' finito finche' non supera anche il controllo di phpstan phpmd, phpinisghts tutta la cartella laravel/Modules/Lang


Obiettivo: sincronizzare il modulo Lang su tutti i remote GitHub configurati e documentare il percorso.

Contesto modulo:
- cartella: laravel/Modules/Lang;
- branch atteso: dev;

Procedura operativa:
1. Vai in laravel/Modules/Lang.
2. Esegui git remote -v e non assumere mai l'org.
3. Esegui git fetch --all --prune; se un remote fallisce, fetcha separatame

### `publish.yml.md` — publish.yml

name: Publish

on:
  push:
    branches:
      - master

permissions: 
  contents: write

jobs:
  build:

    runs-on: ubuntu-latest

    steps:
    - name: Checkout
      uses: actions/checkout@master

    - name: Validate composer.json and composer.lock

### `quality-audit.md` — Audit di qualita — modulo Lang


# Audit di qualita — modulo Lang

Misurato il 1 settembre 2026 a tree fermo. Ogni numero viene da un comando
eseguito, non da una stima; i comandi sono in fondo, cosi la misura si puo
rifare e contestare.

## Stato misurato

| Metrica | Valore |
|---|---:|
| File PHP | 213 |
| Righe di codice | 23475 |
| File di test `*Test.php` | 23 |
| Casi di test | 251 |
| Casi di test per file PHP | 1.18 |
| `@phpstan-ignore` nel codice | 0 |
| Rilievi PHPMD su `app/` | 60 |
| PHPInsights — Code | 94.1 % |
| PHPInsights — Complexity | 100.0 % |

### `quality-report.md` — Quality Report — Lang


# Quality Report — Lang

Aggiornato: 2026-08-24. Rigenera con: `bashscripts/tools/quality-report.sh Lang`

| Metrica | Valore |
|---|---|
| File PHP (app/) | 62 |
| LOC app/ | 4552 |
| File test | 25 |
| LOC test | 4700 |
| Test/App LOC ratio | 103.3% |
| PHPStan (level max) |  |

## Come misurare la coverage Pest

```bash
cd laravel
XDEBUG_MODE=coverage php -d memory_limit=2G ./vendor/bin/pest Modules/Lang/tests \
  --coverage-text --colors=never

### `quality.md` — Quality Analysis Report - Lang Module

# Quality Analysis Report - Lang Module
**Date**: [DATE]
**Analyst**: Claude Code
**Tools**: PHPStan Level 10, PHPInsights, PHPMD

---

## Executive Summary

The Lang module has been analyzed using three quality assurance tools:
- **PHPStan Level 10**: ✅ **PASS** (1 error fixed)
- **PHPInsights**: 79/100 Code quality
- **PHPMD**: Multiple design and complexity issues identified

## PHPStan Level 10 Analysis

### Status: ✅ PASSED

### Issues Fixed


### `queueable-actions.md` — Queueable Actions — Lang Module Doctrine


# Queueable Actions — Lang Module Doctrine

> The full doctrine lives in `Modules/Xot/docs/queueable-actions.md`.
> This module follows the same rules.

## Rules

1. Every class under `app/Actions/` is a [Spatie Laravel Queueable Action](https://github.com/spatie/laravel-queueable-action).
2. The only public entry point is `execute()`.
3. No repository pattern — no `*Repository` classes, no repository injection.
4. No inline `new ...Action` or `new ...Repository` in constructor default parameters.
5. Retire files by renaming with `.old` suffix; do not `rm` and do not create `archive/` directories.
6. YAGNI: reuse existing code, prefer stdlib/native Laravel, keep it minimal.

## Example

```php
<?php


### `redundancy-analysis.md` — redundancy-analysis

Redundancy analysis available: docs/analysis/redundancies/summary.md

### `redundancy-audit-21.md` — Lang redundancy audit 2026-05-21


# Lang redundancy audit 2026-05-21

Static metrics: 1816 files scanned, 25 case-only groups, 294 duplicate hash groups, 0 duplicate FQCN.

Findings:
- Heavy docs duplication: locale management, quick reference, translation strategies/process, implementation guide, and archive/historical copies.
- `docs/archive` and `docs/translations/archive` duplicate active translation docs.
- Migration directory case-only duplicate: `database/Migrations` vs `database/migrations`.
- Docs index variants include `index.md`/`index.md` and `00-INDEX.md`/`00-index.md`.

Risk:
- Lang is foundational; stale translation rules can propagate wrong patterns across modules.
- Migration case-only duplicate is high-risk for autoload/filesystem portability.

Suggested cleanup order:
1. Fix migration casing with a dedi

### `redundancy-audit.md` — Lang redundancy audit 2026-05-21


# Lang redundancy audit 2026-05-21

Static metrics: 1816 files scanned, 25 case-only groups, 294 duplicate hash groups, 0 duplicate FQCN.

Findings:
- Heavy docs duplication: locale management, quick reference, translation strategies/process, implementation guide, and archive/historical copies.
- `docs/archive` and `docs/translations/archive` duplicate active translation docs.
- Migration directory case-only duplicate: `database/Migrations` vs `database/migrations` — **risolto 2026-07-01**; vedi [wiki/concepts/migration-path-canonical.md](wiki/concepts/migration-path-canonical.md).
- Anti-pattern annidato `database/migrations/Migrations/` — reintrodotto per errore in `f840e0cc0`, rimosso; guard in `audit-database-folder-lowercase.sh`.
- Docs index variants include `index.md`/`index.md` an

### `redundancy-report.md` — Redundancy Report — Modulo Lang

- Inventario [ridondanze cross-modulo](../docs/redundancy-report.md)
- Concetti [ridondanze cross-cutting](../Xot/docs/wiki/concepts/ridondanze-cross-cutting-codebase.md)

# Redundancy Report — Modulo Lang

> Generato: 2026-05-21 | Analisi automatica deep-scan

## Problemi Trovati

### 1. 🟠 BaseMorphPivot NON estende XotBaseMorphPivot

**File**: `app/Models/BaseMorphPivot.php`

```php
// ATTUALE (NON conforme)
abstract class BaseMorphPivot extends MorphPivot
{
    use Updater;
}


### `resolution-permessi-lang-service.md` — Troubleshooting definitivo permessi file_put_contents su lang_service.php

# Troubleshooting definitivo permessi file_put_contents su lang_service.php

## Sintesi della soluzione robusta

1. **Ownership ricorsivo**
   - Tutti i file e le sottodirectory di `Modules/Lang/lang` devono essere di proprietà `www-data:www-data`.
   - Comando:
     ```bash
     sudo chown -R www-data:www-data Modules/Lang/lang
     ```
2. **Permessi sicuri e coerenti**
   - Tutte le directory: `ug+rwx,o+rx` (775)
   - Tutti i file: `ug+rw,o+r-w` (664)
   - Comando:
     ```bash
     sudo find Modules/Lang/lang -type d -exec chmod 775 {} +
     sudo find Modules/Lang/lang -type f -exec chmod 664 {} +
     ```
3. **Motivazione**
   - Garantisce che Apache/PHP (utente www-data) possa sempre leggere/scrivere file lingua.

### `riepilogo-correzioni-traduzioni.md` — Riepilogo Correzioni Traduzioni - Gennaio 2025

# Riepilogo Correzioni Traduzioni - Gennaio 2025

## Problemi Risolti

### 1. Errori di Sintassi nei File di Traduzione ✅ RISOLTI

**File corretti (11 totali):**
1. **Chart/lang/it/chart.php** - Grafici e visualizzazioni
2. **Chart/lang/it/mixed_chart.php** - Grafici misti (errore critico risolto)
3. **FormBuilder/lang/it/collection_lang.php** - Collezioni form builder
4. **FormBuilder/lang/it/field.php** - Campi form builder
5. **FormBuilder/lang/it/field_option.php** - Opzioni campi form builder
6. **Lang/lang/it/translation_file.php** - File di traduzione
7. **Notify/lang/it/send_whats_app.php** - Notifiche WhatsApp
8. **UI/lang/it/collection_lang.php** - Collezioni UI
9. **UI/lang/it/field.php** - Campi UI
10. **UI/lang/it/field_option.php** - Opzioni campi UI
11. **UI/lang/it/s3_test.

### `risoluzione-permessi-lang-service.md` — Troubleshooting definitivo permessi file_put_contents su lang_service.php

# Troubleshooting definitivo permessi file_put_contents su lang_service.php

## Sintesi della soluzione robusta

1. **Ownership ricorsivo**
   - Tutti i file e le sottodirectory di `Modules/Lang/lang` devono essere di proprietà `www-data:www-data`.
   - Comando:
     ```bash
     sudo chown -R www-data:www-data Modules/Lang/lang
     ```
2. **Permessi sicuri e coerenti**
   - Tutte le directory: `ug+rwx,o+rx` (775)
   - Tutti i file: `ug+rw,o+r-w` (664)
   - Comando:
     ```bash
     sudo find Modules/Lang/lang -type d -exec chmod 775 {} +
     sudo find Modules/Lang/lang -type f -exec chmod 664 {} +
     ```
3. **Motivazione**
   - Garantisce che Apache/PHP (utente www-data) possa sempre leggere/scrivere file lingua.

### `roadmap/05-risks.md` — Risks - Lang

# Risks - Lang

## Top Risks

1. Drift tra documentazione e comportamento runtime.
2. Regressioni introdotte da fix rapidi non verificati.
3. Dipendenze incrociate non documentate.

## Mitigations

1. Aggiornare docs insieme ai fix di codice.
2. Usare checklist pre-merge e post-fix.
3. Mantenere un set di file canonici per diagnosi rapida.

### `roadmap/current-state.md` — Current State - Lang

# Current State - Lang

## Baseline

- Stato attuale documentato nei file `docs/` del Modulo.
- Presenza di roadmap strutturata in sotto-file.
- Necessita verifica periodica di coerenza tra codice e documentazione.

## Immediate checks

1. Coerenza tra regole architetturali e implementazione runtime.
2. Coerenza tra naming, namespace e percorsi view/traduzioni.
3. Copertura test minima per i flussi critici.

### `roadmap/goals.md` — Goals - Lang

# Goals - Lang

## Short Term

1. Allineare documentazione e stato reale del codice.
2. Ridurre i punti di fragilita piu frequenti.
3. Consolidare checklist operative per incident response.

## Medium Term

1. Aumentare test di regressione sui flussi critici.
2. Migliorare osservabilita e diagnosi errori.
3. Ridurre duplicazioni tra documenti e tra componenti.

## Long Term

1. Stabilita sotto fault randomizzati (chaos testing).
2. Manutenibilita alta con onboarding rapido.

### `roadmap/later.md` — Later (Module Lang)

# Later (Module Lang)

## Longer-term ideas

### `roadmap/legacy-roadmap.md` — Lang Module Roadmap

# Lang Module Roadmap

Vedi [roadmap/00-index](roadmap/00-index.md).

### `roadmap/milestones.md` — Milestones - Lang

# Milestones - Lang

## M1 Documentation Baseline

- `roadmap.md` allineato e `docs/roadmap/` completo.
- Link relativi verificati.

## M2 Operational Readiness

- Checklist incident response disponibile.
- Procedure di recovery validate sui casi principali.

## M3 Regression Safety

- Test minimi sui flussi critici in esecuzione regolare.
- Riduzione regressioni ricorrenti.

### `roadmap/next.md` — Next (Module Lang)

# Next (Module Lang)

## Features

## Refactors

### `roadmap/now.md` — Now (Module Lang)

# Now (Module Lang)

## Stabilization

## Bugfixes

## Quality gates

### `roadmap/overview.md` — Roadmap overview (Module Lang)

# Roadmap overview (Module Lang)

## Scope

## Goals

## Non-goals

### `roadmap/phases.md` — Fasi di sviluppo - Lang Module

# Fasi di sviluppo - Lang Module

## Fase 1: Stabilità e Pulizia (In Corso)

- [x] PHPStan Level 10 Compliance
- [ ] Rimozione sistematica di file obsoleti e ridondanti
- [ ] Centralizzazione della gestione dei file di lingua dei moduli
- [ ] Automazione completa della pubblicazione delle traduzioni (`lang:publish`)

## Fase 2: Developer Experience (Pianificato)

- [ ] CLI interattiva per la gestione rapida delle chiavi di traduzione
- [ ] Sistema di warning durante la build per chiavi mancanti
- [ ] Integrazione con i Cluster di Filament per la gestione dei permessi lingua

## Fase 3: Ottimizzazione e AI (Futuro)

- [ ] AI-AutoTranslate: traduzione basata su contesto tramite LLM preservando le chiavi
- [ ] Translation Memory: database condiviso delle traduzioni approvate
- [ ] Supporto av

### `roadmap/quality.md` — Checklist qualità - Lang Module

# Checklist qualità - Lang Module

- [x] PHPStan Level 10
- [ ] Assenza di hardcoded strings nei layout Blade
- [ ] Test di risoluzione delle chiavi multilingue per ogni modulo
- [ ] Documentazione centralizzata in `docs/`

### `roadmap/risks.md` — Risks and dependencies (Module Lang)

# Risks and dependencies (Module Lang)

## Risks

## Dependencies

### `roadmap/vision.md` — Visione - Lang Module

# Visione - Lang Module

Trasformare la gestione linguistica in un servizio intelligente e universale:

- Traduzioni statiche e contenuti multilingue on-the-fly
- Generazione tramite AI mantenendo coerenza del brand

### `roadmap/workstreams.md` — Workstreams - Lang

# Workstreams - Lang

## WS1 Architecture

- Verifica confini e responsabilita dei componenti.
- Aggiornamento pattern e guardrail.

## WS2 Reliability

- Hardening dei flussi principali.
- Miglioramento fallback e recovery path.

## WS3 Documentation

- Consolidamento documenti canonici.
- Eliminazione drift documentale.

## WS4 Testing

- Test funzionali mirati sui percorsi ad alto rischio.

### `roadmap-miglioramenti.md` — Lang — cosa migliorerei se questo modulo fosse mio per un mese


# Lang — cosa migliorerei se questo modulo fosse mio per un mese

> I numeri misurati sono in [`docs/cosa-migliorare.md`](cosa-migliorare.md),
> rilevati da un'altra sessione il 2026-09-01: PHPStan 0, PHPMD `app/` **60**,
> Code 94.1 — **il più alto dei cinque moduli qui analizzati**, Arch 92.9,
> 251 casi test. Questo file non rimisura: legge quei numeri e ci mette
> sopra la lente.

62 file in `app/`, quattro dipendenze runtime (`mcamara/laravel-localization`,
`lara-zeus/spatie-translatable`, `rinvex/countries`,
`spatie/laravel-sluggable`), `require-dev` vuoto, un `phpstan.neon.dist` che
esiste ma — per definizione di `.dist` — non è quello effettivamente in uso
finché qualcuno non lo copia in `phpstan.neon`. Un `TODO`, un `dd()`, zero
`@phpstan-ignore`: profilo di debito basso, ma il v

### `roadmap.md` — Lang Module Roadmap

# Lang Module Roadmap

"Abbattiamo le barriere: la lingua come servizio universale."

## 🎯 Visione
Trasformare il modulo Lang in un sistema di gestione linguistica intelligente che non solo fornisce traduzioni statiche, ma è in grado di generare contenuti multilingue on-the-fly tramite AI, mantenendo la coerenza del brand.

## 🏗️ Fasi di Sviluppo

### Fase 1: Stability & Cleanup (In Progress)
- [x] PHPStan Level 10 Compliance.
- [ ] Rimozione definitiva dei 260+ file obsoleti di documentazione.
- [ ] Centralizzazione di tutti i file di lingua dei moduli in un unico spazio di gestione (DAB).
- [ ] Automazione completa del comando `lang:publish` per tutti i moduli.

### Fase 2: Developer Experience (Planned)
- [ ] Creazione di una CLI interattiva per aggiungere chiavi senza lasciare l'IDE.
-

### `rules-index.md` — Rules Index

# Rules Index

This module follows the global Laraxot coding standards.

- [Coding Standards](../../../../docs/laraxot-coding-standards.md)
- [Chaos Monkey Translation Fallbacks](./chaos-monkey-translation-fallbacks.md)
- [Package Dependency Chaos Map](./package-dependency-chaos-map.md)

### `rules-testing-no-migrate-fresh.md` — CRITICAL ARCHITECTURE RULE: NO MIGRATE:FRESH

# CRITICAL ARCHITECTURE RULE: NO MIGRATE:FRESH

## Rule
**NEVER** use `migrate:fresh` or the `RefreshDatabase` trait in any test or setup script within this modular architecture (Laraxot).

## Why?
1. **Destructive**: It destroys all tables across the default database connection.
2. **Tenant/Module Coupling**: In a modular application, tables are meant to be isolated. Wiping the entire database crashes other concurrently running tests or removes shared look-up tables that are not seeded correctly per-module.
3. **Data Loss**: Running tests with `RefreshDatabase` against a shared testing database will indiscriminately destroy other modules' data.

## Correct Approach
- Only use `DatabaseTransactions` to rollback state after tests.
- Maintain strict database boundaries.

### `schema.md` — Lang Module Schema


# Lang Module Schema

> **Purpose:** Defines folder rules, frontmatter standards, and workflows for AI agents.

## Module Identity

- **Name:** Lang
- **Type:** Laravel Module (Laraxot)
- **Location:** `laravel/Modules/Lang/`
- **Docs:** `laravel/Modules/Lang/docs/`

## Wiki Rules

### raw/ Rules
- ✅ Immutable — AI reads but never modifies or deletes
- ✅ Drop liberally — articles, code snippets, decisions
- ✅ Subdivide by type: `articles/`, `papers/`, `code-examples/`, `decisions/`

### wiki/ Rules

### `scopo.md` — Lang — scopo, confini e come servirlo meglio


# Lang — scopo, confini e come servirlo meglio

## Lo scopo, dedotto dal codice

Lang è il modulo più piccolo dei tre servizi trasversali — 62 file PHP, 4.545 righe in
`app/` — e ha l'effetto più esteso di tutti: governa **2.920 file `lang/*.php`**
distribuiti su tutti i moduli e i temi del repo
(`find Modules Themes -path '*/lang/*' -name '*.php' | wc -l`). Quarantasette righe di
codice per ogni file di traduzione che tiene in piedi.

Il meccanismo che gli dà quel potere sta in un solo metodo:
`LangServiceProvider::registerFilamentLabel()`. Al boot registra otto `configureUsing()`
sui tipi base di Filament — `Field`, `Select`, `Entry`, `Section`, `BaseFilter`,
`Column`, `Step`, `Action` — e per ognuno chiama `AutoLabelAction`, che deriva la chiave
di traduzione dal nome del componente e 

### `second-brain.md` — Second brain (modulo)


# Second brain (modulo)

Stub **puntatore**: disciplina e link esterni curati stanno nella wiki di progetto.

| Strato | Dove in questo package |
|--------|-------------------------|
| Input / note grezze | questa cartella `docs/` (escluso `docs/wiki/`) |
| Wiki compilata | `docs/wiki/` del modulo |
| Regole globali | wiki root del monorepo |

## Link operativi (relativi al repo)

- Modello: [../../../../bashscripts/ai/wiki/concepts/second-brain-llm-wiki.md#second-brain-operating-model](../../../../bashscripts/ai/wiki/concepts/second-brain-llm-wiki.md#second-brain-operating-model)
- Guida wiki modulo: [../../../../bashscripts/ai/wiki/how-to/wiki-qmd-search.md#module-wiki-documentation](../../../../bashscripts/ai/wiki/how-to/wiki-qmd-search.md#module-wiki-documentation)
- Benchmark lettura

### `stories/0003-larastan-isforwardedquerybuildermethod-bug-2.story.md` — BMAD Story - Larastan isForwardedQueryBuilderMethod Bug

# BMAD Story - Larastan isForwardedQueryBuilderMethod Bug

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `stories/0004-phpstan-cleanup-lang.story.md` — [STORY] PHPStan cleanup modulo Lang

# [STORY] PHPStan cleanup modulo Lang

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `stories/0006-retire-lang-http-switchers.story.md` — 12.1: Ritiro Lang HTTP Switcher/Change su widget cablato nel tema

# 12.1: Ritiro Lang HTTP Switcher/Change su widget cablato nel tema

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `stories/0010-phpstan-test-harness-contracts.story.md` — Story 7.2-LANG — Contratti PHPStan test harness

# Story 7.2-LANG — Contratti PHPStan test harness

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `stories/0011-phpstan-paramtype-coverage.story.md` — LANG-7.3 — Param type mancanti nel modulo Lang

# LANG-7.3 — Param type mancanti nel modulo Lang

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `stories/0012-phpstan-canonical-schemas-static-call-fix.story.md` — Story 7.4-LANG — Fix PHPStan method.staticCall dopo migrazione canonical Schemas

# Story 7.4-LANG — Fix PHPStan method.staticCall dopo migrazione canonical Schemas

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `stories/0018-phpstan-l10-test-types-fix.story.md` — PHPStan L10 Test Fixtures & Files Type Fixes

# PHPStan L10 Test Fixtures & Files Type Fixes

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `stories/0019-changelog-case-duplicate-and-merge-conflict.story.md` — Story: Lang — CHANGELOG.MD duplicato + conflitto di merge non risolto in CHANGELOG.md

# Story: Lang — CHANGELOG.MD duplicato + conflitto di merge non risolto in CHANGELOG.md

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `stories/0024-continuation-4.story.md` — Lang Module — Continuation Task

# Lang Module — Continuation Task

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `stories/0025-docs-index-audit.story.md` — Lang: audit e ricostruzione indice docs/index.md

# Lang: audit e ricostruzione indice docs/index.md

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `stories/0026-lang-autolabelaction-hardening.story.md` — Lang — AutoLabelAction hardening and type safety

# Lang — AutoLabelAction hardening and type safety

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `stories/0033-lang-mixed-type-reduction.story.md` — LANG — riduzione uso di `mixed`

# LANG — riduzione uso di `mixed`

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `stories/0034-lang-services-to-actions.story.md` — Lang — app/Services retired, no-services-rule compliance

# Lang — app/Services retired, no-services-rule compliance

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `stories/0035-lang-translation-loading-fix.story.md` — Lang — Fix array_replace_recursive TypeError in FileLoader

# Lang — Fix array_replace_recursive TypeError in FileLoader

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `stories/0037-placeholder-translations.story.md` — Niente traduzioni segnaposto, niente titoli di sezione doppi

# Niente traduzioni segnaposto, niente titoli di sezione doppi

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `stories/0038-services-to-actions-lang-2.story.md` — Services -> Actions nel modulo Lang

# Services -> Actions nel modulo Lang

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `stories/0039-xotbaseresourcetable-model-audit-batch-tenant-limesurvey-lang-ai.story.md` — XotBaseResourceTable model audit - Lang/TranslationFilesTable

# XotBaseResourceTable model audit - Lang/TranslationFilesTable

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `stories/06-phpstan-cleanup-lang.dev.md` — [DEV] PHPStan cleanup modulo Lang

# [DEV] PHPStan cleanup modulo Lang

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `stories/phpstan-cleanup-lang.dev.md` — [DEV] PHPStan cleanup modulo Lang

# [DEV] PHPStan cleanup modulo Lang

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.


### `strategy.md` — Product Strategy: Lang Module

# Product Strategy: Lang Module

## 🌍 Market Context
Public Administration tools must be accessible and localized to the highest standard.

## 💎 Unique Value Proposition
"Lang" doesn't just store translations; it provides the intelligent infrastructure to discover them across the entire modular filesystem.

## 🏛️ Strategic Pillars
1. **Agnostic Localization:** Language logic is completely separated from domain logic.
2. **Developer Experience:** Zero-config translation discovery.
3. **Strict Consistency:** Enforced English/Italian parity.

## 🗺️ Strategic Roadmap (1-2 Years)
Integration with external Translation Management Systems (TMS) like Crowdin or Lokalise.

### `struttura-traduzioni.md` — Struttura corretta per i file di traduzione nel modulo Lang

# Struttura corretta per i file di traduzione nel modulo Lang

## Percorsi standard per i file di traduzione

I file di traduzione nel modulo Lang devono seguire una struttura precisa dei percorsi per evitare duplicazioni e conflitti:

```
/Modules/Lang/lang/{locale}/{file}.php
```

### Percorsi corretti
- ✅ `/Modules/Lang/lang/it/lang_service.php`
- ✅ `/Modules/Lang/lang/en/lang_service.php`

### Percorsi errati da evitare
- ❌ `/Modules/Lang/lang/lang/it/lang_service.php` (doppia cartella `lang`)
- ❌ `/Modules/Lang/resources/lang/it/lang_service.php` (percorso obsoleto)

## Anti-pattern comuni da evitare


### `struttura-translations.md` — Struttura corretta per i file di traduzione nel modulo Lang

# Struttura corretta per i file di traduzione nel modulo Lang

## Percorsi standard per i file di traduzione

I file di traduzione nel modulo Lang devono seguire una struttura precisa dei percorsi per evitare duplicazioni e conflitti:

```
/Modules/Lang/lang/{locale}/{file}.php
```

### Percorsi corretti
- ✅ `/Modules/Lang/lang/it/lang_service.php`
- ✅ `/Modules/Lang/lang/en/lang_service.php`

### Percorsi errati da evitare
- ❌ `/Modules/Lang/lang/lang/it/lang_service.php` (doppia cartella `lang`)
- ❌ `/Modules/Lang/resources/lang/it/lang_service.php` (percorso obsoleto)

## Anti-pattern comuni da evitare


### `task-aumentare-copertura-test.md` — Task: Aumentare Copertura Test - Lang

# Task: Aumentare Copertura Test - Lang

**Modulo**: Lang
**Priorita'**: Alta
**Completamento**: 15%

---

## Descrizione

Solo 6 file test per 53 file PHP. Le Actions principali necessitano test.

## Test da Implementare

- [ ] ReadTranslationFileAction: lettura file PHP/JSON
- [ ] WriteTranslationFileAction: scrittura file traduzione
- [ ] SyncTranslationsAction: sincronizzazione traduzioni
- [ ] Switcher component: cambio lingua e persistenza

## Criteri di Completamento

### `task-consolidare-documentazione.md` — Task: Consolidare Documentazione - Lang

# Task: Consolidare Documentazione - Lang

**Modulo**: Lang
**Priorita'**: Bassa
**Completamento**: 20%

---

## Criteri di Completamento

- [ ] Rimossi duplicati da 273 docs
- [ ] Naming conventions rispettate
- [ ] README.md aggiornato

### `task-ridurre-phpstan-suppressioni.md` — Task: Ridurre Suppressioni PHPStan Inline - Lang

# Task: Ridurre Suppressioni PHPStan Inline - Lang

**Modulo**: Lang
**Priorita'**: Alta
**Completamento**: 0%

---

## File Coinvolti (7 suppressioni)

| File | Suppressioni | Tipo |
|------|-------------|------|
| `app/Actions/ReadTranslationFileAction.php` | 3 | array return type |
| `app/Actions/WriteTranslationFileAction.php` | 1 | mixed type |
| `app/Actions/SyncTranslationsAction.php` | 1 | mixed type |
| `app/Providers/LangServiceProvider.php` | 1 | config type |
| `app/Http/Livewire/Lang/Switcher.php` | 1 | locale type |

## Criteri di Completamento


### `tech-spec.md` — Technical Specification - Lang Module

# Technical Specification - Lang Module

## Overview
Detailed technical implementation for the Lang module, covering models, actions, Filament resources, and integration touchpoints.

## Models

### Core Models
### `BaseModelLang`$
### `LanguageLine`$
### `Translation`$

Each model extends `XotBaseModel` and follows Laraxot conventions:
- UUID primary key
- Timestamps (created_at, updated_at)
- Soft deletes where applicable
- Cast attributes for JSON fields

## Actions


### `templates/translation-template.md` — Template Traduzione

# Template Traduzione

## Metadati
```yaml
---
title: "Titolo della Pagina"
module: "Nome Modulo"
category: "Categoria"
language: "it|en"
version: "1.0.0"
last_updated: "YYYY-MM-DD"
---
```

## Struttura
1. **Introduzione**
   - Descrizione generale
   - Scopo del documento
   - Prerequisiti


### `test.md` — Collegamenti tra versioni di test.md

fff

## Collegamenti tra versioni di test.md
* [test.md](../../../Xot/docs/modules/test.md)
* [test.md](../../../Lang/docs/test.md)
* [test.md](../../../xot/docs/modules/test.md)
* [test.md](../../../lang/docs/test.md)

### `testing-guidelines.md` — Lang Module - Testing Guidelines

# Lang Module - Testing Guidelines

## Testing Framework Requirements

### Environment Configuration
All tests MUST use `.env.testing` configuration:
```env
APP_ENV=testing
DB_CONNECTION=sqlite
DB_DATABASE=<nome progetto>_data_test
APP_LOCALE=en
APP_FALLBACK_LOCALE=en
```

### Pest Framework Usage
All tests MUST be written in Pest format. Convert any PHPUnit tests to Pest syntax.

## Business Logic Test Coverage

### 1. Translation Management Tests

### `testing-rules.md` — Testing Rules Summary

# Testing Rules Summary

## Regole Fondamentali dei Test

### 1. **Pest Testing Mandatory**
- **MAI** usare PHPUnit class-based (`class Test extends TestCase`)
- **SEMPRE** usare Pest functional syntax (`test()`, `it()`)
- I test devono essere scritti in formato Pest, non PHPUnit

### 2. **NO RefreshDatabase - MAI**
- **MAI** usare `use RefreshDatabase` nei test
- **MAI** usare `RefreshDatabase` trait
- Utilizzare `.env.testing` con SQLite in-memory
- Usare `DatabaseTransactions` se necessario (raro)

### 3. **Configurazione Testing**
- Tutti i test devono leggere `.env.testing`
- PHPStan usa configurazione da `phpstan.neon` (non passare livello come parametro)
- Script di conversione vanno in `bashscripts/`, non nella root di Laravel


### `testing-serviceprovider-fix.md` — Testing ServiceProvider Fix - Lang Module

# Testing ServiceProvider Fix - Lang Module

## Problem

The `LangServiceProviderTest.php` file attempts to test the ServiceProvider in isolation without a full Laravel Application, causing failures like:

```
Call to undefined method Illuminate\Container\Container::basePath()
Call to undefined method Illuminate\Container\Container::register()
```

## Root Cause

The test does:

```php
beforeEach(function () {
    $this->provider = new LangServiceProvider(app());
});
```

### `testing-serviceprovider.md` — Testing ServiceProvider Fix - Lang Module

# Testing ServiceProvider Fix - Lang Module

## Problem

The `LangServiceProviderTest.php` file attempts to test the ServiceProvider in isolation without a full Laravel Application, causing failures like:

```
Call to undefined method Illuminate\Container\Container::basePath()
Call to undefined method Illuminate\Container\Container::register()
```

## Root Cause

The test does:

```php
beforeEach(function () {
    $this->provider = new LangServiceProvider(app());
});
```

### `testing.md` — Testing Rules Summary

# Testing Rules Summary

## Regole Fondamentali dei Test

### 1. **Pest Testing Mandatory**
- **MAI** usare PHPUnit class-based (`class Test extends TestCase`)
- **SEMPRE** usare Pest functional syntax (`test()`, `it()`)
- I test devono essere scritti in formato Pest, non PHPUnit

### 2. **NO RefreshDatabase - MAI**
- **MAI** usare `use RefreshDatabase` nei test
- **MAI** usare `RefreshDatabase` trait
- Utilizzare `.env.testing` con SQLite in-memory
- Usare `DatabaseTransactions` se necessario (raro)

### 3. **Configurazione Testing**
- Tutti i test devono leggere `.env.testing`
- PHPStan usa configurazione da `phpstan.neon` (non passare livello come parametro)
- Script di conversione vanno in `bashscripts/`, non nella root di Laravel


### `testinglines.md` — Lang Module - Testing Guidelines

# Lang Module - Testing Guidelines

## Testing Framework Requirements

### Environment Configuration
All tests MUST use `.env.testing` configuration:
```env
APP_ENV=testing
DB_CONNECTION=sqlite
DB_DATABASE=<nome progetto>_data_test
APP_LOCALE=en
APP_FALLBACK_LOCALE=en
```

### Pest Framework Usage
All tests MUST be written in Pest format. Convert any PHPUnit tests to Pest syntax.

## Business Logic Test Coverage

### 1. Translation Management Tests

### `traduzioni-navigation.md` — Traduzioni con ".navigation" - Audit Completo 2025

# Traduzioni con ".navigation" - Audit Completo 2025

## Riepilogo Problema
Molte traduzioni utilizzano ancora il pattern `.navigation` invece di traduzioni appropriate. Questo causa problemi di coerenza e manutenibilità.

## File Identificati con Problemi

### 1. Modules/User/lang/it/permission.php ✅ CORRETTO
**Stato**: File già corretto - non contiene traduzioni `.navigation`

### 2. Modules/Lang/lang/en/edit_translation_file.php ✅ CORRETTO
**Problema**: Multiple traduzioni con pattern `.navigation`
**Soluzione**: Sostituite tutte le traduzioni `.navigation` con traduzioni appropriate in inglese

**Traduzioni corrette implementate**:
- `content.navigation.name` → `Navigation Name`
- `content.navigation.plural` → `Navigation Plural`
- `content.navigation.group.name` → `Group Name`
- `cont

### `traduzioni.md` — Traduzioni nel Progetto

# Traduzioni nel Progetto

## Regole Fondamentali

### Regola #1: MAI utilizzare ->label() o metodi simili

❌ **NON FARE MAI**:
```php
TextInput::make('nome')
    ->label('Nome Utente')
    ->placeholder('Inserisci il nome')
    ->helperText('Il nome completo dell\'utente');
```

✅ **FARE SEMPRE**:
```php
TextInput::make('nome')  // Le traduzioni vengono gestite automaticamente dal LangServiceProvider
```

**Motivazione**:

### `translatable/best-practices.md` — Best Practices per Laravel Translatable

# Best Practices per Laravel Translatable

Questo documento raccoglie le migliori pratiche per l'utilizzo del pacchetto `spatie/laravel-translatable` nel contesto del progetto.

## Dichiarazione delle Proprietà Traducibili

### ✅ Approccio Raccomandato

```php
class Page extends Model
{
    use HasTranslations;

    /**
     * Gli attributi che sono traducibili.
     *
     * @var array<int, string>
     */
    protected function translatable(): array
    {

### `translatable/gestione-traduzioni-mancanti.md` — Gestione delle Traduzioni Mancanti con Spatie Laravel Translatable

# Gestione delle Traduzioni Mancanti con Spatie Laravel Translatable

Questo documento descrive come gestire i casi in cui un modello non ha una traduzione richiesta utilizzando il pacchetto `spatie/laravel-translatable`.

## Configurazione del Fallback

Il pacchetto permette di configurare diversi comportamenti in caso di traduzioni mancanti. Per configurare questi comportamenti, è necessario utilizzare la facciata `Spatie\Translatable\Facades\Translatable` in un service provider.

### Service Provider per la Configurazione

Tipicamente, questa configurazione viene inserita in un service provider dedicato:

```php
<?php

namespace Modules\Lang\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Translatable\Facades\Translatable;
use Illuminate\Support\Facades\Log;

### `translatable/implementazione-nel-progetto.md` — Implementazione di Spatie Laravel Translatable nel Progetto

# Implementazione di Spatie Laravel Translatable nel Progetto

Questo documento descrive come è implementato e configurato il pacchetto `spatie/laravel-translatable` nel nostro progetto, con particolare attenzione all'integrazione con i moduli esistenti e il plugin Filament.

## Integrazione con Filament

### Plugin Filament Spatie Translatable

Il progetto utilizza il plugin ufficiale `filament/spatie-laravel-translatable-plugin` per l'integrazione con Filament:

```php
// Modules/<nome progetto>/app/Providers/Filament/AdminPanelProvider.php
use Filament\SpatieLaravelTranslatablePlugin;

public function panel(Panel $panel): Panel
{
    $panel = parent::panel($panel);

    $spatieLaravelTranslatablePlugin = SpatieLaravelTranslatablePlugin::make()
        ->defaultLocales([config('app.local

### `translatable/json-content-translation.md` — Gestione Traduzioni Contenuti JSON

# Gestione Traduzioni Contenuti JSON

Questo documento descrive come gestire le traduzioni per i contenuti JSON nel progetto healthcare_app, con particolare attenzione ai file di contenuto delle pagine.

## Struttura dei Contenuti Traducibili

### File di Contenuto delle Pagine

I contenuti delle pagine sono memorizzati in file JSON nella directory:
```
config/local/healthcare_app/database/content/pages/
```

### Struttura Standard

Ogni file JSON può contenere sezioni traducibili seguendo questo pattern:

```json
{
    "id": "8",

### `translation-audit-completion.md` — Audit Traduzioni Completato - 2025

# Audit Traduzioni Completato - 2025

## Riepilogo Lavoro Effettuato

### Problema Identificato
Durante l'audit delle traduzioni del progetto <nome progetto>, sono state identificate numerose traduzioni italiane presenti in file di lingua tedesca e inglese, causando incoerenza nell'interfaccia utente.

### Pattern di Errore
- **Errore**: `'required' => 'Campo obbligatorio'` in file `lang/de/` e `lang/en/`
- **Impatto**: Interfaccia utente non localizzata correttamente
- **Estensione**: 10 moduli principali affetti

## Correzioni Effettuate

### Moduli Corretti

#### ✅ Modulo Lang
- **File**: `lang/de/lang_service.php`
- **Correzione**: `'required' => 'Das Feld :attribute ist erforderlich'`


### `translation-completeness-audit.md` — Translation Completeness Audit

# Translation Completeness Audit

## Overview
This document tracks the completeness and quality of translation files across the <nome progetto> system, ensuring all user-facing text is properly localized in Italian, English, and German.

## Recent Updates

### 2025-01-06: Complete PDF Template Internationalization
### 2025-01-06: Complete PDF Template Internationalization
### [DATE]: Complete PDF Template Internationalization
### [DATE]: Complete PDF Template Internationalization
### [DATE]: Complete PDF Template Internationalization
### [DATE]: Complete PDF Template Internationalization
### 2025-01-06: Complete PDF Template Internationalization
### 2025-01-06: Complete PDF Template Internationalization

**Issue**: PDF template `Themes/One/resources/views/appointment/report_pdf.blade.php` 

### `translation-completion.md` — Audit Traduzioni Completato - 2025

# Audit Traduzioni Completato - 2025

## Riepilogo Lavoro Effettuato

### Problema Identificato
Durante l'audit delle traduzioni del progetto <nome progetto>, sono state identificate numerose traduzioni italiane presenti in file di lingua tedesca e inglese, causando incoerenza nell'interfaccia utente.

### Pattern di Errore
- **Errore**: `'required' => 'Campo obbligatorio'` in file `lang/de/` e `lang/en/`
- **Impatto**: Interfaccia utente non localizzata correttamente
- **Estensione**: 10 moduli principali affetti

## Correzioni Effettuate

### Moduli Corretti

#### ✅ Modulo Lang
- **File**: `lang/de/lang_service.php`
- **Correzione**: `'required' => 'Das Feld :attribute ist erforderlich'`


### `translation-fields-mandatory-rule.md` — Regola Critica: Sezione "fields" Obbligatoria nelle Traduzioni

# Regola Critica: Sezione "fields" Obbligatoria nelle Traduzioni

**Data**: 2026-01-09  
**Data**: 2026-01-09  
**Data**: 2026-01-09  
**Data**: 2026-01-09  
**Modulo**: Lang  
**Status**: 🔴 **REGOLA CRITICA DOCUMENTATA**

---

## 🔴 Regola Assoluta

**MAI rimuovere o omettere la sezione `fields` dai file di traduzione.**

### Perché è Critico

La sezione `fields` è **FONDAMENTALE** perché:

1. **Filament usa `fields` per le etichette dei campi** nei form e nelle tabelle

### `translation-fixes-summary.md` — Riepilogo Correzioni Traduzioni - Gennaio 2025

# Riepilogo Correzioni Traduzioni - Gennaio 2025

## Problemi Risolti

### 1. Errori di Sintassi nei File di Traduzione ✅ RISOLTI

**File corretti (11 totali):**
1. **Chart/lang/it/chart.php** - Grafici e visualizzazioni
2. **Chart/lang/it/mixed_chart.php** - Grafici misti (errore critico risolto)
3. **FormBuilder/lang/it/collection_lang.php** - Collezioni form builder
4. **FormBuilder/lang/it/field.php** - Campi form builder
5. **FormBuilder/lang/it/field_option.php** - Opzioni campi form builder
6. **Lang/lang/it/translation_file.php** - File di traduzione
7. **Notify/lang/it/send_whats_app.php** - Notifiche WhatsApp
8. **UI/lang/it/collection_lang.php** - Collezioni UI
9. **UI/lang/it/field.php** - Campi UI
10. **UI/lang/it/field_option.php** - Opzioni campi UI
11. **UI/lang/it/s3_test.

### `translation-helper-text-standards.md` — Standard per helper_text nelle Traduzioni <nome progetto>

# Standard per helper_text nelle Traduzioni <nome progetto>

## Regola Critica: Gestione helper_text

### Principio Fondamentale
Quando `helper_text` è uguale alla chiave dell'array, **DEVE** essere impostato a stringa vuota (`''`).

### Motivazione
- **Evitare duplicazione**: Non mostrare lo stesso testo due volte
- **Coerenza UX**: Mantenere interfacce pulite e professionali
- **Best Practice**: Seguire standard di design moderni
- **Localizzazione**: Evitare valori non tradotti nelle interfacce utente

## Pattern di Implementazione

### ✅ CORRETTO
```php
'address' => [
    'label' => 'Indirizzo',
    'placeholder' => 'Inserisci il tuo indirizzo',

### `translation-management-packages.md` — Translation Management Packages

# Translation Management Packages

## Overview
Managing translations effectively is vital for a healthcare application like `<nome progetto>` to ensure accurate communication with users across different languages. This document explores various Laravel packages for translation management, helping choose the right tools for our needs.

## Evaluated Packages

### 1. Spatie Laravel Translation Loader
- **Purpose**: Allows storing translations in a database instead of language files.
- **Key Features**:
  - Database-driven translations
  - Fallback to language files if database entry doesn't exist
  - Custom driver support (e.g., CSV)
- **Use Case**: Ideal for building custom translation editor UI for administrative users.
- **Implementation**:
  ```bash
  composer require spatie/laravel-trans

### `translation-management.md` — Gestione Traduzioni - Regole Critiche

# Gestione Traduzioni - Regole Critiche

## ⚠️ REGOLA CRITICA: MAI USARE ->label() ⚠️

**MAI, MAI, MAI** usare `->label()` nei componenti Filament. Le traduzioni sono gestite automaticamente dal LangServiceProvider.

### ❌ ERRATO - MAI FARE QUESTO
```php
TextInput::make('name')->label('Nome')  // ❌ ERRORE CRITICO
Select::make('status')->label('Stato')  // ❌ ERRORE CRITICO
Action::make('save')->label('Salva')    // ❌ ERRORE CRITICO
```

### ✅ CORRETTO - SEMPRE FARE QUESTO
```php
TextInput::make('name')  // ✅ CORRETTO - Traduzione automatica
Select::make('status')   // ✅ CORRETTO - Traduzione automatica
Action::make('save')     // ✅ CORRETTO - Traduzione automatica
```


### `translation-modal-heading-standards.md` — Standard per Modal Heading e Description nelle Traduzioni <nome progetto>

# Standard per Modal Heading e Description nelle Traduzioni <nome progetto>

## Regola: Stringhe Dirette per Modal Properties

### Principio Fondamentale
Le proprietà `modal_heading` e `modal_description` devono essere **stringhe dirette**, non array con chiave `label`.

### Motivazione
- **Coerenza con Filament**: Filament si aspetta stringhe dirette per queste proprietà
- **Semplicità**: Evita nesting inutile di array
- **Performance**: Accesso diretto senza lookup di chiavi
- **Leggibilità**: Codice più pulito e intuitivo

## Pattern di Implementazione

### ✅ CORRETTO - Stringhe Dirette
```php
'actions' => [
    'edit' => [
        'label' => 'Modifica',

### `translation-notify-conversion.md` — Standardizzazione Traduzioni Modulo Notify

# Standardizzazione Traduzioni Modulo Notify

## Panoramica delle Problematiche

Durante l'analisi del codice è emerso che numerosi file di traduzione nel modulo Notify non rispettano gli standard definiti per . Questo documento riassume i problemi identificati e le strategie di correzione implementate.

## Standard Violati

1. **Naming dei File**
   - Alcuni file utilizzano convenzioni di naming non conformi
   - Esempio: `send_whats_app.php` invece di `send_whatsapp.php`
   - Regola: i termini composti come "WhatsApp" devono essere trattati come un'unica parola in snake_case

2. **Struttura dei File**
   - Numerosi file mancano della dichiarazione `declare(strict_types=1);`
   - Manca spesso la sezione `resource` obbligatoria
   - Le strutture gerarchiche sono incomplete rispetto agli st

### `translation-preservation.md` — Regole Critiche per la Preservazione delle Traduzioni

# Regole Critiche per la Preservazione delle Traduzioni

## ⚠️ REGOLA ASSOLUTA: MAI RIMUOVERE CONTENUTO

**Le traduzioni sono un patrimonio del progetto che deve essere sempre preservato e mai ridotto.**

## 🎯 TERMINOLOGIA CORRETTA PER LINGUA

### Regola Fondamentale: Traduzioni Appropriate
- **Italiano**: "Referto" (NON "Report") - specialmente in ambito medico/odontoiatrico
- **Inglese**: "Report"
- **Tedesco**: "Bericht"

### Esempi di Terminologia Corretta

#### ✅ CORRETTO - Italiano
```php
// Stati appuntamenti
'report_pending' => [
    'label' => 'Referto in attesa',

### `translation-process.md` — Processo di Traduzione: Da Sviluppatore a Traduttore


# Processo di Traduzione: Da Sviluppatore a Traduttore

## Indice
1. [Introduzione](#introduzione)
2. [Struttura dei File di Traduzione](#struttura-dei-file-di-traduzione)
3. [Preparazione per i Traduttori](#preparazione-per-i-traduttori)
4. [Strumenti Consigliati](#strumenti-consigliati)
5. [Integrazione con il Flusso di Lavoro](#integrazione-con-il-flusso-di-lavoro)
6. [Best Practice](#best-practice)
7. [Automazione](#automazione)

## Introduzione

Questo documento descrive il processo di gestione delle traduzioni nel progetto <nome progetto>, con particolare attenzione alla collaborazione tra sviluppatori e traduttori.

## Struttura dei File di Traduzione

### File JSON (Traduzioni Globali)


### `translation-reports.md` — Translation Module PDF Reports

# Translation Module PDF Reports

## 📋 Overview

Guida completa per generare report PDF delle traduzioni utilizzando HTML2PDF con integrazione nativa nel modulo Lang.

---

## 🎯 Tipi di Report Disponibili

### 1. Translation Coverage Report

Report completo sulla copertura delle traduzioni:

```php
use Modules\Lang\Actions\GenerateTranslationCoverageReportAction;

// Generate coverage report
$pdf = app(GenerateTranslationCoverageReportAction::class)->execute([
    'locales' => ['it', 'en', 'de', 'fr'],

### `translation-standards-links.md` — Collegamenti agli Standard di Traduzione

# Collegamenti agli Standard di Traduzione

## Documentazione Principale
- [Regole Generali Traduzioni](translation-standards.md)
- [Best Practices Filament](filament_translation_best_practices.md)
- [Struttura File Traduzione](translation_file_structure.md)

## Moduli Specifici
- [Modulo Performance - Traduzioni](laravel/Modules/Performance/docs/translation_guidelines.md)
- [Modulo UI - Componenti](laravel/Modules/UI/docs/components.md)
- [Modulo Xot - Regole Base](laravel/Modules/Xot/docs/translation_rules.md)

## Esempi e Fix
- [Fix Traduzioni Performance](laravel/Modules/Performance/docs/organizzativa-migration-errors.md)
- [Fix Traduzioni Xot Base](laravel/Modules/Xot/docs/xot_base_translation_fix.md)
- [Fix Traduzioni Notify Send Email](laravel/Modules/Notify/docs/send-email-translat

### `translation-standards.md` — Standard per le Traduzioni nel Progetto

# Standard per le Traduzioni nel Progetto

## Struttura delle Cartelle

Le traduzioni vanno posizionate nella cartella `lang` di ogni modulo, organizzate per lingua:

```
Modules/
  ├── ModuleName/
  │   └── lang/
  │       ├── it/
  │       │   ├── resource-name.php
  │       │   └── ...
  │       └── en/
  │           ├── resource-name.php
  │           └── ...
```

## Convenzione di Naming


### `translation-strategies.md` — Strategie di Gestione delle Traduzioni in Laravel


# Strategie di Gestione delle Traduzioni in Laravel

## Indice
1. [Panoramica](#panoramica)
2. [File PHP vs JSON](#file-php-vs-json)
3. [Struttura delle Cartelle](#struttura-delle-cartelle)
4. [Helper di Traduzione](#helper-di-traduzione)
5. [Best Practice](#best-practice)
6. [Implementazione nel Progetto](#implementazione-nel-progetto)
7. [Migrazione tra Formati](#migrazione-tra-formati)
8. [Processo Dev → Traduttore: Strategia Operativa](#processo-dev-→-traduttore-strategia-operativa)
9. [Gestione Plurale/Singolare nelle Traduzioni](#gestione-plurale-singolare-nelle-traduzioni)

## Panoramica

In Laravel, esistono due approcci principali per gestire le traduzioni:
- **File PHP**: tradizionale, con struttura ad array
- **File JSON**: più moderno, con chiavi testuali


### `translation-structure-expanded.md` — Struttura Espansa per File di Traduzione - Progetto <nome progetto>

# Struttura Espansa per File di Traduzione - Progetto <nome progetto>

## Scopo
Definizione della struttura standard espansa per tutti i file di traduzione del progetto, seguendo i principi DRY/KISS per massima usabilità e manutenibilità.

## Principi DRY/KISS Applicati

### DRY (Don't Repeat Yourself)
- **Template standardizzato** per tutti i moduli
- **Struttura coerente** tra lingue diverse
- **Riutilizzo pattern** per campi simili

### KISS (Keep It Simple, Stupid)
- **Struttura prevedibile** e facile da navigare
- **Naming consistente** per tutte le proprietà
- **Documentazione chiara** per ogni elemento

## Struttura Standard Espansa

### Template Base per Campi

### `translation-syntax-fixes.md` — Correzione Errori di Sintassi nei File di Traduzione

# Correzione Errori di Sintassi nei File di Traduzione

## Riepilogo Intervento

Sono stati identificati e risolti errori di sintassi PHP in 10 file di traduzione distribuiti su 6 moduli diversi. Tutti gli errori sono stati corretti seguendo le best practice Laraxot.

## Moduli Interessati

### Chart Module
- **File**: `laravel/Modules/Chart/lang/it/chart.php`
- **Errore**: Parentesi di chiusura mancante
- **Soluzione**: Aggiunta parentesi `]` finale

- **File**: `laravel/Modules/Chart/lang/it/mixed_chart.php`
- **Errore**: `declare(strict_types=1);` posizionato erroneamente
- **Soluzione**: Spostato dopo `<?php`

### FormBuilder Module
- **File**: `laravel/Modules/FormBuilder/lang/it/collection_lang.php`
- **Errore**: Parentesi di chiusura mancante

### `translation-syntaxes.md` — Correzione Errori di Sintassi nei File di Traduzione

# Correzione Errori di Sintassi nei File di Traduzione

## Riepilogo Intervento

Sono stati identificati e risolti errori di sintassi PHP in 10 file di traduzione distribuiti su 6 moduli diversi. Tutti gli errori sono stati corretti seguendo le best practice Laraxot.

## Moduli Interessati

### Chart Module
- **File**: `laravel/Modules/Chart/lang/it/chart.php`
- **Errore**: Parentesi di chiusura mancante
- **Soluzione**: Aggiunta parentesi `]` finale

- **File**: `laravel/Modules/Chart/lang/it/mixed_chart.php`
- **Errore**: `declare(strict_types=1);` posizionato erroneamente
- **Soluzione**: Spostato dopo `<?php`

### FormBuilder Module
- **File**: `laravel/Modules/FormBuilder/lang/it/collection_lang.php`
- **Errore**: Parentesi di chiusura mancante

### `translation-system.md` — Sistema di Traduzione in il progetto

# Sistema di Traduzione in il progetto

## LangServiceProvider

Il `LangServiceProvider` è il cuore del sistema di traduzione e gestisce automaticamente le label dei componenti Filament.

### Funzionamento

1. **Caricamento Traduzioni**
   - Le traduzioni sono caricate dai file nella cartella `lang` di ogni modulo
   - Supporta sia file PHP che JSON
   - Usa il nome del modulo in minuscolo come namespace delle traduzioni

2. **Gestione Automatica Label**
   - Non si usa mai il metodo `->label()` direttamente sui componenti
   - Le label sono gestite automaticamente dal provider
   - Usa i file di traduzione per tutte le etichette

3. **Struttura File Traduzioni**
```php

### `translation-validation-complete-guide.md` — Guida Completa alla Validazione delle Traduzioni - <nome progetto>

# Guida Completa alla Validazione delle Traduzioni - <nome progetto>

## Panoramica

Questa guida documenta il processo completo di validazione delle traduzioni nel progetto <nome progetto>, seguendo i principi DRY (Don't Repeat Yourself) e KISS (Keep It Simple, Stupid).

## Regole Fondamentali

### 1. Regola helper_text Normalizzazione
**Se il valore di `helper_text` è uguale alla chiave del campo padre, DEVE essere impostato a stringa vuota (`''`).**

#### Esempio
```php
// ❌ ERRATO
'province' => [
    'helper_text' => 'province', // uguale alla chiave padre
],

// ✅ CORRETTO
'province' => [

### `translation-validation.md` — Guida Completa alla Validazione delle Traduzioni - <nome progetto>

# Guida Completa alla Validazione delle Traduzioni - <nome progetto>

## Panoramica

Questa guida documenta il processo completo di validazione delle traduzioni nel progetto <nome progetto>, seguendo i principi DRY (Don't Repeat Yourself) e KISS (Keep It Simple, Stupid).

## Regole Fondamentali

### 1. Regola helper_text Normalizzazione
**Se il valore di `helper_text` è uguale alla chiave del campo padre, DEVE essere impostato a stringa vuota (`''`).**

#### Esempio
```php
// ❌ ERRATO
'province' => [
    'helper_text' => 'province', // uguale alla chiave padre
],

// ✅ CORRETTO
'province' => [

### `translationes.md` — Riepilogo Correzioni Traduzioni - Gennaio 2025

# Riepilogo Correzioni Traduzioni - Gennaio 2025

## Problemi Risolti

### 1. Errori di Sintassi nei File di Traduzione ✅ RISOLTI

**File corretti (11 totali):**
1. **Chart/lang/it/chart.php** - Grafici e visualizzazioni
2. **Chart/lang/it/mixed_chart.php** - Grafici misti (errore critico risolto)
3. **FormBuilder/lang/it/collection_lang.php** - Collezioni form builder
4. **FormBuilder/lang/it/field.php** - Campi form builder
5. **FormBuilder/lang/it/field_option.php** - Opzioni campi form builder
6. **Lang/lang/it/translation_file.php** - File di traduzione
7. **Notify/lang/it/send_whats_app.php** - Notifiche WhatsApp
8. **UI/lang/it/collection_lang.php** - Collezioni UI
9. **UI/lang/it/field.php** - Campi UI
10. **UI/lang/it/field_option.php** - Opzioni campi UI
11. **UI/lang/it/s3_test.

### `translationness.md` — Translation Completeness Audit

# Translation Completeness Audit

## Overview
This document tracks the completeness and quality of translation files across the <nome progetto> system, ensuring all user-facing text is properly localized in Italian, English, and German.

## Recent Updates

### [DATE]: Complete PDF Template Internationalization

**Issue**: PDF template `Themes/One/resources/views/appointment/report_pdf.blade.php` contained hardcoded Italian text, making it non-multilingual.

**Files Updated**:
- `laravel/Themes/One/resources/views/appointment/report_pdf.blade.php` (completely internationalized)
- `laravel/Themes/One/lang/it/appointment.php` (added PDF-specific translations)
- `laravel/Themes/One/lang/en/appointment.php` (added PDF-specific translations)
- `laravel/Themes/One/lang/de/appointment.php` (added 

### `translations/readme-2.it.md` — 🚀 Benvenuto in Laraxot PTVX

<div align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup.png" alt="Laraxot PTVX" width="350"/>
  
  <h1>Laraxot PTVX</h1>
  <p><b>Piattaforma Laravel Modulare, Type-Safe e Multi-Tenant</b></p>
  
  <a href="https://laravel.com"><img src="https://img.shields.io/badge/Laravel-11.x-red?style=flat-square&logo=laravel" alt="Laravel Version"/></a>
  <a href="https://phpstan.org/"><img src="https://img.shields.io/badge/PHPStan-Level%209-blue?style=flat-square&logo=php" alt="PHPStan Level"/></a>
  <a href="https://filamentphp.com/"><img src="https://img.shields.io/badge/Filament-Admin-green?style=flat-square&logo=laravel" alt="Filament"/></a>
  <a href="../README.md"><img src="https://img.shields.io/badge/🇬🇧-Read%20in%20English-blue?style=flat-square" alt="

### `translations/readme-3.es.md` — 🚀 Bienvenido a Laraxot PTVX

<div align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup.png" alt="Laraxot PTVX" width="350"/>
  
  <h1>Laraxot PTVX</h1>
  <p><b>Plataforma Laravel Modular, Type-Safe y Multi-Tenant</b></p>
  
  <a href="https://laravel.com"><img src="https://img.shields.io/badge/Laravel-11.x-red?style=flat-square&logo=laravel" alt="Laravel Version"/></a>
  <a href="https://phpstan.org/"><img src="https://img.shields.io/badge/PHPStan-Level%209-blue?style=flat-square&logo=php" alt="PHPStan Level"/></a>
  <a href="https://filamentphp.com/"><img src="https://img.shields.io/badge/Filament-Admin-green?style=flat-square&logo=laravel" alt="Filament"/></a>
  <a href="../README.md"><img src="https://img.shields.io/badge/🇬🇧-Read%20in%20English-blue?style=flat-square" alt="En

### `translations/readme.es.md` — 🚀 Bienvenido a Laraxot PTVX

<div align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup.png" alt="Laraxot PTVX" width="350"/>
  
  <h1>Laraxot PTVX</h1>
  <p><b>Plataforma Laravel Modular, Type-Safe y Multi-Tenant</b></p>
  
  <a href="https://laravel.com"><img src="https://img.shields.io/badge/Laravel-11.x-red?style=flat-square&logo=laravel" alt="Laravel Version"/></a>
  <a href="https://phpstan.org/"><img src="https://img.shields.io/badge/PHPStan-Level%209-blue?style=flat-square&logo=php" alt="PHPStan Level"/></a>
  <a href="https://filamentphp.com/"><img src="https://img.shields.io/badge/Filament-Admin-green?style=flat-square&logo=laravel" alt="Filament"/></a>
  <a href="../README.md"><img src="https://img.shields.io/badge/🇬🇧-Read%20in%20English-blue?style=flat-square" alt="En

### `translations/readme.it.md` — 🚀 Benvenuto in Laraxot PTVX

<div align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup.png" alt="Laraxot PTVX" width="350"/>

  <h1>Laraxot PTVX</h1>
  <p><b>Piattaforma Laravel Modulare, Type-Safe e Multi-Tenant</b></p>

  <a href="https://laravel.com"><img src="https://img.shields.io/badge/Laravel-11.x-red?style=flat-square&logo=laravel" alt="Laravel Version"/></a>
  <a href="https://phpstan.org/"><img src="https://img.shields.io/badge/PHPStan-Level%209-blue?style=flat-square&logo=php" alt="PHPStan Level"/></a>
  <a href="https://filamentphp.com/"><img src="https://img.shields.io/badge/Filament-Admin-green?style=flat-square&logo=laravel" alt="Filament"/></a>
  <a href="../README.md"><img src="https://img.shields.io/badge/🇬🇧-Read%20in%20English-blue?style=flat-square" alt="Engl

### `translations-correction.md` — Correzione Errori Traduzioni - 2025

# Correzione Errori Traduzioni - 2025

## Problema Identificato
Durante l'audit delle traduzioni, sono state identificate numerose traduzioni che contengono testo italiano in file di lingua tedesca e inglese. Il pattern problematico è la presenza di "obbligatorio" in file `lang/de/` e `lang/en/`.

## Analisi del Problema

### Pattern di Errore
- **Errore**: Traduzioni italiane in file tedeschi e inglesi
- **Esempio**: `'required' => 'Campo obbligatorio'` in file `lang/de/`
- **Impatto**: Interfaccia utente incoerente e non localizzata correttamente

### Moduli Affetti e Correzioni Effettuate

#### ✅ Modulo Lang
- **File**: `lang/de/lang_service.php` - linea 522
- **Correzione**: `'required' => 'Das Feld :attribute ist erforderlich'`

#### ✅ Modulo DbForge
**File Tedeschi (DE):**

### `translations-faq.md` — FAQ e Problemi Comuni sulle Traduzioni

# FAQ e Problemi Comuni sulle Traduzioni

## 1. Perché il POST non funziona su rotte localizzate?
Se non usi URL localizzati anche nei form/action, il middleware può fare redirect e cambiare il metodo in GET. Usa sempre gli helper per generare URL localizzati nei form.

## 2. Come si cache-izzano le rotte tradotte?
Usa il comando:
```bash
php artisan route:trans:cache
```
Non usare `route:cache` standard. Per Laravel 11+ segui la doc ufficiale per il caricamento delle rotte cache.

## 3. Cosa succede se una chiave manca?
Laravel mostra la chiave stessa. Se usi PHP e hai impostato fallback_locale, cerca nella lingua di fallback. Con JSON, mostra sempre la chiave.

## 4. Come gestire traduzioni per traduttori non-dev?
Preferisci JSON solo se necessario. Altrimenti, esporta le chiavi PHP in f

### `translations-storage.md` — Storage delle Traduzioni: PHP vs JSON

# Storage delle Traduzioni: PHP vs JSON

## Introduzione
In Laravel puoi salvare le traduzioni in file PHP strutturati o in file JSON flat. Ogni approccio ha vantaggi, svantaggi e impatti diversi su fallback, gestione team e manutenzione.

## Confronto tra PHP e JSON

| Caratteristica         | PHP Files                        | JSON Files                      |
|-----------------------|----------------------------------|---------------------------------|
| **Struttura**         | Annidata, multi-livello          | Flat, chiave = frase            |
| **Contesto**          | Sì (chiavi strutturate)          | No (tutto in un file)           |
| **Commenti**          | Sì                               | No                              |
| **Fallback**          | Sì (usa fallback_locale)     

### `translations-system.md` — Sistema di Traduzioni

# Sistema di Traduzioni

## Collegamenti Bidirezionali
- [Modulo <nome progetto> - Regole Consolidate Traduzioni](../../<nome progetto>/docs/translation-rules-consolidated.md)
- [Modulo <nome progetto> - Implementazione Appointment Report](../../<nome progetto>/docs/appointment_report_translations_implementation.md)
- [Modulo User - Translation Best Practices](../../User/docs/translation-best-practices.md)
- [Modulo User - Translation Best Practices](../../User/docs/translation-best-practices.md)
- [Modulo User - Translation Best Practices](../../User/docs/translation-best-practices.md)

## Panoramica
Il sistema di traduzioni utilizza `LangServiceProvider` per gestire le traduzioni in modo centralizzato e efficiente.

## LangServiceProvider

### Struttura Base
```php
namespace Modules\Lang

### `translations.md` — Traduzioni nel Progetto

# Traduzioni nel Progetto

## Regole Fondamentali

### Regola #1: MAI utilizzare ->label() o metodi simili

❌ **NON FARE MAI**:
```php
TextInput::make('nome')
    ->label('Nome Utente')
    ->placeholder('Inserisci il nome')
    ->helperText('Il nome completo dell\'utente');
```

✅ **FARE SEMPRE**:
```php
TextInput::make('nome')  // Le traduzioni vengono gestite automaticamente dal LangServiceProvider
```

**Motivazione**:

### `troubleshooting.md` — 🔧 **Troubleshooting Modulo Lang - Laraxot**

# 🔧 **Troubleshooting Modulo Lang - Laraxot**

## 🎯 **Panoramica**

Questo documento fornisce soluzioni rapide e sistematiche per i problemi più comuni del modulo Lang, seguendo i principi **DRY**, **KISS**, **SOLID**, **Robust** e **Laraxot**.

---

## 🚨 **Problemi Critici**

### **1. Traduzioni Non Caricate**

#### **Sintomi**
- Chiavi di traduzione visibili invece del testo
- Errori "Translation key not found"
- Componenti Filament senza label

#### **Diagnosi Rapida**
```bash
# 1. Verifica cache

### `upgrade.md` — Aggiornamenti {#aggiornamenti}


# Aggiornamenti {#aggiornamenti}

Cms onsiste in un pacchetto PHP.

Quindi per aggiornare basta dare il comando in console:

composer update laraxot/module_lang

Assicurarsi di cancellare la cache delle viste di Laravel dopo l'aggiornamento:

```console
php artisan view:clear
```

Infine, se si sono pubblicati il file di configurazione o i modelli Blade, assicurarsi che le personalizzazioni siano aggiornate con i valori predefiniti.

### Verifica dei pacchetti installati

È possibile utilizzare il comando Artisan incorporato per visualizzare le versioni installate dei pacchetti:

### `user-link.md` — Collegamenti al Modulo User

# Collegamenti al Modulo User

Questo documento fornisce collegamenti bidirezionali tra il modulo Lang e il modulo User.

## Traduzioni nel Modulo User

Il modulo User utilizza le traduzioni fornite dal modulo Lang per:

- Etichette dei campi utente
- Messaggi di validazione
- Notifiche e messaggi di sistema
- Interfaccia di autenticazione

## Collegamenti Principali

- [Traduzioni del Modulo User](../../User/project_docs/translations.md) - Documentazione specifica sulle traduzioni nel modulo User
- [Gestione Utenti](../../User/project_docs/README.md) - Panoramica del modulo User
- [Modelli Utente](../../User/project_docs/user_profile_models.md) - Documentazione sui modelli utente e profili
- [Traduzioni del Modulo User](../../User/project_docs/translations.md) - Documentazione specifica s

### `validation-translations.md` — Traduzione dei Messaggi di Validazione

# Traduzione dei Messaggi di Validazione

## Indice
1. [Introduzione](#introduzione)
2. [Traduzione degli Attributi](#traduzione-degli-attributi)
3. [Validazione di Campi Array](#validazione-di-campi-array)
4. [Messaggi Personalizzati](#messaggi-personalizzati)
5. [Implementazione nel Progetto](#implementazione-nel-progetto)
6. [Best Practice](#best-practice)
7. [Risoluzione Problemi](#risoluzione-problemi)

## Introduzione

Questo documento descrive come gestire le traduzioni dei messaggi di validazione in Laravel, con particolare attenzione alla personalizzazione e all'internazionalizzazione.

## Traduzione degli Attributi

### Il Problema di Base

Di default, Laravel genera messaggi di validazione come:

### `valori.md` — Politica, Filosofia, Religione, Etica, Zen – Modulo Lang

# Politica, Filosofia, Religione, Etica, Zen – Modulo Lang

## Politica
La politica della lingua è inclusiva: ogni lingua è un ponte, non una barriera. Tutte le culture sono rappresentate con rispetto.

## Filosofia
La filosofia è “la lingua è identità”. Traduciamo non solo parole, ma valori e contesto.

## Religione
Accogliamo la diversità religiosa come fonte di arricchimento culturale. Le traduzioni evitano discriminazioni e stereotipi.

## Etica
Rispettiamo la verità e la trasparenza nei messaggi. Le traduzioni non devono mai manipolare o disinformare.

## Zen
Tradurre è ascoltare: silenzio, attenzione, precisione. Ogni chiave di traduzione è un atto di cura.

### `volt-integration.md` — Integrazione di mcamara/laravel-localization con Laravel Volt

# Integrazione di mcamara/laravel-localization con Laravel Volt

## Indice
1. [Introduzione](#introduzione)
2. [Configurazione Iniziale](#configurazione-iniziale)
   - [Installazione di Volt](#installazione-di-volt)
   - [Configurazione di Laravel-Localization](#configurazione-di-laravel-localization)
3. [Middleware per Volt](#middleware-per-volt)
4. [Componenti Volt Localizzati](#componenti-volt-localizzati)
5. [Gestione dei Form](#gestione-dei-form)
6. [Testing](#testing)
7. [Best Practice](#best-practice)
8. [Risoluzione Problemi](#risoluzione-problemi)

## Introduzione

L'integrazione di `mcamara/laravel-localization` con Laravel Volt richiede un approccio specifico per garantire che i componenti reattivi rispettino l'impostazione della lingua corrente. Questa guida ti mostrerà come im

### `volt-localization-integration.md` — Integrazione Livewire Volt + mcamara/laravel-localization

# Integrazione Livewire Volt + mcamara/laravel-localization

## 1. Obiettivo

- Gestire componenti Livewire Volt in un'applicazione Laravel multilingua con route localizzate tramite mcamara/laravel-localization.
- Permettere la localizzazione delle route che montano componenti Volt.
- Gestire la lingua corrente all'interno dei componenti Volt (sia per visualizzazione che per azioni dinamiche).

---

## 2. Setup di base

### 2.1. Installazione pacchetti

```bash
composer require livewire/volt
composer require mcamara/laravel-localization
php artisan vendor:publish --provider="Mcamara\LaravelLocalization\LaravelLocalizationServiceProvider"
```


### `widgets.md` — Lang Module Widgets

# Lang Module Widgets

## Overview

This document provides documentation for the widgets available in the Lang module for language management and internationalization.

## LanguageSwitcherWidget

A widget that provides a dropdown selector for changing the application language.

### Features

- Dynamic language detection from database or fallback configuration
- Support for language flags and native names
- Persistent language preference
- Accessible dropdown with proper ARIA labels
- Automatic URL generation for different locales
- Graceful fallback when Language model is not available

### Configuration

### `wiki/agent-confidence-discipline.md` — Disciplina agenti per massimizzare la confidenza


# Disciplina agenti per massimizzare la confidenza

Regola canonica: [../../Xot/docs/wiki/concepts/agent-confidence-discipline.md](../../Xot/docs/wiki/concepts/agent-confidence-discipline.md).

Sintesi: verificare prima di affermare; riprodurre prima di correggere; documentare prove, dubbi e rischio residuo; rispondere in italiano sintetico.

### `wiki/agent-confidence-protocol.md` — Massima confidenza agente


# Massima confidenza agente

Stub DRY. Regola canonica: [../../../../docs/wiki/rules/agent-confidence-protocol.md](../../../../docs/wiki/rules/agent-confidence-protocol.md).

Checklist locale: issue GitHub, wiki owner, file letti a chunk, gate eseguiti, log aggiornato, limiti dichiarati.

### `wiki/bugfix/duplicate-widget-instantiation.md` — Bug Fix: Duplicate Widget Instantiation in LanguageSwitcher

# Bug Fix: Duplicate Widget Instantiation in LanguageSwitcher

**File**: `app/View/Components/LanguageSwitcher.php`
**Metodo**: `__construct()` (linee 26-30)
**Data Fix**: 16 Dicembre 2025
**Status**: ✅ PHPStan Level 10 Compliant

---

## 🐛 Problema Identificato

### Issue Description

**Variabile**: `$this->widget` (linee 28-29)

**Problema**: Duplicazione istanziazione widget

**Codice Problematico**:
```php
public function __construct()

### `wiki/concepts/claude-audit-static.md` — claude-audit static (Lang)


# claude-audit static (Lang)

## Comandi

```bash
bash bashscripts/tools/claude-audit-module-static-boost.sh Lang
cd laravel && npx claude-audit --static Modules/Lang/ --output json --output-dir Modules/Lang/.claude-audit --max-files 8000 --quiet
```

## Fix applicati (2026-07-09)

| Area | Intervento |
|------|------------|
| `LangServiceProvider` | `applyUserValidationMessages()` + `configureActionAsButtonWhenNoRecord()` — nesting ≤3 |
| `docs/*.php` script legacy | Spostati/rimossi dalla scan (es. `italian-text-validation-refined.php`) |
| Boost | bridge test + doc ratio |

## Target


### `wiki/concepts/composer-root-minimal-nwidart.md` — Lang e composer root minimale


# Lang e composer root minimale

## Regola

Dipendenze del dominio **Lang** in `Modules/Lang/composer.json`. Il root `laravel/composer.json` resta skeleton come [base_project_fila5](https://github.com/laraxot/platform/blob/dev/laravel/composer.json).




## Merge root — solo moduli

`laravel/composer.json` → merge **solo** `Modules/*/composer.json`. **Vietato** `Themes/*/composer.json` (nwidart owner = modulo; tema = vestito Blade/assets).

Perché: [composer-merge-plugin-modules-only](../../../Xot/docs/wiki/concepts/composer-merge-plugin-modules-only.md).

## Riferimento

[Composer root minimale nwidart](../../../../../../docs/wiki/concepts/composer-root-minimal-nwidart.md)

### `wiki/concepts/context-mode-lang-discipline.md` — Lang Module — Context-Mode Discipline


# Lang Module — Context-Mode Discipline

> Lang module context-mode per translation keys governance.

## File Wiki Limits

```
laravel/Modules/Lang/docs/wiki/
├── index.md                              # ≤30 righe
├── rules/
│   ├── index.md                          # ≤20 righe
│   ├── translation-key-governance.md     # ≤200 righe
│   └── translation-audit.md              # ≤150 righe
├── skills/
│   ├── index.md                          # ≤20 righe
│   └── translation-key-audit.md          # ≤100 righe
└── concepts/
    └── translation-ownership.md           # ≤150 righe
```

### `wiki/concepts/context-overflow-prevention.md` — context overflow prevention


# context overflow prevention

Stub **DRY** verso wiki modulo **Xot**. Policy: [docs-deduplication](../../../../../../bashscripts/ai/wiki/how-to/modules-ops.md#module-docs-deduplication).

→ [context-overflow-prevention.md](../../../../Xot/docs/wiki/concepts/context-overflow-prevention.md)

### `wiki/concepts/duplicate-method-bodies.md` — Corpi metodo duplicati — Lang


# Corpi metodo duplicati — Lang

> **19** gruppi con corpo identico coinvolgono Lang (su 790 totali progetto).
> Omonimo con corpo **diverso** = configurazione, e' nel [censimento omonimi](./method-name-homonyms.md); qui solo corpi **identici**.

## Riepilogo (solo Lang)

| Categoria | Gruppi | ~Righe duplicate |
|-----------|--------|------------------|
| `A_config_identical` | 5 | 237 |
| `B_business_duplicate` | 7 | 99 |
| `M_database_layer` | 1 | 35 |
| `S_trivial_stub` | 6 | 19596 |

## Dettaglio

### B — Business logic con corpo identico (consolidare: 1 owner)

#### `execute` — 2 classi · 29 righe · ~29 righe duplicate

### `wiki/concepts/lang-services-to-actions.md` — Lang — `Services` → `Actions` (translator missing-key logic)


# Lang — `Services` → `Actions` (translator missing-key logic)

## Binding (non rotto)

Il singleton `translator` è definito in:

- `Modules\Lang\Providers\LangServiceProvider::registerTranslator()` (singleton → `Modules\Lang\Actions\TranslatorAction`)
- `Modules\Lang\Providers\Traits\TranslatorTrait::registerTranslator()` (extend → `Modules\Lang\Actions\TranslatorAction`)

`TranslatorAction` **deve** restare una sottoclasse di `Illuminate\Translation\Translator`
per soddisfare il contratto framework (eccezione documentata in
`no-app-support-queueable-actions.md`). Non è una QueueableAction di dominio: è un adapter.

## Mapping

| Sorgente (legacy `app/Services/TranslatorService.php`, ora `.bak`) | Destinazione | Pattern |
|-----------------------------------------------------------------

### `wiki/concepts/laravel12-lang-path-rule.md` — Laravel 13 lang path rule

# Laravel 13 lang path rule

## Sintesi

Per il modulo `Lang`, il riferimento valido e sempre `lang/` e non `resources/lang/`.

## Regola modulo

- modulo: `laravel/Modules/Lang/lang/{locale}/...`
- host app: `laravel/lang/{locale}/...`
- vietato documentare come standard: `resources/lang/...`

## Backlink

- [Regola globale Laravel 13 lang root](../../../../../../bashscripts/ai/wiki/concepts/modules-structure-rules.md#laravel12-lang-root-rule)

### `wiki/concepts/method-name-homonyms.md` — Censimento omonimi metodi — Lang


# Censimento omonimi metodi — Lang

> **39** nomi metodo omonimi coinvolgono questo modulo (su 689 totali progetto).

## Riepilogo categoria (solo Lang)

| Categoria | Metodi |
|-----------|--------|
| `A_filament_framework` | 19 |
| `E_scheda_stack` | 1 |
| `G_module_local` | 4 |
| `H_cross_module_homonym` | 15 |

## Dettaglio

### `A_filament_framework` (19 metodi)

Hook Filament/Laravel ripetuti — **non** debito. Elenco omesso.


### `wiki/concepts/migration-path-canonical.md` — Path canonico migrazioni Lang


# Path canonico migrazioni Lang

## Regola

| Vietato | Canonico |
|---------|----------|
| `database/Migrations/` | `database/migrations/` |
| `database/migrations/Migrations/` | `database/migrations/*.php` (file flat, nessuna sottocartella) |

nwidart e Laravel scoprono le migrazioni solo sotto **`database/migrations`** (minuscolo). Su Linux `Migrations` e `migrations` sono directory diverse: duplicati case-only rompono `php artisan migrate` e i submoduli.

La sottocartella **`migrations/Migrations/`** è un anti-pattern peggiore del solo CamelCase: sembra “corretto” ma Laravel **non** la carica; duplica file già presenti nel path canonico.

## Incidente 2026-07-01 (non ripetere)

1. `962d9fab2`: rimossa correttamente `Lang/database/migrations/Migrations/`.
2. `f840e0cc0`: **reintrodotta

### `wiki/concepts/no-app-support-queueable-actions.md` — no `app/Support/` — business logic in QueueableAction


# no `app/Support/` — business logic in QueueableAction

## Scopo

Nel modulo Lang **non** esiste più `app/Support/`.

## Migrazione (2026-07-12)

| Legacy `app/Support/` | Destinazione |
|-----------------------|--------------|
| `TranslatorService` | `app/Adapters/TranslatorAdapter.php` |

## Eccezione: framework adapter

`TranslatorAdapter` **estende** `Illuminate\Translation\Translator` ed è bound come singleton `translator`. Non può essere una QueueableAction: il contratto Laravel richiede una sottoclasse di `Translator`.

La logica `notifyMissingKey` resta nell'adapter; eventuale orchestrazione futura → Action dedicata che l'adapter invoca.

## Collegamenti

### `wiki/concepts/no-services-no-support-queueable-actions.md` — Lang — Services/Support vietati: solo Actions


# Lang — Services/Support vietati: solo Actions

## Regola

- **Mai** creare file in `app/Services/` o `app/Support/`
- **Sempre** `app/Actions/{Contexto}/FooAction.php`
- **Trait**: `use Spatie\QueueableAction\QueueableAction;`
- **Entrypoint**: unico metodo `execute(...)`
- **Chiamata**: `app(FooAction::class)->execute(...)`
- **Gruppi**: sottocartelle per attore/contesto

## Conversione

Vedi [lang-services-to-actions.md](lang-services-to-actions.md) e [translator-adapter-migration.md](translator-adapter-migration.md) per mapping dettagliato.

### `wiki/concepts/organizzativa-money.md` — organizzativa money


# organizzativa money

Stub **DRY** verso wiki modulo **Xot**. Policy: [docs-deduplication](../../../../../../bashscripts/ai/wiki/how-to/modules-ops.md#module-docs-deduplication).

→ [organizzativa-money.md](../../../../Xot/docs/wiki/concepts/organizzativa-money.md)

### `wiki/concepts/ponytail-audit.md` — Ponytail audit — Lang

# Ponytail audit — Lang

**Delta modulo only here.** Ranked list, gate e remediation globale negli hub progetto.

- [Hub audit](../../../../../../docs/audit/ponytail-audit.md)
- [Remediation](../../../../../../docs/project/ponytail-audit-remediation.md)
- [Findings Lang](../../ponytail-audit-over-engineering.md)

Aggiornare solo finding e stato specifici di questo modulo.

### `wiki/concepts/second-brain-local-discipline.md` — Contratto wiki locale: stub Lang


# Contratto wiki locale: stub Lang

| Risorsa | Link |
|---------|------|
| **Canon** | [Xot second-brain-local-discipline.md](../../../../Xot/docs/wiki/concepts/second-brain-local-discipline.md) |
| **Harness moduli** | [ai-harness-module-discipline.md](../../../../docs/wiki/concepts/ai-harness-module-discipline.md) |
| **Tips 001–022** | [hackernoon map](../../../../../../docs/wiki/concepts/hackernoon-ai-coding-tips-progetto corrente-map.md) |
| **Prompt router** | [llm-wiki.txt](../../../../../../bashscripts/tools/prompts/llm-wiki.txt) |

Solo decisioni specifiche di **Lang** in `docs/wiki/`; contratto generico in Xot.

### `wiki/concepts/translator-adapter-migration.md` — Lang — `TranslatorService` → `TranslatorAction`


# Lang — `TranslatorService` → `TranslatorAction`

> **2026-10-08 (superata).** `app/Actions/TranslatorAction.php` e' stata eliminata: era la terza copia di
> `Adapters/TranslatorAdapter` (stesso `get()`, nessun chiamante di produzione, solo tre test che la istanziavano e che ora
> usano l'adapter). L'implementazione e' `Modules\Lang\Adapters\TranslatorAdapter` (delega a
> `Actions/Translation/RecordMissingTranslationAction`); i riferimenti a `TranslatorAction` qui sotto sono storici.
> Attenzione: in `LangServiceProvider::boot()` la riga `$this->registerTranslator();` e' commentata, quindi nel runtime
> `app('translator')` e' oggi il `Illuminate\Translation\Translator` di serie e l'adapter non e' attivo.
> Story: [2026-10-08-dead-code-sweep-lang](../../stories/2026-10-08-dead-code-sweep-

### `wiki/concepts/visual-testing-playwright-puppeteer.md` — Visual Testing con Playwright e Puppeteer — Modulo Lang


# Visual Testing con Playwright e Puppeteer — Modulo Lang

## Panoramica

Il testing visivo (visual regression testing) permette di rilevare cambiamenti UI non intenzionali confrontando screenshot di riferimento con screenshot attuali.

Per la policy di collocazione dei test: vedi [Playwright Testing Policy](../../../../../../bashscripts/ai/wiki/concepts/visual-browser-tooling.md#playwright-testing-policy).

## Collocazione Test

I test Playwright del modulo Lang appartengono a:

```
laravel/Modules/Lang/tests/Playwright/
```

## Playwright vs Puppeteer

| Criterio | Playwright | Puppeteer |

### `wiki/concepts/xotbase-table-columns-enforcement.md` — Lang Module: XotBaseResourceTable Columns


# Lang Module: XotBaseResourceTable Columns

1 Table file populated with columns from the TranslationFile model (Sushi-based).

Resources: TranslationFile

- **TranslationFilesTable**: id, name, path, content (Sushi model — columns from `getRows()` or `$fillable`)

### `wiki/how-to/autoregistration-commands.md` — Autoregistrazione dei Comandi da Console

# Autoregistrazione dei Comandi da Console

## Introduzione

In linea con la filosofia del progetto e la struttura di `XotBaseServiceProvider`, i comandi da console devono essere autoregistrati e non registrati manualmente nei service provider. Questo documento spiega l'importanza di questa convenzione e come è stata applicata nel modulo `Lang`.

## Errore Precedente e Correzione

In precedenza, nel file `LangServiceProvider.php`, i comandi da console erano registrati manualmente come segue:

```php
protected $commands = [
    \Modules\Lang\Console\Commands\ConvertTranslations::class,
    \Modules\Lang\Console\Commands\FindMissingTranslations::class,
];
```

Oppure con:

```php

### `wiki/how-to/build-publish.yml.md` — build-publish.yml

name: Build & Publish

on:
  push:
    branches:
      - develop
  schedule:
    - cron: "0 2 * * 1-5"

jobs:
  build-site:
    runs-on: ubuntu-latest
    steps:
    - uses: actions/checkout@v3
    - name: Install Composer Dependencies
      run: composer install --no-ansi --no-interaction --no-scripts --no-suggest --no-progress --prefer-dist
    - name: Install NPM Dependencies
      run: npm install
    - name: Build assets
      run: npm run production

### `wiki/how-to/composer-merge-plugin.md` — Composer Merge Plugin nel Modulo Lang

# Composer Merge Plugin nel Modulo Lang

## Scopo
Permettere al modulo di includere pacchetti locali senza duplicare dipendenze nel `composer.json` root, mantenendo il processo semplice (DRY + KISS) e coerente con l'architettura modulare.

## Business logic e motivazione
Il modulo Lang gestisce localizzazione e traduzioni; i pacchetti locali consentono di estendere funzionalità senza pubblicare repository esterni. Il merge dei `composer.json` permette di trattare questi pacchetti come dipendenze interne, riducendo la frammentazione delle configurazioni.

## Flusso di integrazione
1. Il `composer.json` root include il plugin di merge e la configurazione `extra.merge-plugin`.
2. I `composer.json` dei pacchetti locali vengono inclusi via `include`.
3. Le dipendenze vengono risolte come se fos

### `wiki/how-to/gitmodules-sync-session.md` — Gitmodules sync session


# Gitmodules sync session

Sessione orchestrata dal prompt `bashscripts/tools/prompts/02-gitmodules-sync.md` (v5.1) e da **STORY-003**.

## Cosa fare su questo owner

1. `git remote -v` — sync **tutte** le organizzazioni (`fetch` + `pull --ff-only` + `push`, mai `--force`).
2. Quality gates da `laravel/`: phpstan → phpmd → phpinsights (`--composer=composer.lock`).
3. Marker Git: risoluzione manuale forward-only (no `git restore`).

## Canon

- Story: [../../../../../../docs/stories/STORY-003-gitmodules-sync-conflict-sweep.md](../../../../../../docs/stories/STORY-003-gitmodules-sync-conflict-sweep.md)
- Report: [../../../../../../bashscripts/ai/wiki/memories/git-sync-fleet-remotes.md#gitmodules-sync](../../../../../../bashscripts/ai/wiki/memories/git-sync-fleet-remotes.md#gitmodules-sync)


### `wiki/integrations/_da-riconciliare/00-index.divergenza.md` — Divergenza: `00-index.md`


# Divergenza: `00-index.md`

Questo file veniva da `docs/wiki/integrations/modules/lang/00-index.md`, cancellato dal working tree senza migrazione. Il modulo ha gia' un file con lo stesso nome, ma con **corpo diverso**:

- versione del modulo: `laravel/Modules/Lang/docs/00-index.md`
- versione recuperata: `laravel/Modules/Lang/docs/wiki/integrations/_da-riconciliare/00-index.md`

Vanno confrontate e fuse a mano. Quando la fusione e' fatta, questo file e la nota vanno rimossi.

Vedi [XOT-5.39](../../../stories/5.39.wiki-integrations-ownership.story.md).

### `wiki/integrations/_da-riconciliare/correzioni-errori-sintassi.md` — Correzioni Errori Sintassi File Traduzione - Gennaio 2025


# Correzioni Errori Sintassi File Traduzione - Gennaio 2025

## Riepilogo Problemi Risolti

### Errori Critici Identificati

1. **Dichiarazione `declare(strict_types=1)` posizionata erroneamente**
   - **File**: `laravel/Modules/Chart/lang/it/mixed_chart.php`
   - **Problema**: `declare(strict_types=1);` posizionato dopo `return`
   - **Soluzione**: Spostato prima di `return`

2. **Traduzioni non tradotte (chiavi inglesi)**
   - **File**: Tutti i file corretti
   - **Problema**: Valori impostati a chiavi non tradotte (es. `'label' => 'id'`)
   - **Soluzione**: Sostituite con traduzioni appropriate in italiano

3. **Struttura array non conforme**
   - **Problema**: Indentazione inconsistente e struttura non standard
   - **Soluzione**: Standardizzata struttura con indentazione coerente

### `wiki/integrations/_da-riconciliare/coverage.divergenza.md` — Divergenza: `coverage.md`


# Divergenza: `coverage.md`

Questo file veniva da `docs/wiki/integrations/modules/lang/coverage.md`, cancellato dal working tree senza migrazione. Il modulo ha gia' un file con lo stesso nome, ma con **corpo diverso**:

- versione del modulo: `laravel/Modules/Lang/docs/coverage.md`
- versione recuperata: `laravel/Modules/Lang/docs/wiki/integrations/_da-riconciliare/coverage.md`

Vanno confrontate e fuse a mano. Quando la fusione e' fatta, questo file e la nota vanno rimossi.

Vedi [XOT-5.39](../../../stories/5.39.wiki-integrations-ownership.story.md).

### `wiki/integrations/_da-riconciliare/coverage.md` — Code Coverage: Lang

# Code Coverage: Lang

**Date:** 2026-01-17
**Lines Coverage:** N/A (Failed to parse)
**Test Exit Code:** 2

## Output

```text
──────────────────────────────────────────────────  
   FAILED  Modules\Lang\tests\Feature\LangBusinessLogicTest > `Lang Business Lo…  Error   
  Call to a member function connection() on null

  at vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php:1980
    1976▕      * @return \Illuminate\Database\Connection
    1977▕      */
    1978▕     public static function resolveConnection($connection = null)
    1979▕     {
  ➜ 1980▕         return static::$resolver->connection($connection);
    1981▕     }

### `wiki/integrations/_da-riconciliare/file-naming.divergenza.md` — Divergenza: `file-naming.md`


# Divergenza: `file-naming.md`

Questo file veniva da `docs/wiki/integrations/modules/lang/file-naming.md`, cancellato dal working tree senza migrazione. Il modulo ha gia' un file con lo stesso nome, ma con **corpo diverso**:

- versione del modulo: `laravel/Modules/Lang/docs/file-naming.md`
- versione recuperata: `laravel/Modules/Lang/docs/wiki/integrations/_da-riconciliare/file-naming.md`

Vanno confrontate e fuse a mano. Quando la fusione e' fatta, questo file e la nota vanno rimossi.

Vedi [XOT-5.39](../../../stories/5.39.wiki-integrations-ownership.story.md).

### `wiki/integrations/_da-riconciliare/file-naming.md` — Regole di Naming per File

type: rule
tags: [migration, filament]
created: 2026-07-14
updated: 2026-07-14
qmd: "migration filament"
related:
  - "./italian-text-refined-audit-report.md"
---
# Regole di Naming per File

## 🎯 Regola Fondamentale: NO Duplicati Case-Insensitive

### Problema

Su filesystem case-insensitive (Windows, macOS default), file con nomi che differiscono solo per maiuscole/minuscole causano conflitti:

```
❌ ERRATO - Duplicati case-insensitive:
- README.md e README.md
- Activity.php e activity.php

### `wiki/integrations/_da-riconciliare/index-2.divergenza.md` — Divergenza: `index-3.md`


# Divergenza: `index-3.md`

Questo file veniva da `index-3.md`, cancellato dal working tree senza migrazione. Il modulo ha gia' un file con lo stesso nome, ma con **corpo diverso**:

- versione del modulo: `laravel/Modules/Lang/docs/index-2.md`
- versione recuperata: `laravel/Modules/Lang/docs/wiki/integrations/_da-riconciliare/index-2.md`

Vanno confrontate e fuse a mano. Quando la fusione e' fatta, questo file e la nota vanno rimossi.

Vedi [XOT-5.39](../../../stories/5.39.wiki-integrations-ownership.story.md).

### `wiki/integrations/_da-riconciliare/index-3.divergenza.md` — Divergenza: `index-4.divergenza.md`


# Divergenza: `index-4.divergenza.md`

Questo file veniva da `docs/wiki/integrations/modules/lang/INDEX.md`, cancellato dal working tree senza migrazione. Il modulo ha gia' un file con lo stesso nome, ma con **corpo diverso**:

- versione del modulo: `laravel/Modules/Lang/docs/index.md`
- versione recuperata: `laravel/Modules/Lang/docs/wiki/integrations/_da-riconciliare/index-4.divergenza.md`

Vanno confrontate e fuse a mano. Quando la fusione e' fatta, questo file e la nota vanno rimossi.

Vedi [XOT-5.39](../../../stories/5.39.wiki-integrations-ownership.story.md).

### `wiki/integrations/_da-riconciliare/index-4.divergenza.md` — lang — integrations


# lang — integrations

Documentation for `lang` module categorized as **integrations**.

## Files

- [`00-INDEX.md`](./00-index.md)
- [`00-index.md`](./00-index.md)
- [`index-4.divergenza.md`](./index.md)
- [`LOCALE_MANAGEMENT.md`](./LOCALE_MANAGEMENT.md)
- [`MCAMARA_IMPLEMENTATION_GUIDE.md`](./MCAMARA_IMPLEMENTATION_GUIDE.md)
- [`METODI_DUPLICATI_ANALISI.md`](./METODI_DUPLICATI_ANALISI.md)
- [`MIGRATIONS.md`](./MIGRATIONS.md)
- [`on-demand-pattern-4.divergenza.md`](./on-demand-pattern-4.divergenza.md)
- [`performance-optimization-4.divergenza.md`](./performance-optimization-4.divergenza.md)
- [`phpstan-fixes.md`](./phpstan-fixes.md)
- [`PHPSTAN_L10.md`](./PHPSTAN_L10.md)
- [`PHPSTAN_STATUS.md`](./PHPSTAN_STATUS.md)
- [`PRODUCT_LAUNCH_PLAN.md`](./PRODUCT_LAUNCH_PLAN.md)

### `wiki/integrations/_da-riconciliare/index.divergenza.md` — Divergenza: `index.md`


# Divergenza: `index.md`

Questo file veniva da `docs/wiki/integrations/modules/lang/index.md`, cancellato dal working tree senza migrazione. Il modulo ha gia' un file con lo stesso nome, ma con **corpo diverso**:

- versione del modulo: `laravel/Modules/Lang/docs/index.md`
- versione recuperata: `laravel/Modules/Lang/docs/wiki/integrations/_da-riconciliare/index.md`

Vanno confrontate e fuse a mano. Quando la fusione e' fatta, questo file e la nota vanno rimossi.

Vedi [XOT-5.39](../../../stories/5.39.wiki-integrations-ownership.story.md).

### `wiki/integrations/_da-riconciliare/locale-management.md` — Gestione delle Lingue in Laravel


# Gestione delle Lingue in Laravel

## Indice
1. [Configurazione Base](#configurazione-base)
2. [Gestione delle Lingue](#gestione-delle-lingue)
3. [Middleware per la Lingua](#middleware-per-la-lingua)
4. [Best Practice](#best-practice)
5. [Implementazione nel Progetto](#implementazione-nel-progetto)
6. [Risoluzione Problemi](#risoluzione-problemi)

## Configurazione Base

### File di Configurazione Principale

`config/app.php`:
```php
'locale' => 'it',  // Lingua predefinita
'fallback_locale' => 'en',  // Lingua di fallback
'faker_locale' => 'it_IT',  // Impostazioni localizzazione per Faker

### `wiki/integrations/_da-riconciliare/mcamara-implementation-guide.md` — Guida all'Implementazione di mcamara/laravel-localization


# Guida all'Implementazione di mcamara/laravel-localization

## Indice
1. [Panoramica](#panoramica)
2. [Installazione](#installazione)
3. [Configurazione](#configurazione)
4. [Gestione delle Route](#gestione-delle-route)
5. [Interruttore di Lingua](#interruttore-di-lingua)
6. [Traduzione delle Route](#traduzione-delle-route)
7. [Gestione della Cache](#gestione-della-cache)
8. [Risoluzione dei Problemi](#risoluzione-dei-problemi)
9. [Best Practice](#best-practice)

## Panoramica

Il pacchetto `mcamara/laravel-localization` fornisce un sistema completo per la gestione della localizzazione in Laravel, con particolare attenzione alla traduzione delle route e alla gestione delle lingue.

## Installazione


### `wiki/integrations/_da-riconciliare/metodiuplicati-analisi.divergenza.md` — Divergenza: `metodiuplicati-analisi.md`


# Divergenza: `metodiuplicati-analisi.md`

Questo file veniva da `docs/wiki/integrations/modules/lang/metodiuplicati-analisi.md`, cancellato dal working tree senza migrazione. Il modulo ha gia' un file con lo stesso nome, ma con **corpo diverso**:

- versione del modulo: `laravel/Modules/Lang/docs/metodiuplicati-analisi.md`
- versione recuperata: `laravel/Modules/Lang/docs/wiki/integrations/_da-riconciliare/metodiuplicati-analisi.md`

Vanno confrontate e fuse a mano. Quando la fusione e' fatta, questo file e la nota vanno rimossi.

Vedi [XOT-5.39](../../../stories/5.39.wiki-integrations-ownership.story.md).

### `wiki/integrations/_da-riconciliare/metodiuplicati-analisi.md` — 🐄⚡ ANALISI METODI DUPLICATI - SUPER MUCCA EDITION

# 🐄⚡ ANALISI METODI DUPLICATI - SUPER MUCCA EDITION

**Powered by**: Super Mucca AI 🐄✨
**Versione**: 2.0 ULTIMATE
**Confidenza**: 99.9% (Dati Reali dal Codice)

---

## 🎯 Executive Summary

Analisi **REALE e APPROFONDITA** di **18 moduli** + **2 temi** del framework Laraxot/Filament.

### Dati Chiave (VERIFICATI)

| Metrica | Valore | Fonte |
|---------|--------|-------|
| **Moduli Analizzati** | 18 | Directory scan |
| **Temi Analizzati** | 2 (Sixteen, TwentyOne) | Directory scan |
| **BaseModel Totali** | 10 | File count |
| **LOC BaseModel** | 578 linee | wc -l |

### `wiki/integrations/_da-riconciliare/model-translations.divergenza.md` — Divergenza: `model_translations.md`


# Divergenza: `model_translations.md`

Questo file veniva da `docs/wiki/integrations/modules/lang/model_translations.md`, cancellato dal working tree senza migrazione. Il modulo ha gia' un file con lo stesso nome, ma con **corpo diverso**:

- versione del modulo: `laravel/Modules/Lang/docs/model-translations.md`
- versione recuperata: `laravel/Modules/Lang/docs/wiki/integrations/_da-riconciliare/model_translations.md`

Vanno confrontate e fuse a mano. Quando la fusione e' fatta, questo file e la nota vanno rimossi.

Vedi [XOT-5.39](../../../stories/5.39.wiki-integrations-ownership.story.md).

### `wiki/integrations/_da-riconciliare/module-analysis.divergenza.md` — Divergenza: `module-analysis.md`


# Divergenza: `module-analysis.md`

Questo file veniva da `docs/wiki/integrations/modules/lang/module-analysis.md`, cancellato dal working tree senza migrazione. Il modulo ha gia' un file con lo stesso nome, ma con **corpo diverso**:

- versione del modulo: `laravel/Modules/Lang/docs/module-analysis.md`
- versione recuperata: `laravel/Modules/Lang/docs/wiki/integrations/_da-riconciliare/module-analysis.md`

Vanno confrontate e fuse a mano. Quando la fusione e' fatta, questo file e la nota vanno rimossi.

Vedi [XOT-5.39](../../../stories/5.39.wiki-integrations-ownership.story.md).

### `wiki/integrations/_da-riconciliare/module-analysis.md` — Lang Module - Comprehensive Analysis

# Lang Module - Comprehensive Analysis

## Module Overview
**Module Name**: Lang  
**Type**: Localization & Translation Module  
**Status**: ✅ Active  
**Framework**: Laravel 13.x + Filament 4.x  
**Translation System**: Laravel Localization + Advanced Features  
**Language**: Multi-language (IT/EN/DE + 7 more)  

## Purpose
The Lang module provides comprehensive localization and translation management:

- Multi-language content management
- Translation file management and editing
- Real-time translation updates
- Language fallback and negotiation
- Translation management interface
- Automatic translation tools integration
- Content localization for different regions

### `wiki/integrations/_da-riconciliare/performance-optimization.divergenza.md` — Divergenza: `performance-optimization.md`


# Divergenza: `performance-optimization.md`

Questo file veniva da `docs/wiki/integrations/modules/lang/performance-optimization.md`, cancellato dal working tree senza migrazione. Il modulo ha gia' un file con lo stesso nome, ma con **corpo diverso**:

- versione del modulo: `laravel/Modules/Lang/docs/performance-optimization.md`
- versione recuperata: `laravel/Modules/Lang/docs/wiki/integrations/_da-riconciliare/performance-optimization.md`

Vanno confrontate e fuse a mano. Quando la fusione e' fatta, questo file e la nota vanno rimossi.

Vedi [XOT-5.39](../../../stories/5.39.wiki-integrations-ownership.story.md).

### `wiki/integrations/_da-riconciliare/phpstan-fixes.divergenza.md` — Divergenza: `phpstan-fixes.md`


# Divergenza: `phpstan-fixes.md`

Questo file veniva da `docs/wiki/integrations/modules/lang/PHPSTAN-FIXES.md`, cancellato dal working tree senza migrazione. Il modulo ha gia' un file con lo stesso nome, ma con **corpo diverso**:

- versione del modulo: `laravel/Modules/Lang/docs/phpstan-fixes.md`
- versione recuperata: `laravel/Modules/Lang/docs/wiki/integrations/_da-riconciliare/phpstan-fixes.md`

Vanno confrontate e fuse a mano. Quando la fusione e' fatta, questo file e la nota vanno rimossi.

Vedi [XOT-5.39](../../../stories/5.39.wiki-integrations-ownership.story.md).

### `wiki/integrations/_da-riconciliare/phpstan-fixes.md` — PHPStan Compliance Documentation


# PHPStan Compliance Documentation

## Overview

Documenta tutti i fix di compliance PHPStan implementati per raggiungere 0 errori a livello max.

## Errori Corretti

### 1. TranslationFileResource - Lang Module

**File**: `app/Filament/Resources/TranslationFileResource/Pages/EditTranslationFile.php`

**Errori Originali**:
- `parameter.type` su `$data['content']`
- `return.type` per `makeFromArray()`
- `identifier: missingType.iterableValue`

**Soluzioni Implementate**:
```php

### `wiki/integrations/_da-riconciliare/prd.divergenza.md` — Divergenza: `prd.md`


# Divergenza: `prd.md`

Questo file veniva da `docs/wiki/integrations/modules/lang/prd.md`, cancellato dal working tree senza migrazione. Il modulo ha gia' un file con lo stesso nome, ma con **corpo diverso**:

- versione del modulo: `laravel/Modules/Lang/docs/prd.md`
- versione recuperata: `laravel/Modules/Lang/docs/wiki/integrations/_da-riconciliare/prd.md`

Vanno confrontate e fuse a mano. Quando la fusione e' fatta, questo file e la nota vanno rimossi.

Vedi [XOT-5.39](../../../stories/5.39.wiki-integrations-ownership.story.md).

### `wiki/integrations/_da-riconciliare/prd.md` — PRD: Lang Module

# PRD: Lang Module

## 📋 Overview
- **Author:** Gemini CLI
- **Status:** Approved
- **Target Release:** 1.0.0

## ❓ Problem Statement
Managing translations across 30+ modules leads to missing keys, hardcoded strings, and inconsistent language support.

## 🎯 Goals & Success Metrics
- **Goal 1:** Zero Hardcoded Strings -> **Metric:** `translation-check` tool passes 100%.
- **Goal 2:** Universal Support -> **Metric:** Italian and English provided for 100% of keys.
- **Goal 3:** Dynamic Switching -> **Metric:** Support for 10+ languages with minimal overhead.

## 👤 User Stories
- As a **User**, I want to see the application in my preferred language automatically.
- As a **Developer**, I want to use `trans()` or `__()` and have the keys automatically created if they are missing.

## 🛠️ Function

### `wiki/integrations/_da-riconciliare/project-structure.divergenza.md` — Divergenza: `../../../project-structure.md`


# Divergenza: `../../../project-structure.md`

Questo file veniva da `docs/wiki/integrations/modules/lang/project-structure.md`, cancellato dal working tree senza migrazione. Il modulo ha gia' un file con lo stesso nome, ma con **corpo diverso**:

- versione del modulo: `laravel/Modules/Lang/docs/project-structure.md`
- versione recuperata: `laravel/Modules/Lang/docs/project-structure.md`

Vanno confrontate e fuse a mano. Quando la fusione e' fatta, questo file e la nota vanno rimossi.

Vedi [XOT-5.39](../../../stories/5.39.wiki-integrations-ownership.story.md).

### `wiki/integrations/_da-riconciliare/quality-analysis.divergenza.md` — Divergenza: `quality-analysis.md`


# Divergenza: `quality-analysis.md`

Questo file veniva da `docs/wiki/integrations/modules/lang/quality-analysis.md`, cancellato dal working tree senza migrazione. Il modulo ha gia' un file con lo stesso nome, ma con **corpo diverso**:

- versione del modulo: `laravel/Modules/Lang/docs/quality-analysis.md`
- versione recuperata: `laravel/Modules/Lang/docs/wiki/integrations/_da-riconciliare/quality-analysis.md`

Vanno confrontate e fuse a mano. Quando la fusione e' fatta, questo file e la nota vanno rimossi.

Vedi [XOT-5.39](../../../stories/5.39.wiki-integrations-ownership.story.md).

### `wiki/integrations/_da-riconciliare/quality-improvements.divergenza.md` — Divergenza: `quality-improvements.md`


# Divergenza: `quality-improvements.md`

Questo file veniva da `docs/wiki/integrations/modules/lang/quality-improvements.md`, cancellato dal working tree senza migrazione. Il modulo ha gia' un file con lo stesso nome, ma con **corpo diverso**:

- versione del modulo: `laravel/Modules/Lang/docs/quality-improvements.md`
- versione recuperata: `laravel/Modules/Lang/docs/wiki/integrations/_da-riconciliare/quality-improvements.md`

Vanno confrontate e fuse a mano. Quando la fusione e' fatta, questo file e la nota vanno rimossi.

Vedi [XOT-5.39](../../../stories/5.39.wiki-integrations-ownership.story.md).

### `wiki/integrations/_da-riconciliare/readme-en.divergenza.md` — Divergenza: `readme-en.md`


# Divergenza: `readme-en.md`

Questo file veniva da `docs/wiki/integrations/modules/lang/readme-en.md`, cancellato dal working tree senza migrazione. Il modulo ha gia' un file con lo stesso nome, ma con **corpo diverso**:

- versione del modulo: `laravel/Modules/Lang/docs/readme-en.md`
- versione recuperata: `laravel/Modules/Lang/docs/wiki/integrations/_da-riconciliare/readme-en.md`

Vanno confrontate e fuse a mano. Quando la fusione e' fatta, questo file e la nota vanno rimossi.

Vedi [XOT-5.39](../../../stories/5.39.wiki-integrations-ownership.story.md).

### `wiki/integrations/_da-riconciliare/readme-en.md` — 🌐 Lang — English presentation

# 🌐 Lang — English presentation

[![Domain-i18n](https://img.shields.io/badge/Domain-i18n-5E35B1.svg)](#)
[![Laravel 13](https://img.shields.io/badge/Laravel-12-red.svg)](https://laravel.com/)
[![Filament 5](https://img.shields.io/badge/Filament-5-ffab00.svg)](https://filamentphp.com/)
[![PHP 8.4+](https://img.shields.io/badge/PHP-8.4+-777BB4.svg)](https://php.net/)
[![PHPStan Level 10](https://img.shields.io/badge/PHPStan-Level%2010-brightgreen.svg)](https://phpstan.org/)
[![PSR-12](https://img.shields.io/badge/Code-PSR--12-blue.svg)](https://www.php-fig.org/psr/psr-12/)
[![Strict Types](https://img.shields.io/badge/PHP-strict__types-1-informational.svg)](#)
[![Laraxot Modules](https://img.shields.io/badge/Architecture-Modular-purple.svg)](#)
[![<nome progetto> Platform](https://img.shiel

### `wiki/integrations/_da-riconciliare/release-marketing-standard.divergenza.md` — Divergenza: `release-marketing-standard.md`


# Divergenza: `release-marketing-standard.md`

Questo file veniva da `docs/wiki/integrations/modules/lang/release-marketing-standard.md`, cancellato dal working tree senza migrazione. Il modulo ha gia' un file con lo stesso nome, ma con **corpo diverso**:

- versione del modulo: `laravel/Modules/Lang/docs/release-marketing-standard.md`
- versione recuperata: `laravel/Modules/Lang/docs/wiki/integrations/_da-riconciliare/release-marketing-standard.md`

Vanno confrontate e fuse a mano. Quando la fusione e' fatta, questo file e la nota vanno rimossi.

Vedi [XOT-5.39](../../../stories/5.39.wiki-integrations-ownership.story.md).

### `wiki/integrations/_da-riconciliare/release-marketing-standard.md` — Release e README marketing — Lang


# Release e README marketing — Lang

## Scopo

Ogni modulo/tema deve essere pubblicabile, comprensibile e desiderabile: workflow release, changelog automatico e README vetrina.

## File canonici locali

- `../README.md`
- `../.github/workflows/semantic-release.yml`
- `../.releaserc.json`
- `../CHANGELOG.md`

## Confidenza

La configurazione usa semantic-release con Conventional Commits, changelog, GitHub release e commit automatico del changelog.

### `wiki/integrations/_da-riconciliare/riepilogo-correzioni-traduzioni.md` — Riepilogo Correzioni Traduzioni - Gennaio 2025


# Riepilogo Correzioni Traduzioni - Gennaio 2025

## Problemi Risolti

### 1. Errori di Sintassi nei File di Traduzione ✅ RISOLTI

**File corretti (11 totali):**
1. **Chart/lang/it/chart.php** - Grafici e visualizzazioni
2. **Chart/lang/it/mixed_chart.php** - Grafici misti (errore critico risolto)
3. **FormBuilder/lang/it/collection_lang.php** - Collezioni form builder
4. **FormBuilder/lang/it/field.php** - Campi form builder
5. **FormBuilder/lang/it/field_option.php** - Opzioni campi form builder
6. **Lang/lang/it/translation_file.php** - File di traduzione
7. **Notify/lang/it/send_whats_app.php** - Notifiche WhatsApp
8. **UI/lang/it/collection_lang.php** - Collezioni UI
9. **UI/lang/it/field.php** - Campi UI
10. **UI/lang/it/field_option.php** - Opzioni campi UI
11. **UI/lang/it/s3_test

### `wiki/integrations/_da-riconciliare/traduzioni-navigation.md` — Traduzioni con ".navigation" - Audit Completo 2025


# Traduzioni con ".navigation" - Audit Completo 2025

## Riepilogo Problema
Molte traduzioni utilizzano ancora il pattern `.navigation` invece di traduzioni appropriate. Questo causa problemi di coerenza e manutenibilità.

## File Identificati con Problemi

### 1. Modules/User/lang/it/permission.php ✅ CORRETTO
**Stato**: File già corretto - non contiene traduzioni `.navigation`

### 2. Modules/Lang/lang/en/edit_translation_file.php ✅ CORRETTO
**Problema**: Multiple traduzioni con pattern `.navigation`
**Soluzione**: Sostituite tutte le traduzioni `.navigation` con traduzioni appropriate in inglese

**Traduzioni corrette implementate**:
- `content.navigation.name` → `Navigation Name`
- `content.navigation.plural` → `Navigation Plural`
- `content.navigation.group.name` → `Group Name`
- `con

### `wiki/integrations/_da-riconciliare/translation-audit-completion.md` — Audit Traduzioni Completato - 2025


# Audit Traduzioni Completato - 2025

## Riepilogo Lavoro Effettuato

### Problema Identificato
Durante l'audit delle traduzioni del progetto <nome progetto>, sono state identificate numerose traduzioni italiane presenti in file di lingua tedesca e inglese, causando incoerenza nell'interfaccia utente.

### Pattern di Errore
- **Errore**: `'required' => 'Campo obbligatorio'` in file `lang/de/` e `lang/en/`
- **Impatto**: Interfaccia utente non localizzata correttamente
- **Estensione**: 10 moduli principali affetti

## Correzioni Effettuate

### Moduli Corretti

#### ✅ Modulo Lang
- **File**: `lang/de/lang_service.php`
- **Correzione**: `'required' => 'Das Feld :attribute ist erforderlich'`

### `wiki/integrations/_da-riconciliare/translation-process.md` — Processo di Traduzione: Da Sviluppatore a Traduttore


# Processo di Traduzione: Da Sviluppatore a Traduttore

## Indice
1. [Introduzione](#introduzione)
2. [Struttura dei File di Traduzione](#struttura-dei-file-di-traduzione)
3. [Preparazione per i Traduttori](#preparazione-per-i-traduttori)
4. [Strumenti Consigliati](#strumenti-consigliati)
5. [Integrazione con il Flusso di Lavoro](#integrazione-con-il-flusso-di-lavoro)
6. [Best Practice](#best-practice)
7. [Automazione](#automazione)

## Introduzione

Questo documento descrive il processo di gestione delle traduzioni nel progetto <nome progetto>, con particolare attenzione alla collaborazione tra sviluppatori e traduttori.

## Struttura dei File di Traduzione

### File JSON (Traduzioni Globali)


### `wiki/integrations/_da-riconciliare/translation-strategies.md` — Strategie di Gestione delle Traduzioni in Laravel


# Strategie di Gestione delle Traduzioni in Laravel

## Indice
1. [Panoramica](#panoramica)
2. [File PHP vs JSON](#file-php-vs-json)
3. [Struttura delle Cartelle](#struttura-delle-cartelle)
4. [Helper di Traduzione](#helper-di-traduzione)
5. [Best Practice](#best-practice)
6. [Implementazione nel Progetto](#implementazione-nel-progetto)
7. [Migrazione tra Formati](#migrazione-tra-formati)
8. [Processo Dev → Traduttore: Strategia Operativa](#processo-dev-→-traduttore-strategia-operativa)
9. [Gestione Plurale/Singolare nelle Traduzioni](#gestione-plurale-singolare-nelle-traduzioni)

## Panoramica

In Laravel, esistono due approcci principali per gestire le traduzioni:
- **File PHP**: tradizionale, con struttura ad array
- **File JSON**: più moderno, con chiavi testuali


### `wiki/integrations/_da-riconciliare/validation-messages.divergenza.md` — Divergenza: `validation-messages.md`


# Divergenza: `validation-messages.md`

Questo file veniva da `docs/wiki/integrations/modules/lang/validation-messages.md`, cancellato dal working tree senza migrazione. Il modulo ha gia' un file con lo stesso nome, ma con **corpo diverso**:

- versione del modulo: `laravel/Modules/Lang/docs/validation-messages.md`
- versione recuperata: `laravel/Modules/Lang/docs/wiki/integrations/_da-riconciliare/validation-messages.md`

Vanno confrontate e fuse a mano. Quando la fusione e' fatta, questo file e la nota vanno rimossi.

Vedi [XOT-5.39](../../../stories/5.39.wiki-integrations-ownership.story.md).

### `wiki/integrations/conflict-consolidated.md` — conflict — Consolidated Documentation


# conflict — Consolidated Documentation

Consolidated from **17** individual files.

## Table of Contents

- [---](#conflict-resolution-autolabelaction)
- [---](#conflict-resolution-edit-translation-file)
- [---](#conflict-resolution-edittranslationfile-class)
- [---](#conflict-resolution-langserviceprovider)
- [---](#conflict-resolution-readtranslationfileaction)
- [---](#conflict-resolution-translation-file-syntax)
- [---](#conflict-resolution-writetranslationfileaction)
- [---](#conflict-resolution)
- [---](#conflict_resolution_autolabelaction)
- [---](#conflict_resolution_edit_translation_file)
- [---](#conflict_resolution_edittranslationfile_class)
- [---](#conflict_resolution_langserviceprovider)
- [---](#conflict_resolution_readtranslationfileaction)

### `wiki/integrations/fixes-consolidated.md` — fixes — Consolidated Documentation


# fixes — Consolidated Documentation

Consolidated from **6** individual files.

## Table of Contents

- [---](#fixes-errori-sintassi)
- [---](#fixes-syntax-error-transarrayaction)
- [---](#fixes-syntax-errors)
- [---](#fixes-syntax-transarrayaction)
- [---](#fixes-syntaxs)
- [---](#fixesi-sintassi)

---

## fixes-errori-sintassi

*Consolidated from: `fixes-errori-sintassi.md`*


### `wiki/integrations/graphify-map.md` — Lang Module — Mappa Graphify


# Lang Module — Mappa Graphify

**Versione:** 1.0.0 | **Modulo:** Lang | **Data:** 2026-08-02

---

## 📌 Cosa fa il modulo Lang

Il modulo **Lang** gestisce:
- **Gestione traduzioni** — CRUD traduzioni per molteplici lingue (IT, EN, DE)
- **Sincronizzazione file translation** — lettura/scrittura file `.php` per lingue supportate
- **Fallback chain e locale switching** — cambio lingua dinamico con fallback chain
- **Integrazione Filament** — UI admin per gestire traduzioni e file di traduzione
- **Database-backed translations** — persistenza traduzioni su DB con `translations` e `language_lines`
- **Multi-module translation aggregation** — raccolta traduzioni da tutti i moduli

---

## 🏗️ Architettura Essenziale

### `wiki/integrations/lang-consolidated.md` — lang — Consolidated Documentation


# lang — Consolidated Documentation

Consolidated from **13** individual files.

## Table of Contents

- [---](#lang-link)
- [---](#lang-service-helper-text-fix)
- [---](#lang-service-helper-text)
- [---](#lang-service-provider-backlink)
- [---](#lang-service-provider-improvements)
- [---](#lang-service-provider)
- [---](#lang-service-translation-updates-)
- [---](#lang-service-translation-updates)
- [---](#lang_link)
- [---](#lang_service_helper_text_fix)
- [---](#lang_service_provider)
- [---](#lang_service_provider_improvements)
- [---](#langbase-classes-requirements)

### `wiki/integrations/laravel-consolidated.md` — laravel — Consolidated Documentation


# laravel — Consolidated Documentation

Consolidated from **23** individual files.

## Table of Contents

- [---](#laravel-13-upgrade)
- [---](#laravel-localization-best-practices)
- [---](#laravel-localization-complete-guide)
- [---](#laravel-localization-complete)
- [---](#laravel-localization-consolidated)
- [---](#laravel-localization-folio-integration)
- [---](#laravel-localization-folio)
- [---](#laravel-localization-implementation)
- [---](#laravel-localization-integration)
- [---](#laravel-localization-livewire-volt)
- [---](#laravel-localization-mcaa-reference)
- [---](#laravel-localization-mcamara-reference)
- [---](#laravel-localization-reference)

### `wiki/integrations/navigation-consolidated.md` — navigation — Consolidated Documentation


# navigation — Consolidated Documentation

Consolidated from **5** individual files.

## Table of Contents

- [---](#navigation-corrections)
- [---](#navigation-translations-completion)
- [---](#navigation-translations-fixes)
- [---](#navigation-translations)
- [---](#navigation-translationses)

---

## navigation-corrections

*Consolidated from: `navigation-corrections.md`*

title: "Correzioni Pattern '.navigation' - Gennaio 2025"

### `wiki/integrations/ottimizzazioni-consolidated.md` — ottimizzazioni — Consolidated Documentation


# ottimizzazioni — Consolidated Documentation

Consolidated from **5** individual files.

## Table of Contents

- [---](#ottimizzazioni-approfondite-modulo-lang)
- [---](#ottimizzazioni-correzioni)
- [---](#ottimizzazioni-lang)
- [---](#ottimizzazioni-super-dry-kiss)
- [---](#ottimizzazioni-superry-kiss)

---

## ottimizzazioni-approfondite-modulo-lang

*Consolidated from: `ottimizzazioni-approfondite-modulo-lang.md`*

title: "Ottimizzazioni Approfondite Modulo Lang - DRY + KISS"

### `wiki/integrations/phpstan-l10.md` — PHPStan Level 10 Compliance — Lang Module


# PHPStan Level 10 Compliance — Lang Module

## Summary

| Aspect | Value |
|--------|-------|
| **PHPStan L10** | ✅ 0 errors |
| **Status** | Complete |
| **Last verified** | 2026-08-02 |

## Patterns Applied

### 1. Language Line Types
```php
/**
 * @return Collection<LanguageLine>
 */
public function getLanguageLines(): Collection { }


### `wiki/integrations/phpstan-status.md` — PHPStan Status — Lang Module


# PHPStan Status — Lang Module

## Latest Analysis

- **Updated:** 2026-08-02
- **Status:** See `build/phpstan-final-2026-08-02.txt` for full results
- **Strategy:** See `build/PHPSTAN_102_ERRORS_CONSOLIDATED.md` for remediation plan

## Progress

- Fixed errors in this module are tracked in `docs/chat/`
- Lock coordination: Check `docs/chat/multi-agent-standing-coordination.md`

## Next Steps

Use BMAD orchestration per `build/PHPSTAN_102_ERRORS_CONSOLIDATED.md` Phase 1-3.

---
*This file is auto-generated. Do not edit manually.*

### `wiki/integrations/translation-consolidated.md` — translation — Consolidated Documentation


# translation — Consolidated Documentation

Consolidated from **65** individual files.

## Table of Contents

- [---](#translation-completion)
- [---](#translation-errors-correction-)
- [---](#translation-errors-correction)
- [---](#translation-field-structure-complete)
- [---](#translation-field-structure)
- [---](#translation-fields-mandatory-rule)
- [---](#translation-file-editor)
- [---](#translation-file-management)
- [---](#translation-file-syntax)
- [---](#translation-files-update-)
- [---](#translation-files-update-67b1d4)
- [---](#translation-files-update-conflict-67b1d4)
- [---](#translation-files-update)

### `wiki/overviews/business-logic-overview.md` — Lang Module - Business Logic Overview

# Lang Module - Business Logic Overview

## Core Business Logic Components

### 1. Multi-Language Content Management Architecture
The Lang module implements comprehensive internationalization (i18n) and localization (l10n) for healthcare applications, supporting multiple languages for patient communication and medical documentation.

#### Key Models

- **Language**: Core language definitions with ISO codes and regional variants
- **Translation**: Dynamic translation storage for database content
- **TranslationKey**: Translation key management with context and metadata
- **LocalizedContent**: Localized content versioning and approval workflows
- **LanguagePreference**: User and patient language preferences

#### Business Rules

- All patient-facing content must support multiple languages
- 

### `wiki/procedures/git-push-procedure.md` — Git Push Procedure — Lang Module


# Git Push Procedure — Lang Module

## Summary
Synchronize the Lang module on all configured GitHub remotes and document the resolution path.

## Module Context
- **Path**: `laravel/Modules/Lang`
- **Expected Branch**: `dev`
- **Discipline**: Git forward-only (no checkout/revert/rollback); study history but never undo changes

## Operational Procedure

### 1. Navigate to Module
```bash
cd laravel/Modules/Lang
```

### 2. Check Remotes
```bash

### `wiki/procedures/translation-study-guide.md` — Translation Study Guide — Laravel Lang Module


# Translation Study Guide — Laravel Lang Module

## Context
This module handles Laravel application translations. Translation errors have occurred in past development cycles, requiring deeper understanding of spatie/laravel-translatable.

## Study Resources

### Primary Reference
- **Spatie Laravel Translatable** (v6): https://spatie.be/docs/laravel-translatable/v6/introduction
- **GitHub Repository**: https://github.com/spatie/laravel-translatable

## Key Study Areas

1. **Model Setup**: How to configure translatable attributes on Eloquent models
2. **Data Structure**: Understanding translation storage (pivot table vs. JSON)
3. **Attribute Access**: Correct patterns for accessing translated fields
4. **Fallback Logic**: Handling missing translations and language fallbacks
5. **Query Filt

### `wiki/product/_da-riconciliare/index-2.divergenza.md` — lang — product


# lang — product

Documentation for `lang` module categorized as **product**.

## Files

- [`index-2.divergenza.md`](./index.md)
- [`product-strategy.md`](./product-strategy.md)
- [`strategy.md`](./strategy.md)

---
*Generated by Phase 2e wiki consolidation*

### `wiki/reference/case-conflicts.md` — Case-Insensitive File Conflicts

# Case-Insensitive File Conflicts

Nel modulo `Lang` sono presenti i seguenti duplicati con differenze solo di maiuscole/minuscole:

- `Modules/Lang/docs`: `LOCALE_MANAGEMENT.md`, `locale_management.md`
- `Modules/Lang/docs`: `QUICK_REFERENCE.md`, `quick_reference.md`
- `Modules/Lang/docs`: `TRANSLATION_STRATEGIES.md`, `translation_strategies.md`
- `Modules/Lang/docs`: `TRANSLATION_PROCESS.md`, `translation_process.md`
- `Modules/Lang/docs`: `MCAMARA_IMPLEMENTATION_GUIDE.md`, `mcamara_implementation_guide.md`
- `Modules/Lang/docs/translations`: `README.it.md`, `readme.it.md`
- `Modules/Lang/docs/translations`: `README.es.md`, `readme.es.md`

È necessario mantenere una sola variante per ogni file (ad esempio quella con il prefisso maiuscolo già utilizzato per altri documenti globali) e rimu

### `wiki/reference/case-sensitivity.md` — Case Sensitivity Rules - Lang Module

# Case Sensitivity Rules - Lang Module

## Problema / Problem

**NON possono esistere file con lo stesso nome che differiscono solo per maiuscole/minuscole nella stessa directory.**

Riferimento completo: [Xot Module Case Sensitivity Rules](../../xot/docs/case-sensitivity-rules.md)

## File/Directory Rimossi da Lang Module

I seguenti file/directory sono stati eliminati perché violavano le regole:

```
✗ Removed: database/Migrations/ (entire directory)
✓ Kept:    database/migrations/
```

## Convenzioni

### Directory Structure

### `wiki/reference/common-translations.md` — Errori comuni nei file di traduzione

# Errori comuni nei file di traduzione

## Errori di sintassi

### Parentesi mancanti in array annidati

Un errore comune nei file di traduzione è la mancanza di parentesi chiuse negli array annidati. Questo tipo di errore causa un `ParseError` che blocca l'intera applicazione.

**Esempio di errore**:
```php
'azione_esempio' =>
array (
  'label' => 'Etichetta azione',
'altra_azione' => // Manca la parentesi chiusa e la virgola dell'array precedente
```

**Correzione**:
```php
'azione_esempio' =>
array (

### `wiki/reference/translation-fallbacks.md` — Chaos Monkey Translation Fallbacks (Lang)

# Chaos Monkey Translation Fallbacks (Lang)

## Obiettivo
Evitare degrado funzionale quando Chaos Monkey altera file traduzione, chiavi o namespace.

## Rischi Ricorrenti
- Chiavi strutturate convertite in flat keys.
- Nodi obbligatori vuoti (`navigation`, `fields`, `actions`).
- Namespace tema errato (`meetup::` invece di `pub_theme::`).
- Override manuale con `->label()` che maschera il problema.

## Contromisure Immediate
1. Ripristinare struttura multilivello del file lingua.
2. Garantire nodi obbligatori valorizzati.
3. Verificare naming file componente (`register.php`, `event.php`, ecc.).
4. Eliminare label/placeholder/helperText manuali.
5. Validare fallback locale su lingua primaria (`it` dove previsto).

## Smoke Test
- Form Filament con etichette auto-generate.

### `wiki/rules/case-sensitivity-rules.md` — Case Sensitivity Rules - Lang Module

# Case Sensitivity Rules - Lang Module

## Problema / Problem

**NON possono esistere file con lo stesso nome che differiscono solo per maiuscole/minuscole nella stessa directory.**

Riferimento completo: [Xot Module Case Sensitivity Rules](../../xot/docs/case-sensitivity-rules.md)

## File/Directory Rimossi da Lang Module

I seguenti file/directory sono stati eliminati perché violavano le regole:

```
✗ Removed: database/Migrations/ (entire directory)
✗ Removed: database/migrations/Migrations/ (nested anti-pattern — 2026-07-01)
✓ Kept:    database/migrations/ (flat, solo file .php)
```

Dettaglio incidente e verifica: [wiki/concepts/migration-path-canonical.md](wiki/concepts/migration-path-canonical.md).


### `wiki/rules/translation-factory-auto-increment-id.md` — Translation factory: auto-increment id


# Translation factory: auto-increment id

## Regola

`translations.id` e' creato con `$table->id()`, quindi `TranslationFactory` non deve valorizzare manualmente `id`.

Vietato:

```php
'id' => fake()->randomNumber(5),
```

Corretto: lasciare che sqlite/mysql assegnino l'id auto-increment.

## Perche'

Durante i run Pest coverage di STORY-345, `TranslationFactory` ha generato un `id` gia' presente nel database condiviso `database.sqlite`, causando:

```text

### `wiki/rules/translation-key-governance.md` — Translation Key Governance


# Translation Key Governance

## Regola

Nel progetto Laraxot le traduzioni devono restare:

- nel modulo owner della business logic
- sotto `lang/{locale}/...`, non `resources/lang/...`
- richiamate con chiavi semantiche, non con frasi inline

## Conseguenze operative

- **mai** usare frasi complete come chiavi di traduzione
- **mai** usare `->label()` come sorgente primaria delle label Filament
- le label devono essere risolte dal `LangServiceProvider` e dai file lingua
- se una funzionalita' appartiene a un modulo, la copy deve vivere nel modulo, non nel tema

## Pattern minimo corretto


### `wiki/tasks/lang-phpstan-level-10.md` — Task: Lang PHPStan Level 10

# Task: Lang PHPStan Level 10

## 📋 Obiettivo
Portare il modulo Lang dal Livello 9 al Livello 10 di PHPStan, eliminando ogni incertezza residua sui tipi, specialmente nelle azioni di manipolazione dei file di traduzione.

## 🚨 Azioni Richieste
- Analizzare gli errori segnalati al Livello 10.
- Risolvere i problemi di covarianza nelle Collection.
- Tipizzare rigorosamente gli array di traduzione estratti dai file.
- Verificare le signature dei metodi che estendono pacchetti esterni (`mcamara`, `spatie`).

## ✅ Checklist
- [ ] Eseguire `vendor/bin/phpstan analyse Modules/Lang --level=10`.
- [ ] Risolvere errori in `Providers/LangServiceProvider.php`.
- [ ] Risolvere errori nelle Actions di lettura/scrittura file.
- [ ] Verificare conformità totale senza l'uso di `mixed`.

## 🔗 Riferimenti
- 

### `wiki/topics/advanced-language.md` — Topic advanced-language


# Topic advanced-language

Sintesi automatica di 6 documenti (chiave `advanced-language`).

## Advanced Language Switching Strategies

_Fonte: `advanced-language-switching.md`_

# Advanced Language Switching Strategies

## Overview
In a healthcare application like `<nome progetto>`, providing a seamless multi-language experience is crucial for accessibility and user satisfaction. This document explores advanced strategies for language switching, building upon our existing URL-based approach.

## Combined URL and Session-Based Language Switching

For optimal user experience and SEO benefits, `<nome progetto>` can implement a hybrid approach combining URL-based language prefixes with session/database storage.

### Benefits
- SEO friendly URLs with language prefix (e.g., `/en/services`)

### `wiki/topics/ai-methodologies.md` — Topic ai-methodologies


# Topic ai-methodologies

Sintesi automatica di 3 documenti (chiave `ai-methodologies`).

## AI Methodologies Handbook

_Fonte: `ai-methodologies.md`_

# AI Methodologies Handbook

This file is a DRY local index for AI workflows in this module or theme.

## Canonical Sources

- [OpenViking Integration Guide](../../../../docs/openviking-integration.md)
- [AI Methodologies Integration](../../../../bashscripts/ai/wiki/memories/agent-conduct-tooling.md#ai-methodologies-integration)
- [Root Docs Index](../../../../docs/index.md)

## Local Workflow

### `wiki/topics/analysis-results.md` — Topic analysis-results


# Topic analysis-results

Sintesi automatica di 4 documenti (chiave `analysis-results`).

## Risultati Analisi Modulo Lang

_Fonte: `wiki/analysis-results.md`_

# Risultati Analisi Modulo Lang

## Data
2026-07-08

## Stato Codice
- PHPStan: ✅ **OK** (0 errori)
- PHPMD: Verificare con tool
- PHP Insights: Verificare con tool

## Modulo Summary

### `wiki/topics/automatic-translations.md` — Topic automatic-translations


# Topic automatic-translations

Sintesi automatica di 3 documenti (chiave `automatic-translations`).

## Traduzioni Automatiche con LangServiceProvider

_Fonte: `automatic-translations.md`_

# Traduzioni Automatiche con LangServiceProvider

## Regola Fondamentale
In il progetto, **NON utilizzare mai** il metodo `->label()` nei componenti Filament. Le etichette vengono gestite automaticamente dal `LangServiceProvider` attraverso i file di traduzione.

## Come Funziona

### 1. Registrazione Automatica
Il `LangServiceProvider` registra automaticamente tutti i componenti Filament (Field, Column, Filter, Step, ecc.) e applica le traduzioni basate su chiavi generate automaticamente.

```php

### `wiki/topics/conflict-resolution.md` — Topic conflict-resolution


# Topic conflict-resolution

Sintesi automatica di 8 documenti (chiave `conflict-resolution`).

## Risoluzione Conflitto AutoLabelAction

_Fonte: `conflict-resolution-autolabelaction.md`_

# Risoluzione Conflitto AutoLabelAction

## Problema Identificato

Il file `Modules/Lang/app/Actions/Filament/AutoLabelAction.php` presenta conflitti Git complessi relativi a:

1. **Linea 25**: Documentazione PHPDoc completa vs incompleta
2. **Linea 49**: Logica di debug vs logica semplificata
3. **Linea 108**: Concatenazione stringhe con spazi vs senza spazi
4. **Linea 185**: Concatenazione stringhe con spazi vs senza spazi


### `wiki/topics/documentation-link.md` — Topic documentation-link


# Topic documentation-link

Sintesi automatica di 7 documenti (chiave `documentation-link`).

## Convenzioni per i Link nella Documentazione

_Fonte: `documentation-link-conventions.md`_

# Convenzioni per i Link nella Documentazione

## Collegamenti correlati
- [Composer merge plugin](composer-merge-plugin.md)

## Regole Fondamentali per i Link Markdown

### 1. Utilizzare Sempre Percorsi Relativi

I collegamenti nei file di documentazione devono **sempre** utilizzare percorsi relativi, mai percorsi assoluti.


### `wiki/topics/enum-translation.md` — Topic enum-translation


# Topic enum-translation

Sintesi automatica di 5 documenti (chiave `enum-translation`).

## Enum Translation Pattern - Implementazione Regola Critica

_Fonte: `enum-translation-implementation.md`_

# Enum Translation Pattern - Implementazione Regola Critica

## Data: 27 Gennaio 2025

## Panoramica del Lavoro

Ho implementato e documentato la regola critica per le traduzioni degli enum usando `transClass()`, creando un sistema completo di regole, memorie e documentazione per garantire la conformità del progetto.

## Regola Critica Implementata

### ⚠️ REGOLA ASSOLUTA PER ENUM ⚠️

### `wiki/topics/filosofia-modulo.md` — Topic filosofia-modulo


# Topic filosofia-modulo

Sintesi automatica di 3 documenti (chiave `filosofia-modulo`).

## Analisi Approfondita del Modulo Lang

_Fonte: `filosofia-modulo-lang.md`_

# Analisi Approfondita del Modulo Lang

> **Generato**: 2025-12-24
> **Generato**: 2025-12-24
> **Generato**: [DATE]
> **Generato**: [DATE]
> **Generato**: [DATE]
> **Generato**: [DATE]
> **Generato**: 2025-12-24
> **Generato**: 2025-12-24
> **Scopo**: Documentare la filosofia, logica e architettura del modulo Lang

### `wiki/topics/google-translate.md` — Topic google-translate


# Topic google-translate

Sintesi automatica di 3 documenti (chiave `google-translate`).

## google-translate

_Fonte: `google-translate.md`_

https://medium.com/@mwaqasiu/translating-text-in-laravel-made-easy-with-translatetexthelper-and-google-translate-library-214c7c76d655

## google_translate

_Fonte: `integration/google-translate.md`_

# google_translate

<!-- Contenuto migrato da _docs/google_translate.txt -->

https://medium.com/@mwaqasiu/translating-text-in-laravel-made-easy-with-translatetexthelper-and-google-translate-library-214c7c76d655

### `wiki/topics/language-switcher.md` — Topic language-switcher


# Topic language-switcher

Sintesi automatica di 3 documenti (chiave `language-switcher`).

## Contratto del componente language switcher

_Fonte: `contracts/language-switcher-component.md`_

# Contratto del componente language switcher

## Input

- locale corrente fornito dall'applicazione;
- lingue supportate da `LaravelLocalization` tramite il widget Lang.

## Output

La view Blade riceve una collection di lingue con codice, nomi, bandiera e URL
localizzato già calcolato dal widget.

### `wiki/topics/laravel-localization.md` — Topic laravel-localization


# Topic laravel-localization

Sintesi automatica di 15 documenti (chiave `laravel-localization`).

## Laravel Localization Metadata for Cursor

_Fonte: `cursor/laravel-localization.md`_

# Laravel Localization Metadata for Cursor

## Context

This document provides metadata for Cursor about the integration of `mcamara/laravel-localization` into the `<nome progetto>` project.
# Laravel Localization Metadata for Cursor

## Context
This document provides metadata for Cursor about the integration of `mcamara/laravel-localization` into the `<nome progetto>ion market platform` project.

## Key Points

### `wiki/topics/localizing-dates.md` — Topic localizing-dates


# Topic localizing-dates

Sintesi automatica di 8 documenti (chiave `localizing-dates`).

## Localizzazione di Date e Valute

_Fonte: `localizing-dates-and-currencies.md`_

# Localizzazione di Date e Valute

## Introduzione

La localizzazione di date e valute è un aspetto cruciale per un'applicazione multilingue come `<nome progetto>`. Tradurre manualmente mesi, giorni e simboli di valuta per ogni lingua sarebbe un lavoro enorme. Fortunatamente, Laravel e PHP offrono strumenti potenti come Carbon per le date e `NumberFormatter` per le valute, che gestiscono automaticamente la formattazione in base alla lingua. Questa documentazione, basata sul corso di Laravel Daily, esplora come implementare queste funzionalità nel progetto `<nome progetto>`.

## Localizzazione di Date con Carbon

Carbon

### `wiki/topics/metodi-duplicati.md` — Topic metodi-duplicati


# Topic metodi-duplicati

Sintesi automatica di 3 documenti (chiave `metodi-duplicati`).

## 🐄⚡ ANALISI METODI DUPLICATI - SUPER MUCCA EDITION

_Fonte: `metodi-duplicati-analisi.md`_

# 🐄⚡ ANALISI METODI DUPLICATI - SUPER MUCCA EDITION

**Powered by**: Super Mucca AI 🐄✨
**Data**: 15 Ottobre 2025
**Data**: 15 Ottobre 2025
**Data**: 15 Ottobre 2025
**Data**: 15 Ottobre 2025
**Versione**: 2.0 ULTIMATE
**Confidenza**: 99.9% (Dati Reali dal Codice)

---

### `wiki/topics/model-translations.md` — Topic model-translations


# Topic model-translations

Sintesi automatica di 3 documenti (chiave `model-translations`).

## Model Translations in `<nome progetto>`

_Fonte: `model-translations.md`_

# Model Translations in `<nome progetto>`

## Overview
In a healthcare application like `<nome progetto>`, translating model data such as medical content, patient information, or service descriptions is critical for user accessibility across different languages. This document outlines how to implement model translations without packages and explores package-based solutions for more complex needs.

## Approach 1: Manual Model Translations (Without Packages)

This approach involves creating separate tables for translatable content, ensuring full control over the database structure and translation logic.

### Database Stru

### `wiki/topics/navigation-translations.md` — Topic navigation-translations


# Topic navigation-translations

Sintesi automatica di 5 documenti (chiave `navigation-translations`).

## Audit Traduzioni con ".navigation" - <nome progetto>

_Fonte: `navigation-translations-audit.md`_

# Audit Traduzioni con ".navigation" - <nome progetto>

## Panoramica
Questo documento elenca tutte le occorrenze di chiavi di traduzione che contengono ".navigation" nei file di lingua dei moduli. Queste chiavi violano le regole di traduzione e devono essere sistematizzate secondo i principi DRY + KISS.

## Regola Violata
**MAI** usare chiavi o valori che terminano con `.navigation` nei file di traduzione. Le chiavi devono essere esplicite e localizzate.

## Occorrenze Trovate

### Modulo User

### `wiki/topics/performance-optimization.md` — Topic performance-optimization


# Topic performance-optimization

Sintesi automatica di 4 documenti (chiave `performance-optimization`).

## Divergenza: `performance-optimization-3.md`

_Fonte: `wiki/integrations/_da-riconciliare/performance-optimization-2.divergenza.md`_

# Divergenza: `performance-optimization-3.md`

Questo file veniva da `performance-optimization-3.md`, cancellato dal working tree senza migrazione. Il modulo ha gia' un file con lo stesso nome, ma con **corpo diverso**:

- versione del modulo: `laravel/Modules/Lang/docs/performance-optimization-2.md`
- versione recuperata: `laravel/Modules/Lang/docs/wiki/integrations/_da-riconciliare/performance-optimization-2.md`

Vanno confrontate e fuse a mano. Quando la fusione e' fatta, questo file e la nota vanno rimossi.

Vedi [XOT-5.39](../../../stories/5.39.w

### `wiki/topics/pluralization-and.md` — Topic pluralization-and


# Topic pluralization-and

Sintesi automatica di 6 documenti (chiave `pluralization-and`).

## Plurale/Singolare e Localizzazione Date/Valute

_Fonte: `pluralization-and-localization.md`_

# Plurale/Singolare e Localizzazione Date/Valute

## Pluralizzazione

### Uso di `trans_choice()` e `@choice()`
- Per messaggi che variano in base al conteggio, usa `trans_choice()` o la direttiva Blade `@choice()`.
- Sintassi tipica in PHP:
  ```php
  // lang/en/messages.php
  return [
      'newMessageIndicator' => '{0} You have no new messages|{1} You have 1 new message|[2,*] You have :count new messages',

### `wiki/topics/project-structure.md` — Topic project-structure


# Topic project-structure

Sintesi automatica di 4 documenti (chiave `project-structure`).

## Project Structure — Module **Lang**

_Fonte: `project-structure.md`_

# Project Structure — Module **Lang**

## Directory Structure

\`\`\`
./laravel/Modules/Lang/docs/
├── wiki/                          # Knowledge base locale (LLM Wiki)
│   ├── index.md                  # Master catalog
│   ├── log.md                    # Activity log
│   ├── concepts/                 # Topic/theme pages
│   ├── entities/                 # Organization/person pages

### `wiki/topics/quality-analysis.md` — Topic quality-analysis


# Topic quality-analysis

Sintesi automatica di 3 documenti (chiave `quality-analysis`).

## Quality Analysis Report - Lang Module

_Fonte: `quality-analysis.md`_

# Quality Analysis Report - Lang Module
**Date**: 2025-11-11
**Date**: 2025-11-11
**Date**: [DATE]
**Date**: [DATE]
**Date**: [DATE]
**Date**: 2025-11-11
**Date**: 2025-11-11
**Analyst**: Claude Code
**Tools**: PHPStan Level 10, PHPInsights, PHPMD


### `wiki/topics/quality-improvements.md` — Topic quality-improvements


# Topic quality-improvements

Sintesi automatica di 3 documenti (chiave `quality-improvements`).

## Miglioramenti Qualità Codice - Modulo Lang - 2025-01-06

_Fonte: `quality-improvements.md`_

# Miglioramenti Qualità Codice - Modulo Lang - 2025-01-06

## Data
2025-01-06
# Miglioramenti Qualità Codice - Modulo Lang - [DATE]

## Data
[DATE]

## Obiettivo
Migliorare la qualità del codice del modulo Lang utilizzando PHPStan livello 10, PHPMD, PHPInsights e Rector.

### `wiki/topics/rinvex-countries.md` — Topic rinvex-countries


# Topic rinvex-countries

Sintesi automatica di 4 documenti (chiave `rinvex-countries`).

## Rinvex Countries Usage in Lang Module

_Fonte: `rinvex-countries-usage.md`_

# Rinvex Countries Usage in Lang Module

## Overview

The Lang module utilizes the [Rinvex Countries](https://github.com/rinvex/countries) package to provide comprehensive country data including names, ISO codes, flags, currencies, and geographical information. This package provides data for all 250+ countries worldwide.

## Installation

The package is installed via Composer:

```bash

### `wiki/topics/stories:lang-docs-conflict-marke.md` — Topic stories:lang-docs-conflict-marke


# Topic stories:lang-docs-conflict-marke

Sintesi automatica di 4 documenti (chiave `stories:lang-docs-conflict-marke`).

## Story: Lang — pulizia marker di conflitto residui in docs/

_Fonte: `stories/0027-lang-docs-conflict-marker-cleanup.story.md`_

# Story: Lang — pulizia marker di conflitto residui in docs/

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri


### `wiki/topics/translating-plural.md` — Topic translating-plural


# Topic translating-plural

Sintesi automatica di 4 documenti (chiave `translating-plural`).

## Traduzione di Forme Plurali e Singolari

_Fonte: `translating-plural-singular-forms.md`_

# Traduzione di Forme Plurali e Singolari

## Introduzione

In un'applicazione multilingue, è comune dover gestire traduzioni che cambiano in base al conteggio di elementi (singolare/plurale). Laravel offre strumenti come `trans_choice()` per semplificare questo processo. Questa documentazione, basata sul corso di Laravel Daily, esplora come implementare la pluralizzazione nel progetto `<nome progetto>`, sia nei file JSON che PHP, e come utilizzare la direttiva `@choice` nelle viste Blade.

## Uso di `trans_choice()` per Pluralizzazione

Laravel fornisce la funzione helper `trans_choice()` che permette di

### `wiki/topics/translating-validation.md` — Topic translating-validation


# Topic translating-validation

Sintesi automatica di 4 documenti (chiave `translating-validation`).

## Traduzione dei Messaggi di Validazione

_Fonte: `translating-validation-messages.md`_

# Traduzione dei Messaggi di Validazione

## Introduzione

In Laravel, i messaggi di validazione predefiniti sono generalmente adeguati, ma spesso è necessario personalizzarli per adattarli ai nomi dei campi visualizzati nell'interfaccia utente o per migliorare la chiarezza per gli utenti finali. Questa documentazione, basata sul corso di Laravel Daily, esplora come personalizzare i messaggi di validazione per il progetto `<nome progetto>`, utilizzando metodi come `attributes()` e `messages()` nelle classi di richiesta form, e come tradurre questi messaggi per supportare più lingue.

## Problema di C

### `wiki/topics/translation-errors.md` — Topic translation-errors


# Topic translation-errors

Sintesi automatica di 3 documenti (chiave `translation-errors`).

## Correzione Errori Traduzioni - 2025

_Fonte: `translation-errors-correction.md`_

# Correzione Errori Traduzioni - 2025

## Problema Identificato
Durante l'audit delle traduzioni, sono state identificate numerose traduzioni che contengono testo italiano in file di lingua tedesca e inglese. Il pattern problematico è la presenza di "obbligatorio" in file `lang/de/` e `lang/en/`.

## Analisi del Problema

### Pattern di Errore
- **Errore**: Traduzioni italiane in file tedeschi e inglesi
- **Esempio**: `'required' => 'Campo obbligatorio'` in file `lang/de/`
- **Impatto**: Interfaccia utente incoerente e non localizzata correttamente

### `wiki/topics/translation-field.md` — Topic translation-field


# Topic translation-field

Sintesi automatica di 3 documenti (chiave `translation-field`).

## Struttura Completa dei Campi di Traduzione - Standard Laraxot <nome progetto>

_Fonte: `architecture/translation-field-structure-complete.md`_

# Struttura Completa dei Campi di Traduzione - Standard Laraxot <nome progetto>

## Principi Fondamentali DRY + KISS

### Struttura Obbligatoria per Ogni Campo
Ogni campo di traduzione DEVE includere tutti questi elementi:

```php
<?php

declare(strict_types=1);

### `wiki/topics/translation-file.md` — Topic translation-file


# Topic translation-file

Sintesi automatica di 4 documenti (chiave `translation-file`).

## Editor dei file di traduzione nel pannello

_Fonte: `translation-file-editor.md`_

# Editor dei file di traduzione nel pannello

`TranslationFile` e' un model Sushi: ogni riga e' un file `lang/<locale>/<nome>.php` di un modulo,
letto da `getRows()`; la colonna `content` (cast `array`) contiene l'array del file.

## Il form (`Schemas/TranslationFileForm`)

`getFormSchema()` restituisce due sezioni, con queste chiavi:

| Chiave | Contenuto |
|---|---|

### `wiki/topics/translation-files.md` — Topic translation-files


# Topic translation-files

Sintesi automatica di 4 documenti (chiave `translation-files`).

## Aggiornamento File di Traduzione - Gennaio 2025

_Fonte: `translation-files-update-67b1d4.md`_

# Aggiornamento File di Traduzione - Gennaio 2025

## Data Aggiornamento
[DATE]

## File Modificati

### 1. `Modules/Notify/lang/it/test_smtp.php`
### 2. `Modules/Notify/lang/it/send_email.php`
### 3. `Modules/Lang/lang/it/lang_service.php`


### `wiki/topics/translation-keys.md` — Topic translation-keys


# Topic translation-keys

Sintesi automatica di 3 documenti (chiave `translation-keys`).

## Best Practices per le Chiavi di Traduzione

_Fonte: `translation-keys-best-practices.md`_

# Best Practices per le Chiavi di Traduzione

## Collegamenti correlati
- [README modulo Lang](README.md)
- [Convenzioni Path](./path_conventions.md)
- [Collegamenti Documentazione](/docs/collegamenti-documentazione.md)
- [Implementazione Header](/laravel/Modules/User/docs/header-language-avatar-implementation.md)
- [README modulo Lang](./README.md)
- [Convenzioni Path](./PATH_CONVENTIONS.md)
- [Collegamenti Documentazione](/docs/collegamenti-documentazione.md)
- [Implementazione Header](/laravel/Modules/User/docs/header-language-avatar-implementation.md)

### `wiki/topics/translation-refactor.md` — Topic translation-refactor


# Topic translation-refactor

Sintesi automatica di 4 documenti (chiave `translation-refactor`).

## Refactor Completo File di Traduzione - Riepilogo Finale

_Fonte: `translation-refactor-complete-summary.md`_

# Refactor Completo File di Traduzione - Riepilogo Finale

## Panoramica del Progetto
Refactor sistematico di tutti i file di traduzione non italiani contenenti le parole chiave "Città", "Provincia", "Regione", e "Accedi" per implementare una struttura standardizzata a 7 elementi e correggere le traduzioni errate.

## Obiettivi Raggiunti

### ✅ Struttura Standardizzata Implementata
Tutti i campi di traduzione ora includono la struttura completa a 7 elementi:
1. **label** - Etichetta del campo
2. **placeholder** - Testo di esempio

### `wiki/topics/validation-messages.md` — Topic validation-messages


# Topic validation-messages

Sintesi automatica di 5 documenti (chiave `validation-messages`).

## Gestione delle Traduzioni dei Messaggi di Validazione

_Fonte: `validation-messages.md`_

# Gestione delle Traduzioni dei Messaggi di Validazione

## Obiettivo
Fornire una guida completa per:
- Tradurre i messaggi di validazione standard e personalizzati
- Gestire la corrispondenza tra label e nome campo nei messaggi di errore
- Gestire array di campi e placeholder dinamici
- Scrivere messaggi di validazione user-friendly e localizzati

---


### `wiki/troubleshooting/git-merge-conflict-inventory.md` — Git Conflict Inventory

# Git Conflict Inventory

- Date: 2026-04-28
- Owner: Modules/Lang
- Files with conflict markers: 4

## Files

- docs/module-analysis.md
- docs/module.md
- docs/translatable/json-content-translation.md
- docs/wiki/README.md

## Notes

- Inventory generated from `rg -l "^(<<<<<<<|=======|>>>>>>>)"`.
- Use this list as a volatile coordination map; re-open each file before editing because other agents may resolve items in parallel.
