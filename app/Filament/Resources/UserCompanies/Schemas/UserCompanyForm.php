<?php

namespace App\Filament\Resources\UserCompanies\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserCompanyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('loc'),
            ]);
    }
}
