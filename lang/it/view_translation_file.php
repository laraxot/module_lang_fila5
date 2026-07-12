<?php

declare(strict_types=1);

// Lang translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Lang/docs/wiki — domain i18n only.
// File: lang/it/view_translation_file.php
return [
    'actions' => [
        'edit' => [
            'label' => 'edit',
        ],
    ],
    'label' => 'View Translation File',
    'plural_label' => 'View Translation File (Plurale)',
    'navigation' => [
        'name' => 'View Translation File',
        'plural' => 'View Translation File',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'View Translation File',
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
