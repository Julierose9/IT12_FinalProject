<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockIn extends Model
{
    use HasFactory;

    protected $primaryKey = 'StockInID';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'StockInID',
        'ProdID',
        'SupID',
        'Qty',
        'ProdStatus',
        'DateRcvd'
    ];

    protected $casts = [
        'DateRcvd' => 'datetime',
    ];

    /**
     * Get the product that owns the stock in record.
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'ProdID');
    }

    /**
     * Get the supplier that owns the stock in record.
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'SupID');
    }
}