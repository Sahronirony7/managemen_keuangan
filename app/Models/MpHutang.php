<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MpHutang extends Model
{
    use HasFactory;

    protected $table = 'mp_hutang';

    protected $fillable = ['nama_hutang','tanggal_hutang','penambahan','pengurangan'];
}
