<?php

declare(strict_types=1);

namespace Modules\Lang\Tests\Fixtures;

use Modules\Lang\Datas\LangData;
use Modules\Lang\View\Composers\ThemeComposer;

final class ThemeComposerNonStringFieldStub extends ThemeComposer
{
<<<<<<< HEAD
<<<<<<< .merge_file_oLmTjS
    protected function langFieldValue(LangData $lang, string $field): mixed
=======
<<<<<<< .merge_file_f43DxT
    protected function langFieldValue(LangData $lang, string $field): mixed
=======
<<<<<<< .merge_file_3orXpy
    protected function langFieldValue(LangData $lang, string $field): mixed
=======
    protected function langFieldValue(LangData $lang, string $field): int
>>>>>>> .merge_file_C3IgAf
>>>>>>> .merge_file_MPUYGu
>>>>>>> .merge_file_CygvPl
=======
    protected function langFieldValue(LangData $lang, string $field): mixed
>>>>>>> laraxot/dev
    {
        return 42;
    }
}
