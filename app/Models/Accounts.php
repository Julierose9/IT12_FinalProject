<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Accounts extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'AccountID';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'AccountID',
        'EmpID',
        'Username',
        'Email',
        'Password',
        'Role',
        'Status',
        'LastLogin'
    ];

    protected $hidden = [
        'Password',
    ];

    protected $casts = [
        'LastLogin' => 'datetime',
    ];

    /**
     * Get the employee that owns the account.
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'EmpID', 'EmpID');
    }

    /**
     * Get the password for the user.
     */
    public function getAuthPassword()
    {
        return $this->Password;
    }
}