<?php

use Illuminate\Support\Facades\Route;
use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/transactions/{transaction}/print', function (Transaction $transaction) {
    $pdf = Pdf::loadView('pdf.transaction', ['transaction' => $transaction]);
    return $pdf->stream('transaction.pdf');
})->name('transactions.print');