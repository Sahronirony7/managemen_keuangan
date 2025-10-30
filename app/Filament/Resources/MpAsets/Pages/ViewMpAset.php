<?php

namespace App\Filament\Resources\MpAsets\Pages;

use App\Filament\Resources\MpAsets\MpAsetResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewMpAset extends ViewRecord
{
    protected static string $resource = MpAsetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
