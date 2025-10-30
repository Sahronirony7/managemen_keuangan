<?php

namespace App\Filament\Resources\UserSubMenus\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserSubMenuForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('menu_id')
                    ->numeric(),
                TextInput::make('title'),
                TextInput::make('url'),
                TextInput::make('icon'),
                TextInput::make('is_active')
                    ->required()
                    ->numeric()
                    ->default(1),
            ]);
    }
}
