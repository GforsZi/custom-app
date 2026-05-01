<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleCategory extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function newsArticles()
    {
        return $this->belongsToMany(NewsArticle::class, 'article_category_news_article', 'article_category_id', 'news_article_id');
    }
}
