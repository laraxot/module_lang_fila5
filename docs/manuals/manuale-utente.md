---
title: "Manuale utente — Lang"
type: user-manual
status: active
module: Lang
screenshot: assets/front-office-home.png
updated: 2026-11-25
qmd: "manuale utente lang"
---

> Screenshot reale del front office del tenant (superficie condivisa). Il modulo
> **Lang** non espone necessariamente pagine FO proprie: si documenta solo ciò
> verificabile nel codice. Aggiornato 2026-11-25.

![Front office](assets/front-office-home.png)

# Modulo Lang

## Scopo

lingue e traduzioni (LangServiceProvider / mcamara).

## Attori

| Attore | Nota |
|---|---|
| Ospite / utente FO | Usa il tema pubblico; Lang interviene solo se il flusso lo richiama. |
| Admin pannello | Se esiste `AdminPanelProvider`, opera nel pannello Filament del modulo. |
| Super-admin | Accesso alle impostazioni secondo le policy Xot/User. |

## Flussi

1. Verificare in `app/Providers/Filament/` se il pannello è registrato.
2. Operare solo sulle Resource/Page presenti sotto `app/Filament/`.
3. Non attribuire UI non presenti nel codice.

## Limiti

- Screenshot FO = contesto tenant, non UI proprietaria del modulo se assente.
- Dettaglio attori: policy e seeder del modulo, non matrici inventate.

## Fonti

- `module.json`, `app/Providers/`, `app/Filament/`
- Docs modulo in `docs/`
