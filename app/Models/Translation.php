<?php

declare(strict_types=1);

/**
 * @see https://github.com/barryvdh/laravel-translation-manager/blob/master/src/Models/Translation.php
 */

namespace Modules\Lang\Models;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Carbon;
use Modules\Lang\Database\Factories\TranslationFactory;
use Modules\Xot\Contracts\ProfileContract;

/**
 * Modules\Lang\Models\Translation.
 *
 * @property-read \Modules\WorkOrder\Models\Profile|null $creator
 * @property-read \Modules\WorkOrder\Models\Profile|null $deleter
 * @property-read \Modules\WorkOrder\Models\Profile|null $updater
 * @method static \Modules\Lang\Database\Factories\TranslationFactory factory($count = null, $state = [])
 * @method static EloquentBuilder<static>|Translation newModelQuery()
 * @method static EloquentBuilder<static>|Translation newQuery()
 * @method static EloquentBuilder<static>|Translation ofTranslatedGroup(string $group)
 * @method static EloquentBuilder<static>|Translation orderByGroupKeys(bool $ordered)
 * @method static EloquentBuilder<static>|Translation query()
 * @method static EloquentBuilder<static>|Translation selectDistinctGroup()
 * @mixin \Eloquent
 */
class Translation extends BaseModel
{
    final public const STATUS_SAVED = 0;

    final public const STATUS_CHANGED = 1;

    protected $fillable = [
        'id',
        'lang',
        'value',
        'namespace',
        'group',
        'item',
    ];

    // protected $table = 'ltm_translations';
    /** @var list<string> */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * @param EloquentBuilder<Translation> $query
     *
     * @return EloquentBuilder<Translation>|QueryBuilder
     */
    public function scopeOfTranslatedGroup(EloquentBuilder $query, string $group): QueryBuilder|EloquentBuilder
    {
        return $query->where('group', $group)->whereNotNull('value');
    }

    /**
     * @param EloquentBuilder<Translation> $query
     *
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
     * @param EloquentBuilder<Translation> $query
     *
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
