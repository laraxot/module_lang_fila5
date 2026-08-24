<?php

declare(strict_types=1);

namespace Modules\Lang\View\Composers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Lang\Datas\LangData;
use Spatie\LaravelData\DataCollection;

/**
 * Classe per la composizione di dati relativi alle lingue nei template.
 */
class ThemeComposer
{
    /**
     * Get all supported languages as a DataCollection.
     *
     * @throws \Exception if supportedLocales config is not an array
     *
     * @return DataCollection<int, LangData>
     */
    public function languages(): DataCollection
    {
        // ✅ Controllo sicuro della configurazione laravellocalization
        $langs = config()->has('laravellocalization.supportedLocales')
            ? config('laravellocalization.supportedLocales')
            : [
                'it' => ['name' => 'Italiano', 'regional' => 'it_IT'],
                'en' => ['name' => 'English', 'regional' => 'en_US'],
            ];

        if (! is_array($langs)) {
            throw new \Exception(sprintf('Invalid config for supportedLocales on line %d in %s', __LINE__, class_basename($this)));
        }

        $languagesArray = [];
        foreach ($langs as $locale => $item) {
            if (! is_string($locale)) {
                continue;
            }

            if (! is_array($item)) {
                throw new \InvalidArgumentException(sprintf('Expected array at locale %s, got %s', $locale, gettype($item)));
            }

            if (! isset($item['regional'], $item['name'])) {
                throw new \InvalidArgumentException(sprintf('Expected array with "regional" and "name" keys at locale %s', $locale));
            }

            $regional = $item['regional'];
            if (! is_string($regional)) {
                $regional = '';
            }
            $regionalParts = explode('_', $regional);
            $regionalCode = $regionalParts[0] ?? 'en';

            if ('en' === $regionalCode) {
                $regionalCode = 'gb';
            }

            $url = '#';
            if (inAdmin()) {
                $url = $this->buildAdminLanguageUrl($locale);
            }

            $name = $item['name'];
            if (! is_string($name)) {
                $name = $locale;
            }

            $languagesArray[] = [
                'id' => $locale,
                'name' => $name,
                'flag' => $this->buildFlagHtml($regionalCode),
                'url' => $url,
            ];
        }

        return LangData::collection($languagesArray);
    }

    /**
     * Get all languages except the current one.
     *
     * @return DataCollection<int, LangData>
     */
    public function otherLanguages(): DataCollection
    {
        $currentLocale = app()->getLocale();

        return LangData::collection(
            $this->languages()->toCollection()
                ->filter(fn (LangData $item): bool => $item->id !== $currentLocale)
                ->values()
                ->all(),
        );
    }

    /**
     * Get a specific field of the current language.
     *
     * @throws \Exception if the current language is not found
     */
    public function currentLang(string $field): string
    {
        $currentLocale = app()->getLocale();

        // Convert DataCollection to a Laravel Collection to use firstWhere()
        $lang = $this->languages()->toCollection()->firstWhere('id', $currentLocale);

        if (! $lang instanceof LangData) {
            throw new \Exception(sprintf('Current language not found on line %d in %s', __LINE__, class_basename($this)));
        }

        // Verifichiamo che il valore del campo sia una stringa o lo convertiamo in modo sicuro
        $value = $this->langFieldValue($lang, $field);
        if (! is_string($value)) {
            return 'id' === $field ? $currentLocale : '';
        }

        return $value;
    }

    protected function langFieldValue(LangData $lang, string $field): mixed
    {
        return $lang->{$field};
    }

    /**
     * Build the URL for the admin panel based on the current route and parameters.
     *
     * @param string $locale The locale code to build URL for
     *
     * @return string The generated URL
     */
    public function buildAdminLanguageUrl(string $locale): string
    {
        $routeName = Route::currentRouteName();
        if (! is_string($routeName)) {
            return '#';
        }
        $routeParameters = array_merge(Route::current()?->parameters() ?? [], ['lang' => $locale]);
        $queryParameters = request()->all();

        $url = route($routeName, $routeParameters);

        return Request::create($url)->fullUrlWithQuery($queryParameters);
    }

    /**
     * Build the HTML for the language flag.
     *
     * @param string $regionalCode The regional code for the flag
     *
     * @return string The HTML for the flag
     */
    private function buildFlagHtml(string $regionalCode): string
    {
        return sprintf('<div class="iti__flag-box"><div class="iti__flag iti__%s"></div></div>', e($regionalCode));
    }
}
