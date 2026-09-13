<?php

declare(strict_types=1);

/**
 * @see https://github.com/barryvdh/laravel-translation-manager/blob/master/src/Models/Translation.php
 */

namespace Modules\Lang\Models;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Carbon;
use Modules\Xot\Contracts\ProfileContract;

/**
 * Modules\Lang\Models\Translation.
 *
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $updater
 * @property string|null $id
 * @property int|string|null $user_id
 * @property string|null $key
 * @property string|null $value
 * @property string|null $locale
 * @property string|null $lang
 * @property string|null $namespace
 * @property string|null $group
 * @property string|null $item
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static EloquentBuilder<static>|Translation newModelQuery()
 * @method static EloquentBuilder<static>|Translation newQuery()
 * @method static EloquentBuilder<static>|Translation ofTranslatedGroup(string $group)
 * @method static EloquentBuilder<static>|Translation orderByGroupKeys(bool $ordered)
 * @method static EloquentBuilder<static>|Translation query()
 * @method static EloquentBuilder<static>|Translation selectDistinctGroup()
 *
 * @mixin \Eloquent
 */
class Translation extends BaseModel
{
    final public const int STATUS_SAVED = 0;

    final public const int STATUS_CHANGED = 1;

    protected $fillable = [
        'id',
        'user_id',
        'key',
        'value',
        'locale',
        'lang',
        'namespace',
        'group',
        'item',
    ];

    // protected $table = 'ltm_translations';
    /** @var list<string> */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * @param  EloquentBuilder<Translation>  $query
     * @return EloquentBuilder<Translation>|QueryBuilder
     */
    public function scopeOfTranslatedGroup(EloquentBuilder $query, string $group): QueryBuilder|EloquentBuilder
    {
        return $query->where('group', $group)->whereNotNull('value');
    }

    /**
     * @param  EloquentBuilder<Translation>  $query
     * @return EloquentBuilder<Translation>
     */
    public function scopeOrderByGroupKeys(EloquentBuilder $query, bool $ordered): EloquentBuilder
    {
        if ($ordered) {
            $query->orderBy('group')->orderBy('key');
        }

        return $query;
    }

    /**
     * @param  EloquentBuilder<Translation>  $query
     * @return EloquentBuilder<Translation>|QueryBuilder
     */
    public function scopeSelectDistinctGroup(EloquentBuilder $query): EloquentBuilder|QueryBuilder
    {
        $select = match (\DB::getDriverName()) {
            'mysql' => 'DISTINCT `group`',
            default => 'DISTINCT "group"',
        };

        return $query->select(\DB::raw($select));
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            ...parent::casts(),
            'user_id' => 'integer',
        ];
    }

    /*
     * Get the current connection name for the model.
     *
     * @return string|null
     *
     * public function getConnectionName()
     * {
     * if ($connection = config('translation-manager.db_connection')) {
     * return $connection;
     * }
     *
     * return parent::getConnectionName();
     * }
     */
}
