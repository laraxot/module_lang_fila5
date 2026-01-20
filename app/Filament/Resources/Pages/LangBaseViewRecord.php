<?php

declare(strict_types=1);

namespace Modules\Lang\Filament\Resources\Pages;

<<<<<<< HEAD
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
use LaraZeus\SpatieTranslatable\Resources\Pages\ViewRecord\Concerns\Translatable;
=======
// use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
// use LaraZeus\SpatieTranslatable\Resources\Pages\ViewRecord\Concerns\Translatable;
>>>>>>> laraxot/develop
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

abstract class LangBaseViewRecord extends XotBaseViewRecord
{
<<<<<<< HEAD
    use Translatable;
=======
    // use Translatable; // Temporarily disabled until lara-zeus package is working
>>>>>>> laraxot/develop

    protected static string $resource; // = SectionResource::class;

    protected function getHeaderActions(): array
    {
<<<<<<< HEAD
        return [
            LocaleSwitcher::make(),
            ...parent::getHeaderActions(),
            // ...
        ];
=======
        return array_merge(
            // ['locale-switcher' => LocaleSwitcher::make()], // Temporarily disabled until lara-zeus package is working
            parent::getHeaderActions(),
        );
>>>>>>> laraxot/develop
    }
}
