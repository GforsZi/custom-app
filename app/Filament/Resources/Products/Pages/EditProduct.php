<?php

namespace App\Filament\Resources\Products\Pages;

use App\Filament\Resources\Products\ProductResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
    protected function afterSave(): void
    {
        $this->syncImages();
    }
    protected function syncImages(): void
    {
        $newPaths = array_values($this->data['images_upload'] ?? []);

        $existingPaths = $this->record->images->pluck('image')->toArray();

        $toDelete = array_diff($existingPaths, $newPaths);
        $this->record->images()
            ->whereIn('image', $toDelete)
            ->delete();

        $toAdd = array_diff($newPaths, $existingPaths);
        foreach ($toAdd as $path) {
            $this->record->images()->create(['image' => $path]);
        }
    }
}
