<?php

namespace App\Filament\Resources\Transactions\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Transaksi')
                    ->required(),

                DatePicker::make('date_transaction')
                    ->label('Tanggal')
                    ->required(),

                TextInput::make('amount')
                    ->label('Jumlah')
                    ->numeric()
                    ->required(),

                TextInput::make('note')
                    ->label('Catatan'),

                FileUpload::make('image')
                    ->label('Bukti (Opsional)')
                    ->image()
                    ->directory('transactions')
                    ->visibility('public')
                    ->enableOpen()
                    ->enableDownload(),

                Select::make('category_id')
                    ->label('Kategori')
                    ->relationship('category', 'name') // ✅ relasi yang benar
                    //->searchable()
                    ->required(),
            ]);
    }
}
