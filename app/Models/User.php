<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'user';

    protected $fillable = [
        'name','email','image','password','role_id','is_active','date_created'
    ];

    protected $hidden = ['password'];

    public function role()
    {
        return $this->belongsTo(UserRole::class,'role_id');
    }
}
