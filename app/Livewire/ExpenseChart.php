<?php

namespace App\Livewire;

use Filament\Widgets\ChartWidget;

class ExpenseChart extends ChartWidget
{
    protected ?string $heading = 'Expense Chart';

    protected function getData(): array
    {
        return [
            //
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
