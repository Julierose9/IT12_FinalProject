<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $primaryKey = 'SupplierID';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'SupplierID',
        'SupName',
        'SupContactNum',
        'Address',
        'Status',
    ];

    public function products()
    {
        return $this->hasMany(\App\Models\Product::class, 'SupplierID', 'SupplierID');
    }
}