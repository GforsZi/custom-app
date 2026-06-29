<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsCardOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make("", User::count())
                ->description("Total User")
                ->descriptionIcon("heroicon-m-user-group", IconPosition::Before)->color(Color::Amber)
        ];
    }
}
