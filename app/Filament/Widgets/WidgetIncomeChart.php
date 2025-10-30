<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use App\Models\Transaction;
use Illuminate\Support\Carbon;
use Filament\Widgets\Concerns\InteractsWithPageFilters;

class WidgetIncomeChart extends ChartWidget
{
    protected ?string $heading = 'Grafik Pemasukan';
    protected string $color = 'success';
    use InteractsWithPageFilters;

    protected function getData(): array
    {
        $startDate = ! is_null($this->pageFilters['startDate'] ?? null) ?
            Carbon::parse($this->pageFilters['startDate']) :
            null;

        $endDate = ! is_null($this->pageFilters['endDate'] ?? null) ?
            Carbon::parse($this->pageFilters['endDate']) :
            now();
        $data = Trend::query(Transaction::incomes())
        ->dateColumn('date_transaction')
        ->between(
            start: $startDate,
            end: $endDate,
        )
        ->perDay()
        ->sum('amount');

    return [
        'datasets' => [
            [
                'label' => 'Pemasukan perhari',
                'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                    'borderColor' => 'rgba(34, 197, 94, 1)',       // warna hijau success
                    'backgroundColor' => 'rgba(34, 197, 94, 0.2)',
                    'borderWidth' => 2,
                    'fill' => true,
                    'tension' => 0.5,
            ],
        ],
        'labels' => $data->map(fn (TrendValue $value) => $value->date),
    ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
