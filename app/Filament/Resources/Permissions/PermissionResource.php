<?php

namespace App\Filament\Resources\Permissions;

use BackedEnum;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Spatie\Permission\Models\Permission;
use App\Filament\Resources\Permissions\Pages;
use Filament\Forms\Components\TextInput;

class PermissionResource extends Resource
{
    protected static ?string $model = Permission::class;

    protected static string|BackedEnum|null $navigationIcon =
        Heroicon::OutlinedLockClosed;

    // ❌ JANGAN DEFINISIKAN navigationGroup DI SINI

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')
                ->required()
                ->unique(ignoreRecord: true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            \Filament\Tables\Columns\TextColumn::make('name')
                ->searchable()
                ->sortable(),
        ]);
    }

    public static function canViewAny(): bool
    {
        return Filament::auth()->user()?->can('manage permissions') ?? false;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPermissions::route('/'),
            'create' => Pages\CreatePermission::route('/create'),
            'edit' => Pages\EditPermission::route('/{record}/edit'),
        ];
    }
}
