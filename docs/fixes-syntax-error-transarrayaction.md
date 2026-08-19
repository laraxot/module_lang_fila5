---
title: "Fix Errore Sintassi TransArrayAction"
module: "Lang"
type: concept
tags: [lang, transarray, mixed-narrowing, phpstan]
created: 2026-07-14
updated: 2026-08-18
qmd: "transarrayaction syntax mixed narrowing safestringcast"
related:
  - "./phpstan-fixes.md"
  - "./phpstan-mixed-casting-errors.md"
  - "../../Notify/docs/mixed-type-ultima-spiaggia.md"
---
# Fix Errore Sintassi TransArrayAction

Perché `trans()` deve ricevere una stringa già nota, non `mixed`: PHPStan a livello max non ragiona su `mixed`, e il Job dell'operatore è una chiave traducibile.

## Mixed narrowing (campagna 5.10)

Stesso ordine di `TransCollectionAction`: stringhifica **prima**, traduce **dopo**.

1. `array_map` + `SafeStringCastAction::cast` — bordo opaco (`array<…, mixed>` in ingresso).
2. `trans(string $item)` — il corpo concatena `$transKey.'.'.$item`, quindi l'item è già stringa.

`Arr::map` nel framework è stubbato `@return array` (senza generics): PHPStan vede `array` nudo. `array_map` con callback `: string` dimostra `array<int|string, string>` dal corpo, senza `@var` né ignore.

Suffisso `.label` sulla prima chiave resta: è il contratto array, non della collection.

## Sintassi (storico)

Trailing comma nei parametri di `execute()` non era supportata nel runtime di allora; rimossa. Il file è `php -l` pulito.

## Collegamenti

- [TransArrayAction.php](../../app/Actions/TransArrayAction.php)
- [Mixed come ultima spiaggia](../../Notify/docs/mixed-type-ultima-spiaggia.md)
- [PHPStan mixed casting](./phpstan-mixed-casting-errors.md)
- [PHPStan fixes](./phpstan-fixes.md)
