<?php

namespace App\Models;

use Illuminate\Database\Concerns\ManagesTransactions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Transaction extends Model
{
    use HasFactory;
   protected $fillable = [
        'name',
        'category_id',
        'date_transaction',
        'amount',
        'note',
        'image',
         // tambahkan kolom lain jika ada
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function scopeExpenses($query) 
    {
        return $query->whereHas('category', function ($query) {
            $query->where('is_expense', true);
        });

    }
    public function scopeIncomes($query) 
    {
        return $query->whereHas('category', function ($query) {
            $query->where('is_expense', false);
        });

    }

}
