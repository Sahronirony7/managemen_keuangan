<?php

namespace App\Filament\Resources\MpAsets\Pages;

use App\Filament\Resources\MpAsets\MpAsetResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMpAsets extends ListRecords
{
    protected static string $resource = MpAsetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
