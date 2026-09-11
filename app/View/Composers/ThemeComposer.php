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
     *
     * @return DataCollection<int, LangData>
     *
     * @throws \Exception if supportedLocales config is not an array
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

<<<<<<< HEAD
        $languagesArray = [];
        foreach ($langs as $locale => $item) {
            if (! is_string($locale)) {
                continue;
            }

=======
        $languages = collect($langs)->map(function (mixed $item, string $locale): array {
            // Ensure $item is an array
>>>>>>> laraxot/dev
            if (! is_array($item)) {
                throw new \InvalidArgumentException(sprintf('Expected array at locale %s, got %s', $locale, gettype($item)));
            }

<<<<<<< HEAD
=======
            // Ensure $item has the required keys
>>>>>>> laraxot/dev
            if (! isset($item['regional'], $item['name'])) {
                throw new \InvalidArgumentException(sprintf('Expected array with "regional" and "name" keys at locale %s', $locale));
            }

<<<<<<< HEAD
=======
            // Extract regional code and handle 'en' to 'gb' mapping.
            // Verifichiamo che regional sia una stringa o lo convertiamo in modo sicuro
>>>>>>> laraxot/dev
            $regional = $item['regional'];
            if (! is_string($regional)) {
                $regional = '';
            }
            $regionalParts = explode('_', $regional);
            $regionalCode = $regionalParts[0] ?? 'en';

            if ($regionalCode === 'en') {
                $regionalCode = 'gb';
            }

<<<<<<< HEAD
            $url = '#';
=======
            $url = '#'; // Placeholder URL for frontend.
>>>>>>> laraxot/dev
            if (inAdmin()) {
                $url = $this->buildAdminLanguageUrl($locale);
            }

<<<<<<< HEAD
            $name = $item['name'];
            if (! is_string($name)) {
                $name = $locale;
            }

            $languagesArray[] = [
=======
            // Verifichiamo che name sia una stringa o lo convertiamo in modo sicuro
            $name = $item['name'];
            if (! is_string($name)) {
                $name = $locale; // Fallback al codice locale
            }

            return [
>>>>>>> laraxot/dev
                'id' => $locale,
                'name' => $name,
                'flag' => $this->buildFlagHtml($regionalCode),
                'url' => $url,
            ];
<<<<<<< HEAD
        }
=======
        });

        // Convertiamo esplicitamente a array<int, mixed> per soddisfare il tipo richiesto
        $languagesArray = $languages->values()->all();
>>>>>>> laraxot/dev

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

<<<<<<< HEAD
        return LangData::collection(
            $this->languages()->toCollection()
                ->filter(fn (LangData $item): bool => $item->id !== $currentLocale)
                ->values()
                ->all(),
        );
=======
        // `DataCollection::filter()` e' deprecata in spatie/laravel-data v5 («use a
        // regular Laravel collection instead»). Il filtro passa quindi da
        // `toCollection()`, e il risultato viene ricomposto in DataCollection perche'
        // e' quello che il tipo di ritorno e i chiamanti dichiarano.
        $others = $this->languages()
            ->toCollection()
            ->filter(static fn (LangData $item): bool => $item->id !== $currentLocale)
            ->values()
            ->all();

        /** @var DataCollection<int, LangData> $collection */
        $collection = LangData::collect($others, DataCollection::class);

        return $collection;
>>>>>>> laraxot/dev
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
<<<<<<< HEAD
        $value = $this->langFieldValue($lang, $field);
=======
        $value = $lang->{$field};
>>>>>>> laraxot/dev
        if (! is_string($value)) {
            return $field === 'id' ? $currentLocale : '';
        }

        return $value;
    }

<<<<<<< HEAD
    protected function langFieldValue(LangData $lang, string $field): mixed
    {
        return $lang->{$field};
    }

=======
>>>>>>> laraxot/dev
    /**
     * Build the URL for the admin panel based on the current route and parameters.
     *
     * @param  string  $locale  The locale code to build URL for
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
     * @param  string  $regionalCode  The regional code for the flag
     * @return string The HTML for the flag
     */
    private function buildFlagHtml(string $regionalCode): string
    {
        return sprintf('<div class="iti__flag-box"><div class="iti__flag iti__%s"></div></div>', e($regionalCode));
    }
}
