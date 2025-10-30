<?php

namespace App\Filament\Resources\Transactions\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class TransactionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('note'),

                TextEntry::make('date_transaction')
                    ->date(),
                TextEntry::make('amount')
                    ->numeric(),
                
                ImageEntry::make('image'),
                TextEntry::make('category.name')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
