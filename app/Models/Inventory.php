<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'ProdID';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'ProdID',
        'ProdName',
        'Category',
        'Description',
        'OriginalPrice',
        'SellingPrice',
        'CurrentStock',
        'ReorderLevel',
        'Status',
        'Image',
    ];

    protected $casts = [
        'OriginalPrice' => 'decimal:2',
        'SellingPrice' => 'decimal:2',
        'CurrentStock' => 'integer',
        'ReorderLevel' => 'integer',
    ];

    /**
     * Relationship: Product belongs to a category
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'Category', 'CategoryID');
    }

    /**
     * Stock In relationship
     */
    public function stockIns()
    {
        return $this->hasMany(StockIn::class, 'ProdID', 'ProdID');
    }

    /**
     * Pullout relationship
     */
    public function pullouts()
    {
        return $this->hasMany(Pullout::class, 'ProdID', 'ProdID');
    }
}
