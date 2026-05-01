<?php

namespace App\Filament\Resources\NewsArticles\Schemas;

use App\Models\ArticleCategory;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Flex;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class NewsArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Group::make()
                ->schema([
                    Section::make('Konten Artikel')
                        ->icon('heroicon-o-document-text')
                        ->schema([
                            TextInput::make('title')
                                ->label('Judul')
                                ->required()
                                ->live(onBlur: true)
                                ->maxLength(200)
                                ->afterStateUpdated(
                                    fn(Set $set, ?string $state) => $set(
                                        'slug',
                                        Str::slug($state),
                                    ),
                                ),

                            Select::make('categories')
                                ->label('Kategori')
                                ->relationship('categories', 'name')
                                ->multiple()
                                ->preload()
                                ->searchable()
                                ->native(false)
                                ->required()
                                ->createOptionForm([
                                    Grid::make(2)->schema([
                                        TextInput::make('name')
                                            ->label('Nama')
                                            ->required()
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(
                                                fn(
                                                    Set $set,
                                                    ?string $state,
                                                ) => $set(
                                                    'slug',
                                                    Str::slug($state),
                                                ),
                                            ),

                                        TextInput::make('slug')
                                            ->label('Slug')
                                            ->readOnly()
                                            ->required(),
                                    ]),
                                ]),

                            RichEditor::make('content')
                                ->label('Konten')
                                ->required()
                                ->fileAttachmentsDirectory(
                                    'articles/attachments',
                                )
                                ->columnSpanFull(),
                        ])
                        ->columnSpan(2),

                    Section::make('Pengaturan Publikasi')
                        ->icon('heroicon-o-cog-6-tooth')
                        ->schema([
                            FileUpload::make('image_thumbnail')
                                ->label('Thumbnail')
                                ->image()
                                ->imageEditor()
                                ->directory('articles/thumbnail')
                                ->imageEditorAspectRatioOptions([
                                    '16:9',
                                    '4:3',
                                    '1:1',
                                ])
                                ->maxSize(2048)
                                ->nullable(),

                            TextInput::make('slug')
                                ->label('Slug')
                                ->required()
                                ->readOnly()
                                ->unique(ignoreRecord: true),

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
