<?php

declare(strict_types=1);

// Lang translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Lang/docs/wiki — domain i18n only.
// File: lang/de/translation.php
return [
// Laraxot module file — see docs/wiki for domain contract.
// Laraxot module file — see docs/wiki for domain contract.
// Laraxot module file — see docs/wiki for domain contract.
// Laraxot module file — see docs/wiki for domain contract.
// Laraxot module file — see docs/wiki for domain contract.
// Laraxot module file — see docs/wiki for domain contract.
// Laraxot module file — see docs/wiki for domain contract.
// Laraxot module file — see docs/wiki for domain contract.
// Laraxot module file — see docs/wiki for domain contract.
// Laraxot module file — see docs/wiki for domain contract.
    'navigation' => [
        'name' => 'Traduzione',
        'plural' => 'Traduzioni',
        'group' => [
            'name' => 'Admin',
        ],
    ],
    'pages' => [
        'create' => 'Nuovo Tecnico',
        'edit' => 'Modifica Tecnico',
        'view' => 'Tecnico',
        'list_technicians' => [
            'navigation' => [
                'name' => 'Tecnici',
                'plural' => 'Tecnici',
                'group' => [
                    'name' => 'Gestione Utenti',
                ],
            ],
            'fields' => [
                'user_name' => 'Nome Utente',
                'name' => 'Nome Utente',
                'first_name' => 'Nome',
                'last_name' => 'Cognome',
                'email' => 'Email',
                'is_active' => 'Stato account',
                'color' => 'Colore',
                'asset_id_root' => 'Abitazione',
                'asset_id' => 'Asset',
                'type' => 'Tipo',
            ],
        ],
    ],
    'fields' => [
        'id' => [
            'label' => 'ID',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'lang' => [
            'label' => 'Lingua',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'value' => [
            'label' => 'Valore',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'key' => [
            'label' => 'Chiave',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'namespace' => [
            'label' => 'Namespace',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'group' => [
            'label' => 'Gruppo',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'item' => [
            'label' => 'Elemento',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'name' => [
            'label' => 'Nome Utente',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'first_name' => [
            'label' => 'Nome',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'last_name' => [
            'label' => 'Cognome',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'email' => [
            'label' => 'Email',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'is_active' => [
            'label' => 'Stato account',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'color' => [
            'label' => 'Colore',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'asset_id_root' => [
            'label' => 'Abitazione',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'asset_id' => [
            'label' => 'Asset',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'type' => [
            'label' => 'tipo',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'user_name' => [
            'label' => 'nome utente',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'filters' => [
        'is_active' => [
            'all' => 'Tutti i tecnici',
            'active' => 'Solo attivi',
            'inactive' => 'Solo inattivi',
        ],
    ],
    'actions' => [
        'bulk_activate' => [
            'cta' => 'Attiva selezionati',
        ],
        'bulk_inactivate' => [
            'cta' => 'Disattiva selezionati',
        ],
        'is_active_on' => [
            'cta' => 'Abilita account',
        ],
        'is_active_off' => [
            'cta' => 'Disabilita account',
        ],
    ],
    'act' => [
        'publish_item_trans' => 'pubblica modifiche riga',
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
];
