<?php

declare(strict_types=1);

namespace Modules\Lang\Filament\Resources\TranslationFileResource\Schemas;

<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component as SchemaComponent;
=======
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
>>>>>>> 40b96bcd6 (.)
=======
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
>>>>>>> origin/dev
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm;

class TranslationFileForm extends XotBaseResourceForm
{
    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * @return array<int|string, SchemaComponent>
=======
     * @return array<string, \Filament\Schemas\Components\Component>
>>>>>>> 40b96bcd6 (.)
=======
     * @return array<string, \Filament\Schemas\Components\Component>
>>>>>>> origin/dev
     */
    public static function getFormSchema(): array
    {
        return [
<<<<<<< HEAD
<<<<<<< HEAD
            'id' => TextInput::make('id'),
            'name' => TextInput::make('name'),
            'path' => TextInput::make('path'),
            'content' => KeyValue::make('content'),
=======
            'name' => Section::make([
                TextInput::make('name'),
            ]),
>>>>>>> 40b96bcd6 (.)
=======
            'name' => Section::make([
                TextInput::make('name'),
            ]),
>>>>>>> origin/dev
        ];
    }
}
