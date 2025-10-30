<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Toggle::make('is_expense')
                    ->required(),
                FileUpload::make('image')
                    ->label('Gambar Kategori')
                    ->image()
                    ->nullable()
                    ->directory('categories') // ✅ simpan di storage/app/public/users
                    ->visibility('public')
                    ->enableOpen()
                    ->enableDownload()
                    ->preserveFilenames(),
            ]);
    }
}
