<?php

namespace App\Filament\Resources\UserSubMenus\Pages;

use App\Filament\Resources\UserSubMenus\UserSubMenuResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUserSubMenus extends ListRecords
{
    protected static string $resource = UserSubMenuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
