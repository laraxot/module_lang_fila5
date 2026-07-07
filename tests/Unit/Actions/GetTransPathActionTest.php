<?php

declare(strict_types=1);

namespace Modules\Lang\Tests\Unit\Actions;

<<<<<<< HEAD
<<<<<<< HEAD
uses(TestCase::class);

use Modules\Lang\Actions\GetTransPathAction;
use Modules\Lang\Tests\TestCase;

beforeEach(function () {
    $this->action = new GetTransPathAction();
});
=======
=======
>>>>>>> origin/dev
use Modules\Lang\Actions\GetTransPathAction;
use Modules\Lang\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

function makeGetTransPathAction(): GetTransPathAction
{
    return new GetTransPathAction();
}
<<<<<<< HEAD
>>>>>>> 40b96bcd6 (.)
=======
>>>>>>> origin/dev

describe('GetTransPathAction Business Logic', function () {
    test('returns correct path for valid translation key', function () {
        $key = 'meetup::messages.welcome';
<<<<<<< HEAD
<<<<<<< HEAD
        $result = $this->action->execute($key);
=======
        $result = makeGetTransPathAction()->execute($key);
>>>>>>> 40b96bcd6 (.)
=======
        $result = makeGetTransPathAction()->execute($key);
>>>>>>> origin/dev

        Assert::assertStringContainsString('meetup', strtolower($result));
        Assert::assertStringContainsString('lang', $result);
        Assert::assertStringContainsString('messages.php', $result);
    });

    test('extracts namespace and file from key', function () {
        $key = 'cms::validation.required';
<<<<<<< HEAD
<<<<<<< HEAD
        $result = $this->action->execute($key);
=======
        $result = makeGetTransPathAction()->execute($key);
>>>>>>> 40b96bcd6 (.)
=======
        $result = makeGetTransPathAction()->execute($key);
>>>>>>> origin/dev

        Assert::assertStringContainsString('cms', strtolower($result));
        Assert::assertStringContainsString('validation.php', $result);
    });

    test('handles simple key without namespace', function () {
<<<<<<< HEAD
<<<<<<< HEAD
        // This will use the default fallback path
        $result = $this->action->execute('test');
        expect($result)->toBeString();
=======
        $result = makeGetTransPathAction()->execute('test');
        Assert::assertNotSame('', $result);
>>>>>>> 40b96bcd6 (.)
=======
        $result = makeGetTransPathAction()->execute('test');
        Assert::assertNotSame('', $result);
>>>>>>> origin/dev
    });

    test('extracts language from app locale', function () {
        $key = 'user::auth.login';
<<<<<<< HEAD
<<<<<<< HEAD
        $result = $this->action->execute($key);
=======
        $result = makeGetTransPathAction()->execute($key);
>>>>>>> 40b96bcd6 (.)
=======
        $result = makeGetTransPathAction()->execute($key);
>>>>>>> origin/dev

        Assert::assertStringContainsString('lang/', $result);
    });

    test('handles keys with multiple dots', function () {
        $key = 'module::file.nested.deep.value';
<<<<<<< HEAD
<<<<<<< HEAD
        $result = $this->action->execute($key);
=======
        $result = makeGetTransPathAction()->execute($key);
>>>>>>> 40b96bcd6 (.)
=======
        $result = makeGetTransPathAction()->execute($key);
>>>>>>> origin/dev

        Assert::assertStringContainsString('file.php', $result);
    });
});
