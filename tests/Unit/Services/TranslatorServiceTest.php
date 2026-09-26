<?php

declare(strict_types=1);

namespace Modules\Lang\Tests\Unit\Services;

<<<<<<< HEAD
<<<<<<< .merge_file_nmJvRL
use Modules\Lang\Adapters\TranslatorAdapter;
=======
use Illuminate\Contracts\Translation\Translator;
>>>>>>> .merge_file_J6zOF3
=======
use Illuminate\Contracts\Translation\Translator;
>>>>>>> laraxot/dev
use Modules\Lang\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

<<<<<<< HEAD
<<<<<<< .merge_file_nmJvRL
function makeTranslatorAdapter(): TranslatorAdapter
{
    /** @var TranslatorAdapter $translator */
    $translator = app('translator');

    return $translator;
}

describe('TranslatorAdapter Business Logic', function () {
    test('returns the key itself when translation is missing', function () {
        $key = 'lang::missing.unknown_key_'.uniqid();

        $result = makeTranslatorAdapter()->get($key);
=======
=======
>>>>>>> laraxot/dev
function makeTranslatorService(): Translator
{
    return app('translator');
}

describe('TranslatorService Business Logic', function () {
    test('returns the key itself when translation is missing', function () {
        $key = 'lang::missing.unknown_key_'.uniqid();

        $result = makeTranslatorService()->get($key);
<<<<<<< HEAD
>>>>>>> .merge_file_J6zOF3
=======
>>>>>>> laraxot/dev

        Assert::assertSame($key, $result);
    });

    test('get returns a string or an array', function () {
<<<<<<< HEAD
<<<<<<< .merge_file_nmJvRL
        $result = makeTranslatorAdapter()->get('lang::missing.another_key_'.uniqid());
=======
        $result = makeTranslatorService()->get('lang::missing.another_key_'.uniqid());
>>>>>>> .merge_file_J6zOF3
=======
        $result = makeTranslatorService()->get('lang::missing.another_key_'.uniqid());
>>>>>>> laraxot/dev

        Assert::assertTrue(is_string($result) || is_array($result));
    });
});
