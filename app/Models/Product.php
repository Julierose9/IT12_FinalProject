<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // If your primary key is not 'id'
    protected $primaryKey = 'ProdID';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'ProdID',
        'ProdName', 
        'ProdDescription',
        'CategoryID',
        'ReorderLvl',
        'Status',
        'SupID'
    ];

    /**
     * Get the category that owns the product.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'CategoryID');
    }

    /**
     * Get the supplier that owns the product.
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'SupID');
    }

    /**
     * Get the inventory records for the product.
     */
    public function inventory()
    {
        return $this->hasMany(Inventory::class, 'ProdID');
    }
}