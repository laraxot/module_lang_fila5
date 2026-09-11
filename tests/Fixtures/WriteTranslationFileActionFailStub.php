<?php

declare(strict_types=1);

namespace Modules\Lang\Tests\Fixtures;

use Modules\Lang\Actions\WriteTranslationFileAction;

final class WriteTranslationFileActionFailStub extends WriteTranslationFileAction
{
<<<<<<< HEAD
    protected function putTranslationFile(string $filePath, string $phpContent): int|false
=======
    protected function putTranslationFile(string $filePath, string $phpContent): false
>>>>>>> laraxot/dev
    {
        return false;
    }
}
