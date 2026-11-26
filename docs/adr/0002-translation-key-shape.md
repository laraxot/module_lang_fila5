---
title: "Forma delle chiavi di traduzione e ownership del catalogo"
type: decision
status: accepted
created: 2026-11-23
updated: 2026-11-23
module: Lang
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

## Driver della decisione

- ogni chiave deve essere risolvibile dal file lingua owner;
- il tipo della foglia deve essere leggibile senza conoscere il chiamante;
- la stessa forma deve funzionare in Blade, PHP, Filament e CMS;
- le traduzioni devono restare nel modulo o tema che possiede il testo;
- non si devono correggere chiavi senza prima leggere il file lingua reale.

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

## Alternative scartate

- `trade::widgets.signal.none_value`: manca il tipo esplicito della foglia;
- `trade::signal.none_value`: non identifica il file lingua;
- testo italiano direttamente nella Blade: impedisce fallback e traduzione;
- chiavi inventate senza leggere il catalogo owner: crea traduzioni fantasma;
- namespace del tema concreto dentro una view riusabile: lega il componente a
  un solo tema.

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

- prima di modificare una chiave, leggere il file `lang/<locale>/<contesto>.php`
  dell'owner;
- verificare che la foglia sia una stringa e che esista nei locali richiesti;
- usare `bashscripts/tools/i18n/check-key-shape.py` quando disponibile;
- cercare chiavi con `::` e confrontarle con il protocollo prima del commit.

## Fonte e correzione della memoria

Il protocollo operativo è quello di
`bashscripts/ai/wiki/memories/translation-protocol-memory-aid.md`, che richiede
il tipo esplicito. La copia legacy
`bashscripts/ai/.agents/memories/translation-protocol-memory-aid.md` contiene
la frase “tipo implicito”: è un promemoria mnemonico superato e non prevale
sulla struttura reale dei file lingua né su questo ADR.
