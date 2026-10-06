<?php

declare(strict_types=1);

namespace Modules\Lang\Models;

// //use Laravel\Scout\Searchable;
// ---------- traits
use Modules\Lang\Models\Traits\LinkedTrait;
use Modules\Xot\Models\XotBaseModel;

/**
 * Class BaseModelLang.
 *
 * @property string|null $post_type
 */
abstract class BaseModelLang extends XotBaseModel
{
    use LinkedTrait;

    /**
     * Indicates whether attributes are snake cased on arrays.
     *
     * @see  https://laravel-news.com/6-eloquent-secrets
     */
    public static bool $snakeAttributes = true;

    public bool $incrementing = true;

    public bool $timestamps = true;

    protected int $perPage = 30;

    protected string $connection = 'lang';

    /** @var list<string> */
    protected array $fillable = ['id'];

    protected string $primaryKey = 'id';

    protected string $keyType = 'string';

    /** @var list<string> */
    protected array $hidden = [];

    // -----------
    /*
     * protected $id;
     * protected $post;
     * protected $lang;
     */

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'string',
            'uuid' => 'string',
            'published_at' => 'datetime',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
