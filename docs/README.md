---
title: "README"
type: note
tags: [documentation]
module: Lang
created: 2026-09-26
updated: 2026-11-05
qmd: "README"
issues: []
discussions: []
---

# Documentazione Modulo Lang

Questo modulo gestisce l'internazionalizzazione (i18n) dell'applicazione: file di traduzione PHP/JSON,
editor Filament, sincronizzazione tra lingue, switcher di lingua e supporto multi-tenant.

## Indice

Parti da [00-index.md](./00-index.md) per la mappa completa della documentazione mantenuta.

Struttura corrente di `docs/` (<=100 file `.md`, consolidamento #63):

- `adr/` — decisioni architetturali
- `contracts/` — contratti comportamentali delle Action e dei componenti
- `stories/` — solo story attive
- `architecture/`, `translatable/`, `best-practices/`, `critical-rules/`, `concepts/`, `lessons-learned/`
- guide tematiche alla radice (traduzioni, locale, Filament, testing, troubleshooting)

Il materiale storico e le varianti duplicate sono archiviati in
[`archive/docs-legacy/`](../archive/docs-legacy/README.md).

## Funzionalità principali

- **Translation File Management**: lettura/scrittura file traduzioni PHP e JSON
- **Translation Editor**: UI Filament per edit traduzioni in real-time
- **Language Sync**: sincronizzazione chiavi mancanti tra lingue
- **Dynamic Translations**: lookup a runtime con fallback
- **Module Translations**: traduzioni namespace `Modulo::file.chiave`
- **Translation Publishing**: pubblicazione traduzioni da moduli a `lang/`

## Regole critiche

1. **Mai estendere classi Filament direttamente** — usare le basi `XotBase*` (vedi `concepts/`)
2. **Namespace `Modules\Lang`** — mai `App\Lang`
3. **Strict typing** — `declare(strict_types=1);` in tutti i file
4. **Una sola fonte di verità** — traduzioni centralizzate, niente duplicati
5. **Cache traduzioni** — usare la cache Laravel in produzione
6. **Niente `->label()` hardcoded** — le label Filament sono autoconfigurate dal provider Lang (ADR 0003)
7. **Campo `fields` obbligatorio** per le risorse translatabili (vedi `critical-rules/`)

## Moduli correlati

- `Modules/Xot` — classi base e convenzioni comuni (always dependency)
- `Modules/User` — stringhe lato autenticazione/utente
- `Modules/Cms` — contenuti e pagine
- `Modules/Notify` — traduzioni email/notifiche
- `Modules/UI` — componenti Blade/Filament consumatori delle traduzioni

## Documenti correlati

- [PHPStan fixes storici](../archive/docs-legacy/root/PHPSTAN-FIXES.md) (archivio)
- [Standard rules wiki](../../../../bashscripts/ai/wiki/) — regole trasversali del progetto
