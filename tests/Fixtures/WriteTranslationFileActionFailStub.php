<?php

declare(strict_types=1);

namespace Tests\Modules\Lang\Fixtures;

use Modules\Lang\Actions\WriteTranslationFileAction;

final class WriteTranslationFileActionFailStub extends WriteTranslationFileAction
{
    protected function putTranslationFile(string $filePath, string $phpContent): false
    {
        return false;
    }
}
