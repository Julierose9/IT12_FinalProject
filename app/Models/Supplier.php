<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $primaryKey = 'SupplierID';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'SupplierID',
        'SupName',
        'SupContactNum',
        'Address'
    ];

    /**
     * Get the products for the supplier.
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'SupID');
    }
}