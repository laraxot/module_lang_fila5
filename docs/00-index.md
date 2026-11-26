---
issues: []
discussions: []
title: "Indice Documentazione Modulo Lang"
module: "Lang"
type: concept
tags: [lang, i18n, translations]
created: 2026-07-14
updated: 2026-11-05
qmd: "lang module documentation index"
---

# Indice Documentazione Modulo Lang

Modulo Lang: internazionalizzazione e traduzioni per Laravel 13 / Filament 5 (locale `it/en/de/es`).
Documentazione ridotta a <=100 file: solo canonica e corrente. Il materiale storico e' in
[`archive/docs-legacy/`](../archive/docs-legacy/README.md).

## Architettura e contratti

| Documento | Contenuto |
|---|---|
| [ARCHITECTURE.md](./ARCHITECTURE.md) | Architettura del modulo |
| [architecture/](./architecture/) | Flusso AutoLabel, struttura traduzioni |
| [adr/](./adr/) | Decisioni architetturali (ADR 0001-0007 + indice) |
| [contracts/](./contracts/) | Contratti delle Action e dei componenti (SSoT comportamentale) |
| [best-practices/](./best-practices/) | Convenzioni link documentazione |
| [critical-rules/](./critical-rules/) | Regole critiche (campo `fields` obbligatorio) |
| [concepts/](./concepts/) | Concetti (mai estendere classi Filament direttamente) |
| [lessons-learned/](./lessons-learned/) | lezioni durevoli (namespace widget, array PHP) |
| [translatable/](./translatable/) | Traduzione contenuti: best practice e implementazione |

## Guide

| Documento | Contenuto |
|---|---|
| [README.md](./README.md) | Panoramica del sistema di traduzioni |
| [QUICK-REFERENCE.md](./QUICK-REFERENCE.md) | Riferimento rapido |
| [TRANSLATION-PROCESS.md](./TRANSLATION-PROCESS.md) | Processo di traduzione |
| [TRANSLATION-STRATEGIES.md](./TRANSLATION-STRATEGIES.md) | Strategie di traduzione |
| [translations-system.md](./translations-system.md) | Architettura sistema traduzioni |
| [LOCALE-MANAGEMENT.md](./LOCALE-MANAGEMENT.md) | Gestione lingue attive/default |
| [MIGRATIONS.md](./MIGRATIONS.md) | Migrazioni del modulo |
| [MCAMARA-IMPLEMENTATION-GUIDE.md](./MCAMARA-IMPLEMENTATION-GUIDE.md) | Integrazione mcamara/laravel-localization |
| [PERFORMANCE-OPTIMIZATION.md](./PERFORMANCE-OPTIMIZATION.md) | Ottimizzazione prestazioni |
| [filament-integration.md](./filament-integration.md) | Integrazione Filament |
| [livewire-integration.md](./livewire-integration.md) | Integrazione Livewire/Volt |
| [laravel-localization.md](./laravel-localization.md) | URL e routing localizzati |
| [language-switcher-and-flags.md](./language-switcher-and-flags.md) | Language switcher e bandiere |
| [api-reference.md](./api-reference.md) | Riferimento API |
| [console-commands.md](./console-commands.md) | Comandi Artisan |
| [testing.md](./testing.md) | Testing del modulo |
| [translation-file-editor.md](./translation-file-editor.md) | Editor file traduzioni |
| [troubleshooting.md](./troubleshooting.md) | Risoluzione problemi |

## Guide per dominio

| Documento | Contenuto |
|---|---|
| [enum-translation.md](./enum-translation.md) | Traduzione Enum |
| [translation-keys.md](./translation-keys.md) | Convenzioni chiavi di traduzione |
| [translation-preservation.md](./translation-preservation.md) | Preservazione traduzioni esistenti |
| [pluralization-and-localization.md](./pluralization-and-localization.md) | Plurali e localizzazione |
| [localizing-dates-and-currencies.md](./localizing-dates-and-currencies.md) | Date e valute localizzate |

## Lavoro in corso

- [stories/](./stories/) — solo story attive (proposed/in-progress/review/ready-for-dev).
  Le story completate sono in `archive/docs-legacy/stories/`.

## Moduli correlati

- `Modules/Xot` — classi base `XotBase*`, convenzioni comuni.
- `Modules/User`, `Modules/Cms`, `Modules/Notify`, `Modules/UI` — consumatori delle traduzioni.

---
*Documentazione conforme agli standard Laraxot — DRY + KISS + SOLID.*
