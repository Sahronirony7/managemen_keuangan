<?php

namespace App\Filament\Resources\Users;

use App\Filament\Resources\Users\Pages\CreateUser;
use App\Filament\Resources\Users\Pages\EditUser;
use App\Filament\Resources\Users\Pages\ListUsers;
use App\Filament\Resources\Users\Schemas\UserForm;
use App\Filament\Resources\Users\Tables\UsersTable;
use App\Models\User;
use BackedEnum;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static string|BackedEnum|null $navigationIcon =
        Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen User';
    }

    public static function form(Schema $schema): Schema
    {
        return UserForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UsersTable::configure($table);
    }

    /* =====================================================
     | 🔐 AUTHORIZATION — SUPER ADMIN FULL ACCESS
     |=====================================================*/

    protected static function authUser(): ?User
    {
        return Filament::auth()->user();
    }

    protected static function isSuperAdmin(): bool
    {
        return self::authUser()?->hasRole('Super Admin') ?? false;
    }

    public static function canViewAny(): bool
    {
        if (self::isSuperAdmin()) {
            return true;
        }

        return self::authUser()?->can('manage users') ?? false;
    }

    public static function canCreate(): bool
    {
        if (self::isSuperAdmin()) {
            return true;
        }

        return self::authUser()?->can('manage users') ?? false;
    }

    public static function canEdit(Model $record): bool
    {
        if (self::isSuperAdmin()) {
            return true;
        }

        return self::authUser()?->can('manage users') ?? false;
    }

    public static function canDelete(Model $record): bool
    {
        if (self::isSuperAdmin()) {
            return true;
        }

        return self::authUser()?->can('manage users') ?? false;
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'edit'   => EditUser::route('/{record}/edit'),
        ];
    }
}
