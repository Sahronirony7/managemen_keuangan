<?php

namespace App\Filament\Resources\MpAsets\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class MpAsetInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nama_aset'),
                TextEntry::make('tanggal_perolehan')
                    ->date(),
                TextEntry::make('jumlah_unit'),
                TextEntry::make('umur_manfaat'),
                TextEntry::make('harga_perolehan'),
                TextEntry::make('akumulasi_penyusutan'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
