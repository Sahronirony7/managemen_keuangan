<?php

namespace App\Filament\Resources\MpHeads\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class MpHeadsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('name', 'asc')
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Head')
                    ->searchable()
                    ->sortable()
                    ->description(fn ($record) => $record->description ?? null)
                    ->limit(30)
                    ->tooltip(fn ($record) => $record->description ?? null)
                    ->icon('heroicon-o-rectangle-stack')
                    ->weight('medium'),

                TextColumn::make('nature')
                    ->label('Sifat')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Asset' => 'success',
                        'Liability' => 'danger',
                        'Equity' => 'info',
                        'Revenue' => 'warning',
                        'Expense' => 'gray',
                        default => 'secondary',
                    })
                    ->sortable()
                    ->searchable(),

                TextColumn::make('type')
                    ->label('Tipe Akun')
                    ->badge()
                    ->color('info')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('expense_type')
                    ->label('Jenis Beban')
                    ->color('warning')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('revenue_type')
                    ->label('Jenis Pendapatan')
                    ->color('success')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('nature')
                    ->label('Sifat Akun')
                    ->options([
                        'Asset' => 'Asset',
                        'Liability' => 'Liability',
                        'Equity' => 'Equity',
                        'Revenue' => 'Revenue',
                        'Expense' => 'Expense',
                    ])
                    ->searchable(),

                SelectFilter::make('type')
                    ->label('Tipe')
                    ->options([
                        'Debit' => 'Debit',
                        'Credit' => 'Credit',
                    ])
                    ->searchable(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make()
                    ->requiresConfirmation()
                    ->color('danger'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label('Hapus Terpilih')
                        ->requiresConfirmation(),
                ]),
            ]);
    }
}
