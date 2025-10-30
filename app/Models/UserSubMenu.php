<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserSubMenu extends Model
{
    use HasFactory;

    protected $table = 'user_sub_menu';

    protected $fillable = ['menu_id','title','url','icon','is_active'];

    public function menu()
    {
        return $this->belongsTo(UserMenu::class,'menu_id');
    }
}
