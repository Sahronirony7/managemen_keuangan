<?php

namespace App\Filament\Resources\Roles;

use BackedEnum;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Spatie\Permission\Models\Role;
use App\Filament\Resources\Roles\Pages;
use App\Filament\Resources\Roles\Schemas\RoleForm;

class RoleResource extends Resource
{
    protected static ?string $model = Role::class;

    protected static string|BackedEnum|null $navigationIcon =
        Heroicon::OutlinedKey;

    // ❌ HAPUS navigationGroup DARI RESOURCE

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return RoleForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            \Filament\Tables\Columns\TextColumn::make('name')
                ->searchable()
                ->sortable(),

            \Filament\Tables\Columns\TextColumn::make('permissions.name')
                ->label('Permissions')
                ->badge()
                ->separator(','),
        ]);
    }

    public static function canViewAny(): bool
    {
        return Filament::auth()->user()?->can('manage roles') ?? false;
    }

    public static function canCreate(): bool
    {
        return Filament::auth()->user()?->can('manage roles') ?? false;
    }

    public static function canEdit($record): bool
    {
        return Filament::auth()->user()?->can('manage roles') ?? false;
    }

    public static function canDelete($record): bool
    {
        return Filament::auth()->user()?->can('manage roles') ?? false;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRoles::route('/'),
            'create' => Pages\CreateRole::route('/create'),
            'edit' => Pages\EditRole::route('/{record}/edit'),
        ];
    }
}
