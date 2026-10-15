<?php
namespace Modules\Lang\Tests\Unit;

use Modules\Lang\Tests\TestCase;
use Modules\Lang\Models\TranslationFile;

it('has main model class', function () {
    expect(class_exists(TranslationFile::class))->toBeTrue();
});
