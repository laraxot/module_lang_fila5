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
  - ../../../Xot/docs/bmad/decision-log.md
---
# Migrazioni user_id UUID su Post e Translation

## Scopo (perche')
`posts.user_id` e `translations.user_id` sono nate bigint, ma gli utenti del progetto hanno chiavi UUID (`HasUuids`). Senza conversione, un insert con un utente reale fallisce. La migrazione serve a far combaciare il tipo della colonna con la chiave dell'utente, senza perdere dati.

## Convenzioni violate (trovate 2026-11-05)
1. I nomi update indicavano la tabella plurale, senza identificare il modello owner (`update_user_id_uuid_on_translations_table`). Sono stati allineati ai modelli: `update_post_user_id_uuid` e `update_translation_user_id_uuid`. Il timestamp resta invariato per preservare l'ordine di esecuzione; i nomi nuovi sono idempotenti e consentono di riallineare anche gli ambienti che abbiano già registrato i nomi precedenti.
2. Due migrazioni di creazione per lo stesso modello (`2026_01_21_*` e `2026_08_06_*`): la regola e' una migrazione per modello.
3. Conversione bigint -> uuid senza guardia: su MySQL i valori interi restano come stringhe ('123'), quindi i dati vengono corrotti in silenzio.
4. Logica duplicata: la conversione era scritta a mano, mentre esiste `XotBaseMigration::updateUserKeyString`, che usa `->change()` senza `nullable`.

## Decisioni prese
- Helper unico `XotBaseMigration::convertUserIdToUuidIfLegacyBigint(Blueprint, bool $nullable = true)`: converte solo se la colonna e' ancora bigint, e RIFIUTA se ci sono valori (RuntimeException). Fail-fast, nessuna corruzione silenziosa.
- Le due migrazioni `2026_11_05_*` delegano all'helper. Restano dove sono: `tableUpdate()` gira solo quando la sua migrazione viene eseguita, quindi su un database gia' migrato la modifica va in un file nuovo. Modificare `2026_08_06_*` sarebbe un doppione: aggiunta e poi tolta.
- Nessuna migrazione cancellata: sono committate (forward-only).

## Acceptance criteria
- [x] AC1: helper con guardia in XotBaseMigration.
- [x] AC2: le due migrazioni 2026_11_05 delegano all'helper, senza logica duplicata.
- [x] AC3: lint OK, `migrate --pretend` sul modulo Lang senza errori.
- [ ] AC4: test di unita' della guardia. Bloccato: i test usano SQLite, dove il tipo e' `integer` e la guardia non scatta. Serve una connessione MySQL di test.
- [ ] AC5: decidere il mapping per le righe legacy in produzione (valori bigint non null). Senza una decisione la migrazione si ferma, come voluto.
- [x] AC6a: nominare le due migrazioni additive dal modello owner, mantenendo i timestamp e la logica idempotente.
- [ ] AC6b: valutare le due migrazioni di creazione duplicate (`2026_01_21_*` e `2026_08_06_*`). Non unificarle retroattivamente: serve verificare lo storico `migrations` di ogni ambiente e mantenere una correzione forward-only.

## Rischio residuo
Se in un ambiente esistono righe con `user_id` numerico in `posts` o `translations`, la migrazione si fermera' con un messaggio chiaro. Non e' un bug: e' la protezione voluta; prima occorre definire un mapping verificabile verso gli UUID.

## Verifica di questa sessione

- I due file additive sono nominati dal modello owner, mantengono i timestamp e
  dichiarano `$model_class` perché non usano il pattern `create_*_table`.
- `php -l` su entrambi i file: OK.
- `Modules/Lang/tests/Unit/Models/TranslationTest.php`: 6 test passati, 14
  asserzioni, con `.env.testing` su `ptv_lara_test` (host `10.100.200.53`).
- `phpstan analyse Modules`: in esecuzione; il primo tentativo è terminato con
  due fatal temporanei di collisione tra trait durante estrazioni Sigma
  concorrenti. Il retry verrà registrato dopo l'esito.
