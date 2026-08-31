<?php

declare(strict_types=1);

namespace Modules\Lang\Models;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

/**
 * Modules\Lang\Models\LanguageLine.
 *
 * @property-read \Modules\WorkOrder\Models\Profile|null $creator
 * @property-read \Modules\WorkOrder\Models\Profile|null $deleter
 * @property-read \Modules\WorkOrder\Models\Profile|null $updater
 * @method static \Modules\Lang\Database\Factories\LanguageLineFactory factory($count = null, $state = [])
 * @method static EloquentBuilder<static>|LanguageLine newModelQuery()
 * @method static EloquentBuilder<static>|LanguageLine newQuery()
 * @method static EloquentBuilder<static>|LanguageLine query()
 * @mixin \Eloquent
 */
class LanguageLine extends BaseModel
{
    protected $fillable = [
        'group',
        'key',
        'text',
        'locale',
    ];

    protected function casts(): array
    {
        return [
            'text' => 'json',
        ];
    }
}
