<?php

declare(strict_types=1);

namespace Modules\Lang\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Str;
// --- traits ---
use Modules\Lang\Database\Factories\PostFactory;
// use Laravel\Scout\Searchable;
use Modules\Xot\Models\Traits\HasXotFactory;
use Modules\Xot\Traits\Updater;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * @property string $id
 * @property string|null $post_type
 * @property string|int|null $post_id
 * @property string $lang
 * @property string $guid
 * @property string|null $title
 * @property string|null $subtitle
 */
class Post extends BaseModel
{
    use HasSlug;

<<<<<<< HEAD
    /** @phpstan-use HasXotFactory<PostFactory> */
=======
    /** @phpstan-use HasXotFactory<PostFactory, Post> */
>>>>>>> laraxot/dev
    use HasXotFactory;

    // use Cachable;
    use Updater;

    /*
     * public function getUrlAttribute($value) {
     *
     * }
     */

    final public const SEARCHABLE_FIELDS = ['title', 'guid', 'txt'];

    public static $snakeAttributes = true;

    /** @var bool */
    public $incrementing = false;

    /** @var int */
    protected $perPage = 30;

    // use Searchable;
    /** @var string */
    protected $connection = 'lang';

    /** @var list<string> */
    protected $fillable = [
        'id',
        'user_id',
        'post_id',
        'lang',
        'guid',
        'title',
        'subtitle',
        'post_type',
        'txt',
        'content',
        'excerpt',
        'slug',
        'status',
        'published_at',
        'locale',
        'category',
        // ------ IMAGE ---------
        'image_src',
        'image_alt',
        'image_title',
        // ------ SEO FIELDS -----
        'meta_description',
        'meta_keywords', // seo
        'author_id',
        // ------ BUFFER ----
        'url',
        'url_lang', // buffer
        'image_resize_src', // buffer
    ];

    /** @var list<string> */
    protected $appends = [];

    /** @var string */
    protected $primaryKey = 'id';

    /** @var string */
    protected $keyType = 'string';

    /*
     * public function getRouteKeyName() {
     * return inAdmin() ? 'guid' : 'post_id';
     * }
     */

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()->generateSlugsFrom('title')->saveSlugsTo('guid');
    }

    // -------- relationship ------

    /**
     * @return MorphTo<Model, $this>
     */
    public function linkable(): MorphTo
    {
        return $this->morphTo('post');
    }

    /* deprecated
     * public function archive() {
     * $lang = $this->lang;
     * $post_type = $this->post_type;
     * $obj = $this->getLinkedModel();
     * $table = $obj->getTable();
     * $post_table = with(new Post())->getTable();
     * $rows = $obj->join($post_table, $post_table.'.post_id', $table.'.post_id')
     * ->where('lang', $lang)
     * ->where($post_table.'.post_type', $post_type)
     * ->where($post_table.'.guid', '!=', $post_type)
     * ->orderBy($table.'.updated_at', 'desc')
     * ->with('post')
     * ;
     *
     * return $rows;
     * }
     */

    // end function
    // -------------- MUTATORS ------------------

    public function setTitleAttribute(string $value): void
    {
        $this->attributes['title'] = $value;
        $this->attributes['guid'] = Str::slug($value);
    }

    public function getTitleAttribute(?string $value): ?string
    {
        if ($value !== null) {
            return $value;
        }

        if (isset($this->attributes['post_type']) && $this->attributes['post_type'] !== '' && $this->attributes['post_type'] !== '0') {
            // Assicuriamoci che i valori siano stringhe prima della concatenazione
            $postType = isset($this->attributes['post_type']) && is_string($this->attributes['post_type'])
                ? $this->attributes['post_type']
                : '';
            $postId = isset($this->attributes['post_id']) && is_scalar($this->attributes['post_id'])
                ? ((string) $this->attributes['post_id'])
                : '';
            $value = $postType.' '.$postId;
        } else {
            // Assicuriamoci che post_type e post_id siano stringhe
            $postType = is_string($this->post_type) ? $this->post_type : '';
            $postId = is_scalar($this->post_id) ? ((string) $this->post_id) : '';
            $value = $postType.' '.$postId;
        }

        $this->title = $value;

        if ($this->getKey() !== null) {
            $this->update([
                'title' => $value,
            ]);
        }

        return $value;
    }

    public function getGuidAttribute(?string $value): ?string
    {
        if (\is_string($value) && $value !== '' && ! str_contains($value, ' ')) {
            return $value;
        }
        $value = $this->title;
        if ($value === '') {
            // Assicuriamoci che i valori siano stringhe prima della concatenazione
            $postType = isset($this->attributes['post_type']) && is_string($this->attributes['post_type'])
                ? $this->attributes['post_type']
                : '';
            $postId = isset($this->attributes['post_id']) && is_scalar($this->attributes['post_id'])
                ? ((string) $this->attributes['post_id'])
                : '';
            $value = $postType.' '.$postId;
        }
        if ($value === null) {
            $value = 'u-'.random_int(1, 1000);
        }
        $value = Str::slug($value);
        $this->guid = $value;

        if ($this->getKey() !== null) {
            $this->update([
                'guid' => $value,
            ]);
        }

        return $value;
    }

    public function getTxtAttribute(?string $value): ?string
    {
        return $value ?? '';
    }

    /**
     * @return array<string, mixed>
     */
    public function toSearchableArray(): array
    {
        return $this->only(self::SEARCHABLE_FIELDS);
    }
}
