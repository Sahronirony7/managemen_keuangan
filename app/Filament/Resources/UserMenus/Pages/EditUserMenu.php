<?php

namespace App\Filament\Resources\UserMenus\Pages;

use App\Filament\Resources\UserMenus\UserMenuResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditUserMenu extends EditRecord
{
    protected static string $resource = UserMenuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
