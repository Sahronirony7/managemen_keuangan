<?php

namespace App\Filament\Resources\MpSubEntries\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MpSubEntryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('parent_id')
                    ->numeric(),
                TextInput::make('accounthead')
                    ->numeric(),
                TextInput::make('amount')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('type')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('journal_type')
                    ->numeric(),
            ]);
    }
}
