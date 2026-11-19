<?php

declare(strict_types=1);

namespace Modules\Lang\Models;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Modules\Xot\Contracts\ProfileContract;

/**
 * Modules\Lang\Models\LanguageLine.
 *
 * @property int $id
 * @property string $group
 * @property string $key
 * @property array<string, string> $text
 * @property string $locale
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
<<<<<<< HEAD
 * @method static EloquentBuilder<static>|LanguageLine newModelQuery()
 * @method static EloquentBuilder<static>|LanguageLine newQuery()
 * @method static EloquentBuilder<static>|LanguageLine query()
 * @method static EloquentBuilder<static>|LanguageLine whereId($value)
 * @method static EloquentBuilder<static>|LanguageLine whereGroup($value)
 * @method static EloquentBuilder<static>|LanguageLine whereKey($value)
 * @method static EloquentBuilder<static>|LanguageLine whereText($value)
 * @method static EloquentBuilder<static>|LanguageLine whereLocale($value)
 * @method static EloquentBuilder<static>|LanguageLine whereCreatedAt($value)
 * @method static EloquentBuilder<static>|LanguageLine whereUpdatedAt($value)
 * @method static EloquentBuilder<static>|LanguageLine whereCreatedBy($value)
 * @method static EloquentBuilder<static>|LanguageLine whereUpdatedBy($value)
=======
 * @method static EloquentBuilder<static> newModelQuery()
 * @method static EloquentBuilder<static> newQuery()
 * @method static EloquentBuilder<static> query()
 * @method static EloquentBuilder<static> whereId($value)
 * @method static EloquentBuilder<static> whereGroup($value)
 * @method static EloquentBuilder<static> whereKey($value)
 * @method static EloquentBuilder<static> whereText($value)
 * @method static EloquentBuilder<static> whereLocale($value)
 * @method static EloquentBuilder<static> whereCreatedAt($value)
 * @method static EloquentBuilder<static> whereUpdatedAt($value)
 * @method static EloquentBuilder<static> whereCreatedBy($value)
 * @method static EloquentBuilder<static> whereUpdatedBy($value)
>>>>>>> laraxot/dev
 *
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $deleter
 * @property ProfileContract|null $updater
 *
 * @mixin Model
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
