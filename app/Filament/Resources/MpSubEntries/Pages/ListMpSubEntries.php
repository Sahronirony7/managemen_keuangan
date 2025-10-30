<?php

namespace App\Filament\Resources\MpSubEntries\Pages;

use App\Filament\Resources\MpSubEntries\MpSubEntryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMpSubEntries extends ListRecords
{
    protected static string $resource = MpSubEntryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
