<?php

declare(strict_types=1);

namespace Modules\Lang\Tests\Fixtures;

use Modules\Lang\Filament\Forms\Components\TranslationEditor;

final class TranslationEditorStub extends TranslationEditor
{
<<<<<<< .merge_file_mriFas
=======
    /** Stato Filament forzato: eterogeneo per contratto (`getState(): mixed`). */
>>>>>>> .merge_file_qWX4ry
    public mixed $forcedState = [];

    public function getState(): mixed
    {
        return $this->forcedState;
    }
}
