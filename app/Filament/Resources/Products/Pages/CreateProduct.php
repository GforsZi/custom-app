<?php

namespace App\Filament\Resources\Products\Pages;

use App\Filament\Resources\Products\ProductResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;
    protected function afterCreate(): void
    {
        $this->syncImages();
    }
    protected function syncImages(): void
    {
        $files = $this->data['images_upload'] ?? [];

        foreach ($files as $path) {
            $this->record->images()->create(['image' => $path]);
        }
    }
}
