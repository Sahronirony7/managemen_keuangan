<?php

namespace App\Filament\Resources\MpHutangs\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MpHutangForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_hutang')
                    ->required(),
                DatePicker::make('tanggal_hutang'),
                TextInput::make('penambahan'),
                TextInput::make('pengurangan'),
            ]);
    }
}
