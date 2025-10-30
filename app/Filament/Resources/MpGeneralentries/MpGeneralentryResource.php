<?php

namespace App\Filament\Resources\MpGeneralentries;

use App\Filament\Resources\MpGeneralentries\Pages\CreateMpGeneralentry;
use App\Filament\Resources\MpGeneralentries\Pages\EditMpGeneralentry;
use App\Filament\Resources\MpGeneralentries\Pages\ListMpGeneralentries;
use App\Filament\Resources\MpGeneralentries\Schemas\MpGeneralentryForm;
use App\Filament\Resources\MpGeneralentries\Tables\MpGeneralentriesTable;
use App\Models\MpGeneralentry;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MpGeneralentryResource extends Resource
{
    protected static ?string $model = MpGeneralentry::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama_generalentry';
    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen Aset';
    }

    public static function form(Schema $schema): Schema
    {
        return MpGeneralentryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MpGeneralentriesTable::configure($table);
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
            'index' => ListMpGeneralentries::route('/'),
            'create' => CreateMpGeneralentry::route('/create'),
            'edit' => EditMpGeneralentry::route('/{record}/edit'),
        ];
    }
}
