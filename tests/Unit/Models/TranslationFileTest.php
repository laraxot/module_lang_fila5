<?php

declare(strict_types=1);

namespace Modules\Lang\Tests\Unit\Models;

use Modules\Lang\Models\TranslationFile;
use Modules\Lang\Tests\TestCase;
use PHPUnit\Framework\Assert;

use function Safe\class_uses;

uses(TestCase::class);

describe('TranslationFile Model', function () {
    test('uses Sushi trait', function () {
<<<<<<< HEAD
        $model = new TranslationFile;
=======
        $model = new TranslationFile();
>>>>>>> laraxot/dev

        Assert::assertArrayHasKey('Sushi\Sushi', class_uses($model));
    });

    test('has correct fillable attributes', function () {
<<<<<<< HEAD
        $model = new TranslationFile;
=======
        $model = new TranslationFile();
>>>>>>> laraxot/dev
        $fillable = $model->getFillable();

        Assert::assertContains('id', $fillable);
        Assert::assertContains('name', $fillable);
        Assert::assertContains('path', $fillable);
        Assert::assertContains('content', $fillable);
    });

    test('has form property accessible via reflection', function () {
<<<<<<< HEAD
        $model = new TranslationFile;
=======
        $model = new TranslationFile();
>>>>>>> laraxot/dev
        $reflection = new \ReflectionClass($model);
        $property = $reflection->getProperty('form');
        $property->setAccessible(true);
        $form = $property->getValue($model);

        Assert::assertIsArray($form);
        Assert::assertSame('string', $form['key']);
        Assert::assertSame('string', $form['path']);
        Assert::assertSame('json', $form['content']);
    });

    test('casts content as array', function () {
<<<<<<< HEAD
        $model = new TranslationFile;
=======
        $model = new TranslationFile();
>>>>>>> laraxot/dev
        $casts = $model->getCasts();

        Assert::assertSame('array', $casts['content']);
    });

    test('has getRows method', function () {
<<<<<<< HEAD
        $model = new TranslationFile;
=======
        $model = new TranslationFile();
>>>>>>> laraxot/dev

        Assert::assertTrue(is_callable([$model, 'getRows']));
    });
});
