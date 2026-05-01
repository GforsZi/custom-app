<?php

namespace App\Filament\Resources\NewsArticles\Schemas;

use App\Models\NewsArticle;
use Filament\Schemas\Schema;
use Filament\Infolists;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Flex;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;

class NewsArticleInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Group::make([
                Section::make()
                    ->heading(fn(NewsArticle $record) => $record->title)
                    ->schema([
                        ImageEntry::make('image_thumbnail')
                            ->hiddenLabel()
                            ->imageSize('100%')
                            ->extraAttributes([
                                'class' => 'rounded-2xl shadow-sm',
                            ]),

                        Grid::make(2)->schema([
                            TextEntry::make('categories.name')
                                ->label('Kategori')
                                ->badge()
                                ->color('primary'),

                            TextEntry::make('created_at')
                                ->label('Dipublikasikan')
                                ->dateTime()
                                ->badge()
                                ->color('gray'),
                        ]),
                    ]),

                Section::make('Konten Artikel')
                    ->icon('heroicon-o-document-text')
                    ->schema([
                        TextEntry::make('content')
                            ->html()
                            ->prose()
                            ->extraAttributes([
                                'class' => '
                            max-w-4xl
                            mx-auto
                            text-base
                            leading-relaxed
                            prose-headings:font-semibold
                            prose-headings:tracking-tight
                            prose-h2:text-2xl
                            prose-h3:text-xl
                            prose-p:my-4
                            prose-img:rounded-xl
                            prose-img:shadow-sm
                            prose-a:text-primary-600
                            prose-a:underline-offset-4
                        ',
                            ]),
                    ])
                    ->columnSpan(2),
            ])
                ->columns(3)
                ->columnSpanFull(),
        ]);
    }
}
