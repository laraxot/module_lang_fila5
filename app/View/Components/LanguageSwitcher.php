<?php

declare(strict_types=1);

namespace Modules\Lang\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Modules\Lang\Filament\Widgets\LanguageSwitcherWidget;

/**
 * Componente Blade per il Language Switcher.
 *
 * Wrappa il LanguageSwitcherWidget per l'uso nei temi tramite sintassi Blade.
 */
class LanguageSwitcher extends Component
{
    /**
     * Widget associato al componente.
     */
    protected LanguageSwitcherWidget $widget;

    /**
     * Crea una nuova istanza del componente.
     */
    public function __construct()
    {
<<<<<<< HEAD
        $this->widget = new LanguageSwitcherWidget();
||||||| 6161e129d
        $this->widget = new LanguageSwitcherWidget;
=======
        $widget = new LanguageSwitcherWidget();
>>>>>>> feature/ralph-loop-implementation
    }

    /**
     * Renderizza il componente.
     */
    public function render(): View
    {
        if (! LanguageSwitcherWidget::canView()) {
            /** @var view-string $view */
            $view = 'lang::components.empty';

            return view($view);
        }

        // Ottiene i dati pubblici dal widget
        $viewData = [
            'current_locale' => app()->getLocale(),
            'available_locales' => $widget->getAvailableLocales(
            'widget_id' => 'language-switcher-'.uniqid(),
        ];

        return \view('lang::components.language-switcher', $viewData);
    }
}
