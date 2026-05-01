<?php

namespace App\Filament\Resources\PageNavigations;

use App\Filament\Resources\PageNavigations\Pages\CreatePageNavigation;
use App\Filament\Resources\PageNavigations\Pages\EditPageNavigation;
use App\Filament\Resources\PageNavigations\Pages\ListPageNavigations;
use App\Filament\Resources\PageNavigations\Schemas\PageNavigationForm;
use App\Filament\Resources\PageNavigations\Tables\PageNavigationsTable;
use App\Models\PageNavigation;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PageNavigationResource extends Resource
{
    protected static ?string $model = PageNavigation::class;
    protected static ?string $navigationLabel = 'Navigasi Halaman';
    protected static string|UnitEnum|null $navigationGroup = 'Pengaturan Aplikasi';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if ($data['type'] === 'link' && ($data['data']['source'] ?? null) === 'page') {
            unset($data['data']['url']);
        } elseif ($data['type'] === 'link' && ($data['data']['source'] ?? null) === 'custom') {
            unset($data['data']['page_id']);
        }
        return $data;
    }

    public static function form(Schema $schema): Schema
    {
        return PageNavigationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PageNavigationsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPageNavigations::route('/'),
            'create' => CreatePageNavigation::route('/create'),
            'edit' => EditPageNavigation::route('/{record}/edit'),
        ];
    }
}
