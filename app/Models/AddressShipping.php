<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AddressShipping extends Model
{
    protected $fillable = [
        'department',
        'municipality',
        'exempt_address',
        'customer_id',
        'producer_id'
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function producer(): BelongsTo
    {
        return $this->belongsTo(producer::class);
    }
}
