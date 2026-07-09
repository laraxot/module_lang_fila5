<?php

declare(strict_types=1);

/**
 * @see https://github.com/barryvdh/laravel-translation-manager/blob/master/src/Translator.php
 */

namespace Modules\Lang\Adapters;

use Illuminate\Events\Dispatcher;
use Illuminate\Translation\Translator as LaravelTranslator;
use Modules\Lang\Models\Translation;
use Spatie\QueueableAction\QueueableAction;

/**
 * ponytail: framework adapter — extends Laravel's Translator and is bound
 * as the container's `translator` singleton. Not a business-logic Action:
 * it must remain a Translator subclass to satisfy the framework contract.
 */
class TranslatorAdapter extends LaravelTranslator
{
    use QueueableAction;

    /** @var Dispatcher */
    protected $events;
>>>>>>> 40b96bcd6 (.)

    /**
     * Get the translation for the given key.
     *
     * @param array<string, mixed> $replace
     *
     * @return string|array<string, mixed>
     */
    public function get(mixed $key, array $replace = [], mixed $locale = null, mixed $fallback = true): string|array
    {
        $result = parent::get($key, $replace, $locale, $fallback);
        if ($result === $key) {
            $this->notifyMissingKey($key);

            $result = parent::get($key, $replace, $locale, $fallback);
        }

        if (is_array($result)) {
            /** @var array<string, mixed> $arrayResult */
            $arrayResult = $result;

            return $arrayResult;
        }

        return $result;
    }

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

    public function execute(): void
    {
    }
}
