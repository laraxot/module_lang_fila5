<?php

declare(strict_types=1);
/**
 * @see https://github.com/barryvdh/laravel-translation-manager/blob/master/src/Models/Translation.php
 */

namespace Modules\Lang\Models;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Modules\Lang\Database\Factories\TranslationFactory;
use Modules\Xot\Contracts\ProfileContract;

/**
 * Modules\Lang\Models\Translation.
 *
 * @property string $id
 * @property string|null $lang
 * @property string|null $key
 * @property string|null $value
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $namespace
 * @property string $group
 * @property string|null $item
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 *
 * @method static TranslationFactory factory($count = null, $state = [])
 * @method static EloquentBuilder<static> newModelQuery()
 * @method static EloquentBuilder<static> newQuery()
 * @method static EloquentBuilder<static> ofTranslatedGroup(string $group)
 * @method static EloquentBuilder<static> orderByGroupKeys(bool $ordered)
 * @method static EloquentBuilder<static> query()
 * @method static Translation create(array<string, mixed> $attributes = [])
 * @method static Translation firstOrCreate(array<string, mixed> $attributes = [], array<string, mixed> $values = [])
 * @method static EloquentBuilder<static> selectDistinctGroup()
 * @method static EloquentBuilder<static> whereCreatedAt($value)
 * @method static EloquentBuilder<static> whereCreatedBy($value)
 * @method static EloquentBuilder<static> whereGroup($value)
 * @method static EloquentBuilder<static> whereId($value)
 * @method static EloquentBuilder<static> whereItem($value)
 * @method static EloquentBuilder<static> whereKey($value)
 * @method static EloquentBuilder<static> whereLang($value)
 * @method static EloquentBuilder<static> whereNamespace($value)
 * @method static EloquentBuilder<static> whereUpdatedAt($value)
 * @method static EloquentBuilder<static> whereUpdatedBy($value)
 * @method static EloquentBuilder<static> whereValue($value)
 *
 * @property ProfileContract|null $deleter
 * @property string|null $locale
 * @property int|null $user_id
 *
 * @method static EloquentBuilder<static> whereLocale($value)
 * @method static EloquentBuilder<static> whereUserId($value)
 *
 * @mixin Model
 */
class Translation extends BaseModel
{
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
        $select = match (DB::getDriverName()) {
            'mysql' => 'DISTINCT `group`',
            default => 'DISTINCT "group"',
        };

        return $query->select(DB::raw($select));
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
