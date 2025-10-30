<?php

namespace App\Filament\Resources\MpHeads\Pages;

use App\Filament\Resources\MpHeads\MpHeadResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMpHead extends ViewRecord
{
    protected static string $resource = MpHeadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
