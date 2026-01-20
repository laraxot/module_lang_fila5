<?php

declare(strict_types=1);

namespace Modules\Lang\Filament\Resources\Pages;

// use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
// use LaraZeus\SpatieTranslatable\Resources\Pages\CreateRecord\Concerns\Translatable;
use Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord;

/**
 * Class LangBaseCreateRecord.
 *
 * Classe base per la creazione di record con supporto multilingua.
 * Estende XotBaseCreateRecord e aggiunge funzionalità per la gestione delle traduzioni.
 */
abstract class LangBaseCreateRecord extends XotBaseCreateRecord
{
    // use Translatable; // Temporarily disabled until lara-zeus package is working

    protected function getHeaderActions(): array
    {
        return [
            // LocaleSwitcher::make(), // Temporarily disabled until lara-zeus package is working
            ...parent::getHeaderActions(),
        ];
    }
}
