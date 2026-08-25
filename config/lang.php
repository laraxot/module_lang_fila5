<?php

declare(strict_types=1);

return [
    /*
     * |--------------------------------------------------------------------------
     * | Configurazione Base Localizzazione
     * |--------------------------------------------------------------------------
     * |
     * | Configurazione principale per il sistema di localizzazione
     * | del modulo Lang. Segue i principi DRY + KISS + SOLID.
     * |
     */

<<<<<<< HEAD
   'default_locale' => 'it',
=======
    'default_locale' => 'it',
>>>>>>> laraxot/dev
    'fallback_locale' => 'en',
    'available_locales' => ['it', 'en', 'de'],
    /*
     * |--------------------------------------------------------------------------
     * | Configurazione Cache e Performance
     * |--------------------------------------------------------------------------
     * |
     * | Ottimizzazioni per performance e scalabilità
     * |
     */

    'cache' => [
<<<<<<< HEAD
       'enabled' => true,
=======
        'enabled' => true,
>>>>>>> laraxot/dev
        'ttl' => 3600, // 1 ora
        'prefix' => 'lang_translations',
        'compression' => true,
    ],
    /*
     * |--------------------------------------------------------------------------
     * | Configurazione Validazione
     * |--------------------------------------------------------------------------
     * |
     * | Sistema di validazione e controllo qualità traduzioni
     * |
     */

    'validation' => [
<<<<<<< HEAD
       'enabled' => true,
=======
        'enabled' => true,
>>>>>>> laraxot/dev
        'strict_mode' => false,
        'auto_fix' => false,
        'report_missing_keys' => true,
        'quality_threshold' => 95, // %
    ],
    /*
     * |--------------------------------------------------------------------------
     * | Configurazione Auto-Translation
     * |--------------------------------------------------------------------------
     * |
     * | Integrazione con servizi di traduzione automatica
     * |
     */

    'auto_translate' => [
<<<<<<< HEAD
       'enabled' => false,
=======
        'enabled' => false,
>>>>>>> laraxot/dev
        'provider' => 'google',
        'api_key' => null,
        'fallback_chain' => [
            'it' => ['en', 'de'],
            'de' => ['en', 'it'],
            'en' => ['it', 'de'],
        ],
<<<<<<< HEAD
       'quality_check' => true,
=======
        'quality_check' => true,
>>>>>>> laraxot/dev
    ],
    /*
     * |--------------------------------------------------------------------------
     * | Configurazione Filament Integration
     * |--------------------------------------------------------------------------
     * |
     * | Integrazione specifica con Filament UI
     * |
     */

    'filament' => [
<<<<<<< HEAD
       'auto_labels' => true,
=======
        'auto_labels' => true,
>>>>>>> laraxot/dev
        'auto_placeholders' => true,
        'auto_help_text' => true,
        'component_prefix' => '',
        'fallback_to_key' => false,
    ],
    /*
     * |--------------------------------------------------------------------------
     * | Configurazione Struttura File
     * |--------------------------------------------------------------------------
     * |
     * | Standardizzazione struttura file traduzioni
     * |
     */

    'structure' => [
        'required_files' => [
            'fields.php',
            'actions.php',
            'messages.php',
            'validation.php',
        ],
        'optional_files' => [
            'navigation.php',
            'errors.php',
            'notifications.php',
            'emails.php',
        ],
        'naming_convention' => 'snake_case',
        'array_syntax' => 'short', // [] invece di array()
        'strict_types' => true,
    ],
    /*
     * |--------------------------------------------------------------------------
     * | Configurazione Debug e Logging
     * |--------------------------------------------------------------------------
     * |
     * | Strumenti per sviluppo e troubleshooting
     * |
     */

    'debug' => [
<<<<<<< HEAD
       'enabled' => false,
=======
        'enabled' => false,
>>>>>>> laraxot/dev
        'log_missing_keys' => true,
        'log_performance' => false,
        'log_channel' => 'translations',
        'show_keys_in_production' => false,
    ],
    /*
     * |--------------------------------------------------------------------------
     * | Configurazione Performance
     * |--------------------------------------------------------------------------
     * |
     * | Ottimizzazioni avanzate per performance
     * |
     */

    'performance' => [
<<<<<<< HEAD
       'lazy_loading' => true,
=======
        'lazy_loading' => true,
>>>>>>> laraxot/dev
        'memory_optimization' => true,
        'batch_loading' => true,
        'preload_common_keys' => true,
        'compression_level' => 6,
    ],
    /*
     * |--------------------------------------------------------------------------
     * | Configurazione Sicurezza
     * |--------------------------------------------------------------------------
     * |
     * | Protezioni e validazioni di sicurezza
     * |
     */

    'security' => [
<<<<<<< HEAD
       'validate_file_integrity' => true,
=======
        'validate_file_integrity' => true,
>>>>>>> laraxot/dev
        'max_file_size' => 1024 * 1024, // 1MB
        'allowed_extensions' => ['php'],
        'scan_for_malicious_code' => true,
        'rate_limiting' => true,
    ],
    /*
     * |--------------------------------------------------------------------------
     * | Configurazione Business Logic
     * |--------------------------------------------------------------------------
     * |
     * | Regole specifiche per logica di business
     * |
     */

    'business' => [
        'enforce_naming_conventions' => true,
        'require_context_in_keys' => true,
        'validate_business_terms' => true,
        'consistency_check' => true,
        'domain_specific_validation' => true,
    ],
    /*
     * |--------------------------------------------------------------------------
     * | Configurazione Laraxot Integration
     * |--------------------------------------------------------------------------
     * |
     * | Integrazione specifica con framework Laraxot
     * |
     */

    'laraxot' => [
        'module_auto_discovery' => true,
        'shared_translations' => true,
        'cross_module_validation' => true,
        'unified_naming' => true,
        'framework_compliance' => true,
    ],
];
