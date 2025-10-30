<?php

namespace App\Filament\Resources\MpPiutangs\Pages;

use App\Filament\Resources\MpPiutangs\MpPiutangResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMpPiutang extends EditRecord
{
    protected static string $resource = MpPiutangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
