---
status: proposed            # proposed | accepted | rejected | deprecated | superseded by NNNN
date: YYYY-MM-DD
decision-makers: []
qmd: "0000 template adr MADR harness NNNN-slug"
---

<!-- File: docs/adr/NNNN-titolo-con-trattini.md · formato MADR breve (harness).
     Il basename DEVE iniziare con NNNN- (es. 0001-...). Eccezioni: README.md, INDEX.md, 0000-template.md.
     Le intestazioni sono quelle italiane che il test Xot `PackagesHaveContractsAndAdrTest` controlla
     (`## Contesto`, `## Decisione`, `## Alternative scartate`, `## Conseguenze`): non tradurle in inglese.
     Scrivi un ADR solo se la decisione è difficile da invertire, sorprendente e frutto di un trade-off reale. -->

# ADR — <decisione in una riga>

## Contesto

Quale fatto verificato rende necessaria la decisione? Chiudi con la domanda a cui risponde.

## Driver della decisione

- <vincolo, rischio o obiettivo>

## Alternative scartate

- <opzione e motivo per cui è seria>
- <opzione e motivo per cui è seria>

## Decisione

Scelta: **<opzione>**, perché <driver principale>.

## Conseguenze

- Positiva: <effetto>
- Negativa/debito: <effetto>

## Conferma

Indica test, static check o controllo ripetibile che dimostra il rispetto della decisione.
