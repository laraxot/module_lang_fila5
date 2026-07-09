<?php

declare(strict_types=1);

// Lang translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Lang/docs/wiki — domain i18n only.
// File: lang/it/translation_editor.php
return [
    'fields' => [
        'fields' => [
            'label' => 'fields',
            'placeholder' => 'fields',
            'helper_text' => 'fields',
            'description' => 'fields',
            'tooltip' => '',
        ],
    ],
    'label' => 'Translation Editor',
    'plural_label' => 'Translation Editor (Plurale)',
    'navigation' => [
        'name' => 'Translation Editor',
        'plural' => 'Translation Editor',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Translation Editor',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
    ],
    'actions' => [
        'create' => [
            'label' => 'Crea Translation Editor',
        ],
        'edit' => [
            'label' => 'Modifica Translation Editor',
        ],
        'delete' => [
            'label' => 'Elimina Translation Editor',
        ],
    ],
];
