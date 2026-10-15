<?php

declare(strict_types=1);

namespace Tests\Modules\Lang\Unit\Actions;

use Modules\Lang\Actions\SaveTransAction;
use PHPUnit\Framework\Assert;
use Tests\Modules\Lang\TestCase;

uses(TestCase::class);

describe('SaveTransAction', function (): void {
    test('it has execute method', function (): void {
        $action = app(SaveTransAction::class);

        Assert::assertTrue(is_callable([$action, 'execute']));
    });

    test('action is invokable via app', function (): void {
        Assert::assertInstanceOf(SaveTransAction::class, app(SaveTransAction::class));
    });
});
