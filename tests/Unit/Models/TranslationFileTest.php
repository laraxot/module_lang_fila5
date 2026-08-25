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
        $model = new TranslationFile();

<<<<<<< HEAD
       Assert::assertArrayHasKey('Sushi\Sushi', class_uses($model));
=======
        Assert::assertArrayHasKey('Sushi\Sushi', class_uses($model));
>>>>>>> laraxot/dev
    });

    test('has correct fillable attributes', function () {
        $model = new TranslationFile();
        $fillable = $model->getFillable();

<<<<<<< HEAD
       Assert::assertContains('id', $fillable);
=======
        Assert::assertContains('id', $fillable);
>>>>>>> laraxot/dev
        Assert::assertContains('name', $fillable);
        Assert::assertContains('path', $fillable);
        Assert::assertContains('content', $fillable);
    });

    test('has form property accessible via reflection', function () {
        $model = new TranslationFile();
<<<<<<< HEAD
       $reflection = new \ReflectionClass($model);
=======
        $reflection = new \ReflectionClass($model);
>>>>>>> laraxot/dev
        $property = $reflection->getProperty('form');
        $property->setAccessible(true);
        $form = $property->getValue($model);

<<<<<<< HEAD
       Assert::assertIsArray($form);
=======
        Assert::assertIsArray($form);
>>>>>>> laraxot/dev
        Assert::assertSame('string', $form['key']);
        Assert::assertSame('string', $form['path']);
        Assert::assertSame('json', $form['content']);
    });

    test('casts content as array', function () {
        $model = new TranslationFile();
        $casts = $model->getCasts();

<<<<<<< HEAD
       Assert::assertSame('array', $casts['content']);
=======
        Assert::assertSame('array', $casts['content']);
>>>>>>> laraxot/dev
    });

    test('has getRows method', function () {
        $model = new TranslationFile();

<<<<<<< HEAD
       Assert::assertTrue(is_callable([$model, 'getRows']));
=======
        Assert::assertTrue(is_callable([$model, 'getRows']));
>>>>>>> laraxot/dev
    });
});
