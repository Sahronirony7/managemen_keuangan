<?php

namespace App\Filament\Resources\UserMenus;

use App\Filament\Resources\UserMenus\Pages\CreateUserMenu;
use App\Filament\Resources\UserMenus\Pages\EditUserMenu;
use App\Filament\Resources\UserMenus\Pages\ListUserMenus;
use App\Filament\Resources\UserMenus\Schemas\UserMenuForm;
use App\Filament\Resources\UserMenus\Tables\UserMenusTable;
use App\Models\UserMenu;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class UserMenuResource extends Resource
{
    protected static ?string $model = UserMenu::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama_user_menu';
    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen User';
    }

    public static function form(Schema $schema): Schema
    {
        return UserMenuForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UserMenusTable::configure($table);
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
            'index' => ListUserMenus::route('/'),
            'create' => CreateUserMenu::route('/create'),
            'edit' => EditUserMenu::route('/{record}/edit'),
        ];
    }
}
