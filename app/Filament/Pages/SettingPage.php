<?php

declare(strict_types=1);

namespace Modules\Lang\Filament\Pages;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Modules\Xot\Filament\Pages\BaseSettingPage;

/**
 * Impostazioni di Lang (`config/{tenant}/lang.php`), solo super-admin. Pagina senza campi: la
 * convenzione (Data, file del tenant, accesso) sta in BaseSettingPage e in
 * \Modules\Lang\Datas\LangConfigData.
 */
class SettingPage extends BaseSettingPage
{
    /**
     * @return array<string, Select|TagsInput>
     */
    protected function getFormSchema(): array
    {
        return [
            'default_locale' => Select::make('default_locale')->options(['it' => 'Italiano', 'en' => 'English'])->required(),
            'supported_locales' => TagsInput::make('supported_locales')->nestedRecursiveRules(['string', 'size:2'])->required(),
        ];
    }
}
