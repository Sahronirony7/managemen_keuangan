<?php

namespace App\Filament\Resources\UserMenus\Pages;

use App\Filament\Resources\UserMenus\UserMenuResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUserMenus extends ListRecords
{
    protected static string $resource = UserMenuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
