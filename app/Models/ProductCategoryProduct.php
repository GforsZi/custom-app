<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

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
 * @mixin \Eloquent
 */
class ProductCategoryProduct extends Pivot
{
    //
}
