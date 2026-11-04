<?php

declare(strict_types=1);

use Modules\Lang\Datas\LangConfigData;
use Modules\Lang\Filament\Pages\SettingPage;
use Modules\Lang\Tests\TestCase;

uses(TestCase::class)->group('no-lang-db');

test('setting page resolves config name and data class by convention', function (): void {
    expect(SettingPage::getConfigName())->toBe('lang')
        ->and(SettingPage::getConfigDataClass())->toBe(LangConfigData::class);
});

test('config data reads the tenant file named after the module', function (): void {
    expect(LangConfigData::tenantConfigName())->toBe('lang');
});
