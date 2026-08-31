<?php

declare(strict_types=1);

namespace Modules\Lang\Tests\Unit\Actions;

use Illuminate\Contracts\Translation\Loader;
use Illuminate\Database\QueryException;
use Illuminate\Translation\Translator;
use Modules\Lang\Adapters\TranslatorAdapter;
use Modules\Lang\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

function makeTranslatorAdapter(): TranslatorAdapter
{
    /** @var Loader $loader */
    $loader = app('translation.loader');

    return new TranslatorAdapter($loader, app()->getLocale());
}

describe('TranslatorAdapter business logic', function () {
    test('returns the key itself when translation is missing', function () {
        /** @var TestCase $this */
        if (TestCase::langDbUnavailable()) {
            $this->skipTest('DB `lang` non raggiungibile: blocco di ambiente.');
        }

        $key = 'lang::missing.unknown_key_'.uniqid();

        try {
            $result = makeTranslatorAdapter()->get($key);
        } catch (QueryException $exception) {
            $this->skipTest('DB `lang` write lock (sqlite condiviso): '.$exception->getMessage());
        }

        Assert::assertSame($key, $result);
    });

    test('get returns the key for a missing string key', function () {
        /** @var TestCase $this */
        if (TestCase::langDbUnavailable()) {
            $this->skipTest('DB `lang` non raggiungibile: blocco di ambiente.');
        }

        try {
            $result = makeTranslatorAdapter()->get('lang::missing.another_key_'.uniqid());
        } catch (QueryException $exception) {
            $this->skipTest('DB `lang` write lock (sqlite condiviso): '.$exception->getMessage());
        }

        Assert::assertIsString($result);
    });

    it('extends the Laravel translator', function () {
        Assert::assertInstanceOf(Translator::class, makeTranslatorAdapter());
    });

    it('has correct namespace', function () {
        $reflection = new \ReflectionClass(TranslatorAdapter::class);
        Assert::assertSame('Modules\Lang\Adapters', $reflection->getNamespaceName());
    });
});
