<?php

declare(strict_types=1);

namespace Modules\Lang\Tests\Unit\Actions;

<<<<<<< HEAD
=======
use Illuminate\Contracts\Translation\Loader;
use Illuminate\Translation\Translator;
>>>>>>> laraxot/dev
use Modules\Lang\Adapters\TranslatorAdapter;
use Modules\Lang\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

function makeTranslatorAdapter(): TranslatorAdapter
{
<<<<<<< HEAD
    /** @var \Illuminate\Contracts\Translation\Loader $loader */
=======
    /** @var Loader $loader */
>>>>>>> laraxot/dev
    $loader = app('translation.loader');

    return new TranslatorAdapter($loader, app()->getLocale());
}

describe('TranslatorAdapter business logic', function () {
    test('returns the key itself when translation is missing', function () {
        $key = 'lang::missing.unknown_key_'.uniqid();

        $result = makeTranslatorAdapter()->get($key);

        Assert::assertSame($key, $result);
    });

    test('get returns the key for a missing string key', function () {
        $result = makeTranslatorAdapter()->get('lang::missing.another_key_'.uniqid());

        Assert::assertIsString($result);
    });

    it('extends the Laravel translator', function () {
<<<<<<< HEAD
        Assert::assertInstanceOf(\Illuminate\Translation\Translator::class, makeTranslatorAdapter());
=======
        Assert::assertInstanceOf(Translator::class, makeTranslatorAdapter());
>>>>>>> laraxot/dev
    });

    it('has correct namespace', function () {
        $reflection = new \ReflectionClass(TranslatorAdapter::class);
        Assert::assertSame('Modules\Lang\Adapters', $reflection->getNamespaceName());
    });
});
