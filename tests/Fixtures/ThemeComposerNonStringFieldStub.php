<?php

declare(strict_types=1);

namespace Tests\Modules\Lang\Fixtures;

use Modules\Lang\Datas\LangData;
use Modules\Lang\View\Composers\ThemeComposer;

final class ThemeComposerNonStringFieldStub extends ThemeComposer
{
    protected function langFieldValue(LangData $lang, string $field): int
    {
        return 42;
    }
}
