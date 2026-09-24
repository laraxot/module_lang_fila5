<?php

declare(strict_types=1);

// Lang translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Lang/docs/wiki — domain i18n only.
// File: lang/it/individuale.php
return [
    'actions' => [
        'copy_from_individuale' => [
            'label' => 'Sincronizza da Individuali',
            'tooltip' => 'Copia e aggiorna schede organizzative dai dati individuali',
            'confirm' => 'Questa operazione sincronizzerà le schede organizzative copiando i dati dalle schede individuali per l\'anno selezionato. Vuoi procedere?',
        ],
    ],
];
