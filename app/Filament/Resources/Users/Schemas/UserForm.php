<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Informasi Pengguna')
                ->icon('heroicon-o-user')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('name')
                            ->label('Nama Lengkap')
                            ->required()
                            ->maxLength(100),

                        TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true),
                    ]),
                ]),

            Section::make('Keamanan')
                ->icon('heroicon-o-lock-closed')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('password')
                            ->label('Password')
                            ->password()
                            ->revealable()
                            ->nullable()
                            ->required(
                                fn(string $context) => $context === 'create',
                            )
                            ->minLength(8)
                            ->dehydrateStateUsing(
                                fn($state) => filled($state)
                                    ? Hash::make($state)
                                    : null,
                            )
                            ->dehydrated(fn($state) => filled($state)),

                        TextInput::make('password_confirmation')
                            ->label('Konfirmasi Password')
                            ->password()
                            ->revealable()
                            ->same('password')
                            ->required(
                                fn(string $context) => $context === 'create',
                            )
                            ->nullable()
                            ->dehydrated(false),
                    ]),
                ]),

            Section::make('Status Akun')
                ->icon('heroicon-o-check-badge')
                ->schema([
                    Grid::make(2)->schema([
                        Toggle::make('is_active')
                            ->label('Akun Aktif')
                            ->dehydrateStateUsing(fn ($state): bool => (bool) $state),

                        DateTimePicker::make('email_verified_at')
                            ->label('Email Terverifikasi')
                            ->nullable(),
                    ]),
                ]),

            Section::make('Role & Hak Akses')
                ->icon('heroicon-o-shield-check')
                ->schema([
                    Select::make('roles')
                        ->label('Roles')
                        ->relationship('roles', 'name')
                        ->multiple()
                        ->preload()
                        ->searchable(),
                ]),
        ]);
    }
}
