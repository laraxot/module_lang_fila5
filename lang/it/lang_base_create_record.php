<?php

declare(strict_types=1);

// Lang translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Lang/docs/wiki — domain i18n only.
// File: lang/it/lang_base_create_record.php
return [
    'actions' => [
        'activeLocale' => [
            'label' => 'activeLocale',
        ],
    ],
    'label' => 'Lang Base Create Record',
    'plural_label' => 'Lang Base Create Record (Plurale)',
    'navigation' => [
        'name' => 'Lang Base Create Record',
        'plural' => 'Lang Base Create Record',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Lang Base Create Record',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
    ],
    'fields' => [
        'id' => [
            'label' => 'Identificativo',
            'tooltip' => 'Identificativo univoco del record',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'Data Creazione',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'updated_at' => [
            'label' => 'Ultima Modifica',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
];
