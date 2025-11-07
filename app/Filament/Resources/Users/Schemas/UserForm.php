<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name'),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                FileUpload::make('image')
                    ->image()
                    ->nullable() // ✅ tidak wajib upload
                    ->directory('users') // ✅ simpan di storage/app/public/users
                    ->visibility('public')
                    ->enableOpen()
                    ->enableDownload()
                    ->preserveFilenames(),
                TextInput::make('password')
                    ->password()
                    ->label('Password')
                    ->dehydrateStateUsing(fn($state) => filled($state) ? bcrypt($state) : null)
                    ->required(fn(string $operation) => $operation === 'create')
                    ->dehydrated(fn($state) => filled($state)),
        
                TextInput::make('role_id')
                ->numeric(),
                TextInput::make('is_active')
                    ->required()
                    ->numeric()
                    ->default(1),
                DateTimePicker::make('date_created'),
            ]);
    }
}
