<?php

declare(strict_types=1);

namespace Modules\Lang\Providers\Filament;

use Filament\Panel;
<<<<<<< HEAD
use LaraZeus\SpatieTranslatable\SpatieTranslatablePlugin;
=======
// use LaraZeus\SpatieTranslatable\SpatieTranslatablePlugin;
>>>>>>> e246ed3 (Check & fix styling)
use Modules\Xot\Providers\Filament\XotBasePanelProvider;

class AdminPanelProvider extends XotBasePanelProvider
{
    protected string $module = 'Lang';

    #[\Override]
    public function panel(Panel $panel): Panel
    {
        $panel = parent::panel($panel);
        // FilamentAsset::register(
        //     [
        //         Css::make('filament-navigation-styles', __DIR__.'/../../resources/dist/plugin.css'),
        //         Js::make('filament-navigation-scripts', __DIR__.'/../../resources/dist/plugin.js'),
        //     ],
        //     'filament-navigation'
        // );

<<<<<<< HEAD
        $spatieLaravelTranslatablePlugin = SpatieTranslatablePlugin::make()->defaultLocales(['en', 'it']);
        $panel->plugins([
            $spatieLaravelTranslatablePlugin,
        ]);
=======
        // $spatieLaravelTranslatablePlugin = SpatieTranslatablePlugin::make()->defaultLocales(['en', 'it']);
        // $panel->plugins([
        //     $spatieLaravelTranslatablePlugin,
        // ]);
>>>>>>> e246ed3 (Check & fix styling)

        return $panel;
    }
}
