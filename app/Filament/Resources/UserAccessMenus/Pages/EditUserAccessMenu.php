<?php

namespace App\Filament\Resources\UserAccessMenus\Pages;

use App\Filament\Resources\UserAccessMenus\UserAccessMenuResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditUserAccessMenu extends EditRecord
{
    protected static string $resource = UserAccessMenuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
