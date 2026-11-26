---
title: "Lang possiede i dati di localizzazione"
type: decision
status: accepted
created: 2026-11-23
updated: 2026-11-26
module: Lang
decision-makers: [Lang module owner]
qmd: "lang owns localization data possiede dati"
---

# Lang possiede i dati di localizzazione

## Contesto

Le lingue supportate attraversano routing, contenuti CMS, notifiche e interfacce.

La forma delle chiavi segue il protocollo architetturale di Xot in
[`translation-key-protocol`](../../../Xot/docs/adr/0037-translation-key-protocol.md):
`<namespace>::<file>.<collection>.<key>.<type>`. Perciò una forma come
`trade::widgets.signal.none_value` è incompleta; il tipo finale va scelto dopo
aver letto il catalogo owner, ad esempio
`trade::widgets.signal.none_value.label` quando la foglia è un'etichetta
(vedi anche [0002](0002-translation-key-shape.md)).

## Driver della decisione

- Mantenere fallback e routing coerenti.

## Alternative scartate

- Hardcodare le stringhe nelle view.
- Gestire una configurazione lingua indipendente per ogni tema.

## Decisione

Lang governa selezione e dati di traduzione; i moduli owner forniscono le chiavi e il tema non duplica traduzioni di dominio.

## Conseguenze

Le lingue restano coerenti tra superfici; una nuova chiave deve avere una sorgente owner e fallback verificabile.

## Conferma

- `cd laravel && vendor/bin/pest Modules/Lang/tests/Unit/Providers/LangServiceProviderTest.php`: carica i cataloghi dei moduli con il namespace
  corretto, supporta it/en/de e ricade sulla lingua di default quando manca la traduzione (test `falls back to default language when translation missing`).
- `cd laravel && vendor/bin/pest Modules/Lang/tests/Unit/Datas/LangConfigDataTest.php`: lingua di default e lingue supportate lette dalla
  configurazione del modulo (`LANG-DEFLOC-INV-1..3`, `LANG-TRANSLOC-INV-1`, `-3`).
- Regola di revisione: «il tema non duplica traduzioni di dominio» non ha un test. Proposta: un test source-level in
  `Themes/Sixteen/tests/` che fallisca su un file `lang/` del tema con chiavi di un modulo owner.
