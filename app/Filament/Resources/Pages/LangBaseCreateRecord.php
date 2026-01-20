<?php

declare(strict_types=1);

namespace Modules\Lang\Filament\Resources\Pages;

<<<<<<< HEAD
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
use LaraZeus\SpatieTranslatable\Resources\Pages\CreateRecord\Concerns\Translatable;
=======
// use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
// use LaraZeus\SpatieTranslatable\Resources\Pages\CreateRecord\Concerns\Translatable;
>>>>>>> laraxot/develop
use Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord;

/**
 * Class LangBaseCreateRecord.
 *
 * Classe base per la creazione di record con supporto multilingua.
 * Estende XotBaseCreateRecord e aggiunge funzionalità per la gestione delle traduzioni.
 */
abstract class LangBaseCreateRecord extends XotBaseCreateRecord
{
<<<<<<< HEAD
    use Translatable;
=======
    // use Translatable; // Temporarily disabled until lara-zeus package is working
>>>>>>> laraxot/develop

    protected function getHeaderActions(): array
    {
        return [
<<<<<<< HEAD
            LocaleSwitcher::make(),
=======
            // LocaleSwitcher::make(), // Temporarily disabled until lara-zeus package is working
>>>>>>> laraxot/develop
            ...parent::getHeaderActions(),
        ];
    }
}
