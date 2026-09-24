<?php

declare(strict_types=1);
namespace Modules\Lang\Filament\Widgets;

use Filament\Schemas\Components\Component;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Request;
use Livewire\Features\SupportRedirects\Redirector;
use Mcamara\LaravelLocalization\Exceptions\UnsupportedLocaleException;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;
use Webmozart\Assert\Assert;

/**
 * Chrome tema: cambio lingua via prefisso URL (LaravelLocalization).
 *
 * Non è una card dashboard: `$isDiscovered = false`.
 */
class LanguageSwitcherWidget extends XotBaseSchemaWidget
{
    protected static bool $isDiscovered = false;

    /** @var view-string */
    protected string $view = 'lang::filament.widgets.language-switcher';

    /**
     * Chrome tema: visibile salvo disattivazione esplicita.
     */
    public static function canView(): bool
    {
        return true === config('lang.language_switcher.enabled', true);
    }

    /**
     * Schema del form per la configurazione del widget.
     *
     * @return array<int, Component>
     */
    public function getFormSchemaOld(): array
    {
        return [];
    }

    /**
     * Metodo pubblico per esporre i dati della vista ad altri componenti.
     *
     * @return array{
     *     current_locale: string,
     *     available_locales: Collection<int, array{code: string, name: string, native_name: string, flag: string|null}>,
     *     widget_id: string,
     *     lang: string,
     *     langs: array<string, array{native: string, name: string, url: string}>
     * }
     */
    public function exposeViewData(): array
    {
        return $this->getViewData();
    }

    /**
     * Ottiene le lingue disponibili da LaravelLocalization.
     *
     * @return Collection<int, array{code: string, name: string, native_name: string, flag: string|null}>
     *
     * @phpstan-return Collection<int, array{code: string, name: string, native_name: string, flag: string|null}>
     */
    public function getAvailableLocales(): Collection
    {
        $items = [];
        $supported = LaravelLocalization::getSupportedLocales();
        Assert::isArray($supported);

        foreach ($supported as $code => $locale) {
            Assert::string($code);
            Assert::isArray($locale);
            $nameRaw = $locale['name'] ?? $code;
            $nativeRaw = $locale['native'] ?? $nameRaw;
            $name = is_string($nameRaw) ? $nameRaw : $code;
            $nativeName = is_string($nativeRaw) ? $nativeRaw : $name;
            $flag = null;
            if (isset($locale['flag']) && is_string($locale['flag'])) {
                $flag = $locale['flag'];
            }
            $items[] = [
                'code' => $code,
                'name' => $name,
                'native_name' => $nativeName,
                'flag' => $flag,
            ];
        }

        return collect($items);
    }

    /**
     * Redirect 303 all'URL localizzato (prefisso, non sessione).
     */
    public function changeLanguage(string $locale): RedirectResponse|Redirector|null
    {
        if (! $this->isValidLocale($locale)) {
            return null;
        }

        return redirect($this->getLanguageUrl($locale), 303);
    }

    /**
     * URL con prefisso lingua, stesso meccanismo di Change::mount().
     */
    public function getLanguageUrl(string $locale): string
    {
        $currentUrl = Request::getRequestUri();

        try {
            $url = LaravelLocalization::getLocalizedURL($locale, $currentUrl, [], true);
        } catch (UnsupportedLocaleException) {
            return '/'.$locale;
        }

        if (! is_string($url)) {
            return '/'.$locale;
        }

        return $url;
    }

    /**
     * Dati da passare alla vista FO (Alpine + link URL).
     *
     * @return array{
     *     current_locale: string,
     *     available_locales: Collection<int, array{code: string, name: string, native_name: string, flag: string|null}>,
     *     widget_id: string,
     *     lang: string,
     *     langs: array<string, array{native: string, name: string, url: string}>
     * }
     */
    protected function getViewData(): array
    {
        $lang = app()->getLocale();
        $availableLocales = $this->getAvailableLocales();
        $langs = [];

        foreach ($availableLocales as $locale) {
            if ($locale['code'] === $lang) {
                continue;
            }

            $langs[$locale['code']] = [
                'native' => $locale['native_name'],
                'name' => $locale['name'],
                'url' => $this->getLanguageUrl($locale['code']),
            ];
        }

        return [
            'current_locale' => $lang,
            'available_locales' => $availableLocales,
            'widget_id' => 'language-switcher-'.uniqid(),
            'lang' => $lang,
            'langs' => $langs,
        ];
    }

    /**
     * Verifica se il locale è tra quelli supportati.
     */
    protected function isValidLocale(string $locale): bool
    {
        return $this->getAvailableLocales()->contains('code', $locale);
    }
}
