<?php

declare(strict_types=1);

return [
    'tab' => [
        'index' => 'Indice',
        'create' => 'Crea',
        'edit' => 'Modifica',
    ],
    'label' => 'Translations',
    'plural_label' => 'Translations (Plurale)',
    'navigation' => [
        'name' => 'Translations',
        'plural' => 'Translations',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Translations',
        'sort' => 1,
<<<<<<< HEAD
       'icon' => 'heroicon-o-rectangle-stack',
=======
        'icon' => 'heroicon-o-rectangle-stack',
>>>>>>> laraxot/dev
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
    'actions' => [
        'create' => [
            'label' => 'Crea Translations',
        ],
        'edit' => [
            'label' => 'Modifica Translations',
        ],
        'delete' => [
            'label' => 'Elimina Translations',
        ],
    ],
];
