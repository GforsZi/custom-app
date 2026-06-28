<?php

namespace App\Filament\Resources\PageNavigations\Schemas;

use App\Models\Page;
use App\Models\PageNavigation;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Hidden;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;

class PageNavigationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Group::make()
                ->schema([
                    Section::make('Informasi Navigasi')
                        ->icon('heroicon-o-bars-3')
                        ->schema([
                            Grid::make(2)->schema([
                                TextInput::make('label')
                                    ->label('Label Navigasi')
                                    ->required()
                                    ->maxLength(100),

                                Select::make('type')
                                    ->label('Tipe Navigasi')
                                    ->options([
                                        'link' => 'Link',
                                        'dropdown' => 'Dropdown',
                                    ])
                                    ->default('link')
                                    ->live()
                                    ->native(false)
                                    ->afterStateUpdated(
                                        fn(Set $set) => $set('data', []),
                                    ),
                            ]),
                        ]),

                    Section::make('Konfigurasi Link')
                        ->icon('heroicon-o-link')
                        ->schema([
                            Radio::make('data.source')
                                ->label('Sumber')
                                ->options([
                                    'page' => 'Halaman Internal',
                                    'custom' => 'URL Kustom',
                                ])
                                ->default('page')
                                ->inline()
                                ->live(),

                            Select::make('data.page_id')
                                ->label('Halaman')
                                ->options(Page::query()->pluck('title', 'id'))
                                ->searchable()
                                ->preload()
                                ->native(false)
                                ->visible(
                                    fn(Get $get) => $get('type') === 'link' &&
                                        $get('data.source') === 'page',
                                )
                                ->required(
                                    fn(Get $get) => $get('type') === 'link' &&
                                        $get('data.source') === 'page',
                                ),


                            TextInput::make('data.url')
                                ->label('URL Kustom')
                                ->visible(fn(Get $get) => $get('type') === 'link' && $get('data.source') === 'custom')
                                ->required(fn(Get $get) => $get('type') === 'link' && $get('data.source') === 'custom'),
                        ])
                        ->visible(fn(Get $get) => $get('type') === 'link'),

                    Section::make('Item Dropdown')
                        ->icon('heroicon-o-chevron-down')
                        ->schema([
                            Repeater::make('data.items')
                                ->label('Daftar Item')
                                ->schema([
                                    Grid::make(2)->schema([
                                        TextInput::make('label')
                                            ->label('Label')
                                            ->required()
                                            ->maxLength(100),

                                        TextInput::make('url')
                                            ->label('URL')
                                            ->required(),
                                    ]),
                                ])
                                ->columns(1)
                                ->reorderable()
                                ->collapsible()
                                ->addActionLabel('Tambah Item')
                                ->minItems(1)
                                ->required(),
                        ])
                        ->visible(fn(Get $get) => $get('type') === 'dropdown'),
                ])
                ->columns(1)
                ->columnSpanFull(),
        ]);
    }
}
