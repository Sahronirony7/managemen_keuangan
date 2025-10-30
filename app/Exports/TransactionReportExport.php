<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransactionReportExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Transaction::with('category')
            ->select('name', 'category_id', 'date_transaction', 'amount', 'note')
            ->get()
            ->map(function ($item) {
                return [
                    'Nama Transaksi' => $item->name,
                    'Kategori' => $item->category->name ?? '-',
                    'Tanggal' => $item->date_transaction,
                    'Nominal' => $item->amount,
                    'Catatan' => $item->note,
                ];
            });
    }

    public function headings(): array
    {
        return ['Nama Transaksi', 'Kategori', 'Tanggal', 'Nominal', 'Catatan'];
    }
}
