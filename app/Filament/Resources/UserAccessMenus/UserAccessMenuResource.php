<?php

namespace App\Filament\Resources\UserAccessMenus;

use App\Filament\Resources\UserAccessMenus\Pages\CreateUserAccessMenu;
use App\Filament\Resources\UserAccessMenus\Pages\EditUserAccessMenu;
use App\Filament\Resources\UserAccessMenus\Pages\ListUserAccessMenus;
use App\Filament\Resources\UserAccessMenus\Schemas\UserAccessMenuForm;
use App\Filament\Resources\UserAccessMenus\Tables\UserAccessMenusTable;
use App\Models\UserAccessMenu;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class UserAccessMenuResource extends Resource
{
    protected static ?string $model = UserAccessMenu::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama_user_access_menu';
    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen User';
    }

    public static function form(Schema $schema): Schema
    {
        return UserAccessMenuForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UserAccessMenusTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListUserAccessMenus::route('/'),
            'create' => CreateUserAccessMenu::route('/create'),
            'edit' => EditUserAccessMenu::route('/{record}/edit'),
        ];
    }
}
