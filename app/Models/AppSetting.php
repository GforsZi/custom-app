<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

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
 * @mixin \Eloquent
 */
class AppSetting extends Model
{
    protected $guarded = [];

    public static function get(): Collection
    {
        return self::all();
    }

    public static function getValue(string $key, $default = null)
    {
        $row = self::where('key', $key)->first();
        return $row ? $row->value : $default;
    }

    public static function set(string $key, $value): void
    {
        self::query()->updateOrCreate(['key' => $key], ['value' => is_array($value) ? json_encode($value) : $value]);
    }
}
