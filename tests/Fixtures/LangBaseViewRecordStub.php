<?php

declare(strict_types=1);

namespace Tests\Modules\Lang\Fixtures;

use Modules\Lang\Filament\Resources\Pages\LangBaseViewRecord;
use Modules\Lang\Filament\Resources\TranslationFileResource;

final class LangBaseViewRecordStub extends LangBaseViewRecord
{
    protected static string $resource = TranslationFileResource::class;
}
