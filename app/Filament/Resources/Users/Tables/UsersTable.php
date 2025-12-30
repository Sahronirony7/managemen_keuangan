<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),

                TextColumn::make('email')
                    ->searchable(),

                TextColumn::make('roles.name')
                    ->label('Role')
                    ->badge()
                    ->separator(', ')
                    ->colors([
                        'primary',
                        'success' => 'Admin',
                        'danger' => 'Super Admin',
                        'warning' => 'Bendahara',
                    ]),

                ImageColumn::make('image')
                    ->circular(),

                TextColumn::make('is_active')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn ($state) => $state ? 'Aktif' : 'Nonaktif')
                    ->colors([
                        'success' => fn ($state) => $state === 1,
                        'danger' => fn ($state) => $state === 0,
                    ]),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ]);
    }
}
