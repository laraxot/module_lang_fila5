---
title: "Forma delle chiavi di traduzione e ownership del catalogo"
type: decision
status: accepted
created: 2026-11-23
updated: 2026-11-26
module: Lang
decision-makers: [Lang module owner]
qmd: "forma chiavi traduzione namespace file collezione chiave tipo foglia catalogo owner"
---

# Forma delle chiavi di traduzione e ownership del catalogo

## Contesto

Le chiavi Laravel non sono identificatori liberi: il namespace identifica
l'owner, il primo segmento dopo `::` identifica il file lingua e i segmenti
successivi attraversano la struttura dell'array fino alla foglia testuale.

Una chiave come `trade::widgets.signal.none_value` è sbagliata quando viene
usata come testo perché non contiene il tipo esplicito della foglia e può
confondere il file `widgets.php` con un gruppo di traduzioni. Il risultato può
essere una chiave stampata a video, un array passato a Blade oppure una
traduzione non trovata.

La stessa forma è fissata a livello di progetto da
[Xot ADR 0037](../../../Xot/docs/adr/0037-translation-key-protocol.md)
(`decision-makers: [Xot, Lang]`): questo ADR ne è la copia locale, con
l'aggiunta della regola «leggere il catalogo owner prima di cambiare una
chiave». Se debba restare o essere marcato `superseded` da Xot 0037 è una
decisione aperta del proprietario del modulo.

Un promemoria mnemonico precedente parlava di «tipo implicito»: il file che lo
conteneva non esiste più nel repository (verificato 2026-11-26) e, se
riapparisse, non prevale né su questo ADR né sulla struttura reale dei file
lingua.

## Driver della decisione

- ogni chiave deve essere risolvibile dal file lingua owner;
- il tipo della foglia deve essere leggibile senza conoscere il chiamante;
- la stessa forma deve funzionare in Blade, PHP, Filament e CMS;
- le traduzioni devono restare nel modulo o tema che possiede il testo;
- non si devono correggere chiavi senza prima leggere il file lingua reale.

## Alternative scartate

- `trade::widgets.signal.none_value`: manca il tipo esplicito della foglia;
- `trade::signal.none_value`: non identifica il file lingua;
- testo italiano direttamente nella Blade: impedisce fallback e traduzione;
- chiavi inventate senza leggere il catalogo owner: crea traduzioni fantasma;
- namespace del tema concreto dentro una view riusabile: lega il componente a
  un solo tema.

## Decisione

Le nuove chiavi seguono questa forma:

```text
<namespace>::<contesto>.<collezione>.<chiave>.<tipo>
```

Esempio strutturale:

```php
// Modules/Trade/lang/it/widgets.php
return [
    'signal' => [
        'none_value' => [
            'text' => '—',
        ],
    ],
];
```

```blade
{{ __('trade::widgets.signal.none_value.text') }}
```

L'esempio mostra la forma, non autorizza ad aggiungere `text` a un catalogo
senza verificare la struttura effettiva. Se la foglia reale è, per esempio,
`message` o `label`, si usa quel tipo già presente nel file owner.

Il contesto dopo `::` è il nome del file (`widgets.php`), non una chiave
arbitraria dell'array. Per i temi il namespace pubblico è `pub_theme::`, così
la view resta compatibile con il tema attivo.

## Conseguenze

- Buono: una chiave può essere ricostruita dal percorso del file e dall'array.
- Buono: il tipo impedisce di rendere accidentalmente un array come stringa.
- Buono: l'owner del testo resta chiaro e i cataloghi possono essere verificati
  per locale.
- Cattivo: le chiavi legacy a due o tre segmenti richiedono migrazione
  graduale, non una sostituzione cieca.
- Cattivo: una chiave valida sintatticamente può comunque mancare in una
  lingua; serve il controllo dei cataloghi.

## Conferma

- Regola di revisione: prima di modificare una chiave, leggere il file
  `lang/<locale>/<contesto>.php` dell'owner e verificare che la foglia sia una
  stringa e che esista nei locali richiesti.
- Regola di revisione: cercare le chiavi con `::` e confrontarle con la forma
  prima del commit.
- Nessuna conferma automatica della forma oggi. Lo script
  `bashscripts/tools/i18n/check-key-shape.py`, citato dalla versione precedente
  di questo ADR, non esiste (verificato 2026-11-26: la cartella contiene solo
  `audit-locales.py`, che controlla chiavi grezze e testi non tradotti sulle
  pagine pubbliche, non la forma). Proposta: un test Pest in
  `Modules/Lang/tests/` che percorra `lang/it/*.php` di ogni modulo e fallisca
  su una foglia non stringa dove il codice cita una chiave a tre segmenti.
