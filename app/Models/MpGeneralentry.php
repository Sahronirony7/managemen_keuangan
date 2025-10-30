<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MpGeneralentry extends Model
{
    use HasFactory;

    protected $table = 'mp_generalentry';

    protected $fillable = ['date','naration','generated_source'];

    public function subEntries()
    {
        return $this->hasMany(MpSubEntry::class, 'parent_id');
    }
}
