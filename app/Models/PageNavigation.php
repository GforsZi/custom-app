<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
