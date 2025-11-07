<?php

namespace App\Filament\Resources\Transactions\Tables;

use App\Models\Transaction;
use App\Filament\Exports\TransactionExport;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\Action;
use Barryvdh\DomPDF\Facade\Pdf;

class TransactionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('category.image')
                    ->label('Gambar')
                    ->square()
                    ->sortable(),

                TextColumn::make('category.name')
                    ->label('Kategori')
                    ->description(fn(Transaction $record): string => $record->name)
                    ->searchable(),

                IconColumn::make('category.is_expense')
                    ->label('Tipe')
                    ->trueIcon('heroicon-o-arrow-up-circle')
                    ->falseIcon('heroicon-o-arrow-down-circle')
                    ->trueColor('danger')
                    ->falseColor('success')
                    ->boolean(),

                TextColumn::make('date_transaction')
                    ->label('Tanggal')
                    ->date()
                    ->sortable(),

                TextColumn::make('amount')
                    ->label('Jumlah')
                    ->money('IDR', locale: 'id')
                    ->sortable(),

                TextColumn::make('note')
                    ->label('Catatan')
                    ->limit(40)
                    ->tooltip(fn($record) => $record->note)
                    ->searchable(),

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
                Filter::make('date_range')
                    ->label('Rentang Tanggal')
                    ->form([
                        DatePicker::make('from')->label('Dari'),
                        DatePicker::make('until')->label('Sampai'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['from'], fn($q) => $q->whereDate('date_transaction', '>=', $data['from']))
                            ->when($data['until'], fn($q) => $q->whereDate('date_transaction', '<=', $data['until']));
                    }),

                Filter::make('category_id')
                    ->label('Kategori')
                    ->form([
                        Select::make('category_id')
                            ->label('Pilih Kategori')
                            ->relationship('category', 'name'),
                    ])
                    ->query(fn($query, array $data) =>
                        $query->when($data['category_id'], fn($q) => $q->where('category_id', $data['category_id']))
                    ),

                Filter::make('tipe_transaksi')
                    ->label('Tipe Transaksi')
                    ->form([
                        Select::make('is_expense')
                            ->label('Jenis')
                            ->options([
                                0 => 'Pemasukan',
                                1 => 'Pengeluaran',
                            ]),
                    ])
                    ->query(fn($query, array $data) =>
                        $query->when(
                            isset($data['is_expense']),
                            fn($q) => $q->whereHas('category', fn($c) => $c->where('is_expense', $data['is_expense']))
                        )
                    ),
            ])

            ->recordActions([
                ViewAction::make()->label('Lihat'),
                EditAction::make()->label('Ubah'),
            ])

            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])

            ->defaultSort('date_transaction', 'desc')

           ->headerActions([
            // ✅ Export bawaan Filament
            \Filament\Actions\ExportAction::make('export_excel')
                ->label('Export Excel / CSV')
                ->icon('heroicon-o-document-arrow-down')
                ->color('success')
                ->exporter(TransactionExport::class)
                ->fileName(fn () => 'Laporan_Transaksi_' . now()->format('Y-m-d_His')),

                // ✅ Export PDF
                Action::make('export_pdf')
                    ->label('Export PDF')
                    ->icon('heroicon-o-printer')
                    ->color('danger')
                    ->action(function ($livewire) {
                        $query = $livewire->getFilteredTableQuery();
                        $transactions = $query->with('category')->get();

                        $pdf = Pdf::loadView('exports.transactions-pdf', [
                            'transactions' => $transactions,
                            'totalIncome' => $transactions->filter(fn($t) => !$t->category->is_expense)->sum('amount'),
                            'totalExpense' => $transactions->filter(fn($t) => $t->category->is_expense)->sum('amount'),
                            'balance' => $transactions->filter(fn($t) => !$t->category->is_expense)->sum('amount')
                                        - $transactions->filter(fn($t) => $t->category->is_expense)->sum('amount'),
                        ])->setPaper('a4', 'portrait');

                        return response()->streamDownload(function () use ($pdf) {
                            echo $pdf->output();
                        }, 'laporan-transaksi.pdf');
                    }),
            ]);
    }
}
