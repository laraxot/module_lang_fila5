---
title: "Audit approfondito modulo Lang"
type: audit
status: review
updated: 2026-11-16
module: Lang
qmd: "audit approfondito Lang inventario PHPStan Pest policy Filament Actions"
---

# Audit approfondito — Lang

## Metodo

Source-first (2026-11-16): inventario filesystem, `rg` su policy/marker/label,
lettura purpose esistente, PHPStan globale Modules già a 0 errori. Nessuna UI
inventata. Pest dichiarato solo se eseguito.

## Inventario misurato

| Area | Conteggio |
|---|---:|
| PHP in `app/` | 72 |
| Test PHP | 51 |
| Models (`app/Models/*.php`) | 7 |
| Policy files (approx) | 8 |
| Resource Filament | 2 |
| Actions | 17 |
| Services | 0 |
| Migration | 11 |
| Lang IT files | 66 |
| Marker conflitto | 0 |
| Occorrenze `return true` in Policy | 2 |
| Ratio test/app | 0.71 |

## Scopo (da docs esistenti / codice)

## Lo scopo in una frase **Lang tiene fuori dal codice ogni parola che un utente legge: nessuna etichetta si scrive dentro una classe, si dichiara in un file di lingua.**

## Finding preliminari (da inventario)

- Nessun finding automatico critico dall'inventario; completare review sicurezza/runtime con story dedicate.

## Finding approfonditi (codice)

- **P1** Label hardcoded in `LocaleSwitcherRefresh` (`Select language` / `Cambia lingua`).
- **P2** Fallback UI `FIX:` in `AutoLabelAction`.
- Policy su `LangBasePolicy` + permission (ok relativo).

## Gate

```bash
cd laravel
php -d memory_limit=2G ./vendor/bin/phpstan analyse Modules/Lang
# Pest solo fuori da 10.100.200.15 e con DB testing raggiungibile
./vendor/bin/pest Modules/Lang/tests --no-coverage
```

PHPStan `Modules` (2026-11-16): **0 errori** sul tree completo.

## Piano

Vedi [piano-miglioramento.md](../piano-miglioramento.md).

## Riferimenti

- [audit.md](../audit.md)
- [ECC](../../ecc/lang-ecc-audit.md)
- [Story](../stories/module-bmad-audit.story.md)
