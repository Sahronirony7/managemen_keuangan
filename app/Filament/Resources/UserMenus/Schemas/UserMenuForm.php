<?php

namespace App\Filament\Resources\UserMenus\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserMenuForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('menu')
                    ->required(),
            ]);
    }
}
