<?php

declare(strict_types=1);

namespace Modules\Lang\Tests\Unit\Services;

<<<<<<< HEAD
use Modules\Lang\Adapters\TranslatorAdapter;
=======
use Illuminate\Contracts\Translation\Translator;
>>>>>>> laraxot/dev
use Modules\Lang\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

<<<<<<< HEAD
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
function makeTranslatorService(): Translator
{
    return app('translator');
}

describe('TranslatorService Business Logic', function () {
    test('returns the key itself when translation is missing', function () {
        $key = 'lang::missing.unknown_key_'.uniqid();

        $result = makeTranslatorService()->get($key);
>>>>>>> laraxot/dev

        Assert::assertSame($key, $result);
    });

<<<<<<< HEAD
    test('replacements do not alter a missing key', function () {
        $key = 'lang::missing.another_key_'.uniqid();

        $result = makeTranslatorAdapter()->get($key, ['name' => 'Mario']);

        Assert::assertSame($key, $result);
=======
    test('get returns a string or an array', function () {
        $result = makeTranslatorService()->get('lang::missing.another_key_'.uniqid());

        Assert::assertTrue(is_string($result) || is_array($result));
>>>>>>> laraxot/dev
    });
});
