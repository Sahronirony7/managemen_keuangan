<?php

namespace App\Filament\Resources\MpHutangs\Pages;

use App\Filament\Resources\MpHutangs\MpHutangResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMpHutang extends EditRecord
{
    protected static string $resource = MpHutangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
