<?php

declare(strict_types=1);

namespace Modules\Lang\Actions;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Modules\Xot\Actions\Arr\SaveArrayAction;
use Spatie\QueueableAction\QueueableAction;

class SaveTransAction
{
    use QueueableAction;

    /**
     * @param  array<string, mixed>|int|string|Htmlable|null  $data
     */
    public function execute(string $key, int|string|array|Htmlable|null $data): void
    {
        // In Pest/PHPUnit AutoLabel (Filament configureUsing) chiama SaveTrans su chiavi
        // mancanti: senza guard i file Modules/*/lang/*.php vengono corrotti a metà suite.
        // I test che devono esercitare la scrittura usano TestCase::bindRealSaveTransAction().
        if (app()->runningUnitTests()) {
            $allow = filter_var(
                config('lang.persist_trans_in_tests', $_ENV['LANG_PERSIST_TRANS_IN_TESTS'] ?? false),
                FILTER_VALIDATE_BOOLEAN,
            );
            if (! $allow) {
                return;
            }
        }

        $cont = [];

        $filename = app(GetTransPathAction::class)->execute($key);

        if (! File::exists($filename)) {
            app(SaveArrayAction::class)->execute(
                data: $cont,
                filename: $filename,
            );
        }

        try {
            $cont = File::getRequire($filename);
        } catch (\Exception $e) {
            throw new \RuntimeException('Removed debug dddx');
        }

        if (! is_array($cont)) {
            $cont = [];
        }

        $piece = implode('.', array_slice(explode('.', $key), 1));
        if ($piece !== '') {
            Arr::set($cont, $piece, $data);
        } else {
            $cont = $data;
        }

        if (! is_array($cont)) {
            throw new \Exception('Error in SaveTransAction');
        }

        /** @var array<string, mixed> $saveData */
        $saveData = $cont;

        app(SaveArrayAction::class)->execute(
            data: $saveData,
            filename: $filename,
        );
    }
}
