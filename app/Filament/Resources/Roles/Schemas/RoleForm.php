<?php

namespace App\Filament\Resources\Roles\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\CheckboxList;
use Filament\Schemas\Schema;
use Spatie\Permission\Models\Permission;

class RoleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            TextInput::make('name')
                ->label('Nama Role')
                ->required()
                ->unique(ignoreRecord: true)
                ->maxLength(100),

            CheckboxList::make('permissions')
                ->label('Permissions')
                ->relationship('permissions', 'name')
                ->options(
                    Permission::query()
                        ->orderBy('name')
                        ->pluck('name', 'id')
                )
                ->columns(2)
                ->searchable()
                ->bulkToggleable(),
        ]);
    }
}
