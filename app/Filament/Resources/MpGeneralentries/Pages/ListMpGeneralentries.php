<?php

namespace App\Filament\Resources\MpGeneralentries\Pages;

use App\Filament\Resources\MpGeneralentries\MpGeneralentryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMpGeneralentries extends ListRecords
{
    protected static string $resource = MpGeneralentryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
