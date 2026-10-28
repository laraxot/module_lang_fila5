<?php

declare(strict_types=1);

namespace Modules\Lang\Filament\Widgets;

use Filament\Schemas\Components\Component;
use Illuminate\Support\Collection;
<<<<<<< HEAD
use Mcamara\LaravelLocalization\Exceptions\UnsupportedLocaleException;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Mcamara\LaravelLocalization\LaravelLocalization as LaravelLocalizationManager;
=======
>>>>>>> ceaed311 (.)
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;

/**
 * Widget per il cambio di lingua.
 *
 * Fornisce un selettore dropdown per cambiare la lingua dell'interfaccia.
<<<<<<< HEAD
 * Sostituisce i vecchi componenti HTTP `Http\Livewire\Lang\{Switcher,Change}`:
 * stessa fonte lingue (`LaravelLocalization::getSupportedLocales()`) e stessa
 * strategia di URL localizzato (`LaravelLocalization::getLocalizedURL()`), non
 * più un fallback statico né un redirect sull'URL corrente non localizzato.
 *
 * @see https://github.com/mcamara/laravel-localization
=======
 * Utilizza il sistema di localizzazione di Laravel per gestire le traduzioni.
>>>>>>> ceaed311 (.)
 */
class LanguageSwitcherWidget extends XotBaseSchemaWidget
{
    /** @var view-string */
    protected string $view;

    public function __construct()
    {
        /** @var view-string $view */
        $view = 'lang::filament.widgets.language-switcher';
        $this->view = $view;

        parent::__construct();
    }

    /**
<<<<<<< HEAD
     * Non è una dashboard card: si monta esplicitamente nel tema
     * (`@livewire(\Modules\Lang\Filament\Widgets\LanguageSwitcherWidget::class)`),
     * non va auto-scoperto nelle dashboard Filament.
     */
    protected static bool $isDiscovered = false;

    /**
=======
>>>>>>> ceaed311 (.)
     * Determina se il widget può essere visualizzato.
     */
    public static function canView(): bool
    {
        return true;
    }

    /**
     * Schema del form: il widget non espone campi editabili, solo azioni.
     *
     * @return array<int, Component>
     */
    public function getFormSchema(): array
    {
        return [];
    }

    /**
     * Metodo pubblico per esporre i dati della vista ad altri componenti.
     *
     * @return array<string, mixed>
     */
    public function exposeViewData(): array
    {
        return $this->getViewData();
    }

    /**
<<<<<<< HEAD
     * Ottiene le lingue disponibili nel sistema da LaravelLocalization,
     * la stessa fonte usata dai vecchi `Switcher`/`Change`.
=======
     * Ottiene le lingue disponibili nel sistema.
>>>>>>> ceaed311 (.)
     *
     * @return Collection<int, array{code: string, name: string, native_name: string, flag: string|null}>
     */
    public function getAvailableLocales(): Collection
    {
<<<<<<< HEAD
        /** @var array<string, array<string, mixed>> $supportedLocales */
        $supportedLocales = LaravelLocalization::getSupportedLocales();

        return collect($supportedLocales)
            ->map(function (array $properties, string $code): array {
                $name = $properties['name'] ?? $code;

                return [
                    'code' => $code,
                    'name' => is_string($name) ? $name : $code,
                    'native_name' => is_string($properties['native'] ?? null)
                        ? $properties['native']
                        : (is_string($name) ? $name : $code),
                    'flag' => is_string($properties['flag'] ?? null) ? $properties['flag'] : null,
                ];
            })
            ->values();
    }

    /**
     * Cambia la lingua corrente e reindirizza all'URL localizzato
     * equivalente (stesso comportamento del vecchio `Change::mount()`),
     * non a un URL non localizzato con sola preferenza in sessione.
     */
    public function changeLanguage(string $locale): void
    {
        if (! $this->isValidLocale($locale)) {
            return;
        }

        $this->redirect($this->getLanguageUrl($locale));
    }

    /**
     * Genera l'URL localizzato per una specifica lingua tramite
     * `LaravelLocalization::getLocalizedURL()`. Fallback a `/{locale}`
     * se il pacchetto non riesce a produrre una stringa (es. mock nei test)
     * o se il locale richiesto non è tra quelli davvero supportati in
     * configurazione (`UnsupportedLocaleException`).
     */
    public function getLanguageUrl(string $locale): string
    {
        try {
            $url = app(LaravelLocalizationManager::class)->getLocalizedURL($locale, null, [], true);
        } catch (UnsupportedLocaleException) {
            return '/'.$locale;
        }

        return is_string($url) ? $url : '/'.$locale;
    }

    /**
     * Dati da passare alla vista FO (`lang::filament.widgets.language-switcher`):
     * `$lang` (codice lingua corrente, per l'icona nel pulsante) e `$langs`
     * (mappa `codice => ['url' => ..., 'native' => ...]` per i link `<a href>`
     * del dropdown, con URL già localizzati via `getLanguageUrl()`).
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
>>>>>>> ceaed311 (.)
     *
     * @return array<string, mixed>
     */
    protected function getViewData(): array
    {
<<<<<<< HEAD
        $availableLocales = $this->getAvailableLocales();

        $langs = $availableLocales->mapWithKeys(fn (array $locale): array => [
            $locale['code'] => [
                'url' => $this->getLanguageUrl($locale['code']),
                'native' => $locale['native_name'],
            ],
        ]);

        return [
            'available_locales' => $availableLocales,
            'lang' => app()->getLocale(),
            'langs' => $langs,
=======
        return [
            'current_locale' => app()->getLocale(),
            'available_locales' => $this->getAvailableLocales(),
            'widget_id' => 'language-switcher-'.uniqid(),
>>>>>>> ceaed311 (.)
        ];
    }

    /**
<<<<<<< HEAD
     * Verifica se il locale è valido (presente tra quelli supportati).
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
>>>>>>> ceaed311 (.)
     */
    protected function isValidLocale(string $locale): bool
    {
        $availableLocales = $this->getAvailableLocales();

        return $availableLocales->contains('code', $locale);
    }
}
