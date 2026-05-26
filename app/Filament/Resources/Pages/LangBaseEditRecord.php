<?php

declare(strict_types=1);

namespace Modules\Lang\Filament\Resources\Pages;

<<<<<<< HEAD
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
use LaraZeus\SpatieTranslatable\Resources\Pages\EditRecord\Concerns\Translatable;
=======
// use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
// use LaraZeus\SpatieTranslatable\Resources\Pages\EditRecord\Concerns\Translatable;
>>>>>>> e246ed3 (Check & fix styling)
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;

abstract class LangBaseEditRecord extends XotBaseEditRecord
{
<<<<<<< HEAD
    use Translatable;
=======
    // use Translatable; // Temporarily disabled until lara-zeus package is working
>>>>>>> e246ed3 (Check & fix styling)

    public static string $resource; // = SectionResource::class;

    protected function getHeaderActions(): array
    {
        return array_merge(
<<<<<<< HEAD
            ['locale-switcher' => LocaleSwitcher::make()],
=======
            // ['locale-switcher' => LocaleSwitcher::make()], // Temporarily disabled until lara-zeus package is working
>>>>>>> e246ed3 (Check & fix styling)
            parent::getHeaderActions(),
        );
    }
}
