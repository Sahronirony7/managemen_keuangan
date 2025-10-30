<?php

namespace App\Filament\Resources\MpGeneralentries\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MpGeneralentryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                DatePicker::make('date'),
                TextInput::make('naration'),
                TextInput::make('generated_source'),
            ]);
    }
}
