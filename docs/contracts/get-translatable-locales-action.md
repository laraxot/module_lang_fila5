---
title: "Contratto — GetTranslatableLocalesAction"
type: contract
action: "Modules\\Lang\\Actions\\GetTranslatableLocalesAction"
module: Lang
status: accepted
updated: 2026-11-26
qmd: "GetTranslatableLocalesAction lingue editor traduzioni lista vuota default LangConfigData supported_locales LANG-TRANSLOC"
---

# GetTranslatableLocalesAction

Restituisce le lingue con cui lavora l'editor delle traduzioni. Sorgente: `app/Actions/GetTranslatableLocalesAction.php:18-34`.
Nome: prima `ResolveTranslatableLocalesAction` ([ADR Xot 0016](../../../Xot/docs/adr/0016-action-names-get-not-resolve.md) vieta `Resolve*`);
la vecchia classe (`app/Actions/ResolveTranslatableLocalesAction.php`, corpo identico) esiste ancora: vedi Limiti noti.

Test: `cd laravel && vendor/bin/pest Modules/Lang/tests/Unit/Datas/LangConfigDataTest.php` (oppure `--group=LANG-TRANSLOC-INV-1`).

## Input

- Nessun argomento. Legge `LangConfigData::make()->supported_locales` (config del tenant, `Datas/LangConfigData.php:40`).

## Output

- `list<string>`: solo stringhe non vuote, riindicizzate (`:27-31`).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| LANG-TRANSLOC-INV-1 | Mai lista vuota: se non resta nulla, torna il default della Data (`['it', 'en']`, `LangConfigData.php:40`, `:32`). Se cade, un file del tenant rovinato a mano lascia l'editor senza lingue. | `LANG-TRANSLOC-INV-1` |
| LANG-TRANSLOC-INV-2 | Valori non stringa o stringhe vuote vengono scartati. | — (non dimostrato) |
| LANG-TRANSLOC-INV-3 | Le lingue salvate valide tornano nell'ordine salvato. Se cade, la scelta nella pagina Impostazioni non ha effetto sull'editor. | `LANG-TRANSLOC-INV-3` |

## Effetti collaterali

- Nessuno: sola lettura della config del tenant.

## Errori

- Nessuna eccezione propria.

## Non fa

- Non verifica che le lingue siano codici validi né che esistano in `laravellocalization.supportedLocales`.
- Chiamanti verificati (produzione): `app/Filament/Resources/TranslationFileResource.php:30`, `app/Filament/Resources/LangBaseResource.php:28`,
  `app/Filament/Resources/TranslationFileResource/Pages/EditTranslationFile.php:25`, `app/Filament/Actions/LocaleSwitcherRefresh.php:23`,
  e `GetDefaultTranslatableLocaleAction`.

## Limiti noti

- `ResolveTranslatableLocalesAction` è codice morto: `rg "ResolveTranslatableLocales"` in `laravel/` (esclusi `vendor/`, `node_modules/`) trova solo
  il file stesso e `ResolveDefaultTranslatableLocaleAction` (a sua volta senza chiamanti). Candidata alla rimozione (decisione del proprietario).
- INV-2 non ha test: `tests/Unit/Datas/LangConfigDataTest.php` prova solo la lista vuota, non i valori non stringa.
