---
title: "Migrazioni del modulo Lang"
type: reference
module: Lang
tags: [documentation]
created: 2026-09-26
updated: 2026-11-25
status: draft
qmd: "migrazioni lang XotBaseMigration language_lines posts translations user_id uuid convertUserIdToUuidIfLegacyBigint tableCreate tableUpdate ledger forward-only pattern connessione verifica quality gates"
issues: []
discussions: []
related:
  - ./bmad/stories/0030-user-id-uuid-migration-convention.story.md
  - ./bmad/stories/user-id-uuid-migration-convention.story.md
  - ./model-translations.md
---
# Migrazioni del modulo Lang

`Modules/Lang/database/migrations/`: undici file su tre tabelle, tutti su `XotBaseMigration` con `$model_class` esplicito.

## Tabelle

| Tabella | Modello | Colonne principali |
|---|---|---|
| `language_lines` | `LanguageLine` | `id`, `group` (indice), `key`, `text` (json), `locale` (indice); unica su `(group, key, locale)`; timestamp e audit |
| `posts` | `Post` | `id` stringa (primaria), `user_id`, `post_id`, `lang`, `guid` (unica), `title`, `subtitle`, `post_type`, `txt`, `content`, `excerpt`, `slug`, `status`, `published_at`, `locale`, `category`, `image_*`, `meta_*`, `author_id`, `url`, `url_lang` (json); timestamp e audit |
| `translations` | `Translation` | `id`, `lang`, `value`, `namespace`, `group`, `item`, `key`, `locale`, `user_id`; indici su lang, namespace, group, key, locale; timestamp e audit |

`TranslationFile` non ha migrazione: e' un modello Sushi in memoria.

## File, nell'ordine di esecuzione

| File | Effetto |
|---|---|
| `2024_03_20_000001_create_language_lines_table` | crea `language_lines` |
| `2026_01_21_211814_create_posts_table` | crea `posts` |
| `2026_01_21_211815_create_translations_table` | crea `translations` |
| `2026_08_06_190000_create_posts_table` | seconda "create": `tableCreate()` non fa niente se la tabella esiste; `tableUpdate()` aggiunge solo le colonne mancanti (`excerpt`, `slug`, `status`, `published_at`...) |
| `2026_08_06_190100_create_translations_table` | come sopra per `translations` (`key`, `locale`, `user_id`) |
| `2026_11_05_100000_create_posts_table` | "owner canonico": se la tabella esiste converte `user_id` da bigint a UUID **conservando** i valori legacy come stringhe (`preserveLegacyValues: true`) |
| `2026_11_05_100000_update_posts_table` | `convertUserIdToUuidIfLegacyBigint()` senza conservazione: si ferma con eccezione se trova righe con `user_id` bigint |
| `2026_11_05_100000_update_user_id_uuid_on_posts_table` | `change()` a `uuid` se la colonna e' ancora bigint |
| `2026_11_05_100001_{create,update,update_user_id_uuid_on}_translations_table` | le stesse tre per `translations` |

Le tre di novembre sono ridondanti per costruzione: la prima che trova la colonna ancora bigint la converte, le altre trovano gia' una colonna non bigint e non fanno niente
(il helper e' idempotente). Il piano `create_*` + `update_*` per lo stesso modello non rispetta "una tabella, una migrazione": le duplicate **non si cancellano ne' si rinominano**
(il nome file e' parte della chiave del ledger degli ambienti gia' migrati); un eventuale consolidamento e' solo in avanti e dopo aver confrontato i ledger di tutti gli ambienti
(story [0030](bmad/stories/0030-user-id-uuid-migration-convention.story.md)).

## Perche' `user_id` e' UUID

Gli id di `Modules\User\Models\User` sono UUID; `user_id` nasceva `bigint` e ogni insert con un utente reale falliva con `Incorrect integer value`.
`XotBaseMigration::convertUserIdToUuidIfLegacyBigint($table, $nullable = true, $preserveLegacyValues = false)`:

1. non fa niente se la colonna non esiste o non e' bigint;
2. con righe `user_id` non nulle e senza `preserveLegacyValues` lancia `RuntimeException` (serve un mapping esplicito verso gli UUID);
3. con `preserveLegacyValues` converte in `char(36)` mantenendo i numeri come stringhe, risolvibili in seguito con un mapping verificato.

Ogni migrazione di novembre controlla `tableExists()` prima di `tableUpdate()`, cosi' non crea una tabella vuota quando manca il bersaglio.

## Regole

- Mai `migrate:fresh`, `migrate:refresh` o `--force` decisi da un agente; mai `down()` con drop; mai rimuovere colonne: solo aggiunte idempotenti (`hasColumn()` in `tableUpdate()`).
- Nome file: `{timestamp}_{azione}_{modello_plurale}_table.php`. `XotBaseMigration::getModelClass()` risolve il modello dal nome file solo per `create_*_table`: per `update_*` il
  `protected ?string $model_class` e' obbligatorio.
- Timestamp e audit con `$this->updateTimestamps($table, false)` (nessun modello Lang usa soft delete): aggiunge `created_at`, `updated_at`, `created_by`, `updated_by` se mancano.
- Una nuova modifica di schema e' un nuovo file `add_<colonna>_to_<tabella>` o `update_<tabella>`, mai la modifica di un file gia' applicato.
- I test usano un database gia' migrato (`php artisan migrate --env=testing` una volta): [testing.md](testing.md).

## Modelli: scopo e caratteristiche

- **`LanguageLine`**: righe di traduzione granulari per gruppo, chiave e locale. Una sola traduzione per combinazione `(group, key, locale)`.
- **`Post`**: modello versatile per post, pagine ed editoriali con metadati SEO. Sluggable, trait `Updater`, post padre via `post_id`.
- **`Translation`**: traduzione di chiavi namespace/group, sul modello di [barryvdh/laravel-translation-manager](https://github.com/barryvdh/laravel-translation-manager); archivia e sincronizza traduzioni da file a database.
- **`TranslationFile`**: modello Sushi in memoria, non persistente; carica i file di traduzione dal filesystem con `GetAllTranslationAction`. Non richiede migrazione, quindi la parita' modello/tabella vale per i soli tre modelli su database.

## Convenzione di nome file

Le creazioni seguono `YYYY_MM_DD_HHMMSS_create_<tabella_plurale>_table.php`: `XotBaseMigration` singolarizza la tabella e ricava il modello. Le migrazioni additive usano un verbo descrittivo (`update_<tabella_plurale>_table`) e dichiarano `$model_class`, perche' il modello non e' derivabile dal pattern `create_*_table`.

La regola del progetto e' una migrazione owner `create_*_table` per modello, con i cambi colonna dentro il suo `tableUpdate()`; le eccezioni `add_*` / `update_*` / `fix_*` gia' pubblicate restano finche' non sono consolidate (Lang ne ha, elencate nella tabella dei file sopra).

L'audit del naming sulle migrazioni dei moduli e' nella [story BMAD di convenzione](./bmad/stories/user-id-uuid-migration-convention.story.md): 245 file su 252 in `Modules/*/database/migrations/` rispettano `timestamp_azione_modello-plurale_table.php`; `Themes/*/database/migrations/` non contiene migrazioni. Le sette eccezioni gia' pubblicate sono censite nella story BMAD Xot e non si rinominano retroattivamente: cambiare il filename cambia la chiave nel ledger Laravel e fa risultare pendente lo stesso file. Per i file gia' distribuiti si verifica sempre il ledger e si corregge solo in avanti; non si rinomina alla cieca una migrazione non idempotente.

## Pattern `XotBaseMigration`

Ogni migrazione estende `XotBaseMigration`. La classe modello e' opzionale per `create_*_table` (la deriva dal nome file) e obbligatoria per `update_*`:

**Minimale (raccomandato):**

```php
<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration
{
    // Il modello e' derivato dal filename: 2026_01_21_211814_create_posts_table.php -> Post.
    // Aggiungi $model_class solo se serve esplicitarlo.

    public function up(): void
    {
        $this->tableCreate(function (Blueprint $table): void {
            $table->id();
            $table->string('column_name');
        });

        $this->tableUpdate(function (Blueprint $table): void {
            $this->updateTimestamps($table, false);  // false = senza soft delete
        });
    }
};
```

**Esplicito (obbligatorio per `update_*`):**

```php
<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Lang\Models\Post;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration
{
    protected ?string $model_class = Post::class;

    public function up(): void
    {
        $this->tableUpdate(function (Blueprint $table): void {
            $this->updateTimestamps($table, false);
        });
    }
};
```

### Metodi principali

| Metodo | Scopo |
|--------|-------|
| `$this->tableCreate($closure)` | Crea la tabella (idempotente) |
| `$this->tableUpdate($closure)` | Modifica la tabella (idempotente) |
| `$this->hasColumn($name)` | Verifica se la colonna esiste |
| `$this->updateTimestamps($table, $softDeletes)` | Aggiunge le colonne di audit (`deleted_at` e `deleted_by` solo con soft delete: nessun modello Lang lo usa) |
| `$this->getTable()` | Nome tabella dal modello |
| `$this->getConn()` | Connessione dal modello |

### Perche' `XotBaseMigration`

- **Fonte unica**: nome tabella e connessione derivano dal modello, mai scritti a mano.
- **Idempotente**: `tableCreate()` e `tableUpdate()` si possono rilanciare senza danni.
- **Audit integrato**: le colonne di audit si aggiungono con un solo helper.
- **Errore subito**: fallisce se il modello non esiste.

## Connessione: niente `$connection` nelle migrazioni

Le migrazioni che estendono `XotBaseMigration` **non dichiarano** la proprieta' `$connection`: la connessione e' definita una sola volta nel modello (`protected $connection = 'tenant_db';`) e `getConn()` la legge dal modello indicato in `$model_class`. Senza `$connection` nel modello vale la connessione di default.

```php
// Vietato: duplica una informazione che sta gia' nel modello
return new class extends XotBaseMigration {
    protected ?string $model_class = Project::class;
    protected string $connection = 'tenant_db';
};

// Corretto: la connessione deriva dal modello
return new class extends XotBaseMigration {
    protected ?string $model_class = Project::class; // Project ha $connection = 'tenant_db'
};
```

Verifica (deve restituire 0 risultati):

```bash
grep -r "protected.*\$connection" laravel/Modules/*/database/migrations/*.php
```

## Lista di controllo

Prima di considerare completa una migrazione:

- [ ] Estende `XotBaseMigration` (non `Migration`).
- [ ] Ha `protected ?string $model_class = ModelClass::class;` (obbligatorio per `update_*`).
- [ ] Usa `$this->tableCreate()` per la struttura iniziale e `$this->tableUpdate()` per le colonne aggiunte e quelle di audit.
- [ ] Chiama `$this->updateTimestamps($table, false)` (o `true` per soft delete).
- [ ] Nessun nome tabella o connessione scritti a mano (`$this->getTable()`, connessione dal modello).
- [ ] Nome file `YYYY_MM_DD_HHMMSS_create_<tabella>_table.php` per la creazione canonica, `update_<tabella>_table` per le aggiunte.
- [ ] File in `database/migrations/`, non in sottocartelle.
- [ ] Nessun `down()` con drop, nessuna colonna rimossa (dati sacri).
- [ ] PHPStan a zero.

## Comandi di verifica

Da `laravel/`:

```bash
# Modelli su database (esclusi base, trait, policy, contract) e file di migrazione
grep -l "^class.*extends.*Model" Modules/Lang/app/Models/*.php | wc -l   # TranslationFile (Sushi) non ha tabella
ls Modules/Lang/database/migrations/*.php | wc -l                         # 11 file per 3 tabelle (vedi sopra)

# Ogni migrazione estende XotBaseMigration (non deve stampare nulla)
grep -L "extends XotBaseMigration" Modules/Lang/database/migrations/*.php

# File che non seguono create_/update_ (non deve stampare nulla)
ls -1 Modules/Lang/database/migrations/*.php | grep -v -E "/[0-9]{4}_[0-9]{2}_[0-9]{2}_[0-9]{6}_(create|update)_"
```

## Controlli di qualita'

Quando si modifica o si aggiunge una migrazione (da `laravel/`):

```bash
php -l Modules/Lang/database/migrations/<file>.php
./vendor/bin/phpstan analyse Modules/Lang/database/migrations
php vendor/bin/phpmd Modules/Lang/database/migrations text codesize,naming,unusedcode
```

L'esecuzione (`php artisan migrate --path=Modules/Lang/database/migrations`) e il test di `rollback` si fanno solo sul database di test (`laravel/.env.testing`, suffisso `_test`), mai su quello con dati reali: regola dati sacri.

## Documentazione collegata

- Sorgente di `XotBaseMigration`: `Modules/Xot/app/Database/Migrations/XotBaseMigration.php`
- Regola canonica delle migrazioni: `bashscripts/ai/wiki/rules/migrations.md`
- Traits e base dei modelli: `Modules/Lang/app/Models/BaseModel.php`
