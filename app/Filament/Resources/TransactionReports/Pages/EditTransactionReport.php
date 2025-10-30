<?php

namespace App\Filament\Resources\TransactionReports\Pages;

use App\Filament\Resources\TransactionReports\TransactionReportResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTransactionReport extends EditRecord
{
    protected static string $resource = TransactionReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
