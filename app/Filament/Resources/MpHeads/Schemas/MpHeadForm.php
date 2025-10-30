<?php

namespace App\Filament\Resources\MpHeads\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class MpHeadForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->schema([
                TextInput::make('name')
                    ->label('Nama Akun')
                    ->required()
                    ->maxLength(255),

                Select::make('nature')
                    ->label('Sifat Akun')
                    ->options([
                        'Aset' => 'Aset',
                        'Kewajiban' => 'Kewajiban',
                        'Modal' => 'Modal',
                        'Pendapatan' => 'Pendapatan',
                        'Beban' => 'Beban',
                    ])
                    ->required()
                    ->searchable(),

                Select::make('type')
                    ->label('Tipe Akun')
                    ->options([
                        'Lancar' => 'Lancar',
                        'Tetap' => 'Tetap',
                    ])
                    ->required(),

                Select::make('expense_type')
                    ->label('Jenis Beban (Jika Beban)')
                    ->options([
                        'Operasional' => 'Operasional',
                        'Non-Operasional' => 'Non-Operasional',
                        'Lainnya' => 'Lainnya',
                    ])
                    ->nullable(),

                Select::make('revenue_type')
                    ->label('Jenis Pendapatan (Jika Pendapatan)')
                    ->options([
                        'Donasi' => 'Donasi',
                        'Usaha' => 'Usaha',
                        'Hibah' => 'Hibah',
                        'Lainnya' => 'Lainnya',
                    ])
                    ->nullable(),
            ]);
    }
}
