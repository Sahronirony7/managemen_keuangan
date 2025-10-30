<?php

namespace App\Filament\Resources\MpHeads\Pages;

use App\Filament\Resources\MpHeads\MpHeadResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMpHead extends CreateRecord
{
    protected static string $resource = MpHeadResource::class;

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Data berhasil ditambahkan';
    }
}
