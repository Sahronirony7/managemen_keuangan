<?php

namespace App\Filament\Resources\MpHutangs;

use App\Filament\Resources\MpHutangs\Pages\CreateMpHutang;
use App\Filament\Resources\MpHutangs\Pages\EditMpHutang;
use App\Filament\Resources\MpHutangs\Pages\ListMpHutangs;
use App\Filament\Resources\MpHutangs\Schemas\MpHutangForm;
use App\Filament\Resources\MpHutangs\Tables\MpHutangsTable;
use App\Models\MpHutang;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MpHutangResource extends Resource
{
    protected static ?string $model = MpHutang::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama_hutang';
    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen Aset';
    }

    public static function form(Schema $schema): Schema
    {
        return MpHutangForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MpHutangsTable::configure($table);
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
            'index' => ListMpHutangs::route('/'),
            'create' => CreateMpHutang::route('/create'),
            'edit' => EditMpHutang::route('/{record}/edit'),
        ];
    }
}
