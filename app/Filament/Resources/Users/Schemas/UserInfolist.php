<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Models\User;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Group::make([
                Section::make('Informasi Pengguna')
                    ->icon('heroicon-o-user')
                    ->schema([
                        Grid::make(2)->schema([
                            TextEntry::make('name')->label('Nama'),

                            TextEntry::make('email')
                                ->label('Email')
                                ->copyable(),
                        ]),
                    ]),

                Section::make('Status & Aktivitas')
                    ->icon('heroicon-o-clock')
                    ->schema([
                        Grid::make(2)->schema([
                            TextEntry::make('email_verified_at')
                                ->label('Email Terverifikasi')
                                ->dateTime()
                                ->placeholder('-')
                                ->badge()
                                ->color(
                                    fn($state) => $state ? 'success' : 'gray',
                                ),

                            TextEntry::make('deleted_at')
                                ->label('Dihapus')
                                ->dateTime()
                                ->visible(
                                    fn(User $record) => $record->trashed(),
                                )
                                ->badge()
                                ->color('danger'),

                            TextEntry::make('created_at')
                                ->label('Dibuat')
                                ->dateTime()
                                ->placeholder('-'),

                            TextEntry::make('updated_at')
                                ->label('Diperbarui')
                                ->dateTime()
                                ->placeholder('-'),
                        ]),
                    ]),
            ])
                ->columns(1)
                ->columnSpanFull(),
        ]);
    }
}
