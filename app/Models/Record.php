<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $primaryKey = 'RecordID';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'RecordID',
        'RecordType',
        'Description',
        'Module',
        'Priority',
        'UserID',
        'Timestamp',
        'AdditionalData'
    ];

    protected $casts = [
        'Timestamp' => 'datetime',
        'AdditionalData' => 'array',
    ];

    /**
     * Get the user that created the record.
     */
    public function user()
    {
        return $this->belongsTo(Account::class, 'UserID', 'AccountID');
    }

    /**
     * Scope a query to filter by record type.
     */
    public function scopeOfType($query, $type)
    {
        return $query->where('RecordType', $type);
    }

    /**
     * Scope a query to filter by priority.
     */
    public function scopeOfPriority($query, $priority)
    {
        return $query->where('Priority', $priority);
    }

    /**
     * Scope a query to filter by date range.
     */
    public function scopeDateRange($query, $from, $to)
    {
        return $query->whereBetween('Timestamp', [$from, $to]);
    }

    /**
     * Scope a query to filter by module.
     */
    public function scopeOfModule($query, $module)
    {
        return $query->where('Module', $module);
    }
}