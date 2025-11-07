<?php

namespace App\Filament\Exports;

use App\Models\Transaction;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class TransactionExport extends Exporter
{
    protected static ?string $model = Transaction::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),

            ExportColumn::make('date_transaction')
                ->label('Tanggal Transaksi')
                ->formatStateUsing(fn ($state) => \Carbon\Carbon::parse($state)->format('d M Y')),

            ExportColumn::make('category.name')
                ->label('Kategori'),

            ExportColumn::make('category.is_expense')
                ->label('Tipe')
                ->formatStateUsing(fn ($state) => $state ? 'Pengeluaran' : 'Pemasukan'),

            ExportColumn::make('amount')
                ->label('Jumlah (Rp)')
                ->formatStateUsing(fn ($state) => number_format($state, 0, ',', '.')),

            ExportColumn::make('note')
                ->label('Catatan'),

            ExportColumn::make('created_at')
                ->label('Dibuat')
                ->formatStateUsing(fn ($state) => \Carbon\Carbon::parse($state)->format('d M Y H:i')),

            ExportColumn::make('updated_at')
                ->label('Diperbarui')
                ->formatStateUsing(fn ($state) => \Carbon\Carbon::parse($state)->format('d M Y H:i')),
        ];
    }

    /**
     * Notifikasi setelah ekspor selesai
     */
    public static function getCompletedNotificationBody(Export $export): string
    {
        $count = number_format($export->successful_rows);
        $filename = $export->getFileName();

        return "✅ Export transaksi selesai.<br>
        <strong>{$count}</strong> data berhasil diekspor.<br>
        Nama file: <em>{$filename}</em>";
    }
}