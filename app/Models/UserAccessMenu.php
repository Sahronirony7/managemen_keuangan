<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserAccessMenu extends Model
{
    use HasFactory;

    protected $table = 'user_access_menu';

    protected $fillable = ['role_id','menu_id'];

    public function role()
    {
        return $this->belongsTo(UserRole::class,'role_id');
    }

    public function menu()
    {
        return $this->belongsTo(UserMenu::class,'menu_id');
    }
}
