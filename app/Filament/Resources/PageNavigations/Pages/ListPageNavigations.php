<?php

namespace App\Filament\Resources\PageNavigations\Pages;

use App\Filament\Resources\PageNavigations\PageNavigationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPageNavigations extends ListRecords
{
    protected static string $resource = PageNavigationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
