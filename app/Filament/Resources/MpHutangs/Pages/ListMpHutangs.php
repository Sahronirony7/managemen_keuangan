<?php

namespace App\Filament\Resources\MpHutangs\Pages;

use App\Filament\Resources\MpHutangs\MpHutangResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMpHutangs extends ListRecords
{
    protected static string $resource = MpHutangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
