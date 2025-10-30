<?php

namespace App\Filament\Resources\MpSubEntries\Pages;

use App\Filament\Resources\MpSubEntries\MpSubEntryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMpSubEntry extends EditRecord
{
    protected static string $resource = MpSubEntryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
