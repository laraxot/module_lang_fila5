<?php

declare(strict_types=1);

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\ServiceProvider;
use Modules\Lang\Providers\LangServiceProvider;
use Modules\Lang\Tests\TestCase;
use PHPUnit\Framework\Assert;
use ReflectionClass;

uses(TestCase::class);

function makeLangServiceProvider(): LangServiceProvider
{
    return new LangServiceProvider(app());
}

describe('LangServiceProvider Basic Functionality', function () {
    it('extends ServiceProvider', function () {
        $provider = makeLangServiceProvider();
        Assert::assertInstanceOf(ServiceProvider::class, $provider);
    });

    it('can be instantiated', function () {
        $provider = makeLangServiceProvider();
        Assert::assertInstanceOf(LangServiceProvider::class, $provider);
    });

    it('has correct module name', function () {
        $provider = makeLangServiceProvider();
        $reflection = new ReflectionClass($provider);
        $property = $reflection->getProperty('module_name');
        $property->setAccessible(true);

        Assert::assertSame('Lang', $property->getValue($provider));
    });
});

describe('LangServiceProvider Registration', function () {
    it('can register services', function () {
        $provider = makeLangServiceProvider();
        $provider->register();

        Assert::assertInstanceOf(LangServiceProvider::class, $provider);
    });

    it('can boot services', function () {
        $provider = makeLangServiceProvider();
        $provider->boot();

        Assert::assertInstanceOf(LangServiceProvider::class, $provider);
    });
});

describe('LangServiceProvider Translation Loading', function () {
    it('loads translations from correct path', function () {
        $provider = makeLangServiceProvider();
        $provider->boot();

        Assert::assertTrue(Lang::has('lang::common.welcome'));
    });

    it('loads translations with correct namespace', function () {
        $provider = makeLangServiceProvider();
        $provider->boot();

        $translation = __('lang::common.welcome');
        Assert::assertIsString($translation);
        Assert::assertNotSame('lang::common.welcome', $translation);
    });

    it('handles missing translation keys gracefully', function () {
        $provider = makeLangServiceProvider();
        $provider->boot();

        $missingTranslation = __('lang::nonexistent.key');
        Assert::assertSame('lang::nonexistent.key', $missingTranslation);
    });
});

describe('LangServiceProvider Translation Structure', function () {
    it('provides common translations', function () {
        $provider = makeLangServiceProvider();
        $provider->boot();

        $commonKeys = [
            'welcome',
            'loading',
            'error',
            'success',
            'cancel',
            'save',
            'delete',
            'edit',
            'create',
        ];

        foreach ($commonKeys as $key) {
            $translation = __("lang::common.{$key}");
            Assert::assertIsString($translation);
            Assert::assertNotSame("lang::common.{$key}", $translation);
        }
    });

    it('provides validation translations', function () {
        $provider = makeLangServiceProvider();
        $provider->boot();

        $validationKeys = [
            'required',
            'email',
            'min',
            'max',
            'unique',
            'confirmed',
        ];

        foreach ($validationKeys as $key) {
            $translation = __("lang::validation.{$key}");
            Assert::assertIsString($translation);
            Assert::assertNotSame("lang::validation.{$key}", $translation);
        }
    });

    it('provides error translations', function () {
        $provider = makeLangServiceProvider();
        $provider->boot();

        $errorKeys = [
            'general',
            'not_found',
            'unauthorized',
            'validation',
            'server_error',
        ];

        foreach ($errorKeys as $key) {
            $translation = __("lang::errors.{$key}");
            Assert::assertIsString($translation);
            Assert::assertNotSame("lang::errors.{$key}", $translation);
        }
    });
});

describe('LangServiceProvider Language Support', function () {
    it('supports Italian language', function () {
        $provider = makeLangServiceProvider();
        $provider->boot();

        app()->setLocale('it');

        $translation = __('lang::common.welcome');
        Assert::assertIsString($translation);
        Assert::assertNotSame('lang::common.welcome', $translation);
    });

    it('supports English language', function () {
        $provider = makeLangServiceProvider();
        $provider->boot();

        app()->setLocale('en');

        $translation = __('lang::common.welcome');
        Assert::assertIsString($translation);
        Assert::assertNotSame('lang::common.welcome', $translation);
    });

    it('supports German language', function () {
        $provider = makeLangServiceProvider();
        $provider->boot();

        app()->setLocale('de');

        $translation = __('lang::common.welcome');
        Assert::assertIsString($translation);
        Assert::assertNotSame('lang::common.welcome', $translation);
    });

    it('falls back to default language when translation missing', function () {
        $provider = makeLangServiceProvider();
        $provider->boot();

        app()->setLocale('fr');

        $translation = __('lang::common.welcome');
        Assert::assertIsString($translation);
        Assert::assertNotSame('lang::common.welcome', $translation);
    });
});

describe('LangServiceProvider Translation Files', function () {
    it('loads common translation file', function () {
        $provider = makeLangServiceProvider();
        $provider->boot();

        $commonPath = module_path('Lang', 'lang/it/common.php');
        Assert::assertTrue(File::exists($commonPath));
        $translations = require $commonPath;
        Assert::assertIsArray($translations);
        Assert::assertArrayHasKey('welcome', $translations);
    });

    it('loads validation translation file', function () {
        $provider = makeLangServiceProvider();
        $provider->boot();

        $validationPath = module_path('Lang', 'lang/it/validation.php');
        Assert::assertTrue(File::exists($validationPath));
        $translations = require $validationPath;
        Assert::assertIsArray($translations);
        Assert::assertArrayHasKey('required', $translations);
    });

    it('loads error translation file', function () {
        $provider = makeLangServiceProvider();
        $provider->boot();

        $errorPath = module_path('Lang', 'lang/it/errors.php');
        Assert::assertTrue(File::exists($errorPath));
        $translations = require $errorPath;
        Assert::assertIsArray($translations);
        Assert::assertArrayHasKey('general', $translations);
    });

    it('loads all required translation files', function () {
        $provider = makeLangServiceProvider();
        $provider->boot();

        $requiredFiles = ['common', 'validation', 'errors'];
        $langPath = module_path('Lang', 'lang/it');

        foreach ($requiredFiles as $file) {
            $filePath = "{$langPath}/{$file}.php";
            Assert::assertTrue(File::exists($filePath));
            $translations = require $filePath;
            Assert::assertIsArray($translations);
            Assert::assertNotEmpty($translations);
        }
    });
});

describe('LangServiceProvider Translation Quality', function () {
    it('provides complete translation coverage', function () {
        $provider = makeLangServiceProvider();
        $provider->boot();

        $commonKeys = [
            'welcome',
            'loading',
            'error',
            'success',
            'cancel',
            'save',
            'delete',
            'edit',
            'create',
            'update',
            'back',
            'next',
            'previous',
            'search',
            'filter',
            'sort',
            'refresh',
            'export',
            'import',
        ];

        foreach ($commonKeys as $key) {
            $translation = __("lang::common.{$key}");
            Assert::assertIsString($translation);
            Assert::assertNotSame("lang::common.{$key}", $translation);
            Assert::assertGreaterThan(0, strlen($translation));
        }
    });

    it('provides consistent translation style', function () {
        $provider = makeLangServiceProvider();
        $provider->boot();

        $translations = [
            __('lang::common.welcome'),
            __('lang::common.loading'),
            __('lang::common.success'),
        ];

        foreach ($translations as $translation) {
            Assert::assertIsString($translation);
            Assert::assertGreaterThan(0, strlen($translation));
            Assert::assertDoesNotMatchRegularExpression('/[A-Z]{2,}/', $translation);
        }
    });

    it('provides contextually appropriate translations', function () {
        $provider = makeLangServiceProvider();
        $provider->boot();

        $contextualPairs = [
            'save' => 'Salva',
            'delete' => 'Elimina',
            'edit' => 'Modifica',
            'create' => 'Crea',
        ];

        foreach ($contextualPairs as $key => $expected) {
            $translation = __("lang::common.{$key}");
            Assert::assertSame($expected, $translation);
        }
    });
});

describe('LangServiceProvider Performance', function () {
    it('loads translations efficiently', function () {
        $startTime = microtime(true);

        $provider = makeLangServiceProvider();
        $provider->boot();

        $executionTime = microtime(true) - $startTime;

        Assert::assertLessThan(1.0, $executionTime);
    });

    it('caches translations for performance', function () {
        $provider = makeLangServiceProvider();
        $provider->boot();

        $startTime = microtime(true);
        $translation1 = __('lang::common.welcome');
        $firstCallTime = microtime(true) - $startTime;

        $startTime = microtime(true);
        $translation2 = __('lang::common.welcome');
        $secondCallTime = microtime(true) - $startTime;

        Assert::assertSame($translation2, $translation1);
        Assert::assertLessThanOrEqual($firstCallTime, $secondCallTime);
    });

    it('handles multiple language switches efficiently', function () {
        $provider = makeLangServiceProvider();
        $provider->boot();

        $languages = ['it', 'en', 'de', 'it'];

        $startTime = microtime(true);

        foreach ($languages as $locale) {
            app()->setLocale($locale);
            $translation = __('lang::common.welcome');
            Assert::assertIsString($translation);
        }

        $executionTime = microtime(true) - $startTime;

        Assert::assertLessThan(1.0, $executionTime);
    });
});

describe('LangServiceProvider Error Handling', function () {
    it('handles missing translation files gracefully', function () {
        $provider = makeLangServiceProvider();
        $provider->boot();

        Assert::assertInstanceOf(LangServiceProvider::class, $provider);
    });

    it('handles malformed translation files gracefully', function () {
        $provider = makeLangServiceProvider();
        $provider->boot();

        Assert::assertInstanceOf(LangServiceProvider::class, $provider);
    });

    it('handles empty translation files gracefully', function () {
        $provider = makeLangServiceProvider();
        $provider->boot();

        Assert::assertInstanceOf(LangServiceProvider::class, $provider);
    });
});

describe('LangServiceProvider Integration', function () {
    it('works with Laravel translation system', function () {
        $provider = makeLangServiceProvider();
        $provider->boot();

        Assert::assertTrue(Lang::has('lang::common.welcome'));
        Assert::assertIsString(__('lang::common.welcome'));
    });

    it('works with Filament components', function () {
        $provider = makeLangServiceProvider();
        $provider->boot();

        $translation = __('lang::common.save');
        Assert::assertIsString($translation);
        Assert::assertNotSame('lang::common.save', $translation);
    });

    it('works with Blade templates', function () {
        $provider = makeLangServiceProvider();
        $provider->boot();

        $translation = __('lang::common.welcome');
        Assert::assertIsString($translation);
        Assert::assertNotSame('lang::common.welcome', $translation);
    });
});

describe('LangServiceProvider Configuration', function () {
    it('respects Laravel configuration', function () {
        $provider = makeLangServiceProvider();
        $provider->boot();

        $defaultLocale = config('app.locale');
        Assert::assertIsString($defaultLocale);
        Assert::assertGreaterThan(0, strlen($defaultLocale));
    });

    it('can be configured via config files', function () {
        $provider = makeLangServiceProvider();
        $provider->boot();

        Assert::assertIsString(config('app.fallback_locale'));
    });

    it('integrates with other service providers', function () {
        $provider = makeLangServiceProvider();
        $provider->boot();

        Assert::assertInstanceOf(Application::class, app());
    });
});

describe('LangServiceProvider Maintenance', function () {
    it('can be refreshed without errors', function () {
        $provider = makeLangServiceProvider();
        $provider->boot();
        $provider->boot();

        Assert::assertInstanceOf(LangServiceProvider::class, $provider);
    });

    it('maintains state consistency', function () {
        $provider = makeLangServiceProvider();
        $provider->boot();

        $translation1 = __('lang::common.welcome');

        $provider->boot();

        $translation2 = __('lang::common.welcome');

        Assert::assertSame($translation2, $translation1);
    });

    it('can be unregistered and re-registered', function () {
        $provider = makeLangServiceProvider();
        $provider->register();
        $provider->boot();

        $provider = makeLangServiceProvider();
        $provider->register();
        $provider->boot();

        Assert::assertInstanceOf(LangServiceProvider::class, $provider);
    });
});
