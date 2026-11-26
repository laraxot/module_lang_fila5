---
title: "Contratto — GetDefaultTranslatableLocaleAction"
type: contract
action: "Modules\\Lang\\Actions\\GetDefaultTranslatableLocaleAction"
module: Lang
status: accepted
updated: 2026-11-26
qmd: "GetDefaultTranslatableLocaleAction lingua di apertura editor default_locale fallback LangConfigData LANG-DEFLOC"
---

# GetDefaultTranslatableLocaleAction

Sceglie la lingua con cui si apre l'editor delle traduzioni. Sorgente: `app/Actions/GetDefaultTranslatableLocaleAction.php:18-32`.
Nome: prima `ResolveDefaultTranslatableLocaleAction`; [ADR Xot 0016](../../../Xot/docs/adr/0016-action-names-get-not-resolve.md)
vieta il prefisso `Resolve`. La vecchia classe esiste ancora in `app/Actions/ResolveDefaultTranslatableLocaleAction.php` (corpo identico,
senza `@contract`): vedi Limiti noti.

Test: `cd laravel && vendor/bin/pest Modules/Lang/tests/Unit/Datas/LangConfigDataTest.php` (oppure `--group=LANG-DEFLOC-INV-1`).

## Input

- `string $fallback`: lingua di ripiego del chiamante (es. `app.locale` per le Resource, `it` per il selettore).

## Output

- `string`: il `default_locale` salvato se è tra le lingue di [GetTranslatableLocalesAction](get-translatable-locales-action.md),
  altrimenti `$fallback` (`:24-30`).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| LANG-DEFLOC-INV-1 | Un default salvato fuori dalle lingue scelte viene ignorato e si usa `$fallback`. Se cade, l'editor si apre in una lingua che non si può modificare. | `LANG-DEFLOC-INV-1` |
| LANG-DEFLOC-INV-2 | Senza default salvato (`null`) si usa `$fallback`: finché nessuno salva le impostazioni, le Resource rispondono come prima (`app.locale`). | `LANG-DEFLOC-INV-2` |
| LANG-DEFLOC-INV-3 | Un default salvato che è tra le lingue scelte viene restituito al posto di `$fallback`. Se cade, la scelta fatta nella pagina Impostazioni non ha effetto. | `LANG-DEFLOC-INV-3` |

## Effetti collaterali

- Nessuno: legge `LangConfigData::make()` (config del tenant) e chiama `GetTranslatableLocalesAction`.

## Errori

- Nessuna eccezione propria.

## Non fa

- Non salva nulla e non valida `$fallback`: un `$fallback` fuori dalle lingue scelte viene restituito com'è.
- Chiamanti verificati (produzione): `app/Filament/Resources/TranslationFileResource.php:22`, `app/Filament/Resources/LangBaseResource.php:20`,
  `app/Filament/Actions/LocaleSwitcherRefresh.php:26`. `Datas/LangConfigData.php` la cita solo in un `@see`.

## Limiti noti

- `ResolveDefaultTranslatableLocaleAction` è codice morto: `rg "ResolveDefaultTranslatableLocale"` in `laravel/` (esclusi `vendor/`, `node_modules/`)
  trova solo il file stesso e un cenno in `docs/bmad/architecture.md`. Candidata alla rimozione; la rimozione spetta al proprietario del modulo.
- INV-2 è provata passando dalla Resource (`TranslationFileResource::getDefaultTranslatableLocale()`), non dall'Action chiamata direttamente.
