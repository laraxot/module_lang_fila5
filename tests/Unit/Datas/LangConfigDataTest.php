<?php

declare(strict_types=1);

<<<<<<< HEAD
=======
use Modules\Lang\Tests\Support\Ensure;

>>>>>>> laraxot/dev
use Modules\Lang\Actions\ListLocaleOptionsAction;
use Modules\Lang\Actions\ResolveDefaultTranslatableLocaleAction;
use Modules\Lang\Actions\ResolveTranslatableLocalesAction;
use Modules\Lang\Datas\LangConfigData;
use Modules\Lang\Filament\Actions\LocaleSwitcherRefresh;
use Modules\Lang\Filament\Pages\SettingPage;
use Modules\Lang\Filament\Resources\TranslationFileResource;
use Modules\Lang\Filament\Resources\TranslationFileResource\Pages\EditTranslationFile;
use Modules\Lang\Tests\Fixtures\LangBaseResourceStub;
use Modules\Lang\Tests\Support\FakeTenantLangConfig;
use Modules\Lang\Tests\TestCase;
use Webmozart\Assert\Assert;

<<<<<<< HEAD
uses(TestCase::class)->group('no-lang-db');

test('setting page resolves config name and data class by convention', function (): void {
    expect(SettingPage::getConfigName())->toBe('lang')
=======

test('setting page resolves config name and data class by convention', function (): void {
    ensure(SettingPage::getConfigName())->toBe('lang')
>>>>>>> laraxot/dev
        ->and(SettingPage::getConfigDataClass())->toBe(LangConfigData::class)
        ->and(LangConfigData::tenantConfigName())->toBe('lang');
});

test('without a saved value the editors keep the languages they had hard coded', function (): void {
    $data = LangConfigData::from([]);

<<<<<<< HEAD
    expect($data->default_locale)->toBeNull()
=======
    ensure($data->default_locale)->toBeNull()
>>>>>>> laraxot/dev
        ->and($data->supported_locales)->toBe(['it', 'en']);
});

test('values from the tenant file override the defaults', function (): void {
    FakeTenantLangConfig::bind([
        'default_locale' => 'en',
        'supported_locales' => ['en', 'es'],
    ]);

    $data = LangConfigData::make();

<<<<<<< HEAD
    expect($data->default_locale)->toBe('en')
=======
    ensure($data->default_locale)->toBe('en')
>>>>>>> laraxot/dev
        ->and($data->supported_locales)->toBe(['en', 'es']);
});

test('every editor takes its languages from the settings', function (): void {
    FakeTenantLangConfig::bind([
        'default_locale' => 'es',
        'supported_locales' => ['it', 'en', 'es'],
    ]);

<<<<<<< HEAD
    expect(TranslationFileResource::getTranslatableLocales())->toBe(['it', 'en', 'es'])
=======
    ensure(TranslationFileResource::getTranslatableLocales())->toBe(['it', 'en', 'es'])
>>>>>>> laraxot/dev
        ->and(LangBaseResourceStub::getTranslatableLocales())->toBe(['it', 'en', 'es'])
        ->and((new EditTranslationFile)->getTranslatableLocales())->toBe(['it', 'en', 'es'])
        ->and(TranslationFileResource::getDefaultTranslatableLocale())->toBe('es')
        ->and(LangBaseResourceStub::getDefaultTranslatableLocale())->toBe('es');
});

test('until someone saves, the resources answer exactly as before', function (): void {
    FakeTenantLangConfig::bind([]);
    config(['app.locale' => 'en']);

<<<<<<< HEAD
    expect(TranslationFileResource::getTranslatableLocales())->toBe(['it', 'en'])
=======
    ensure(TranslationFileResource::getTranslatableLocales())->toBe(['it', 'en'])
>>>>>>> laraxot/dev
        ->and(TranslationFileResource::getDefaultTranslatableLocale())->toBe('en');
});

test('a default language outside the chosen ones is ignored', function (): void {
    FakeTenantLangConfig::bind([
        'default_locale' => 'de',
        'supported_locales' => ['it', 'en'],
    ]);

<<<<<<< HEAD
    expect(app(ResolveDefaultTranslatableLocaleAction::class)->execute('it'))->toBe('it');
=======
    ensure(app(ResolveDefaultTranslatableLocaleAction::class)->execute('it'))->toBe('it');
>>>>>>> laraxot/dev
});

test('an empty list of languages never reaches the editors', function (): void {
    FakeTenantLangConfig::bind(['supported_locales' => []]);

<<<<<<< HEAD
    expect(app(ResolveTranslatableLocalesAction::class)->execute())->toBe(['it', 'en']);
=======
    ensure(app(ResolveTranslatableLocalesAction::class)->execute())->toBe(['it', 'en']);
>>>>>>> laraxot/dev
});

test('the language switcher offers the chosen languages and starts from the saved default', function (): void {
    FakeTenantLangConfig::bind([
        'default_locale' => 'en',
        'supported_locales' => ['en', 'it'],
    ]);
    session()->forget('locale');

    $action = LocaleSwitcherRefresh::make('locale_switch_settings');

<<<<<<< HEAD
    expect($action->lang)->toBe('en');
=======
    ensure($action->lang)->toBe('en');
>>>>>>> laraxot/dev
});

test('locale options show flag and native name, in the order asked', function (): void {
    config([
        'laravellocalization.supportedLocales' => [
            'it' => [
                'native' => 'italiano',
                'regional' => 'it_IT',
            ],
            'en' => [
                'native' => 'English',
                'regional' => 'en_GB',
            ],
        ],
    ]);

    $action = app(ListLocaleOptionsAction::class);

<<<<<<< HEAD
    expect($action->execute(['en', 'it']))->toBe([
=======
    ensure($action->execute(['en', 'it']))->toBe([
>>>>>>> laraxot/dev
        'en' => '🇬🇧 English',
        'it' => '🇮🇹 Italiano',
    ])
        ->and(array_keys($action->execute()))->toBe(['it', 'en'])
        ->and($action->execute(['xx']))->toBe(['xx' => 'xx']);
});

test('the setting page exposes exactly the properties of the config data', function (): void {
    $properties = array_map(
        static fn (ReflectionProperty $property): string => $property->getName(),
        (new ReflectionClass(LangConfigData::class))->getProperties(ReflectionProperty::IS_PUBLIC),
    );

    $schema = (new ReflectionMethod(SettingPage::class, 'getFormSchema'))
        ->invoke(app(SettingPage::class));
    Assert::isArray($schema);

<<<<<<< HEAD
    expect(array_keys($schema))->toEqualCanonicalizing($properties);
=======
    ensure(array_keys($schema))->toEqualCanonicalizing($properties);
>>>>>>> laraxot/dev
});
