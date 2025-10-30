<?php

namespace App\Filament\Exports;

use App\Models\Transaction;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TransactionExport implements FromView, ShouldAutoSize, WithTitle, WithStyles
{
    protected array $filters;

    public function __construct(array $filters = [])
    {
        $this->filters = $filters;
    }

    public function view(): View
    {
        $query = Transaction::query()->with('category');

        // ✅ Filter rentang tanggal
        if (!empty($this->filters['from']) && !empty($this->filters['until'])) {
            $query->whereBetween('date_transaction', [
                $this->filters['from'],
                $this->filters['until'],
            ]);
        }

        // ✅ Filter kategori
        if (!empty($this->filters['category_id'])) {
            $query->where('category_id', $this->filters['category_id']);
        }

        // ✅ Filter tipe (is_expense)
        if (isset($this->filters['is_expense'])) {
            $query->whereHas('category', fn($c) => 
                $c->where('is_expense', $this->filters['is_expense'])
            );
        }

        return view('exports.transactions', [
            'transactions' => $query->orderBy('date_transaction', 'desc')->get(),
        ]);
    }

    public function title(): string
    {
        return 'Data Transaksi';
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]], // Membuat header tebal
        ];
    }
}
