<?php

/**
 * @see https://github.com/laravel/framework/discussions/49574
 */

declare(strict_types=1);

namespace Modules\Lang\Http\Livewire\Lang;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Livewire\Component;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// Route::get('{path}', RedirectToPreferredLanguage::class)
// ->where('path', '^(?!(en|de)).*');

class Switcher extends Component
{
    public string $lang;

    /** @var array<string, array<string, mixed>> */
    public array $langs;

    public string $url;

    public function mount(): void
    {
        $this->lang = app()->getLocale();
        $langs = LaravelLocalization::getSupportedLocales();
        unset($langs[$this->lang]);
        $this->url = Request::getRequestUri();
        $this->langs = [];
        foreach ($langs as $key => $item) {
            if (! is_string($key) || ! is_array($item)) {
                continue;
            }
            $locale = [];
            foreach ($item as $property => $value) {
                if (is_string($property)) {
                    $locale[$property] = $value;
                }
            }
            $url = LaravelLocalization::getLocalizedURL($key, $this->url, [], true);
            if (false !== $url) {
                // Verifichiamo che $url sia una stringa o lo convertiamo in modo sicuro
                if (! is_string($url)) {
                    // Se non è una stringa, utilizziamo una URL di fallback
                    $url = '/'.$key;
                } else {
                    $url = Str::of($url)->replace(url(''), '')->toString();
                }
            }
            $locale['url'] = $url;
            $this->langs[$key] = $locale;
        }
    }

    // public function switchLang(string $lang): Application|RedirectResponse|Redirector
    // {
    //    $url = LaravelLocalization::getLocalizedURL($lang, $this->url);

    //   return redirect($url, 303);
    // }

    public function render(): View
    {
        $view = 'lang::livewire.lang.change';
        $viewParams = [
            'view' => $view,
        ];
        // if ([] === $this->teams) {
        //    $view = 'ui::livewire.empty';
        // }

        return view($view, $viewParams);
    }
}
