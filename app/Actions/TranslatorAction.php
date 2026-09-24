<?php

declare(strict_types=1);
<<<<<<< .merge_file_sBVilp

=======
<<<<<<< .merge_file_F57s2N

=======
>>>>>>> .merge_file_GnTBey
>>>>>>> .merge_file_9BgPIZ
/**
 * @see https://github.com/barryvdh/laravel-translation-manager/blob/master/src/Translator.php
 */

namespace Modules\Lang\Actions;

use Illuminate\Translation\Translator as LaravelTranslator;
use Modules\Lang\Models\Translation;
use Spatie\QueueableAction\QueueableAction;

class TranslatorAction extends LaravelTranslator
{
    use QueueableAction;

    /**
     * Get the translation for the given key.
     *
<<<<<<< .merge_file_sBVilp
     * @param  array<string, mixed>  $replace
=======
<<<<<<< .merge_file_F57s2N
     * @param array<string, mixed> $replace
     *
=======
     * I parametri nativi restano `mixed` per compatibilita' LSP con
     * `Illuminate\Translation\Translator::get()`, che non dichiara tipi.
     *
     * @param  string  $key
     * @param  array<string, mixed>  $replace
     * @param  string|null  $locale
     * @param  bool  $fallback
>>>>>>> .merge_file_GnTBey
>>>>>>> .merge_file_9BgPIZ
     * @return string|array<array-key, mixed>
     */
    public function get(mixed $key, array $replace = [], mixed $locale = null, mixed $fallback = true): string|array
    {
        $result = parent::get($key, $replace, $locale, $fallback);
        if ($result === $key) {
            $this->notifyMissingKey($key);
            $result = parent::get($key, $replace, $locale, $fallback);
        }

        if (is_array($result)) {
            return $result;
        }

        if (! is_string($result)) {
            return (string) $key;
        }

        return $result;
    }

<<<<<<< .merge_file_sBVilp
    public function execute(): void {}
=======
<<<<<<< .merge_file_F57s2N
    public function execute(): void
    {
    }
=======
    public function execute(): void {}
>>>>>>> .merge_file_GnTBey
>>>>>>> .merge_file_9BgPIZ

    protected function notifyMissingKey(string $key): void
    {
        $lang = app()->getLocale();
        [$namespace, $group, $item] = $this->parseKey($key);

        $data = [
            'lang' => $lang,
            'namespace' => $namespace,
            'group' => $group,
            'item' => $item,
        ];

        Translation::firstOrCreate($data);
    }
}
