<?php

use App\Models\AppSetting;
use App\Models\Page;
use App\Models\PageNavigation;

if (!function_exists('setting')) {
    function setting(string $key, $default = null)
    {
        return AppSetting::getValue($key, $default);
    }
}
