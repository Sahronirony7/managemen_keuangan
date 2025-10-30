<?php

namespace App\Filament\Resources\UserAccessMenus\Pages;

use App\Filament\Resources\UserAccessMenus\UserAccessMenuResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUserAccessMenus extends ListRecords
{
    protected static string $resource = UserAccessMenuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
