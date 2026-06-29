<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * @property int $id
 * @property int $news_article_id
 * @property int $article_category_id
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArticleCategoryNewsArticle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArticleCategoryNewsArticle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArticleCategoryNewsArticle query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArticleCategoryNewsArticle whereArticleCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArticleCategoryNewsArticle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArticleCategoryNewsArticle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArticleCategoryNewsArticle whereNewsArticleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArticleCategoryNewsArticle whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ArticleCategoryNewsArticle extends Pivot
{
    //
}
