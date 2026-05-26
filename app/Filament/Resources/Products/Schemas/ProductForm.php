<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('price')
                    ->required(),
                Select::make('condition')
                    ->options(['tersedia' => 'Tersedia', 'terjual' => 'Terjual', 'tidak_tersedia' => 'Tidak tersedia'])
                    ->required(),
                Select::make('status')
                    ->options(['publikasi' => 'Publikasi', 'draf' => 'Draf', 'arsip' => 'Arsip'])
                    ->required(),
                Textarea::make('more_information')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
