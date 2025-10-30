<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserMenu extends Model
{
    use HasFactory;

    protected $table = 'user_menu';

    protected $fillable = ['menu'];

    public function subMenus()
    {
        return $this->hasMany(UserSubMenu::class,'menu_id');
    }
}
