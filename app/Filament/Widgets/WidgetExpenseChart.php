<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use App\Models\Transaction;
use Illuminate\Support\Carbon;
use Filament\Widgets\Concerns\InteractsWithPageFilters;

class WidgetExpenseChart extends ChartWidget
{
    protected ?string $heading = 'Grafik Pengeluaran';
    protected string $color = 'danger';
    use InteractsWithPageFilters;

    protected function getData(): array
    {
         $startDate = !empty($this->pageFilters['startDate'])
            ? Carbon::parse($this->pageFilters['startDate'])->startOfDay()
            : Carbon::now()->startOfMonth();

        $endDate = !empty($this->pageFilters['endDate'])
            ? Carbon::parse($this->pageFilters['endDate'])->endOfDay()
            : Carbon::now();
        $data = Trend::query(Transaction::expenses())
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
                'label' => 'Pengeluaran perhari',
                'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
            ],
        ],
        'labels' => $data->map(fn (TrendValue $value) => $value->date),
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'borderWidth' => 2,
                    'fill' => true,
                    'tension' => 0.5,
    ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
