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
     * @return array<string, object>
     */
    protected function getFormSchema(): array
    {
        return [
            'enabled' => Toggle::make('enabled')->default(true)->required(),
            'default_locale' => Select::make('default_locale')->options(['it' => 'Italiano', 'en' => 'English'])->required(),
            'supported_locales' => TagsInput::make('supported_locales')->nestedRecursiveRules(['string', 'size:2'])->required(),
        ];
    }
}
