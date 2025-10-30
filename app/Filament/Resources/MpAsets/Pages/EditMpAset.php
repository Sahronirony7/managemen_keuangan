<?php

namespace App\Filament\Resources\MpAsets\Pages;

use App\Filament\Resources\MpAsets\MpAsetResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditMpAset extends EditRecord
{
    protected static string $resource = MpAsetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
