<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

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
