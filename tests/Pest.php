<?php

declare(strict_types=1);
use Illuminate\Support\Facades\DB;
use Modules\Lang\Actions\ReadTranslationFileAction;
use Modules\Lang\Database\Factories\TranslationFactory;
use Modules\Lang\Models\BaseModel;
use Modules\Lang\Models\Translation;
use PHPUnit\Framework\Assert;

use function Safe\file_put_contents;
use function Safe\unlink;

/*
 * Bootstrap Pest — modulo Lang.
 * Ogni file test dichiara uses(\Modules\Lang\Tests\TestCase::class) se serve binding.
 * Per estendere si usa l'API idiomatica di Pest — `pest()->extend(...)`, in fondo
 * a questo file — senza nessuna annotazione di soppressione: con
 * `pestphp/pest-plugin-phpstan 5.2.0` installato, `method.internalClass` non
 * viene piu' segnalato. Misurato il 2026-08-25 su tutti i bootstrap dei moduli:
 * `phpstan analyse Modules/<Modulo>/tests/Pest.php` = 0 errori.
 * Se ricomparisse, verificare che il plugin sia ancora caricato da
 * `phpstan/extension-installer`, non reintrodurre il divieto.
 * Vedi story XOT-5.41 e ROOT-17.6.
 */

/**
 * @param  array<string, mixed>  $attributes
 */
function createTranslation(array $attributes = []): Translation
{
    return TranslationFactory::new()->createOne($attributes);
}

/**
 * @param  array<string, mixed>  $attributes
 */
function makeTranslation(array $attributes = []): Translation
{
    $translation = TranslationFactory::new()->make($attributes);
    if (! $translation instanceof Translation) {
        throw new InvalidArgumentException('Expected Translation model from factory make().');
    }

    return $translation;
}

/**
 * @param  array<string, mixed>  $translations
 */
function createTranslationFile(string $filePath, array $translations): void
{
    $phpContent = "<?php\n\nreturn ".var_export($translations, true).";\n";
    file_put_contents($filePath, $phpContent);
}

function cleanupTranslationFile(string $filePath): void
{
    if (file_exists($filePath)) {
        unlink($filePath);
    }
}
/**
 * @param  array<string, mixed>  $data
 */
function langAssertDatabaseHasRow(string $table, array $data, ?string $connection = 'lang'): void
{
    $query = DB::connection($connection)->table($table);

    foreach ($data as $column => $value) {
        $query->where((string) $column, $value);
    }

    Assert::assertTrue($query->exists());
}

/**
 * BaseModel anonimo tipizzato per i test di ereditarieta' del model Lang.
 */
function makeLangBaseModel(): BaseModel
{
    return new class extends BaseModel
    {
        protected $table = 'test_lang_table';
    };
}

/**
 * Wrapper globale → {@see \Modules\Lang\Tests\TestCase::makeLangServiceProvider()}.
 */
function makeLangServiceProvider(): \Modules\Lang\Providers\LangServiceProvider
{
    return \Modules\Lang\Tests\TestCase::makeLangServiceProvider();
}

/**
 * Dataset di traduzione di default per i test di ReadTranslationFileAction.
 *
 * @return array<string, mixed>
 */
function defaultReadTranslationTestData(): array
{
    return [
        'auth' => [
            'failed' => 'These credentials do not match our records.',
            'password' => 'The provided password is incorrect.',
        ],
        'pagination' => [
            'previous' => '&laquo; Previous',
            'next' => 'Next &raquo;',
        ],
    ];
}

function readTranslationTestFilePath(): string
{
    return sys_get_temp_dir().'/test_translations.php';
}

function makeReadTranslationFileAction(): ReadTranslationFileAction
{
    return new ReadTranslationFileAction;
}
