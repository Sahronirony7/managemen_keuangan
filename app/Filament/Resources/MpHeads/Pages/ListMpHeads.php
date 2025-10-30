<?php

namespace App\Filament\Resources\MpHeads\Pages;

use App\Filament\Resources\MpHeads\MpHeadResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMpHeads extends ListRecords
{
    protected static string $resource = MpHeadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Akun'),
        ];
    }
}
