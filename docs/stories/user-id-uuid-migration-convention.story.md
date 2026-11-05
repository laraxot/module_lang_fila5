---
title: "Migrazioni UUID per user_id in Post e Translation"
type: story
module: Lang
status: in-progress
created: 2026-11-05
updated: 2026-11-05
tags: [bmad, migrations, uuid, user-id, conventions]
qmd: "Lang migration UUID user_id Post Translation naming convention idempotent legacy bigint"
related:
  - ../migrations.md
  - ../wiki/concepts/migration-path-canonical.md
  - ../../../Xot/docs/wiki/rules/migration-filename-from-model-name.md
  - ../../../Xot/docs/bmad/decision-log.md
---
# Migrazioni user_id UUID su Post e Translation

## Scopo (perche')
`posts.user_id` e `translations.user_id` sono nate bigint, ma gli utenti del progetto hanno chiavi UUID (`HasUuids`). Senza conversione, un insert con un utente reale fallisce. La migrazione serve a far combaciare il tipo della colonna con la chiave dell'utente, senza perdere dati.

## Convenzioni violate (trovate 2026-11-05)
1. I nomi update includevano i dettagli di colonna e non seguivano la forma `azione_<modello_plurale>_table`. Ora sono `update_posts_table` e `update_translations_table`. I timestamp restano invariati per preservare l'ordine; le migrazioni dichiarano `$model_class`, perché `XotBaseMigration` deriva la classe automaticamente solo dai nomi `create_*_table`.
2. Due migrazioni di creazione per lo stesso modello (`2026_01_21_*` e `2026_08_06_*`): la regola e' una migrazione per modello.
3. Conversione bigint -> uuid senza guardia: su MySQL i valori interi restano come stringhe ('123'), quindi i dati vengono corrotti in silenzio.
4. Logica duplicata: la conversione era scritta a mano, mentre esiste `XotBaseMigration::updateUserKeyString`, che usa `->change()` senza `nullable`.

## Decisioni prese
- Helper unico `XotBaseMigration::convertUserIdToUuidIfLegacyBigint(Blueprint, bool $nullable = true)`: converte solo se la colonna e' ancora bigint, e RIFIUTA se ci sono valori (RuntimeException). Fail-fast, nessuna corruzione silenziosa.
- Le due migrazioni `2026_11_05_*` delegano all'helper. Il filename è una chiave
  del ledger Laravel: la rinomina può rendere pendente la migrazione. È sicura
  perché il helper salta colonne già UUID e rifiuta valori bigint senza mapping.
- Le migrazioni `2026_08_06_*` non sono state alterate; l'audit ha rilevato
  duplicati di creazione storici, la cui rimozione richiede verifica dei ledger.

## Acceptance criteria
- [x] AC1: helper con guardia in XotBaseMigration.
- [x] AC2: le due migrazioni 2026_11_05 delegano all'helper, senza logica duplicata.
- [x] AC3: lint OK, `migrate --pretend` sul modulo Lang senza errori.
- [ ] AC4: test di unita' della guardia. Bloccato: i test usano SQLite, dove il tipo e' `integer` e la guardia non scatta. Serve una connessione MySQL di test.
- [ ] AC5: decidere il mapping per le righe legacy in produzione (valori bigint non null). Senza una decisione la migrazione si ferma, come voluto.
- [x] AC6a: nominare le due migrazioni additive `update_<modello_plurale>_table`, mantenendo i timestamp e la logica idempotente.
- [x] AC6c: documentare la regola in Xot, Lang, Filament Blueprint e second brain; censire i nomi delle altre migrazioni Lang.
- [ ] AC6b: valutare le due migrazioni di creazione duplicate (`2026_01_21_*` e `2026_08_06_*`). Non unificarle retroattivamente: serve verificare lo storico `migrations` di ogni ambiente e mantenere una correzione forward-only.

## Rischio residuo
Se in un ambiente esistono righe con `user_id` numerico in `posts` o `translations`, la migrazione si fermera' con un messaggio chiaro. Non e' un bug: e' la protezione voluta; prima occorre definire un mapping verificabile verso gli UUID.

## Verifica di questa sessione

- I due file additive sono nominati dal modello owner, mantengono i timestamp e
  dichiarano `$model_class` perché non usano il pattern `create_*_table`.
- Nomi verificati: `2026_11_05_100000_update_posts_table.php` e
  `2026_11_05_100001_update_translations_table.php`.
- `php -l` su entrambi i file: OK.
- Pint `--test` sui due file: passed.
- Pest `Modules/Lang/tests/Unit/Models/TranslationTest.php`: 6 test e 14
  asserzioni passati nell'ultima verifica.
- PHPStan `analyse Modules/Lang`: zero errori nell'ultima verifica.
- Revisione indipendente: confermati conteggio, eccezioni, path maiuscolo
  legacy e rischio di riesecuzione per rename; nessun ledger di ambienti esterni
  è stato consultato.
- `Modules/Lang/tests/Unit/Models/TranslationTest.php`: 6 test passati, 14
  asserzioni, con `.env.testing` su `ptv_lara_test` (host `10.100.200.53`).
- `phpstan analyse Modules`: in esecuzione; il primo tentativo è terminato con
  due fatal temporanei di collisione tra trait durante estrazioni Sigma
  concorrenti. Il retry verrà registrato dopo l'esito.

## Inventario delle migrazioni Lang

- Le quattro migrazioni `create_*_table.php` attive seguono timestamp, azione,
  tabella plurale snake_case e suffisso `_table.php`. `Post` e `Translation`
  hanno due file `create_*` storici ciascuno (2026-01-21 e 2026-08-06): non sono
  stati rimossi senza confrontare i ledger di tutti gli ambienti.
- Non risultano altre migrazioni additive fuori formato nella directory
  canonica `database/migrations/`.
- L'audit ha inoltre rilevato una variante legacy di `language_lines` in
  `database/Migrations/` maiuscolo, parallela al path Laravel attivo minuscolo.
  È fuori dallo scope di questa correzione e richiede conferma del loader prima
  di rimuovere il file.

## Audit cross-modulo dei filename

L'audit read-only di `laravel/Modules/*/database/migrations/*.php` ha contato
252 file nei percorsi canonici minuscoli: 247 seguono il formato
`timestamp_azione_tabella_plurale_table.php`; cinque sono eccezioni storiche
elencate nella regola Xot. Non sono state rinominate perché il filename è parte
del ledger Laravel e non sono stati verificati i ledger di tutti gli ambienti.
Il batch `2026_11_05_*` Lang segue invece la convenzione. È stata trovata anche
una migrazione Lang in `database/Migrations/` maiuscolo, da verificare rispetto
al loader prima di qualunque spostamento.

L'audit dei nomi misura la forma lessicale, non prova che ciascuna migrazione
sia stata eseguita in ogni ambiente. La singola migrazione multi-tabella degli
indici User non ha un owner tabella unico; va mantenuta come eccezione esplicita
finché non sarà possibile scomporla con una correzione forward-only sicura.

Revisione indipendente read-only: i cinque filename sono già presenti nella
storia Git; questo conferma che non sono nuovi file locali, ma non dimostra la
loro distribuzione in ciascun ambiente. `XotBaseServiceProvider` carica il path
minuscolo `database/migrations/`; la variante `Lang/database/Migrations/` è
fuori dal percorso standard del loader, ma resta da confermare l'assenza di
consumer esterni prima di spostarla o cancellarla.

## Verifica guardia tabella

La migrazione controlla `tableExists()` prima di `tableUpdate()`, evitando la creazione accidentale di `translations` vuota quando il target non esiste. Verificati lint, Pint, `migrate --pretend` (solo introspezione, nessun `CREATE TABLE`) e Pest `TranslationTest` (6 test, 14 asserzioni).
