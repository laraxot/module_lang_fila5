<?php

declare(strict_types=1);

namespace Modules\Lang\Models\Traits;

use Spatie\Translatable\HasTranslations;

/**
 * Trait che estende HasTranslations con tipi di ritorno più stretti.
 *
 * @phpstan-ignore trait.unused
 */
trait HasStrictTranslations
{
    use HasTranslations {
        getTranslation as protected spatieGetTranslation;
    }

    /**
<<<<<<< .merge_file_vRWByr
     * @param  string  $key  Il nome dell'attributo da tradurre
     * @param  string  $locale  Il codice della lingua richiesta
     * @param  bool  $useFallbackLocale  Se utilizzare o meno la lingua di fallback
=======
     * @param string $key               Il nome dell'attributo da tradurre
     * @param string $locale            Il codice della lingua richiesta
     * @param bool   $useFallbackLocale Se utilizzare o meno la lingua di fallback
     *
>>>>>>> .merge_file_SpYRKJ
     * @return string|array<string, mixed>|int|null Il valore tradotto dell'attributo
     */
    public function getTranslation(string $key, string $locale, bool $useFallbackLocale = true): string|array|int|null
    {
        $value = $this->spatieGetTranslation($key, $locale, $useFallbackLocale);

<<<<<<< .merge_file_vRWByr
        if (is_string($value) || is_int($value) || $value === null) {
=======
        if (is_string($value) || is_int($value) || null === $value) {
>>>>>>> .merge_file_SpYRKJ
            return $value;
        }

        if (is_array($value)) {
            return self::normalizeTranslationArray($value);
        }

        if (is_bool($value)) {
            return (int) $value;
        }

        if (is_float($value)) {
            return (int) $value;
        }

        if (is_object($value) && method_exists($value, '__toString')) {
            return (string) $value;
        }

        return null;
    }

    /**
<<<<<<< .merge_file_vRWByr
     * @param  array<mixed, mixed>  $value
=======
     * @param array<mixed, mixed> $value
     *
>>>>>>> .merge_file_SpYRKJ
     * @return array<string, mixed>
     */
    private static function normalizeTranslationArray(array $value): array
    {
        $normalized = [];

        foreach ($value as $k => $v) {
            if (! is_string($k)) {
                continue;
            }

            $normalized[$k] = $v;
        }

        return $normalized;
    }
}
