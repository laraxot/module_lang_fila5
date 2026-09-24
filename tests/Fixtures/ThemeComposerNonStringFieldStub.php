<?php

declare(strict_types=1);

namespace Modules\Lang\Tests\Fixtures;

use Modules\Lang\Datas\LangData;
use Modules\Lang\View\Composers\ThemeComposer;

final class ThemeComposerNonStringFieldStub extends ThemeComposer
{
<<<<<<< .merge_file_3orXpy
    protected function langFieldValue(LangData $lang, string $field): mixed
=======
    protected function langFieldValue(LangData $lang, string $field): int
>>>>>>> .merge_file_C3IgAf
    {
        return 42;
    }
}
