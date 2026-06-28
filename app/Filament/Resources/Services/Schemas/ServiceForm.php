<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Group::make([
                Section::make('Konten Layanan')->icon('heroicon-o-puzzle-piece')->schema([
                    RichEditor::make('description')
                        ->required()
                        ->columnSpanFull(),
                    Builder::make('content')
                        ->blocks([
                            Block::make('hero_section')
                                ->label('Hero Section')
                                ->schema([
                                    // ── Pilihan Style ──────────────────────────────────────
                                    Select::make('style')
                                        ->label('Pilih Style Hero')
                                        ->options([
                                            'guide' =>
                                            'Style – (full-width split)',
                                            'rental' =>
                                            'Style – (slider specs)',
                                            'carwash' => 'Style – (centered)',
                                        ])
                                        ->required()
                                        ->live()
                                        ->searchable()
                                        ->columnSpanFull(),

                                    // ══════════════════════════════════════════════════════
                                    // STYLE — (split layout)
                                    // ══════════════════════════════════════════════════════
                                    TextInput::make('guide_eyebrow')
                                        ->label('Label Kecil (atas judul)')
                                        ->hidden(
                                            fn(Get $get) => $get('style') !==
                                                'guide',
                                        ),

                                    TextInput::make('guide_title_line1')
                                        ->label('Judul Baris 1')
                                        ->hidden(
                                            fn(Get $get) => $get('style') !==
                                                'guide',
                                        ),

                                    TextInput::make('guide_title_line2')
                                        ->label('Judul Baris 2 (warna accent)')
                                        ->hidden(
                                            fn(Get $get) => $get('style') !==
                                                'guide',
                                        ),

                                    TextInput::make('guide_title_line3')
                                        ->label('Judul Baris 3')
                                        ->hidden(
                                            fn(Get $get) => $get('style') !==
                                                'guide',
                                        ),

                                    Textarea::make('guide_desc')
                                        ->label('Deskripsi')
                                        ->rows(3)
                                        ->columnSpanFull()
                                        ->hidden(
                                            fn(Get $get) => $get('style') !==
                                                'guide',
                                        ),

                                    TextInput::make('guide_btn_wa')
                                        ->label('Label Tombol WhatsApp')
                                        ->hidden(
                                            fn(Get $get) => $get('style') !==
                                                'guide',
                                        ),

                                    TextInput::make('guide_btn_wa_number')
                                        ->label('Nomor WhatsApp')
                                        ->hidden(
                                            fn(Get $get) => $get('style') !==
                                                'guide',
                                        ),

                                    TextInput::make('guide_btn_secondary_label')
                                        ->label('Label Tombol Sekunder')
                                        ->hidden(
                                            fn(Get $get) => $get('style') !==
                                                'guide',
                                        ),

                                    TextInput::make('guide_btn_secondary_url')
                                        ->label('URL Tombol Sekunder')
                                        ->hidden(
                                            fn(Get $get) => $get('style') !==
                                                'guide',
                                        ),

                                    Repeater::make('guide_stats')
                                        ->label('Statistik (angka bawah hero)')
                                        ->schema([
                                            TextInput::make('value')->label(
                                                'Nilai',
                                            ),
                                            TextInput::make('label')->label(
                                                'Label',
                                            ),
                                        ])
                                        ->columns(2)
                                        ->maxItems(5)
                                        ->addActionLabel('+ Tambah Statistik')
                                        ->columnSpanFull()
                                        ->hidden(
                                            fn(Get $get) => $get('style') !==
                                                'guide',
                                        ),

                                    FileUpload::make('guide_bg_image')
                                        ->label('Background Image')
                                        ->image()
                                        ->directory('hero/guide')
                                        ->columnSpanFull()
                                        ->hidden(
                                            fn(Get $get) => $get('style') !==
                                                'guide',
                                        ),

                                    // ══════════════════════════════════════════════════════
                                    // STYLE — (slider + specs)
                                    // ══════════════════════════════════════════════════════
                                    TextInput::make('rental_eyebrow')
                                        ->label('Label Kecil')
                                        ->hidden(
                                            fn(Get $get) => $get('style') !==
                                                'rental',
                                        ),

                                    Repeater::make('rental_items')
                                        ->label('Daftar Produk')
                                        ->schema([
                                            TextInput::make('name')
                                                ->label('Nama Produk')
                                                ->required(),

                                            TextInput::make('type')->label(
                                                'Tipe',
                                            ),

                                            Textarea::make('desc')
                                                ->label('Deskripsi')
                                                ->rows(2),

                                            TextInput::make('spec1_label')
                                                ->label('Spec 1 Label')
                                                ->placeholder('Kapasitas'),
                                            TextInput::make('spec1_value')
                                                ->label('Spec 1 Value')
                                                ->placeholder('7'),
                                            TextInput::make('spec1_suffix')
                                                ->label('Spec 1 Suffix')
                                                ->placeholder('org'),

                                            TextInput::make('spec2_label')
                                                ->label('Spec 2 Label')
                                                ->placeholder('Harga'),
                                            TextInput::make('spec2_value')
                                                ->label('Spec 2 Value')
                                                ->placeholder('350'),
                                            TextInput::make('spec2_suffix')
                                                ->label('Spec 2 Suffix')
                                                ->placeholder('rb/hari'),

                                            TextInput::make('spec3_label')
                                                ->label('Spec 3 Label')
                                                ->placeholder('Tahun'),
                                            TextInput::make('spec3_value')
                                                ->label('Spec 3 Value')
                                                ->placeholder('2023'),
                                            TextInput::make('spec3_suffix')
                                                ->label('Spec 3 Suffix')
                                                ->placeholder(''),

                                            FileUpload::make('img')
                                                ->label('Foto Produk')
                                                ->image()
                                                ->directory(
                                                    'hero/rental-items',
                                                ),
                                        ])
                                        ->columns(2)
                                        ->addActionLabel('+ Tambah Produk')
                                        ->columnSpanFull()
                                        ->hidden(
                                            fn(Get $get) => $get('style') !==
                                                'rental',
                                        ),

                                    TextInput::make('rental_btn_book')
                                        ->label('Label Tombol Pertama')
                                        ->hidden(
                                            fn(Get $get) => $get('style') !==
                                                'rental',
                                        ),
                                    TextInput::make('rental_btn_book_url')
                                        ->label('URL Tombol Pertama')
                                        ->hidden(
                                            fn(Get $get) => $get('style') !==
                                                'rental',
                                        ),
                                    TextInput::make('rental_btn_detail')
                                        ->label('Label Tombol Kedua')
                                        ->hidden(
                                            fn(Get $get) => $get('style') !==
                                                'rental',
                                        ),
                                    TextInput::make('rental_btn_detail_url')
                                        ->label('URL Tombol Kedua')
                                        ->hidden(
                                            fn(Get $get) => $get('style') !==
                                                'rental',
                                        ),

                                    // ══════════════════════════════════════════════════════
                                    // STYLE — Center
                                    // ══════════════════════════════════════════════════════
                                    TextInput::make('carwash_eyebrow')
                                        ->label('Label Kecil')
                                        ->hidden(
                                            fn(Get $get) => $get('style') !==
                                                'carwash',
                                        ),

                                    TextInput::make('carwash_title_line1')
                                        ->label('Judul Baris 1')
                                        ->hidden(
                                            fn(Get $get) => $get('style') !==
                                                'carwash',
                                        ),

                                    TextInput::make('carwash_title_line2')
                                        ->label('Judul Baris 2 (warna accent)')
                                        ->hidden(
                                            fn(Get $get) => $get('style') !==
                                                'carwash',
                                        ),

                                    TextInput::make('carwash_title_line3')
                                        ->label('Judul Baris 3')
                                        ->hidden(
                                            fn(Get $get) => $get('style') !==
                                                'carwash',
                                        ),

                                    Textarea::make('carwash_desc')
                                        ->label('Deskripsi')
                                        ->rows(3)
                                        ->columnSpanFull()
                                        ->hidden(
                                            fn(Get $get) => $get('style') !==
                                                'carwash',
                                        ),

                                    TextInput::make('carwash_btn_wa')
                                        ->label('Label Tombol WhatsApp')
                                        ->hidden(
                                            fn(Get $get) => $get('style') !==
                                                'carwash',
                                        ),

                                    TextInput::make('carwash_btn_wa_number')
                                        ->label('Nomor WhatsApp')
                                        ->hidden(
                                            fn(Get $get) => $get('style') !==
                                                'carwash',
                                        ),

                                    TextInput::make(
                                        'carwash_btn_secondary_label',
                                    )
                                        ->label('Label Tombol Sekunder')
                                        ->hidden(
                                            fn(Get $get) => $get('style') !==
                                                'carwash',
                                        ),

                                    TextInput::make('carwash_btn_secondary_url')
                                        ->label('URL Tombol Sekunder')
                                        ->hidden(
                                            fn(Get $get) => $get('style') !==
                                                'carwash',
                                        ),

                                    Repeater::make('carwash_stats')
                                        ->label('Statistik')
                                        ->schema([
                                            TextInput::make('value')->label(
                                                'Nilai',
                                            ),
                                            TextInput::make('label')->label(
                                                'Label',
                                            ),
                                        ])
                                        ->columns(2)
                                        ->maxItems(5)
                                        ->addActionLabel('+ Tambah Statistik')
                                        ->columnSpanFull()
                                        ->hidden(
                                            fn(Get $get) => $get('style') !==
                                                'carwash',
                                        ),

                                    FileUpload::make('carwash_bg_image')
                                        ->label('Background Image')
                                        ->image()
                                        ->directory('hero/carwash')
                                        ->columnSpanFull()
                                        ->hidden(
                                            fn(Get $get) => $get('style') !==
                                                'carwash',
                                        ),
                                ])
                                ->columns(2),
                            Block::make('service_card')
                                ->label('Paket Layanan')
                                ->schema([
                                    // ── Header section ─────────────────────────────────
                                    TextInput::make('eyebrow')->label(
                                        'Label Kecil',
                                    ),

                                    TextInput::make('title')->label(
                                        'Judul (kata biasa)',
                                    ),

                                    TextInput::make('title_accent')->label(
                                        'Judul (kata accent/warna)',
                                    ),

                                    TextInput::make('title_end')->label(
                                        'Judul (kata akhir)',
                                    ),

                                    RichEditor::make('description')
                                        ->toolbarButtons(['bold', 'italic'])
                                        ->label('Deskripsi')
                                        ->required()
                                        ->columnSpanFull(),

                                    // ── Cards ───────────────────────────────────────────
                                    Repeater::make('cards')
                                        ->label('Kartu Layanan')
                                        ->schema([
                                            Select::make('icon')
                                                ->label('Icon (Lucide)')
                                                ->options([
                                                    'sun' => 'Sun',
                                                    'map' => 'Map',
                                                    'calendar' => 'Calendar',
                                                    'star' => 'Star',
                                                    'zap' => 'Zap',
                                                    'shield' => 'Shield',
                                                    'award' => 'Award',
                                                    'truck' => 'Truck',
                                                    'clock' => 'Clock',
                                                    'users' => 'Users',
                                                    'camera' => 'Camera',
                                                    'heart' => 'Heart',
                                                    'droplet' => 'Droplet',
                                                    'wrench' => 'Wrench',
                                                    'package' => 'Package',
                                                    'briefcase' => 'Briefcase',
                                                    'message-circle' =>
                                                    'Message Circle',
                                                ])
                                                ->required()
                                                ->searchable(),

                                            TextInput::make('name')
                                                ->label('Nama Paket')
                                                ->required(),

                                            TextInput::make('price')
                                                ->label(
                                                    'Harga (contoh: Rp 300rb)',
                                                )
                                                ->required(),

                                            TextInput::make('unit')->label(
                                                'Satuan (contoh: / sesi, / hari)',
                                            ),

                                            RichEditor::make('desc')
                                                ->toolbarButtons([
                                                    'bold',
                                                    'italic',
                                                ])
                                                ->label('Deskripsi')
                                                ->required()
                                                ->columnSpanFull(),

                                            Repeater::make('features')
                                                ->label('Fitur yang Termasuk')
                                                ->schema([
                                                    TextInput::make('item')
                                                        ->label('Fitur')
                                                        ->required(),
                                                ])
                                                ->addActionLabel(
                                                    '+ Tambah Fitur',
                                                )
                                                ->columnSpanFull(),

                                            TextInput::make('wa_number')->label(
                                                'Nomor WhatsApp (tanpa +)',
                                            ),

                                            TextInput::make('wa_message')
                                                ->label(
                                                    'Nama Paket di Pesan WA',
                                                )
                                                ->helperText(
                                                    'Contoh: Half Day → "Halo, saya ingin pesan paket Half Day Tour Guide"',
                                                ),

                                            Toggle::make('featured')
                                                ->label(
                                                    'Featured (border highlight)',
                                                )
                                                ->default(false)
                                                ->inline(false),
                                        ])
                                        ->columns(2)
                                        ->addActionLabel('+ Tambah Kartu')
                                        ->columnSpanFull(),
                                ])
                                ->columns(2),
                            Block::make('why_us')
                                ->label('Tentang')
                                ->schema([
                                    TextInput::make('label')
                                        ->label('Label Kecil')
                                        ->required(),

                                    TextInput::make('title')
                                        ->label('Judul')
                                        ->required(),

                                    TextInput::make('highlight')
                                        ->label('Highlight (warna berbeda)')
                                        ->required(),

                                    RichEditor::make('description')
                                        ->toolbarButtons(['bold', 'italic'])
                                        ->label('Deskripsi')
                                        ->required()
                                        ->columnSpanFull(),

                                    FileUpload::make('image')
                                        ->label('Gambar')
                                        ->image()
                                        ->directory('pages/why-us')
                                        ->imageEditor()
                                        ->columnSpanFull(),

                                    Repeater::make('features')
                                        ->label('Daftar Keunggulan')
                                        ->schema([
                                            Select::make('icon')
                                                ->label('Icon')
                                                ->options([
                                                    'shield-check' =>
                                                    'Shield Check',
                                                    'languages' => 'Languages',
                                                    'clock' => 'Clock',
                                                    'star' => 'Star',
                                                ])
                                                ->required()
                                                ->searchable(),

                                            TextInput::make('title')
                                                ->label('Judul')
                                                ->required(),

                                            RichEditor::make('description')
                                                ->toolbarButtons([
                                                    'bold',
                                                    'italic',
                                                ])
                                                ->label('Deskripsi')
                                                ->required()
                                                ->columnSpanFull(),
                                        ])
                                        ->minItems(1)
                                        ->grid(1)
                                        ->columnSpanFull(),
                                ])
                                ->columns(2),
                            Block::make('gallery')->schema([
                                TextInput::make('label')
                                    ->label('Label')
                                    ->required(),
                                TextInput::make('title')
                                    ->label('Judul')
                                    ->required(),
                                RichEditor::make('description')
                                    ->toolbarButtons(['bold', 'italic'])
                                    ->label('Deskripsi')
                                    ->required()
                                    ->columnSpanFull(),
                                Repeater::make('images')
                                    ->label('Daftar Partner')
                                    ->schema([
                                        FileUpload::make('image')
                                            ->label('Gambar (kiri)')
                                            ->image()
                                            ->imageEditor()
                                            ->directory('pages/gallery')
                                            ->columnSpanFull(),
                                        TextInput::make('title')
                                            ->label('Judul')
                                            ->required(),
                                        TextInput::make('label')
                                            ->label('Label')
                                            ->required(),
                                    ])
                                    ->minItems(1)
                                    ->grid(2)
                                    ->columnSpanFull(),
                            ]),
                            Block::make('testimonials_grid')
                                ->label('Testimoni Grid')
                                ->schema([
                                    TextInput::make('label')->label(
                                        'Label Kecil',
                                    ),

                                    TextInput::make('title')->label('Judul'),

                                    TextInput::make('highlight')->label(
                                        'Highlight',
                                    ),

                                    RichEditor::make('description')
                                        ->toolbarButtons(['bold', 'italic'])
                                        ->label('Deskripsi')
                                        ->required()
                                        ->columnSpanFull(),

                                    Repeater::make('testimonials')
                                        ->label('Daftar Testimoni')
                                        ->schema([
                                            FileUpload::make('avatar')
                                                ->label('Foto')
                                                ->image()
                                                ->directory(
                                                    'pages/testimonials',
                                                )
                                                ->imageEditor(),

                                            TextInput::make('name')
                                                ->label('Nama')
                                                ->required(),

                                            TextInput::make('role')
                                                ->label('Role / Keterangan')
                                                ->placeholder(
                                                    'Contoh: Wisatawan Domestik',
                                                ),

                                            RichEditor::make('message')
                                                ->toolbarButtons([
                                                    'bold',
                                                    'italic',
                                                ])
                                                ->label('Testimoni')
                                                ->required()
                                                ->columnSpanFull(),
                                            Select::make('rating')
                                                ->label('Rating')
                                                ->options([
                                                    1 => '1',
                                                    2 => '2',
                                                    3 => '3',
                                                    4 => '4',
                                                    5 => '5',
                                                ])
                                                ->required(),
                                        ])
                                        ->minItems(1)
                                        ->grid(2)
                                        ->columnSpanFull(),
                                ])
                                ->columns(2),
                            Block::make('packages')
                                ->label('Katalog Paket')
                                ->schema([
                                    // ── Eyebrow & Heading ───────────────────────────────────────────────
                                    TextInput::make('eyebrow')
                                        ->label('Label Kecil (Eyebrow)')
                                        ->placeholder('Paket Layanan')
                                        ->helperText(
                                            'Teks kecil di atas judul utama.',
                                        ),

                                    TextInput::make('title')
                                        ->label('Judul Section')
                                        ->placeholder('Pilih Paket yang Tepat')
                                        ->required(),

                                    TextInput::make('title_highlight')
                                        ->label('Kata Highlight di Judul')
                                        ->placeholder('Paket')
                                        ->helperText(
                                            'Kata ini akan diberi warna aksen brand.',
                                        ),

                                    RichEditor::make('description')
                                        ->toolbarButtons(['bold', 'italic'])
                                        ->label('Deskripsi')
                                        ->placeholder(
                                            'Berbagai paket tersedia untuk menyesuaikan kebutuhan Anda.',
                                        )
                                        ->required()
                                        ->columnSpanFull(),
                                    // ── Sumber Data ─────────────────────────────────────────────────────
                                    Select::make('service')
                                        ->label('Filter Service')
                                        ->options(
                                            fn() => \App\Models\Service::pluck(
                                                'name',
                                                'id',
                                            )->prepend('Semua Service', 'all'),
                                        )
                                        ->default('all')
                                        ->live()
                                        ->searchable()
                                        ->helperText(
                                            'Tampilkan paket dari service tertentu, atau semua service.',
                                        ),

                                    Select::make('per_page')
                                        ->label('Paket per Halaman')
                                        ->options([
                                            3 => '3',
                                            6 => '6',
                                            9 => '9',
                                            12 => '12',
                                        ])
                                        ->default(9)
                                        ->required(),

                                    // ── Fitur UI ─────────────────────────────────────────────────────────
                                    Toggle::make('show_search')
                                        ->label('Tampilkan Kotak Pencarian')
                                        ->default(true)
                                        ->inline(false),

                                    Toggle::make('show_category_filter')
                                        ->label('Tampilkan Filter Kategori')
                                        ->default(true)
                                        ->inline(false),

                                    Toggle::make('show_pagination')
                                        ->label('Tampilkan Pagination')
                                        ->default(true)
                                        ->inline(false),

                                    // ── CTA / WhatsApp ───────────────────────────────────────────────────
                                    TextInput::make('whatsapp_number')
                                        ->label('Nomor WhatsApp (tanpa +)')
                                        ->placeholder('628987654321')
                                        ->helperText(
                                            'Nomor tujuan ketika tombol "Pesan Sekarang" diklik.',
                                        )
                                        ->columnSpanFull(),

                                    TextInput::make('see_all_url')
                                        ->label(
                                            'URL "Lihat Semua" (kosongkan jika tidak perlu)',
                                        )
                                        ->placeholder('/paket')
                                        ->columnSpanFull(),
                                ])
                                ->columns(2),
                        ])
                        ->collapsed()
                        ->reorderableWithButtons(),
                ])->columnSpan(2),
                Group::make([
                    Section::make('Informasi Layanan')->icon('heroicon-o-document-text')->schema([
                        TextInput::make('name')->required(),
                        ColorPicker::make('code_color'),
                        FileUpload::make('image')
                            ->image()
                            ->directory('/services')
                            ->required(),
                    ]),
                ]),
            ])
                ->columns(3)
                ->columnSpanFull(),
        ]);
    }
}
