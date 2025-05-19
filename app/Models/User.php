<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'is_admin' => 'boolean',
    ];

    // Portuguese accessor methods
    public function getNomeAttribute()
    {
        return $this->name;
    }

    public function getSenhaAttribute()
    {
        return $this->password;
    }

    public function getAdministradorAttribute()
    {
        return $this->is_admin;
    }
}