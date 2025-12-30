<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            TextInput::make('name')
                ->label('Nama User')
                ->required()
                ->maxLength(255),

            TextInput::make('email')
                ->label('Email')
                ->email()
                ->required()
                ->unique(ignoreRecord: true),

            FileUpload::make('image')
                ->label('Foto')
                ->image()
                ->directory('users')
                ->visibility('public')
                ->nullable(),

            TextInput::make('password')
                ->password()
                ->label('Password')
                ->required(fn (string $operation) => $operation === 'create')
                ->dehydrateStateUsing(fn ($state) => filled($state) ? bcrypt($state) : null)
                ->dehydrated(fn ($state) => filled($state))
                ->hiddenOn('edit'),

            /* ✅ ASSIGN ROLE - SPATIE (BENAR) */
            Select::make('roles')
                ->label('Role')
                ->multiple()
                ->relationship('roles', 'name')
                ->preload()
                ->searchable()
                ->required(),

            Toggle::make('is_active')
                ->label('Status Aktif')
                ->default(true),
        ]);
    }
}
