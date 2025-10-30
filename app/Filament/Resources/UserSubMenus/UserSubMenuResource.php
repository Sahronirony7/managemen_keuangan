<?php

namespace App\Filament\Resources\UserSubMenus;

use App\Filament\Resources\UserSubMenus\Pages\CreateUserSubMenu;
use App\Filament\Resources\UserSubMenus\Pages\EditUserSubMenu;
use App\Filament\Resources\UserSubMenus\Pages\ListUserSubMenus;
use App\Filament\Resources\UserSubMenus\Schemas\UserSubMenuForm;
use App\Filament\Resources\UserSubMenus\Tables\UserSubMenusTable;
use App\Models\UserSubMenu;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class UserSubMenuResource extends Resource
{
    protected static ?string $model = UserSubMenu::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama_user_sub_menu';
    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen User';
    }

    public static function form(Schema $schema): Schema
    {
        return UserSubMenuForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UserSubMenusTable::configure($table);
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
            'index' => ListUserSubMenus::route('/'),
            'create' => CreateUserSubMenu::route('/create'),
            'edit' => EditUserSubMenu::route('/{record}/edit'),
        ];
    }
}
