<?php

declare(strict_types=1);

return [
    'model' => [
        'label' => 'translation file.model',
        'placeholder' => 'Select translation file',
        'helper_text' => 'Translation file for language management',
    ],
    'navigation' => [
        'label' => 'Navigation Label',
        'group' => 'Lang',
        'icon' => 'heroicon-o-cog',
        'sort' => '23',
    ],
    'fields' => [
        'toggleColumns' => [
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'reorderRecords' => [
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'edit' => [
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'resetFilters' => [
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'content' => [
            'label' => '',
            'tooltip' => '',
        ],
        'applyFilters' => [
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
                        'label' => 'Date Label',
                    ],
                ],
            ],
            'label' => '',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'openFilters' => [
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'key' => [
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
            'placeholder' => 'Enter translation key',
            'help' => 'Translation identifier key',
        ],
        'delete' => [
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'actions' => [
        'create' => [
<<<<<<< .merge_file_K67odE
            'label' => 'create',
            'tooltip' => 'Create new translation file',
            'success' => 'Translation file created successfully',
        ],
        'lang' => [
            'label' => 'lang',
            'tooltip' => 'Select language',
=======
            'tooltip' => 'Crea nuovo file di traduzione',
            'success' => 'File di traduzione creato con successo',
        ],
        'lang' => [
            'tooltip' => 'Seleziona lingua',
>>>>>>> .merge_file_kbwPmm
        ],
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
];
