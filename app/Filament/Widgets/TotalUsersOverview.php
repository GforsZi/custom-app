<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Support\Colors\Color;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TotalUsersOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make("Total User", User::count())
                ->icon("heroicon-m-user-group")
                ->color(Color::Amber)
        ];
    }
}
