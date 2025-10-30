<?php

namespace App\Filament\Resources\MpPiutangs\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MpPiutangForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_piutang')
                    ->required(),
                DatePicker::make('tanggal_piutang'),
                TextInput::make('penambahan'),
                TextInput::make('pengurangan'),
            ]);
    }
}
