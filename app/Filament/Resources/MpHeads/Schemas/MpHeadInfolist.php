<?php

namespace App\Filament\Resources\MpHeads\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class MpHeadInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            TextEntry::make('id')
                ->label('ID')
                ->icon('heroicon-o-hashtag'),

            TextEntry::make('name')
                ->label('Nama Akun')
                ->weight('bold')
                ->icon('heroicon-o-rectangle-stack'),

            TextEntry::make('nature')
                ->label('Sifat Akun')
                ->badge()
                ->color(fn ($state) => match ($state) {
                    'Aset' => 'success',
                    'Kewajiban' => 'danger',
                    'Modal' => 'warning',
                    'Pendapatan' => 'primary',
                    'Beban' => 'gray',
                    default => 'secondary',
                }),

            TextEntry::make('type')
                ->label('Tipe Akun')
                ->default('-'),

            TextEntry::make('expense_type')
                ->label('Jenis Beban')
                ->badge()
                ->color('warning')
                ->default('-'),

            TextEntry::make('revenue_type')
                ->label('Jenis Pendapatan')
                ->badge()
                ->color('success')
                ->default('-'),

            TextEntry::make('created_at')
                ->label('Tanggal Dibuat')
                ->dateTime('d M Y H:i'),

            TextEntry::make('updated_at')
                ->label('Terakhir Diedit')
                ->dateTime('d M Y H:i'),
        ]);
    }
}
