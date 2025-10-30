<?php

namespace App\Filament\Resources\MpAsets;

use App\Filament\Resources\MpAsets\Pages\CreateMpAset;
use App\Filament\Resources\MpAsets\Pages\EditMpAset;
use App\Filament\Resources\MpAsets\Pages\ListMpAsets;
use App\Filament\Resources\MpAsets\Pages\ViewMpAset;
use App\Filament\Resources\MpAsets\Schemas\MpAsetForm;
use App\Filament\Resources\MpAsets\Schemas\MpAsetInfolist;
use App\Filament\Resources\MpAsets\Tables\MpAsetsTable;
use App\Models\MpAset;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MpAsetResource extends Resource
{
    protected static ?string $model = MpAset::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama_aset';
    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen Aset';
    }

    public static function form(Schema $schema): Schema
    {
        return MpAsetForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return MpAsetInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MpAsetsTable::configure($table);
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
            'index' => ListMpAsets::route('/'),
            'create' => CreateMpAset::route('/create'),
            'view' => ViewMpAset::route('/{record}'),
            'edit' => EditMpAset::route('/{record}/edit'),
        ];
    }
}
