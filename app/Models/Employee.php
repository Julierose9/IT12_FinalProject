<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $primaryKey = 'EmpID';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'EmpID',
        'EmpFName',
        'EmpLName',
        'EmpMMame',
        'EmpContactNum',
        'EmpEmail',
        'Role',
        'Status',
        'HireDate'
    ];

    protected $casts = [
        'HireDate' => 'datetime',
    ];

    /**
     * Get the orders for the employee.
     */
    public function orders()
    {
        return $this->hasMany(Employee::class, 'EmpID', 'EmpID');
    }

    /**
     * Get the pullouts for the employee.
     */
    public function pullouts()
    {
        return $this->hasMany(PullOut::class, 'EmpID', 'EmpID');
    }

    /**
     * Get the user account associated with the employee.
     */
    public function user()
    {
        return $this->hasOne(User::class, 'EmpID', 'EmpID');
    }
}