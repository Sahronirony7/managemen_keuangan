<?php

namespace App\Filament\Resources\MpGeneralentries\Pages;

use App\Filament\Resources\MpGeneralentries\MpGeneralentryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMpGeneralentry extends EditRecord
{
    protected static string $resource = MpGeneralentryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
