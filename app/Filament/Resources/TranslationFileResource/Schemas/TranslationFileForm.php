<?php

declare(strict_types=1);

namespace Modules\Lang\Filament\Resources\TranslationFileResource\Schemas;

use Filament\Forms\Components\TextInput;
<<<<<<< HEAD
use Filament\Schemas\Components\Component;
=======
>>>>>>> provtv/dev
use Filament\Schemas\Components\Section;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm;

class TranslationFileForm extends XotBaseResourceForm
{
    /**
<<<<<<< HEAD
     * @return array<string, Component>
=======
     * @return array<string, \Filament\Schemas\Components\Component>
>>>>>>> provtv/dev
     */
    public static function getFormSchema(): array
    {
        return [
            'name' => Section::make([
                TextInput::make('name'),
            ]),
        ];
    }
}
