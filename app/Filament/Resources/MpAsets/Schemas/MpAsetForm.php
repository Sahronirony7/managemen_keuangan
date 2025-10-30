<?php

namespace App\Filament\Resources\MpAsets\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MpAsetForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('nama_aset')
                ->label('Nama Aset')
                ->required()
                ->maxLength(100)
                ->placeholder('Contoh: Laptop Admin'),

            DatePicker::make('tanggal_perolehan')
                ->label('Tanggal Perolehan')
                ->required()
                ->maxDate(now())
                ->native(false)
                ->displayFormat('d M Y'),

            TextInput::make('jumlah_unit')
                ->label('Jumlah Unit')
                ->numeric()
                ->required()
                ->default(1)
                ->minValue(1),

            TextInput::make('umur_manfaat')
                ->label('Umur Manfaat (tahun)')
                ->numeric()
                ->required()
                ->minValue(1)
                ->suffix('tahun')
                ->reactive(),

            TextInput::make('harga_perolehan')
                ->label('Harga Perolehan')
                ->numeric()
                ->prefix('Rp')
                ->required()
                ->reactive(),

            TextInput::make('akumulasi_penyusutan')
                ->label('Akumulasi Penyusutan (Opsional)')
                ->numeric()
                ->prefix('Rp'),

            
        ]);
    }
}
