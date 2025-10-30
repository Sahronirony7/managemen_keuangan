<?php

namespace App\Filament\Resources\TransactionReport;

use App\Filament\Resources\TransactionReport\Pages;
use App\Models\Transaction;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use Barryvdh\DomPDF\Facade\Pdf;

class TransactionReportResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationLabel = 'Laporan Transaksi';

    public static function table(Table $table): Table
    {
        return $table
            ->query(Transaction::query())
            ->columns([
                Tables\Columns\TextColumn::make('date_transaction')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Transaksi')
                    ->searchable(),

                Tables\Columns\TextColumn::make('category.name')
                    ->label('Kategori')
                    ->badge(),

                Tables\Columns\TextColumn::make('amount')
                    ->label('Nominal')
                    ->money('IDR', true),

                Tables\Columns\TextColumn::make('note')
                    ->label('Keterangan')
                    ->wrap(),
            ])
            ->filters([
                Tables\Filters\Filter::make('date_range')
                    ->form([
                        \Filament\Forms\Components\DatePicker::make('from')->label('Dari'),
                        \Filament\Forms\Components\DatePicker::make('until')->label('Sampai'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['from'], fn($q) => $q->whereDate('date_transaction', '>=', $data['from']))
                            ->when($data['until'], fn($q) => $q->whereDate('date_transaction', '<=', $data['until']));
                    }),
           
            ])
            ->bulkActions([
                ExportBulkAction::make()
                    ->label('Export Excel')
                    ->fileName('laporan_keuangan_' . now()->format('Ymd_His')),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTransactionReports::route('/'),
        ];
    }
}
