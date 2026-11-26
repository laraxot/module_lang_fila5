---
title: "Modelli e traduzioni di contenuti"
type: reference
module: Lang
tags: [lang, modelli, traduzioni]
created: 2026-07-14
updated: 2026-11-25
qmd: "modelli lang Post Translation LanguageLine TranslationFile BaseModelLang LangField HasStrictTranslations TranslatableModel spatie translatable HasTranslationsContract connessione lang alternative astrotomic tabella traduzioni manuale"
issues: []
discussions: []
related:
  - ./migrations.md
  - ./translation-files.md
  - ./italian-text-refined-audit-report.md
---
# Modelli e traduzioni di contenuti

Due cose diverse vivono in Lang: i **testi dell'interfaccia** (file `lang/<locale>/*.php`, vedi [translation-files.md](translation-files.md)) e i **contenuti dei modelli** nelle
varie lingue (colonne tradotte con `spatie/laravel-translatable`). Questa pagina riguarda i modelli e le basi che Lang mette a disposizione.

## Modelli del modulo (`Modules\Lang\Models`)

Tutti usano la connessione `lang` (aggiunta come copia della connessione di default da `TenantServiceProvider::registerDB()`).

| Modello | Tabella | Ruolo |
|---|---|---|
| `LanguageLine` | `language_lines` | riga di traduzione per `group`, `key`, `locale`, testo JSON `text`; unica su `(group, key, locale)` |
| `Translation` | `translations` | chiavi di traduzione note al sistema (`lang`, `namespace`, `group`, `item`, `key`, `value`, `locale`, `user_id`): le riempie `RecordMissingTranslationAction`; in stile `barryvdh/laravel-translation-manager` |
| `Post` | `posts` | contenuto editoriale multilingua (`title`, `txt`, `slug`, `status`, `lang`/`locale`, meta SEO, `url_lang` JSON); chiave stringa, slug generato da `title` in `guid` (Spatie Sluggable), `SEARCHABLE_FIELDS = title, guid, txt` |
| `TranslationFile` | nessuna (Sushi) | un file di lingua del filesystem come riga: base dell'editor ([translation-file-editor.md](translation-file-editor.md)) |

Basi riusabili da altri moduli:

- `BaseModel` (astratta, `XotBaseModel`, connessione `lang`, cast `id`/`uuid` stringa e date) e `BaseModelLang` (stesso, chiave `id` stringa, `perPage` 30, `snakeAttributes`).
- `BaseMorphPivot` (`MorphPivot` con `Updater`, connessione `lang`).
- `TranslatableModel` (astratta, su `BaseModel`): usa `HasStrictTranslations`.
- `Models\Contracts\HasTranslationsContract`: `getTranslation($key, $locale, $useFallbackLocale = true)` e `setTranslation($key, $locale, $value)` con tipi stretti.

## Contenuti tradotti: `HasStrictTranslations`

Trait che incapsula `Spatie\Translatable\HasTranslations` restringendo il ritorno di `getTranslation()` a `string|array|int|null` (per PHPStan livello 10):
stringhe, interi e `null` passano; un array viene filtrato alle chiavi stringa; `bool` e `float` diventano `int`; un oggetto con `__toString` diventa stringa; il resto `null`.
L'API di Spatie resta quella standard: `$translatable = [...]` sul modello, `setTranslation()`, `getTranslations()`, valore nella lingua corrente leggendo l'attributo.
Al momento della scrittura nessun altro modulo usa `TranslatableModel`/`HasStrictTranslations`: sono la base disponibile e coperta dai test del modulo.

Nel pannello Lang il plugin `SpatieTranslatablePlugin` (pacchetto `lara-zeus/spatie-translatable`, richiesto da `composer.json`) usa `defaultLocales(['en', 'it'])`;
nelle risorse le lingue vengono da `GetTranslatableLocalesAction`.

## `LangField` e `BaseModelLang`

`Casts\LangField` legge e scrive l'attributo sul `post` collegato al modello (`$model->post->{$key}`), cosi' un modello puo' esporre come proprio un campo che
vive in `posts`; `set()` salva il `post` e non scrive niente sul modello (ritorna `[]`). Richiede un `BaseModelLang` (`Assert::isInstanceOf`).

## Stato di una riga `Translation`

`Enums\TranslationStatusEnum` (`SAVED = 0`, `CHANGED = 1`) e' il vocabolario di `laravel-translation-manager`: la tabella `translations` non ha ancora una colonna `status`,
quindi il modello non dichiara il cast (da aggiungere insieme alla migration).

## Dati e tipi

- `posts.user_id` e `translations.user_id` sono UUID (come gli utenti): conversione e regole in [migrations.md](migrations.md).
- Nessun modello di Lang usa soft delete.
- `Post::casts()` aggiunge a quelli di `BaseModel` il cast `url_lang => array`: la colonna e' `json` e senza cast `$post->url_lang['it']` leggeva il JSON grezzo come stringa
  (la `@property` dichiarava `array<string, string>|null`, ma PHPStan legge la promessa, non lo schema). Usa `array_merge(parent::casts(), ...)` perche' il metodo
  **sostituisce** quello di `BaseModel` (cast di `id`, `uuid`, date): dichiararne uno proprio senza unirli li farebbe sparire. Niente cast per `image_resize_src` (stringa)
  ne' `deleted_at` (la tabella `posts` non ha quella colonna).

## Alternative generiche per tradurre i contenuti di un modello

Lang usa `spatie/laravel-translatable` (colonna JSON, vedi sopra). Queste sono le alternative considerate in origine; restano come riferimento per chi deve scegliere un'altra strada
per un modello con esigenze diverse. Gli esempi usano un modello `Service` qualsiasi.

### Approccio 1: tabelle di traduzione scritte a mano (senza pacchetti)

Una tabella base con i dati non traducibili (id, date) e una tabella di traduzione con i campi traducibili, collegata per id e `locale`. Il pieno controllo dello schema e della logica ha come prezzo una tabella e un modello in piu' per ogni modello tradotto.

```php
// Migration for services table
Schema::create('services', function (Blueprint $table) {
    $table->id();
    $table->dateTime('created_at')->nullable();
    $table->softDeletes();
    $table->timestamps();
});

// Migration for service_translations table
Schema::create('service_translations', function (Blueprint $table) {
    $table->id();
    $table->foreignId('service_id')->constrained()->cascadeOnDelete();
    $table->string('locale');
    $table->string('name');
    $table->text('description');
    $table->softDeletes();
    $table->timestamps();
});

```

Il modello base espone le relazioni e gli accessor che leggono la traduzione nella lingua corrente; il modello di traduzione gestisce i testi.

```php
// app/Models/Service.php
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;

    protected $fillable = [];

    protected $with = ['defaultTranslation'];

    public function name(): Attribute
    {
        return new Attribute(get: fn() => $this->defaultTranslation->name);
    }

    public function description(): Attribute
    {
        return new Attribute(get: fn() => $this->defaultTranslation->description);
    }

    public function translations(): HasMany
    {
        return $this->hasMany(ServiceTranslation::class);
    }

    public function defaultTranslation(): HasOne
    {
        return $this->translations()->one()->where('locale', app()->getLocale());
    }
}

// app/Models/ServiceTranslation.php
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceTranslation extends Model
{
    use SoftDeletes;

    protected $fillable = ['service_id', 'locale', 'name', 'description'];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}

```

Salvataggio: si valida ogni campo per ogni lingua supportata e si crea una riga di traduzione per lingua. Nella vista c'e' un blocco di campi per lingua, con le etichette prese dai file di lingua (mai scritte nel codice).

```php
// app/Http/Controllers/ServiceController.php
public function store(Request $request): RedirectResponse
{
    $rules = [];
    foreach (config('app.available_locales') as $locale) {
        $rules += [
            'name.' . $locale => ['required', 'string'],
            'description.' . $locale => ['required', 'string'],
        ];
    }
    $this->validate($request, $rules);

    $service = Service::create([]);
    foreach (config('app.available_locales') as $locale) {
        $service->translations()->create([
            'locale' => $locale,
            'name' => $request->input('name.' . $locale),
            'description' => $request->input('description.' . $locale),
        ]);
    }
    return redirect()->route('services.index');
}

```

### Approccio 2: pacchetti

- **Spatie Laravel Translatable** (scelto da Lang): le traduzioni stanno in una colonna JSON, l'attributo restituisce la lingua corrente, c'e' il fallback di lingua. `composer require spatie/laravel-translatable`, trait `HasTranslations` e `public $translatable = ['name', 'description'];` sul modello; `setTranslation('name', 'it', ...)` per scrivere, lettura dell'attributo per la lingua corrente.
- **Astrotomic Laravel Translatable**: una tabella di traduzione dedicata per modello, come l'approccio manuale ma con helper integrati (relazioni automatiche, fallback). Installazione: `composer require astrotomic/laravel-translatable`, pubblicare il service provider, migrare; il modello usa il contratto e il trait `Translatable` con i campi traducibili.

### Raccomandazione

Partire da **Spatie Laravel Translatable**: setup minimo ed efficiente con colonne JSON. Per modelli che richiedono un tracciamento dettagliato delle traduzioni o tabelle separate (per esempio per audit) valutare l'approccio manuale o **Astrotomic**.
