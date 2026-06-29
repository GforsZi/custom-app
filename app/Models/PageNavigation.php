<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
 * @mixin \Eloquent
 */
class PageNavigation extends Model
{
    protected $guarded = [];

    protected $casts = [
        'data' => 'array',
    ];

    public function page_navigation(): BelongsTo
    {
        return $this->belongsTo(Page::class, 'page_id');
    }
    public function getResolvedUrlAttribute(): ?string
    {
        if ($this->type !== 'link') {
            return null;
        }

        $data = $this->data;
        if (($data['source'] ?? null) === 'page') {
            return optional(Page::find($data['page_id']))->slug;
        }

        return $data['url'] ?? null;
    }

    public function getDropdownItemsAttribute(): array
    {
        if ($this->type !== 'dropdown') {
            return [];
        }
        return $this->data['items'] ?? [];
    }
}
