<?php

declare(strict_types=1);

namespace Modules\Lang\Filament\Widgets;

use Filament\Schemas\Components\Component;
<<<<<<< HEAD
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

=======
use Illuminate\Support\Collection;
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;

/**
 * Widget per il cambio di lingua.
 *
 * Fornisce un selettore dropdown per cambiare la lingua dell'interfaccia.
 * Utilizza il sistema di localizzazione di Laravel per gestire le traduzioni.
 */
class LanguageSwitcherWidget extends XotBaseSchemaWidget
{
>>>>>>> laraxot/dev
    /** @var view-string */
    protected string $view = 'lang::filament.widgets.language-switcher';

    /**
<<<<<<< HEAD
     * Chrome tema: visibile salvo disattivazione esplicita.
     */
    public static function canView(): bool
    {
        return true === config('lang.language_switcher.enabled', true);
=======
     * Determina se il widget può essere visualizzato.
     */
    public static function canView(): bool
    {
        return true;
>>>>>>> laraxot/dev
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
<<<<<<< HEAD
     * @return array{
     *     current_locale: string,
     *     available_locales: Collection<int, array{code: string, name: string, native_name: string, flag: string|null}>,
     *     widget_id: string,
     *     lang: string,
     *     langs: array<string, array{native: string, name: string, url: string}>
     * }
=======
     * @return array<string, mixed>
>>>>>>> laraxot/dev
     */
    public function exposeViewData(): array
    {
        return $this->getViewData();
    }

    /**
<<<<<<< HEAD
     * Ottiene le lingue disponibili da LaravelLocalization.
=======
     * Ottiene le lingue disponibili nel sistema.
>>>>>>> laraxot/dev
     *
     * @return Collection<int, array{code: string, name: string, native_name: string, flag: string|null}>
     *
     * @phpstan-return Collection<int, array{code: string, name: string, native_name: string, flag: string|null}>
     */
    public function getAvailableLocales(): Collection
    {
<<<<<<< HEAD
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
=======
        // TODO: Implementare modello Language se necessario
        // Per ora usa fallback con lingue configurate

        // Fallback alle lingue configurate staticamente
        return collect($this->getDefaultLanguages());
    }

    /**
     * Cambia la lingua corrente.
     *
     * @param  string  $locale  Codice della lingua
     * @param  string  $locale  Codice della lingua
     * @return void *
     */
    public function changeLanguage(string $locale): void
    {
        if ($this->isValidLocale($locale)) {
            session(['locale' => $locale]);
            app()->setLocale($locale);

            // Redirect per applicare la nuova lingua
            $this->redirect(request()->url());
        }
    }

    /**
     * Genera l'URL per una specifica lingua.
     *
     * @param  string  $locale  Codice della lingua     *
     * @param  string  $locale  Codice della lingua
     * @return string URL con la lingua specificata
     */
    public function getLanguageUrl(string $locale): string
    {
        $currentUrl = request()->url();
        $currentLocale = app()->getLocale();

        // Se l'URL contiene già la lingua corrente, sostituiscila
        if (str_contains($currentUrl, '/'.$currentLocale.'/')) {
            return str_replace('/'.$currentLocale.'/', '/'.$locale.'/', $currentUrl);
        }
        if (str_ends_with($currentUrl, '/'.$currentLocale)) {
            return str_replace('/'.$currentLocale, '/'.$locale, $currentUrl);
        }
        // Aggiunge la lingua all'URL
        $path = request()->getPathInfo();

        return url($locale.($path === '/' ? '' : $path));
    }

    /**
     * Dati da passare alla vista.
     *
     * @return array<string, mixed>
     */
    protected function getViewData(): array
    {
        return [
            'current_locale' => app()->getLocale(),
            'available_locales' => $this->getAvailableLocales(),
            'widget_id' => 'language-switcher-'.uniqid(),
>>>>>>> laraxot/dev
        ];
    }

    /**
<<<<<<< HEAD
     * Verifica se il locale è tra quelli supportati.
     */
    protected function isValidLocale(string $locale): bool
    {
        return $this->getAvailableLocales()->contains('code', $locale);
=======
     * Lingue di default se il modello Language non è disponibile.
     *
     * @return array<int, array{code: string, name: string, native_name: string, flag: string|null}>
     */
    protected function getDefaultLanguages(): array
    {
        return [
            [
                'code' => 'it',
                'name' => 'Italian',
                'native_name' => 'Italiano',
                'flag' => '🇮🇹',
            ],
            [
                'code' => 'en',
                'name' => 'English',
                'native_name' => 'English',
                'flag' => '🇬🇧',
            ],
            [
                'code' => 'de',
                'name' => 'German',
                'native_name' => 'Deutsch',
                'flag' => '🇩🇪',
            ],
        ];
    }

    /**
     * Verifica se il locale è valido.
     */
    protected function isValidLocale(string $locale): bool
    {
        $availableLocales = $this->getAvailableLocales();

        return $availableLocales->contains('code', $locale);
>>>>>>> laraxot/dev
    }
}
