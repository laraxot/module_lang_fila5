<?php

declare(strict_types=1);

// Lang translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Lang/docs/wiki — domain i18n only.
// File: lang/it/locale_switcher_refresh.php
return [
    'fields' => [
        'locale' => [
            'label' => 'locale',
            'placeholder' => 'locale',
            'helper_text' => 'locale',
            'description' => 'locale',
            'tooltip' => '',
        ],
    ],
    'label' => 'Locale Switcher Refresh',
    'plural_label' => 'Locale Switcher Refresh (Plurale)',
    'navigation' => [
        'name' => 'Locale Switcher Refresh',
        'plural' => 'Locale Switcher Refresh',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'label' => 'Locale Switcher Refresh',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
    ],
    'actions' => [
        'create' => [
            'label' => 'Crea Locale Switcher Refresh',
        ],
        'edit' => [
            'label' => 'Modifica Locale Switcher Refresh',
        ],
        'delete' => [
            'label' => 'Elimina Locale Switcher Refresh',
        ],
    ],
];
