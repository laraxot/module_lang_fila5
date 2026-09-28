<?php

declare(strict_types=1);

namespace Modules\Lang\Filament;

use Filament\Panel;
use Modules\Xot\Filament\XotBasePanelProvider;
use Filament\Support\Colors\Color;

class AdminPanelProvider extends XotBasePanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('Lang_admin')
            ->path('Lang/admin')
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: __DIR__.'/Resources', for: 'Modules\\Lang\\Filament\\Resources')
            ->discoverPages(in: __DIR__.'/Pages', for: 'Modules\\Lang\\Filament\\Pages')
            ->discoverWidgets(in: __DIR__.'/Widgets', for: 'Modules\\Lang\\Filament\\Widgets')
            ->discoverClusters(in: __DIR__.'/Clusters', for: 'Modules\\Lang\\Filament\\Clusters');
    }
}
