<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PullOut extends Model
{
    use HasFactory;

    protected $primaryKey = 'PullOutID';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'PullOutID',
        'EmpID',
        'ProdID',
        'Qty',
        'Reason',
        'DatePullOut'
    ];

    protected $casts = [
        'DatePullOut' => 'datetime',
    ];

    /**
     * Get the employee that owns the pull out record.
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'EmpID');
    }

    /**
     * Get the product that owns the pull out record.
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'ProdID');
    }
}