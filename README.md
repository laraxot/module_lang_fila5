# Lang Module

[![Laravel 12.x](https://img.shields.io/badge/Laravel-12.x-red.svg)](https://laravel.com/)
[![Filament 5.x](https://img.shields.io/badge/Filament-5.x-blue.svg)](https://filamentphp.com/)
[![PHPStan Level 10](https://img.shields.io/badge/PHPStan-Level%2010-brightgreen.svg)](https://phpstan.org/)
[![PHP 8.3+](https://img.shields.io/badge/PHP-8.3+-blue.svg)](https://php.net)
[![Languages 3](https://img.shields.io/badge/Languages-IT%20%7C%20EN%20%7C%20DE-green.svg)](#lingue)
[![Actions 10](https://img.shields.io/badge/Actions-10-purple.svg)](#azioni)

> **Gestione avanzata traduzioni**: sincronizzazione file di traduzione, integrazione Spatie/Astrotomic Translatable, validazione Artisan, editor traduzioni da Filament. 3 lingue supportate: IT, EN, DE.

---

## Cosa fa

Il modulo Lang gestisce il sistema di localizzazione dell'intera applicazione: sincronizza i file di traduzione tra moduli, fornisce un editor visuale in Filament per modificare le traduzioni senza toccare i file, valida la completezza delle traduzioni tramite comandi Artisan, e integra Spatie/Astrotomic Translatable per modelli multilingua.

```php
// Tutte le traduzioni sono auto-risolte dal LangServiceProvider
// Non serve specificare label nei componenti Filament
TextInput::make('name');
// -> Risolve automaticamente da: {locale}/{module}::field.name.label

// Sincronizzazione traduzioni
app(SyncTranslationsAction::class)->execute('Quaeris', ['it', 'en', 'de']);

// Modelli traducibili
$survey->setTranslation('title', 'it', 'Questionario Soddisfazione');
$survey->setTranslation('title', 'en', 'Satisfaction Survey');
$survey->getTranslation('title', 'de'); // 'Zufriedenheitsumfrage'
```

---

## Modelli (3)

| Modello | Funzione |
|---------|----------|
| **Translation** | Record traduzione (chiave, valore, lingua) |
| **TranslationFile** | File di traduzione con stato sync |
| **Post** | Contenuto traducibile generico |

---

## Azioni (10)

| Action | Funzione |
|--------|----------|
| **SyncTranslationsAction** | Sincronizza file traduzione tra moduli |
| **PublishTranslationAction** | Pubblica traduzioni aggiornate |
| **SaveTransAction** | Salva traduzione singola |
| **ReadFileAction** | Legge file traduzione PHP/JSON |
| **WriteFileAction** | Scrive file traduzione |
| **ValidateTranslationsAction** | Verifica completezza traduzioni |
| **ImportTranslationsAction** | Importa traduzioni da file |
| **ExportTranslationsAction** | Esporta traduzioni |

---

## Filament Integration

| Resource | Funzione |
|----------|----------|
| **TranslationFileResource** | Editor file traduzioni |
| **LangBaseResource** | Gestione traduzioni base |

| Widget | Funzione |
|--------|----------|
| **LanguageSwitcherWidget** | Switch lingua nell'admin |

---

## Lingue supportate

| Lingua | Codice | Stato |
|--------|--------|-------|
| **Italiano** | `it` | Completo |
| **English** | `en` | Completo |
| **Deutsch** | `de` | Completo |

---

## Auto-risoluzione traduzioni

```php
// Il LangServiceProvider risolve automaticamente le label
// Pattern: {locale}/{module}::field.{field_name}.label

// Esempio per il campo 'email' nel modulo User:
// it/user::field.email.label -> "Email"
// en/user::field.email.label -> "Email"
// de/user::field.email.label -> "E-Mail"

// Non serve hardcodare nessuna label nei componenti Filament
TextInput::make('email'); // La label si risolve automaticamente
```

---

## Integrazione Spatie Translatable

```php
// I modelli usano il trait HasTranslations
use Spatie\Translatable\HasTranslations;

class Survey extends BaseModel
{
    use HasTranslations;

    public array $translatable = ['title', 'description'];
}

// Accesso alle traduzioni
$survey->title; // Restituisce nella lingua attiva
$survey->getTranslation('title', 'de'); // Traduzione specifica
```

---

## Package locale: lara-zeus/spatie-translatable

Il modulo include un package locale (`Modules/Lang/packages/lara-zeus/spatie-translatable`) per l'integrazione Filament-Translatable. Questo package e configurato come repository path nel `composer.json` root.

---

## Integrazione con altri moduli

```
Lang ──> Tutti i moduli (auto-risoluzione traduzioni)
Lang ──> Quaeris    (titoli survey, etichette chart)
Lang ──> Limesurvey (traduzioni domande/risposte)
Lang ──> Cms        (contenuto pagine multilingua)
Lang ──> Meetup     (eventi multilingua)
Lang ──> UI         (componenti con label tradotte)
```

---

## Quick Start

```bash
php artisan module:enable Lang
php artisan migrate

# Verifica traduzioni
php artisan lang:validate

# Pubblica traduzioni aggiornate
php artisan lang:publish
```

---

## Metriche

| Metrica | Valore |
|---------|--------|
| **Modelli** | 3 |
| **Azioni** | 10 |
| **Resource Filament** | 2 |
| **Widget** | 1 |
| **Lingue** | 3 (IT/EN/DE) |
| **PHPStan Level** | 10 |

---

**Module Type**: Localization & Translation
**Architecture**: Auto-resolution, Spatie Translatable, file sync
**Quality**: PHPStan Level 10

*Traduzioni automatiche per tutto l'ecosistema: 3 lingue, auto-risoluzione, editor visuale in Filament.*
