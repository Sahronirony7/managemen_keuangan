<?php

namespace App\Filament\Resources\MpHeads\Pages;

use App\Filament\Resources\MpHeads\MpHeadResource;
use Filament\Resources\Pages\EditRecord;

class EditMpHead extends EditRecord
{
    protected static string $resource = MpHeadResource::class;

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Perubahan berhasil disimpan';
    }

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\DeleteAction::make(),
        ];
    }
}
