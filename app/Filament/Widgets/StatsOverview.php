<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\Transaction;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\Concerns\InteractsWithPageFilters;

class StatsOverview extends StatsOverviewWidget
{
    use InteractsWithPageFilters;

    protected function getStats(): array
    {   
        $startDate = !empty($this->pageFilters['startDate'])
            ? Carbon::parse($this->pageFilters['startDate'])->startOfDay()
            : Carbon::now()->startOfMonth();

        $endDate = !empty($this->pageFilters['endDate'])
            ? Carbon::parse($this->pageFilters['endDate'])->endOfDay()
            : Carbon::now();

        $pemasukan = Transaction::incomes()
            ->whereBetween('date_transaction', [$startDate, $endDate])
            ->sum('amount');

        $pengeluaran = Transaction::expenses()
            ->whereBetween('date_transaction', [$startDate, $endDate])
            ->sum('amount');

        $saldo = $pemasukan - $pengeluaran;

        return [
            Stat::make('Pemasukan', $this->formatRupiah($pemasukan))
                ->description('Total Income')
                ->descriptionIcon('heroicon-m-arrow-down-on-square-stack')
                ->color('success'),

            Stat::make('Pengeluaran', $this->formatRupiah($pengeluaran))
                ->description('Total Expense')
                ->descriptionIcon('heroicon-m-arrow-up-on-square-stack')
                ->color('danger'),

            Stat::make('Saldo', $this->formatRupiah($saldo))
                ->description('Remaining Balance')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color($saldo >= 0 ? 'success' : 'danger'),
        ];
    }

    /**
     * Format angka ke Rupiah
     */
    private function formatRupiah($value): string
    {
        if (is_null($value)) {
            return 'Rp 0';
        }

        return 'Rp ' . number_format($value, 0, ',', '.');
    }
}
