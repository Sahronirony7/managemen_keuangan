<?php

namespace App\Filament\Resources\MpPiutangs\Pages;

use App\Filament\Resources\MpPiutangs\MpPiutangResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMpPiutangs extends ListRecords
{
    protected static string $resource = MpPiutangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
