<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MpHead extends Model
{
    use HasFactory;

    protected $table = 'mp_head';

    protected $fillable = [
        'name',
        'nature',
        'type',
        'expense_type',
        'revenue_type',
    ];

    // Contoh relasi ke MpSubEntry (optional)
    public function subEntries()
    {
        return $this->hasMany(MpSubEntry::class, 'accounthead');
    }
}
