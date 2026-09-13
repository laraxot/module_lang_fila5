<?php

declare(strict_types=1);

namespace Modules\Lang\Filament\Resources\TranslationFileResource\Pages;

use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
use Modules\Lang\Filament\Actions\LocaleSwitcherRefresh;
use Modules\Lang\Filament\Resources\TranslationFileResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListTranslationFiles extends XotBaseListRecords
{
    protected static string $resource = TranslationFileResource::class;
<<<<<<< .merge_file_SPGyVG
   
=======

<<<<<<< HEAD
    
=======
    #[\Override]
    public function getTableColumns(): array
    {
        return [
            'key' => TextColumn::make('key')->searchable(['key', 'content']),
        ];
    }
>>>>>>> laraxot/dev
>>>>>>> .merge_file_ejkgph

    /**
     * @return array<string, Action|ActionGroup>
     */
<<<<<<< .merge_file_SPGyVG
    #[\Override]
=======
<<<<<<< HEAD
=======
    #[\Override]
>>>>>>> laraxot/dev
>>>>>>> .merge_file_ejkgph
    protected function getHeaderActions(): array
    {
        $parentActions = parent::getHeaderActions();

        // Assicurarsi che tutte le azioni abbiano chiavi stringa
        /** @var array<string, Action|ActionGroup> $actions */
        $actions = [
            'locale_switcher' => LocaleSwitcherRefresh::make('lang'),
        ];

        // Aggiungere le azioni parent con chiavi stringa
        foreach ($parentActions as $key => $action) {
            $actions['parent_'.(is_string($key) ? $key : ((string) $key))] = $action;
        }

        return $actions;
    }
}
