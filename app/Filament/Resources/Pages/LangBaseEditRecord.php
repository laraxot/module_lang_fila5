<?php

declare(strict_types=1);

namespace Modules\Lang\Filament\Resources\Pages;

// use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
// use LaraZeus\SpatieTranslatable\Resources\Pages\EditRecord\Concerns\Translatable;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;

abstract class LangBaseEditRecord extends XotBaseEditRecord
{
    // use Translatable; // Temporarily disabled until lara-zeus package is working

    protected static string $resource; // = SectionResource::class;

    protected function getHeaderActions(): array
    {
        return array_merge(
            // ['locale-switcher' => LocaleSwitcher::make()], // Temporarily disabled until lara-zeus package is working
            parent::getHeaderActions(),
        );
    }
}
