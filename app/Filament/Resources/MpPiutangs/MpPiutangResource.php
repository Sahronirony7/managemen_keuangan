<?php

namespace App\Filament\Resources\MpPiutangs;

use App\Filament\Resources\MpPiutangs\Pages\CreateMpPiutang;
use App\Filament\Resources\MpPiutangs\Pages\EditMpPiutang;
use App\Filament\Resources\MpPiutangs\Pages\ListMpPiutangs;
use App\Filament\Resources\MpPiutangs\Schemas\MpPiutangForm;
use App\Filament\Resources\MpPiutangs\Tables\MpPiutangsTable;
use App\Models\MpPiutang;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MpPiutangResource extends Resource
{
    protected static ?string $model = MpPiutang::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama_piutang';
    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen Aset';
    }

    public static function form(Schema $schema): Schema
    {
        return MpPiutangForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MpPiutangsTable::configure($table);
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
            'index' => ListMpPiutangs::route('/'),
            'create' => CreateMpPiutang::route('/create'),
            'edit' => EditMpPiutang::route('/{record}/edit'),
        ];
    }
}
