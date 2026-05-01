<?php

namespace App\Filament\Resources\PageNavigations\Pages;

use App\Filament\Resources\PageNavigations\PageNavigationResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPageNavigation extends EditRecord
{
    protected static string $resource = PageNavigationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
