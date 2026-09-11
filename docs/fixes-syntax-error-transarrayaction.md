---
title: "Fix Errore Sintassi TransArrayAction"
module: "Lang"
type: concept
<<<<<<< HEAD
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
=======
tags: [REDUNDANCY, ANALYSIS]
created: 2026-07-14
updated: 2026-07-14
qmd: "redundancy analysis"
related:
  - "./italian-text-refined-audit-report.md"
---
# Fix Errore Sintassi TransArrayAction

## Data: 2025-01-27
## Data: 2025-01-27
## Data: [DATE]

## Problema Identificato

Errore di sintassi PHP nel file `Modules/Lang/app/Actions/TransArrayAction.php`:

```
Syntax error, unexpected '<', expecting ';' or '{' on line 30
Syntax error, unexpected '}', expecting EOF on line 38
```

## Causa

Trailing comma non supportata nei parametri di funzione alla riga 29:

```php
public function execute(
    array $array,
    ?string $transKey,  // ← Virgola finale non supportata
): array {
```

## Soluzione Implementata

Rimossa la virgola finale dai parametri di funzione:

```php
public function execute(
    array $array,
    ?string $transKey  // ← Virgola rimossa
): array {
```

## Miglioramenti Aggiuntivi

1. **Tipizzazione PHPStan**: Aggiornata la documentazione PHPDoc per essere conforme a PHPStan livello 9:
   - `@param array<string, mixed> $array`
   - `@return array<string, string>`

2. **Conformità Standard**: Il file ora rispetta completamente gli standard PHPStan livello 9.

## Test di Verifica

```bash
./vendor/bin/phpstan analyse Modules/Lang/app/Actions/TransArrayAction.php --level=9
```

**Risultato**: ✅ Nessun errore

## Impatto

- ✅ Risolto errore di sintassi critico
- ✅ Migliorata tipizzazione per PHPStan livello 9
- ✅ Mantenuta funzionalità esistente
- ✅ Nessun breaking change
>>>>>>> laraxot/dev

## Collegamenti

- [TransArrayAction.php](../../app/Actions/TransArrayAction.php)
<<<<<<< HEAD
- [Mixed come ultima spiaggia](../../Notify/docs/mixed-type-ultima-spiaggia.md)
- [PHPStan mixed casting](./phpstan-mixed-casting-errors.md)
- [PHPStan fixes](./phpstan-fixes.md)
=======
- [PHPStan Fixes](./phpstan-fixes.md)
- [Translation Actions](./translation-actions.md)

## Note per il Futuro

- Evitare trailing comma nei parametri di funzione PHP
- Verificare sempre la sintassi prima del commit
- Utilizzare PHPStan per validazione continua
- Utilizzare PHPStan per validazione continua
- Utilizzare PHPStan per validazione continua
- Utilizzare PHPStan per validazione continua
- Utilizzare PHPStan per validazione continua
>>>>>>> laraxot/dev
