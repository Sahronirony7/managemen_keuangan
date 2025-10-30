<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MpPiutang extends Model
{
    use HasFactory;

    protected $table = 'mp_piutang';

    protected $fillable = ['nama_piutang','tanggal_piutang','penambahan','pengurangan'];
}
