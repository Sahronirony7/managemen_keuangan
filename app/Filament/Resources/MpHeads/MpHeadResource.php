<?php

namespace App\Filament\Resources\MpHeads;

use App\Filament\Resources\MpHeads\Pages\CreateMpHead;
use App\Filament\Resources\MpHeads\Pages\EditMpHead;
use App\Filament\Resources\MpHeads\Pages\ListMpHeads;
use App\Filament\Resources\MpHeads\Pages\ViewMpHead;
use App\Filament\Resources\MpHeads\Schemas\MpHeadForm;
use App\Filament\Resources\MpHeads\Schemas\MpHeadInfolist;
use App\Filament\Resources\MpHeads\Tables\MpHeadsTable;
use App\Models\MpHead;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MpHeadResource extends Resource
{
    protected static ?string $model = MpHead::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama_head';
    public static function getNavigationGroup(): ?string
    {
        return 'Manajemen Aset';
    }

    public static function form(Schema $schema): Schema
    {
        return MpHeadForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return MpHeadInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MpHeadsTable::configure($table);
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
            'index' => ListMpHeads::route('/'),
            'create' => CreateMpHead::route('/create'),
            'view' => ViewMpHead::route('/{record}'),
            'edit' => EditMpHead::route('/{record}/edit'),
        ];
    }
}
