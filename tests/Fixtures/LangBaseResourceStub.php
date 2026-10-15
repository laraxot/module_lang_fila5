<?php

declare(strict_types=1);

namespace Tests\Modules\Lang\Fixtures;

use Modules\Lang\Filament\Resources\LangBaseResource;
use Modules\Lang\Models\TranslationFile;

final class LangBaseResourceStub extends LangBaseResource
{
    protected static ?string $model = TranslationFile::class;
}
