<?php

declare(strict_types=1);

namespace Tests\Modules\Lang\Fixtures;

use Modules\Lang\Filament\Resources\Pages\LangBaseEditRecord;
use Modules\Lang\Filament\Resources\TranslationFileResource;

final class LangBaseEditRecordStub extends LangBaseEditRecord
{
    protected static string $resource = TranslationFileResource::class;
}
