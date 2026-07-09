<?php

declare(strict_types=1);

// Lang translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Lang/docs/wiki — domain i18n only.
// File: lang/de/individuale.php
return [
    'actions' => [
        'copy_from_individuale' => [
            'label' => 'Von Individuell synchronisieren',
            'tooltip' => 'Organisatorische Datensätze aus individuellen Daten kopieren und aktualisieren',
            'confirm' => 'Diese Operation synchronisiert organisatorische Datensätze durch Kopieren von Daten aus individuellen Datensätzen für das ausgewählte Jahr. Möchten Sie fortfahren?',
        ],
    ],
];
