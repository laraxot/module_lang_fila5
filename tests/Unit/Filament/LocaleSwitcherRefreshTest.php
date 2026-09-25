<?php

declare(strict_types=1);
use Modules\Lang\Filament\Actions\LocaleSwitcherRefresh;
use Modules\Lang\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('LocaleSwitcherRefresh setUp applies the session locale', function (): void {
    session(['locale' => 'en']);

    $action = LocaleSwitcherRefresh::make('locale_switch');

    Assert::assertSame('en', $action->lang);
    Assert::assertSame('en', app()->getLocale());
});

test('LocaleSwitcherRefresh setUp usa it se session locale assente', function (): void {
    session()->forget('locale');

    $action = LocaleSwitcherRefresh::make('locale_switch_3');

    Assert::assertSame('it', $action->lang);
});
