<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    

    protected $fillable = [
        'name',
        'email',
        'image',
        'password',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $guard_name = 'web';

    /**
     * ✅ Super Admin bypass semua permission
     * Laravel 12 + Filament v4 compatible
     */
    public function can($ability, $arguments = []): bool
    {
        if ($this->hasRole('Super Admin')) {
            return true;
        }

        return parent::can($ability, $arguments);
    }
}
