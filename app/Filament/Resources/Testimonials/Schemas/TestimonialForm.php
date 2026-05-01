<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Group::make()
                ->schema([
                    Section::make('Informasi Testimoni')
                        ->icon('heroicon-o-chat-bubble-left-right')
                        ->schema([
                            Grid::make(2)->schema([
                                TextInput::make('client')
                                    ->label('Klien')
                                    ->required()
                                    ->maxLength(100),

                                Radio::make('rating')
                                    ->label('Rating')
                                    ->options([
                                        '1' => '1',
                                        '2' => '2',
                                        '3' => '3',
                                        '4' => '4',
                                        '5' => '5',
                                    ])
                                    ->required()
                                    ->inline(),
                            ]),

                            Textarea::make('comment')
                                ->label('Pesan')
                                ->required()
                                ->rows(4)
                                ->maxLength(255),
                        ])
                        ->columnSpan(2),

                    Section::make('Media & Status')
                        ->icon('heroicon-o-photo')
                        ->schema([
                            FileUpload::make('image')
                                ->label('Foto')
                                ->image()
                                ->directory('testimonials')
                                ->imageEditor()
                                ->maxSize(2048)
                                ->nullable(),

                            Select::make('status')
                                ->label('Status')
                                ->options([
                                    'publikasi' => 'Publikasi',
                                    'draf' => 'Draf',
                                    'arsip' => 'Arsip',
                                ])
                                ->required()
                                ->native(false),
                        ]),
                ])
                ->columns(3)
                ->columnSpanFull(),
        ]);
    }
}
