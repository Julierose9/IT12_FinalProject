<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $primaryKey = 'InvID';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'InvID',
        'ProdID',
        'QtyChange',
        'ChangeType',
        'ChangeDateTime',
        'Reason'
    ];

    protected $casts = [
        'ChangeDateTime' => 'datetime',
    ];

    /**
     * Get the product that owns the inventory record.
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'ProdID');
    }
}