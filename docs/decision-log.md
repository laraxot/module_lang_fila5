---
type: decision-log
title: "Decision Log — Lang"
links: {github_issue: #XXX, discussion: #XXX}
---
# Decision Log — Lang

## Decisions

### 2026-10-08: Ripristino dei file regrediti dal re-import del 07/10
- **Choose**: Ripristinare dallo stato del monorepo al 06/10 (`51570adf3`) 15 file: `lang/it/txt.php`, `lang/en/{txt,edit_translation_file,widgets,translations,nationalities,header,countries,auth,view_translation_file,lang_base_list_records,lang_base_edit_record,lang_base_create_record}.php`, `LanguageSwitcherWidget` e la sua vista.
- **Over**: Tenere le versioni portate dal commit `f80d2ee6` (07/10 13:01, senza genitori, 1918 file), re-import da una copia vecchia.
- **Because**: Confronto per chiave, non per righe (le righe gonfiano le perdite per la sola riformattazione): `en/txt.php` aveva perso 740 voci su 782, `en/edit_translation_file.php` 213 su 274, `it/txt.php` tornava alla chiave grezza `txt` al posto di "Testo"; le voci "nuove" erano solo il segnaposto vecchio `navigation.group => 'Missing Group'`. `LanguageSwitcherWidget` attuale coincideva con la versione del 10/09, prima della conversione a widget del 21/09. Nessun commit successivo al re-import tocca questi file. Criterio: contenuto attuale identico byte per byte a una versione più vecchia già sostituita; per ogni file controllata la storia completa (`--full-history`) per non perdere commit successivi.
- **Verifica**: `php -l`; PHPStan su `Modules` senza errori in Lang; test Lang prima/dopo identici.
## Open Questions

