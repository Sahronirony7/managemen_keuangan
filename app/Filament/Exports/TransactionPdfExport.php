<?php

namespace App\Filament\Exports;

use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Commands\FileGenerators\ExporterClassGenerator;
use Filament\Actions\Exports\Exporter;
use Illuminate\Support\Facades\Storage;

class TransactionPdfExport extends ExporterClassGenerator
{
    protected static ?string $model = Transaction::class;

    public static function getLabel(): string
     {
        return 'Laporan_Transaksi_' . now()->format('Y-m-d_H-i-s');
    }

    public function exportToDisk($disk, $path, $query)
    {
        $transactions = $query->with('category')->get();

        $totalIncome = $transactions->filter(fn ($t) => !$t->category->is_expense)->sum('amount');
        $totalExpense = $transactions->filter(fn ($t) => $t->category->is_expense)->sum('amount');
        $balance = $totalIncome - $totalExpense;

        $pdf = Pdf::loadView('exports.transactions-pdf', compact('transactions', 'totalIncome', 'totalExpense', 'balance'))
            ->setPaper('a4', 'portrait');

        Storage::disk($disk)->put($path, $pdf->output());
    }
}
