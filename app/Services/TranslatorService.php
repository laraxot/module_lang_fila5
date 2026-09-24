<?php

declare(strict_types=1);
<<<<<<< HEAD

=======
<<<<<<< .merge_file_aBzjaq

=======
<<<<<<< .merge_file_jGd2vW

=======
>>>>>>> .merge_file_ZFlouR
>>>>>>> .merge_file_UeBosc
>>>>>>> laraxot/dev
/**
 * @see https://github.com/barryvdh/laravel-translation-manager/blob/master/src/Translator.php
 */

namespace Modules\Lang\Services;

use Illuminate\Events\Dispatcher;
use Illuminate\Translation\Translator as LaravelTranslator;
use Modules\Lang\Models\Translation;
use Spatie\QueueableAction\QueueableAction;

class TranslatorService extends LaravelTranslator
{
    use QueueableAction;

    /** @var Dispatcher */
    protected $events;

    /**
     * Get the translation for the given key.
     *
<<<<<<< HEAD
     * @param  array<string, mixed>  $replace
=======
<<<<<<< .merge_file_aBzjaq
     * @param  array<string, mixed>  $replace
=======
<<<<<<< .merge_file_jGd2vW
     * @param  array<string, mixed>  $replace
=======
     * I parametri nativi restano `mixed` per compatibilita' LSP con
     * `Illuminate\Translation\Translator::get()`, che non dichiara tipi.
     *
     * @param  string  $key
     * @param  array<string, mixed>  $replace
     * @param  string|null  $locale
     * @param  bool  $fallback
>>>>>>> .merge_file_ZFlouR
>>>>>>> .merge_file_UeBosc
>>>>>>> laraxot/dev
     * @return string|array<string, mixed>
     */
    public function get(mixed $key, array $replace = [], mixed $locale = null, mixed $fallback = true): string|array
    {
        // Get without fallback
        $result = parent::get($key, $replace, $locale, $fallback);
        if ($result === $key) {
            $this->notifyMissingKey($key);

            // Reget with fallback
            $result = parent::get($key, $replace, $locale, $fallback);
        }

        if (is_array($result)) {
            /** @var array<string, mixed> $arrayResult */
            $arrayResult = $result;

            return $arrayResult;
        }

        return $result;
    }

    /*
     * public function setTranslationManager(Manager $manager)
     * {
     * $this->manager = $manager;
     * }
     */
    /**
     * Undocumented function.
     */
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

    public function execute(): void {}
}
