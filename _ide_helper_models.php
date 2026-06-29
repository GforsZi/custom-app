<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property string $type
 * @property string $key
 * @property string $title
 * @property string|null $value
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppSetting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppSetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppSetting whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppSetting whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppSetting whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppSetting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppSetting whereValue($value)
 */
	class AppSetting extends \Eloquent {}
}

namespace App\Models{
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
 */
	class ArticleCategory extends \Eloquent {}
}

namespace App\Models{
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
 */
	class ArticleCategoryNewsArticle extends \Eloquent {}
}

namespace App\Models{
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
 */
	class NewsArticle extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $slug
 * @property string $title
 * @property array<array-key, mixed>|null $content
 * @property array<array-key, mixed>|null $meta_seo
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page whereMetaSeo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page whereUpdatedAt($value)
 */
	class Page extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $label
 * @property int|null $position
 * @property string $type
 * @property array<array-key, mixed>|null $data
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @property-read array $dropdown_items
 * @property-read string|null $resolved_url
 * @property-read \App\Models\Page|null $page_navigation
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PageNavigation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PageNavigation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PageNavigation query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PageNavigation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PageNavigation whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PageNavigation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PageNavigation whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PageNavigation wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PageNavigation whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PageNavigation whereUpdatedAt($value)
 */
	class PageNavigation extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property string $price
 * @property int $service_id
 * @property string $condition
 * @property string $status
 * @property array<array-key, mixed>|null $more_information
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @property \Carbon\CarbonImmutable|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductCategory> $categories
 * @property-read int|null $categories_count
 * @property-read array $more_information_items
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductImage> $images
 * @property-read int|null $images_count
 * @property-read \App\Models\Service|null $service
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereCondition($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereMoreInformation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product withoutTrashed()
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $slug
 * @property string $name
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @property \Carbon\CarbonImmutable|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategory withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategory withoutTrashed()
 */
	class ProductCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $product_id
 * @property int $product_category_id
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategoryProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategoryProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategoryProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategoryProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategoryProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategoryProduct whereProductCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategoryProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductCategoryProduct whereUpdatedAt($value)
 */
	class ProductCategoryProduct extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $image
 * @property int $product_id
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @property \Carbon\CarbonImmutable|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductImage withoutTrashed()
 */
	class ProductImage extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $image
 * @property string|null $code_color
 * @property string $description
 * @property array<array-key, mixed>|null $content
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @property \Carbon\CarbonImmutable|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service whereCodeColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service withoutTrashed()
 */
	class Service extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $client
 * @property string $comment
 * @property string|null $image
 * @property string $rating
 * @property string $status
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial whereClient($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Testimonial whereUpdatedAt($value)
 */
	class Testimonial extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Carbon\CarbonImmutable|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Carbon\CarbonImmutable|null $deleted_at
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $teams
 * @property-read int|null $teams_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User permission($permissions, bool $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User role($roles, ?string $guard = null, bool $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User team($teams, bool $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutRole($roles, ?string $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutTeam($teams)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutTrashed()
 */
	class User extends \Eloquent implements \Filament\Models\Contracts\FilamentUser {}
}

