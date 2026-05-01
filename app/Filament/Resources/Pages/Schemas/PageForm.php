<?php

namespace App\Filament\Resources\Pages\Schemas;

use App\Models\Service;
use Filament\Actions\Action;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Group::make([
                Section::make('Konten Halaman')
                    ->description('Kelola blok konten utama halaman.')
                    ->icon('heroicon-o-document-text')
                    ->schema([
                        Builder::make('content')
                            ->label('Blok Konten')
                            ->blocks([
                                Block::make('hero')
                                    ->label('Hero')
                                    ->schema([
                                        Section::make('Slide Hero')->schema([
                                            Repeater::make('slides')
                                                ->label('Slides')
                                                ->schema([
                                                    Section::make(
                                                        'Konten Slide',
                                                    )
                                                        ->schema([
                                                            TextInput::make(
                                                                'eyebrow',
                                                            )
                                                                ->label(
                                                                    'Eyebrow Text',
                                                                )
                                                                ->required()
                                                                ->maxLength(
                                                                    120,
                                                                ),

                                                            FileUpload::make(
                                                                'bg_image',
                                                            )
                                                                ->label(
                                                                    'Background Image',
                                                                )
                                                                ->image()
                                                                ->directory(
                                                                    'pages/hero',
                                                                )
                                                                ->columnSpanFull(),

                                                            TextInput::make(
                                                                'heading_line1',
                                                            )
                                                                ->label(
                                                                    'Judul Baris 1',
                                                                )
                                                                ->required()
                                                                ->maxLength(
                                                                    120,
                                                                ),

                                                            TextInput::make(
                                                                'heading_line2',
                                                            )
                                                                ->label(
                                                                    'Judul Baris 2',
                                                                )
                                                                ->required()
                                                                ->maxLength(
                                                                    120,
                                                                ),

                                                            TextInput::make(
                                                                'heading_line3',
                                                            )
                                                                ->label(
                                                                    'Judul Baris 3',
                                                                )
                                                                ->required()
                                                                ->maxLength(
                                                                    120,
                                                                ),

                                                            RichEditor::make(
                                                                'description',
                                                            )
                                                                ->label(
                                                                    'Paragraf',
                                                                )
                                                                ->toolbarButtons(
                                                                    [
                                                                        'bold',
                                                                        'italic',
                                                                    ],
                                                                )
                                                                ->required()
                                                                ->columnSpanFull(),
                                                        ])
                                                        ->columns(2),

                                                    Section::make(
                                                        'Tombol Utama',
                                                    )->schema([
                                                        Grid::make(2)->schema([
                                                            TextInput::make(
                                                                'btn_primary_label',
                                                            )
                                                                ->label('Label')
                                                                ->maxLength(80),

                                                            TextInput::make(
                                                                'btn_primary_icon',
                                                            )
                                                                ->label(
                                                                    'Icon Lucide',
                                                                )
                                                                ->maxLength(60),

                                                            TextInput::make(
                                                                'btn_primary_route',
                                                            )
                                                                ->label(
                                                                    'Route / URL',
                                                                )
                                                                ->maxLength(
                                                                    255,
                                                                ),
                                                        ]),
                                                    ]),

                                                    Section::make(
                                                        'Tombol Sekunder',
                                                    )->schema([
                                                        Grid::make(2)->schema([
                                                            TextInput::make(
                                                                'btn_secondary_label',
                                                            )
                                                                ->label('Label')
                                                                ->maxLength(80),

                                                            TextInput::make(
                                                                'btn_secondary_icon',
                                                            )
                                                                ->label(
                                                                    'Icon Lucide',
                                                                )
                                                                ->maxLength(60),

                                                            TextInput::make(
                                                                'btn_secondary_route',
                                                            )
                                                                ->label(
                                                                    'Route / URL',
                                                                )
                                                                ->maxLength(
                                                                    255,
                                                                ),
                                                        ]),
                                                    ]),
                                                ])
                                                ->addActionLabel('Tambah Slide')
                                                ->minItems(1)
                                                ->maxItems(5)
                                                ->reorderable()
                                                ->collapsible()
                                                ->itemLabel(
                                                    fn(
                                                        array $state,
                                                    ): ?string => $state[
                                                        'heading_line1'
                                                    ] ?? 'Slide baru',
                                                )
                                                ->columnSpanFull()
                                                ->columns(1),
                                        ]),
                                    ]),

                                Block::make('contact_page')
                                    ->label('Halaman Kontak')
                                    ->schema([
                                        Section::make('Hero Kontak')->schema([
                                            Grid::make(2)->schema([
                                                TextInput::make('eyebrow')
                                                    ->label('Label Kecil')
                                                    ->default('Hubungi Kami')
                                                    ->maxLength(80),

                                                TextInput::make('title_line1')
                                                    ->label('Judul Baris 1')
                                                    ->default('Ada yang Bisa')
                                                    ->maxLength(80),

                                                TextInput::make('title_line2')
                                                    ->label('Judul Baris 2')
                                                    ->default('Kami Bantu?')
                                                    ->maxLength(80),
                                            ]),

                                            RichEditor::make('hero_desc')
                                                ->toolbarButtons([
                                                    'bold',
                                                    'italic',
                                                ])
                                                ->label('Deskripsi')
                                                ->required()
                                                ->columnSpanFull(),
                                        ]),

                                        Section::make('Info Strip')->schema([
                                            Repeater::make('infos')
                                                ->label('Info')
                                                ->schema([
                                                    Select::make('icon')
                                                        ->label('Icon Lucide')
                                                        ->options([
                                                            'map-pin' =>
                                                                'Map Pin',
                                                            'phone' => 'Phone',
                                                            'mail' => 'Mail',
                                                            'clock' => 'Clock',
                                                            'globe' => 'Globe',
                                                        ])
                                                        ->searchable()
                                                        ->required(),

                                                    TextInput::make('label')
                                                        ->label('Label')
                                                        ->required()
                                                        ->maxLength(80),

                                                    TextInput::make('value')
                                                        ->label('Nilai utama')
                                                        ->required()
                                                        ->maxLength(120),

                                                    TextInput::make('sub')
                                                        ->label('Sub-teks')
                                                        ->maxLength(120),
                                                ])
                                                ->columns(2)
                                                ->maxItems(4)
                                                ->addActionLabel('Tambah Info')
                                                ->reorderable()
                                                ->collapsible()
                                                ->columnSpanFull(),
                                        ]),

                                        Section::make('Admin WhatsApp')->schema(
                                            [
                                                TextInput::make(
                                                    'admin_section_title',
                                                )
                                                    ->label('Judul Kolom Admin')
                                                    ->default(
                                                        'Chat Admin Layanan',
                                                    )
                                                    ->maxLength(120),

                                                RichEditor::make(
                                                    'admin_section_desc',
                                                )
                                                    ->toolbarButtons([
                                                        'bold',
                                                        'italic',
                                                    ])
                                                    ->label('Deskripsi')
                                                    ->required()
                                                    ->columnSpanFull(),

                                                Repeater::make('admins')
                                                    ->label('Daftar Admin')
                                                    ->schema([
                                                        TextInput::make(
                                                            'service',
                                                        )
                                                            ->label(
                                                                'Nama Layanan',
                                                            )
                                                            ->required()
                                                            ->maxLength(100),

                                                        TextInput::make('name')
                                                            ->label(
                                                                'Nama Admin',
                                                            )
                                                            ->required()
                                                            ->maxLength(100),

                                                        TextInput::make(
                                                            'number',
                                                        )
                                                            ->label('Nomor WA')
                                                            ->required()
                                                            ->maxLength(20),
                                                    ])
                                                    ->columns(3)
                                                    ->addActionLabel(
                                                        'Tambah Admin',
                                                    )
                                                    ->reorderable()
                                                    ->collapsible()
                                                    ->columnSpanFull(),
                                            ],
                                        ),

                                        Section::make(
                                            'Jam Operasional',
                                        )->schema([
                                            Repeater::make('hours')
                                                ->label('Jam')
                                                ->schema([
                                                    Select::make('icon')
                                                        ->label('Icon')
                                                        ->options([
                                                            'building-2' =>
                                                                'Building',
                                                            'message-circle' =>
                                                                'Message Circle',
                                                            'droplets' =>
                                                                'Droplets',
                                                            'sun' => 'Sun',
                                                            'clock' => 'Clock',
                                                            'car' => 'Car',
                                                        ])
                                                        ->required(),

                                                    TextInput::make('day')
                                                        ->label(
                                                            'Label Hari/Channel',
                                                        )
                                                        ->required()
                                                        ->maxLength(80),

                                                    TextInput::make('time')
                                                        ->label(
                                                            'Jam Operasional',
                                                        )
                                                        ->required()
                                                        ->maxLength(80),

                                                    Toggle::make('badge')
                                                        ->label('Badge Aktif')
                                                        ->default(false)
                                                        ->inline(false),
                                                ])
                                                ->columns(2)
                                                ->addActionLabel('Tambah Jam')
                                                ->reorderable()
                                                ->collapsible()
                                                ->columnSpanFull(),
                                        ]),

                                        Section::make('Google Maps')->schema([
                                            TextInput::make('maps_embed_url')
                                                ->label('URL Embed Google Maps')
                                                ->maxLength(255)
                                                ->columnSpanFull(),
                                        ]),

                                        Section::make('Form Kontak')->schema([
                                            Grid::make(2)->schema([
                                                TextInput::make('form_title')
                                                    ->label('Judul Form')
                                                    ->default('Kirim Pesan')
                                                    ->maxLength(120),

                                                TextInput::make(
                                                    'form_wa_fallback',
                                                )
                                                    ->label('Nomor WA Fallback')
                                                    ->maxLength(20),
                                            ]),

                                            RichEditor::make('form_desc')
                                                ->toolbarButtons([
                                                    'bold',
                                                    'italic',
                                                ])
                                                ->label('Deskripsi')
                                                ->required()
                                                ->columnSpanFull(),

                                            Repeater::make('form_services')
                                                ->label('Pilihan Layanan')
                                                ->schema([
                                                    TextInput::make('value')
                                                        ->label('Value')
                                                        ->required()
                                                        ->maxLength(80),

                                                    TextInput::make('label')
                                                        ->label('Label')
                                                        ->required()
                                                        ->maxLength(80),
                                                ])
                                                ->columns(2)
                                                ->addActionLabel(
                                                    'Tambah Pilihan',
                                                )
                                                ->reorderable()
                                                ->collapsible()
                                                ->columnSpanFull(),
                                        ]),
                                    ])
                                    ->columns(2),

                                Block::make('cta')
                                    ->label('CTA')
                                    ->schema([
                                        Section::make('Konten CTA')->schema([
                                            TextInput::make('title')
                                                ->label('Judul CTA')
                                                ->required()
                                                ->maxLength(160)
                                                ->columnSpanFull(),

                                            RichEditor::make('description')
                                                ->toolbarButtons([
                                                    'bold',
                                                    'italic',
                                                ])
                                                ->label('Paragraf')
                                                ->required()
                                                ->columnSpanFull(),
                                        ]),

                                        Section::make('Aksi CTA')->schema([
                                            Grid::make(2)->schema([
                                                TextInput::make('wa_number')
                                                    ->label('Nomor WhatsApp')
                                                    ->required()
                                                    ->maxLength(20),

                                                TextInput::make('btn_wa_label')
                                                    ->label(
                                                        'Label Tombol WhatsApp',
                                                    )
                                                    ->default(
                                                        'Chat via WhatsApp',
                                                    )
                                                    ->maxLength(80),

                                                TextInput::make(
                                                    'btn_secondary_label',
                                                )
                                                    ->label('Tombol Sekunder')
                                                    ->default('Hubungi Kami')
                                                    ->maxLength(80),

                                                TextInput::make(
                                                    'btn_secondary_route',
                                                )
                                                    ->label('Route / URL')
                                                    ->default('contact')
                                                    ->maxLength(255),
                                            ]),
                                        ]),
                                    ])
                                    ->columns(2),

                                Block::make('about')
                                    ->label('About')
                                    ->schema([
                                        Section::make('Hero About')->schema([
                                            FileUpload::make('image_url')
                                                ->label('Gambar Utama')
                                                ->image()
                                                ->directory('pages/about')
                                                ->columnSpanFull(),

                                            Grid::make(2)->schema([
                                                TextInput::make('image_alt')
                                                    ->label('Alt Text Gambar')
                                                    ->maxLength(120),

                                                TextInput::make('badge_number')
                                                    ->label('Badge — Angka')
                                                    ->required()
                                                    ->maxLength(20),

                                                TextInput::make('badge_label')
                                                    ->label('Badge — Label')
                                                    ->required()
                                                    ->maxLength(80),

                                                TextInput::make('eyebrow')
                                                    ->label('Eyebrow Text')
                                                    ->required()
                                                    ->maxLength(80),

                                                TextInput::make('heading')
                                                    ->label('Judul Utama')
                                                    ->required()
                                                    ->maxLength(120),

                                                TextInput::make(
                                                    'heading_highlight',
                                                )
                                                    ->label('Judul Highlight')
                                                    ->required()
                                                    ->maxLength(120),

                                                TextInput::make(
                                                    'heading_suffix',
                                                )
                                                    ->label('Judul Suffix')
                                                    ->maxLength(120),
                                            ]),

                                            RichEditor::make('paragraph_1')
                                                ->label('Paragraf 1')
                                                ->toolbarButtons([
                                                    'bold',
                                                    'italic',
                                                ])
                                                ->required()
                                                ->columnSpanFull(),
                                        ]),

                                        Section::make('Statistik')->schema([
                                            Repeater::make('stats')
                                                ->label('Statistik')
                                                ->schema([
                                                    TextInput::make('number')
                                                        ->label('Angka')
                                                        ->required()
                                                        ->maxLength(20),

                                                    TextInput::make('label')
                                                        ->label('Label')
                                                        ->required()
                                                        ->maxLength(80),
                                                ])
                                                ->addActionLabel(
                                                    'Tambah Statistik',
                                                )
                                                ->minItems(2)
                                                ->maxItems(4)
                                                ->reorderable()
                                                ->collapsible()
                                                ->columnSpanFull()
                                                ->columns(2),
                                        ]),
                                    ])
                                    ->columns(2),

                                Block::make('partner')
                                    ->label('Mitra')
                                    ->schema([
                                        Section::make(
                                            'Informasi Mitra',
                                        )->schema([
                                            Grid::make(2)->schema([
                                                TextInput::make('label')
                                                    ->label('Label Kecil')
                                                    ->required()
                                                    ->maxLength(80),

                                                TextInput::make('title')
                                                    ->label('Judul')
                                                    ->required()
                                                    ->maxLength(120),
                                            ]),

                                            RichEditor::make('description')
                                                ->toolbarButtons([
                                                    'bold',
                                                    'italic',
                                                ])
                                                ->label('Paragraf')
                                                ->required()
                                                ->columnSpanFull(),
                                        ]),

                                        Section::make('Daftar Mitra')->schema([
                                            Repeater::make('partners')
                                                ->label('Mitra')
                                                ->schema([
                                                    TextInput::make('name')
                                                        ->label('Nama')
                                                        ->required()
                                                        ->maxLength(100),

                                                    TextInput::make('initial')
                                                        ->label('Inisial')
                                                        ->maxLength(4),

                                                    FileUpload::make('logo')
                                                        ->label('Logo')
                                                        ->image()
                                                        ->directory('partners')
                                                        ->nullable(),
                                                ])
                                                ->columns(3)
                                                ->addActionLabel('Tambah Mitra')
                                                ->reorderable()
                                                ->collapsible()
                                                ->columnSpanFull(),
                                        ]),
                                    ])
                                    ->columns(2),

                                Block::make('news')
                                    ->label('Berita')
                                    ->schema([
                                        Section::make(
                                            'Pengaturan Berita',
                                        )->schema([
                                            Grid::make(2)->schema([
                                                TextInput::make('label')
                                                    ->label('Label Kecil')
                                                    ->maxLength(80),

                                                TextInput::make('title')
                                                    ->label('Judul Section')
                                                    ->maxLength(120),

                                                Select::make('per_page')
                                                    ->label(
                                                        'Artikel per Halaman',
                                                    )
                                                    ->options([
                                                        3 => '3',
                                                        6 => '6',
                                                        9 => '9',
                                                        12 => '12',
                                                    ])
                                                    ->required()
                                                    ->native(false),

                                                TextInput::make('see_all_url')
                                                    ->label('URL Lihat Semua')
                                                    ->maxLength(255),
                                            ]),

                                            Grid::make(2)->schema([
                                                Toggle::make('show_pagination')
                                                    ->label(
                                                        'Tampilkan Pagination',
                                                    )
                                                    ->default(true)
                                                    ->inline(false),

                                                Toggle::make('show_filter')
                                                    ->label('Tampilkan Filter')
                                                    ->default(true)
                                                    ->inline(false),
                                            ]),
                                        ]),
                                    ])
                                    ->columns(2),
                            ])
                            ->collapsed()
                            ->reorderableWithButtons()
                            ->addActionLabel('Tambah Blok')
                            ->columnSpanFull(),
                    ])
                    ->columnSpan(2),

                Group::make([
                    Section::make('Identitas Halaman')
                        ->description('Data utama halaman dan tautan akses.')
                        ->icon('heroicon-o-link')
                        ->schema([
                            TextInput::make('title')
                                ->label('Judul Halaman')
                                ->required()
                                ->live(onBlur: true)
                                ->afterStateUpdated(
                                    fn(Set $set, ?string $state) => $set(
                                        'slug',
                                        Str::slug($state),
                                    ),
                                )
                                ->maxLength(160),

                            TextInput::make('slug')
                                ->label('URL Website')
                                ->required()
                                ->live(onBlur: true)
                                ->maxLength(255),

                            Action::make('visit')
                                ->label('Visit')
                                ->icon('heroicon-o-arrow-top-right-on-square')
                                ->url(
                                    fn(Get $get) => filled($get('slug'))
                                        ? url($get('slug'))
                                        : null,
                                    true,
                                )
                                ->color('primary')
                                ->visible(fn(Get $get) => filled($get('slug'))),
                        ]),

                    Section::make('Meta SEO')
                        ->description(
                            'Optimasi mesin pencari untuk halaman ini.',
                        )
                        ->icon('heroicon-o-globe-alt')
                        ->schema([
                            Textarea::make('meta_seo.description')
                                ->label('Meta Description')
                                ->rows(3)
                                ->maxLength(160)
                                ->columnSpanFull(),

                            TextInput::make('meta_seo.keywords')
                                ->label('Meta Keywords')
                                ->maxLength(255),

                            TextInput::make('meta_seo.og:title')
                                ->label('Open Graph Title')
                                ->maxLength(160),

                            Textarea::make('meta_seo.og:description')
                                ->label('Open Graph Description')
                                ->rows(2)
                                ->maxLength(200)
                                ->columnSpanFull(),

                            TextInput::make('meta_seo.og:image')
                                ->label('Open Graph Image URL')
                                ->maxLength(255),

                            TextInput::make('meta_seo.og:url')
                                ->label('Open Graph URL')
                                ->maxLength(255),
                        ]),
                ])->columnSpan(1),
            ])
                ->columns(3)
                ->columnSpanFull(),
        ]);
    }
}
