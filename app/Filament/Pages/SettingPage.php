<?php

declare(strict_types=1);

namespace Modules\Lang\Filament\Pages;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Modules\Xot\Filament\Pages\BaseSettingPage;

use Filament\Forms\Components\Toggle;
use Modules\Lang\Datas\LangConfigData;

/**
 * Impostazioni di Lang (`config/{tenant}/lang.php`), solo super-admin.
 *
 * Form configurato con i campi esposti da LangConfigData.
 *
 * @see LangConfigData
 */
class SettingPage extends BaseSettingPage
{
    /**
<<<<<<< HEAD
     * @return array<string, Toggle>
=======
     * @return array<string, Select|TagsInput>
>>>>>>> c70e004bbd61cf83bc18c3fc3895f6eca63a8c18
     */
    protected function getFormSchema(): array
    {
        return [
<<<<<<< HEAD
            'enabled' => Toggle::make('enabled')->default(true)->required(),
=======
            'default_locale' => Select::make('default_locale')->options(['it' => 'Italiano', 'en' => 'English'])->required(),
            'supported_locales' => TagsInput::make('supported_locales')->nestedRecursiveRules(['string', 'size:2'])->required(),
>>>>>>> c70e004bbd61cf83bc18c3fc3895f6eca63a8c18
        ];
    }
}
