<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserRole extends Model
{
    use HasFactory;

    protected $table = 'user_role';

    protected $fillable = ['role'];

    public function users()
    {
        return $this->hasMany(User::class,'role_id');
    }
}
