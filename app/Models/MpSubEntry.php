<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MpSubEntry extends Model
{
    use HasFactory;

    protected $table = 'mp_sub_entry';

    protected $fillable = ['parent_id','accounthead','amount','type','journal_type'];

    public function parent()
    {
        return $this->belongsTo(MpGeneralentry::class,'parent_id');
    }

    public function head()
    {
        return $this->belongsTo(MpHead::class,'accounthead');
    }
}
