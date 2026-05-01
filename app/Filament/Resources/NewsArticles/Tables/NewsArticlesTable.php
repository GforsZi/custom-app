<?php

namespace App\Filament\Resources\NewsArticles\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\Layout\Grid;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class NewsArticlesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->contentGrid([
                'md' => 2,
                'xl' => 3,
            ])
            ->columns([
                Grid::make()->schema([
                    ImageColumn::make('image_thumbnail')
                        ->extraImgAttributes([
                            'class' => 'object-cover w-full rounded-t-xl',
                            'style' => 'width: 100%; height:auto; aspect-ratio:3/2; object-fit: cover',
                        ])
                        ->columnSpanFull(),

                    Stack::make([TextColumn::make('title')->weight('bold')->size('lg')->searchable()])->space(2),
                ]),
            ])
            ->filters([TrashedFilter::make()])
            ->recordActions([ViewAction::make(), EditAction::make(), DeleteAction::make()])
            ->toolbarActions([BulkActionGroup::make([DeleteBulkAction::make(), ForceDeleteBulkAction::make(), RestoreBulkAction::make()])]);
    }
}
