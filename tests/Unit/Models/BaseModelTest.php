<?php

declare(strict_types=1);

namespace Modules\Lang\Tests\Unit\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Lang\Models\BaseModel;
use Modules\Lang\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

function makeLangBaseModel(): BaseModel
{
    return new class extends BaseModel
    {
        protected $table = 'test_lang_table';
    };
}

test('base model extends eloquent model', function (): void {
    $baseModel = makeLangBaseModel();
    Assert::assertInstanceOf(Model::class, $baseModel);
});

test('base model extends eloquent model', function () {
});
