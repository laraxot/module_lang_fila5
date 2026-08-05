<?php

declare(strict_types=1);

namespace Modules\Lang\Filament\Resources\TranslationFileResource\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Section;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm;

class TranslationFileForm extends XotBaseResourceForm
{
    /**
     * @return array<string, Component>
     */
<<<<<<< HEAD
    public static function getFormSchema(): array
=======
    public static function getFormSchemaOld(): array
>>>>>>> laraxot/dev
    {
        return [
            'name' => Section::make([
                TextInput::make('name'),
            ]),
        ];
    }
}
