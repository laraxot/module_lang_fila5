# Modulo Lang - Documentazione

## Panoramica
Il modulo Lang gestisce automaticamente le traduzioni per tutti i componenti Filament dell'applicazione Laraxot/PTVX tramite:
1. **LangServiceProvider**: Traduzione automatica componenti (elimina necessità di `->label()`, `->placeholder()`, `->helperText()`)
2. **Spatie Translatable Plugin**: Supporto contenuti multilingua nei modelli (integrazione Lara Zeus)

## Componenti Principali

### LangServiceProvider
Service Provider che estende `XotBaseServiceProvider` e configura automaticamente tutti i componenti Filament per utilizzare le traduzioni.

**Caratteristiche:**
- Registrazione automatica delle traduzioni per tutti i componenti Filament
- Supporto per Field, Column, Entry, BaseFilter, Action, Section, Step
- Integrazione con AutoLabelAction per traduzione automatica
- Gestione dei messaggi di validazione

**Pattern utilizzato:**
```php
Field::configureUsing(function (Field $component) {
    $component = app(AutoLabelAction::class)->execute($component);
    // Auto-traduzione di label, placeholder, helperText, description
    return $component;
});
```

## Struttura Traduzioni

### File di Traduzione
Le traduzioni sono organizzate in `Modules/Lang/lang/{locale}/`:

- `txt.php` - Traduzioni generiche
- Altri file specifici per contesto

### Struttura Espansa
Tutti i file di traduzione seguono la struttura espansa:

```php
'field_name' => [
    'label' => 'Etichetta',
    'placeholder' => 'Placeholder',
    'helper_text' => 'Testo di aiuto',
    'description' => 'Descrizione',
],
```

## AutoLabelAction

### Funzionamento
L'action `AutoLabelAction` è il cuore del sistema di traduzione automatica:

1. Riceve un componente Filament
2. Determina il nome del campo/componente
3. Cerca la traduzione appropriata nei file di traduzione
4. Applica la traduzione al componente
5. Restituisce il componente tradotto

### Metodi Supportati
- `label` - Etichetta principale
- `placeholder` - Testo segnaposto
- `helperText` - Testo di aiuto
- `description` - Descrizione
- `heading` - Intestazione (per Section)
- `icon` - Icona (per Action)

## Best Practices

### ✅ Pattern Corretto
```php
// Nel Resource o nella Page
TextInput::make('email')
    ->required()
    ->email();

// La traduzione viene applicata automaticamente dal LangServiceProvider
```

### ❌ Anti-Pattern (da evitare)
```php
// MAI fare questo
TextInput::make('email')
    ->label('Email')  // ❌ VIETATO
    ->placeholder('Inserisci email')  // ❌ VIETATO
    ->helperText('Email valida')  // ❌ VIETATO
    ->required();
```

## TranslatorService

### Descrizione
Estensione del translator Laravel standard con funzionalità aggiuntive per l'integrazione con il sistema di gestione traduzioni.

**Nota:** Attualmente non registrato di default (metodo `registerTranslator()` commentato nel ServiceProvider).

## Componenti Configurati Automaticamente

Il LangServiceProvider configura automaticamente:

1. **Field** - Tutti i campi form
2. **Select** - Campo select con placeholder default
3. **Column** - Colonne tabelle con wrapping e allineamento
4. **Entry** - Entry di Infolist
5. **BaseFilter** - Filtri tabelle
6. **Action** - Tutte le azioni
7. **Section** - Sezioni con heading
8. **Step** - Step di wizard

## Integrazione con Altri Moduli

### Modulo Xot
Il modulo Lang dipende dal modulo Xot per:
- `XotBaseServiceProvider` - Classe base per ServiceProvider
- `BladeService` - Registrazione componenti Blade (commentato)

### Modulo User
- Utilizza le traduzioni di validazione da `user::validation`

## Troubleshooting

### Le traduzioni non vengono applicate
1. Verificare che il LangServiceProvider sia registrato in `config/app.php`
2. Pulire le cache: `php artisan cache:clear && php artisan config:clear`
3. Verificare la struttura del file di traduzione (deve essere espansa)

### Conflitti con traduzioni esistenti
Se un componente ha già una label impostata manualmente, rimuoverla e affidarsi al sistema automatico.

## Sviluppi Futuri

### Funzionalità Pianificate
- Registrazione componenti Blade custom
- Attivazione TranslatorService personalizzato
- Supporto per ulteriori componenti Filament

## Spatie Translatable Plugin

### Overview

Il modulo Lang fornisce integrazione con **Lara Zeus Spatie Translatable** per supportare contenuti multilingua.

### Panel Registration

Il plugin è registrato in `AdminPanelProvider`:

```php
use LaraZeus\SpatieTranslatable\SpatieTranslatablePlugin;

$panel->plugins([
    SpatieTranslatablePlugin::make()
        ->defaultLocales(['it', 'en']),
]);
```

### LangBase Classes

Classi base che forniscono funzionalità multilingua:

- `LangBaseResource` - Resource con trait Translatable
- `LangBaseListRecords` - ListRecords con LocaleSwitcher
- `LangBaseCreateRecord` - CreateRecord con supporto lingue  
- `LangBaseEditRecord` - EditRecord con supporto lingue

### Requisiti per Usare LangBase

Per estendere le classi `LangBase*`:

1. ✅ Il **panel** deve avere il plugin registrato
2. ✅ Il **modello** deve avere trait `HasTranslations`
3. ✅ I **campi traducibili** devono essere JSON nel database

### Moduli che Richiedono il Plugin

Tutti i moduli le cui risorse estendono `LangBase*` devono registrare il plugin nel proprio `AdminPanelProvider`:

- ✅ `Lang` - ha plugin registrato
- ✅ `Notify` - **FIX APPLICATO** (plugin registrato)
- ⚠️  Altri moduli - verificare se usano LangBase

### Documentazione

Consultare [Notify Spatie Translatable Integration](../../Notify/docs/spatie-translatable-integration.md) per esempio completo.

## Collegamenti

- [Modulo Xot](../../Xot/docs/readme.md)
- [Best Practices Filament](../../Xot/docs/filament-best-practices.md)
- [Regole Traduzioni Laraxot](./../../../docs/laraxot-conventions.md)
- [Notify Spatie Translatable](../../Notify/docs/spatie-translatable-integration.md)
- [Lara Zeus Spatie Translatable Docs](https://filamentphp.com/plugins/lara-zeus-spatie-translatable)

## Regole Fondamentali

> **MAI usare ->label(), ->placeholder(), ->helperText() nei componenti Filament**
> 
> Tutte le traduzioni DEVONO essere gestite automaticamente tramite il LangServiceProvider e i file di traduzione con struttura espansa.

*Ultimo aggiornamento: gennaio 2025*
