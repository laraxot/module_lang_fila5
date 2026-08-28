<?php

declare(strict_types=1);

/**
 * @see https://github.com/barryvdh/laravel-translation-manager/blob/master/src/Models/Translation.php
 */

namespace Modules\Lang\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Modules\Lang\Actions\GetAllTranslationAction;
use Modules\TechPlanner\Models\Profile;
use Sushi\Sushi;

use function Safe\json_encode;

/**
 * @property int $id
 * @property string|null $name
 * @property string|null $path
 * @property array<array-key, mixed>|string|null $content
 * @property-read Profile|null $creator
 * @property-read Profile|null $updater
 *
 * @method static Builder<static>|TranslationFile newModelQuery()
 * @method static Builder<static>|TranslationFile newQuery()
 * @method static Builder<static>|TranslationFile query()
 * @method static Builder<static>|TranslationFile whereId($value)
 *
 * @mixin \Eloquent
 */
class TranslationFile extends BaseModel
{
    use Sushi;

    protected $fillable = [
        'id',
        'name',
        'path',
        'content',
    ];

    /** @var array<string, string> */
    protected array $form = [
        'key' => 'string',
        'path' => 'string',
        'id' => 'string',
        'name' => 'string',
        'content' => 'json',
    ];

    /**
     * @return array<int, array<string, mixed>>
     */
    public function getRows(): array
    {
        if ($this->isRunningIdeHelper()) {
            return [];
        }

        try {
            return $this->loadTranslationDataWithErrorHandling();
        } catch (\Throwable $e) {
            Log::warning('TranslationFile::getRows failed', [
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return [];
        }
    }

    /**
     * Carica i dati di traduzione con error handling robusto.
     *
     *
     * @return array<int, array<string, mixed>>
     *
     * @throws \Throwable
     */
    private function loadTranslationDataWithErrorHandling(): array
    {
        $files = app(GetAllTranslationAction::class)->execute();

        /** @var array<int, array<string, mixed>> $result */
        $result = Arr::map($files, function (mixed $item): array {
            if (! is_array($item)) {
                return [];
            }

            $key = $item['key'] ?? null;
            /** @var string|int|float|bool|null $keyNarrowed */
            $keyNarrowed = $key;
            $keyStr = is_string($keyNarrowed) ? $keyNarrowed : (string) $keyNarrowed;
            $item['id'] = isset($item['key']) ? $keyStr : '';

            $pathValue = $item['path'] ?? null;
            /** @var string|int|float|bool|null $pathValueNarrowed */
            $pathValueNarrowed = $pathValue;
            $pathStr = is_string($pathValueNarrowed) ? $pathValueNarrowed : (string) $pathValueNarrowed;
            $item['name'] = isset($item['path']) ? basename($pathStr, '.php') : '';

            if (isset($item['path'])) {
                $path = $pathStr;
                if (File::exists($path)) {
                    $item['content'] = $this->loadFileContent($path);
                } else {
                    $item['content'] = '';
                }
            } else {
                $item['content'] = '';
            }

            return $item;
        });

        return $result;
    }

    /**
     * Carica il contenuto di un file di traduzione con fallback.
     */
    private function loadFileContent(string $path): string
    {
        try {
            $content = File::getRequire($path);

            return json_encode($content) ?: '';
        } catch (\Throwable $e) {
            Log::debug('Failed to load translation file', [
                'path' => $path,
                'error' => $e->getMessage(),
            ]);

            return '';
        }
    }

    private function isRunningIdeHelper(): bool
    {
        return filter_var(config('app.phpstan_running', false), FILTER_VALIDATE_BOOLEAN)
            || (is_array($_SERVER['argv'] ?? null) && in_array('ide-helper:models', $_SERVER['argv'], true));
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    #[\Override]
    protected function casts(): array
    {
        return [
            'content' => 'array',
        ];
    }
}
