<?php

declare(strict_types=1);

namespace Modules\Lang\Tests\Unit\Actions;

<<<<<<< HEAD
<<<<<<< HEAD
uses(TestCase::class);

use Modules\Lang\Actions\TransArrayAction;
use Modules\Lang\Tests\TestCase;

beforeEach(function () {
    $this->action = new TransArrayAction();
});
=======
=======
>>>>>>> origin/dev
use Modules\Lang\Actions\TransArrayAction;
use Modules\Lang\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

function makeTransArrayAction(): TransArrayAction
{
    return new TransArrayAction();
}
<<<<<<< HEAD
>>>>>>> 40b96bcd6 (.)
=======
>>>>>>> origin/dev

describe('TransArrayAction Business Logic', function () {
    test('converts array elements to strings without transKey', function () {
        $input = [1, 2, 3];
<<<<<<< HEAD
<<<<<<< HEAD
        $result = $this->action->execute($input, null);
=======
        $result = makeTransArrayAction()->execute($input, null);
>>>>>>> 40b96bcd6 (.)
=======
        $result = makeTransArrayAction()->execute($input, null);
>>>>>>> origin/dev

        Assert::assertCount(3, $result);
    });

    test('handles array with string keys', function () {
        $input = ['a' => 'value1', 'b' => 'value2'];
<<<<<<< HEAD
<<<<<<< HEAD
        $result = $this->action->execute($input, null);
=======
        $result = makeTransArrayAction()->execute($input, null);
>>>>>>> 40b96bcd6 (.)
=======
        $result = makeTransArrayAction()->execute($input, null);
>>>>>>> origin/dev

        Assert::assertSame('value1', $result['a']);
        Assert::assertSame('value2', $result['b']);
    });

    test('handles empty array', function () {
        $input = [];
<<<<<<< HEAD
<<<<<<< HEAD
        $result = $this->action->execute($input, null);
=======
        $result = makeTransArrayAction()->execute($input, null);
>>>>>>> 40b96bcd6 (.)
=======
        $result = makeTransArrayAction()->execute($input, null);
>>>>>>> origin/dev

        Assert::assertEmpty($result);
    });

    test('translates array elements with transKey when translation exists', function () {
        $input = ['test_key'];
<<<<<<< HEAD
<<<<<<< HEAD
        $result = $this->action->execute($input, 'test');
=======
        $result = makeTransArrayAction()->execute($input, 'test');
>>>>>>> 40b96bcd6 (.)
=======
        $result = makeTransArrayAction()->execute($input, 'test');
>>>>>>> origin/dev

        Assert::assertCount(1, $result);
    });

    test('returns original value when translation does not exist', function () {
        $input = ['nonexistent_key'];
<<<<<<< HEAD
<<<<<<< HEAD
        $result = $this->action->execute($input, 'nonexistent');
=======
        $result = makeTransArrayAction()->execute($input, 'nonexistent');
>>>>>>> 40b96bcd6 (.)
=======
        $result = makeTransArrayAction()->execute($input, 'nonexistent');
>>>>>>> origin/dev

        Assert::assertSame(['nonexistent_key'], $result);
    });

    test('handles numeric array elements', function () {
        $input = [100, 200, 300];
<<<<<<< HEAD
<<<<<<< HEAD
        $result = $this->action->execute($input, null);
=======
        $result = makeTransArrayAction()->execute($input, null);
>>>>>>> 40b96bcd6 (.)
=======
        $result = makeTransArrayAction()->execute($input, null);
>>>>>>> origin/dev

        Assert::assertSame('100', $result[0]);
    });

    test('handles array with mixed types', function () {
        $input = ['string', 123, true, null];
<<<<<<< HEAD
<<<<<<< HEAD
        $result = $this->action->execute($input, null);
=======
        $result = makeTransArrayAction()->execute($input, null);
>>>>>>> 40b96bcd6 (.)
=======
        $result = makeTransArrayAction()->execute($input, null);
>>>>>>> origin/dev

        Assert::assertCount(4, $result);
    });
});
