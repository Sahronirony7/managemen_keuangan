<?php

namespace App\Filament\Resources\MpSubEntries;

use App\Filament\Resources\MpSubEntries\Pages\CreateMpSubEntry;
use App\Filament\Resources\MpSubEntries\Pages\EditMpSubEntry;
use App\Filament\Resources\MpSubEntries\Pages\ListMpSubEntries;
use App\Filament\Resources\MpSubEntries\Schemas\MpSubEntryForm;
use App\Filament\Resources\MpSubEntries\Tables\MpSubEntriesTable;
use App\Models\MpSubEntry;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MpSubEntryResource extends Resource
{
    protected static ?string $model = MpSubEntry::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama_sub_entry';
    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen Aset';
    }

    public static function form(Schema $schema): Schema
    {
        return MpSubEntryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MpSubEntriesTable::configure($table);
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
            'index' => ListMpSubEntries::route('/'),
            'create' => CreateMpSubEntry::route('/create'),
            'edit' => EditMpSubEntry::route('/{record}/edit'),
        ];
    }
}
