<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $slug
 * @property string $title
 * @property string $content
 * @property string|null $image_thumbnail
 * @property string $status
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @property \Carbon\CarbonImmutable|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ArticleCategory> $categories
 * @property-read int|null $categories_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NewsArticle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NewsArticle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NewsArticle onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NewsArticle query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NewsArticle whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NewsArticle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NewsArticle whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NewsArticle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NewsArticle whereImageThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NewsArticle whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NewsArticle whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NewsArticle whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NewsArticle whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NewsArticle withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NewsArticle withoutTrashed()
 * @mixin \Eloquent
 */
class NewsArticle extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany(ArticleCategory::class);
    }
}
