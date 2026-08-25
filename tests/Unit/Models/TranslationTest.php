<?php

declare(strict_types=1);

namespace Modules\Lang\Tests\Unit\Models;

use Illuminate\Database\Eloquent\Builder;
use Modules\Lang\Models\Translation;
use Modules\Lang\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

describe('Translation Model', function () {
    test('has correct fillable attributes', function () {
        $model = new Translation();
        $fillable = $model->getFillable();

<<<<<<< HEAD
       Assert::assertContains('id', $fillable);
=======
        Assert::assertContains('id', $fillable);
>>>>>>> laraxot/dev
        Assert::assertContains('lang', $fillable);
        Assert::assertContains('value', $fillable);
        Assert::assertContains('namespace', $fillable);
        Assert::assertContains('group', $fillable);
        Assert::assertContains('item', $fillable);
    });

    test('has correct status constants', function () {
        Assert::assertSame(0, Translation::STATUS_SAVED);
        Assert::assertSame(1, Translation::STATUS_CHANGED);
    });

    test('scopeOfTranslatedGroup filters by group', function () {
        $result = Translation::ofTranslatedGroup('test');

<<<<<<< HEAD
       Assert::assertInstanceOf(Builder::class, $result);
=======
        Assert::assertInstanceOf(Builder::class, $result);
>>>>>>> laraxot/dev
    });

    test('scopeOrderByGroupKeys orders by group and key', function () {
        $result = Translation::orderByGroupKeys(true);

<<<<<<< HEAD
       Assert::assertInstanceOf(Builder::class, $result);
=======
        Assert::assertInstanceOf(Builder::class, $result);
>>>>>>> laraxot/dev
    });

    test('scopeSelectDistinctGroup selects distinct groups', function () {
        $result = Translation::selectDistinctGroup();

<<<<<<< HEAD
       Assert::assertInstanceOf(Builder::class, $result);
=======
        Assert::assertInstanceOf(Builder::class, $result);
>>>>>>> laraxot/dev
    });

    test('casts datetime fields', function () {
        $model = new Translation();
        $casts = $model->getCasts();

<<<<<<< HEAD
       Assert::assertArrayHasKey('created_at', $casts);
=======
        Assert::assertArrayHasKey('created_at', $casts);
>>>>>>> laraxot/dev
        Assert::assertArrayHasKey('updated_at', $casts);
    });
});
