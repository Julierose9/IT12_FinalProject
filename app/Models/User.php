<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'username', 'password', 'role',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Allow login with username OR email
    public function getAuthIdentifierName()
    {
        return 'username'; // or 'email' if you prefer
    }

    // Optional: Allow login with either
    public function findForPassport($identifier)
    {
        return $this->orWhere('email', $identifier)->orWhere('username', $identifier)->first();
    }
}
