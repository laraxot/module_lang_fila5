<?php

declare(strict_types=1);

use Modules\Lang\Models\Language;
use Modules\Lang\Models\Translation;
use Modules\Lang\Tests\TestCase;

/*
 * |--------------------------------------------------------------------------
 * | Test Case
 * |--------------------------------------------------------------------------
 * |
 * | The closure you provide to your test functions is always bound to a specific PHPUnit test
 * | case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
 * | need to change it using the "pest()" function to bind a different classes or traits.
 * |
 */

/**
 * @param array<string, mixed> $attributes
 */

expect()->extend('toBeTranslation', fn () => $this->toBeInstanceOf(Translation::class));

expect()->extend('toBeLanguage', fn () => $this->toBeInstanceOf(Language::class));

/*
 * |--------------------------------------------------------------------------
 * | Functions
 * |--------------------------------------------------------------------------
 * |
 * | While Pest is very powerful out-of-the-box, you may have some testing code specific to your
 * | project that you don't want to repeat in every file. Here you can also expose helpers as
 * | global functions to help you to reduce the number of lines of code in your test files.
 * |
 */

function createTranslation(array $attributes = []): Translation
{
    return Translation::factory()->create($attributes);
}

/**
 * @param array<string, mixed> $attributes
 */
function makeTranslation(array $attributes = []): Translation
{
    return Translation::factory()->make($attributes);
}

function createLanguage(array $attributes = []): Language
{
    return Language::factory()->create($attributes);
}

function makeLanguage(array $attributes = []): Language
{
    return Language::factory()->make($attributes);
}

/**
 * @param array<string, mixed> $translations
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
 * @param array<string, mixed> $data
 */
function langAssertDatabaseHasRow(string $table, array $data, ?string $connection = 'lang'): void
{
    $query = DB::connection($connection)->table($table);

    foreach ($data as $column => $value) {
        $query->where((string) $column, $value);
    }

    Assert::assertTrue($query->exists());
}
