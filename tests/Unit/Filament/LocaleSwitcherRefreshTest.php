<?php

declare(strict_types=1);
<<<<<<< .merge_file_FhwO8Y

=======
<<<<<<< .merge_file_MDJFe5

=======
<<<<<<< .merge_file_kgY22a

=======
>>>>>>> .merge_file_RQKIuM
>>>>>>> .merge_file_U22Iun
>>>>>>> .merge_file_UOmfr6
use Modules\Lang\Filament\Actions\LocaleSwitcherRefresh;
use Modules\Lang\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('LocaleSwitcherRefresh applyLocale imposta sessione e locale', function (): void {
    session()->forget('locale');

    $action = LocaleSwitcherRefresh::make('locale_switch');
    $action->applyLocale(['locale' => 'en']);

    Assert::assertSame('en', session('locale'));
    Assert::assertSame('en', app()->getLocale());
});

test('LocaleSwitcherRefresh applyLocale fallback en su locale non stringa', function (): void {
    $action = LocaleSwitcherRefresh::make('locale_switch_2');
    $action->applyLocale(['locale' => 123]);

    Assert::assertSame('en', session('locale'));
});

test('LocaleSwitcherRefresh setUp usa it se session locale assente', function (): void {
    session()->forget('locale');

    $action = LocaleSwitcherRefresh::make('locale_switch_3');

    Assert::assertSame('it', $action->lang);
});
