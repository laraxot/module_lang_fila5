<?php

declare(strict_types=1);

namespace Modules\Lang\Models;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Support\Carbon;
use Modules\Xot\Contracts\ProfileContract;

/**
 * Modules\Lang\Models\LanguageLine.
 *
<<<<<<< HEAD
<<<<<<< .merge_file_A5l4SK
=======
>>>>>>> laraxot/dev
 * @property int $id
 * @property string $group
 * @property string $key
 * @property array<array-key, mixed> $text
<<<<<<< HEAD
=======
<<<<<<< .merge_file_rXdZB3
 * @property int                     $id
 * @property string                  $group
 * @property string                  $key
 * @property array<array-key, mixed> $text
 * @property string                  $locale
 * @property string|null             $created_by
 * @property string|null             $updated_by
 * @property Carbon|null             $created_at
 * @property Carbon|null             $updated_at
=======
 * @property int $id
 * @property string $group
 * @property string $key
<<<<<<< .merge_file_Wf48e2
 * @property array<array-key, mixed> $text
=======
 * @property array<string, string> $text
>>>>>>> .merge_file_ThtvFr
>>>>>>> .merge_file_6T9MPX
=======
>>>>>>> laraxot/dev
 * @property string $locale
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
<<<<<<< HEAD
<<<<<<< .merge_file_A5l4SK
=======
>>>>>>> .merge_file_OJ1APb
>>>>>>> .merge_file_6T9MPX
=======
>>>>>>> laraxot/dev
 *
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
 *
<<<<<<< HEAD
<<<<<<< .merge_file_A5l4SK
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $deleter
 * @property-read ProfileContract|null $updater
=======
<<<<<<< .merge_file_rXdZB3
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $deleter
 * @property ProfileContract|null $updater
=======
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $deleter
 * @property-read ProfileContract|null $updater
>>>>>>> .merge_file_OJ1APb
>>>>>>> .merge_file_6T9MPX
=======
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $deleter
 * @property-read ProfileContract|null $updater
>>>>>>> laraxot/dev
 *
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
