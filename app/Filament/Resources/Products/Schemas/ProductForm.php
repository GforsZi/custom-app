<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Models\ProductCategory;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {

        return $schema->components([
            Group::make([
                Section::make([
                    TextInput::make('title')->label('Judul')->required()->live(onBlur: true)->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
                    TextInput::make('price')->label('Harga')->numeric()->minValue(0)->required(),
                    Select::make('categories')
                        ->relationship('categories', 'name')
                        ->label('Kategori')
                        ->preload()
                        ->multiple()
                        ->options(ProductCategory::query()->pluck('name', 'id'))
                        ->createOptionForm([
                            TextInput::make('name')->required()->live(onBlur: true)->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
                            TextInput::make('slug')->readOnly()->required(),
                        ]),
                    Select::make('service_id')
                        ->label('Service')
                        ->relationship('service', 'name')
                        ->preload()
                        ->searchable()
                        ->required()
                        ->live()
                        ->afterStateUpdated(fn(Set $set) => $set('contents', ['items' => []]))
                        ->createOptionForm([
                            TextInput::make('name')->required(),
                            FileUpload::make('image')->image()->directory('services')->required(),
                            \Filament\Forms\Components\ColorPicker::make('code_color'),
                            RichEditor::make('description')->required()->columnSpanFull(),
                        ]),
                    RichEditor::make('description')->fileAttachmentsDirectory('product/attachments')->required(),
                    Section::make('Informasi Tambahan')
                        ->description(
                            fn(Get $get) => $get('service_id')
                                ? 'Tambahkan poin-poin yang mendeskripsikan paket ini untuk service yang dipilih.'
                                : 'Pilih service terlebih dahulu untuk mengisi konten paket.',
                        )
                        ->schema([
                            Select::make('more_information.style')
                                ->label('Tipe Konten')
                                ->options([
                                    'none' => 'Kosongkan',
                                    'list' => 'List + Icon',
                                    'paragraph' => 'Paragraf ',
                                    'mixed' => 'Paragraf + List',
                                ])
                                ->default('none')
                                ->required()
                                ->searchable()
                                ->live()
                                ->afterStateUpdated(function (Set $set, $state) {
                                    if ($state === 'none') {
                                        $set('more_information.paragraph', null);
                                        $set('more_information.items', []);
                                    }
                                    if ($state === 'paragraph') {
                                        $set('more_information.paragraph', 'Tulis deskripsi paket di sini...');
                                        $set('more_information.items', []);
                                    }

                                    if ($state === 'list') {
                                        $set('more_information.items', [['icon' => null, 'point' => 'Contoh poin pertama']]);
                                        $set('more_information.paragraph', null);
                                    }

                                    if ($state === 'mixed') {
                                        $set('more_information.paragraph', 'Deskripsi singkat paket...');
                                        $set('more_information.items', [['icon' => null, 'point' => 'Contoh poin pertama']]);
                                    }
                                })
                                ->columnSpanFull(),
                            RichEditor::make('more_information.paragraph')
                                ->toolbarButtons(['bold', 'italic'])
                                ->label('Paragraf')
                                ->hidden(fn(Get $get) => !in_array($get('more_information.style'), ['paragraph', 'mixed']))
                                ->columnSpanFull(),
                            Repeater::make('more_information.items')
                                ->label('Poin Konten')
                                ->schema([
                                    FileUpload::make('icon')
                                        ->label('Icon (SVG)')
                                        ->directory('packages/icons')
                                        ->acceptedFileTypes(['image/svg+xml'])
                                        ->maxSize(512)
                                        ->required()
                                        ->helperText('Upload file .svg, maks 512KB'),

                                    TextInput::make('point')->label('Isi Poin')->placeholder('Contoh: Toyota Avanza 2023')->required(),
                                ])
                                ->columns(2)
                                ->addActionLabel('+ Tambah Poin')
                                ->reorderable()
                                ->collapsible()
                                ->itemLabel(fn(array $state): ?string => $state['point'] ?? 'Poin Baru')
                                ->defaultItems(0)
                                ->disabled(fn(Get $get) => !$get('service_id'))
                                ->hidden(fn(Get $get) => $get('more_information.style') === 'paragraph'),
                        ])
                        ->afterStateHydrated(function (Set $set, $state) {
                            if (!$state) {
                                $set('more_information.style', 'list');
                                $set('more_information.items', [['icon' => null, 'point' => 'Contoh poin pertama']]);
                            }
                        }),
                ])->columnSpan(2),
                Section::make([
                    TextInput::make('slug')->required()->readOnly(),
                    Select::make('condition')
                        ->label('Kondisi')
                        ->options(['tersedia' => 'Tersedia', 'terjual' => 'Terjual', 'tidak_aktif' => 'Tidak aktif'])
                        ->searchable()
                        ->required(),
                    Select::make('status')
                        ->label('Status')
                        ->options(['publikasi' => 'Publikasi', 'draf' => 'Draf', 'arsip' => 'Arsip'])
                        ->searchable()
                        ->required(),
                    FileUpload::make('images_upload')
                        ->label('Galeri Jersey')
                        ->image()
                        ->multiple()
                        ->reorderable()
                        ->appendFiles()
                        ->directory('product/image')
                        ->columnSpanFull()
                        ->dehydrated(false)->afterStateHydrated(function ($component, $record) {
                            if (! $record) return;

                            $paths = $record->images->pluck('image')->toArray();
                            $component->state($paths);
                        }),
                ]),
            ])
                ->columns(3)
                ->columnSpanFull(),
        ]);
    }
}
