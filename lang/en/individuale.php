<?php

declare(strict_types=1);

// Lang translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Lang/docs/wiki — domain i18n only.
// File: lang/en/individuale.php
return [
    'actions' => [
        'copy_from_individuale' => [
            'label' => 'Sync from Individual',
            'tooltip' => 'Copy and update organizational records from individual data',
            'confirm' => 'This operation will synchronize organizational records by copying data from individual records for the selected year. Do you want to proceed?',
        ],
    ],
];
