<?php

declare(strict_types=1);

namespace Modules\Lang\Tests\Unit\Services;

use Modules\Lang\Adapters\TranslatorAdapter;
use Modules\Lang\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

function makeTranslator()
{
    return app('translator');
}

describe('TranslatorAdapter Business Logic', function () {
    test('returns the key itself when translation is missing', function () {
        $key = 'lang::missing.unknown_key_'.uniqid();

        $result = makeTranslator()->get($key);

        Assert::assertSame($key, $result);
    });

    test('get returns a string or an array', function () {
        $result = makeTranslator()->get('lang::missing.another_key_'.uniqid());

        Assert::assertTrue(is_string($result) || is_array($result));
    });
});
