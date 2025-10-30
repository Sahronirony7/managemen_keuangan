<?php

namespace App\Filament\Resources\UserAccessMenus\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserAccessMenuForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('role_id')
                    ->numeric(),
                TextInput::make('menu_id')
                    ->numeric(),
            ]);
    }
}
