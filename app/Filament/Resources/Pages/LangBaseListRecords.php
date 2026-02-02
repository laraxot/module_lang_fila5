<?php

declare(strict_types=1);

namespace Modules\Lang\Filament\Resources\Pages;

use Filament\Actions\Action;
<<<<<<< HEAD
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
use LaraZeus\SpatieTranslatable\Resources\Pages\ListRecords\Concerns\Translatable;
=======
// use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
// use LaraZeus\SpatieTranslatable\Resources\Pages\ListRecords\Concerns\Translatable;
>>>>>>> e246ed3 (Check & fix styling)
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

abstract class LangBaseListRecords extends XotBaseListRecords
{
<<<<<<< HEAD
    use Translatable;
=======
    // use Translatable; // Temporarily disabled until lara-zeus package is working
>>>>>>> e246ed3 (Check & fix styling)

    protected static string $resource; // = SectionResource::class;

    /**
     * @return array<string, Action>
     */
    #[\Override]
    protected function getHeaderActions(): array
    {
        $parentActions = parent::getHeaderActions();

        // Assicurarsi che tutte le azioni abbiano chiavi stringa
        $actions = [
<<<<<<< HEAD
            'locale_switcher' => LocaleSwitcher::make(),
=======
            // 'locale_switcher' => LocaleSwitcher::make(), // Temporarily disabled until lara-zeus package is working
>>>>>>> e246ed3 (Check & fix styling)
        ];

        // Aggiungere le azioni parent con chiavi stringa
        foreach ($parentActions as $key => $action) {
            $actions['parent_'.(is_string($key) ? $key : ((string) $key))] = $action;
        }

        return $actions;
    }
}
