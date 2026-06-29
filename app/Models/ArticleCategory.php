<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $slug
 * @property string $name
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @property \Carbon\CarbonImmutable|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\NewsArticle> $newsArticles
 * @property-read int|null $news_articles_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArticleCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArticleCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArticleCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArticleCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArticleCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArticleCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArticleCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArticleCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArticleCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArticleCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArticleCategory withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArticleCategory withoutTrashed()
 * @mixin \Eloquent
 */
class ArticleCategory extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function newsArticles()
    {
        return $this->belongsToMany(NewsArticle::class, 'article_category_news_article', 'article_category_id', 'news_article_id');
    }
}
