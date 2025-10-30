<?php

namespace App\Filament\Resources\UserSubMenus\Pages;

use App\Filament\Resources\UserSubMenus\UserSubMenuResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditUserSubMenu extends EditRecord
{
    protected static string $resource = UserSubMenuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
