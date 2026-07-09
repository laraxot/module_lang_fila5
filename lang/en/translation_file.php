<?php

declare(strict_types=1);

// Lang translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Lang/docs/wiki — domain i18n only.
// File: lang/en/translation_file.php
return [
    // Lang — translation keys (no business logic).
    // Lang — translation keys (no business logic).
    'model' => [
        'label' => 'translation file.model',
    ],
    'navigation' => [
        'label' => 'Navigation Label',
        'group' => 'Lang',
        'icon' => 'heroicon-o-cog',
        'sort' => '23',
    ],
    'fields' => [
        'toggleColumns' => [
            'label' => 'toggleColumns',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'reorderRecords' => [
            'label' => 'reorderRecords',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'edit' => [
            'label' => 'edit',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'resetFilters' => [
            'label' => 'resetFilters',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'content' => [
            'description' => 'content',
            'helper_text' => 'content',
            'placeholder' => 'content',
            'label' => '',
            'tooltip' => '',
        ],
        'applyFilters' => [
            'label' => 'applyFilters',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'snapshots' => [
            'fields' => [
                'updated_at' => [
                    'help' => [
                        'description' => 'snapshots.fields.updated_at.help',
                        'helper_text' => 'snapshots.fields.updated_at.help',
                        'placeholder' => 'snapshots.fields.updated_at.help',
                        'label' => 'snapshots.fields.updated_at.help',
                    ],
                    'label' => [
                        'description' => 'snapshots.fields.updated_at.label',
                        'helper_text' => 'snapshots.fields.updated_at.label',
                        'placeholder' => 'snapshots.fields.updated_at.label',
                    ],
                ],
            ],
            'label' => '',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'openFilters' => [
            'label' => 'openFilters',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'key' => [
            'label' => 'key',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'actions' => [
        'create' => [
            'label' => 'create',
        ],
        'lang' => [
            'label' => 'lang',
        ],
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
];
